@extends('admin.layouts.app')

@section('title', 'Edit Hero Slide')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="h4 fw-bold mb-1">Edit Hero Slide</h2>
        <p class="text-muted small mb-0">{{ $heroSlide->title }}</p>
    </div>
    <a href="{{ route('admin.hero-slides.index') }}" class="btn btn-outline-secondary btn-sm">
        <i class="bi bi-arrow-left me-1"></i> Back to Slides
    </a>
</div>

<div class="card card-custom p-4">
    <form action="{{ route('admin.hero-slides.update', $heroSlide->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label fw-semibold small">Category Badge / Top Subtitle</label>
                <input type="text" name="category_badge" class="form-control" value="{{ old('category_badge', $heroSlide->category_badge) }}">
            </div>

            <div class="col-md-6">
                <label class="form-label fw-semibold small">Slide Accent Color</label>
                <select name="accent_color" class="form-select">
                    <option value="var(--navy)" {{ old('accent_color', $heroSlide->accent_color) === 'var(--navy)' ? 'selected' : '' }}>Navy Blue (var(--navy))</option>
                    <option value="var(--teal)" {{ old('accent_color', $heroSlide->accent_color) === 'var(--teal)' ? 'selected' : '' }}>Teal Green (var(--teal))</option>
                    <option value="var(--blue)" {{ old('accent_color', $heroSlide->accent_color) === 'var(--blue)' ? 'selected' : '' }}>Cobalt Blue (var(--blue))</option>
                    <option value="var(--red)" {{ old('accent_color', $heroSlide->accent_color) === 'var(--red)' ? 'selected' : '' }}>Burgundy / Red (var(--red))</option>
                </select>
            </div>

            <div class="col-12">
                <label class="form-label fw-semibold small">Main Heading / Title <span class="text-danger">*</span></label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $heroSlide->title) }}" required>
            </div>

            <div class="col-12">
                <label class="form-label fw-semibold small">Description Text</label>
                <textarea name="description" class="form-control" rows="3">{{ old('description', $heroSlide->description) }}</textarea>
            </div>

            <div class="col-md-6">
                <label class="form-label fw-semibold small">Button Label</label>
                <input type="text" name="button_text" class="form-control" value="{{ old('button_text', $heroSlide->button_text) }}">
            </div>

            <div class="col-md-6">
                <label class="form-label fw-semibold small">Button Link (URL)</label>
                <input type="text" name="button_link" class="form-control" value="{{ old('button_link', $heroSlide->button_link) }}">
            </div>

            <div class="col-md-6">
                <label class="form-label fw-semibold small">Slide Image</label>
                @if($heroSlide->image)
                    <div class="mb-2">
                        <img src="{{ asset($heroSlide->image) }}" alt="Preview" class="rounded" style="height: 60px;">
                    </div>
                @endif
                <input type="file" name="image" class="form-control" accept="image/*">
            </div>

            <div class="col-md-3">
                <label class="form-label fw-semibold small">Display Order <span class="text-danger">*</span></label>
                <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $heroSlide->sort_order) }}" required>
            </div>

            <div class="col-md-3 d-flex align-items-end">
                <div class="form-check form-switch mb-2">
                    <input class="form-check-input" type="checkbox" name="is_active" id="isActive" {{ old('is_active', $heroSlide->is_active) ? 'checked' : '' }}>
                    <label class="form-check-label fw-semibold small" for="isActive">Slide Active</label>
                </div>
            </div>

            <div class="col-12 mt-4">
                <button type="submit" class="btn btn-hok-admin px-4 py-2">
                    <i class="bi bi-save me-1"></i> Update
                </button>
            </div>
        </div>
    </form>
</div>
@endsection

