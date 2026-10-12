@extends('admin.layouts.app')

@section('title', 'Edit Page - ' . $page->title)

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="h4 fw-bold mb-1">Edit Page &amp; SEO: {{ $page->title }}</h2>
        <p class="text-muted small mb-0">URL Path: <code>/{{ $page->slug === 'home' ? '' : $page->slug }}</code></p>
    </div>
    <a href="{{ route('admin.pages.index') }}" class="btn btn-outline-secondary btn-sm">
        <i class="bi bi-arrow-left me-1"></i> Back to Pages
    </a>
</div>

<form action="{{ route('admin.pages.update', $page->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row g-4">
        <!-- Left: Page Titles & Headers -->
        <div class="col-lg-7">
            <div class="card card-custom p-4 mb-4">
                <h5 class="h6 fw-bold border-bottom pb-2 mb-3"><i class="bi bi-layout-text-window-reverse me-2 text-primary"></i>Page Header Content</h5>

                <div class="mb-3">
                    <label class="form-label fw-semibold small">Page Navigation Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $page->title) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold small">Hero Banner Heading (H1)</label>
                    <input type="text" name="header_title" class="form-control" value="{{ old('header_title', $page->header_title) }}" placeholder="e.g. International Academy of Medical Excellence">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold small">Hero Banner Subtitle / Tagline</label>
                    <textarea name="header_subtitle" class="form-control" rows="3" placeholder="Advancing Medical Knowledge. Transforming Clinical Practice...">{{ old('header_subtitle', $page->header_subtitle) }}</textarea>
                </div>

                <div class="form-check form-switch mt-3">
                    <input class="form-check-input" type="checkbox" name="is_active" id="isActive" {{ old('is_active', $page->is_active) ? 'checked' : '' }}>
                    <label class="form-check-label fw-semibold small" for="isActive">Page Active &amp; Visible</label>
                </div>
            </div>
        </div>

        <!-- Right: SEO Meta Tags -->
        <div class="col-lg-5">
            <div class="card card-custom p-4 mb-4">
                <h5 class="h6 fw-bold border-bottom pb-2 mb-3"><i class="bi bi-search me-2 text-success"></i>Search Engine Optimization (SEO)</h5>

                <div class="mb-3">
                    <label class="form-label fw-semibold small">SEO Meta Title</label>
                    <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title', $page->meta_title) }}" placeholder="e.g. About HOK Academy | International Medical Excellence">
                    <small class="text-muted" style="font-size: 0.8rem;">Recommended length: 50-60 characters</small>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold small">SEO Meta Description</label>
                    <textarea name="meta_description" class="form-control" rows="3" placeholder="Summary of this page for Google search results...">{{ old('meta_description', $page->meta_description) }}</textarea>
                    <small class="text-muted" style="font-size: 0.8rem;">Recommended length: 150-160 characters</small>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold small">SEO Meta Keywords</label>
                    <textarea name="meta_keywords" class="form-control" rows="2" placeholder="comma-separated keywords...">{{ old('meta_keywords', $page->meta_keywords) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold small">Canonical URL</label>
                    <input type="url" name="canonical_url" class="form-control" value="{{ old('canonical_url', $page->canonical_url) }}" placeholder="https://hokacademy.com/about-us">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold small">OpenGraph Social Share Image</label>
                    @if($page->og_image)
                        <div class="mb-2">
                            <img src="{{ asset($page->og_image) }}" alt="OG Image" class="img-thumbnail" style="height: 60px;">
                        </div>
                    @endif
                    <input type="file" name="og_image" class="form-control form-control-sm" accept="image/*">
                </div>
            </div>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-hok-admin btn-lg px-4">
                <i class="bi bi-save me-1"></i> Save Changes
            </button>
        </div>
    </div>
</form>
@endsection

