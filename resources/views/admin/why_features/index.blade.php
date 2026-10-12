@extends('admin.layouts.app')

@section('title', 'Why HOK & Philosophy Features')

@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
    <div>
        <h2 class="h4 fw-bold mb-1" style="color: var(--hok-navy);">Why HOK &amp; Philosophy Principles</h2>
        <p class="text-muted small mb-0">Manage pillars, educational principles and model highlights.</p>
    </div>
    <div class="d-flex flex-wrap gap-2 align-items-center">
        <div class="btn-group shadow-sm" role="group">
            <a href="{{ route('admin.why-features.index', ['type' => 'why_hok']) }}" class="btn btn-sm {{ $type === 'why_hok' ? 'btn-hok-navy' : 'btn-outline-secondary' }}">
                Why HOK Pillars
            </a>
            <a href="{{ route('admin.why-features.index', ['type' => 'philosophy']) }}" class="btn btn-sm {{ $type === 'philosophy' ? 'btn-hok-navy' : 'btn-outline-secondary' }}">
                Philosophy (6 Principles)
            </a>
        </div>
        <a href="{{ route('admin.why-features.create', ['type' => $type]) }}" class="btn btn-hok-admin shadow-sm">
            <i class="bi bi-plus-circle-fill"></i>
            <span>Add Feature</span>
        </a>
    </div>
</div>

<div class="card card-custom overflow-hidden">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th style="width: 70px;">Order</th>
                    <th>Icon</th>
                    <th>Title &amp; Subtitle</th>
                    <th>Tone</th>
                    <th>Wide Card</th>
                    <th>Status</th>
                    <th class="text-end" style="min-width: 120px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($features as $f)
                    <tr>
                        <td>
                            <span class="badge bg-light text-dark border">{{ $f->sort_order }}</span>
                        </td>
                        <td>
                            <i class="bi {{ $f->icon }} fs-4" style="color: var(--hok-navy-mid);"></i>
                        </td>
                        <td>
                            <strong class="text-dark d-block">{{ $f->title }}</strong>
                            <small class="text-muted">{{ Str::limit($f->description ?? $f->strong_text, 70) }}</small>
                        </td>
                        <td>
                            <code>{{ $f->tone_class }}</code>
                        </td>
                        <td>
                            @if($f->is_wide)
                                <span class="badge bg-dark rounded-pill">Wide</span>
                            @else
                                <span class="text-muted small">Standard</span>
                            @endif
                        </td>
                        <td>
                            @if($f->is_active)
                                <span class="badge rounded-pill px-2 py-1" style="background: var(--hok-emerald); color: #fff;">Active</span>
                            @else
                                <span class="badge bg-secondary rounded-pill px-2 py-1">Hidden</span>
                            @endif
                        </td>
                        <td class="text-end text-nowrap">
                            <div class="table-actions">
                                <a href="{{ route('admin.why-features.edit', $f->id) }}" class="btn-action-btn btn-action-edit" title="Edit Feature">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.why-features.destroy', $f->id) }}" method="POST" class="d-inline m-0 p-0" onsubmit="return confirm('Delete this feature item?');">
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
                        <td colspan="7" class="text-center py-4 text-muted">No feature items found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

