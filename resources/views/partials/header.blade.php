@php
    $sitePhone = \App\Models\Setting::get('contact_phone', '+91 99101 69317');
    $sitePhoneRaw = \App\Models\Setting::get('contact_phone_raw', '+919910169317');
    $siteEmail = \App\Models\Setting::get('contact_email', 'hokacademy@yahoo.com');
@endphp

<div class="topbar">
    <div class="container topbar-in">
        <div class="topbar-links">
            <a href="tel:{{ $sitePhoneRaw }}"><i class="bi bi-telephone-fill"></i>{{ $sitePhone }}</a>
            <a href="mailto:{{ $siteEmail }}" class="d-none d-md-inline-flex"><i
                    class="bi bi-envelope-fill"></i>{{ $siteEmail }}</a>
        </div>
        <a href="{{ route('contact.index') }}" class="topbar-chip"><i class="bi bi-globe2"></i>International Enquiries</a>
    </div>
</div>

<nav class="navbar navbar-expand-lg sticky-top hdr" aria-label="Main">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('assets/img/logo.jpg') }}" width="150" alt="HOK Academy">
        </a>

        <!-- Mobile actions -->
        <div class="hdr-actions d-lg-none">
            <a href="tel:{{ $sitePhoneRaw }}" class="hdr-btn" aria-label="Call HOK Academy"><i
                    class="bi bi-telephone"></i></a>
            <button class="hdr-btn is-menu" type="button" data-bs-toggle="offcanvas" data-bs-target="#nav"
                aria-controls="nav" aria-label="Open menu"><i class="bi bi-list"></i></button>
        </div>

        <!-- Desktop: inline nav. Mobile/tablet: slide-in drawer -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="nav" aria-labelledby="navLabel">
            <div class="offcanvas-header">
                <span class="oc-title" id="navLabel">HOK Academy</span>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                    aria-label="Close menu"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" aria-current="page"
                            href="{{ route('home') }}">Home</a>
                    </li>

                    <!-- ABOUT HOK -->
                    <li class="nav-item dropdown mega-host">
                        <a class="nav-link dropdown-toggle {{ request()->is('about-us*', 'vision-mission*', 'why-hok*', 'our-multidisciplinary*', 'learning-philosophy*') ? 'active' : '' }}"
                            href="{{ route('about.us') }}" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">About HOK</a>
                        <div class="dropdown-menu mega">
                            <div class="row g-4">
                                <div class="col-lg-4 d-none d-lg-block">
                                    <div class="mega-cta">
                                        <h3>International Academy of Medical Excellence</h3>
                                        <p>Specialist expertise, modern technology and practical clinical
                                            learning under one multidisciplinary platform.</p>
                                        <a href="{{ route('about.us') }}" class="btn btn-light btn-sm">About the Academy</a>
                                    </div>
                                </div>
                                <div class="col-lg-4 c-navy">
                                    <a class="dropdown-item mega-all d-lg-none" href="{{ route('about.us') }}">About the
                                        academy</a>
                                    <h6 class="mt-2 mt-lg-0">About Academy</h6>
                                    <a class="dropdown-item" href="{{ route('about.us') }}">About us</a>
                                    <a class="dropdown-item" href="{{ route('vision.mission') }}">Our Vision & Mission</a>
                                    <a class="dropdown-item" href="{{ route('why.hok') }}">Why HOK Academy</a>
                                    <a class="dropdown-item" href="{{ route('our.multidisciplinary') }}">Our Multidisciplinary
                                        Model</a>
                                </div>
                                <div class="col-lg-4 c-teal">
                                    <h6>Learning Philosophy</h6>
                                    <a class="dropdown-item" href="{{ route('learning.philosophy') }}#scientific">Scientific
                                        Foundations</a>
                                    <a class="dropdown-item" href="{{ route('learning.philosophy') }}#reasoning">Clinical Reasoning</a>
                                    <a class="dropdown-item" href="{{ route('learning.philosophy') }}#practical">Practical Learning</a>
                                    <a class="dropdown-item" href="{{ route('learning.philosophy') }}#case">Case-Based Learning</a>
                                    <a class="dropdown-item" href="{{ route('learning.philosophy') }}#safety">Patient Safety</a>
                                    <a class="dropdown-item" href="{{ route('learning.philosophy') }}#development">Professional
                                        Development</a>
                                </div>
                            </div>
                        </div>
                    </li>

                    <!-- PROGRAMS -->
                    <li class="nav-item dropdown mega-host">
                        <a class="nav-link dropdown-toggle {{ request()->is('programs*') ? 'active' : '' }}"
                            href="{{ route('programs.index') }}" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">Programs</a>
                        <div class="dropdown-menu mega">
                            <div class="row g-4">
                                <div class="col-lg-3 c-navy">
                                    <a class="dropdown-item mega-all d-lg-none" href="{{ route('programs.index') }}">All
                                        programs</a>
                                    <h6 class="mt-2 mt-lg-0">Doctors &amp; Medical Professionals</h6>
                                    <a class="dropdown-item" href="{{ route('programs.index') }}">Aesthetic &amp;
                                        Cosmetic Medicine</a>
                                    <a class="dropdown-item" href="{{ route('programs.index') }}">Advanced
                                        Injectables</a>
                                    <a class="dropdown-item" href="{{ route('programs.index') }}">Laser &amp; Energy-Based
                                        Medicine</a>
                                    <a class="dropdown-item" href="{{ route('programs.index') }}">Hair Restoration &amp; Hair
                                        Transplantation</a>
                                    <a class="dropdown-item" href="{{ route('programs.index') }}">Medical Nutrition
                                        &amp; Weight Management</a>
                                    <a class="dropdown-item" href="{{ route('programs.index') }}">Cosmetic &amp; Surgical
                                        Gynaecology</a>
                                    <a class="dropdown-item" href="{{ route('programs.index') }}">Urology &amp;
                                        Endourology</a>
                                    <a class="dropdown-item" href="{{ route('programs.index') }}">General Surgery</a>
                                    <a class="dropdown-item" href="{{ route('programs.index') }}">Oral &amp; Maxillofacial
                                        Surgery</a>
                                </div>
                                <div class="col-lg-3 c-teal">
                                    <h6>PMU &amp; Aesthetic Professionals</h6>
                                    <a class="dropdown-item" href="{{ route('programs.index') }}">Permanent Makeup</a>
                                    <a class="dropdown-item" href="{{ route('programs.index') }}">Medical PMU</a>
                                    <a class="dropdown-item" href="{{ route('programs.index') }}">Medical
                                        Camouflage</a>
                                    <a class="dropdown-item" href="{{ route('programs.index') }}">Scar Camouflage</a>
                                    <a class="dropdown-item" href="{{ route('programs.index') }}">Areola/Nipple
                                        Camouflage</a>
                                    <a class="dropdown-item" href="{{ route('programs.index') }}">Pigment Science &amp;
                                        Colour Theory</a>
                                </div>
                                <div class="col-lg-3 c-blue">
                                    <h6>Nursing, OT &amp; Paramedical</h6>
                                    <a class="dropdown-item" href="{{ route('programs.index') }}">Nursing &amp; Clinical
                                        Care</a>
                                    <a class="dropdown-item" href="{{ route('programs.index') }}">OT Protocols</a>
                                    <a class="dropdown-item" href="{{ route('programs.index') }}">Surgical Assistance</a>
                                    <a class="dropdown-item" href="{{ route('programs.index') }}">Instrumentation</a>
                                    <a class="dropdown-item" href="{{ route('programs.index') }}">Sterilisation
                                        &amp; Infection Control</a>
                                    <a class="dropdown-item" href="{{ route('programs.index') }}">Perioperative Care</a>
                                </div>
                                <div class="col-lg-3 c-red">
                                    <h6>Aesthetic &amp; Laser Technicians</h6>
                                    <a class="dropdown-item" href="{{ route('programs.index') }}">Laser
                                        Fundamentals</a>
                                    <a class="dropdown-item" href="{{ route('programs.index') }}">Device Handling</a>
                                    <a class="dropdown-item" href="{{ route('programs.index') }}">Energy-Based
                                        Technologies</a>
                                    <a class="dropdown-item" href="{{ route('programs.index') }}">Treatment-Room
                                        Protocols</a>
                                    <a class="dropdown-item" href="{{ route('programs.index') }}">Equipment Safety</a>
                                </div>
                            </div>
                            <div class="mega-foot">
                                <p>Discover the academic pathway that fits your professional journey.</p>
                                <a href="{{ route('programs.index') }}" class="btn btn-hok btn-sm">Explore All Programs</a>
                            </div>
                        </div>
                    </li>

                    <!-- FACULTY -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('faculty.index') ? 'active' : '' }}" aria-current="page"
                            href="{{ route('faculty.index') }}">Faculty</a>
                    </li>

                    <!-- INTERNATIONAL -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('international') ? 'active' : '' }}" aria-current="page"
                            href="{{ route('international') }}">International</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('blog*') ? 'active' : '' }}" href="{{ route('blog.index') }}">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('contact.index') ? 'active' : '' }}" href="{{ route('contact.index') }}">Contact us</a>
                    </li>
                </ul>

                <!-- HEADER CTA -->
                <div class="nav-cta">
                    <a href="{{ route('contact.index') }}" class="btn btn-hok">Enquire Now</a>
                    <a href="tel:{{ $sitePhoneRaw }}" class="btn btn-line nav-call"><i
                            class="bi bi-telephone-fill me-2"></i>{{ $sitePhone }}</a>
                </div>
            </div>
        </div>
    </div>
</nav>
