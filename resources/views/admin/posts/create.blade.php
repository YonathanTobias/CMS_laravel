@extends('layouts.admin')

@section('page_title', 'Tambah Berita Baru')

@section('content')

<div class="mb-6 flex items-center justify-between">
    <div>
        <h2 class="font-heading font-bold text-xl text-slate-900 dark:text-white">Buat Berita / Artikel Baru</h2>
    </div>
    <a href="{{ route('admin.posts.index') }}" class="text-xs text-slate-600 dark:text-slate-400 font-bold hover:underline">&larr; Kembali</a>
</div>

@if($errors->any())
    <div class="bg-red-50 dark:bg-red-950/60 text-red-700 dark:text-red-300 border border-red-200 dark:border-red-800 rounded-2xl p-4 mb-6 text-sm">
        <div class="font-bold mb-1"><i class="fa-solid fa-triangle-exclamation mr-1"></i> Terjadi kesalahan saat menyimpan berita:</div>
        <ul class="list-disc list-inside text-xs space-y-1">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 lg:grid-cols-12 gap-8">
    @csrf

    <!-- Main Content Editor -->
    <div class="lg:col-span-8 space-y-6">
        <div class="bg-white dark:bg-slate-900 rounded-2xl p-6 border border-slate-200 dark:border-slate-800 shadow-sm space-y-4">
            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 dark:text-slate-300 mb-1">Judul Berita</label>
                <input type="text" name="title" value="{{ old('title') }}" required placeholder="Masukkan judul berita..." class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-base font-bold text-slate-900 dark:text-white focus:outline-none focus:border-blue-500 focus-visible:ring-2 focus-visible:ring-amber-400">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 dark:text-slate-300 mb-1">Kutipan / Ringkasan Singkat (Excerpt)</label>
                <textarea name="excerpt" rows="2" placeholder="Ringkasan 1-2 kalimat untuk kartu berita di beranda..." class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-sm text-slate-900 dark:text-white focus:outline-none focus:border-blue-500 focus-visible:ring-2 focus-visible:ring-amber-400">{{ old('excerpt') }}</textarea>
            </div>

            @include('admin.components.dual-editor', [
                'name' => 'content',
                'value' => old('content'),
                'label' => 'Isi Artikel Berita Baru',
                'required' => true,
                'rows' => 14,
                'placeholder' => 'Tuliskan berita secara lengkap di sini...'
            ])
        </div>

        <!-- Multi-Image Upload (Galeri Foto Berita) -->
        <div class="bg-white dark:bg-slate-900 rounded-2xl p-6 border border-slate-200 dark:border-slate-800 shadow-sm space-y-4">
            <h3 class="font-heading font-bold text-slate-900 dark:text-white border-b border-slate-100 dark:border-slate-800 pb-2 flex items-center gap-2">
                <i class="fa-solid fa-images text-blue-700 dark:text-sky-400"></i> Upload Galeri Foto Tambahan (Banyak Gambar)
            </h3>
            <p class="text-xs text-slate-500 dark:text-slate-400">Anda dapat memilih <strong>beberapa berkas foto sekaligus</strong> untuk dijadikan galeri foto dokumentasi kegiatan pada berita ini.</p>

            <div>
                <input type="file" name="gallery[]" multiple accept="image/*" class="w-full text-xs text-slate-500 dark:text-slate-400 file:mr-3 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-blue-50 file:text-blue-700 dark:file:bg-blue-950 dark:file:text-sky-300 hover:file:bg-blue-100">
            </div>
        </div>
    </div>

    <!-- Sidebar Settings -->
    <div class="lg:col-span-4 space-y-6">
        
        <!-- Status & Multi-Category Selection -->
        <div class="bg-white dark:bg-slate-900 rounded-2xl p-6 border border-slate-200 dark:border-slate-800 shadow-sm space-y-4">
            <h3 class="font-heading font-bold text-slate-900 dark:text-white border-b border-slate-100 dark:border-slate-800 pb-2">Pengaturan Berita</h3>

            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 dark:text-slate-300 mb-1">Status Publikasi</label>
                <select name="status" class="w-full px-3 py-2 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-sm font-semibold text-slate-900 dark:text-white focus:outline-none focus:border-blue-500">
                    <option value="published">Langsung Terbit (Published)</option>
                    <option value="draft">Simpan Draf (Draft)</option>
                </select>
            </div>

            <!-- Multi-Category Checkboxes -->
            <div class="space-y-2">
                <div class="flex items-center justify-between">
                    <label class="block text-xs font-bold uppercase text-slate-600 dark:text-slate-300">Pilih Kategori (Bisa > 1)</label>
                    <a href="{{ route('admin.categories.index') }}" target="_blank" class="text-[11px] font-bold text-blue-700 dark:text-sky-400 hover:underline flex items-center gap-1">
                        <i class="fa-solid fa-plus-minus text-[10px]"></i> Kelola Kategori
                    </a>
                </div>
                
                <div class="bg-slate-50 dark:bg-slate-800/60 p-3 rounded-xl border border-slate-200 dark:border-slate-700 max-h-48 overflow-y-auto space-y-2">
                    @forelse($categories as $cat)
                        <label class="flex items-center gap-2.5 text-xs font-semibold text-slate-800 dark:text-slate-200 cursor-pointer hover:text-blue-600">
                            <input type="checkbox" name="categories[]" value="{{ $cat->id }}" 
                                   {{ is_array(old('categories')) && in_array($cat->id, old('categories')) ? 'checked' : ($loop->first ? 'checked' : '') }}
                                   class="w-4 h-4 rounded text-blue-600 focus:ring-blue-500 border-slate-300 dark:border-slate-600 dark:bg-slate-700">
                            <span>{{ $cat->name }}</span>
                        </label>
                    @empty
                        <p class="text-xs text-slate-400 dark:text-slate-500">Belum ada kategori. Klik "Kelola Kategori" untuk membuat.</p>
                    @endforelse
                </div>
                @error('categories')
                    <p class="text-xs text-red-500 mt-1 font-bold">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="w-full bg-blue-700 hover:bg-blue-800 text-white font-bold py-3 rounded-xl shadow transition focus-visible:ring-2 focus-visible:ring-amber-400">
                Simpan & Terbitkan Berita &rarr;
            </button>
        </div>

        <!-- Featured Image (Foto Utama) -->
        <div class="bg-white dark:bg-slate-900 rounded-2xl p-6 border border-slate-200 dark:border-slate-800 shadow-sm space-y-4">
            <h3 class="font-heading font-bold text-slate-900 dark:text-white border-b border-slate-100 dark:border-slate-800 pb-2">Foto Sampul Utama (Featured Image)</h3>
            <div>
                <label class="block text-[11px] font-semibold text-slate-500 dark:text-slate-400 mb-1">Upload Berkas Foto Sampul (JPG, PNG)</label>
                <input type="file" name="image" accept="image/*" class="w-full text-xs text-slate-500 dark:text-slate-400 file:mr-3 file:py-2 file:px-3 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-blue-50 file:text-blue-700 dark:file:bg-blue-950 dark:file:text-sky-300">
            </div>
        </div>

    </div>
</form>

@endsection
