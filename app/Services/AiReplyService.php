<?php

namespace App\Services;

use App\Models\Inquiry;
use App\Models\Setting;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class AiReplyService
{
    /**
     * Generate an intelligent, personalized email reply for an inquiry.
     *
     * @param Inquiry $inquiry
     * @param array $options [tone, custom_instructions, include_whatsapp, include_batches]
     * @return array [success => bool, subject => string, html => string, provider => string, note => string]
     */
    public static function generateReply(Inquiry $inquiry, array $options = []): array
    {
        $tone = $options['tone'] ?? 'academic';
        $customPrompt = trim($options['custom_instructions'] ?? '');
        $geminiKey = Setting::get('gemini_api_key', env('GEMINI_API_KEY'));
        $openaiKey = Setting::get('openai_api_key', env('OPENAI_API_KEY'));

        // 1. Try Gemini Live API if API Key is configured
        if (!empty($geminiKey)) {
            $geminiResult = self::callGeminiApi($inquiry, $geminiKey, $tone, $customPrompt, $options);
            if ($geminiResult['success']) {
                return $geminiResult;
            }
        }

        // 2. Try OpenAI API if configured
        if (!empty($openaiKey)) {
            $openaiResult = self::callOpenAiApi($inquiry, $openaiKey, $tone, $customPrompt, $options);
            if ($openaiResult['success']) {
                return $openaiResult;
            }
        }

        // 3. Built-in Smart Medical Context Synthesizer (Zero downtime, always works)
        return self::generateBuiltInReply($inquiry, $tone, $customPrompt, $options);
    }

    /**
     * Call Google Gemini API (gemini-flash-latest and failover models).
     */
    protected static function callGeminiApi(Inquiry $inquiry, string $apiKey, string $tone, string $customPrompt, array $options): array
    {
        $modelsToTry = [
            Setting::get('gemini_model', config('services.gemini.model', 'gemini-flash-latest')),
            'gemini-3.8-flash',
            'gemini-3.5-flash',
            'gemini-flash-lite-latest',
        ];

        // Ensure distinct models
        $modelsToTry = array_unique(array_filter($modelsToTry));

        $systemContext = self::buildSystemPrompt($inquiry, $tone, $customPrompt, $options);

        $payload = [
            'contents' => [
                [
                    'role' => 'user',
                    'parts' => [
                        ['text' => $systemContext]
                    ]
                ]
            ],
            'generationConfig' => [
                'temperature' => 0.7,
                'maxOutputTokens' => 1200,
            ]
        ];

        foreach ($modelsToTry as $model) {
            try {
                $url = "https://generativelanguage.googleapis.com/v1beta/models/{$model}:generateContent";

                $response = Http::withHeaders([
                    'X-goog-api-key' => $apiKey,
                    'Content-Type' => 'application/json',
                ])->timeout(12)->post($url, $payload);

                if ($response->successful()) {
                    $data = $response->json();
                    $rawText = $data['candidates'][0]['content']['parts'][0]['text'] ?? '';

                    if (!empty($rawText)) {
                        return self::parseAiOutput($rawText, $inquiry, "Google Gemini AI ({$model})");
                    }
                }
            } catch (\Exception $e) {
                // Try next model or fall back
                continue;
            }
        }

        return ['success' => false];
    }

    /**
     * Call OpenAI API (gpt-4o-mini).
     */
    protected static function callOpenAiApi(Inquiry $inquiry, string $apiKey, string $tone, string $customPrompt, array $options): array
    {
        try {
            $systemContext = self::buildSystemPrompt($inquiry, $tone, $customPrompt, $options);

            $response = Http::withToken($apiKey)->timeout(15)->post('https://api.openai.com/v1/chat/completions', [
                'model' => 'gpt-4o-mini',
                'messages' => [
                    ['role' => 'system', 'content' => 'You are the Senior Academic Admissions Director at HOK Academy (International Academy of Medical Excellence). Return clean HTML email body without markdown fences.'],
                    ['role' => 'user', 'content' => $systemContext],
                ],
                'temperature' => 0.7,
                'max_tokens' => 1200,
            ]);

            if ($response->successful()) {
                $data = $response->json();
                $rawText = $data['choices'][0]['message']['content'] ?? '';
                if (!empty($rawText)) {
                    return self::parseAiOutput($rawText, $inquiry, 'OpenAI GPT-4o');
                }
            }
        } catch (\Exception $e) {
            // Fall back
        }

        return ['success' => false];
    }

    /**
     * System prompt builder for LLMs.
     */
    protected static function buildSystemPrompt(Inquiry $inquiry, string $tone, string $customPrompt, array $options): string
    {
        $siteTitle = Setting::get('site_title', 'HOK Academy');
        $sitePhone = Setting::get('contact_phone', '+91 99101 69317');
        $siteEmail = Setting::get('contact_email', 'hokacademy@yahoo.com');

        $toneDescriptions = [
            'academic' => 'Academic, prestigious, reassuring, emphasizing hands-on training, expert faculty mentorship, and international certification.',
            'curriculum' => 'Detailed curriculum overview, clinical module breakdowns, hands-on live patient demonstration highlights, and admissions syllabus delivery.',
            'batches' => 'Upcoming cohort batch dates, strict seat limitations per cohort for personalized guidance, and enrollment reservation steps.',
            'quick' => 'Short, friendly, direct response inviting the doctor/inquirer to a fast phone or WhatsApp consultation call.',
            'direct' => 'Specifically and directly answering every question and concern raised in the inquirer message with clarity and medical precision.',
        ];

        $toneDesc = $toneDescriptions[$tone] ?? $toneDescriptions['academic'];

        return <<<PROMPT
You are drafting an official email reply for HOK Academy (International Academy of Medical Excellence).
Academy Phone: {$sitePhone} | Email: {$siteEmail}

INQUIRY DETAILS:
- Inquirer Name: {$inquiry->name}
- Email: {$inquiry->email}
- Phone: {$inquiry->phone}
- Program of Interest: {$inquiry->program_name}
- Inquirer Background / Profession: {$inquiry->profession_role}
- Country / Location: {$inquiry->country}
- Original Inquirer Message: "{$inquiry->message}"

DESIRED TONE & GOAL:
{$toneDesc}

ADMIN ADDITIONAL INSTRUCTIONS:
{$customPrompt}

REQUIREMENTS:
1. First line MUST be: "SUBJECT: [Your crafted concise, attractive subject line]"
2. Followed by the HTML formatted body. Use clean HTML tags: <p>, <strong>, <ul>, <li>, <br>. Do NOT wrap in ```html code fences.
3. Greet the inquirer warmly by name ("Dear Dr. [Name]" if medical or "Dear [Name]").
4. Address their specific query or interest in {$inquiry->program_name}.
5. End with the official sign-off:
   <p>Warm regards,<br>
   <strong>Academic Advisory &amp; Admissions Directorate</strong><br>
   {$siteTitle} | International Academy of Medical Excellence<br>
   Phone: {$sitePhone} | Email: {$siteEmail}</p>
PROMPT;
    }

    /**
     * Parse raw AI output into subject and clean HTML body.
     */
    protected static function parseAiOutput(string $rawText, Inquiry $inquiry, string $provider): array
    {
        // Strip markdown code fences if present
        $clean = preg_replace('/^```(?:html)?\s*/i', '', trim($rawText));
        $clean = preg_replace('/\s*```$/i', '', $clean);

        $subject = 'Response regarding ' . ($inquiry->program_name ? $inquiry->program_name . ' Program' : 'your enquiry') . ' - HOK Academy';

        if (preg_match('/^SUBJECT:\s*(.+)$/mi', $clean, $matches)) {
            $subject = trim($matches[1]);
            // Remove the SUBJECT line from the body
            $clean = trim(preg_replace('/^SUBJECT:\s*.+$/mi', '', $clean));
        }

        // If the response didn't contain HTML tags, format with paragraphs
        if (strip_tags($clean) === $clean) {
            $clean = '<p>' . nl2br(e($clean)) . '</p>';
        }

        return [
            'success' => true,
            'subject' => $subject,
            'html' => $clean,
            'provider' => $provider,
            'note' => 'Generated using ' . $provider,
        ];
    }

    /**
     * Built-in Contextual Smart Generator (Always available, tailored to HOK Academy).
     */
    protected static function generateBuiltInReply(Inquiry $inquiry, string $tone, string $customPrompt, array $options): array
    {
        $name = e($inquiry->name);
        $prog = e($inquiry->program_name ?? 'our clinical specialty programs');
        $siteTitle = e(Setting::get('site_title', 'HOK Academy'));
        $phone = e(Setting::get('contact_phone', '+91 99101 69317'));
        $email = e(Setting::get('contact_email', 'hokacademy@yahoo.com'));

        $userMsg = trim($inquiry->message ?? '');
        $hasSpecificQuestion = !empty($userMsg) && (str_contains(strtolower($userMsg), '?') || strlen($userMsg) > 20);

        // Subject variants based on tone
        $subjects = [
            'academic' => "Admissions & Curriculum Overview: {$prog} - {$siteTitle}",
            'curriculum' => "Complete Syllabus & Clinical Modules: {$prog} - {$siteTitle}",
            'batches' => "Upcoming Batch Dates & Seat Reservation: {$prog} - {$siteTitle}",
            'quick' => "Enquiry Follow-up: {$prog} at {$siteTitle}",
            'direct' => "Answering your query regarding {$prog} - {$siteTitle}",
        ];
        $subject = $subjects[$tone] ?? $subjects['academic'];

        // Custom instruction paragraph if provided
        $customInsert = '';
        if (!empty($customPrompt)) {
            $customInsert = "<p style=\"background: #f8fafc; border-left: 3px solid #0d6efd; padding: 10px 14px; margin: 14px 0;\">" .
                            "<strong>Note from our Admissions Desk:</strong> " . e($customPrompt) . "</p>";
        }

        // Question acknowledgement
        $questionAck = '';
        if ($hasSpecificQuestion) {
            $questionAck = "<p>Regarding your note: <em>\"" . e(Str::limit($userMsg, 160)) . "\"</em> &mdash; our senior clinical faculty has reviewed your query and is pleased to provide full guidance tailored to your learning requirements.</p>";
        }

        if ($tone === 'curriculum') {
            $html = <<<HTML
<p>Dear <strong>{$name}</strong>,</p>

<p>Thank you for expressing your interest in the <strong>{$prog}</strong> at <strong>{$siteTitle}</strong>.</p>

{$questionAck}

<p>This hands-on program combines rigorous scientific foundation with intensive practical case training, featuring:</p>
<ul>
    <li><strong>Comprehensive Clinical Foundations:</strong> Advanced pathology, anatomical assessment, and evidence-based protocols.</li>
    <li><strong>Live Consultant Demonstrations:</strong> Step-by-step master demonstrations conducted by recognized specialist faculty.</li>
    <li><strong>Supervised Hands-on Practice:</strong> Supervised procedural training with one-on-one feedback on clinical technique.</li>
    <li><strong>Safety &amp; Complication Protocols:</strong> Risk mitigation, adverse event management, and patient care best practices.</li>
</ul>

{$customInsert}

<p>Our academic admissions officer has prepared the complete curriculum PDF, syllabus roadmap, and fee structure. We will be pleased to share it directly with you on WhatsApp or email.</p>

<p>Please let us know your convenient time for a brief 5-minute academic consultation.</p>

<p><br></p>
<p>Warm regards,<br>
<strong>Academic Admissions Directorate</strong><br>
{$siteTitle} | International Academy of Medical Excellence<br>
Phone: {$phone} | Email: {$email}</p>
HTML;
        } elseif ($tone === 'batches') {
            $html = <<<HTML
<p>Dear <strong>{$name}</strong>,</p>

<p>Thank you for reaching out to <strong>{$siteTitle}</strong> regarding upcoming batch schedules for the <strong>{$prog}</strong>.</p>

{$questionAck}

<p>Our upcoming clinical cohort will commence shortly. To guarantee dedicated instructor mentorship and sufficient individual procedural experience, <strong>seats are strictly capped per batch</strong>.</p>

{$customInsert}

<p>To reserve your provisional seat or receive the exact batch calendar, please confirm your preferred month and availability:</p>
<ul>
    <li><strong>Upcoming Cohort:</strong> Limited admissions currently open for registration.</li>
    <li><strong>Venue:</strong> HOK Academy Specialist Clinical Training Center.</li>
    <li><strong>Certification:</strong> Official Academy Fellowship &amp; Clinical Completion Credentials.</li>
</ul>

<p>Feel free to reply directly to this email or connect with our coordinator at <strong>{$phone}</strong> for priority enrollment assistance.</p>

<p><br></p>
<p>Warm regards,<br>
<strong>Academic Scheduling &amp; Admissions Office</strong><br>
{$siteTitle} | International Academy of Medical Excellence<br>
Phone: {$phone} | Email: {$email}</p>
HTML;
        } elseif ($tone === 'quick') {
            $html = <<<HTML
<p>Dear <strong>{$name}</strong>,</p>

<p>Thank you for your enquiry regarding the <strong>{$prog}</strong> at <strong>{$siteTitle}</strong>.</p>

{$questionAck}
{$customInsert}

<p>We would love to connect with you directly to answer your queries and share the full course brochure and upcoming batch details.</p>

<p>Would you prefer a quick discussion on phone/WhatsApp at <strong>{$inquiry->phone}</strong>, or shall we share the complete program PDF over email?</p>

<p>Looking forward to welcoming you to HOK Academy.</p>

<p><br></p>
<p>Warm regards,<br>
<strong>Academic Advisory Team</strong><br>
{$siteTitle} | International Academy of Medical Excellence<br>
Phone: {$phone} | Email: {$email}</p>
HTML;
        } else {
            // Default: Academic & Comprehensive
            $html = <<<HTML
<p>Dear <strong>{$name}</strong>,</p>

<p>Thank you for reaching out to <strong>{$siteTitle}</strong> regarding our prestigious <strong>{$prog}</strong>.</p>

{$questionAck}

<p>At HOK Academy, our programs are specifically designed for doctors and medical practitioners looking to elevate their clinical confidence through evidence-based learning and supervised hands-on mentorship.</p>

<p>Key highlights of this fellowship program include:</p>
<ul>
    <li>State-of-the-art clinical facilities and advanced procedural equipment.</li>
    <li>Guidance from renowned medical faculty and specialist practitioners.</li>
    <li>Official certification awarded upon successful clinical evaluation.</li>
    <li>Post-training advisory support and clinical case consultation access.</li>
</ul>

{$customInsert}

<p>Please feel free to share your specific clinical queries, preferred cohort schedule, or any prerequisite questions so we may assist you promptly.</p>

<p><br></p>
<p>Warm regards,<br>
<strong>Academic Advisory Directorate</strong><br>
{$siteTitle} | International Academy of Medical Excellence<br>
Phone: {$phone} | Email: {$email}</p>
HTML;
        }

        return [
            'success' => true,
            'subject' => $subject,
            'html' => $html,
            'provider' => 'Built-in Smart AI',
            'note' => 'Generated using Built-in Smart AI Engine (Configure Google Gemini API key in Settings for live LLM generation)',
        ];
    }
}

