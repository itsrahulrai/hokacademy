<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Program;
use App\Models\ProgramCategory;
use App\Services\ProgramAiService;

class ProgramController extends Controller
{
    public function index(Request $request)
    {
        $query = Program::with('category')->orderBy('category_id')->orderBy('sort_order');

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('short_description', 'like', "%{$search}%");
            });
        }

        $programs = $query->paginate(15)->withQueryString();
        $categories = ProgramCategory::orderBy('sort_order')->get();

        return view('admin.programs.index', compact('programs', 'categories'));
    }

    public function create()
    {
        $categories = ProgramCategory::orderBy('sort_order')->get();
        return view('admin.programs.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:program_categories,id',
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:programs,slug',
            'short_description' => 'required|string|max:500',
            'full_description' => 'nullable|string',
            'icon' => 'nullable|string|max:100',
            'duration' => 'nullable|string|max:150',
            'eligibility' => 'nullable|string|max:255',
            'certification' => 'nullable|string|max:255',
            'highlights' => 'nullable|string', // newline separated
            'sort_order' => 'required|integer',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string|max:500',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $validated['slug'] = !empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['title']);
        $validated['is_featured'] = $request->has('is_featured');
        $validated['is_active'] = $request->has('is_active');

        if (!empty($validated['highlights'])) {
            $validated['highlights'] = array_filter(array_map('trim', explode("\n", $validated['highlights'])));
        } else {
            $validated['highlights'] = null;
        }

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('programs', 'public');
            $validated['image'] = 'storage/' . $path;
        }

        Program::create($validated);

        return redirect()->route('admin.programs.index')->with('success', 'Program created successfully!');
    }

    public function edit(Program $program)
    {
        $categories = ProgramCategory::orderBy('sort_order')->get();
        return view('admin.programs.edit', compact('program', 'categories'));
    }

    public function update(Request $request, Program $program)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:program_categories,id',
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:programs,slug,' . $program->id,
            'short_description' => 'required|string|max:500',
            'full_description' => 'nullable|string',
            'icon' => 'nullable|string|max:100',
            'duration' => 'nullable|string|max:150',
            'eligibility' => 'nullable|string|max:255',
            'certification' => 'nullable|string|max:255',
            'highlights' => 'nullable|string',
            'sort_order' => 'required|integer',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string|max:500',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $validated['slug'] = Str::slug($validated['slug']);
        $validated['is_featured'] = $request->has('is_featured');
        $validated['is_active'] = $request->has('is_active');

        if (!empty($validated['highlights'])) {
            $validated['highlights'] = array_filter(array_map('trim', explode("\n", $validated['highlights'])));
        } else {
            $validated['highlights'] = null;
        }

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('programs', 'public');
            $validated['image'] = 'storage/' . $path;
        }

        $program->update($validated);

        return redirect()->route('admin.programs.index')->with('success', 'Program updated successfully!');
    }

    public function destroy(Program $program)
    {
        $program->delete();
        return redirect()->route('admin.programs.index')->with('success', 'Program deleted successfully!');
    }

    public function generateAiContent(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'nullable|exists:program_categories,id',
            'custom_prompt' => 'nullable|string|max:1000',
            'target' => 'nullable|string|in:all,short_description,full_description',
        ]);

        $categoryName = '';
        if (!empty($validated['category_id'])) {
            $cat = ProgramCategory::find($validated['category_id']);
            if ($cat) {
                $categoryName = $cat->name;
            }
        }

        $target = $validated['target'] ?? 'all';

        $result = ProgramAiService::generateContent(
            $validated['title'],
            $categoryName,
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
            'message' => 'Unable to generate course content at this moment. Please try again.'
        ], 500);
    }
}

