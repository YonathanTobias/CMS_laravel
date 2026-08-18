@extends('layouts.admin')

@section('page_title', 'Edit Slide Banner')

@section('content')

<div class="mb-6 flex items-center justify-between">
    <div>
        <h2 class="font-heading font-bold text-xl text-slate-900">Edit Slide Banner Carousel</h2>
    </div>
    <a href="{{ route('admin.slides.index') }}" class="text-xs text-slate-600 font-bold hover:underline">&larr; Kembali</a>
</div>

<form action="{{ route('admin.slides.update', $slide->id) }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm space-y-6 max-w-3xl">
    @csrf
    @method('PUT')

    <div>
        <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Judul Utama Banner Slide</label>
        <input type="text" name="title" value="{{ old('title', $slide->title) }}" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm font-bold focus:outline-none focus:border-blue-500">
    </div>

    <div>
        <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Sub-Judul / Deskripsi Singkat</label>
        <textarea name="subtitle" rows="3" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-blue-500">{{ old('subtitle', $slide->subtitle) }}</textarea>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
            <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Teks Badge Label</label>
            <input type="text" name="badge" value="{{ old('badge', $slide->badge) }}" class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm font-bold focus:outline-none focus:border-blue-500">
        </div>
        <div>
            <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Urutan Slide (Order)</label>
            <input type="number" name="order" value="{{ old('order', $slide->order) }}" min="1" class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm font-bold focus:outline-none focus:border-blue-500">
        </div>
    </div>

    <div class="space-y-4 pt-2 border-t border-slate-100">
        <label class="block text-xs font-bold uppercase text-slate-600">Gambar Banner Current Preview & Ubah Gambar</label>
        
        <div class="w-full h-40 rounded-xl overflow-hidden bg-slate-900 border border-slate-200 mb-3">
            <img src="{{ $slide->image }}" class="w-full h-full object-cover">
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-[11px] font-semibold text-slate-500 mb-1">Ganti Berkas Foto (Upload)</label>
                <input type="file" name="image_file" accept="image/*" class="w-full text-xs text-slate-500 file:mr-3 file:py-2 file:px-3 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-blue-50 file:text-blue-700">
            </div>
            <div>
                <label class="block text-[11px] font-semibold text-slate-500 mb-1">Atau Ubah URL Gambar</label>
                <input type="text" name="image_url" value="{{ old('image_url', $slide->image) }}" class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-mono focus:outline-none focus:border-blue-500">
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2 border-t border-slate-100">
        <div>
            <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Teks Tombol Utamanya (CTA)</label>
            <input type="text" name="cta_text" value="{{ old('cta_text', $slide->cta_text) }}" class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-bold focus:outline-none focus:border-blue-500">
        </div>
        <div>
            <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Link URL Tombol Utama</label>
            <input type="text" name="cta_link" value="{{ old('cta_link', $slide->cta_link) }}" class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-mono focus:outline-none focus:border-blue-500">
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
            <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Teks Tombol Sekunder (Opsional)</label>
            <input type="text" name="secondary_text" value="{{ old('secondary_text', $slide->secondary_text) }}" class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-bold focus:outline-none focus:border-blue-500">
        </div>
        <div>
            <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Link URL Tombol Sekunder</label>
            <input type="text" name="secondary_link" value="{{ old('secondary_link', $slide->secondary_link) }}" class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-mono focus:outline-none focus:border-blue-500">
        </div>
    </div>

    <div class="flex items-center gap-2 pt-2">
        <input type="checkbox" name="is_active" id="is_active" value="1" {{ $slide->is_active ? 'checked' : '' }} class="rounded text-blue-600">
        <label for="is_active" class="text-sm font-bold text-slate-700">Tampilkan Slide di Website Utama</label>
    </div>

    <button type="submit" class="bg-blue-700 hover:bg-blue-800 text-white font-bold px-6 py-3 rounded-xl shadow transition">
        Simpan Perubahan &rarr;
    </button>
</form>

@endsection
