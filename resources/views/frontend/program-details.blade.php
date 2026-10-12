@extends('layouts.app')

@php
    $catTone = $program->category->tone_class ?? 'c-navy';
    $catIcon = $program->icon ?? ($program->category->icon ?? 'bi-clipboard2-pulse');
    $sitePhone = \App\Models\Setting::get('contact_phone', '+91 99101 69317');
    $sitePhoneRaw = \App\Models\Setting::get('contact_phone_raw', '+919910169317');
    $siteWhatsapp = \App\Models\Setting::get('contact_whatsapp', '919910169317');
    $siteEmail = \App\Models\Setting::get('contact_email', 'hokacademy@yahoo.com');
    $siteAddress = \App\Models\Setting::get('contact_address', 'Your full academy address, City, State, India');
    $siteHours = \App\Models\Setting::get('office_hours', 'Monday to Saturday, 10:00 AM to 6:00 PM (IST)');
@endphp

@section('content')
<main id="main">

    <!-- ============ HERO START ============ -->
    <section class="sd-hero {{ $catTone }}">
        <div class="container">
            <nav aria-label="Breadcrumb">
                <ol class="sd-crumbs">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('programs.index') }}">Programs</a></li>
                    @if($program->category)
                        <li><a href="{{ route('programs.index', ['category' => $program->category->slug]) }}">{{ $program->category->short_name ?? $program->category->name }}</a></li>
                    @endif
                    <li aria-current="page">{{ $program->title }}</li>
                </ol>
            </nav>

            <span class="sd-cat"><i class="bi {{ $catIcon }}"></i> {{ $program->category->name ?? 'Specialist Training' }}</span>
            <h1>{{ $program->title }}</h1>
            <p class="sd-hero-text">{{ $program->short_description }}</p>

            <div class="btn-row">
                <a href="#enquiry" class="btn btn-light btn-lg">Enquire Now</a>
                <a href="https://wa.me/{{ $siteWhatsapp }}?text={{ rawurlencode('Hello, I am interested in the ' . $program->title . ' program at HOK Academy.') }}"
                   class="btn btn-ghost btn-lg" target="_blank" rel="noopener">
                    <i class="bi bi-whatsapp me-2 text-success"></i> WhatsApp Us
                </a>
                <a href="{{ route('programs.index') }}" class="btn btn-ghost btn-lg">All Programs</a>
            </div>
        </div>
    </section>
    <!-- ============ HERO END ============ -->


    <!-- ============ BODY START ============ -->
    <section class="sec sec-white">
        <div class="container">
            <div class="sd-layout">

                <!-- Main column -->
                <div class="sd-main {{ $catTone }}">

                    <!-- Cover Photo -->
                    <div class="sd-photo">
                        <img src="{{ $program->image_url }}" width="1000" height="560"
                            alt="{{ $program->title }}" fetchpriority="high" onerror="this.remove()">
                        <i class="bi {{ $catIcon }} sd-photo-fb"></i>
                    </div>

                    <!-- Overview -->
                    <h2 class="sd-h">Overview</h2>
                    @if(!empty($program->full_description))
                        <div class="program-rich-content sd-p mb-4">
                            {!! $program->full_description !!}
                        </div>
                    @else
                        <p class="sd-p">{{ $program->short_description }}</p>
                    @endif
                    <p class="sd-p">Our approach connects rigorous scientific foundations with practical clinical reasoning, live specialist demonstrations, and hands-on skill development. You learn not just the procedural technique, but also patient assessment, tissue anatomy, safety margins, and ethical decision-making.</p>

                    <!-- What You Will Learn -->
                    <h2 class="sd-h">What You Will Learn</h2>
                    <ul class="sd-learn">
                        @if(!empty($program->highlights) && is_array($program->highlights))
                            @foreach($program->highlights as $highlight)
                                <li>
                                    <i class="bi bi-check2-circle"></i>
                                    <span>{{ $highlight }}</span>
                                </li>
                            @endforeach
                        @else
                            <li><i class="bi bi-check2-circle"></i><span>Applied clinical anatomy and danger zone recognition</span></li>
                            <li><i class="bi bi-check2-circle"></i><span>Instrumentation, device parameters and product selection</span></li>
                            <li><i class="bi bi-check2-circle"></i><span>Hands-on procedural technique and precision handling</span></li>
                            <li><i class="bi bi-check2-circle"></i><span>Patient assessment, selection and informed consent</span></li>
                            <li><i class="bi bi-check2-circle"></i><span>Complication prevention, emergency reversal and management</span></li>
                        @endif
                    </ul>

                    <!-- Curriculum & Modules (if present) -->
                    @if(!empty($program->curriculum))
                        <h2 class="sd-h">Curriculum &amp; Course Structure</h2>
                        @if(is_array($program->curriculum))
                            <ul class="sd-learn">
                                @foreach($program->curriculum as $mod)
                                    <li>
                                        <i class="bi bi-journal-medical"></i>
                                        <span>{{ $mod }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="sd-p">{{ $program->curriculum }}</p>
                        @endif
                    @endif

                    <!-- How You Will Learn -->
                    <h2 class="sd-h">How You Will Learn</h2>
                    <p class="sd-p">Depending on your professional background and clinical goals, training at HOK Academy combines:</p>
                    <ul class="chips sd-chips">
                        <li>Specialist-Led Academic Lectures</li>
                        <li>Live Clinical Demonstrations</li>
                        <li>Case-Based Interactive Discussions</li>
                        <li>Hands-On Procedural Workshops</li>
                        <li>Supervised Practical Learning</li>
                        <li>Complication Protocols &amp; Safety Drills</li>
                    </ul>

                    <!-- Certification Callout (if present) -->
                    @if(!empty($program->certification))
                        <div class="sd-cert-box">
                            <div class="sd-cert-ico"><i class="bi bi-award-fill"></i></div>
                            <div>
                                <h3>Certification &amp; Fellowship</h3>
                                <p>{{ $program->certification }}</p>
                            </div>
                        </div>
                    @endif

                    <!-- Safety Box -->
                    <div class="sd-safety">
                        <span class="sd-safety-ico"><i class="bi bi-shield-check"></i></span>
                        <div>
                            <h3>A Culture of Clinical Safety</h3>
                            <p>Responsible clinical education begins with safety: thorough patient assessment, informed consent, sterile technique, responsible technology adoption and immediate complication management.</p>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Snapshot -->
                <aside class="sd-side {{ $catTone }}" aria-label="Program snapshot">
                    <div class="sd-box">

                        <div class="sd-box-head">
                            <span class="wt-ico"><i class="bi {{ $catIcon }}"></i></span>
                            <h3>Program Snapshot<small>{{ $program->title }}</small></h3>
                        </div>

                        <div class="sd-box-body">
                            <ul class="sd-snap">
                                <li>
                                    <i class="bi bi-grid"></i>
                                    <div>
                                        <small>Category</small>
                                        <span>{{ $program->category->name ?? 'Specialist Training' }}</span>
                                    </div>
                                </li>
                                <li>
                                    <i class="bi bi-person-check"></i>
                                    <div>
                                        <small>Suitable for</small>
                                        <span>{{ $program->eligibility ?? 'Doctors, specialists and medical professionals' }}</span>
                                    </div>
                                </li>
                                <li>
                                    <i class="bi bi-easel"></i>
                                    <div>
                                        <small>Learning format</small>
                                        <span>Lectures, demonstrations &amp; hands-on practicals</span>
                                    </div>
                                </li>
                                <li>
                                    <i class="bi bi-calendar-event"></i>
                                    <div>
                                        <small>Duration &amp; schedule</small>
                                        <span>{{ $program->duration ?? 'Modular / Workshop Format' }}</span>
                                    </div>
                                </li>
                                @if(!empty($program->certification))
                                <li>
                                    <i class="bi bi-patch-check"></i>
                                    <div>
                                        <small>Certification</small>
                                        <span>{{ $program->certification }}</span>
                                    </div>
                                </li>
                                @endif
                                <li>
                                    <i class="bi bi-globe-asia-australia"></i>
                                    <div>
                                        <small>International</small>
                                        <span>International doctors &amp; learners welcome</span>
                                    </div>
                                </li>
                            </ul>

                            <a href="#enquiry" class="btn btn-hok btn-lg w-100 mb-3">Enquire About This Program</a>

                            <p class="sd-quick-title">Or speak with an advisor</p>
                            <div class="sd-quick">
                                <a href="tel:{{ $sitePhoneRaw }}">
                                    <i class="bi bi-telephone-fill"></i>
                                    <span>{{ $sitePhone }}</span>
                                </a>
                                <a href="https://wa.me/{{ $siteWhatsapp }}?text={{ rawurlencode('Hello, I would like to know more about ' . $program->title . ' at HOK Academy.') }}"
                                    class="is-wa" target="_blank" rel="noopener">
                                    <i class="bi bi-whatsapp"></i>
                                    <span>WhatsApp us</span>
                                </a>
                                <a href="mailto:{{ $siteEmail }}">
                                    <i class="bi bi-envelope-fill"></i>
                                    <span>{{ $siteEmail }}</span>
                                </a>
                            </div>
                        </div>

                    </div>
                </aside>

            </div>
        </div>
    </section>
    <!-- ============ BODY END ============ -->


    <!-- ============ ENQUIRY START ============ -->
    <section id="enquiry" class="sec enq">
        <div class="container">

            <div class="sec-head-center">
                <p class="eyebrow">Enquire now</p>
                <h2 class="sec-title">Enquire About {{ $program->title }}</h2>
                <p class="sec-text">Share your details and our team will get back to you with upcoming batch dates, eligibility criteria and detailed curriculum.</p>
            </div>

            @if(session('success'))
                <div class="enq-alert ok" role="status">
                    <i class="bi bi-check-circle-fill"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if($errors->any())
                <div class="enq-alert bad" role="alert">
                    <i class="bi bi-exclamation-triangle-fill"></i>
                    <span>Please correct the highlighted errors in the form below.</span>
                </div>
            @endif

            <div class="enq-grid">

                <!-- Form Card -->
                <div class="enq-form-card">
                    <h3>Send Us Your Enquiry</h3>
                    <p class="enq-lead">Fields marked <em class="text-danger fst-normal">*</em> are required.</p>

                    <form method="POST" action="{{ route('contact.submit') }}" class="enq-form" novalidate>
                        @csrf
                        <input type="hidden" name="program_name" value="{{ $program->title }}">

                        <!-- Honeypot -->
                        <div class="enq-hp" aria-hidden="true" style="display:none !important;">
                            <label>Website <input type="text" name="website" tabindex="-1" autocomplete="off"></label>
                        </div>

                        <div class="enq-fields">

                            <div class="enq-field @error('name') has-error @enderror">
                                <label for="enqName">Full name <em>*</em></label>
                                <input type="text" id="enqName" name="name" value="{{ old('name') }}"
                                    autocomplete="name" required placeholder="Dr. / Mr. / Ms. Full Name">
                                @error('name')<span class="enq-err">{{ $message }}</span>@enderror
                            </div>

                            <div class="enq-field @error('phone') has-error @enderror">
                                <label for="enqPhone">Phone / WhatsApp <em>*</em></label>
                                <input type="tel" id="enqPhone" name="phone" value="{{ old('phone') }}"
                                    autocomplete="tel" inputmode="tel" required placeholder="+91 99101 69317">
                                @error('phone')<span class="enq-err">{{ $message }}</span>@enderror
                            </div>

                            <div class="enq-field @error('email') has-error @enderror">
                                <label for="enqEmail">Email address <em>*</em></label>
                                <input type="email" id="enqEmail" name="email" value="{{ old('email') }}"
                                    autocomplete="email" required placeholder="doctor@example.com">
                                @error('email')<span class="enq-err">{{ $message }}</span>@enderror
                            </div>

                            <div class="enq-field @error('role') has-error @enderror">
                                <label for="enqRole">I am a <em>*</em></label>
                                <select id="enqRole" name="role" required>
                                    <option value="" disabled {{ old('role') ? '' : 'selected' }}>Select your profession...</option>
                                    <option value="Doctor / Medical Professional" {{ old('role') == 'Doctor / Medical Professional' ? 'selected' : '' }}>Doctor / Medical Professional</option>
                                    <option value="PMU / Aesthetic Professional" {{ old('role') == 'PMU / Aesthetic Professional' ? 'selected' : '' }}>PMU / Aesthetic Professional</option>
                                    <option value="Nursing, OT / Paramedical" {{ old('role') == 'Nursing, OT / Paramedical' ? 'selected' : '' }}>Nursing, OT / Paramedical</option>
                                    <option value="Aesthetic / Laser Technician" {{ old('role') == 'Aesthetic / Laser Technician' ? 'selected' : '' }}>Aesthetic / Laser Technician</option>
                                    <option value="International Doctor" {{ old('role') == 'International Doctor' ? 'selected' : '' }}>International Doctor</option>
                                    <option value="Institution / Academic Partner" {{ old('role') == 'Institution / Academic Partner' ? 'selected' : '' }}>Institution / Academic Partner</option>
                                    <option value="Other" {{ old('role') == 'Other' ? 'selected' : '' }}>Other</option>
                                </select>
                                @error('role')<span class="enq-err">{{ $message }}</span>@enderror
                            </div>

                            <div class="enq-field enq-full @error('message') has-error @enderror">
                                <label for="enqMsg">Message / Specific Questions <em>*</em></label>
                                <textarea id="enqMsg" name="message" rows="4" maxlength="2000"
                                    placeholder="Tell us about your clinical experience, questions or preferred dates for {{ $program->title }}..." required>{{ old('message', 'I would like to enquire about upcoming batch dates and eligibility for ' . $program->title . '.') }}</textarea>
                                @error('message')<span class="enq-err">{{ $message }}</span>@enderror
                            </div>

                            <div class="enq-field enq-full">
                                <div class="enq-submit">
                                    <button type="submit" class="btn btn-hok btn-lg">
                                        Submit Enquiry <i class="bi bi-arrow-right ms-2"></i>
                                    </button>
                                    <small><i class="bi bi-shield-check me-1 text-success"></i> Your details are handled confidentially and used solely to respond to this academic enquiry.</small>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>

                <!-- Contact Info Card -->
                <div class="enq-info">
                    <h3>Talk to Our Academic Team</h3>
                    <p>Prefer to speak directly with an advisor? Reach out and we will help guide you to the right curriculum, batch dates and schedule.</p>
                    <ul>
                        <li>
                            <i class="bi bi-telephone-fill"></i>
                            <div>
                                <small>Call us directly</small>
                                <a href="tel:{{ $sitePhoneRaw }}">{{ $sitePhone }}</a>
                            </div>
                        </li>
                        <li>
                            <i class="bi bi-whatsapp"></i>
                            <div>
                                <small>WhatsApp enquiry</small>
                                <a href="https://wa.me/{{ $siteWhatsapp }}?text={{ rawurlencode('Hello, I would like to know more about ' . $program->title . ' at HOK Academy.') }}" target="_blank" rel="noopener">Chat with Academic Advisor</a>
                            </div>
                        </li>
                        <li>
                            <i class="bi bi-envelope-fill"></i>
                            <div>
                                <small>Email</small>
                                <a href="mailto:{{ $siteEmail }}">{{ $siteEmail }}</a>
                            </div>
                        </li>
                        <li>
                            <i class="bi bi-geo-alt-fill"></i>
                            <div>
                                <small>Campus Address</small>
                                <strong>{{ $siteAddress }}</strong>
                            </div>
                        </li>
                        <li>
                            <i class="bi bi-clock-fill"></i>
                            <div>
                                <small>Office Hours</small>
                                <strong>{{ $siteHours }}</strong>
                            </div>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </section>
    <!-- ============ ENQUIRY END ============ -->


    <!-- ============ RELATED PROGRAMS START ============ -->
    @if(isset($relatedPrograms) && $relatedPrograms->count() > 0)
    <section class="sec sec-tint">
        <div class="container">
            <div class="sec-head-center">
                <p class="eyebrow">Keep exploring</p>
                <h2 class="sec-title">More Programs in {{ $program->category->name ?? 'This Category' }}</h2>
            </div>

            <div class="sv-grid">
                @foreach($relatedPrograms as $rel)
                    @php
                        $relTone = $rel->category->tone_class ?? 'c-navy';
                        $relIcon = $rel->icon ?? ($rel->category->icon ?? 'bi-award');
                    @endphp
                    <article class="sv-card {{ $relTone }}">
                        <div class="sv-img">
                            <img src="{{ $rel->image_url }}" width="640" height="400" loading="lazy" alt="{{ $rel->title }}" onerror="this.remove()">
                            <i class="bi {{ $relIcon }} sv-fallback"></i>
                            <span class="sv-tag">{{ $rel->category->short_name ?? ($rel->category->name ?? 'Program') }}</span>
                        </div>
                        <div class="sv-body">
                            <span class="sv-chip"><i class="bi {{ $relIcon }}"></i></span>
                            <h4>{{ $rel->title }}</h4>
                            <p>{{ $rel->short_description }}</p>
                            <div class="sv-foot">
                                <a href="{{ route('programs.show', $rel->slug) }}" class="sv-btn" aria-label="Read more about {{ $rel->title }}">
                                    <span>Read more</span>
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
    @endif
    <!-- ============ RELATED PROGRAMS END ============ -->

</main>
@endsection

@push('styles')
<style>
/* Responsive enhancements for enquiry form across all devices */
.enq-form-card {
    border-radius: 1.15rem;
    box-shadow: 0 10px 30px rgba(7, 29, 58, 0.06);
}

.enq-info {
    border-radius: 1.15rem;
    box-shadow: 0 10px 30px rgba(7, 29, 58, 0.12);
}

.enq-fields .enq-field input,
.enq-fields .enq-field select,
.enq-fields .enq-field textarea {
    border-radius: 0.75rem;
    font-size: 0.95rem;
}

@media (max-width: 575.98px) {
    .enq-fields {
        grid-template-columns: 1fr !important;
        gap: 0.85rem;
    }
    
    .enq-submit {
        flex-direction: column;
        align-items: stretch;
    }
    
    .enq-submit .btn {
        width: 100%;
        text-align: center;
        justify-content: center;
    }
    
    .enq-submit small {
        text-align: center;
        margin-top: 0.4rem;
    }
    
    .sd-hero h1 {
        font-size: 1.85rem;
    }
    
    .sd-hero .btn-row {
        flex-direction: column;
        width: 100%;
    }
    
    .sd-hero .btn-row .btn {
        width: 100%;
        text-align: center;
    }
}
</style>
@endpush
