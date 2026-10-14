@extends('admin.layouts.app')

@section('title', 'Programs & Courses')

@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
    <div>
        <h2 class="h4 fw-bold mb-1" style="color: var(--hok-navy);">Programs &amp; Clinical Courses</h2>
        <p class="text-muted small mb-0">Manage all 26+ clinical training courses, workshops, eligibility, duration and syllabi.</p>
    </div>
    <a href="{{ route('admin.programs.create') }}" class="btn btn-hok-admin shadow-sm">
        <i class="bi bi-plus-circle-fill"></i>
        <span>Add New Program</span>
    </a>
</div>

<!-- Filters -->
<div class="card card-custom p-3 mb-4">
    <form action="{{ route('admin.programs.index') }}" method="GET" class="row g-3 align-items-center">
        <div class="col-md-5">
            <div class="input-group">
                <span class="input-group-text bg-light border-end-0"><i class="bi bi-search text-muted"></i></span>
                <input type="text" name="search" class="form-control border-start-0" placeholder="Search program title, keyword..." value="{{ request('search') }}">
            </div>
        </div>
        <div class="col-md-4">
            <select name="category_id" class="form-select" onchange="this.form.submit()">
                <option value="">All Categories ({{ $programs->total() }})</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3 d-flex gap-2">
            <button type="submit" class="btn btn-hok-navy flex-grow-1">
                <i class="bi bi-funnel"></i> Filter
            </button>
            <a href="{{ route('admin.programs.index') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-counterclockwise"></i> Reset
            </a>
        </div>
    </form>
</div>

<div class="card card-custom overflow-hidden">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th style="width: 60px;">Order</th>
                    <th>Image</th>
                    <th>Program Title</th>
                    <th>Category</th>
                    <th>Duration</th>
                    <th>Featured</th>
                    <th>Status</th>
                    <th class="text-end" style="min-width: 140px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($programs as $prog)
                    <tr>
                        <td>
                            <span class="badge bg-light text-dark border">{{ $prog->sort_order }}</span>
                        </td>
                        <td>
                            <img src="{{ $prog->image_url }}" alt="{{ $prog->title }}" class="rounded object-fit-cover shadow-sm" style="width: 55px; height: 40px;">
                        </td>
                        <td>
                            <strong class="d-block text-dark">{{ $prog->title }}</strong>
                            <small class="text-muted text-truncate d-inline-block" style="max-width: 280px;">{{ $prog->short_description }}</small>
                        </td>
                        <td>
                            <span class="badge border" style="background: rgba(12, 42, 82, 0.06); color: var(--hok-navy); border-color: rgba(12, 42, 82, 0.2) !important;">
                                {{ $prog->category->name ?? '-' }}
                            </span>
                        </td>
                        <td>
                            <small class="fw-semibold text-dark">{{ $prog->duration ?? 'Flexible' }}</small>
                        </td>
                        <td>
                            @if($prog->is_featured)
                                <span class="badge rounded-pill px-2 py-1" style="background: #fef08a; color: #854d0e; border: 1px solid #fde047;">
                                    <i class="bi bi-star-fill me-1"></i> Featured
                                </span>
                            @else
                                <span class="text-muted small">-</span>
                            @endif
                        </td>
                        <td>
                            @if($prog->is_active)
                                <span class="badge rounded-pill px-2 py-1" style="background: var(--hok-emerald); color: #fff;">
                                    Active
                                </span>
                            @else
                                <span class="badge bg-secondary rounded-pill px-2 py-1">Draft</span>
                            @endif
                        </td>
                        <td class="text-end text-nowrap">
                            <div class="table-actions">
                                <a href="{{ route('programs.show', $prog->slug) }}" target="_blank" class="btn-action-btn btn-action-view" title="Preview on Website">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('admin.programs.edit', $prog->id) }}" class="btn-action-btn btn-action-edit" title="Edit Program">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.programs.destroy', $prog->id) }}" method="POST" class="d-inline m-0 p-0" onsubmit="return confirm('Are you sure you want to delete this program?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-action-btn btn-action-delete" title="Delete Program">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center py-4 text-muted">No programs found matching the filter.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    @if($programs->hasPages())
        <div class="card-footer bg-white py-3 border-top">
            {{ $programs->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>
@endsection

