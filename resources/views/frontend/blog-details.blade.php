@extends('layouts.app')

@section('content')
<main id="main">
    <!-- Reading progress -->
    <div class="bd-progress" aria-hidden="true"><span id="bdProgress"></span></div>

    <!-- ============ BLOG HERO START ============ -->
    <section class="ab-hero bd-hero" aria-labelledby="bdTitle">
        <div class="container">
            <nav aria-label="Breadcrumb">
                <ol class="ab-crumb">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('blog.index') }}">Blog</a></li>
                    <li aria-current="page">{{ $blog->category_tag ?? 'Article' }}</li>
                </ol>
            </nav>
            <h1 id="bdTitle">{{ $blog->title }}</h1>
            <p class="bd-hero-meta">
                <a class="bd-hero-tag" href="{{ route('blog.index', ['tag' => $blog->category_tag]) }}#posts">{{ $blog->category_tag }}</a>
                <time datetime="{{ $blog->published_at ? $blog->published_at->format('Y-m-d') : '' }}">
                    <i class="bi bi-calendar3"></i> {{ $blog->published_at ? $blog->published_at->format('d M Y') : '' }}
                </time>
                <span><i class="bi bi-clock"></i> {{ $blog->read_time ?? 5 }} min read</span>
                <span><i class="bi bi-person"></i> HOK Academy</span>
            </p>
        </div>
    </section>
    <!-- ============ BLOG HERO END ============ -->

    <!-- ============ ARTICLE START ============ -->
    <section id="article" class="sec sec-white bd-sec">
        <div class="container">
            <div class="bd-layout">

                @php
                    $tagTone = match($blog->category_tag) {
                        'Aesthetic Medicine' => 'c-blue',
                        'Patient Safety' => 'c-teal',
                        'International' => 'c-navy',
                        'Laser & Energy' => 'c-red',
                        'Clinical Education' => 'c-navy',
                        'Nursing & OT' => 'c-blue',
                        'PMU' => 'c-teal',
                        'Surgery' => 'c-red',
                        default => 'c-navy'
                    };
                    $tagIcon = match($blog->category_tag) {
                        'Aesthetic Medicine' => 'bi-stars',
                        'Patient Safety' => 'bi-shield-check',
                        'International' => 'bi-globe-asia-australia',
                        'Laser & Energy' => 'bi-lightning-charge',
                        'Clinical Education' => 'bi-mortarboard',
                        'Nursing & OT' => 'bi-hospital',
                        'PMU' => 'bi-palette',
                        'Surgery' => 'bi-bandaid',
                        default => 'bi-journal-medical'
                    };
                @endphp

                <article class="bd-article {{ $tagTone }}">
                    <!-- Cover -->
                    <figure class="bd-cover">
                        @if($blog->featured_image)
                            <img src="{{ $blog->image_url }}" width="1200" height="675" alt="{{ $blog->title }}"
                                fetchpriority="high" onerror="this.remove()">
                        @endif
                        <i class="bi {{ $tagIcon }} bd-cover-fb"></i>
                    </figure>

                    @if($blog->excerpt)
                        <p class="bd-lead">{{ $blog->excerpt }}</p>
                    @endif

                    <div class="bd-body">
                        {!! $blog->content !!}
                    </div>

                    <p class="bd-disclaimer">This article is for educational purposes only and is not a substitute for professional medical advice or clinical training.</p>

                    <!-- Share + tag -->
                    <div class="bd-foot">
                        <div class="bd-foot-tag">
                            <span>Filed under</span>
                            <a class="bd-chip" href="{{ route('blog.index', ['tag' => $blog->category_tag]) }}#posts">{{ $blog->category_tag }}</a>
                        </div>
                        <div class="bd-share" role="group" aria-label="Share this article">
                            <span>Share</span>
                            <a href="https://wa.me/?text={{ rawurlencode($blog->title . ' ' . url()->current()) }}" target="_blank" rel="noopener" aria-label="Share on WhatsApp"><i class="bi bi-whatsapp"></i></a>
                            <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ rawurlencode(url()->current()) }}" target="_blank" rel="noopener" aria-label="Share on LinkedIn"><i class="bi bi-linkedin"></i></a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ rawurlencode(url()->current()) }}" target="_blank" rel="noopener" aria-label="Share on Facebook"><i class="bi bi-facebook"></i></a>
                            <a href="https://twitter.com/intent/tweet?url={{ rawurlencode(url()->current()) }}&amp;text={{ rawurlencode($blog->title) }}" target="_blank" rel="noopener" aria-label="Share on X"><i class="bi bi-twitter-x"></i></a>
                            <button type="button" id="bdCopy" data-url="{{ url()->current() }}" aria-label="Copy link"><i class="bi bi-link-45deg"></i></button>
                            <span class="bd-copied" id="bdCopied" role="status" aria-live="polite"></span>
                        </div>
                    </div>

                    <!-- Older / newer -->
                    @if(isset($newerBlog) || isset($olderBlog))
                        <nav class="bd-pn" aria-label="More articles">
                            @if(isset($newerBlog) && $newerBlog)
                                <a class="bd-pn-link is-prev" href="{{ route('blog.show', $newerBlog->slug) }}" rel="prev">
                                    <small><i class="bi bi-arrow-left"></i> Newer article</small>
                                    <strong>{{ $newerBlog->title }}</strong>
                                </a>
                            @else
                                <span></span>
                            @endif
                            @if(isset($olderBlog) && $olderBlog)
                                <a class="bd-pn-link is-next" href="{{ route('blog.show', $olderBlog->slug) }}" rel="next">
                                    <small>Older article <i class="bi bi-arrow-right"></i></small>
                                    <strong>{{ $olderBlog->title }}</strong>
                                </a>
                            @endif
                        </nav>
                    @endif
                </article>

                <!-- Sidebar -->
                <aside class="bd-side" aria-label="Article sidebar">
                    <!-- CTA Box -->
                    <div class="bd-cta">
                        <i class="bi bi-mortarboard"></i>
                        <h2>{{ \App\Models\Setting::get('blog_cta_title', 'Learn with Specialists') }}</h2>
                        <p>{{ \App\Models\Setting::get('blog_cta_desc', 'Explore structured clinical education across our disciplines at HOK Academy.') }}</p>
                        <a href="{{ route('programs.index') }}" class="btn btn-light">{{ \App\Models\Setting::get('blog_cta_btn_text', 'Explore Programs') }}</a>
                    </div>

                    <!-- More from the blog -->
                    @if(isset($recentBlogs) && $recentBlogs->count() > 0)
                        <div class="bd-side-card">
                            <h2 class="bd-side-title">
                                <span>More from the blog</span>
                                <i class="bi bi-newspaper" style="color: var(--primary); font-size: 1.1rem;"></i>
                            </h2>
                            <ul class="bd-recent-list">
                                @foreach($recentBlogs as $rb)
                                    @php
                                        $rbIcon = match($rb->category_tag) {
                                            'Aesthetic Medicine' => 'bi-stars',
                                            'Patient Safety' => 'bi-shield-check',
                                            'International' => 'bi-globe-asia-australia',
                                            'Laser & Energy' => 'bi-lightning-charge',
                                            'Clinical Education' => 'bi-mortarboard',
                                            'Nursing & OT' => 'bi-hospital',
                                            'PMU' => 'bi-palette',
                                            'Surgery' => 'bi-bandaid',
                                            default => 'bi-journal-text'
                                        };
                                    @endphp
                                    <li class="bd-recent-item">
                                        <a href="{{ route('blog.show', $rb->slug) }}" class="bd-recent-card">
                                            <div class="bd-recent-thumb">
                                                @if($rb->featured_image)
                                                    <img src="{{ $rb->image_url }}" alt="{{ $rb->title }}" loading="lazy" onerror="this.remove()">
                                                @endif
                                                <i class="bi {{ $rbIcon }}"></i>
                                            </div>
                                            <div class="bd-recent-info">
                                                <span class="bd-recent-badge">{{ $rb->category_tag }}</span>
                                                <h3 class="bd-recent-title">{{ $rb->title }}</h3>
                                                <div class="bd-recent-meta">
                                                    @if($rb->published_at)
                                                        <span><i class="bi bi-calendar3"></i> {{ $rb->published_at->format('d M') }}</span>
                                                    @endif
                                                    <span><i class="bi bi-clock"></i> {{ $rb->read_time ?? 5 }} min</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Explore Topics (Categories) -->
                    @if(isset($categories) && $categories->count() > 0)
                        <div class="bd-side-card">
                            <h2 class="bd-side-title">
                                <span>Explore Topics</span>
                                <i class="bi bi-tags" style="color: var(--teal); font-size: 1.1rem;"></i>
                            </h2>
                            <ul class="bd-cat-pills">
                                @foreach($categories as $cat)
                                    <li class="bd-cat-pill">
                                        <a href="{{ route('blog.index', ['tag' => $cat->category_tag]) }}#posts">
                                            {{ $cat->category_tag }}
                                            <span class="badge-num">{{ $cat->post_count }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </aside>

            </div>
        </div>
    </section>
    <!-- ============ ARTICLE END ============ -->

    <!-- ============ RELATED START ============ -->
    @php
        $displayRelated = ($relatedBlogs && $relatedBlogs->count() > 0) ? $relatedBlogs : ($recentBlogs ? $recentBlogs->take(3) : collect());
    @endphp
    @if($displayRelated && $displayRelated->count() > 0)
    <section id="related" class="sec sec-tint bd-related">
        <div class="container">
            <div class="bl-head">
                <div>
                    <p class="eyebrow">Keep reading</p>
                    <h2 class="sec-title">More from HOK Academy</h2>
                </div>
                <a href="{{ route('blog.index') }}" class="btn btn-line d-none d-md-inline-flex">View All Articles</a>
            </div>

            <div class="bp-grid">
                @foreach($displayRelated as $r)
                    @php
                        $rTone = match($r->category_tag) {
                            'Aesthetic Medicine' => 'c-blue',
                            'Patient Safety' => 'c-teal',
                            'International' => 'c-navy',
                            'Laser & Energy' => 'c-red',
                            'Clinical Education' => 'c-navy',
                            'Nursing & OT' => 'c-blue',
                            'PMU' => 'c-teal',
                            'Surgery' => 'c-red',
                            default => 'c-navy'
                        };
                        $rIcon = match($r->category_tag) {
                            'Aesthetic Medicine' => 'bi-stars',
                            'Patient Safety' => 'bi-shield-check',
                            'International' => 'bi-globe-asia-australia',
                            'Laser & Energy' => 'bi-lightning-charge',
                            'Clinical Education' => 'bi-mortarboard',
                            'Nursing & OT' => 'bi-hospital',
                            'PMU' => 'bi-palette',
                            'Surgery' => 'bi-bandaid',
                            default => 'bi-journal-medical'
                        };
                    @endphp
                    <article class="bp-card {{ $rTone }}">
                        <div class="bp-media">
                            <img src="{{ $r->image_url }}" width="640" height="400" loading="lazy"
                                alt="{{ $r->title }}" onerror="this.remove()">
                            <i class="bi {{ $rIcon }} bp-fallback"></i>
                            <span class="bp-tag">{{ $r->category_tag }}</span>
                        </div>
                        <div class="bp-body">
                            <p class="bp-meta">
                                <time datetime="{{ $r->published_at ? $r->published_at->format('Y-m-d') : '' }}"><i class="bi bi-calendar3"></i> {{ $r->published_at ? $r->published_at->format('d M Y') : '' }}</time>
                                <span><i class="bi bi-clock"></i> {{ $r->read_time ?? 5 }} min read</span>
                            </p>
                            <h3><a href="{{ route('blog.show', $r->slug) }}">{{ $r->title }}</a></h3>
                            <p class="bp-excerpt">{{ $r->excerpt }}</p>
                            <span class="bp-more">Read article <i class="bi bi-arrow-right"></i></span>
                        </div>
                    </article>
                @endforeach
            </div>

            <div class="btn-row d-md-none bl-all">
                <a href="{{ route('blog.index') }}" class="btn btn-line">View All Articles</a>
            </div>
        </div>
    </section>
    @endif
    <!-- ============ RELATED END ============ -->
</main>
@endsection

@push('styles')
<style>
/* Modern Blog Details Sidebar & Cards */
.bd-side {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

.bd-side-card {
    background: #ffffff;
    border: 1px solid var(--line);
    border-radius: 1rem;
    padding: 1.35rem;
    box-shadow: var(--shadow);
}

.bd-side-title {
    font-family: var(--font-head);
    font-size: 1.05rem;
    font-weight: 700;
    color: var(--navy);
    margin: 0 0 1.1rem;
    padding-bottom: 0.65rem;
    border-bottom: 2px solid var(--accent);
    display: flex;
    align-items: center;
    justify-content: space-between;
}

/* Recent Posts List (Zero bullets guaranteed) */
.bd-recent-list {
    list-style: none !important;
    margin: 0 !important;
    padding: 0 !important;
    display: flex;
    flex-direction: column;
    gap: 0.9rem;
}

.bd-recent-item {
    list-style: none !important;
    margin: 0 !important;
    padding: 0 0 0.9rem 0 !important;
    border-bottom: 1px solid var(--line);
}

.bd-recent-item:last-child {
    border-bottom: none !important;
    padding-bottom: 0 !important;
}

.bd-recent-card {
    display: flex;
    align-items: flex-start;
    gap: 0.85rem;
    text-decoration: none !important;
    color: inherit;
    transition: transform 0.2s ease;
}

.bd-recent-card:hover {
    transform: translateX(3px);
}

.bd-recent-thumb {
    width: 60px;
    height: 60px;
    flex-shrink: 0;
    border-radius: 10px;
    overflow: hidden;
    background: linear-gradient(135deg, var(--navy-deep), var(--navy));
    display: flex;
    align-items: center;
    justify-content: center;
    color: #ffffff;
    position: relative;
}

.bd-recent-thumb img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    position: absolute;
    inset: 0;
    z-index: 1;
}

.bd-recent-thumb i {
    font-size: 1.4rem;
    color: var(--accent-light);
    z-index: 0;
}

.bd-recent-info {
    flex: 1;
    min-width: 0;
}

.bd-recent-badge {
    display: inline-block;
    font-family: var(--font-head);
    font-size: 0.72rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.03em;
    color: var(--primary);
    background: var(--t-blue);
    padding: 0.15rem 0.55rem;
    border-radius: 999px;
    margin-bottom: 0.35rem;
}

.bd-recent-title {
    font-family: var(--font-head);
    font-size: 0.92rem;
    font-weight: 700;
    line-height: 1.38;
    color: var(--navy);
    margin: 0 0 0.35rem;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    transition: color 0.2s ease;
}

.bd-recent-card:hover .bd-recent-title {
    color: var(--primary);
}

.bd-recent-meta {
    display: flex;
    align-items: center;
    gap: 0.65rem;
    font-size: 0.78rem;
    color: var(--muted);
}

.bd-recent-meta span {
    display: inline-flex;
    align-items: center;
    gap: 0.25rem;
}

/* Category Topics Pill Grid */
.bd-cat-pills {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
    margin: 0;
    padding: 0;
    list-style: none !important;
}

.bd-cat-pill {
    list-style: none !important;
    margin: 0 !important;
    padding: 0 !important;
}

.bd-cat-pill a {
    display: inline-flex;
    align-items: center;
    gap: 0.4rem;
    font-family: var(--font-head);
    font-size: 0.8rem;
    font-weight: 600;
    color: var(--navy);
    background: var(--bg-alt);
    border: 1px solid var(--line);
    padding: 0.35rem 0.75rem;
    border-radius: 999px;
    text-decoration: none;
    transition: all 0.2s ease;
}

.bd-cat-pill a:hover {
    background: var(--navy);
    color: #ffffff;
    border-color: var(--navy);
}

.bd-cat-pill a .badge-num {
    background: rgba(0, 0, 0, 0.08);
    color: inherit;
    font-size: 0.72rem;
    padding: 0.1rem 0.45rem;
    border-radius: 999px;
}

.bd-cat-pill a:hover .badge-num {
    background: rgba(255, 255, 255, 0.25);
    color: #ffffff;
}
</style>
@endpush

@push('scripts')
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
@endpush
