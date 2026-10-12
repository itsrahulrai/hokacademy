<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\FacultyMember;

class FacultyController extends Controller
{
    public function index()
    {
        $page = Page::where('slug', 'faculty')->first();
        $faculty = FacultyMember::where('is_active', true)->orderBy('sort_order')->get();

        return view('frontend.faculty', compact('page', 'faculty'));
    }
}

