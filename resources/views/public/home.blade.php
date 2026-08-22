@extends('layouts.public')

@section('title', 'STIKes Panti Waluya Malang - Kampus Kesehatan Unggul')

@section('content')

<!-- 1. Full-Width Hero Image Carousel Slider -->
<div x-data="{ 
    activeSlide: 0, 
    slides: {{ json_encode($slides) }},
    autoSlide() {
        setInterval(() => {
            if (this.slides.length > 0) {
                this.activeSlide = (this.activeSlide + 1) % this.slides.length;
            }
        }, 6000);
    }
}" x-init="autoSlide()" class="relative bg-slate-950 text-white overflow-hidden group">
    
    <!-- Carousel Slides Container -->
    <div class="relative h-[500px] sm:h-[580px] w-full">
        @foreach($slides as $index => $slide)
            <div x-show="activeSlide === {{ $index }}" 
                 x-transition:enter="transition ease-out duration-700" 
                 x-transition:enter-start="opacity-0 scale-105" 
                 x-transition:enter-end="opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-500" 
                 x-transition:leave-start="opacity-100 scale-100" 
                 x-transition:leave-end="opacity-0 scale-95"
                 class="absolute inset-0 w-full h-full">
                
                <!-- Background Image & Gradient Overlays -->
                <img src="{{ \Illuminate\Support\Str::startsWith($slide->image, 'http') ? $slide->image : asset($slide->image) }}" alt="{{ $slide->title }}" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-r from-slate-950 via-slate-950/80 to-transparent"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-transparent to-black/40"></div>

                <!-- Slide Content Overlay -->
                <div class="absolute inset-0 flex items-center">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
                        <div class="max-w-2xl space-y-5">
                            @if($slide->badge)
                                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full {{ $slide->badge_color }} text-xs font-extrabold uppercase tracking-wider shadow-lg">
                                    <i class="fa-solid fa-star text-[10px]"></i> {{ $slide->badge }}
                                </div>
                            @endif
                            
                            <h1 class="font-heading font-extrabold text-3xl sm:text-5xl lg:text-6xl text-white leading-tight drop-shadow-md">
                                {{ $slide->title }}
                            </h1>
                            
                            @if($slide->subtitle)
                                <p class="text-slate-200 text-sm sm:text-lg leading-relaxed drop-shadow max-w-xl">
                                    {{ $slide->subtitle }}
                                </p>
                            @endif

                            <div class="flex flex-wrap gap-4 pt-2">
                                @if($slide->cta_text)
                                    <a href="{{ $slide->cta_link }}" class="bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-600 hover:to-amber-700 text-slate-950 font-extrabold px-6 py-3.5 rounded-xl shadow-xl transition duration-200 transform hover:-translate-y-0.5 flex items-center gap-2">
                                        <i class="fa-solid fa-paper-plane text-sm"></i> {{ $slide->cta_text }}
                                    </a>
                                @endif
                                
                                @if($slide->secondary_text)
                                    <a href="{{ $slide->secondary_link }}" class="bg-white/10 hover:bg-white/20 text-white font-bold px-6 py-3.5 rounded-xl backdrop-blur-md border border-white/20 transition flex items-center gap-2">
                                        {{ $slide->secondary_text }} &rarr;
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        @endforeach
    </div>

    <!-- Navigation Controls (Prev / Next Buttons) -->
    <button @click="activeSlide = (activeSlide - 1 + slides.length) % slides.length" class="absolute left-4 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-slate-950/40 hover:bg-blue-600 text-white flex items-center justify-center backdrop-blur-md border border-white/20 transition opacity-0 group-hover:opacity-100">
        <i class="fa-solid fa-chevron-left text-lg"></i>
    </button>
    
    <button @click="activeSlide = (activeSlide + 1) % slides.length" class="absolute right-4 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-slate-950/40 hover:bg-blue-600 text-white flex items-center justify-center backdrop-blur-md border border-white/20 transition opacity-0 group-hover:opacity-100">
        <i class="fa-solid fa-chevron-right text-lg"></i>
    </button>

    <!-- Indicators (Dots Bar) -->
    <div class="absolute bottom-6 left-1/2 -translate-x-1/2 flex items-center gap-2.5 z-20">
        <template x-for="(slide, index) in slides" :key="index">
            <button @click="activeSlide = index" 
                    :class="activeSlide === index ? 'w-8 bg-amber-500' : 'w-2.5 bg-white/50 hover:bg-white'" 
                    class="h-2.5 rounded-full transition-all duration-300"></button>
        </template>
    </div>

