<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOK Academy - Response to your Enquiry</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f1f5f9;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            color: #1e293b;
            line-height: 1.6;
        }
        .email-wrapper {
            width: 100%;
            background-color: #f1f5f9;
            padding: 30px 15px;
        }
        .email-card {
            max-width: 640px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(7, 29, 58, 0.06);
            border: 1px solid #e2e8f0;
        }
        .email-header {
            background: linear-gradient(135deg, #071d3a 0%, #0d2e5c 100%);
            color: #ffffff;
            padding: 24px 30px;
            text-align: left;
            border-bottom: 3px solid #d4af37;
        }
        .email-header h1 {
            margin: 0;
            font-size: 20px;
            font-weight: 700;
            letter-spacing: 0.02em;
            color: #ffffff;
        }
        .email-header p {
            margin: 4px 0 0;
            font-size: 13px;
            color: #d1d5db;
        }
        .email-body {
            padding: 30px;
            color: #334155;
            font-size: 15px;
        }
        .email-message {
            background-color: #ffffff;
            font-size: 15px;
            line-height: 1.7;
            color: #1e293b;
            margin-bottom: 25px;
        }
        .email-message p {
            margin: 0 0 14px 0;
        }
        .email-message p:last-child {
            margin-bottom: 0;
        }
        .email-message ul, .email-message ol {
            margin: 8px 0 16px 20px;
            padding: 0;
        }
        .email-message li {
            margin-bottom: 6px;
        }
        .original-quote {
            background-color: #f8fafc;
            border-left: 3px solid #94a3b8;
            padding: 14px 18px;
            border-radius: 6px;
            margin-top: 25px;
            font-size: 13px;
            color: #64748b;
        }
        .original-quote h4 {
            margin: 0 0 8px;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #475569;
        }
        .original-quote p {
            margin: 0;
            line-height: 1.5;
        }
        .email-footer {
            background-color: #f8fafc;
            border-top: 1px solid #e2e8f0;
            padding: 20px 30px;
            font-size: 12px;
            color: #64748b;
            text-align: center;
        }
        .email-footer p {
            margin: 4px 0;
        }
        .email-footer a {
            color: #086d79;
            text-decoration: none;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="email-wrapper">
        <div class="email-card">
            <!-- Header -->
            <div class="email-header">
                <h1>{{ $siteTitle ?? 'HOK Academy' }}</h1>
                <p>International Academy of Medical Excellence</p>
            </div>

            <!-- Body -->
            <div class="email-body">
                <div class="email-message">
                    @if(strip_tags($replyBody) === $replyBody)
                        {!! nl2br(e($replyBody)) !!}
                    @else
                        {!! $replyBody !!}
                    @endif
                </div>

                <!-- Quoted Reference of Original Enquiry -->
                <div class="original-quote">
                    <h4>Regarding Your Previous Enquiry:</h4>
                    <p><strong>Program:</strong> {{ $inquiry->program_name ?? 'General Medical Enquiry' }}</p>
                    <p><strong>Submitted on:</strong> {{ $inquiry->created_at->format('M d, Y h:i A') }}</p>
                    @if(!empty($inquiry->message))
                        <p style="margin-top: 6px;"><em>"{{ Str::limit($inquiry->message, 250) }}"</em></p>
                    @endif
                </div>
            </div>

            <!-- Footer -->
            <div class="email-footer">
                <p><strong>{{ $siteTitle ?? 'HOK Academy' }}</strong> &bull; Medical Training &amp; Specialist Fellowships</p>
                <p>
                    Helpline: <a href="tel:{{ $sitePhone ?? '+919910169317' }}">{{ $sitePhone ?? '+91 99101 69317' }}</a> &bull;
                    Email: <a href="mailto:{{ $siteEmail ?? 'hokacademy@yahoo.com' }}">{{ $siteEmail ?? 'hokacademy@yahoo.com' }}</a>
                </p>
                @if(!empty($siteAddress))
                    <p>{{ $siteAddress }}</p>
                @endif
                <p style="margin-top: 10px; font-size: 11px; color: #94a3b8;">
                    This email is a direct response to your enquiry submitted via the HOK Academy official portal.
                </p>
            </div>
        </div>
    </div>
</body>
</html>

