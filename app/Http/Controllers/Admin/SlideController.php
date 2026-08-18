<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    public function index()
    {
        $slides = Slide::orderBy('order', 'asc')->get();
        return view('admin.slides.index', compact('slides'));
    }

    public function create()
    {
        return view('admin.slides.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string',
            'badge' => 'nullable|string|max:100',
            'badge_color' => 'nullable|string|max:100',
            'cta_text' => 'nullable|string|max:100',
            'cta_link' => 'nullable|string|max:255',
            'secondary_text' => 'nullable|string|max:100',
            'secondary_link' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'image_url' => 'nullable|string',
            'image_file' => 'nullable|image|max:3072',
        ]);

        $validated['order'] = $request->input('order', 1);
        $validated['is_active'] = $request->has('is_active');
        $validated['badge'] = $request->input('badge', 'INFO KAMPUS');
        $validated['badge_color'] = $request->input('badge_color', 'bg-amber-500 text-slate-950');

        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('slides', 'public');
            $validated['image'] = '/storage/' . $path;
        } elseif ($request->filled('image_url')) {
            $validated['image'] = $request->image_url;
        } else {
            $validated['image'] = 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=1920&q=80';
        }

        Slide::create($validated);

        return redirect()->route('admin.slides.index')->with('success', 'Slide banner carousel berhasil ditambahkan!');
    }

    public function edit(Slide $slide)
    {
        return view('admin.slides.edit', compact('slide'));
    }

    public function update(Request $request, Slide $slide)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string',
            'badge' => 'nullable|string|max:100',
            'badge_color' => 'nullable|string|max:100',
            'cta_text' => 'nullable|string|max:100',
            'cta_link' => 'nullable|string|max:255',
            'secondary_text' => 'nullable|string|max:100',
            'secondary_link' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'image_url' => 'nullable|string',
            'image_file' => 'nullable|image|max:3072',
        ]);

        $validated['order'] = $request->input('order', 1);
        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('slides', 'public');
            $validated['image'] = '/storage/' . $path;
        } elseif ($request->filled('image_url')) {
            $validated['image'] = $request->image_url;
        }

        $slide->update($validated);

        return redirect()->route('admin.slides.index')->with('success', 'Slide banner carousel berhasil diperbarui!');
    }

    public function destroy(Slide $slide)
    {
        $slide->delete();
        return redirect()->route('admin.slides.index')->with('success', 'Slide banner carousel berhasil dihapus!');
    }
}
