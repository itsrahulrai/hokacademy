@extends('layouts.app')

@section('content')
<main id="main">
    <!-- ============ ABOUT HERO START ============ -->
    <section class="ab-hero" aria-labelledby="abTitle">
        <div class="container">
            <nav aria-label="Breadcrumb">
                <ol class="ab-crumb">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li aria-current="page">Our Multidisciplinary Model</li>
                </ol>
            </nav>
            <h1 id="abTitle">Our Multidisciplinary Model</h1>
            <p class="ab-hero-tag">
                <span>Advancing Medical Knowledge.</span>
                <span>Transforming Clinical Practice.</span>
                <span>Connecting Expertise Across Borders.</span>
            </p>
        </div>
    </section>
    <!-- ============ ABOUT HERO END ============ -->

    <!-- ============ MULTIDISCIPLINARY MODEL: INTRO START ============ -->
    <section id="model" class="sec sec-white">
        <div class="container">
            <div class="md-intro">
                <div>
                    <p class="eyebrow">Our multidisciplinary model</p>
                    <h2 class="md-title">
                        <span>One Academy.</span>
                        <span>Multiple Specialities.</span>
                        <span>One Academic Vision.</span>
                    </h2>
                    <p class="md-lead">HOK Academy follows a multidisciplinary model of medical education,
                        bringing together specialists, doctors, surgeons and healthcare professionals from
                        diverse clinical disciplines.</p>
                    <p class="sec-text">Rather than focusing on a single specialty or one approach to learning,
                        our model brings together different areas of medical expertise, clinical perspectives
                        and modern technologies under one academic platform.</p>
                </div>

                <!-- Diagram: three inputs around one platform -->
                <div class="md-hub" role="img"
                    aria-label="Medical expertise, clinical perspectives and modern technologies come together under one academic platform">
                    <span class="md-hub-ring" aria-hidden="true"></span>
                    <div class="md-hub-core" aria-hidden="true">
                        <i class="bi bi-hospital"></i>
                        <strong>One Academic Platform</strong>
                    </div>
                    <span class="md-node n1" aria-hidden="true"><i class="bi bi-award"></i>Medical
                        Expertise</span>
                    <span class="md-node n2" aria-hidden="true"><i class="bi bi-people"></i>Clinical
                        Perspectives</span>
                    <span class="md-node n3" aria-hidden="true"><i class="bi bi-cpu"></i>Modern
                        Technologies</span>
                </div>
            </div>
        </div>
    </section>
    <!-- ============ MULTIDISCIPLINARY MODEL: INTRO END ============ -->

    <!-- ============ WHY A MULTIDISCIPLINARY MODEL START ============ -->
    <section id="why-model" class="sec sec-tint">
        <div class="container">
            <div class="md-why">
                <div class="md-why-intro">
                    <p class="eyebrow">The reason</p>
                    <h2 class="sec-title">Why a Multidisciplinary Model?</h2>
                    <p class="sec-text">Modern healthcare is continuously evolving. Medical professionals need
                        opportunities to learn beyond their immediate area of practice and understand the
                        broader clinical environment.</p>
                    <p class="md-why-note">Our multidisciplinary approach encourages professionals to:</p>
                </div>

                <ul class="md-points">
                    <li class="c-navy"><span class="wt-ico"><i class="bi bi-mortarboard"></i></span>Learn from
                        specialists across different disciplines.</li>
                    <li class="c-teal"><span class="wt-ico"><i class="bi bi-binoculars"></i></span>Explore
                        diverse clinical perspectives.</li>
                    <li class="c-blue"><span class="wt-ico"><i class="bi bi-journal-medical"></i></span>Connect
                        scientific knowledge with practical learning.</li>
                    <li class="c-red"><span class="wt-ico"><i class="bi bi-cpu"></i></span>Understand the role
                        of modern medical technologies.</li>
                    <li class="c-navy"><span class="wt-ico"><i class="bi bi-eye"></i></span>Develop broader
                        clinical awareness.</li>
                    <li class="c-teal"><span class="wt-ico"><i class="bi bi-graph-up-arrow"></i></span>Continue
                        their professional development.</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- ============ WHY A MULTIDISCIPLINARY MODEL END ============ -->

    <!-- ============ HOW OUR MODEL WORKS START ============ -->
    <section id="how-it-works" class="sec sec-white">
        <div class="container">
            <div class="sec-head-center">
                <p class="eyebrow">The model</p>
                <h2 class="sec-title">How Our Model Works</h2>
            </div>

            <div class="md-how">
                <article class="md-card c-navy">
                    <span class="wt-ico"><i class="bi bi-award"></i></span>
                    <h3>Specialist Expertise</h3>
                    <p>Experienced specialists and healthcare professionals contribute their knowledge and
                        perspectives from their respective fields.</p>
                </article>
                <article class="md-card c-teal">
                    <span class="wt-ico"><i class="bi bi-clipboard2-pulse"></i></span>
                    <h3>Clinical Learning</h3>
                    <p>Education is connected with clinical reasoning, demonstrations, case-based learning and
                        practical application.</p>
                </article>
                <article class="md-card c-blue">
                    <span class="wt-ico"><i class="bi bi-cpu"></i></span>
                    <h3>Advanced Technology</h3>
                    <p>Modern technologies and evolving techniques are integrated into relevant areas of medical
                        education.</p>
                </article>
                <article class="md-card c-red">
                    <span class="wt-ico"><i class="bi bi-intersect"></i></span>
                    <h3>Cross-Disciplinary Exposure</h3>
                    <p>Learners can explore different medical disciplines and gain exposure to approaches beyond
                        a single specialty.</p>
                </article>
                <article class="md-card c-navy">
                    <span class="wt-ico"><i class="bi bi-tools"></i></span>
                    <h3>Practical Skills</h3>
                    <p>Depending on the program, learning may include workshops, demonstrations, simulation and
                        supervised practical learning.</p>
                </article>
                <article class="md-card c-teal">
                    <span class="wt-ico"><i class="bi bi-shield-check"></i></span>
                    <h3>Patient Safety</h3>
                    <p>Patient safety and responsible clinical practice remain an important part of the
                        educational philosophy.</p>
                </article>
            </div>
        </div>
    </section>
    <!-- ============ HOW OUR MODEL WORKS END ============ -->

    <!-- ============ DISCIPLINES START ============ -->
    <section id="disciplines" class="sec sec-tint">
        <div class="container">
            <div class="row g-5 align-items-end">
                <div class="col-lg-6">
                    <p class="eyebrow">Disciplines</p>
                    <h2 class="sec-title">Multiple Disciplines. Connected Learning.</h2>
                </div>
                <div class="col-lg-6">
                    <p class="sec-text">Our multidisciplinary academic environment brings together areas
                        including:</p>
                </div>
            </div>

            <ul class="md-disc">
                <li><a class="c-navy" href="{{ route('programs.show', 'aesthetic-cosmetic-medicine') }}"><span class="md-disc-ico"><i
                                class="bi bi-stars"></i></span><span>Aesthetic &amp; Cosmetic Medicine</span><i
                            class="bi bi-arrow-right md-go"></i></a></li>
                <li><a class="c-teal" href="{{ route('programs.show', 'advanced-injectables') }}"><span class="md-disc-ico"><i
                                class="bi bi-eyedropper"></i></span><span>Advanced Injectables</span><i
                            class="bi bi-arrow-right md-go"></i></a></li>
                <li><a class="c-blue" href="{{ route('programs.show', 'laser-energy-based-medicine') }}"><span class="md-disc-ico"><i
                                class="bi bi-lightning-charge"></i></span><span>Laser &amp; Energy-Based
                            Medicine</span><i class="bi bi-arrow-right md-go"></i></a></li>
                <li><a class="c-red" href="{{ route('programs.show', 'hair-restoration-transplantation') }}"><span class="md-disc-ico"><i
                                class="bi bi-scissors"></i></span><span>Hair Restoration &amp; Hair
                            Transplantation</span><i class="bi bi-arrow-right md-go"></i></a></li>
                <li><a class="c-navy" href="{{ route('programs.show', 'medical-nutrition-weight-management') }}"><span class="md-disc-ico"><i
                                class="bi bi-basket"></i></span><span>Medical Nutrition &amp; Weight
                            Management</span><i class="bi bi-arrow-right md-go"></i></a></li>
                <li><a class="c-teal" href="{{ route('programs.show', 'cosmetic-surgical-gynaecology') }}"><span class="md-disc-ico"><i
                                class="bi bi-gender-female"></i></span><span>Cosmetic &amp; Surgical
                            Gynaecology</span><i class="bi bi-arrow-right md-go"></i></a></li>
                <li><a class="c-blue" href="{{ route('programs.show', 'urology-endourology') }}"><span class="md-disc-ico"><i
                                class="bi bi-clipboard2-pulse"></i></span><span>Urology &amp;
                            Endourology</span><i class="bi bi-arrow-right md-go"></i></a></li>
                <li><a class="c-red" href="{{ route('programs.show', 'general-surgery') }}"><span class="md-disc-ico"><i
                                class="bi bi-bandaid"></i></span><span>General Surgery</span><i
                            class="bi bi-arrow-right md-go"></i></a></li>
                <li><a class="c-navy" href="{{ route('programs.show', 'oral-maxillofacial-surgery') }}"><span class="md-disc-ico"><i
                                class="bi bi-emoji-smile"></i></span><span>Oral &amp; Maxillofacial
                            Surgery</span><i class="bi bi-arrow-right md-go"></i></a></li>
                <li><a class="c-teal" href="{{ route('programs.show', 'permanent-makeup') }}"><span class="md-disc-ico"><i
                                class="bi bi-palette"></i></span><span>PMU &amp; Medical Camouflage</span><i
                            class="bi bi-arrow-right md-go"></i></a></li>
                <li><a class="c-blue" href="{{ route('programs.show', 'nursing-clinical-care') }}"><span class="md-disc-ico"><i
                                class="bi bi-hospital"></i></span><span>Nursing, OT &amp; Paramedical
                            Education</span><i class="bi bi-arrow-right md-go"></i></a></li>
                <li><a class="c-red" href="{{ route('programs.show', 'laser-fundamentals-technicians') }}"><span class="md-disc-ico"><i
                                class="bi bi-cpu"></i></span><span>Aesthetic &amp; Laser Technology</span><i
                            class="bi bi-arrow-right md-go"></i></a></li>
            </ul>
        </div>
    </section>
    <!-- ============ DISCIPLINES END ============ -->
</main>
@endsection
