<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') | HOK Academy Control Panel</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Poppins:wght@400;500;600;700;800&family=Playfair+Display:ital,wght@0,600;0,700;1,600&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    
    <!-- Jodit Rich Text Editor CSS (Self-hosted + CDN fallback) -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/jodit/jodit.min.css') }}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jodit/4.1.16/jodit.fat.min.css"/>
    
    <style>
        :root {
            --sidebar-width: 270px;
            /* Official Logo Palette */
            --hok-navy-deep: #051326;
            --hok-navy: #071d3a;
            --hok-navy-mid: #0c2a52;
            --hok-navy-light: #164074;
            
            --hok-emerald: #0d5c3a;
            --hok-emerald-light: #10b981;
            --hok-emerald-subtle: rgba(13, 92, 58, 0.08);
            
            --hok-crimson: #8b1532;
            --hok-crimson-light: #e11d48;
            --hok-crimson-subtle: rgba(139, 21, 50, 0.08);
            
            --hok-gold: #c59b27;
            --hok-gold-light: #e6ca65;
            --hok-gold-dark: #9e7514;
            --hok-gold-grad: linear-gradient(135deg, #d4af37 0%, #aa7c11 100%);
            --hok-gold-subtle: rgba(197, 155, 39, 0.1);
            
            --admin-bg: #f4f6fa;
            --admin-card-border: #e6ecf5;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--admin-bg);
            color: #1e293b;
            min-height: 100vh;
        }

        /* ---- Custom Scrollbar ---- */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        ::-webkit-scrollbar-track {
            background: rgba(0, 0, 0, 0.03);
        }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 999px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: var(--hok-gold);
        }

        /* ---- Sidebar ---- */
        .admin-sidebar {
            width: var(--sidebar-width);
            background: linear-gradient(180deg, var(--hok-navy-deep) 0%, var(--hok-navy) 40%, var(--hok-navy-mid) 100%);
            color: #fff;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 1000;
            overflow-y: auto;
            border-right: 1px solid rgba(212, 175, 55, 0.2);
            box-shadow: 4px 0 24px rgba(5, 19, 38, 0.4);
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .admin-sidebar .brand {
            padding: 0.9rem 1.15rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            background: rgba(0, 0, 0, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .admin-sidebar .brand-link {
            display: block;
            width: 100%;
            text-decoration: none;
        }

        .admin-sidebar .brand-logo-frame {
            background: #ffffff;
            padding: 8px 14px;
            border-radius: 12px;
            box-shadow: 0 4px 18px rgba(0, 0, 0, 0.28);
            border: 1px solid rgba(212, 175, 55, 0.45);
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .admin-sidebar .brand-link:hover .brand-logo-frame {
            border-color: var(--hok-gold-light);
            box-shadow: 0 6px 22px rgba(197, 155, 39, 0.35);
            transform: translateY(-2px);
        }

        .admin-sidebar .brand-logo-frame img {
            max-height: 44px;
            width: auto;
            max-width: 100%;
            object-fit: contain;
            display: block;
        }

        .sidebar-menu {
            padding: 0.35rem 0.75rem 2rem;
            list-style: none;
            margin: 0;
        }

        .sidebar-menu .menu-header {
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            color: #8195af;
            padding: 0.9rem 0.85rem 0.35rem;
            font-weight: 800;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .sidebar-menu .menu-header:first-of-type {
            padding-top: 0.35rem;
        }

        .sidebar-menu .menu-header::after {
            content: '';
            flex: 1;
            height: 1px;
            background: rgba(255, 255, 255, 0.06);
        }

        .sidebar-menu a,
        .sidebar-menu button {
            display: flex;
            align-items: center;
            width: 100%;
            padding: 0.72rem 1rem;
            color: #c5d3ea;
            text-decoration: none;
            border-radius: 10px;
            margin-bottom: 4px;
            font-weight: 500;
            font-size: 0.92rem;
            transition: all 0.2s ease;
            position: relative;
            background: transparent;
            border: none;
            text-align: left;
            cursor: pointer;
        }

        .sidebar-menu a i,
        .sidebar-menu button i {
            font-size: 1.15rem;
            margin-right: 12px;
            width: 22px;
            text-align: center;
            color: #8da4c4;
            transition: color 0.2s ease, transform 0.2s ease;
        }

        .sidebar-menu a:hover,
        .sidebar-menu button:hover {
            color: #ffffff;
            background: rgba(255, 255, 255, 0.08);
            transform: translateX(3px);
        }

        .sidebar-menu a:hover i,
        .sidebar-menu button:hover i {
            color: var(--hok-gold-light);
        }

        .sidebar-menu button.logout-item {
            color: #fca5a5;
            background: rgba(225, 29, 72, 0.14);
            border: 1px solid rgba(225, 29, 72, 0.24);
            margin-top: 6px;
            font-weight: 600;
        }

        .sidebar-menu button.logout-item i {
            color: #ff4d6d;
        }

        .sidebar-menu button.logout-item:hover {
            color: #ffffff;
            background: rgba(225, 29, 72, 0.26);
            border-color: rgba(225, 29, 72, 0.45);
            transform: translateX(3px);
            box-shadow: 0 4px 14px rgba(225, 29, 72, 0.25);
        }

        .sidebar-menu button.logout-item:hover i {
            color: #ffffff;
        }

        .sidebar-menu a.active {
            background: var(--hok-gold-grad);
            color: var(--hok-navy-deep);
            font-weight: 700;
            box-shadow: 0 4px 16px rgba(197, 155, 39, 0.35);
        }

        .sidebar-menu a.active i {
            color: var(--hok-navy-deep);
        }

        .sidebar-menu .badge {
            margin-left: auto;
            font-weight: 700;
            padding: 0.35rem 0.6rem;
            border-radius: 999px;
        }

        /* ---- Main Wrapper ---- */
        .admin-main {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }

        /* ---- Topbar ---- */
        .admin-topbar {
            background: #ffffff;
            padding: 0.85rem 2rem;
            border-bottom: 1px solid var(--admin-card-border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 990;
            box-shadow: 0 4px 20px rgba(7, 29, 58, 0.03);
        }

        .admin-topbar .page-context {
            font-size: 0.95rem;
            font-weight: 700;
            color: var(--hok-navy);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .admin-topbar .page-context i {
            color: var(--hok-gold);
        }

        .btn-live-site {
            background: rgba(7, 29, 58, 0.04);
            color: var(--hok-navy);
            border: 1px solid #cbd5e1;
            font-weight: 600;
            font-size: 0.85rem;
            padding: 0.4rem 0.95rem;
            border-radius: 999px;
            transition: all 0.2s ease;
            text-decoration: none;
        }

        .btn-live-site:hover {
            background: var(--hok-navy);
            color: #ffffff;
            border-color: var(--hok-navy);
            box-shadow: 0 4px 12px rgba(7, 29, 58, 0.2);
        }

        .user-dropdown-btn {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 999px;
            padding: 0.35rem 0.95rem 0.35rem 0.45rem;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.2s ease;
        }

        .user-dropdown-btn:hover {
            border-color: var(--hok-gold);
            background: #fafafa;
        }

        .user-avatar-circle {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: var(--hok-gold-grad);
            color: var(--hok-navy-deep);
            font-weight: 800;
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 6px rgba(197, 155, 39, 0.3);
        }

        /* ---- Content Canvas ---- */
        .admin-content {
            padding: 2rem;
            flex-grow: 1;
        }

        /* ---- Luxury Card System ---- */
        .card-custom {
            background: #ffffff;
            border: 1px solid var(--admin-card-border);
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(7, 29, 58, 0.04);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .card-custom:hover {
            box-shadow: 0 8px 30px rgba(7, 29, 58, 0.08);
        }

        /* ---- Themed Buttons ---- */
        .btn-hok-gold,
        .btn-hok-admin {
            background: var(--hok-gold-grad);
            color: var(--hok-navy-deep);
            border: none;
            font-weight: 700;
            padding: 0.55rem 1.35rem;
            border-radius: 10px;
            box-shadow: 0 4px 14px rgba(197, 155, 39, 0.3);
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .btn-hok-gold:hover,
        .btn-hok-admin:hover {
            background: linear-gradient(135deg, #e6ca65 0%, #c59b27 100%);
            color: var(--hok-navy-deep);
            transform: translateY(-1px);
            box-shadow: 0 6px 18px rgba(197, 155, 39, 0.4);
        }

        .btn-hok-navy {
            background: var(--hok-navy);
            color: #ffffff;
            border: 1px solid var(--hok-navy-mid);
            font-weight: 600;
            padding: 0.55rem 1.35rem;
            border-radius: 10px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.2s ease;
            text-decoration: none;
        }

        .btn-hok-navy:hover {
            background: var(--hok-navy-mid);
            color: #ffffff;
            transform: translateY(-1px);
            box-shadow: 0 6px 18px rgba(7, 29, 58, 0.25);
        }

        .btn-hok-crimson {
            background: var(--hok-crimson);
            color: #ffffff;
            font-weight: 600;
            border: none;
            border-radius: 10px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
        }

        .btn-hok-crimson:hover {
            background: #731129;
            color: #ffffff;
        }

        .btn-hok-emerald {
            background: var(--hok-emerald);
            color: #ffffff;
            font-weight: 600;
            border: none;
            border-radius: 10px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
        }

        .btn-hok-emerald:hover {
            background: #09472c;
            color: #ffffff;
        }

        /* ---- Action Button System ---- */
        .table-actions {
            display: inline-flex;
            align-items: center;
            justify-content: flex-end;
            gap: 8px;
            white-space: nowrap;
        }

        .btn-action-btn {
            width: 36px;
            height: 36px;
            min-width: 36px;
            border-radius: 9px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 0.9rem;
            transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
            border: 1px solid transparent;
            text-decoration: none;
            background: #ffffff;
            cursor: pointer;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            padding: 0;
            margin: 0;
            line-height: 1;
        }

        .btn-action-view {
            color: #475569;
            background: #f8fafc;
            border-color: #cbd5e1;
        }
        .btn-action-view:hover {
            color: #ffffff;
            background: var(--hok-navy);
            border-color: var(--hok-navy);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(7, 29, 58, 0.25);
        }

        .btn-action-edit {
            color: var(--hok-navy-mid);
            background: rgba(12, 42, 82, 0.06);
            border-color: rgba(12, 42, 82, 0.22);
        }
        .btn-action-edit:hover {
            color: #ffffff;
            background: var(--hok-navy-mid);
            border-color: var(--hok-navy-mid);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(12, 42, 82, 0.25);
        }

        .btn-action-delete {
            color: var(--hok-crimson);
            background: rgba(139, 21, 50, 0.06);
            border-color: rgba(139, 21, 50, 0.22);
        }
        .btn-action-delete:hover {
            color: #ffffff;
            background: var(--hok-crimson);
            border-color: var(--hok-crimson);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(139, 21, 50, 0.3);
        }

        /* ---- Tables ---- */
        .table thead th {
            font-size: 0.78rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #64748b;
            background: #f8fafc;
            border-bottom: 2px solid #e2e8f0;
            padding: 0.85rem 1rem;
        }

        .table tbody td {
            padding: 1rem;
            vertical-align: middle;
            border-bottom: 1px solid #f1f5f9;
        }

        /* ---- Executive Modern Pagination ---- */
        .card-footer nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
        }

        .card-footer p.text-muted,
        .card-footer .small.text-muted {
            font-size: 0.86rem !important;
            color: #64748b !important;
            font-weight: 500;
            margin-bottom: 0;
            display: flex;
            align-items: center;
            gap: 4px;
            flex-wrap: wrap;
        }

        .card-footer p.text-muted .fw-semibold,
        .card-footer .small.text-muted .fw-semibold {
            color: var(--hok-navy-mid);
            font-weight: 700 !important;
            background: #f1f5f9;
            padding: 2px 7px;
            border-radius: 6px;
            border: 1px solid #e2e8f0;
            display: inline-block;
            line-height: 1.2;
            font-size: 0.82rem;
        }

        ul.pagination {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin: 0;
            padding: 0;
            list-style: none;
            border: none;
        }

        ul.pagination .page-item {
            margin: 0;
        }

        ul.pagination .page-item .page-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 36px;
            height: 36px;
            padding: 0 10px;
            font-size: 0.85rem;
            font-weight: 600;
            color: #475569;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 9px !important;
            transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.04);
            text-decoration: none;
            line-height: 1;
        }

        ul.pagination .page-item:not(.active):not(.disabled) .page-link:hover {
            color: var(--hok-navy);
            background: #f8fafc;
            border-color: #cbd5e1;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(15, 23, 42, 0.08);
        }

        ul.pagination .page-item.active .page-link {
            color: #ffffff !important;
            background: linear-gradient(135deg, var(--hok-navy) 0%, var(--hok-navy-light) 100%) !important;
            border-color: var(--hok-navy) !important;
            border-top: 2px solid var(--hok-gold) !important;
            box-shadow: 0 4px 14px rgba(7, 29, 58, 0.25) !important;
            font-weight: 700;
            transform: translateY(-1px);
        }

        ul.pagination .page-item.disabled .page-link {
            color: #94a3b8 !important;
            background: #f8fafc !important;
            border-color: #f1f5f9 !important;
            opacity: 0.65;
            cursor: not-allowed;
            box-shadow: none;
            pointer-events: none;
        }

        ul.pagination .page-item:first-child .page-link,
        ul.pagination .page-item:last-child .page-link {
            font-size: 1.05rem;
            font-weight: 500;
        }

        ul.pagination .page-item .page-link:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(197, 155, 39, 0.2);
            border-color: var(--hok-gold);
        }

        /* ---- Mobile Offcanvas ---- */
        @media (max-width: 991.98px) {
            .admin-sidebar {
                transform: translateX(-100%);
            }
            .admin-sidebar.show {
                transform: translateX(0);
            }
            .admin-main {
                margin-left: 0;
            }
            .admin-content {
                padding: 1.25rem;
            }
        }
    </style>
    @stack('styles')
</head>
<body>

    <!-- SIDEBAR -->
    @include('admin.partials.sidebar')

    <!-- MAIN WRAPPER -->
    <div class="admin-main">
        <!-- TOPBAR -->
        @include('admin.partials.navbar')

        <!-- CONTENT -->
        <div class="admin-content">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show rounded-3 mb-4 d-flex align-items-center" role="alert" style="border-left: 4px solid var(--hok-emerald);">
                    <i class="bi bi-check-circle-fill me-2 fs-5 text-success"></i>
                    <div>{{ session('success') }}</div>
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show rounded-3 mb-4 d-flex align-items-center" role="alert" style="border-left: 4px solid var(--hok-crimson);">
                    <i class="bi bi-exclamation-triangle-fill me-2 fs-5 text-danger"></i>
                    <div>{{ session('error') }}</div>
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(isset($errors) && $errors->any())
                <div class="alert alert-danger alert-dismissible fade show rounded-3 mb-4" role="alert" style="border-left: 4px solid var(--hok-crimson);">
                    <strong>Please review the required details:</strong>
                    <ul class="mb-0 mt-2">
                        @foreach($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @yield('content')
        </div>

        <footer class="mt-auto py-3 bg-white border-top text-center text-muted small">
            &copy; {{ date('Y') }} <strong>HOK Academy</strong> — International Academy of Medical Excellence. All rights reserved.
        </footer>
    </div>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Jodit Editor JS (Self-hosted complete bundle with CDN fallback) -->
    <script src="{{ asset('assets/vendor/jodit/jodit.min.js') }}"></script>
    <script>
        if (typeof Jodit === 'undefined') {
            document.write('<script src="https://cdnjs.cloudflare.com/ajax/libs/jodit/4.1.16/jodit.fat.min.js"><\/script>');
        }
    </script>
    <script>
        document.getElementById('sidebarToggle')?.addEventListener('click', function() {
            document.querySelector('.admin-sidebar').classList.toggle('show');
        });

        // Initialize Jodit Editors with Full Two-Tier Toolbar matching user specification (https://xdsoft.net/jodit/)
        (function initAllJoditEditors() {
            function init() {
                var JoditObj = (typeof Jodit !== 'undefined') ? (Jodit.make ? Jodit : (window.Jodit && window.Jodit.make ? window.Jodit : null)) : null;
                if (!JoditObj) {
                    console.warn('Jodit editor library not loaded yet, retrying...');
                    setTimeout(init, 150);
                    return;
                }

                document.querySelectorAll('.jodit-editor').forEach(function(el) {
                    if (el.dataset.joditReady === 'true') return;
                    el.dataset.joditReady = 'true';
                    try {
                        var editor = JoditObj.make(el, {
                            height: el.dataset.height ? parseInt(el.dataset.height) : 480,
                            minHeight: 380,
                            theme: 'default',
                            toolbarAdaptive: false,
                            toolbarSticky: true,
                            toolbarStickyOffset: 70,
                            placeholder: el.getAttribute('placeholder') || 'Start writing detailed curriculum, overview, modules and clinical practice...',
                            showCharsCounter: true,
                            showWordsCounter: true,
                            showXPathInStatusbar: true,
                            buttons: [
                                'bold', 'italic', 'underline', 'strikethrough', 'eraser', '|',
                                'ul', 'ol', '|',
                                'font', 'fontsize', 'paragraph', 'lineHeight', '|',
                                'superscript', 'subscript', 'classSpan', '|',
                                'image', 'file', 'video',
                                '\n',
                                'cut', 'copy', 'paste', 'selectall', 'copyformat', '|',
                                'table', 'hr', 'link', 'symbol', '|',
                                'indent', 'outdent', 'align', '|',
                                'brush', 'undo', 'redo', '|',
                                'find', 'source', 'fullsize', 'preview', 'print', 'about'
                            ],
                            uploader: {
                                insertImageAsBase64URI: true
                            }
                        });

                        // Keep underlying textarea synchronized on form submit
                        if (el.form) {
                            el.form.addEventListener('submit', function() {
                                if (editor && typeof editor.value !== 'undefined') {
                                    el.value = editor.value;
                                }
                            });
                        }
                    } catch (e) {
                        console.error('Jodit initialization error:', e);
                    }
                });
            }

            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', init);
            } else {
                init();
            }
        })();
    </script>
    @stack('scripts')
</body>
</html>
