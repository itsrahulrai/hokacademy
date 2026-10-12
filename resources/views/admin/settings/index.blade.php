@extends('admin.layouts.app')

@section('title', 'Website Settings & Configuration')

@push('styles')
<style>
    /* ---- Impressive Settings Navigation Tabs ---- */
    .settings-nav-wrapper {
        background: #ffffff;
        padding: 8px;
        border-radius: 16px;
        border: 1px solid var(--admin-card-border);
        box-shadow: 0 4px 20px rgba(7, 29, 58, 0.04);
        display: flex;
        flex-wrap: wrap;
        gap: 6px;
        margin-bottom: 1.75rem;
    }

    .settings-tab-btn {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        padding: 10px 20px;
        border-radius: 12px;
        border: 1px solid transparent;
        background: transparent;
        color: #475569;
        font-weight: 600;
        font-size: 0.92rem;
        transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
        cursor: pointer;
        text-align: left;
    }

    .settings-tab-btn .tab-icon {
        width: 34px;
        height: 34px;
        border-radius: 10px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 1.05rem;
        background: rgba(7, 29, 58, 0.05);
        color: var(--hok-navy);
        transition: all 0.25s ease;
        flex-shrink: 0;
    }

    .settings-tab-btn:hover {
        background: #f8fafc;
        color: var(--hok-navy);
        transform: translateY(-1px);
    }

    .settings-tab-btn:hover .tab-icon {
        background: rgba(197, 155, 39, 0.15);
        color: var(--hok-gold-dark);
    }

    .settings-tab-btn.active {
        background: linear-gradient(135deg, var(--hok-navy-deep) 0%, var(--hok-navy) 50%, var(--hok-navy-mid) 100%);
        color: #ffffff !important;
        box-shadow: 0 6px 20px rgba(7, 29, 58, 0.22);
        border-color: rgba(212, 175, 55, 0.35);
    }

    .settings-tab-btn.active .tab-icon {
        background: var(--hok-gold-grad);
        color: var(--hok-navy-deep);
        box-shadow: 0 2px 10px rgba(197, 155, 39, 0.4);
    }

    /* ---- Card Section Headers ---- */
    .sec-badge-icon {
        width: 44px;
        height: 44px;
        border-radius: 12px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 1.35rem;
        background: rgba(7, 29, 58, 0.06);
        color: var(--hok-navy);
        border: 1px solid rgba(7, 29, 58, 0.08);
    }

    /* ---- Asset Upload Preview Box ---- */
    .asset-preview-card {
        background: #f8fafc;
        border: 1px dashed #cbd5e1;
        border-radius: 14px;
        padding: 16px;
        transition: all 0.2s ease;
    }
    .asset-preview-card:hover {
        border-color: var(--hok-gold);
        background: #ffffff;
    }
    .asset-img-frame {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        padding: 8px 14px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 56px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
    }

    /* ---- Input Enhancements ---- */
    .form-control-elevated {
        border-radius: 10px;
        border: 1px solid #e2e8f0;
        padding: 0.65rem 0.95rem;
        font-size: 0.92rem;
        transition: all 0.2s ease;
    }
    .form-control-elevated:focus {
        border-color: var(--hok-navy-light);
        box-shadow: 0 0 0 3px rgba(22, 64, 116, 0.12);
    }

    .input-group-text-custom {
        background: #f8fafc;
        border-color: #e2e8f0;
        color: #64748b;
        font-size: 1.05rem;
        border-top-left-radius: 10px;
        border-bottom-left-radius: 10px;
        padding-left: 14px;
        padding-right: 14px;
    }

    /* ---- Code / Script Textareas ---- */
    .code-editor-box {
        background: #09121f;
        color: #7dd3fc;
        font-family: 'SFMono-Regular', Consolas, 'Liberation Mono', Menlo, monospace;
        font-size: 0.85rem;
        line-height: 1.6;
        border: 1px solid #1e293b;
        border-radius: 12px;
        padding: 14px;
        transition: all 0.2s ease;
    }
    .code-editor-box:focus {
        background: #050b14;
        color: #38bdf8;
        border-color: #0284c7;
        box-shadow: 0 0 0 3px rgba(2, 132, 199, 0.2);
    }

    /* ---- Save Floating / Bottom Bar ---- */
    .settings-action-bar {
        background: #ffffff;
        border: 1px solid var(--admin-card-border);
        border-radius: 16px;
        padding: 1rem 1.5rem;
        box-shadow: 0 8px 30px rgba(7, 29, 58, 0.08);
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        position: sticky;
        bottom: 20px;
        z-index: 900;
        backdrop-filter: blur(8px);
    }
