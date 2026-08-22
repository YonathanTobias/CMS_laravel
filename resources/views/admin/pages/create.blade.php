@extends('layouts.admin')

@section('page_title', 'Tambah Halaman Baru (Add Page)')

@section('content')

<div class="mb-6 flex items-center justify-between">
    <div>
        <h2 class="font-heading font-bold text-xl text-slate-900">Buat Halaman Statis Baru</h2>
        <p class="text-xs text-slate-500">Buat halaman profil, informasi beasiswa, LPPM, atau halaman baru lainnya.</p>
    </div>
    <a href="{{ route('admin.pages.index') }}" class="text-xs text-slate-600 font-bold hover:underline">&larr; Kembali ke Daftar Halaman</a>
</div>

<form action="{{ route('admin.pages.store') }}" method="POST" class="grid grid-cols-1 lg:grid-cols-12 gap-8">
    @csrf

    <!-- Main Content Editor -->
    <div class="lg:col-span-8 space-y-6">
        <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm space-y-4">
            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Judul Halaman</label>
                <input type="text" name="title" value="{{ old('title') }}" required placeholder="Contoh: Beasiswa Mahasiswa, Lembaga LPPM, Fasilitas Perpustakaan..." class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-base font-bold focus:outline-none focus:border-blue-500">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Custom URL Slug (Opsional)</label>
                <div class="flex items-center gap-2">
                    <span class="text-xs text-slate-400 font-mono">/halaman/</span>
                    <input type="text" name="slug" value="{{ old('slug') }}" placeholder="beasiswa-mahasiswa" class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-mono focus:outline-none focus:border-blue-500">
                </div>
                <p class="text-[11px] text-slate-400 mt-1">Kosongkan jika ingin dibuat otomatis dari judul halaman.</p>
            </div>

            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Isi Konten Halaman (Mendukung Format Teks & Tag HTML)</label>
                <textarea name="content" rows="14" required placeholder="Tuliskan isi informasi halaman lengkap di sini (mendukung tag HTML <p>, <h3>, <ul>, <li>, <strong>, <table>)..." class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm font-mono focus:outline-none focus:border-blue-500 leading-relaxed">{{ old('content') }}</textarea>
            </div>
        </div>
    </div>

    <!-- Sidebar Settings -->
    <div class="lg:col-span-4 space-y-6">
        
        <!-- Status & Publish -->
        <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm space-y-4">
            <h3 class="font-heading font-bold text-slate-900 border-b border-slate-100 pb-2">Status Publikasi</h3>

            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Status Terbit</label>
                <select name="status" class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm font-semibold focus:outline-none focus:border-blue-500">
                    <option value="published">Langsung Terbit (Published)</option>
                    <option value="draft">Simpan Draf (Draft)</option>
                </select>
            </div>

            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Icon FontAwesome</label>
                <input type="text" name="icon" value="{{ old('icon', 'fa-file-lines') }}" placeholder="fa-bullseye, fa-graduation-cap..." class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs focus:outline-none focus:border-blue-500">
            </div>

            <button type="submit" class="w-full bg-blue-700 hover:bg-blue-800 text-white font-bold py-3 rounded-xl shadow transition">
                Simpan & Terbitkan Halaman &rarr;
            </button>
        </div>

        <!-- Menu Integration Box -->
        <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm space-y-4">
            <h3 class="font-heading font-bold text-slate-900 border-b border-slate-100 pb-2 flex items-center gap-2">
                <i class="fa-solid fa-bars-staggered text-blue-700"></i> Integrasi Menu Navigasi
            </h3>

            <div class="flex items-start gap-2 pt-1">
                <input type="checkbox" name="add_to_menu" id="add_to_menu" value="1" checked class="rounded text-blue-600 mt-1">
                <label for="add_to_menu" class="text-xs font-bold text-slate-700 cursor-pointer">
                    Otomatis Tambahkan Halaman Ini ke Menu Navigasi Website
                </label>
            </div>

            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Posisi Menu (Parent)</label>
                <select name="parent_menu_id" class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold focus:outline-none focus:border-blue-500">
                    <option value="">-- Menu Utama (Top Level Header) --</option>
                    @foreach($parentMenus as $parent)
                        <option value="{{ $parent->id }}">
                            &rdsh; Sub-menu dari: {{ $parent->name }}
                        </option>
                    @endforeach
                </select>
                <p class="text-[11px] text-slate-400 mt-1">Pilih induk menu jika ingin halaman ini menjadi dropdown sub-menu.</p>
            </div>
        </div>

    </div>
</form>

@endsection
