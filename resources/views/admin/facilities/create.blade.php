@extends('layouts.admin')

@section('page_title', 'Tambah Fasilitas')

@section('content')

<div class="mb-6 flex items-center justify-between">
    <div>
        <h2 class="font-heading font-bold text-xl text-slate-900">Tambah Fasilitas Kampus</h2>
    </div>
    <a href="{{ route('admin.facilities.index') }}" class="text-xs text-slate-600 font-bold hover:underline">&larr; Kembali</a>
</div>

<form action="{{ route('admin.facilities.store') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm space-y-6 max-w-2xl">
    @csrf

    <div>
        <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Nama Fasilitas / Laboratorium</label>
        <input type="text" name="name" required placeholder="Laboratorium Keperawatan..." class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-bold focus:outline-none focus:border-teal-500">
    </div>

    <div>
        <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Kategori</label>
        <select name="category" class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm font-semibold focus:outline-none focus:border-teal-500">
            <option value="Laboratorium Klinis">Laboratorium Klinis</option>
            <option value="Laboratorium Digital">Laboratorium Digital</option>
            <option value="Laboratorium Sains">Laboratorium Sains</option>
            <option value="Fasilitas Umum">Fasilitas Umum</option>
        </select>
    </div>

    <div>
        <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Deskripsi Fasilitas</label>
        <textarea name="description" rows="4" required placeholder="Penjelasan kelengkapan alat & kegunaan..." class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-teal-500"></textarea>
    </div>

    <div class="flex items-center gap-2">
        <input type="checkbox" name="is_featured" id="is_featured" value="1" checked class="rounded text-teal-600">
        <label for="is_featured" class="text-sm font-bold text-slate-700">Tampilkan di Beranda Utama</label>
    </div>

    <button type="submit" class="bg-teal-600 hover:bg-teal-700 text-white font-bold px-6 py-3 rounded-xl shadow transition">
        Simpan Fasilitas &rarr;
    </button>
</form>

@endsection
