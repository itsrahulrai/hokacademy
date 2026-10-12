@extends('admin.layouts.app')

@section('title', 'Hero Slides')

@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
    <div>
        <h2 class="h4 fw-bold mb-1" style="color: var(--hok-navy);">Homepage Hero Slides</h2>
        <p class="text-muted small mb-0">Manage and order the slides appearing on the interactive homepage carousel.</p>
    </div>
    <a href="{{ route('admin.hero-slides.create') }}" class="btn btn-hok-admin shadow-sm">
        <i class="bi bi-plus-circle-fill"></i>
        <span>Add New Slide</span>
    </a>
</div>

<div class="card card-custom overflow-hidden">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th style="width: 70px;">Order</th>
                    <th>Image</th>
                    <th>Badge &amp; Title</th>
                    <th>Accent</th>
                    <th>Button</th>
                    <th>Status</th>
                    <th class="text-end" style="min-width: 120px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($slides as $slide)
                    <tr>
                        <td>
                            <span class="badge bg-light text-dark border">{{ $slide->sort_order }}</span>
                        </td>
                        <td>
                            @if($slide->image)
                                <img src="{{ asset($slide->image) }}" alt="Slide" class="rounded shadow-sm" style="width: 70px; height: 45px; object-fit: cover;">
                            @else
                                <span class="badge bg-secondary">No Image</span>
                            @endif
                        </td>
                        <td>
                            @if($slide->category_badge)
                                <small class="text-muted text-uppercase fw-bold d-block">{{ $slide->category_badge }}</small>
                            @endif
                            <strong class="text-dark">{{ $slide->title }}</strong>
                        </td>
                        <td>
                            <code>{{ $slide->accent_color }}</code>
                        </td>
                        <td>
                            @if($slide->button_text)
                                <span class="small">{{ $slide->button_text }} &rarr; <code>{{ $slide->button_link }}</code></span>
                            @else
                                <span class="text-muted small">-</span>
                            @endif
                        </td>
                        <td>
                            @if($slide->is_active)
                                <span class="badge rounded-pill px-2 py-1" style="background: var(--hok-emerald); color: #fff;">Active</span>
                            @else
                                <span class="badge bg-secondary rounded-pill px-2 py-1">Draft</span>
                            @endif
                        </td>
                        <td class="text-end text-nowrap">
                            <div class="table-actions">
                                <a href="{{ route('admin.hero-slides.edit', $slide->id) }}" class="btn-action-btn btn-action-edit" title="Edit Slide">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.hero-slides.destroy', $slide->id) }}" method="POST" class="d-inline m-0 p-0" onsubmit="return confirm('Delete this hero slide?');">
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
                        <td colspan="7" class="text-center py-4 text-muted">No slides found. Click "Add New Slide" to create one.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

