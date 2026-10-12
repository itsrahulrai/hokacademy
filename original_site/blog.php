<?php
$title = "HOK Academy | International Academy of Medical Excellence";
$keywords = "HOK Academy, International Academy of Medical Excellence, medical education, medical training, clinical training, aesthetic medicine, aesthetic medicine courses, injectables training, laser training, hair restoration, surgery training, gynaecology training, urology training, cosmetic medicine, medical courses India, international medical courses";
$description = "HOK Academy is an international academy for advanced medical education, clinical training and professional development across aesthetic medicine, injectables, laser, hair restoration, surgery, gynaecology, urology and more.";
$canonical = "https://hokacademy.com/";
ob_start();
?>


<?php
/* =====================================================================
 * BLOG LISTING PAGE  (category filter + pagination)
 * Posts neeche $posts array mein hain (sample data). Naya post = ek entry add karo.
 * URL: blog.php  |  blog.php?page=2  |  blog.php?cat=Patient+Safety&page=2
 * ===================================================================== */

$siteUrl     = "https://hokacademy.com/";
$blogPage    = "blog.php";
$detailsPage = "blog-details.php";      // single post page (jab banao tab ye file)
$imgDir      = "assets/img/blog/";
$perPage     = 6;

function e($s)
{
    return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8');
}

/* Tag => colour helper (style.css ke c-navy / c-teal / c-blue / c-red) */
$tagTone = [
    'Aesthetic Medicine' => 'c-blue',
    'Patient Safety'     => 'c-teal',
    'International'      => 'c-navy',
    'Laser & Energy'     => 'c-red',
    'Clinical Education' => 'c-navy',
    'Nursing & OT'       => 'c-blue',
    'PMU'                => 'c-teal',
    'Surgery'            => 'c-red',
];
$tagIcon = [
    'Aesthetic Medicine' => 'bi-stars',
    'Patient Safety'     => 'bi-shield-check',
    'International'      => 'bi-globe-asia-australia',
    'Laser & Energy'     => 'bi-lightning-charge',
    'Clinical Education' => 'bi-mortarboard',
    'Nursing & OT'       => 'bi-hospital',
    'PMU'                => 'bi-palette',
    'Surgery'            => 'bi-bandaid',
];

/* ---------- POSTS (sample data - apna content daalo) ----------
 * [slug, title, tag, excerpt, date (Y-m-d), read time (min)]            */
$posts = [
    [
        'choosing-an-advanced-training-pathway-in-aesthetic-medicine',
        'Choosing an Advanced Training Pathway in Aesthetic Medicine',
        'Aesthetic Medicine',
        'What to look for in a program: scientific foundations, specialist demonstrations, case-based learning and a clear focus on patient selection and safety.',
        '2026-10-02',
        6
    ],
    [
        'why-responsible-clinical-education-begins-with-safety',
        'Why Responsible Clinical Education Begins with Safety',
        'Patient Safety',
        'Patient assessment, informed consent, infection prevention and complication awareness.',
        '2026-09-26',
        5
    ],
    [
        'learning-in-india-what-international-doctors-can-expect',
        'Learning in India: What International Doctors Can Expect',
        'International',
        'Specialist-led lectures, clinical demonstrations, workshops and observational learning.',
        '2026-09-19',
        5
    ],
    [
        'understanding-laser-and-energy-based-devices',
        'Understanding Laser and Energy-Based Devices',
        'Laser & Energy',
        'A clear introduction to how energy-based devices work, and why parameters and safety matter.',
        '2026-09-12',
        7
    ],
    [
        'patient-selection-and-informed-consent',
        'Patient Selection and Informed Consent in Practice',
        'Patient Safety',
        'Why careful selection and a transparent consent conversation are central to responsible care.',
        '2026-09-05',
        4
    ],
    [
        'hair-restoration-assessment-basics',
        'Hair Restoration: The Basics of Assessment',
        'Aesthetic Medicine',
        'How a structured assessment shapes planning and expectations in hair restoration.',
        '2026-08-29',
        6
    ],
    [
        'infection-prevention-in-the-procedure-room',
        'Infection Prevention in the Procedure Room',
        'Nursing & OT',
        'Everyday habits and protocols that keep procedure rooms and operation theatres safe.',
        '2026-08-22',
        5
    ],
    [
        'why-case-based-learning-matters',
        'Why Case-Based Learning Matters',
        'Clinical Education',
        'How discussing real clinical cases builds judgement beyond textbook knowledge.',
        '2026-08-15',
        4
    ],
    [
        'the-role-of-the-surgical-assistant',
        'The Role of the Surgical Assistant',
        'Nursing & OT',
        'What good surgical assistance looks like before, during and after a procedure.',
        '2026-08-08',
        5
    ],
    [
        'colour-theory-for-medical-pmu',
        'Colour Theory for Medical PMU',
        'PMU',
        'Undertones, pigment behaviour and colour matching explained for restorative work.',
        '2026-08-01',
        6
    ],
    [
        'an-introduction-to-endourology',
        'An Introduction to Endourology',
        'Surgery',
        'A beginner-friendly overview of endoscopic urology and the techniques involved.',
        '2026-07-25',
        7
    ],
    [
        'continuous-learning-in-modern-medicine',
        'Continuous Learning in Modern Medicine',
        'Clinical Education',
        'Why professional development is an ongoing journey rather than a one-time training.',
        '2026-07-18',
        4
    ],
    [
        'how-international-collaboration-strengthens-education',
        'How International Collaboration Strengthens Medical Education',
        'International',
        'Knowledge exchange across borders brings new perspectives to clinical practice.',
        '2026-07-11',
        5
    ],
    [
        'medical-nutrition-and-weight-management-overview',
        'Medical Nutrition and Weight Management: An Overview',
        'Clinical Education',
        'Clinical nutrition, metabolic health and structured approaches to weight management.',
        '2026-07-04',
        6
    ],
];

