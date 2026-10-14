@extends('admin.layouts.app')

@section('title', 'Website Inquiries')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="h4 fw-bold mb-1">Website Inquiries &amp; Leads</h2>
        <p class="text-muted small mb-0">Track all incoming questions, program admissions, and international enquiries.</p>
    </div>
</div>

<!-- Filters -->
<div class="card card-custom p-3 mb-4">
    <form action="{{ route('admin.inquiries.index') }}" method="GET" class="row g-3 align-items-center">
        <div class="col-md-6">
            <div class="input-group">
                <span class="input-group-text bg-light"><i class="bi bi-search"></i></span>
                <input type="text" name="search" class="form-control" placeholder="Search by name, email, phone, program..." value="{{ request('search') }}">
            </div>
        </div>
        <div class="col-md-3">
            <select name="status" class="form-select" onchange="this.form.submit()">
                <option value="">All Statuses ({{ $inquiries->total() }})</option>
                <option value="new" {{ request('status') === 'new' ? 'selected' : '' }}>New</option>
                <option value="read" {{ request('status') === 'read' ? 'selected' : '' }}>Read</option>
                <option value="replied" {{ request('status') === 'replied' ? 'selected' : '' }}>Replied</option>
                <option value="archived" {{ request('status') === 'archived' ? 'selected' : '' }}>Archived</option>
            </select>
        </div>
        <div class="col-md-3 d-flex gap-2">
            <button type="submit" class="btn btn-hok-navy flex-grow-1">
                <i class="bi bi-funnel"></i> Filter
            </button>
            <a href="{{ route('admin.inquiries.index') }}" class="btn btn-outline-secondary">
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
                    <th>Received</th>
                    <th>Sender Name</th>
                    <th>Phone / WhatsApp</th>
                    <th>Email</th>
                    <th>Country / Role</th>
                    <th>Program</th>
                    <th>Status</th>
                    <th class="text-end" style="min-width: 140px;">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($inquiries as $inq)
                    <tr class="{{ $inq->status === 'new' ? 'table-warning-subtle fw-semibold' : '' }}">
                        <td>
                            <small class="text-muted">{{ $inq->created_at->format('M d, Y H:i') }}</small>
                        </td>
                        <td>
                            <strong class="text-navy">{{ $inq->name }}</strong>
                        </td>
                        <td>
                            <a href="tel:{{ $inq->phone }}" class="text-decoration-none text-dark small">
                                <i class="bi bi-telephone me-1 text-primary"></i> {{ $inq->phone }}
                            </a>
                        </td>
                        <td>
                            <a href="mailto:{{ $inq->email }}" class="text-decoration-none text-dark small">
                                <i class="bi bi-envelope me-1 text-primary"></i> {{ $inq->email }}
                            </a>
                        </td>
                        <td>
                            <small class="d-block">{{ $inq->country ?? '-' }}</small>
                            <span class="badge bg-light text-dark border">{{ $inq->profession_role ?? 'Other' }}</span>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark border">{{ $inq->program_name ?? 'General' }}</span>
                        </td>
                        <td>
                            @if($inq->status === 'new')
                                <span class="badge bg-danger">New</span>
                            @elseif($inq->status === 'read')
                                <span class="badge bg-warning text-dark">Read</span>
                            @elseif($inq->status === 'replied')
                                <span class="badge bg-success">Replied</span>
                            @else
                                <span class="badge bg-secondary">{{ ucfirst($inq->status) }}</span>
                            @endif
                        </td>
                        <td class="text-end text-nowrap">
                            <div class="table-actions">
                                <a href="{{ route('admin.inquiries.show', $inq->id) }}#reply-card" class="btn btn-sm btn-primary rounded-pill px-3 fw-semibold d-inline-flex align-items-center gap-1 shadow-sm" style="font-size: 0.8rem;" title="Direct Email Reply">
                                    <i class="bi bi-reply-fill"></i>
                                    <span>Reply</span>
                                </a>
                                <a href="{{ route('admin.inquiries.show', $inq->id) }}" class="btn btn-sm btn-light border rounded-pill px-3 fw-semibold d-inline-flex align-items-center gap-1" style="color: var(--hok-navy); font-size: 0.8rem;">
                                    <i class="bi bi-eye"></i>
                                    <span>Details</span>
                                </a>
                                <form action="{{ route('admin.inquiries.destroy', $inq->id) }}" method="POST" class="d-inline m-0 p-0" onsubmit="return confirm('Delete this inquiry record?');">
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
                        <td colspan="8" class="text-center py-4 text-muted">No inquiries found matching criteria.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($inquiries->hasPages())
        <div class="card-footer bg-white py-3">
            {{ $inquiries->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>
@endsection

