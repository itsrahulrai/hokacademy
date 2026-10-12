<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $page = Page::where('slug', 'blog')->first();
        
        $query = Blog::where('is_published', true)->orderBy('published_at', 'desc');

        if ($request->filled('tag')) {
            $query->where('category_tag', $request->tag);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('excerpt', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }

        $blogs = $query->paginate(9)->withQueryString();
        $tags = Blog::where('is_published', true)->whereNotNull('category_tag')->distinct()->pluck('category_tag');
        $recentBlogs = Blog::where('is_published', true)->orderBy('published_at', 'desc')->take(5)->get();

        return view('frontend.blog', compact('page', 'blogs', 'tags', 'recentBlogs'));
    }

    public function show(string $slug)
    {
        $blog = Blog::where('slug', $slug)->where('is_published', true)->firstOrFail();
        
        $recentBlogs = Blog::where('is_published', true)
            ->where('id', '!=', $blog->id)
            ->orderBy('published_at', 'desc')
            ->take(5)
            ->get();
            
        $relatedBlogs = Blog::where('is_published', true)
            ->where('category_tag', $blog->category_tag)
            ->where('id', '!=', $blog->id)
            ->take(3)
            ->get();

        $categories = Blog::where('is_published', true)
            ->whereNotNull('category_tag')
            ->selectRaw('category_tag, count(*) as post_count')
            ->groupBy('category_tag')
            ->orderBy('category_tag')
            ->get();

        $newerBlog = Blog::where('is_published', true)
            ->where('published_at', '>', $blog->published_at)
            ->orderBy('published_at', 'asc')
            ->first();

        $olderBlog = Blog::where('is_published', true)
            ->where('published_at', '<', $blog->published_at)
            ->orderBy('published_at', 'desc')
            ->first();

        return view('frontend.blog-details', compact('blog', 'recentBlogs', 'relatedBlogs', 'categories', 'newerBlog', 'olderBlog'));
    }
}
