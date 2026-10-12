<?php
/* =====================================================================
 * BLOG DETAILS PAGE
 * URL: blog-details.php?slug=post-slug
 * Data: blog-data.php ($posts + $blogBodies)
 * ===================================================================== */

require_once 'blog-data.php';

$siteUrl     = "https://hokacademy.com/";
$blogPage    = "blog.php";
$detailsPage = "blog-details.php";
$imgDir      = "assets/img/blog/";

function e($s)
{
    return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8');
}

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

function bd_slug(string $s): string
{
    return trim(preg_replace('/[^a-z0-9]+/', '-', strtolower($s)), '-');
}

/* Body blocks -> [html, toc] */
function bd_render(array $blocks): array
{
    $html = '';
    $toc  = [];
    foreach ($blocks as $b) {
        switch ($b[0]) {
            case 'h2':
                $id    = bd_slug($b[1]);
                $toc[] = [$id, $b[1]];
                $html .= '<h2 id="' . e($id) . '">' . e($b[1]) . '</h2>';
                break;
            case 'p':
                $html .= '<p>' . e($b[1]) . '</p>';
                break;
            case 'ul':
                $html .= '<ul>';
                foreach ($b[1] as $li) $html .= '<li>' . e($li) . '</li>';
                $html .= '</ul>';
                break;
            case 'quote':
                $html .= '<blockquote><i class="bi bi-quote" aria-hidden="true"></i><p>' . e($b[1]) . '</p></blockquote>';
                break;
            case 'note':
                $html .= '<aside class="bd-note"><i class="bi bi-lightbulb" aria-hidden="true"></i><p><strong>Key takeaway.</strong> ' . e($b[1]) . '</p></aside>';
                break;
        }
    }
    return [$html, $toc];
}

/* ---------- FIND POST ---------- */
$slug = (string)($_GET['slug'] ?? '');
$slug = preg_match('/^[a-z0-9-]+$/', $slug) ? $slug : '';

usort($posts, fn($a, $b) => strcmp($b[4], $a[4]));   // newest first

$idx = null;
foreach ($posts as $i => $p) {
    if ($p[0] === $slug) {
        $idx = $i;
        break;
    }
}

$found = $idx !== null;

if ($found) {
    [$pSlug, $pTitle, $pTag, $pExcerpt, $pDate, $pMins] = $posts[$idx];
    $tone  = $tagTone[$pTag] ?? 'c-navy';
    $icon  = $tagIcon[$pTag] ?? 'bi-journal-medical';
    $newer = $idx > 0 ? $posts[$idx - 1] : null;
    $older = $idx < count($posts) - 1 ? $posts[$idx + 1] : null;

    [$bodyHtml, $toc] = isset($blogBodies[$pSlug]) ? bd_render($blogBodies[$pSlug]) : ['', []];

    /* Related: same tag first, then latest others, max 3 */
    $related = array_values(array_filter($posts, fn($p) => $p[0] !== $pSlug && $p[2] === $pTag));
    if (count($related) < 3) {
        foreach ($posts as $p) {
            if ($p[0] === $pSlug || in_array($p, $related, true)) continue;
            $related[] = $p;
            if (count($related) === 3) break;
        }
    }
    $related = array_slice($related, 0, 3);

    /* ---------- SEO ---------- */
    $pageUrl     = $siteUrl . $detailsPage . '?slug=' . $pSlug;
    $title       = $pTitle . " | HOK Academy Blog";
    $description = $pExcerpt;
    $keywords    = "HOK Academy blog, $pTag, " . strtolower($pTitle);
    $canonical   = $pageUrl;
    $robots      = "index, follow";
    $ogImage     = $siteUrl . $imgDir . $pSlug . ".jpg";

    $shareUrl   = rawurlencode($pageUrl);
    $shareTitle = rawurlencode($pTitle);

    $schema = [
        '@context'         => 'https://schema.org',
        '@type'            => 'Article',
        'headline'         => $pTitle,
        'description'      => $pExcerpt,
        'image'            => $ogImage,
        'datePublished'    => $pDate,
        'dateModified'     => $pDate,
        'author'           => ['@type' => 'Organization', 'name' => 'HOK Academy'],
        'publisher'        => ['@type' => 'Organization', 'name' => 'HOK Academy', 'url' => $siteUrl],
        'mainEntityOfPage' => $pageUrl,
    ];
} else {
    http_response_code(404);
    $title       = "Article not found | HOK Academy Blog";
    $description = "The article you are looking for could not be found.";
    $keywords    = "HOK Academy blog";
    $canonical   = $siteUrl . $blogPage;
    $robots      = "noindex, follow";
}

