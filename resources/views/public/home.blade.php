@extends('layouts.public')

@section('title', 'STIKes Panti Waluya Malang - Kampus Kesehatan Terkemuka')

@section('content')

<!-- Full-Width High-Impact Hero Image Carousel (Gaya Website stikespantiwaluya.ac.id) -->
<section x-data="{
    activeSlide: 0,
    slides: [
        {
            title: 'Penerimaan Mahasiswa Baru (PMB) T.A. 2026/2027',
            subtitle: 'Daftar sekarang di STIKes Panti Waluya Malang dan dapatkan beasiswa potongan SPP khusus pendaftar Gelombang I & II.',
            badge: 'PMB 2026/2027 DIBUKA',
            badgeColor: 'bg-amber-500 text-slate-950',
            image: 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=1920&q=80',
            ctaText: 'Daftar PMB Online Now',
            ctaLink: '{{ \App\Models\SiteSetting::get('pmb_link', '#') }}',
            secondaryText: 'Lihat Program Studi',
            secondaryLink: '{{ route('prodi.index') }}'
        },
        {
            title: 'Pendidikan Kesehatan Berstandar Akreditasi Unggul',
            subtitle: 'Menghasilkan lulusan D3/S1 Keperawatan, Profesi Ners, D3 RMIK, dan D3 Farmasi yang berkarakter Kasih dan siap kerja profesional.',
            badge: 'AKREDITASI INSTITUSI UNGGUL',
            badgeColor: 'bg-blue-600 text-white',
            image: 'https://images.unsplash.com/photo-1551076805-e1869033e561?auto=format&fit=crop&w=1920&q=80',
            ctaText: 'Profil Kampus & Visi Misi',
            ctaLink: '{{ route('pages.show', 'visi-misi') }}',
            secondaryText: 'Lihat Dokumen SPMI',
            secondaryLink: '{{ route('spmi.index') }}'
        },
        {
            title: 'Peluang Karir Perawat Internasional ke Jepang & Jerman',
            subtitle: 'STIKes Panti Waluya Malang menyediakan fasilitas pelatihan bahasa dan penyaluran kerja alumni ke Rumah Sakit Luar Negeri.',
            badge: 'PROGRAM KERJASAMA GLOBAL',
            badgeColor: 'bg-sky-500 text-slate-950',
            image: 'https://images.unsplash.com/photo-1584515979956-d9f6e5d09982?auto=format&fit=crop&w=1920&q=80',
            ctaText: 'Baca Berita Kerjasama',
            ctaLink: '{{ route('news.index') }}',
            secondaryText: 'Hubungi Kami',
            secondaryLink: '{{ route('contact') }}'
        },
        {
            title: 'Fasilitas Laboratorium Klinis & CBT Computer Center',
            subtitle: 'Dukung pengalaman praktikum nyata dengan Mini Hospital IGD simulasi, Lab Rekam Medis EHR, dan Perpustakaan Digital.',
            badge: 'SARANA PRAKTIKUM MODERN',
            badgeColor: 'bg-indigo-600 text-white',
            image: 'https://images.unsplash.com/photo-1516549655169-df83a0774514?auto=format&fit=crop&w=1920&q=80',
            ctaText: 'Jelajahi Fasilitas Kampus',
            ctaLink: '{{ route('facilities.index') }}',
            secondaryText: 'Daftar PMB',
            secondaryLink: '{{ \App\Models\SiteSetting::get('pmb_link', '#') }}'
        }
    ],
    timer: null,
    init() {
        this.startAutoSlide();
    },
    startAutoSlide() {
        this.timer = setInterval(() => {
            this.next();
        }, 6000);
    },
    stopAutoSlide() {
        if(this.timer) clearInterval(this.timer);
    },
    next() {
        this.activeSlide = (this.activeSlide + 1) % this.slides.length;
    },
    prev() {
        this.activeSlide = (this.activeSlide - 1 + this.slides.length) % this.slides.length;
    }
}" 
@mouseenter="stopAutoSlide()" 
@mouseleave="startAutoSlide()"
class="relative w-full bg-navy-950 overflow-hidden shadow-2xl">

    <!-- Carousel Container -->
    <div class="relative min-h-[520px] sm:min-h-[580px] lg:min-h-[640px] flex items-center">
        
        <template x-for="(slide, index) in slides" :key="index">
            <div x-show="activeSlide === index" 
                 x-transition:enter="transition ease-out duration-700 transform"
                 x-transition:enter-start="opacity-0 scale-105"
                 x-transition:enter-end="opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-500 transform"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 scale-95"
                 class="absolute inset-0 w-full h-full flex items-center">
                
                <!-- Background Image with Gradient Overlay -->
                <div class="absolute inset-0 bg-cover bg-center bg-no-repeat transform scale-105 transition duration-1000"
                     :style="`background-image: url('${slide.image}');`">
                    <!-- Vignette Overlay -->
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-950/95 via-blue-950/80 to-blue-900/60"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-blue-950 via-transparent to-black/40"></div>
                </div>

                <!-- Slide Content Overlay -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full text-white py-16">
                    <div class="max-w-3xl space-y-6">
                        
                        <!-- Badge -->
                        <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full font-extrabold text-xs tracking-wider uppercase shadow-lg" :class="slide.badgeColor">
                            <i class="fa-solid fa-star"></i> <span x-text="slide.badge"></span>
                        </div>

                        <!-- Main Title -->
                        <h1 class="font-heading font-extrabold text-3xl sm:text-5xl lg:text-6xl tracking-tight leading-tight drop-shadow-lg text-white" x-text="slide.title"></h1>

                        <!-- Subtitle -->
                        <p class="text-slate-200 text-base sm:text-lg max-w-2xl font-normal leading-relaxed drop-shadow" x-text="slide.subtitle"></p>

                        <!-- CTA Buttons -->
                        <div class="flex flex-col sm:flex-row gap-4 pt-4">
                            <a :href="slide.ctaLink" target="_blank" class="bg-amber-500 hover:bg-amber-600 text-slate-950 font-extrabold px-8 py-4 rounded-xl shadow-2xl text-center text-base transform hover:-translate-y-1 transition duration-200 flex items-center justify-center gap-2">
                                <i class="fa-solid fa-paper-plane"></i> <span x-text="slide.ctaText"></span>
                            </a>
                            <a :href="slide.secondaryLink" class="bg-blue-900/80 hover:bg-blue-800 text-white font-semibold px-8 py-4 rounded-xl border border-blue-600/80 text-center text-base hover:border-blue-400 backdrop-blur-md transition flex items-center justify-center gap-2">
                                <i class="fa-solid fa-arrow-right"></i> <span x-text="slide.secondaryText"></span>
                            </a>
                        </div>

                    </div>
                </div>

            </div>
        </template>

    </div>

    <!-- Previous / Next Controls -->
    <button @click="prev()" class="absolute left-4 top-1/2 -translate-y-1/2 z-20 w-12 h-12 rounded-full bg-blue-950/70 hover:bg-blue-600 text-white backdrop-blur-md border border-blue-700/50 flex items-center justify-center shadow-xl transition transform hover:scale-110">
        <i class="fa-solid fa-chevron-left text-lg"></i>
    </button>
    <button @click="next()" class="absolute right-4 top-1/2 -translate-y-1/2 z-20 w-12 h-12 rounded-full bg-blue-950/70 hover:bg-blue-600 text-white backdrop-blur-md border border-blue-700/50 flex items-center justify-center shadow-xl transition transform hover:scale-110">
        <i class="fa-solid fa-chevron-right text-lg"></i>
    </button>

    <!-- Carousel Slide Indicators (Dots Bar) -->
    <div class="absolute bottom-6 left-1/2 -translate-x-1/2 z-20 flex items-center gap-3 bg-blue-950/80 backdrop-blur-md px-4 py-2 rounded-full border border-blue-800/60 shadow-xl">
        <template x-for="(slide, index) in slides" :key="index">
            <button @click="activeSlide = index" 
                    class="h-3 rounded-full transition-all duration-300"
                    :class="activeSlide === index ? 'w-8 bg-amber-400' : 'w-3 bg-slate-600 hover:bg-slate-400'"></button>
        </template>
    </div>

