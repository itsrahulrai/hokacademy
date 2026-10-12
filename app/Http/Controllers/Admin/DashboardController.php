<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inquiry;
use App\Models\Blog;
use App\Models\Program;
use App\Models\FacultyMember;
use App\Models\Page;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_inquiries' => Inquiry::count(),
            'new_inquiries' => Inquiry::where('status', 'new')->count(),
            'total_programs' => Program::count(),
            'total_blogs' => Blog::count(),
            'total_faculty' => FacultyMember::count(),
            'total_pages' => Page::count(),
        ];

        $recentInquiries = Inquiry::orderBy('created_at', 'desc')->take(6)->get();
        $recentBlogs = Blog::orderBy('created_at', 'desc')->take(5)->get();
        $recentPrograms = Program::with('category')->orderBy('updated_at', 'desc')->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentInquiries', 'recentBlogs', 'recentPrograms'));
    }
}