</div>

<!-- 2. Blue Ribbon Tagline Banner -->
<div class="bg-gradient-to-r from-blue-700 via-blue-800 to-navy-900 text-white py-4 shadow-lg border-y border-blue-600/30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row items-center justify-between gap-3 text-center sm:text-left">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-full bg-amber-500 text-slate-950 font-extrabold flex items-center justify-center shrink-0 shadow-md">
                <i class="fa-solid fa-question text-lg"></i>
            </div>
            <div>
                <h3 class="font-heading font-extrabold text-lg sm:text-xl text-white">Kenapa STIKes Panti Waluya Malang?</h3>
                <p class="text-xs text-sky-200 font-medium">Pendidikan Kesehatan Terakreditasi Unggul & Siap Kerja Nasional / Internasional</p>
            </div>
        </div>
        <a href="{{ \App\Models\SiteSetting::get('pmb_link', '#') }}" target="_blank" class="bg-amber-500 hover:bg-amber-600 text-slate-950 font-extrabold px-5 py-2 rounded-xl text-xs shadow transition shrink-0">
            Daftar Sekarang &rarr;
        </a>
    </div>
</div>

<!-- 3. Top Section: Info PMB Banner (Left) + Berita Berkelanjutan (Right) -->
<section class="py-16 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            
            <!-- Left Card: Banner PMB Info Callout -->
            <div class="lg:col-span-4 bg-gradient-to-br from-blue-900 via-blue-950 to-slate-950 text-white rounded-3xl p-8 shadow-xl border border-blue-800/60 space-y-6 sticky top-24">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-amber-500 text-slate-950 text-xs font-extrabold uppercase">
                    <i class="fa-solid fa-graduation-cap"></i> Info PMB Online
                </div>
                <div>
                    <h3 class="font-heading font-extrabold text-2xl text-white mb-2 leading-tight">Pendaftaran Mahasiswa Baru D3 / S1 / Profesi</h3>
                    <p class="text-xs text-slate-300 leading-relaxed">Bergabunglah bersama kampus kesehatan berkualitas dengan fasilitas laboratorium medis modern & jaringan kerja luas.</p>
                </div>

                <div class="space-y-2.5 pt-2 text-xs border-t border-white/10">
                    <div class="flex items-center gap-2 text-sky-300 font-bold">
                        <i class="fa-solid fa-circle-check text-amber-400"></i> Beasiswa Prestasi & Khusus
                    </div>
                    <div class="flex items-center gap-2 text-sky-300 font-bold">
                        <i class="fa-solid fa-circle-check text-amber-400"></i> D3 Keperawatan & D4 MIK
                    </div>
                    <div class="flex items-center gap-2 text-sky-300 font-bold">
                        <i class="fa-solid fa-circle-check text-amber-400"></i> S1 Keperawatan & Profesi Ners
                    </div>
                </div>

                <a href="{{ \App\Models\SiteSetting::get('pmb_link', '#') }}" target="_blank" class="block w-full text-center bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-600 hover:to-amber-700 text-slate-950 font-extrabold py-3.5 rounded-xl shadow-lg transition">
                    Portal PMB Online &rarr;
                </a>
            </div>

            <!-- Right Grid: Berita & Kegiatan Terbaru (6 Cards Grid) -->
            <div class="lg:col-span-8 space-y-6">
                <div class="flex justify-between items-center border-b border-slate-200 pb-3">
                    <h3 class="font-heading font-extrabold text-2xl text-slate-900 flex items-center gap-2">
                        <i class="fa-solid fa-newspaper text-blue-700"></i> Berita & Kegiatan Terbaru
                    </h3>
                    <a href="{{ route('news.index') }}" class="text-xs text-blue-700 hover:underline font-bold">
                        Lihat Semua Berita &rarr;
                    </a>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-5">
                    @foreach($posts as $post)
                        <article class="bg-white rounded-2xl border border-slate-200/90 overflow-hidden shadow-sm hover:shadow-lg transition duration-300 flex flex-col justify-between group">
                            <div>
                                <div class="relative h-40 bg-slate-900 overflow-hidden">
                                    @if($post->image)
                                        <img src="{{ \Illuminate\Support\Str::startsWith($post->image, 'http') ? $post->image : asset($post->image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                                    @else
                                        <div class="w-full h-full bg-gradient-to-tr from-blue-950 to-blue-800 flex items-center justify-center text-blue-400">
                                            <i class="fa-solid fa-newspaper text-3xl"></i>
                                        </div>
                                    @endif
                                    <span class="absolute top-2 left-2 bg-blue-950/90 text-sky-300 text-[10px] font-bold px-2.5 py-0.5 rounded-full border border-blue-800">
                                        {{ $post->category }}
                                    </span>
                                </div>

                                <div class="p-4 space-y-2">
                                    <div class="text-[11px] text-slate-400 flex items-center gap-1.5">
                                        <i class="fa-regular fa-calendar text-blue-600"></i> {{ $post->published_at ? $post->published_at->format('d M Y') : $post->created_at->format('d M Y') }}
                                    </div>
                                    <h4 class="font-heading font-bold text-xs sm:text-sm text-slate-900 line-clamp-2 hover:text-blue-700 transition leading-snug">
                                        <a href="{{ route('news.show', $post->slug) }}">{{ $post->title }}</a>
                                    </h4>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</section>

