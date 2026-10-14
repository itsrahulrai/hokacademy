@extends('layouts.app')

@section('title', $page->meta_title ?: $page->title . ' - HOK Academy')
@section('meta_description', $page->meta_description ?: ($page->header_subtitle ?: ''))
@section('meta_keywords', $page->meta_keywords ?: '')
@if($page->canonical_url)
    @section('canonical', $page->canonical_url)
@endif

@section('content')
<main id="main">
    <!-- Hero Header Banner -->
    <section class="ab-hero" aria-labelledby="pageMainTitle">
        <div class="container">
            <nav aria-label="Breadcrumb">
                <ol class="ab-crumb">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li aria-current="page">{{ $page->title }}</li>
                </ol>
            </nav>
            <h1 id="pageMainTitle">{{ $page->header_title ?: $page->title }}</h1>
            @if($page->header_subtitle)
                <p class="ab-hero-tag">
                    <span>{{ $page->header_subtitle }}</span>
                </p>
            @endif
        </div>
    </section>

    <!-- Page Body Content -->
    <section class="sec sec-white py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <article class="page-body-content bg-white p-4 p-md-5 rounded-4 shadow-sm border" style="line-height: 1.85; color: #334155;">
                        @if($page->content)
                            <div class="content-render">
                                {!! $page->content !!}
                            </div>
                        @else
                            <div class="text-center py-5 text-muted">
                                <i class="bi bi-file-earmark-text fs-1 d-block mb-3 text-secondary"></i>
                                <h4 class="fw-bold" style="color: var(--hok-navy, #071D3A);">Content Coming Soon</h4>
                                <p class="mb-0">This page is currently being updated. Please check back shortly.</p>
                            </div>
                        @endif
                    </article>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

