@extends('layouts.admin')

@section('page_title', 'Edit Kategori Berita')

@section('content')

<div class="flex justify-between items-center mb-6">
    <div>
        <h2 class="font-heading font-bold text-xl text-slate-900 dark:text-white">Edit Kategori Berita</h2>
        <p class="text-xs text-slate-500 dark:text-slate-400">Ubah nama kategori berita & artikel.</p>
    </div>
    <a href="{{ route('admin.categories.index') }}" class="text-xs text-slate-600 dark:text-slate-400 font-bold hover:underline">&larr; Kembali ke Daftar Kategori</a>
</div>

<form action="{{ route('admin.categories.update', $category->id) }}" method="POST" class="bg-white dark:bg-slate-900 rounded-2xl p-6 sm:p-8 border border-slate-200 dark:border-slate-800 shadow-sm space-y-6 max-w-xl transition-colors">
    @csrf
    @method('PUT')

    <div>
        <label class="block text-xs font-bold uppercase text-slate-700 dark:text-slate-300 mb-1">Nama Kategori Berita</label>
        <input type="text" name="name" value="{{ old('name', $category->name) }}" required class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-sm font-bold text-slate-900 dark:text-white focus:outline-none focus:border-blue-500 focus-visible:ring-2 focus-visible:ring-amber-400">
        @error('name')
            <p class="text-xs text-red-500 mt-1 font-bold">{{ $message }}</p>
        @enderror
    </div>

    <div class="pt-4 border-t border-slate-100 dark:border-slate-800 flex justify-end gap-3">
        <a href="{{ route('admin.categories.index') }}" class="px-5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 text-xs font-bold text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 transition">Batal</a>
        <button type="submit" class="bg-blue-700 hover:bg-blue-800 text-white font-bold px-6 py-2.5 rounded-xl text-xs shadow transition focus-visible:ring-2 focus-visible:ring-amber-400">
            <i class="fa-solid fa-floppy-disk mr-1.5"></i> Perbarui Kategori
        </button>
    </div>
</form>

@endsection
