@extends('layouts.admin')

@section('page_title', 'Edit Halaman Statis')

@section('content')

<div class="mb-6 flex items-center justify-between">
    <div>
        <h2 class="font-heading font-bold text-xl text-slate-900">Edit Halaman: {{ $page->title }}</h2>
    </div>
    <a href="{{ route('admin.pages.index') }}" class="text-xs text-slate-600 font-bold hover:underline">&larr; Kembali ke Daftar Halaman</a>
</div>

<form action="{{ route('admin.pages.update', $page->id) }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 lg:grid-cols-12 gap-8">
    @csrf
    @method('PUT')

    <!-- Main Content Editor -->
    <div class="lg:col-span-8 space-y-6">
        <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm space-y-4">
            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Judul Halaman</label>
                <input type="text" name="title" value="{{ old('title', $page->title) }}" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-base font-bold focus:outline-none focus:border-blue-500">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Custom URL Slug</label>
                <div class="flex items-center gap-2">
                    <span class="text-xs text-slate-400 font-mono">/halaman/</span>
                    <input type="text" name="slug" value="{{ old('slug', $page->slug) }}" class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-mono focus:outline-none focus:border-blue-500">
                </div>
            </div>

            @include('admin.components.dual-editor', [
                'name' => 'content',
                'value' => old('content', $page->content),
                'label' => 'Isi Konten Halaman Profil',
                'required' => true,
                'rows' => 14,
                'placeholder' => 'Tuliskan informasi halaman di sini...'
            ])
        </div>

        <!-- Multi-Image Upload & Existing Gallery List -->
        <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm space-y-4">
            <h3 class="font-heading font-bold text-slate-900 border-b border-slate-100 pb-2 flex items-center gap-2">
                <i class="fa-solid fa-images text-blue-700"></i> Kelola Galeri Foto Halaman (Banyak Gambar)
            </h3>

            @if($page->images->count() > 0)
                <div>
                    <label class="block text-xs font-bold uppercase text-slate-600 mb-2">Foto Galeri Saat Ini (Centang untuk menghapus)</label>
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                        @foreach($page->images as $img)
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
        
        <!-- Status & Publish -->
        <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm space-y-4">
            <h3 class="font-heading font-bold text-slate-900 border-b border-slate-100 pb-2">Status Publikasi</h3>

            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Status Terbit</label>
                <select name="status" class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm font-semibold focus:outline-none focus:border-blue-500">
                    <option value="published" {{ $page->is_active ? 'selected' : '' }}>Terbit (Published)</option>
                    <option value="draft" {{ !$page->is_active ? 'selected' : '' }}>Draf (Draft)</option>
                </select>
            </div>

            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Icon FontAwesome</label>
                <input type="text" name="icon" value="{{ old('icon', $page->icon) }}" class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs focus:outline-none focus:border-blue-500">
            </div>

            <button type="submit" class="w-full bg-blue-700 hover:bg-blue-800 text-white font-bold py-3 rounded-xl shadow transition">
                Simpan Perubahan Halaman &rarr;
            </button>
        </div>

        <!-- Menu Integration Box -->
        @php
            $linkedMenu = \App\Models\Menu::where('url', '/halaman/' . $page->slug)->first();
        @endphp

        <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm space-y-4">
            <h3 class="font-heading font-bold text-slate-900 border-b border-slate-100 pb-2 flex items-center gap-2">
                <i class="fa-solid fa-bars-staggered text-blue-700"></i> Integrasi Menu Navigasi
            </h3>

            <div class="flex items-start gap-2 pt-1">
                <input type="checkbox" name="add_to_menu" id="add_to_menu" value="1" {{ $linkedMenu ? 'checked' : '' }} class="rounded text-blue-600 mt-1">
                <label for="add_to_menu" class="text-xs font-bold text-slate-700 cursor-pointer">
                    Hubungkan Halaman Ini ke Menu Navigasi Website
                </label>
            </div>

            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Posisi Menu (Parent)</label>
                <select name="parent_menu_id" class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold focus:outline-none focus:border-blue-500">
                    <option value="">-- Menu Utama (Top Level Header) --</option>
                    @foreach($parentMenus as $parent)
                        <option value="{{ $parent->id }}" {{ $linkedMenu && $linkedMenu->parent_id == $parent->id ? 'selected' : '' }}>
                            &rdsh; Sub-menu dari: {{ $parent->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

    </div>
</form>

@endsection
