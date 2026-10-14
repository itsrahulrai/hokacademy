@extends('admin.layouts.app')

@section('title', 'Create New Page')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="h4 fw-bold mb-1" style="color: var(--hok-navy, #071D3A);">Create New Page</h2>
        <p class="text-muted small mb-0">Add a new dynamic page, configure hero headings, page content, and SEO meta tags.</p>
    </div>
    <a href="{{ route('admin.pages.index') }}" class="btn btn-outline-secondary btn-sm">
        <i class="bi bi-arrow-left me-1"></i> Back to Pages
    </a>
</div>

<form action="{{ route('admin.pages.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row g-4">
        <!-- Left: Page Content & Headers -->
        <div class="col-lg-8">
            <div class="card card-custom p-4 mb-4">
                <h5 class="h6 fw-bold border-bottom pb-2 mb-3">
                    <i class="bi bi-layout-text-window-reverse me-2 text-primary"></i>Page Content &amp; Header
                </h5>

                <div class="mb-3">
                    <label class="form-label fw-semibold small">Page Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" id="pageTitleInput" class="form-control form-control-lg fs-5" placeholder="e.g. Terms & Conditions, Clinical Accreditation, Privacy Policy" value="{{ old('title') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold small">URL Slug (Route Path)</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light text-muted small">/</span>
                        <input type="text" name="slug" id="pageSlugInput" class="form-control" placeholder="auto-generated-from-title" value="{{ old('slug') }}">
                    </div>
                    <small class="text-muted" style="font-size: 0.78rem;">Leave blank to automatically generate from title (e.g. <code>terms-conditions</code>).</small>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold small">Hero Banner Heading (H1)</label>
                    <input type="text" name="header_title" class="form-control" value="{{ old('header_title') }}" placeholder="e.g. Clinical Accreditation & Educational Standards">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold small">Hero Banner Subtitle / Tagline</label>
                    <textarea name="header_subtitle" class="form-control" rows="2" placeholder="Brief overview or institutional tagline displayed under the hero heading...">{{ old('header_subtitle') }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold small mb-1">Page Body Content</label>
                    <textarea name="content" id="page_content_editor" class="form-control jodit-editor" rows="14" data-height="460" placeholder="Write full page content, headings, lists, guidelines...">{{ old('content') }}</textarea>
                </div>

                <div class="form-check form-switch mt-3">
                    <input class="form-check-input" type="checkbox" name="is_active" id="isActive" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                    <label class="form-check-label fw-semibold small" for="isActive">Page Active &amp; Published</label>
                </div>
            </div>

            <div>
                <button type="submit" class="btn btn-hok-admin px-4 py-2">
                    <i class="bi bi-save me-1"></i> Publish
                </button>
            </div>
        </div>

        <!-- Right: SEO Meta Tags & Sharing -->
        <div class="col-lg-4">
            <div class="card card-custom p-4 mb-4">
                <h5 class="h6 fw-bold border-bottom pb-2 mb-3">
                    <i class="bi bi-search me-2 text-success"></i>Search Engine Optimization (SEO)
                </h5>

                <div class="mb-3">
                    <label class="form-label fw-semibold small">SEO Meta Title</label>
                    <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title') }}" placeholder="e.g. Terms & Conditions | HOK Academy">
                    <small class="text-muted" style="font-size: 0.78rem;">Recommended length: 50-60 characters</small>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold small">SEO Meta Description</label>
                    <textarea name="meta_description" class="form-control" rows="3" placeholder="Summary snippet for search results...">{{ old('meta_description') }}</textarea>
                    <small class="text-muted" style="font-size: 0.78rem;">Recommended length: 150-160 characters</small>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold small">SEO Meta Keywords</label>
                    <textarea name="meta_keywords" class="form-control" rows="2" placeholder="comma-separated keywords...">{{ old('meta_keywords') }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold small">Canonical URL</label>
                    <input type="url" name="canonical_url" class="form-control" value="{{ old('canonical_url') }}" placeholder="https://hokacademy.com/page-slug">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold small">Social Share Image (OG Image)</label>
                    <input type="file" name="og_image" class="form-control form-control-sm" accept="image/*">
                    <small class="text-muted" style="font-size: 0.78rem;">Recommended size: 1200x630 px (jpg/webp)</small>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@push('scripts')
<script>
// Auto slug generation from title if slug input is untouched
document.getElementById('pageTitleInput')?.addEventListener('input', function() {
    const slugInput = document.getElementById('pageSlugInput');
    if (!slugInput || slugInput.dataset.manual === 'true') return;
    slugInput.value = this.value
        .toLowerCase()
        .trim()
        .replace(/[^a-z0-9\s-]/g, '')
        .replace(/\s+/g, '-')
        .replace(/-+/g, '-');
});

document.getElementById('pageSlugInput')?.addEventListener('input', function() {
    if (this.value.trim() !== '') {
        this.dataset.manual = 'true';
    } else {
        delete this.dataset.manual;
    }
});
</script>
@endpush