</section>

<!-- Counter Stats Bar -->
<section class="relative z-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-8">
    <div class="bg-white rounded-2xl shadow-xl border border-slate-200 grid grid-cols-2 md:grid-cols-4 divide-y md:divide-y-0 md:divide-x divide-slate-100 p-6 sm:p-8">
        <div class="text-center p-4">
            <div class="font-heading font-extrabold text-3xl sm:text-4xl text-blue-700 mb-1">5</div>
            <div class="text-xs sm:text-sm font-semibold text-slate-600">Program Studi Pilihan</div>
        </div>
        <div class="text-center p-4">
            <div class="font-heading font-extrabold text-3xl sm:text-4xl text-blue-700 mb-1">96%</div>
            <div class="text-xs sm:text-sm font-semibold text-slate-600">Alumni Bekerja &lt; 3 Bulan</div>
        </div>
        <div class="text-center p-4">
            <div class="font-heading font-extrabold text-3xl sm:text-4xl text-blue-700 mb-1">25+</div>
            <div class="text-xs sm:text-sm font-semibold text-slate-600">RS & Institusi Mitra Kerja</div>
        </div>
        <div class="text-center p-4">
            <div class="font-heading font-extrabold text-3xl sm:text-4xl text-amber-500 mb-1">Unggul</div>
            <div class="text-xs sm:text-sm font-semibold text-slate-600">Akreditasi Perguruan Tinggi</div>
        </div>
    </div>
