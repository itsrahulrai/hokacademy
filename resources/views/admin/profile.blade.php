@extends('admin.layouts.app')

@section('title', 'Admin Profile')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="h4 fw-bold mb-1">Admin Profile &amp; Security</h2>
        <p class="text-muted small mb-0">Manage your administrative account name, email and access credentials.</p>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="card card-custom p-4">
            <h5 class="h6 fw-bold border-bottom pb-2 mb-3">Account Details</h5>

            <form action="{{ route('admin.profile.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label small fw-semibold">Admin Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label small fw-semibold">Email Address <span class="text-danger">*</span></label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                </div>

                <hr class="my-4">
                <h6 class="fw-bold mb-3">Change Password (Leave blank to keep current password)</h6>

                <div class="mb-3">
                    <label class="form-label small fw-semibold">Current Password</label>
                    <input type="password" name="current_password" class="form-control" placeholder="••••••••">
                </div>

                <div class="mb-3">
                    <label class="form-label small fw-semibold">New Password</label>
                    <input type="password" name="new_password" class="form-control" placeholder="••••••••">
                </div>

                <div class="mb-4">
                    <label class="form-label small fw-semibold">Confirm New Password</label>
                    <input type="password" name="new_password_confirmation" class="form-control" placeholder="••••••••">
                </div>

                <button type="submit" class="btn btn-hok-admin w-100 py-2">
                    <i class="bi bi-shield-lock me-1"></i> Update Profile &amp; Password
                </button>
            </form>
        </div>
    </div>
</div>
@endsection

