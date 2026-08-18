@extends('layouts.admin')

@section('page_title', 'Pengaturan Situs & PMB')

@section('content')

<div class="mb-6">
    <h2 class="font-heading font-bold text-xl text-slate-900">Pengaturan Situs & Banner PMB</h2>
    <p class="text-xs text-slate-500">Konfigurasi nama kampus, informasi kontak, tautan PMB online, dan sosial media.</p>
</div>

<form action="{{ route('admin.settings.update') }}" method="POST" class="bg-white rounded-2xl p-8 border border-slate-200 shadow-sm space-y-8 max-w-4xl">
    @csrf

    <!-- Identitas Utama -->
    <div class="space-y-4">
        <h3 class="font-heading font-bold text-slate-900 text-lg border-b border-slate-100 pb-2 text-teal-700">Identitas Kampus</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Nama Perguruan Tinggi</label>
                <input type="text" name="site_name" value="{{ $settings['site_name'] ?? 'STIKes Panti Waluya Malang' }}" class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm font-bold focus:outline-none focus:border-teal-500">
            </div>
            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Slogan / Tagline</label>
                <input type="text" name="site_tagline" value="{{ $settings['site_tagline'] ?? '' }}" class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-teal-500">
            </div>
        </div>
    </div>

    <!-- Informasi PMB Online -->
    <div class="space-y-4 pt-4 border-t border-slate-100">
        <h3 class="font-heading font-bold text-slate-900 text-lg border-b border-slate-100 pb-2 text-amber-600">Pengaturan PMB Online</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Status Gelombang PMB</label>
                <input type="text" name="pmb_status" value="{{ $settings['pmb_status'] ?? 'Buka' }}" class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm font-bold focus:outline-none focus:border-teal-500">
            </div>
            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">URL Portal PMB Online</label>
                <input type="text" name="pmb_link" value="{{ $settings['pmb_link'] ?? 'https://pmb.stikespantiwaluya.ac.id' }}" class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm font-mono focus:outline-none focus:border-teal-500">
            </div>
        </div>
    </div>

    <!-- Kontak & Alamat -->
    <div class="space-y-4 pt-4 border-t border-slate-100">
        <h3 class="font-heading font-bold text-slate-900 text-lg border-b border-slate-100 pb-2 text-teal-700">Kontak & Alamat Kampus</h3>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Nomor Telepon</label>
                <input type="text" name="phone" value="{{ $settings['phone'] ?? '' }}" class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-teal-500">
            </div>
            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">WhatsApp PMB</label>
                <input type="text" name="whatsapp" value="{{ $settings['whatsapp'] ?? '' }}" class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-teal-500">
            </div>
            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Email Resmi</label>
                <input type="email" name="email" value="{{ $settings['email'] ?? '' }}" class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-teal-500">
            </div>
        </div>
        <div>
            <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Alamat Lengkap Kampus</label>
            <textarea name="address" rows="2" class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-teal-500">{{ $settings['address'] ?? '' }}</textarea>
        </div>
    </div>

    <!-- Media Sosial -->
    <div class="space-y-4 pt-4 border-t border-slate-100">
        <h3 class="font-heading font-bold text-slate-900 text-lg border-b border-slate-100 pb-2 text-teal-700">Tautan Media Sosial</h3>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Facebook URL</label>
                <input type="text" name="facebook" value="{{ $settings['facebook'] ?? '' }}" class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-teal-500">
            </div>
            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Instagram URL</label>
                <input type="text" name="instagram" value="{{ $settings['instagram'] ?? '' }}" class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-teal-500">
            </div>
            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">YouTube Channel URL</label>
                <input type="text" name="youtube" value="{{ $settings['youtube'] ?? '' }}" class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-teal-500">
            </div>
        </div>
    </div>

    <button type="submit" class="bg-teal-600 hover:bg-teal-700 text-white font-bold px-8 py-3.5 rounded-xl shadow-lg transition">
        <i class="fa-solid fa-floppy-disk mr-2"></i> Simpan Seluruh Pengaturan
    </button>
</form>

@endsection
