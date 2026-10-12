@extends('admin.layouts.app')

@section('title', 'Executive Overview')

@push('styles')
<style>
    /* ========================================================
       RAZOR-SHARP EXECUTIVE DASHBOARD STYLES
       ======================================================== */

    /* ---- Executive Hero Banner ---- */
    .dashboard-hero-sharp {
        background: linear-gradient(135deg, var(--hok-navy-deep) 0%, var(--hok-navy) 48%, var(--hok-navy-mid) 100%);
        color: #ffffff;
        border-radius: 16px;
        border: 1px solid rgba(212, 175, 55, 0.4) !important;
        border-top: 3px solid var(--hok-gold) !important;
        box-shadow: 0 12px 36px rgba(7, 29, 58, 0.14), inset 0 1px 0 rgba(255, 255, 255, 0.15);
        position: relative;
        overflow: hidden;
    }
    .dashboard-hero-sharp .ambient-gold {
        position: absolute;
        right: -60px;
        top: -60px;
        width: 340px;
        height: 340px;
        background: radial-gradient(circle, rgba(212, 175, 55, 0.24) 0%, rgba(212, 175, 55, 0) 70%);
        border-radius: 50%;
        pointer-events: none;
    }
    .dashboard-hero-sharp .ambient-teal {
        position: absolute;
        left: 35%;
        bottom: -80px;
        width: 260px;
        height: 260px;
        background: radial-gradient(circle, rgba(13, 92, 58, 0.28) 0%, rgba(13, 92, 58, 0) 70%);
        border-radius: 50%;
        pointer-events: none;
    }
    .hero-badge-pill {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 5px 14px;
        border-radius: 999px;
        background: rgba(255, 255, 255, 0.08);
        border: 1px solid rgba(212, 175, 55, 0.45);
        backdrop-filter: blur(8px);
        font-size: 0.76rem;
        font-weight: 600;
        letter-spacing: 0.5px;
        color: #f8fafc;
    }

    /* ---- Razor-Sharp 4 Metric Stat Cards ---- */
    .stat-card-sharp {
        background: #ffffff;
        border-radius: 14px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 4px 16px rgba(7, 29, 58, 0.03);
        padding: 1.35rem 1.35rem 1.15rem;
        position: relative;
        overflow: hidden;
        transition: all 0.22s cubic-bezier(0.16, 1, 0.3, 1);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 100%;
    }
    .stat-card-sharp:hover {
        transform: translateY(-4px);
        box-shadow: 0 14px 30px rgba(7, 29, 58, 0.09);
        border-color: #cbd5e1;
    }
    .stat-card-sharp::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3.5px;
    }
    .stat-card-sharp.crimson::before { background: var(--hok-crimson); }
    .stat-card-sharp.navy::before { background: var(--hok-navy); }
    .stat-card-sharp.emerald::before { background: var(--hok-emerald); }
    .stat-card-sharp.gold::before { background: var(--hok-gold-grad); }

    .stat-icon-sharp {
        width: 46px;
        height: 46px;
        border-radius: 12px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
        flex-shrink: 0;
    }
    .stat-icon-sharp.crimson {
        background: #fff1f2;
        color: var(--hok-crimson);
        border: 1px solid #ffe4e6;
    }
    .stat-icon-sharp.navy {
        background: #f0f4f8;
        color: var(--hok-navy);
        border: 1px solid #e2e8f0;
    }
    .stat-icon-sharp.emerald {
        background: #ecfdf5;
        color: var(--hok-emerald);
        border: 1px solid #d1fae5;
    }
    .stat-icon-sharp.gold {
        background: #fffbeb;
        color: var(--hok-gold-dark);
        border: 1px solid #fef3c7;
    }

    .stat-badge-sharp {
        padding: 4px 10px;
        border-radius: 999px;
        font-size: 0.72rem;
        font-weight: 700;
        letter-spacing: 0.3px;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }
    .stat-badge-sharp.crimson {
        background: #fff1f2;
        color: #be123c;
        border: 1px solid #fecdd3;
    }
    .stat-badge-sharp.navy {
        background: #f0f4f8;
        color: var(--hok-navy);
        border: 1px solid #cbd5e1;
    }
    .stat-badge-sharp.emerald {
        background: #ecfdf5;
        color: #047857;
        border: 1px solid #a7f3d0;
    }
    .stat-badge-sharp.gold {
        background: #fffbeb;
        color: #b45309;
        border: 1px solid #fde68a;
    }

    .stat-number-sharp {
        font-size: 2.35rem;
        font-weight: 800;
        line-height: 1;
        letter-spacing: -0.04em;
        color: var(--hok-navy);
        margin-bottom: 0.3rem;
    }

    .stat-action-link {
        display: flex;
        align-items: center;
        justify-content: space-between;
        font-size: 0.84rem;
        font-weight: 700;
        text-decoration: none;
        padding-top: 0.75rem;
        border-top: 1px solid #f1f5f9;
        margin-top: 0.95rem;
        transition: all 0.2s ease;
    }
    .stat-action-link i {
        transition: transform 0.2s ease;
    }
    .stat-card-sharp:hover .stat-action-link i {
        transform: translateX(4px);
    }

    /* ---- Executive Card Containers ---- */
    .dashboard-panel-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        box-shadow: 0 4px 18px rgba(7, 29, 58, 0.03);
        overflow: hidden;
    }
    .dashboard-panel-header {
        background: #ffffff;
        border-bottom: 1px solid #f1f5f9;
        padding: 1.15rem 1.4rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 10px;
    }
    .header-icon-box {
        width: 36px;
        height: 36px;
        border-radius: 10px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 1.1rem;
        flex-shrink: 0;
    }

    /* ---- Razor-Sharp Tables ---- */
    .table-sharp {
        margin-bottom: 0;
    }
    .table-sharp thead th {
        background: #f8fafc;
        color: #475569;
        font-size: 0.73rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        padding: 0.85rem 1.25rem;
        border-bottom: 1px solid #e2e8f0;
        border-top: none;
        white-space: nowrap;
    }
    .table-sharp tbody td {
        padding: 1rem 1.25rem;
        vertical-align: middle;
        border-bottom: 1px solid #f1f5f9;
        font-size: 0.9rem;
    }
    .table-sharp tbody tr {
        transition: background-color 0.15s ease;
    }
    .table-sharp tbody tr:hover {
        background-color: #f8fafc;
    }
    .table-sharp tbody tr:last-child td {
        border-bottom: none;
    }

    /* ---- Candidate Avatar Circle ---- */
    .candidate-avatar {
        width: 38px;
        height: 38px;
        border-radius: 10px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        font-size: 0.82rem;
        color: var(--hok-navy);
        background: #edf2f7;
        border: 1px solid #e2e8f0;
        flex-shrink: 0;
    }

    /* ---- Quick Command Shortcut Cards ---- */
    .shortcut-card-item {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        padding: 12px 14px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        text-decoration: none;
        color: #1e293b;
        transition: all 0.22s cubic-bezier(0.16, 1, 0.3, 1);
        margin-bottom: 8px;
    }
    .shortcut-card-item:hover {
        background: #fafaf9;
        border-color: var(--hok-gold);
        transform: translateX(4px);
        box-shadow: 0 4px 14px rgba(0, 0, 0, 0.04);
        color: var(--hok-navy);
    }
    .shortcut-card-item .shortcut-icon {
        width: 34px;
        height: 34px;
        border-radius: 8px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
        flex-shrink: 0;
    }
    .shortcut-card-item .shortcut-arrow {
        color: #94a3b8;
        font-size: 0.85rem;
        transition: transform 0.2s ease, color 0.2s ease;
    }
    .shortcut-card-item:hover .shortcut-arrow {
        color: var(--hok-gold-dark);
        transform: translateX(3px);
    }

    /* ---- Program Thumbnail Frame ---- */
    .program-thumb-frame {
        width: 50px;
        height: 38px;
        border-radius: 8px;
        object-fit: cover;
        border: 1px solid #e2e8f0;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.04);
        flex-shrink: 0;
    }
    .program-thumb-placeholder {
        width: 50px;
        height: 38px;
        border-radius: 8px;
        background: #f1f5f9;
        border: 1px solid #e2e8f0;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        color: var(--hok-navy);
        font-size: 1.15rem;
        flex-shrink: 0;
    }
