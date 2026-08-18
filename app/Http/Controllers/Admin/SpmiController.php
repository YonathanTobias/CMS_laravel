<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SpmiDocument;
use Illuminate\Http\Request;

class SpmiController extends Controller
{
    public function index()
    {
        $documents = SpmiDocument::orderBy('year', 'desc')->get();
        return view('admin.spmi.index', compact('documents'));
    }

    public function create()
    {
        return view('admin.spmi.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'document_number' => 'nullable|string',
            'category' => 'required|string',
            'year' => 'required|string',
            'file' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx|max:10240',
        ]);

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('spmi_docs', 'public');
            $validated['file_path'] = '/storage/' . $path;
        }

        SpmiDocument::create($validated);

        return redirect()->route('admin.spmi.index')->with('success', 'Dokumen SPMI berhasil ditambahkan!');
    }

    public function edit(SpmiDocument $spmi)
    {
        return view('admin.spmi.edit', compact('spmi'));
    }

    public function update(Request $request, SpmiDocument $spmi)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'document_number' => 'nullable|string',
            'category' => 'required|string',
            'year' => 'required|string',
            'file' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx|max:10240',
        ]);

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('spmi_docs', 'public');
            $validated['file_path'] = '/storage/' . $path;
        }

        $spmi->update($validated);

        return redirect()->route('admin.spmi.index')->with('success', 'Dokumen SPMI berhasil diperbarui!');
    }

    public function destroy(SpmiDocument $spmi)
    {
        $spmi->delete();
        return redirect()->route('admin.spmi.index')->with('success', 'Dokumen SPMI berhasil dihapus!');
    }
}