<!-- 4. Congratulation & Prestasi Mahasiswa (Clean Light Theme) -->
@if(isset($achievements) && $achievements->count() > 0)
<section class="py-16 bg-white border-t border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-6 mb-12">
            <div class="space-y-2 max-w-2xl">
                <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-amber-100 text-amber-900 border border-amber-300 text-xs font-extrabold uppercase tracking-wider">
                    <i class="fa-solid fa-trophy text-amber-600"></i> Congratulation & Prestasi Mahasiswa
                </span>
                <h2 class="font-heading font-extrabold text-3xl sm:text-4xl text-slate-900">
                    Ukiran Prestasi & Kejuaraan Mahasiswa
                </h2>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Apresiasi setinggi-tingginya atas pencapaian dan kejuaraan nasional mahasiswa STIKes Panti Waluya Malang.
                </p>
            </div>

            <div class="shrink-0">
                <span class="text-xs font-bold text-blue-900 bg-blue-50 border border-blue-200 px-4 py-2 rounded-xl">
                    <i class="fa-solid fa-medal text-amber-500 mr-1.5"></i> {{ $achievements->count() }} Prestasi Terkini
                </span>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6" x-data="{ activePoster: null }">
            @foreach($achievements as $ach)
                @php
                    $posterUrl = \Illuminate\Support\Str::startsWith($ach->poster_image, 'http') ? $ach->poster_image : asset($ach->poster_image);
                @endphp
                <div class="bg-white rounded-3xl border border-slate-200 overflow-hidden shadow-sm hover:shadow-xl transition duration-300 flex flex-col justify-between group">
                    <div class="relative h-72 bg-slate-100 overflow-hidden cursor-pointer" @click="activePoster = '{{ $posterUrl }}'">
                        @if($ach->poster_image)
                            <img src="{{ $posterUrl }}" alt="{{ $ach->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        @else
                            <div class="w-full h-full bg-gradient-to-tr from-blue-900 to-blue-700 flex items-center justify-center text-blue-200">
                                <i class="fa-solid fa-award text-5xl"></i>
                            </div>
                        @endif

                        <div class="absolute top-3 left-3">
                            <span class="px-3 py-1 rounded-xl text-xs font-extrabold shadow-lg border border-white/40 backdrop-blur-md {{ $ach->badge_color }}">
                                <i class="fa-solid fa-crown mr-1 text-[10px]"></i> {{ $ach->badge_title }}
                            </span>
                        </div>

                        <div class="absolute inset-0 bg-slate-950/40 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center">
                            <span class="bg-white text-slate-900 text-xs font-bold px-4 py-2 rounded-xl shadow-lg border border-slate-200 flex items-center gap-1.5">
                                <i class="fa-solid fa-magnifying-glass-plus text-amber-500"></i> Perbesar Poster
                            </span>
                        </div>
                    </div>

                    <div class="p-5 space-y-3 flex-grow flex flex-col justify-between">
                        <div class="space-y-2">
                            <div class="flex items-center gap-2.5">
                                <div class="w-8 h-8 rounded-full bg-blue-100 border border-blue-200 text-blue-700 font-bold flex items-center justify-center text-xs shrink-0">
                                    <i class="fa-solid fa-user-graduate"></i>
                                </div>
                                <div class="overflow-hidden">
                                    <h4 class="font-bold text-slate-900 text-sm leading-tight truncate">{{ $ach->student_name }}</h4>
                                    <p class="text-[11px] text-slate-500 truncate">{!! $ach->student_prodi !!}</p>
                                </div>
                            </div>

                            <div class="pt-2 border-t border-slate-100 space-y-1">
                                <h3 class="font-heading font-bold text-xs text-slate-900 line-clamp-2 leading-snug">
                                    {{ $ach->title }}
                                </h3>
                                @if($ach->event_name)
                                    <p class="text-[11px] text-slate-500 truncate flex items-center gap-1">
                                        <i class="fa-solid fa-building-columns text-[10px] text-amber-500"></i> {{ $ach->event_name }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <!-- Lightbox Zoom Modal -->
            <div x-show="activePoster" x-transition class="fixed inset-0 z-50 bg-slate-950/90 backdrop-blur-md p-4 flex items-center justify-center" @click.self="activePoster = null">
                <div class="relative max-w-4xl w-full">
                    <button @click="activePoster = null" class="absolute -top-12 right-0 text-white text-3xl font-bold hover:text-amber-400">&times;</button>
                    <img :src="activePoster" class="max-h-[85vh] w-auto mx-auto rounded-2xl shadow-2xl border border-slate-700">
                </div>
            </div>
        </div>

    </div>
</section>
@endif

<!-- 5. Sekilas Mengenai Kami & Akreditasi Perguruan Tinggi -->
<section class="py-16 bg-slate-50 border-t border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto space-y-3 mb-12">
            <span class="px-3.5 py-1 rounded-full bg-blue-100 text-blue-800 text-xs font-extrabold uppercase">
                Profil & Legalisasi Resm
            </span>
            <h2 class="font-heading font-extrabold text-3xl text-slate-900">Sekilas Mengenai Kami</h2>
            <p class="text-slate-600 text-sm">Sekolah Tinggi Ilmu Kesehatan Panti Waluya Malang dengan izin resmi institusi & sertifikasi akreditasi BAN-PT & LAM-PTKes.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center" x-data="{ modalCert: null }">
            <!-- Left: Foto Gedung Kampus -->
            <div class="lg:col-span-5 relative rounded-3xl overflow-hidden shadow-xl border border-slate-200 h-80 bg-slate-900 group">
                <img src="https://images.unsplash.com/photo-1562774053-701939374585?q=80&w=800&auto=format&fit=crop" alt="Gedung STIKes Panti Waluya Malang" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/40 to-transparent"></div>
                <div class="absolute bottom-6 left-6 right-6 text-white space-y-1">
                    <span class="px-3 py-1 bg-amber-500 text-slate-950 font-extrabold rounded-full text-[11px]">Kampus Terakreditasi Baik Sekali (BAN-PT)</span>
                    <h3 class="font-heading font-bold text-xl text-white">Gedung Utama STIKes Panti Waluya</h3>
                    <p class="text-xs text-slate-300">Jl. Yulius Riefbuilder No. 5, Oro-Oro Dowo, Klojen, Malang</p>
                </div>
            </div>

            <!-- Right: 2 Sertifikat Akreditasi Perguruan Tinggi (BAN-PT / LAM-PTKes) -->
            <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm space-y-3 group cursor-pointer" @click="modalCert = 'https://images.unsplash.com/photo-1589829545856-d10d557cf95f?q=80&w=800&auto=format&fit=crop'">
                    <div class="h-44 rounded-xl overflow-hidden bg-slate-100 border border-slate-200 relative">
                        <img src="https://images.unsplash.com/photo-1589829545856-d10d557cf95f?q=80&w=800&auto=format&fit=crop" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                        <div class="absolute inset-0 bg-slate-950/30 opacity-0 group-hover:opacity-100 transition flex items-center justify-center text-white text-xs font-bold">
                            <i class="fa-solid fa-magnifying-glass-plus mr-1 text-amber-400"></i> Lihat Sertifikat
                        </div>
                    </div>
                    <div>
                        <div class="text-xs font-bold text-slate-900">Sertifikat Akreditasi Perguruan Tinggi</div>
                        <p class="text-[11px] text-slate-500">Badan Akreditasi Nasional Perguruan Tinggi (BAN-PT)</p>
                    </div>
                </div>

                <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm space-y-3 group cursor-pointer" @click="modalCert = 'https://images.unsplash.com/photo-1607604276583-eef5d076aa5f?q=80&w=800&auto=format&fit=crop'">
                    <div class="h-44 rounded-xl overflow-hidden bg-slate-100 border border-slate-200 relative">
                        <img src="https://images.unsplash.com/photo-1607604276583-eef5d076aa5f?q=80&w=800&auto=format&fit=crop" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                        <div class="absolute inset-0 bg-slate-950/30 opacity-0 group-hover:opacity-100 transition flex items-center justify-center text-white text-xs font-bold">
                            <i class="fa-solid fa-magnifying-glass-plus mr-1 text-amber-400"></i> Lihat Piagam
                        </div>
                    </div>
                    <div>
                        <div class="text-xs font-bold text-slate-900">Piagam Penghargaan Institusi</div>
                        <p class="text-[11px] text-slate-500">Lembaga Akreditasi Mandiri Kesehatan (LAM-PTKes)</p>
                    </div>
                </div>
            </div>

            <!-- Lightbox Modal untuk Sertifikat Institusi -->
            <div x-show="modalCert" x-transition class="fixed inset-0 z-50 bg-slate-950/90 backdrop-blur-md p-4 flex items-center justify-center" @click.self="modalCert = null">
                <div class="relative max-w-4xl w-full">
                    <button @click="modalCert = null" class="absolute -top-12 right-0 text-white text-3xl font-bold hover:text-amber-400">&times;</button>
                    <img :src="modalCert" class="max-h-[85vh] w-auto mx-auto rounded-2xl shadow-2xl border border-slate-700">
                </div>
            </div>
        </div>

    </div>
</section>

<!-- 6. Organizational Culture Banner ("DIC4") -->
<section class="relative bg-slate-950 text-white py-20 overflow-hidden border-y border-blue-900/40">
    <div class="absolute inset-0 bg-gradient-to-r from-blue-950 via-slate-950 to-blue-900 opacity-90"></div>
    <div class="absolute -right-20 -bottom-20 w-80 h-80 bg-blue-600/20 rounded-full blur-3xl"></div>

    <div class="relative max-w-5xl mx-auto px-4 text-center space-y-6 z-10">
        <span class="px-4 py-1.5 rounded-full bg-amber-500/20 text-amber-400 border border-amber-500/40 font-extrabold text-xs tracking-wider uppercase">
            Budaya Organisasi Kampus
        </span>
        <h2 class="font-heading font-extrabold text-3xl sm:text-5xl text-white leading-tight drop-shadow-md">
            Organizational Cultures "DIC4"
        </h2>
        <p class="text-slate-300 text-sm sm:text-lg max-w-3xl mx-auto leading-relaxed">
            <span class="text-amber-400 font-bold">D</span>iscipline &bull; 
            <span class="text-amber-400 font-bold">I</span>nnovative &bull; 
            <span class="text-amber-400 font-bold">C</span>ommunicative &bull; 
            <span class="text-amber-400 font-bold">C</span>ompetent &bull; 
            <span class="text-amber-400 font-bold">C</span>reative &bull; 
            <span class="text-amber-400 font-bold">C</span>ollaborative
        </p>
        <div class="pt-2">
            <a href="{{ route('pages.show', 'profil') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-amber-500 to-amber-600 text-slate-950 font-extrabold px-6 py-3 rounded-xl shadow-lg hover:from-amber-600 hover:to-amber-700 transition text-xs">
                Pelajari Budaya Kampus &rarr;
            </a>
        </div>
    </div>
</section>

<!-- 7. Program Studi & Akreditasi (Circle Avatar Cards & Uncropped Certificates) -->
<section class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto space-y-3 mb-16">
            <span class="px-3.5 py-1 rounded-full bg-blue-100 text-blue-800 text-xs font-extrabold uppercase">
                Program Studi & Akreditasi
            </span>
            <h2 class="font-heading font-extrabold text-3xl sm:text-4xl text-slate-900">
                Pilihan Program Studi Berstandar Unggul
            </h2>
            <p class="text-slate-600 text-sm">
                Sertifikat akreditasi BAN-PT & LAM-PTKes untuk setiap program studi ditampilkan secara utuh dan transparan.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($prodis as $prodi)
                <div class="bg-white rounded-3xl border border-slate-200/90 p-8 shadow-sm hover:shadow-xl transition duration-300 flex flex-col justify-between group">
                    <div>
                        <!-- Circle Avatar Header -->
                        <div class="flex flex-col items-center text-center mb-6">
                            <div class="w-24 h-24 rounded-full bg-gradient-to-tr from-blue-600 to-blue-800 p-1 shadow-lg mb-4 group-hover:scale-105 transition duration-300">
                                <div class="w-full h-full rounded-full bg-white flex items-center justify-center text-blue-700 text-3xl font-bold border border-blue-100">
                                    <i class="fa-solid {{ $prodi->icon ?? 'fa-user-nurse' }}"></i>
                                </div>
                            </div>
                            <div class="flex gap-2 mb-2">
                                <span class="px-3 py-0.5 rounded-full bg-slate-900 text-white text-[11px] font-bold">{{ $prodi->degree }}</span>
                                <span class="px-3 py-0.5 rounded-full bg-emerald-50 text-emerald-800 border border-emerald-200 text-[11px] font-bold">Akred: {{ $prodi->accreditation }}</span>
                            </div>
                            <h3 class="font-heading font-bold text-2xl text-slate-900 group-hover:text-blue-700 transition">
                                {{ $prodi->name }}
                            </h3>
                        </div>

                        <p class="text-slate-600 text-xs leading-relaxed text-center mb-4">
                            {{ $prodi->description }}
                        </p>

                        <!-- Tampilan Langsung Sertifikat Akreditasi Utuh FULL Tanpa Terpotong -->
                        @if($prodi->accreditation_certificate)
                            @php
                                $certUrl = \Illuminate\Support\Str::startsWith($prodi->accreditation_certificate, 'http') ? $prodi->accreditation_certificate : asset($prodi->accreditation_certificate);
                                $isPdf = \Illuminate\Support\Str::endsWith(strtolower($certUrl), '.pdf');
                            @endphp
                            <div class="mt-4 mb-3 p-3 bg-slate-50 rounded-2xl border border-slate-200 space-y-2">
                                <div class="text-[11px] font-extrabold uppercase text-slate-600 flex items-center justify-between">
                                    <span class="flex items-center gap-1.5"><i class="fa-solid fa-award text-amber-500"></i> Sertifikat Akreditasi</span>
                                    <a href="{{ $certUrl }}" download target="_blank" class="text-emerald-700 hover:underline font-bold text-[10px]"><i class="fa-solid fa-download"></i> Unduh</a>
                                </div>

                                @if($isPdf)
                                    <div class="w-full h-64 rounded-xl overflow-hidden border border-slate-200 bg-white">
                                        <iframe src="{{ $certUrl }}#toolbar=0" class="w-full h-full border-0"></iframe>
                                    </div>
                                @else
                                    <div class="w-full rounded-xl overflow-hidden border border-slate-200 bg-slate-900/5 p-1 flex items-center justify-center">
                                        <img src="{{ $certUrl }}" alt="Sertifikat Akreditasi {{ $prodi->name }}" class="w-full h-auto rounded-lg object-contain shadow-sm">
                                    </div>
                                @endif
                            </div>
                        @endif
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('prodi.show', $prodi->slug) }}" class="w-full text-center bg-blue-700 hover:bg-blue-800 text-white font-bold py-3 rounded-xl transition block text-xs shadow">
                            Detail Kurikulum & Prospek Kerja &rarr;
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>

