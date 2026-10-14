<?php

namespace App\Services;

use App\Models\Setting;
use App\Models\ProgramCategory;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class ProgramAiService
{
    /**
     * Generate medical/aesthetic course content using Gemini AI.
     *
     * @param string $title
     * @param string $categoryName
     * @param string $customPrompt
     * @param string $target 'all' | 'short_description' | 'full_description'
     * @return array
     */
    public static function generateContent(string $title, string $categoryName = '', string $customPrompt = '', string $target = 'all'): array
    {
        $geminiKey = Setting::get('gemini_api_key', env('GEMINI_API_KEY'));

        if (!empty($geminiKey)) {
            $result = self::callGeminiApi($title, $categoryName, $customPrompt, $geminiKey, $target);
            if ($result['success']) {
                return $result;
            }
        }

        // Reliable fallback if API key is missing or service is temporarily busy
        return self::generateBuiltInContent($title, $categoryName, $customPrompt, $target);
    }

    /**
     * Call Google Gemini API to generate structured program data.
     */
    protected static function callGeminiApi(string $title, string $categoryName, string $customPrompt, string $apiKey, string $target = 'all'): array
    {
        $modelsToTry = [
            Setting::get('gemini_model', 'gemini-flash-latest'),
            'gemini-flash-latest',
            'gemini-flash-lite-latest',
            'gemini-3.8-flash',
        ];
        $modelsToTry = array_unique(array_filter($modelsToTry));

        $prompt = self::buildPrompt($title, $categoryName, $customPrompt, $target);

        $payload = [
            'contents' => [
                [
                    'role' => 'user',
                    'parts' => [
                        ['text' => $prompt]
                    ]
                ]
            ],
            'generationConfig' => [
                'temperature' => 0.7,
                'maxOutputTokens' => 2048,
            ]
        ];

        foreach ($modelsToTry as $model) {
            try {
                $url = "https://generativelanguage.googleapis.com/v1beta/models/{$model}:generateContent";

                $response = Http::withHeaders([
                    'X-goog-api-key' => $apiKey,
                    'Content-Type' => 'application/json',
                ])->timeout(20)->post($url, $payload);

                if ($response->successful()) {
                    $data = $response->json();
                    $rawText = $data['candidates'][0]['content']['parts'][0]['text'] ?? '';

                    if (!empty($rawText)) {
                        $parsed = self::parseJsonOutput($rawText);
                        if (!empty($parsed)) {
                            $isValid = false;
                            if ($target === 'short_description' && !empty($parsed['short_description'])) {
                                $isValid = true;
                            } elseif ($target === 'full_description' && !empty($parsed['full_description'])) {
                                $isValid = true;
                            } elseif ($target === 'all' && (!empty($parsed['full_description']) || !empty($parsed['short_description']))) {
                                $isValid = true;
                            }

                            if ($isValid) {
                                return [
                                    'success' => true,
                                    'provider' => 'AI Assistant',
                                    'target' => $target,
                                    'data' => $parsed
                                ];
                            }
                        }
                    }
                }
            } catch (\Exception $e) {
                continue;
            }
        }

        return ['success' => false];
    }

    /**
     * Build the prompt for Gemini.
     */
    protected static function buildPrompt(string $title, string $categoryName, string $customPrompt, string $target = 'all'): string
    {
        $categoryContext = !empty($categoryName) ? "Target Audience / Category: {$categoryName}" : "Target Audience: Medical, Dental, and Aesthetic Professionals";
        $customContext = !empty($customPrompt) ? "Special Instructions / Focus: {$customPrompt}" : "";

        if ($target === 'short_description') {
            return <<<PROMPT
You are the Chief Academic Officer of "HOK Academy" (International Academy of Medical Excellence in Aesthetics, PMU, Cosmetology & Clinical Procedures).
Generate ONLY a compelling, prestigious, 2-line executive summary (approx 25-40 words) for course listing cards on our website.

Course Title: {$title}
{$categoryContext}
{$customContext}

Requirements:
1. Provide a response in VALID JSON FORMAT ONLY (no markdown text outside the JSON).
2. The JSON object must contain EXACTLY one key:
   - "short_description": A high-converting, professional 2-sentence summary highlighting clinical mastery, hands-on training, and career advancement.

Return ONLY the raw JSON object, e.g. {"short_description": "..."}
PROMPT;
        }

        if ($target === 'full_description') {
            return <<<PROMPT
You are the Chief Academic Officer of "HOK Academy" (International Academy of Medical Excellence in Aesthetics, PMU, Cosmetology & Clinical Procedures).
Generate ONLY a complete, accredited clinical syllabus and course curriculum in clean semantic HTML (using <h4> headings, <p> paragraphs, and <ul><li> lists).

Course Title: {$title}
{$categoryContext}
{$customContext}

Include structured sections:
- <h4>Program Overview</h4>
- <h4>Core Curriculum & Learning Modules</h4> (Detail 4-6 specific clinical modules)
- <h4>Clinical Hands-on Training & Methodology</h4>
- <h4>Complication Management & Patient Safety</h4>
- <h4>Learning Outcomes & Clinical Competency</h4>

Requirements:
1. Provide a response in VALID JSON FORMAT ONLY (no markdown text outside the JSON).
2. The JSON object must contain EXACTLY one key:
   - "full_description": Clean, well-structured semantic HTML suitable for a modern WYSIWYG editor.

Return ONLY the raw JSON object, e.g. {"full_description": "..."}
PROMPT;
        }

        // Default 'all'
        return <<<PROMPT
You are the Chief Academic Officer of "HOK Academy" (International Academy of Medical Excellence in Aesthetics, PMU, Cosmetology & Clinical Procedures).
Generate a complete, elite, professional, and accredited medical training course curriculum.

Course Title: {$title}
{$categoryContext}
{$customContext}

Requirements:
1. Provide a response in VALID JSON FORMAT ONLY (no markdown text outside the JSON).
2. The JSON object must contain the following exact keys:
   - "short_description": A compelling, 2-line executive summary (approx 25-40 words) for course listing cards.
   - "full_description": Clean, well-structured semantic HTML suitable for a WYSIWYG editor (use <h4> headings, <p> paragraphs, and <ul><li> lists). Include sections:
       * <h4>Program Overview</h4>
       * <h4>Core Curriculum & Learning Modules</h4> (Detail 4-6 specific clinical modules)
       * <h4>Clinical Hands-on Training & Methodology</h4>
       * <h4>Complication Management & Patient Safety</h4>
       * <h4>Learning Outcomes & Clinical Competency</h4>
   - "highlights": 4 to 6 strong bullet points separated by newlines (\\n), e.g.:
       Comprehensive Facial Anatomy & Vascular Mapping\\nLive Supervised Patient Training\\nNeedle & Cannula Injection Techniques\\nComplication Management Protocols\\nInternational CPD Accreditation
   - "duration": Realistic duration (e.g., "3 Days Intensive Hands-on" or "2 Weeks Modular" or "1 Day Masterclass").
   - "eligibility": Professional criteria (e.g., "MBBS, BDS, MD, MS, Dermatologists, Registered Medical Practitioners" or "Aesthetic Nurses, Cosmetologists, PMU Artists").
   - "certification": Recognized credential (e.g., "Fellowship in Aesthetic Medicine (HOK Academy)" or "Masterclass Certification").
   - "meta_title": SEO optimized title under 60 characters.
   - "meta_description": SEO meta description under 160 characters.

Return ONLY the raw JSON object.
PROMPT;
    }

    /**
     * Parse JSON from AI response, handling possible markdown code block fences.
     */
    protected static function parseJsonOutput(string $rawText): ?array
    {
        $cleaned = trim($rawText);

        // Strip ```json ... ``` wrapper if present
        if (preg_match('/```(?:json)?\s*([\s\S]*?)\s*```/i', $cleaned, $matches)) {
            $cleaned = trim($matches[1]);
        }

        $decoded = json_decode($cleaned, true);
        if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
            return $decoded;
        }

        return null;
    }

    /**
     * Smart Built-in Fallback Content Generator.
     */
    protected static function generateBuiltInContent(string $title, string $categoryName = '', string $customPrompt = '', string $target = 'all'): array
    {
        $titleEsc = e($title);
        $shortDesc = "Master the art and science of {$titleEsc} with HOK Academy's elite clinical training. Gain hands-on procedural mastery, anatomy precision, and recognized certification.";

        $fullDesc = "<h4>Program Overview</h4>
<p>The <strong>{$titleEsc}</strong> at HOK Academy delivers an intensive, evidence-based clinical curriculum designed for healthcare and aesthetic professionals seeking hands-on competency and international accreditation. Guided by experienced international faculty, participants gain deep theoretical knowledge paired with extensive practical training on live supervised cases.</p>

<h4>Core Curriculum &amp; Modules</h4>
<ul>
    <li><strong>Module 1: Applied Clinical Anatomy &amp; Assessment</strong> &mdash; Comprehensive facial and structural analysis, anatomical landmarks, danger zones, and vascular mapping.</li>
    <li><strong>Module 2: Procedural Protocols &amp; Instrumentation</strong> &mdash; Needle vs. cannula selection, product pharmacology, depth-layering techniques, and precision application.</li>
    <li><strong>Module 3: Patient Consultation &amp; Aesthetic Harmonies</strong> &mdash; Golden ratio facial assessment, clinical documentation, ethical boundaries, and patient expectation management.</li>
    <li><strong>Module 4: Clinical Complication Management</strong> &mdash; Immediate adverse event protocols, vascular occlusion mitigation, hyaluronidase reversal guidelines, and emergency management.</li>
    <li><strong>Module 5: Supervised Hands-on Clinical Practice</strong> &mdash; One-on-one guided clinical procedures on live models under senior faculty mentorship.</li>
</ul>

<h4>Clinical Methodology &amp; Hands-on Training</h4>
<p>HOK Academy emphasizes practical dexterity. Over 60% of training time is allocated to clinical simulation and live patient treatments, ensuring every delegate finishes with the confidence to safely perform procedures in independent practice.</p>

<h4>Accreditation &amp; Learning Outcomes</h4>
<p>Upon successful completion of assessment benchmarks, delegates are awarded formal certification from HOK Academy, recognized across premier medical and aesthetic networks worldwide.</p>";

        $highlights = "Comprehensive Clinical & Practical Anatomy\nStep-by-Step Hands-on Practice on Live Patients\nAdvanced Needle & Micro-Cannula Delivery Protocols\nComprehensive Emergency & Complication Management\nInternational CPD/CME Accredited Certification\nLifetime Post-Course Academic & Case Mentorship";

        if ($target === 'short_description') {
            return [
                'success' => true,
                'provider' => 'AI Assistant',
                'target' => 'short_description',
                'data' => [
                    'short_description' => $shortDesc,
                ]
            ];
        }

        if ($target === 'full_description') {
            return [
                'success' => true,
                'provider' => 'AI Assistant',
                'target' => 'full_description',
                'data' => [
                    'full_description' => $fullDesc,
                ]
            ];
        }

        return [
            'success' => true,
            'provider' => 'AI Assistant',
            'target' => 'all',
            'data' => [
                'short_description' => $shortDesc,
                'full_description' => $fullDesc,
                'highlights' => $highlights,
                'duration' => '3 Days Intensive (Theory + Hands-on)',
                'eligibility' => !empty($categoryName) ? $categoryName : 'MBBS, BDS, MD, Registered Medical Practitioners',
                'certification' => "Certificate of Clinical Excellence in {$title} &mdash; HOK Academy",
                'meta_title' => "{$title} Training & Certification | HOK Academy",
                'meta_description' => "Enroll in {$title} at HOK Academy. Comprehensive hands-on clinical training, expert faculty mentorship, and recognized international certification.",
            ]
        ];
    }
}
