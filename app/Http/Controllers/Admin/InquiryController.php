<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\Inquiry;
use App\Models\Setting;
use App\Services\MailConfigService;
use App\Services\AiReplyService;

class InquiryController extends Controller
{
    public function index(Request $request)
    {
        $query = Inquiry::orderBy('created_at', 'desc');

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('program_name', 'like', "%{$search}%");
            });
        }

        $inquiries = $query->paginate(15)->withQueryString();

        return view('admin.inquiries.index', compact('inquiries'));
    }

    public function show(Inquiry $inquiry)
    {
        if ($inquiry->status === 'new') {
            $inquiry->update(['status' => 'read']);
        }
        return view('admin.inquiries.show', compact('inquiry'));
    }

    public function updateStatus(Request $request, Inquiry $inquiry)
    {
        $validated = $request->validate([
            'status' => 'required|in:new,read,replied,archived',
            'admin_notes' => 'nullable|string|max:2000',
        ]);

        $inquiry->update($validated);

        return back()->with('success', 'Inquiry status updated successfully!');
    }

    public function sendReply(Request $request, Inquiry $inquiry)
    {
        $validated = $request->validate([
            'to_email' => 'required|email',
            'subject' => 'required|string|max:250',
            'message' => 'required|string|min:3|max:10000',
            'mark_replied' => 'nullable',
        ], [
            'to_email.required' => 'Recipient email address is required.',
            'to_email.email' => 'Please provide a valid recipient email address.',
            'subject.required' => 'Email subject cannot be blank.',
            'message.required' => 'Please type your reply message before sending.',
        ]);

        try {
            MailConfigService::applyConfig();

            $toEmail = $validated['to_email'];
            $subject = $validated['subject'];
            $replyBody = $validated['message'];

            $fromAddress = Setting::get('smtp_from_address', Setting::get('contact_email', config('mail.from.address', 'hokacademy@yahoo.com')));
            $fromName = Setting::get('smtp_from_name', Setting::get('site_title', config('mail.from.name', 'HOK Academy')));

            $data = [
                'inquiry' => $inquiry,
                'replyBody' => $replyBody,
                'siteTitle' => Setting::get('site_title', 'HOK Academy'),
                'sitePhone' => Setting::get('contact_phone', '+91 99101 69317'),
                'siteEmail' => Setting::get('contact_email', 'hokacademy@yahoo.com'),
                'siteAddress' => Setting::get('contact_address', 'India'),
            ];

            Mail::send('emails.inquiry-reply', $data, function ($message) use ($toEmail, $subject, $fromAddress, $fromName) {
                $message->to($toEmail)
                        ->subject($subject);
                if (!empty($fromAddress)) {
                    $message->from($fromAddress, $fromName);
                }
            });

            // Mark inquiry as replied if checked (default yes)
            if ($request->has('mark_replied')) {
                $inquiry->status = 'replied';
            }

            // Append a concise 1-line note instead of dumping entire email content
            $timestamp = now()->format('d M Y, h:i A');
            $entry = "[{$timestamp}] Email reply sent to {$toEmail}";
            $inquiry->admin_notes = ($inquiry->admin_notes ? trim($inquiry->admin_notes) . "\n" : '') . $entry;
            $inquiry->save();

            return back()->with('success', "Email reply sent successfully to {$toEmail}!");
        } catch (\Exception $e) {
            return back()->with('error', "Failed to send email: " . $e->getMessage())->withInput();
        }
    }

    public function generateAiReply(Request $request, Inquiry $inquiry)
    {
        $options = [
            'tone' => $request->input('tone', 'academic'),
            'custom_instructions' => $request->input('custom_instructions', ''),
        ];

        $result = AiReplyService::generateReply($inquiry, $options);

        return response()->json($result);
    }

    public function destroy(Inquiry $inquiry)
    {
        $inquiry->delete();
        return redirect()->route('admin.inquiries.index')->with('success', 'Inquiry deleted successfully!');
    }
}

