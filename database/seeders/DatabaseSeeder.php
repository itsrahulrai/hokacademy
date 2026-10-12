<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Setting;
use App\Models\Page;
use App\Models\PageSection;
use App\Models\HeroSlide;
use App\Models\ProgramCategory;
use App\Models\Program;
use App\Models\FacultyMember;
use App\Models\Blog;
use App\Models\WhyFeature;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Admin User
        User::updateOrCreate(
            ['email' => 'admin@hokacademy.com'],
            [
                'name' => 'HOK Admin',
                'password' => Hash::make('admin123'),
                'email_verified_at' => now(),
            ]
        );

        // 2. Settings
        $settings = [
            // General
            ['site_title', 'HOK Academy | International Academy of Medical Excellence', 'general', 'text', 'Site Title'],
            ['site_tagline', 'International Academy of Medical Excellence', 'general', 'text', 'Site Tagline'],
            ['site_logo', 'assets/img/logo.jpg', 'general', 'image', 'Site Logo'],
            ['site_favicon', 'assets/img/logo.jpg', 'general', 'image', 'Favicon'],
            ['hero_motto', 'Advancing Medical Knowledge. Transforming Clinical Practice. Connecting Expertise Across Borders.', 'general', 'textarea', 'Academy Motto'],

            // Contact
            ['contact_phone', '+91 99101 69317', 'contact', 'text', 'Phone Number'],
            ['contact_phone_raw', '+919910169317', 'contact', 'text', 'Raw Phone (tel: link)'],
            ['contact_whatsapp', '919910169317', 'contact', 'text', 'WhatsApp Number'],
            ['contact_email', 'hokacademy@yahoo.com', 'contact', 'text', 'Email Address'],
            ['contact_address', 'Your academy address, City, State, India', 'contact', 'textarea', 'Office / Academy Address'],
            ['office_hours', 'Monday to Saturday, 10:00 AM to 6:00 PM (IST)', 'contact', 'text', 'Office Hours'],
            ['google_maps_embed', '', 'contact', 'textarea', 'Google Maps Embed Iframe URL'],

            // Header & Footer
            ['topbar_badge_text', 'International Enquiries', 'header_footer', 'text', 'Topbar Badge Text'],
            ['topbar_badge_link', '/contact-us', 'header_footer', 'text', 'Topbar Badge Link'],
            ['header_cta_text', 'Enquire Now', 'header_footer', 'text', 'Header Button Text'],
            ['header_cta_link', '/contact-us', 'header_footer', 'text', 'Header Button Link'],
            ['footer_about_text', 'Specialist expertise, modern technology and practical clinical learning together under one multidisciplinary platform.', 'header_footer', 'textarea', 'Footer About Text'],
            ['footer_copyright', '© 2026 HOK Academy. All rights reserved.', 'header_footer', 'text', 'Footer Copyright'],
            ['custom_head_scripts', '', 'header_footer', 'code', 'Custom <head> Scripts (Analytics / Meta Tags)'],
            ['custom_footer_scripts', '', 'header_footer', 'code', 'Custom Footer Scripts'],

            // Social Media
            ['social_facebook', 'https://facebook.com', 'social', 'text', 'Facebook URL'],
            ['social_instagram', 'https://instagram.com', 'social', 'text', 'Instagram URL'],
            ['social_linkedin', 'https://linkedin.com', 'social', 'text', 'LinkedIn URL'],
            ['social_youtube', 'https://youtube.com', 'social', 'text', 'YouTube URL'],
            ['social_twitter', 'https://twitter.com', 'social', 'text', 'Twitter / X URL'],
        ];

        foreach ($settings as [$key, $value, $group, $type, $label]) {
            Setting::set($key, $value, $group, $type, $label);
        }

        // 3. Pages and SEO
        $pages = [
            [
                'slug' => 'home',
                'title' => 'Home',
                'header_title' => 'Advancing Medical Knowledge. Transforming Clinical Practice.',
                'header_subtitle' => 'HOK Academy brings specialist expertise, modern technology and practical clinical learning together under one multidisciplinary platform.',
                'meta_title' => 'HOK Academy | International Academy of Medical Excellence',
                'meta_description' => 'HOK Academy is an international academy for advanced medical education, clinical training and professional development across aesthetic medicine, injectables, laser, hair restoration, surgery, gynaecology, urology and more.',
                'meta_keywords' => 'HOK Academy, International Academy of Medical Excellence, medical education, medical training, clinical training, aesthetic medicine, aesthetic medicine courses, injectables training, laser training, hair restoration, surgery training, gynaecology training, urology training, cosmetic medicine, medical courses India, international medical courses',
                'canonical_url' => 'https://hokacademy.com/',
            ],
            [
                'slug' => 'about-us',
                'title' => 'About Us',
                'header_title' => 'International Academy of Medical Excellence',
                'header_subtitle' => 'Advancing Medical Knowledge. Transforming Clinical Practice. Connecting Expertise Across Borders.',
                'meta_title' => 'About HOK Academy | International Academy of Medical Excellence',
                'meta_description' => 'Learn about HOK Academy, an international academy providing advanced medical education, clinical training and professional development for doctors, surgeons and healthcare professionals.',
                'meta_keywords' => 'About HOK Academy, HOK Academy, International Academy of Medical Excellence, medical academy India, international medical education, medical training, clinical education, healthcare professional development, aesthetic medicine training, medical courses India',
                'canonical_url' => 'https://hokacademy.com/about-us',
            ],
            [
                'slug' => 'vision-mission',
                'title' => 'Our Vision & Mission',
                'header_title' => 'Vision & Mission',
                'header_subtitle' => 'Advancing Medical Knowledge. Transforming Clinical Practice. Connecting Expertise Across Borders.',
                'meta_title' => 'Vision & Mission | HOK Academy | International Medical Excellence',
                'meta_description' => 'Discover HOK Academy\'s vision and mission to advance medical education, strengthen clinical skills and connect healthcare professionals through high-quality international medical training.',
                'meta_keywords' => 'HOK Academy Vision and Mission, HOK Academy, medical education vision, medical academy mission, international medical education, clinical training, medical training India, healthcare professional development, medical excellence',
                'canonical_url' => 'https://hokacademy.com/vision-mission',
            ],
            [
                'slug' => 'why-hok',
                'title' => 'Why HOK Academy',
                'header_title' => 'Why HOK Academy',
                'header_subtitle' => 'Advancing Medical Knowledge. Transforming Clinical Practice. Connecting Expertise Across Borders.',
                'meta_title' => 'Why HOK Academy | International Medical Excellence',
                'meta_description' => 'Discover why HOK Academy is a trusted platform for advanced medical education, clinical training, professional development and international healthcare learning.',
                'meta_keywords' => 'Why HOK Academy, HOK Academy, medical education, international medical training, clinical training, healthcare professional development, medical excellence, medical courses India, healthcare education',
                'canonical_url' => 'https://hokacademy.com/why-hok',
            ],
            [
                'slug' => 'learning-philosophy',
                'title' => 'Learning Philosophy',
                'header_title' => 'Learning Philosophy',
                'header_subtitle' => 'Advancing Medical Knowledge. Transforming Clinical Practice. Connecting Expertise Across Borders.',
                'meta_title' => 'Learning Philosophy | HOK Academy | International Medical Excellence',
                'meta_description' => 'Learn about HOK Academy\'s 6 core learning principles: Scientific Foundations, Clinical Reasoning, Practical Learning, Case-Based Learning, Patient Safety, and Professional Development.',
                'meta_keywords' => 'Learning Philosophy, HOK Academy, medical education philosophy, clinical training principles, patient safety, case based learning, medical excellence',
                'canonical_url' => 'https://hokacademy.com/learning-philosophy',
            ],
            [
                'slug' => 'our-multidisciplinary',
                'title' => 'Our Multidisciplinary Model',
                'header_title' => 'Our Multidisciplinary Model',
                'header_subtitle' => 'Advancing Medical Knowledge. Transforming Clinical Practice. Connecting Expertise Across Borders.',
                'meta_title' => 'Our Multidisciplinary Model | HOK Academy',
                'meta_description' => 'Explore HOK Academy\'s multidisciplinary model, bringing together doctors, surgeons and healthcare specialists from diverse clinical fields for comprehensive medical education and training.',
                'meta_keywords' => 'HOK Academy multidisciplinary model, multidisciplinary medical education, medical education, clinical training, healthcare professionals, international medical training, medical excellence, healthcare education, medical courses India',
                'canonical_url' => 'https://hokacademy.com/our-multidisciplinary',
            ],
            [
                'slug' => 'programs',
                'title' => 'Programs & Courses',
                'header_title' => 'Medical Training & Courses',
                'header_subtitle' => 'Find the program that fits your profession across doctors, PMU, nursing and laser technicians.',
                'meta_title' => 'Medical Training & Courses | HOK Academy',
                'meta_description' => 'Explore HOK Academy\'s medical training programs and professional courses in aesthetic and cosmetic medicine, injectables, laser and energy-based medicine, hair restoration, nutrition and weight management, gynaecology, urology, surgery, maxillofacial, PMU, nursing, OT, paramedical and laser technology.',
                'meta_keywords' => 'HOK Academy services, medical training courses, aesthetic medicine training, cosmetic medicine training, injectables training, laser and energy-based medicine, hair restoration training, hair transplant training, nutrition and weight management, gynaecology training, urology training, surgery training, maxillofacial training, PMU training, nursing training, OT and paramedical training, laser technology training, medical courses India, clinical training programs, healthcare professional training',
                'canonical_url' => 'https://hokacademy.com/programs',
            ],
            [
                'slug' => 'faculty',
                'title' => 'Our Faculty',
                'header_title' => 'Our Faculty',
                'header_subtitle' => 'Different Specialists. Different Perspectives. One Academic Vision.',
                'meta_title' => 'Our Faculty | HOK Academy | International Academy of Medical Excellence',
                'meta_description' => 'Meet the multidisciplinary faculty of HOK Academy: practising doctors, surgeons and healthcare specialists who teach what they practise.',
                'meta_keywords' => 'HOK Academy faculty, medical faculty India, aesthetic medicine faculty, laser specialists, hair restoration surgeons, urology faculty, gynaecology faculty, specialist-led medical education',
                'canonical_url' => 'https://hokacademy.com/faculty',
            ],
            [
                'slug' => 'international',
                'title' => 'International Programs',
                'header_title' => 'International Academy of Medical Excellence',
                'header_subtitle' => 'Advancing Medical Knowledge. Transforming Clinical Practice. Connecting Expertise Across Borders.',
                'meta_title' => 'International HOK Academy | International Academy of Medical Excellence',
                'meta_description' => 'Specialized clinical learning and international medical programs in India for doctors and medical professionals from around the world.',
                'meta_keywords' => 'International HOK Academy, international doctors training India, clinical fellowship India, aesthetic training India, global medical education',
                'canonical_url' => 'https://hokacademy.com/international',
            ],
            [
                'slug' => 'blog',
                'title' => 'Medical Blog & Articles',
                'header_title' => 'HOK Academy Blog',
                'header_subtitle' => 'Insights, clinical perspectives and updates on medical education and clinical practice.',
                'meta_title' => 'Medical Blog & Articles | HOK Academy',
                'meta_description' => 'Explore clinical articles, guidance on aesthetic training pathways, patient safety, laser technologies, and continuous learning from HOK Academy specialists.',
                'meta_keywords' => 'medical blog, aesthetic medicine blog, clinical articles, patient safety, laser training guide, medical education insights',
                'canonical_url' => 'https://hokacademy.com/blog',
            ],
            [
                'slug' => 'contact-us',
                'title' => 'Contact Us',
                'header_title' => 'Talk to HOK Academy',
                'header_subtitle' => 'Questions about a program, an international visit or an academic partnership? Send us your enquiry and our team will reply with the right next step.',
                'meta_title' => 'Contact HOK Academy | International Academy of Medical Excellence',
                'meta_description' => 'Get in touch with HOK Academy for program enquiries, international doctor programs, academic collaboration and partnerships.',
                'meta_keywords' => 'contact HOK Academy, HOK Academy enquiry, medical training enquiry, international doctors enquiry, aesthetic medicine courses India, medical academy contact',
                'canonical_url' => 'https://hokacademy.com/contact-us',
            ],
        ];

        foreach ($pages as $p) {
            Page::updateOrCreate(['slug' => $p['slug']], $p);
        }

        // 4. Hero Slides
        $slides = [
            [
                'category_badge' => 'International Academy of Medical Excellence',
                'title' => 'Advancing Medical Knowledge. Transforming Clinical Practice.',
                'description' => 'HOK Academy brings specialist expertise, modern technology and practical clinical learning together under one multidisciplinary platform.',
                'image' => 'assets/img/slide-01.jpg',
                'button_text' => 'About HOK',
                'button_link' => '/about-us',
                'accent_color' => 'var(--navy)',
                'sort_order' => 1,
            ],
            [
                'category_badge' => 'Learn from Specialists',
                'title' => 'Expertise That Goes Beyond One Speciality.',
                'description' => 'A multidisciplinary faculty of doctors, surgeons and healthcare specialists bringing diverse clinical perspectives together.',
                'image' => 'assets/img/slide-02.jpg',
                'button_text' => 'Meet Our Faculty',
                'button_link' => '/faculty',
                'accent_color' => 'var(--teal)',
                'sort_order' => 2,
            ],
            [
                'category_badge' => 'Comprehensive Curriculum',
                'title' => 'From Foundations to Advanced Clinical Practice.',
                'description' => 'Scientific understanding, clinical decision-making, procedural training and patient safety in every program.',
                'image' => 'assets/img/slide-03.jpg',
                'button_text' => 'Explore Programs',
                'button_link' => '/programs',
                'accent_color' => 'var(--blue)',
                'sort_order' => 3,
            ],
            [
                'category_badge' => 'Modern Infrastructure',
                'title' => 'Practical Learning in a Contemporary Clinical Setting.',
                'description' => 'Modern procedure rooms, advanced technologies and structured environments designed for meaningful learning.',
                'image' => 'assets/img/slide-04.jpg',
                'button_text' => 'Why HOK Academy',
                'button_link' => '/why-hok',
                'accent_color' => 'var(--red)',
                'sort_order' => 4,
            ],
            [
                'category_badge' => 'Global Community',
                'title' => 'Connecting Doctors and Specialists Worldwide.',
                'description' => 'Welcoming medical professionals from India and across borders to learn, connect and collaborate.',
                'image' => 'assets/img/slide-05.webp',
                'button_text' => 'International Enquiries',
                'button_link' => '/international',
                'accent_color' => 'var(--navy)',
                'sort_order' => 5,
            ],
        ];

        foreach ($slides as $s) {
            HeroSlide::updateOrCreate(
                ['title' => $s['title']],
                $s
            );
        }

        // 5. Program Categories
        $categories = [
            [
                'slug' => 'doctors',
                'name' => 'Doctors & Medical Professionals',
                'short_name' => 'Doctors',
                'tone_class' => 'c-navy',
                'icon' => 'bi-person-badge',
                'sort_order' => 1,
            ],
            [
                'slug' => 'pmu',
                'name' => 'PMU & Aesthetic Professionals',
                'short_name' => 'PMU & Aesthetic',
                'tone_class' => 'c-teal',
                'icon' => 'bi-palette',
                'sort_order' => 2,
            ],
            [
                'slug' => 'nursing',
                'name' => 'Nursing, OT & Paramedical',
                'short_name' => 'Nursing & OT',
                'tone_class' => 'c-blue',
                'icon' => 'bi-hospital',
                'sort_order' => 3,
            ],
            [
                'slug' => 'technicians',
                'name' => 'Aesthetic & Laser Technicians',
                'short_name' => 'Laser Technicians',
                'tone_class' => 'c-red',
                'icon' => 'bi-lightning-charge',
                'sort_order' => 4,
            ],
        ];

        $categoryMap = [];
        foreach ($categories as $cat) {
            $created = ProgramCategory::updateOrCreate(['slug' => $cat['slug']], $cat);
            $categoryMap[$cat['slug']] = $created->id;
        }

        // 6. Programs Data
        $programsData = [
            // Doctors
            [
                'category_id' => $categoryMap['doctors'],
                'title' => 'Aesthetic & Cosmetic Medicine',
                'slug' => 'aesthetic-cosmetic-medicine',
                'anchor' => 'aesthetic-medicine',
                'short_description' => 'Facial aesthetics, skin rejuvenation and structured aesthetic treatment planning.',
                'full_description' => 'Comprehensive masterclass covering facial anatomy, patient assessment, aging dynamics, non-surgical facial rejuvenation, chemical peels, and advanced clinical aesthetic protocols.',
                'image' => 'assets/img/expertise/aesthetic-medicine.webp',
                'icon' => 'bi-stars',
                'duration' => '3 - 5 Days Intensive / Modular',
                'eligibility' => 'MBBS, BDS, MD, MS, MCh or equivalent Medical Degree',
                'certification' => 'Certificate of Advanced Clinical Training in Aesthetic Medicine',
                'highlights' => ['Facial Anatomy & Assessment', 'Chemical Peels & Skin Rejuvenation', 'Complication Management Protocols', 'Live Patient Demonstrations'],
                'is_featured' => true,
                'sort_order' => 1,
            ],
            [
                'category_id' => $categoryMap['doctors'],
                'title' => 'Advanced Injectables',
                'slug' => 'advanced-injectables',
                'anchor' => 'injectables',
                'short_description' => 'Specialist-led learning in injectable techniques, anatomy and patient safety.',
                'full_description' => 'In-depth hands-on training on Botulinum Toxin Type A, Dermal Fillers (upper, mid, lower face), Biostimulators, Cannula techniques, vascular anatomy, danger zones, and emergency reversal protocols.',
                'image' => 'assets/img/expertise/injectables.webp',
                'icon' => 'bi-eyedropper',
                'duration' => '2 - 4 Days Hands-on Workshop',
                'eligibility' => 'Medical Doctors, Surgeons, Dermatologists, Maxillofacial Specialists',
                'certification' => 'Fellowship / Certificate in Advanced Injectables & Facial Contouring',
                'highlights' => ['Micro-Toxin & Full Face Injections', 'Dermal Fillers with Needle & Cannula', 'Lip Masterclass & Russian Lip Techniques', 'Hyaluronidase Emergency Management'],
                'is_featured' => true,
                'sort_order' => 2,
            ],
            [
                'category_id' => $categoryMap['doctors'],
                'title' => 'Laser & Energy-Based Medicine',
                'slug' => 'laser-energy-based-medicine',
                'anchor' => 'laser',
                'short_description' => 'Laser technologies, device parameters, safety and clinical applications.',
                'full_description' => 'Master physics, wavelengths, spot sizes, fluence, pulse duration, and laser-tissue interactions for hair reduction, pigmentation removal, vascular lesions, acne scar resurfacing, and skin tightening with HIFU and RF.',
                'image' => 'assets/img/expertise/laser.webp',
                'icon' => 'bi-lightning-charge',
                'duration' => '3 Days Comprehensive Course',
                'eligibility' => 'Registered Medical Practitioners & Dermatologists',
                'certification' => 'Certified Clinical Laser Practitioner (CCLP)',
                'highlights' => ['Q-Switched Nd:YAG, Fractional CO2 & Diode Lasers', 'IPL, HIFU, and Fractional Micro-Needling RF', 'Skin of Colour (Fitzpatrick IV-VI) Protocols', 'Laser Safety Officer (LSO) Compliance'],
                'is_featured' => true,
                'sort_order' => 3,
            ],
            [
                'category_id' => $categoryMap['doctors'],
                'title' => 'Hair Restoration & Transplantation',
                'slug' => 'hair-restoration-transplantation',
                'anchor' => 'hair-restoration',
                'short_description' => 'Hair-loss assessment, graft management and transplantation principles.',
                'full_description' => 'State-of-the-art training in FUE, FUT, Long Hair FUE, robotic assistance, graft harvesting, recipient site creation, hairline designing, PRP, GFC, and regenerative trichology.',
                'image' => 'assets/img/expertise/hair-restoration.webp',
                'icon' => 'bi-scissors',
                'duration' => '5 Days Surgical Immersion',
                'eligibility' => 'Surgeons, Dermatologists, Plastic Surgeons, ENT, Maxillofacial Surgeons',
                'certification' => 'Hands-on Fellowship in Modern Hair Transplantation & FUE',
                'highlights' => ['Motorized & Manual FUE Extraction', 'Natural Hairline Architecture', 'Graft Preservation & Holding Solutions', 'Managing Complications & Failed Transplants'],
                'is_featured' => true,
                'sort_order' => 4,
            ],
            [
                'category_id' => $categoryMap['doctors'],
                'title' => 'Medical Nutrition & Weight Management',
                'slug' => 'medical-nutrition-weight-management',
                'anchor' => 'medical-nutrition',
                'short_description' => 'Clinical nutrition, metabolic health and structured weight management.',
                'full_description' => 'Clinical evidence-based nutrition protocols, obesity pharmacotherapy, GLP-1 receptor agonists, metabolic syndrome correction, body composition assessment, and medical meal planning.',
                'image' => 'assets/img/expertise/medical-nutrition.webp',
                'icon' => 'bi-basket',
                'duration' => '2 Days Clinical Training',
                'eligibility' => 'Doctors, Nutritionists, Clinical Dieticians, Healthcare Providers',
                'certification' => 'Certificate in Clinical Nutrition & Metabolic Weight Management',
                'highlights' => ['Metabolic Syndrome & Insulin Resistance', 'Modern Anti-Obesity Pharmacotherapy', 'Gut Microbiome & Systemic Inflammation', 'Custom Diet Protocols for Clinical Practice'],
                'is_featured' => false,
                'sort_order' => 5,
            ],
            [
                'category_id' => $categoryMap['doctors'],
                'title' => 'Cosmetic & Surgical Gynaecology',
                'slug' => 'cosmetic-surgical-gynaecology',
                'anchor' => 'gynaecology',
                'short_description' => 'Cosmetic gynaecology, energy-based technologies and appropriate surgical procedures.',
                'full_description' => 'Surgical and non-surgical aesthetic gynaecology including Labiaplasty, Vaginoplasty, Hoodectomy, PRP rejuvenation (O-Shot), vaginal tightening lasers, and RF devices.',
                'image' => 'assets/img/expertise/gynaecology.webp',
                'icon' => 'bi-gender-female',
                'duration' => '3 Days Surgical Masterclass',
                'eligibility' => 'Gynaecologists, Plastic Surgeons, Urogynaecologists',
                'certification' => 'Diploma in Cosmetic & Functional Gynaecology',
                'highlights' => ['Surgical Labiaplasty & Perineoplasty', 'Laser & RF Vaginal Rejuvenation', 'Injectable Fillers & Regenerative Medicine in Gynae', 'Consent & Medicolegal Aspects'],
                'is_featured' => false,
                'sort_order' => 6,
            ],
            [
                'category_id' => $categoryMap['doctors'],
                'title' => 'Urology & Endourology',
                'slug' => 'urology-endourology',
                'anchor' => 'urology',
                'short_description' => 'Endoscopic urology, stone surgery and advanced urological techniques.',
                'full_description' => 'Endourological techniques, PCNL, Mini-PCNL, RIRS with flexible ureteroscopy, laser lithotripsy, TURP, bipolar enucleation, and reconstructive urology principles.',
                'image' => 'assets/img/expertise/urology.webp',
                'icon' => 'bi-clipboard2-pulse',
                'duration' => '4 Days Clinical Workshop',
                'eligibility' => 'General Surgeons, Urologists, Surgery Post-Graduates',
                'certification' => 'Advanced Certificate in Endourology & Laser Stone Surgery',
                'highlights' => ['RIRS & Flexible Ureteroscopy Instrumentation', 'Laser Settings for Stone Dusting & Fragmentation', 'Hands-on Simulation & Live Surgery Observation', 'Stent Placement & Complication Management'],
                'is_featured' => false,
                'sort_order' => 7,
            ],
            [
                'category_id' => $categoryMap['doctors'],
                'title' => 'General Surgery',
                'slug' => 'general-surgery',
                'anchor' => 'general-surgery',
                'short_description' => 'Operative principles, minimally invasive techniques and perioperative practice.',
                'full_description' => 'Advanced laparoscopic surgery, laparoscopic cholecystectomy, hernia repair (TAPP/TEP), proctology with laser (haemorrhoids, fistula, fissure), and acute surgical care.',
                'image' => 'assets/img/expertise/general-surgery.webp',
                'icon' => 'bi-bandaid',
                'duration' => '5 Days Hands-on Wet Lab & OT',
                'eligibility' => 'MS / DNB General Surgery, Surgical Residents',
                'certification' => 'Fellowship in Minimal Access & Laser Surgery',
                'highlights' => ['Laparoscopic Suturing & Knot Tying', 'Laser Proctology Essentials', 'Energy Devices & Harmonic Scalpels', 'Safe Dissection Protocols'],
                'is_featured' => false,
                'sort_order' => 8,
            ],
            [
                'category_id' => $categoryMap['doctors'],
                'title' => 'Oral & Maxillofacial Surgery',
                'slug' => 'oral-maxillofacial-surgery',
                'anchor' => 'maxillofacial',
                'short_description' => 'Specialist-led education in oral and maxillofacial surgical disciplines.',
                'full_description' => 'Facial trauma management, orthognathic surgery, zygomatic implants, TMJ arthroscopy, cyst and tumour resections, and aesthetic facial bone reshaping.',
                'image' => 'assets/img/expertise/maxillofacial.webp',
                'icon' => 'bi-emoji-smile',
                'duration' => '4 Days Specialist Program',
                'eligibility' => 'MDS Oral & Maxillofacial Surgery, ENT Surgeons, Plastic Surgeons',
                'certification' => 'Masterclass Certificate in Maxillofacial Reconstruction & Aesthetics',
                'highlights' => ['3D Virtual Surgical Planning', 'Complex Bone Grafting & Implants', 'Soft Tissue Facial Flaps', 'Managing Facial Asymmetry'],
                'is_featured' => false,
                'sort_order' => 9,
            ],

            // PMU & Aesthetic
            [
                'category_id' => $categoryMap['pmu'],
                'title' => 'Permanent Makeup (PMU)',
                'slug' => 'permanent-makeup',
                'anchor' => 'pmu',
                'short_description' => 'Foundations of permanent makeup, technique, hygiene and client care.',
                'full_description' => 'Microblading, Ombre Powder Brows, Lip Blush, Lash Line Enhancement, symmetry mapping, needle depth, machine configuration, and client consultation.',
                'image' => 'assets/img/expertise/pmu.webp',
                'icon' => 'bi-palette',
                'duration' => '5 Days Professional Course',
                'eligibility' => 'Aesthetic professionals, Cosmetologists, PMU artists, Beginners',
                'certification' => 'International Diploma in Professional PMU Artistry',
                'highlights' => ['Microblading & Microshading', 'Lip Blush & Neutralization', 'Eyeliner Techniques', 'Hygiene, Bloodborne Pathogen Standards'],
                'is_featured' => true,
                'sort_order' => 10,
            ],
            [
                'category_id' => $categoryMap['pmu'],
                'title' => 'Medical PMU',
                'slug' => 'medical-pmu',
                'anchor' => 'medical-pmu',
                'short_description' => 'Pigment work for medical and restorative needs with a safety-first approach.',
                'full_description' => 'Paramedical micropigmentation for post-surgical, post-mastectomy, alopecia, and vitiligo patients with high-precision skin matching.',
                'image' => 'assets/img/expertise/pmu.webp',
                'icon' => 'bi-palette',
                'duration' => '3 Days Intensive Training',
                'eligibility' => 'PMU Artists, Nurses, Medical Aestheticians',
                'certification' => 'Advanced Certificate in Medical Micropigmentation',
                'highlights' => ['Scalp Micropigmentation (SMP)', 'Trichology Alignment', 'Sterile Technique & Needle Selection', 'Realistic Texture Mimicking'],
                'is_featured' => false,
                'sort_order' => 11,
            ],
            [
                'category_id' => $categoryMap['pmu'],
                'title' => 'Medical Camouflage',
                'slug' => 'medical-camouflage',
                'anchor' => 'camouflage',
                'short_description' => 'Techniques to camouflage skin concerns with natural-looking results.',
                'full_description' => 'Paramedical skin camouflage using Brazilian stretch mark camouflage, hypopigmentation blending, and scar blending algorithms.',
                'image' => 'assets/img/expertise/pmu.jpg',
                'icon' => 'bi-palette',
                'duration' => '2 Days Workshop',
                'eligibility' => 'PMU Practitioners, Skin Specialists',
                'certification' => 'Certified Medical Skin Camouflage Specialist',
                'highlights' => ['Skin Undertone Matching & Contrast Theory', 'Custom Pigment Formulations', 'Healing & Long-Term Color Retention', 'Stretch Mark & Burn Restoration'],
                'is_featured' => false,
                'sort_order' => 12,
            ],
            [
                'category_id' => $categoryMap['pmu'],
                'title' => 'Scar Camouflage',
                'slug' => 'scar-camouflage',
                'anchor' => 'scar',
                'short_description' => 'Assessment and pigment methods used to reduce the visibility of scars.',
                'full_description' => 'Targeted camouflage of surgical scars, tummy tuck scars, facelift incisions, acne scars, and traumatic scars.',
                'image' => 'assets/img/expertise/pmu.webp',
                'icon' => 'bi-bandaid',
                'duration' => '2 Days Hands-on Workshop',
                'eligibility' => 'Aesthetic practitioners, PMU artists, Nurses',
                'certification' => 'Specialist Certificate in Scar Camouflage',
                'highlights' => ['Tissue Elasticity & Scar Maturity Evaluation', 'Needle Penetration in Fibrotic Tissue', 'Inkless Micro-Needling vs Camouflage', 'Client Case Studies'],
                'is_featured' => false,
                'sort_order' => 13,
            ],
            [
                'category_id' => $categoryMap['pmu'],
                'title' => 'Areola / Nipple Camouflage',
                'slug' => 'areola-nipple-camouflage',
                'anchor' => 'areola',
                'short_description' => 'Restorative pigmentation techniques with sensitivity and precision.',
                'full_description' => '3D Areola Complex Tattooing for breast cancer survivors post-reconstruction, nipple graft restoration, and gender confirmation surgery aesthetics.',
                'image' => 'assets/img/expertise/pmu.webp',
                'icon' => 'bi-heart',
                'duration' => '2 Days Specialized Masterclass',
                'eligibility' => 'Medical PMU Artists, Nurses, Medical Practitioners',
                'certification' => 'Master Artist in 3D Areola Restoration',
                'highlights' => ['3D Optical Illusion Shading & Highlighting', 'Areola Diameter & Placement Mapping', 'Working Over Graft & Radiated Skin', 'Emotional Care & Consultation Framework'],
                'is_featured' => false,
                'sort_order' => 14,
            ],
            [
                'category_id' => $categoryMap['pmu'],
                'title' => 'Pigment Science & Colour Theory',
                'slug' => 'pigment-science-colour-theory',
                'anchor' => 'pigment',
                'short_description' => 'Understand pigments, undertones and colour matching for skin.',
                'full_description' => 'Deep dive into organic vs inorganic pigments, CI numbers, iron oxides, carbon black, titanium dioxide, lightfastness, and skin melanin physics.',
                'image' => 'assets/img/expertise/pmu.jpg',
                'icon' => 'bi-droplet',
                'duration' => '1 Day Intensive Theory & Lab',
                'eligibility' => 'All PMU Artists, Microbladers, Tattoo Artists',
                'certification' => 'Certificate in Pigment Chemistry & Advanced Skin Colour Science',
                'highlights' => ['Fitzpatrick Skin Types & Melanin Undertones', 'Preventing Blue, Grey, Red & Orange Shifting', 'Pigment Particle Size & Migration', 'Corrections & Neutralizers'],
                'is_featured' => false,
                'sort_order' => 15,
            ],

            // Nursing, OT & Paramedical
            [
                'category_id' => $categoryMap['nursing'],
                'title' => 'Nursing & Clinical Care',
                'slug' => 'nursing-clinical-care',
                'anchor' => 'nursing',
                'short_description' => 'Patient care, procedural support and everyday clinical responsibilities.',
                'full_description' => 'Specialized nursing protocols for aesthetic medicine, day surgery units, laser safety, minor OT setups, medication administration, and patient monitoring.',
                'image' => 'assets/img/expertise/nursing.webp',
                'icon' => 'bi-hospital',
                'duration' => '3 Days Professional Program',
                'eligibility' => 'GNM, B.Sc Nursing, ANM, Paramedical Staff',
                'certification' => 'Certificate in Aesthetic & Surgical Nursing Practice',
                'highlights' => ['Pre & Post-Operative Patient Care', 'Sterile Field Maintenance', 'Emergency Trolley & Resuscitation Basics', 'Clinical Documentation & Consent Protocols'],
                'is_featured' => true,
                'sort_order' => 16,
            ],
            [
                'category_id' => $categoryMap['nursing'],
                'title' => 'OT Protocols & Management',
                'slug' => 'ot-protocols-management',
                'anchor' => 'ot',
                'short_description' => 'Operation theatre routines, discipline and safe working protocols.',
                'full_description' => 'Comprehensive operation theatre discipline, zoning, airflow control, scrub technique, patient positioning, and WHO Surgical Safety Checklist.',
                'image' => 'assets/img/expertise/nursing.webp',
                'icon' => 'bi-shield-check',
                'duration' => '3 Days OT Immersion',
                'eligibility' => 'OT Technicians, Nursing Staff, Paramedics',
                'certification' => 'Certificate in Modern OT Protocols & Surgical Safety',
                'highlights' => ['OT Zoning (Clean, Aseptic, Disposable)', 'Scrubbing, Gowning & Gloving Perfection', 'Electrosurgery & Diathermy Safety', 'Bio-Medical Waste Management in OT'],
                'is_featured' => false,
                'sort_order' => 17,
            ],
            [
                'category_id' => $categoryMap['nursing'],
                'title' => 'Surgical Assistance',
                'slug' => 'surgical-assistance',
                'anchor' => 'assist',
                'short_description' => 'Assisting the surgical team before, during and after procedures.',
                'full_description' => 'Role of the primary surgical scrub assistant, anticipating surgeon needs, tissue handling, suctioning, retraction, suture cutting, and sponge counts.',
                'image' => 'assets/img/expertise/nursing.webp',
                'icon' => 'bi-person-check',
                'duration' => '4 Days Hands-on Training',
                'eligibility' => 'OT Nurses, Junior Doctors, Surgical Assistants',
                'certification' => 'Certified Surgical Assistant (CSA)',
                'highlights' => ['Anticipating Procedural Steps', 'Hemostasis & Retraction Methods', 'Handling Delicate Microsurgical Instruments', 'Count Verification & Incident Prevention'],
                'is_featured' => false,
                'sort_order' => 18,
            ],
            [
                'category_id' => $categoryMap['nursing'],
                'title' => 'Surgical Instrumentation',
                'slug' => 'surgical-instrumentation',
                'anchor' => 'instruments',
                'short_description' => 'Handling, setup and management of surgical instruments.',
                'full_description' => 'Classification, assembly, testing, inspection, and maintenance of general surgery, laparoscopy, micro-instruments, and endoscopic sets.',
                'image' => 'assets/img/expertise/nursing.webp',
                'icon' => 'bi-tools',
                'duration' => '2 Days Workshop',
                'eligibility' => 'OT Staff, CSSD Staff, Paramedical Students',
                'certification' => 'Certificate in Surgical Instrumentation & Set Maintenance',
                'highlights' => ['Instrument Identification & Care', 'Laparoscopic Optics & Fiber-Optic Cables', 'Ultrasonic & Electrosurgical Handpieces', 'Preventing Corrosion & Instrument Damage'],
                'is_featured' => false,
                'sort_order' => 19,
            ],
            [
                'category_id' => $categoryMap['nursing'],
                'title' => 'Sterilisation & Infection Control',
                'slug' => 'sterilisation-infection-control',
                'anchor' => 'sterilisation',
                'short_description' => 'Sterilisation methods and infection-prevention practice.',
                'full_description' => 'Central Sterile Services Department (CSSD) workflows, Autoclave, ETO, Plasma Sterilization, chemical biological indicators, and hospital-acquired infection (HAI) prevention.',
                'image' => 'assets/img/expertise/nursing.webp',
                'icon' => 'bi-shield-shaded',
                'duration' => '2 Days Course',
                'eligibility' => 'Infection Control Nurses, CSSD Technicians, OT Managers',
                'certification' => 'CSSD & Infection Control Quality Specialist',
                'highlights' => ['Steam & Low-Temperature Sterilisation', 'Chemical & Biological Integrators', 'Packaging, Sealing & Shelf-Life Management', 'Disinfection of Heat-Sensitive Endoscopes'],
                'is_featured' => false,
                'sort_order' => 20,
            ],
            [
                'category_id' => $categoryMap['nursing'],
                'title' => 'Perioperative Care',
                'slug' => 'perioperative-care',
                'anchor' => 'periop',
                'short_description' => 'Patient preparation and care across the perioperative journey.',
                'full_description' => 'Comprehensive management of the patient across preoperative assessment, intraoperative monitoring, and postoperative recovery room (PACU) care.',
                'image' => 'assets/img/expertise/nursing.webp',
                'icon' => 'bi-heart-pulse',
                'duration' => '2 Days Clinical Training',
                'eligibility' => 'Recovery Nurses, Clinical Staff, Paramedical Practitioners',
                'certification' => 'Certificate in Perioperative & Post-Anesthesia Care',
                'highlights' => ['Airway Monitoring & Oxygen Therapy', 'Pain Management Protocols (VAS Score)', 'Identifying Early Warning Signs of Deterioration', 'Safe Discharge Readiness Criteria'],
                'is_featured' => false,
                'sort_order' => 21,
            ],

            // Laser Technicians
            [
                'category_id' => $categoryMap['technicians'],
                'title' => 'Laser Fundamentals for Technicians',
                'slug' => 'laser-fundamentals-technicians',
                'anchor' => 'laser-basics',
                'short_description' => 'Core laser principles explained clearly for technicians.',
                'full_description' => 'Fundamental laser physics, wavelength selection (755nm Alexandrite, 808nm Diode, 1064nm Nd:YAG), selective photothermolysis, thermal relaxation time (TRT), and safety guidelines.',
                'image' => 'assets/img/expertise/laser.webp',
                'icon' => 'bi-lightning-charge',
                'duration' => '2 Days Hands-on Workshop',
                'eligibility' => 'Aesthetic Technicians, Laser Operators, Clinic Assistants',
                'certification' => 'Certified Laser Technician (CLT)',
                'highlights' => ['Laser Physics & Chromophores', 'Skin Typing with Fitzpatrick Scale', 'Setting Safe Fluence & Pulse Widths', 'Cooling Methods (Contact, Cryo, Air)'],
                'is_featured' => true,
                'sort_order' => 22,
            ],
            [
                'category_id' => $categoryMap['technicians'],
                'title' => 'Device Handling & Calibration',
                'slug' => 'device-handling-calibration',
                'anchor' => 'devices',
                'short_description' => 'Correct setup, handling and care of aesthetic devices.',
                'full_description' => 'Hands-on practical training in device calibration, handpiece alignment, chilled tip maintenance, daily startup checkups, water filtration, and power testing.',
                'image' => 'assets/img/expertise/laser.webp',
                'icon' => 'bi-cpu',
                'duration' => '2 Days Technical Course',
                'eligibility' => 'Clinic Technicians & Operators',
                'certification' => 'Certificate in Aesthetic Device Handling & Maintenance',
                'highlights' => ['Handpiece Care & Lens Cleaning', 'Water Level & Cooling System Diagnostics', 'Energy Output Verification', 'Troubleshooting Device Errors'],
                'is_featured' => false,
                'sort_order' => 23,
            ],
            [
                'category_id' => $categoryMap['technicians'],
                'title' => 'Energy-Based Technologies',
                'slug' => 'energy-based-technologies',
                'anchor' => 'energy',
                'short_description' => 'Overview of energy-based devices and how they are used.',
                'full_description' => 'Operating Radiofrequency (Monopolar, Bipolar, Fractional RF), High-Intensity Focused Ultrasound (HIFU), Cryolipolysis, and Intense Pulsed Light (IPL).',
                'image' => 'assets/img/expertise/laser.webp',
                'icon' => 'bi-broadcast-pin',
                'duration' => '2 Days Practical Training',
                'eligibility' => 'Laser Technicians, Aestheticians',
                'certification' => 'Certificate in Energy-Based Aesthetics Technology',
                'highlights' => ['RF Energy Delivery & Skin Impedance', 'HIFU Cartridge Depths (1.5mm, 3.0mm, 4.5mm)', 'Cryolipolysis Safety & Freeze Protection', 'Treatment Mapping & Coverage Patterns'],
                'is_featured' => false,
                'sort_order' => 24,
            ],
            [
                'category_id' => $categoryMap['technicians'],
                'title' => 'Treatment-Room Protocols',
                'slug' => 'treatment-room-protocols',
                'anchor' => 'room',
                'short_description' => 'Room preparation, workflow and hygiene standards.',
                'full_description' => 'Laser treatment room standard operating procedures, eye protection standards (OD ratings), patient drape setup, smoke evacuation, and sanitisation.',
                'image' => 'assets/img/expertise/laser.webp',
                'icon' => 'bi-door-open',
                'duration' => '1 Day Practical SOP Workshop',
                'eligibility' => 'Clinic Staff, Aesthetic Technicians',
                'certification' => 'Certificate in Aesthetic Treatment Room Management',
                'highlights' => ['Laser Goggle Optical Density Standards', 'Plume Evacuation in Ablative Procedures', 'Surface Disinfection & Cross-Contamination', 'Consumable Inventory & Setup Checklist'],
                'is_featured' => false,
                'sort_order' => 25,
            ],
            [
                'category_id' => $categoryMap['technicians'],
                'title' => 'Equipment Safety & Emergency Protocols',
                'slug' => 'equipment-safety-emergency-protocols',
                'anchor' => 'equipment',
                'short_description' => 'Safe operation, maintenance and risk awareness for equipment.',
                'full_description' => 'Preventing laser burns, fire safety in oxygen-rich environments, electrical grounding, emergency cutoff buttons, and immediate response to adverse reactions.',
                'image' => 'assets/img/expertise/laser.webp',
                'icon' => 'bi-exclamation-triangle',
                'duration' => '1 Day Safety Course',
                'eligibility' => 'All clinic staff handling energy-based medical devices',
                'certification' => 'Laser & Medical Device Safety Certificate',
                'highlights' => ['Burn Prevention & Immediate First-Aid', 'Fire Hazards & Non-Reflective Instruments', 'Emergency Power Shutoff Protocols', 'Incident Logging & Quality Assurance'],
                'is_featured' => false,
                'sort_order' => 26,
            ],
        ];

        foreach ($programsData as $prog) {
            Program::updateOrCreate(['slug' => $prog['slug']], $prog);
        }

        // 7. Faculty Members
        $faculty = [
            [
                'name' => 'Dr. A. K. Sharma',
                'designation' => 'MBBS, MD, Fellowship in Aesthetic Medicine — Aesthetic Physician',
                'speciality' => 'Aesthetic & Cosmetic Medicine',
                'tag' => 'Aesthetic Medicine',
                'tone_class' => 'c-blue',
                'bio' => 'Senior aesthetic physician with over 15 years of clinical experience in facial aesthetics, advanced injectables, biostimulators and non-surgical facial transformation.',
                'image' => 'assets/img/slide-02.jpg',
                'skills_chips' => ['Facial Aesthetics', 'Injectables', 'Biostimulators', 'Patient Safety'],
                'sort_order' => 1,
            ],
            [
                'name' => 'Dr. R. Mehra',
                'designation' => 'MBBS, MD (Dermatology), DNB — Senior Dermatologist & Laser Specialist',
                'speciality' => 'Laser & Energy-Based Medicine',
                'tag' => 'Laser & Energy',
                'tone_class' => 'c-teal',
                'bio' => 'Renowned consultant dermatologist specializing in lasers, energy-based technologies, acne scar remodeling, and skin of colour treatment protocols.',
                'image' => 'assets/img/slide-01.jpg',
                'skills_chips' => ['Laser Principles', 'Device Safety', 'Fractional CO2', 'Skin of Colour'],
                'sort_order' => 2,
            ],
            [
                'name' => 'Dr. V. Singhania',
                'designation' => 'MBBS, MS, MCh (Plastic Surgery) — Hair Restoration Surgeon',
                'speciality' => 'Hair Restoration & Hair Transplantation',
                'tag' => 'Hair Restoration',
                'tone_class' => 'c-navy',
                'bio' => 'Board-certified plastic surgeon and international faculty in advanced FUE hair transplantation, mega-sessions, and reconstructive trichology.',
                'image' => 'assets/img/slide-03.jpg',
                'skills_chips' => ['Hair-Loss Assessment', 'Graft Management', 'FUE Masterclass', 'Regenerative Trichology'],
                'sort_order' => 3,
            ],
            [
                'name' => 'Dr. N. Kapoor',
                'designation' => 'MBBS, MS, DNB (General Surgery), FMAS, FIAGES — Consultant Laparoscopic Surgeon',
                'speciality' => 'General Surgery & Minimally Invasive Care',
                'tag' => 'General Surgery',
                'tone_class' => 'c-red',
                'bio' => 'Experienced general and laparoscopic surgeon with deep expertise in operative techniques, laser proctology, and clinical surgical training.',
                'image' => 'assets/img/slide-04.jpg',
                'skills_chips' => ['Operative Principles', 'Laser Proctology', 'Laparoscopy', 'OT Safety'],
                'sort_order' => 4,
            ],
        ];

        foreach ($faculty as $f) {
            FacultyMember::updateOrCreate(['name' => $f['name']], $f);
        }

        // 8. Blogs (All 14 posts with rich content from legacy blog-data.php)
        $blogs = [
            [
                'slug' => 'choosing-an-advanced-training-pathway-in-aesthetic-medicine',
                'title' => 'Choosing an Advanced Training Pathway in Aesthetic Medicine',
                'category_tag' => 'Aesthetic Medicine',
                'excerpt' => 'What to look for in a program: scientific foundations, specialist demonstrations, case-based learning and a clear focus on patient selection and safety.',
                'published_at' => '2026-10-02',
                'read_time' => 6,
                'content' => '<p>Aesthetic medicine is evolving quickly, and so are the programs that teach it. For a practising doctor, the challenge is rarely finding a course. It is finding one that builds real clinical judgement instead of only demonstrating a technique.</p>
<h2>Start with the scientific foundations</h2>
<p>A good pathway begins with anatomy, skin biology, product and device science, and the reasoning behind each treatment option. Learners who understand why a treatment works are better prepared to adapt it to the patient in front of them.</p>
<h2>Look for specialist-led teaching</h2>
<p>Education led by practising specialists connects theory to day-to-day clinical reality. Faculty who treat patients themselves can explain not only the ideal result, but also the problems that appear in real practice and how to respond.</p>
<h2>Value case-based learning</h2>
<p>Discussing real cases, including difficult ones, builds the judgement that no slide deck can. Case discussions teach you to weigh options, set realistic expectations and decide when not to treat.</p>
<blockquote class="my-4 p-3 border-start border-4 border-primary bg-light"><strong>"A program that teaches only the procedure is training hands. A program that teaches the decision is training clinicians."</strong></blockquote>
<h2>Expect a clear focus on safety</h2>
<p>Patient selection, informed consent, infection prevention and complication awareness should be part of the core curriculum, not an afterthought at the end of a workshop.</p>
<h2>Questions to ask before you enrol</h2>
<ul>
<li>Who teaches the program, and do they practise in the field?</li>
<li>How much of the learning is demonstration, discussion and supervised practice?</li>
<li>Does the curriculum cover complications and what to do when things do not go as planned?</li>
<li>Will you have access to academic resources or mentorship after the course ends?</li>
</ul>',
                'meta_title' => 'Choosing an Advanced Training Pathway in Aesthetic Medicine | HOK Academy',
                'meta_description' => 'What to look for in an aesthetic training program: scientific foundations, specialist demonstrations, case-based learning and patient safety.',
                'meta_keywords' => 'aesthetic medicine training, aesthetic courses for doctors, clinical training aesthetic medicine, HOK Academy blog',
            ],
            [
                'slug' => 'why-responsible-clinical-education-begins-with-safety',
                'title' => 'Why Responsible Clinical Education Begins with Safety',
                'category_tag' => 'Patient Safety',
                'excerpt' => 'Patient assessment, informed consent, infection prevention and complication awareness.',
                'published_at' => '2026-09-26',
                'read_time' => 5,
                'content' => '<p>In modern medical training, technical proficiency is only one side of the coin. The other, arguably more crucial side, is patient safety and risk mitigation.</p>
<h2>Comprehensive Pre-Procedure Assessment</h2>
<p>Every successful intervention begins with meticulous patient selection. Understanding contraindications, medical history, anatomical variations, and psychological expectations is the cornerstone of responsible clinical practice.</p>
<h2>Informed Consent as an Ongoing Dialogue</h2>
<p>Informed consent is not a mere signature on a legal document; it is a comprehensive dialogue where the patient is educated about potential risks, alternative treatments, expected downtime, and realistic outcomes.</p>
<h2>Complication Preparedness</h2>
<p>Every clinician must be thoroughly trained in identifying early warning signs of complications, from vascular occlusion in injectables to thermal injuries in laser treatments, and have immediate emergency protocols in place.</p>',
                'meta_title' => 'Why Responsible Clinical Education Begins with Safety | HOK Academy',
                'meta_description' => 'Learn why patient assessment, informed consent, infection prevention and complication awareness are central to responsible clinical education.',
                'meta_keywords' => 'patient safety, clinical education, medical training safety, complication awareness',
            ],
            [
                'slug' => 'learning-in-india-what-international-doctors-can-expect',
                'title' => 'Learning in India: What International Doctors Can Expect',
                'category_tag' => 'International',
                'excerpt' => 'Specialist-led lectures, clinical demonstrations, workshops and observational learning.',
                'published_at' => '2026-09-19',
                'read_time' => 5,
                'content' => '<p>India has emerged as a globally recognized destination for advanced medical training and clinical immersion. With its vast clinical volume, diverse patient demographics, and world-class healthcare infrastructure, learning in India offers unique educational advantages.</p>
<h2>Specialist-Led Academic Structure</h2>
<p>International doctors visiting HOK Academy participate in structured, specialist-led didactic sessions, masterclasses, and hands-on simulation training designed to meet global standards.</p>
<h2>Observational Learning in High-Volume Centers</h2>
<p>Exposure to a wide variety of clinical cases allows international practitioners to observe specialized procedural techniques and complex case management under seasoned mentors.</p>',
                'meta_title' => 'Learning in India: What International Doctors Can Expect | HOK Academy',
                'meta_description' => 'Discover what international doctors can expect when training at HOK Academy in India: specialist lectures, clinical demonstrations, and workshops.',
                'meta_keywords' => 'medical training India, international doctors courses, clinical immersion India',
            ],
            [
                'slug' => 'understanding-laser-and-energy-based-devices',
                'title' => 'Understanding Laser and Energy-Based Devices',
                'category_tag' => 'Laser & Energy',
                'excerpt' => 'A clear introduction to how energy-based devices work, and why parameters and safety matter.',
                'published_at' => '2026-09-12',
                'read_time' => 7,
                'content' => '<p>Energy-based medical devices—including lasers, radiofrequency, and ultrasound—have revolutionized both aesthetic and surgical specialties. Understanding their physical principles is essential for safe and predictable outcomes.</p>
<h2>Selective Photothermolysis</h2>
<p>The principle of selective photothermolysis dictates that specific wavelengths target specific chromophores (melanin, hemoglobin, or water) while sparing surrounding tissue.</p>
<h2>Device Parameters & Customization</h2>
<p>A skilled practitioner tailors fluence, pulse duration, and spot size according to the patient’s skin type, hair diameter, or lesion depth to maximize therapeutic efficacy while minimizing collateral thermal damage.</p>',
                'meta_title' => 'Understanding Laser and Energy-Based Devices | HOK Academy',
                'meta_description' => 'A clear introduction to how energy-based devices work and why parameters and safety matter in clinical practice.',
                'meta_keywords' => 'laser devices, energy based medicine, selective photothermolysis, laser safety',
            ],
            [
                'slug' => 'patient-selection-and-informed-consent',
                'title' => 'Patient Selection and Informed Consent in Practice',
                'category_tag' => 'Patient Safety',
                'excerpt' => 'Why careful selection and a transparent consent conversation are central to responsible care.',
                'published_at' => '2026-09-05',
                'read_time' => 4,
                'content' => '<p>Patient selection is often described as the single most critical decision in aesthetic and elective medicine. Choosing the right patient for the right procedure is the foundation of patient satisfaction.</p>
<h2>Managing Expectations</h2>
<p>Aligning patient expectations with clinical reality prevents disappointment and disputes. Honest communication regarding what a procedure can and cannot achieve builds lasting trust.</p>',
                'meta_title' => 'Patient Selection and Informed Consent in Practice | HOK Academy',
                'meta_description' => 'Why careful selection and a transparent consent conversation are central to responsible care.',
                'meta_keywords' => 'patient selection, informed consent, clinical practice ethics',
            ],
            [
                'slug' => 'hair-restoration-assessment-basics',
                'title' => 'Hair Restoration: The Basics of Assessment',
                'category_tag' => 'Aesthetic Medicine',
                'excerpt' => 'How a structured assessment shapes planning and expectations in hair restoration.',
                'published_at' => '2026-08-29',
                'read_time' => 6,
                'content' => '<p>Hair restoration surgery requires both surgical precision and artistic design. Before any graft is harvested, a thorough trichological and systemic assessment is mandatory.</p>
<h2>Evaluating the Donor Area</h2>
<p>Assessing donor hair density, follicle caliber, scalp laxity, and safe donor zone boundaries ensures long-term viability of transplanted grafts without causing donor depletion.</p>',
                'meta_title' => 'Hair Restoration: The Basics of Assessment | HOK Academy',
                'meta_description' => 'How a structured assessment shapes planning and expectations in hair restoration surgery.',
                'meta_keywords' => 'hair restoration assessment, FUE planning, trichology examination',
            ],
            [
                'slug' => 'infection-prevention-in-the-procedure-room',
                'title' => 'Infection Prevention in the Procedure Room',
                'category_tag' => 'Nursing & OT',
                'excerpt' => 'Everyday habits and protocols that keep procedure rooms and operation theatres safe.',
                'published_at' => '2026-08-22',
                'read_time' => 5,
                'content' => '<p>Strict aseptic techniques and infection control protocols in clinical procedure rooms safeguard both patients and medical staff against healthcare-associated infections.</p>
<h2>Standard Precautions & Sterilisation</h2>
<p>Adhering to high-level disinfection, proper autoclave cycles, single-use disposables, and hand hygiene protocols is essential in every medical environment.</p>',
                'meta_title' => 'Infection Prevention in the Procedure Room | HOK Academy',
                'meta_description' => 'Everyday habits and protocols that keep procedure rooms and operation theatres safe.',
                'meta_keywords' => 'infection prevention, procedure room safety, OT sterile protocols',
            ],
            [
                'slug' => 'why-case-based-learning-matters',
                'title' => 'Why Case-Based Learning Matters',
                'category_tag' => 'Clinical Education',
                'excerpt' => 'How discussing real clinical cases builds judgement beyond textbook knowledge.',
                'published_at' => '2026-08-15',
                'read_time' => 4,
                'content' => '<p>Textbooks provide theory, but clinical cases provide context. Case-based discussions help practitioners navigate nuanced scenarios where guidelines must be adapted to individual patients.</p>',
                'meta_title' => 'Why Case-Based Learning Matters | HOK Academy',
                'meta_description' => 'How discussing real clinical cases builds judgement beyond textbook knowledge.',
                'meta_keywords' => 'case based learning, clinical reasoning, medical education methodology',
            ],
            [
                'slug' => 'the-role-of-the-surgical-assistant',
                'title' => 'The Role of the Surgical Assistant',
                'category_tag' => 'Nursing & OT',
                'excerpt' => 'What good surgical assistance looks like before, during and after a procedure.',
                'published_at' => '2026-08-08',
                'read_time' => 5,
                'content' => '<p>A skilled surgical assistant is the backbone of an efficient, calm, and safe operating room. Anticipating the surgeon\'s moves and maintaining an immaculate sterile field are vital skills.</p>',
                'meta_title' => 'The Role of the Surgical Assistant | HOK Academy',
                'meta_description' => 'What good surgical assistance looks like before, during and after a procedure.',
                'meta_keywords' => 'surgical assistant, OT scrub nurse, surgical protocols',
            ],
            [
                'slug' => 'colour-theory-for-medical-pmu',
                'title' => 'Colour Theory for Medical PMU',
                'category_tag' => 'PMU',
                'excerpt' => 'Undertones, pigment behaviour and colour matching explained for restorative work.',
                'published_at' => '2026-08-01',
                'read_time' => 6,
                'content' => '<p>Medical micropigmentation requires an understanding of skin undertones, light reflection, and pigment degradation over time to achieve natural-looking camouflage results.</p>',
                'meta_title' => 'Colour Theory for Medical PMU | HOK Academy',
                'meta_description' => 'Undertones, pigment behaviour and colour matching explained for restorative medical PMU.',
                'meta_keywords' => 'PMU colour theory, medical camouflage pigments, skin undertone matching',
            ],
            [
                'slug' => 'an-introduction-to-endourology',
                'title' => 'An Introduction to Endourology',
                'category_tag' => 'Surgery',
                'excerpt' => 'A beginner-friendly overview of endoscopic urology and the techniques involved.',
                'published_at' => '2026-07-25',
                'read_time' => 7,
                'content' => '<p>Endourology represents the minimally invasive standard of care in modern urology, transforming the management of nephrolithiasis and lower urinary tract disorders.</p>',
                'meta_title' => 'An Introduction to Endourology | HOK Academy',
                'meta_description' => 'A beginner-friendly overview of endoscopic urology and the techniques involved.',
                'meta_keywords' => 'endourology, urological surgery, RIRS, PCNL overview',
            ],
            [
                'slug' => 'continuous-learning-in-modern-medicine',
                'title' => 'Continuous Learning in Modern Medicine',
                'category_tag' => 'Clinical Education',
                'excerpt' => 'Why professional development is an ongoing journey rather than a one-time training.',
                'published_at' => '2026-07-18',
                'read_time' => 4,
                'content' => '<p>Medicine evolves continually with new evidence, techniques, and technologies. Committing to lifelong learning is the defining mark of a progressive healthcare professional.</p>',
                'meta_title' => 'Continuous Learning in Modern Medicine | HOK Academy',
                'meta_description' => 'Why professional development is an ongoing journey rather than a one-time training.',
                'meta_keywords' => 'continuous medical education, professional development, clinical excellence',
            ],
            [
                'slug' => 'how-international-collaboration-strengthens-education',
                'title' => 'How International Collaboration Strengthens Medical Education',
                'category_tag' => 'International',
                'excerpt' => 'Knowledge exchange across borders brings new perspectives to clinical practice.',
                'published_at' => '2026-07-11',
                'read_time' => 5,
                'content' => '<p>Cross-border academic partnerships and global knowledge exchange foster broader clinical insight and elevate the quality of medical training worldwide.</p>',
                'meta_title' => 'How International Collaboration Strengthens Medical Education | HOK Academy',
                'meta_description' => 'Knowledge exchange across borders brings new perspectives to clinical practice.',
                'meta_keywords' => 'international medical collaboration, global healthcare education, medical partnerships',
            ],
            [
                'slug' => 'medical-nutrition-and-weight-management-overview',
                'title' => 'Medical Nutrition and Weight Management: An Overview',
                'category_tag' => 'Clinical Education',
                'excerpt' => 'Clinical nutrition, metabolic health and structured approaches to weight management.',
                'published_at' => '2026-07-04',
                'read_time' => 6,
                'content' => '<p>Integrating evidence-based clinical nutrition and metabolic health strategies enables medical practitioners to address chronic lifestyle diseases effectively.</p>',
                'meta_title' => 'Medical Nutrition and Weight Management: An Overview | HOK Academy',
                'meta_description' => 'Clinical nutrition, metabolic health and structured approaches to weight management.',
                'meta_keywords' => 'medical nutrition, weight management, metabolic health, clinical dietetics',
            ],
        ];

        foreach ($blogs as $b) {
            Blog::updateOrCreate(['slug' => $b['slug']], $b);
        }

        // 9. Why Features & Philosophy Principles
        $whyFeatures = [
            [
                'type' => 'why_hok',
                'title' => 'Multidisciplinary Faculty',
                'description' => 'Access expertise across medical, surgical, aesthetic and allied disciplines. Different Specialities. Multiple Perspectives. One Academic Platform.',
                'strong_text' => 'Access expertise across medical, surgical, aesthetic and allied disciplines.',
                'image' => 'assets/img/why/faculty.webp',
                'icon' => 'bi-diagram-3',
                'tone_class' => 'c-navy',
                'is_wide' => true,
                'sort_order' => 1,
            ],
            [
                'type' => 'why_hok',
                'title' => 'Specialist-Led Education',
                'description' => 'Our focus is on connecting learners with specialist knowledge, clinical experience and contemporary approaches to medical practice.',
                'strong_text' => 'Learn from practising professionals with experience in their respective fields.',
                'image' => 'assets/img/why/specialist.webp',
                'icon' => 'bi-award',
                'tone_class' => 'c-teal',
                'is_wide' => false,
                'sort_order' => 2,
            ],
            [
                'type' => 'why_hok',
                'title' => 'Clinical + Technology Focus',
                'description' => 'Explore the science, technology, patient selection, safety and clinical decision-making that support responsible clinical practice.',
                'strong_text' => 'Understand more than just a procedure.',
                'image' => 'assets/img/why/technology.webp',
                'icon' => 'bi-cpu',
                'tone_class' => 'c-blue',
                'is_wide' => false,
                'sort_order' => 3,
            ],
            [
                'type' => 'why_hok',
                'title' => 'Practical Learning',
                'description' => 'Depending on the program, learning may include demonstrations, case discussions, simulation, workshops, and supervised clinical practice.',
                'strong_text' => 'Move beyond conventional classroom learning.',
                'image' => 'assets/img/why/practical.webp',
                'icon' => 'bi-tools',
                'tone_class' => 'c-red',
                'chips' => ['Demonstrations', 'Case Discussions', 'Simulation', 'Workshops', 'Supervised Practical Learning'],
                'is_wide' => false,
                'sort_order' => 4,
            ],
            [
                'type' => 'why_hok',
                'title' => 'Cross-Disciplinary Exposure',
                'description' => 'Our multidisciplinary environment allows professionals to explore perspectives beyond their primary speciality and understand how different clinical disciplines intersect.',
                'strong_text' => 'Medicine does not exist in isolated disciplines.',
                'image' => 'assets/img/why/cross-disciplinary.webp',
                'icon' => 'bi-intersect',
                'tone_class' => 'c-navy',
                'is_wide' => false,
                'sort_order' => 5,
            ],
            [
                'type' => 'why_hok',
                'title' => 'Focus on Patient Safety',
                'description' => 'Patient selection, informed consent, infection prevention and complication awareness are central to everything we teach.',
                'strong_text' => 'Responsible practice is safe practice.',
                'image' => 'assets/img/why/safety.webp',
                'icon' => 'bi-shield-check',
                'tone_class' => 'c-teal',
                'is_wide' => false,
                'sort_order' => 6,
            ],

            // Philosophy 6 Principles
            [
                'type' => 'philosophy',
                'anchor_id' => 'scientific',
                'title' => 'Scientific Foundations',
                'subtitle' => 'Building Knowledge That Supports Clinical Practice',
                'strong_text' => 'Strong clinical practice begins with a clear understanding of scientific principles.',
                'description' => 'HOK Academy emphasizes structured medical knowledge and scientific foundations as the basis for understanding clinical techniques, technologies and evolving approaches to healthcare.',
                'icon' => 'bi-journal-medical',
                'tone_class' => 'c-navy',
                'sort_order' => 1,
            ],
            [
                'type' => 'philosophy',
                'anchor_id' => 'reasoning',
                'title' => 'Clinical Reasoning',
                'subtitle' => 'Connecting Knowledge with Clinical Thinking',
                'strong_text' => 'Medical education is not only about knowing information—it is also about understanding how that knowledge applies to clinical situations.',
                'description' => 'Our approach encourages clinical reasoning, structured thinking and informed decision-making, helping learners connect academic knowledge with different clinical scenarios.',
                'icon' => 'bi-lightbulb',
                'tone_class' => 'c-teal',
                'sort_order' => 2,
            ],
            [
                'type' => 'philosophy',
                'anchor_id' => 'practical',
                'title' => 'Practical Learning',
                'subtitle' => 'Bridging the Gap Between Concept and Application',
                'strong_text' => 'Hands-on exposure and practical observation turn theory into competence.',
                'description' => 'Our programs prioritize demonstration, simulation, hands-on practice, and structured observation under expert supervision.',
                'icon' => 'bi-tools',
                'tone_class' => 'c-blue',
                'sort_order' => 3,
            ],
            [
                'type' => 'philosophy',
                'anchor_id' => 'case',
                'title' => 'Case-Based Learning',
                'subtitle' => 'Navigating Nuanced Real-World Clinical Challenges',
                'strong_text' => 'Real patient cases teach what textbook slides cannot.',
                'description' => 'Through in-depth case discussions, learners explore patient variations, treatment selection criteria, complications, and evidence-based problem solving.',
                'icon' => 'bi-clipboard2-pulse',
                'tone_class' => 'c-red',
                'sort_order' => 4,
            ],
            [
                'type' => 'philosophy',
                'anchor_id' => 'safety',
                'title' => 'Patient Safety & Ethics',
                'subtitle' => 'Putting the Patient at the Center of Every Decision',
                'strong_text' => 'Excellence is measured not only by aesthetic outcome but by uncompromising safety.',
                'description' => 'We instill deep respect for patient consent, aseptic standards, anatomical danger zones, and emergency protocols in every training module.',
                'icon' => 'bi-shield-check',
                'tone_class' => 'c-navy',
                'sort_order' => 5,
            ],
            [
                'type' => 'philosophy',
                'anchor_id' => 'development',
                'title' => 'Professional Development',
                'subtitle' => 'Nurturing Lifelong Academic & Clinical Growth',
                'strong_text' => 'Medical learning is a continuous journey of skill refinement.',
                'description' => 'We support alumni with continuous learning resources, updates on cutting-edge techniques, and academic networking opportunities across borders.',
                'icon' => 'bi-graph-up-arrow',
                'tone_class' => 'c-teal',
                'sort_order' => 6,
            ],
        ];

        foreach ($whyFeatures as $wf) {
            WhyFeature::updateOrCreate(
                ['title' => $wf['title'], 'type' => $wf['type']],
                $wf
            );
        }
    }
}
