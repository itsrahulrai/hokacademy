@extends('admin.layouts.app')

@section('title', 'Write Blog')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="h4 fw-bold mb-1">Write New Blog</h2>
        <p class="text-muted small mb-0">Create educational content, clinical updates or training guides.</p>
    </div>
    <a href="{{ route('admin.blogs.index') }}" class="btn btn-outline-secondary btn-sm">
        <i class="bi bi-arrow-left me-1"></i> Back to Blogs
    </a>
</div>

<form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row g-4">
        <!-- Main Blog Content -->
        <div class="col-lg-8">
            <div class="card card-custom p-4 mb-4">
                <div class="mb-3">
                    <label class="form-label fw-semibold small">Blog Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control form-control-lg fs-5" placeholder="e.g. Choosing an Advanced Training Pathway in Aesthetic Medicine" value="{{ old('title') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold small">URL Slug (optional)</label>
                    <input type="text" name="slug" class="form-control" placeholder="auto-generated-from-title" value="{{ old('slug') }}">
                </div>

                <!-- AI Blog Generator Card -->
                <div class="mb-4">
                    <div class="card border-0 shadow-sm" style="background: linear-gradient(135deg, #f8faff 0%, #edf3ff 100%); border: 1.5px solid #bfdbfe !important; border-radius: 14px;">
                        <div class="card-body p-3 p-md-4">
                            <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-2">
                                <div class="d-flex align-items-center gap-2">
                                    <div style="width: 38px; height: 38px; border-radius: 10px; background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%); display: inline-flex; align-items: center; justify-content: center; color: #fff; font-size: 1.15rem; box-shadow: 0 4px 10px rgba(37, 99, 235, 0.28);">
                                        <i class="bi bi-stars"></i>
                                    </div>
                                    <div>
                                        <div class="d-flex align-items-center gap-2">
                                            <h6 class="fw-bold mb-0 text-dark" style="letter-spacing: -0.2px;">AI Blog Content Generator</h6>
                                            <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-2 py-1" style="font-size: 0.72rem; font-weight: 700;">
                                                <i class="bi bi-stars me-1"></i>AI Assistant
                                            </span>
                                        </div>
                                        <small class="text-muted" style="font-size: 0.8rem;">Auto-generates summary excerpt, full detailed body content, category &amp; SEO meta</small>
                                    </div>
                                </div>

                                <button type="button" class="btn btn-sm btn-outline-primary rounded-pill px-3 fw-semibold" id="toggleAiOptionsBtn" onclick="toggleBlogAiPanel()">
                                    <i class="bi bi-sliders me-1"></i> <span id="toggleAiBtnText">Custom Prompt</span>
                                </button>
                            </div>

                            <!-- Optional Custom Instruction Box -->
                            <div id="blogAiCustomBox" class="mb-3 pt-2" style="display: none;">
                                <label class="form-label fw-semibold small text-secondary mb-1">
                                    Custom Prompt or Specific Focus <span class="text-muted fw-normal">(Optional)</span>
                                </label>
                                <div class="input-group mb-2">
                                    <input type="text" id="blogAiPrompt" class="form-control" placeholder="e.g. Focus on cannula lips safety, evidence-based vascular mapping, or clinical case studies...">
                                    <button class="btn btn-outline-secondary btn-sm" type="button" onclick="document.getElementById('blogAiPrompt').value=''">Clear</button>
                                </div>
                                <div class="d-flex flex-wrap gap-1">
                                    <span class="text-muted small me-1 align-self-center" style="font-size: 0.75rem;">Quick Presets:</span>
                                    <button type="button" class="btn btn-light btn-sm border py-0 px-2 rounded-pill text-secondary" style="font-size: 0.75rem;" onclick="setBlogAiPreset('Clinical Case Review with step-by-step procedure & patient outcomes')">Case Study</button>
                                    <button type="button" class="btn btn-light btn-sm border py-0 px-2 rounded-pill text-secondary" style="font-size: 0.75rem;" onclick="setBlogAiPreset('Focus on patient safety, anatomy danger zones and complication reversal')">Safety & Protocols</button>
                                    <button type="button" class="btn btn-light btn-sm border py-0 px-2 rounded-pill text-secondary" style="font-size: 0.75rem;" onclick="setBlogAiPreset('Latest industry innovations and procedural trends in aesthetic medicine')">Trends & Techniques</button>
                                    <button type="button" class="btn btn-light btn-sm border py-0 px-2 rounded-pill text-secondary" style="font-size: 0.75rem;" onclick="setBlogAiPreset('Guidance for doctors & nurses entering aesthetic medicine & fellowship pathways')">Career & Fellowship</button>
                                </div>
                            </div>

                            <!-- Action Strip -->
                            <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 pt-2 border-top border-primary-subtle">
                                <div class="small text-muted" style="font-size: 0.82rem;">
                                    <i class="bi bi-info-circle me-1 text-primary"></i> Enter the <strong>Blog Title</strong> above, then click generate.
                                </div>
                                <button type="button" class="btn btn-primary px-3 py-2 fw-semibold rounded-3 shadow-sm d-inline-flex align-items-center gap-2" id="btnGenerateBlogAi" onclick="generateBlogContentWithAi('all')">
                                    <i class="bi bi-magic"></i>
                                    <span id="btnGenerateBlogAiText">Auto-Generate with AI</span>
                                    <span class="spinner-border spinner-border-sm d-none" id="btnGenerateBlogAiSpinner" role="status" aria-hidden="true"></span>
                                </button>
                            </div>

                            <!-- Alert Strip -->
                            <div id="aiBlogAlert" class="alert alert-dismissible fade show mt-3 mb-0 d-none" role="alert">
                                <div class="d-flex align-items-center gap-2">
                                    <i id="aiBlogAlertIcon" class="bi bi-check-circle-fill fs-5"></i>
                                    <div>
                                        <div id="aiBlogAlertTitle" class="fw-bold small"></div>
                                        <div id="aiBlogAlertMsg" class="small"></div>
                                    </div>
                                </div>
                                <button type="button" class="btn-close" onclick="document.getElementById('aiBlogAlert').classList.add('d-none')"></button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <label class="form-label fw-semibold small mb-0">Short Summary / Excerpt</label>
                        <button type="button" class="btn btn-sm btn-link text-decoration-none text-primary p-0 fw-semibold" id="btnAiWriteExcerpt" style="font-size: 0.78rem;" onclick="generateBlogContentWithAi('excerpt')" title="Generate excerpt with AI">
                            <i class="bi bi-stars me-1" id="iconAiWriteExcerpt"></i><span id="textAiWriteExcerpt">AI Write</span>
                        </button>
                    </div>
                    <textarea name="excerpt" class="form-control" rows="3" placeholder="Brief summary displayed on blog cards and search snippets...">{{ old('excerpt') }}</textarea>
                </div>

                <div class="mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <label class="form-label fw-semibold small mb-0">Blog Body Content <span class="text-danger">*</span></label>
                        <button type="button" class="btn btn-sm btn-link text-decoration-none text-primary p-0 fw-semibold" id="btnAiWriteContent" style="font-size: 0.78rem;" onclick="generateBlogContentWithAi('content')" title="Generate blog content with AI">
                            <i class="bi bi-stars me-1" id="iconAiWriteContent"></i><span id="textAiWriteContent">Auto-Generate Content with AI</span>
                        </button>
                    </div>
                    <textarea name="content" id="blog_content_editor" class="form-control jodit-editor" rows="14" placeholder="Write full blog content, headings, clinical case notes..." data-height="500" required>{{ old('content') }}</textarea>
                </div>
            </div>
        </div>

        <!-- Sidebar Attributes & SEO -->
        <div class="col-lg-4">
            <div class="card card-custom p-4 mb-4">
                <h5 class="h6 fw-bold border-bottom pb-2 mb-3">Publishing Details</h5>

                <div class="mb-3">
                    <label class="form-label fw-semibold small">Category Tag <span class="text-danger">*</span></label>
                    <input type="text" name="category_tag" class="form-control" placeholder="e.g. Aesthetic Medicine, Patient Safety, International" value="{{ old('category_tag', 'Aesthetic Medicine') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold small">Estimated Read Time (Minutes) <span class="text-danger">*</span></label>
                    <input type="number" name="read_time" class="form-control" value="{{ old('read_time', 5) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold small">Publication Date</label>
                    <input type="date" name="published_at" class="form-control" value="{{ old('published_at', date('Y-m-d')) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold small">Featured Banner Image</label>
                    <input type="file" name="featured_image" class="form-control form-control-sm" accept="image/*">
                </div>

                <div class="form-check form-switch mt-2">
                    <input class="form-check-input" type="checkbox" name="is_published" id="isPublished" checked>
                    <label class="form-check-label fw-semibold small" for="isPublished">Publish Immediately</label>
                </div>
            </div>

            <!-- SEO Settings -->
            <div class="card card-custom p-4">
                <h5 class="h6 fw-bold border-bottom pb-2 mb-3">SEO Meta Tags</h5>

                <div class="mb-3">
                    <label class="form-label fw-semibold small">SEO Meta Title</label>
                    <input type="text" name="meta_title" class="form-control" placeholder="Custom SEO Title" value="{{ old('meta_title') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold small">SEO Meta Description</label>
                    <textarea name="meta_description" class="form-control" rows="3" placeholder="Google snippet summary...">{{ old('meta_description') }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold small">SEO Meta Keywords</label>
                    <textarea name="meta_keywords" class="form-control" rows="2" placeholder="keywords...">{{ old('meta_keywords') }}</textarea>
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-hok-admin px-4 py-2">
                    <i class="bi bi-send me-1"></i> Publish
                </button>
            </div>
        </div>
    </div>
</form>
@endsection

@push('scripts')
<script>
function toggleBlogAiPanel() {
    const box = document.getElementById('blogAiCustomBox');
    const btnText = document.getElementById('toggleAiBtnText');
    if (!box) return;
    if (box.style.display === 'none' || box.style.display === '') {
        box.style.display = 'block';
        if (btnText) btnText.textContent = 'Hide Options';
        const input = document.getElementById('blogAiPrompt');
        if (input) input.focus();
    } else {
        box.style.display = 'none';
        if (btnText) btnText.textContent = 'Custom Prompt';
    }
}

function setBlogAiPreset(text) {
    const box = document.getElementById('blogAiCustomBox');
    if (box && (box.style.display === 'none' || box.style.display === '')) {
        box.style.display = 'block';
        const btnText = document.getElementById('toggleAiBtnText');
        if (btnText) btnText.textContent = 'Hide Options';
    }
    const input = document.getElementById('blogAiPrompt');
    if (input) {
        input.value = text;
        input.focus();
    }
}

async function generateBlogContentWithAi(target = 'all') {
    const titleInput = document.querySelector('input[name="title"]');
    const title = titleInput ? titleInput.value.trim() : '';
    const alertBox = document.getElementById('aiBlogAlert');
    const alertTitle = document.getElementById('aiBlogAlertTitle');
    const alertMsg = document.getElementById('aiBlogAlertMsg');
    const alertIcon = document.getElementById('aiBlogAlertIcon');

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
        showAlert('warning', 'Blog Title Required', 'Please enter a Blog Title first before generating with AI.');
        if (titleInput) {
            titleInput.focus();
            titleInput.classList.add('is-invalid');
            setTimeout(() => titleInput.classList.remove('is-invalid'), 3000);
        }
        return;
    }

    const categoryInput = document.querySelector('input[name="category_tag"]');
    const categoryTag = categoryInput ? categoryInput.value.trim() : '';
    const customPromptInput = document.getElementById('blogAiPrompt');
    const customPrompt = customPromptInput ? customPromptInput.value.trim() : '';

    // Elements for different targets
    const btnAll = document.getElementById('btnGenerateBlogAi');
    const btnAllText = document.getElementById('btnGenerateBlogAiText');
    const spinnerAll = document.getElementById('btnGenerateBlogAiSpinner');

    const btnExcerpt = document.getElementById('btnAiWriteExcerpt');
    const textExcerpt = document.getElementById('textAiWriteExcerpt');
    const iconExcerpt = document.getElementById('iconAiWriteExcerpt');

    const btnContent = document.getElementById('btnAiWriteContent');
    const textContent = document.getElementById('textAiWriteContent');
    const iconContent = document.getElementById('iconAiWriteContent');

    // Set loading state according to target
    if (target === 'excerpt') {
        if (btnExcerpt) btnExcerpt.disabled = true;
        if (textExcerpt) textExcerpt.textContent = 'Writing...';
        if (iconExcerpt) iconExcerpt.className = 'spinner-border spinner-border-sm me-1';
    } else if (target === 'content') {
        if (btnContent) btnContent.disabled = true;
        if (textContent) textContent.textContent = 'Generating Content...';
        if (iconContent) iconContent.className = 'spinner-border spinner-border-sm me-1';
    } else {
        if (btnAll) btnAll.disabled = true;
        if (btnAllText) btnAllText.textContent = 'Generating All Content...';
        if (spinnerAll) spinnerAll.classList.remove('d-none');
    }

    try {
        const csrfToken = document.querySelector('meta[name="csrf-token"]') 
            ? document.querySelector('meta[name="csrf-token"]').content 
            : '{{ csrf_token() }}';

        const response = await fetch('{{ route('admin.blogs.ai-generate') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                title: title,
                category_tag: categoryTag,
                custom_prompt: customPrompt,
                target: target
            })
        });

        const res = await response.json();

        if (res.success && res.data) {
            const data = res.data;

            if (target === 'excerpt') {
                // ONLY UPDATE EXCERPT
                const excerptEl = document.querySelector('textarea[name="excerpt"]');
                if (excerptEl && data.excerpt) {
                    excerptEl.value = data.excerpt;
                    excerptEl.classList.add('border-primary');
                    setTimeout(() => excerptEl.classList.remove('border-primary'), 2500);
                    excerptEl.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    excerptEl.focus();
                }
                showAlert('success', 'Summary Generated Successfully!', 'Short summary and excerpt have been populated.');

            } else if (target === 'content') {
                // ONLY UPDATE FULL BLOG CONTENT
                const fullContent = data.content || '';
                const joditInstance = (window.joditInstances && window.joditInstances['blog_content_editor'])
                    ? window.joditInstances['blog_content_editor']
                    : (document.getElementById('blog_content_editor') ? document.getElementById('blog_content_editor').__jodit : null);

                if (joditInstance && typeof joditInstance.value !== 'undefined') {
                    joditInstance.value = fullContent;
                }
                const contentEl = document.getElementById('blog_content_editor');
                if (contentEl) {
                    contentEl.value = fullContent;
                }
                showAlert('success', 'Content Generated Successfully!', 'Complete structured blog content has been populated.');

            } else {
                // UPDATE ALL FIELDS
                const excerptEl = document.querySelector('textarea[name="excerpt"]');
                if (excerptEl && data.excerpt) {
                    excerptEl.value = data.excerpt;
                }

                const fullContent = data.content || '';
                const joditInstance = (window.joditInstances && window.joditInstances['blog_content_editor'])
                    ? window.joditInstances['blog_content_editor']
                    : (document.getElementById('blog_content_editor') ? document.getElementById('blog_content_editor').__jodit : null);

                if (joditInstance && typeof joditInstance.value !== 'undefined') {
                    joditInstance.value = fullContent;
                }
                const contentEl = document.getElementById('blog_content_editor');
                if (contentEl) {
                    contentEl.value = fullContent;
                }

                const catEl = document.querySelector('input[name="category_tag"]');
                if (catEl && (!catEl.value || catEl.value.trim() === '' || catEl.value === 'Aesthetic Medicine')) {
                    catEl.value = data.category_tag || 'Aesthetic Medicine';
                }

                const readTimeEl = document.querySelector('input[name="read_time"]');
                if (readTimeEl && data.read_time) {
                    readTimeEl.value = data.read_time;
                }

                const metaTitleEl = document.querySelector('input[name="meta_title"]');
                if (metaTitleEl && (!metaTitleEl.value || metaTitleEl.value.trim() === '')) {
                    metaTitleEl.value = data.meta_title || '';
                }

                const metaDescEl = document.querySelector('textarea[name="meta_description"]');
                if (metaDescEl && (!metaDescEl.value || metaDescEl.value.trim() === '')) {
                    metaDescEl.value = data.meta_description || '';
                }

                const metaKeywordsEl = document.querySelector('textarea[name="meta_keywords"]');
                if (metaKeywordsEl && (!metaKeywordsEl.value || metaKeywordsEl.value.trim() === '')) {
                    metaKeywordsEl.value = data.meta_keywords || '';
                }

                showAlert('success', 'Blog Content Generated Successfully!', 'Summary, complete blog content, category tags, and SEO meta have been populated.');

                if (excerptEl) {
                    excerptEl.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
            }
        } else {
            showAlert('danger', 'Generation Failed', res.message || 'Could not generate content. Please try again.');
        }
    } catch (err) {
        console.error('AI Generation Error:', err);
        showAlert('danger', 'Request Error', 'Network or server error while generating content. Please check console.');
    } finally {
        if (target === 'excerpt') {
            if (btnExcerpt) btnExcerpt.disabled = false;
            if (textExcerpt) textExcerpt.textContent = 'AI Write';
            if (iconExcerpt) iconExcerpt.className = 'bi bi-stars me-1';
        } else if (target === 'content') {
            if (btnContent) btnContent.disabled = false;
            if (textContent) textContent.textContent = 'Auto-Generate Article with AI';
            if (iconContent) iconContent.className = 'bi bi-stars me-1';
        } else {
            if (btnAll) btnAll.disabled = false;
            if (btnAllText) btnAllText.textContent = 'Auto-Generate with AI';
            if (spinnerAll) spinnerAll.classList.add('d-none');
        }
    }
}
</script>
@endpush

