@extends('layouts.app')

@section('content')
<main id="main">
    <!-- ============ HERO CAROUSEL START ============ -->
    <section class="hero-car" aria-label="Highlights">
        <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="6500"
            data-bs-touch="true">
            <div class="carousel-inner">

                <!-- SLIDE 01 | Visual: international doctors + premium medical academy / clinical environment -->
                <div class="carousel-item active">
                    <div class="slide-grid" style="--accent:var(--navy)">
                        <div class="slide-copy">
                            <p class="slide-cat">International Academy of Medical Excellence</p>
                            <h1 class="slide-title sm">Advancing Medical Knowledge. Transforming Clinical Practice.</h1>
                            <p class="slide-desc">HOK Academy brings specialist expertise, modern technology and
                                practical clinical learning together under one multidisciplinary platform.</p>
                            <div class="btn-row">
                                <a href="{{ route('about.us') }}" class="btn btn-hok btn-lg">About HOK</a>
                            </div>
                        </div>
                        <div class="slide-visual">
                            <img src="{{ asset('assets/img/slide-01.jpg') }}" class="slide-img" width="800" height="580"
                                alt="International Academy Of Medical Excellence" fetchpriority="high"
                                onerror="this.remove()">
                            <div class="vis-icons">
                                <i class="bi bi-hospital main"></i>
                                <i class="bi bi-globe2 sub s1"></i>
                                <i class="bi bi-person-badge sub s2"></i>
                                <i class="bi bi-heart-pulse sub s3"></i>
                                <i class="bi bi-award sub s4"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SLIDE 02 | Visual: 2-3 doctors / specialists in a professional clinical discussion -->
                <div class="carousel-item">
                    <div class="slide-grid" style="--accent:var(--teal)">
                        <div class="slide-copy">
                            <p class="slide-cat">Learn from Specialists</p>
                            <h2 class="slide-title">Expertise That Goes Beyond One Speciality.</h2>
                            <p class="slide-desc">A multidisciplinary faculty of doctors, surgeons and healthcare
                                specialists bringing diverse clinical perspectives together.</p>
                            <div class="btn-row">
                                <a href="{{ route('faculty.index') }}" class="btn btn-hok btn-lg">Meet Our Faculty</a>
                            </div>
                        </div>
                        <div class="slide-visual">
                            <img src="{{ asset('assets/img/slide-02.jpg') }}" class="slide-img" width="800" height="580"
                                alt="Learn From Specialists" loading="lazy" onerror="this.remove()">
                            <div class="vis-icons">
                                <i class="bi bi-people main"></i>
                                <i class="bi bi-clipboard2-pulse sub s1"></i>
                                <i class="bi bi-chat-square-text sub s2"></i>
                                <i class="bi bi-person-vcard sub s3"></i>
                                <i class="bi bi-stethoscope sub s4"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SLIDE 03 | Visual: clean collage - medical training / aesthetic procedure / surgical education -->
                <div class="carousel-item">
                    <div class="slide-grid" style="--accent:var(--primary)">
                        <div class="slide-copy">
                            <p class="slide-cat">Advanced Medical Education</p>
                            <h2 class="slide-title">From Aesthetics to Advanced Surgery.</h2>
                            <p class="slide-desc">Focused education across Aesthetic Medicine, Injectables, Laser
                                &amp; Energy-Based Medicine, Hair Restoration, Gynaecology, Urology, Surgery and
                                more.</p>
                            <div class="btn-row">
                                <a href="{{ route('programs.index') }}" class="btn btn-hok btn-lg">Explore Programs</a>
                            </div>
                        </div>
                        <div class="slide-visual">
                            <img src="{{ asset('assets/img/slide-03.jpg') }}" class="slide-img" width="800" height="580"
                                alt="Advanced Medical Education" loading="lazy" onerror="this.remove()">
                            <div class="vis-icons">
                                <i class="bi bi-activity main"></i>
                                <i class="bi bi-droplet-half sub s1"></i>
                                <i class="bi bi-lightning-charge sub s2"></i>
                                <i class="bi bi-scissors sub s3"></i>
                                <i class="bi bi-gender-female sub s4"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SLIDE 04 | Visual: international doctor + Indian specialist, subtle India / global connection -->
                <div class="carousel-item">
                    <div class="slide-grid" style="--accent:var(--accent-text)">
                        <div class="slide-copy">
                            <p class="slide-cat">For International Doctors</p>
                            <h2 class="slide-title">Learn in India. Connect with the World.</h2>
                            <p class="slide-desc">Specialist-led learning and knowledge exchange with experienced
                                Indian specialists.</p>
                            <div class="btn-row">
                                <a href="{{ route('international') }}" class="btn btn-hok btn-lg">International Programs</a>
                            </div>
                        </div>
                        <div class="slide-visual">
                            <img src="{{ asset('assets/img/slide-04.jpg') }}" class="slide-img" width="800" height="580"
                                alt="For International Doctors" loading="lazy" onerror="this.remove()">
                            <div class="vis-icons">
                                <i class="bi bi-globe-asia-australia main"></i>
                                <i class="bi bi-airplane sub s1"></i>
                                <i class="bi bi-person-badge sub s2"></i>
                                <i class="bi bi-chat-heart sub s3"></i>
                                <i class="bi bi-geo-alt sub s4"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SLIDE 05 | Visual: global medical network / doctors from different countries, premium minimal background -->
                <div class="carousel-item">
                    <div class="slide-grid" style="--accent:var(--navy-deep)">
                        <div class="slide-copy">
                            <p class="slide-cat">From India to the World</p>
                            <h2 class="slide-title">Your Clinical Journey Can Cross Borders.</h2>
                            <p class="slide-desc">Build connections with medical professionals, specialists and
                                academic communities through education and collaboration.</p>
                            <div class="btn-row">
                                <a href="{{ route('contact.index') }}" class="btn btn-hok btn-lg">Get in Touch</a>
                            </div>
                        </div>
                        <div class="slide-visual">
                            <img src="{{ asset('assets/img/slide-05.webp') }}" class="slide-img" width="800" height="580"
                                alt="From India To The World" loading="lazy" onerror="this.remove()">
                            <div class="vis-icons">
                                <i class="bi bi-globe-europe-africa main"></i>
                                <i class="bi bi-diagram-3 sub s1"></i>
                                <i class="bi bi-people sub s2"></i>
                                <i class="bi bi-journal-medical sub s3"></i>
                                <i class="bi bi-building sub s4"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-ctrl">
            <div class="container d-flex align-items-center justify-content-between gap-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="count" aria-live="polite"><span id="heroNow">01</span> / <span
                            id="heroTotal">05</span></div>
                    <ul class="hero-dots">
                        <li><button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0"
                                class="active" aria-label="Slide 1"></button></li>
                        <li><button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"
                                aria-label="Slide 2"></button></li>
                        <li><button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"
                                aria-label="Slide 3"></button></li>
                        <li><button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="3"
                                aria-label="Slide 4"></button></li>
                        <li><button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="4"
                                aria-label="Slide 5"></button></li>
                    </ul>
                </div>
                <div class="hero-arrows">
                    <button class="round-btn" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev"
                        aria-label="Previous slide"><i class="bi bi-arrow-left"></i></button>
                    <button class="round-btn" type="button" data-bs-target="#heroCarousel" data-bs-slide="next"
                        aria-label="Next slide"><i class="bi bi-arrow-right"></i></button>
                </div>
            </div>
        </div>
    </section>
    <!-- ============ HERO CAROUSEL END ============ -->


    <!-- ============ AUDIENCE STRIP START (jumps to the matching tab in "What we teach") ============ -->
    <section class="aud" aria-label="Find your program">
        <div class="container aud-in">
            <p class="aud-lead">Find your program</p>
            <div class="aud-list">
                <a class="aud-tile" href="#teach" data-tab="wt-tab-doc"><i
                        class="bi bi-person-badge"></i><span>Doctors &amp; Medical Professionals</span><i
                        class="bi bi-arrow-down go"></i></a>
                <a class="aud-tile" href="#teach" data-tab="wt-tab-pmu"><i class="bi bi-palette"></i><span>PMU
                        &amp; Aesthetic Professionals</span><i class="bi bi-arrow-down go"></i></a>
                <a class="aud-tile" href="#teach" data-tab="wt-tab-nur"><i class="bi bi-hospital"></i><span>Nursing,
                        OT &amp; Paramedical</span><i class="bi bi-arrow-down go"></i></a>
                <a class="aud-tile" href="#teach" data-tab="wt-tab-las"><i
                        class="bi bi-lightning-charge"></i><span>Aesthetic &amp; Laser Technicians</span><i
                        class="bi bi-arrow-down go"></i></a>
            </div>
        </div>
    </section>
    <!-- ============ AUDIENCE STRIP END ============ -->


    <!-- ============ WHO WE ARE SECTION START ============ -->
    <section id="who" class="sec sec-white">
        <div class="container">

            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <p class="eyebrow">Who we are</p>
                    <h2 class="sec-title">Advancing Knowledge. Refining Skills. Connecting Medical Expertise.</h2>
                    <p class="sec-text">HOK Academy is an international platform for advanced medical education,
                        clinical training and professional development, bringing specialist expertise, modern
                        technology and practical clinical learning together under one multidisciplinary academic
                        platform.</p>
                    <p class="sec-text">We believe that medical excellence is not built through knowledge alone.
                        It grows through continuous learning, practical experience, specialist guidance and
                        exposure to evolving clinical technologies.</p>
                </div>

                <div class="col-lg-6">
                    <div class="who-statement">
                        <h3>One Academy.<br>Multiple Specialities.<br><em>One Academic Vision.</em></h3>
                        <p>From Aesthetic &amp; Cosmetic Medicine, Advanced Injectables and Laser Technology to
                            Hair Restoration, Medical Nutrition, Gynaecology, Urology, General Surgery and
                            Maxillofacial Surgery, HOK Academy brings diverse areas of contemporary medicine
                            together within one learning environment.</p>
                        <p class="mb-0">Our approach is designed to encourage professionals to learn, question,
                            observe, practise and continually refine their clinical skills.</p>
                    </div>
                </div>
            </div>

            <!-- What defines HOK -->
            <div class="define">
                <h3 class="sub-title">What Defines HOK</h3>
                <div class="define-grid">
                    <article class="define-item c-navy">
                        <i class="bi bi-award"></i>
                        <h4>Specialist Expertise</h4>
                        <p>Learn through the knowledge and experience of specialists across diverse clinical
                            disciplines.</p>
                    </article>
                    <article class="define-item c-teal">
                        <i class="bi bi-diagram-3"></i>
                        <h4>Multidisciplinary Learning</h4>
                        <p>Explore different medical perspectives within one academic ecosystem.</p>
                    </article>
                    <article class="define-item c-blue">
                        <i class="bi bi-heart-pulse"></i>
                        <h4>Practical Clinical Focus</h4>
                        <p>Connect scientific foundations with clinical reasoning, demonstrations, case-based
                            learning and practical skills.</p>
                    </article>
                    <article class="define-item c-red">
                        <i class="bi bi-graph-up-arrow"></i>
                        <h4>Continuous Development</h4>
                        <p>Build a culture of lifelong learning and professional growth.</p>
                    </article>
                </div>
            </div>

            <!-- Vision -->
            <div id="vision" class="who-vision">
                <div>
                    <p class="eyebrow">Our vision</p>
                    <h3>Building a Globally Connected Centre of Medical Excellence</h3>
                    <p>To bring education, innovation, technology and clinical expertise together to advance the
                        future of healthcare.</p>
                </div>
                <div class="btn-row">
                    <a href="{{ route('vision.mission') }}" class="btn btn-hok btn-lg">Discover Our Vision</a>
                </div>
            </div>

        </div>
    </section>
    <!-- ============ WHO WE ARE SECTION END ============ -->


    <!-- ============ WHO TEACHES SECTION START ============ -->
    <section id="faculty-intro" class="sec sec-tint">
        <div class="container">

            <div class="row g-5 align-items-end">
                <div class="col-lg-6">
                    <p class="eyebrow">Who teaches</p>
                    <h2 class="sec-title">Learn From Specialists Who Practise What They Teach</h2>
                </div>
                <div class="col-lg-6">
                    <p class="sec-text">
                        At HOK Academy, education is led by practising doctors, surgeons and healthcare specialists.
                    </p>

                    <p class="sec-text">
                        Our multidisciplinary faculty brings diverse clinical expertise together for a comprehensive learning experience.
                    </p>
                </div>
            </div>

            <div class="fac-motto">
                <span class="m1">Different Specialists.</span>
                <span class="m2">Different Perspectives.</span>
                <span class="m3">One Academic Vision.</span>
            </div>

            <!-- Areas of expertise: horizontal scroller -->
            <div class="rail-head">
                <h3 class="sub-title" id="expTitle">Our Areas of Expertise</h3>
                <div class="rail-arrows">
                    <button class="round-btn" type="button" id="expPrev" aria-label="Previous areas" disabled><i
                            class="bi bi-arrow-left"></i></button>
                    <button class="round-btn" type="button" id="expNext" aria-label="More areas"><i
                            class="bi bi-arrow-right"></i></button>
                </div>
            </div>

            <div class="rail" id="expRail" role="region" aria-labelledby="expTitle" tabindex="0">
                <article class="svc c-navy">
                    <div class="svc-img" data-img="{{ asset('assets/img/expertise/aesthetic-medicine.webp') }}" role="img"
                        aria-label="Aesthetic Medicine"><i class="bi bi-stars svc-fallback"></i></div>
                    <div class="svc-body">
                        <h4>Aesthetic Medicine</h4>
                        <p>Advanced aesthetic approaches, treatment planning and contemporary clinical practice.</p>
                    </div>
                </article>
                <article class="svc c-teal">
                    <div class="svc-img" data-img="{{ asset('assets/img/expertise/injectables.webp') }}" role="img"
                        aria-label="Injectables And Facial Aesthetics"><i
                            class="bi bi-eyedropper svc-fallback"></i></div>
                    <div class="svc-body">
                        <h4>Injectables &amp; Facial Aesthetics</h4>
                        <p>Specialist-led learning in advanced injectables and facial aesthetic practice.</p>
                    </div>
                </article>
                <article class="svc c-blue">
                    <div class="svc-img" data-img="{{ asset('assets/img/expertise/laser.webp') }}" role="img"
                        aria-label="Laser And Energy-Based Medicine"><i
                            class="bi bi-lightning-charge svc-fallback"></i></div>
                    <div class="svc-body">
                        <h4>Laser &amp; Energy-Based Medicine</h4>
                        <p>Understanding laser technologies, energy-based devices, treatment principles and
                            clinical applications.</p>
                    </div>
                </article>
                <article class="svc c-red">
                    <div class="svc-img" data-img="{{ asset('assets/img/expertise/hair-restoration.webp') }}" role="img"
                        aria-label="Hair Restoration"><i class="bi bi-scissors svc-fallback"></i></div>
                    <div class="svc-body">
                        <h4>Hair Restoration</h4>
                        <p>Hair restoration and hair transplantation principles, assessment and clinical
                            techniques.</p>
                    </div>
                </article>
                <article class="svc c-navy">
                    <div class="svc-img" data-img="{{ asset('assets/img/expertise/medical-nutrition.webp') }}" role="img"
                        aria-label="Medical Nutrition"><i class="bi bi-basket svc-fallback"></i></div>
                    <div class="svc-body">
                        <h4>Medical Nutrition</h4>
                        <p>Clinical nutrition, metabolic health, body composition and structured approaches to
                            weight management.</p>
                    </div>
                </article>
                <article class="svc c-teal">
                    <div class="svc-img" data-img="{{ asset('assets/img/expertise/gynaecology.webp') }}" role="img"
                        aria-label="Cosmetic And Surgical Gynaecology"><i
                            class="bi bi-gender-female svc-fallback"></i></div>
                    <div class="svc-body">
                        <h4>Cosmetic &amp; Surgical Gynaecology</h4>
                        <p>Specialist education across cosmetic gynaecology, energy-based technologies and
                            appropriate surgical procedures.</p>
                    </div>
                </article>
                <article class="svc c-blue">
                    <div class="svc-img" data-img="{{ asset('assets/img/expertise/urology.webp') }}" role="img"
                        aria-label="Urology And Endourology"><i class="bi bi-clipboard2-pulse svc-fallback"></i>
                    </div>
                    <div class="svc-body">
                        <h4>Urology &amp; Endourology</h4>
                        <p>Advanced learning across endoscopic urology, stone surgery and related clinical
                            techniques.</p>
                    </div>
                </article>
                <article class="svc c-red">
                    <div class="svc-img" data-img="{{ asset('assets/img/expertise/general-surgery.webp') }}" role="img"
                        aria-label="General Surgery"><i class="bi bi-bandaid svc-fallback"></i></div>
                    <div class="svc-body">
                        <h4>General Surgery</h4>
                        <p>Surgical skills, operative principles, minimally invasive techniques and perioperative
                            practice.</p>
                    </div>
                </article>
                <article class="svc c-navy">
                    <div class="svc-img" data-img="{{ asset('assets/img/expertise/maxillofacial.webp') }}" role="img"
                        aria-label="Oral And Maxillofacial Surgery"><i class="bi bi-emoji-smile svc-fallback"></i>
                    </div>
                    <div class="svc-body">
                        <h4>Oral &amp; Maxillofacial Surgery</h4>
                        <p>Specialist-led education across appropriate oral and maxillofacial surgical
                            disciplines.</p>
                    </div>
                </article>
                <article class="svc c-teal">
                    <div class="svc-img" data-img="{{ asset('assets/img/expertise/pmu.webp') }}" role="img"
                        aria-label="PMU And Medical Camouflage"><i class="bi bi-palette svc-fallback"></i></div>
                    <div class="svc-body">
                        <h4>PMU &amp; Medical Camouflage</h4>
                        <p>Permanent makeup, medical PMU, scar camouflage, areola/nipple camouflage, pigment
                            science and colour theory.</p>
                    </div>
                </article>
                <article class="svc c-blue">
                    <div class="svc-img" data-img="{{ asset('assets/img/expertise/nursing.webp') }}" role="img"
                        aria-label="Nursing, OT And Paramedical"><i class="bi bi-hospital svc-fallback"></i></div>
                    <div class="svc-body">
                        <h4>Nursing, OT &amp; Paramedical</h4>
                        <p>Clinical care, surgical assistance, instrumentation, sterilisation, infection control
                            and perioperative care.</p>
                    </div>
                </article>
            </div>

            <!-- Closing -->
            <div class="cta-row">
                <div>
                    <h3>One Academy. Many Specialist Perspectives.</h3>
                    <p>Our multidisciplinary approach allows professionals to learn within their own field while
                        also gaining exposure to the wider clinical landscape of modern healthcare.</p>
                </div>
                <div class="btn-row">
                    <a href="{{ route('faculty.index') }}" class="btn btn-hok btn-lg">Meet Our Faculty</a>
                    <a href="{{ route('programs.index') }}" class="btn btn-line btn-lg">Explore Programs</a>
                </div>
            </div>
        </div>
    </section>
    <!-- ============ WHO TEACHES SECTION END ============ -->


    <!-- ============ WHAT WE TEACH SECTION START ============ -->
    <section id="teach" class="sec sec-white wt-sec">
        <div class="container">

            <div class="sec-head-center">
                <p class="eyebrow">What we teach</p>
                <h2 class="sec-title">From Advanced Aesthetics to Complex Clinical Disciplines</h2>
                <p class="sec-text">Our programs bring together scientific foundations, clinical reasoning,
                    specialist demonstrations, case-based learning, advanced technologies, procedural training,
                    patient safety and practical skills.</p>
            </div>

            <!-- Category tabs -->
            <ul class="nav wt-tabs" id="wtTabs" role="tablist" aria-label="Program categories">
                <li class="nav-item" role="presentation">
                    <button class="wt-tab c-navy active" id="wt-tab-doc" data-bs-toggle="pill"
                        data-bs-target="#wt-doc" type="button" role="tab" aria-controls="wt-doc"
                        aria-selected="true"><i class="bi bi-person-badge"></i> Doctors &amp; Medical
                        Professionals</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="wt-tab c-teal" id="wt-tab-pmu" data-bs-toggle="pill" data-bs-target="#wt-pmu"
                        type="button" role="tab" aria-controls="wt-pmu" aria-selected="false" tabindex="-1"><i
                            class="bi bi-palette"></i> PMU &amp; Aesthetic</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="wt-tab c-blue" id="wt-tab-nur" data-bs-toggle="pill" data-bs-target="#wt-nur"
                        type="button" role="tab" aria-controls="wt-nur" aria-selected="false" tabindex="-1"><i
                            class="bi bi-hospital"></i> Nursing, OT &amp; Paramedical</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="wt-tab c-red" id="wt-tab-las" data-bs-toggle="pill" data-bs-target="#wt-las"
                        type="button" role="tab" aria-controls="wt-las" aria-selected="false" tabindex="-1"><i
                            class="bi bi-lightning-charge"></i> Aesthetic &amp; Laser</button>
                </li>
            </ul>

            <div class="tab-content">

                <!-- TAB 1: Doctors (8 disciplines as tappable rows) -->
                <div class="tab-pane fade show active" id="wt-doc" role="tabpanel" aria-labelledby="wt-tab-doc"
                    tabindex="0">
                    <div class="disc-list">
                        <a class="disc c-navy" href="{{ route('programs.index') }}">
                            <span class="wt-ico"><i class="bi bi-stars"></i></span>
                            <span class="disc-txt"><strong>Aesthetic &amp; Cosmetic Medicine</strong><span>Facial
                                    aesthetics, advanced injectables, skin rejuvenation and aesthetic treatment
                                    planning.</span></span>
                            <i class="bi bi-arrow-right disc-go"></i>
                        </a>
                        <a class="disc c-teal" href="{{ route('programs.index') }}">
                            <span class="wt-ico"><i class="bi bi-lightning-charge"></i></span>
                            <span class="disc-txt"><strong>Laser &amp; Energy-Based Medicine</strong><span>Laser
                                    technologies, energy-based devices, treatment principles, parameters, safety
                                    and clinical applications.</span></span>
                            <i class="bi bi-arrow-right disc-go"></i>
                        </a>
                        <a class="disc c-blue" href="{{ route('programs.index') }}">
                            <span class="wt-ico"><i class="bi bi-scissors"></i></span>
                            <span class="disc-txt"><strong>Hair Restoration &amp; Hair
                                    Transplantation</strong><span>Hair-loss assessment, transplantation
                                    principles, graft management and restoration techniques.</span></span>
                            <i class="bi bi-arrow-right disc-go"></i>
                        </a>
                        <a class="disc c-red" href="{{ route('programs.index') }}">
                            <span class="wt-ico"><i class="bi bi-basket"></i></span>
                            <span class="disc-txt"><strong>Medical Nutrition &amp; Weight
                                    Management</strong><span>Clinical nutrition, metabolic health, body
                                    composition and structured approaches to weight management.</span></span>
                            <i class="bi bi-arrow-right disc-go"></i>
                        </a>
                        <a class="disc c-navy" href="{{ route('programs.index') }}">
                            <span class="wt-ico"><i class="bi bi-gender-female"></i></span>
                            <span class="disc-txt"><strong>Cosmetic &amp; Surgical Gynaecology</strong><span>Cosmetic
                                    gynaecology, female intimate wellness, energy-based technologies and
                                    appropriate surgical procedures.</span></span>
                            <i class="bi bi-arrow-right disc-go"></i>
                        </a>
                        <a class="disc c-teal" href="{{ route('programs.index') }}">
                            <span class="wt-ico"><i class="bi bi-clipboard2-pulse"></i></span>
                            <span class="disc-txt"><strong>Urology &amp; Endourology</strong><span>Endoscopic
                                    urology, stone surgery, RIRS, PCNL, URS, laser procedures and other advanced
                                    urological techniques.</span></span>
                            <i class="bi bi-arrow-right disc-go"></i>
                        </a>
                        <a class="disc c-blue" href="{{ route('programs.index') }}">
                            <span class="wt-ico"><i class="bi bi-bandaid"></i></span>
                            <span class="disc-txt"><strong>General Surgery</strong><span>Surgical skills,
                                    operative principles, minimally invasive techniques and perioperative
                                    practice.</span></span>
                            <i class="bi bi-arrow-right disc-go"></i>
                        </a>
                        <a class="disc c-red" href="{{ route('programs.index') }}">
                            <span class="wt-ico"><i class="bi bi-emoji-smile"></i></span>
                            <span class="disc-txt"><strong>Oral &amp; Maxillofacial
                                    Surgery</strong><span>Specialist-led education in appropriate oral and
                                    maxillofacial surgical disciplines.</span></span>
                            <i class="bi bi-arrow-right disc-go"></i>
                        </a>
                    </div>
                </div>

                <!-- TAB 2: PMU -->
                <div class="tab-pane fade" id="wt-pmu" role="tabpanel" aria-labelledby="wt-tab-pmu" tabindex="0">
                    <article class="wt-feature c-teal">
                        <span class="wt-ico lg"><i class="bi bi-palette"></i></span>
                        <div class="wt-feature-body">
                            <h3>PMU &amp; Medical Camouflage</h3>
                            <ul class="chips">
                                <li>Permanent Makeup</li>
                                <li>Medical PMU</li>
                                <li>Medical Camouflage</li>
                                <li>Scar Camouflage</li>
                                <li>Areola/Nipple Camouflage</li>
                                <li>Pigment Science</li>
                                <li>Colour Theory</li>
                            </ul>
                            <a href="{{ route('programs.index') }}" class="wt-more">Explore PMU programs <i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </article>
                </div>

                <!-- TAB 3: Nursing -->
                <div class="tab-pane fade" id="wt-nur" role="tabpanel" aria-labelledby="wt-tab-nur" tabindex="0">
                    <article class="wt-feature c-blue">
                        <span class="wt-ico lg"><i class="bi bi-hospital"></i></span>
                        <div class="wt-feature-body">
                            <h3>Clinical &amp; Perioperative Education</h3>
                            <ul class="chips">
                                <li>OT Protocols</li>
                                <li>Surgical Assistance</li>
                                <li>Instrumentation</li>
                                <li>Sterilisation</li>
                                <li>Infection Control</li>
                                <li>Patient Preparation</li>
                                <li>Endoscopy Assistance</li>
                                <li>Perioperative Care</li>
                            </ul>
                            <a href="{{ route('programs.index') }}" class="wt-more">Explore nursing &amp; OT programs <i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </article>
                </div>

                <!-- TAB 4: Laser technicians -->
                <div class="tab-pane fade" id="wt-las" role="tabpanel" aria-labelledby="wt-tab-las" tabindex="0">
                    <article class="wt-feature c-red">
                        <span class="wt-ico lg"><i class="bi bi-lightning-charge"></i></span>
                        <div class="wt-feature-body">
                            <h3>Aesthetic &amp; Laser Technology</h3>
                            <ul class="chips">
                                <li>Laser Fundamentals</li>
                                <li>Device Handling</li>
                                <li>Energy-Based Technologies</li>
                                <li>Treatment-Room Protocols</li>
                                <li>Equipment Safety</li>
                                <li>Clinical Assistance</li>
                            </ul>
                            <a href="{{ route('programs.index') }}" class="wt-more">Explore laser technician
                                programs <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </article>
                </div>
            </div>
        </div>

        <!-- Full-width statement -->
        <div class="wt-band">
            <div class="container">
                <h3 class="wt-band-title">
                    <span>Knowledge.</span>
                    <span>Technology.</span>
                    <span>Technique.</span>
                    <span>Clinical Responsibility.</span>
                </h3>
                <p>Explore focused learning across disciplines and discover the academic pathway that fits your
                    professional journey.</p>
                <div class="btn-row">
                    <a href="{{ route('programs.index') }}" class="btn btn-light btn-lg">Explore All Programs</a>
                </div>
            </div>
        </div>
    </section>
    <!-- ============ WHAT WE TEACH SECTION END ============ -->


    <!-- ============ WHY HOK SECTION START ============ -->
    <section id="why-hok" class="sec sec-tint">
        <div class="container">

            <div class="row g-5 align-items-end">
                <div class="col-lg-6">
                    <p class="eyebrow">Why HOK</p>
                    <h2 class="sec-title">Beyond the Conventional Training Institute</h2>
                </div>
                <div class="col-lg-6">
                    <p class="wh-lead">Modern healthcare demands more than knowledge alone.</p>
                    <p class="sec-text">Rather than limiting learning to one speciality or one instructor, our
                        model allows professionals to explore different areas of medicine and understand how they
                        connect within modern clinical practice.</p>
                </div>
            </div>

            <!-- Panoramic banner image -->
            <figure class="wh-banner">
                <img src="{{ asset('assets/img/why/banner.webp') }}" width="1600" height="640"
                    alt="Specialists from different disciplines learning together at HOK Academy" loading="lazy"
                    onerror="this.remove()">
                <i class="bi bi-hospital wh-banner-fb"></i>
            </figure>

            <!-- Feature grid -->
            <div class="wh-grid">

                <!-- Multidisciplinary faculty (wide, dark) -->
                <article class="wh-card wh-wide wh-dark">
                    <div class="wh-media">
                        <img src="{{ asset('assets/img/why/faculty.webp') }}" class="wh-img" width="800" height="450"
                            alt="Multidisciplinary faculty in discussion" loading="lazy" onerror="this.remove()">
                        <span class="wh-ico"><i class="bi bi-diagram-3"></i></span>
                    </div>
                    <div class="wh-body">
                        <h4>Multidisciplinary Faculty</h4>
                        <p>Access expertise across medical, surgical, aesthetic and allied disciplines.</p>
                        <p class="wh-triple">
                            <span>Different Specialities.</span>
                            <span>Multiple Perspectives.</span>
                            <span>One Academic Platform.</span>
                        </p>
                    </div>
                </article>

                <article class="wh-card c-teal">
                    <div class="wh-media">
                        <img src="{{ asset('assets/img/why/specialist.webp') }}" class="wh-img" width="800" height="450"
                            alt="Specialist teaching a clinical session" loading="lazy" onerror="this.remove()">
                        <span class="wh-ico"><i class="bi bi-award"></i></span>
                    </div>
                    <div class="wh-body">
                        <h4>Specialist-Led Education</h4>
                        <p class="wh-strong">Learn from practising professionals with experience in their
                            respective fields.</p>
                        <p>Our focus is on connecting learners with specialist knowledge, clinical experience and
                            contemporary approaches to medical practice.</p>
                    </div>
                </article>

                <article class="wh-card c-blue">
                    <div class="wh-media">
                        <img src="{{ asset('assets/img/why/technology.webp') }}" class="wh-img" width="800" height="450"
                            alt="Advanced medical technology in a clinical setting" loading="lazy"
                            onerror="this.remove()">
                        <span class="wh-ico"><i class="bi bi-cpu"></i></span>
                    </div>
                    <div class="wh-body">
                        <h4>Clinical + Technology Focus</h4>
                        <p class="wh-strong">Understand more than just a procedure.</p>
                        <p>Explore the science, technology, patient selection, safety and clinical decision-making
                            that support responsible clinical practice.</p>
                    </div>
                </article>

                <article class="wh-card c-red">
                    <div class="wh-media">
                        <img src="{{ asset('assets/img/why/practical.webp') }}" class="wh-img" width="800" height="450"
                            alt="Supervised practical learning workshop" loading="lazy" onerror="this.remove()">
                        <span class="wh-ico"><i class="bi bi-tools"></i></span>
                    </div>
                    <div class="wh-body">
                        <h4>Practical Learning</h4>
                        <p class="wh-strong">Move beyond conventional classroom learning.</p>
                        <p>Depending on the program, learning may include:</p>
                        <ul class="chips">
                            <li>Demonstrations</li>
                            <li>Case Discussions</li>
                            <li>Simulation</li>
                            <li>Workshops</li>
                            <li>Supervised Practical Learning</li>
                        </ul>
                    </div>
                </article>

                <article class="wh-card c-navy">
                    <div class="wh-media">
                        <img src="{{ asset('assets/img/why/cross-disciplinary.webp') }}" class="wh-img" width="800" height="450"
                            alt="Professionals from different specialities collaborating" loading="lazy"
                            onerror="this.remove()">
                        <span class="wh-ico"><i class="bi bi-intersect"></i></span>
                    </div>
                    <div class="wh-body">
                        <h4>Cross-Disciplinary Exposure</h4>
                        <p class="wh-strong">Medicine does not exist in isolated disciplines.</p>
                        <p>Our multidisciplinary environment allows professionals to explore perspectives beyond
                            their primary speciality and understand how different clinical disciplines intersect.
                        </p>
                    </div>
                </article>

                <article class="wh-card c-teal">
                    <div class="wh-media">
                        <img src="{{ asset('assets/img/why/development.webp') }}" class="wh-img" width="800" height="450"
                            alt="Continuous professional development and learning" loading="lazy"
                            onerror="this.remove()">
                        <span class="wh-ico"><i class="bi bi-graph-up-arrow"></i></span>
                    </div>
                    <div class="wh-body">
                        <h4>Continuous Professional Development</h4>
                        <p class="wh-strong">Medical knowledge continues to evolve.</p>
                        <p>HOK Academy promotes continuous learning and professional development as an ongoing
                            journey&mdash;not simply a one-time training experience.</p>
                    </div>
                </article>

                <!-- A culture of safety (wide) -->
                <article class="wh-card wh-wide c-blue">
                    <div class="wh-media">
                        <img src="{{ asset('assets/img/why/safety.webp') }}" class="wh-img" width="800" height="450"
                            alt="Infection prevention and patient safety in the clinic" loading="lazy"
                            onerror="this.remove()">
                        <span class="wh-ico"><i class="bi bi-shield-check"></i></span>
                    </div>
                    <div class="wh-body">
                        <h4>A Culture of Safety</h4>
                        <p class="wh-strong">Responsible clinical education begins with safety.</p>
                        <p>Our academic approach places emphasis on:</p>
                        <ul class="chips">
                            <li>Patient Assessment</li>
                            <li>Informed Consent</li>
                            <li>Infection Prevention</li>
                            <li>Responsible Technology Use</li>
                            <li>Complication Awareness</li>
                        </ul>
                    </div>
                </article>
            </div>

            <!-- Closing statement (image background) -->
            <div class="wh-close">
                <img src="{{ asset('assets/img/why/closing.jpg') }}" class="wh-close-img" width="1600" height="700" alt=""
                    loading="lazy" onerror="this.remove()">
                <div class="wh-close-in">
                    <h3>One Platform.<br>Multiple Disciplines.<br><em>A Broader Vision of Medical Education.</em>
                    </h3>
                    <p class="wh-verbs">
                        <span>Learn.</span> <span>Observe.</span> <span>Practise.</span> <span>Connect.</span>
                        <span>Advance.</span>
                    </p>
                    <div class="btn-row">
                        <a href="{{ route('contact.index') }}" class="btn btn-light btn-lg">Enquire Now</a>
                        <a href="{{ route('why.hok') }}" class="btn btn-ghost btn-lg">Why HOK Academy</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ============ WHY HOK SECTION END ============ -->


    <!-- ============ GLOBAL HOK SECTION START ============ -->
    <section id="global" class="sec sec-white gl-sec">
        <div class="container">

            <!-- Header -->
            <div class="row g-5 align-items-end">
                <div class="col-lg-6">
                    <p class="eyebrow">Global HOK</p>
                    <h2 class="sec-title">Connecting Medical Professionals Across Borders</h2>
                    <p class="gl-kicker">International Doctors &amp; Academic Collaboration</p>
                </div>
                <div class="col-lg-6">
                    <p class="gl-lead">Healthcare is global. Knowledge should be too.</p>
                    <p class="sec-text">HOK Academy is building an international learning community where doctors
                        and healthcare professionals can connect with experienced specialists, explore
                        contemporary clinical practices and exchange knowledge across borders.</p>
                </div>
            </div>

            <!-- Learn in India + areas of learning -->
            <div class="gl-learn">
                <div class="gl-panel">
                    <i class="bi bi-globe-asia-australia gl-panel-ico"></i>
                    <h3>Learn in India.<br>Connect with the World.</h3>
                    <p>International doctors and healthcare professionals can explore focused educational
                        opportunities across multiple areas of contemporary medicine.</p>
                </div>
                <div class="gl-areas">
                    <h3 class="sub-title">Areas of Learning</h3>
                    <ul class="chips">
                        <li>Aesthetic Medicine</li>
                        <li>Injectables</li>
                        <li>Laser &amp; Energy-Based Medicine</li>
                        <li>Hair Restoration</li>
                        <li>Cosmetic Gynaecology</li>
                        <li>Urology &amp; Endourology</li>
                        <li>Surgery</li>
                        <li>Medical Nutrition &amp; Weight Management</li>
                    </ul>
                </div>
            </div>

            <!-- An international learning experience -->
            <div class="gl-exp">
                <div class="gl-exp-head">
                    <h3 class="sub-title">An International Learning Experience</h3>
                    <p>Depending on the individual program, international learning opportunities may include:</p>
                </div>
                <div class="gl-exp-grid">
                    <article class="gl-item c-navy">
                        <span class="wt-ico"><i class="bi bi-mortarboard"></i></span>
                        <div>
                            <h4>Specialist-Led Lectures</h4>
                            <p>Learn directly through specialist-led academic sessions and contemporary clinical
                                perspectives.</p>
                        </div>
                    </article>
                    <article class="gl-item c-teal">
                        <span class="wt-ico"><i class="bi bi-easel"></i></span>
                        <div>
                            <h4>Clinical Demonstrations</h4>
                            <p>Gain exposure to specialist demonstrations designed around the individual program.
                            </p>
                        </div>
                    </article>
                    <article class="gl-item c-blue">
                        <span class="wt-ico"><i class="bi bi-clipboard2-pulse"></i></span>
                        <div>
                            <h4>Case-Based Learning</h4>
                            <p>Explore clinical cases and understand different approaches to contemporary medical
                                practice.</p>
                        </div>
                    </article>
                    <article class="gl-item c-red">
                        <span class="wt-ico"><i class="bi bi-tools"></i></span>
                        <div>
                            <h4>Workshops</h4>
                            <p>Participate in focused academic and practical learning experiences.</p>
                        </div>
                    </article>
                    <article class="gl-item c-navy">
                        <span class="wt-ico"><i class="bi bi-binoculars"></i></span>
                        <div>
                            <h4>Practical &amp; Observational Components</h4>
                            <p>Depending on the program, experience practical or observational learning
                                opportunities.</p>
                        </div>
                    </article>
                </div>
            </div>

            <!-- Building connections beyond borders -->
            <div class="gl-connect">
                <div class="gl-connect-txt">
                    <h3 class="sub-title">Building Connections Beyond Borders</h3>
                    <p>HOK Academy seeks to develop meaningful academic relationships with international doctors,
                        healthcare professionals, institutions, visiting faculty and academic partners.</p>
                    <p>Through international participants, visiting faculty, collaborative programs and knowledge
                        exchange, HOK Academy aims to create a connected global medical learning community.</p>
                </div>
                <ul class="gl-who">
                    <li><i class="bi bi-person-badge"></i>International Doctors</li>
                    <li><i class="bi bi-heart-pulse"></i>Healthcare Professionals</li>
                    <li><i class="bi bi-hospital"></i>Medical Institutions</li>
                    <li><i class="bi bi-airplane"></i>Visiting Faculty</li>
                    <li><i class="bi bi-diagram-3"></i>Academic Partners</li>
                </ul>
                <div class="gl-connect-cta">
                    <h3>Your Clinical Journey Can Cross Borders.</h3>
                    <div class="btn-row">
                        <a href="{{ route('international') }}" class="btn btn-hok">International Doctors</a>
                        <a href="{{ route('international') }}" class="btn btn-line">International Programs</a>
                        <a href="{{ route('international') }}" class="btn btn-line">Partner with HOK Academy</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- From India to the world: full-width closing band -->
        <div class="gl-band">
            <div class="container">
                <p class="gl-band-label">From India to the World</p>
                <h3>Building a Global Community of Medical Professionals</h3>
                <p class="gl-band-sub">Through Knowledge, Expertise and Clinical Education</p>
                <p class="gl-band-text">HOK Academy brings together medical professionals, specialists and
                    international learners through a shared commitment to knowledge, clinical education and
                    continuous professional development. From India to the world, our vision is to create
                    meaningful connections between medical professionals across borders.</p>

                <ul class="gl-motto">
                    <li>Learn from Specialists.</li>
                    <li>Train Across Disciplines.</li>
                    <li>Connect Across Borders.</li>
                    <li>Advance Clinical Excellence.</li>
                </ul>

                <p class="gl-brand">HOK Academy</p>
                <p class="gl-brand-tag">International Academy of Medical Excellence</p>
                <div class="btn-row">
                    <a href="{{ route('programs.index') }}" class="btn btn-light btn-lg">Explore Programs</a>
                    <a href="{{ route('contact.index') }}" class="btn btn-ghost btn-lg">International Enquiry</a>
                </div>
            </div>
        </div>
    </section>
    <!-- ============ GLOBAL HOK SECTION END ============ -->


    <!-- ============ BLOG SECTION START ============ -->
    <section id="blog" class="sec sec-tint bl-sec">
        <div class="container">

            <!-- Header -->
            <div class="bl-head">
                <div>
                    <p class="eyebrow">Blog</p>
                    <h2 class="sec-title">Insights from HOK Academy</h2>
                    <p class="sec-text">Perspectives on clinical education, patient safety and contemporary
                        medical practice from across our disciplines.</p>
                </div>
                <a href="{{ route('blog.index') }}" class="btn btn-line d-none d-md-inline-flex">View All Articles</a>
            </div>

            <!-- Posts: 1 featured + 2 side posts -->
            <div class="bl-grid">

                <!-- Featured post -->
                <article class="bl-card bl-featured c-blue">
                    <div class="bl-media">
                        <img src="{{ asset('assets/img/blog/post-1.jpg') }}" class="bl-img" width="900" height="560"
                            alt="Doctors in a specialist-led aesthetic medicine training session" loading="lazy"
                            onerror="this.remove()">
                        <i class="bi bi-stars bl-fallback"></i>
                    </div>
                    <div class="bl-body">
                        <span class="bl-tag">Aesthetic Medicine</span>
                        <h3><a href="{{ route('blog.index') }}">Choosing an Advanced Training Pathway in Aesthetic Medicine</a>
                        </h3>
                        <p>What to look for in a program: scientific foundations, specialist demonstrations,
                            case-based learning and a clear focus on patient selection and safety.</p>
                        <a href="{{ route('blog.index') }}" class="bl-more">Read article <i class="bi bi-arrow-right"></i></a>
                    </div>
                </article>

                <!-- Side post 1 -->
                <article class="bl-card bl-side c-teal">
                    <div class="bl-media">
                        <img src="{{ asset('assets/img/blog/post-2.jpg') }}" class="bl-img" width="600" height="400"
                            alt="Clinical team preparing a treatment room" loading="lazy"
                            onerror="this.remove()">
                        <i class="bi bi-shield-check bl-fallback"></i>
                    </div>
                    <div class="bl-body">
                        <span class="bl-tag">Patient Safety</span>
                        <h3><a href="{{ route('blog.index') }}">Why Responsible Clinical Education Begins with Safety</a></h3>
                        <p>Patient assessment, informed consent, infection prevention and complication
                            awareness.</p>
                        <a href="{{ route('blog.index') }}" class="bl-more">Read article <i class="bi bi-arrow-right"></i></a>
                    </div>
                </article>

                <!-- Side post 2 -->
                <article class="bl-card bl-side c-navy">
                    <div class="bl-media">
                        <img src="{{ asset('assets/img/blog/post-3.jpg') }}" class="bl-img" width="600" height="400"
                            alt="International doctors learning alongside Indian specialists" loading="lazy"
                            onerror="this.remove()">
                        <i class="bi bi-globe-asia-australia bl-fallback"></i>
                    </div>
                    <div class="bl-body">
                        <span class="bl-tag">International</span>
                        <h3><a href="{{ route('blog.index') }}">Learning in India: What International Doctors Can Expect</a></h3>
                        <p>Specialist-led lectures, clinical demonstrations, workshops and observational
                            learning.</p>
                        <a href="{{ route('blog.index') }}" class="bl-more">Read article <i class="bi bi-arrow-right"></i></a>
                    </div>
                </article>
            </div>

            <!-- Mobile-only button (desktop one sits in the header row) -->
            <div class="btn-row d-md-none bl-all">
                <a href="{{ route('blog.index') }}" class="btn btn-line">View All Articles</a>
            </div>
        </div>
    </section>
    <!-- ============ BLOG SECTION END ============ -->

</main>
@endsection
