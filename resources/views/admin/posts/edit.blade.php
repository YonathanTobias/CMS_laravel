@extends('layouts.admin')

@section('page_title', 'Edit Berita')

@section('content')

<div class="mb-6 flex items-center justify-between">
    <div>
        <h2 class="font-heading font-bold text-xl text-slate-900">Edit Berita: {{ $post->title }}</h2>
    </div>
    <a href="{{ route('admin.posts.index') }}" class="text-xs text-slate-600 font-bold hover:underline">&larr; Kembali</a>
</div>

@if($errors->any())
    <div class="bg-red-50 text-red-700 border border-red-200 rounded-2xl p-4 mb-6 text-sm">
        <div class="font-bold mb-1"><i class="fa-solid fa-triangle-exclamation mr-1"></i> Terjadi kesalahan saat memperbarui berita:</div>
        <ul class="list-disc list-inside text-xs space-y-1">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 lg:grid-cols-12 gap-8">
    @csrf
    @method('PUT')

    <!-- Main Content Editor -->
    <div class="lg:col-span-8 space-y-6">
        <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm space-y-4">
            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Judul Berita</label>
                <input type="text" name="title" value="{{ old('title', $post->title) }}" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-base font-bold focus:outline-none focus:border-blue-500">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Kutipan / Ringkasan Singkat (Excerpt)</label>
                <textarea name="excerpt" rows="2" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-blue-500">{{ old('excerpt', $post->excerpt) }}</textarea>
            </div>

            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Isi Artikel Berita (Mendukung HTML)</label>
                <textarea name="content" rows="12" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-blue-500 leading-relaxed">{{ old('content', $post->content) }}</textarea>
            </div>
        </div>

        <!-- Multi-Image Upload & Existing Gallery List -->
        <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm space-y-4">
            <h3 class="font-heading font-bold text-slate-900 border-b border-slate-100 pb-2 flex items-center gap-2">
                <i class="fa-solid fa-images text-blue-700"></i> Kelola Galeri Foto Berita (Banyak Gambar)
            </h3>

            @if($post->images->count() > 0)
                <div>
                    <label class="block text-xs font-bold uppercase text-slate-600 mb-2">Foto Galeri Saat Ini (Centang untuk menghapus)</label>
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                        @foreach($post->images as $img)
                            <div class="relative group rounded-xl overflow-hidden border border-slate-200 bg-slate-900 h-28">
                                <img src="{{ \Illuminate\Support\Str::startsWith($img->image_path, 'http') ? $img->image_path : asset($img->image_path) }}" class="w-full h-full object-cover">
                                <label class="absolute inset-0 bg-slate-950/70 opacity-0 group-hover:opacity-100 transition flex items-center justify-center text-white text-xs font-bold cursor-pointer p-2 text-center">
                                    <input type="checkbox" name="delete_images[]" value="{{ $img->id }}" class="mr-1.5 rounded text-red-600">
                                    Hapus
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="pt-2 border-t border-slate-100">
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Tambah Foto Galeri Baru (Pilih Banyak File)</label>
                <input type="file" name="gallery[]" multiple accept="image/*" class="w-full text-xs text-slate-500 file:mr-3 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
            </div>
        </div>
    </div>

    <!-- Sidebar Settings -->
    <div class="lg:col-span-4 space-y-6">
        
        <!-- Status & Category -->
        <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm space-y-4">
            <h3 class="font-heading font-bold text-slate-900 border-b border-slate-100 pb-2">Pengaturan Berita</h3>

            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Status Publikasi</label>
                <select name="status" class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm font-semibold focus:outline-none focus:border-blue-500">
                    <option value="published" {{ $post->status === 'published' ? 'selected' : '' }}>Terbit (Published)</option>
                    <option value="draft" {{ $post->status === 'draft' ? 'selected' : '' }}>Draf (Draft)</option>
                </select>
            </div>

            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Kategori Berita</label>
                <select name="category" class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm font-semibold focus:outline-none focus:border-blue-500">
                    <option value="PMB & Akademik" {{ $post->category === 'PMB & Akademik' ? 'selected' : '' }}>PMB & Akademik</option>
                    <option value="Kegiatan Mahasiswa" {{ $post->category === 'Kegiatan Mahasiswa' ? 'selected' : '' }}>Kegiatan Mahasiswa</option>
                    <option value="Prestasi & Penelitian" {{ $post->category === 'Prestasi & Penelitian' ? 'selected' : '' }}>Prestasi & Penelitian</option>
                    <option value="Pengabdian Masyarakat" {{ $post->category === 'Pengabdian Masyarakat' ? 'selected' : '' }}>Pengabdian Masyarakat</option>
                    <option value="Pengumuman Resmi" {{ $post->category === 'Pengumuman Resmi' ? 'selected' : '' }}>Pengumuman Resmi</option>
                </select>
            </div>

            <button type="submit" class="w-full bg-blue-700 hover:bg-blue-800 text-white font-bold py-3 rounded-xl shadow transition">
                Simpan Perubahan Berita &rarr;
            </button>
        </div>

        <!-- Featured Image -->
        <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm space-y-4">
            <h3 class="font-heading font-bold text-slate-900 border-b border-slate-100 pb-2">Foto Sampul Utama (Featured Image)</h3>
            
            @if($post->image)
                <div class="w-full h-40 rounded-xl overflow-hidden bg-slate-900 border border-slate-200 mb-2">
                    <img src="{{ \Illuminate\Support\Str::startsWith($post->image, 'http') ? $post->image : asset($post->image) }}" class="w-full h-full object-cover">
                </div>
            @endif

            <div>
                <label class="block text-[11px] font-semibold text-slate-500 mb-1">Ganti Foto Sampul Utama</label>
                <input type="file" name="image" accept="image/*" class="w-full text-xs text-slate-500 file:mr-3 file:py-2 file:px-3 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-blue-50 file:text-blue-700">
            </div>
        </div>

    </div>
</form>

@endsection
