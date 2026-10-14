@php
    $unreadInquiries = \App\Models\Inquiry::where('status', 'new')->count();
    $siteLogo = \App\Models\Setting::get('site_logo', 'assets/img/logo.jpg');
@endphp

<aside class="admin-sidebar">
    <div class="brand">
        <a href="{{ route('admin.dashboard') }}" class="brand-link" title="HOK Academy Dashboard">
            <div class="brand-logo-frame">
                <img src="{{ asset('assets/img/hok-logo-hq.png') }}" alt="HOK Academy Logo" onerror="this.src='{{ asset($siteLogo) }}'">
            </div>
        </a>
    </div>

    <ul class="sidebar-menu">
        <li class="menu-header">Overview</li>
        <li>
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>
        </li>

        <li class="menu-header">Communication</li>
        <li>
            <a href="{{ route('admin.inquiries.index') }}" class="{{ request()->routeIs('admin.inquiries.*') ? 'active' : '' }}">
                <i class="bi bi-envelope"></i> Inquiries
                @if($unreadInquiries > 0)
                    <span class="badge" style="background: var(--hok-crimson); color: #fff; font-size: 0.72rem; box-shadow: 0 2px 6px rgba(139, 21, 50, 0.4);">{{ $unreadInquiries }} New</span>
                @endif
            </a>
        </li>

        <li class="menu-header">Academic Management</li>
        <li>
            <a href="{{ route('admin.programs.index') }}" class="{{ request()->routeIs('admin.programs.*') ? 'active' : '' }}">
                <i class="bi bi-mortarboard"></i> Programs &amp; Courses
            </a>
        </li>
        <li>
            <a href="{{ route('admin.categories.index') }}" class="{{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                <i class="bi bi-folder2"></i> Program Categories
            </a>
        </li>
        <li>
            <a href="{{ route('admin.faculty.index') }}" class="{{ request()->routeIs('admin.faculty.*') ? 'active' : '' }}">
                <i class="bi bi-people"></i> Faculty Members
            </a>
        </li>

        <li class="menu-header">Content &amp; Media</li>
        <li>
            <a href="{{ route('admin.blogs.index') }}" class="{{ request()->routeIs('admin.blogs.*') ? 'active' : '' }}">
                <i class="bi bi-journal-richtext"></i> Blogs
            </a>
        </li>
        <li>
            <a href="{{ route('admin.hero-slides.index') }}" class="{{ request()->routeIs('admin.hero-slides.*') ? 'active' : '' }}">
                <i class="bi bi-images"></i> Hero Slides
            </a>
        </li>
        <li>
            <a href="{{ route('admin.why-features.index') }}" class="{{ request()->routeIs('admin.why-features.*') ? 'active' : '' }}">
                <i class="bi bi-stars"></i> Why HOK &amp; Philosophy
            </a>
        </li>

        <li class="menu-header">SEO &amp; Pages</li>
        <li>
            <a href="{{ route('admin.pages.index') }}" class="{{ request()->routeIs('admin.pages.*') ? 'active' : '' }}">
                <i class="bi bi-file-earmark-code"></i> Pages
            </a>
        </li>

        <li class="menu-header">System</li>
        <li>
            <a href="{{ route('admin.settings.index') }}" class="{{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                <i class="bi bi-gear"></i> Settings
            </a>
        </li>
        <li>
            <form action="{{ route('admin.logout') }}" method="POST" class="m-0 p-0">
                @csrf
                <button type="submit" class="logout-item">
                    <i class="bi bi-box-arrow-right"></i> Log Out
                </button>
            </form>
        </li>
    </ul>
</aside>

