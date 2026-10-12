@extends('layouts.app')

@section('content')
<main id="main">

    <!-- ============ ABOUT HERO START ============ -->
    <section class="ab-hero" aria-labelledby="abTitle">
        <div class="container">
            <nav aria-label="Breadcrumb">
                <ol class="ab-crumb">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li aria-current="page">Vision &amp; Mission</li>
                </ol>
            </nav>
            <h1 id="abTitle">Vision &amp; Mission</h1>
            <p class="ab-hero-tag">
                <span>Advancing Medical Knowledge.</span>
                <span>Transforming Clinical Practice.</span>
                <span>Connecting Expertise Across Borders.</span>
            </p>
        </div>
    </section>
    <!-- ============ ABOUT HERO END ============ -->

    <!-- ============ IN-PAGE NAV START ============ -->
    <nav class="vm-nav" aria-label="On this page">
        <div class="container">
            <ul>
                <li><a href="#vision"><i class="bi bi-eye"></i>Our Vision</a></li>
                <li><a href="#mission"><i class="bi bi-bullseye"></i>Our Mission</a></li>
                <li><a href="#commitment"><i class="bi bi-patch-check"></i>Our Commitment</a></li>
            </ul>
        </div>
    </nav>
    <!-- ============ IN-PAGE NAV END ============ -->


    <!-- ============ OUR VISION SECTION START ============ -->
    <section id="vision" class="sec sec-white">
        <div class="container">

            <!-- Intro: text + photo -->
            <div class="vm-intro">
                <div>
                    <p class="eyebrow">Our vision</p>
                    <h2 class="sec-title">Building a Globally Connected Centre of Medical Excellence</h2>
                    <p class="vm-lead">Our vision is to build a globally connected centre of medical excellence
                        where education, innovation, technology and clinical expertise come together.</p>
                    <p class="sec-text">HOK Academy aims to create an academic environment that encourages
                        continuous learning, practical skill development and professional growth across multiple
                        medical disciplines.</p>
                    <p class="sec-text">We envision a platform where doctors and healthcare professionals from
                        India and around the world can learn from specialists, exchange knowledge, explore
                        evolving technologies and connect with diverse clinical perspectives.</p>
                </div>
                <div class="vm-visual">
                    <figure class="vm-photo">
                        <img src="{{ asset('assets/img/vision.jpg') }}" width="900" height="760"
                            alt="Doctors from different countries learning together at HOK Academy"
                            loading="lazy" onerror="this.remove()">
                        <i class="bi bi-globe-asia-australia vm-photo-fb"></i>
                    </figure>
                    <div class="vm-badge">
                        <span class="vm-badge-ico"><i class="bi bi-heart-pulse"></i></span>
                        <span><strong>From India to the World</strong>Education, innovation, technology and
                            clinical expertise together.</span>
                    </div>
                </div>
            </div>

            <!-- Our vision is to -->
            <h3 class="sub-title vm-sub">Our Vision Is To</h3>
            <div class="vm-goals">
                <article class="vm-goal c-navy">
                    <span class="wt-ico"><i class="bi bi-mortarboard"></i></span>
                    <p>Advance medical knowledge through specialist-led education.</p>
                </article>
                <article class="vm-goal c-teal">
                    <span class="wt-ico"><i class="bi bi-graph-up-arrow"></i></span>
                    <p>Encourage continuous professional development.</p>
                </article>
                <article class="vm-goal c-blue">
                    <span class="wt-ico"><i class="bi bi-tools"></i></span>
                    <p>Promote practical and clinically relevant learning.</p>
                </article>
                <article class="vm-goal c-red">
                    <span class="wt-ico"><i class="bi bi-diagram-3"></i></span>
                    <p>Connect medical expertise across disciplines and borders.</p>
                </article>
                <article class="vm-goal c-navy">
                    <span class="wt-ico"><i class="bi bi-cpu"></i></span>
                    <p>Support responsible adoption of emerging medical technologies.</p>
                </article>
                <article class="vm-goal c-teal">
                    <span class="wt-ico"><i class="bi bi-globe2"></i></span>
                    <p>Build a global community committed to clinical excellence.</p>
                </article>
            </div>

            <!-- Statement -->
            <div class="vm-statement">
                <ul class="vm-words">
                    <li><i class="bi bi-book"></i>Learn.</li>
                    <li><i class="bi bi-link-45deg"></i>Connect.</li>
                    <li><i class="bi bi-lightbulb"></i>Innovate.</li>
                    <li><i class="bi bi-arrow-up-right"></i>Advance.</li>
                </ul>
                <p class="vm-statement-text">HOK Academy is committed to shaping a future where medical education
                    is multidisciplinary, practical, technology-aware and globally connected.</p>
            </div>
        </div>
    </section>
    <!-- ============ OUR VISION SECTION END ============ -->


    <!-- ============ OUR MISSION SECTION START ============ -->
    <section id="mission" class="sec sec-tint">
        <div class="container">
            <div class="vm-mission">

                <!-- Left: intro (stays in view on desktop while the list scrolls) -->
                <div class="vm-mission-intro">
                    <p class="eyebrow">Our mission</p>
                    <h2 class="vm-mission-title">
                        <span>Advancing Knowledge.</span>
                        <span>Refining Skills.</span>
                        <span>Transforming Clinical Practice.</span>
                    </h2>
                    <p class="sec-text">The mission of HOK Academy is to provide specialist-led medical
                        education, continuous learning and practical skill development for doctors and
                        healthcare professionals.</p>
                    <p class="sec-text">We bring together experienced specialists, modern technologies and
                        multidisciplinary perspectives to create meaningful opportunities for professional
                        learning and clinical development.</p>
                    <div class="btn-row vm-mission-btns">
                        <a href="{{ route('programs.index') }}" class="btn btn-hok">Explore Programs</a>
                        <a href="{{ route('faculty.index') }}" class="btn btn-line">Meet Our Faculty</a>
                    </div>
                </div>

                <!-- Right: mission points -->
                <div>
                    <h3 class="sub-title vm-points-title">Our Mission Is To</h3>
                    <ul class="vm-points">
                        <li class="c-navy"><span class="wt-ico"><i class="bi bi-mortarboard"></i></span>Deliver
                            specialist-led medical education across multiple disciplines.</li>
                        <li class="c-teal"><span class="wt-ico"><i
                                    class="bi bi-journal-medical"></i></span>Connect scientific knowledge with
                            practical clinical learning.</li>
                        <li class="c-blue"><span class="wt-ico"><i
                                    class="bi bi-clipboard2-pulse"></i></span>Encourage case-based learning,
                            demonstrations and procedural training.</li>
                        <li class="c-red"><span class="wt-ico"><i class="bi bi-cpu"></i></span>Promote
                            responsible and effective use of modern medical technologies.</li>
                        <li class="c-navy"><span class="wt-ico"><i class="bi bi-tools"></i></span>Develop
                            practical skills and clinical confidence.</li>
                        <li class="c-teal"><span class="wt-ico"><i
                                    class="bi bi-shield-check"></i></span>Encourage patient-centred and
                            safety-focused practice.</li>
                        <li class="c-blue"><span class="wt-ico"><i
                                    class="bi bi-graph-up-arrow"></i></span>Support continuous professional
                            development.</li>
                        <li class="c-red"><span class="wt-ico"><i class="bi bi-globe2"></i></span>Create
                            opportunities for international knowledge exchange and academic collaboration.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- ============ OUR MISSION SECTION END ============ -->


    <!-- ============ OUR COMMITMENT SECTION START ============ -->
    <section id="commitment" class="vm-band">
        <img src="{{ asset('assets/img/vision/commitment.jpg') }}" class="vm-band-img" width="1600" height="700" alt=""
            loading="lazy" onerror="this.remove()">
        <div class="container">
            <p class="vm-band-label">Our Commitment</p>
            <h2>At HOK Academy, we believe medical excellence is a continuous journey.</h2>
            <p class="vm-band-text">Our commitment is to create an academic environment where professionals can
                learn continuously, refine their skills, exchange expertise and advance clinical excellence.</p>

            <ul class="vm-pillars">
                <li><span class="vm-pillar-ico"><i class="bi bi-award"></i></span>Specialist Expertise.</li>
                <li><span class="vm-pillar-ico"><i class="bi bi-tools"></i></span>Practical Learning.</li>
                <li><span class="vm-pillar-ico"><i class="bi bi-graph-up-arrow"></i></span>Continuous
                    Development.</li>
            </ul>

            <p class="vm-brand">HOK Academy</p>
            <p class="vm-brand-tag">International Academy of Medical Excellence</p>
            <div class="btn-row">
                <a href="{{ route('programs.index') }}" class="btn btn-light btn-lg">Explore Programs</a>
                <a href="{{ route('contact.index') }}" class="btn btn-ghost btn-lg">Enquire Now</a>
            </div>
        </div>
    </section>
    <!-- ============ OUR COMMITMENT SECTION END ============ -->

</main>
@endsection
