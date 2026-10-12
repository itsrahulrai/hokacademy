<?php

$title = "Medical Training & Courses | HOK Academy";

$keywords = "HOK Academy services, medical training courses, aesthetic medicine training, cosmetic medicine training, injectables training, laser and energy-based medicine, hair restoration training, hair transplant training, nutrition and weight management, gynaecology training, urology training, surgery training, maxillofacial training, PMU training, nursing training, OT and paramedical training, laser technology training, medical courses India, clinical training programs, healthcare professional training";

$description = "Explore HOK Academy's medical training programs and professional courses in aesthetic and cosmetic medicine, injectables, laser and energy-based medicine, hair restoration, nutrition and weight management, gynaecology, urology, surgery, maxillofacial, PMU, nursing, OT, paramedical and laser technology.";

$canonical = "https://hokacademy.com/programs.php";

ob_start();
?>

<main id="main">

    <?php
    /*
    * SERVICES DATA
    * Har service: [Name, anchor, short description]
    * Image auto: assets/img/expertise/{anchor}.webp (na mile to icon panel dikhega)
    * 'tone' = c-navy | c-teal | c-blue | c-red
    */
    $programsPage = 'programs.php';
    $imgDir       = 'assets/img/expertise/';

    $serviceGroups = [
        [
            'id' => 'doctors',
            'tone' => 'c-navy',
            'icon' => 'bi-person-badge',
            'short' => 'Doctors',
            'title' => 'Doctors & Medical Professionals',
            'items' => [
                ['Aesthetic & Cosmetic Medicine', 'aesthetic-medicine',   'Facial aesthetics, skin rejuvenation and structured aesthetic treatment planning.'],
                ['Advanced Injectables',          'injectables', 'Specialist-led learning in injectable techniques, anatomy and patient safety.'],
                ['Laser & Energy-Based Medicine', 'laser',       'Laser technologies, device parameters, safety and clinical applications.'],
                ['Hair Restoration & Transplantation', 'hair-restoration',   'Hair-loss assessment, graft management and transplantation principles.'],
                ['Medical Nutrition & Weight Management', 'medical-nutrition', 'Clinical nutrition, metabolic health and structured weight management.'],
                ['Cosmetic & Surgical Gynaecology', 'gynaecology',     'Cosmetic gynaecology, energy-based technologies and appropriate surgical procedures.'],
                ['Urology & Endourology',         'urology',     'Endoscopic urology, stone surgery and advanced urological techniques.'],
                ['General Surgery',               'general-surgery',     'Operative principles, minimally invasive techniques and perioperative practice.'],
                ['Oral & Maxillofacial Surgery',  'maxillofacial',        'Specialist-led education in oral and maxillofacial surgical disciplines.'],
            ],
        ],
        [
            'id' => 'pmu',
            'tone' => 'c-teal',
            'icon' => 'bi-palette',
            'short' => 'PMU & Aesthetic',
            'title' => 'PMU & Aesthetic Professionals',
            'items' => [
                ['Permanent Makeup',     'pmu',         'Foundations of permanent makeup, technique, hygiene and client care.'],
                ['Medical PMU',          'medical-pmu', 'Pigment work for medical and restorative needs with a safety-first approach.'],
                ['Medical Camouflage',   'camouflage',  'Techniques to camouflage skin concerns with natural-looking results.'],
                ['Scar Camouflage',      'scar',        'Assessment and pigment methods used to reduce the visibility of scars.'],
                ['Areola/Nipple Camouflage', 'areola',  'Restorative pigmentation techniques with sensitivity and precision.'],
                ['Pigment Science & Colour Theory', 'pigment', 'Understand pigments, undertones and colour matching for skin.'],
            ],
        ],
        [
            'id' => 'nursing',
            'tone' => 'c-blue',
            'icon' => 'bi-hospital',
            'short' => 'Nursing & OT',
            'title' => 'Nursing, OT & Paramedical',
            'items' => [
                ['Nursing & Clinical Care',    'nursing',       'Patient care, procedural support and everyday clinical responsibilities.'],
                ['OT Protocols',               'ot',            'Operation theatre routines, discipline and safe working protocols.'],
                ['Surgical Assistance',        'assist',        'Assisting the surgical team before, during and after procedures.'],
                ['Instrumentation',            'instruments',   'Handling, setup and management of surgical instruments.'],
                ['Sterilisation & Infection Control', 'sterilisation', 'Sterilisation methods and infection-prevention practice.'],
                ['Perioperative Care',         'periop',        'Patient preparation and care across the perioperative journey.'],
            ],
        ],
        [
            'id' => 'technicians',
            'tone' => 'c-red',
            'icon' => 'bi-lightning-charge',
            'short' => 'Laser Technicians',
            'title' => 'Aesthetic & Laser Technicians',
            'items' => [
                ['Laser Fundamentals',        'laser-basics', 'Core laser principles explained clearly for technicians.'],
                ['Device Handling',           'devices',      'Correct setup, handling and care of aesthetic devices.'],
                ['Energy-Based Technologies', 'energy',       'Overview of energy-based devices and how they are used.'],
                ['Treatment-Room Protocols',  'room',         'Room preparation, workflow and hygiene standards.'],
                ['Equipment Safety',          'equipment',    'Safe operation, maintenance and risk awareness for equipment.'],
            ],
        ],
    ];

    $totalServices = array_sum(array_map(fn($g) => count($g['items']), $serviceGroups));
    ?>

    <!-- ============ SERVICES CARDS SECTION START ============ -->
    <section id="services" class="sec sec-tint sv-sec">
        <div class="container">

            <div class="sec-head-center">
                <p class="eyebrow">Our programs</p>
                <h2 class="sec-title">Find the Program That Fits Your Profession</h2>
                <p class="sec-text">Choose your category and explore focused programs designed for your role.</p>
            </div>

            <!-- Filter pills -->
            <div class="sv-filter" role="group" aria-label="Filter programs by category">
                <button type="button" class="sv-pill c-navy active" data-filter="all" aria-pressed="true">
                    <i class="bi bi-grid"></i> All <span><?= $totalServices ?></span>
                </button>
                <?php foreach ($serviceGroups as $g): ?>
                    <button type="button" class="sv-pill <?= $g['tone'] ?>" data-filter="<?= $g['id'] ?>" aria-pressed="false">
                        <i class="bi <?= $g['icon'] ?>"></i> <?= htmlspecialchars($g['short']) ?>
                        <span><?= count($g['items']) ?></span>
                    </button>
                <?php endforeach; ?>
            </div>

            <p class="sv-status" id="svStatus" aria-live="polite">Showing all <?= $totalServices ?> programs</p>

            <!-- Cards -->
            <div class="sv-grid" id="svGrid">
                <?php foreach ($serviceGroups as $g): ?>
                    <?php foreach ($g['items'] as [$name, $anchor, $desc]): ?>
                        <article class="sv-card <?= $g['tone'] ?>" data-cat="<?= $g['id'] ?>">
                            <div class="sv-img">
                                <img src="<?= $imgDir . htmlspecialchars($anchor) ?>.webp"
                                    width="640" height="400" loading="lazy"
                                    alt="<?= htmlspecialchars($name) ?>" onerror="this.remove()">
                                <i class="bi <?= $g['icon'] ?> sv-fallback"></i>
                                <span class="sv-tag"><?= htmlspecialchars($g['short']) ?></span>
                            </div>
                            <div class="sv-body">
                                <span class="sv-chip"><i class="bi <?= $g['icon'] ?>"></i></span>
                                <h4><?= htmlspecialchars($name) ?></h4>
                                <p><?= htmlspecialchars($desc) ?></p>
                                <div class="sv-foot">
                                    <a href="<?= $programsPage ?>#<?= htmlspecialchars($anchor) ?>"
                                        class="sv-btn" aria-label="Read more about <?= htmlspecialchars($name) ?>">
                                        <span>Read more</span>
                                        <i class="bi bi-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </article>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </div>

            <div class="btn-row sv-all">
                <a href="<?= $programsPage ?>" class="btn btn-hok btn-lg">Explore All Programs</a>
            </div>

        </div>
    </section>

    <script>
        (function() {
            var grid = document.getElementById('svGrid');
            if (!grid) return;
            var pills = document.querySelectorAll('.sv-pill');
            var cards = grid.querySelectorAll('.sv-card');
            var status = document.getElementById('svStatus');

            function apply(filter) {
                var shown = 0;
                cards.forEach(function(card) {
                    var match = filter === 'all' || card.dataset.cat === filter;
                    card.hidden = !match;
                    card.classList.remove('is-in');
                    if (match) {
                        card.style.setProperty('--i', Math.min(shown, 8));
                        void card.offsetWidth; // animation restart
                        card.classList.add('is-in');
                        shown++;
                    }
                });
                pills.forEach(function(p) {
                    var on = p.dataset.filter === filter;
                    p.classList.toggle('active', on);
                    p.setAttribute('aria-pressed', on);
                });
                status.textContent = (filter === 'all' ? 'Showing all ' : 'Showing ') + shown + ' programs';
            }

            pills.forEach(function(p) {
                p.addEventListener('click', function() {
                    apply(p.dataset.filter);
                });
            });

            // Deep link: #services?cat=pmu  ya  #sv-pmu
            var m = location.hash.match(/^#sv-(\w+)/);
            if (m && document.querySelector('.sv-pill[data-filter="' + m[1] + '"]')) apply(m[1]);
        })();
    </script>
    <!-- ============ SERVICES CARDS SECTION END ============ -->

</main>


<?php
$content = ob_get_clean();
include_once  'layout.php';
?>