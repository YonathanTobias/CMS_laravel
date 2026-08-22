@extends('layouts.admin')

@section('page_title', 'Tambah Prestasi & Ucapan Selamat')

@section('content')

<div class="mb-6 flex items-center justify-between">
    <div>
        <h2 class="font-heading font-bold text-xl text-slate-900 dark:text-white">Tambah Prestasi / Ucapan Selamat Baru</h2>
        <p class="text-xs text-slate-500 dark:text-slate-400">Isi detail penerima (Dosen / Mahasiswa / Tim Satgas), judul pencapaian, lencana ucapan, dan upload poster flyer.</p>
    </div>
    <a href="{{ route('admin.achievements.index') }}" class="text-xs text-slate-600 dark:text-slate-300 font-bold hover:underline">&larr; Kembali</a>
</div>

<form action="{{ route('admin.achievements.store') }}" method="POST" enctype="multipart/form-data" class="bg-white dark:bg-slate-900 rounded-2xl p-6 border border-slate-200 dark:border-slate-800 shadow-sm space-y-6 max-w-4xl transition-colors">
    @csrf

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
            <label class="block text-xs font-bold uppercase text-slate-600 dark:text-slate-300 mb-1">Nama Tokoh / Dosen / Mahasiswa / Tim Satgas</label>
            <input type="text" name="student_name" value="{{ old('student_name') }}" required placeholder="Contoh: Ns. Maria Lucia, M.Kep. / Tim Satgas PPKS / Sisilia Caroline S." class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-sm font-bold text-slate-900 dark:text-white focus:outline-none focus:border-blue-500">
        </div>
        <div>
            <label class="block text-xs font-bold uppercase text-slate-600 dark:text-slate-300 mb-1">Jabatan / Peran / Prodi & Semester</label>
            <input type="text" name="student_prodi" value="{{ old('student_prodi') }}" placeholder="Contoh: Dosen S1 Keperawatan / Unit Layanan Kampus / Mahasiswa D4 MIK" class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-sm text-slate-900 dark:text-white focus:outline-none focus:border-blue-500">
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <div class="sm:col-span-2">
            <label class="block text-xs font-bold uppercase text-slate-600 dark:text-slate-300 mb-1">Judul Pencapaian / Prestasi / Acara</label>
            <input type="text" name="title" value="{{ old('title') }}" required placeholder="Contoh: Lulus Sertifikasi Dosen Nasional / Pengangkatan Satgas PPKS / Juara 1 Poster" class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-sm font-bold text-slate-900 dark:text-white focus:outline-none focus:border-blue-500">
        </div>
        <div>
            <label class="block text-xs font-bold uppercase text-slate-600 dark:text-slate-300 mb-1">Lencana Ucapan / Award Badge</label>
            <input type="text" name="badge_title" value="{{ old('badge_title', 'Sertifikasi Dosen') }}" required placeholder="Sertifikasi Dosen, Satgas Baru, Juara 1, The Finest..." class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-sm font-bold text-slate-900 dark:text-white focus:outline-none focus:border-blue-500">
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
            <label class="block text-xs font-bold uppercase text-slate-600 dark:text-slate-300 mb-1">Penyelenggara / Institusi / SK</label>
            <input type="text" name="event_name" value="{{ old('event_name') }}" placeholder="Contoh: Kemenristekdikti / SK Ketua STIKes / Kita Merdeka Indonesia" class="w-full px-4 py-2 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-sm text-slate-900 dark:text-white focus:outline-none focus:border-blue-500">
        </div>
        <div>
            <label class="block text-xs font-bold uppercase text-slate-600 dark:text-slate-300 mb-1">Warna Lencana Badge</label>
            <select name="badge_color" class="w-full px-3 py-2 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-sm font-semibold text-slate-900 dark:text-white focus:outline-none focus:border-blue-500">
                <option value="bg-amber-500 text-slate-950">Emas / Amber (Juara 1 / Sertifikasi Dosen)</option>
                <option value="bg-indigo-600 text-white">Ungu / Indigo (Satgas Baru / Special Award)</option>
                <option value="bg-blue-600 text-white">Biru / Royal Blue (The Finest / Penghargaan)</option>
                <option value="bg-emerald-600 text-white">Hijau / Emerald (Juara 2 / 3)</option>
            </select>
        </div>
    </div>

    <div>
        <label class="block text-xs font-bold uppercase text-slate-600 dark:text-slate-300 mb-1">Upload Foto / Flyer Poster Ucapan Selamat (JPG, PNG)</label>
        <input type="file" name="poster_image" accept="image/*" class="w-full text-xs text-slate-500 dark:text-slate-400 file:mr-3 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-blue-600 file:text-white">
        <p class="text-[11px] text-slate-400 mt-1">Upload desain flyer poster Instagram ucapan selamat atas pencapaian dosen, satgas, atau mahasiswa.</p>
    </div>

    <div>
        <label class="block text-xs font-bold uppercase text-slate-600 dark:text-slate-300 mb-1">Deskripsi Singkat / Catatan (Opsional)</label>
        <textarea name="description" rows="2" placeholder="Catatan singkat..." class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-sm text-slate-900 dark:text-white focus:outline-none focus:border-blue-500">{{ old('description') }}</textarea>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
        <div>
            <label class="block text-xs font-bold uppercase text-slate-600 dark:text-slate-300 mb-1">Urutan Tampil (Order)</label>
            <input type="number" name="order" value="{{ old('order', 0) }}" class="w-full px-4 py-2 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-sm text-slate-900 dark:text-white focus:outline-none focus:border-blue-500">
        </div>
        <div class="flex items-center gap-2 pt-6">
            <input type="checkbox" name="is_active" id="is_active" value="1" checked class="rounded text-blue-600">
            <label for="is_active" class="text-sm font-bold text-slate-700 dark:text-slate-300">Tampilkan di Beranda Utama</label>
        </div>
    </div>

    <button type="submit" class="bg-blue-700 hover:bg-blue-800 text-white font-bold px-6 py-3 rounded-xl shadow transition">
        Simpan Ucapan & Prestasi &rarr;
    </button>
</form>

@endsection
