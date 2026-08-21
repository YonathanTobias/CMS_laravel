<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Stat;
use Illuminate\Http\Request;

class StatController extends Controller
{
    public function index()
    {
        $stats = Stat::orderBy('order', 'asc')->get();
        return view('admin.stats.index', compact('stats'));
    }

    public function create()
    {
        return view('admin.stats.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'value' => 'required|string|max:100',
            'label' => 'required|string|max:255',
            'color' => 'required|string|max:100',
            'order' => 'nullable|integer',
        ]);

        $validated['order'] = $request->input('order', 1);
        $validated['is_active'] = $request->has('is_active');

        Stat::create($validated);

        return redirect()->route('admin.stats.index')->with('success', 'Angka statistik berhasil ditambahkan!');
    }

    public function edit(Stat $stat)
    {
        return view('admin.stats.edit', compact('stat'));
    }

    public function update(Request $request, Stat $stat)
    {
        $validated = $request->validate([
            'value' => 'required|string|max:100',
            'label' => 'required|string|max:255',
            'color' => 'required|string|max:100',
            'order' => 'nullable|integer',
        ]);

        $validated['order'] = $request->input('order', 1);
        $validated['is_active'] = $request->has('is_active');

        $stat->update($validated);

        return redirect()->route('admin.stats.index')->with('success', 'Angka statistik berhasil diperbarui!');
    }

    public function destroy(Stat $stat)
    {
        $stat->delete();
        return redirect()->route('admin.stats.index')->with('success', 'Angka statistik berhasil dihapus!');
    }
}
