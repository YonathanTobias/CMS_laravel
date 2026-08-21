@extends('layouts.admin')

@section('page_title', 'Tambah Program Studi')

@section('content')

<div class="mb-6 flex items-center justify-between">
    <div>
        <h2 class="font-heading font-bold text-xl text-slate-900">Tambah Program Studi Baru</h2>
        <p class="text-xs text-slate-500">Isi detail nama prodi, jenjang pendidikan, akreditasi, dan sertifikat akreditasi.</p>
    </div>
    <a href="{{ route('admin.prodi.index') }}" class="text-xs text-slate-600 font-bold hover:underline">&larr; Kembali ke Daftar Prodi</a>
</div>

<form action="{{ route('admin.prodi.store') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm space-y-6 max-w-4xl">
    @csrf

    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <div class="sm:col-span-2">
            <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Nama Program Studi</label>
            <input type="text" name="name" value="{{ old('name') }}" required placeholder="Contoh: D3 Keperawatan, S1 Keperawatan..." class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-bold focus:outline-none focus:border-blue-500">
        </div>
        <div>
            <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Jenjang Pendidikan (Bebas Edit)</label>
            <input type="text" name="degree" value="{{ old('degree', 'D3') }}" required placeholder="D3, S1, Profesi, D4, S2..." list="degree-list" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-bold focus:outline-none focus:border-blue-500">
            <datalist id="degree-list">
                <option value="D3">D3 (Diploma Tiga)</option>
                <option value="D4">D4 (Sarjana Terapan)</option>
                <option value="S1">S1 (Sarjana)</option>
                <option value="Profesi">Profesi / Ners</option>
                <option value="S2">S2 (Magister)</option>
            </datalist>
            <p class="text-[11px] text-slate-400 mt-1">Anda bisa memilih opsi atau mengetikkan jenjang custom secara bebas.</p>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
            <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Status Akreditasi</label>
            <input type="text" name="accreditation" value="{{ old('accreditation', 'Unggul') }}" required placeholder="Unggul / Baik Sekali / A / B..." class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-blue-500">
        </div>
        <div>
            <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Icon FontAwesome</label>
            <input type="text" name="icon" value="{{ old('icon', 'fa-user-nurse') }}" placeholder="fa-user-nurse, fa-stethoscope, fa-pills..." class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-blue-500">
        </div>
    </div>

    <!-- Sertifikat Akreditasi Upload Section -->
    <div class="bg-blue-50/50 p-4 rounded-2xl border border-blue-100 space-y-3">
        <label class="block text-xs font-bold uppercase text-blue-900">Upload Berkas Sertifikat Akreditasi Resmi (PDF / Gambar)</label>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-[11px] font-semibold text-slate-500 mb-1">Upload Berkas PDF / Foto Sertifikat</label>
                <input type="file" name="accreditation_certificate_file" accept=".pdf,image/*" class="w-full text-xs text-slate-500 file:mr-3 file:py-2 file:px-3 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-blue-600 file:text-white">
            </div>
            <div>
                <label class="block text-[11px] font-semibold text-slate-500 mb-1">Atau Masukkan Tautan URL Sertifikat</label>
                <input type="text" name="accreditation_certificate_url" placeholder="https://..." class="w-full px-3 py-2 bg-white border border-slate-200 rounded-xl text-xs font-mono focus:outline-none focus:border-blue-500">
            </div>
        </div>
        <p class="text-[11px] text-blue-700">File sertifikat ini akan dapat didownload oleh pengunjung di halaman beranda & detail prodi.</p>
    </div>

    <div>
        <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Deskripsi Umum Prodi</label>
        <textarea name="description" rows="4" required placeholder="Penjelasan profil dan keunggulan prodi..." class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-blue-500">{{ old('description') }}</textarea>
    </div>

    <div>
        <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Ringkasan Kurikulum (Opsional)</label>
        <textarea name="curriculum_summary" rows="3" placeholder="SKS & mata kuliah praktikum unggulan..." class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-blue-500">{{ old('curriculum_summary') }}</textarea>
    </div>

    <div>
        <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Prospek Karir & Alumni (Opsional)</label>
        <textarea name="career_prospects" rows="3" placeholder="Peluang kerja di rumah sakit, instansi, atau luar negeri..." class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-blue-500">{{ old('career_prospects') }}</textarea>
    </div>

    <div class="flex items-center gap-2 pt-2">
        <input type="checkbox" name="is_active" id="is_active" value="1" checked class="rounded text-blue-600">
        <label for="is_active" class="text-sm font-bold text-slate-700">Aktifkan Program Studi di Website</label>
    </div>

    <button type="submit" class="bg-blue-700 hover:bg-blue-800 text-white font-bold px-6 py-3 rounded-xl shadow transition">
        Simpan Program Studi &rarr;
    </button>
</form>

@endsection
