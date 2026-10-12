<?php
$title = "Our Faculty | HOK Academy | International Academy of Medical Excellence";
$keywords = "HOK Academy faculty, medical faculty India, aesthetic medicine faculty, laser specialists, hair restoration surgeons, urology faculty, gynaecology faculty, specialist-led medical education";
$description = "Meet the multidisciplinary faculty of HOK Academy: practising doctors, surgeons and healthcare specialists who teach what they practise.";
$canonical = "https://hokacademy.com/faculty.php";
ob_start();
?>


<main id="main">

    <!-- ============ FACULTY HERO START ============ -->
    <section class="ab-hero" aria-labelledby="fcTitle">
        <div class="container">
            <nav aria-label="Breadcrumb">
                <ol class="ab-crumb">
                    <li><a href="index.php">Home</a></li>
                    <li aria-current="page">Faculty</li>
                </ol>
            </nav>
            <h1 id="fcTitle">Our Faculty</h1>
        </div>
    </section>
    <!-- ============ FACULTY HERO END ============ -->


    <!-- ============ FACULTY INTRO START ============ -->
    <section id="intro" class="sec sec-white">
        <div class="container">

            <div class="row g-5 align-items-end">
                <div class="col-lg-6">
                    <p class="eyebrow">Who teaches</p>
                    <h2 class="sec-title">Learn From Specialists Who Practise What They Teach</h2>
                </div>
                <div class="col-lg-6">
                    <p class="sec-text">At HOK Academy, education is led by practising doctors, surgeons and
                        healthcare specialists.</p>
                    <p class="sec-text">Our multidisciplinary faculty brings diverse clinical expertise together
                        for a comprehensive learning experience.</p>
                </div>
            </div>

            <div class="fac-motto">
                <span class="m1">Different Specialists.</span>
                <span class="m2">Different Perspectives.</span>
                <span class="m3">One Academic Vision.</span>
            </div>

            <!-- Jump links to faculty -->
            <ul class="fc-jump" aria-label="Faculty by speciality">
                <li><a href="#faculty">All Faculty</a></li>
                <li><a href="#visiting">Visiting Faculty</a></li>
                <li><a href="#teaching">How We Teach</a></li>
                <li><a href="#join">Teach with HOK</a></li>
            </ul>
        </div>
    </section>
    <!-- ============ FACULTY INTRO END ============ -->


    <!-- ============ FACULTY GRID START ============ -->
    <section id="faculty" class="sec sec-tint">
        <div class="container">

            <div class="sec-head-center">
                <p class="eyebrow">Meet the faculty</p>
                <h2 class="sec-title">Specialists Across Every Discipline We Teach</h2>
            </div>


            <div class="fc-grid">

                <article class="fc-card c-blue">
                    <div class="fc-photo">
                        <img src="assets/img/faculty/faculty-1.jpg" width="480" height="600" alt="Dr. Full Name"
                            loading="lazy" onerror="this.remove()">
                        <i class="bi bi-person fc-fb"></i>
                        <span class="fc-tag">Aesthetic Medicine</span>
                    </div>
                    <div class="fc-body">
                        <h3>Dr. Full Name</h3>
                        <p class="fc-role">Qualification &mdash; Aesthetic Physician</p>
                        <p class="fc-bio">Short two-line bio about clinical experience and teaching focus.</p>
                        <ul class="chips">
                            <li>Facial Aesthetics</li>
                            <li>Injectables</li>
                        </ul>
                    </div>
                </article>

                <article class="fc-card c-teal">
                    <div class="fc-photo">
                        <img src="assets/img/faculty/faculty-2.jpg" width="480" height="600" alt="Dr. Full Name"
                            loading="lazy" onerror="this.remove()">
                        <i class="bi bi-person fc-fb"></i>
                        <span class="fc-tag">Laser &amp; Energy</span>
                    </div>
                    <div class="fc-body">
                        <h3>Dr. Full Name</h3>
                        <p class="fc-role">Qualification &mdash; Dermatologist</p>
                        <p class="fc-bio">Short two-line bio about clinical experience and teaching focus.</p>
                        <ul class="chips">
                            <li>Laser Principles</li>
                            <li>Device Safety</li>
                        </ul>
                    </div>
                </article>

                <article class="fc-card c-navy">
                    <div class="fc-photo">
                        <img src="assets/img/faculty/faculty-3.jpg" width="480" height="600" alt="Dr. Full Name"
                            loading="lazy" onerror="this.remove()">
                        <i class="bi bi-person fc-fb"></i>
                        <span class="fc-tag">Hair Restoration</span>
                    </div>
                    <div class="fc-body">
                        <h3>Dr. Full Name</h3>
                        <p class="fc-role">Qualification &mdash; Hair Transplant Surgeon</p>
                        <p class="fc-bio">Short two-line bio about clinical experience and teaching focus.</p>
                        <ul class="chips">
                            <li>Hair-Loss Assessment</li>
                            <li>Graft Management</li>
                        </ul>
                    </div>
                </article>

            </div>
        </div>
    </section>
    <!-- ============ FACULTY GRID END ============ -->


    <!-- ============ VISITING FACULTY START ============ -->
    <section id="visiting" class="sec sec-white">
        <div class="container">

            <div class="fc-visit">
                <div class="gl-panel">
                    <i class="bi bi-airplane gl-panel-ico"></i>
                    <h3>Visiting &amp; International Faculty</h3>
                    <p>Alongside our core faculty, HOK Academy welcomes visiting specialists who bring fresh
                        clinical perspectives from other centres and countries.</p>
                </div>
                <div class="fc-visit-body">
                    <h3 class="sub-title">What visiting faculty add</h3>
                    <ul class="fc-list">
                        <li><i class="bi bi-globe2"></i>Perspectives from different healthcare systems</li>
                        <li><i class="bi bi-easel"></i>Focused guest lectures and demonstrations</li>
                        <li><i class="bi bi-diagram-3"></i>Knowledge exchange across specialities</li>
                        <li><i class="bi bi-people"></i>Academic links with institutions and partners</li>
                    </ul>
                    <div class="btn-row">
                        <a href="international.php" class="btn btn-hok">International Programs</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ============ VISITING FACULTY END ============ -->


    <!-- ============ JOIN / CLOSING START ============ -->
    <section id="join" class="sec sec-white fc-join-sec">
        <div class="container">

            <div class="fc-join">
                <div>
                    <p class="eyebrow">Teach with HOK</p>
                    <h3>Are you a specialist who would like to teach?</h3>
                    <p>We welcome practising doctors, surgeons and healthcare specialists who wish to share their
                        expertise as faculty or visiting faculty.</p>
                </div>
                <div class="btn-row">
                    <a href="contact-us.php" class="btn btn-hok btn-lg">Get in Touch</a>
                    <a href="programs.php" class="btn btn-line btn-lg">Explore Programs</a>
                </div>
            </div>
        </div>
    </section>
    <!-- ============ JOIN / CLOSING END ============ -->

</main>


<?php
$content = ob_get_clean();
include_once  'layout.php';
?>