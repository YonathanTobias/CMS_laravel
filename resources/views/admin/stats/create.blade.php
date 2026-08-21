@extends('layouts.admin')

@section('page_title', 'Tambah Angka Statistik')

@section('content')

<div class="mb-6 flex items-center justify-between">
    <div>
        <h2 class="font-heading font-bold text-xl text-slate-900">Tambah Angka Statistik Baru</h2>
    </div>
    <a href="{{ route('admin.stats.index') }}" class="text-xs text-slate-600 font-bold hover:underline">&larr; Kembali</a>
</div>

<form action="{{ route('admin.stats.store') }}" method="POST" class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm space-y-6 max-w-xl">
    @csrf

    <div>
        <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Angka / Nilai Utama (Value)</label>
        <input type="text" name="value" value="{{ old('value') }}" required placeholder="Contoh: 5, 96%, 25+, Unggul, 1,500+" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-lg font-extrabold text-blue-700 focus:outline-none focus:border-blue-500">
        <p class="text-[11px] text-slate-400 mt-1">Bisa berupa angka, persentase (%), tanda plus (+), atau kata singkat (Unggul).</p>
    </div>

    <div>
        <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Keterangan Label (Deskripsi Teks)</label>
        <input type="text" name="label" value="{{ old('label') }}" required placeholder="Contoh: Program Studi Pilihan, Alumni Bekerja < 3 Bulan..." class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-semibold focus:outline-none focus:border-blue-500">
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
            <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Pilihan Warna Teks</label>
            <select name="color" class="w-full px-3 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs font-bold focus:outline-none focus:border-blue-500">
                <option value="text-blue-700">Biru Medis (text-blue-700)</option>
                <option value="text-amber-500">Kuning Emas (text-amber-500)</option>
                <option value="text-emerald-600">Hijau Segar (text-emerald-600)</option>
                <option value="text-indigo-700">Ungu Indigo (text-indigo-700)</option>
                <option value="text-slate-900">Hitam Navy (text-slate-900)</option>
            </select>
        </div>
        <div>
            <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Urutan Tampilan (Order)</label>
            <input type="number" name="order" value="1" min="1" class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm font-bold focus:outline-none focus:border-blue-500">
        </div>
    </div>

    <div class="flex items-center gap-2 pt-2">
        <input type="checkbox" name="is_active" id="is_active" value="1" checked class="rounded text-blue-600">
        <label for="is_active" class="text-sm font-bold text-slate-700">Tampilkan di Widget Beranda</label>
    </div>

    <button type="submit" class="bg-blue-700 hover:bg-blue-800 text-white font-bold px-6 py-3 rounded-xl shadow transition">
        Simpan Angka Statistik &rarr;
    </button>
</form>

@endsection
