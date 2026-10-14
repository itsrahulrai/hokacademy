@extends('admin.layouts.app')

@section('title', 'Website Settings & Configuration')

@push('styles')
<style>
    /* ---- Vertical Settings Navigation Tabs (Left Sidebar) ---- */
    .settings-nav-vertical {
        background: #ffffff;
        padding: 10px;
        border-radius: 16px;
        border: 1px solid var(--admin-card-border);
        box-shadow: 0 4px 20px rgba(7, 29, 58, 0.04);
        display: flex;
        flex-direction: column;
        gap: 6px;
    }

    .settings-tab-btn-vertical {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 14px;
        border-radius: 12px;
        border: 1px solid transparent;
        background: transparent;
        color: #475569;
        font-weight: 600;
        font-size: 0.9rem;
        transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
        cursor: pointer;
        text-align: left;
        width: 100%;
        text-decoration: none;
    }

    .settings-tab-btn-vertical .tab-icon {
        width: 36px;
        height: 36px;
        border-radius: 10px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 1.1rem;
        background: rgba(7, 29, 58, 0.05);
        color: var(--hok-navy);
        transition: all 0.25s ease;
        flex-shrink: 0;
    }

    .settings-tab-btn-vertical:hover {
        background: #f8fafc;
        color: var(--hok-navy);
        transform: translateX(3px);
    }

    .settings-tab-btn-vertical:hover .tab-icon {
        background: rgba(197, 155, 39, 0.15);
        color: var(--hok-gold-dark);
    }

    .settings-tab-btn-vertical.active {
        background: linear-gradient(135deg, var(--hok-navy-deep) 0%, var(--hok-navy) 50%, var(--hok-navy-mid) 100%);
        color: #ffffff !important;
        box-shadow: 0 6px 20px rgba(7, 29, 58, 0.22);
        border-color: rgba(212, 175, 55, 0.35);
    }

    .settings-tab-btn-vertical.active .tab-icon {
        background: var(--hok-gold-grad);
        color: var(--hok-navy-deep);
        box-shadow: 0 2px 10px rgba(197, 155, 39, 0.4);
    }

    .settings-tab-btn-vertical.active small {
        color: rgba(255, 255, 255, 0.8) !important;
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

    <div class="row g-4 mb-4">
        <!-- Left Column: Settings Category Tabs (Vertical Sidebar) -->
        <div class="col-lg-4 col-xl-3">
            <div class="settings-sidebar-wrapper sticky-top" style="top: 85px; z-index: 10;">
                <div class="settings-nav-vertical nav nav-pills flex-column" id="settingsTabs" role="tablist">
                    <button class="settings-tab-btn-vertical active" id="general-tab" data-bs-toggle="pill" data-bs-target="#general" type="button" role="tab" aria-selected="true">
                        <span class="tab-icon"><i class="bi bi-sliders"></i></span>
                        <span>
                            <span class="d-block lh-1">General &amp; Branding</span>
                            <small class="text-muted d-block mt-1" style="font-size: 0.72rem;">Identity &amp; Logos</small>
                        </span>
                    </button>

                    <button class="settings-tab-btn-vertical" id="contact-tab" data-bs-toggle="pill" data-bs-target="#contact" type="button" role="tab" aria-selected="false">
                        <span class="tab-icon"><i class="bi bi-geo-alt"></i></span>
                        <span>
                            <span class="d-block lh-1">Contact &amp; Location</span>
                            <small class="text-muted d-block mt-1" style="font-size: 0.72rem;">Phones, Email, Address</small>
                        </span>
                    </button>

                    <button class="settings-tab-btn-vertical" id="headerfooter-tab" data-bs-toggle="pill" data-bs-target="#headerfooter" type="button" role="tab" aria-selected="false">
                        <span class="tab-icon"><i class="bi bi-layout-text-window-reverse"></i></span>
                        <span>
                            <span class="d-block lh-1">Header &amp; Footer</span>
                            <small class="text-muted d-block mt-1" style="font-size: 0.72rem;">CTA, Badges, Copyright</small>
                        </span>
                    </button>

                    <button class="settings-tab-btn-vertical" id="social-tab" data-bs-toggle="pill" data-bs-target="#social" type="button" role="tab" aria-selected="false">
                        <span class="tab-icon"><i class="bi bi-share"></i></span>
                        <span>
                            <span class="d-block lh-1">Social Media</span>
                            <small class="text-muted d-block mt-1" style="font-size: 0.72rem;">Official Profiles</small>
                        </span>
                    </button>

                    <button class="settings-tab-btn-vertical" id="smtp-tab" data-bs-toggle="pill" data-bs-target="#smtp" type="button" role="tab" aria-selected="false">
                        <span class="tab-icon"><i class="bi bi-envelope-at"></i></span>
                        <span>
                            <span class="d-block lh-1">Email &amp; SMTP</span>
                            <small class="text-muted d-block mt-1" style="font-size: 0.72rem;">Outgoing Mail &amp; AI</small>
                        </span>
                    </button>

                    <button class="settings-tab-btn-vertical" id="scripts-tab" data-bs-toggle="pill" data-bs-target="#scripts" type="button" role="tab" aria-selected="false">
                        <span class="tab-icon"><i class="bi bi-code-slash"></i></span>
                        <span>
                            <span class="d-block lh-1">Custom Scripts &amp; Analytics</span>
                            <small class="text-muted d-block mt-1" style="font-size: 0.72rem;">GTM, Meta Pixel, Chat</small>
                        </span>
                    </button>
                </div>

                <div class="mt-3 p-3 rounded-3 bg-white border shadow-2xs d-none d-lg-block" style="border-radius: 14px;">
                    <div class="d-flex align-items-center gap-2 mb-1.5">
                        <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-2 py-0.5" style="font-size: 0.72rem;">
                            <i class="bi bi-shield-check me-1"></i> Live Auto-Sync
                        </span>
                    </div>
                    <p class="small text-muted mb-0" style="font-size: 0.76rem; line-height: 1.5;">
                        Changes saved here apply immediately across all frontend pages, footers, headers, and forms.
                    </p>
                </div>
            </div>
        </div>

        <!-- Right Column: Content Panels & Forms -->
        <div class="col-lg-8 col-xl-9">
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

        <!-- 5. EMAIL & SMTP CONFIGURATION -->
        <div class="tab-pane fade" id="smtp" role="tabpanel">
            <div class="card card-custom p-4 mb-4">
                <div class="d-flex align-items-center justify-content-between pb-3 mb-4 border-bottom flex-wrap gap-2">
                    <div class="d-flex align-items-center gap-3">
                        <div class="sec-badge-icon" style="color: #0d6efd;">
                            <i class="bi bi-envelope-at-fill"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-0" style="color: var(--hok-navy);">Email &amp; SMTP Configuration</h5>
                            <p class="text-muted small mb-0">Configure your outgoing email server to send direct inquiry replies directly from the dashboard.</p>
                        </div>
                    </div>
                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-3 py-2 rounded-pill small">
                        <i class="bi bi-send-check me-1"></i>Direct Mail Engine
                    </span>
                </div>

                <div class="alert alert-info border-0 rounded-3 d-flex align-items-start gap-3 p-3 mb-4" style="background: rgba(13, 110, 253, 0.08);">
                    <i class="bi bi-info-circle-fill text-primary fs-5 mt-1 flex-shrink-0"></i>
                    <div class="small">
                        <strong>SMTP Outgoing Setup:</strong> Once configured, all replies you write in the <em>Inquiries Dashboard</em> are delivered directly to the inquirer's inbox via this SMTP server. If left blank, local environment defaults will be used safely.
                    </div>
                </div>

                <div class="row g-4 mb-4">
                    <div class="col-md-4">
                        <label class="form-label small fw-semibold">Mail Protocol / Driver</label>
                        <select name="smtp_mailer" class="form-select form-control-elevated">
                            @php $mailerVal = \App\Models\Setting::get('smtp_mailer', 'smtp'); @endphp
                            <option value="smtp" {{ $mailerVal === 'smtp' ? 'selected' : '' }}>SMTP (Recommended)</option>
                            <option value="sendmail" {{ $mailerVal === 'sendmail' ? 'selected' : '' }}>Sendmail</option>
                            <option value="log" {{ $mailerVal === 'log' ? 'selected' : '' }}>Log (Debug / Local File)</option>
                        </select>
                        <small class="text-muted" style="font-size: 0.75rem;">Select 'SMTP' for live outbound delivery.</small>
                    </div>

                    <div class="col-md-5">
                        <label class="form-label small fw-semibold">SMTP Host / Server <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text input-group-text-custom"><i class="bi bi-server"></i></span>
                            <input type="text" name="smtp_host" class="form-control form-control-elevated" value="{{ \App\Models\Setting::get('smtp_host', config('mail.mailers.smtp.host')) }}" placeholder="e.g. smtp.gmail.com or mail.hokacademy.com">
                        </div>
                        <small class="text-muted" style="font-size: 0.75rem;">Your SMTP mail server address.</small>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label small fw-semibold">SMTP Port <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text input-group-text-custom"><i class="bi bi-hash"></i></span>
                            <input type="number" name="smtp_port" class="form-control form-control-elevated" value="{{ \App\Models\Setting::get('smtp_port', config('mail.mailers.smtp.port', 587)) }}" placeholder="587">
                        </div>
                        <small class="text-muted" style="font-size: 0.75rem;">Common: 587 (TLS), 465 (SSL), 25.</small>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label small fw-semibold">Encryption</label>
                        <select name="smtp_encryption" class="form-select form-control-elevated">
                            @php $encVal = \App\Models\Setting::get('smtp_encryption', config('mail.mailers.smtp.encryption', 'tls')); @endphp
                            <option value="tls" {{ $encVal === 'tls' ? 'selected' : '' }}>TLS (Port 587 - Standard)</option>
                            <option value="ssl" {{ $encVal === 'ssl' ? 'selected' : '' }}>SSL (Port 465)</option>
                            <option value="none" {{ $encVal === 'none' ? 'selected' : '' }}>None (Unencrypted)</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label small fw-semibold">SMTP Username / Email <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text input-group-text-custom"><i class="bi bi-person"></i></span>
                            <input type="text" name="smtp_username" class="form-control form-control-elevated" value="{{ \App\Models\Setting::get('smtp_username', config('mail.mailers.smtp.username')) }}" placeholder="user@hokacademy.com">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label small fw-semibold">SMTP Password / App Password <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text input-group-text-custom"><i class="bi bi-key"></i></span>
                            <input type="password" id="smtpPasswordField" name="smtp_password" class="form-control form-control-elevated" value="{{ \App\Models\Setting::get('smtp_password', config('mail.mailers.smtp.password')) }}" placeholder="••••••••••••">
                            <button type="button" class="btn btn-outline-secondary" onclick="togglePasswordVisibility('smtpPasswordField')">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                        <small class="text-muted" style="font-size: 0.75rem;">For Gmail, generate an 'App Password'.</small>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label small fw-semibold">Sender Email (From Address)</label>
                        <div class="input-group">
                            <span class="input-group-text input-group-text-custom"><i class="bi bi-envelope"></i></span>
                            <input type="email" name="smtp_from_address" class="form-control form-control-elevated" value="{{ \App\Models\Setting::get('smtp_from_address', \App\Models\Setting::get('contact_email', config('mail.from.address', 'hokacademy@yahoo.com'))) }}" placeholder="hokacademy@yahoo.com">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label small fw-semibold">Sender Display Name</label>
                        <div class="input-group">
                            <span class="input-group-text input-group-text-custom"><i class="bi bi-tag"></i></span>
                            <input type="text" name="smtp_from_name" class="form-control form-control-elevated" value="{{ \App\Models\Setting::get('smtp_from_name', \App\Models\Setting::get('site_title', config('mail.from.name', 'HOK Academy'))) }}" placeholder="HOK Academy">
                        </div>
                    </div>
                </div>

                <!-- Live Test Email Box -->
                <div class="p-3 rounded-3 border bg-light-subtle mt-2">
                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-2">
                        <h6 class="fw-bold mb-0 text-dark">
                            <i class="bi bi-lightning-charge-fill text-warning me-1"></i> Send Test Verification Email
                        </h6>
                        <span class="small text-muted">Verify your SMTP credentials before replying to inquiries</span>
                    </div>
                    <div class="row g-2 align-items-center">
                        <div class="col-md-8">
                            <div class="input-group">
                                <span class="input-group-text bg-white"><i class="bi bi-send text-muted"></i></span>
                                <input type="email" id="testEmailRecipient" class="form-control" placeholder="Enter test recipient email (e.g. your email address)..." value="{{ \App\Models\Setting::get('contact_email', 'hokacademy@yahoo.com') }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <button type="button" class="btn btn-outline-primary w-100 fw-semibold" id="btnSendTestEmail" onclick="sendTestEmailAjax()">
                                <i class="bi bi-send me-1"></i> Send Test Email Now
                            </button>
                        </div>
                    </div>
                    <div id="testEmailStatusAlert" class="mt-2" style="display: none;"></div>
                </div>

                <!-- AI Assistant API Key Configuration -->
                <div class="p-3 rounded-3 border bg-light-subtle mt-4">
                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-2">
                        <div class="d-flex align-items-center gap-2">
                            <span class="badge rounded-pill px-2.5 py-1 text-dark" style="background: var(--hok-gold-grad); font-weight: 700;">
                                <i class="bi bi-stars me-1 text-dark"></i> AI Email Assistant
                            </span>
                            <h6 class="fw-bold mb-0 text-dark">Google Gemini API Key (Optional)</h6>
                        </div>
                        <a href="https://aistudio.google.com/app/apikey" target="_blank" class="small text-primary text-decoration-none fw-semibold">
                            <i class="bi bi-box-arrow-up-right me-1"></i> Get Free Key from Google AI Studio
                        </a>
                    </div>
                    <p class="text-muted small mb-2">
                        Power 1-click generative AI email replies in the Inquiries dashboard with Google Gemini. If left blank, HOK Academy's built-in smart AI engine will generate contextual replies automatically with zero setup.
                    </p>
                    <div class="input-group">
                        <span class="input-group-text bg-white"><i class="bi bi-key-fill text-warning"></i></span>
                        <input type="password" id="geminiApiKeyField" name="gemini_api_key" class="form-control" placeholder="AIzaSy..." value="{{ \App\Models\Setting::get('gemini_api_key') }}">
                        <button type="button" class="btn btn-outline-secondary" onclick="togglePasswordVisibility('geminiApiKeyField')">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- 6. SCRIPTS & ANALYTICS -->
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

@push('scripts')
<script>
function togglePasswordVisibility(fieldId) {
    const field = document.getElementById(fieldId);
    if (!field) return;
    if (field.type === 'password') {
        field.type = 'text';
    } else {
        field.type = 'password';
    }
}

function sendTestEmailAjax() {
    const emailInput = document.getElementById('testEmailRecipient');
    const alertBox = document.getElementById('testEmailStatusAlert');
    const sendBtn = document.getElementById('btnSendTestEmail');

    if (!emailInput || !emailInput.value.trim()) {
        alert('Please enter a recipient email address for testing.');
        return;
    }

    const recipient = emailInput.value.trim();
    sendBtn.disabled = true;
    sendBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span> Sending Test Email...';
    alertBox.style.display = 'block';
    alertBox.className = 'alert alert-info py-2 px-3 small mb-0 mt-2';
    alertBox.innerHTML = '<i class="bi bi-hourglass-split me-1"></i> Connecting to SMTP server and transmitting test email...';

    fetch("{{ route('admin.settings.test-email') }}", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json'
        },
        body: JSON.stringify({ test_email: recipient })
    })
    .then(async response => {
        const data = await response.json();
        if (response.ok && data.success) {
            alertBox.className = 'alert alert-success py-2 px-3 small mb-0 mt-2';
            alertBox.innerHTML = '<i class="bi bi-check-circle-fill me-1"></i> ' + (data.message || 'Test email sent successfully!');
        } else {
            alertBox.className = 'alert alert-danger py-2 px-3 small mb-0 mt-2';
            alertBox.innerHTML = '<i class="bi bi-exclamation-triangle-fill me-1"></i> ' + (data.message || 'Failed to send test email.');
        }
    })
    .catch(err => {
        alertBox.className = 'alert alert-danger py-2 px-3 small mb-0 mt-2';
        alertBox.innerHTML = '<i class="bi bi-exclamation-triangle-fill me-1"></i> Network or server error: ' + err.message;
    })
    .finally(() => {
        sendBtn.disabled = false;
        sendBtn.innerHTML = '<i class="bi bi-send me-1"></i> Send Test Email Now';
    });
}
</script>
@endpush
