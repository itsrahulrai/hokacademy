@extends('admin.layouts.app')

@section('title', 'Edit Feature Item')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="h4 fw-bold mb-1">Edit Feature: {{ $whyFeature->title }}</h2>
        <p class="text-muted small mb-0">Type: <code>{{ $whyFeature->type }}</code></p>
    </div>
    <a href="{{ route('admin.why-features.index', ['type' => $whyFeature->type]) }}" class="btn btn-outline-secondary btn-sm">
        <i class="bi bi-arrow-left me-1"></i> Back
    </a>
</div>

<div class="card card-custom p-4">
    <form action="{{ route('admin.why-features.update', $whyFeature->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label fw-semibold small">Feature Section Type <span class="text-danger">*</span></label>
                <select name="type" class="form-select" required>
                    <option value="why_hok" {{ old('type', $whyFeature->type) === 'why_hok' ? 'selected' : '' }}>Why HOK Academy Card</option>
                    <option value="philosophy" {{ old('type', $whyFeature->type) === 'philosophy' ? 'selected' : '' }}>Learning Philosophy Principle</option>
                </select>
            </div>

            <div class="col-md-6">
                <label class="form-label fw-semibold small">Anchor Identifier (e.g. scientific, reasoning)</label>
                <input type="text" name="anchor_id" class="form-control" value="{{ old('anchor_id', $whyFeature->anchor_id) }}">
            </div>

            <div class="col-md-6">
                <label class="form-label fw-semibold small">Title <span class="text-danger">*</span></label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $whyFeature->title) }}" required>
            </div>

            <div class="col-md-6">
                <label class="form-label fw-semibold small">Subtitle (optional)</label>
                <input type="text" name="subtitle" class="form-control" value="{{ old('subtitle', $whyFeature->subtitle) }}">
            </div>

            <div class="col-12">
                <label class="form-label fw-semibold small">Lead / Highlight Text (Bold statement)</label>
                <input type="text" name="strong_text" class="form-control" value="{{ old('strong_text', $whyFeature->strong_text) }}">
            </div>

            <div class="col-12">
                <label class="form-label fw-semibold small">Detailed Description</label>
                <textarea name="description" id="detailed_description_editor" class="form-control jodit-editor" rows="6" data-height="380">{{ old('description', $whyFeature->description) }}</textarea>
            </div>

            <div class="col-12">
                <label class="form-label fw-semibold small">Bullet Points / Chips (comma separated)</label>
                <input type="text" name="chips" class="form-control" value="{{ old('chips', !empty($whyFeature->chips) ? implode(', ', $whyFeature->chips) : '') }}">
            </div>

            <div class="col-md-4">
                <label class="form-label fw-semibold small">Bootstrap Icon Class</label>
                <input type="text" name="icon" class="form-control" value="{{ old('icon', $whyFeature->icon) }}" required>
            </div>

            <div class="col-md-4">
                <label class="form-label fw-semibold small">Tone CSS Style</label>
                <select name="tone_class" class="form-select">
                    <option value="c-navy" {{ old('tone_class', $whyFeature->tone_class) === 'c-navy' ? 'selected' : '' }}>Navy (c-navy)</option>
                    <option value="c-teal" {{ old('tone_class', $whyFeature->tone_class) === 'c-teal' ? 'selected' : '' }}>Teal (c-teal)</option>
                    <option value="c-blue" {{ old('tone_class', $whyFeature->tone_class) === 'c-blue' ? 'selected' : '' }}>Blue (c-blue)</option>
                    <option value="c-red" {{ old('tone_class', $whyFeature->tone_class) === 'c-red' ? 'selected' : '' }}>Red / Burgundy (c-red)</option>
                </select>
            </div>

            <div class="col-md-4">
                <label class="form-label fw-semibold small">Sort Order <span class="text-danger">*</span></label>
                <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $whyFeature->sort_order) }}" required>
            </div>

            <div class="col-md-6">
                <label class="form-label fw-semibold small">Image (for Why HOK cards)</label>
                @if($whyFeature->image)
                    <div class="mb-2">
                        <img src="{{ $whyFeature->image_url }}" alt="Preview" class="img-thumbnail" style="height: 60px;">
                    </div>
                @endif
                <input type="file" name="image" class="form-control form-control-sm" accept="image/*">
            </div>

            <div class="col-md-6 d-flex flex-column justify-content-end">
                <div class="form-check form-switch mb-2">
                    <input class="form-check-input" type="checkbox" name="is_wide" id="isWide" {{ old('is_wide', $whyFeature->is_wide) ? 'checked' : '' }}>
                    <label class="form-check-label small fw-semibold" for="isWide">Wide Dark Featured Card</label>
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="is_active" id="isActive" {{ old('is_active', $whyFeature->is_active) ? 'checked' : '' }}>
                    <label class="form-check-label small fw-semibold" for="isActive">Feature Active &amp; Visible</label>
                </div>
            </div>

            <div class="col-12 mt-4">
                <button type="submit" class="btn btn-hok-admin px-4 py-2">
                    <i class="bi bi-save me-1"></i> Update Feature
                </button>
            </div>
        </div>
    </form>
</div>
@endsection

