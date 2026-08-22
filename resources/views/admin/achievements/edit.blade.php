@extends('layouts.admin')

@section('page_title', 'Edit Prestasi Mahasiswa')

@section('content')

<div class="mb-6 flex items-center justify-between">
    <div>
        <h2 class="font-heading font-bold text-xl text-slate-900">Edit Prestasi: {{ $achievement->student_name }}</h2>
    </div>
    <a href="{{ route('admin.achievements.index') }}" class="text-xs text-slate-600 font-bold hover:underline">&larr; Kembali</a>
</div>

<form action="{{ route('admin.achievements.update', $achievement->id) }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm space-y-6 max-w-4xl">
    @csrf
    @method('PUT')

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
            <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Nama Lengkap Mahasiswa</label>
            <input type="text" name="student_name" value="{{ old('student_name', $achievement->student_name) }}" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-bold focus:outline-none focus:border-blue-500">
        </div>
        <div>
            <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Prodi & Semester</label>
            <input type="text" name="student_prodi" value="{{ old('student_prodi', $achievement->student_prodi) }}" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-blue-500">
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <div class="sm:col-span-2">
            <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Judul / Nama Prestasi & Kategori</label>
            <input type="text" name="title" value="{{ old('title', $achievement->title) }}" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-bold focus:outline-none focus:border-blue-500">
        </div>
        <div>
            <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Lencana Juara / Award Badge</label>
            <input type="text" name="badge_title" value="{{ old('badge_title', $achievement->badge_title) }}" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-bold focus:outline-none focus:border-blue-500">
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
            <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Penyelenggara / Nama Event</label>
            <input type="text" name="event_name" value="{{ old('event_name', $achievement->event_name) }}" class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-blue-500">
        </div>
        <div>
            <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Warna Badge Penghargaan</label>
            <select name="badge_color" class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm font-semibold focus:outline-none focus:border-blue-500">
                <option value="bg-amber-500 text-slate-950" {{ $achievement->badge_color === 'bg-amber-500 text-slate-950' ? 'selected' : '' }}>Emas / Amber (Juara 1)</option>
                <option value="bg-blue-600 text-white" {{ $achievement->badge_color === 'bg-blue-600 text-white' ? 'selected' : '' }}>Biru / Royal Blue (The Finest)</option>
                <option value="bg-emerald-600 text-white" {{ $achievement->badge_color === 'bg-emerald-600 text-white' ? 'selected' : '' }}>Hijau / Emerald (Juara 2 / 3)</option>
                <option value="bg-indigo-600 text-white" {{ $achievement->badge_color === 'bg-indigo-600 text-white' ? 'selected' : '' }}>Ungu / Indigo (Penulis Terbaik / Special Award)</option>
            </select>
        </div>
    </div>

    <div>
        <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Foto / Flyer Poster Prestasi Saat Ini</label>
        @if($achievement->poster_image)
            <div class="w-28 h-36 rounded-xl overflow-hidden bg-slate-900 border border-slate-200 mb-2">
                <img src="{{ \Illuminate\Support\Str::startsWith($achievement->poster_image, 'http') ? $achievement->poster_image : asset($achievement->poster_image) }}" class="w-full h-full object-cover">
            </div>
        @endif
        <input type="file" name="poster_image" accept="image/*" class="w-full text-xs text-slate-500 file:mr-3 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-blue-600 file:text-white">
    </div>

    <div>
        <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Deskripsi Singkat / Tema Karya (Opsional)</label>
        <textarea name="description" rows="2" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-blue-500">{{ old('description', $achievement->description) }}</textarea>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
        <div>
            <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Urutan Tampil (Order)</label>
            <input type="number" name="order" value="{{ old('order', $achievement->order) }}" class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-blue-500">
        </div>
        <div class="flex items-center gap-2 pt-6">
            <input type="checkbox" name="is_active" id="is_active" value="1" {{ $achievement->is_active ? 'checked' : '' }} class="rounded text-blue-600">
            <label for="is_active" class="text-sm font-bold text-slate-700">Tampilkan di Beranda Utama</label>
        </div>
    </div>

    <button type="submit" class="bg-blue-700 hover:bg-blue-800 text-white font-bold px-6 py-3 rounded-xl shadow transition">
        Simpan Perubahan &rarr;
    </button>
</form>

@endsection
