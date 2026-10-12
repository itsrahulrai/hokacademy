<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Inquiry;
use App\Models\Program;

class ContactController extends Controller
{
    public function index()
    {
        $page = Page::where('slug', 'contact-us')->first();
        $programs = Program::where('is_active', true)->orderBy('title')->get();

        return view('frontend.contact-us', compact('page', 'programs'));
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:2|max:100',
            'email' => 'required|email|max:150',
            'phone' => 'required|string|min:7|max:25',
            'country' => 'nullable|string|max:100',
            'role' => 'nullable|string|max:100',
            'profession_role' => 'nullable|string|max:100',
            'interest' => 'nullable|string|max:150',
            'program_name' => 'nullable|string|max:150',
            'message' => 'required|string|max:3000',
            'consent' => 'nullable',
            'website' => 'nullable|max:0', // Honeypot
        ], [
            'name.required' => 'Please enter your full name.',
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'phone.required' => 'Please enter your phone/WhatsApp number.',
            'message.required' => 'Please enter your message.',
        ]);

        // If honeypot filled by bot, quietly redirect with fake success
        if (!empty($request->website)) {
            return back()->with('success', 'Thank you! Your enquiry has been received.');
        }

        Inquiry::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'country' => $validated['country'] ?? null,
            'profession_role' => $request->input('role') ?? $request->input('profession_role'),
            'program_name' => $request->input('interest') ?? $request->input('program_name'),
            'message' => $validated['message'] ?? null,
            'ip_address' => $request->ip(),
            'status' => 'new',
        ]);

        return back()->with('success', 'Thank you for reaching out! Our academic advisory team will contact you shortly.');
    }
}