/* Newest first */
usort($posts, fn($a, $b) => strcmp($b[4], $a[4]));

/* ---------- CATEGORY FILTER ---------- */
$allTags = array_values(array_unique(array_column($posts, 2)));
sort($allTags);
$cat = (string)($_GET['cat'] ?? '');
if (!in_array($cat, $allTags, true)) $cat = '';

$filtered = $cat === '' ? $posts : array_values(array_filter($posts, fn($p) => $p[2] === $cat));

/* ---------- PAGINATION ---------- */
$total  = count($filtered);
$pages  = max(1, (int)ceil($total / $perPage));
$page   = (int)($_GET['page'] ?? 1);
$page   = max(1, min($pages, $page));
$offset = ($page - 1) * $perPage;
$items  = array_slice($filtered, $offset, $perPage);
$from   = $total ? $offset + 1 : 0;
$to     = $offset + count($items);

/* URL builder: page 1 par ?page= nahi lagta (clean canonical) */
function blog_url(string $base, int $page = 1, string $cat = ''): string
{
    $q = [];
    if ($cat !== '')  $q['cat']  = $cat;
    if ($page > 1)    $q['page'] = $page;
    return $base . ($q ? '?' . http_build_query($q) : '');
}

/* Pagination numbers with ellipsis: 1 … 4 [5] 6 … 12 */
function blog_page_list(int $page, int $pages): array
{
    $list = [];
    for ($i = 1; $i <= $pages; $i++) {
        if ($i === 1 || $i === $pages || abs($i - $page) <= 1) $list[] = $i;
        elseif (end($list) !== '…') $list[] = '…';
    }
    return $list;
}

/* ---------- SEO ---------- */
$title       = "Blog" . ($cat ? " - $cat" : "") . ($page > 1 ? " (Page $page)" : "") . " | HOK Academy";
$keywords    = "HOK Academy blog, medical education articles, clinical training insights, aesthetic medicine blog, patient safety, international medical education"
    . ($cat ? ", $cat" : "");
$description = "Perspectives on clinical education, patient safety and contemporary medical practice from across HOK Academy's disciplines."
    . ($page > 1 ? " Page $page." : "");
$canonical   = $siteUrl . blog_url($blogPage, $page, $cat);
$prevUrl     = $page > 1      ? $siteUrl . blog_url($blogPage, $page - 1, $cat) : '';   // layout mein <link rel="prev">
$nextUrl     = $page < $pages ? $siteUrl . blog_url($blogPage, $page + 1, $cat) : '';   // layout mein <link rel="next">
$robots      = $items ? "index, follow" : "noindex, follow";

ob_start();
?>


