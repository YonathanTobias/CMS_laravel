@extends('layouts.admin')

@section('page_title', 'Tambah Berita Baru')

@section('content')

<div class="mb-6 flex items-center justify-between">
    <div>
        <h2 class="font-heading font-bold text-xl text-slate-900">Buat Berita / Artikel Baru</h2>
    </div>
    <a href="{{ route('admin.posts.index') }}" class="text-xs text-slate-600 font-bold hover:underline">&larr; Kembali</a>
</div>

@if($errors->any())
    <div class="bg-red-50 text-red-700 border border-red-200 rounded-2xl p-4 mb-6 text-sm">
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
        <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm space-y-4">
            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Judul Berita</label>
                <input type="text" name="title" value="{{ old('title') }}" required placeholder="Masukkan judul berita..." class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-base font-bold focus:outline-none focus:border-blue-500">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Kutipan / Ringkasan Singkat (Excerpt)</label>
                <textarea name="excerpt" rows="2" placeholder="Ringkasan 1-2 kalimat untuk kartu berita di beranda..." class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-blue-500">{{ old('excerpt') }}</textarea>
            </div>

            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Isi Artikel Berita (Mendukung HTML & Teks Lengkap)</label>
                <textarea name="content" rows="12" required placeholder="Tuliskan berita secara lengkap di sini..." class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-blue-500 leading-relaxed">{{ old('content') }}</textarea>
            </div>
        </div>

        <!-- Multi-Image Upload (Galeri Foto Berita) -->
        <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm space-y-4">
            <h3 class="font-heading font-bold text-slate-900 border-b border-slate-100 pb-2 flex items-center gap-2">
                <i class="fa-solid fa-images text-blue-700"></i> Upload Galeri Foto Tambahan (Banyak Gambar)
            </h3>
            <p class="text-xs text-slate-500">Anda dapat memilih <strong>beberapa berkas foto sekaligus</strong> untuk dijadikan galeri foto dokumentasi kegiatan pada berita ini.</p>

            <div>
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
                    <option value="published">Langsung Terbit (Published)</option>
                    <option value="draft">Simpan Draf (Draft)</option>
                </select>
            </div>

            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Kategori Berita</label>
                <select name="category" class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm font-semibold focus:outline-none focus:border-blue-500">
                    <option value="PMB & Akademik">PMB & Akademik</option>
                    <option value="Kegiatan Mahasiswa">Kegiatan Mahasiswa</option>
                    <option value="Prestasi & Penelitian">Prestasi & Penelitian</option>
                    <option value="Pengabdian Masyarakat">Pengabdian Masyarakat</option>
                    <option value="Pengumuman Resmi">Pengumuman Resmi</option>
                </select>
            </div>

            <button type="submit" class="w-full bg-blue-700 hover:bg-blue-800 text-white font-bold py-3 rounded-xl shadow transition">
                Simpan & Terbitkan Berita &rarr;
            </button>
        </div>

        <!-- Featured Image (Foto Utama) -->
        <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm space-y-4">
            <h3 class="font-heading font-bold text-slate-900 border-b border-slate-100 pb-2">Foto Sampul Utama (Featured Image)</h3>
            <div>
                <label class="block text-[11px] font-semibold text-slate-500 mb-1">Upload Berkas Foto Sampul (JPG, PNG)</label>
                <input type="file" name="image" accept="image/*" class="w-full text-xs text-slate-500 file:mr-3 file:py-2 file:px-3 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-blue-50 file:text-blue-700">
            </div>
        </div>

    </div>
</form>

@endsection
