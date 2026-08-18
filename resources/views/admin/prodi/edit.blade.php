@extends('layouts.admin')

@section('page_title', 'Edit Program Studi')

@section('content')

<div class="mb-6 flex items-center justify-between">
    <div>
        <h2 class="font-heading font-bold text-xl text-slate-900">Edit Program Studi: {{ $prodi->name }}</h2>
        <p class="text-xs text-slate-500">Ubah nama, jenjang pendidikan, akreditasi, dan kurikulum prodi.</p>
    </div>
    <a href="{{ route('admin.prodi.index') }}" class="text-xs text-slate-600 font-bold hover:underline">&larr; Kembali ke Daftar Prodi</a>
</div>

<form action="{{ route('admin.prodi.update', $prodi->id) }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm space-y-6 max-w-4xl">
    @csrf
    @method('PUT')

    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <div class="sm:col-span-2">
            <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Nama Program Studi</label>
            <input type="text" name="name" value="{{ old('name', $prodi->name) }}" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-bold focus:outline-none focus:border-teal-500">
        </div>
        <div>
            <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Jenjang Pendidikan (Bebas Edit)</label>
            <input type="text" name="degree" value="{{ old('degree', $prodi->degree) }}" required placeholder="D3, S1, Profesi, D4, S2..." list="degree-list" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-bold focus:outline-none focus:border-teal-500">
            <datalist id="degree-list">
                <option value="D3">D3 (Diploma Tiga)</option>
                <option value="D4">D4 (Sarjana Terapan)</option>
                <option value="S1">S1 (Sarjana)</option>
                <option value="Profesi">Profesi / Ners</option>
                <option value="S2">S2 (Magister)</option>
            </datalist>
            <p class="text-[11px] text-slate-400 mt-1">Anda bisa memilih dari daftar atau mengedit teks secara bebas.</p>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
            <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Akreditasi Status</label>
            <input type="text" name="accreditation" value="{{ old('accreditation', $prodi->accreditation) }}" required class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-teal-500">
        </div>
        <div>
            <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Icon FontAwesome</label>
            <input type="text" name="icon" value="{{ old('icon', $prodi->icon) }}" class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-teal-500">
        </div>
    </div>

    <div>
        <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Deskripsi Umum Prodi</label>
        <textarea name="description" rows="4" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-teal-500">{{ old('description', $prodi->description) }}</textarea>
    </div>

    <div>
        <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Ringkasan Kurikulum (Opsional)</label>
        <textarea name="curriculum_summary" rows="3" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-teal-500">{{ old('curriculum_summary', $prodi->curriculum_summary) }}</textarea>
    </div>

    <div>
        <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Prospek Karir & Alumni (Opsional)</label>
        <textarea name="career_prospects" rows="3" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-teal-500">{{ old('career_prospects', $prodi->career_prospects) }}</textarea>
    </div>

    <div class="flex items-center gap-2 pt-2">
        <input type="checkbox" name="is_active" id="is_active" value="1" {{ $prodi->is_active ? 'checked' : '' }} class="rounded text-teal-600">
        <label for="is_active" class="text-sm font-bold text-slate-700">Aktifkan Program Studi di Website</label>
    </div>

    <button type="submit" class="bg-teal-600 hover:bg-teal-700 text-white font-bold px-6 py-3 rounded-xl shadow transition">
        Simpan Perubahan &rarr;
    </button>
</form>

@endsection
