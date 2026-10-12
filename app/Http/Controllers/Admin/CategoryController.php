<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\ProgramCategory;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = ProgramCategory::withCount('programs')->orderBy('sort_order')->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'short_name' => 'required|string|max:100',
            'slug' => 'nullable|string|max:100|unique:program_categories,slug',
            'tone_class' => 'required|string|max:50',
            'icon' => 'required|string|max:100',
            'sort_order' => 'required|integer',
            'is_active' => 'boolean',
        ]);

        $validated['slug'] = !empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['name']);
        $validated['is_active'] = $request->has('is_active');

        ProgramCategory::create($validated);

        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully!');
    }

    public function update(Request $request, ProgramCategory $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'short_name' => 'required|string|max:100',
            'slug' => 'required|string|max:100|unique:program_categories,slug,' . $category->id,
            'tone_class' => 'required|string|max:50',
            'icon' => 'required|string|max:100',
            'sort_order' => 'required|integer',
            'is_active' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($validated['slug']);
        $validated['is_active'] = $request->has('is_active');

        $category->update($validated);

        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully!');
    }

    public function destroy(ProgramCategory $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully!');
    }
}

