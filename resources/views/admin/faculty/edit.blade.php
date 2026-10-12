@extends('admin.layouts.app')

@section('title', 'Edit Faculty Member - ' . $faculty->name)

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="h4 fw-bold mb-1">Edit Faculty: {{ $faculty->name }}</h2>
        <p class="text-muted small mb-0">{{ $faculty->designation }}</p>
    </div>
    <a href="{{ route('admin.faculty.index') }}" class="btn btn-outline-secondary btn-sm">
        <i class="bi bi-arrow-left me-1"></i> Back to Faculty
    </a>
</div>

<div class="card card-custom p-4">
    <form action="{{ route('admin.faculty.update', $faculty->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label fw-semibold small">Doctor / Faculty Name <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $faculty->name) }}" required>
            </div>

            <div class="col-md-6">
                <label class="form-label fw-semibold small">Speciality Discipline</label>
                <input type="text" name="speciality" class="form-control" value="{{ old('speciality', $faculty->speciality) }}">
            </div>

            <div class="col-md-6">
                <label class="form-label fw-semibold small">Photo Tag (Short Category)</label>
                <input type="text" name="tag" class="form-control" value="{{ old('tag', $faculty->tag) }}">
            </div>

            <div class="col-md-6">
                <label class="form-label fw-semibold small">Card Tone Style</label>
                <select name="tone_class" class="form-select">
                    <option value="c-blue" {{ old('tone_class', $faculty->tone_class) === 'c-blue' ? 'selected' : '' }}>Cobalt Blue (c-blue)</option>
                    <option value="c-teal" {{ old('tone_class', $faculty->tone_class) === 'c-teal' ? 'selected' : '' }}>Teal (c-teal)</option>
                    <option value="c-navy" {{ old('tone_class', $faculty->tone_class) === 'c-navy' ? 'selected' : '' }}>Navy (c-navy)</option>
                    <option value="c-red" {{ old('tone_class', $faculty->tone_class) === 'c-red' ? 'selected' : '' }}>Red / Burgundy (c-red)</option>
                </select>
            </div>

            <div class="col-12">
                <label class="form-label fw-semibold small">Qualifications &amp; Role Title <span class="text-danger">*</span></label>
                <input type="text" name="designation" class="form-control" value="{{ old('designation', $faculty->designation) }}" required>
            </div>

            <div class="col-12">
                <label class="form-label fw-semibold small">Biography / Clinical Background</label>
                <textarea name="bio" class="form-control" rows="3">{{ old('bio', $faculty->bio) }}</textarea>
            </div>

            <div class="col-12">
                <label class="form-label fw-semibold small">Skill Chips / Expertise Tags (comma separated)</label>
                <input type="text" name="skills_chips" class="form-control" value="{{ old('skills_chips', !empty($faculty->skills_chips) ? implode(', ', $faculty->skills_chips) : '') }}">
            </div>

            <div class="col-md-6">
                <label class="form-label fw-semibold small">Profile Picture</label>
                <div class="mb-2">
                    <img src="{{ $faculty->image_url }}" alt="Preview" class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                </div>
                <input type="file" name="image" class="form-control form-control-sm" accept="image/*">
            </div>

            <div class="col-md-3">
                <label class="form-label fw-semibold small">Sort Order <span class="text-danger">*</span></label>
                <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $faculty->sort_order) }}" required>
            </div>

            <div class="col-md-3 d-flex flex-column justify-content-end">
                <div class="form-check form-switch mb-2">
                    <input class="form-check-input" type="checkbox" name="is_visiting" id="isVisiting" {{ old('is_visiting', $faculty->is_visiting) ? 'checked' : '' }}>
                    <label class="form-check-label small fw-semibold" for="isVisiting">Visiting Faculty</label>
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="is_active" id="isActive" {{ old('is_active', $faculty->is_active) ? 'checked' : '' }}>
                    <label class="form-check-label small fw-semibold" for="isActive">Active &amp; Visible</label>
                </div>
            </div>

            <div class="col-12 mt-4">
                <button type="submit" class="btn btn-hok-admin px-4 py-2">
                    <i class="bi bi-save me-1"></i> Update Faculty Member
                </button>
            </div>
        </div>
    </form>
</div>
@endsection

