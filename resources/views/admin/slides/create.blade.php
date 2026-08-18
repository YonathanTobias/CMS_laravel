@extends('layouts.admin')

@section('page_title', 'Tambah Slide Banner')

@section('content')

<div class="mb-6 flex items-center justify-between">
    <div>
        <h2 class="font-heading font-bold text-xl text-slate-900">Tambah Slide Banner Carousel Baru</h2>
    </div>
    <a href="{{ route('admin.slides.index') }}" class="text-xs text-slate-600 font-bold hover:underline">&larr; Kembali</a>
</div>

<form action="{{ route('admin.slides.store') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm space-y-6 max-w-3xl">
    @csrf

    <div>
        <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Judul Utama Banner Slide</label>
        <input type="text" name="title" value="{{ old('title') }}" required placeholder="Contoh: Penerimaan Mahasiswa Baru (PMB) T.A. 2026/2027" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm font-bold focus:outline-none focus:border-blue-500">
    </div>

    <div>
        <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Sub-Judul / Deskripsi Singkat</label>
        <textarea name="subtitle" rows="3" placeholder="Penjelasan singkat banner..." class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-blue-500">{{ old('subtitle') }}</textarea>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
            <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Teks Badge Label</label>
            <input type="text" name="badge" value="{{ old('badge', 'PMB 2026/2027 DIBUKA') }}" placeholder="PMB 2026/2027 DIBUKA..." class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm font-bold focus:outline-none focus:border-blue-500">
        </div>
        <div>
            <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Urutan Slide (Order)</label>
            <input type="number" name="order" value="1" min="1" class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm font-bold focus:outline-none focus:border-blue-500">
        </div>
    </div>

    <div class="space-y-4 pt-2 border-t border-slate-100">
        <label class="block text-xs font-bold uppercase text-slate-600">Gambar Banner Slide (Upload Berkas ATAU Tautan URL)</label>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-[11px] font-semibold text-slate-500 mb-1">Upload Berkas Foto (JPG, PNG)</label>
                <input type="file" name="image_file" accept="image/*" class="w-full text-xs text-slate-500 file:mr-3 file:py-2 file:px-3 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-blue-50 file:text-blue-700">
            </div>
            <div>
                <label class="block text-[11px] font-semibold text-slate-500 mb-1">Atau Gunakan Link URL Gambar</label>
                <input type="text" name="image_url" placeholder="https://images.unsplash.com/..." class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-mono focus:outline-none focus:border-blue-500">
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2 border-t border-slate-100">
        <div>
            <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Teks Tombol Utamanya (CTA)</label>
            <input type="text" name="cta_text" value="Daftar PMB Online Now" class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-bold focus:outline-none focus:border-blue-500">
        </div>
        <div>
            <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Link URL Tombol Utama</label>
            <input type="text" name="cta_link" value="https://pmb.stikespantiwaluya.ac.id" class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-mono focus:outline-none focus:border-blue-500">
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
            <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Teks Tombol Sekunder (Opsional)</label>
            <input type="text" name="secondary_text" value="Lihat Program Studi" class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-bold focus:outline-none focus:border-blue-500">
        </div>
        <div>
            <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Link URL Tombol Sekunder</label>
            <input type="text" name="secondary_link" value="/program-studi" class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-mono focus:outline-none focus:border-blue-500">
        </div>
    </div>

    <div class="flex items-center gap-2 pt-2">
        <input type="checkbox" name="is_active" id="is_active" value="1" checked class="rounded text-blue-600">
        <label for="is_active" class="text-sm font-bold text-slate-700">Tampilkan Slide di Website Utama</label>
    </div>

    <button type="submit" class="bg-blue-700 hover:bg-blue-800 text-white font-bold px-6 py-3 rounded-xl shadow transition">
        Simpan Slide Banner &rarr;
    </button>
</form>

@endsection
