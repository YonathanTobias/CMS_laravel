@extends('layouts.public')

@section('title', 'Kontak & Lokasi - STIKes Panti Waluya Malang')

@section('content')
<div class="bg-blue-950 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4">
        <h1 class="font-heading font-extrabold text-3xl sm:text-4xl">Hubungi STIKes Panti Waluya Malang</h1>
        <p class="text-slate-300 text-sm sm:text-base max-w-2xl mx-auto">Kami siap melayani pertanyaan seputar penerimaan mahasiswa baru, informasi akademik, dan kemitraan.</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 bg-slate-50 dark:bg-slate-950 transition-colors duration-200">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
        <!-- Contact Info Cards -->
        <div class="lg:col-span-5 space-y-6">
            <div class="bg-white dark:bg-slate-900 rounded-2xl p-6 border border-slate-200 dark:border-slate-800 shadow-sm flex items-start gap-4">
                <div class="w-12 h-12 rounded-xl bg-blue-50 dark:bg-blue-950 border border-blue-200 dark:border-blue-800 text-blue-700 dark:text-sky-400 flex items-center justify-center text-xl shrink-0">
                    <i class="fa-solid fa-location-dot"></i>
                </div>
                <div>
                    <h3 class="font-heading font-bold text-slate-900 dark:text-white text-lg mb-1">Alamat Kampus</h3>
                    <p class="text-slate-600 dark:text-slate-300 text-sm leading-relaxed">{{ \App\Models\SiteSetting::get('address') }}</p>
                </div>
            </div>

            <div class="bg-white dark:bg-slate-900 rounded-2xl p-6 border border-slate-200 dark:border-slate-800 shadow-sm flex items-start gap-4">
                <div class="w-12 h-12 rounded-xl bg-blue-50 dark:bg-blue-950 border border-blue-200 dark:border-blue-800 text-blue-700 dark:text-sky-400 flex items-center justify-center text-xl shrink-0">
                    <i class="fa-solid fa-phone"></i>
                </div>
                <div>
                    <h3 class="font-heading font-bold text-slate-900 dark:text-white text-lg mb-1">Telepon & Fax</h3>
                    <p class="text-slate-600 dark:text-slate-300 text-sm leading-relaxed">{{ \App\Models\SiteSetting::get('phone') }}</p>
                </div>
            </div>

            <div class="bg-white dark:bg-slate-900 rounded-2xl p-6 border border-slate-200 dark:border-slate-800 shadow-sm flex items-start gap-4">
                <div class="w-12 h-12 rounded-xl bg-emerald-50 dark:bg-emerald-950 border border-emerald-200 dark:border-emerald-800 text-emerald-600 dark:text-emerald-400 flex items-center justify-center text-xl shrink-0">
                    <i class="fa-brands fa-whatsapp"></i>
                </div>
                <div>
                    <h3 class="font-heading font-bold text-slate-900 dark:text-white text-lg mb-1">WhatsApp PMB</h3>
                    <p class="text-slate-600 dark:text-slate-300 text-sm leading-relaxed">{{ \App\Models\SiteSetting::get('whatsapp') }}</p>
                </div>
            </div>

            <div class="bg-white dark:bg-slate-900 rounded-2xl p-6 border border-slate-200 dark:border-slate-800 shadow-sm flex items-start gap-4">
                <div class="w-12 h-12 rounded-xl bg-blue-50 dark:bg-blue-950 border border-blue-200 dark:border-blue-800 text-blue-700 dark:text-sky-400 flex items-center justify-center text-xl shrink-0">
                    <i class="fa-solid fa-envelope"></i>
                </div>
                <div>
                    <h3 class="font-heading font-bold text-slate-900 dark:text-white text-lg mb-1">Email Resmi</h3>
                    <p class="text-slate-600 dark:text-slate-300 text-sm leading-relaxed">{{ \App\Models\SiteSetting::get('email') }}</p>
                </div>
            </div>
        </div>

        <!-- Contact Form -->
        <div class="lg:col-span-7">
            <div class="bg-white dark:bg-slate-900 rounded-2xl p-8 border border-slate-200 dark:border-slate-800 shadow-sm space-y-6">
                <h3 class="font-heading font-bold text-2xl text-slate-900 dark:text-white border-b border-slate-100 dark:border-slate-800 pb-3">Kirim Pesan Pertanyaan</h3>
                <form action="#" method="POST" class="space-y-4" onsubmit="event.preventDefault(); alert('Terima kasih! Pesan Anda telah terkirim ke Sekretariat STIKes Panti Waluya Malang.');">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-700 dark:text-slate-200 mb-1">Nama Lengkap</label>
                            <input type="text" required placeholder="Masukkan nama Anda" class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-900 dark:text-white placeholder-slate-400 dark:placeholder-slate-400 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-700 dark:text-slate-200 mb-1">Email / Telepon</label>
                            <input type="text" required placeholder="0812xxxx atau email@..." class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-900 dark:text-white placeholder-slate-400 dark:placeholder-slate-400 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-bold uppercase text-slate-700 dark:text-slate-200 mb-1">Subjek Pertanyaan</label>
                        <select class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-900 dark:text-white rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option class="dark:bg-slate-800">Informasi Pendaftaran PMB</option>
                            <option class="dark:bg-slate-800">Informasi Program Studi & SPP</option>
                            <option class="dark:bg-slate-800">Kemitraan & Kerjasama RS</option>
                            <option class="dark:bg-slate-800">Lainnya</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold uppercase text-slate-700 dark:text-slate-200 mb-1">Pesan Anda</label>
                        <textarea rows="4" required placeholder="Tuliskan pertanyaan Anda..." class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-900 dark:text-white placeholder-slate-400 dark:placeholder-slate-400 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                    </div>
                    <button type="submit" class="w-full bg-blue-700 hover:bg-blue-800 text-white font-bold py-3.5 rounded-xl shadow transition focus:ring-2 focus:ring-amber-400 focus:outline-none">
                        <i class="fa-solid fa-paper-plane mr-2"></i> Kirim Pesan
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
