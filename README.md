# HOK Academy - Dynamic Laravel 12 & MySQL Application

A modern, high-performance, full-featured web application for **HOK Academy** built with **Laravel 12**, **Blade templating**, **Bootstrap 5**, and **MySQL**.

---

## 🌟 Key Features

1. **100% Dynamic Content & Pixel-Perfect Design**:
   - Seamlessly preserved the original Bootstrap 5 design, typography, brand colors, carousels, responsive navigation, and animations.
   - All text, hero sliders, statistical badges, and promotional banners can be updated from the Admin Dashboard without touching any HTML/CSS code.

2. **Complete Admin Dashboard (`/admin`)**:
   - **Dashboard Overview**: Quick KPIs (total programs, categories, blogs, inquiries, published pages).
   - **Page & SEO Management**: Full control over meta titles, meta descriptions, focus keywords, Open Graph image URLs, and canonical tags for all 11 site pages.
   - **Hero Slides Manager**: Manage slider titles, highlight phrases, CTA buttons, background images, review badges, and display order.
   - **Program Categories & Academic Programs**: Add/Edit/Delete programs across Art & Design, Tech & Computing, Business & Management, Media & Communication with dynamic curriculums, learning outcomes, career paths, tuition fees, and admission requirements.
   - **Faculty Management**: Profile photos, designations, qualifications, bios, contact details, and LinkedIn links.
   - **Blog & Article Management**: Rich text content formatting, slugs, categories, tags, read times, featured images, author details, and SEO metadata.
   - **Lead & Inquiry Management**: Real-time logging of contact and program enquiry forms with status workflows (`new`, `in_progress`, `resolved`), contact notes, and direct email/phone contact buttons.
   - **Global Site Settings**: Update Academy name, tagline, phones, primary emails, physical address, Google Maps embed URL, social media links (Instagram, Facebook, LinkedIn, YouTube, X), header notification bars, and copyright notices.
   - **Admin Profile & Password**: Change admin display name, email, and password securely.

3. **SEO Optimized**:
   - Semantic HTML5, dynamic Meta Title, Meta Description, Keywords, Canonical URL, OpenGraph tags (`og:title`, `og:description`, `og:image`, `og:url`), and Twitter Cards on every page and blog post.

---

## 🔐 Admin Login Credentials

- **Admin URL**: `http://127.0.0.1:8000/admin` (or `https://your-domain.com/admin`)
- **Email**: `admin@hokacademy.com`
- **Password**: `admin123`

---

## 🚀 Installation & Setup Guide

### Option 1: Quick Local Setup (with PHP built-in server)

1. **Extract Project**:
   Extract `hokacademy_laravel_mysql.zip` to your web server directory (e.g. `c:\laragon\www\hokacademy` or `C:\xampp\htdocs\hokacademy`).

2. **Configure `.env`**:
   Copy `.env.example` to `.env` if not already present:
   ```bash
   cp .env.example .env
   ```
   Set your MySQL database credentials:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=hokacademy
   DB_USERNAME=root
   DB_PASSWORD=
   ```

3. **Import Database**:
   Create a new database named `hokacademy` in MySQL / phpMyAdmin.
   Import the included `hokacademy.sql` file:
   ```bash
   mysql -u root -p hokacademy < hokacademy.sql
   ```
   *Or run Laravel migrations & seeders:*
   ```bash
   php artisan migrate:fresh --seed
   ```

4. **Generate Storage Symlink**:
   ```bash
   php artisan storage:link
   ```

5. **Start Application**:
   ```bash
   php artisan serve
   ```
   Open your browser at `http://127.0.0.1:8000`.

---

### Option 2: Live Server / cPanel / Shared Hosting Setup

1. **Upload Files**:
   Upload and extract the zip archive into your cPanel `public_html` (or subfolder/domain root).
2. **Setup Document Root**:
   Point your domain or subdomain Document Root to the `public/` directory (e.g. `public_html/public` or move `public` contents with proper `index.php` paths).
3. **Create MySQL Database**:
   Create a MySQL Database & User in cPanel > MySQL Databases, assign all privileges.
4. **Import `hokacademy.sql`**:
   Open phpMyAdmin > Select your database > Click **Import** > Choose `hokacademy.sql` > Click **Go**.
5. **Update `.env`**:
   Fill in your live `APP_URL`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`.
6. **Set Permissions**:
   Ensure `storage/` and `bootstrap/cache/` are writable (`chmod 775` or `chmod 777`).

---

## 📁 Directory Structure Overview

- `app/Http/Controllers/` - Frontend Controllers (`HomeController`, `PageController`, `ProgramController`, `FacultyController`, `BlogController`, `ContactController`)
- `app/Http/Controllers/Admin/` - 12 Admin CRUD Controllers with secure middleware authentication
- `app/Models/` - Eloquent Models (`Setting`, `Page`, `HeroSlide`, `ProgramCategory`, `Program`, `FacultyMember`, `Blog`, `Inquiry`, `WhyFeature`)
- `database/migrations/` - 10 schema migrations
- `database/seeders/DatabaseSeeder.php` - Complete seeder with all original static content pre-loaded
- `hokacademy.sql` - Ready-to-import MySQL database dump with all tables and data
- `public/assets/` - CSS styles, brand graphics, faculty images, icons, and JavaScript plugins
- `resources/views/` - Blade views for Frontend (`partials/`, `layouts/`, pages) and Admin (`admin/`)
- `routes/web.php` - Clean routing table with SEO routes and admin routes
- `tests/Feature/WebsiteRenderTest.php` - 20 automated tests validating all pages, forms, and admin functionality
