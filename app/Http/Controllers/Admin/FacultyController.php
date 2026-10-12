<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FacultyMember;

class FacultyController extends Controller
{
    public function index()
    {
        $faculty = FacultyMember::orderBy('sort_order')->get();
        return view('admin.faculty.index', compact('faculty'));
    }

    public function create()
    {
        return view('admin.faculty.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'speciality' => 'nullable|string|max:255',
            'tag' => 'nullable|string|max:100',
            'tone_class' => 'required|string|max:50',
            'bio' => 'nullable|string|max:1000',
            'skills_chips' => 'nullable|string', // comma separated
            'sort_order' => 'required|integer',
            'is_visiting' => 'boolean',
            'is_active' => 'boolean',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $validated['is_visiting'] = $request->has('is_visiting');
        $validated['is_active'] = $request->has('is_active');

        if (!empty($validated['skills_chips'])) {
            $validated['skills_chips'] = array_filter(array_map('trim', explode(',', $validated['skills_chips'])));
        } else {
            $validated['skills_chips'] = null;
        }

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('faculty', 'public');
            $validated['image'] = 'storage/' . $path;
        }

        FacultyMember::create($validated);

        return redirect()->route('admin.faculty.index')->with('success', 'Faculty member added successfully!');
    }

    public function edit(FacultyMember $faculty)
    {
        return view('admin.faculty.edit', compact('faculty'));
    }

    public function update(Request $request, FacultyMember $faculty)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'speciality' => 'nullable|string|max:255',
            'tag' => 'nullable|string|max:100',
            'tone_class' => 'required|string|max:50',
            'bio' => 'nullable|string|max:1000',
            'skills_chips' => 'nullable|string',
            'sort_order' => 'required|integer',
            'is_visiting' => 'boolean',
            'is_active' => 'boolean',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $validated['is_visiting'] = $request->has('is_visiting');
        $validated['is_active'] = $request->has('is_active');

        if (!empty($validated['skills_chips'])) {
            $validated['skills_chips'] = array_filter(array_map('trim', explode(',', $validated['skills_chips'])));
        } else {
            $validated['skills_chips'] = null;
        }

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('faculty', 'public');
            $validated['image'] = 'storage/' . $path;
        }

        $faculty->update($validated);

        return redirect()->route('admin.faculty.index')->with('success', 'Faculty member updated successfully!');
    }

    public function destroy(FacultyMember $faculty)
    {
        $faculty->delete();
        return redirect()->route('admin.faculty.index')->with('success', 'Faculty member deleted successfully!');
    }
}

