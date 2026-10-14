@extends('layouts.app')

@section('content')
<main id="main">

    <!-- ============ CONTACT HERO START ============ -->
    <section class="ct-hero" aria-labelledby="ctTitle">
        <div class="container">
            <nav aria-label="Breadcrumb">
                <ol class="ct-crumb">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li aria-current="page">Contact</li>
                </ol>
            </nav>
            <h1 id="ctTitle" class="ct-hero-title">Talk to HOK Academy</h1>
            <p class="ct-hero-sub">Questions about a program, an international visit or an academic partnership?
                Send us your enquiry and our team will reply with the right next step.</p>
            <div class="btn-row">
                <a href="#enquiry" class="btn btn-light btn-lg">Send an Enquiry</a>
                <a href="tel:+919910169317" class="btn btn-ghost btn-lg">Call Us</a>
            </div>
        </div>
    </section>
    <!-- ============ CONTACT HERO END ============ -->


    <!-- ============ CONTACT DETAILS + FORM START ============ -->
    <section id="enquiry" class="sec sec-white">
        <div class="container">



            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i> Please correct the errors in the form below.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="ct-grid">

                <!-- Left: contact details -->
                <div class="ct-side">
                    <p class="eyebrow">Get in touch</p>
                    <h2 class="sec-title">We Reply to Every Enquiry</h2>
                    <p class="sec-text">Tell us who you are and what you want to learn. We will guide you to the
                        right program, schedule or faculty member.</p>

                    <div class="ct-tiles">
                        <a class="ct-tile c-blue" href="tel:+919910169317">
                            <span class="wt-ico"><i class="bi bi-telephone"></i></span>
                            <span class="ct-tile-txt"><small>Call</small><strong>+91 99101 69317</strong></span>
                        </a>
                        <a class="ct-tile c-teal" href="https://wa.me/919910169317" target="_blank"
                            rel="noopener">
                            <span class="wt-ico"><i class="bi bi-whatsapp"></i></span>
                            <span class="ct-tile-txt"><small>WhatsApp</small><strong>+91 99101 69317</strong></span>
                        </a>
                        <a class="ct-tile c-navy" href="mailto:hokacademy@yahoo.com">
                            <span class="wt-ico"><i class="bi bi-envelope"></i></span>
                            <span class="ct-tile-txt"><small>Email</small><strong>hokacademy@yahoo.com</strong></span>
                        </a>
                        <div class="ct-tile c-red">
                            <span class="wt-ico"><i class="bi bi-geo-alt"></i></span>
                            <span class="ct-tile-txt"><small>Visit</small><strong>Your full address, City,
                                    State, India</strong></span>
                        </div>
                    </div>

                    <div class="ct-hours">
                        <i class="bi bi-clock"></i>
                        <p><strong>Office hours</strong><br>Monday to Saturday, 10:00 AM to 6:00 PM (IST)</p>
                    </div>
                </div>

                <!-- Right: enquiry form -->
                <div class="ct-form-card">
                    <h3 class="ct-form-title">Enquiry Form</h3>
                    <p class="ct-form-sub">Fields marked <span class="ct-req">*</span> are required.</p>

                    <form class="ct-form" action="{{ route('contact.submit') }}" method="post" novalidate>
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="ctName" class="form-label">Full name <span
                                        class="ct-req">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="ctName" name="name"
                                    value="{{ old('name') }}" autocomplete="name" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="ctEmail" class="form-label">Email <span
                                        class="ct-req">*</span></label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="ctEmail" name="email"
                                    value="{{ old('email') }}" autocomplete="email" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="ctPhone" class="form-label">Phone / WhatsApp <span
                                        class="ct-req">*</span></label>
                                <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="ctPhone" name="phone"
                                    value="{{ old('phone') }}" autocomplete="tel" required>
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="ctCountry" class="form-label">Country</label>
                                <input type="text" class="form-control @error('country') is-invalid @enderror" id="ctCountry" name="country"
                                    value="{{ old('country') }}" autocomplete="country-name">
                            </div>
                            <div class="col-md-6">
                                <label for="ctRole" class="form-label">I am a <span
                                        class="ct-req">*</span></label>
                                <select class="form-select @error('role') is-invalid @enderror" id="ctRole" name="role" required>
                                    <option value="" {{ old('role') ? '' : 'selected' }} disabled>Select your profile</option>
                                    <option {{ old('role') == 'Doctor / Medical Professional' ? 'selected' : '' }}>Doctor / Medical Professional</option>
                                    <option {{ old('role') == 'PMU / Aesthetic Professional' ? 'selected' : '' }}>PMU / Aesthetic Professional</option>
                                    <option {{ old('role') == 'Nursing, OT / Paramedical' ? 'selected' : '' }}>Nursing, OT / Paramedical</option>
                                    <option {{ old('role') == 'Aesthetic / Laser Technician' ? 'selected' : '' }}>Aesthetic / Laser Technician</option>
                                    <option {{ old('role') == 'Institution / Academic Partner' ? 'selected' : '' }}>Institution / Academic Partner</option>
                                    <option {{ old('role') == 'Other' ? 'selected' : '' }}>Other</option>
                                </select>
                                @error('role')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="ctInterest" class="form-label">Area of interest</label>
                                <select class="form-select" id="ctInterest" name="interest">
                                    <option value="" {{ old('interest') ? '' : 'selected' }}>Select an area</option>
                                    <option {{ old('interest') == 'Aesthetic & Cosmetic Medicine' ? 'selected' : '' }}>Aesthetic &amp; Cosmetic Medicine</option>
                                    <option {{ old('interest') == 'Injectables & Facial Aesthetics' ? 'selected' : '' }}>Injectables &amp; Facial Aesthetics</option>
                                    <option {{ old('interest') == 'Laser & Energy-Based Medicine' ? 'selected' : '' }}>Laser &amp; Energy-Based Medicine</option>
                                    <option {{ old('interest') == 'Hair Restoration' ? 'selected' : '' }}>Hair Restoration</option>
                                    <option {{ old('interest') == 'Medical Nutrition & Weight Management' ? 'selected' : '' }}>Medical Nutrition &amp; Weight Management</option>
                                    <option {{ old('interest') == 'Cosmetic & Surgical Gynaecology' ? 'selected' : '' }}>Cosmetic &amp; Surgical Gynaecology</option>
                                    <option {{ old('interest') == 'Urology & Endourology' ? 'selected' : '' }}>Urology &amp; Endourology</option>
                                    <option {{ old('interest') == 'General Surgery' ? 'selected' : '' }}>General Surgery</option>
                                    <option {{ old('interest') == 'Oral & Maxillofacial Surgery' ? 'selected' : '' }}>Oral &amp; Maxillofacial Surgery</option>
                                    <option {{ old('interest') == 'PMU & Medical Camouflage' ? 'selected' : '' }}>PMU &amp; Medical Camouflage</option>
                                    <option {{ old('interest') == 'Nursing, OT & Paramedical' ? 'selected' : '' }}>Nursing, OT &amp; Paramedical</option>
                                    <option {{ old('interest') == 'International Program' ? 'selected' : '' }}>International Program</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="ctMsg" class="form-label">Your message <span
                                        class="ct-req">*</span></label>
                                <textarea class="form-control @error('message') is-invalid @enderror" id="ctMsg" name="message" rows="5"
                                    placeholder="Tell us about your experience and what you would like to learn."
                                    required>{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Honeypot (spam trap): keep hidden -->
                            <div class="ct-hp" aria-hidden="true" style="display:none !important;">
                                <label for="ctWeb">Leave this field empty</label>
                                <input type="text" id="ctWeb" name="website" tabindex="-1" autocomplete="off">
                            </div>

                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="ctConsent"
                                        name="consent" value="1" required checked>
                                    <label class="form-check-label" for="ctConsent">I agree to be contacted by HOK
                                        Academy about my enquiry. <span class="ct-req">*</span></label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-hok btn-lg">Send Enquiry</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- ============ CONTACT DETAILS + FORM END ============ -->


    <!-- ============ INTERNATIONAL ENQUIRY START ============ -->
    <section id="international-enquiry" class="sec sec-tint">
        <div class="container">

            <div class="ct-intl">
                <div class="gl-panel">
                    <i class="bi bi-globe-asia-australia gl-panel-ico"></i>
                    <h3>Enquiring from outside India?</h3>
                    <p>International doctors and healthcare professionals are welcome. Mention your country and
                        the area you want to learn, and we will share program details for international
                        participants.</p>
                </div>
                <div class="ct-intl-body">
                    <h3 class="sub-title">What to include in your message</h3>
                    <ul class="chips">
                        <li>Your country</li>
                        <li>Your profession and speciality</li>
                        <li>Area of learning</li>
                        <li>Preferred duration</li>
                        <li>Questions about the program</li>
                    </ul>
                    <div class="btn-row">
                        <a href="{{ route('international') }}" class="btn btn-hok">International Programs</a>
                        <a href="{{ route('international') }}" class="btn btn-line">Partner with HOK Academy</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ============ INTERNATIONAL ENQUIRY END ============ -->


    <!-- ============ FAQ START ============ -->
    <section id="faq" class="sec sec-white">
        <div class="container">

            <div class="sec-head-center">
                <p class="eyebrow">Before you write</p>
                <h2 class="sec-title">Common Questions</h2>
            </div>

            <div class="accordion ct-faq" id="ctFaq">
                <div class="accordion-item">
                    <h3 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#faq1" aria-expanded="true" aria-controls="faq1">Who can enquire
                            about HOK Academy programs?</button>
                    </h3>
                    <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#ctFaq">
                        <div class="accordion-body">Doctors and medical professionals, PMU and aesthetic
                            professionals, nursing, OT and paramedical staff, aesthetic and laser technicians, and
                            institutions interested in academic collaboration.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h3 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#faq2" aria-expanded="false" aria-controls="faq2">How do I choose the
                            right program?</button>
                    </h3>
                    <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#ctFaq">
                        <div class="accordion-body">Select your profile and area of interest in the enquiry form.
                            Our team will suggest programs that match your background and goals.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h3 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#faq3" aria-expanded="false" aria-controls="faq3">Do you accept
                            international doctors?</button>
                    </h3>
                    <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#ctFaq">
                        <div class="accordion-body">Yes. Learning opportunities for international participants
                            depend on the individual program. Share your country and area of interest and we will
                            send the relevant details.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h3 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#faq4" aria-expanded="false" aria-controls="faq4">How soon will I get
                            a reply?</button>
                    </h3>
                    <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#ctFaq">
                        <div class="accordion-body">We reply during office hours. For a faster response, message
                            us on WhatsApp.</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ============ FAQ END ============ -->


    <!-- ============ MAP + CLOSING START ============ -->
    <section id="visit" class="sec sec-tint ct-visit-sec">
        <div class="container">

            <div class="ct-map">
                <!-- Google Maps embed link -->
                <iframe src="" title="HOK Academy location map" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade" allowfullscreen></iframe>
                <div class="ct-map-fb"><i class="bi bi-geo-alt"></i><span>Map will appear here</span></div>
            </div>

            <div class="cta-row">
                <div>
                    <h3>One Academy. Many Specialist Perspectives.</h3>
                    <p>Explore our programs or meet the faculty before you enquire.</p>
                </div>
                <div class="btn-row">
                    <a href="{{ route('programs.index') }}" class="btn btn-hok btn-lg">Explore Programs</a>
                    <a href="{{ route('faculty.index') }}" class="btn btn-line btn-lg">Meet Our Faculty</a>
                </div>
            </div>
        </div>
    </section>
    <!-- ============ MAP + CLOSING END ============ -->

</main>
@endsection