</section>

<!-- Program Studi Showcase Section -->
<section class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16 space-y-3">
            <span class="text-blue-700 font-extrabold text-xs tracking-wider uppercase bg-blue-50 px-3.5 py-1.5 rounded-full border border-blue-200">Pilihan Program Studi</span>
            <h2 class="font-heading font-bold text-3xl sm:text-4xl text-slate-900">Pendidikan Kesehatan Berstandar Unggul</h2>
            <p class="text-slate-600 text-sm sm:text-base">Dirancang secara komprehensif mengintegrasikan keahlian vokasi/akademik, riset medis terkini, dan karakter etik kedokteran.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($prodis as $prodi)
                <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm hover:shadow-xl transition duration-300 p-8 flex flex-col justify-between group hover:-translate-y-1">
                    <div>
                        <div class="flex items-center justify-between mb-5">
                            <div class="w-13 h-13 rounded-2xl bg-blue-50 border border-blue-200 text-blue-700 flex items-center justify-center text-2xl group-hover:bg-blue-700 group-hover:text-white transition duration-300">
                                <i class="fa-solid {{ $prodi->icon ?? 'fa-user-nurse' }}"></i>
                            </div>
                            <div class="flex gap-2">
                                <span class="px-3 py-1 rounded-md bg-blue-900 text-white text-xs font-bold">{{ $prodi->degree }}</span>
                                <span class="px-3 py-1 rounded-md bg-emerald-50 text-emerald-800 border border-emerald-200 text-xs font-bold">Akred: {{ $prodi->accreditation }}</span>
                            </div>
                        </div>

                        <h3 class="font-heading font-bold text-xl text-slate-900 mb-3 group-hover:text-blue-700 transition">{{ $prodi->name }}</h3>
                        <p class="text-slate-600 text-sm line-clamp-3 leading-relaxed mb-6">{{ $prodi->description }}</p>
                    </div>

                    <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                        <span class="text-xs text-slate-500 font-medium"><i class="fa-solid fa-graduation-cap text-blue-600"></i> Siap Kerja</span>
                        <a href="{{ route('prodi.show', $prodi->slug) }}" class="text-blue-700 font-bold text-sm hover:text-blue-900 transition flex items-center gap-1">
                            Lihat Detail <i class="fa-solid fa-arrow-right text-xs"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- News & Announcements Section -->
