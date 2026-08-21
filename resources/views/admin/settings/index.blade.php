@extends('layouts.admin')

@section('page_title', 'Pengaturan Situs & PMB')

@section('content')

<div class="mb-6">
    <h2 class="font-heading font-bold text-xl text-slate-900">Pengaturan Situs, Header, Footer & Google Maps</h2>
    <p class="text-xs text-slate-500">Konfigurasi nama kampus, pengumuman header bar, teks footer, Google Maps embed, informasi kontak, dan sosial media.</p>
</div>

<form action="{{ route('admin.settings.update') }}" method="POST" class="bg-white rounded-2xl p-8 border border-slate-200 shadow-sm space-y-8 max-w-4xl">
    @csrf

    <!-- Identitas Utama -->
    <div class="space-y-4">
        <h3 class="font-heading font-bold text-slate-900 text-lg border-b border-slate-100 pb-2 text-blue-700">Identitas Kampus</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Nama Perguruan Tinggi</label>
                <input type="text" name="site_name" value="{{ $settings['site_name'] ?? 'STIKes Panti Waluya Malang' }}" class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm font-bold focus:outline-none focus:border-blue-500">
            </div>
            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Slogan / Tagline</label>
                <input type="text" name="site_tagline" value="{{ $settings['site_tagline'] ?? '' }}" class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-blue-500">
            </div>
        </div>
    </div>

    <!-- Running Text & Announcement Header Top Bar -->
    <div class="space-y-4 pt-4 border-t border-slate-100">
        <h3 class="font-heading font-bold text-slate-900 text-lg border-b border-slate-100 pb-2 text-amber-600 flex items-center gap-2">
            <i class="fa-solid fa-bullhorn text-amber-500"></i> Pengumuman Top Bar Header (Paling Atas Web)
        </h3>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Teks Badge Label</label>
                <input type="text" name="announcement_badge" value="{{ $settings['announcement_badge'] ?? 'PMB 2026/2027' }}" placeholder="PMB 2026/2027" class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm font-bold focus:outline-none focus:border-blue-500">
            </div>
            <div class="sm:col-span-2">
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Teks Pengumuman Header Running Text</label>
                <input type="text" name="announcement_text" value="{{ $settings['announcement_text'] ?? 'Pendaftaran Mahasiswa Baru D3/S1/Profesi Telah Dibuka!' }}" class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm font-semibold focus:outline-none focus:border-blue-500">
            </div>
        </div>
    </div>

    <!-- Pengaturan Footer Website & Google Maps -->
    <div class="space-y-4 pt-4 border-t border-slate-100">
        <h3 class="font-heading font-bold text-slate-900 text-lg border-b border-slate-100 pb-2 text-indigo-700 flex items-center gap-2">
            <i class="fa-solid fa-map-location-dot text-indigo-600"></i> Pengaturan Footer & Google Maps Kampus
        </h3>
        
        <div>
            <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Google Maps Embed URL (Peta Kampus di Footer)</label>
            <input type="text" name="maps_embed_url" value="{{ $settings['maps_embed_url'] ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.2721868351744!2d112.6247!3d-7.9708!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e788280f5555555%3A0x0!2sSTIKes%20Panti%20Waluya%20Malang!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid' }}" placeholder="https://www.google.com/maps/embed?pb=..." class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-mono focus:outline-none focus:border-blue-500">
            <p class="text-[11px] text-slate-400 mt-1">Buka Google Maps &rarr; Bagikan (Share) &rarr; Sematkan Peta (Embed a map) &rarr; Salin URL pada atribut <code>src="..."</code> iframe-nya.</p>
        </div>

        <div>
            <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Deskripsi Singkat Kampus (Di Bawah Logo Footer)</label>
            <textarea name="footer_description" rows="2" class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-blue-500">{{ $settings['footer_description'] ?? 'Sekolah Tinggi Ilmu Kesehatan Panti Waluya Malang melahirkan insan kesehatan yang profesional, adaptif, dan berkarakter kasih.' }}</textarea>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Teks Hak Cipta (Copyright Footer)</label>
                <input type="text" name="footer_copyright" value="{{ $settings['footer_copyright'] ?? '© 2026 STIKes Panti Waluya Malang. All rights reserved.' }}" class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm font-semibold focus:outline-none focus:border-blue-500">
            </div>
            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Teks Sub-Footer / Engine Credits</label>
                <input type="text" name="footer_credits" value="{{ $settings['footer_credits'] ?? 'CMS & Website Powered by Laravel Engine' }}" class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-blue-500">
            </div>
        </div>
    </div>

    <!-- Informasi PMB Online -->
    <div class="space-y-4 pt-4 border-t border-slate-100">
        <h3 class="font-heading font-bold text-slate-900 text-lg border-b border-slate-100 pb-2 text-blue-700">Pengaturan Portal PMB Online</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Status Gelombang PMB</label>
                <input type="text" name="pmb_status" value="{{ $settings['pmb_status'] ?? 'Buka' }}" class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm font-bold focus:outline-none focus:border-blue-500">
            </div>
            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">URL Portal PMB Online</label>
                <input type="text" name="pmb_link" value="{{ $settings['pmb_link'] ?? 'https://pmb.stikespantiwaluya.ac.id' }}" class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm font-mono focus:outline-none focus:border-blue-500">
            </div>
        </div>
    </div>

    <!-- Kontak & Alamat -->
    <div class="space-y-4 pt-4 border-t border-slate-100">
        <h3 class="font-heading font-bold text-slate-900 text-lg border-b border-slate-100 pb-2 text-blue-700">Kontak & Alamat Kampus</h3>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Nomor Telepon</label>
                <input type="text" name="phone" value="{{ $settings['phone'] ?? '' }}" class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-blue-500">
            </div>
            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">WhatsApp PMB</label>
                <input type="text" name="whatsapp" value="{{ $settings['whatsapp'] ?? '' }}" class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-blue-500">
            </div>
            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Email Resmi</label>
                <input type="email" name="email" value="{{ $settings['email'] ?? '' }}" class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-blue-500">
            </div>
        </div>
        <div>
            <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Alamat Lengkap Kampus</label>
            <textarea name="address" rows="2" class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-blue-500">{{ $settings['address'] ?? '' }}</textarea>
        </div>
    </div>

    <!-- Media Sosial -->
    <div class="space-y-4 pt-4 border-t border-slate-100">
        <h3 class="font-heading font-bold text-slate-900 text-lg border-b border-slate-100 pb-2 text-blue-700">Tautan Media Sosial</h3>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Facebook URL</label>
                <input type="text" name="facebook" value="{{ $settings['facebook'] ?? '' }}" class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-blue-500">
            </div>
            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Instagram URL</label>
                <input type="text" name="instagram" value="{{ $settings['instagram'] ?? '' }}" class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-blue-500">
            </div>
            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">YouTube Channel URL</label>
                <input type="text" name="youtube" value="{{ $settings['youtube'] ?? '' }}" class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-blue-500">
            </div>
        </div>
    </div>

    <button type="submit" class="bg-blue-700 hover:bg-blue-800 text-white font-bold px-8 py-3.5 rounded-xl shadow-lg transition">
        <i class="fa-solid fa-floppy-disk mr-2"></i> Simpan Seluruh Pengaturan
    </button>
</form>

@endsection
