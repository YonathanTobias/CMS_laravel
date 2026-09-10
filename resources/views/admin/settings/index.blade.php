@extends('layouts.admin')

@section('page_title', 'Pengaturan Situs & PMB')

@section('content')

<div class="mb-6">
    <h2 class="font-heading font-bold text-xl text-slate-900 dark:text-white">Pengaturan Situs, Header, Footer & Google Maps</h2>
    <p class="text-xs text-slate-500 dark:text-slate-400">Konfigurasi nama kampus, pengumuman header bar, widget PMB online, teks footer, Google Maps embed, informasi kontak, dan sosial media.</p>
</div>

<form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" class="bg-white dark:bg-slate-900 rounded-2xl p-8 border border-slate-200 dark:border-slate-800 shadow-sm space-y-8 max-w-4xl transition-colors">
    @csrf

    <!-- Identitas Utama -->
    <div class="space-y-4">
        <h3 class="font-heading font-bold text-slate-900 dark:text-white text-lg border-b border-slate-100 dark:border-slate-800 pb-2 text-blue-700 dark:text-sky-400">Identitas Kampus</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 dark:text-slate-300 mb-1">Nama Perguruan Tinggi</label>
                <input type="text" name="site_name" value="{{ $settings['site_name'] ?? 'STIKes Panti Waluya Malang' }}" class="w-full px-4 py-2 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-sm font-bold text-slate-900 dark:text-white focus:outline-none focus:border-blue-500">
            </div>
            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 dark:text-slate-300 mb-1">Slogan / Tagline</label>
                <input type="text" name="site_tagline" value="{{ $settings['site_tagline'] ?? '' }}" class="w-full px-4 py-2 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-sm text-slate-900 dark:text-white focus:outline-none focus:border-blue-500">
            </div>
        </div>
    </div>

    <!-- Running Text & Announcement Header Top Bar -->
    <div class="space-y-4 pt-4 border-t border-slate-100 dark:border-slate-800">
        <h3 class="font-heading font-bold text-slate-900 dark:text-white text-lg border-b border-slate-100 dark:border-slate-800 pb-2 text-amber-600 dark:text-amber-400 flex items-center gap-2">
            <i class="fa-solid fa-bullhorn text-amber-500"></i> Pengumuman Top Bar Header (Paling Atas Web)
        </h3>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 dark:text-slate-300 mb-1">Teks Badge Label</label>
                <input type="text" name="announcement_badge" value="{{ $settings['announcement_badge'] ?? 'PMB 2026/2027' }}" placeholder="PMB 2026/2027" class="w-full px-4 py-2 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-sm font-bold text-slate-900 dark:text-white focus:outline-none focus:border-blue-500">
            </div>
            <div class="sm:col-span-2">
                <label class="block text-xs font-bold uppercase text-slate-600 dark:text-slate-300 mb-1">Teks Pengumuman Header Running Text</label>
                <input type="text" name="announcement_text" value="{{ $settings['announcement_text'] ?? 'Pendaftaran Mahasiswa Baru D3/S1/Profesi Telah Dibuka!' }}" class="w-full px-4 py-2 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-sm font-semibold text-slate-900 dark:text-white focus:outline-none focus:border-blue-500">
            </div>
        </div>
    </div>

    <!-- Pengaturan Widget PMB Online Beranda (100% Editable) -->
    <div class="space-y-4 pt-4 border-t border-slate-100 dark:border-slate-800">
        <h3 class="font-heading font-bold text-slate-900 dark:text-white text-lg border-b border-slate-100 dark:border-slate-800 pb-2 text-emerald-600 dark:text-emerald-400 flex items-center gap-2">
            <i class="fa-solid fa-graduation-cap text-emerald-500"></i> Pengaturan Widget PMB Online (Kartu Beranda)
        </h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 dark:text-slate-300 mb-1">Teks Badge Widget PMB</label>
                <input type="text" name="pmb_widget_badge" value="{{ $settings['pmb_widget_badge'] ?? 'Info PMB Online' }}" class="w-full px-4 py-2 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-sm font-bold text-slate-900 dark:text-white focus:outline-none focus:border-blue-500">
            </div>
            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 dark:text-slate-300 mb-1">Judul Utama Widget PMB</label>
                <input type="text" name="pmb_widget_title" value="{{ $settings['pmb_widget_title'] ?? 'Pendaftaran Mahasiswa Baru D3 / S1 / Profesi' }}" class="w-full px-4 py-2 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-sm font-bold text-slate-900 dark:text-white focus:outline-none focus:border-blue-500">
            </div>
        </div>
        <div>
            <label class="block text-xs font-bold uppercase text-slate-600 dark:text-slate-300 mb-1">Deskripsi Singkat PMB Widget</label>
            <textarea name="pmb_widget_desc" rows="2" class="w-full px-4 py-2 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-sm text-slate-900 dark:text-white focus:outline-none focus:border-blue-500">{{ $settings['pmb_widget_desc'] ?? 'Bergabunglah bersama kampus kesehatan berkualitas dengan fasilitas laboratorium medis modern & jaringan kerja luas.' }}</textarea>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 dark:text-slate-300 mb-1">Poin Keunggulan 1</label>
                <input type="text" name="pmb_widget_point1" value="{{ $settings['pmb_widget_point1'] ?? 'Beasiswa Prestasi & Khusus' }}" class="w-full px-4 py-2 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-sm text-slate-900 dark:text-white focus:outline-none focus:border-blue-500">
            </div>
            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 dark:text-slate-300 mb-1">Poin Keunggulan 2</label>
                <input type="text" name="pmb_widget_point2" value="{{ $settings['pmb_widget_point2'] ?? 'D3 Keperawatan & D4 MIK' }}" class="w-full px-4 py-2 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-sm text-slate-900 dark:text-white focus:outline-none focus:border-blue-500">
            </div>
            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 dark:text-slate-300 mb-1">Poin Keunggulan 3</label>
                <input type="text" name="pmb_widget_point3" value="{{ $settings['pmb_widget_point3'] ?? 'S1 Keperawatan & Profesi Ners' }}" class="w-full px-4 py-2 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-sm text-slate-900 dark:text-white focus:outline-none focus:border-blue-500">
            </div>
        </div>
    </div>

    <!-- Pendaftaran & PMB Link -->
    <div class="space-y-4 pt-4 border-t border-slate-100 dark:border-slate-800">
        <h3 class="font-heading font-bold text-slate-900 dark:text-white text-lg border-b border-slate-100 dark:border-slate-800 pb-2 text-blue-700 dark:text-sky-400">Pengaturan Portal PMB Online</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 dark:text-slate-300 mb-1">Status Gelombang PMB</label>
                <select name="pmb_status" class="w-full px-4 py-2 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-sm font-semibold text-slate-900 dark:text-white focus:outline-none focus:border-blue-500">
                    <option value="Buka" {{ ($settings['pmb_status'] ?? '') === 'Buka' ? 'selected' : '' }}>Dibuka (Buka Pendaftaran)</option>
                    <option value="Tutup" {{ ($settings['pmb_status'] ?? '') === 'Tutup' ? 'selected' : '' }}>Ditutup Sementara</option>
                </select>
            </div>
            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 dark:text-slate-300 mb-1">Tautan / URL Portal PMB Online</label>
                <input type="text" name="pmb_link" value="{{ $settings['pmb_link'] ?? 'https://pmb.stikespantiwaluya.ac.id' }}" placeholder="https://pmb.stikespantiwaluya.ac.id" class="w-full px-4 py-2 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-sm font-mono text-slate-900 dark:text-white focus:outline-none focus:border-blue-500">
            </div>
        </div>
    </div>

    <!-- Pengaturan Full Dinamis Ekosistem Pembelajaran & Layanan Akademik (7 Ikon Beranda) -->
    <div class="space-y-6 pt-6 border-t border-slate-100 dark:border-slate-800">
        <h3 class="font-heading font-bold text-slate-900 dark:text-white text-lg border-b border-slate-100 dark:border-slate-800 pb-2 text-purple-600 dark:text-purple-400 flex items-center gap-2">
            <i class="fa-solid fa-shapes text-purple-500"></i> Pengaturan Ekosistem Pembelajaran & Layanan Akademik (7 Ikon Beranda)
        </h3>

        <!-- Judul & Subtitle Seksi -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 bg-purple-50/50 dark:bg-purple-950/20 p-4 rounded-2xl border border-purple-100 dark:border-purple-900/50">
            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 dark:text-slate-300 mb-1">Badge Seksi</label>
                <input type="text" name="service_section_badge" value="{{ $settings['service_section_badge'] ?? 'Fasilitas & Portal Layanan' }}" class="w-full px-4 py-2 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-sm font-bold text-slate-900 dark:text-white">
            </div>
            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 dark:text-slate-300 mb-1">Judul Utama Seksi</label>
                <input type="text" name="service_section_title" value="{{ $settings['service_section_title'] ?? 'Ekosistem Pembelajaran & Layanan Akademik' }}" class="w-full px-4 py-2 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-sm font-bold text-slate-900 dark:text-white">
            </div>
            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 dark:text-slate-300 mb-1">Deskripsi Seksi</label>
                <input type="text" name="service_section_desc" value="{{ $settings['service_section_desc'] ?? 'Akses cepat ke portal layanan digital mahasiswa, perpustakaan online, laboratorium, dan sistem ujian.' }}" class="w-full px-4 py-2 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-sm text-slate-900 dark:text-white">
            </div>
        </div>

        <!-- 7 Ikon Cards Form Grid -->
        <div class="space-y-4">
            <h4 class="font-bold text-xs uppercase tracking-wider text-slate-500 dark:text-slate-400">Pengaturan 7 Ikon Portal & Layanan:</h4>
            
            <!-- Item 1: PMB Online -->
            <div class="p-4 bg-slate-50 dark:bg-slate-800/60 rounded-2xl border border-slate-200 dark:border-slate-700/60 grid grid-cols-1 sm:grid-cols-3 gap-3">
                <div>
                    <label class="block text-[11px] font-bold text-amber-600 dark:text-amber-400 mb-1">Ikon 1: Judul</label>
                    <input type="text" name="icon1_title" value="{{ $settings['icon1_title'] ?? 'PMB Online' }}" class="w-full px-3 py-1.5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg text-xs font-bold text-slate-900 dark:text-white">
                </div>
                <div>
                    <label class="block text-[11px] font-bold text-slate-500 mb-1">Keterangan / Subtext</label>
                    <input type="text" name="icon1_sub" value="{{ $settings['icon1_sub'] ?? 'Pendaftaran Mahasiswa Baru' }}" class="w-full px-3 py-1.5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg text-xs text-slate-900 dark:text-white">
                </div>
                <div>
                    <label class="block text-[11px] font-bold text-slate-500 mb-1">URL Tautan / Link</label>
                    <input type="text" name="icon1_link" value="{{ $settings['icon1_link'] ?? ($settings['pmb_link'] ?? 'https://pmb.stikespantiwaluya.ac.id') }}" class="w-full px-3 py-1.5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg text-xs font-mono text-slate-900 dark:text-white">
                </div>
            </div>

            <!-- Item 2: Kemahasiswaan -->
            <div class="p-4 bg-slate-50 dark:bg-slate-800/60 rounded-2xl border border-slate-200 dark:border-slate-700/60 grid grid-cols-1 sm:grid-cols-3 gap-3">
                <div>
                    <label class="block text-[11px] font-bold text-blue-600 dark:text-sky-400 mb-1">Ikon 2: Judul</label>
                    <input type="text" name="icon2_title" value="{{ $settings['icon2_title'] ?? 'Kemahasiswaan' }}" class="w-full px-3 py-1.5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg text-xs font-bold text-slate-900 dark:text-white">
                </div>
                <div>
                    <label class="block text-[11px] font-bold text-slate-500 mb-1">Keterangan / Subtext</label>
                    <input type="text" name="icon2_sub" value="{{ $settings['icon2_sub'] ?? 'UKM & Organisasi Kampus' }}" class="w-full px-3 py-1.5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg text-xs text-slate-900 dark:text-white">
                </div>
                <div>
                    <label class="block text-[11px] font-bold text-slate-500 mb-1">URL Tautan / Link</label>
                    <input type="text" name="icon2_link" value="{{ $settings['icon2_link'] ?? '/halaman/kemahasiswaan' }}" class="w-full px-3 py-1.5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg text-xs font-mono text-slate-900 dark:text-white">
                </div>
            </div>

            <!-- Item 3: LMS E-Learning -->
            <div class="p-4 bg-slate-50 dark:bg-slate-800/60 rounded-2xl border border-slate-200 dark:border-slate-700/60 grid grid-cols-1 sm:grid-cols-3 gap-3">
                <div>
                    <label class="block text-[11px] font-bold text-emerald-600 dark:text-emerald-400 mb-1">Ikon 3: Judul</label>
                    <input type="text" name="icon3_title" value="{{ $settings['icon3_title'] ?? 'LMS E-Learning' }}" class="w-full px-3 py-1.5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg text-xs font-bold text-slate-900 dark:text-white">
                </div>
                <div>
                    <label class="block text-[11px] font-bold text-slate-500 mb-1">Keterangan / Subtext</label>
                    <input type="text" name="icon3_sub" value="{{ $settings['icon3_sub'] ?? 'Pembelajaran Digital' }}" class="w-full px-3 py-1.5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg text-xs text-slate-900 dark:text-white">
                </div>
                <div>
                    <label class="block text-[11px] font-bold text-slate-500 mb-1">URL Tautan / Link</label>
                    <input type="text" name="icon3_link" value="{{ $settings['icon3_link'] ?? ($settings['link_lms'] ?? '#') }}" class="w-full px-3 py-1.5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg text-xs font-mono text-slate-900 dark:text-white">
                </div>
            </div>

            <!-- Item 4: CBT Ujian Online -->
            <div class="p-4 bg-slate-50 dark:bg-slate-800/60 rounded-2xl border border-slate-200 dark:border-slate-700/60 grid grid-cols-1 sm:grid-cols-3 gap-3">
                <div>
                    <label class="block text-[11px] font-bold text-indigo-600 dark:text-indigo-400 mb-1">Ikon 4: Judul</label>
                    <input type="text" name="icon4_title" value="{{ $settings['icon4_title'] ?? 'CBT Ujian Online' }}" class="w-full px-3 py-1.5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg text-xs font-bold text-slate-900 dark:text-white">
                </div>
                <div>
                    <label class="block text-[11px] font-bold text-slate-500 mb-1">Keterangan / Subtext</label>
                    <input type="text" name="icon4_sub" value="{{ $settings['icon4_sub'] ?? 'Sistem Evaluasi Digital' }}" class="w-full px-3 py-1.5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg text-xs text-slate-900 dark:text-white">
                </div>
                <div>
                    <label class="block text-[11px] font-bold text-slate-500 mb-1">URL Tautan / Link</label>
                    <input type="text" name="icon4_link" value="{{ $settings['icon4_link'] ?? ($settings['link_cbt'] ?? '#') }}" class="w-full px-3 py-1.5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg text-xs font-mono text-slate-900 dark:text-white">
                </div>
            </div>

            <!-- Item 5: E-Library -->
            <div class="p-4 bg-slate-50 dark:bg-slate-800/60 rounded-2xl border border-slate-200 dark:border-slate-700/60 grid grid-cols-1 sm:grid-cols-3 gap-3">
                <div>
                    <label class="block text-[11px] font-bold text-purple-600 dark:text-purple-400 mb-1">Ikon 5: Judul</label>
                    <input type="text" name="icon5_title" value="{{ $settings['icon5_title'] ?? 'E-Library' }}" class="w-full px-3 py-1.5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg text-xs font-bold text-slate-900 dark:text-white">
                </div>
                <div>
                    <label class="block text-[11px] font-bold text-slate-500 mb-1">Keterangan / Subtext</label>
                    <input type="text" name="icon5_sub" value="{{ $settings['icon5_sub'] ?? 'Perpustakaan Digital' }}" class="w-full px-3 py-1.5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg text-xs text-slate-900 dark:text-white">
                </div>
                <div>
                    <label class="block text-[11px] font-bold text-slate-500 mb-1">URL Tautan / Link</label>
                    <input type="text" name="icon5_link" value="{{ $settings['icon5_link'] ?? ($settings['link_elibrary'] ?? '#') }}" class="w-full px-3 py-1.5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg text-xs font-mono text-slate-900 dark:text-white">
                </div>
            </div>

            <!-- Item 6: Jurnal Online -->
            <div class="p-4 bg-slate-50 dark:bg-slate-800/60 rounded-2xl border border-slate-200 dark:border-slate-700/60 grid grid-cols-1 sm:grid-cols-3 gap-3">
                <div>
                    <label class="block text-[11px] font-bold text-rose-600 dark:text-rose-400 mb-1">Ikon 6: Judul</label>
                    <input type="text" name="icon6_title" value="{{ $settings['icon6_title'] ?? 'Jurnal Online' }}" class="w-full px-3 py-1.5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg text-xs font-bold text-slate-900 dark:text-white">
                </div>
                <div>
                    <label class="block text-[11px] font-bold text-slate-500 mb-1">Keterangan / Subtext</label>
                    <input type="text" name="icon6_sub" value="{{ $settings['icon6_sub'] ?? 'Publikasi Riset Kesehatan' }}" class="w-full px-3 py-1.5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg text-xs text-slate-900 dark:text-white">
                </div>
                <div>
                    <label class="block text-[11px] font-bold text-slate-500 mb-1">URL Tautan / Link</label>
                    <input type="text" name="icon6_link" value="{{ $settings['icon6_link'] ?? ($settings['link_jurnal'] ?? '#') }}" class="w-full px-3 py-1.5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg text-xs font-mono text-slate-900 dark:text-white">
                </div>
            </div>

            <!-- Item 7: Laboratorium -->
            <div class="p-4 bg-slate-50 dark:bg-slate-800/60 rounded-2xl border border-slate-200 dark:border-slate-700/60 grid grid-cols-1 sm:grid-cols-3 gap-3">
                <div>
                    <label class="block text-[11px] font-bold text-teal-600 dark:text-teal-400 mb-1">Ikon 7: Judul</label>
                    <input type="text" name="icon7_title" value="{{ $settings['icon7_title'] ?? 'Laboratorium' }}" class="w-full px-3 py-1.5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg text-xs font-bold text-slate-900 dark:text-white">
                </div>
                <div>
                    <label class="block text-[11px] font-bold text-slate-500 mb-1">Keterangan / Subtext</label>
                    <input type="text" name="icon7_sub" value="{{ $settings['icon7_sub'] ?? 'Sarana Practical Medis' }}" class="w-full px-3 py-1.5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg text-xs text-slate-900 dark:text-white">
                </div>
                <div>
                    <label class="block text-[11px] font-bold text-slate-500 mb-1">URL Tautan / Link</label>
                    <input type="text" name="icon7_link" value="{{ $settings['icon7_link'] ?? '/fasilitas' }}" class="w-full px-3 py-1.5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg text-xs font-mono text-slate-900 dark:text-white">
                </div>
            </div>

            <!-- Item 8: SIAKAD Online -->
            <div class="p-4 bg-slate-50 dark:bg-slate-800/60 rounded-2xl border border-slate-200 dark:border-slate-700/60 grid grid-cols-1 sm:grid-cols-3 gap-3">
                <div>
                    <label class="block text-[11px] font-bold text-sky-600 dark:text-sky-400 mb-1">Ikon 8: Judul</label>
                    <input type="text" name="icon8_title" value="{{ $settings['icon8_title'] ?? 'SIAKAD Online' }}" class="w-full px-3 py-1.5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg text-xs font-bold text-slate-900 dark:text-white">
                </div>
                <div>
                    <label class="block text-[11px] font-bold text-slate-500 mb-1">Keterangan / Subtext</label>
                    <input type="text" name="icon8_sub" value="{{ $settings['icon8_sub'] ?? 'Sistem Informasi Akademik' }}" class="w-full px-3 py-1.5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg text-xs text-slate-900 dark:text-white">
                </div>
                <div>
                    <label class="block text-[11px] font-bold text-slate-500 mb-1">URL Tautan / Link</label>
                    <input type="text" name="icon8_link" value="{{ $settings['icon8_link'] ?? 'https://siakad.stikespantiwaluya.ac.id' }}" class="w-full px-3 py-1.5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg text-xs font-mono text-slate-900 dark:text-white">
                </div>
            </div>

        </div>
    </div>

    <!-- 5. Pengaturan Sekilas Mengenai Kampus (Seksi 5 Beranda) -->
    <div class="space-y-6 pt-6 border-t border-slate-100 dark:border-slate-800">
        <h3 class="font-heading font-bold text-slate-900 dark:text-white text-lg border-b border-slate-100 dark:border-slate-800 pb-2 text-blue-700 dark:text-sky-400 flex items-center gap-2">
            <i class="fa-solid fa-university text-blue-600"></i> Pengaturan Sekilas Mengenai Kampus (Seksi 5 Beranda)
        </h3>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 dark:text-slate-300 mb-1">Badge Seksi Profil</label>
                <input type="text" name="profile_section_badge" value="{{ $settings['profile_section_badge'] ?? 'Profil Kampus Kesehatan' }}" class="w-full px-4 py-2 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-sm font-bold text-slate-900 dark:text-white">
            </div>
            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 dark:text-slate-300 mb-1">Judul Utama Seksi Profil</label>
                <input type="text" name="profile_section_title" value="{{ $settings['profile_section_title'] ?? 'Sekilas Mengenai STIKes Panti Waluya Malang' }}" class="w-full px-4 py-2 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-sm font-bold text-slate-900 dark:text-white">
            </div>
        </div>

        <div>
            <label class="block text-xs font-bold uppercase text-slate-600 dark:text-slate-300 mb-1">Deskripsi Singkat Profil Kampus</label>
            <textarea name="profile_section_desc" rows="3" class="w-full px-4 py-2 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-sm text-slate-900 dark:text-white">{{ $settings['profile_section_desc'] ?? 'Sekolah Tinggi Ilmu Kesehatan Panti Waluya Malang adalah perguruan tinggi kesehatan terkemuka di Kota Malang yang melahirkan tenaga kesehatan profesional, berintegritas tinggi, dan siap kerja nasional maupun internasional.' }}</textarea>
        </div>

        <!-- Foto Gedung Kampus & Teks Foto -->
        <div class="p-4 bg-blue-50/50 dark:bg-blue-950/20 rounded-2xl border border-blue-100 dark:border-blue-900/50 space-y-4">
            <h4 class="font-bold text-xs uppercase tracking-wider text-blue-900 dark:text-sky-300 flex items-center gap-1.5">
                <i class="fa-solid fa-image text-blue-600"></i> Pengaturan Kartu Foto Gedung Kampus (Kiri):
            </h4>
            
            <!-- Preview Gambar Gedung Saat Ini -->
            @php
                $profileImg = $settings['profile_image_url'] ?? 'https://images.unsplash.com/photo-1562774053-701939374585?q=80&w=800&auto=format&fit=crop';
                $profileImgSrc = \Illuminate\Support\Str::startsWith($profileImg, 'http') ? $profileImg : asset($profileImg);
            @endphp
            <div class="flex items-center gap-4 bg-white dark:bg-slate-800 p-3 rounded-xl border border-slate-200 dark:border-slate-700">
                <div class="w-24 h-16 rounded-lg overflow-hidden bg-slate-900 shrink-0 border border-slate-200 dark:border-slate-700 shadow-sm">
                    <img src="{{ $profileImgSrc }}" class="w-full h-full object-cover">
                </div>
                <div class="space-y-1 overflow-hidden">
                    <div class="text-xs font-bold text-slate-800 dark:text-slate-200">Foto Terpasang Saat Ini:</div>
                    <div class="text-[11px] text-slate-500 dark:text-slate-400 font-mono truncate">{{ $profileImg }}</div>
                </div>
            </div>

            <!-- Input Berkas Gambar (Upload) & Input URL -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="sm:col-span-2 p-3 bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 space-y-3">
                    <div>
                        <label class="block text-[11px] font-bold uppercase text-blue-900 dark:text-sky-300 mb-1">
                            <i class="fa-solid fa-upload mr-1"></i> Unggah Berkas Foto Gedung Baru (Disarankan)
                        </label>
                        <input type="file" name="profile_image_file" accept="image/*" class="w-full text-xs text-slate-600 dark:text-slate-300 file:mr-4 file:py-2 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-blue-100 file:text-blue-800 dark:file:bg-blue-950 dark:file:text-sky-300 hover:file:bg-blue-200 cursor-pointer">
                    </div>
                    <div class="pt-2 border-t border-slate-100 dark:border-slate-700">
                        <label class="block text-[11px] font-bold uppercase text-slate-600 dark:text-slate-400 mb-1">
                            <i class="fa-solid fa-link mr-1"></i> ATAU Masukkan Tautan URL Gambar (Opsional)
                        </label>
                        <input type="text" name="profile_image_url" value="{{ $settings['profile_image_url'] ?? 'https://images.unsplash.com/photo-1562774053-701939374585?q=80&w=800&auto=format&fit=crop' }}" placeholder="https://..." class="w-full px-3 py-1.5 bg-slate-50 dark:bg-slate-900 border border-slate-200 dark:border-slate-700 rounded-lg text-xs font-mono text-slate-900 dark:text-white">
                    </div>
                </div>
                <div>
                    <label class="block text-[11px] font-bold text-slate-600 dark:text-slate-300 mb-1">Badge Foto Gedung</label>
                    <input type="text" name="profile_image_badge" value="{{ $settings['profile_image_badge'] ?? 'Terakreditasi Baik Sekali (BAN-PT)' }}" class="w-full px-3 py-1.5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg text-xs font-bold text-slate-900 dark:text-white">
                </div>
                <div>
                    <label class="block text-[11px] font-bold text-slate-600 dark:text-slate-300 mb-1">Judul Foto Gedung</label>
                    <input type="text" name="profile_image_title" value="{{ $settings['profile_image_title'] ?? 'STIKes Panti Waluya Malang' }}" class="w-full px-3 py-1.5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg text-xs font-bold text-slate-900 dark:text-white">
                </div>
                <div class="sm:col-span-2">
                    <label class="block text-[11px] font-bold text-slate-600 dark:text-slate-300 mb-1">Alamat Singkat / Subtitle Foto</label>
                    <input type="text" name="profile_image_subtitle" value="{{ $settings['profile_image_subtitle'] ?? 'Jl. Yulius Riefbuilder No. 5, Oro-Oro Dowo, Klojen, Malang' }}" class="w-full px-3 py-1.5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg text-xs text-slate-900 dark:text-white">
                </div>
            </div>
        </div>

        <!-- 2 Kotak Keunggulan -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div class="p-4 bg-slate-50 dark:bg-slate-800/60 rounded-2xl border border-slate-200 dark:border-slate-700/60 space-y-2">
                <h5 class="font-bold text-xs text-blue-700 dark:text-sky-400">Kotak Keunggulan 1 (Visi)</h5>
                <input type="text" name="profile_box1_title" value="{{ $settings['profile_box1_title'] ?? 'Visi Kampus Unggul' }}" placeholder="Judul" class="w-full px-3 py-1.5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg text-xs font-bold text-slate-900 dark:text-white">
                <input type="text" name="profile_box1_sub" value="{{ $settings['profile_box1_sub'] ?? 'Berdaya Saing Global' }}" placeholder="Subtitle" class="w-full px-3 py-1.5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg text-xs text-slate-900 dark:text-white">
            </div>
            <div class="p-4 bg-slate-50 dark:bg-slate-800/60 rounded-2xl border border-slate-200 dark:border-slate-700/60 space-y-2">
                <h5 class="font-bold text-xs text-emerald-700 dark:text-emerald-400">Kotak Keunggulan 2 (Akreditasi)</h5>
                <input type="text" name="profile_box2_title" value="{{ $settings['profile_box2_title'] ?? 'Akreditasi BAN-PT' }}" placeholder="Judul" class="w-full px-3 py-1.5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg text-xs font-bold text-slate-900 dark:text-white">
                <input type="text" name="profile_box2_sub" value="{{ $settings['profile_box2_sub'] ?? 'Terakreditasi Baik Sekali' }}" placeholder="Subtitle" class="w-full px-3 py-1.5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg text-xs text-slate-900 dark:text-white">
            </div>
        </div>
    </div>

    <!-- 5B. Pengaturan Widget Sertifikat Akreditasi & Piagam Institusi (Seksi 5B Beranda) -->
    <div class="space-y-6 pt-6 border-t border-slate-100 dark:border-slate-800">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 border-b border-slate-100 dark:border-slate-800 pb-3">
            <h3 class="font-heading font-bold text-slate-900 dark:text-white text-lg text-emerald-600 dark:text-emerald-400 flex items-center gap-2">
                <i class="fa-solid fa-award text-emerald-500"></i> Pengaturan Widget Sertifikat Akreditasi & Piagam Institusi (Seksi 5B Beranda)
            </h3>
            <a href="{{ route('admin.certificates.index') }}" class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold px-4 py-2 rounded-xl text-xs shadow transition flex items-center gap-1.5 shrink-0">
                <i class="fa-solid fa-layer-group"></i> Kelola & Tambah Sertifikat/Piagam &rarr;
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 dark:text-slate-300 mb-1">Badge Seksi Sertifikat</label>
                <input type="text" name="cert_section_badge" value="{{ $settings['cert_section_badge'] ?? 'Sertifikasi & Legalisasi Resmi Kampus' }}" class="w-full px-4 py-2 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-sm font-bold text-slate-900 dark:text-white">
            </div>
            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 dark:text-slate-300 mb-1">Judul Utama Seksi Sertifikat</label>
                <input type="text" name="cert_section_title" value="{{ $settings['cert_section_title'] ?? 'Sertifikat Akreditasi & Piagam Penghargaan Institusi' }}" class="w-full px-4 py-2 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-sm font-bold text-slate-900 dark:text-white">
            </div>
        </div>

        <div>
            <label class="block text-xs font-bold uppercase text-slate-600 dark:text-slate-300 mb-1">Deskripsi Seksi Sertifikat</label>
            <textarea name="cert_section_desc" rows="2" class="w-full px-4 py-2 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-sm text-slate-900 dark:text-white">{{ $settings['cert_section_desc'] ?? 'Dokumen legalitas akreditasi institusi BAN-PT, LAM-PTKes, penghargaan LLDIKTI VII, dan standar laboratorium Kemenkes RI yang ditampilkan transparan.' }}</textarea>
        </div>

        <div class="p-4 bg-emerald-50/50 dark:bg-emerald-950/20 rounded-2xl border border-emerald-200 dark:border-emerald-900/50 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <div class="space-y-1">
                <h4 class="font-bold text-xs uppercase tracking-wider text-emerald-900 dark:text-emerald-300 flex items-center gap-1.5">
                    <i class="fa-solid fa-circle-info text-emerald-600"></i> Kelola Item Sertifikat & Piagam Kampus:
                </h4>
                <p class="text-xs text-slate-600 dark:text-slate-300">
                    Setiap sertifikat atau piagam kini dikelola secara terpisah melalui menu tersendiri (Tambah/Edit/Hapus/Urutan & Unggah Berkas/URL).
                </p>
            </div>
            <a href="{{ route('admin.certificates.index') }}" class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold px-4 py-2 rounded-xl text-xs shadow transition flex items-center gap-1.5 shrink-0">
                <i class="fa-solid fa-pen-to-square"></i> Buka Menu Sertifikat & Piagam
            </a>
        </div>
    </div>

    <!-- Pengaturan Footer Website & Google Maps -->
    <div class="space-y-4 pt-4 border-t border-slate-100 dark:border-slate-800">
        <h3 class="font-heading font-bold text-slate-900 dark:text-white text-lg border-b border-slate-100 dark:border-slate-800 pb-2 text-indigo-700 dark:text-indigo-400 flex items-center gap-2">
            <i class="fa-solid fa-map-location-dot text-indigo-600"></i> Pengaturan Footer & Google Maps Kampus
        </h3>
        
        <div>
            <label class="block text-xs font-bold uppercase text-slate-600 dark:text-slate-300 mb-1">Google Maps Embed URL (Peta Kampus di Footer)</label>
            <input type="text" name="maps_embed_url" value="{{ $settings['maps_embed_url'] ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.1327435545477!2d112.62282707488443!3d-7.985224792040181!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6281ed19836a9%3A0xa3b7da4959b42040!2sSekolah%20Tinggi%20Ilmu%20kesehatan%20Panti%20Waluya!5e0!3m2!1sid!2sid!4v1789012783861!5m2!1sid!2sid' }}" class="w-full px-4 py-2 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-xs font-mono text-slate-900 dark:text-white focus:outline-none focus:border-blue-500">
        </div>

        <div>
            <label class="block text-xs font-bold uppercase text-slate-600 dark:text-slate-300 mb-1">Deskripsi Singkat Kampus (Di Bawah Logo Footer)</label>
            <textarea name="footer_description" rows="2" class="w-full px-4 py-2 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-sm text-slate-900 dark:text-white focus:outline-none focus:border-blue-500">{{ $settings['footer_description'] ?? 'Sekolah Tinggi Ilmu Kesehatan Panti Waluya Malang melahirkan tenaga kesehatan profesional, berintegritas, dan siap kerja nasional maupun internasional.' }}</textarea>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 dark:text-slate-300 mb-1">Teks Hak Cipta (Copyright)</label>
                <input type="text" name="footer_copyright" value="{{ $settings['footer_copyright'] ?? '© ' . date('Y') . ' STIKes Panti Waluya Malang. All rights reserved.' }}" class="w-full px-4 py-2 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-sm text-slate-900 dark:text-white focus:outline-none focus:border-blue-500">
            </div>
            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 dark:text-slate-300 mb-1">Teks Kredit / Pengembang</label>
                <input type="text" name="footer_credits" value="{{ $settings['footer_credits'] ?? 'Dikembangkan untuk STIKes Panti Waluya Malang.' }}" class="w-full px-4 py-2 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-sm text-slate-900 dark:text-white focus:outline-none focus:border-blue-500">
            </div>
        </div>
    </div>

    <!-- Integrasi FontAwesome Pro (Opsional) -->
    <div class="space-y-4 pt-4 border-t border-slate-100 dark:border-slate-800">
        <h3 class="font-heading font-bold text-slate-900 dark:text-white text-lg border-b border-slate-100 dark:border-slate-800 pb-2 text-purple-700 dark:text-purple-400 flex items-center gap-2">
            <i class="fa-solid fa-star text-purple-600"></i> Integrasi FontAwesome Pro (Opsional)
        </h3>
        <div>
            <label class="block text-xs font-bold uppercase text-slate-600 dark:text-slate-300 mb-1">FontAwesome Pro Kit Script / Pro CDN URL</label>
            <input type="text" name="fontawesome_pro_url" value="{{ $settings['fontawesome_pro_url'] ?? '' }}" placeholder="https://kit.fontawesome.com/your-kit-code.js atau https://..." class="w-full px-4 py-2 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-xs font-mono text-slate-900 dark:text-white focus:outline-none focus:border-purple-500">
            <p class="text-[11px] text-slate-500 dark:text-slate-400 mt-1.5 leading-relaxed">
                <i class="fa-solid fa-circle-info text-purple-500 mr-1"></i> Jika Anda memiliki lisensi <strong>FontAwesome Pro Kit</strong> (misalnya <code>https://kit.fontawesome.com/kode-kit.js</code> atau tautan CSS Pro), masukkan di sini untuk mengaktifkan seluruh keluarga ikon Pro (termasuk <code>fa-sharp</code>, <code>fa-duotone</code>, <code>fa-files-medical</code>, dll.). Jika dikosongkan, sistem secara otomatis menggunakan FontAwesome 6.7.2 Free + pemetaan ikon otomatis.
            </p>
        </div>
    </div>

    <!-- Informasi Kontak -->
    <div class="space-y-4 pt-4 border-t border-slate-100 dark:border-slate-800">
        <h3 class="font-heading font-bold text-slate-900 dark:text-white text-lg border-b border-slate-100 dark:border-slate-800 pb-2 text-blue-700 dark:text-sky-400">Informasi Kontak & Alamat</h3>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 dark:text-slate-300 mb-1">Telepon Kantor</label>
                <input type="text" name="phone" value="{{ $settings['phone'] ?? '' }}" class="w-full px-4 py-2 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-sm text-slate-900 dark:text-white focus:outline-none focus:border-blue-500">
            </div>
            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 dark:text-slate-300 mb-1">WhatsApp PMB</label>
                <input type="text" name="whatsapp" value="{{ $settings['whatsapp'] ?? '' }}" class="w-full px-4 py-2 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-sm text-slate-900 dark:text-white focus:outline-none focus:border-blue-500">
            </div>
            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 dark:text-slate-300 mb-1">Email Resmi</label>
                <input type="email" name="email" value="{{ $settings['email'] ?? '' }}" class="w-full px-4 py-2 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-sm text-slate-900 dark:text-white focus:outline-none focus:border-blue-500">
            </div>
        </div>
        <div>
            <label class="block text-xs font-bold uppercase text-slate-600 dark:text-slate-300 mb-1">Alamat Lengkap Kampus</label>
            <textarea name="address" rows="2" class="w-full px-4 py-2 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-sm text-slate-900 dark:text-white focus:outline-none focus:border-blue-500">{{ $settings['address'] ?? '' }}</textarea>
        </div>
    </div>

    <!-- Media Sosial -->
    <div class="space-y-4 pt-4 border-t border-slate-100 dark:border-slate-800">
        <h3 class="font-heading font-bold text-slate-900 dark:text-white text-lg border-b border-slate-100 dark:border-slate-800 pb-2 text-blue-700 dark:text-sky-400">Tautan Media Sosial</h3>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 dark:text-slate-300 mb-1">Facebook URL</label>
                <input type="text" name="facebook" value="{{ $settings['facebook'] ?? '' }}" class="w-full px-4 py-2 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-sm text-slate-900 dark:text-white focus:outline-none focus:border-blue-500">
            </div>
            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 dark:text-slate-300 mb-1">Instagram URL</label>
                <input type="text" name="instagram" value="{{ $settings['instagram'] ?? '' }}" class="w-full px-4 py-2 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-sm text-slate-900 dark:text-white focus:outline-none focus:border-blue-500">
            </div>
            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 dark:text-slate-300 mb-1">YouTube Channel URL</label>
                <input type="text" name="youtube" value="{{ $settings['youtube'] ?? '' }}" class="w-full px-4 py-2 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-sm text-slate-900 dark:text-white focus:outline-none focus:border-blue-500">
            </div>
        </div>
    </div>

    <button type="submit" class="bg-blue-700 hover:bg-blue-800 text-white font-bold px-8 py-3.5 rounded-xl shadow-lg transition">
        <i class="fa-solid fa-floppy-disk mr-2"></i> Simpan Seluruh Pengaturan
    </button>
</form>

@endsection