</style>
@endpush

@section('content')
<!-- 1. EXECUTIVE HERO BANNER -->
<div class="card dashboard-hero-sharp mb-4">
    <div class="ambient-gold"></div>
    <div class="ambient-teal"></div>
    
    <div class="card-body p-4 p-lg-5 position-relative">
        <div class="row align-items-center g-4">
            <div class="col-lg-8">
                <div class="hero-badge-pill mb-3">
                    <i class="bi bi-patch-check-fill" style="color: var(--hok-gold-light);"></i>
                    <span>House of Knowledge Academy Administration</span>
                </div>
                <h1 class="h2 fw-bold text-white mb-2" style="font-family: 'Playfair Display', serif; letter-spacing: -0.3px;">
                    Welcome back, {{ str_replace('Aacademy', 'Academy', auth()->user()->name ?? 'Administrator') }}
                </h1>
                <p class="text-white-50 mb-0" style="max-width: 640px; font-size: 0.93rem; line-height: 1.6;">
                    Monitor real-time student inquiries, manage world-class clinical programs, update faculty directories, and publish academic research—all tailored to HOK's brand standards.
                </p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <div class="d-flex flex-wrap gap-2 justify-content-lg-end">
                    <a href="{{ route('admin.programs.create') }}" class="btn btn-hok-gold d-inline-flex align-items-center gap-2 shadow-sm" style="font-weight: 700; padding: 0.65rem 1.25rem; border-radius: 10px;">
                        <i class="bi bi-mortarboard-fill"></i>
                        <span>New Program</span>
                    </a>
                    <a href="{{ route('admin.blogs.create') }}" class="btn btn-outline-light d-inline-flex align-items-center gap-2" style="border-color: rgba(255, 255, 255, 0.35); background: rgba(255, 255, 255, 0.06); backdrop-filter: blur(4px); padding: 0.65rem 1.25rem; border-radius: 10px; font-weight: 600;">
                        <i class="bi bi-pencil-square" style="color: var(--hok-gold-light);"></i>
                        <span>Write Article</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 2. LOGO HARMONIZED STAT CARDS (4 PILLARS) -->
