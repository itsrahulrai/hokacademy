<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title><?= isset($title) ? $title : 'HOK Academy | International Academy of Medical Excellence'; ?></title>
    <meta name="keywords"
        content="<?= isset($keywords) ? $keywords : 'HOK Academy, International Academy of Medical Excellence, medical education, medical training, clinical training, aesthetic medicine, medical courses India'; ?>">
    <meta name="description"
        content="<?= isset($description) ? $description : 'HOK Academy is an international platform for advanced medical education, clinical training and professional development across aesthetic medicine, surgery, urology, gynaecology, laser, hair restoration and more.'; ?>">
    <link rel="canonical" href="<?= isset($canonical) ? $canonical : 'https://hokacademy.com/'; ?>">
    <meta name="theme-color" content="#071d3a">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@600;700;800&family=Figtree:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/about.css">
    <link rel="stylesheet" href="assets/css/vision.css">
    <link rel="stylesheet" href="assets/css/multidisciplinary.css">
    <link rel="stylesheet" href="assets/css/learning-philosophy.css">
    <link rel="stylesheet" href="assets/css/programs.css">
    <link rel="stylesheet" href="assets/css/service-details.css">
    <link rel="stylesheet" href="assets/css/blog.css">
    <link rel="stylesheet" href="assets/css/contact.css">
    <link rel="stylesheet" href="assets/css/blog-details.css">
    <link rel="stylesheet" href="assets/css/faculty.css">
</head>

