<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\HeroSlide;
use App\Models\ProgramCategory;
use App\Models\Program;
use App\Models\FacultyMember;
use App\Models\Blog;
use App\Models\WhyFeature;

class HomeController extends Controller
{
    public function index()
    {
        $page = Page::where('slug', 'home')->first();
        $slides = HeroSlide::where('is_active', true)->orderBy('sort_order')->get();
        $categories = ProgramCategory::with(['programs' => function ($q) {
            $q->where('is_active', true)->orderBy('sort_order');
        }])->where('is_active', true)->orderBy('sort_order')->get();
        
        $featuredPrograms = Program::where('is_active', true)->where('is_featured', true)->orderBy('sort_order')->take(6)->get();
        $faculty = FacultyMember::where('is_active', true)->orderBy('sort_order')->take(4)->get();
        $recentBlogs = Blog::where('is_published', true)->orderByRaw('COALESCE(published_at, created_at) DESC')->take(3)->get();
        $whyFeatures = WhyFeature::where('type', 'why_hok')->where('is_active', true)->orderBy('sort_order')->get();
        $philosophy = WhyFeature::where('type', 'philosophy')->where('is_active', true)->orderBy('sort_order')->get();

        return view('frontend.index', compact(
            'page',
            'slides',
            'categories',
            'featuredPrograms',
            'faculty',
            'recentBlogs',
            'whyFeatures',
            'philosophy'
        ));
    }
}

