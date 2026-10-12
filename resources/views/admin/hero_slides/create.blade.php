@extends('admin.layouts.app')

@section('title', 'Create Hero Slide')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="h4 fw-bold mb-1">Create Homepage Hero Slide</h2>
        <p class="text-muted small mb-0">Add a high-impact slide to the homepage carousel.</p>
    </div>
    <a href="{{ route('admin.hero-slides.index') }}" class="btn btn-outline-secondary btn-sm">
        <i class="bi bi-arrow-left me-1"></i> Back to Slides
    </a>
</div>

<div class="card card-custom p-4">
    <form action="{{ route('admin.hero-slides.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label fw-semibold small">Category Badge / Top Subtitle</label>
                <input type="text" name="category_badge" class="form-control" placeholder="e.g. International Academy of Medical Excellence" value="{{ old('category_badge') }}">
            </div>

            <div class="col-md-6">
                <label class="form-label fw-semibold small">Slide Accent Color</label>
                <select name="accent_color" class="form-select">
                    <option value="var(--navy)" {{ old('accent_color') === 'var(--navy)' ? 'selected' : '' }}>Navy Blue (var(--navy))</option>
                    <option value="var(--teal)" {{ old('accent_color') === 'var(--teal)' ? 'selected' : '' }}>Teal Green (var(--teal))</option>
                    <option value="var(--blue)" {{ old('accent_color') === 'var(--blue)' ? 'selected' : '' }}>Cobalt Blue (var(--blue))</option>
                    <option value="var(--red)" {{ old('accent_color') === 'var(--red)' ? 'selected' : '' }}>Burgundy / Red (var(--red))</option>
                </select>
            </div>

            <div class="col-12">
                <label class="form-label fw-semibold small">Main Heading / Title <span class="text-danger">*</span></label>
                <input type="text" name="title" class="form-control" placeholder="e.g. Advancing Medical Knowledge. Transforming Clinical Practice." value="{{ old('title') }}" required>
            </div>

            <div class="col-12">
                <label class="form-label fw-semibold small">Description Text</label>
                <textarea name="description" class="form-control" rows="3" placeholder="Brief 1-2 line summary for the slide...">{{ old('description') }}</textarea>
            </div>

            <div class="col-md-6">
                <label class="form-label fw-semibold small">Button Label</label>
                <input type="text" name="button_text" class="form-control" placeholder="e.g. About HOK / Explore Programs" value="{{ old('button_text', 'Explore Programs') }}">
            </div>

            <div class="col-md-6">
                <label class="form-label fw-semibold small">Button Link (URL)</label>
                <input type="text" name="button_link" class="form-control" placeholder="e.g. /programs or /about-us" value="{{ old('button_link', '/programs') }}">
            </div>

            <div class="col-md-6">
                <label class="form-label fw-semibold small">Slide Image</label>
                <input type="file" name="image" class="form-control" accept="image/*">
                <small class="text-muted">Recommended size: 800x580 or 1200x800 px (jpg/webp)</small>
            </div>

            <div class="col-md-3">
                <label class="form-label fw-semibold small">Display Order <span class="text-danger">*</span></label>
                <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', 1) }}" required>
            </div>

            <div class="col-md-3 d-flex align-items-end">
                <div class="form-check form-switch mb-2">
                    <input class="form-check-input" type="checkbox" name="is_active" id="isActive" checked>
                    <label class="form-check-label fw-semibold small" for="isActive">Slide Active</label>
                </div>
            </div>

            <div class="col-12 mt-4">
                <button type="submit" class="btn btn-hok-admin px-4 py-2">
                    <i class="bi bi-save me-1"></i> Create Slide
                </button>
            </div>
        </div>
    </form>
</div>
@endsection