</style>
@endpush

@section('content')
<!-- Page Header -->
<div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
    <div>
        <div class="d-flex align-items-center gap-2 mb-1">
            <span class="badge bg-white text-dark border px-2.5 py-1.5 rounded-pill shadow-sm">
                <i class="bi bi-gear-wide-connected text-primary me-1"></i> Core Setup
            </span>
            <span class="badge bg-success-subtle text-success border border-success-subtle px-2.5 py-1.5 rounded-pill">
                <i class="bi bi-check2-circle me-1"></i> Synchronized
            </span>
        </div>
        <h2 class="h4 fw-bold mb-1 text-navy" style="color: var(--hok-navy);">Website Settings &amp; Global Configuration</h2>
        <p class="text-muted small mb-0">Control contact details, branding, logos, social links, headers, footers and custom tracking scripts.</p>
    </div>
</div>

<form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- Impressive Segmented Tabs Bar -->
    <div class="settings-nav-wrapper nav nav-pills" id="settingsTabs" role="tablist">
        <button class="settings-tab-btn active" id="general-tab" data-bs-toggle="pill" data-bs-target="#general" type="button" role="tab" aria-selected="true">
            <span class="tab-icon"><i class="bi bi-sliders"></i></span>
            <span>
                <span class="d-block lh-1">General &amp; Branding</span>
                <small class="text-muted d-none d-lg-inline" style="font-size: 0.72rem; opacity: 0.85;">Identity &amp; Logos</small>
            </span>
        </button>

        <button class="settings-tab-btn" id="contact-tab" data-bs-toggle="pill" data-bs-target="#contact" type="button" role="tab" aria-selected="false">
            <span class="tab-icon"><i class="bi bi-geo-alt"></i></span>
            <span>
                <span class="d-block lh-1">Contact &amp; Location</span>
                <small class="text-muted d-none d-lg-inline" style="font-size: 0.72rem; opacity: 0.85;">Phones, Email, Address</small>
            </span>
        </button>

        <button class="settings-tab-btn" id="headerfooter-tab" data-bs-toggle="pill" data-bs-target="#headerfooter" type="button" role="tab" aria-selected="false">
            <span class="tab-icon"><i class="bi bi-layout-text-window-reverse"></i></span>
            <span>
                <span class="d-block lh-1">Header &amp; Footer</span>
                <small class="text-muted d-none d-lg-inline" style="font-size: 0.72rem; opacity: 0.85;">CTA, Badges, Copyright</small>
            </span>
        </button>

        <button class="settings-tab-btn" id="social-tab" data-bs-toggle="pill" data-bs-target="#social" type="button" role="tab" aria-selected="false">
            <span class="tab-icon"><i class="bi bi-share"></i></span>
            <span>
                <span class="d-block lh-1">Social Media</span>
                <small class="text-muted d-none d-lg-inline" style="font-size: 0.72rem; opacity: 0.85;">Official Social Profiles</small>
            </span>
        </button>

        <button class="settings-tab-btn" id="scripts-tab" data-bs-toggle="pill" data-bs-target="#scripts" type="button" role="tab" aria-selected="false">
            <span class="tab-icon"><i class="bi bi-code-slash"></i></span>
            <span>
                <span class="d-block lh-1">Custom Scripts &amp; Analytics</span>
                <small class="text-muted d-none d-lg-inline" style="font-size: 0.72rem; opacity: 0.85;">GTM, Meta Pixel, Chat</small>
            </span>
        </button>
    </div>

    <!-- Tab Contents -->
    <div class="tab-content" id="settingsTabContent">
        
        <!-- 1. GENERAL & BRANDING -->
        <div class="tab-pane fade show active" id="general" role="tabpanel">
            <div class="card card-custom p-4 mb-4">
                <div class="d-flex align-items-center justify-content-between pb-3 mb-4 border-bottom flex-wrap gap-2">
                    <div class="d-flex align-items-center gap-3">
                        <div class="sec-badge-icon">
                            <i class="bi bi-patch-check-fill text-primary"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-0" style="color: var(--hok-navy);">General &amp; Branding</h5>
                            <p class="text-muted small mb-0">Manage core site identity, title, tagline and official brand marks.</p>
                        </div>
                    </div>
                    <span class="badge bg-light text-dark border px-3 py-2 rounded-pill small">
                        <i class="bi bi-image me-1 text-primary"></i>Brand Identity
                    </span>
                </div>

                <div class="row g-4">
                    <div class="col-md-6">
                        <label class="form-label small fw-semibold">Website Title <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text input-group-text-custom"><i class="bi bi-globe2"></i></span>
                            <input type="text" name="site_title" class="form-control form-control-elevated" value="{{ \App\Models\Setting::get('site_title') }}" placeholder="e.g. HOK Academy | International Medical Excellence" required>
                        </div>
                        <small class="text-muted" style="font-size: 0.78rem;">Displayed on browser tab titles and primary search engine results.</small>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label small fw-semibold">Site Tagline</label>
                        <div class="input-group">
                            <span class="input-group-text input-group-text-custom"><i class="bi bi-quote"></i></span>
                            <input type="text" name="site_tagline" class="form-control form-control-elevated" value="{{ \App\Models\Setting::get('site_tagline') }}" placeholder="e.g. International Academy of Medical Excellence">
                        </div>
                        <small class="text-muted" style="font-size: 0.78rem;">Subtitle displayed alongside academy branding across global headers.</small>
                    </div>

                    <!-- Logo Upload Box -->
                    <div class="col-md-6">
                        <label class="form-label small fw-semibold">Main Website Logo</label>
                        <div class="asset-preview-card">
                            <div class="d-flex align-items-center justify-content-between mb-3 flex-wrap gap-2">
                                <span class="badge bg-white text-secondary border px-2.5 py-1 rounded-pill small">
                                    <i class="bi bi-eye me-1 text-success"></i>Current Site Logo
                                </span>
                                <span class="text-muted small" style="font-size: 0.75rem;">Recommended: PNG/SVG transparent (height: 50-70px)</span>
                            </div>
                            <div class="d-flex align-items-center gap-3 mb-3">
                                <div class="asset-img-frame">
                                    <img src="{{ asset(\App\Models\Setting::get('site_logo', 'assets/img/logo.jpg')) }}" alt="Logo" style="height: 48px; max-width: 180px; object-fit: contain;">
                                </div>
                            </div>
                            <input type="file" name="site_logo" class="form-control form-control-sm" accept="image/*">
                        </div>
                    </div>

                    <!-- Favicon Upload Box -->
                    <div class="col-md-6">
                        <label class="form-label small fw-semibold">Browser Favicon</label>
                        <div class="asset-preview-card">
                            <div class="d-flex align-items-center justify-content-between mb-3 flex-wrap gap-2">
                                <span class="badge bg-white text-secondary border px-2.5 py-1 rounded-pill small">
                                    <i class="bi bi-app me-1 text-warning"></i>Current Favicon
                                </span>
                                <span class="text-muted small" style="font-size: 0.75rem;">Recommended: Square PNG / ICO (32x32 or 64x64)</span>
                            </div>
                            <div class="d-flex align-items-center gap-3 mb-3">
                                <div class="asset-img-frame">
                                    <img src="{{ asset(\App\Models\Setting::get('site_favicon', 'assets/img/logo.jpg')) }}" alt="Favicon" style="height: 36px; width: 36px; object-fit: contain;">
                                </div>
                            </div>
                            <input type="file" name="site_favicon" class="form-control form-control-sm" accept="image/*">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 2. CONTACT & LOCATION -->
        <div class="tab-pane fade" id="contact" role="tabpanel">
            <div class="card card-custom p-4 mb-4">
                <div class="d-flex align-items-center justify-content-between pb-3 mb-4 border-bottom flex-wrap gap-2">
                    <div class="d-flex align-items-center gap-3">
                        <div class="sec-badge-icon" style="color: var(--hok-emerald);">
                            <i class="bi bi-telephone-inbound-fill"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-0" style="color: var(--hok-navy);">Contact Information &amp; Office Hours</h5>
                            <p class="text-muted small mb-0">Public phone numbers, WhatsApp link, inquiry inbox and physical campus address.</p>
                        </div>
                    </div>
                    <span class="badge bg-light text-dark border px-3 py-2 rounded-pill small">
                        <i class="bi bi-clock-history me-1 text-info"></i>Live Inquiries
                    </span>
                </div>

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label small fw-semibold">Display Phone Number</label>
                        <div class="input-group">
                            <span class="input-group-text input-group-text-custom"><i class="bi bi-telephone text-primary"></i></span>
                            <input type="text" name="contact_phone" class="form-control form-control-elevated" value="{{ \App\Models\Setting::get('contact_phone') }}" placeholder="e.g. +91 98765 43210">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label small fw-semibold">Raw Phone Number (for tel: click-to-call link)</label>
                        <div class="input-group">
                            <span class="input-group-text input-group-text-custom"><i class="bi bi-telephone-outbound text-secondary"></i></span>
                            <input type="text" name="contact_phone_raw" class="form-control form-control-elevated" value="{{ \App\Models\Setting::get('contact_phone_raw') }}" placeholder="e.g. +919876543210 (digits only with +)">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label small fw-semibold">WhatsApp Number (with country code)</label>
                        <div class="input-group">
                            <span class="input-group-text input-group-text-custom"><i class="bi bi-whatsapp text-success"></i></span>
                            <input type="text" name="contact_whatsapp" class="form-control form-control-elevated" value="{{ \App\Models\Setting::get('contact_whatsapp') }}" placeholder="e.g. +919876543210">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label small fw-semibold">Official Email Address</label>
                        <div class="input-group">
                            <span class="input-group-text input-group-text-custom"><i class="bi bi-envelope-at text-danger"></i></span>
                            <input type="email" name="contact_email" class="form-control form-control-elevated" value="{{ \App\Models\Setting::get('contact_email') }}" placeholder="e.g. admissions@hokacademy.com">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label small fw-semibold">Office Hours / Admissions Window</label>
                        <div class="input-group">
                            <span class="input-group-text input-group-text-custom"><i class="bi bi-clock text-warning"></i></span>
                            <input type="text" name="office_hours" class="form-control form-control-elevated" value="{{ \App\Models\Setting::get('office_hours') }}" placeholder="e.g. Mon – Sat: 9:00 AM – 6:30 PM IST">
                        </div>
                    </div>

                    <div class="col-12">
                        <label class="form-label small fw-semibold">Physical Academy Campus Address</label>
                        <div class="input-group">
                            <span class="input-group-text input-group-text-custom align-items-start pt-2"><i class="bi bi-building"></i></span>
                            <textarea name="contact_address" class="form-control form-control-elevated" rows="3" placeholder="Full physical clinic / academy address with postal code...">{{ \App\Models\Setting::get('contact_address') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 3. HEADER & FOOTER -->
        <div class="tab-pane fade" id="headerfooter" role="tabpanel">
            <div class="card card-custom p-4 mb-4">
                <div class="d-flex align-items-center justify-content-between pb-3 mb-4 border-bottom flex-wrap gap-2">
                    <div class="d-flex align-items-center gap-3">
                        <div class="sec-badge-icon" style="color: var(--hok-gold-dark);">
                            <i class="bi bi-layout-sidebar-inset-reverse"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-0" style="color: var(--hok-navy);">Header &amp; Footer Elements</h5>
                            <p class="text-muted small mb-0">Control the top notification chip, global CTA buttons and bottom footer text.</p>
                        </div>
                    </div>
                    <span class="badge bg-light text-dark border px-3 py-2 rounded-pill small">
                        <i class="bi bi-ui-radios-grid me-1 text-warning"></i>Layout Controls
                    </span>
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-12">
                        <h6 class="fw-bold text-muted small text-uppercase mb-2"><i class="bi bi-arrow-up-circle me-1"></i> Topbar Notice Badge</h6>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-semibold">Topbar Chip Text</label>
                        <input type="text" name="topbar_badge_text" class="form-control form-control-elevated" value="{{ \App\Models\Setting::get('topbar_badge_text') }}" placeholder="e.g. Admissions Open For Next Fellowship Batch">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-semibold">Topbar Chip Link (URL)</label>
                        <input type="text" name="topbar_badge_link" class="form-control form-control-elevated" value="{{ \App\Models\Setting::get('topbar_badge_link') }}" placeholder="e.g. /programs">
                    </div>

                    <div class="col-12 mt-4">
                        <h6 class="fw-bold text-muted small text-uppercase mb-2"><i class="bi bi-hand-index-thumb me-1"></i> Navigation Main CTA Button</h6>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-semibold">Header CTA Button Text</label>
                        <input type="text" name="header_cta_text" class="form-control form-control-elevated" value="{{ \App\Models\Setting::get('header_cta_text') }}" placeholder="e.g. Enroll Now / Contact Us">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-semibold">Header CTA Button Link (URL)</label>
                        <input type="text" name="header_cta_link" class="form-control form-control-elevated" value="{{ \App\Models\Setting::get('header_cta_link') }}" placeholder="e.g. /contact-us">
                    </div>
                </div>

                <div class="border-top pt-4">
                    <h6 class="fw-bold text-muted small text-uppercase mb-3"><i class="bi bi-arrow-down-circle me-1"></i> Footer Copyright &amp; About</h6>
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label small fw-semibold">Footer About / Tagline Paragraph</label>
                            <textarea name="footer_about_text" class="form-control form-control-elevated" rows="3" placeholder="Brief 2-3 line summary about HOK Academy rendered in the footer...">{{ \App\Models\Setting::get('footer_about_text') }}</textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-semibold">Copyright Text</label>
                            <input type="text" name="footer_copyright" class="form-control form-control-elevated" value="{{ \App\Models\Setting::get('footer_copyright') }}" placeholder="e.g. © 2026 HOK Academy. International Academy of Medical Excellence. All Rights Reserved.">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 4. SOCIAL MEDIA -->
        <div class="tab-pane fade" id="social" role="tabpanel">
            <div class="card card-custom p-4 mb-4">
                <div class="d-flex align-items-center justify-content-between pb-3 mb-4 border-bottom flex-wrap gap-2">
                    <div class="d-flex align-items-center gap-3">
                        <div class="sec-badge-icon" style="color: #0284c7;">
                            <i class="bi bi-share-fill"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-0" style="color: var(--hok-navy);">Official Social Media Profiles</h5>
                            <p class="text-muted small mb-0">Direct links to official academy profiles displayed in headers, footers and contact pages.</p>
                        </div>
                    </div>
                    <span class="badge bg-light text-dark border px-3 py-2 rounded-pill small">
                        <i class="bi bi-link-45deg me-1 text-primary"></i>Social Channels
                    </span>
                </div>

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label small fw-semibold">Facebook Page URL</label>
                        <div class="input-group">
                            <span class="input-group-text input-group-text-custom text-white" style="background: #1877f2; border-color: #1877f2;"><i class="bi bi-facebook"></i></span>
                            <input type="url" name="social_facebook" class="form-control form-control-elevated" value="{{ \App\Models\Setting::get('social_facebook') }}" placeholder="https://facebook.com/hokacademy">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label small fw-semibold">Instagram Profile URL</label>
                        <div class="input-group">
                            <span class="input-group-text input-group-text-custom text-white" style="background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888); border-color: #dc2743;"><i class="bi bi-instagram"></i></span>
                            <input type="url" name="social_instagram" class="form-control form-control-elevated" value="{{ \App\Models\Setting::get('social_instagram') }}" placeholder="https://instagram.com/hokacademy">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label small fw-semibold">LinkedIn Organization URL</label>
                        <div class="input-group">
                            <span class="input-group-text input-group-text-custom text-white" style="background: #0a66c2; border-color: #0a66c2;"><i class="bi bi-linkedin"></i></span>
                            <input type="url" name="social_linkedin" class="form-control form-control-elevated" value="{{ \App\Models\Setting::get('social_linkedin') }}" placeholder="https://linkedin.com/company/hokacademy">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label small fw-semibold">YouTube Channel URL</label>
                        <div class="input-group">
                            <span class="input-group-text input-group-text-custom text-white" style="background: #ff0000; border-color: #ff0000;"><i class="bi bi-youtube"></i></span>
                            <input type="url" name="social_youtube" class="form-control form-control-elevated" value="{{ \App\Models\Setting::get('social_youtube') }}" placeholder="https://youtube.com/@hokacademy">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label small fw-semibold">Twitter / X Profile URL</label>
                        <div class="input-group">
                            <span class="input-group-text input-group-text-custom text-white" style="background: #0f1419; border-color: #0f1419;"><i class="bi bi-twitter-x"></i></span>
                            <input type="url" name="social_twitter" class="form-control form-control-elevated" value="{{ \App\Models\Setting::get('social_twitter') }}" placeholder="https://x.com/hokacademy">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 5. SCRIPTS & ANALYTICS -->
        <div class="tab-pane fade" id="scripts" role="tabpanel">
            <div class="card card-custom p-4 mb-4">
                <div class="d-flex align-items-center justify-content-between pb-3 mb-4 border-bottom flex-wrap gap-2">
                    <div class="d-flex align-items-center gap-3">
                        <div class="sec-badge-icon" style="color: #6366f1;">
                            <i class="bi bi-code-square"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-0" style="color: var(--hok-navy);">Custom Head &amp; Footer Code Snippets</h5>
                            <p class="text-muted small mb-0">Inject Google Tag Manager, Google Analytics 4, Meta Pixel and live chat widgets directly.</p>
                        </div>
                    </div>
                    <span class="badge bg-dark text-white px-3 py-2 rounded-pill small">
                        <i class="bi bi-terminal me-1 text-warning"></i>Raw Embeds
                    </span>
                </div>

                <div class="row g-4">
                    <div class="col-12">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <label class="form-label small fw-semibold mb-0">
                                <i class="bi bi-chevron-bar-up text-primary me-1"></i> Header Tracking Code (&lt;head&gt; section)
                            </label>
                            <span class="badge bg-light text-muted border" style="font-size: 0.72rem;">Inserted before &lt;/head&gt;</span>
                        </div>
                        <textarea name="custom_head_scripts" class="form-control code-editor-box" rows="7" placeholder="<!-- Example: Google Tag Manager (GTM) or Google Analytics tracking code -->">{{ \App\Models\Setting::get('custom_head_scripts') }}</textarea>
                        <small class="text-muted mt-1 d-block" style="font-size: 0.78rem;">Supports <code>&lt;script&gt;</code>, <code>&lt;meta&gt;</code>, and <code>&lt;link&gt;</code> tags. Executed on every public page.</small>
                    </div>

                    <div class="col-12">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <label class="form-label small fw-semibold mb-0">
                                <i class="bi bi-chevron-bar-down text-success me-1"></i> Footer Custom Scripts (before &lt;/body&gt;)
                            </label>
                            <span class="badge bg-light text-muted border" style="font-size: 0.72rem;">Inserted before &lt;/body&gt;</span>
                        </div>
                        <textarea name="custom_footer_scripts" class="form-control code-editor-box" rows="7" placeholder="<!-- Example: WhatsApp floating widget or live chat scripts -->">{{ \App\Models\Setting::get('custom_footer_scripts') }}</textarea>
                        <small class="text-muted mt-1 d-block" style="font-size: 0.78rem;">Ideal for customer support widgets, custom analytics events, or conversion pixels.</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sticky Floating Save Bar -->
    <div class="settings-action-bar mb-5">
        <div class="d-flex align-items-center gap-2">
            <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2 rounded-pill small">
                <i class="bi bi-shield-check me-1"></i> Ready to Save
            </span>
            <span class="text-muted small d-none d-md-inline">Any modified setting will immediately take effect across the entire academy website.</span>
        </div>
        <div class="d-flex align-items-center gap-2">
            <button type="reset" class="btn btn-outline-secondary px-3" onclick="return confirm('Reset all unsaved changes?')">
                <i class="bi bi-arrow-counterclockwise me-1"></i> Discard
            </button>
            <button type="submit" class="btn btn-hok-admin btn-lg px-4 shadow-sm" style="background: var(--hok-gold-grad); color: var(--hok-navy-deep); font-weight: 700; border: none;">
                <i class="bi bi-floppy-fill me-1"></i> Save All Settings
            </button>
        </div>
    </div>
</form>
@endsection
