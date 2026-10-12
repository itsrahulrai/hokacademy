@extends('admin.layouts.app')

@section('title', 'Write Blog Article')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="h4 fw-bold mb-1">Write New Blog Article</h2>
        <p class="text-muted small mb-0">Create educational content, clinical updates or training guides.</p>
    </div>
    <a href="{{ route('admin.blogs.index') }}" class="btn btn-outline-secondary btn-sm">
        <i class="bi bi-arrow-left me-1"></i> Back to Articles
    </a>
</div>

<form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row g-4">
        <!-- Main Article Content -->
        <div class="col-lg-8">
            <div class="card card-custom p-4 mb-4">
                <div class="mb-3">
                    <label class="form-label fw-semibold small">Article Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control form-control-lg fs-5" placeholder="e.g. Choosing an Advanced Training Pathway in Aesthetic Medicine" value="{{ old('title') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold small">URL Slug (optional)</label>
                    <input type="text" name="slug" class="form-control" placeholder="auto-generated-from-title" value="{{ old('slug') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold small">Short Summary / Excerpt</label>
                    <textarea name="excerpt" class="form-control" rows="3" placeholder="Brief summary displayed on article cards and search snippets...">{{ old('excerpt') }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold small">Article Body Content <span class="text-danger">*</span></label>
                    <textarea name="content" class="form-control jodit-editor" rows="14" placeholder="Write full article content, headings, clinical case notes..." data-height="500" required>{{ old('content') }}</textarea>
                </div>
            </div>
        </div>

        <!-- Sidebar Attributes & SEO -->
        <div class="col-lg-4">
            <div class="card card-custom p-4 mb-4">
                <h5 class="h6 fw-bold border-bottom pb-2 mb-3">Publishing Details</h5>

                <div class="mb-3">
                    <label class="form-label fw-semibold small">Category Tag <span class="text-danger">*</span></label>
                    <input type="text" name="category_tag" class="form-control" placeholder="e.g. Aesthetic Medicine, Patient Safety, International" value="{{ old('category_tag', 'Aesthetic Medicine') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold small">Estimated Read Time (Minutes) <span class="text-danger">*</span></label>
                    <input type="number" name="read_time" class="form-control" value="{{ old('read_time', 5) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold small">Publication Date</label>
                    <input type="date" name="published_at" class="form-control" value="{{ old('published_at', date('Y-m-d')) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold small">Featured Banner Image</label>
                    <input type="file" name="featured_image" class="form-control form-control-sm" accept="image/*">
                </div>

                <div class="form-check form-switch mt-2">
                    <input class="form-check-input" type="checkbox" name="is_published" id="isPublished" checked>
                    <label class="form-check-label fw-semibold small" for="isPublished">Publish Immediately</label>
                </div>
            </div>

            <!-- SEO Settings -->
            <div class="card card-custom p-4">
                <h5 class="h6 fw-bold border-bottom pb-2 mb-3">SEO Meta Tags</h5>

                <div class="mb-3">
                    <label class="form-label fw-semibold small">SEO Meta Title</label>
                    <input type="text" name="meta_title" class="form-control" placeholder="Custom SEO Title" value="{{ old('meta_title') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold small">SEO Meta Description</label>
                    <textarea name="meta_description" class="form-control" rows="3" placeholder="Google snippet summary...">{{ old('meta_description') }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold small">SEO Meta Keywords</label>
                    <textarea name="meta_keywords" class="form-control" rows="2" placeholder="keywords...">{{ old('meta_keywords') }}</textarea>
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-hok-admin btn-lg w-100">
                    <i class="bi bi-send me-1"></i> Publish Article
                </button>
            </div>
        </div>
    </div>
</form>
@endsection