<body id="top">

    <a class="skip-link" href="#main">Skip to content</a>

    <!-- ============ HEADER START ============ -->

    <?php include_once("include/header.php") ?>

    <!-- ============ HEADER END ============ -->


    <?= isset($content) ? $content : ''; ?>


    <!-- ============ FOOTER START ============ -->

    <?php include_once("include/footer.php") ?>

    <!-- ============ FOOTER END ============ -->

    <!-- Back to top -->
    <button type="button" class="to-top" id="toTop" aria-label="Back to top"><i class="bi bi-arrow-up"></i></button>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        (function() {
            var root = document.documentElement;
            var nav = document.querySelector('.hdr');
            var brand = nav.querySelector('.navbar-brand');
            var toTop = document.getElementById('toTop');
            var desktop = window.matchMedia('(min-width: 992px) and (hover: hover)');

            document.getElementById('yr').textContent = new Date().getFullYear();

            /* ---- Sticky header height -> CSS var (smooth-scroll offset) ---- */
            function setNavH() {
                root.style.setProperty('--nav-h', (brand.offsetHeight + 16) + 'px');
            }

            /* ---- Header shadow + back-to-top visibility ---- */
            var ticking = false;

            function onScroll() {
                if (ticking) return;
                ticking = true;
                requestAnimationFrame(function() {
                    var y = window.scrollY;
                    nav.classList.toggle('is-stuck', y > 60);
                    toTop.classList.toggle('show', y > 500);
                    ticking = false;
                });
            }
            window.addEventListener('scroll', onScroll, {
                passive: true
            });
            onScroll();

            toTop.addEventListener('click', function() {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });

            /* ---- Desktop: menus open on hover, so a click on the parent goes to its page ---- */
            nav.querySelectorAll('.nav-link.dropdown-toggle').forEach(function(a) {
                a.addEventListener('click', function(e) {
                    var href = a.getAttribute('href');
                    if (desktop.matches && href && href !== '#') {
                        e.stopPropagation();
                        window.location.href = href;
                    }
                });
            });

            /* ---- Hero: counter + dots follow the active slide ---- */
            var hc = document.getElementById('heroCarousel');
            var items = hc.querySelectorAll('.carousel-item');
            var grids = hc.querySelectorAll('.slide-grid');
            var dots = document.querySelectorAll('.hero-dots button');
            document.getElementById('heroTotal').textContent = String(items.length).padStart(2, '0');

            hc.addEventListener('slide.bs.carousel', function(e) {
                document.getElementById('heroNow').textContent = String(e.to + 1).padStart(2, '0');
                dots.forEach(function(b, i) {
                    b.classList.toggle('active', i === e.to);
                    if (i === e.to) b.setAttribute('aria-current', 'true');
                    else b.removeAttribute('aria-current');
                });
            });

            /* ---- Hero: every slide gets the tallest slide's height (no page jump) ---- */
            function equalizeHero() {
                var max = 0;
                grids.forEach(function(g) {
                    g.style.minHeight = '';
                });
                items.forEach(function(it) {
                    var hidden = !it.classList.contains('active');
                    if (hidden) it.style.display = 'block';
                    max = Math.max(max, it.offsetHeight);
                    if (hidden) it.style.display = '';
                });
                grids.forEach(function(g) {
                    g.style.minHeight = max + 'px';
                });
            }

            /* ---- "Find your program" tiles + footer links: open the matching tab, then scroll to it ---- */
            var drawerEl = document.getElementById('nav');
            document.querySelectorAll('[data-tab]').forEach(function(link) {
                link.addEventListener('click', function(e) {
                    var tab = document.getElementById(link.dataset.tab);
                    var target = document.getElementById('teach');
                    if (!tab || !target) return;
                    e.preventDefault();
                    bootstrap.Tab.getOrCreateInstance(tab).show();
                    var drawer = bootstrap.Offcanvas.getInstance(drawerEl);
                    if (drawer) drawer.hide();
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                });
            });

            /* ---- Tabs: slide the tapped tab into view on small screens ---- */
            var strip = document.getElementById('wtTabs');
            strip.querySelectorAll('.wt-tab').forEach(function(tab) {
                tab.addEventListener('shown.bs.tab', function() {
                    if (strip.scrollWidth <= strip.clientWidth) return;
                    var item = tab.parentElement;
                    strip.scrollTo({
                        left: item.offsetLeft - (strip.clientWidth - item.offsetWidth) / 2,
                        behavior: 'smooth'
                    });
                });
            });

            /* ---- Expertise scroller: arrows move one card, disable at the ends ---- */
            var rail = document.getElementById('expRail');
            var prev = document.getElementById('expPrev');
            var next = document.getElementById('expNext');

            function railStep() {
                var card = rail.querySelector('.svc');
                var gap = parseFloat(getComputedStyle(rail).columnGap) || 16;
                return card ? card.offsetWidth + gap : 300;
            }

            function railState() {
                prev.disabled = rail.scrollLeft <= 2;
                next.disabled = rail.scrollLeft + rail.clientWidth >= rail.scrollWidth - 2;
            }
            prev.addEventListener('click', function() {
                rail.scrollBy({
                    left: -railStep(),
                    behavior: 'smooth'
                });
            });
            next.addEventListener('click', function() {
                rail.scrollBy({
                    left: railStep(),
                    behavior: 'smooth'
                });
            });
            rail.addEventListener('scroll', railState, {
                passive: true
            });

            /* ---- Expertise cards: show the photo if the file exists, else keep the icon panel ---- */
            document.querySelectorAll('.svc-img').forEach(function(el) {
                var im = new Image();
                im.onload = function() {
                    var photo = document.createElement('div');
                    photo.className = 'svc-photo';
                    photo.style.backgroundImage = 'url("' + el.dataset.img + '")';
                    el.insertBefore(photo, el.firstChild);
                    el.classList.add('has-img');
                };
                im.src = el.dataset.img;
            });

            /* ---- Init + resize ---- */
            function layout() {
                setNavH();
                equalizeHero();
                railState();
            }
            var rt;
            window.addEventListener('resize', function() {
                clearTimeout(rt);
                rt = setTimeout(layout, 150);
            });
            window.addEventListener('load', layout);
            if (document.fonts && document.fonts.ready) document.fonts.ready.then(layout);
            layout();
        })();
    </script>
</body>

</html>