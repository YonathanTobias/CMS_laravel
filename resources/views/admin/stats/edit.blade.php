@extends('layouts.admin')

@section('page_title', 'Edit Angka Statistik')

@section('content')

<div class="mb-6 flex items-center justify-between">
    <div>
        <h2 class="font-heading font-bold text-xl text-slate-900">Edit Angka Statistik</h2>
    </div>
    <a href="{{ route('admin.stats.index') }}" class="text-xs text-slate-600 font-bold hover:underline">&larr; Kembali</a>
</div>

<form action="{{ route('admin.stats.update', $stat->id) }}" method="POST" class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm space-y-6 max-w-xl">
    @csrf
    @method('PUT')

    <div>
        <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Angka / Nilai Utama (Value)</label>
        <input type="text" name="value" value="{{ old('value', $stat->value) }}" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-lg font-extrabold text-blue-700 focus:outline-none focus:border-blue-500">
    </div>

    <div>
        <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Keterangan Label (Deskripsi Teks)</label>
        <input type="text" name="label" value="{{ old('label', $stat->label) }}" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-semibold focus:outline-none focus:border-blue-500">
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
            <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Pilihan Warna Teks</label>
            <select name="color" class="w-full px-3 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs font-bold focus:outline-none focus:border-blue-500">
                <option value="text-blue-700" {{ $stat->color === 'text-blue-700' ? 'selected' : '' }}>Biru Medis (text-blue-700)</option>
                <option value="text-amber-500" {{ $stat->color === 'text-amber-500' ? 'selected' : '' }}>Kuning Emas (text-amber-500)</option>
                <option value="text-emerald-600" {{ $stat->color === 'text-emerald-600' ? 'selected' : '' }}>Hijau Segar (text-emerald-600)</option>
                <option value="text-indigo-700" {{ $stat->color === 'text-indigo-700' ? 'selected' : '' }}>Ungu Indigo (text-indigo-700)</option>
                <option value="text-slate-900" {{ $stat->color === 'text-slate-900' ? 'selected' : '' }}>Hitam Navy (text-slate-900)</option>
            </select>
        </div>
        <div>
            <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Urutan Tampilan (Order)</label>
            <input type="number" name="order" value="{{ old('order', $stat->order) }}" min="1" class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm font-bold focus:outline-none focus:border-blue-500">
        </div>
    </div>

    <div class="flex items-center gap-2 pt-2">
        <input type="checkbox" name="is_active" id="is_active" value="1" {{ $stat->is_active ? 'checked' : '' }} class="rounded text-blue-600">
        <label for="is_active" class="text-sm font-bold text-slate-700">Tampilkan di Widget Beranda</label>
    </div>

    <button type="submit" class="bg-blue-700 hover:bg-blue-800 text-white font-bold px-6 py-3 rounded-xl shadow transition">
        Simpan Perubahan &rarr;
    </button>
</form>

@endsection
