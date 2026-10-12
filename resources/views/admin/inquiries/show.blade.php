@extends('admin.layouts.app')

@section('title', 'Inquiry Details - ' . $inquiry->name)

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="h4 fw-bold mb-1">Inquiry from {{ $inquiry->name }}</h2>
        <p class="text-muted small mb-0">Received on {{ $inquiry->created_at->format('F d, Y \a\t H:i:s') }} ({{ $inquiry->created_at->diffForHumans() }})</p>
    </div>
    <a href="{{ route('admin.inquiries.index') }}" class="btn btn-outline-secondary btn-sm">
        <i class="bi bi-arrow-left me-1"></i> Back to Inquiries
    </a>
</div>

<div class="row g-4">
    <!-- Inquiry Details -->
    <div class="col-lg-8">
        <div class="card card-custom p-4 mb-4">
            <h5 class="h6 fw-bold border-bottom pb-2 mb-3"><i class="bi bi-chat-left-text me-2 text-primary"></i>Inquiry Message</h5>
            <div class="p-3 bg-light rounded-3 mb-4" style="font-size: 1.05rem; line-height: 1.7; color: #1e293b;">
                {!! nl2br(e($inquiry->message ?? 'No additional message text provided.')) !!}
            </div>

            <h5 class="h6 fw-bold border-bottom pb-2 mb-3"><i class="bi bi-person-lines-fill me-2 text-primary"></i>Sender Information</h5>
            <div class="row g-3">
                <div class="col-md-6">
                    <small class="text-muted text-uppercase fw-bold d-block">Full Name</small>
                    <strong class="fs-6">{{ $inquiry->name }}</strong>
                </div>
                <div class="col-md-6">
                    <small class="text-muted text-uppercase fw-bold d-block">Program of Interest</small>
                    <span class="badge bg-primary fs-6">{{ $inquiry->program_name ?? 'General / Not Specified' }}</span>
                </div>
                <div class="col-md-6">
                    <small class="text-muted text-uppercase fw-bold d-block">Phone / WhatsApp</small>
                    <div class="d-flex align-items-center gap-2 mt-1">
                        <strong class="fs-6">{{ $inquiry->phone }}</strong>
                        <a href="tel:{{ $inquiry->phone }}" class="btn btn-sm btn-outline-primary py-0 px-2" title="Call"><i class="bi bi-telephone"></i></a>
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $inquiry->phone) }}" target="_blank" class="btn btn-sm btn-outline-success py-0 px-2" title="WhatsApp"><i class="bi bi-whatsapp"></i></a>
                    </div>
                </div>
                <div class="col-md-6">
                    <small class="text-muted text-uppercase fw-bold d-block">Email Address</small>
                    <div class="d-flex align-items-center gap-2 mt-1">
                        <strong class="fs-6">{{ $inquiry->email }}</strong>
                        <a href="mailto:{{ $inquiry->email }}" class="btn btn-sm btn-outline-primary py-0 px-2" title="Send Email"><i class="bi bi-envelope"></i></a>
                    </div>
                </div>
                <div class="col-md-6">
                    <small class="text-muted text-uppercase fw-bold d-block">Country / Location</small>
                    <span>{{ $inquiry->country ?? 'Not Provided' }}</span>
                </div>
                <div class="col-md-6">
                    <small class="text-muted text-uppercase fw-bold d-block">Professional Background</small>
                    <span>{{ $inquiry->profession_role ?? 'Not Provided' }}</span>
                </div>
                <div class="col-md-6">
                    <small class="text-muted text-uppercase fw-bold d-block">Sender IP Address</small>
                    <code>{{ $inquiry->ip_address ?? '-' }}</code>
                </div>
            </div>
        </div>
    </div>

    <!-- Status & Follow-up Notes -->
    <div class="col-lg-4">
        <div class="card card-custom p-4">
            <h5 class="h6 fw-bold border-bottom pb-2 mb-3"><i class="bi bi-pencil-square me-2 text-warning"></i>Status &amp; Follow-up</h5>

            <form action="{{ route('admin.inquiries.status', $inquiry->id) }}" method="POST">
                @csrf
                @method('PATCH')

                <div class="mb-3">
                    <label class="form-label small fw-semibold">Lead Status</label>
                    <select name="status" class="form-select">
                        <option value="new" {{ $inquiry->status === 'new' ? 'selected' : '' }}>New Lead</option>
                        <option value="read" {{ $inquiry->status === 'read' ? 'selected' : '' }}>Read / Under Review</option>
                        <option value="replied" {{ $inquiry->status === 'replied' ? 'selected' : '' }}>Replied / Contacted</option>
                        <option value="archived" {{ $inquiry->status === 'archived' ? 'selected' : '' }}>Archived / Closed</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label small fw-semibold">Internal Follow-up Notes</label>
                    <textarea name="admin_notes" class="form-control" rows="5" placeholder="Add follow-up notes, call summary, or discussion details...">{{ old('admin_notes', $inquiry->admin_notes) }}</textarea>
                </div>

                <button type="submit" class="btn btn-hok-admin w-100">
                    <i class="bi bi-check-circle me-1"></i> Update Status &amp; Notes
                </button>
            </form>
        </div>
    </div>
</div>
@endsection

