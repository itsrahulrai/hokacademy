<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Services\MailConfigService;
use Illuminate\Support\Facades\Mail;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->groupBy('group');
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->except(['_token', '_method']);

        foreach ($data as $key => $value) {
            // Handle file uploads (logos, favicons)
            if ($request->hasFile($key)) {
                $file = $request->file($key);
                $path = $file->store('settings', 'public');
                Setting::set($key, 'storage/' . $path);
            } else {
                Setting::set($key, $value);
            }
        }

        return redirect()->route('admin.settings.index')->with('success', 'Website settings updated successfully!');
    }

    public function sendTestEmail(Request $request)
    {
        $request->validate([
            'test_email' => 'required|email',
        ]);

        try {
            MailConfigService::applyConfig();

            $toEmail = $request->test_email;
            $siteTitle = Setting::get('site_title', 'HOK Academy');
            $fromAddress = Setting::get('smtp_from_address', Setting::get('contact_email', config('mail.from.address')));
            $fromName = Setting::get('smtp_from_name', Setting::get('site_title', config('mail.from.name')));

            Mail::raw("Hello,\n\nThis is a test email sent from your HOK Academy admin dashboard ({$siteTitle}) to verify that your SMTP outgoing mail server is functioning properly.\n\nTimestamp: " . now()->format('Y-m-d H:i:s') . "\n\nIf you received this message, your SMTP configuration is active and working!", function ($message) use ($toEmail, $siteTitle, $fromAddress, $fromName) {
                $message->to($toEmail)
                        ->subject("SMTP Test Mail - {$siteTitle}");
                if (!empty($fromAddress)) {
                    $message->from($fromAddress, $fromName);
                }
            });

            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => "Test email successfully dispatched to {$toEmail}!",
                ]);
            }

            return back()->with('success', "Test email successfully sent to {$toEmail}!");
        } catch (\Exception $e) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => "SMTP Error: " . $e->getMessage(),
                ], 422);
            }

            return back()->with('error', "SMTP connection test failed: " . $e->getMessage());
        }
    }
}
