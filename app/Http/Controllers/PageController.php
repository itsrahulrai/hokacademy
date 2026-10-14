<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\WhyFeature;
use App\Models\FacultyMember;
use App\Models\ProgramCategory;

class PageController extends Controller
{
    public function aboutUs()
    {
        $page = Page::where('slug', 'about-us')->first();
        $philosophy = WhyFeature::where('type', 'philosophy')->where('is_active', true)->orderBy('sort_order')->get();
        return view('frontend.about-us', compact('page', 'philosophy'));
    }

    public function visionMission()
    {
        $page = Page::where('slug', 'vision-mission')->first();
        return view('frontend.vision-mission', compact('page'));
    }

    public function whyHok()
    {
        $page = Page::where('slug', 'why-hok')->first();
        $whyFeatures = WhyFeature::where('type', 'why_hok')->where('is_active', true)->orderBy('sort_order')->get();
        return view('frontend.why-hok', compact('page', 'whyFeatures'));
    }

    public function learningPhilosophy()
    {
        $page = Page::where('slug', 'learning-philosophy')->first();
        $philosophy = WhyFeature::where('type', 'philosophy')->where('is_active', true)->orderBy('sort_order')->get();
        return view('frontend.learning-philosophy', compact('page', 'philosophy'));
    }

    public function ourMultidisciplinary()
    {
        $page = Page::where('slug', 'our-multidisciplinary')->first();
        return view('frontend.our-multidisciplinary', compact('page'));
    }

    public function international()
    {
        $page = Page::where('slug', 'international')->first();
        return view('frontend.international', compact('page'));
    }

    public function show(string $slug)
    {
        $page = Page::where('slug', $slug)->where('is_active', true)->firstOrFail();

        if (view()->exists("frontend.{$slug}")) {
            return view("frontend.{$slug}", compact('page'));
        }

        return view('frontend.custom-page', compact('page'));
    }
}