<div class="row g-3 g-xl-4 mb-4">
    <!-- PILLAR 1: INQUIRIES (Crimson Accent from 'K' in Logo) -->
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card-sharp crimson">
            <div>
                <div class="d-flex align-items-start justify-content-between mb-3">
                    <div class="stat-icon-sharp crimson">
                        <i class="bi bi-envelope-exclamation-fill"></i>
                    </div>
                    <span class="stat-badge-sharp crimson">
                        <i class="bi bi-bell-fill" style="font-size: 0.6rem;"></i> Action Needed
                    </span>
                </div>
                <div>
                    <div class="stat-number-sharp">{{ $stats['new_inquiries'] }}</div>
                    <div class="d-flex align-items-center justify-content-between">
                        <span class="text-dark fw-bold small">New Inquiries</span>
                        <span class="small text-muted">Total: <strong class="text-dark">{{ $stats['total_inquiries'] }}</strong></span>
                    </div>
                </div>
            </div>
            <a href="{{ route('admin.inquiries.index') }}" class="stat-action-link" style="color: var(--hok-crimson);">
                <span>Respond to leads</span>
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </div>

    <!-- PILLAR 2: PROGRAMS (Royal Navy Accent from 'H' in Logo) -->
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card-sharp navy">
            <div>
                <div class="d-flex align-items-start justify-content-between mb-3">
                    <div class="stat-icon-sharp navy">
                        <i class="bi bi-mortarboard-fill"></i>
                    </div>
                    <span class="stat-badge-sharp navy">
                        <i class="bi bi-check2-circle"></i> Live Courses
                    </span>
                </div>
                <div>
                    <div class="stat-number-sharp">{{ $stats['total_programs'] }}</div>
                    <div class="d-flex align-items-center justify-content-between">
                        <span class="text-dark fw-bold small">Active Programs</span>
                        <span class="small text-muted">Published curriculum</span>
                    </div>
                </div>
            </div>
            <a href="{{ route('admin.programs.index') }}" class="stat-action-link" style="color: var(--hok-navy);">
                <span>Manage courses</span>
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </div>

    <!-- PILLAR 3: FACULTY (Medical Emerald Accent from 'O' in Logo) -->
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card-sharp emerald">
            <div>
                <div class="d-flex align-items-start justify-content-between mb-3">
                    <div class="stat-icon-sharp emerald">
                        <i class="bi bi-person-badge-fill"></i>
                    </div>
                    <span class="stat-badge-sharp emerald">
                        <i class="bi bi-star-fill" style="font-size: 0.6rem;"></i> Key Mentors
                    </span>
                </div>
                <div>
                    <div class="stat-number-sharp">{{ $stats['total_faculty'] }}</div>
                    <div class="d-flex align-items-center justify-content-between">
                        <span class="text-dark fw-bold small">Doctors &amp; Trainers</span>
                        <span class="small text-muted">Aesthetic faculty</span>
                    </div>
                </div>
            </div>
            <a href="{{ route('admin.faculty.index') }}" class="stat-action-link" style="color: var(--hok-emerald);">
                <span>View directory</span>
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </div>

    <!-- PILLAR 4: BLOGS & RESEARCH (Metallic Gold Accent from 'ACADEMY' & Star in Logo) -->
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card-sharp gold">
            <div>
                <div class="d-flex align-items-start justify-content-between mb-3">
                    <div class="stat-icon-sharp gold">
                        <i class="bi bi-journal-richtext"></i>
                    </div>
                    <span class="stat-badge-sharp gold">
                        <i class="bi bi-lightning-charge-fill" style="font-size: 0.6rem;"></i> Insights
                    </span>
                </div>
                <div>
                    <div class="stat-number-sharp">{{ $stats['total_blogs'] }}</div>
                    <div class="d-flex align-items-center justify-content-between">
                        <span class="text-dark fw-bold small">Articles &amp; News</span>
                        <span class="small text-muted">SEO content</span>
                    </div>
                </div>
            </div>
            <a href="{{ route('admin.blogs.index') }}" class="stat-action-link" style="color: var(--hok-gold-dark);">
                <span>Manage library</span>
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </div>
</div>

