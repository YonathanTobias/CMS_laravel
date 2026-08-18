@extends('layouts.admin')

@section('page_title', 'Edit Fasilitas')

@section('content')

<div class="mb-6 flex items-center justify-between">
    <div>
        <h2 class="font-heading font-bold text-xl text-slate-900">Edit Fasilitas: {{ $facility->name }}</h2>
    </div>
    <a href="{{ route('admin.facilities.index') }}" class="text-xs text-slate-600 font-bold hover:underline">&larr; Kembali</a>
</div>

<form action="{{ route('admin.facilities.update', $facility->id) }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm space-y-6 max-w-2xl">
    @csrf
    @method('PUT')

    <div>
        <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Nama Fasilitas / Laboratorium</label>
        <input type="text" name="name" value="{{ old('name', $facility->name) }}" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-bold focus:outline-none focus:border-teal-500">
    </div>

    <div>
        <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Kategori</label>
        <select name="category" class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm font-semibold focus:outline-none focus:border-teal-500">
            <option value="Laboratorium Klinis" {{ $facility->category === 'Laboratorium Klinis' ? 'selected' : '' }}>Laboratorium Klinis</option>
            <option value="Laboratorium Digital" {{ $facility->category === 'Laboratorium Digital' ? 'selected' : '' }}>Laboratorium Digital</option>
            <option value="Laboratorium Sains" {{ $facility->category === 'Laboratorium Sains' ? 'selected' : '' }}>Laboratorium Sains</option>
            <option value="Fasilitas Umum" {{ $facility->category === 'Fasilitas Umum' ? 'selected' : '' }}>Fasilitas Umum</option>
        </select>
    </div>

    <div>
        <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Deskripsi Fasilitas</label>
        <textarea name="description" rows="4" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-teal-500">{{ old('description', $facility->description) }}</textarea>
    </div>

    <div class="flex items-center gap-2">
        <input type="checkbox" name="is_featured" id="is_featured" value="1" {{ $facility->is_featured ? 'checked' : '' }} class="rounded text-teal-600">
        <label for="is_featured" class="text-sm font-bold text-slate-700">Tampilkan di Beranda Utama</label>
    </div>

    <button type="submit" class="bg-teal-600 hover:bg-teal-700 text-white font-bold px-6 py-3 rounded-xl shadow transition">
        Simpan Perubahan &rarr;
    </button>
</form>

@endsection
