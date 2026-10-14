@extends('layouts.app')

@php
    $sitePhone = \App\Models\Setting::get('contact_phone', '+91 99101 69317');
    $sitePhoneRaw = \App\Models\Setting::get('contact_phone_raw', '+919910169317');
    $siteWhatsapp = \App\Models\Setting::get('contact_whatsapp', '919910169317');
    $siteEmail = \App\Models\Setting::get('contact_email', 'hokacademy@yahoo.com');
    $siteHours = \App\Models\Setting::get('office_hours', 'Monday to Saturday, 10:00 AM to 6:00 PM (IST)');
@endphp

@section('title', 'Thank You - HOK Academy')

@section('content')
<main id="main">
    <!-- ============ HERO START ============ -->
    <section class="ab-hero" aria-labelledby="tyTitle">
        <div class="container">
            <nav aria-label="Breadcrumb">
                <ol class="ab-crumb">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li aria-current="page">Thank You</li>
                </ol>
            </nav>
            <h1 id="tyTitle">Enquiry Submitted</h1>
            <p class="ab-hero-tag">
                <span>Advancing Medical Knowledge.</span>
                <span>Connecting Specialist Expertise.</span>
            </p>
        </div>
    </section>
    <!-- ============ HERO END ============ -->

    <!-- ============ THANK YOU CARD SECTION ============ -->
    <section class="sec sec-tint ty-section">
        <div class="container">
            <div class="ty-wrapper">

                <div class="ty-card">
                    <!-- Decorative subtle watermark seal -->
                    <div class="ty-watermark"><i class="bi bi-patch-check"></i></div>

                    <!-- Glowing Success Icon Badge -->
                    <div class="ty-icon-wrap">
                        <div class="ty-icon-pulse"></div>
                        <div class="ty-icon">
                            <i class="bi bi-check2"></i>
                        </div>
                    </div>

                    <span class="ty-kicker"><i class="bi bi-shield-check me-1"></i> Submission Confirmed</span>

                    <h2 class="ty-title">Thank You{{ session('name') ? ', ' . session('name') : '' }}!</h2>

                    <p class="ty-desc">
                        Your enquiry has been successfully registered with <strong>HOK Academy</strong>. Our academic advisory team will review your details and contact you shortly with personalized guidance.
                    </p>

                    @if(session('program_name'))
                        <div class="ty-prog-badge">
                            <i class="bi bi-mortarboard-fill me-2 text-primary"></i>
                            <span>Program of Interest:</span>
                            <strong>{{ session('program_name') }}</strong>
                        </div>
                    @endif

                    <!-- What Happens Next: 3 Simple Steps -->
                    <div class="ty-steps">
                        <div class="ty-step">
                            <span class="ty-step-num">1</span>
                            <div>
                                <h4>Profile Review</h4>
                                <p>Our medical advisors review your professional background.</p>
                            </div>
                        </div>
                        <div class="ty-step">
                            <span class="ty-step-num">2</span>
                            <div>
                                <h4>Curriculum &amp; Schedule</h4>
                                <p>We share upcoming batch dates, syllabus, and fee details.</p>
                            </div>
                        </div>
                        <div class="ty-step">
                            <span class="ty-step-num">3</span>
                            <div>
                                <h4>Direct Discussion</h4>
                                <p>We answer all questions regarding clinical workshops.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="ty-actions">
                        <a href="{{ route('programs.index') }}" class="btn btn-hok btn-lg">
                            <i class="bi bi-grid-fill me-2"></i> Explore Programs
                        </a>
                        <a href="https://wa.me/{{ $siteWhatsapp }}?text={{ rawurlencode('Hello HOK Academy, I have submitted an enquiry and would like more details.') }}" 
                           class="btn btn-ghost btn-lg ty-btn-wa" target="_blank" rel="noopener">
                            <i class="bi bi-whatsapp me-2 text-success"></i> WhatsApp Advisor
                        </a>
                        <a href="{{ route('home') }}" class="btn btn-line btn-lg">
                            <i class="bi bi-house-door-fill me-2"></i> Return Home
                        </a>
                    </div>

                    <!-- Need Immediate Assistance Bar -->
                    <div class="ty-helpline">
                        <div class="ty-help-item">
                            <i class="bi bi-telephone-fill"></i>
                            <span>Call: <a href="tel:{{ $sitePhoneRaw }}">{{ $sitePhone }}</a></span>
                        </div>
                        <div class="ty-help-sep">•</div>
                        <div class="ty-help-item">
                            <i class="bi bi-envelope-fill"></i>
                            <span>Email: <a href="mailto:{{ $siteEmail }}">{{ $siteEmail }}</a></span>
                        </div>
                        <div class="ty-help-sep">•</div>
                        <div class="ty-help-item">
                            <i class="bi bi-clock-fill"></i>
                            <span>{{ $siteHours }}</span>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
</main>
@endsection

@push('styles')
<style>
.ty-section {
    padding: clamp(2.5rem, 6vw, 4.5rem) 0;
}

.ty-wrapper {
    max-width: 820px;
    margin: 0 auto;
}

.ty-card {
    position: relative;
    background: #ffffff;
    border-radius: 1.5rem;
    padding: clamp(2.2rem, 5vw, 3.5rem) clamp(1.5rem, 4vw, 3rem);
    text-align: center;
    box-shadow: 0 16px 45px rgba(7, 29, 58, 0.08), 0 2px 6px rgba(0, 0, 0, 0.03);
    border: 1px solid rgba(7, 29, 58, 0.08);
    overflow: hidden;
}

