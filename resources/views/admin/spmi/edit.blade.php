@extends('layouts.admin')

@section('page_title', 'Edit Dokumen SPMI')

@section('content')

<div class="mb-6 flex items-center justify-between">
    <div>
        <h2 class="font-heading font-bold text-xl text-slate-900">Edit Dokumen SPMI</h2>
    </div>
    <a href="{{ route('admin.spmi.index') }}" class="text-xs text-slate-600 font-bold hover:underline">&larr; Kembali</a>
</div>

<form action="{{ route('admin.spmi.update', $spmi->id) }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm space-y-6 max-w-2xl">
    @csrf
    @method('PUT')

    <div>
        <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Judul Dokumen</label>
        <input type="text" name="title" value="{{ old('title', $spmi->title) }}" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-bold focus:outline-none focus:border-teal-500">
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
            <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Nomor Dokumen (Opsional)</label>
            <input type="text" name="document_number" value="{{ old('document_number', $spmi->document_number) }}" class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-teal-500">
        </div>
        <div>
            <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Tahun Dokumen</label>
            <input type="text" name="year" value="{{ old('year', $spmi->year) }}" required class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-teal-500">
        </div>
    </div>

    <div>
        <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Kategori Dokumen</label>
        <select name="category" class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm font-semibold focus:outline-none focus:border-teal-500">
            <option value="SOP" {{ $spmi->category === 'SOP' ? 'selected' : '' }}>Standard Operating Procedure (SOP)</option>
            <option value="Manual Mutu" {{ $spmi->category === 'Manual Mutu' ? 'selected' : '' }}>Manual Mutu</option>
            <option value="Kebijakan" {{ $spmi->category === 'Kebijakan' ? 'selected' : '' }}>Kebijakan Penjaminan Mutu</option>
            <option value="Akreditasi" {{ $spmi->category === 'Akreditasi' ? 'selected' : '' }}>Sertifikat / Dokumen Akreditasi</option>
            <option value="Formulir" {{ $spmi->category === 'Formulir' ? 'selected' : '' }}>Formulir Mutu</option>
        </select>
    </div>

    <div>
        <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Ganti Berkas PDF / DOCX (Opsional)</label>
        <input type="file" name="file" accept=".pdf,.doc,.docx" class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-teal-50 file:text-teal-700 hover:file:bg-teal-100">
    </div>

    <button type="submit" class="bg-teal-600 hover:bg-teal-700 text-white font-bold px-6 py-3 rounded-xl shadow transition">
        Simpan Perubahan &rarr;
    </button>
</form>

@endsection
