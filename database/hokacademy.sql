-- ========================================================
-- HOK Academy - Complete MySQL Database Export
-- Generation Date: 2026-10-10 12:40:04
-- Laravel 12 + MySQL 8.0 / MariaDB Compatible
-- ========================================================

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO';
START TRANSACTION;
SET time_zone = '+00:00';

-- --------------------------------------------------------
-- Table structure for table `users`
-- --------------------------------------------------------

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'admin',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table `users`
-- --------------------------------------------------------

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES ('1', 'HOK Admin', 'admin@hokacademy.com', '2026-10-10 12:29:50', '$2y$12$9WbJqf7Nxpu4lat6RmvuNeq0AbV1oNAiSzfNAPEIYOt0TTx1NuS82', NULL, '2026-10-10 12:29:50', '2026-10-10 12:29:50');

-- --------------------------------------------------------
-- Table structure for table `password_reset_tokens`
-- --------------------------------------------------------

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table structure for table `sessions`
-- --------------------------------------------------------

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text,
  `payload` longtext NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table structure for table `settings`
-- --------------------------------------------------------

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL,
  `value` longtext NULL,
  `group` varchar(100) NOT NULL DEFAULT 'general',
  `type` varchar(50) NOT NULL DEFAULT 'text',
  `label` varchar(255) NULL,
  `description` text NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_unique` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table `settings`
-- --------------------------------------------------------

INSERT INTO `settings` (`id`, `key`, `value`, `group`, `type`, `label`, `created_at`, `updated_at`) VALUES ('1', 'site_title', 'HOK Academy | International Academy of Medical Excellence', 'general', 'text', 'Site Title', '2026-10-10 12:29:50', '2026-10-10 12:29:50');
INSERT INTO `settings` (`id`, `key`, `value`, `group`, `type`, `label`, `created_at`, `updated_at`) VALUES ('2', 'site_tagline', 'International Academy of Medical Excellence', 'general', 'text', 'Site Tagline', '2026-10-10 12:29:50', '2026-10-10 12:29:50');
INSERT INTO `settings` (`id`, `key`, `value`, `group`, `type`, `label`, `created_at`, `updated_at`) VALUES ('3', 'site_logo', 'assets/img/logo.jpg', 'general', 'image', 'Site Logo', '2026-10-10 12:29:50', '2026-10-10 12:29:50');
INSERT INTO `settings` (`id`, `key`, `value`, `group`, `type`, `label`, `created_at`, `updated_at`) VALUES ('4', 'site_favicon', 'assets/img/logo.jpg', 'general', 'image', 'Favicon', '2026-10-10 12:29:50', '2026-10-10 12:29:50');
INSERT INTO `settings` (`id`, `key`, `value`, `group`, `type`, `label`, `created_at`, `updated_at`) VALUES ('5', 'hero_motto', 'Advancing Medical Knowledge. Transforming Clinical Practice. Connecting Expertise Across Borders.', 'general', 'textarea', 'Academy Motto', '2026-10-10 12:29:50', '2026-10-10 12:29:50');
INSERT INTO `settings` (`id`, `key`, `value`, `group`, `type`, `label`, `created_at`, `updated_at`) VALUES ('6', 'contact_phone', '+91 99101 69317', 'contact', 'text', 'Phone Number', '2026-10-10 12:29:50', '2026-10-10 12:29:50');
INSERT INTO `settings` (`id`, `key`, `value`, `group`, `type`, `label`, `created_at`, `updated_at`) VALUES ('7', 'contact_phone_raw', '+919910169317', 'contact', 'text', 'Raw Phone (tel: link)', '2026-10-10 12:29:50', '2026-10-10 12:29:50');
INSERT INTO `settings` (`id`, `key`, `value`, `group`, `type`, `label`, `created_at`, `updated_at`) VALUES ('8', 'contact_whatsapp', '919910169317', 'contact', 'text', 'WhatsApp Number', '2026-10-10 12:29:50', '2026-10-10 12:29:50');
INSERT INTO `settings` (`id`, `key`, `value`, `group`, `type`, `label`, `created_at`, `updated_at`) VALUES ('9', 'contact_email', 'hokacademy@yahoo.com', 'contact', 'text', 'Email Address', '2026-10-10 12:29:50', '2026-10-10 12:29:50');
INSERT INTO `settings` (`id`, `key`, `value`, `group`, `type`, `label`, `created_at`, `updated_at`) VALUES ('10', 'contact_address', 'Your academy address, City, State, India', 'contact', 'textarea', 'Office / Academy Address', '2026-10-10 12:29:50', '2026-10-10 12:29:50');
INSERT INTO `settings` (`id`, `key`, `value`, `group`, `type`, `label`, `created_at`, `updated_at`) VALUES ('11', 'office_hours', 'Monday to Saturday, 10:00 AM to 6:00 PM (IST)', 'contact', 'text', 'Office Hours', '2026-10-10 12:29:50', '2026-10-10 12:29:50');
INSERT INTO `settings` (`id`, `key`, `value`, `group`, `type`, `label`, `created_at`, `updated_at`) VALUES ('12', 'google_maps_embed', '', 'contact', 'textarea', 'Google Maps Embed Iframe URL', '2026-10-10 12:29:50', '2026-10-10 12:29:50');
INSERT INTO `settings` (`id`, `key`, `value`, `group`, `type`, `label`, `created_at`, `updated_at`) VALUES ('13', 'topbar_badge_text', 'International Enquiries', 'header_footer', 'text', 'Topbar Badge Text', '2026-10-10 12:29:50', '2026-10-10 12:29:50');
INSERT INTO `settings` (`id`, `key`, `value`, `group`, `type`, `label`, `created_at`, `updated_at`) VALUES ('14', 'topbar_badge_link', '/contact-us', 'header_footer', 'text', 'Topbar Badge Link', '2026-10-10 12:29:50', '2026-10-10 12:29:50');
INSERT INTO `settings` (`id`, `key`, `value`, `group`, `type`, `label`, `created_at`, `updated_at`) VALUES ('15', 'header_cta_text', 'Enquire Now', 'header_footer', 'text', 'Header Button Text', '2026-10-10 12:29:50', '2026-10-10 12:29:50');
INSERT INTO `settings` (`id`, `key`, `value`, `group`, `type`, `label`, `created_at`, `updated_at`) VALUES ('16', 'header_cta_link', '/contact-us', 'header_footer', 'text', 'Header Button Link', '2026-10-10 12:29:50', '2026-10-10 12:29:50');
INSERT INTO `settings` (`id`, `key`, `value`, `group`, `type`, `label`, `created_at`, `updated_at`) VALUES ('17', 'footer_about_text', 'Specialist expertise, modern technology and practical clinical learning together under one multidisciplinary platform.', 'header_footer', 'textarea', 'Footer About Text', '2026-10-10 12:29:50', '2026-10-10 12:29:50');
INSERT INTO `settings` (`id`, `key`, `value`, `group`, `type`, `label`, `created_at`, `updated_at`) VALUES ('18', 'footer_copyright', '© 2026 HOK Academy. All rights reserved.', 'header_footer', 'text', 'Footer Copyright', '2026-10-10 12:29:50', '2026-10-10 12:29:50');
INSERT INTO `settings` (`id`, `key`, `value`, `group`, `type`, `label`, `created_at`, `updated_at`) VALUES ('19', 'custom_head_scripts', '', 'header_footer', 'code', 'Custom <head> Scripts (Analytics / Meta Tags)', '2026-10-10 12:29:50', '2026-10-10 12:29:50');
INSERT INTO `settings` (`id`, `key`, `value`, `group`, `type`, `label`, `created_at`, `updated_at`) VALUES ('20', 'custom_footer_scripts', '', 'header_footer', 'code', 'Custom Footer Scripts', '2026-10-10 12:29:50', '2026-10-10 12:29:50');
INSERT INTO `settings` (`id`, `key`, `value`, `group`, `type`, `label`, `created_at`, `updated_at`) VALUES ('21', 'social_facebook', 'https://facebook.com', 'social', 'text', 'Facebook URL', '2026-10-10 12:29:50', '2026-10-10 12:29:50');
INSERT INTO `settings` (`id`, `key`, `value`, `group`, `type`, `label`, `created_at`, `updated_at`) VALUES ('22', 'social_instagram', 'https://instagram.com', 'social', 'text', 'Instagram URL', '2026-10-10 12:29:50', '2026-10-10 12:29:50');
INSERT INTO `settings` (`id`, `key`, `value`, `group`, `type`, `label`, `created_at`, `updated_at`) VALUES ('23', 'social_linkedin', 'https://linkedin.com', 'social', 'text', 'LinkedIn URL', '2026-10-10 12:29:50', '2026-10-10 12:29:50');
INSERT INTO `settings` (`id`, `key`, `value`, `group`, `type`, `label`, `created_at`, `updated_at`) VALUES ('24', 'social_youtube', 'https://youtube.com', 'social', 'text', 'YouTube URL', '2026-10-10 12:29:50', '2026-10-10 12:29:50');
INSERT INTO `settings` (`id`, `key`, `value`, `group`, `type`, `label`, `created_at`, `updated_at`) VALUES ('25', 'social_twitter', 'https://twitter.com', 'social', 'text', 'Twitter / X URL', '2026-10-10 12:29:50', '2026-10-10 12:29:50');

-- --------------------------------------------------------
-- Table structure for table `pages`
-- --------------------------------------------------------

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `meta_title` varchar(255) NULL,
  `meta_description` text NULL,
  `meta_keywords` text NULL,
  `canonical_url` varchar(255) NULL,
  `og_image` varchar(255) NULL,
  `header_title` varchar(255) NULL,
  `header_subtitle` text NULL,
  `header_bg_image` varchar(255) NULL,
  `content` longtext NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pages_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table `pages`
-- --------------------------------------------------------

INSERT INTO `pages` (`id`, `slug`, `title`, `header_title`, `header_subtitle`, `meta_title`, `meta_description`, `meta_keywords`, `canonical_url`, `og_image`, `is_active`, `created_at`, `updated_at`) VALUES ('1', 'home', 'Home', 'Advancing Medical Knowledge. Transforming Clinical Practice.', 'HOK Academy brings specialist expertise, modern technology and practical clinical learning together under one multidisciplinary platform.', 'HOK Academy | International Academy of Medical Excellence', 'HOK Academy is an international academy for advanced medical education, clinical training and professional development across aesthetic medicine, injectables, laser, hair restoration, surgery, gynaecology, urology and more.', 'HOK Academy, International Academy of Medical Excellence, medical education, medical training, clinical training, aesthetic medicine, aesthetic medicine courses, injectables training, laser training, hair restoration, surgery training, gynaecology training, urology training, cosmetic medicine, medical courses India, international medical courses', 'https://hokacademy.com/', NULL, '1', '2026-10-10 12:29:50', '2026-10-10 12:29:50');
INSERT INTO `pages` (`id`, `slug`, `title`, `header_title`, `header_subtitle`, `meta_title`, `meta_description`, `meta_keywords`, `canonical_url`, `og_image`, `is_active`, `created_at`, `updated_at`) VALUES ('2', 'about-us', 'About Us', 'International Academy of Medical Excellence', 'Advancing Medical Knowledge. Transforming Clinical Practice. Connecting Expertise Across Borders.', 'About HOK Academy | International Academy of Medical Excellence', 'Learn about HOK Academy, an international academy providing advanced medical education, clinical training and professional development for doctors, surgeons and healthcare professionals.', 'About HOK Academy, HOK Academy, International Academy of Medical Excellence, medical academy India, international medical education, medical training, clinical education, healthcare professional development, aesthetic medicine training, medical courses India', 'https://hokacademy.com/about-us', NULL, '1', '2026-10-10 12:29:50', '2026-10-10 12:29:50');
INSERT INTO `pages` (`id`, `slug`, `title`, `header_title`, `header_subtitle`, `meta_title`, `meta_description`, `meta_keywords`, `canonical_url`, `og_image`, `is_active`, `created_at`, `updated_at`) VALUES ('3', 'vision-mission', 'Our Vision & Mission', 'Vision & Mission', 'Advancing Medical Knowledge. Transforming Clinical Practice. Connecting Expertise Across Borders.', 'Vision & Mission | HOK Academy | International Medical Excellence', 'Discover HOK Academy\'s vision and mission to advance medical education, strengthen clinical skills and connect healthcare professionals through high-quality international medical training.', 'HOK Academy Vision and Mission, HOK Academy, medical education vision, medical academy mission, international medical education, clinical training, medical training India, healthcare professional development, medical excellence', 'https://hokacademy.com/vision-mission', NULL, '1', '2026-10-10 12:29:50', '2026-10-10 12:29:50');
INSERT INTO `pages` (`id`, `slug`, `title`, `header_title`, `header_subtitle`, `meta_title`, `meta_description`, `meta_keywords`, `canonical_url`, `og_image`, `is_active`, `created_at`, `updated_at`) VALUES ('4', 'why-hok', 'Why HOK Academy', 'Why HOK Academy', 'Advancing Medical Knowledge. Transforming Clinical Practice. Connecting Expertise Across Borders.', 'Why HOK Academy | International Medical Excellence', 'Discover why HOK Academy is a trusted platform for advanced medical education, clinical training, professional development and international healthcare learning.', 'Why HOK Academy, HOK Academy, medical education, international medical training, clinical training, healthcare professional development, medical excellence, medical courses India, healthcare education', 'https://hokacademy.com/why-hok', NULL, '1', '2026-10-10 12:29:50', '2026-10-10 12:29:50');
INSERT INTO `pages` (`id`, `slug`, `title`, `header_title`, `header_subtitle`, `meta_title`, `meta_description`, `meta_keywords`, `canonical_url`, `og_image`, `is_active`, `created_at`, `updated_at`) VALUES ('5', 'learning-philosophy', 'Learning Philosophy', 'Learning Philosophy', 'Advancing Medical Knowledge. Transforming Clinical Practice. Connecting Expertise Across Borders.', 'Learning Philosophy | HOK Academy | International Medical Excellence', 'Learn about HOK Academy\'s 6 core learning principles: Scientific Foundations, Clinical Reasoning, Practical Learning, Case-Based Learning, Patient Safety, and Professional Development.', 'Learning Philosophy, HOK Academy, medical education philosophy, clinical training principles, patient safety, case based learning, medical excellence', 'https://hokacademy.com/learning-philosophy', NULL, '1', '2026-10-10 12:29:50', '2026-10-10 12:29:50');
INSERT INTO `pages` (`id`, `slug`, `title`, `header_title`, `header_subtitle`, `meta_title`, `meta_description`, `meta_keywords`, `canonical_url`, `og_image`, `is_active`, `created_at`, `updated_at`) VALUES ('6', 'our-multidisciplinary', 'Our Multidisciplinary Model', 'Our Multidisciplinary Model', 'Advancing Medical Knowledge. Transforming Clinical Practice. Connecting Expertise Across Borders.', 'Our Multidisciplinary Model | HOK Academy', 'Explore HOK Academy\'s multidisciplinary model, bringing together doctors, surgeons and healthcare specialists from diverse clinical fields for comprehensive medical education and training.', 'HOK Academy multidisciplinary model, multidisciplinary medical education, medical education, clinical training, healthcare professionals, international medical training, medical excellence, healthcare education, medical courses India', 'https://hokacademy.com/our-multidisciplinary', NULL, '1', '2026-10-10 12:29:50', '2026-10-10 12:29:50');
INSERT INTO `pages` (`id`, `slug`, `title`, `header_title`, `header_subtitle`, `meta_title`, `meta_description`, `meta_keywords`, `canonical_url`, `og_image`, `is_active`, `created_at`, `updated_at`) VALUES ('7', 'programs', 'Programs & Courses', 'Medical Training & Courses', 'Find the program that fits your profession across doctors, PMU, nursing and laser technicians.', 'Medical Training & Courses | HOK Academy', 'Explore HOK Academy\'s medical training programs and professional courses in aesthetic and cosmetic medicine, injectables, laser and energy-based medicine, hair restoration, nutrition and weight management, gynaecology, urology, surgery, maxillofacial, PMU, nursing, OT, paramedical and laser technology.', 'HOK Academy services, medical training courses, aesthetic medicine training, cosmetic medicine training, injectables training, laser and energy-based medicine, hair restoration training, hair transplant training, nutrition and weight management, gynaecology training, urology training, surgery training, maxillofacial training, PMU training, nursing training, OT and paramedical training, laser technology training, medical courses India, clinical training programs, healthcare professional training', 'https://hokacademy.com/programs', NULL, '1', '2026-10-10 12:29:50', '2026-10-10 12:29:50');
INSERT INTO `pages` (`id`, `slug`, `title`, `header_title`, `header_subtitle`, `meta_title`, `meta_description`, `meta_keywords`, `canonical_url`, `og_image`, `is_active`, `created_at`, `updated_at`) VALUES ('8', 'faculty', 'Our Faculty', 'Our Faculty', 'Different Specialists. Different Perspectives. One Academic Vision.', 'Our Faculty | HOK Academy | International Academy of Medical Excellence', 'Meet the multidisciplinary faculty of HOK Academy: practising doctors, surgeons and healthcare specialists who teach what they practise.', 'HOK Academy faculty, medical faculty India, aesthetic medicine faculty, laser specialists, hair restoration surgeons, urology faculty, gynaecology faculty, specialist-led medical education', 'https://hokacademy.com/faculty', NULL, '1', '2026-10-10 12:29:50', '2026-10-10 12:29:50');
INSERT INTO `pages` (`id`, `slug`, `title`, `header_title`, `header_subtitle`, `meta_title`, `meta_description`, `meta_keywords`, `canonical_url`, `og_image`, `is_active`, `created_at`, `updated_at`) VALUES ('9', 'international', 'International Programs', 'International Academy of Medical Excellence', 'Advancing Medical Knowledge. Transforming Clinical Practice. Connecting Expertise Across Borders.', 'International HOK Academy | International Academy of Medical Excellence', 'Specialized clinical learning and international medical programs in India for doctors and medical professionals from around the world.', 'International HOK Academy, international doctors training India, clinical fellowship India, aesthetic training India, global medical education', 'https://hokacademy.com/international', NULL, '1', '2026-10-10 12:29:50', '2026-10-10 12:29:50');
INSERT INTO `pages` (`id`, `slug`, `title`, `header_title`, `header_subtitle`, `meta_title`, `meta_description`, `meta_keywords`, `canonical_url`, `og_image`, `is_active`, `created_at`, `updated_at`) VALUES ('10', 'blog', 'Medical Blog & Articles', 'HOK Academy Blog', 'Insights, clinical perspectives and updates on medical education and clinical practice.', 'Medical Blog & Articles | HOK Academy', 'Explore clinical articles, guidance on aesthetic training pathways, patient safety, laser technologies, and continuous learning from HOK Academy specialists.', 'medical blog, aesthetic medicine blog, clinical articles, patient safety, laser training guide, medical education insights', 'https://hokacademy.com/blog', NULL, '1', '2026-10-10 12:29:50', '2026-10-10 12:29:50');
INSERT INTO `pages` (`id`, `slug`, `title`, `header_title`, `header_subtitle`, `meta_title`, `meta_description`, `meta_keywords`, `canonical_url`, `og_image`, `is_active`, `created_at`, `updated_at`) VALUES ('11', 'contact-us', 'Contact Us', 'Talk to HOK Academy', 'Questions about a program, an international visit or an academic partnership? Send us your enquiry and our team will reply with the right next step.', 'Contact HOK Academy | International Academy of Medical Excellence', 'Get in touch with HOK Academy for program enquiries, international doctor programs, academic collaboration and partnerships.', 'contact HOK Academy, HOK Academy enquiry, medical training enquiry, international doctors enquiry, aesthetic medicine courses India, medical academy contact', 'https://hokacademy.com/contact-us', NULL, '1', '2026-10-10 12:29:50', '2026-10-10 12:29:50');

-- --------------------------------------------------------
-- Table structure for table `page_sections`
-- --------------------------------------------------------

DROP TABLE IF EXISTS `page_sections`;
CREATE TABLE IF NOT EXISTS `page_sections` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `page_id` bigint unsigned NOT NULL,
  `section_key` varchar(100) NOT NULL,
  `title` varchar(255) NULL,
  `subtitle` varchar(255) NULL,
  `badge` varchar(100) NULL,
  `content` longtext NULL,
  `media` varchar(255) NULL,
  `button_text` varchar(100) NULL,
  `button_link` varchar(255) NULL,
  `extra_data` json NULL,
  `order` int NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `page_sections_page_id_foreign` (`page_id`),
  CONSTRAINT `page_sections_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table structure for table `hero_slides`
