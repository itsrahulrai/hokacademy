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
            <a href="{{ route('admin.inquiries.index') }}" class="btn btn-outline-secondary" title="Reset Filters">
                <i class="bi bi-arrow-counterclockwise"></i> Reset
            </a>
        </div>
    </form>
</div>

<style>
    .inquiries-card .table-responsive {
        scrollbar-width: none;
        -ms-overflow-style: none;
    }
    .inquiries-card .table-responsive::-webkit-scrollbar {
        display: none;
        height: 0;
        width: 0;
    }
    @media (min-width: 992px) {
        .inquiries-card .table-responsive {
            overflow-x: clip;
        }
    }
    .btn-action-reply {
        color: #ffffff;
        background: #0d6efd;
        border-color: #0d6efd;
    }
    .btn-action-reply:hover {
        color: #ffffff;
        background: #0b5ed7;
        border-color: #0a58ca;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(13, 110, 253, 0.3);
    }
</style>

<div class="card card-custom inquiries-card overflow-hidden">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0" style="table-layout: auto; width: 100%;">
            <thead>
                <tr>
                    <th>Received</th>
                    <th>Sender Name</th>
                    <th>Email</th>
                    <th>Country / Role</th>
                    <th>Program</th>
                    <th>Status</th>
                    <th class="text-end">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($inquiries as $inq)
                    <tr class="{{ $inq->status === 'new' ? 'table-warning-subtle fw-semibold' : '' }}">
                        <td>
                            <div class="fw-bold text-navy text-nowrap">{{ $inq->created_at->format('M d, Y') }}</div>
                            <small class="text-muted d-block text-nowrap mt-0.5">{{ $inq->created_at->format('h:i A') }}</small>
                        </td>
                        <td>
                            <strong class="text-navy d-block">{{ $inq->name }}</strong>
                            <a href="tel:{{ $inq->phone }}" class="text-decoration-none text-muted small d-inline-flex align-items-center gap-1 mt-0.5">
                                <i class="bi bi-telephone text-primary" style="font-size: 0.78rem;"></i>
                                <span>{{ $inq->phone }}</span>
                            </a>
                        </td>
                        <td>
                            <a href="mailto:{{ $inq->email }}" class="text-decoration-none text-dark small text-break">
                                <i class="bi bi-envelope me-1 text-primary"></i> {{ $inq->email }}
                            </a>
                        </td>
                        <td>
                            <small class="d-block">{{ $inq->country ?? '-' }}</small>
                            <span class="badge bg-light text-dark border text-wrap" style="max-width: 200px; line-height: 1.35;">{{ $inq->profession_role ?? 'Other' }}</span>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark border text-wrap" style="max-width: 200px; line-height: 1.35;">{{ $inq->program_name ?? 'General' }}</span>
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
                                <a href="{{ route('admin.inquiries.show', $inq->id) }}#reply-card" class="btn-action-btn btn-action-reply" title="Direct Email Reply">
                                    <i class="bi bi-reply-fill"></i>
                                </a>
                                <a href="{{ route('admin.inquiries.show', $inq->id) }}" class="btn-action-btn btn-action-view" title="View Details">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <form action="{{ route('admin.inquiries.destroy', $inq->id) }}" method="POST" class="d-inline m-0 p-0" onsubmit="return confirm('Delete this inquiry record?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-action-btn btn-action-delete" title="Delete Inquiry">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-4 text-muted">No inquiries found matching criteria.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($inquiries->hasPages())
        <div class="card-footer bg-white py-3 border-top">
            {{ $inquiries->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>
@endsection

