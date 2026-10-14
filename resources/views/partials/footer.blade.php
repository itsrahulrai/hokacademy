@php
    $sitePhone = \App\Models\Setting::get('contact_phone', '+91 99101 69317');
    $sitePhoneRaw = \App\Models\Setting::get('contact_phone_raw', '+919910169317');
    $siteEmail = \App\Models\Setting::get('contact_email', 'hokacademy@yahoo.com');
@endphp

<footer class="ftr">
    <div class="container">

        <!-- Brand + contact -->
        <div class="ftr-top">
            <div>
                <p class="ftr-brand">HOK <span>Academy</span></p>
                <p class="ftr-tag">International Academy of Medical Excellence</p>
                <p class="ftr-text">Specialist expertise, modern technology and practical clinical learning
                    together under one multidisciplinary platform.</p>
                <div class="btn-row">
                    <a href="{{ route('contact.index') }}" class="btn btn-light">Enquire Now</a>
                    <a href="{{ route('programs.index') }}" class="btn btn-ghost">Explore Programs</a>
                </div>
            </div>
            <div class="ftr-contact">
                <a class="ftr-tile" href="tel:{{ $sitePhoneRaw }}">
                    <span class="ftr-tile-ico"><i class="bi bi-telephone-fill"></i></span>
                    <span class="ftr-tile-txt"><small>Call us</small><strong>{{ $sitePhone }}</strong></span>
                </a>
                <a class="ftr-tile" href="mailto:{{ $siteEmail }}">
                    <span class="ftr-tile-ico"><i class="bi bi-envelope-fill"></i></span>
                    <span class="ftr-tile-txt"><small>Email us</small><strong>{{ $siteEmail }}</strong></span>
                </a>
                <a class="ftr-tile" href="{{ route('contact.index') }}">
                    <span class="ftr-tile-ico"><i class="bi bi-globe2"></i></span>
                    <span class="ftr-tile-txt"><small>Outside India?</small><strong>International
                            Enquiries</strong></span>
                </a>
            </div>
        </div>

        <!-- Link columns -->
        <div class="ftr-links">
            <div>
                <h4>Academy</h4>
                <ul>
                    <li><a href="{{ route('about.us') }}">About HOK</a></li>
                    <li><a href="{{ route('why.hok') }}">Why HOK Academy</a></li>
                    <li><a href="{{ route('faculty.index') }}">Our Faculty</a></li>
                    <li><a href="{{ route('blog.index') }}">Blog</a></li>
                    <li><a href="{{ route('contact.index') }}">Contact us</a></li>
                </ul>
            </div>
            <div>
                <h4>Programs for</h4>
                <ul>
                    <li><a href="{{ route('programs.index', ['category' => 'doctors']) }}" data-tab="wt-tab-doc">Doctors &amp; Medical Professionals</a></li>
                    <li><a href="{{ route('programs.index', ['category' => 'pmu']) }}" data-tab="wt-tab-pmu">PMU &amp; Aesthetic Professionals</a></li>
                    <li><a href="{{ route('programs.index', ['category' => 'nursing']) }}" data-tab="wt-tab-nur">Nursing, OT &amp; Paramedical</a></li>
                    <li><a href="{{ route('programs.index', ['category' => 'technicians']) }}" data-tab="wt-tab-las">Aesthetic &amp; Laser Technicians</a></li>
                    <li><a href="{{ route('programs.index') }}">All programs</a></li>
                </ul>
            </div>
            <div>
                <h4>Disciplines</h4>
                <ul>
                    <li><a href="{{ route('programs.show', 'aesthetic-cosmetic-medicine') }}">Aesthetic &amp; Cosmetic Medicine</a></li>
                    <li><a href="{{ route('programs.show', 'laser-energy-based-medicine') }}">Laser &amp; Energy-Based Medicine</a></li>
                    <li><a href="{{ route('programs.show', 'hair-restoration-transplantation') }}">Hair Restoration</a></li>
                    <li><a href="{{ route('programs.show', 'urology-endourology') }}">Urology &amp; Endourology</a></li>
                    <li><a href="{{ route('programs.show', 'general-surgery') }}">General Surgery</a></li>
                </ul>
            </div>
            <div>
                <h4>International</h4>
                <ul>
                    <li><a href="{{ route('international') }}">International Doctors</a></li>
                    <li><a href="{{ route('international') }}">International Programs</a></li>
                    <li><a href="{{ route('international') }}">Clinical Learning in India</a></li>
                    <li><a href="{{ route('international') }}">Partner With HOK Academy</a></li>
                </ul>
            </div>
        </div>

        <!-- Bottom bar -->
        <div class="ftr-bottom">
            <span>&copy; <span id="yr">{{ date('Y') }}</span> HOK Academy. All rights reserved.</span>
            <a href="#top" class="ftr-up">Back to top <i class="bi bi-arrow-up"></i></a>
        </div>
    </div>
</footer>
