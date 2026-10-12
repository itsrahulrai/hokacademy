@extends('admin.layouts.app')

@section('title', 'Pages & SEO Management')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="h4 fw-bold mb-1">Pages &amp; SEO Meta Management</h2>
        <p class="text-muted small mb-0">Control the title, meta tags, description, keywords, canonical URLs, and header titles for every page.</p>
    </div>
</div>

<div class="card card-custom">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>Page Name</th>
                    <th>Slug / Route</th>
                    <th>Meta Title</th>
                    <th>Header Title</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pages as $p)
                    <tr>
                        <td>
                            <strong class="text-navy">{{ $p->title }}</strong>
                        </td>
                        <td>
                            <code>/{{ $p->slug === 'home' ? '' : $p->slug }}</code>
                        </td>
                        <td>
                            <span class="small text-truncate d-inline-block" style="max-width: 250px;">
                                {{ $p->meta_title ?? 'Default' }}
                            </span>
                        </td>
                        <td>
                            <span class="small text-muted text-truncate d-inline-block" style="max-width: 220px;">
                                {{ $p->header_title ?? '-' }}
                            </span>
                        </td>
                        <td>
                            @if($p->is_active)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-secondary">Hidden</span>
                            @endif
                        </td>
                        <td class="text-end text-nowrap">
                            <div class="table-actions">
                                <a href="{{ url($p->slug === 'home' ? '/' : $p->slug) }}" target="_blank" class="btn-action-btn btn-action-view" title="View Page Live">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('admin.pages.edit', $p->id) }}" class="btn btn-sm btn-hok-navy text-white text-decoration-none px-3 rounded-3 fw-semibold d-inline-flex align-items-center gap-1" style="font-size: 0.82rem;">
                                    <i class="bi bi-pencil-square"></i>
                                    <span>Edit SEO</span>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

