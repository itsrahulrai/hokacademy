@extends('admin.layouts.app')

@section('title', 'Faculty Members')

@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
    <div>
        <h2 class="h4 fw-bold mb-1" style="color: var(--hok-navy);">Faculty &amp; Medical Specialists</h2>
        <p class="text-muted small mb-0">Manage practising doctors, surgeons and educators on HOK Academy faculty.</p>
    </div>
    <a href="{{ route('admin.faculty.create') }}" class="btn btn-hok-admin shadow-sm">
        <i class="bi bi-person-plus-fill"></i>
        <span>Add Faculty Member</span>
    </a>
</div>

<div class="card card-custom overflow-hidden">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th style="width: 70px;">Order</th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Speciality &amp; Tag</th>
                    <th>Designation</th>
                    <th>Tone</th>
                    <th>Visiting</th>
                    <th>Status</th>
                    <th class="text-end" style="min-width: 120px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($faculty as $f)
                    <tr>
                        <td>
                            <span class="badge bg-light text-dark border">{{ $f->sort_order }}</span>
                        </td>
                        <td>
                            <img src="{{ $f->image_url }}" alt="{{ $f->name }}" class="rounded-circle shadow-sm" style="width: 45px; height: 45px; object-fit: cover;">
                        </td>
                        <td>
                            <strong class="text-dark d-block">{{ $f->name }}</strong>
                            <small class="text-muted">{{ Str::limit($f->bio, 50) }}</small>
                        </td>
                        <td>
                            <span class="badge border" style="background: rgba(13, 92, 58, 0.08); color: var(--hok-emerald); border-color: rgba(13, 92, 58, 0.25) !important;">{{ $f->tag ?? $f->speciality }}</span>
                        </td>
                        <td>
                            <small class="text-muted">{{ $f->designation }}</small>
                        </td>
                        <td>
                            <code>{{ $f->tone_class }}</code>
                        </td>
                        <td>
                            @if($f->is_visiting)
                                <span class="badge rounded-pill" style="background: var(--hok-gold-subtle); color: var(--hok-gold-dark); border: 1px solid rgba(197, 155, 39, 0.3);">Visiting</span>
                            @else
                                <span class="badge bg-light text-dark border rounded-pill">Core</span>
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
                                <a href="{{ route('admin.faculty.edit', $f->id) }}" class="btn-action-btn btn-action-edit" title="Edit Faculty">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.faculty.destroy', $f->id) }}" method="POST" class="d-inline m-0 p-0" onsubmit="return confirm('Delete this faculty member?');">
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
                        <td colspan="9" class="text-center py-4 text-muted">No faculty members found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