-- --------------------------------------------------------

DROP TABLE IF EXISTS `hero_slides`;
CREATE TABLE IF NOT EXISTS `hero_slides` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `badge` varchar(100) NULL,
  `title` varchar(255) NOT NULL,
  `highlight_text` varchar(255) NULL,
  `subtitle` text NULL,
  `primary_btn_text` varchar(100) NULL,
  `primary_btn_link` varchar(255) NULL,
  `secondary_btn_text` varchar(100) NULL,
  `secondary_btn_link` varchar(255) NULL,
  `bg_image` varchar(255) NULL,
  `rating` varchar(20) NULL DEFAULT '4.9/5',
  `rating_count` varchar(100) NULL DEFAULT '500+ Reviews',
  `order` int NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table `hero_slides`
-- --------------------------------------------------------

INSERT INTO `hero_slides` (`id`, `category_badge`, `title`, `description`, `image`, `button_text`, `button_link`, `accent_color`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES ('1', 'International Academy of Medical Excellence', 'Advancing Medical Knowledge. Transforming Clinical Practice.', 'HOK Academy brings specialist expertise, modern technology and practical clinical learning together under one multidisciplinary platform.', 'assets/img/slide-01.jpg', 'About HOK', '/about-us', 'var(--navy)', '1', '1', '2026-10-10 12:29:50', '2026-10-10 12:29:50');
INSERT INTO `hero_slides` (`id`, `category_badge`, `title`, `description`, `image`, `button_text`, `button_link`, `accent_color`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES ('2', 'Learn from Specialists', 'Expertise That Goes Beyond One Speciality.', 'A multidisciplinary faculty of doctors, surgeons and healthcare specialists bringing diverse clinical perspectives together.', 'assets/img/slide-02.jpg', 'Meet Our Faculty', '/faculty', 'var(--teal)', '2', '1', '2026-10-10 12:29:50', '2026-10-10 12:29:50');
INSERT INTO `hero_slides` (`id`, `category_badge`, `title`, `description`, `image`, `button_text`, `button_link`, `accent_color`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES ('3', 'Comprehensive Curriculum', 'From Foundations to Advanced Clinical Practice.', 'Scientific understanding, clinical decision-making, procedural training and patient safety in every program.', 'assets/img/slide-03.jpg', 'Explore Programs', '/programs', 'var(--blue)', '3', '1', '2026-10-10 12:29:50', '2026-10-10 12:29:50');
INSERT INTO `hero_slides` (`id`, `category_badge`, `title`, `description`, `image`, `button_text`, `button_link`, `accent_color`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES ('4', 'Modern Infrastructure', 'Practical Learning in a Contemporary Clinical Setting.', 'Modern procedure rooms, advanced technologies and structured environments designed for meaningful learning.', 'assets/img/slide-04.jpg', 'Why HOK Academy', '/why-hok', 'var(--red)', '4', '1', '2026-10-10 12:29:50', '2026-10-10 12:29:50');
INSERT INTO `hero_slides` (`id`, `category_badge`, `title`, `description`, `image`, `button_text`, `button_link`, `accent_color`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES ('5', 'Global Community', 'Connecting Doctors and Specialists Worldwide.', 'Welcoming medical professionals from India and across borders to learn, connect and collaborate.', 'assets/img/slide-05.webp', 'International Enquiries', '/international', 'var(--navy)', '5', '1', '2026-10-10 12:29:50', '2026-10-10 12:29:50');

-- --------------------------------------------------------
-- Table structure for table `program_categories`
-- --------------------------------------------------------

DROP TABLE IF EXISTS `program_categories`;
CREATE TABLE IF NOT EXISTS `program_categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NULL,
  `icon` varchar(100) NULL,
  `order` int NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `program_categories_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table `program_categories`
-- --------------------------------------------------------

INSERT INTO `program_categories` (`id`, `slug`, `name`, `short_name`, `tone_class`, `icon`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES ('1', 'doctors', 'Doctors & Medical Professionals', 'Doctors', 'c-navy', 'bi-person-badge', '1', '1', '2026-10-10 12:29:50', '2026-10-10 12:29:50');
INSERT INTO `program_categories` (`id`, `slug`, `name`, `short_name`, `tone_class`, `icon`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES ('2', 'pmu', 'PMU & Aesthetic Professionals', 'PMU & Aesthetic', 'c-teal', 'bi-palette', '2', '1', '2026-10-10 12:29:50', '2026-10-10 12:29:50');
INSERT INTO `program_categories` (`id`, `slug`, `name`, `short_name`, `tone_class`, `icon`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES ('3', 'nursing', 'Nursing, OT & Paramedical', 'Nursing & OT', 'c-blue', 'bi-hospital', '3', '1', '2026-10-10 12:29:50', '2026-10-10 12:29:50');
INSERT INTO `program_categories` (`id`, `slug`, `name`, `short_name`, `tone_class`, `icon`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES ('4', 'technicians', 'Aesthetic & Laser Technicians', 'Laser Technicians', 'c-red', 'bi-lightning-charge', '4', '1', '2026-10-10 12:29:50', '2026-10-10 12:29:50');

-- --------------------------------------------------------
-- Table structure for table `programs`
-- --------------------------------------------------------

DROP TABLE IF EXISTS `programs`;
CREATE TABLE IF NOT EXISTS `programs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `badge` varchar(100) NULL,
  `duration` varchar(100) NULL,
  `credits` varchar(100) NULL,
  `level` varchar(100) NULL,
  `short_description` text NULL,
  `description` longtext NULL,
  `overview` longtext NULL,
  `learning_outcomes` json NULL,
  `curriculum` json NULL,
  `career_paths` json NULL,
  `requirements` json NULL,
  `tuition_fee` varchar(100) NULL,
  `image` varchar(255) NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `programs_slug_unique` (`slug`),
  KEY `programs_category_id_foreign` (`category_id`),
  CONSTRAINT `programs_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `program_categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table `programs`
-- --------------------------------------------------------

INSERT INTO `programs` (`id`, `category_id`, `title`, `slug`, `anchor`, `short_description`, `full_description`, `image`, `icon`, `highlights`, `curriculum`, `duration`, `eligibility`, `certification`, `is_featured`, `sort_order`, `meta_title`, `meta_description`, `meta_keywords`, `is_active`, `created_at`, `updated_at`) VALUES ('1', '1', 'Aesthetic & Cosmetic Medicine', 'aesthetic-cosmetic-medicine', 'aesthetic-medicine', 'Facial aesthetics, skin rejuvenation and structured aesthetic treatment planning.', 'Comprehensive masterclass covering facial anatomy, patient assessment, aging dynamics, non-surgical facial rejuvenation, chemical peels, and advanced clinical aesthetic protocols.', 'assets/img/expertise/aesthetic-medicine.webp', 'bi-stars', '[\"Facial Anatomy & Assessment\",\"Chemical Peels & Skin Rejuvenation\",\"Complication Management Protocols\",\"Live Patient Demonstrations\"]', NULL, '3 - 5 Days Intensive / Modular', 'MBBS, BDS, MD, MS, MCh or equivalent Medical Degree', 'Certificate of Advanced Clinical Training in Aesthetic Medicine', '1', '1', NULL, NULL, NULL, '1', '2026-10-10 12:29:50', '2026-10-10 12:29:50');
INSERT INTO `programs` (`id`, `category_id`, `title`, `slug`, `anchor`, `short_description`, `full_description`, `image`, `icon`, `highlights`, `curriculum`, `duration`, `eligibility`, `certification`, `is_featured`, `sort_order`, `meta_title`, `meta_description`, `meta_keywords`, `is_active`, `created_at`, `updated_at`) VALUES ('2', '1', 'Advanced Injectables', 'advanced-injectables', 'injectables', 'Specialist-led learning in injectable techniques, anatomy and patient safety.', 'In-depth hands-on training on Botulinum Toxin Type A, Dermal Fillers (upper, mid, lower face), Biostimulators, Cannula techniques, vascular anatomy, danger zones, and emergency reversal protocols.', 'assets/img/expertise/injectables.webp', 'bi-eyedropper', '[\"Micro-Toxin & Full Face Injections\",\"Dermal Fillers with Needle & Cannula\",\"Lip Masterclass & Russian Lip Techniques\",\"Hyaluronidase Emergency Management\"]', NULL, '2 - 4 Days Hands-on Workshop', 'Medical Doctors, Surgeons, Dermatologists, Maxillofacial Specialists', 'Fellowship / Certificate in Advanced Injectables & Facial Contouring', '1', '2', NULL, NULL, NULL, '1', '2026-10-10 12:29:50', '2026-10-10 12:29:50');
INSERT INTO `programs` (`id`, `category_id`, `title`, `slug`, `anchor`, `short_description`, `full_description`, `image`, `icon`, `highlights`, `curriculum`, `duration`, `eligibility`, `certification`, `is_featured`, `sort_order`, `meta_title`, `meta_description`, `meta_keywords`, `is_active`, `created_at`, `updated_at`) VALUES ('3', '1', 'Laser & Energy-Based Medicine', 'laser-energy-based-medicine', 'laser', 'Laser technologies, device parameters, safety and clinical applications.', 'Master physics, wavelengths, spot sizes, fluence, pulse duration, and laser-tissue interactions for hair reduction, pigmentation removal, vascular lesions, acne scar resurfacing, and skin tightening with HIFU and RF.', 'assets/img/expertise/laser.webp', 'bi-lightning-charge', '[\"Q-Switched Nd:YAG, Fractional CO2 & Diode Lasers\",\"IPL, HIFU, and Fractional Micro-Needling RF\",\"Skin of Colour (Fitzpatrick IV-VI) Protocols\",\"Laser Safety Officer (LSO) Compliance\"]', NULL, '3 Days Comprehensive Course', 'Registered Medical Practitioners & Dermatologists', 'Certified Clinical Laser Practitioner (CCLP)', '1', '3', NULL, NULL, NULL, '1', '2026-10-10 12:29:50', '2026-10-10 12:29:50');
INSERT INTO `programs` (`id`, `category_id`, `title`, `slug`, `anchor`, `short_description`, `full_description`, `image`, `icon`, `highlights`, `curriculum`, `duration`, `eligibility`, `certification`, `is_featured`, `sort_order`, `meta_title`, `meta_description`, `meta_keywords`, `is_active`, `created_at`, `updated_at`) VALUES ('4', '1', 'Hair Restoration & Transplantation', 'hair-restoration-transplantation', 'hair-restoration', 'Hair-loss assessment, graft management and transplantation principles.', 'State-of-the-art training in FUE, FUT, Long Hair FUE, robotic assistance, graft harvesting, recipient site creation, hairline designing, PRP, GFC, and regenerative trichology.', 'assets/img/expertise/hair-restoration.webp', 'bi-scissors', '[\"Motorized & Manual FUE Extraction\",\"Natural Hairline Architecture\",\"Graft Preservation & Holding Solutions\",\"Managing Complications & Failed Transplants\"]', NULL, '5 Days Surgical Immersion', 'Surgeons, Dermatologists, Plastic Surgeons, ENT, Maxillofacial Surgeons', 'Hands-on Fellowship in Modern Hair Transplantation & FUE', '1', '4', NULL, NULL, NULL, '1', '2026-10-10 12:29:50', '2026-10-10 12:29:50');
INSERT INTO `programs` (`id`, `category_id`, `title`, `slug`, `anchor`, `short_description`, `full_description`, `image`, `icon`, `highlights`, `curriculum`, `duration`, `eligibility`, `certification`, `is_featured`, `sort_order`, `meta_title`, `meta_description`, `meta_keywords`, `is_active`, `created_at`, `updated_at`) VALUES ('5', '1', 'Medical Nutrition & Weight Management', 'medical-nutrition-weight-management', 'medical-nutrition', 'Clinical nutrition, metabolic health and structured weight management.', 'Clinical evidence-based nutrition protocols, obesity pharmacotherapy, GLP-1 receptor agonists, metabolic syndrome correction, body composition assessment, and medical meal planning.', 'assets/img/expertise/medical-nutrition.webp', 'bi-basket', '[\"Metabolic Syndrome & Insulin Resistance\",\"Modern Anti-Obesity Pharmacotherapy\",\"Gut Microbiome & Systemic Inflammation\",\"Custom Diet Protocols for Clinical Practice\"]', NULL, '2 Days Clinical Training', 'Doctors, Nutritionists, Clinical Dieticians, Healthcare Providers', 'Certificate in Clinical Nutrition & Metabolic Weight Management', '0', '5', NULL, NULL, NULL, '1', '2026-10-10 12:29:50', '2026-10-10 12:29:50');
INSERT INTO `programs` (`id`, `category_id`, `title`, `slug`, `anchor`, `short_description`, `full_description`, `image`, `icon`, `highlights`, `curriculum`, `duration`, `eligibility`, `certification`, `is_featured`, `sort_order`, `meta_title`, `meta_description`, `meta_keywords`, `is_active`, `created_at`, `updated_at`) VALUES ('6', '1', 'Cosmetic & Surgical Gynaecology', 'cosmetic-surgical-gynaecology', 'gynaecology', 'Cosmetic gynaecology, energy-based technologies and appropriate surgical procedures.', 'Surgical and non-surgical aesthetic gynaecology including Labiaplasty, Vaginoplasty, Hoodectomy, PRP rejuvenation (O-Shot), vaginal tightening lasers, and RF devices.', 'assets/img/expertise/gynaecology.webp', 'bi-gender-female', '[\"Surgical Labiaplasty & Perineoplasty\",\"Laser & RF Vaginal Rejuvenation\",\"Injectable Fillers & Regenerative Medicine in Gynae\",\"Consent & Medicolegal Aspects\"]', NULL, '3 Days Surgical Masterclass', 'Gynaecologists, Plastic Surgeons, Urogynaecologists', 'Diploma in Cosmetic & Functional Gynaecology', '0', '6', NULL, NULL, NULL, '1', '2026-10-10 12:29:50', '2026-10-10 12:29:50');
INSERT INTO `programs` (`id`, `category_id`, `title`, `slug`, `anchor`, `short_description`, `full_description`, `image`, `icon`, `highlights`, `curriculum`, `duration`, `eligibility`, `certification`, `is_featured`, `sort_order`, `meta_title`, `meta_description`, `meta_keywords`, `is_active`, `created_at`, `updated_at`) VALUES ('7', '1', 'Urology & Endourology', 'urology-endourology', 'urology', 'Endoscopic urology, stone surgery and advanced urological techniques.', 'Endourological techniques, PCNL, Mini-PCNL, RIRS with flexible ureteroscopy, laser lithotripsy, TURP, bipolar enucleation, and reconstructive urology principles.', 'assets/img/expertise/urology.webp', 'bi-clipboard2-pulse', '[\"RIRS & Flexible Ureteroscopy Instrumentation\",\"Laser Settings for Stone Dusting & Fragmentation\",\"Hands-on Simulation & Live Surgery Observation\",\"Stent Placement & Complication Management\"]', NULL, '4 Days Clinical Workshop', 'General Surgeons, Urologists, Surgery Post-Graduates', 'Advanced Certificate in Endourology & Laser Stone Surgery', '0', '7', NULL, NULL, NULL, '1', '2026-10-10 12:29:50', '2026-10-10 12:29:50');
INSERT INTO `programs` (`id`, `category_id`, `title`, `slug`, `anchor`, `short_description`, `full_description`, `image`, `icon`, `highlights`, `curriculum`, `duration`, `eligibility`, `certification`, `is_featured`, `sort_order`, `meta_title`, `meta_description`, `meta_keywords`, `is_active`, `created_at`, `updated_at`) VALUES ('8', '1', 'General Surgery', 'general-surgery', 'general-surgery', 'Operative principles, minimally invasive techniques and perioperative practice.', 'Advanced laparoscopic surgery, laparoscopic cholecystectomy, hernia repair (TAPP/TEP), proctology with laser (haemorrhoids, fistula, fissure), and acute surgical care.', 'assets/img/expertise/general-surgery.webp', 'bi-bandaid', '[\"Laparoscopic Suturing & Knot Tying\",\"Laser Proctology Essentials\",\"Energy Devices & Harmonic Scalpels\",\"Safe Dissection Protocols\"]', NULL, '5 Days Hands-on Wet Lab & OT', 'MS / DNB General Surgery, Surgical Residents', 'Fellowship in Minimal Access & Laser Surgery', '0', '8', NULL, NULL, NULL, '1', '2026-10-10 12:29:50', '2026-10-10 12:29:50');
INSERT INTO `programs` (`id`, `category_id`, `title`, `slug`, `anchor`, `short_description`, `full_description`, `image`, `icon`, `highlights`, `curriculum`, `duration`, `eligibility`, `certification`, `is_featured`, `sort_order`, `meta_title`, `meta_description`, `meta_keywords`, `is_active`, `created_at`, `updated_at`) VALUES ('9', '1', 'Oral & Maxillofacial Surgery', 'oral-maxillofacial-surgery', 'maxillofacial', 'Specialist-led education in oral and maxillofacial surgical disciplines.', 'Facial trauma management, orthognathic surgery, zygomatic implants, TMJ arthroscopy, cyst and tumour resections, and aesthetic facial bone reshaping.', 'assets/img/expertise/maxillofacial.webp', 'bi-emoji-smile', '[\"3D Virtual Surgical Planning\",\"Complex Bone Grafting & Implants\",\"Soft Tissue Facial Flaps\",\"Managing Facial Asymmetry\"]', NULL, '4 Days Specialist Program', 'MDS Oral & Maxillofacial Surgery, ENT Surgeons, Plastic Surgeons', 'Masterclass Certificate in Maxillofacial Reconstruction & Aesthetics', '0', '9', NULL, NULL, NULL, '1', '2026-10-10 12:29:50', '2026-10-10 12:29:50');
INSERT INTO `programs` (`id`, `category_id`, `title`, `slug`, `anchor`, `short_description`, `full_description`, `image`, `icon`, `highlights`, `curriculum`, `duration`, `eligibility`, `certification`, `is_featured`, `sort_order`, `meta_title`, `meta_description`, `meta_keywords`, `is_active`, `created_at`, `updated_at`) VALUES ('10', '2', 'Permanent Makeup (PMU)', 'permanent-makeup', 'pmu', 'Foundations of permanent makeup, technique, hygiene and client care.', 'Microblading, Ombre Powder Brows, Lip Blush, Lash Line Enhancement, symmetry mapping, needle depth, machine configuration, and client consultation.', 'assets/img/expertise/pmu.webp', 'bi-palette', '[\"Microblading & Microshading\",\"Lip Blush & Neutralization\",\"Eyeliner Techniques\",\"Hygiene, Bloodborne Pathogen Standards\"]', NULL, '5 Days Professional Course', 'Aesthetic professionals, Cosmetologists, PMU artists, Beginners', 'International Diploma in Professional PMU Artistry', '1', '10', NULL, NULL, NULL, '1', '2026-10-10 12:29:50', '2026-10-10 12:29:50');
INSERT INTO `programs` (`id`, `category_id`, `title`, `slug`, `anchor`, `short_description`, `full_description`, `image`, `icon`, `highlights`, `curriculum`, `duration`, `eligibility`, `certification`, `is_featured`, `sort_order`, `meta_title`, `meta_description`, `meta_keywords`, `is_active`, `created_at`, `updated_at`) VALUES ('11', '2', 'Medical PMU', 'medical-pmu', 'medical-pmu', 'Pigment work for medical and restorative needs with a safety-first approach.', 'Paramedical micropigmentation for post-surgical, post-mastectomy, alopecia, and vitiligo patients with high-precision skin matching.', 'assets/img/expertise/pmu.webp', 'bi-palette', '[\"Scalp Micropigmentation (SMP)\",\"Trichology Alignment\",\"Sterile Technique & Needle Selection\",\"Realistic Texture Mimicking\"]', NULL, '3 Days Intensive Training', 'PMU Artists, Nurses, Medical Aestheticians', 'Advanced Certificate in Medical Micropigmentation', '0', '11', NULL, NULL, NULL, '1', '2026-10-10 12:29:50', '2026-10-10 12:29:50');
INSERT INTO `programs` (`id`, `category_id`, `title`, `slug`, `anchor`, `short_description`, `full_description`, `image`, `icon`, `highlights`, `curriculum`, `duration`, `eligibility`, `certification`, `is_featured`, `sort_order`, `meta_title`, `meta_description`, `meta_keywords`, `is_active`, `created_at`, `updated_at`) VALUES ('12', '2', 'Medical Camouflage', 'medical-camouflage', 'camouflage', 'Techniques to camouflage skin concerns with natural-looking results.', 'Paramedical skin camouflage using Brazilian stretch mark camouflage, hypopigmentation blending, and scar blending algorithms.', 'assets/img/expertise/pmu.jpg', 'bi-palette', '[\"Skin Undertone Matching & Contrast Theory\",\"Custom Pigment Formulations\",\"Healing & Long-Term Color Retention\",\"Stretch Mark & Burn Restoration\"]', NULL, '2 Days Workshop', 'PMU Practitioners, Skin Specialists', 'Certified Medical Skin Camouflage Specialist', '0', '12', NULL, NULL, NULL, '1', '2026-10-10 12:29:50', '2026-10-10 12:29:50');
INSERT INTO `programs` (`id`, `category_id`, `title`, `slug`, `anchor`, `short_description`, `full_description`, `image`, `icon`, `highlights`, `curriculum`, `duration`, `eligibility`, `certification`, `is_featured`, `sort_order`, `meta_title`, `meta_description`, `meta_keywords`, `is_active`, `created_at`, `updated_at`) VALUES ('13', '2', 'Scar Camouflage', 'scar-camouflage', 'scar', 'Assessment and pigment methods used to reduce the visibility of scars.', 'Targeted camouflage of surgical scars, tummy tuck scars, facelift incisions, acne scars, and traumatic scars.', 'assets/img/expertise/pmu.webp', 'bi-bandaid', '[\"Tissue Elasticity & Scar Maturity Evaluation\",\"Needle Penetration in Fibrotic Tissue\",\"Inkless Micro-Needling vs Camouflage\",\"Client Case Studies\"]', NULL, '2 Days Hands-on Workshop', 'Aesthetic practitioners, PMU artists, Nurses', 'Specialist Certificate in Scar Camouflage', '0', '13', NULL, NULL, NULL, '1', '2026-10-10 12:29:50', '2026-10-10 12:29:50');
INSERT INTO `programs` (`id`, `category_id`, `title`, `slug`, `anchor`, `short_description`, `full_description`, `image`, `icon`, `highlights`, `curriculum`, `duration`, `eligibility`, `certification`, `is_featured`, `sort_order`, `meta_title`, `meta_description`, `meta_keywords`, `is_active`, `created_at`, `updated_at`) VALUES ('14', '2', 'Areola / Nipple Camouflage', 'areola-nipple-camouflage', 'areola', 'Restorative pigmentation techniques with sensitivity and precision.', '3D Areola Complex Tattooing for breast cancer survivors post-reconstruction, nipple graft restoration, and gender confirmation surgery aesthetics.', 'assets/img/expertise/pmu.webp', 'bi-heart', '[\"3D Optical Illusion Shading & Highlighting\",\"Areola Diameter & Placement Mapping\",\"Working Over Graft & Radiated Skin\",\"Emotional Care & Consultation Framework\"]', NULL, '2 Days Specialized Masterclass', 'Medical PMU Artists, Nurses, Medical Practitioners', 'Master Artist in 3D Areola Restoration', '0', '14', NULL, NULL, NULL, '1', '2026-10-10 12:29:50', '2026-10-10 12:29:50');
INSERT INTO `programs` (`id`, `category_id`, `title`, `slug`, `anchor`, `short_description`, `full_description`, `image`, `icon`, `highlights`, `curriculum`, `duration`, `eligibility`, `certification`, `is_featured`, `sort_order`, `meta_title`, `meta_description`, `meta_keywords`, `is_active`, `created_at`, `updated_at`) VALUES ('15', '2', 'Pigment Science & Colour Theory', 'pigment-science-colour-theory', 'pigment', 'Understand pigments, undertones and colour matching for skin.', 'Deep dive into organic vs inorganic pigments, CI numbers, iron oxides, carbon black, titanium dioxide, lightfastness, and skin melanin physics.', 'assets/img/expertise/pmu.jpg', 'bi-droplet', '[\"Fitzpatrick Skin Types & Melanin Undertones\",\"Preventing Blue, Grey, Red & Orange Shifting\",\"Pigment Particle Size & Migration\",\"Corrections & Neutralizers\"]', NULL, '1 Day Intensive Theory & Lab', 'All PMU Artists, Microbladers, Tattoo Artists', 'Certificate in Pigment Chemistry & Advanced Skin Colour Science', '0', '15', NULL, NULL, NULL, '1', '2026-10-10 12:29:50', '2026-10-10 12:29:50');
INSERT INTO `programs` (`id`, `category_id`, `title`, `slug`, `anchor`, `short_description`, `full_description`, `image`, `icon`, `highlights`, `curriculum`, `duration`, `eligibility`, `certification`, `is_featured`, `sort_order`, `meta_title`, `meta_description`, `meta_keywords`, `is_active`, `created_at`, `updated_at`) VALUES ('16', '3', 'Nursing & Clinical Care', 'nursing-clinical-care', 'nursing', 'Patient care, procedural support and everyday clinical responsibilities.', 'Specialized nursing protocols for aesthetic medicine, day surgery units, laser safety, minor OT setups, medication administration, and patient monitoring.', 'assets/img/expertise/nursing.webp', 'bi-hospital', '[\"Pre & Post-Operative Patient Care\",\"Sterile Field Maintenance\",\"Emergency Trolley & Resuscitation Basics\",\"Clinical Documentation & Consent Protocols\"]', NULL, '3 Days Professional Program', 'GNM, B.Sc Nursing, ANM, Paramedical Staff', 'Certificate in Aesthetic & Surgical Nursing Practice', '1', '16', NULL, NULL, NULL, '1', '2026-10-10 12:29:50', '2026-10-10 12:29:50');
INSERT INTO `programs` (`id`, `category_id`, `title`, `slug`, `anchor`, `short_description`, `full_description`, `image`, `icon`, `highlights`, `curriculum`, `duration`, `eligibility`, `certification`, `is_featured`, `sort_order`, `meta_title`, `meta_description`, `meta_keywords`, `is_active`, `created_at`, `updated_at`) VALUES ('17', '3', 'OT Protocols & Management', 'ot-protocols-management', 'ot', 'Operation theatre routines, discipline and safe working protocols.', 'Comprehensive operation theatre discipline, zoning, airflow control, scrub technique, patient positioning, and WHO Surgical Safety Checklist.', 'assets/img/expertise/nursing.webp', 'bi-shield-check', '[\"OT Zoning (Clean, Aseptic, Disposable)\",\"Scrubbing, Gowning & Gloving Perfection\",\"Electrosurgery & Diathermy Safety\",\"Bio-Medical Waste Management in OT\"]', NULL, '3 Days OT Immersion', 'OT Technicians, Nursing Staff, Paramedics', 'Certificate in Modern OT Protocols & Surgical Safety', '0', '17', NULL, NULL, NULL, '1', '2026-10-10 12:29:50', '2026-10-10 12:29:50');
INSERT INTO `programs` (`id`, `category_id`, `title`, `slug`, `anchor`, `short_description`, `full_description`, `image`, `icon`, `highlights`, `curriculum`, `duration`, `eligibility`, `certification`, `is_featured`, `sort_order`, `meta_title`, `meta_description`, `meta_keywords`, `is_active`, `created_at`, `updated_at`) VALUES ('18', '3', 'Surgical Assistance', 'surgical-assistance', 'assist', 'Assisting the surgical team before, during and after procedures.', 'Role of the primary surgical scrub assistant, anticipating surgeon needs, tissue handling, suctioning, retraction, suture cutting, and sponge counts.', 'assets/img/expertise/nursing.webp', 'bi-person-check', '[\"Anticipating Procedural Steps\",\"Hemostasis & Retraction Methods\",\"Handling Delicate Microsurgical Instruments\",\"Count Verification & Incident Prevention\"]', NULL, '4 Days Hands-on Training', 'OT Nurses, Junior Doctors, Surgical Assistants', 'Certified Surgical Assistant (CSA)', '0', '18', NULL, NULL, NULL, '1', '2026-10-10 12:29:50', '2026-10-10 12:29:50');
INSERT INTO `programs` (`id`, `category_id`, `title`, `slug`, `anchor`, `short_description`, `full_description`, `image`, `icon`, `highlights`, `curriculum`, `duration`, `eligibility`, `certification`, `is_featured`, `sort_order`, `meta_title`, `meta_description`, `meta_keywords`, `is_active`, `created_at`, `updated_at`) VALUES ('19', '3', 'Surgical Instrumentation', 'surgical-instrumentation', 'instruments', 'Handling, setup and management of surgical instruments.', 'Classification, assembly, testing, inspection, and maintenance of general surgery, laparoscopy, micro-instruments, and endoscopic sets.', 'assets/img/expertise/nursing.webp', 'bi-tools', '[\"Instrument Identification & Care\",\"Laparoscopic Optics & Fiber-Optic Cables\",\"Ultrasonic & Electrosurgical Handpieces\",\"Preventing Corrosion & Instrument Damage\"]', NULL, '2 Days Workshop', 'OT Staff, CSSD Staff, Paramedical Students', 'Certificate in Surgical Instrumentation & Set Maintenance', '0', '19', NULL, NULL, NULL, '1', '2026-10-10 12:29:50', '2026-10-10 12:29:50');
INSERT INTO `programs` (`id`, `category_id`, `title`, `slug`, `anchor`, `short_description`, `full_description`, `image`, `icon`, `highlights`, `curriculum`, `duration`, `eligibility`, `certification`, `is_featured`, `sort_order`, `meta_title`, `meta_description`, `meta_keywords`, `is_active`, `created_at`, `updated_at`) VALUES ('20', '3', 'Sterilisation & Infection Control', 'sterilisation-infection-control', 'sterilisation', 'Sterilisation methods and infection-prevention practice.', 'Central Sterile Services Department (CSSD) workflows, Autoclave, ETO, Plasma Sterilization, chemical biological indicators, and hospital-acquired infection (HAI) prevention.', 'assets/img/expertise/nursing.webp', 'bi-shield-shaded', '[\"Steam & Low-Temperature Sterilisation\",\"Chemical & Biological Integrators\",\"Packaging, Sealing & Shelf-Life Management\",\"Disinfection of Heat-Sensitive Endoscopes\"]', NULL, '2 Days Course', 'Infection Control Nurses, CSSD Technicians, OT Managers', 'CSSD & Infection Control Quality Specialist', '0', '20', NULL, NULL, NULL, '1', '2026-10-10 12:29:50', '2026-10-10 12:29:50');
INSERT INTO `programs` (`id`, `category_id`, `title`, `slug`, `anchor`, `short_description`, `full_description`, `image`, `icon`, `highlights`, `curriculum`, `duration`, `eligibility`, `certification`, `is_featured`, `sort_order`, `meta_title`, `meta_description`, `meta_keywords`, `is_active`, `created_at`, `updated_at`) VALUES ('21', '3', 'Perioperative Care', 'perioperative-care', 'periop', 'Patient preparation and care across the perioperative journey.', 'Comprehensive management of the patient across preoperative assessment, intraoperative monitoring, and postoperative recovery room (PACU) care.', 'assets/img/expertise/nursing.webp', 'bi-heart-pulse', '[\"Airway Monitoring & Oxygen Therapy\",\"Pain Management Protocols (VAS Score)\",\"Identifying Early Warning Signs of Deterioration\",\"Safe Discharge Readiness Criteria\"]', NULL, '2 Days Clinical Training', 'Recovery Nurses, Clinical Staff, Paramedical Practitioners', 'Certificate in Perioperative & Post-Anesthesia Care', '0', '21', NULL, NULL, NULL, '1', '2026-10-10 12:29:50', '2026-10-10 12:29:50');
INSERT INTO `programs` (`id`, `category_id`, `title`, `slug`, `anchor`, `short_description`, `full_description`, `image`, `icon`, `highlights`, `curriculum`, `duration`, `eligibility`, `certification`, `is_featured`, `sort_order`, `meta_title`, `meta_description`, `meta_keywords`, `is_active`, `created_at`, `updated_at`) VALUES ('22', '4', 'Laser Fundamentals for Technicians', 'laser-fundamentals-technicians', 'laser-basics', 'Core laser principles explained clearly for technicians.', 'Fundamental laser physics, wavelength selection (755nm Alexandrite, 808nm Diode, 1064nm Nd:YAG), selective photothermolysis, thermal relaxation time (TRT), and safety guidelines.', 'assets/img/expertise/laser.webp', 'bi-lightning-charge', '[\"Laser Physics & Chromophores\",\"Skin Typing with Fitzpatrick Scale\",\"Setting Safe Fluence & Pulse Widths\",\"Cooling Methods (Contact, Cryo, Air)\"]', NULL, '2 Days Hands-on Workshop', 'Aesthetic Technicians, Laser Operators, Clinic Assistants', 'Certified Laser Technician (CLT)', '1', '22', NULL, NULL, NULL, '1', '2026-10-10 12:29:50', '2026-10-10 12:29:50');
INSERT INTO `programs` (`id`, `category_id`, `title`, `slug`, `anchor`, `short_description`, `full_description`, `image`, `icon`, `highlights`, `curriculum`, `duration`, `eligibility`, `certification`, `is_featured`, `sort_order`, `meta_title`, `meta_description`, `meta_keywords`, `is_active`, `created_at`, `updated_at`) VALUES ('23', '4', 'Device Handling & Calibration', 'device-handling-calibration', 'devices', 'Correct setup, handling and care of aesthetic devices.', 'Hands-on practical training in device calibration, handpiece alignment, chilled tip maintenance, daily startup checkups, water filtration, and power testing.', 'assets/img/expertise/laser.webp', 'bi-cpu', '[\"Handpiece Care & Lens Cleaning\",\"Water Level & Cooling System Diagnostics\",\"Energy Output Verification\",\"Troubleshooting Device Errors\"]', NULL, '2 Days Technical Course', 'Clinic Technicians & Operators', 'Certificate in Aesthetic Device Handling & Maintenance', '0', '23', NULL, NULL, NULL, '1', '2026-10-10 12:29:50', '2026-10-10 12:29:50');
INSERT INTO `programs` (`id`, `category_id`, `title`, `slug`, `anchor`, `short_description`, `full_description`, `image`, `icon`, `highlights`, `curriculum`, `duration`, `eligibility`, `certification`, `is_featured`, `sort_order`, `meta_title`, `meta_description`, `meta_keywords`, `is_active`, `created_at`, `updated_at`) VALUES ('24', '4', 'Energy-Based Technologies', 'energy-based-technologies', 'energy', 'Overview of energy-based devices and how they are used.', 'Operating Radiofrequency (Monopolar, Bipolar, Fractional RF), High-Intensity Focused Ultrasound (HIFU), Cryolipolysis, and Intense Pulsed Light (IPL).', 'assets/img/expertise/laser.webp', 'bi-broadcast-pin', '[\"RF Energy Delivery & Skin Impedance\",\"HIFU Cartridge Depths (1.5mm, 3.0mm, 4.5mm)\",\"Cryolipolysis Safety & Freeze Protection\",\"Treatment Mapping & Coverage Patterns\"]', NULL, '2 Days Practical Training', 'Laser Technicians, Aestheticians', 'Certificate in Energy-Based Aesthetics Technology', '0', '24', NULL, NULL, NULL, '1', '2026-10-10 12:29:50', '2026-10-10 12:29:50');
INSERT INTO `programs` (`id`, `category_id`, `title`, `slug`, `anchor`, `short_description`, `full_description`, `image`, `icon`, `highlights`, `curriculum`, `duration`, `eligibility`, `certification`, `is_featured`, `sort_order`, `meta_title`, `meta_description`, `meta_keywords`, `is_active`, `created_at`, `updated_at`) VALUES ('25', '4', 'Treatment-Room Protocols', 'treatment-room-protocols', 'room', 'Room preparation, workflow and hygiene standards.', 'Laser treatment room standard operating procedures, eye protection standards (OD ratings), patient drape setup, smoke evacuation, and sanitisation.', 'assets/img/expertise/laser.webp', 'bi-door-open', '[\"Laser Goggle Optical Density Standards\",\"Plume Evacuation in Ablative Procedures\",\"Surface Disinfection & Cross-Contamination\",\"Consumable Inventory & Setup Checklist\"]', NULL, '1 Day Practical SOP Workshop', 'Clinic Staff, Aesthetic Technicians', 'Certificate in Aesthetic Treatment Room Management', '0', '25', NULL, NULL, NULL, '1', '2026-10-10 12:29:50', '2026-10-10 12:29:50');
INSERT INTO `programs` (`id`, `category_id`, `title`, `slug`, `anchor`, `short_description`, `full_description`, `image`, `icon`, `highlights`, `curriculum`, `duration`, `eligibility`, `certification`, `is_featured`, `sort_order`, `meta_title`, `meta_description`, `meta_keywords`, `is_active`, `created_at`, `updated_at`) VALUES ('26', '4', 'Equipment Safety & Emergency Protocols', 'equipment-safety-emergency-protocols', 'equipment', 'Safe operation, maintenance and risk awareness for equipment.', 'Preventing laser burns, fire safety in oxygen-rich environments, electrical grounding, emergency cutoff buttons, and immediate response to adverse reactions.', 'assets/img/expertise/laser.webp', 'bi-exclamation-triangle', '[\"Burn Prevention & Immediate First-Aid\",\"Fire Hazards & Non-Reflective Instruments\",\"Emergency Power Shutoff Protocols\",\"Incident Logging & Quality Assurance\"]', NULL, '1 Day Safety Course', 'All clinic staff handling energy-based medical devices', 'Laser & Medical Device Safety Certificate', '0', '26', NULL, NULL, NULL, '1', '2026-10-10 12:29:50', '2026-10-10 12:29:50');

-- --------------------------------------------------------
-- Table structure for table `faculty_members`
-- --------------------------------------------------------

DROP TABLE IF EXISTS `faculty_members`;
CREATE TABLE IF NOT EXISTS `faculty_members` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `department` varchar(255) NULL,
  `qualification` varchar(255) NULL,
  `bio` text NULL,
  `image` varchar(255) NULL,
  `email` varchar(255) NULL,
  `phone` varchar(100) NULL,
  `linkedin` varchar(255) NULL,
  `order` int NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table `faculty_members`
-- --------------------------------------------------------

INSERT INTO `faculty_members` (`id`, `name`, `designation`, `speciality`, `tag`, `tone_class`, `bio`, `image`, `skills_chips`, `sort_order`, `is_visiting`, `is_active`, `created_at`, `updated_at`) VALUES ('1', 'Dr. A. K. Sharma', 'MBBS, MD, Fellowship in Aesthetic Medicine — Aesthetic Physician', 'Aesthetic & Cosmetic Medicine', 'Aesthetic Medicine', 'c-blue', 'Senior aesthetic physician with over 15 years of clinical experience in facial aesthetics, advanced injectables, biostimulators and non-surgical facial transformation.', 'assets/img/slide-02.jpg', '[\"Facial Aesthetics\",\"Injectables\",\"Biostimulators\",\"Patient Safety\"]', '1', '0', '1', '2026-10-10 12:29:50', '2026-10-10 12:29:50');
INSERT INTO `faculty_members` (`id`, `name`, `designation`, `speciality`, `tag`, `tone_class`, `bio`, `image`, `skills_chips`, `sort_order`, `is_visiting`, `is_active`, `created_at`, `updated_at`) VALUES ('2', 'Dr. R. Mehra', 'MBBS, MD (Dermatology), DNB — Senior Dermatologist & Laser Specialist', 'Laser & Energy-Based Medicine', 'Laser & Energy', 'c-teal', 'Renowned consultant dermatologist specializing in lasers, energy-based technologies, acne scar remodeling, and skin of colour treatment protocols.', 'assets/img/slide-01.jpg', '[\"Laser Principles\",\"Device Safety\",\"Fractional CO2\",\"Skin of Colour\"]', '2', '0', '1', '2026-10-10 12:29:51', '2026-10-10 12:29:51');
INSERT INTO `faculty_members` (`id`, `name`, `designation`, `speciality`, `tag`, `tone_class`, `bio`, `image`, `skills_chips`, `sort_order`, `is_visiting`, `is_active`, `created_at`, `updated_at`) VALUES ('3', 'Dr. V. Singhania', 'MBBS, MS, MCh (Plastic Surgery) — Hair Restoration Surgeon', 'Hair Restoration & Hair Transplantation', 'Hair Restoration', 'c-navy', 'Board-certified plastic surgeon and international faculty in advanced FUE hair transplantation, mega-sessions, and reconstructive trichology.', 'assets/img/slide-03.jpg', '[\"Hair-Loss Assessment\",\"Graft Management\",\"FUE Masterclass\",\"Regenerative Trichology\"]', '3', '0', '1', '2026-10-10 12:29:51', '2026-10-10 12:29:51');
INSERT INTO `faculty_members` (`id`, `name`, `designation`, `speciality`, `tag`, `tone_class`, `bio`, `image`, `skills_chips`, `sort_order`, `is_visiting`, `is_active`, `created_at`, `updated_at`) VALUES ('4', 'Dr. N. Kapoor', 'MBBS, MS, DNB (General Surgery), FMAS, FIAGES — Consultant Laparoscopic Surgeon', 'General Surgery & Minimally Invasive Care', 'General Surgery', 'c-red', 'Experienced general and laparoscopic surgeon with deep expertise in operative techniques, laser proctology, and clinical surgical training.', 'assets/img/slide-04.jpg', '[\"Operative Principles\",\"Laser Proctology\",\"Laparoscopy\",\"OT Safety\"]', '4', '0', '1', '2026-10-10 12:29:51', '2026-10-10 12:29:51');

-- --------------------------------------------------------
-- Table structure for table `blogs`
-- --------------------------------------------------------

DROP TABLE IF EXISTS `blogs`;
CREATE TABLE IF NOT EXISTS `blogs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `category` varchar(100) NULL,
  `author_name` varchar(100) NULL DEFAULT 'HOK Faculty Team',
  `author_designation` varchar(100) NULL DEFAULT 'Academic Faculty',
  `author_avatar` varchar(255) NULL,
  `published_at` date NULL,
  `read_time` varchar(50) NULL DEFAULT '5 min read',
  `views_count` int NOT NULL DEFAULT '0',
  `featured_image` varchar(255) NULL,
  `excerpt` text NULL,
  `content` longtext NOT NULL,
  `tags` json NULL,
  `meta_title` varchar(255) NULL,
  `meta_description` text NULL,
  `meta_keywords` text NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT '1',
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `blogs_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table `blogs`
-- --------------------------------------------------------

INSERT INTO `blogs` (`id`, `title`, `slug`, `category_tag`, `excerpt`, `content`, `featured_image`, `read_time`, `published_at`, `is_published`, `meta_title`, `meta_description`, `meta_keywords`, `canonical_url`, `created_at`, `updated_at`) VALUES ('1', 'Choosing an Advanced Training Pathway in Aesthetic Medicine', 'choosing-an-advanced-training-pathway-in-aesthetic-medicine', 'Aesthetic Medicine', 'What to look for in a program: scientific foundations, specialist demonstrations, case-based learning and a clear focus on patient selection and safety.', '<p>Aesthetic medicine is evolving quickly, and so are the programs that teach it. For a practising doctor, the challenge is rarely finding a course. It is finding one that builds real clinical judgement instead of only demonstrating a technique.</p>
<h2>Start with the scientific foundations</h2>
<p>A good pathway begins with anatomy, skin biology, product and device science, and the reasoning behind each treatment option. Learners who understand why a treatment works are better prepared to adapt it to the patient in front of them.</p>
<h2>Look for specialist-led teaching</h2>
<p>Education led by practising specialists connects theory to day-to-day clinical reality. Faculty who treat patients themselves can explain not only the ideal result, but also the problems that appear in real practice and how to respond.</p>
<h2>Value case-based learning</h2>
<p>Discussing real cases, including difficult ones, builds the judgement that no slide deck can. Case discussions teach you to weigh options, set realistic expectations and decide when not to treat.</p>
<blockquote class=\"my-4 p-3 border-start border-4 border-primary bg-light\"><strong>\"A program that teaches only the procedure is training hands. A program that teaches the decision is training clinicians.\"</strong></blockquote>
<h2>Expect a clear focus on safety</h2>
<p>Patient selection, informed consent, infection prevention and complication awareness should be part of the core curriculum, not an afterthought at the end of a workshop.</p>
<h2>Questions to ask before you enrol</h2>
<ul>
<li>Who teaches the program, and do they practise in the field?</li>
<li>How much of the learning is demonstration, discussion and supervised practice?</li>
<li>Does the curriculum cover complications and what to do when things do not go as planned?</li>
<li>Will you have access to academic resources or mentorship after the course ends?</li>
</ul>', NULL, '6', '2026-10-02 00:00:00', '1', 'Choosing an Advanced Training Pathway in Aesthetic Medicine | HOK Academy', 'What to look for in an aesthetic training program: scientific foundations, specialist demonstrations, case-based learning and patient safety.', 'aesthetic medicine training, aesthetic courses for doctors, clinical training aesthetic medicine, HOK Academy blog', NULL, '2026-10-10 12:29:51', '2026-10-10 12:29:51');
INSERT INTO `blogs` (`id`, `title`, `slug`, `category_tag`, `excerpt`, `content`, `featured_image`, `read_time`, `published_at`, `is_published`, `meta_title`, `meta_description`, `meta_keywords`, `canonical_url`, `created_at`, `updated_at`) VALUES ('2', 'Why Responsible Clinical Education Begins with Safety', 'why-responsible-clinical-education-begins-with-safety', 'Patient Safety', 'Patient assessment, informed consent, infection prevention and complication awareness.', '<p>In modern medical training, technical proficiency is only one side of the coin. The other, arguably more crucial side, is patient safety and risk mitigation.</p>
<h2>Comprehensive Pre-Procedure Assessment</h2>
<p>Every successful intervention begins with meticulous patient selection. Understanding contraindications, medical history, anatomical variations, and psychological expectations is the cornerstone of responsible clinical practice.</p>
<h2>Informed Consent as an Ongoing Dialogue</h2>
<p>Informed consent is not a mere signature on a legal document; it is a comprehensive dialogue where the patient is educated about potential risks, alternative treatments, expected downtime, and realistic outcomes.</p>
<h2>Complication Preparedness</h2>
<p>Every clinician must be thoroughly trained in identifying early warning signs of complications, from vascular occlusion in injectables to thermal injuries in laser treatments, and have immediate emergency protocols in place.</p>', NULL, '5', '2026-09-26 00:00:00', '1', 'Why Responsible Clinical Education Begins with Safety | HOK Academy', 'Learn why patient assessment, informed consent, infection prevention and complication awareness are central to responsible clinical education.', 'patient safety, clinical education, medical training safety, complication awareness', NULL, '2026-10-10 12:29:51', '2026-10-10 12:29:51');
INSERT INTO `blogs` (`id`, `title`, `slug`, `category_tag`, `excerpt`, `content`, `featured_image`, `read_time`, `published_at`, `is_published`, `meta_title`, `meta_description`, `meta_keywords`, `canonical_url`, `created_at`, `updated_at`) VALUES ('3', 'Learning in India: What International Doctors Can Expect', 'learning-in-india-what-international-doctors-can-expect', 'International', 'Specialist-led lectures, clinical demonstrations, workshops and observational learning.', '<p>India has emerged as a globally recognized destination for advanced medical training and clinical immersion. With its vast clinical volume, diverse patient demographics, and world-class healthcare infrastructure, learning in India offers unique educational advantages.</p>
<h2>Specialist-Led Academic Structure</h2>
<p>International doctors visiting HOK Academy participate in structured, specialist-led didactic sessions, masterclasses, and hands-on simulation training designed to meet global standards.</p>
<h2>Observational Learning in High-Volume Centers</h2>
<p>Exposure to a wide variety of clinical cases allows international practitioners to observe specialized procedural techniques and complex case management under seasoned mentors.</p>', NULL, '5', '2026-09-19 00:00:00', '1', 'Learning in India: What International Doctors Can Expect | HOK Academy', 'Discover what international doctors can expect when training at HOK Academy in India: specialist lectures, clinical demonstrations, and workshops.', 'medical training India, international doctors courses, clinical immersion India', NULL, '2026-10-10 12:29:51', '2026-10-10 12:29:51');
INSERT INTO `blogs` (`id`, `title`, `slug`, `category_tag`, `excerpt`, `content`, `featured_image`, `read_time`, `published_at`, `is_published`, `meta_title`, `meta_description`, `meta_keywords`, `canonical_url`, `created_at`, `updated_at`) VALUES ('4', 'Understanding Laser and Energy-Based Devices', 'understanding-laser-and-energy-based-devices', 'Laser & Energy', 'A clear introduction to how energy-based devices work, and why parameters and safety matter.', '<p>Energy-based medical devices—including lasers, radiofrequency, and ultrasound—have revolutionized both aesthetic and surgical specialties. Understanding their physical principles is essential for safe and predictable outcomes.</p>
<h2>Selective Photothermolysis</h2>
<p>The principle of selective photothermolysis dictates that specific wavelengths target specific chromophores (melanin, hemoglobin, or water) while sparing surrounding tissue.</p>
<h2>Device Parameters & Customization</h2>
<p>A skilled practitioner tailors fluence, pulse duration, and spot size according to the patient’s skin type, hair diameter, or lesion depth to maximize therapeutic efficacy while minimizing collateral thermal damage.</p>', NULL, '7', '2026-09-12 00:00:00', '1', 'Understanding Laser and Energy-Based Devices | HOK Academy', 'A clear introduction to how energy-based devices work and why parameters and safety matter in clinical practice.', 'laser devices, energy based medicine, selective photothermolysis, laser safety', NULL, '2026-10-10 12:29:51', '2026-10-10 12:29:51');
INSERT INTO `blogs` (`id`, `title`, `slug`, `category_tag`, `excerpt`, `content`, `featured_image`, `read_time`, `published_at`, `is_published`, `meta_title`, `meta_description`, `meta_keywords`, `canonical_url`, `created_at`, `updated_at`) VALUES ('5', 'Patient Selection and Informed Consent in Practice', 'patient-selection-and-informed-consent', 'Patient Safety', 'Why careful selection and a transparent consent conversation are central to responsible care.', '<p>Patient selection is often described as the single most critical decision in aesthetic and elective medicine. Choosing the right patient for the right procedure is the foundation of patient satisfaction.</p>
<h2>Managing Expectations</h2>
<p>Aligning patient expectations with clinical reality prevents disappointment and disputes. Honest communication regarding what a procedure can and cannot achieve builds lasting trust.</p>', NULL, '4', '2026-09-05 00:00:00', '1', 'Patient Selection and Informed Consent in Practice | HOK Academy', 'Why careful selection and a transparent consent conversation are central to responsible care.', 'patient selection, informed consent, clinical practice ethics', NULL, '2026-10-10 12:29:51', '2026-10-10 12:29:51');
INSERT INTO `blogs` (`id`, `title`, `slug`, `category_tag`, `excerpt`, `content`, `featured_image`, `read_time`, `published_at`, `is_published`, `meta_title`, `meta_description`, `meta_keywords`, `canonical_url`, `created_at`, `updated_at`) VALUES ('6', 'Hair Restoration: The Basics of Assessment', 'hair-restoration-assessment-basics', 'Aesthetic Medicine', 'How a structured assessment shapes planning and expectations in hair restoration.', '<p>Hair restoration surgery requires both surgical precision and artistic design. Before any graft is harvested, a thorough trichological and systemic assessment is mandatory.</p>
<h2>Evaluating the Donor Area</h2>
<p>Assessing donor hair density, follicle caliber, scalp laxity, and safe donor zone boundaries ensures long-term viability of transplanted grafts without causing donor depletion.</p>', NULL, '6', '2026-08-29 00:00:00', '1', 'Hair Restoration: The Basics of Assessment | HOK Academy', 'How a structured assessment shapes planning and expectations in hair restoration surgery.', 'hair restoration assessment, FUE planning, trichology examination', NULL, '2026-10-10 12:29:51', '2026-10-10 12:29:51');
INSERT INTO `blogs` (`id`, `title`, `slug`, `category_tag`, `excerpt`, `content`, `featured_image`, `read_time`, `published_at`, `is_published`, `meta_title`, `meta_description`, `meta_keywords`, `canonical_url`, `created_at`, `updated_at`) VALUES ('7', 'Infection Prevention in the Procedure Room', 'infection-prevention-in-the-procedure-room', 'Nursing & OT', 'Everyday habits and protocols that keep procedure rooms and operation theatres safe.', '<p>Strict aseptic techniques and infection control protocols in clinical procedure rooms safeguard both patients and medical staff against healthcare-associated infections.</p>
<h2>Standard Precautions & Sterilisation</h2>
<p>Adhering to high-level disinfection, proper autoclave cycles, single-use disposables, and hand hygiene protocols is essential in every medical environment.</p>', NULL, '5', '2026-08-22 00:00:00', '1', 'Infection Prevention in the Procedure Room | HOK Academy', 'Everyday habits and protocols that keep procedure rooms and operation theatres safe.', 'infection prevention, procedure room safety, OT sterile protocols', NULL, '2026-10-10 12:29:51', '2026-10-10 12:29:51');
INSERT INTO `blogs` (`id`, `title`, `slug`, `category_tag`, `excerpt`, `content`, `featured_image`, `read_time`, `published_at`, `is_published`, `meta_title`, `meta_description`, `meta_keywords`, `canonical_url`, `created_at`, `updated_at`) VALUES ('8', 'Why Case-Based Learning Matters', 'why-case-based-learning-matters', 'Clinical Education', 'How discussing real clinical cases builds judgement beyond textbook knowledge.', '<p>Textbooks provide theory, but clinical cases provide context. Case-based discussions help practitioners navigate nuanced scenarios where guidelines must be adapted to individual patients.</p>', NULL, '4', '2026-08-15 00:00:00', '1', 'Why Case-Based Learning Matters | HOK Academy', 'How discussing real clinical cases builds judgement beyond textbook knowledge.', 'case based learning, clinical reasoning, medical education methodology', NULL, '2026-10-10 12:29:51', '2026-10-10 12:29:51');
INSERT INTO `blogs` (`id`, `title`, `slug`, `category_tag`, `excerpt`, `content`, `featured_image`, `read_time`, `published_at`, `is_published`, `meta_title`, `meta_description`, `meta_keywords`, `canonical_url`, `created_at`, `updated_at`) VALUES ('9', 'The Role of the Surgical Assistant', 'the-role-of-the-surgical-assistant', 'Nursing & OT', 'What good surgical assistance looks like before, during and after a procedure.', '<p>A skilled surgical assistant is the backbone of an efficient, calm, and safe operating room. Anticipating the surgeon\'s moves and maintaining an immaculate sterile field are vital skills.</p>', NULL, '5', '2026-08-08 00:00:00', '1', 'The Role of the Surgical Assistant | HOK Academy', 'What good surgical assistance looks like before, during and after a procedure.', 'surgical assistant, OT scrub nurse, surgical protocols', NULL, '2026-10-10 12:29:51', '2026-10-10 12:29:51');
INSERT INTO `blogs` (`id`, `title`, `slug`, `category_tag`, `excerpt`, `content`, `featured_image`, `read_time`, `published_at`, `is_published`, `meta_title`, `meta_description`, `meta_keywords`, `canonical_url`, `created_at`, `updated_at`) VALUES ('10', 'Colour Theory for Medical PMU', 'colour-theory-for-medical-pmu', 'PMU', 'Undertones, pigment behaviour and colour matching explained for restorative work.', '<p>Medical micropigmentation requires an understanding of skin undertones, light reflection, and pigment degradation over time to achieve natural-looking camouflage results.</p>', NULL, '6', '2026-08-01 00:00:00', '1', 'Colour Theory for Medical PMU | HOK Academy', 'Undertones, pigment behaviour and colour matching explained for restorative medical PMU.', 'PMU colour theory, medical camouflage pigments, skin undertone matching', NULL, '2026-10-10 12:29:51', '2026-10-10 12:29:51');
INSERT INTO `blogs` (`id`, `title`, `slug`, `category_tag`, `excerpt`, `content`, `featured_image`, `read_time`, `published_at`, `is_published`, `meta_title`, `meta_description`, `meta_keywords`, `canonical_url`, `created_at`, `updated_at`) VALUES ('11', 'An Introduction to Endourology', 'an-introduction-to-endourology', 'Surgery', 'A beginner-friendly overview of endoscopic urology and the techniques involved.', '<p>Endourology represents the minimally invasive standard of care in modern urology, transforming the management of nephrolithiasis and lower urinary tract disorders.</p>', NULL, '7', '2026-07-25 00:00:00', '1', 'An Introduction to Endourology | HOK Academy', 'A beginner-friendly overview of endoscopic urology and the techniques involved.', 'endourology, urological surgery, RIRS, PCNL overview', NULL, '2026-10-10 12:29:51', '2026-10-10 12:29:51');
INSERT INTO `blogs` (`id`, `title`, `slug`, `category_tag`, `excerpt`, `content`, `featured_image`, `read_time`, `published_at`, `is_published`, `meta_title`, `meta_description`, `meta_keywords`, `canonical_url`, `created_at`, `updated_at`) VALUES ('12', 'Continuous Learning in Modern Medicine', 'continuous-learning-in-modern-medicine', 'Clinical Education', 'Why professional development is an ongoing journey rather than a one-time training.', '<p>Medicine evolves continually with new evidence, techniques, and technologies. Committing to lifelong learning is the defining mark of a progressive healthcare professional.</p>', NULL, '4', '2026-07-18 00:00:00', '1', 'Continuous Learning in Modern Medicine | HOK Academy', 'Why professional development is an ongoing journey rather than a one-time training.', 'continuous medical education, professional development, clinical excellence', NULL, '2026-10-10 12:29:51', '2026-10-10 12:29:51');
INSERT INTO `blogs` (`id`, `title`, `slug`, `category_tag`, `excerpt`, `content`, `featured_image`, `read_time`, `published_at`, `is_published`, `meta_title`, `meta_description`, `meta_keywords`, `canonical_url`, `created_at`, `updated_at`) VALUES ('13', 'How International Collaboration Strengthens Medical Education', 'how-international-collaboration-strengthens-education', 'International', 'Knowledge exchange across borders brings new perspectives to clinical practice.', '<p>Cross-border academic partnerships and global knowledge exchange foster broader clinical insight and elevate the quality of medical training worldwide.</p>', NULL, '5', '2026-07-11 00:00:00', '1', 'How International Collaboration Strengthens Medical Education | HOK Academy', 'Knowledge exchange across borders brings new perspectives to clinical practice.', 'international medical collaboration, global healthcare education, medical partnerships', NULL, '2026-10-10 12:29:51', '2026-10-10 12:29:51');
INSERT INTO `blogs` (`id`, `title`, `slug`, `category_tag`, `excerpt`, `content`, `featured_image`, `read_time`, `published_at`, `is_published`, `meta_title`, `meta_description`, `meta_keywords`, `canonical_url`, `created_at`, `updated_at`) VALUES ('14', 'Medical Nutrition and Weight Management: An Overview', 'medical-nutrition-and-weight-management-overview', 'Clinical Education', 'Clinical nutrition, metabolic health and structured approaches to weight management.', '<p>Integrating evidence-based clinical nutrition and metabolic health strategies enables medical practitioners to address chronic lifestyle diseases effectively.</p>', NULL, '6', '2026-07-04 00:00:00', '1', 'Medical Nutrition and Weight Management: An Overview | HOK Academy', 'Clinical nutrition, metabolic health and structured approaches to weight management.', 'medical nutrition, weight management, metabolic health, clinical dietetics', NULL, '2026-10-10 12:29:51', '2026-10-10 12:29:51');

-- --------------------------------------------------------
-- Table structure for table `inquiries`
-- --------------------------------------------------------

DROP TABLE IF EXISTS `inquiries`;
CREATE TABLE IF NOT EXISTS `inquiries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL DEFAULT 'contact',
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(100) NULL,
  `subject` varchar(255) NULL,
  `program_interest` varchar(255) NULL,
  `message` text NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'new',
  `admin_notes` text NULL,
  `ip_address` varchar(45) NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table structure for table `why_features`
-- --------------------------------------------------------

DROP TABLE IF EXISTS `why_features`;
CREATE TABLE IF NOT EXISTS `why_features` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL DEFAULT 'why_hok',
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NULL,
  `description` text NOT NULL,
  `icon` varchar(100) NULL,
  `badge` varchar(100) NULL,
  `order` int NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table `why_features`
-- --------------------------------------------------------

INSERT INTO `why_features` (`id`, `type`, `anchor_id`, `title`, `subtitle`, `description`, `strong_text`, `image`, `icon`, `tone_class`, `chips`, `is_wide`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES ('1', 'why_hok', NULL, 'Multidisciplinary Faculty', NULL, 'Access expertise across medical, surgical, aesthetic and allied disciplines. Different Specialities. Multiple Perspectives. One Academic Platform.', 'Access expertise across medical, surgical, aesthetic and allied disciplines.', 'assets/img/why/faculty.webp', 'bi-diagram-3', 'c-navy', NULL, '1', '1', '1', '2026-10-10 12:29:51', '2026-10-10 12:29:51');
INSERT INTO `why_features` (`id`, `type`, `anchor_id`, `title`, `subtitle`, `description`, `strong_text`, `image`, `icon`, `tone_class`, `chips`, `is_wide`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES ('2', 'why_hok', NULL, 'Specialist-Led Education', NULL, 'Our focus is on connecting learners with specialist knowledge, clinical experience and contemporary approaches to medical practice.', 'Learn from practising professionals with experience in their respective fields.', 'assets/img/why/specialist.webp', 'bi-award', 'c-teal', NULL, '0', '2', '1', '2026-10-10 12:29:51', '2026-10-10 12:29:51');
INSERT INTO `why_features` (`id`, `type`, `anchor_id`, `title`, `subtitle`, `description`, `strong_text`, `image`, `icon`, `tone_class`, `chips`, `is_wide`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES ('3', 'why_hok', NULL, 'Clinical + Technology Focus', NULL, 'Explore the science, technology, patient selection, safety and clinical decision-making that support responsible clinical practice.', 'Understand more than just a procedure.', 'assets/img/why/technology.webp', 'bi-cpu', 'c-blue', NULL, '0', '3', '1', '2026-10-10 12:29:51', '2026-10-10 12:29:51');
INSERT INTO `why_features` (`id`, `type`, `anchor_id`, `title`, `subtitle`, `description`, `strong_text`, `image`, `icon`, `tone_class`, `chips`, `is_wide`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES ('4', 'why_hok', NULL, 'Practical Learning', NULL, 'Depending on the program, learning may include demonstrations, case discussions, simulation, workshops, and supervised clinical practice.', 'Move beyond conventional classroom learning.', 'assets/img/why/practical.webp', 'bi-tools', 'c-red', '[\"Demonstrations\",\"Case Discussions\",\"Simulation\",\"Workshops\",\"Supervised Practical Learning\"]', '0', '4', '1', '2026-10-10 12:29:51', '2026-10-10 12:29:51');
INSERT INTO `why_features` (`id`, `type`, `anchor_id`, `title`, `subtitle`, `description`, `strong_text`, `image`, `icon`, `tone_class`, `chips`, `is_wide`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES ('5', 'why_hok', NULL, 'Cross-Disciplinary Exposure', NULL, 'Our multidisciplinary environment allows professionals to explore perspectives beyond their primary speciality and understand how different clinical disciplines intersect.', 'Medicine does not exist in isolated disciplines.', 'assets/img/why/cross-disciplinary.webp', 'bi-intersect', 'c-navy', NULL, '0', '5', '1', '2026-10-10 12:29:51', '2026-10-10 12:29:51');
INSERT INTO `why_features` (`id`, `type`, `anchor_id`, `title`, `subtitle`, `description`, `strong_text`, `image`, `icon`, `tone_class`, `chips`, `is_wide`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES ('6', 'why_hok', NULL, 'Focus on Patient Safety', NULL, 'Patient selection, informed consent, infection prevention and complication awareness are central to everything we teach.', 'Responsible practice is safe practice.', 'assets/img/why/safety.webp', 'bi-shield-check', 'c-teal', NULL, '0', '6', '1', '2026-10-10 12:29:51', '2026-10-10 12:29:51');
INSERT INTO `why_features` (`id`, `type`, `anchor_id`, `title`, `subtitle`, `description`, `strong_text`, `image`, `icon`, `tone_class`, `chips`, `is_wide`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES ('7', 'philosophy', 'scientific', 'Scientific Foundations', 'Building Knowledge That Supports Clinical Practice', 'HOK Academy emphasizes structured medical knowledge and scientific foundations as the basis for understanding clinical techniques, technologies and evolving approaches to healthcare.', 'Strong clinical practice begins with a clear understanding of scientific principles.', NULL, 'bi-journal-medical', 'c-navy', NULL, '0', '1', '1', '2026-10-10 12:29:51', '2026-10-10 12:29:51');
INSERT INTO `why_features` (`id`, `type`, `anchor_id`, `title`, `subtitle`, `description`, `strong_text`, `image`, `icon`, `tone_class`, `chips`, `is_wide`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES ('8', 'philosophy', 'reasoning', 'Clinical Reasoning', 'Connecting Knowledge with Clinical Thinking', 'Our approach encourages clinical reasoning, structured thinking and informed decision-making, helping learners connect academic knowledge with different clinical scenarios.', 'Medical education is not only about knowing information—it is also about understanding how that knowledge applies to clinical situations.', NULL, 'bi-lightbulb', 'c-teal', NULL, '0', '2', '1', '2026-10-10 12:29:51', '2026-10-10 12:29:51');
INSERT INTO `why_features` (`id`, `type`, `anchor_id`, `title`, `subtitle`, `description`, `strong_text`, `image`, `icon`, `tone_class`, `chips`, `is_wide`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES ('9', 'philosophy', 'practical', 'Practical Learning', 'Bridging the Gap Between Concept and Application', 'Our programs prioritize demonstration, simulation, hands-on practice, and structured observation under expert supervision.', 'Hands-on exposure and practical observation turn theory into competence.', NULL, 'bi-tools', 'c-blue', NULL, '0', '3', '1', '2026-10-10 12:29:51', '2026-10-10 12:29:51');
INSERT INTO `why_features` (`id`, `type`, `anchor_id`, `title`, `subtitle`, `description`, `strong_text`, `image`, `icon`, `tone_class`, `chips`, `is_wide`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES ('10', 'philosophy', 'case', 'Case-Based Learning', 'Navigating Nuanced Real-World Clinical Challenges', 'Through in-depth case discussions, learners explore patient variations, treatment selection criteria, complications, and evidence-based problem solving.', 'Real patient cases teach what textbook slides cannot.', NULL, 'bi-clipboard2-pulse', 'c-red', NULL, '0', '4', '1', '2026-10-10 12:29:51', '2026-10-10 12:29:51');
INSERT INTO `why_features` (`id`, `type`, `anchor_id`, `title`, `subtitle`, `description`, `strong_text`, `image`, `icon`, `tone_class`, `chips`, `is_wide`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES ('11', 'philosophy', 'safety', 'Patient Safety & Ethics', 'Putting the Patient at the Center of Every Decision', 'We instill deep respect for patient consent, aseptic standards, anatomical danger zones, and emergency protocols in every training module.', 'Excellence is measured not only by aesthetic outcome but by uncompromising safety.', NULL, 'bi-shield-check', 'c-navy', NULL, '0', '5', '1', '2026-10-10 12:29:51', '2026-10-10 12:29:51');
INSERT INTO `why_features` (`id`, `type`, `anchor_id`, `title`, `subtitle`, `description`, `strong_text`, `image`, `icon`, `tone_class`, `chips`, `is_wide`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES ('12', 'philosophy', 'development', 'Professional Development', 'Nurturing Lifelong Academic & Clinical Growth', 'We support alumni with continuous learning resources, updates on cutting-edge techniques, and academic networking opportunities across borders.', 'Medical learning is a continuous journey of skill refinement.', NULL, 'bi-graph-up-arrow', 'c-teal', NULL, '0', '6', '1', '2026-10-10 12:29:51', '2026-10-10 12:29:51');

SET FOREIGN_KEY_CHECKS=1;
COMMIT;
