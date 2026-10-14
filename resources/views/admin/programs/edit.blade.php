@extends('admin.layouts.app')

@section('title', 'Edit Program - ' . $program->title)

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="h4 fw-bold mb-1">Edit Program: {{ $program->title }}</h2>
        <p class="text-muted small mb-0">URL: <code>/programs/{{ $program->slug }}</code></p>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('programs.show', $program->slug) }}" target="_blank" class="btn btn-outline-primary btn-sm">
            <i class="bi bi-eye me-1"></i> Preview Page
        </a>
        <a href="{{ route('admin.programs.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i> Back to Programs
        </a>
    </div>
</div>

<form action="{{ route('admin.programs.update', $program->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row g-4">
        <!-- Main Details -->
        <div class="col-lg-8">
            <div class="card card-custom p-4 mb-4">
                <h5 class="h6 fw-bold border-bottom pb-2 mb-3">Basic Information</h5>

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold small">Category / Target Group <span class="text-danger">*</span></label>
                        <select name="category_id" class="form-select" required>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" {{ old('category_id', $program->category_id) == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold small">Bootstrap Icon Class</label>
                        <input type="text" name="icon" class="form-control" value="{{ old('icon', $program->icon) }}">
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-semibold small">Program Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control" value="{{ old('title', $program->title) }}" required>
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-semibold small">URL Slug <span class="text-danger">*</span></label>
                        <input type="text" name="slug" class="form-control" value="{{ old('slug', $program->slug) }}" required>
                    </div>

                    <!-- AI Course Content Generator Card -->
                    <div class="col-12">
                        <div class="card border-0 shadow-sm" style="background: linear-gradient(135deg, #f8faff 0%, #edf3ff 100%); border: 1.5px solid #bfdbfe !important; border-radius: 14px;">
                            <div class="card-body p-3 p-md-4">
                                <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-2">
                                    <div class="d-flex align-items-center gap-2">
                                        <div style="width: 38px; height: 38px; border-radius: 10px; background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%); display: inline-flex; align-items: center; justify-content: center; color: #fff; font-size: 1.15rem; box-shadow: 0 4px 10px rgba(37, 99, 235, 0.28);">
                                            <i class="bi bi-stars"></i>
                                        </div>
                                        <div>
                                            <div class="d-flex align-items-center gap-2">
                                                <h6 class="fw-bold mb-0 text-dark" style="letter-spacing: -0.2px;">AI Course Content &amp; Curriculum Generator</h6>
                                                <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-2 py-1" style="font-size: 0.72rem; font-weight: 700;">
                                                    <i class="bi bi-stars me-1"></i>AI Assistant
                                                </span>
                                            </div>
                                            <small class="text-muted" style="font-size: 0.8rem;">Auto-generates short card summary, full structured syllabus in Jodit, clinical highlights &amp; specs</small>
                                        </div>
                                    </div>

                                    <button type="button" class="btn btn-sm btn-outline-primary rounded-pill px-3 fw-semibold" id="toggleAiOptionsBtn" onclick="toggleProgramAiPanel()">
                                        <i class="bi bi-sliders me-1"></i> <span id="toggleAiBtnText">Custom Prompt</span>
                                    </button>
                                </div>

                                <!-- Optional Custom Instruction Box -->
                                <div id="programAiCustomBox" class="mb-3 pt-2" style="display: none;">
                                    <label class="form-label fw-semibold small text-secondary mb-1">
                                        Custom Prompt or Specific Clinical Focus <span class="text-muted fw-normal">(Optional)</span>
                                    </label>
                                    <div class="input-group mb-2">
                                        <input type="text" id="programAiPrompt" class="form-control" placeholder="e.g. Focus on micro-cannula lip sculpting, complication reversal, and anatomy mapping...">
                                        <button class="btn btn-outline-secondary btn-sm" type="button" onclick="document.getElementById('programAiPrompt').value=''">Clear</button>
                                    </div>
                                    <div class="d-flex flex-wrap gap-1">
                                        <span class="text-muted small me-1 align-self-center" style="font-size: 0.75rem;">Quick Presets:</span>
                                        <button type="button" class="btn btn-light btn-sm border py-0 px-2 rounded-pill text-secondary" style="font-size: 0.75rem;" onclick="setProgramAiPreset('Comprehensive Fellowship syllabus with hands-on live patient modules & anatomy')">Comprehensive Fellowship</button>
                                        <button type="button" class="btn btn-light btn-sm border py-0 px-2 rounded-pill text-secondary" style="font-size: 0.75rem;" onclick="setProgramAiPreset('Intensive Weekend Masterclass with live hands-on cannula & needle techniques')">Weekend Masterclass</button>
                                        <button type="button" class="btn btn-light btn-sm border py-0 px-2 rounded-pill text-secondary" style="font-size: 0.75rem;" onclick="setProgramAiPreset('Focus heavily on complication protocols, vascular safety & facial anatomy')">Safety & Anatomy</button>
                                        <button type="button" class="btn btn-light btn-sm border py-0 px-2 rounded-pill text-secondary" style="font-size: 0.75rem;" onclick="setProgramAiPreset('PMU & Micropigmentation clinical hygiene, machine techniques and pigment science')">PMU & Pigment</button>
                                    </div>
                                </div>

                                <!-- Action Strip -->
                                <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 pt-2 border-top border-primary-subtle">
                                    <div class="small text-muted" style="font-size: 0.82rem;">
                                        <i class="bi bi-info-circle me-1 text-primary"></i> Review or update the <strong>Program Title</strong>, then click to generate/rewrite.
                                    </div>
                                    <button type="button" class="btn btn-primary px-3 py-2 fw-semibold rounded-3 shadow-sm d-inline-flex align-items-center gap-2" id="btnGenerateProgramAi" onclick="generateProgramContentWithAi('all')">
                                        <i class="bi bi-magic"></i>
                                        <span id="btnGenerateProgramAiText">Auto-Generate with AI</span>
                                        <span class="spinner-border spinner-border-sm d-none" id="btnGenerateProgramAiSpinner" role="status" aria-hidden="true"></span>
                                    </button>
                                </div>

                                <!-- Alert Strip -->
                                <div id="aiProgramAlert" class="alert alert-dismissible fade show mt-3 mb-0 d-none" role="alert">
                                    <div class="d-flex align-items-center gap-2">
                                        <i id="aiProgramAlertIcon" class="bi bi-check-circle-fill fs-5"></i>
                                        <div>
                                            <div id="aiProgramAlertTitle" class="fw-bold small"></div>
                                            <div id="aiProgramAlertMsg" class="small"></div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn-close" onclick="document.getElementById('aiProgramAlert').classList.add('d-none')"></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <label class="form-label fw-semibold small mb-0">Short Description (for cards) <span class="text-danger">*</span></label>
                            <button type="button" class="btn btn-sm btn-link text-decoration-none text-primary p-0 fw-semibold" id="btnAiWriteShort" style="font-size: 0.78rem;" onclick="generateProgramContentWithAi('short_description')" title="Rewrite short description with AI">
                                <i class="bi bi-stars me-1" id="iconAiWriteShort"></i><span id="textAiWriteShort">AI Write</span>
                            </button>
                        </div>
                        <textarea name="short_description" class="form-control" rows="2" required>{{ old('short_description', $program->short_description) }}</textarea>
                    </div>

                    <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <label class="form-label fw-semibold small mb-0">Full Detailed Description <span class="text-muted fw-normal">(Curriculum, Overview, Methodology)</span></label>
                            <button type="button" class="btn btn-sm btn-link text-decoration-none text-primary p-0 fw-semibold" id="btnAiWriteFull" style="font-size: 0.78rem;" onclick="generateProgramContentWithAi('full_description')" title="Regenerate syllabus with AI">
                                <i class="bi bi-stars me-1" id="iconAiWriteFull"></i><span id="textAiWriteFull">Auto-Generate Syllabus with AI</span>
                            </button>
                        </div>
                        <textarea name="full_description" id="full_description_editor" class="form-control jodit-editor" rows="8">{{ old('full_description', $program->full_description) }}</textarea>
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-semibold small">Key Highlights (1 item per line)</label>
                        <textarea name="highlights" class="form-control" rows="4">{{ old('highlights', !empty($program->highlights) ? implode("\n", $program->highlights) : '') }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Course Specs & Eligibility -->
            <div class="card card-custom p-4">
                <h5 class="h6 fw-bold border-bottom pb-2 mb-3">Course Specs &amp; Eligibility</h5>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold small">Duration / Schedule</label>
                        <input type="text" name="duration" class="form-control" value="{{ old('duration', $program->duration) }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold small">Eligibility Criteria</label>
                        <input type="text" name="eligibility" class="form-control" value="{{ old('eligibility', $program->eligibility) }}">
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-semibold small">Awarded Certification</label>
                        <input type="text" name="certification" class="form-control" value="{{ old('certification', $program->certification) }}">
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar Options & SEO -->
        <div class="col-lg-4">
            <div class="card card-custom p-4 mb-4">
                <h5 class="h6 fw-bold border-bottom pb-2 mb-3">Settings &amp; Media</h5>

                <div class="mb-3">
                    <label class="form-label fw-semibold small">Featured Image</label>
                    <div class="mb-2">
                        <img src="{{ $program->image_url }}" alt="Preview" class="img-thumbnail" style="height: 70px;">
                    </div>
                    <input type="file" name="image" class="form-control form-control-sm" accept="image/*">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold small">Display Sort Order</label>
                    <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $program->sort_order) }}" required>
                </div>

                <div class="form-check form-switch mb-2">
                    <input class="form-check-input" type="checkbox" name="is_featured" id="isFeatured" {{ old('is_featured', $program->is_featured) ? 'checked' : '' }}>
                    <label class="form-check-label fw-semibold small" for="isFeatured">Featured on Homepage</label>
                </div>

                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="is_active" id="isActive" {{ old('is_active', $program->is_active) ? 'checked' : '' }}>
                    <label class="form-check-label fw-semibold small" for="isActive">Program Active &amp; Published</label>
                </div>
            </div>

            <div class="card card-custom p-4">
                <h5 class="h6 fw-bold border-bottom pb-2 mb-3">Program SEO Meta</h5>

                <div class="mb-3">
                    <label class="form-label fw-semibold small">SEO Meta Title</label>
                    <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title', $program->meta_title) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold small">SEO Meta Description</label>
                    <textarea name="meta_description" class="form-control" rows="3">{{ old('meta_description', $program->meta_description) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold small">SEO Meta Keywords</label>
                    <textarea name="meta_keywords" class="form-control" rows="2">{{ old('meta_keywords', $program->meta_keywords) }}</textarea>
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-hok-admin px-4 py-2">
                    <i class="bi bi-save me-1"></i> Update
                </button>
            </div>
        </div>
    </div>
</form>
@endsection

@push('scripts')
<script>
function toggleProgramAiPanel() {
    const box = document.getElementById('programAiCustomBox');
    const btnText = document.getElementById('toggleAiBtnText');
    if (!box) return;
    if (box.style.display === 'none' || box.style.display === '') {
        box.style.display = 'block';
        if (btnText) btnText.textContent = 'Hide Options';
        const input = document.getElementById('programAiPrompt');
        if (input) input.focus();
    } else {
        box.style.display = 'none';
        if (btnText) btnText.textContent = 'Custom Prompt';
    }
}

function setProgramAiPreset(text) {
    const box = document.getElementById('programAiCustomBox');
    if (box && (box.style.display === 'none' || box.style.display === '')) {
        box.style.display = 'block';
        const btnText = document.getElementById('toggleAiBtnText');
        if (btnText) btnText.textContent = 'Hide Options';
    }
    const input = document.getElementById('programAiPrompt');
    if (input) {
        input.value = text;
        input.focus();
    }
}

async function generateProgramContentWithAi(target = 'all') {
    const titleInput = document.querySelector('input[name="title"]');
    const title = titleInput ? titleInput.value.trim() : '';
    const alertBox = document.getElementById('aiProgramAlert');
    const alertTitle = document.getElementById('aiProgramAlertTitle');
    const alertMsg = document.getElementById('aiProgramAlertMsg');
    const alertIcon = document.getElementById('aiProgramAlertIcon');

    function showAlert(type, titleText, msgText) {
        if (!alertBox) return;
        alertBox.className = 'alert alert-' + type + ' alert-dismissible fade show mt-3 mb-0';
        if (alertTitle) alertTitle.textContent = titleText;
        if (alertMsg) alertMsg.textContent = msgText;
        if (alertIcon) {
            alertIcon.className = type === 'success' ? 'bi bi-check-circle-fill text-success fs-5' : 'bi bi-exclamation-triangle-fill text-danger fs-5';
        }
        alertBox.classList.remove('d-none');
    }

    if (!title) {
        showAlert('warning', 'Program Title Required', 'Please enter a Program Title first before generating with AI.');
        if (titleInput) {
            titleInput.focus();
            titleInput.classList.add('is-invalid');
            setTimeout(() => titleInput.classList.remove('is-invalid'), 3000);
        }
        return;
    }

    const categorySelect = document.querySelector('select[name="category_id"]');
    const categoryId = categorySelect ? categorySelect.value : '';
    const customPromptInput = document.getElementById('programAiPrompt');
    const customPrompt = customPromptInput ? customPromptInput.value.trim() : '';

    // Elements for different targets
    const btnAll = document.getElementById('btnGenerateProgramAi');
    const btnAllText = document.getElementById('btnGenerateProgramAiText');
    const spinnerAll = document.getElementById('btnGenerateProgramAiSpinner');

    const btnShort = document.getElementById('btnAiWriteShort');
    const textShort = document.getElementById('textAiWriteShort');
    const iconShort = document.getElementById('iconAiWriteShort');

    const btnFull = document.getElementById('btnAiWriteFull');
    const textFull = document.getElementById('textAiWriteFull');
    const iconFull = document.getElementById('iconAiWriteFull');

    // Set loading state according to target
    if (target === 'short_description') {
        if (btnShort) btnShort.disabled = true;
        if (textShort) textShort.textContent = 'Writing...';
        if (iconShort) iconShort.className = 'spinner-border spinner-border-sm me-1';
    } else if (target === 'full_description') {
        if (btnFull) btnFull.disabled = true;
        if (textFull) textFull.textContent = 'Generating Syllabus...';
        if (iconFull) iconFull.className = 'spinner-border spinner-border-sm me-1';
    } else {
        if (btnAll) btnAll.disabled = true;
        if (btnAllText) btnAllText.textContent = 'Generating All Content...';
        if (spinnerAll) spinnerAll.classList.remove('d-none');
    }

    try {
        const csrfToken = document.querySelector('meta[name="csrf-token"]') 
            ? document.querySelector('meta[name="csrf-token"]').content 
            : '{{ csrf_token() }}';

        const response = await fetch('{{ route('admin.programs.ai-generate') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                title: title,
                category_id: categoryId,
                custom_prompt: customPrompt,
                target: target
            })
        });

        const res = await response.json();

        if (res.success && res.data) {
            const data = res.data;

            if (target === 'short_description') {
                // ONLY UPDATE SHORT DESCRIPTION
                const shortDescEl = document.querySelector('textarea[name="short_description"]');
                if (shortDescEl && data.short_description) {
                    shortDescEl.value = data.short_description;
                    shortDescEl.classList.add('border-primary');
                    setTimeout(() => shortDescEl.classList.remove('border-primary'), 2500);
                    shortDescEl.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    shortDescEl.focus();
                }
                showAlert('success', 'Short Description Generated Successfully!', 'Course card summary has been created and populated.');

            } else if (target === 'full_description') {
                // ONLY UPDATE FULL DESCRIPTION (SYLLABUS)
                const fullDesc = data.full_description || '';
                const joditInstance = (window.joditInstances && window.joditInstances['full_description_editor'])
                    ? window.joditInstances['full_description_editor']
                    : (document.getElementById('full_description_editor') ? document.getElementById('full_description_editor').__jodit : null);

                if (joditInstance && typeof joditInstance.value !== 'undefined') {
                    joditInstance.value = fullDesc;
                }
                const fullDescEl = document.getElementById('full_description_editor');
                if (fullDescEl) {
                    fullDescEl.value = fullDesc;
                }
                showAlert('success', 'Curriculum Syllabus Generated Successfully!', 'Detailed clinical syllabus and learning modules have been populated.');

            } else {
                // UPDATE ALL FIELDS
                const shortDescEl = document.querySelector('textarea[name="short_description"]');
                if (shortDescEl && data.short_description) {
                    shortDescEl.value = data.short_description;
                }

                const fullDesc = data.full_description || '';
                const joditInstance = (window.joditInstances && window.joditInstances['full_description_editor'])
                    ? window.joditInstances['full_description_editor']
                    : (document.getElementById('full_description_editor') ? document.getElementById('full_description_editor').__jodit : null);

                if (joditInstance && typeof joditInstance.value !== 'undefined') {
                    joditInstance.value = fullDesc;
                }
                const fullDescEl = document.getElementById('full_description_editor');
                if (fullDescEl) {
                    fullDescEl.value = fullDesc;
                }

                const highlightsEl = document.querySelector('textarea[name="highlights"]');
                if (highlightsEl && data.highlights) {
                    highlightsEl.value = data.highlights;
                }

                const durationEl = document.querySelector('input[name="duration"]');
                if (durationEl && (!durationEl.value || durationEl.value.trim() === '')) {
                    durationEl.value = data.duration || '';
                }

                const eligEl = document.querySelector('input[name="eligibility"]');
                if (eligEl && (!eligEl.value || eligEl.value.trim() === '')) {
                    eligEl.value = data.eligibility || '';
                }

                const certEl = document.querySelector('input[name="certification"]');
                if (certEl && (!certEl.value || certEl.value.trim() === '')) {
                    certEl.value = data.certification || '';
                }

                const metaTitleEl = document.querySelector('input[name="meta_title"]');
                if (metaTitleEl && (!metaTitleEl.value || metaTitleEl.value.trim() === '')) {
                    metaTitleEl.value = data.meta_title || '';
                }

                const metaDescEl = document.querySelector('textarea[name="meta_description"]');
                if (metaDescEl && (!metaDescEl.value || metaDescEl.value.trim() === '')) {
                    metaDescEl.value = data.meta_description || '';
                }

                showAlert('success', 'Course Content Generated Successfully!', 'Summary, complete syllabus curriculum, key highlights, and course specifications have been populated.');

                if (shortDescEl) {
                    shortDescEl.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
            }
        } else {
            showAlert('danger', 'Generation Failed', res.message || 'Could not generate content. Please try again.');
        }
    } catch (err) {
        console.error('AI Generation Error:', err);
        showAlert('danger', 'Request Error', 'Network or server error while generating content. Please check console.');
    } finally {
        if (target === 'short_description') {
            if (btnShort) btnShort.disabled = false;
            if (textShort) textShort.textContent = 'AI Write';
            if (iconShort) iconShort.className = 'bi bi-stars me-1';
        } else if (target === 'full_description') {
            if (btnFull) btnFull.disabled = false;
            if (textFull) textFull.textContent = 'Auto-Generate Syllabus with AI';
            if (iconFull) iconFull.className = 'bi bi-stars me-1';
        } else {
            if (btnAll) btnAll.disabled = false;
            if (btnAllText) btnAllText.textContent = 'Auto-Generate with AI';
            if (spinnerAll) spinnerAll.classList.add('d-none');
        }
    }
}
</script>
@endpush

