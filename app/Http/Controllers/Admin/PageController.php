<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Str;

class PageController extends Controller
{
    /**
     * Core system pages protected from deletion.
     */
    protected array $systemSlugs = [
        'home',
        'about-us',
        'vision-mission',
        'why-hok',
        'learning-philosophy',
        'our-multidisciplinary',
        'programs',
        'faculty',
        'international',
        'blog',
        'contact-us',
        'thank-you',
    ];

    public function index()
    {
        $pages = Page::orderBy('id')->get();
        $systemSlugs = $this->systemSlugs;
        return view('admin.pages.index', compact('pages', 'systemSlugs'));
    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:pages,slug',
            'header_title' => 'nullable|string|max:255',
            'header_subtitle' => 'nullable|string|max:1000',
            'content' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:1000',
            'meta_keywords' => 'nullable|string|max:1000',
            'canonical_url' => 'nullable|url|max:255',
            'og_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'is_active' => 'nullable',
        ]);

        $rawSlug = !empty($validated['slug']) ? $validated['slug'] : $validated['title'];
        $validated['slug'] = Str::slug($rawSlug);

        // Ensure uniqueness if auto-generated collided
        $baseSlug = $validated['slug'];
        $counter = 1;
        while (Page::where('slug', $validated['slug'])->exists()) {
            $validated['slug'] = $baseSlug . '-' . $counter;
            $counter++;
        }

        $validated['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('og_image')) {
            $path = $request->file('og_image')->store('pages', 'public');
            $validated['og_image'] = 'storage/' . $path;
        }

        $page = Page::create($validated);

        return redirect()->route('admin.pages.index')->with('success', "Page '{$page->title}' created successfully!");
    }

    public function edit(Page $page)
    {
        $isSystem = in_array($page->slug, $this->systemSlugs);
        return view('admin.pages.edit', compact('page', 'isSystem'));
    }

    public function update(Request $request, Page $page)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:pages,slug,' . $page->id,
            'header_title' => 'nullable|string|max:255',
            'header_subtitle' => 'nullable|string|max:1000',
            'content' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:1000',
            'meta_keywords' => 'nullable|string|max:1000',
            'canonical_url' => 'nullable|url|max:255',
            'og_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'is_active' => 'nullable',
        ]);

        // Don't allow changing the slug of core system pages
        if (!in_array($page->slug, $this->systemSlugs) && !empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['slug']);
        } else {
            unset($validated['slug']);
        }

        $validated['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('og_image')) {
            $path = $request->file('og_image')->store('pages', 'public');
            $validated['og_image'] = 'storage/' . $path;
        }

        $page->update($validated);

        return redirect()->route('admin.pages.index')->with('success', "Page '{$page->title}' updated successfully!");
    }

    public function destroy(Page $page)
    {
        if (in_array($page->slug, $this->systemSlugs)) {
            return redirect()->route('admin.pages.index')->with('error', "Core system page '{$page->title}' cannot be deleted.");
        }

        $title = $page->title;
        $page->delete();

        return redirect()->route('admin.pages.index')->with('success', "Page '{$title}' deleted successfully!");
    }
}
