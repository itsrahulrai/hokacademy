@extends('layouts.app')

@section('content')
<main id="main">
    <!-- ============ HERO START ============ -->
    <section class="ab-hero" aria-labelledby="prTitle">
        <div class="container">
            <nav aria-label="Breadcrumb">
                <ol class="ab-crumb">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li aria-current="page">Programs</li>
                </ol>
            </nav>
            <h1 id="prTitle">Medical Training &amp; Courses</h1>
            <p class="ab-hero-tag">
                <span>Advancing Medical Knowledge.</span>
                <span>Transforming Clinical Practice.</span>
                <span>Connecting Expertise Across Borders.</span>
            </p>
        </div>
    </section>
    <!-- ============ HERO END ============ -->

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
                    <i class="bi bi-grid"></i> All <span>{{ $categories->sum(fn($c) => $c->programs->count()) }}</span>
                </button>
                @foreach ($categories as $g)
                    <button type="button" class="sv-pill {{ $g->tone_class }}" data-filter="{{ $g->slug }}" aria-pressed="false">
                        <i class="bi {{ $g->icon }}"></i> {{ $g->short_name }}
                        <span>{{ $g->programs->count() }}</span>
                    </button>
                @endforeach
            </div>

            <p class="sv-status" id="svStatus" aria-live="polite">Showing all {{ $categories->sum(fn($c) => $c->programs->count()) }} programs</p>

            <!-- Cards -->
            <div class="sv-grid" id="svGrid">
                @foreach ($categories as $g)
                    @foreach ($g->programs as $prog)
                        <article class="sv-card {{ $g->tone_class }}" data-cat="{{ $g->slug }}">
                            <a href="{{ route('programs.show', $prog->slug) }}" class="sv-img" aria-label="{{ $prog->title }}">
                                <img src="{{ $prog->image_url }}" width="640" height="400" loading="lazy"
                                    alt="{{ $prog->title }}" onerror="this.remove()">
                                <i class="bi {{ $g->icon }} sv-fallback"></i>
                                <span class="sv-tag">{{ $g->short_name }}</span>
                            </a>
                            <div class="sv-body">
                                <span class="sv-chip"><i class="bi {{ $prog->icon ?? $g->icon }}"></i></span>
                                <h4><a href="{{ route('programs.show', $prog->slug) }}" class="text-reset text-decoration-none">{{ $prog->title }}</a></h4>
                                <p>{{ $prog->short_description }}</p>
                                <div class="sv-foot">
                                    <a href="{{ route('programs.show', $prog->slug) }}"
                                        class="sv-btn" aria-label="Read more about {{ $prog->title }}">
                                        <span>Read more</span>
                                        <i class="bi bi-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                @endforeach
            </div>

            <div class="btn-row sv-all mt-4">
                <a href="{{ route('contact.index') }}" class="btn btn-hok btn-lg">Enquire About Any Program</a>
            </div>
        </div>
    </section>
    <!-- ============ SERVICES CARDS SECTION END ============ -->
</main>
@endsection

@push('scripts')
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
            if (status) {
                status.textContent = (filter === 'all' ? 'Showing all ' : 'Showing ') + shown + ' programs';
            }
        }

        pills.forEach(function(p) {
            p.addEventListener('click', function() {
                apply(p.dataset.filter);
            });
        });

        // Deep link: #services?cat=pmu ya #sv-pmu ya URL param
        var urlParams = new URLSearchParams(window.location.search);
        var catParam = urlParams.get('category');
        if (catParam && document.querySelector('.sv-pill[data-filter="' + catParam + '"]')) {
            apply(catParam);
        } else {
            var m = location.hash.match(/^#sv-(\w+)/);
            if (m && document.querySelector('.sv-pill[data-filter="' + m[1] + '"]')) apply(m[1]);
        }
    })();
</script>
@endpush
