<div class="admin-topbar">
    <div class="d-flex align-items-center gap-3">
        <button class="btn btn-sm btn-outline-secondary d-lg-none" id="sidebarToggle" type="button" aria-label="Toggle navigation">
            <i class="bi bi-list fs-5"></i>
        </button>
    </div>

    <div class="d-flex align-items-center gap-3">
        <a href="{{ route('home') }}" target="_blank" class="btn-live-site d-none d-md-inline-flex align-items-center gap-2">
            <i class="bi bi-globe2 text-warning"></i>
            <span>Live Website</span>
            <i class="bi bi-arrow-up-right small text-muted"></i>
        </a>

        <div class="dropdown">
            <button class="user-dropdown-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                @php
                    $userName = auth()->user()->name ?? 'Admin';
                    $initials = strtoupper(substr($userName, 0, 1));
                @endphp
                <span class="user-avatar-circle">{{ $initials }}</span>
                <div class="text-start d-none d-sm-block pe-1">
                    <span class="fw-bold d-block text-dark small leading-tight" style="line-height: 1.1;">{{ $userName }}</span>
                    <span class="text-muted" style="font-size: 0.7rem;">Administrator</span>
                </div>
            </button>
            <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 rounded-4 mt-2 py-2" style="min-width: 210px; border-top: 3px solid var(--hok-gold) !important;">
                <li class="px-3 py-2 border-bottom mb-1">
                    <div class="fw-bold text-dark small">{{ $userName }}</div>
                    <div class="text-muted" style="font-size: 0.72rem;">{{ auth()->user()->email ?? 'admin@hokacademy.com' }}</div>
                </li>
                <li><a class="dropdown-item py-2 small fw-semibold" href="{{ route('admin.profile') }}"><i class="bi bi-person-gear me-2 text-primary"></i> Profile &amp; Password</a></li>
                <li><a class="dropdown-item py-2 small fw-semibold" href="{{ route('admin.settings.index') }}"><i class="bi bi-sliders me-2 text-warning"></i> Site Settings</a></li>
                <li><hr class="dropdown-divider my-1"></li>
                <li>
                    <form action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger py-2 small fw-bold">
                            <i class="bi bi-box-arrow-right me-2"></i> Log Out
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>

