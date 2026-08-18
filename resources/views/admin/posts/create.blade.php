@extends('layouts.admin')

@section('page_title', 'Tambah Berita Baru')

@section('content')

<div class="mb-6 flex items-center justify-between">
    <div>
        <h2 class="font-heading font-bold text-xl text-slate-900">Buat Berita / Pengumuman Baru</h2>
        <p class="text-xs text-slate-500">Editor artikel WordPress-style untuk publikasi website utama.</p>
    </div>
    <a href="{{ route('admin.posts.index') }}" class="text-xs text-slate-600 font-bold hover:underline">&larr; Kembali ke Daftar Berita</a>
</div>

<form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 lg:grid-cols-12 gap-8">
    @csrf

    <!-- Main Content Col -->
    <div class="lg:col-span-8 space-y-6">
        <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm space-y-4">
            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Judul Artikel / Berita</label>
                <input type="text" name="title" value="{{ old('title') }}" required placeholder="Masukkan judul artikel berita..." class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-base font-bold focus:outline-none focus:border-teal-500">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Ringkasan Singkat (Excerpt)</label>
                <textarea name="excerpt" rows="3" placeholder="Ringkasan singkat yang akan muncul di kartu berita..." class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-teal-500">{{ old('excerpt') }}</textarea>
            </div>

            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Isi Konten Berita (HTML Support)</label>
                <textarea name="content" rows="12" required placeholder="Tuliskan isi artikel lengkap di sini (mendukung tag HTML <p>, <h3>, <ul>, <li>, <strong>)..." class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm font-mono focus:outline-none focus:border-teal-500 leading-relaxed">{{ old('content') }}</textarea>
            </div>
        </div>
    </div>

    <!-- Sidebar Col -->
    <div class="lg:col-span-4 space-y-6">
        
        <!-- Publish Box -->
        <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm space-y-4">
            <h3 class="font-heading font-bold text-slate-900 border-b border-slate-100 pb-2">Publikasi</h3>

            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Status Publikasi</label>
                <select name="status" class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-teal-500 font-semibold">
                    <option value="published">Langsung Terbit (Published)</option>
                    <option value="draft">Simpan Draf (Draft)</option>
                </select>
            </div>

            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Kategori Berita</label>
                <select name="category" class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-teal-500">
                    <option value="Berita">Berita Utama</option>
                    <option value="PMB & Akademik">PMB & Akademik</option>
                    <option value="Pengabdian Masyarakat">Pengabdian Masyarakat</option>
                    <option value="Kerjasama & Alumni">Kerjasama & Alumni</option>
                    <option value="Pengumuman">Pengumuman Resmi</option>
                </select>
            </div>

            <button type="submit" class="w-full bg-teal-600 hover:bg-teal-700 text-white font-bold py-3 rounded-xl shadow transition">
                Simpan & Publikasikan &rarr;
            </button>
        </div>

        <!-- Featured Image Box -->
        <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm space-y-4">
            <h3 class="font-heading font-bold text-slate-900 border-b border-slate-100 pb-2">Gambar Utama (Featured Image)</h3>
            <div>
                <input type="file" name="image" accept="image/*" class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-teal-50 file:text-teal-700 hover:file:bg-teal-100">
                <p class="text-[11px] text-slate-400 mt-2">Format: JPG, PNG, WEBP (Max 2MB)</p>
            </div>
        </div>

    </div>
</form>

@endsection
