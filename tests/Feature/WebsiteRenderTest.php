<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\ProgramCategory;
use App\Models\Program;
use App\Models\Blog;
use App\Models\Page;
use App\Models\Setting;

class WebsiteRenderTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    public function test_homepage_renders(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('HOK Academy');
        $response->assertSee('Advancing Medical Knowledge');
    }

    public function test_about_us_renders(): void
    {
        $response = $this->get('/about-us');
        $response->assertStatus(200);
        $response->assertSee('About HOK');
    }

    public function test_vision_mission_renders(): void
    {
        $response = $this->get('/vision-mission');
        $response->assertStatus(200);
        $response->assertSee('Vision & Mission');
    }

    public function test_why_hok_renders(): void
    {
        $response = $this->get('/why-hok');
        $response->assertStatus(200);
        $response->assertSee('Why HOK Academy');
    }

    public function test_learning_philosophy_renders(): void
    {
        $response = $this->get('/learning-philosophy');
        $response->assertStatus(200);
        $response->assertSee('Learning Philosophy');
    }

    public function test_our_multidisciplinary_renders(): void
    {
        $response = $this->get('/our-multidisciplinary');
        $response->assertStatus(200);
        $response->assertSee('Our Multidisciplinary Model');
    }

    public function test_programs_page_renders(): void
    {
        $response = $this->get('/programs');
        $response->assertStatus(200);
        $response->assertSee('Medical Training & Courses');
    }

    public function test_program_detail_page_renders(): void
    {
        $response = $this->get('/programs/advanced-injectables');
        $response->assertStatus(200);
        $response->assertSee('Advanced Injectables');
    }

    public function test_faculty_page_renders(): void
    {
        $response = $this->get('/faculty');
        $response->assertStatus(200);
        $response->assertSee('Our Faculty');
    }

    public function test_international_page_renders(): void
    {
        $response = $this->get('/international');
        $response->assertStatus(200);
        $response->assertSee('International');
    }

    public function test_blog_index_renders(): void
    {
        $response = $this->get('/blog');
        $response->assertStatus(200);
        $response->assertSee('Medical Blog & Articles');
    }

    public function test_blog_detail_renders(): void
    {
        $response = $this->get('/blog/choosing-an-advanced-training-pathway-in-aesthetic-medicine');
        $response->assertStatus(200);
        $response->assertSee('Choosing an Advanced Training Pathway in Aesthetic Medicine');
    }

    public function test_contact_page_renders(): void
    {
        $response = $this->get('/contact-us');
        $response->assertStatus(200);
        $response->assertSee('Talk to HOK Academy');
    }

    public function test_contact_form_submission(): void
    {
        $response = $this->post('/contact-submit', [
            'name' => 'Dr. John Doe',
            'email' => 'john.doe@example.com',
            'phone' => '+91 98765 43210',
            'country' => 'India',
            'profession_role' => 'Doctor / Medical Professional',
            'program_name' => 'Advanced Injectables',
            'message' => 'Interested in upcoming batch dates.',
        ]);

        $response->assertSessionHas('success');
        $this->assertDatabaseHas('inquiries', [
            'email' => 'john.doe@example.com',
            'name' => 'Dr. John Doe',
        ]);
    }

    public function test_admin_login_and_dashboard(): void
    {
        $response = $this->get('/admin/login');
        $response->assertStatus(200);

        $loginResponse = $this->post('/admin/login', [
            'email' => 'admin@hokacademy.com',
            'password' => 'admin123',
        ]);
        $loginResponse->assertRedirect(route('admin.dashboard'));

        $user = User::where('email', 'admin@hokacademy.com')->first();
        $dashResponse = $this->actingAs($user)->get('/admin/dashboard');
        $dashResponse->assertStatus(200);
        $dashResponse->assertSee('Dashboard Overview');
    }

    public function test_admin_can_update_page_seo(): void
    {
        $user = User::where('email', 'admin@hokacademy.com')->first();
        $page = Page::where('slug', 'about-us')->first();

        $response = $this->actingAs($user)->put(route('admin.pages.update', $page->id), [
            'title' => 'About HOK Academy Updated',
            'header_title' => 'New Header Title',
            'meta_title' => 'Updated Custom SEO Meta Title',
            'meta_description' => 'Updated Custom SEO Description',
            'meta_keywords' => 'aesthetic, medical, updated',
            'is_active' => '1',
        ]);

        $response->assertRedirect(route('admin.pages.index'));
        $this->assertDatabaseHas('pages', [
            'id' => $page->id,
            'meta_title' => 'Updated Custom SEO Meta Title',
        ]);

        // Verify updated SEO appears on the frontend
        $frontendResponse = $this->get('/about-us');
        $frontendResponse->assertSee('Updated Custom SEO Meta Title');
    }

    public function test_admin_can_create_and_update_program(): void
    {
        $user = User::where('email', 'admin@hokacademy.com')->first();
        $category = ProgramCategory::first();

        $createResponse = $this->actingAs($user)->post(route('admin.programs.store'), [
            'category_id' => $category->id,
            'title' => 'Cosmetic Dermatology Masterclass',
            'slug' => 'cosmetic-dermatology-masterclass',
            'short_description' => 'Advanced hands-on dermatological procedures.',
            'full_description' => 'Detailed curriculum covering lasers, chemical peels and injectables.',
            'duration' => '3 Days',
            'sort_order' => 99,
            'is_active' => '1',
        ]);

        $createResponse->assertRedirect(route('admin.programs.index'));
        $this->assertDatabaseHas('programs', [
            'slug' => 'cosmetic-dermatology-masterclass',
        ]);

        // Test frontend render of new program
        $frontendResponse = $this->get('/programs/cosmetic-dermatology-masterclass');
        $frontendResponse->assertStatus(200);
        $frontendResponse->assertSee('Cosmetic Dermatology Masterclass');
    }

    public function test_admin_can_create_and_update_blog(): void
    {
        $user = User::where('email', 'admin@hokacademy.com')->first();

        $createResponse = $this->actingAs($user)->post(route('admin.blogs.store'), [
            'title' => 'New Surgical Techniques in 2026',
            'slug' => 'new-surgical-techniques-in-2026',
            'category_tag' => 'Surgery',
            'excerpt' => 'An overview of modern minimal access surgery.',
            'content' => '<p>Robotic and laser technologies in surgery.</p>',
            'read_time' => 4,
            'is_published' => '1',
        ]);

        $createResponse->assertRedirect(route('admin.blogs.index'));
        $this->assertDatabaseHas('blogs', [
            'slug' => 'new-surgical-techniques-in-2026',
        ]);

        // Test frontend render of new blog
        $frontendResponse = $this->get('/blog/new-surgical-techniques-in-2026');
        $frontendResponse->assertStatus(200);
        $frontendResponse->assertSee('New Surgical Techniques in 2026');
    }

    public function test_admin_can_update_settings(): void
    {
        $user = User::where('email', 'admin@hokacademy.com')->first();

        $response = $this->actingAs($user)->post(route('admin.settings.update'), [
            'site_title' => 'HOK Academy Global Medical Centre',
            'contact_phone' => '+91 98888 77777',
            'contact_email' => 'admissions@hokacademy.com',
        ]);

        $response->assertRedirect(route('admin.settings.index'));
        $this->assertEquals('HOK Academy Global Medical Centre', Setting::get('site_title'));
        $this->assertEquals('+91 98888 77777', Setting::get('contact_phone'));

        // Verify updated contact appears on the frontend
        $frontendResponse = $this->get('/contact-us');
        $frontendResponse->assertSee('+91 98888 77777');
        $frontendResponse->assertSee('admissions@hokacademy.com');
    }
}

