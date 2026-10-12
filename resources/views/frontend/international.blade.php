@extends('layouts.app')

@section('content')
<main id="main">
    <!-- ============ ABOUT HERO START ============ -->
    <section class="ab-hero" aria-labelledby="abTitle">
        <div class="container">
            <nav aria-label="Breadcrumb">
                <ol class="ab-crumb">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li aria-current="page">International</li>
                </ol>
            </nav>
            <h1 id="abTitle">International Academy of Medical Excellence</h1>
            <p class="ab-hero-tag">
                <span>Advancing Medical Knowledge.</span>
                <span>Transforming Clinical Practice.</span>
                <span>Connecting Expertise Across Borders.</span>
            </p>
        </div>
    </section>
    <!-- ============ ABOUT HERO END ============ -->

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
                        <a href="{{ route('contact.index') }}" class="btn btn-hok">International Doctors Enquiry</a>
                        <a href="{{ route('programs.index') }}" class="btn btn-line">International Programs</a>
                        <a href="{{ route('contact.index') }}" class="btn btn-line">Partner with HOK Academy</a>
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
</main>
@endsection
