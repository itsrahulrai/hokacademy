@extends('admin.layouts.app')

@section('title', 'Add New Program')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="h4 fw-bold mb-1">Create New Program / Course</h2>
        <p class="text-muted small mb-0">Fill in program details, curriculum highlights, eligibility and SEO tags.</p>
    </div>
    <a href="{{ route('admin.programs.index') }}" class="btn btn-outline-secondary btn-sm">
        <i class="bi bi-arrow-left me-1"></i> Back to Programs
    </a>
</div>

<form action="{{ route('admin.programs.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

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
                                <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold small">Bootstrap Icon Class</label>
                        <input type="text" name="icon" class="form-control" placeholder="e.g. bi-stars, bi-eyedropper, bi-scissors" value="{{ old('icon', 'bi-mortarboard') }}">
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-semibold small">Program Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control" placeholder="e.g. Advanced Injectables & Facial Aesthetics" value="{{ old('title') }}" required>
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-semibold small">Custom URL Slug (optional)</label>
                        <input type="text" name="slug" class="form-control" placeholder="e.g. advanced-injectables-training" value="{{ old('slug') }}">
                        <small class="text-muted">Leave empty to auto-generate from title</small>
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-semibold small">Short Description (for cards) <span class="text-danger">*</span></label>
                        <textarea name="short_description" class="form-control" rows="2" placeholder="Brief 1-2 line summary of the course..." required>{{ old('short_description') }}</textarea>
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-semibold small">Full Detailed Description <span class="text-muted fw-normal">(Curriculum, Overview, Methodology)</span></label>
                        <textarea name="full_description" id="full_description_editor" class="form-control jodit-editor" rows="8" placeholder="Start writing...">{{ old('full_description') }}</textarea>
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-semibold small">Key Highlights (1 item per line)</label>
                        <textarea name="highlights" class="form-control" rows="4" placeholder="Facial Anatomy & Assessment&#10;Needle & Cannula Injection Techniques&#10;Complication Management&#10;Hands-on Live Patients">{{ old('highlights') }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Course Meta / Requirements -->
            <div class="card card-custom p-4">
                <h5 class="h6 fw-bold border-bottom pb-2 mb-3">Course Specs &amp; Eligibility</h5>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold small">Duration / Schedule</label>
                        <input type="text" name="duration" class="form-control" placeholder="e.g. 3 Days Intensive / Modular" value="{{ old('duration') }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold small">Eligibility Criteria</label>
                        <input type="text" name="eligibility" class="form-control" placeholder="e.g. MBBS, BDS, MD, MS" value="{{ old('eligibility') }}">
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-semibold small">Awarded Certification</label>
                        <input type="text" name="certification" class="form-control" placeholder="e.g. Fellowship in Aesthetic Medicine" value="{{ old('certification') }}">
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
                    <input type="file" name="image" class="form-control" accept="image/*">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold small">Display Sort Order</label>
                    <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', 1) }}" required>
                </div>

                <div class="form-check form-switch mb-2">
                    <input class="form-check-input" type="checkbox" name="is_featured" id="isFeatured" {{ old('is_featured') ? 'checked' : '' }}>
                    <label class="form-check-label fw-semibold small" for="isFeatured">Featured on Homepage</label>
                </div>

                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="is_active" id="isActive" checked>
                    <label class="form-check-label fw-semibold small" for="isActive">Program Active &amp; Published</label>
                </div>
            </div>

            <div class="card card-custom p-4">
                <h5 class="h6 fw-bold border-bottom pb-2 mb-3">Program SEO Meta</h5>

                <div class="mb-3">
                    <label class="form-label fw-semibold small">SEO Meta Title</label>
                    <input type="text" name="meta_title" class="form-control" placeholder="Program SEO Title" value="{{ old('meta_title') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold small">SEO Meta Description</label>
                    <textarea name="meta_description" class="form-control" rows="3" placeholder="Brief summary for Google...">{{ old('meta_description') }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold small">SEO Meta Keywords</label>
                    <textarea name="meta_keywords" class="form-control" rows="2" placeholder="keywords...">{{ old('meta_keywords') }}</textarea>
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-hok-admin btn-lg w-100">
                    <i class="bi bi-save me-1"></i> Save Program
                </button>
            </div>
        </div>
    </div>
</form>
@endsection

