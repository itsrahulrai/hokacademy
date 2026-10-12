<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\ProgramCategory;
use App\Models\Program;
use App\Models\Setting;

class ProgramController extends Controller
{
    public function index(Request $request)
    {
        $page = Page::where('slug', 'programs')->first();
        $categories = ProgramCategory::with(['programs' => function ($q) {
            $q->where('is_active', true)->orderBy('sort_order');
        }])->where('is_active', true)->orderBy('sort_order')->get();

        $selectedCategory = $request->query('category');

        return view('frontend.programs', compact('page', 'categories', 'selectedCategory'));
    }

    public function show(string $slug)
    {
        $program = Program::with('category')
            ->where(function ($q) use ($slug) {
                $q->where('slug', $slug)->orWhere('anchor', $slug);
            })
            ->where('is_active', true)
            ->firstOrFail();
        
        $relatedPrograms = Program::with('category')
            ->where('category_id', $program->category_id)
            ->where('id', '!=', $program->id)
            ->where('is_active', true)
            ->take(3)
            ->get();

        if ($relatedPrograms->count() < 3) {
            $otherPrograms = Program::with('category')
                ->where('id', '!=', $program->id)
                ->whereNotIn('id', $relatedPrograms->pluck('id'))
                ->where('is_active', true)
                ->take(3 - $relatedPrograms->count())
                ->get();
            $relatedPrograms = $relatedPrograms->concat($otherPrograms);
        }

        return view('frontend.program-details', compact('program', 'relatedPrograms'));
    }
}
