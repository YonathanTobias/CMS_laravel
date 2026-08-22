@extends('layouts.admin')

@section('page_title', 'Edit Program Studi')

@section('content')

<div class="mb-6 flex items-center justify-between">
    <div>
        <h2 class="font-heading font-bold text-xl text-slate-900">Edit Program Studi: {{ $prodi->name }}</h2>
    </div>
    <a href="{{ route('admin.prodi.index') }}" class="text-xs text-slate-600 font-bold hover:underline">&larr; Kembali ke Daftar Prodi</a>
</div>

<form action="{{ route('admin.prodi.update', $prodi->id) }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm space-y-6 max-w-4xl">
    @csrf
    @method('PUT')

    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <div class="sm:col-span-2">
            <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Nama Program Studi</label>
            <input type="text" name="name" value="{{ old('name', $prodi->name) }}" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-bold focus:outline-none focus:border-blue-500">
        </div>
        <div>
            <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Jenjang Pendidikan (Bebas Edit)</label>
            <input type="text" name="degree" value="{{ old('degree', $prodi->degree) }}" required list="degree-list" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-bold focus:outline-none focus:border-blue-500">
            <datalist id="degree-list">
                <option value="D3">D3 (Diploma Tiga)</option>
                <option value="D4">D4 (Sarjana Terapan)</option>
                <option value="S1">S1 (Sarjana)</option>
                <option value="Profesi">Profesi / Ners</option>
                <option value="S2">S2 (Magister)</option>
            </datalist>
        </div>
    </div>

    <div>
        <label class="block text-xs font-bold uppercase text-slate-600 mb-1">URL Slug Halaman (Menyesuaikan Otomatis)</label>
        <div class="flex items-center gap-2">
            <span class="text-xs text-slate-400 font-mono">{{ url('/program-studi') }}/</span>
            <input type="text" name="slug" value="{{ old('slug', $prodi->slug) }}" class="flex-1 px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-mono focus:outline-none focus:border-blue-500">
        </div>
        <p class="text-[11px] text-slate-400 mt-1">URL ini akan otomatis menyesuaikan jika Nama Prodi diubah, atau Anda dapat mengetikkan URL kustom di atas.</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
            <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Status Akreditasi</label>
            <input type="text" name="accreditation" value="{{ old('accreditation', $prodi->accreditation) }}" required class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-blue-500">
        </div>
        <div>
            <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Icon FontAwesome</label>
            <input type="text" name="icon" value="{{ old('icon', $prodi->icon) }}" class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-blue-500">
        </div>
    </div>

    <!-- Sertifikat Akreditasi Upload Section -->
    <div class="bg-blue-50/50 p-4 rounded-2xl border border-blue-100 space-y-3">
        <label class="block text-xs font-bold uppercase text-blue-900">Berkas Sertifikat Akreditasi Resmi</label>
        
        @if($prodi->accreditation_certificate)
            <div class="flex items-center gap-2 text-xs font-bold text-emerald-700 bg-emerald-50 px-3 py-2 rounded-xl border border-emerald-200 w-fit">
                <i class="fa-solid fa-file-circle-check text-base"></i> Sertifikat Terpasang: 
                <a href="{{ \Illuminate\Support\Str::startsWith($prodi->accreditation_certificate, 'http') ? $prodi->accreditation_certificate : asset($prodi->accreditation_certificate) }}" target="_blank" download class="underline hover:text-emerald-900">
                    Lihat / Unduh Berkas
                </a>
            </div>
        @endif

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-1">
            <div>
                <label class="block text-[11px] font-semibold text-slate-500 mb-1">Ganti Berkas PDF / Foto Sertifikat</label>
                <input type="file" name="accreditation_certificate_file" accept=".pdf,image/*" class="w-full text-xs text-slate-500 file:mr-3 file:py-2 file:px-3 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-blue-600 file:text-white">
            </div>
            <div>
                <label class="block text-[11px] font-semibold text-slate-500 mb-1">Atau Ubah Tautan URL Sertifikat</label>
                <input type="text" name="accreditation_certificate_url" value="{{ old('accreditation_certificate_url', $prodi->accreditation_certificate) }}" placeholder="https://..." class="w-full px-3 py-2 bg-white border border-slate-200 rounded-xl text-xs font-mono focus:outline-none focus:border-blue-500">
            </div>
        </div>
    </div>

    <div>
        <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Deskripsi Umum Prodi</label>
        <textarea name="description" rows="4" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-blue-500">{{ old('description', $prodi->description) }}</textarea>
    </div>

    <div>
        <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Ringkasan Kurikulum (Opsional)</label>
        <textarea name="curriculum_summary" rows="3" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-blue-500">{{ old('curriculum_summary', $prodi->curriculum_summary) }}</textarea>
    </div>

    <div>
        <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Prospek Karir & Alumni (Opsional)</label>
        <textarea name="career_prospects" rows="3" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-blue-500">{{ old('career_prospects', $prodi->career_prospects) }}</textarea>
    </div>

    <div class="flex items-center gap-2 pt-2">
        <input type="checkbox" name="is_active" id="is_active" value="1" {{ $prodi->is_active ? 'checked' : '' }} class="rounded text-blue-600">
        <label for="is_active" class="text-sm font-bold text-slate-700">Aktifkan Program Studi di Website</label>
    </div>

    <button type="submit" class="bg-blue-700 hover:bg-blue-800 text-white font-bold px-6 py-3 rounded-xl shadow transition">
        Simpan Perubahan &rarr;
    </button>
</form>

@endsection
