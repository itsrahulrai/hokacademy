@extends('admin.layouts.app')

@section('title', 'Executive Overview')

@push('styles')
<style>
    /* ========================================================
       PREMIUM EXECUTIVE DASHBOARD STYLES - HOK ACADEMY
       ======================================================== */

    /* ---- Executive Hero Banner ---- */
    .dashboard-hero-sharp {
        background: linear-gradient(135deg, var(--hok-navy-deep) 0%, var(--hok-navy) 48%, var(--hok-navy-mid) 100%);
        color: #ffffff;
        border-radius: 18px;
        border: 1px solid rgba(212, 175, 55, 0.35) !important;
        border-top: 3px solid var(--hok-gold) !important;
        box-shadow: 0 16px 40px rgba(5, 19, 38, 0.16), inset 0 1px 0 rgba(255, 255, 255, 0.12);
        position: relative;
        overflow: hidden;
    }
    .dashboard-hero-sharp .ambient-gold {
        position: absolute;
        right: -60px;
        top: -60px;
        width: 360px;
        height: 360px;
        background: radial-gradient(circle, rgba(212, 175, 55, 0.22) 0%, rgba(212, 175, 55, 0) 70%);
        border-radius: 50%;
        pointer-events: none;
    }
    .dashboard-hero-sharp .ambient-teal {
        position: absolute;
        left: 32%;
        bottom: -80px;
        width: 280px;
        height: 280px;
        background: radial-gradient(circle, rgba(13, 92, 58, 0.25) 0%, rgba(13, 92, 58, 0) 70%);
        border-radius: 50%;
        pointer-events: none;
    }

    .hero-meta-bar {
        display: flex;
        align-items: center;
        gap: 10px;
        flex-wrap: wrap;
        margin-bottom: 0.95rem;
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
        letter-spacing: 0.4px;
        color: #f8fafc;
    }
    /* Hero Live Clock Executive Capsule */
    .hero-live-clock-capsule {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 5px 14px;
        background: rgba(255, 255, 255, 0.07);
        border: 1px solid rgba(255, 255, 255, 0.14);
        border-radius: 999px;
        backdrop-filter: blur(10px);
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.12), inset 0 1px 0 rgba(255, 255, 255, 0.1);
        color: #f1f5f9;
        font-size: 0.8rem;
        line-height: 1;
    }
    .hero-live-clock-capsule .live-status-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 3px 8px;
        border-radius: 999px;
        background: rgba(16, 185, 129, 0.15);
        border: 1px solid rgba(16, 185, 129, 0.35);
        color: #6ee7b7;
        font-size: 0.72rem;
        font-weight: 700;
        letter-spacing: 0.5px;
        text-transform: uppercase;
    }
    .hero-live-clock-capsule .clock-time-segment {
        font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace;
        font-weight: 700;
        letter-spacing: 0.5px;
        color: #ffffff;
        background: rgba(7, 29, 58, 0.5);
        padding: 4px 10px;
        border-radius: 6px;
        border: 1px solid rgba(212, 175, 55, 0.3);
        box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.3);
        font-variant-numeric: tabular-nums;
    }
    .hero-live-clock-capsule .date-segment {
        color: #e2e8f0;
        font-weight: 500;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }
    .hero-live-clock-capsule .capsule-divider {
        color: rgba(255, 255, 255, 0.25);
    }

    /* Hero welcome typography */
    .hero-welcome-title {
        font-family: 'Poppins', system-ui, -apple-system, sans-serif;
        font-size: 1.75rem;
        font-weight: 700;
        color: #ffffff !important;
        letter-spacing: -0.3px;
        line-height: 1.25;
        margin-bottom: 0.35rem;
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 8px;
    }
    .hero-welcome-prefix {
        font-weight: 600;
        color: #ffffff;
    }
    .hero-name-accent {
        color: #ffffff;
        font-weight: 700;
    }
    .hero-welcome-desc {
        color: rgba(241, 245, 249, 0.75);
        font-size: 0.86rem;
        font-weight: 400;
        line-height: 1.5;
        margin-bottom: 0;
        max-width: 620px;
    }

    /* Hero mini stats ribbon */
    .hero-stats-ribbon {
        margin-top: 1.5rem;
        padding-top: 1.25rem;
        border-top: 1px solid rgba(255, 255, 255, 0.12);
        display: flex;
        gap: 14px;
        flex-wrap: wrap;
    }
    .hero-stat-chip {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 6px 14px;
        background: rgba(255, 255, 255, 0.06);
        border: 1px solid rgba(255, 255, 255, 0.12);
        border-radius: 10px;
        font-size: 0.8rem;
        color: #e2e8f0;
        backdrop-filter: blur(6px);
        transition: all 0.2s ease;
    }
    .hero-stat-chip:hover {
        background: rgba(255, 255, 255, 0.1);
        border-color: rgba(212, 175, 55, 0.4);
        transform: translateY(-1px);
    }
    .hero-stat-chip strong {
        color: #ffffff;
        font-weight: 800;
        font-size: 0.95rem;
    }

    /* ---- 4 Pillar Metric Stat Cards (Compact Executive Design) ---- */
    .stat-card-sharp {
        background: #ffffff;
        border-radius: 14px;
        border: 1px solid #eef2f6;
        box-shadow: 0 2px 12px rgba(7, 29, 58, 0.04);
        padding: 1rem 1.15rem 0.9rem;
        position: relative;
        overflow: hidden;
        transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 100%;
    }
    .stat-card-sharp:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 24px rgba(7, 29, 58, 0.08);
        border-color: #cbd5e1;
    }
    .stat-card-sharp::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        border-radius: 14px 14px 0 0;
    }
    .stat-card-sharp.crimson::before { background: linear-gradient(90deg, #8b1532 0%, #e11d48 100%); }
    .stat-card-sharp.navy::before { background: linear-gradient(90deg, #071d3a 0%, #2563eb 100%); }
    .stat-card-sharp.emerald::before { background: linear-gradient(90deg, #0d5c3a 0%, #10b981 100%); }
    .stat-card-sharp.gold::before { background: linear-gradient(90deg, #c59b27 0%, #fbbf24 100%); }

    /* Ambient Corner Glow on Hover */
    .stat-card-sharp::after {
        content: '';
        position: absolute;
        top: -30px;
        right: -30px;
        width: 90px;
        height: 90px;
        border-radius: 50%;
        opacity: 0;
        pointer-events: none;
        transition: opacity 0.3s ease;
    }
    .stat-card-sharp.crimson::after { background: radial-gradient(circle, rgba(225, 29, 72, 0.15) 0%, transparent 70%); }
    .stat-card-sharp.navy::after { background: radial-gradient(circle, rgba(37, 99, 235, 0.15) 0%, transparent 70%); }
    .stat-card-sharp.emerald::after { background: radial-gradient(circle, rgba(16, 185, 129, 0.18) 0%, transparent 70%); }
    .stat-card-sharp.gold::after { background: radial-gradient(circle, rgba(212, 175, 55, 0.2) 0%, transparent 70%); }
    .stat-card-sharp:hover::after { opacity: 1; }

    .stat-icon-sharp {
        width: 38px;
        height: 38px;
        border-radius: 10px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 1.1rem;
        flex-shrink: 0;
        transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .stat-card-sharp:hover .stat-icon-sharp {
        transform: scale(1.06);
    }
    .stat-icon-sharp.crimson {
        background: linear-gradient(135deg, #fff1f2 0%, #ffe4e6 100%);
        color: #be123c;
        border: 1px solid #fecdd3;
        box-shadow: 0 2px 8px rgba(225, 29, 72, 0.12);
    }
    .stat-icon-sharp.navy {
        background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%);
        color: #1d4ed8;
        border: 1px solid #bfdbfe;
        box-shadow: 0 2px 8px rgba(29, 78, 216, 0.12);
    }
    .stat-icon-sharp.emerald {
        background: linear-gradient(135deg, #ecfdf5 0%, #d1fae5 100%);
        color: #047857;
        border: 1px solid #a7f3d0;
        box-shadow: 0 2px 8px rgba(16, 185, 129, 0.12);
    }
    .stat-icon-sharp.gold {
        background: linear-gradient(135deg, #fffbeb 0%, #fef3c7 100%);
        color: #b45309;
        border: 1px solid #fde68a;
        box-shadow: 0 2px 8px rgba(212, 175, 55, 0.14);
    }

    .stat-badge-sharp {
        padding: 3px 9px;
        border-radius: 999px;
        font-size: 0.68rem;
        font-weight: 700;
        letter-spacing: 0.2px;
        display: inline-flex;
        align-items: center;
        gap: 4px;
        line-height: 1;
    }
    .stat-badge-sharp.crimson {
        background: #fff1f2;
        color: #be123c;
        border: 1px solid #fecdd3;
    }
    .stat-badge-sharp.navy {
        background: #eff6ff;
        color: #1d4ed8;
        border: 1px solid #bfdbfe;
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
        font-family: 'Poppins', system-ui, -apple-system, sans-serif;
        font-size: 1.85rem;
        font-weight: 800;
        line-height: 1;
        letter-spacing: -0.03em;
        color: #0f172a;
        margin-bottom: 0.35rem;
    }

    .stat-label-title {
        font-family: 'Poppins', system-ui, -apple-system, sans-serif;
        font-size: 0.88rem;
        font-weight: 700;
        color: #1e293b;
        line-height: 1.2;
        margin-bottom: 2px;
    }
    .stat-label-sub {
        font-size: 0.74rem;
        color: #64748b;
        line-height: 1.35;
    }

    .stat-action-link {
        display: flex;
        align-items: center;
        justify-content: space-between;
        font-size: 0.76rem;
        font-weight: 700;
        text-decoration: none;
        padding: 0.45rem 0.7rem;
        background: #f8fafc;
        border: 1px solid #edf2f7;
        border-radius: 8px;
        margin-top: 0.85rem;
        transition: all 0.22s ease;
    }
    .stat-action-link i {
        font-size: 0.72rem;
        transition: transform 0.2s ease;
    }
    .stat-card-sharp:hover .stat-action-link {
        background: #f1f5f9;
        border-color: #cbd5e1;
    }
    .stat-card-sharp:hover .stat-action-link i {
        transform: translateX(3px);
    }
    .stat-action-link i {
        transition: transform 0.2s ease;
    }
    .stat-card-sharp:hover .stat-action-link i {
        transform: translateX(5px);
    }

    /* ---- Executive Card Containers ---- */
    .dashboard-panel-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(7, 29, 58, 0.04);
        overflow: hidden;
    }
    .dashboard-panel-header {
        background: #ffffff;
        border-bottom: 1px solid #f1f5f9;
        padding: 1.25rem 1.5rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 12px;
    }
    .header-icon-box {
        width: 38px;
        height: 38px;
        border-radius: 11px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 1.15rem;
        flex-shrink: 0;
    }

    /* ---- Razor-Sharp Tables ---- */
    .table-sharp {
        margin-bottom: 0;
    }
    .table-sharp thead th {
        background: #f8fafc;
        color: #475569;
        font-size: 0.74rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        padding: 0.95rem 1.35rem;
        border-bottom: 1px solid #e2e8f0;
        border-top: none;
        white-space: nowrap;
    }
    .table-sharp tbody td {
        padding: 1.15rem 1.35rem;
        vertical-align: middle;
        border-bottom: 1px solid #f1f5f9;
        font-size: 0.89rem;
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

    /* ---- Candidate Avatar Badge ---- */
    .candidate-avatar {
        width: 42px;
        height: 42px;
        border-radius: 12px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        font-size: 0.86rem;
        color: var(--hok-navy);
        background: linear-gradient(135deg, #edf2f7 0%, #e2e8f0 100%);
        border: 1px solid #cbd5e1;
        flex-shrink: 0;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.04);
    }
    .candidate-avatar.new-lead {
        background: linear-gradient(135deg, #ffe4e6 0%, #fecdd3 100%);
        color: var(--hok-crimson);
        border-color: #fda4af;
    }

    /* ---- Quick Command Shortcut Cards ---- */
    .shortcut-card-item {
        background: #ffffff;
        border: 1px solid #eef2f6;
        border-radius: 12px;
        padding: 13px 15px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        text-decoration: none;
        color: #1e293b;
        transition: all 0.22s cubic-bezier(0.16, 1, 0.3, 1);
        margin-bottom: 8px;
        position: relative;
        overflow: hidden;
    }
    .shortcut-card-item:last-child {
        margin-bottom: 0;
    }
    .shortcut-card-item::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 3.5px;
        background: transparent;
        transition: background-color 0.2s ease;
    }
    .shortcut-card-item:hover {
        background: #f8fafc;
        border-color: #cbd5e1;
        transform: translateX(4px);
        box-shadow: 0 4px 16px rgba(7, 29, 58, 0.06);
        color: var(--hok-navy);
    }
    .shortcut-card-item:hover::before {
        background: var(--hok-gold);
    }
    .shortcut-card-item .shortcut-icon {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 1.15rem;
        flex-shrink: 0;
        transition: all 0.2s ease;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.04);
    }
    .shortcut-card-item:hover .shortcut-icon {
        transform: scale(1.06);
    }
    .shortcut-card-item .shortcut-title {
        font-size: 0.88rem;
        font-weight: 700;
        color: #0f172a;
        line-height: 1.3;
        transition: color 0.2s ease;
    }
    .shortcut-card-item:hover .shortcut-title {
        color: var(--hok-navy);
    }
    .shortcut-card-item .shortcut-desc {
        font-size: 0.76rem;
        color: #64748b;
        margin-top: 1px;
    }
    .shortcut-card-item .shortcut-arrow-wrap {
        width: 28px;
        height: 28px;
        border-radius: 8px;
        background: #f8fafc;
        border: 1px solid #f1f5f9;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        transition: all 0.2s ease;
    }
    .shortcut-card-item .shortcut-arrow {
        color: #94a3b8;
        font-size: 0.75rem;
        transition: transform 0.2s ease, color 0.2s ease;
    }
    .shortcut-card-item:hover .shortcut-arrow-wrap {
        background: var(--hok-navy);
        border-color: var(--hok-navy);
    }
    .shortcut-card-item:hover .shortcut-arrow {
        color: #ffffff;
        transform: translateX(1px);
    }

    /* ---- Program Thumbnail Frame ---- */
    .program-thumb-frame {
        width: 58px;
        height: 42px;
        border-radius: 10px;
        object-fit: cover;
        border: 1px solid #e2e8f0;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
        flex-shrink: 0;
        transition: transform 0.2s ease;
    }
    .table-sharp tbody tr:hover .program-thumb-frame {
        transform: scale(1.05);
    }
    .program-thumb-placeholder {
        width: 58px;
        height: 42px;
        border-radius: 10px;
        background: linear-gradient(135deg, var(--hok-navy) 0%, var(--hok-navy-light) 100%);
        border: 1px solid #cbd5e1;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        color: #ffffff;
        font-size: 1.25rem;
        flex-shrink: 0;
        box-shadow: 0 2px 8px rgba(7, 29, 58, 0.12);
    }

    .program-code-sub {
        font-size: 0.77rem;
        color: #64748b;
        font-family: ui-monospace, SFMono-Regular, Menlo, monospace;
        display: flex;
        align-items: center;
        gap: 3px;
        margin-top: 3px;
    }

    .program-cat-pill {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 5px 13px;
        border-radius: 8px;
        background: #f8fafc;
        color: #334155;
        font-size: 0.78rem;
        font-weight: 600;
        border: 1px solid #e2e8f0;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.02);
    }
    .program-cat-pill .cat-dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: var(--hok-gold);
    }

    /* Modern clean status badges */
    .modern-status-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 5px 13px;
        border-radius: 999px;
        font-size: 0.76rem;
        font-weight: 600;
        line-height: 1;
    }
    .modern-status-badge.active {
        background: #ecfdf5;
        color: #065f46;
        border: 1px solid #a7f3d0;
    }
    .modern-status-badge.active .status-pulse-dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: #10b981;
        box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.7);
        animation: pulseBeacon 2s infinite;
    }
    .modern-status-badge.inactive {
        background: #f1f5f9;
        color: #64748b;
        border: 1px solid #e2e8f0;
    }
    .modern-status-badge.inactive .status-inactive-dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: #94a3b8;
    }

    /* Action buttons in tables */
    .action-btn-pill {
        width: 36px;
        height: 36px;
        border-radius: 10px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 0.88rem;
        border: 1px solid #e2e8f0;
        background: #ffffff;
        color: #475569;
        transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04);
        text-decoration: none;
    }
    .action-btn-pill.preview:hover {
        background: #f8fafc;
        border-color: var(--hok-navy);
        color: var(--hok-navy);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(7, 29, 58, 0.15);
    }
    .action-btn-pill.edit:hover {
        background: #fffbeb;
        border-color: var(--hok-gold);
        color: var(--hok-gold-dark);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(197, 155, 39, 0.2);
    }

    /* Pulse beacon for new lead status */
    .lead-status-beacon {
        display: inline-block;
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: #ffffff;
        box-shadow: 0 0 0 0 rgba(255, 255, 255, 0.7);
        animation: pulseBeacon 1.8s infinite;
        margin-right: 4px;
        vertical-align: middle;
    }

    /* Recent blog list item */
    .blog-item-card {
        padding: 13px 14px;
        border-radius: 12px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
        transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
        border: 1px solid transparent;
        margin-bottom: 4px;
    }
    .blog-item-card:hover {
        background-color: #f8fafc;
        border-color: #e2e8f0;
        transform: translateX(3px);
    }
    .blog-item-card:last-child {
        margin-bottom: 0;
    }

    /* Header action & View All buttons (Matches Add Course structure & size in executive navy) */
    .btn-view-all {
        background: linear-gradient(135deg, #071d3a 0%, #0d2e59 100%);
        color: #ffffff !important;
        border: none;
        font-weight: 700;
        font-size: 0.875rem;
        padding: 0.55rem 1.15rem;
        border-radius: 10px;
        box-shadow: 0 4px 14px rgba(7, 29, 58, 0.25);
        display: inline-flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
        transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
        line-height: 1.25;
    }
    .btn-view-all .count-pill {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: rgba(255, 255, 255, 0.18);
        color: #ffffff;
        font-size: 0.76rem;
        font-weight: 800;
        padding: 2px 7px;
        border-radius: 6px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        transition: all 0.2s ease;
    }
    .btn-view-all:hover {
        background: linear-gradient(135deg, #0d2e59 0%, #133f78 100%);
        color: #ffffff !important;
        transform: translateY(-1px);
        box-shadow: 0 6px 18px rgba(7, 29, 58, 0.35);
    }
    .btn-view-all:hover .count-pill {
        background: rgba(255, 255, 255, 0.28);
    }
    .btn-view-all i {
        font-size: 0.85rem;
        transition: transform 0.2s ease;
    }
    .btn-view-all:hover i {
        transform: translateX(2px);
    }
</style>
@endpush

@section('content')

<!-- 1. EXECUTIVE HERO BANNER -->
<div class="card dashboard-hero-sharp mb-4">
    <div class="ambient-gold"></div>
    <div class="ambient-teal"></div>
    
    <div class="card-body px-4 py-3.5 position-relative">
        <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
            <div>
                <div class="mb-2">
                    <div class="hero-live-clock-capsule">
                        <span class="live-status-badge">
                            <span class="pulse-dot"></span>
                            <span>Live</span>
                        </span>
                        <span class="date-segment">
                            <i class="bi bi-calendar3" style="color: var(--hok-gold-light); font-size: 0.76rem;"></i>
                            <span id="liveDateDisplay">{{ now()->format('l, F j, Y') }}</span>
                        </span>
                        <span class="capsule-divider">&bull;</span>
                        <span class="clock-time-segment" id="liveClockDisplay">--:--:--</span>
                    </div>
                </div>
                <h1 class="hero-welcome-title">
                    Welcome back, {{ auth()->user()->name ?? 'HOK Academy' }}
                </h1>
                <p class="hero-welcome-desc">
                    Here is what's happening across candidate admissions, masterclasses, and academy insights today.
                </p>
            </div>

            <!-- Quick Action Buttons -->
            <div class="d-flex align-items-center flex-wrap gap-2">
                <a href="{{ route('admin.programs.create') }}" class="btn btn-hok-gold d-inline-flex align-items-center gap-1.5 shadow-sm fw-bold" style="padding: 0.55rem 1.15rem; border-radius: 10px; font-size: 0.86rem;">
                    <i class="bi bi-plus-lg"></i>
                    <span>New Program</span>
                </a>
                <a href="{{ route('admin.blogs.create') }}" class="btn btn-outline-light d-inline-flex align-items-center gap-1.5 fw-semibold" style="border-color: rgba(255, 255, 255, 0.25); background: rgba(255, 255, 255, 0.08); backdrop-filter: blur(6px); padding: 0.55rem 1.15rem; border-radius: 10px; font-size: 0.86rem;">
                    <i class="bi bi-pencil-square" style="color: var(--hok-gold-light);"></i>
                    <span>Write Article</span>
                </a>
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
                    @if($stats['new_inquiries'] > 0)
                        <span class="stat-badge-sharp crimson">
                            <span class="lead-status-beacon" style="background: #be123c;"></span>
                            Action Needed
                        </span>
                    @else
                        <span class="stat-badge-sharp emerald">
                            <i class="bi bi-check2-circle"></i> Up to Date
                        </span>
                    @endif
                </div>
                <div>
                    <div class="stat-number-sharp">{{ $stats['new_inquiries'] }}</div>
                    <div class="stat-label-title">New Inquiries</div>
                    <div class="stat-label-sub">Total Received: <strong class="text-dark">{{ $stats['total_inquiries'] }}</strong></div>
                </div>
            </div>
            <a href="{{ route('admin.inquiries.index') }}" class="stat-action-link" style="color: var(--hok-crimson);">
                <span>Respond to candidate leads</span>
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
                    <div class="stat-label-title">Active Programs</div>
                    <div class="stat-label-sub">Published clinical curriculum</div>
                </div>
            </div>
            <a href="{{ route('admin.programs.index') }}" class="stat-action-link" style="color: var(--hok-navy);">
                <span>Manage programs directory</span>
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
                    <div class="stat-label-title">Doctors &amp; Trainers</div>
                    <div class="stat-label-sub">Aesthetic clinical faculty</div>
                </div>
            </div>
            <a href="{{ route('admin.faculty.index') }}" class="stat-action-link" style="color: var(--hok-emerald);">
                <span>View faculty directory</span>
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
                    <div class="stat-label-title">Articles &amp; News</div>
                    <div class="stat-label-sub">{{ $stats['total_pages'] }} Published SEO pages</div>
                </div>
            </div>
            <a href="{{ route('admin.blogs.index') }}" class="stat-action-link" style="color: var(--hok-gold-dark);">
                <span>Manage research library</span>
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
                        <small class="text-muted">Direct prospective student applications received online</small>
                    </div>
                </div>
                <a href="{{ route('admin.inquiries.index') }}" class="btn-view-all">
                    <span>View All</span>
                    <span class="count-pill">{{ $stats['total_inquiries'] }}</span>
                    <i class="bi bi-arrow-right"></i>
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
                            <th class="text-end pe-4">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentInquiries as $inq)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="candidate-avatar {{ $inq->status === 'new' ? 'new-lead' : '' }}">
                                            {{ strtoupper(substr($inq->name, 0, 2)) }}
                                        </div>
                                        <div>
                                            <div class="fw-bold text-dark">{{ $inq->name }}</div>
                                            <div class="text-muted d-flex align-items-center gap-1.5" style="font-size: 0.76rem;">
                                                <i class="bi bi-clock"></i>
                                                <span>{{ $inq->created_at ? $inq->created_at->diffForHumans() : 'Recently' }}</span>
                                                @if(!empty($inq->country))
                                                    <span>&bull;</span>
                                                    <span><i class="bi bi-geo-alt"></i> {{ $inq->country }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    @if($inq->phone)
                                        <div class="mb-1">
                                            <a href="tel:{{ $inq->phone }}" class="text-decoration-none text-dark fw-semibold small d-inline-flex align-items-center gap-1.5">
                                                <i class="bi bi-telephone-fill text-primary" style="font-size: 0.78rem;"></i>
                                                <span>{{ $inq->phone }}</span>
                                            </a>
                                        </div>
                                    @endif
                                    @if($inq->email)
                                        <div>
                                            <a href="mailto:{{ $inq->email }}" class="text-decoration-none text-muted small d-inline-flex align-items-center gap-1.5" style="font-size: 0.78rem;">
                                                <i class="bi bi-envelope-fill text-secondary" style="font-size: 0.78rem;"></i>
                                                <span>{{ $inq->email }}</span>
                                            </a>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge border py-1.5 px-2.5 rounded-pill" style="background: rgba(13, 92, 58, 0.08); color: var(--hok-emerald); border-color: rgba(13, 92, 58, 0.25) !important; font-weight: 600;">
                                        <i class="bi bi-mortarboard me-1"></i>
                                        {{ $inq->program_name ?? $inq->profession_role ?? 'General Admission' }}
                                    </span>
                                </td>
                                <td>
                                    @if($inq->status === 'new')
                                        <span class="badge rounded-pill px-3 py-1.5 shadow-sm" style="background: var(--hok-crimson); color: #fff;">
                                            <span class="lead-status-beacon"></span> New Lead
                                        </span>
                                    @elseif($inq->status === 'read')
                                        <span class="badge rounded-pill px-3 py-1.5 text-dark" style="background: #fef08a; border: 1px solid #fde047; font-weight: 600;">
                                            <i class="bi bi-eye-fill me-1" style="font-size: 0.7rem;"></i> Reviewed
                                        </span>
                                    @elseif($inq->status === 'replied')
                                        <span class="badge rounded-pill px-3 py-1.5" style="background: var(--hok-emerald); color: #fff; font-weight: 600;">
                                            <i class="bi bi-check-all me-1"></i> Replied
                                        </span>
                                    @else
                                        <span class="badge bg-secondary rounded-pill px-3 py-1.5">{{ ucfirst($inq->status) }}</span>
                                    @endif
                                </td>
                                <td class="text-end pe-4">
                                    <a href="{{ route('admin.inquiries.show', $inq->id) }}" class="btn btn-sm btn-light border rounded-pill px-3 fw-semibold shadow-none text-nowrap" style="color: var(--hok-navy);">
                                        <i class="bi bi-eye me-1"></i> Open
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted">
                                    <div class="mb-2">
                                        <i class="bi bi-inbox fs-1 text-muted" style="opacity: 0.5;"></i>
                                    </div>
                                    <p class="mb-0 fw-semibold text-dark">No candidate inquiries received yet.</p>
                                    <small class="text-muted">New website inquiries will instantly appear in real-time here.</small>
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
        <div class="dashboard-panel-card mb-4">
            <div class="dashboard-panel-header">
                <div class="d-flex align-items-center gap-2.5">
                    <div class="header-icon-box" style="background: var(--hok-gold-subtle); color: var(--hok-gold-dark);">
                        <i class="bi bi-lightning-charge-fill"></i>
                    </div>
                    <div>
                        <h5 class="h6 fw-bold mb-0 text-dark">Quick Command Hub</h5>
                        <small class="text-muted" style="font-size: 0.76rem;">Admin management shortcuts</small>
                    </div>
                </div>
                <span class="badge rounded-pill border" style="background: #f8fafc; color: #475569; font-weight: 600; font-size: 0.72rem; padding: 4px 10px;">Shortcuts</span>
            </div>

            <div class="px-3 py-2.5">
                <a href="{{ route('admin.settings.index') }}" class="shortcut-card-item">
                    <div class="d-flex align-items-center gap-3">
                        <span class="shortcut-icon" style="background: rgba(7, 29, 58, 0.08); color: var(--hok-navy);">
                            <i class="bi bi-gear-fill"></i>
                        </span>
                        <div>
                            <span class="shortcut-title d-block">Website Settings</span>
                            <span class="shortcut-desc d-block">Logo, Phone, Contact &amp; SEO</span>
                        </div>
                    </div>
                    <span class="shortcut-arrow-wrap">
                        <i class="bi bi-chevron-right shortcut-arrow"></i>
                    </span>
                </a>

                <a href="{{ route('admin.hero-slides.index') }}" class="shortcut-card-item">
                    <div class="d-flex align-items-center gap-3">
                        <span class="shortcut-icon" style="background: var(--hok-gold-subtle); color: var(--hok-gold-dark);">
                            <i class="bi bi-images"></i>
                        </span>
                        <div>
                            <span class="shortcut-title d-block">Hero Carousel</span>
                            <span class="shortcut-desc d-block">Homepage main banner slides</span>
                        </div>
                    </div>
                    <span class="shortcut-arrow-wrap">
                        <i class="bi bi-chevron-right shortcut-arrow"></i>
                    </span>
                </a>

                <a href="{{ route('admin.faculty.index') }}" class="shortcut-card-item">
                    <div class="d-flex align-items-center gap-3">
                        <span class="shortcut-icon" style="background: var(--hok-emerald-subtle); color: var(--hok-emerald);">
                            <i class="bi bi-people-fill"></i>
                        </span>
                        <div>
                            <span class="shortcut-title d-block">Faculty Directory</span>
                            <span class="shortcut-desc d-block">Doctors &amp; Aesthetic trainers</span>
                        </div>
                    </div>
                    <span class="shortcut-arrow-wrap">
                        <i class="bi bi-chevron-right shortcut-arrow"></i>
                    </span>
                </a>

                <a href="{{ route('admin.pages.index') }}" class="shortcut-card-item">
                    <div class="d-flex align-items-center gap-3">
                        <span class="shortcut-icon" style="background: var(--hok-crimson-subtle); color: var(--hok-crimson);">
                            <i class="bi bi-file-earmark-code-fill"></i>
                        </span>
                        <div>
                            <span class="shortcut-title d-block">Pages &amp; SEO Meta</span>
                            <span class="shortcut-desc d-block">Page titles &amp; Google snippets</span>
                        </div>
                    </div>
                    <span class="shortcut-arrow-wrap">
                        <i class="bi bi-chevron-right shortcut-arrow"></i>
                    </span>
                </a>

                <a href="{{ route('admin.categories.index') }}" class="shortcut-card-item">
                    <div class="d-flex align-items-center gap-3">
                        <span class="shortcut-icon" style="background: #f1f5f9; color: #475569;">
                            <i class="bi bi-grid-3x3-gap-fill"></i>
                        </span>
                        <div>
                            <span class="shortcut-title d-block">Program Categories</span>
                            <span class="shortcut-desc d-block">Organize clinical specialties</span>
                        </div>
                    </div>
                    <span class="shortcut-arrow-wrap">
                        <i class="bi bi-chevron-right shortcut-arrow"></i>
                    </span>
                </a>
            </div>
        </div>

        <!-- RECENT PUBLISHED BLOGS -->
        <div class="dashboard-panel-card">
            <div class="dashboard-panel-header">
                <div class="d-flex align-items-center gap-2.5">
                    <div class="header-icon-box" style="background: var(--hok-gold-subtle); color: var(--hok-gold-dark);">
                        <i class="bi bi-journal-bookmark-fill"></i>
                    </div>
                    <div>
                        <h5 class="h6 fw-bold mb-0 text-dark">Recent Articles</h5>
                        <small class="text-muted" style="font-size: 0.76rem;">Published clinical insights</small>
                    </div>
                </div>
                <a href="{{ route('admin.blogs.index') }}" class="btn-action-view" style="width: auto; height: 34px; padding: 0 12px; font-size: 0.78rem; font-weight: 700; gap: 5px; text-decoration: none;" title="View all blogs">
                    <span>All Blogs</span>
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>

            <div class="px-3 py-2">
                @forelse($recentBlogs as $rb)
                    <div class="blog-item-card">
                        <div class="pe-2 text-truncate" style="flex: 1; min-width: 0;">
                            <a href="{{ route('admin.blogs.edit', $rb->id) }}" class="text-decoration-none text-dark fw-bold small d-block text-truncate mb-1.5" title="{{ $rb->title }}">
                                {{ $rb->title }}
                            </a>
                            <div class="text-muted d-flex align-items-center flex-wrap gap-2" style="font-size: 0.76rem;">
                                <span class="d-inline-flex align-items-center gap-1">
                                    <i class="bi bi-calendar3" style="color: var(--hok-gold-dark); font-size: 0.72rem;"></i>
                                    <span>{{ $rb->published_at ? $rb->published_at->format('M d, Y') : 'Draft' }}</span>
                                </span>
                                @if($rb->category_tag)
                                    <span class="text-muted">&bull;</span>
                                    <span class="badge border" style="background: #f8fafc; color: #475569; font-size: 0.7rem; font-weight: 600; padding: 3px 8px; border-radius: 6px;">{{ $rb->category_tag }}</span>
                                @endif
                            </div>
                        </div>
                        <a href="{{ route('admin.blogs.edit', $rb->id) }}" class="btn-action-btn btn-action-edit" title="Edit Article">
                            <i class="bi bi-pencil-fill"></i>
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
                        <small class="text-muted">Active clinical masterclasses, diplomas, and certifications</small>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <a href="{{ route('admin.programs.create') }}" class="btn btn-sm btn-hok-gold d-inline-flex align-items-center gap-1.5 shadow-sm fw-bold">
                        <i class="bi bi-plus-lg"></i>
                        <span>Add Course</span>
                    </a>
                    <a href="{{ route('admin.programs.index') }}" class="btn-view-all">
                        <span>View All</span>
                        <span class="count-pill">{{ $stats['total_programs'] }}</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th style="width: 60px;">Order</th>
                            <th>Image</th>
                            <th>Program Title</th>
                            <th>Category</th>
                            <th>Duration</th>
                            <th>Featured</th>
                            <th>Status</th>
                            <th class="text-end" style="min-width: 140px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentPrograms as $prog)
                            <tr>
                                <td>
                                    <span class="badge bg-light text-dark border">{{ $prog->sort_order }}</span>
                                </td>
                                <td>
                                    <img src="{{ $prog->image_url }}" alt="{{ $prog->title }}" class="rounded object-fit-cover shadow-sm" style="width: 55px; height: 40px;">
                                </td>
                                <td>
                                    <strong class="d-block text-dark">{{ $prog->title }}</strong>
                                    <small class="text-muted text-truncate d-inline-block" style="max-width: 280px;">{{ $prog->short_description }}</small>
                                </td>
                                <td>
                                    <span class="badge border" style="background: rgba(12, 42, 82, 0.06); color: var(--hok-navy); border-color: rgba(12, 42, 82, 0.2) !important;">
                                        {{ $prog->category->name ?? '-' }}
                                    </span>
                                </td>
                                <td>
                                    <small class="fw-semibold text-dark">{{ $prog->duration ?? 'Flexible' }}</small>
                                </td>
                                <td>
                                    @if($prog->is_featured)
                                        <span class="badge rounded-pill px-2 py-1" style="background: #fef08a; color: #854d0e; border: 1px solid #fde047;">
                                            <i class="bi bi-star-fill me-1"></i> Featured
                                        </span>
                                    @else
                                        <span class="text-muted small">-</span>
                                    @endif
                                </td>
                                <td>
                                    @if($prog->is_active)
                                        <span class="badge rounded-pill px-2 py-1" style="background: var(--hok-emerald); color: #fff;">
                                            Active
                                        </span>
                                    @else
                                        <span class="badge bg-secondary rounded-pill px-2 py-1">Draft</span>
                                    @endif
                                </td>
                                <td class="text-end text-nowrap">
                                    <div class="table-actions">
                                        <a href="{{ route('programs.show', $prog->slug) }}" target="_blank" class="btn-action-btn btn-action-view" title="Preview on Website">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.programs.edit', $prog->id) }}" class="btn-action-btn btn-action-edit" title="Edit Program">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('admin.programs.destroy', $prog->id) }}" method="POST" class="d-inline m-0 p-0" onsubmit="return confirm('Are you sure you want to delete this program?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-action-btn btn-action-delete" title="Delete Program">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-4 text-muted">No programs available yet. Click "Add Course" above.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    (function() {
        function updateLiveDateTime() {
            var clockEl = document.getElementById('liveClockDisplay');
            var dateEl = document.getElementById('liveDateDisplay');
            if (!clockEl) return;

            var now = new Date();

            // Format 12-hour time with seconds: e.g. 06:17:35 PM
            var hours = now.getHours();
            var minutes = now.getMinutes();
            var seconds = now.getSeconds();
            var ampm = hours >= 12 ? 'PM' : 'AM';
            hours = hours % 12;
            hours = hours ? hours : 12; // 0 hour is 12 AM
            var strHours = hours < 10 ? '0' + hours : hours;
            var strMinutes = minutes < 10 ? '0' + minutes : minutes;
            var strSeconds = seconds < 10 ? '0' + seconds : seconds;

            clockEl.textContent = strHours + ':' + strMinutes + ':' + strSeconds + ' ' + ampm;

            if (dateEl) {
                var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
                dateEl.textContent = now.toLocaleDateString(undefined, options);
            }
        }

        updateLiveDateTime();
        setInterval(updateLiveDateTime, 1000);
    })();
</script>
@endpush
