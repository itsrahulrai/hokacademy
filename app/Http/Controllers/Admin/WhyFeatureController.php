<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WhyFeature;

class WhyFeatureController extends Controller
{
    public function index(Request $request)
    {
        $type = $request->query('type', 'why_hok');
        $features = WhyFeature::where('type', $type)->orderBy('sort_order')->get();

        return view('admin.why_features.index', compact('features', 'type'));
    }

    public function create(Request $request)
    {
        $type = $request->query('type', 'why_hok');
        return view('admin.why_features.create', compact('type'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|string|max:50',
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'anchor_id' => 'nullable|string|max:100',
            'strong_text' => 'nullable|string|max:500',
            'description' => 'nullable|string',
            'icon' => 'required|string|max:100',
            'tone_class' => 'required|string|max:50',
            'chips' => 'nullable|string',
            'sort_order' => 'required|integer',
            'is_wide' => 'boolean',
            'is_active' => 'boolean',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $validated['is_wide'] = $request->has('is_wide');
        $validated['is_active'] = $request->has('is_active');

        if (!empty($validated['chips'])) {
            $validated['chips'] = array_filter(array_map('trim', explode(',', $validated['chips'])));
        } else {
            $validated['chips'] = null;
        }

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('why', 'public');
            $validated['image'] = 'storage/' . $path;
        }

        WhyFeature::create($validated);

        return redirect()->route('admin.why-features.index', ['type' => $validated['type']])
            ->with('success', 'Feature created successfully!');
    }

    public function edit(WhyFeature $whyFeature)
    {
        return view('admin.why_features.edit', compact('whyFeature'));
    }

    public function update(Request $request, WhyFeature $whyFeature)
    {
        $validated = $request->validate([
            'type' => 'required|string|max:50',
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'anchor_id' => 'nullable|string|max:100',
            'strong_text' => 'nullable|string|max:500',
            'description' => 'nullable|string',
            'icon' => 'required|string|max:100',
            'tone_class' => 'required|string|max:50',
            'chips' => 'nullable|string',
            'sort_order' => 'required|integer',
            'is_wide' => 'boolean',
            'is_active' => 'boolean',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $validated['is_wide'] = $request->has('is_wide');
        $validated['is_active'] = $request->has('is_active');

        if (!empty($validated['chips'])) {
            $validated['chips'] = array_filter(array_map('trim', explode(',', $validated['chips'])));
        } else {
            $validated['chips'] = null;
        }

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('why', 'public');
            $validated['image'] = 'storage/' . $path;
        }

        $whyFeature->update($validated);

        return redirect()->route('admin.why-features.index', ['type' => $validated['type']])
            ->with('success', 'Feature updated successfully!');
    }

    public function destroy(WhyFeature $whyFeature)
    {
        $type = $whyFeature->type;
        $whyFeature->delete();

        return redirect()->route('admin.why-features.index', ['type' => $type])
            ->with('success', 'Feature deleted successfully!');
    }
}