.ty-watermark {
    position: absolute;
    right: -35px;
    top: -35px;
    font-size: 15rem;
    color: #086d79;
    opacity: 0.03;
    line-height: 1;
    pointer-events: none;
    z-index: 0;
}

.ty-icon-wrap {
    position: relative;
    width: 5.5rem;
    height: 5.5rem;
    margin: 0 auto 1.4rem;
    display: grid;
    place-items: center;
    z-index: 1;
}

.ty-icon-pulse {
    position: absolute;
    inset: -6px;
    border-radius: 50%;
    background: rgba(16, 185, 129, 0.18);
    animation: tyPulse 2.4s infinite ease-in-out;
}

.ty-icon {
    position: relative;
    width: 5.2rem;
    height: 5.2rem;
    border-radius: 50%;
    background: linear-gradient(135deg, #059669 0%, #10b981 100%);
    color: #ffffff;
    display: grid;
    place-items: center;
    font-size: 2.75rem;
    box-shadow: 0 10px 25px rgba(16, 185, 129, 0.35);
}

@keyframes tyPulse {
    0% { transform: scale(0.95); opacity: 0.8; }
    50% { transform: scale(1.15); opacity: 0.3; }
    100% { transform: scale(0.95); opacity: 0.8; }
}

.ty-kicker {
    display: inline-flex;
    align-items: center;
    font-family: var(--font-head);
    font-size: 0.78rem;
    font-weight: 700;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    color: #065f46;
    background: #d1fae5;
    border: 1px solid rgba(16, 185, 129, 0.35);
    border-radius: 999px;
    padding: 0.3rem 0.9rem;
    margin-bottom: 0.9rem;
    z-index: 1;
    position: relative;
}

.ty-title {
    font-family: var(--font-head);
    font-weight: 800;
    font-size: clamp(1.8rem, 1.2rem + 2vw, 2.6rem);
    color: #071d3a;
    margin: 0 0 1rem;
    line-height: 1.2;
    z-index: 1;
    position: relative;
}

.ty-desc {
    max-width: 600px;
    margin: 0 auto 1.6rem;
    font-size: 1.05rem;
    line-height: 1.7;
    color: #4b5563;
    z-index: 1;
    position: relative;
}

.ty-desc strong {
    color: #071d3a;
}

.ty-prog-badge {
    display: inline-flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;
    gap: 0.4rem 0.6rem;
    background: #f0f7ff;
    border: 1px solid #bfdbfe;
    border-radius: 0.85rem;
    padding: 0.65rem 1.25rem;
    margin-bottom: 2rem;
    font-size: 0.95rem;
    color: #1e3a8a;
    z-index: 1;
    position: relative;
}

.ty-prog-badge strong {
    color: #071d3a;
}

/* Steps */
.ty-steps {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1rem;
    margin-bottom: 2.4rem;
    text-align: left;
    z-index: 1;
    position: relative;
}

.ty-step {
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 1rem;
    padding: 1.25rem 1.1rem;
    display: flex;
    flex-direction: column;
    gap: 0.65rem;
    transition: transform 0.2s ease, border-color 0.2s ease;
}

.ty-step:hover {
    transform: translateY(-2px);
    border-color: #cbd5e1;
}

.ty-step-num {
    width: 2rem;
    height: 2rem;
    border-radius: 50%;
    background: #071d3a;
    color: #ffffff;
    display: grid;
    place-items: center;
    font-weight: 700;
    font-size: 0.82rem;
}

.ty-step h4 {
    font-family: var(--font-head);
    font-size: 0.95rem;
    font-weight: 700;
    color: #071d3a;
    margin: 0 0 0.25rem;
}

.ty-step p {
    font-size: 0.85rem;
    color: #64748b;
    margin: 0;
    line-height: 1.5;
}

/* Actions */
.ty-actions {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 0.75rem 1rem;
    margin-bottom: 2rem;
    z-index: 1;
    position: relative;
}

.ty-btn-wa {
    background: #f0fdf4 !important;
    border-color: #86efac !important;
    color: #15803d !important;
}

.ty-btn-wa:hover {
    background: #dcfce7 !important;
    border-color: #4ade80 !important;
    color: #166534 !important;
}

/* Helpline Bar */
.ty-helpline {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;
    gap: 0.5rem 0.85rem;
    padding-top: 1.5rem;
    border-top: 1px solid #f1f5f9;
    font-size: 0.88rem;
    color: #64748b;
    z-index: 1;
    position: relative;
}

.ty-help-item {
    display: inline-flex;
    align-items: center;
    gap: 0.4rem;
}

.ty-help-item i {
    color: #086d79;
}

.ty-help-item a {
    color: #071d3a;
    font-weight: 600;
    text-decoration: none;
}

.ty-help-item a:hover {
    color: #086d79;
    text-decoration: underline;
}

.ty-help-sep {
    color: #cbd5e1;
}

@media (max-width: 767.98px) {
    .ty-steps {
        grid-template-columns: 1fr;
        gap: 0.75rem;
    }

    .ty-actions {
        flex-direction: column;
        width: 100%;
    }

    .ty-actions .btn {
        width: 100%;
        justify-content: center;
    }

    .ty-helpline {
        flex-direction: column;
        gap: 0.4rem;
    }

    .ty-help-sep {
        display: none;
    }
}
</style>
@endpush

