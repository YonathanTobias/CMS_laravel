<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function index()
    {
        $certificates = Certificate::orderBy('order', 'asc')->get();

        return view('admin.certificates.index', compact('certificates'));
    }

    public function create()
    {
        return view('admin.certificates.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'issuer' => 'nullable|string|max:255',
            'badge' => 'nullable|string|max:100',
            'badge_color' => 'nullable|string|max:100',
            'order' => 'nullable|integer',
            'image_url' => 'nullable|string',
            'image_file' => 'nullable|image|max:5120',
        ]);

        $validated['order'] = $request->input('order', 1);
        $validated['is_active'] = $request->has('is_active');
        $validated['badge_color'] = $request->input('badge_color', 'bg-amber-500 text-slate-950');

        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('certificates', 'public');
            $validated['image'] = '/storage/'.$path;
        } elseif ($request->filled('image_url')) {
            $validated['image'] = trim($request->image_url);
        } else {
            $validated['image'] = 'https://images.unsplash.com/photo-1589829545856-d10d557cf95f?q=80&w=800&auto=format&fit=crop';
        }

        Certificate::create($validated);

        return redirect()->route('admin.certificates.index')->with('success', 'Sertifikat / Piagam Institusi berhasil ditambahkan!');
    }

    public function edit(Certificate $certificate)
    {
        return view('admin.certificates.edit', compact('certificate'));
    }

    public function update(Request $request, Certificate $certificate)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'issuer' => 'nullable|string|max:255',
            'badge' => 'nullable|string|max:100',
            'badge_color' => 'nullable|string|max:100',
            'order' => 'nullable|integer',
            'image_url' => 'nullable|string',
            'image_file' => 'nullable|image|max:5120',
        ]);

        $validated['order'] = $request->input('order', $certificate->order);
        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('certificates', 'public');
            $validated['image'] = '/storage/'.$path;
        } elseif ($request->filled('image_url')) {
            $validated['image'] = trim($request->image_url);
        }

        $certificate->update($validated);

        return redirect()->route('admin.certificates.index')->with('success', 'Sertifikat / Piagam Institusi berhasil diperbarui!');
    }

    public function destroy(Certificate $certificate)
    {
        $certificate->delete();

        return redirect()->route('admin.certificates.index')->with('success', 'Sertifikat / Piagam Institusi berhasil dihapus!');
    }
}
