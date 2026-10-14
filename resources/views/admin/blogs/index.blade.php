@extends('admin.layouts.app')

@section('title', 'Blogs')

@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
    <div>
        <h2 class="h4 fw-bold mb-1" style="color: var(--hok-navy);">Blogs &amp; Clinical Insights</h2>
        <p class="text-muted small mb-0">Publish and manage educational blogs, guides and clinical insights.</p>
    </div>
    <a href="{{ route('admin.blogs.create') }}" class="btn btn-hok-admin shadow-sm">
        <i class="bi bi-pencil-square"></i>
        <span>Write New Blog</span>
    </a>
</div>

<!-- Search Card -->
<div class="card card-custom p-3 mb-4">
    <form action="{{ route('admin.blogs.index') }}" method="GET" class="row g-3 align-items-center">
        <div class="col-md-8">
            <div class="input-group">
                <span class="input-group-text bg-light border-end-0"><i class="bi bi-search text-muted"></i></span>
                <input type="text" name="search" class="form-control border-start-0" placeholder="Search blog title or category tag..." value="{{ request('search') }}">
            </div>
        </div>
        <div class="col-md-4 d-flex gap-2">
            <button type="submit" class="btn btn-hok-navy flex-grow-1">
                <i class="bi bi-search me-1"></i> Search
            </button>
            <a href="{{ route('admin.blogs.index') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-counterclockwise me-1"></i> Reset
            </a>
        </div>
    </form>
</div>

<div class="card card-custom overflow-hidden">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th>Blog Title</th>
                    <th>Category</th>
                    <th>Published Date</th>
                    <th>Read Time</th>
                    <th>Status</th>
                    <th class="text-end" style="min-width: 140px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($blogs as $b)
                    <tr>
                        <td>
                            <strong class="text-dark d-block">{{ $b->title }}</strong>
                            <small class="text-muted"><code>/blog/{{ $b->slug }}</code></small>
                        </td>
                        <td>
                            <span class="badge border" style="background: rgba(212, 175, 55, 0.1); color: var(--hok-gold-dark); border-color: rgba(212, 175, 55, 0.3) !important;">{{ $b->category_tag }}</span>
                        </td>
                        <td>
                            <small class="text-muted"><i class="bi bi-calendar3 me-1"></i>{{ $b->published_at ? $b->published_at->format('M d, Y') : 'Draft' }}</small>
                        </td>
                        <td>
                            <small class="fw-semibold text-dark">{{ $b->read_time }} mins</small>
                        </td>
                        <td>
                            @if($b->is_published)
                                <span class="badge rounded-pill px-2 py-1" style="background: var(--hok-emerald); color: #fff;">Published</span>
                            @else
                                <span class="badge bg-secondary rounded-pill px-2 py-1">Draft</span>
                            @endif
                        </td>
                        <td class="text-end text-nowrap">
                            <div class="table-actions">
                                <a href="{{ route('blog.show', $b->slug) }}" target="_blank" class="btn-action-btn btn-action-view" title="View Blog">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('admin.blogs.edit', $b->id) }}" class="btn-action-btn btn-action-edit" title="Edit Blog">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.blogs.destroy', $b->id) }}" method="POST" class="d-inline m-0 p-0" onsubmit="return confirm('Are you sure you want to delete this blog?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-action-btn btn-action-delete" title="Delete">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-muted">No blogs found. Click "Write New Blog" to create one.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($blogs->hasPages())
        <div class="card-footer bg-white py-3 border-top">
            {{ $blogs->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>
@endsection

