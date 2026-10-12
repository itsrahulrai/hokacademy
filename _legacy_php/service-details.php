<?php

$title       = "Advanced Injectables Training | HOK Academy";
$keywords    = "Advanced Injectables, Advanced Injectables course, Advanced Injectables training, injectables training for doctors, facial aesthetics training, HOK Academy, International Academy of Medical Excellence, medical courses India";
$description = "Specialist-led learning in injectable techniques, anatomy and patient safety. Advanced Injectables training for doctors at HOK Academy.";
$canonical   = "https://hokacademy.com/advanced-injectables.php";

/* ---------- CONTACT DETAILS (yahan real details daalo) ---------- */
$programName = "Advanced Injectables";
$phone       = "+91 99101 69317";
$phoneLink   = "+919910169317";                 // tel: ke liye, bina space
$whatsapp    = "9199101 69317";                  // country code ke saath, bina + ya space
$email       = "hokacademy@yahoo.com";
$address     = "Your academy address, City, India";
$hours       = "Mon - Sat, 10:00 AM - 6:00 PM";
$mailTo      = $email;                          // enquiry yahan aayegi
$thisPage    = "advanced-injectables.php";

/* ---------- FORM HANDLER ---------- */
session_start();
if (empty($_SESSION['csrf'])) $_SESSION['csrf'] = bin2hex(random_bytes(16));

function e($s)
{
    return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8');
}

$roles  = [
    'Doctor / Medical Professional',
    'PMU / Aesthetic Professional',
    'Nursing / OT / Paramedical',
    'Aesthetic / Laser Technician',
    'International Doctor',
    'Other'
];
$old    = ['name' => '', 'phone' => '', 'email' => '', 'role' => '', 'message' => ''];
$errors = [];
$failed = false;
$sent   = isset($_GET['sent']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($old as $k => $_) $old[$k] = trim((string)($_POST[$k] ?? ''));

    if (!hash_equals($_SESSION['csrf'], (string)($_POST['csrf'] ?? ''))) {
        $failed = true;                                   // token mismatch
    } elseif (!empty($_POST['website'])) {
        header("Location: $thisPage?sent=1#enquiry");
        exit;   // honeypot: bot ko chup-chaap success
    } else {
        if (mb_strlen($old['name']) < 2)                          $errors['name']  = 'Please enter your name.';
        if (!preg_match('/^[0-9+\-\s()]{7,20}$/', $old['phone']))  $errors['phone'] = 'Please enter a valid phone number.';
        if (!filter_var($old['email'], FILTER_VALIDATE_EMAIL))    $errors['email'] = 'Please enter a valid email.';
        if (!in_array($old['role'], $roles, true))                $errors['role']  = 'Please select your profession.';
        if (mb_strlen($old['message']) > 1500)                    $errors['message'] = 'Message is too long.';

        if (!$errors) {
            $safeName  = preg_replace('/[\r\n]+/', ' ', $old['name']);   // header injection se bachav
            $safeEmail = preg_replace('/[\r\n]+/', '', $old['email']);
            $body = "Program: $programName\nName: $safeName\nPhone: {$old['phone']}\nEmail: $safeEmail\n"
                . "Profession: {$old['role']}\n\nMessage:\n{$old['message']}\n";
            $headers = "From: HOK Academy <no-reply@hokacademy.com>\r\nReply-To: $safeName <$safeEmail>\r\n"
                . "Content-Type: text/plain; charset=UTF-8";

            if (@mail($mailTo, "New enquiry: $programName", $body, $headers)) {
                $_SESSION['csrf'] = bin2hex(random_bytes(16));
                header("Location: $thisPage?sent=1#enquiry");
                exit;     // refresh par dobara submit nahi hoga
            }
            $failed = true;
        }
    }
}

ob_start();
?>


