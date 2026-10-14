@extends('admin.layouts.app')

@section('title', 'Inquiry Details - ' . $inquiry->name)

@push('styles')
<style>
    /* Modern Template Chips */
    .template-chips-wrapper {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        flex-wrap: wrap;
    }

    .template-chip-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 5px 14px 5px 8px;
        border-radius: 50px;
        border: 1px solid #e2e8f0;
        background: #ffffff;
        color: #334155;
        font-size: 0.82rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.22s cubic-bezier(0.16, 1, 0.3, 1);
        box-shadow: 0 1px 3px rgba(15, 23, 42, 0.05);
        user-select: none;
        text-decoration: none;
        outline: none;
    }

    .template-chip-btn .chip-icon-box {
        width: 24px;
        height: 24px;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 0.78rem;
        transition: all 0.22s ease;
        flex-shrink: 0;
    }

    /* General Chip */
    .template-chip-general .chip-icon-box {
        background: rgba(13, 110, 253, 0.12);
        color: #0d6efd;
    }
    .template-chip-general:hover {
        background: #eff6ff;
        border-color: #93c5fd;
        color: #1d4ed8;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.15);
    }
    .template-chip-general:hover .chip-icon-box {
        background: #0d6efd;
        color: #ffffff;
    }

    /* Curriculum & Fee Chip */
    .template-chip-curriculum .chip-icon-box {
        background: rgba(217, 119, 6, 0.14);
        color: #d97706;
    }
    .template-chip-curriculum:hover {
        background: #fffbeb;
        border-color: #fde68a;
        color: #b45309;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(217, 119, 6, 0.15);
    }
    .template-chip-curriculum:hover .chip-icon-box {
        background: #d97706;
        color: #ffffff;
    }

    /* Batches Chip */
    .template-chip-batches .chip-icon-box {
        background: rgba(16, 185, 129, 0.14);
        color: #10b981;
    }
    .template-chip-batches:hover {
        background: #f0fdf4;
        border-color: #a7f3d0;
        color: #047857;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.15);
    }
    .template-chip-batches:hover .chip-icon-box {
        background: #10b981;
        color: #ffffff;
    }

    .template-chip-btn:active {
        transform: scale(0.96);
    }

    /* ✨ Gemini Response Synthesizer - Exact Clean Studio UI */
    .ai-studio-panel {
        background: #ffffff;
        border: 1.5px solid #e2e8f0;
        border-radius: 20px;
        padding: 1.25rem 1.35rem;
        margin-bottom: 2rem;
        box-shadow: 0 4px 20px -2px rgba(15, 23, 42, 0.04);
    }

    /* Top Connected Badge - single line */
    .ai-status-connected-inline {
        background: #e6f9f0;
        border: 1.5px solid #a7f3d0;
        border-radius: 50px;
        padding: 6px 16px;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: 0.8rem;
        font-weight: 700;
        color: #065f46;
        box-shadow: 0 1px 3px rgba(16, 185, 129, 0.08);
    }

    .ai-status-connected-inline .check-dot {
        width: 18px;
        height: 18px;
        border-radius: 50%;
        background: #10b981;
        color: #ffffff;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 0.7rem;
        font-weight: 900;
        flex-shrink: 0;
    }

    /* Studio Workspace White Cards */
    .ai-card-clean {
        background: #ffffff;
        border: 1.5px solid #e2e8f0;
        border-radius: 16px;
        padding: 1.25rem 1.4rem;
        box-shadow: 0 2px 8px rgba(15, 23, 42, 0.02);
    }

    .ai-icon-square {
        width: 36px;
        height: 36px;
        border-radius: 10px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 1.1rem;
        flex-shrink: 0;
    }

    .btn-clean-action {
        background: #ffffff;
        border: 1px solid #cbd5e1;
        border-radius: 8px;
        padding: 6px 14px;
        font-size: 0.8rem;
        font-weight: 600;
        color: #334155;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        cursor: pointer;
        transition: all 0.18s ease;
        text-decoration: none;
    }
    .btn-clean-action:hover {
        background: #f8fafc;
        border-color: #94a3b8;
        color: #0f172a;
    }

    /* Inner Prompt Box */
    .ai-prompt-box-clean {
        border: 1.5px solid #cbd5e1;
        border-radius: 12px;
        padding: 12px 14px;
        background: #ffffff;
        transition: all 0.2s ease;
        margin-top: 14px;
        margin-bottom: 14px;
    }
    .ai-prompt-box-clean:focus-within {
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.12);
    }

    .ai-prompt-clean-textarea {
        width: 100%;
        border: none;
        outline: none;
        box-shadow: none !important;
        resize: none;
        font-size: 0.88rem;
        color: #1e293b;
        line-height: 1.55;
        min-height: 95px;
        padding: 0;
        background: transparent;
    }
    .ai-prompt-clean-textarea::placeholder {
        color: #94a3b8;
        font-size: 0.86rem;
    }

    /* Hero Synthesize Button */
    .btn-synthesize-clean {
        height: 48px;
        border-radius: 12px;
        border: none;
        background: linear-gradient(90deg, #1d4ed8 0%, #2563eb 55%, #3b82f6 100%);
        color: #ffffff;
        font-size: 0.96rem;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        box-shadow: 0 4px 16px rgba(37, 99, 235, 0.35);
        cursor: pointer;
        transition: all 0.22s ease;
        user-select: none;
    }
    .btn-synthesize-clean:hover {
        background: linear-gradient(90deg, #1e40af 0%, #1d4ed8 55%, #2563eb 100%);
        box-shadow: 0 6px 20px rgba(37, 99, 235, 0.45);
        transform: translateY(-2px);
        color: #ffffff;
    }
    .btn-synthesize-clean:active {
        transform: scale(0.98);
    }

    /* Bottom Prompt Starters Strip */
    .ai-starters-strip {
        background: #ffffff;
        border: 1.5px solid #e2e8f0;
        border-radius: 16px;
        padding: 12px 18px;
        display: flex;
        align-items: center;
        gap: 12px;
        flex-wrap: wrap;
        box-shadow: 0 2px 6px rgba(15, 23, 42, 0.02);
    }

    .ai-starter-pill {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 5px 16px 5px 6px;
        border-radius: 50px;
        font-size: 0.78rem;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.18s ease;
        user-select: none;
        border: 1.5px solid transparent;
        text-decoration: none;
        background: #ffffff;
    }
    .ai-starter-pill:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(15, 23, 42, 0.06);
    }
    .ai-starter-pill:active {
        transform: scale(0.97);
    }

    .ai-starter-pill .pill-icon-circle {
        width: 26px;
        height: 26px;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 0.76rem;
        color: #ffffff;
        flex-shrink: 0;
    }

    /* 5 Colors matching image */
    .pill-orange {
        background: #fffbeb;
        border-color: #fed7aa;
        color: #b45309;
    }
    .pill-orange .pill-icon-circle { background: #f97316; }
    .pill-orange:hover { background: #fef3c7; border-color: #fdba74; color: #9a3412; }

    .pill-emerald {
        background: #ecfdf5;
        border-color: #a7f3d0;
        color: #047857;
    }
    .pill-emerald .pill-icon-circle { background: #10b981; }
    .pill-emerald:hover { background: #d1fae5; border-color: #6ee7b7; color: #065f46; }

    .pill-blue {
        background: #eff6ff;
        border-color: #bfdbfe;
        color: #1d4ed8;
    }
    .pill-blue .pill-icon-circle { background: #3b82f6; }
    .pill-blue:hover { background: #dbeafe; border-color: #93c5fd; color: #1e40af; }

    .pill-teal {
        background: #f0fdfa;
        border-color: #99f6e4;
        color: #0f766e;
    }
    .pill-teal .pill-icon-circle { background: #14b8a6; }
    .pill-teal:hover { background: #ccfbf1; border-color: #5eead4; color: #115e59; }

    .pill-purple {
        background: #faf5ff;
        border-color: #e9d5ff;
        color: #7e22ce;
    }
    .pill-purple .pill-icon-circle { background: #a855f7; }
    .pill-purple:hover { background: #f3e8ff; border-color: #d8b4fe; color: #6b21a8; }
</style>
@endpush

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
    <div>
        <h2 class="h4 fw-bold mb-1 text-navy" style="color: var(--hok-navy);">Inquiry from {{ $inquiry->name }}</h2>
        <p class="text-muted small mb-0">Received on {{ $inquiry->created_at->format('F d, Y \a\t H:i:s') }} ({{ $inquiry->created_at->diffForHumans() }})</p>
    </div>
    <div class="d-flex align-items-center gap-2">
        <a href="#reply-card" class="btn btn-primary btn-sm px-3 fw-semibold shadow-sm d-inline-flex align-items-center gap-1.5" style="border-radius: 10px;">
            <i class="bi bi-reply-fill"></i> Jump to Reply Composer
        </a>
        <a href="{{ route('admin.inquiries.index') }}" class="btn btn-outline-secondary btn-sm px-3" style="border-radius: 10px;">
            <i class="bi bi-arrow-left me-1"></i> Back to Inquiries
        </a>
    </div>
</div>

<!-- Top Row: Inquiry Message & Lead Information + Status/Notes (Side by Side) -->
<div class="row g-4 mb-4">
    <!-- Left: Inquiry Message & Sender Information -->
    <div class="col-lg-7">
        <div class="card card-custom p-4 h-100 shadow-sm" style="border: 1px solid rgba(7, 29, 58, 0.08); border-radius: 16px;">
            <div class="d-flex align-items-center justify-content-between border-bottom pb-2 mb-3">
                <h5 class="h6 fw-bold mb-0 text-navy" style="color: var(--hok-navy);">
                    <i class="bi bi-chat-left-text me-2 text-primary"></i>Inquiry Message
                </h5>
                <span class="badge bg-light text-muted border small">{{ $inquiry->created_at->format('M d, Y') }}</span>
            </div>
            
            <div class="p-3 rounded-3 mb-4" style="background: #f8fafc; border: 1px solid #e2e8f0; font-size: 1rem; line-height: 1.7; color: #1e293b;">
                {!! nl2br(e($inquiry->message ?? 'No additional message text provided.')) !!}
            </div>

            <h5 class="h6 fw-bold border-bottom pb-2 mb-3 text-navy" style="color: var(--hok-navy);">
                <i class="bi bi-person-lines-fill me-2 text-primary"></i>Sender Information
            </h5>
            <div class="row g-3">
                <div class="col-md-6">
                    <small class="text-muted text-uppercase fw-bold d-block" style="font-size: 0.72rem;">Full Name</small>
                    <strong class="fs-6 text-dark">{{ $inquiry->name }}</strong>
                </div>
                <div class="col-md-6">
                    <small class="text-muted text-uppercase fw-bold d-block" style="font-size: 0.72rem;">Program of Interest</small>
                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle fs-6">{{ $inquiry->program_name ?? 'General / Not Specified' }}</span>
                </div>
                <div class="col-md-6">
                    <small class="text-muted text-uppercase fw-bold d-block" style="font-size: 0.72rem;">Phone / WhatsApp</small>
                    <div class="d-flex align-items-center gap-2 mt-1">
                        <strong class="fs-6 text-dark">{{ $inquiry->phone }}</strong>
                        <a href="tel:{{ $inquiry->phone }}" class="btn btn-sm btn-outline-primary py-0 px-2" title="Call"><i class="bi bi-telephone"></i></a>
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $inquiry->phone) }}" target="_blank" class="btn btn-sm btn-outline-success py-0 px-2" title="WhatsApp"><i class="bi bi-whatsapp"></i></a>
                    </div>
                </div>
                <div class="col-md-6">
                    <small class="text-muted text-uppercase fw-bold d-block" style="font-size: 0.72rem;">Email Address</small>
                    <div class="d-flex align-items-center gap-2 mt-1">
                        <strong class="fs-6 text-dark">{{ $inquiry->email }}</strong>
                        <a href="mailto:{{ $inquiry->email }}" class="btn btn-sm btn-outline-primary py-0 px-2" title="Send Email"><i class="bi bi-envelope"></i></a>
                    </div>
                </div>
                <div class="col-md-6">
                    <small class="text-muted text-uppercase fw-bold d-block" style="font-size: 0.72rem;">Country / Location</small>
                    <span class="text-secondary">{{ $inquiry->country ?? 'Not Provided' }}</span>
                </div>
                <div class="col-md-6">
                    <small class="text-muted text-uppercase fw-bold d-block" style="font-size: 0.72rem;">Professional Background</small>
                    <span class="text-secondary">{{ $inquiry->profession_role ?? 'Not Provided' }}</span>
                </div>
                <div class="col-md-6">
                    <small class="text-muted text-uppercase fw-bold d-block" style="font-size: 0.72rem;">Sender IP Address</small>
                    <code class="text-muted">{{ $inquiry->ip_address ?? '-' }}</code>
                </div>
            </div>
        </div>
    </div>

    <!-- Right: Status & Internal Follow-up Notes -->
    <div class="col-lg-5">
        <div class="card card-custom p-4 h-100 shadow-sm" style="border: 1px solid rgba(7, 29, 58, 0.08); border-radius: 16px;">
            <div class="d-flex align-items-center justify-content-between border-bottom pb-2 mb-3">
                <h5 class="h6 fw-bold mb-0 text-navy" style="color: var(--hok-navy);">
                    <i class="bi bi-pencil-square me-2 text-warning"></i>Lead Status &amp; Internal Notes
                </h5>
                <span class="badge {{ $inquiry->status === 'replied' ? 'bg-success' : ($inquiry->status === 'new' ? 'bg-danger' : 'bg-warning text-dark') }} rounded-pill px-2.5 py-1 small">
                    {{ ucfirst($inquiry->status) }}
                </span>
            </div>

            <form action="{{ route('admin.inquiries.status', $inquiry->id) }}" method="POST">
                @csrf
                @method('PATCH')

                <div class="mb-3">
                    <label class="form-label small fw-semibold text-secondary">Lead Status</label>
                    <select name="status" class="form-select" style="border-radius: 10px;">
                        <option value="new" {{ $inquiry->status === 'new' ? 'selected' : '' }}>New Lead</option>
                        <option value="read" {{ $inquiry->status === 'read' ? 'selected' : '' }}>Read / Under Review</option>
                        <option value="replied" {{ $inquiry->status === 'replied' ? 'selected' : '' }}>Replied / Contacted</option>
                        <option value="archived" {{ $inquiry->status === 'archived' ? 'selected' : '' }}>Archived / Closed</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label small fw-semibold text-secondary">Internal Notes</label>
                    <textarea name="admin_notes" class="form-control" rows="6" placeholder="Add private follow-up notes, discussion details, or lead history..." style="font-size: 0.88rem; line-height: 1.55; border-radius: 10px;">{{ old('admin_notes', $inquiry->admin_notes) }}</textarea>
                </div>

                <button type="submit" class="btn btn-hok-admin w-100 py-2 fw-semibold" style="border-radius: 10px;">
                    <i class="bi bi-check-circle me-1"></i> Update Status &amp; Notes
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Bottom Row: FULL-WIDTH Direct Email Reply Card with AI Generator -->
<div class="row g-4">
    <div class="col-12">
        <div class="card card-custom p-4 shadow-sm" id="reply-card" style="border: 1px solid rgba(7, 29, 58, 0.08); border-radius: 16px;">
            <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3 flex-wrap gap-2">
                <div class="d-flex align-items-center gap-3">
                    <div style="width: 46px; height: 46px; border-radius: 12px; background: linear-gradient(135deg, rgba(7, 29, 58, 0.08) 0%, rgba(197, 155, 39, 0.18) 100%); display: flex; align-items: center; justify-content: center; font-size: 1.35rem; color: var(--hok-navy);">
                        <i class="bi bi-reply-all-fill"></i>
                    </div>
                    <div>
                        <h5 class="h6 fw-bold mb-0 text-navy" style="color: var(--hok-navy); font-size: 1.12rem;">
                            Direct Email Reply Composer
                        </h5>
                        <small class="text-muted">Send a personalized, branded email response directly to <strong>{{ $inquiry->name }}</strong>.</small>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <span class="badge rounded-pill px-3 py-2" style="background: rgba(7, 29, 58, 0.05); color: var(--hok-navy); border: 1px solid rgba(7, 29, 58, 0.12); font-size: 0.84rem;">
                        <i class="bi bi-envelope-check me-1.5 text-primary"></i> {{ $inquiry->email }}
                    </span>
                </div>
            </div>

            <!-- ✨ Modern AI Studio Command Center -->
            <div class="ai-studio-panel">
                <input type="hidden" id="aiToneSelect" value="academic">

                <!-- Unified AI Prompt Workspace Card -->
                <div class="ai-card-clean mb-3" id="aiPromptWorkspaceCard">
                    <!-- Header -->
                    <div class="d-flex align-items-center justify-content-between mb-2.5 flex-wrap gap-2">
                        <div class="d-flex align-items-center gap-2.5">
                            <span class="ai-icon-square" style="background: #eff6ff; color: #2563eb;">
                                <i class="bi bi-stars"></i>
                            </span>
                            <div>
                                <h4 class="fw-bold text-dark mb-0" style="font-size: 1.05rem;">Custom Instructions for AI</h4>
                                <small class="text-muted d-block" style="font-size: 0.78rem;">Tell the AI what key points, offers, or details to include (or pick a quick starter below)</small>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <div id="aiStatusPill"></div>
                            <button type="button" class="btn-clean-action" onclick="clearCustomPrompt()" title="Clear instructions">
                                <i class="bi bi-trash3 text-muted"></i>
                                <span>Clear</span>
                            </button>
                        </div>
                    </div>

                    <!-- Inner Prompt Input Box -->
                    <div class="ai-prompt-box-clean mb-3" id="aiPromptInnerBox">
                        <textarea id="aiCustomPrompt" class="ai-prompt-clean-textarea" rows="3" placeholder="Type your instructions here (e.g. Offer 10% early-bird fee discount, highlight live patient cases, or invite doctor for WhatsApp consultation)..." oninput="updatePromptCharCount(this)"></textarea>

                        <div class="d-flex justify-content-between align-items-center pt-2 border-top" style="border-color: #f1f5f9 !important;">
                            <span class="text-muted small" style="font-size: 0.75rem;">
                                <i class="bi bi-info-circle text-primary me-1"></i> AI automatically drafts response based on candidate inquiry &amp; program
                            </span>
                            <span class="text-muted small" style="font-size: 0.75rem;" id="promptCharCount">0/2000</span>
                        </div>
                    </div>

                    <!-- Action Row: Synthesise Button -->
                    <div class="d-flex justify-content-end align-items-center">
                        <button type="button" id="btnGenerateAi" class="btn-synthesize-clean px-4" onclick="triggerAiGenerate()" title="Generate tailored email reply using Google Gemini AI" style="min-width: 270px; height: 48px;">
                            <i class="bi bi-stars text-warning fs-5"></i>
                            <span id="btnGenerateAiText">Synthesise Email with AI</span>
                            <i class="bi bi-arrow-right fs-5"></i>
                        </button>
                    </div>
                </div>

                <!-- Bottom Row: Quick Prompt Starters Strip (Horizontal Strip matching screenshot) -->
                <div class="ai-starters-strip">
                    <span class="fw-bold text-dark d-inline-flex align-items-center gap-1.5 text-nowrap" style="font-size: 0.84rem;">
                        <i class="bi bi-stars text-warning fs-5"></i> Quick Prompt Starters:
                    </span>

                    <!-- 1. 10% Fee Discount (Orange) -->
                    <button type="button" class="ai-starter-pill pill-orange" onclick="setQuickPrompt('Offer a special 10% early-bird fee discount on the upcoming cohort batch')" title="Offer 10% early-bird fee discount">
                        <span class="pill-icon-circle"><i class="bi bi-tag-fill"></i></span>
                        <span>+ 10% Fee Discount</span>
                    </button>

                    <!-- 2. Live Patients Hands-on (Emerald) -->
                    <button type="button" class="ai-starter-pill pill-emerald" onclick="setQuickPrompt('Highlight extensive hands-on live patient cases supervised by expert faculty')" title="Highlight live patient cases">
                        <span class="pill-icon-circle"><i class="bi bi-people-fill"></i></span>
                        <span>+ Live Patients Hands-on</span>
                    </button>

                    <!-- 3. Weekend Cohort (10 Seats) (Blue) -->
                    <button type="button" class="ai-starter-pill pill-blue" onclick="setQuickPrompt('Mention upcoming weekend cohort starting next month with limited 10 seats')" title="Mention weekend cohort and seats">
                        <span class="pill-icon-circle"><i class="bi bi-calendar-event-fill"></i></span>
                        <span>+ Weekend Cohort (10 Seats)</span>
                    </button>

                    <!-- 4. WhatsApp Call Invite (Teal) -->
                    <button type="button" class="ai-starter-pill pill-teal" onclick="setQuickPrompt('Invite for a direct WhatsApp / Phone advisory consultation call with our medical faculty')" title="Invite for WhatsApp consultation">
                        <span class="pill-icon-circle"><i class="bi bi-whatsapp"></i></span>
                        <span>+ WhatsApp Call Invite</span>
                    </button>
                </div>
            </div>

            <!-- Distinct Section Separator with Proper Space -->
            <div class="d-flex align-items-center gap-3 my-4">
                <div class="border-bottom flex-grow-1" style="border-color: #e2e8f0 !important;"></div>
                <span class="badge bg-light text-secondary border px-3 py-1.5 rounded-pill text-uppercase" style="font-size: 0.72rem; letter-spacing: 0.8px; font-weight: 600;">
                    <i class="bi bi-envelope-paper me-1 text-primary"></i> Email Details &amp; Message Editor
                </span>
                <div class="border-bottom flex-grow-1" style="border-color: #e2e8f0 !important;"></div>
            </div>

            <!-- Email Composer Form -->
            <form action="{{ route('admin.inquiries.reply', $inquiry->id) }}" method="POST" id="inquiryReplyForm">
                @csrf

                <div class="row g-3 mb-3">
                    <div class="col-md-5">
                        <label class="form-label small fw-semibold text-secondary">Recipient Email (To) <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0 text-muted"><i class="bi bi-envelope-at"></i></span>
                            <input type="email" name="to_email" class="form-control border-start-0" value="{{ old('to_email', $inquiry->email) }}" required style="border-radius: 0 10px 10px 0;">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <label class="form-label small fw-semibold text-secondary">Subject <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0 text-muted"><i class="bi bi-chat-left-dots"></i></span>
                            <input type="text" name="subject" id="replySubjectInput" class="form-control border-start-0" value="{{ old('subject', 'Response regarding ' . ($inquiry->program_name ? $inquiry->program_name . ' Program' : 'your enquiry') . ' - HOK Academy') }}" required style="border-radius: 0 10px 10px 0;">
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-2 flex-wrap gap-2">
                        <label class="form-label small fw-semibold text-secondary mb-0">
                            Message Content <span class="text-danger">*</span>
                        </label>
                        <div class="template-chips-wrapper">
                            <span class="d-inline-flex align-items-center gap-1 text-secondary fw-semibold small me-1" style="font-size: 0.78rem;">
                                <i class="bi bi-bookmark-star-fill text-warning"></i>
                                <span>Templates:</span>
                            </span>
                            <button type="button" class="template-chip-btn template-chip-general" onclick="setReplyTemplate('general')" title="Insert general welcome and orientation response">
                                <span class="chip-icon-box"><i class="bi bi-chat-left-dots-fill"></i></span>
                                <span>General</span>
                            </button>
                            <button type="button" class="template-chip-btn template-chip-curriculum" onclick="setReplyTemplate('course')" title="Insert detailed curriculum, syllabus & fee structure">
                                <span class="chip-icon-box"><i class="bi bi-mortarboard-fill"></i></span>
                                <span>Curriculum &amp; Fee</span>
                            </button>
                            <button type="button" class="template-chip-btn template-chip-batches" onclick="setReplyTemplate('schedule')" title="Insert upcoming clinical cohort batch dates & seat reservation">
                                <span class="chip-icon-box"><i class="bi bi-calendar-check-fill"></i></span>
                                <span>Batches</span>
                            </button>
                        </div>
                    </div>

                    <!-- Rich Text Editor Container -->
                    <div id="editorWrapper" style="transition: all 0.3s ease;">
                        <textarea name="message" id="replyMessageText" class="form-control jodit-editor" rows="12" data-height="380" data-min-height="260" placeholder="Type or generate your email response here..." required>{!! old('message', '<p>Dear <strong>' . e($inquiry->name) . '</strong>,</p><p>Thank you for reaching out to <strong>HOK Academy</strong> regarding ' . ($inquiry->program_name ? 'our <strong>' . e($inquiry->program_name) . '</strong> program' : 'our medical programs') . '.</p><p>We have received your enquiry and would be delighted to assist you with comprehensive curriculum details, eligibility prerequisites, and practical training schedules.</p><p>[Please feel free to share your specific clinical interests or preferred training dates.]</p><p><br></p><p>Warm regards,<br><strong>Academic Advisory Team</strong><br>HOK Academy | International Academy of Medical Excellence<br>Phone: +91 99101 69317 | Email: hokacademy@yahoo.com</p>') !!}</textarea>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 pt-3 border-top">
                    <div class="form-check form-switch d-flex align-items-center gap-2 ps-0">
                        <input class="form-check-input ms-0 me-2" type="checkbox" role="switch" name="mark_replied" value="1" id="markRepliedCheck" checked style="width: 2.2em; height: 1.2em; cursor: pointer;">
                        <label class="form-check-label small fw-semibold text-secondary mb-0" for="markRepliedCheck" style="cursor: pointer;">
                            Automatically mark lead status as <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-2.5 py-1 ms-1">Replied</span>
                        </label>
                    </div>

                    <button type="submit" id="btnSubmitReply" class="btn px-4 py-2.5 fw-bold text-white shadow-sm d-inline-flex align-items-center gap-2" style="background: linear-gradient(135deg, #071d3a 0%, #103b6e 100%); border-radius: 12px; border: none; font-size: 0.95rem; transition: all 0.25s ease;">
                        <i class="bi bi-send-fill text-warning"></i>
                        <span>Send Email Reply</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
// Update character counter
function updatePromptCharCount(textarea) {
    const counter = document.getElementById('promptCharCount');
    if (counter && textarea) {
        counter.textContent = `${textarea.value.length}/2000`;
    }
}

// Quick Snippet Insertion Helper
function insertSnippet(type) {
    const promptInput = document.getElementById('aiCustomPrompt');
    if (!promptInput) return;

    let snippet = '';
    if (type === 'patient') {
        snippet = 'Highlight hands-on live patient cases and personal clinical demonstration. ';
    } else if (type === 'fee') {
        snippet = 'Offer a 10% early-bird fee discount on the upcoming cohort batch. ';
    } else if (type === 'webinar') {
        snippet = 'Invite candidate to our upcoming live faculty webinar demonstration with live Q&A. ';
    } else if (type === 'followup') {
        snippet = 'Polite follow-up inquiring about their clinical background and scheduling needs. ';
    } else if (type === 'custom') {
        snippet = 'Emphasize personalized 1-on-1 faculty mentorship and global international certificate recognition. ';
    }

    if (promptInput.value.trim() === '') {
        promptInput.value = snippet;
    } else {
        promptInput.value = promptInput.value.trim() + ' ' + snippet;
    }

    promptInput.focus();
    updatePromptCharCount(promptInput);

    const box = document.getElementById('aiPromptInnerBox');
    if (box) {
        box.style.borderColor = '#2563eb';
        box.style.boxShadow = '0 0 0 3px rgba(37, 99, 235, 0.2)';
        setTimeout(() => {
            box.style.borderColor = '';
            box.style.boxShadow = '';
        }, 600);
    }
}

// Tone Select dynamic objective updater
function onToneChange(toneValue) {
    const objectiveEl = document.getElementById('contextObjectiveText');
    if (!objectiveEl) return;

    const map = {
        'batches': 'Promote upcoming batches with limited seats',
        'academic': 'Comprehensive curriculum & academic standards',
        'curriculum': 'Detailed syllabus & practical learning modules',
        'quick': 'Short & direct consultation callback',
        'direct': 'Address specific candidate inquiries and questions'
    };

    objectiveEl.textContent = map[toneValue] || 'Promote upcoming batches with limited seats';
}

// Quick prompt cards helper
function setQuickPrompt(text) {
    const promptInput = document.getElementById('aiCustomPrompt');
    if (promptInput) {
        promptInput.value = text;
        promptInput.focus();
        updatePromptCharCount(promptInput);

        const box = document.getElementById('aiPromptInnerBox');
        if (box) {
            box.style.borderColor = '#2563eb';
            box.style.boxShadow = '0 0 0 3px rgba(37, 99, 235, 0.25)';
            setTimeout(() => {
                box.style.borderColor = '';
                box.style.boxShadow = '';
            }, 800);
        }
    }
}

// Clear custom prompt
function clearCustomPrompt() {
    const el = document.getElementById('aiCustomPrompt');
    if (el) {
        el.value = '';
        updatePromptCharCount(el);
        el.focus();
    }
}

// Jump to templates
function openTemplatesModal() {
    const editor = document.getElementById('editorWrapper');
    if (editor) {
        editor.scrollIntoView({ behavior: 'smooth', block: 'center' });
        editor.style.boxShadow = '0 0 0 4px rgba(37, 99, 235, 0.3)';
        setTimeout(() => {
            editor.style.boxShadow = 'none';
        }, 1500);
    }
}

// ✨ Trigger AI Reply Generation via AJAX
function triggerAiGenerate() {
    const tone = document.getElementById('aiToneSelect')?.value || 'batches';
    const customPrompt = document.getElementById('aiCustomPrompt')?.value || '';
    const btn = document.getElementById('btnGenerateAi');
    const btnText = document.getElementById('btnGenerateAiText');
    const statusPill = document.getElementById('aiStatusPill');

    if (btn) {
        btn.disabled = true;
        btnText.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span> Synthesising...';
    }

    if (statusPill) {
        statusPill.innerHTML = `
            <div class="ai-status-connected-inline" style="background: #fffbeb; border-color: #fde68a; color: #92400e;">
                <span class="spinner-border spinner-border-sm text-warning" style="width: 14px; height: 14px;"></span>
                <span>Synthesising AI Response...</span>
            </div>`;
    }

    fetch("{{ route('admin.inquiries.ai-generate', $inquiry->id) }}", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json'
        },
        body: JSON.stringify({
            tone: tone,
            custom_instructions: customPrompt
        })
    })
    .then(async response => {
        const data = await response.json();
        if (response.ok && data.success) {
            // 1. Update Subject field
            if (data.subject) {
                const subjectInput = document.getElementById('replySubjectInput');
                if (subjectInput) {
                    subjectInput.value = data.subject;
                }
            }

            // 2. Update Rich Text Editor
            const textarea = document.getElementById('replyMessageText');
            if (textarea) {
                const editor = textarea.__jodit || (window.joditInstances && window.joditInstances['replyMessageText']);
                if (editor && typeof editor.value !== 'undefined') {
                    editor.value = data.html;
                } else {
                    textarea.value = data.html;
                }
            }

            // Visual feedback highlight
            const editorWrapper = document.getElementById('editorWrapper');
            if (editorWrapper) {
                editorWrapper.style.boxShadow = '0 0 0 3px rgba(37, 99, 235, 0.25)';
                editorWrapper.scrollIntoView({ behavior: 'smooth', block: 'center' });
                setTimeout(() => {
                    editorWrapper.style.boxShadow = 'none';
                }, 2000);
            }

            if (statusPill) {
                statusPill.innerHTML = `
                    <div class="ai-status-connected-inline">
                        <span class="check-dot"><i class="bi bi-check-lg"></i></span>
                        <span>${data.provider || 'Google Gemini AI'} Generated &amp; Ready</span>
                    </div>`;
            }
        } else {
            alert('Failed to generate AI reply: ' + (data.message || 'Unknown error'));
            if (statusPill) {
                statusPill.innerHTML = `
                    <div class="ai-status-connected-inline" style="background: #fef2f2; border-color: #fecaca; color: #991b1b;">
                        <span class="check-dot" style="background: #ef4444;"><i class="bi bi-x-lg"></i></span>
                        <span>Generation Error</span>
                    </div>`;
            }
        }
    })
    .catch(err => {
        alert('Network or server error during AI generation: ' + err.message);
        if (statusPill) {
            statusPill.innerHTML = `
                <div class="ai-status-connected-inline" style="background: #fef2f2; border-color: #fecaca; color: #991b1b;">
                    <span class="check-dot" style="background: #ef4444;"><i class="bi bi-x-lg"></i></span>
                    <span>${err.message || 'Network Error'}</span>
                </div>`;
        }
    })
    .finally(() => {
        if (btn) {
            btn.disabled = false;
            btnText.innerHTML = 'Synthesise Email with AI';
        }
    });
}

// Static quick templates
function setReplyTemplate(type) {
    const name = @json($inquiry->name);
    const prog = @json($inquiry->program_name ?? 'our medical training programs');
    const textarea = document.getElementById('replyMessageText');
    if (!textarea) return;

    let html = '';
    if (type === 'general') {
        html = `<p>Dear <strong>${name}</strong>,</p>
<p>Thank you for reaching out to <strong>HOK Academy</strong> regarding <strong>${prog}</strong>.</p>
<p>We have received your enquiry and would be delighted to assist you with comprehensive curriculum details, eligibility prerequisites, and clinical learning modules.</p>
<p>If you have any specific queries or preferred batch dates, please feel free to let us know so our advisory faculty can assist you.</p>
<p><br></p>
<p>Warm regards,<br>
<strong>Academic Advisory Team</strong><br>
HOK Academy | International Academy of Medical Excellence<br>
Phone: +91 99101 69317 | Email: hokacademy@yahoo.com</p>`;
    } else if (type === 'course') {
        html = `<p>Dear <strong>${name}</strong>,</p>
<p>Thank you for your interest in the <strong>${prog}</strong> at HOK Academy.</p>
<p>This hands-on program connects comprehensive scientific foundations, live specialist demonstrations, and supervised practical clinical training designed for practicing doctors.</p>
<p>Our academic admissions team will also follow up on WhatsApp/phone to share the complete syllabus breakdown, fee structure, and enrollment schedule.</p>
<p><br></p>
<p>Warm regards,<br>
<strong>Academic Admissions Team</strong><br>
HOK Academy | International Academy of Medical Excellence<br>
Phone: +91 99101 69317 | Email: hokacademy@yahoo.com</p>`;
    } else if (type === 'schedule') {
        html = `<p>Dear <strong>${name}</strong>,</p>
<p>Thank you for your enquiry regarding upcoming batch schedules for <strong>${prog}</strong>.</p>
<p>Our upcoming clinical hands-on cohort is scheduled soon, with limited seats allocated to ensure dedicated mentorship and live patient case exposure.</p>
<p>Please let us know your preferred month and availability so we can reserve your seat in the upcoming cohort.</p>
<p><br></p>
<p>Warm regards,<br>
<strong>Academic Scheduling Office</strong><br>
HOK Academy | International Academy of Medical Excellence<br>
Phone: +91 99101 69317 | Email: hokacademy@yahoo.com</p>`;
    }

    const editor = textarea.__jodit || (window.joditInstances && window.joditInstances['replyMessageText']);
    if (editor && typeof editor.value !== 'undefined') {
        editor.value = html;
    } else {
        textarea.value = html;
    }
}

document.getElementById('inquiryReplyForm')?.addEventListener('submit', function() {
    const btn = document.getElementById('btnSubmitReply');
    if (btn) {
        btn.disabled = true;
        btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Sending Email...';
    }
});
</script>
@endpush
@endsection
