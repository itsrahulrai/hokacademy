@extends('admin.layouts.app')

@section('title', 'Program Categories')

@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
    <div>
        <h2 class="h4 fw-bold mb-1" style="color: var(--hok-navy);">Program Categories &amp; Audiences</h2>
        <p class="text-muted small mb-0">Manage professional categories (Doctors, PMU, Nursing, Technicians) and their theme styling.</p>
    </div>
    <button type="button" class="btn btn-hok-admin shadow-sm" data-bs-toggle="modal" data-bs-target="#createCategoryModal">
        <i class="bi bi-plus-circle-fill"></i>
        <span>Add Category</span>
    </button>
</div>

<div class="card card-custom overflow-hidden">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th style="width: 70px;">Order</th>
                    <th>Icon</th>
                    <th>Category Name</th>
                    <th>Short Name</th>
                    <th>Slug</th>
                    <th>Tone Class</th>
                    <th>Programs</th>
                    <th>Status</th>
                    <th class="text-end" style="min-width: 120px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $cat)
                    <tr>
                        <td><span class="badge bg-light text-dark border">{{ $cat->sort_order }}</span></td>
                        <td><i class="bi {{ $cat->icon }} fs-4" style="color: var(--hok-navy-mid);"></i></td>
                        <td><strong class="text-dark">{{ $cat->name }}</strong></td>
                        <td>{{ $cat->short_name }}</td>
                        <td><code>{{ $cat->slug }}</code></td>
                        <td><span class="badge bg-light text-dark border">{{ $cat->tone_class }}</span></td>
                        <td>
                            <span class="badge border" style="background: rgba(12, 42, 82, 0.08); color: var(--hok-navy); border-color: rgba(12, 42, 82, 0.2) !important;">
                                {{ $cat->programs_count }} programs
                            </span>
                        </td>
                        <td>
                            @if($cat->is_active)
                                <span class="badge rounded-pill px-2 py-1" style="background: var(--hok-emerald); color: #fff;">Active</span>
                            @else
                                <span class="badge bg-secondary rounded-pill px-2 py-1">Hidden</span>
                            @endif
                        </td>
                        <td class="text-end text-nowrap">
                            <div class="table-actions">
                                <button type="button" class="btn-action-btn btn-action-edit" 
                                        data-bs-toggle="modal" data-bs-target="#editModal{{ $cat->id }}" title="Edit Category">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <form action="{{ route('admin.categories.destroy', $cat->id) }}" method="POST" class="d-inline m-0 p-0" onsubmit="return confirm('Delete this category and its programs?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-action-btn btn-action-delete" title="Delete">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>

                    <!-- Edit Modal -->
                    <div class="modal fade" id="editModal{{ $cat->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="{{ route('admin.categories.update', $cat->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-header">
                                        <h5 class="modal-title fw-bold">Edit Category: {{ $cat->name }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label class="form-label small fw-semibold">Full Category Name</label>
                                            <input type="text" name="name" class="form-control" value="{{ $cat->name }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label small fw-semibold">Short Name (for filter tabs)</label>
                                            <input type="text" name="short_name" class="form-control" value="{{ $cat->short_name }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label small fw-semibold">Slug Identifier</label>
                                            <input type="text" name="slug" class="form-control" value="{{ $cat->slug }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label small fw-semibold">Bootstrap Icon Class</label>
                                            <input type="text" name="icon" class="form-control" value="{{ $cat->icon }}" placeholder="bi-person-badge" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label small fw-semibold">Tone CSS Class</label>
                                            <select name="tone_class" class="form-select">
                                                <option value="c-navy" {{ $cat->tone_class === 'c-navy' ? 'selected' : '' }}>Navy (c-navy)</option>
                                                <option value="c-teal" {{ $cat->tone_class === 'c-teal' ? 'selected' : '' }}>Teal (c-teal)</option>
                                                <option value="c-blue" {{ $cat->tone_class === 'c-blue' ? 'selected' : '' }}>Blue (c-blue)</option>
                                                <option value="c-red" {{ $cat->tone_class === 'c-red' ? 'selected' : '' }}>Red / Burgundy (c-red)</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label small fw-semibold">Sort Order</label>
                                            <input type="number" name="sort_order" class="form-control" value="{{ $cat->sort_order }}" required>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="is_active" id="active{{ $cat->id }}" {{ $cat->is_active ? 'checked' : '' }}>
                                            <label class="form-check-label small fw-semibold" for="active{{ $cat->id }}">Category Active</label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-hok-admin btn-sm">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Create Modal -->
<div class="modal fade" id="createCategoryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('admin.categories.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Add Program Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Full Category Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" placeholder="e.g. Doctors & Medical Professionals" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Short Name (for filter tabs) <span class="text-danger">*</span></label>
                        <input type="text" name="short_name" class="form-control" placeholder="e.g. Doctors" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Slug Identifier</label>
                        <input type="text" name="slug" class="form-control" placeholder="e.g. doctors">
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Bootstrap Icon Class</label>
                        <input type="text" name="icon" class="form-control" placeholder="bi-person-badge" value="bi-mortarboard" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Tone CSS Class</label>
                        <select name="tone_class" class="form-select">
                            <option value="c-navy">Navy (c-navy)</option>
                            <option value="c-teal">Teal (c-teal)</option>
                            <option value="c-blue">Blue (c-blue)</option>
                            <option value="c-red">Red / Burgundy (c-red)</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Sort Order <span class="text-danger">*</span></label>
                        <input type="number" name="sort_order" class="form-control" value="{{ count($categories) + 1 }}" required>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="is_active" id="createActive" checked>
                        <label class="form-check-label small fw-semibold" for="createActive">Category Active</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-hok-admin btn-sm">Create Category</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

