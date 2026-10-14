<?php

namespace App\Services;

use App\Models\Setting;
use Illuminate\Support\Facades\Mail;

class MailConfigService
{
    /**
     * Dynamically override Laravel Mail configuration with database settings if provided.
     */
    public static function applyConfig(): void
    {
        $mailer = Setting::get('smtp_mailer', config('mail.default', 'smtp'));
        $host = Setting::get('smtp_host', config('mail.mailers.smtp.host'));
        $port = Setting::get('smtp_port', config('mail.mailers.smtp.port', 587));
        $username = Setting::get('smtp_username', config('mail.mailers.smtp.username'));
        $password = Setting::get('smtp_password', config('mail.mailers.smtp.password'));
        $encryption = Setting::get('smtp_encryption', config('mail.mailers.smtp.encryption', 'tls'));
        $fromAddress = Setting::get('smtp_from_address', Setting::get('contact_email', config('mail.from.address', 'hokacademy@yahoo.com')));
        $fromName = Setting::get('smtp_from_name', Setting::get('site_title', config('mail.from.name', 'HOK Academy')));

        if (!empty($host) && $host !== '127.0.0.1' && !empty($username)) {
            config([
                'mail.default' => $mailer ?: 'smtp',
                'mail.mailers.smtp.transport' => 'smtp',
                'mail.mailers.smtp.host' => $host,
                'mail.mailers.smtp.port' => (int) ($port ?: 587),
                'mail.mailers.smtp.encryption' => ($encryption === 'none' || empty($encryption)) ? null : $encryption,
                'mail.mailers.smtp.username' => $username,
                'mail.mailers.smtp.password' => $password,
                'mail.from.address' => $fromAddress,
                'mail.from.name' => $fromName,
            ]);
        } elseif (!empty($fromAddress)) {
            config([
                'mail.from.address' => $fromAddress,
                'mail.from.name' => $fromName,
            ]);
        }
    }
}

