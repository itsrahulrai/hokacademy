@extends('layouts.app')

@section('content')
<main id="main">
    <!-- ============ ABOUT HERO START ============ -->
    <section class="ab-hero" aria-labelledby="abTitle">
        <div class="container">
            <nav aria-label="Breadcrumb">
                <ol class="ab-crumb">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li aria-current="page">Blog</li>
                </ol>
            </nav>
            <h1 id="abTitle">Blogs</h1>
            <p class="ab-hero-tag">
                <span>Clinical Perspectives.</span>
                <span>Educational Insights.</span>
                <span>Medical Innovation.</span>
            </p>
        </div>
    </section>
    <!-- ============ ABOUT HERO END ============ -->

    <!-- ============ BLOG LIST START ============ -->
    <section id="posts" class="sec sec-tint">
        <div class="container">

            <!-- Category filter -->
            <div class="bp-filter" role="navigation" aria-label="Filter articles by category">
                <a href="{{ route('blog.index') }}#posts" class="bp-pill {{ !request('tag') ? 'active' : '' }}"
                    {{ !request('tag') ? 'aria-current="true"' : '' }}>All <span>{{ $blogs->total() }}</span></a>
                @foreach ($tags as $t)
                    <a href="{{ route('blog.index', ['tag' => $t]) }}#posts"
                        class="bp-pill {{ request('tag') === $t ? 'active' : '' }}"
                        {{ request('tag') === $t ? 'aria-current="true"' : '' }}>{{ $t }}</a>
                @endforeach
            </div>

            <p class="bp-status" aria-live="polite">
                @if ($blogs->total())
                    Showing {{ $blogs->firstItem() }}&ndash;{{ $blogs->lastItem() }} of {{ $blogs->total() }} articles{{ request('tag') ? ' in "' . request('tag') . '"' : '' }}
                @else
                    No articles found.
                @endif
            </p>

            @if ($blogs->count() > 0)
                <div class="bp-grid">
                    @foreach ($blogs as $blog)
                        <article class="bp-card c-navy">
                            <div class="bp-media">
                                <img src="{{ $blog->image_url }}" width="640" height="400" loading="lazy"
                                    alt="{{ $blog->title }}" onerror="this.remove()">
                                <i class="bi bi-journal-medical bp-fallback"></i>
                                <span class="bp-tag">{{ $blog->category_tag ?? 'Medical' }}</span>
                            </div>
                            <div class="bp-body">
                                <p class="bp-meta">
                                    <time datetime="{{ $blog->published_at ? $blog->published_at->format('Y-m-d') : '' }}">
                                        <i class="bi bi-calendar3"></i> {{ $blog->published_at ? $blog->published_at->format('d M Y') : '' }}
                                    </time>
                                    <span><i class="bi bi-clock"></i> {{ $blog->read_time ?? 5 }} min read</span>
                                </p>
                                <h2><a href="{{ route('blog.show', $blog->slug) }}">{{ $blog->title }}</a></h2>
                                <p class="bp-excerpt">{{ $blog->excerpt }}</p>
                                <a href="{{ route('blog.show', $blog->slug) }}" class="bp-more">Read article <i class="bi bi-arrow-right"></i></a>
                            </div>
                        </article>
                    @endforeach
                </div>

                <!-- Pagination -->
                @if ($blogs->hasPages())
                    <nav class="bp-pager" aria-label="Blog pagination">
                        <ul>
                            <li>
                                @if ($blogs->onFirstPage())
                                    <span class="is-off" aria-disabled="true"><i class="bi bi-arrow-left"></i><span>Prev</span></span>
                                @else
                                    <a href="{{ $blogs->previousPageUrl() }}#posts" rel="prev" aria-label="Previous page">
                                        <i class="bi bi-arrow-left"></i><span>Prev</span></a>
                                @endif
                            </li>

                            @foreach ($blogs->getUrlRange(1, $blogs->lastPage()) as $page => $url)
                                @if ($page == $blogs->currentPage())
                                    <li><span class="is-current" aria-current="page">{{ $page }}</span></li>
                                @else
                                    <li><a href="{{ $url }}#posts" aria-label="Page {{ $page }}">{{ $page }}</a></li>
                                @endif
                            @endforeach

                            <li>
                                @if ($blogs->hasMorePages())
                                    <a href="{{ $blogs->nextPageUrl() }}#posts" rel="next" aria-label="Next page">
                                        <span>Next</span><i class="bi bi-arrow-right"></i></a>
                                @else
                                    <span class="is-off" aria-disabled="true"><span>Next</span><i class="bi bi-arrow-right"></i></span>
                                @endif
                            </li>
                        </ul>
                        <p class="bp-pager-info">Page {{ $blogs->currentPage() }} of {{ $blogs->lastPage() }}</p>
                    </nav>
                @endif
            @else
                <div class="bp-empty">
                    <i class="bi bi-journal-x"></i>
                    <h2>No articles found</h2>
                    <p>Try another category or view all articles.</p>
                    <a href="{{ route('blog.index') }}" class="btn btn-hok btn-lg">View All Articles</a>
                </div>
            @endif

        </div>
    </section>
    <!-- ============ BLOG LIST END ============ -->
</main>
@endsection
