@extends('admin.layouts.app')

@section('title', 'Edit Program - ' . $program->title)

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="h4 fw-bold mb-1">Edit Program: {{ $program->title }}</h2>
        <p class="text-muted small mb-0">URL: <code>/programs/{{ $program->slug }}</code></p>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('programs.show', $program->slug) }}" target="_blank" class="btn btn-outline-primary btn-sm">
            <i class="bi bi-eye me-1"></i> Preview Page
        </a>
        <a href="{{ route('admin.programs.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i> Back to Programs
        </a>
    </div>
</div>

<form action="{{ route('admin.programs.update', $program->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row g-4">
        <!-- Main Details -->
        <div class="col-lg-8">
            <div class="card card-custom p-4 mb-4">
                <h5 class="h6 fw-bold border-bottom pb-2 mb-3">Basic Information</h5>

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold small">Category / Target Group <span class="text-danger">*</span></label>
                        <select name="category_id" class="form-select" required>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" {{ old('category_id', $program->category_id) == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold small">Bootstrap Icon Class</label>
                        <input type="text" name="icon" class="form-control" value="{{ old('icon', $program->icon) }}">
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-semibold small">Program Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control" value="{{ old('title', $program->title) }}" required>
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-semibold small">URL Slug <span class="text-danger">*</span></label>
                        <input type="text" name="slug" class="form-control" value="{{ old('slug', $program->slug) }}" required>
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-semibold small">Short Description (for cards) <span class="text-danger">*</span></label>
                        <textarea name="short_description" class="form-control" rows="2" required>{{ old('short_description', $program->short_description) }}</textarea>
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-semibold small">Full Detailed Description <span class="text-muted fw-normal">(Curriculum, Overview, Methodology)</span></label>
                        <textarea name="full_description" id="full_description_editor" class="form-control jodit-editor" rows="8">{{ old('full_description', $program->full_description) }}</textarea>
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-semibold small">Key Highlights (1 item per line)</label>
                        <textarea name="highlights" class="form-control" rows="4">{{ old('highlights', !empty($program->highlights) ? implode("\n", $program->highlights) : '') }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Course Specs & Eligibility -->
            <div class="card card-custom p-4">
                <h5 class="h6 fw-bold border-bottom pb-2 mb-3">Course Specs &amp; Eligibility</h5>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold small">Duration / Schedule</label>
                        <input type="text" name="duration" class="form-control" value="{{ old('duration', $program->duration) }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold small">Eligibility Criteria</label>
                        <input type="text" name="eligibility" class="form-control" value="{{ old('eligibility', $program->eligibility) }}">
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-semibold small">Awarded Certification</label>
                        <input type="text" name="certification" class="form-control" value="{{ old('certification', $program->certification) }}">
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar Options & SEO -->
        <div class="col-lg-4">
            <div class="card card-custom p-4 mb-4">
                <h5 class="h6 fw-bold border-bottom pb-2 mb-3">Settings &amp; Media</h5>

                <div class="mb-3">
                    <label class="form-label fw-semibold small">Featured Image</label>
                    <div class="mb-2">
                        <img src="{{ $program->image_url }}" alt="Preview" class="img-thumbnail" style="height: 70px;">
                    </div>
                    <input type="file" name="image" class="form-control form-control-sm" accept="image/*">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold small">Display Sort Order</label>
                    <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $program->sort_order) }}" required>
                </div>

                <div class="form-check form-switch mb-2">
                    <input class="form-check-input" type="checkbox" name="is_featured" id="isFeatured" {{ old('is_featured', $program->is_featured) ? 'checked' : '' }}>
                    <label class="form-check-label fw-semibold small" for="isFeatured">Featured on Homepage</label>
                </div>

                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="is_active" id="isActive" {{ old('is_active', $program->is_active) ? 'checked' : '' }}>
                    <label class="form-check-label fw-semibold small" for="isActive">Program Active &amp; Published</label>
                </div>
            </div>

            <div class="card card-custom p-4">
                <h5 class="h6 fw-bold border-bottom pb-2 mb-3">Program SEO Meta</h5>

                <div class="mb-3">
                    <label class="form-label fw-semibold small">SEO Meta Title</label>
                    <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title', $program->meta_title) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold small">SEO Meta Description</label>
                    <textarea name="meta_description" class="form-control" rows="3">{{ old('meta_description', $program->meta_description) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold small">SEO Meta Keywords</label>
                    <textarea name="meta_keywords" class="form-control" rows="2">{{ old('meta_keywords', $program->meta_keywords) }}</textarea>
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-hok-admin btn-lg w-100">
                    <i class="bi bi-save me-1"></i> Update Program
                </button>
            </div>
        </div>
    </div>
</form>
@endsection