<section class="py-20 bg-white border-t border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-12 gap-4">
            <div>
                <span class="text-blue-700 font-extrabold text-xs tracking-wider uppercase bg-blue-50 px-3.5 py-1.5 rounded-full border border-blue-200">Kabar Kampus</span>
                <h2 class="font-heading font-bold text-3xl sm:text-4xl text-slate-900 mt-2">Berita & Pengumuman Terbaru</h2>
            </div>
            <a href="{{ route('news.index') }}" class="text-blue-700 hover:text-blue-900 font-bold text-sm flex items-center gap-2 group">
                Lihat Semua Berita <i class="fa-solid fa-arrow-right group-hover:translate-x-1 transition"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($posts as $post)
                <article class="bg-slate-50 rounded-2xl border border-slate-200 overflow-hidden shadow-sm hover:shadow-lg transition duration-300 flex flex-col justify-between">
                    <div>
                        <div class="relative h-48 bg-slate-900 overflow-hidden">
                            @if($post->image)
                                <img src="{{ $post->image }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full bg-gradient-to-tr from-blue-950 to-blue-800 flex items-center justify-center text-blue-400 opacity-80">
                                    <i class="fa-solid fa-newspaper text-4xl"></i>
                                </div>
                            @endif
                            <div class="absolute top-3 left-3 bg-blue-950/90 backdrop-blur-md text-sky-300 text-xs font-bold px-3 py-1 rounded-full border border-blue-800">
                                {{ $post->category }}
                            </div>
                        </div>

                        <div class="p-6">
                            <div class="text-xs text-slate-500 mb-2 flex items-center gap-2">
                                <i class="fa-regular fa-calendar text-blue-600"></i> {{ $post->published_at ? $post->published_at->format('d M Y') : $post->created_at->format('d M Y') }}
                                <span>&bull;</span>
                                <i class="fa-regular fa-eye text-blue-600"></i> {{ $post->views }}x dilihat
                            </div>
                            <h3 class="font-heading font-bold text-lg text-slate-900 mb-2 hover:text-blue-700 transition line-clamp-2">
                                <a href="{{ route('news.show', $post->slug) }}">{{ $post->title }}</a>
                            </h3>
                            <p class="text-slate-600 text-sm line-clamp-3 leading-relaxed">{{ $post->excerpt }}</p>
                        </div>
                    </div>

                    <div class="px-6 pb-6 pt-0">
                        <a href="{{ route('news.show', $post->slug) }}" class="text-blue-700 font-bold text-sm hover:underline inline-flex items-center gap-1">
                            Baca Selengkapnya <i class="fa-solid fa-angle-right text-xs"></i>
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>

<!-- Facilities Showcase -->
<section class="py-20 bg-blue-950 text-white relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center max-w-3xl mx-auto mb-16 space-y-3">
            <span class="text-amber-400 font-extrabold text-xs tracking-wider uppercase bg-amber-500/10 px-3.5 py-1.5 rounded-full border border-amber-500/30">Sarana Praktikum Modern</span>
            <h2 class="font-heading font-bold text-3xl sm:text-4xl">Fasilitas & Laboratorium Klinis</h2>
            <p class="text-slate-300 text-sm sm:text-base">Mendukung pembelajaran praktikum dengan peralatan medis berstandar rumah sakit nyata.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($facilities as $fac)
                <div class="bg-blue-900/60 border border-blue-800/80 rounded-2xl p-6 shadow-xl space-y-4 hover:border-blue-500 transition duration-300">
                    <div class="w-12 h-12 rounded-xl bg-blue-600/30 text-blue-400 flex items-center justify-center text-xl">
                        <i class="fa-solid fa-microscope"></i>
                    </div>
                    <h3 class="font-heading font-bold text-lg text-white">{{ $fac->name }}</h3>
                    <p class="text-slate-300 text-sm leading-relaxed">{{ $fac->description }}</p>
                    <span class="inline-block px-3 py-1 rounded bg-blue-950 text-sky-300 text-xs font-semibold border border-blue-800">{{ $fac->category }}</span>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('facilities.index') }}" class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-500 text-white font-bold px-6 py-3.5 rounded-xl shadow-lg transition">
                Jelajahi Seluruh Fasilitas Kampus <i class="fa-solid fa-arrow-right text-xs"></i>
            </a>
        </div>
    </div>
</section>

<!-- Call to Action Banner -->
<section class="py-16 bg-gradient-to-r from-amber-500 via-amber-600 to-amber-500 text-slate-950">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row justify-between items-center gap-8">
        <div class="space-y-2 text-center md:text-left">
            <h2 class="font-heading font-extrabold text-2xl sm:text-3xl text-slate-950">Siap Menjadi Bagian Dari Tenaga Kesehatan Profesional?</h2>
            <p class="text-slate-900 text-sm sm:text-base font-medium">Daftar sekarang untuk mendapatkan prioritas jalur beasiswa SPP dan kemudahan pendaftaran.</p>
        </div>
        <a href="{{ \App\Models\SiteSetting::get('pmb_link', '#') }}" target="_blank" class="bg-blue-950 hover:bg-blue-900 text-white font-extrabold px-8 py-4 rounded-xl shadow-2xl text-base transform hover:scale-105 transition duration-200 shrink-0">
            Daftar Sekarang Juga &rarr;
        </a>
    </div>
</section>

@endsection