<!-- 3. MAIN GRID: RECENT INQUIRIES & ACADEMIC HUB -->
<div class="row g-4 mb-4">
    <!-- RECENT INQUIRIES TABLE (LEFT 8 COLS) -->
    <div class="col-lg-8">
        <div class="dashboard-panel-card h-100">
            <div class="dashboard-panel-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="header-icon-box" style="background: var(--hok-crimson-subtle); color: var(--hok-crimson);">
                        <i class="bi bi-inbox-fill"></i>
                    </div>
                    <div>
                        <h5 class="h6 fw-bold mb-0 text-dark">Recent Candidate Inquiries</h5>
                        <small class="text-muted">Direct prospective student applications</small>
                    </div>
                </div>
                <a href="{{ route('admin.inquiries.index') }}" class="btn btn-sm btn-outline-secondary rounded-pill px-3 shadow-none fw-semibold">
                    View All ({{ $stats['total_inquiries'] }})
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-sharp align-middle">
                    <thead>
                        <tr>
                            <th>Candidate</th>
                            <th>Direct Contact</th>
                            <th>Target Program</th>
                            <th>Status</th>
                            <th class="text-end pe-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentInquiries as $inq)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-2.5">
                                        <div class="candidate-avatar">
                                            {{ strtoupper(substr($inq->name, 0, 2)) }}
                                        </div>
                                        <div>
                                            <div class="fw-bold text-dark">{{ $inq->name }}</div>
                                            <small class="text-muted"><i class="bi bi-clock me-1"></i>{{ $inq->created_at->diffForHumans() }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div><a href="tel:{{ $inq->phone }}" class="text-decoration-none text-dark fw-semibold small"><i class="bi bi-telephone text-primary me-1"></i>{{ $inq->phone }}</a></div>
                                    <small class="text-muted"><a href="mailto:{{ $inq->email }}" class="text-decoration-none text-muted"><i class="bi bi-envelope text-muted me-1"></i>{{ $inq->email }}</a></small>
                                </td>
                                <td>
                                    <span class="badge border py-1.5 px-2.5 rounded-pill" style="background: rgba(13, 92, 58, 0.08); color: var(--hok-emerald); border-color: rgba(13, 92, 58, 0.25) !important;">
                                        <i class="bi bi-mortarboard me-1"></i>
                                        {{ $inq->program_name ?? $inq->profession_role ?? 'General Admission' }}
                                    </span>
                                </td>
                                <td>
                                    @if($inq->status === 'new')
                                        <span class="badge rounded-pill px-3 py-1.5 shadow-sm" style="background: var(--hok-crimson); color: #fff;">
                                            <i class="bi bi-circle-fill me-1" style="font-size: 0.45rem;"></i> New Lead
                                        </span>
                                    @elseif($inq->status === 'read')
                                        <span class="badge rounded-pill px-3 py-1.5 text-dark" style="background: #fef08a; border: 1px solid #fde047;">
                                            Reviewed
                                        </span>
                                    @elseif($inq->status === 'replied')
                                        <span class="badge rounded-pill px-3 py-1.5" style="background: var(--hok-emerald); color: #fff;">
                                            Replied
                                        </span>
                                    @else
                                        <span class="badge bg-secondary rounded-pill px-3 py-1.5">{{ ucfirst($inq->status) }}</span>
                                    @endif
                                </td>
                                <td class="text-end pe-3">
                                    <a href="{{ route('admin.inquiries.show', $inq->id) }}" class="btn btn-sm btn-light border rounded-pill px-3 fw-semibold shadow-none text-nowrap" style="color: var(--hok-navy);">
                                        <i class="bi bi-eye me-1"></i> Open
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted">
                                    <div class="mb-2">
                                        <i class="bi bi-inbox fs-1 text-muted" style="opacity: 0.6;"></i>
                                    </div>
                                    <p class="mb-0 fw-semibold">No candidate inquiries received yet.</p>
                                    <small class="text-muted">New website inquiries will instantly appear here.</small>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- QUICK ACTIONS & BRAND CONTROLS (RIGHT 4 COLS) -->
    <div class="col-lg-4">
        <!-- QUICK COMMAND HUB -->
        <div class="dashboard-panel-card p-3.5 mb-4">
            <div class="d-flex align-items-center justify-content-between mb-3 px-1">
                <div class="d-flex align-items-center gap-2">
                    <div class="header-icon-box" style="background: var(--hok-gold-subtle); color: var(--hok-gold-dark);">
                        <i class="bi bi-lightning-charge-fill"></i>
                    </div>
                    <h5 class="h6 fw-bold mb-0 text-dark">Quick Command Hub</h5>
                </div>
                <span class="badge bg-light text-secondary border small">Shortcuts</span>
            </div>

            <div>
                <a href="{{ route('admin.settings.index') }}" class="shortcut-card-item">
                    <span class="d-flex align-items-center gap-2.5">
                        <span class="shortcut-icon" style="background: rgba(7, 29, 58, 0.08); color: var(--hok-navy);">
                            <i class="bi bi-gear-fill"></i>
                        </span>
                        <span>
                            <span class="d-block fw-bold small text-dark">Website Settings</span>
                            <small class="text-muted" style="font-size: 0.75rem;">Logo, Phone, Contact &amp; SEO</small>
                        </span>
                    </span>
                    <i class="bi bi-chevron-right shortcut-arrow"></i>
                </a>

                <a href="{{ route('admin.hero-slides.index') }}" class="shortcut-card-item">
                    <span class="d-flex align-items-center gap-2.5">
                        <span class="shortcut-icon" style="background: var(--hok-gold-subtle); color: var(--hok-gold-dark);">
                            <i class="bi bi-images"></i>
                        </span>
                        <span>
                            <span class="d-block fw-bold small text-dark">Hero Carousel</span>
                            <small class="text-muted" style="font-size: 0.75rem;">Homepage main banner slides</small>
                        </span>
                    </span>
                    <i class="bi bi-chevron-right shortcut-arrow"></i>
                </a>

                <a href="{{ route('admin.faculty.index') }}" class="shortcut-card-item">
                    <span class="d-flex align-items-center gap-2.5">
                        <span class="shortcut-icon" style="background: var(--hok-emerald-subtle); color: var(--hok-emerald);">
                            <i class="bi bi-people-fill"></i>
                        </span>
                        <span>
                            <span class="d-block fw-bold small text-dark">Faculty Directory</span>
                            <small class="text-muted" style="font-size: 0.75rem;">Doctors &amp; Aesthetic trainers</small>
                        </span>
                    </span>
                    <i class="bi bi-chevron-right shortcut-arrow"></i>
                </a>

                <a href="{{ route('admin.pages.index') }}" class="shortcut-card-item">
                    <span class="d-flex align-items-center gap-2.5">
                        <span class="shortcut-icon" style="background: var(--hok-crimson-subtle); color: var(--hok-crimson);">
                            <i class="bi bi-file-earmark-code-fill"></i>
                        </span>
                        <span>
                            <span class="d-block fw-bold small text-dark">Pages &amp; SEO Meta</span>
                            <small class="text-muted" style="font-size: 0.75rem;">Page titles &amp; Google snippets</small>
                        </span>
                    </span>
                    <i class="bi bi-chevron-right shortcut-arrow"></i>
                </a>
            </div>
        </div>

        <!-- RECENT PUBLISHED BLOGS -->
        <div class="dashboard-panel-card p-3.5">
            <div class="d-flex align-items-center justify-content-between mb-3 px-1">
                <div class="d-flex align-items-center gap-2">
                    <div class="header-icon-box" style="background: var(--hok-gold-subtle); color: var(--hok-gold-dark);">
                        <i class="bi bi-journal-bookmark-fill"></i>
                    </div>
                    <h5 class="h6 fw-bold mb-0 text-dark">Recent Articles</h5>
                </div>
                <a href="{{ route('admin.blogs.index') }}" class="small text-decoration-none fw-bold" style="color: var(--hok-navy);">All Blogs &rarr;</a>
            </div>

            <div class="list-group list-group-flush">
                @forelse($recentBlogs as $rb)
                    <div class="list-group-item px-1 py-2.5 border-bottom d-flex justify-content-between align-items-center">
                        <div class="text-truncate me-2">
                            <a href="{{ route('admin.blogs.edit', $rb->id) }}" class="text-decoration-none text-dark fw-bold small d-block text-truncate">
                                {{ $rb->title }}
                            </a>
                            <small class="text-muted" style="font-size: 0.75rem;">
                                <i class="bi bi-calendar3 me-1"></i>
                                {{ $rb->published_at ? $rb->published_at->format('M d, Y') : 'Draft' }}
                            </small>
                        </div>
                        <a href="{{ route('admin.blogs.edit', $rb->id) }}" class="btn btn-sm btn-light border rounded-circle p-1 d-flex align-items-center justify-content-center shadow-none" style="width: 30px; height: 30px; flex-shrink: 0;" title="Edit Article">
                            <i class="bi bi-pencil-fill" style="font-size: 0.75rem; color: var(--hok-gold-dark);"></i>
                        </a>
                    </div>
                @empty
                    <div class="text-muted small py-4 text-center">No blog articles published yet.</div>
                @endforelse
            </div>
        </div>
    </div>
</div>

<!-- 4. RECENT ACTIVE PROGRAMS SECTION (BOTTOM 12 COLS) -->
<div class="row g-4">
    <div class="col-12">
        <div class="dashboard-panel-card">
            <div class="dashboard-panel-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="header-icon-box" style="background: rgba(7, 29, 58, 0.08); color: var(--hok-navy);">
                        <i class="bi bi-mortarboard-fill"></i>
                    </div>
                    <div>
                        <h5 class="h6 fw-bold mb-0 text-dark">Recently Updated Programs</h5>
                        <small class="text-muted">Active medical masterclasses and certifications</small>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <a href="{{ route('admin.programs.create') }}" class="btn btn-sm btn-hok-gold d-inline-flex align-items-center gap-1.5 shadow-sm fw-bold">
                        <i class="bi bi-plus-lg"></i>
                        <span>Add Course</span>
                    </a>
                    <a href="{{ route('admin.programs.index') }}" class="btn btn-sm btn-outline-secondary rounded-pill px-3 fw-semibold">
                        View All ({{ $stats['total_programs'] }})
                    </a>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-sharp align-middle">
                    <thead>
                        <tr>
                            <th>Program Title</th>
                            <th>Category</th>
                            <th>Duration / Format</th>
                            <th>Status</th>
                            <th class="text-end pe-4">Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentPrograms as $prog)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        @if($prog->thumbnail_image)
                                            <img src="{{ asset($prog->thumbnail_image) }}" alt="{{ $prog->title }}" class="program-thumb-frame">
                                        @else
                                            <div class="program-thumb-placeholder">
                                                <i class="bi bi-mortarboard"></i>
                                            </div>
                                        @endif
                                        <div>
                                            <a href="{{ route('admin.programs.edit', $prog->id) }}" class="fw-bold text-dark text-decoration-none d-block">
                                                {{ $prog->title }}
                                            </a>
                                            <small class="text-muted">Slug: <code>{{ $prog->slug }}</code></small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge border py-1 px-2.5 rounded-pill" style="background: rgba(212, 175, 55, 0.1); color: var(--hok-gold-dark); border-color: rgba(212, 175, 55, 0.3) !important;">
                                        {{ $prog->category->name ?? 'Clinical Training' }}
                                    </span>
                                </td>
                                <td>
                                    <div class="small fw-semibold text-dark">{{ $prog->duration ?? 'Comprehensive' }}</div>
                                    <small class="text-muted">{{ $prog->level ?? 'Fellowship / Masterclass' }}</small>
                                </td>
                                <td>
                                    @if($prog->is_active ?? true)
                                        <span class="badge rounded-pill px-3 py-1.5" style="background: var(--hok-emerald); color: #fff;">
                                            <i class="bi bi-check-circle me-1"></i> Active
                                        </span>
                                    @else
                                        <span class="badge bg-secondary rounded-pill px-3 py-1.5">Inactive</span>
                                    @endif
                                </td>
                                <td class="text-end pe-4 text-nowrap">
                                    <div class="d-inline-flex gap-1.5">
                                        <a href="{{ route('programs.show', $prog->slug) }}" target="_blank" class="btn btn-sm btn-light border rounded-pill px-2.5 py-1 text-secondary" title="Preview on Website">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.programs.edit', $prog->id) }}" class="btn btn-sm btn-light border rounded-pill px-2.5 py-1 text-primary" title="Edit Program">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">
                                    No programs available yet. Click "Add Course" above.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
