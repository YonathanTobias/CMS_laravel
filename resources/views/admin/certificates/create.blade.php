@extends('layouts.admin')

@section('page_title', 'Tambah Sertifikat & Piagam Baru')

@section('content')

<div class="max-w-4xl mx-auto">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="font-heading font-bold text-xl text-slate-900 dark:text-white flex items-center gap-2">
                <i class="fa-solid fa-plus-circle text-emerald-500"></i> Tambah Sertifikat / Piagam Institusi
            </h2>
            <p class="text-xs text-slate-500 dark:text-slate-400">Tambahkan dokumen legalitas akreditasi atau piagam penghargaan kampus.</p>
        </div>
        <a href="{{ route('admin.certificates.index') }}" class="bg-slate-200 dark:bg-slate-800 hover:bg-slate-300 dark:hover:bg-slate-700 text-slate-700 dark:text-slate-200 font-bold px-4 py-2 rounded-xl text-xs transition">
            &larr; Kembali
        </a>
    </div>

    @if ($errors->any())
        <div class="mb-6 p-4 bg-red-50 dark:bg-red-950/50 border border-red-200 dark:border-red-800 rounded-2xl text-red-800 dark:text-red-200 text-xs">
            <div class="font-bold mb-1">Terjadi Kesalahan Validation:</div>
            <ul class="list-disc list-inside space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.certificates.store') }}" method="POST" enctype="multipart/form-data" class="bg-white dark:bg-slate-900 p-6 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm space-y-6">
        @csrf

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div class="sm:col-span-2">
                <label class="block text-xs font-bold uppercase text-slate-700 dark:text-slate-300 mb-1">Judul Dokumen Sertifikat / Piagam *</label>
                <input type="text" name="title" value="{{ old('title') }}" required placeholder="Contoh: Sertifikat Akreditasi Perguruan Tinggi" class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-sm font-bold text-slate-900 dark:text-white focus:outline-none focus:border-emerald-500">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase text-slate-700 dark:text-slate-300 mb-1">Institusi Penerbit / Lembaga Legalisasi</label>
                <input type="text" name="issuer" value="{{ old('issuer') }}" placeholder="Contoh: Badan Akreditasi Nasional Perguruan Tinggi (BAN-PT)" class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-sm text-slate-900 dark:text-white focus:outline-none focus:border-emerald-500">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase text-slate-700 dark:text-slate-300 mb-1">Teks Badge Label Status</label>
                <input type="text" name="badge" value="{{ old('badge') }}" placeholder="Contoh: Baik Sekali (BAN-PT)" class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-sm font-bold text-slate-900 dark:text-white focus:outline-none focus:border-emerald-500">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase text-slate-700 dark:text-slate-300 mb-1">Gaya Warna Badge Status</label>
                <select name="badge_color" class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-sm font-bold text-slate-900 dark:text-white focus:outline-none focus:border-emerald-500">
                    <option value="bg-amber-500 text-slate-950" {{ old('badge_color') == 'bg-amber-500 text-slate-950' ? 'selected' : '' }}>Kuning / Emas (BAN-PT)</option>
                    <option value="bg-blue-600 text-white" {{ old('badge_color') == 'bg-blue-600 text-white' ? 'selected' : '' }}>Biru Laut (LAM-PTKes)</option>
                    <option value="bg-emerald-600 text-white" {{ old('badge_color') == 'bg-emerald-600 text-white' ? 'selected' : '' }}>Hijau (LLDIKTI / Prestasi)</option>
                    <option value="bg-indigo-600 text-white" {{ old('badge_color') == 'bg-indigo-600 text-white' ? 'selected' : '' }}>Nila / Indigo (Kemenkes)</option>
                    <option value="bg-slate-800 text-white" {{ old('badge_color') == 'bg-slate-800 text-white' ? 'selected' : '' }}>Gelap (Standar)</option>
                </select>
            </div>

            <div>
                <label class="block text-xs font-bold uppercase text-slate-700 dark:text-slate-300 mb-1">Urutan Tampil (Order Number)</label>
                <input type="number" name="order" value="{{ old('order', 1) }}" min="1" class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-sm font-bold text-slate-900 dark:text-white focus:outline-none focus:border-emerald-500">
            </div>
        </div>

        <!-- Pilihan Input Gambar: Upload File ATAU Input URL -->
        <div class="p-5 bg-slate-50 dark:bg-slate-800/50 rounded-2xl border border-slate-200 dark:border-slate-700/60 space-y-4" x-data="{ tab: 'file' }">
            <div class="flex items-center justify-between border-b border-slate-200 dark:border-slate-700 pb-3">
                <label class="text-xs font-bold uppercase text-slate-800 dark:text-slate-200 flex items-center gap-2">
                    <i class="fa-solid fa-image text-emerald-500"></i> Sumber Gambar Dokumen Sertifikat / Piagam
                </label>
                <div class="flex gap-2 text-xs">
                    <button type="button" @click="tab = 'file'" :class="tab === 'file' ? 'bg-emerald-600 text-white font-bold' : 'bg-slate-200 dark:bg-slate-700 text-slate-700 dark:text-slate-300'" class="px-3 py-1 rounded-lg transition">
                        <i class="fa-solid fa-upload mr-1"></i> Unggah Berkas
                    </button>
                    <button type="button" @click="tab = 'url'" :class="tab === 'url' ? 'bg-emerald-600 text-white font-bold' : 'bg-slate-200 dark:bg-slate-700 text-slate-700 dark:text-slate-300'" class="px-3 py-1 rounded-lg transition">
                        <i class="fa-solid fa-link mr-1"></i> Input URL Gambar
                    </button>
                </div>
            </div>

            <!-- Tab 1: Upload File Gambar -->
            <div x-show="tab === 'file'" class="space-y-2">
                <label class="block text-xs font-semibold text-slate-600 dark:text-slate-400">Pilih berkas gambar dari komputer (JPG, PNG, WEBP, Maks. 5MB):</label>
                <input type="file" name="image_file" accept="image/*" class="w-full text-xs text-slate-600 dark:text-slate-300 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-emerald-100 file:text-emerald-800 dark:file:bg-emerald-950 dark:file:text-emerald-300 hover:file:bg-emerald-200 cursor-pointer">
            </div>

            <!-- Tab 2: Input URL Gambar Direct -->
            <div x-show="tab === 'url'" class="space-y-2">
                <label class="block text-xs font-semibold text-slate-600 dark:text-slate-400">Masukkan tautan URL Gambar eksternal (contoh: https://images.unsplash.com/... atau tautan CDN):</label>
                <input type="url" name="image_url" value="{{ old('image_url') }}" placeholder="https://images.unsplash.com/photo-..." class="w-full px-4 py-2.5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-xs font-mono text-slate-900 dark:text-white focus:outline-none focus:border-emerald-500">
            </div>
        </div>

        <div class="flex items-center gap-3 pt-2">
            <input type="checkbox" name="is_active" id="is_active" value="1" checked class="w-4 h-4 text-emerald-600 rounded focus:ring-emerald-500 border-slate-300">
            <label for="is_active" class="text-sm font-bold text-slate-800 dark:text-slate-200 cursor-pointer">
                Tampilkan dokumen ini di Beranda (Status Aktif)
            </label>
        </div>

        <div class="pt-4 border-t border-slate-100 dark:border-slate-800 flex justify-end gap-3">
            <a href="{{ route('admin.certificates.index') }}" class="px-5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-300 text-xs font-bold hover:bg-slate-100 dark:hover:bg-slate-800 transition">
                Batal
            </a>
            <button type="submit" class="px-6 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-xs font-bold shadow-lg transition flex items-center gap-2">
                <i class="fa-solid fa-check"></i> Simpan Dokumen
            </button>
        </div>
    </form>
</div>

@endsection