<main id="main">

    <!-- ============ ABOUT HERO START ============ -->
    <section class="ab-hero" aria-labelledby="abTitle">
        <div class="container">
            <nav aria-label="Breadcrumb">
                <ol class="ab-crumb">
                    <li><a href="index.php">Home</a></li>
                    <li aria-current="page">Blog</li>
                </ol>
            </nav>
            <h1 id="abTitle">Blogs</h1>
        </div>
    </section>
    <!-- ============ ABOUT HERO END ============ -->


    <!-- ============ BLOG LIST START ============ -->
    <section id="posts" class="sec sec-tint">
        <div class="container">

            <!-- Category filter -->
            <div class="bp-filter" role="navigation" aria-label="Filter articles by category">
                <a href="<?= e(blog_url($blogPage)) ?>#posts" class="bp-pill <?= $cat === '' ? 'active' : '' ?>"
                    <?= $cat === '' ? 'aria-current="true"' : '' ?>>All <span><?= count($posts) ?></span></a>
                <?php foreach ($allTags as $t):
                    $n = count(array_filter($posts, fn($p) => $p[2] === $t)); ?>
                    <a href="<?= e(blog_url($blogPage, 1, $t)) ?>#posts"
                        class="bp-pill <?= $tagTone[$t] ?? 'c-navy' ?> <?= $cat === $t ? 'active' : '' ?>"
                        <?= $cat === $t ? 'aria-current="true"' : '' ?>><?= e($t) ?> <span><?= $n ?></span></a>
                <?php endforeach; ?>
            </div>

            <p class="bp-status" aria-live="polite">
                <?php if ($total): ?>
                    Showing <?= $from ?>&ndash;<?= $to ?> of <?= $total ?> article<?= $total > 1 ? 's' : '' ?><?= $cat ? ' in &ldquo;' . e($cat) . '&rdquo;' : '' ?>
                <?php else: ?>
                    No articles found.
                <?php endif; ?>
            </p>

            <?php if ($items): ?>
                <div class="bp-grid">
                    <?php foreach ($items as [$slug, $pTitle, $tag, $excerpt, $date, $mins]):
                        $tone = $tagTone[$tag] ?? 'c-navy';
                        $icon = $tagIcon[$tag] ?? 'bi-journal-medical'; ?>
                        <article class="bp-card <?= $tone ?>">
                            <div class="bp-media">
                                <img src="<?= $imgDir . e($slug) ?>.jpg" width="640" height="400" loading="lazy"
                                    alt="<?= e($pTitle) ?>" onerror="this.remove()">
                                <i class="bi <?= $icon ?> bp-fallback"></i>
                                <span class="bp-tag"><?= e($tag) ?></span>
                            </div>
                            <div class="bp-body">
                                <p class="bp-meta">
                                    <time datetime="<?= e($date) ?>"><i class="bi bi-calendar3"></i> <?= date('d M Y', strtotime($date)) ?></time>
                                    <span><i class="bi bi-clock"></i> <?= (int)$mins ?> min read</span>
                                </p>
                                <h2><a href="<?= $detailsPage ?>?slug=<?= e($slug) ?>"><?= e($pTitle) ?></a></h2>
                                <p class="bp-excerpt"><?= e($excerpt) ?></p>
                                <span class="bp-more">Read article <i class="bi bi-arrow-right"></i></span>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>

                <!-- Pagination -->
                <?php if ($pages > 1): ?>
                    <nav class="bp-pager" aria-label="Blog pagination">
                        <ul>
                            <li>
                                <?php if ($page > 1): ?>
                                    <a href="<?= e(blog_url($blogPage, $page - 1, $cat)) ?>#posts" rel="prev" aria-label="Previous page">
                                        <i class="bi bi-arrow-left"></i><span>Prev</span></a>
                                <?php else: ?>
                                    <span class="is-off" aria-disabled="true"><i class="bi bi-arrow-left"></i><span>Prev</span></span>
                                <?php endif; ?>
                            </li>

                            <?php foreach (blog_page_list($page, $pages) as $p): ?>
                                <?php if ($p === '…'): ?>
                                    <li class="bp-gap" aria-hidden="true">&hellip;</li>
                                <?php elseif ($p === $page): ?>
                                    <li><span class="is-current" aria-current="page"><?= $p ?></span></li>
                                <?php else: ?>
                                    <li><a href="<?= e(blog_url($blogPage, $p, $cat)) ?>#posts" aria-label="Page <?= $p ?>"><?= $p ?></a></li>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <li>
                                <?php if ($page < $pages): ?>
                                    <a href="<?= e(blog_url($blogPage, $page + 1, $cat)) ?>#posts" rel="next" aria-label="Next page">
                                        <span>Next</span><i class="bi bi-arrow-right"></i></a>
                                <?php else: ?>
                                    <span class="is-off" aria-disabled="true"><span>Next</span><i class="bi bi-arrow-right"></i></span>
                                <?php endif; ?>
                            </li>
                        </ul>
                        <p class="bp-pager-info">Page <?= $page ?> of <?= $pages ?></p>
                    </nav>
                <?php endif; ?>

            <?php else: ?>
                <div class="bp-empty">
                    <i class="bi bi-journal-x"></i>
                    <h2>No articles found</h2>
                    <p>Try another category or view all articles.</p>
                    <a href="<?= $blogPage ?>" class="btn btn-hok btn-lg">View All Articles</a>
                </div>
            <?php endif; ?>

        </div>
    </section>
    <!-- ============ BLOG LIST END ============ -->

</main>


<?php
$content = ob_get_clean();
include_once  'layout.php';
?>