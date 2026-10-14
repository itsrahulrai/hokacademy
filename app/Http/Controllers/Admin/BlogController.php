<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Blog;
use App\Services\BlogAiService;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = Blog::orderBy('published_at', 'desc');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('category_tag', 'like', "%{$search}%");
            });
        }

        $blogs = $query->paginate(15)->withQueryString();

        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blogs,slug',
            'category_tag' => 'required|string|max:100',
            'excerpt' => 'nullable|string|max:1000',
            'content' => 'required|string',
            'read_time' => 'required|integer|min:1',
            'published_at' => 'nullable|date',
            'is_published' => 'boolean',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string|max:500',
            'canonical_url' => 'nullable|url|max:255',
            'featured_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $validated['slug'] = !empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['title']);
        $validated['is_published'] = $request->has('is_published');
        $validated['published_at'] = $validated['published_at'] ?? now();

        if ($request->hasFile('featured_image')) {
            $path = $request->file('featured_image')->store('blogs', 'public');
            $validated['featured_image'] = 'storage/' . $path;
        }

        Blog::create($validated);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog created successfully!');
    }

    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:blogs,slug,' . $blog->id,
            'category_tag' => 'required|string|max:100',
            'excerpt' => 'nullable|string|max:1000',
            'content' => 'required|string',
            'read_time' => 'required|integer|min:1',
            'published_at' => 'nullable|date',
            'is_published' => 'boolean',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string|max:500',
            'canonical_url' => 'nullable|url|max:255',
            'featured_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $validated['slug'] = Str::slug($validated['slug']);
        $validated['is_published'] = $request->has('is_published');

        if ($request->hasFile('featured_image')) {
            $path = $request->file('featured_image')->store('blogs', 'public');
            $validated['featured_image'] = 'storage/' . $path;
        }

        $blog->update($validated);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog updated successfully!');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('admin.blogs.index')->with('success', 'Blog deleted successfully!');
    }

    public function generateAiContent(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_tag' => 'nullable|string|max:100',
            'custom_prompt' => 'nullable|string|max:1000',
            'target' => 'nullable|string|in:all,excerpt,content',
        ]);

        $target = $validated['target'] ?? 'all';

        $result = BlogAiService::generateContent(
            $validated['title'],
            $validated['category_tag'] ?? '',
            $validated['custom_prompt'] ?? '',
            $target
        );

        if ($result['success'] ?? false) {
            return response()->json([
                'success' => true,
                'provider' => $result['provider'] ?? 'AI Assistant',
                'target' => $target,
                'data' => $result['data']
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Unable to generate blog content at this moment. Please try again.'
        ], 500);
    }
}

