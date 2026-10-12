<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;

// Admin Controllers
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\PageController as AdminPageController;
use App\Http\Controllers\Admin\HeroSlideController as AdminHeroSlideController;
use App\Http\Controllers\Admin\ProgramController as AdminProgramController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\FacultyController as AdminFacultyController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\WhyFeatureController as AdminWhyFeatureController;
use App\Http\Controllers\Admin\InquiryController as AdminInquiryController;
use App\Http\Controllers\Admin\SettingController as AdminSettingController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about-us', [PageController::class, 'aboutUs'])->name('about.us');
Route::get('/vision-mission', [PageController::class, 'visionMission'])->name('vision.mission');
Route::get('/why-hok', [PageController::class, 'whyHok'])->name('why.hok');
Route::get('/learning-philosophy', [PageController::class, 'learningPhilosophy'])->name('learning.philosophy');
Route::get('/our-multidisciplinary', [PageController::class, 'ourMultidisciplinary'])->name('our.multidisciplinary');
Route::get('/international', [PageController::class, 'international'])->name('international');

// Programs
Route::get('/programs', [ProgramController::class, 'index'])->name('programs.index');
Route::get('/programs/{slug}', [ProgramController::class, 'show'])->name('programs.show');

// Faculty
Route::get('/faculty', [FacultyController::class, 'index'])->name('faculty.index');

// Blog
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

// Contact
Route::get('/contact-us', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact-submit', [ContactController::class, 'submit'])->name('contact.submit');

// Legacy 301 Redirects for .php extensions
Route::redirect('/index.php', '/', 301);
Route::redirect('/about-us.php', '/about-us', 301);
Route::redirect('/vision-mission.php', '/vision-mission', 301);
Route::redirect('/why-hok.php', '/why-hok', 301);
Route::redirect('/learning-philosophy.php', '/learning-philosophy', 301);
Route::redirect('/our-multidisciplinary.php', '/our-multidisciplinary', 301);
Route::redirect('/programs.php', '/programs', 301);
Route::redirect('/faculty.php', '/faculty', 301);
Route::redirect('/international.php', '/international', 301);
Route::redirect('/blog.php', '/blog', 301);
Route::redirect('/contact-us.php', '/contact-us', 301);


/*
|--------------------------------------------------------------------------
| Admin Authentication Routes
|--------------------------------------------------------------------------
*/
// Route alias for login redirect
Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.submit');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

    /*
    |--------------------------------------------------------------------------
    | Protected Admin Routes
    |--------------------------------------------------------------------------
    */
    Route::middleware('auth')->group(function () {
        Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::get('/dashboard', [AdminDashboardController::class, 'index']);

        // Inquiries
        Route::get('/inquiries', [AdminInquiryController::class, 'index'])->name('inquiries.index');
        Route::get('/inquiries/{inquiry}', [AdminInquiryController::class, 'show'])->name('inquiries.show');
        Route::patch('/inquiries/{inquiry}/status', [AdminInquiryController::class, 'updateStatus'])->name('inquiries.status');
        Route::delete('/inquiries/{inquiry}', [AdminInquiryController::class, 'destroy'])->name('inquiries.destroy');

        // Programs & Categories
        Route::resource('programs', AdminProgramController::class);
        Route::resource('categories', AdminCategoryController::class)->except(['create', 'show', 'edit']);

        // Faculty
        Route::resource('faculty', AdminFacultyController::class)->except(['show']);

        // Blogs
        Route::resource('blogs', AdminBlogController::class)->except(['show']);

        // Hero Slides
        Route::resource('hero-slides', AdminHeroSlideController::class)->except(['show']);

        // Why & Philosophy Features
        Route::resource('why-features', AdminWhyFeatureController::class)->except(['show']);

        // Pages & SEO
        Route::resource('pages', AdminPageController::class)->only(['index', 'edit', 'update']);

        // Website Global Settings
        Route::get('/settings', [AdminSettingController::class, 'index'])->name('settings.index');
        Route::post('/settings', [AdminSettingController::class, 'update'])->name('settings.update');

        // Admin Profile
        Route::get('/profile', [AdminProfileController::class, 'index'])->name('profile');
        Route::put('/profile', [AdminProfileController::class, 'update'])->name('profile.update');
    });
});
