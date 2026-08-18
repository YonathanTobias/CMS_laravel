<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProgramStudiController extends Controller
{
    public function index()
    {
        $prodis = ProgramStudi::all();
        return view('admin.prodi.index', compact('prodis'));
    }

    public function create()
    {
        return view('admin.prodi.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'degree' => 'required|string',
            'accreditation' => 'required|string',
            'description' => 'required|string',
            'curriculum_summary' => 'nullable|string',
            'career_prospects' => 'nullable|string',
            'icon' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $validated['slug'] = Str::slug($request->name);
        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('prodi', 'public');
            $validated['image'] = '/storage/' . $path;
        }

        ProgramStudi::create($validated);

        return redirect()->route('admin.prodi.index')->with('success', 'Data Program Studi berhasil ditambahkan!');
    }

    public function edit(ProgramStudi $prodi)
    {
        return view('admin.prodi.edit', compact('prodi'));
    }

    public function update(Request $request, ProgramStudi $prodi)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'degree' => 'required|string',
            'accreditation' => 'required|string',
            'description' => 'required|string',
            'curriculum_summary' => 'nullable|string',
            'career_prospects' => 'nullable|string',
            'icon' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('prodi', 'public');
            $validated['image'] = '/storage/' . $path;
        }

        $prodi->update($validated);

        return redirect()->route('admin.prodi.index')->with('success', 'Data Program Studi berhasil diperbarui!');
    }

    public function destroy(ProgramStudi $prodi)
    {
        $prodi->delete();
        return redirect()->route('admin.prodi.index')->with('success', 'Data Program Studi berhasil dihapus!');
    }
}
