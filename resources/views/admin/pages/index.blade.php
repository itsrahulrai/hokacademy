@extends('admin.layouts.app')

@section('title', 'Pages')

@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
    <div>
        <h2 class="h4 fw-bold mb-1" style="color: var(--hok-navy, #071D3A);">Pages &amp; SEO Management</h2>
        <p class="text-muted small mb-0">Publish dynamic pages, configure hero headers, page content, and SEO meta tags.</p>
    </div>
    <a href="{{ route('admin.pages.create') }}" class="btn btn-hok-admin shadow-sm">
        <i class="bi bi-plus-circle-fill"></i>
        <span>Add New Page</span>
    </a>
</div>

<div class="card card-custom overflow-hidden">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>Page Name</th>
                    <th>Route / URL</th>
                    <th>Type</th>
                    <th>Meta Title</th>
                    <th>Status</th>
                    <th class="text-end" style="min-width: 140px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pages as $p)
                    @php
                        $isCore = in_array($p->slug, $systemSlugs ?? []);
                    @endphp
                    <tr>
                        <td>
                            <strong class="text-dark d-block">{{ $p->title }}</strong>
                            @if($p->header_title)
                                <small class="text-muted text-truncate d-inline-block" style="max-width: 250px;">{{ $p->header_title }}</small>
                            @endif
                        </td>
                        <td>
                            <code>/{{ $p->slug === 'home' ? '' : $p->slug }}</code>
                        </td>
                        <td>
                            @if($isCore)
                                <span class="badge bg-light text-secondary border rounded-pill px-2 py-1" style="font-size: 0.72rem; font-weight: 600;">System</span>
                            @else
                                <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-2 py-1" style="font-size: 0.72rem; font-weight: 600;">Custom</span>
                            @endif
                        </td>
                        <td>
                            <span class="small text-muted text-truncate d-inline-block" style="max-width: 260px;">
                                {{ $p->meta_title ?? 'Default' }}
                            </span>
                        </td>
                        <td>
                            @if($p->is_active)
                                <span class="badge rounded-pill px-2 py-1" style="background: var(--hok-emerald, #10b981); color: #fff;">Active</span>
                            @else
                                <span class="badge bg-secondary rounded-pill px-2 py-1">Hidden</span>
                            @endif
                        </td>
                        <td class="text-end text-nowrap">
                            <div class="table-actions">
                                <a href="{{ url($p->slug === 'home' ? '/' : $p->slug) }}" target="_blank" class="btn-action-btn btn-action-view" title="View Page Live">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('admin.pages.edit', $p->id) }}" class="btn-action-btn btn-action-edit" title="Edit Page">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                @if(!$isCore)
                                    <form action="{{ route('admin.pages.destroy', $p->id) }}" method="POST" class="d-inline m-0 p-0" onsubmit="return confirm('Are you sure you want to delete &quot;{{ $p->title }}&quot;?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-action-btn btn-action-delete" title="Delete Page">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-muted">No pages found. Click "Add New Page" to create one.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
