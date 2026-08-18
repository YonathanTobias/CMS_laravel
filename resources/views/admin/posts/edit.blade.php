@extends('layouts.admin')

@section('page_title', 'Edit Berita')

@section('content')

<div class="mb-6 flex items-center justify-between">
    <div>
        <h2 class="font-heading font-bold text-xl text-slate-900">Edit Berita / Pengumuman</h2>
        <p class="text-xs text-slate-500">Perbarui konten artikel berita "{{ $post->title }}".</p>
    </div>
    <a href="{{ route('admin.posts.index') }}" class="text-xs text-slate-600 font-bold hover:underline">&larr; Kembali ke Daftar Berita</a>
</div>

<form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 lg:grid-cols-12 gap-8">
    @csrf
    @method('PUT')

    <!-- Main Content Col -->
    <div class="lg:col-span-8 space-y-6">
        <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm space-y-4">
            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Judul Artikel / Berita</label>
                <input type="text" name="title" value="{{ old('title', $post->title) }}" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-base font-bold focus:outline-none focus:border-teal-500">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Ringkasan Singkat (Excerpt)</label>
                <textarea name="excerpt" rows="3" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-teal-500">{{ old('excerpt', $post->excerpt) }}</textarea>
            </div>

            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Isi Konten Berita (HTML Support)</label>
                <textarea name="content" rows="14" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm font-mono focus:outline-none focus:border-teal-500 leading-relaxed">{{ old('content', $post->content) }}</textarea>
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
                    <option value="published" {{ $post->status === 'published' ? 'selected' : '' }}>Terbit (Published)</option>
                    <option value="draft" {{ $post->status === 'draft' ? 'selected' : '' }}>Draf (Draft)</option>
                </select>
            </div>

            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Kategori Berita</label>
                <select name="category" class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-teal-500">
                    <option value="Berita" {{ $post->category === 'Berita' ? 'selected' : '' }}>Berita Utama</option>
                    <option value="PMB & Akademik" {{ $post->category === 'PMB & Akademik' ? 'selected' : '' }}>PMB & Akademik</option>
                    <option value="Pengabdian Masyarakat" {{ $post->category === 'Pengabdian Masyarakat' ? 'selected' : '' }}>Pengabdian Masyarakat</option>
                    <option value="Kerjasama & Alumni" {{ $post->category === 'Kerjasama & Alumni' ? 'selected' : '' }}>Kerjasama & Alumni</option>
                    <option value="Pengumuman" {{ $post->category === 'Pengumuman' ? 'selected' : '' }}>Pengumuman Resmi</option>
                </select>
            </div>

            <div class="text-xs text-slate-500 pt-2 border-t border-slate-100">
                <div>Views: <strong>{{ $post->views }}x</strong></div>
                <div>Dibuat: <strong>{{ $post->created_at->format('d M Y H:i') }}</strong></div>
            </div>

            <button type="submit" class="w-full bg-teal-600 hover:bg-teal-700 text-white font-bold py-3 rounded-xl shadow transition">
                Simpan Perubahan &rarr;
            </button>
        </div>

        <!-- Featured Image Box -->
        <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm space-y-4">
            <h3 class="font-heading font-bold text-slate-900 border-b border-slate-100 pb-2">Gambar Utama</h3>
            @if($post->image)
                <div class="rounded-xl overflow-hidden mb-3 border border-slate-200">
                    <img src="{{ $post->image }}" class="w-full h-40 object-cover">
                </div>
            @endif
            <div>
                <input type="file" name="image" accept="image/*" class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-teal-50 file:text-teal-700 hover:file:bg-teal-100">
            </div>
        </div>

    </div>
</form>

@endsection