ob_start();
?>


<main id="main">

    <?php if ($found): ?>

        <!-- Reading progress -->
        <div class="bd-progress" aria-hidden="true"><span id="bdProgress"></span></div>

        <!-- ============ BLOG HERO START ============ -->
        <section class="ab-hero bd-hero" aria-labelledby="bdTitle">
            <div class="container">
                <nav aria-label="Breadcrumb">
                    <ol class="ab-crumb">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="<?= $blogPage ?>">Blog</a></li>
                        <li aria-current="page"><?= e($pTag) ?></li>
                    </ol>
                </nav>
                <h1 id="bdTitle"><?= e($pTitle) ?></h1>
                <p class="bd-hero-meta">
                    <a class="bd-hero-tag" href="<?= e($blogPage . '?cat=' . urlencode($pTag)) ?>#posts"><?= e($pTag) ?></a>
                    <time datetime="<?= e($pDate) ?>"><i class="bi bi-calendar3"></i> <?= date('d M Y', strtotime($pDate)) ?></time>
                    <span><i class="bi bi-clock"></i> <?= (int)$pMins ?> min read</span>
                    <span><i class="bi bi-person"></i> HOK Academy</span>
                </p>
            </div>
        </section>
        <!-- ============ BLOG HERO END ============ -->


        <!-- ============ ARTICLE START ============ -->
        <section id="article" class="sec sec-white bd-sec">
            <div class="container">
                <div class="bd-layout">

                    <article class="bd-article <?= $tone ?>">

                        <!-- Cover -->
                        <figure class="bd-cover">
                            <img src="<?= $imgDir . e($pSlug) ?>.jpg" width="1200" height="675" alt="<?= e($pTitle) ?>"
                                fetchpriority="high" onerror="this.remove()">
                            <i class="bi <?= $icon ?> bd-cover-fb"></i>
                        </figure>

                        <p class="bd-lead"><?= e($pExcerpt) ?></p>

                        <?php if (count($toc) >= 3):
                            ob_start(); ?>
                            <ol>
                                <?php foreach ($toc as [$id, $label]): ?>
                                    <li><a href="#<?= e($id) ?>"><?= e($label) ?></a></li>
                                <?php endforeach; ?>
                            </ol>
                            <?php $tocList = ob_get_clean(); ?>
                            <!-- Contents (mobile / tablet) -->
                            <details class="bd-toc-m">
                                <summary>In this article</summary>
                                <?= $tocList ?>
                            </details>
                        <?php else: $tocList = '';
                        endif; ?>

                        <?php if ($bodyHtml): ?>
                            <div class="bd-body"><?= $bodyHtml ?></div>
                        <?php else: ?>
                            <div class="bd-body">
                                <aside class="bd-note">
                                    <i class="bi bi-hourglass-split" aria-hidden="true"></i>
                                    <p><strong>Full article coming soon.</strong> We are preparing this article. Meanwhile, explore other insights from HOK Academy or get in touch with a question.</p>
                                </aside>
                            </div>
                        <?php endif; ?>

                        <p class="bd-disclaimer">This article is for educational purposes only and is not a substitute for professional medical advice or clinical training.</p>

                        <!-- Share + tag -->
                        <div class="bd-foot">
                            <div class="bd-foot-tag">
                                <span>Filed under</span>
                                <a class="bd-chip" href="<?= e($blogPage . '?cat=' . urlencode($pTag)) ?>#posts"><?= e($pTag) ?></a>
                            </div>
                            <div class="bd-share" role="group" aria-label="Share this article">
                                <span>Share</span>
                                <a href="https://wa.me/?text=<?= $shareTitle ?>%20<?= $shareUrl ?>" target="_blank" rel="noopener" aria-label="Share on WhatsApp"><i class="bi bi-whatsapp"></i></a>
                                <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?= $shareUrl ?>" target="_blank" rel="noopener" aria-label="Share on LinkedIn"><i class="bi bi-linkedin"></i></a>
                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?= $shareUrl ?>" target="_blank" rel="noopener" aria-label="Share on Facebook"><i class="bi bi-facebook"></i></a>
                                <a href="https://twitter.com/intent/tweet?url=<?= $shareUrl ?>&amp;text=<?= $shareTitle ?>" target="_blank" rel="noopener" aria-label="Share on X"><i class="bi bi-twitter-x"></i></a>
                                <button type="button" id="bdCopy" data-url="<?= e($pageUrl) ?>" aria-label="Copy link"><i class="bi bi-link-45deg"></i></button>
                                <span class="bd-copied" id="bdCopied" role="status" aria-live="polite"></span>
                            </div>
                        </div>

                        <!-- Older / newer -->
                        <nav class="bd-pn" aria-label="More articles">
                            <?php if ($newer): ?>
                                <a class="bd-pn-link is-prev" href="<?= $detailsPage ?>?slug=<?= e($newer[0]) ?>" rel="prev">
                                    <small><i class="bi bi-arrow-left"></i> Newer article</small>
                                    <strong><?= e($newer[1]) ?></strong>
                                </a>
                            <?php else: ?><span></span><?php endif; ?>
                            <?php if ($older): ?>
                                <a class="bd-pn-link is-next" href="<?= $detailsPage ?>?slug=<?= e($older[0]) ?>" rel="next">
                                    <small>Older article <i class="bi bi-arrow-right"></i></small>
                                    <strong><?= e($older[1]) ?></strong>
                                </a>
                            <?php endif; ?>
                        </nav>
                    </article>

                    <!-- Sidebar -->
                    <aside class="bd-side" aria-label="Article sidebar">
                        <?php if ($tocList): ?>
                            <div class="bd-card bd-toc">
                                <h2 class="bd-card-title">In this article</h2>
                                <?= $tocList ?>
                            </div>
                        <?php endif; ?>

                        <div class="bd-cta">
                            <i class="bi bi-chat-heart"></i>
                            <h2>Have a question about our programs?</h2>
                            <p>Tell us your profession and area of interest. Our team will guide you to the right program.</p>
                            <a href="contact.php" class="btn btn-light">Enquire Now</a>
                        </div>
                    </aside>
                </div>
            </div>
        </section>
        <!-- ============ ARTICLE END ============ -->


        <!-- ============ RELATED START ============ -->
        <section id="related" class="sec sec-tint bd-related">
            <div class="container">
                <div class="bl-head">
                    <div>
                        <p class="eyebrow">Keep reading</p>
                        <h2 class="sec-title">More from HOK Academy</h2>
                    </div>
                    <a href="<?= $blogPage ?>" class="btn btn-line d-none d-md-inline-flex">View All Articles</a>
                </div>

                <div class="bp-grid">
                    <?php foreach ($related as [$rSlug, $rTitle, $rTag, $rExcerpt, $rDate, $rMins]):
                        $rTone = $tagTone[$rTag] ?? 'c-navy';
                        $rIcon = $tagIcon[$rTag] ?? 'bi-journal-medical'; ?>
                        <article class="bp-card <?= $rTone ?>">
                            <div class="bp-media">
                                <img src="<?= $imgDir . e($rSlug) ?>.jpg" width="640" height="400" loading="lazy"
                                    alt="<?= e($rTitle) ?>" onerror="this.remove()">
                                <i class="bi <?= $rIcon ?> bp-fallback"></i>
                                <span class="bp-tag"><?= e($rTag) ?></span>
                            </div>
                            <div class="bp-body">
                                <p class="bp-meta">
                                    <time datetime="<?= e($rDate) ?>"><i class="bi bi-calendar3"></i> <?= date('d M Y', strtotime($rDate)) ?></time>
                                    <span><i class="bi bi-clock"></i> <?= (int)$rMins ?> min read</span>
                                </p>
                                <h3><a href="<?= $detailsPage ?>?slug=<?= e($rSlug) ?>"><?= e($rTitle) ?></a></h3>
                                <p class="bp-excerpt"><?= e($rExcerpt) ?></p>
                                <span class="bp-more">Read article <i class="bi bi-arrow-right"></i></span>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>

                <div class="btn-row d-md-none bl-all">
                    <a href="<?= $blogPage ?>" class="btn btn-line">View All Articles</a>
                </div>
            </div>
        </section>
        <!-- ============ RELATED END ============ -->


        <script type="application/ld+json">
            <?= json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG) ?>
        </script>

        <script>
            (function() {
                /* Reading progress bar */
                var bar = document.getElementById('bdProgress');
                var art = document.querySelector('.bd-body');
                if (bar && art) {
                    var tick = false;
                    var update = function() {
                        var r = art.getBoundingClientRect();
                        var total = r.height - window.innerHeight * 0.6;
                        var done = Math.min(Math.max(-r.top + window.innerHeight * 0.2, 0), total);
                        bar.style.transform = 'scaleX(' + (total > 0 ? done / total : 1) + ')';
                        tick = false;
                    };
                    window.addEventListener('scroll', function() {
                        if (!tick) {
                            tick = true;
                            requestAnimationFrame(update);
                        }
                    }, {
                        passive: true
                    });
                    update();
                }

                /* Copy link */
                var btn = document.getElementById('bdCopy');
                var msg = document.getElementById('bdCopied');
                if (btn) {
                    btn.addEventListener('click', function() {
                        var url = btn.getAttribute('data-url');
                        var done = function(t) {
                            msg.textContent = t;
                            setTimeout(function() {
                                msg.textContent = '';
                            }, 2200);
                        };
                        if (navigator.clipboard && navigator.clipboard.writeText) {
                            navigator.clipboard.writeText(url).then(function() {
                                    done('Link copied');
                                },
                                function() {
                                    done('Copy failed');
                                });
                        } else {
                            done('Copy not supported');
                        }
                    });
                }
            })();
        </script>

    <?php else: ?>

        <!-- ============ NOT FOUND START ============ -->
        <section class="ab-hero" aria-labelledby="bdTitle">
            <div class="container">
                <nav aria-label="Breadcrumb">
                    <ol class="ab-crumb">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="<?= $blogPage ?>">Blog</a></li>
                        <li aria-current="page">Not found</li>
                    </ol>
                </nav>
                <h1 id="bdTitle">Article not found</h1>
            </div>
        </section>

        <section class="sec sec-tint">
            <div class="container">
                <div class="bp-empty">
                    <i class="bi bi-journal-x"></i>
                    <h2>We could not find that article</h2>
                    <p>It may have been moved or the link may be incorrect. Browse all our articles instead.</p>
                    <a href="<?= $blogPage ?>" class="btn btn-hok btn-lg">View All Articles</a>
                </div>
            </div>
        </section>
        <!-- ============ NOT FOUND END ============ -->

    <?php endif; ?>

</main>


<?php
$content = ob_get_clean();
include_once  'layout.php';
?>