<!-- 8. Fasilitas & Layanan Digital Kampus (8 Circle Icon Action Grid) -->
<section class="py-20 bg-white border-t border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto space-y-3 mb-16">
            <span class="px-3.5 py-1 rounded-full bg-blue-100 text-blue-800 text-xs font-extrabold uppercase">
                Fasilitas & Portal Layanan
            </span>
            <h2 class="font-heading font-extrabold text-3xl sm:text-4xl text-slate-900">
                Ekosistem Pembelajaran & Layanan Akademik
            </h2>
            <p class="text-slate-600 text-sm">Akses cepat ke portal layanan digital mahasiswa, perpustakaan online, laboratorium, dan sistem ujian.</p>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-4 gap-8 text-center">
            
            <!-- 1. PMB Online -->
            <a href="{{ \App\Models\SiteSetting::get('pmb_link', '#') }}" target="_blank" class="group flex flex-col items-center space-y-3">
                <div class="w-20 h-20 rounded-full bg-amber-100 border border-amber-300 text-amber-600 group-hover:bg-amber-500 group-hover:text-slate-950 transition duration-300 flex items-center justify-center text-3xl shadow-md group-hover:scale-110">
                    <i class="fa-solid fa-graduation-cap"></i>
                </div>
                <h4 class="font-bold text-sm text-slate-900 group-hover:text-amber-600 transition">PMB Online</h4>
                <p class="text-xs text-slate-500">Pendaftaran Mahasiswa Baru</p>
            </a>

            <!-- 2. Kemahasiswaan & Alumni -->
            <a href="{{ route('pages.show', 'kemahasiswaan') }}" class="group flex flex-col items-center space-y-3">
                <div class="w-20 h-20 rounded-full bg-blue-100 border border-blue-300 text-blue-700 group-hover:bg-blue-600 group-hover:text-white transition duration-300 flex items-center justify-center text-3xl shadow-md group-hover:scale-110">
                    <i class="fa-solid fa-users"></i>
                </div>
                <h4 class="font-bold text-sm text-slate-900 group-hover:text-blue-700 transition">Kemahasiswaan</h4>
                <p class="text-xs text-slate-500">UKM & Organisasi Kampus</p>
            </a>

            <!-- 3. LMS (E-Learning) -->
            <a href="#" class="group flex flex-col items-center space-y-3">
                <div class="w-20 h-20 rounded-full bg-emerald-100 border border-emerald-300 text-emerald-700 group-hover:bg-emerald-600 group-hover:text-white transition duration-300 flex items-center justify-center text-3xl shadow-md group-hover:scale-110">
                    <i class="fa-solid fa-laptop-code"></i>
                </div>
                <h4 class="font-bold text-sm text-slate-900 group-hover:text-emerald-700 transition">LMS E-Learning</h4>
                <p class="text-xs text-slate-500">Pembelajaran Digital</p>
            </a>

            <!-- 4. CBT (Ujian Online) -->
            <a href="#" class="group flex flex-col items-center space-y-3">
                <div class="w-20 h-20 rounded-full bg-indigo-100 border border-indigo-300 text-indigo-700 group-hover:bg-indigo-600 group-hover:text-white transition duration-300 flex items-center justify-center text-3xl shadow-md group-hover:scale-110">
                    <i class="fa-solid fa-square-check"></i>
                </div>
                <h4 class="font-bold text-sm text-slate-900 group-hover:text-indigo-700 transition">CBT Ujian Online</h4>
                <p class="text-xs text-slate-500">Sistem Evaluasi Digital</p>
            </a>

            <!-- 5. E-Library -->
            <a href="#" class="group flex flex-col items-center space-y-3">
                <div class="w-20 h-20 rounded-full bg-purple-100 border border-purple-300 text-purple-700 group-hover:bg-purple-600 group-hover:text-white transition duration-300 flex items-center justify-center text-3xl shadow-md group-hover:scale-110">
                    <i class="fa-solid fa-book-bookmark"></i>
                </div>
                <h4 class="font-bold text-sm text-slate-900 group-hover:text-purple-700 transition">E-Library</h4>
                <p class="text-xs text-slate-500">Perpustakaan Digital</p>
            </a>

            <!-- 6. Repositori SPMI -->
            <a href="{{ route('spmi.index') }}" class="group flex flex-col items-center space-y-3">
                <div class="w-20 h-20 rounded-full bg-sky-100 border border-sky-300 text-sky-700 group-hover:bg-sky-600 group-hover:text-white transition duration-300 flex items-center justify-center text-3xl shadow-md group-hover:scale-110">
                    <i class="fa-solid fa-folder-open"></i>
                </div>
                <h4 class="font-bold text-sm text-slate-900 group-hover:text-sky-700 transition">Repositori SPMI</h4>
                <p class="text-xs text-slate-500">Dokumen Penjaminan Mutu</p>
            </a>

            <!-- 7. Jurnal Online -->
            <a href="#" class="group flex flex-col items-center space-y-3">
                <div class="w-20 h-20 rounded-full bg-rose-100 border border-rose-300 text-rose-700 group-hover:bg-rose-600 group-hover:text-white transition duration-300 flex items-center justify-center text-3xl shadow-md group-hover:scale-110">
                    <i class="fa-solid fa-newspaper"></i>
                </div>
                <h4 class="font-bold text-sm text-slate-900 group-hover:text-rose-700 transition">Jurnal Online</h4>
                <p class="text-xs text-slate-500">Publikasi Riset Kesehatan</p>
            </a>

            <!-- 8. Sarana & Laboratorium -->
            <a href="{{ route('facilities.index') }}" class="group flex flex-col items-center space-y-3">
                <div class="w-20 h-20 rounded-full bg-teal-100 border border-teal-300 text-teal-700 group-hover:bg-teal-600 group-hover:text-white transition duration-300 flex items-center justify-center text-3xl shadow-md group-hover:scale-110">
                    <i class="fa-solid fa-microscope"></i>
                </div>
                <h4 class="font-bold text-sm text-slate-900 group-hover:text-teal-700 transition">Laboratorium</h4>
                <p class="text-xs text-slate-500">Sarana Practical Medis</p>
            </a>

        </div>

    </div>
</section>

@endsection