<main id="main">

    <!-- ============ HERO START ============ -->
    <section class="sd-hero c-navy">
        <div class="container">
            <nav aria-label="Breadcrumb">
                <ol class="sd-crumbs">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="programs.php">Programs</a></li>
                    <li><a href="programs.php">Doctors</a></li>
                    <li aria-current="page">Advanced Injectables</li>
                </ol>
            </nav>

            <span class="sd-cat"><i class="bi bi-person-badge"></i> Doctors &amp; Medical Professionals</span>
            <h1>Advanced Injectables</h1>
            <p class="sd-hero-text">Specialist-led learning in injectable techniques, anatomy and patient safety.</p>

            <div class="btn-row">
                <a href="contact-us.php" class="btn btn-light btn-lg">Enquire Now</a>
                <a href="programs.php" class="btn btn-ghost btn-lg">All Programs</a>
            </div>
        </div>
    </section>
    <!-- ============ HERO END ============ -->


    <!-- ============ BODY START ============ -->
    <section class="sec sec-white">
        <div class="container">
            <div class="sd-layout">

                <!-- Main column -->
                <div class="sd-main c-navy">

                    <div class="sd-photo">
                        <img src="assets/img/programs/injectables.webp" width="1000" height="560"
                            alt="Advanced Injectables" fetchpriority="high" onerror="this.remove()">
                        <i class="bi bi-person-badge sd-photo-fb"></i>
                    </div>

                    <h2 class="sd-h">Overview</h2>
                    <p class="sd-p">Focused education on injectable practice, with strong emphasis on anatomy, product understanding and safe technique.</p>
                    <p class="sd-p">Our approach connects scientific foundations with clinical reasoning, specialist demonstrations and practical learning, so that you understand not just the procedure, but also the patient selection, safety and decision-making behind it.</p>

                    <h2 class="sd-h">What You Will Learn</h2>
                    <ul class="sd-learn">
                        <li><i class="bi bi-check2-circle"></i><span>Relevant facial anatomy</span></li>
                        <li><i class="bi bi-check2-circle"></i><span>Product knowledge and selection</span></li>
                        <li><i class="bi bi-check2-circle"></i><span>Injection techniques</span></li>
                        <li><i class="bi bi-check2-circle"></i><span>Patient selection and consent</span></li>
                        <li><i class="bi bi-check2-circle"></i><span>Managing adverse events</span></li>
                    </ul>

                    <h2 class="sd-h">How You Will Learn</h2>
                    <p class="sd-p">Depending on the program, learning may include:</p>
                    <ul class="chips sd-chips">
                        <li>Specialist-Led Lectures</li>
                        <li>Demonstrations</li>
                        <li>Case Discussions</li>
                        <li>Workshops</li>
                        <li>Supervised Practical Learning</li>
                    </ul>

                    <div class="sd-safety">
                        <span class="sd-safety-ico"><i class="bi bi-shield-check"></i></span>
                        <div>
                            <h3>A Culture of Safety</h3>
                            <p>Responsible clinical education begins with safety: patient assessment, informed consent, infection prevention, responsible technology use and complication awareness.</p>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <aside class="sd-side c-navy" aria-label="Program snapshot">
                    <div class="sd-box">

                        <div class="sd-box-head">
                            <span class="wt-ico"><i class="bi bi-clipboard2-pulse"></i></span>
                            <h3>Program Snapshot<small>Advanced Injectables</small></h3>
                        </div>

                        <div class="sd-box-body">
                            <ul class="sd-snap">
                                <li><i class="bi bi-grid"></i>
                                    <div><small>Category</small><span>Doctors &amp; Medical Professionals</span></div>
                                </li>
                                <li><i class="bi bi-person-check"></i>
                                    <div><small>Suitable for</small><span>Doctors and medical professionals</span></div>
                                </li>
                                <li><i class="bi bi-easel"></i>
                                    <div><small>Learning format</small><span>Lectures, demonstrations &amp; practical components</span></div>
                                </li>
                                <li><i class="bi bi-calendar-event"></i>
                                    <div><small>Duration &amp; batches</small><span>Shared on enquiry</span></div>
                                </li>
                                <li><i class="bi bi-globe-asia-australia"></i>
                                    <div><small>International</small><span>International doctors welcome</span></div>
                                </li>
                            </ul>

                            <a href="#enquiry" class="btn btn-hok btn-lg w-100">Enquire About This Program</a>

                            <p class="sd-quick-title">Or reach us directly</p>
                            <div class="sd-quick">
                                <a href="tel:<?= e($phoneLink) ?>"><i class="bi bi-telephone"></i><span><?= e($phone) ?></span></a>
                                <a href="https://wa.me/<?= e($whatsapp) ?>?text=<?= rawurlencode('Hello, I would like to know more about ' . $programName) ?>"
                                    class="is-wa" target="_blank" rel="noopener"><i class="bi bi-whatsapp"></i><span>WhatsApp us</span></a>
                                <a href="mailto:<?= e($email) ?>"><i class="bi bi-envelope"></i><span><?= e($email) ?></span></a>
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
                <h2 class="sec-title">Enquire About <?= e($programName) ?></h2>
                <p class="sec-text">Share your details and our team will get back to you with batch dates, eligibility and program information.</p>
            </div>

            <div class="enq-grid">

                <!-- Form -->
                <div class="enq-form-card">
                    <h3>Send Us Your Enquiry</h3>
                    <p class="enq-lead">Fields marked <em class="text-danger fst-normal">*</em> are required.</p>

                    <?php if ($sent): ?>
                        <div class="enq-alert ok" role="status"><i class="bi bi-check-circle-fill"></i>
                            <span>Thank you! Your enquiry has been received. Our team will contact you soon.</span>
                        </div>
                    <?php elseif ($failed): ?>
                        <div class="enq-alert bad" role="alert"><i class="bi bi-exclamation-triangle-fill"></i>
                            <span>Sorry, we could not send your enquiry. Please try again or call us on <?= e($phone) ?>.</span>
                        </div>
                    <?php endif; ?>

                    <form method="post" action="<?= e($thisPage) ?>#enquiry" novalidate>
                        <input type="hidden" name="csrf" value="<?= e($_SESSION['csrf']) ?>">
                        <!-- honeypot -->
                        <div class="enq-hp" aria-hidden="true">
                            <label>Website <input type="text" name="website" tabindex="-1" autocomplete="off"></label>
                        </div>

                        <div class="enq-fields">

                            <div class="enq-field <?= isset($errors['name']) ? 'has-error' : '' ?>">
                                <label for="enqName">Full name <em>*</em></label>
                                <input type="text" id="enqName" name="name" value="<?= e($old['name']) ?>"
                                    autocomplete="name" required>
                                <?php if (isset($errors['name'])): ?><span class="enq-err"><?= e($errors['name']) ?></span><?php endif; ?>
                            </div>

                            <div class="enq-field <?= isset($errors['phone']) ? 'has-error' : '' ?>">
                                <label for="enqPhone">Phone / WhatsApp <em>*</em></label>
                                <input type="tel" id="enqPhone" name="phone" value="<?= e($old['phone']) ?>"
                                    autocomplete="tel" inputmode="tel" required>
                                <?php if (isset($errors['phone'])): ?><span class="enq-err"><?= e($errors['phone']) ?></span><?php endif; ?>
                            </div>

                            <div class="enq-field <?= isset($errors['email']) ? 'has-error' : '' ?>">
                                <label for="enqEmail">Email <em>*</em></label>
                                <input type="email" id="enqEmail" name="email" value="<?= e($old['email']) ?>"
                                    autocomplete="email" required>
                                <?php if (isset($errors['email'])): ?><span class="enq-err"><?= e($errors['email']) ?></span><?php endif; ?>
                            </div>

                            <div class="enq-field <?= isset($errors['role']) ? 'has-error' : '' ?>">
                                <label for="enqRole">I am a <em>*</em></label>
                                <select id="enqRole" name="role" required>
                                    <option value="">Select profession</option>
                                    <?php foreach ($roles as $r): ?>
                                        <option value="<?= e($r) ?>" <?= $old['role'] === $r ? 'selected' : '' ?>><?= e($r) ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php if (isset($errors['role'])): ?><span class="enq-err"><?= e($errors['role']) ?></span><?php endif; ?>
                            </div>

                            <div class="enq-field enq-full <?= isset($errors['message']) ? 'has-error' : '' ?>">
                                <label for="enqMsg">Message</label>
                                <textarea id="enqMsg" name="message" maxlength="1500"
                                    placeholder="Tell us about your background or any questions"><?= e($old['message']) ?></textarea>
                                <?php if (isset($errors['message'])): ?><span class="enq-err"><?= e($errors['message']) ?></span><?php endif; ?>
                            </div>

                            <div class="enq-field enq-full">
                                <div class="enq-submit">
                                    <button type="submit" class="btn btn-hok btn-lg">Submit Enquiry</button>
                                    <small>We use your details only to respond to this enquiry.</small>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>

                <!-- Contact info -->
                <div class="enq-info">
                    <h3>Talk to Our Team</h3>
                    <p>Prefer to speak directly? Reach out and we will help you choose the right program for your professional journey.</p>
                    <ul>
                        <li><i class="bi bi-telephone"></i>
                            <div><small>Call us</small><a href="tel:<?= e($phoneLink) ?>"><?= e($phone) ?></a></div>
                        </li>
                        <li><i class="bi bi-whatsapp"></i>
                            <div><small>WhatsApp</small><a href="https://wa.me/<?= e($whatsapp) ?>" target="_blank" rel="noopener">Chat with us</a></div>
                        </li>
                        <li><i class="bi bi-envelope"></i>
                            <div><small>Email</small><a href="mailto:<?= e($email) ?>"><?= e($email) ?></a></div>
                        </li>
                        <li><i class="bi bi-geo-alt"></i>
                            <div><small>Address</small><strong><?= e($address) ?></strong></div>
                        </li>
                        <li><i class="bi bi-clock"></i>
                            <div><small>Working hours</small><strong><?= e($hours) ?></strong></div>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </section>
    <!-- ============ ENQUIRY END ============ -->


    <!-- ============ RELATED START ============ -->
    <section class="sec sec-tint">
        <div class="container">
            <div class="sec-head-center">
                <p class="eyebrow">Keep exploring</p>
                <h2 class="sec-title">More for Doctors</h2>
            </div>

            <div class="sv-grid">

                <article class="sv-card c-navy">
                    <div class="sv-img">
                        <img src="assets/img/programs/aesthetic.webp" width="640" height="400" loading="lazy"
                            alt="Aesthetic &amp; Cosmetic Medicine" onerror="this.remove()">
                        <i class="bi bi-person-badge sv-fallback"></i>
                        <span class="sv-tag">Doctors</span>
                    </div>
                    <div class="sv-body">
                        <span class="sv-chip"><i class="bi bi-person-badge"></i></span>
                        <h4>Aesthetic &amp; Cosmetic Medicine</h4>
                        <p>Facial aesthetics, skin rejuvenation and structured aesthetic treatment planning.</p>
                        <div class="sv-foot">
                            <a href="service-details.php" class="sv-btn"
                                aria-label="Read more about Aesthetic and Cosmetic Medicine">
                                <span>Read more</span><i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </article>

                <article class="sv-card c-navy">
                    <div class="sv-img">
                        <img src="assets/img/programs/laser.webp" width="640" height="400" loading="lazy"
                            alt="Laser &amp; Energy-Based Medicine" onerror="this.remove()">
                        <i class="bi bi-person-badge sv-fallback"></i>
                        <span class="sv-tag">Doctors</span>
                    </div>
                    <div class="sv-body">
                        <span class="sv-chip"><i class="bi bi-person-badge"></i></span>
                        <h4>Laser &amp; Energy-Based Medicine</h4>
                        <p>Laser technologies, device parameters, safety and clinical applications.</p>
                        <div class="sv-foot">
                            <a href="service-details.php" class="sv-btn"
                                aria-label="Read more about Laser and Energy-Based Medicine">
                                <span>Read more</span><i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </article>

                <article class="sv-card c-navy">
                    <div class="sv-img">
                        <img src="assets/img/programs/hair.webp" width="640" height="400" loading="lazy"
                            alt="Hair Restoration &amp; Transplantation" onerror="this.remove()">
                        <i class="bi bi-person-badge sv-fallback"></i>
                        <span class="sv-tag">Doctors</span>
                    </div>
                    <div class="sv-body">
                        <span class="sv-chip"><i class="bi bi-person-badge"></i></span>
                        <h4>Hair Restoration &amp; Transplantation</h4>
                        <p>Hair-loss assessment, graft management and transplantation principles.</p>
                        <div class="sv-foot">
                            <a href="service-details.php" class="sv-btn"
                                aria-label="Read more about Hair Restoration and Transplantation">
                                <span>Read more</span><i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </article>

            </div>
        </div>
    </section>
    <!-- ============ RELATED END ============ -->




</main>


<?php
$content = ob_get_clean();
include_once  'layout.php';
?>