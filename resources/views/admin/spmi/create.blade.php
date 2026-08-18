@extends('layouts.admin')

@section('page_title', 'Tambah Dokumen SPMI')

@section('content')

<div class="mb-6 flex items-center justify-between">
    <div>
        <h2 class="font-heading font-bold text-xl text-slate-900">Tambah Dokumen SPMI / Akreditasi</h2>
    </div>
    <a href="{{ route('admin.spmi.index') }}" class="text-xs text-slate-600 font-bold hover:underline">&larr; Kembali</a>
</div>

<form action="{{ route('admin.spmi.store') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm space-y-6 max-w-2xl">
    @csrf

    <div>
        <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Judul Dokumen</label>
        <input type="text" name="title" required placeholder="SOP Pelaksanaan Praktik Klinik..." class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-bold focus:outline-none focus:border-teal-500">
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
            <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Nomor Dokumen (Opsional)</label>
            <input type="text" name="document_number" placeholder="SPMI-STIKES-SOP-2026/001" class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-teal-500">
        </div>
        <div>
            <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Tahun Dokumen</label>
            <input type="text" name="year" value="2026" required class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-teal-500">
        </div>
    </div>

    <div>
        <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Kategori Dokumen</label>
        <select name="category" class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm font-semibold focus:outline-none focus:border-teal-500">
            <option value="SOP">Standard Operating Procedure (SOP)</option>
            <option value="Manual Mutu">Manual Mutu</option>
            <option value="Kebijakan">Kebijakan Penjaminan Mutu</option>
            <option value="Akreditasi">Sertifikat / Dokumen Akreditasi</option>
            <option value="Formulir">Formulir Mutu</option>
        </select>
    </div>

    <div>
        <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Upload Berkas PDF / DOCX (Max 10MB)</label>
        <input type="file" name="file" accept=".pdf,.doc,.docx" class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-teal-50 file:text-teal-700 hover:file:bg-teal-100">
    </div>

    <button type="submit" class="bg-teal-600 hover:bg-teal-700 text-white font-bold px-6 py-3 rounded-xl shadow transition">
        Simpan Dokumen &rarr;
    </button>
</form>

@endsection
