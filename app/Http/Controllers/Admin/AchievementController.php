<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use Illuminate\Http\Request;

class AchievementController extends Controller
{
    public function index()
    {
        $achievements = Achievement::orderBy('order', 'asc')->orderBy('created_at', 'desc')->get();
        return view('admin.achievements.index', compact('achievements'));
    }

    public function create()
    {
        return view('admin.achievements.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_name' => 'required|string|max:255',
            'student_prodi' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'badge_title' => 'required|string|max:100',
            'badge_color' => 'nullable|string|max:100',
            'event_name' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'poster_image' => 'nullable|image|max:10240',
            'order' => 'nullable|integer',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['order'] = $request->order ?? 0;
        $validated['badge_color'] = $request->badge_color ?? 'bg-amber-500 text-slate-950';

        if ($request->hasFile('poster_image')) {
            $path = $request->file('poster_image')->store('achievements', 'public');
            $validated['poster_image'] = '/storage/' . $path;
        }

        Achievement::create($validated);

        return redirect()->route('admin.achievements.index')->with('success', 'Data Prestasi Mahasiswa berhasil ditambahkan!');
    }

    public function edit(Achievement $achievement)
    {
        return view('admin.achievements.edit', compact('achievement'));
    }

    public function update(Request $request, Achievement $achievement)
    {
        $validated = $request->validate([
            'student_name' => 'required|string|max:255',
            'student_prodi' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'badge_title' => 'required|string|max:100',
            'badge_color' => 'nullable|string|max:100',
            'event_name' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'poster_image' => 'nullable|image|max:10240',
            'order' => 'nullable|integer',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['order'] = $request->order ?? 0;

        if ($request->hasFile('poster_image')) {
            $path = $request->file('poster_image')->store('achievements', 'public');
            $validated['poster_image'] = '/storage/' . $path;
        }

        $achievement->update($validated);

        return redirect()->route('admin.achievements.index')->with('success', 'Data Prestasi Mahasiswa berhasil diperbarui!');
    }

    public function destroy(Achievement $achievement)
    {
        $achievement->delete();
        return redirect()->route('admin.achievements.index')->with('success', 'Data Prestasi Mahasiswa berhasil dihapus!');
    }
}
