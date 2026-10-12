@extends('admin.layouts.app')

@section('title', 'Edit Article - ' . $blog->title)

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="h4 fw-bold mb-1">Edit Article: {{ Str::limit($blog->title, 50) }}</h2>
        <p class="text-muted small mb-0">URL: <code>/blog/{{ $blog->slug }}</code></p>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('blog.show', $blog->slug) }}" target="_blank" class="btn btn-outline-primary btn-sm">
            <i class="bi bi-eye me-1"></i> Preview Article
        </a>
        <a href="{{ route('admin.blogs.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i> Back to Articles
        </a>
    </div>
</div>

<form action="{{ route('admin.blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row g-4">
        <!-- Main Article Content -->
        <div class="col-lg-8">
            <div class="card card-custom p-4 mb-4">
                <div class="mb-3">
                    <label class="form-label fw-semibold small">Article Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control form-control-lg fs-5" value="{{ old('title', $blog->title) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold small">URL Slug <span class="text-danger">*</span></label>
                    <input type="text" name="slug" class="form-control" value="{{ old('slug', $blog->slug) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold small">Short Summary / Excerpt</label>
                    <textarea name="excerpt" class="form-control" rows="3">{{ old('excerpt', $blog->excerpt) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold small">Article Body Content <span class="text-danger">*</span></label>
                    <textarea name="content" class="form-control jodit-editor" rows="16" data-height="520" required>{{ old('content', $blog->content) }}</textarea>
                </div>
            </div>
        </div>

        <!-- Sidebar Attributes & SEO -->
        <div class="col-lg-4">
            <div class="card card-custom p-4 mb-4">
                <h5 class="h6 fw-bold border-bottom pb-2 mb-3">Publishing Details</h5>

                <div class="mb-3">
                    <label class="form-label fw-semibold small">Category Tag <span class="text-danger">*</span></label>
                    <input type="text" name="category_tag" class="form-control" value="{{ old('category_tag', $blog->category_tag) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold small">Estimated Read Time (Minutes) <span class="text-danger">*</span></label>
                    <input type="number" name="read_time" class="form-control" value="{{ old('read_time', $blog->read_time) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold small">Publication Date</label>
                    <input type="date" name="published_at" class="form-control" value="{{ old('published_at', $blog->published_at ? $blog->published_at->format('Y-m-d') : '') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold small">Featured Banner Image</label>
                    @if($blog->featured_image)
                        <div class="mb-2">
                            <img src="{{ $blog->image_url }}" alt="Preview" class="img-thumbnail" style="height: 60px;">
                        </div>
                    @endif
                    <input type="file" name="featured_image" class="form-control form-control-sm" accept="image/*">
                </div>

                <div class="form-check form-switch mt-2">
                    <input class="form-check-input" type="checkbox" name="is_published" id="isPublished" {{ old('is_published', $blog->is_published) ? 'checked' : '' }}>
                    <label class="form-check-label fw-semibold small" for="isPublished">Published</label>
                </div>
            </div>

            <!-- SEO Settings -->
            <div class="card card-custom p-4">
                <h5 class="h6 fw-bold border-bottom pb-2 mb-3">SEO Meta Tags</h5>

                <div class="mb-3">
                    <label class="form-label fw-semibold small">SEO Meta Title</label>
                    <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title', $blog->meta_title) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold small">SEO Meta Description</label>
                    <textarea name="meta_description" class="form-control" rows="3">{{ old('meta_description', $blog->meta_description) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold small">SEO Meta Keywords</label>
                    <textarea name="meta_keywords" class="form-control" rows="2">{{ old('meta_keywords', $blog->meta_keywords) }}</textarea>
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-hok-admin btn-lg w-100">
                    <i class="bi bi-save me-1"></i> Update Article
                </button>
            </div>
        </div>
    </div>
</form>
@endsection

