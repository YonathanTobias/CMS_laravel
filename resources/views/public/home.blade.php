@extends('layouts.public')

@section('title', 'STIKes Panti Waluya Malang - Kampus Kesehatan Unggul')

@section('content')

<!-- Full-Width Hero Image Carousel Slider -->
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
    <div class="relative h-[520px] sm:h-[600px] w-full">
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
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-transparent to-black/30"></div>

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

<!-- Stats Counter Bar Widget -->
<div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-16 z-30">
    <div class="bg-white rounded-3xl p-6 sm:p-8 shadow-2xl border border-slate-100 grid grid-cols-2 md:grid-cols-4 gap-6 text-center divide-y md:divide-y-0 md:divide-x divide-slate-100">
        @foreach($stats as $stat)
            <div class="p-2 {{ !$loop->first ? 'pt-4 md:pt-2' : '' }}">
                <div class="font-heading font-extrabold text-3xl sm:text-4xl {{ $stat->color }} mb-1">
                    {{ $stat->value }}
                </div>
                <div class="text-xs sm:text-sm font-semibold text-slate-600">
                    {{ $stat->label }}
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Program Studi Highlight Catalog -->
<section class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto space-y-4 mb-16">
            <span class="px-3.5 py-1 rounded-full bg-blue-100 text-blue-800 text-xs font-extrabold uppercase tracking-wider">
                Pilihan Program Studi
            </span>
            <h2 class="font-heading font-extrabold text-3xl sm:text-4xl text-slate-900">
                Pendidikan Kesehatan Berstandar Unggul
            </h2>
            <p class="text-slate-600 text-base leading-relaxed">
                Dirancang secara komprehensif mengintegrasikan keahlian vokasi/akademik, riset medis terkini, dan karakter etik kedokteran.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($prodis as $prodi)
                <div class="bg-white rounded-3xl border border-slate-200/80 p-8 shadow-sm hover:shadow-xl transition duration-300 flex flex-col justify-between group">
                    <div>
                        <div class="flex items-center justify-between mb-6">
                            <div class="w-14 h-14 rounded-2xl bg-blue-50 text-blue-700 flex items-center justify-center text-2xl group-hover:bg-blue-600 group-hover:text-white transition duration-300">
                                <i class="fa-solid {{ $prodi->icon ?? 'fa-user-nurse' }}"></i>
                            </div>
                            <div class="flex gap-2">
                                <span class="px-3 py-1 rounded-md bg-slate-900 text-white text-xs font-bold">{{ $prodi->degree }}</span>
                                <span class="px-3 py-1 rounded-md bg-emerald-50 text-emerald-800 border border-emerald-200 text-xs font-bold">Akred: {{ $prodi->accreditation }}</span>
                            </div>
                        </div>

                        <h3 class="font-heading font-bold text-2xl text-slate-900 mb-3 group-hover:text-blue-700 transition">
                            {{ $prodi->name }}
                        </h3>
                        <p class="text-slate-600 text-sm leading-relaxed mb-4">
                            {{ $prodi->description }}
                        </p>

                        <!-- Tampilan Langsung Sertifikat Akreditasi Utuh FULL Tanpa Terpotong -->
                        @if($prodi->accreditation_certificate)
                            @php
                                $certUrl = \Illuminate\Support\Str::startsWith($prodi->accreditation_certificate, 'http') ? $prodi->accreditation_certificate : asset($prodi->accreditation_certificate);
                                $isPdf = \Illuminate\Support\Str::endsWith(strtolower($certUrl), '.pdf');
                            @endphp
                            <div class="mt-4 mb-3 p-3.5 bg-slate-50 rounded-2xl border border-slate-200/90 space-y-2">
                                <div class="text-[11px] font-extrabold uppercase text-slate-600 flex items-center justify-between">
                                    <span class="flex items-center gap-1.5"><i class="fa-solid fa-award text-amber-500"></i> Sertifikat Akreditasi Resmi</span>
                                    <a href="{{ $certUrl }}" download target="_blank" class="text-emerald-700 hover:underline font-bold text-[10px]"><i class="fa-solid fa-download"></i> Unduh File</a>
                                </div>

                                @if($isPdf)
                                    <div class="w-full h-80 rounded-xl overflow-hidden border border-slate-200 bg-white shadow-inner">
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
                        <a href="{{ route('prodi.show', $prodi->slug) }}" class="w-full text-center bg-blue-700 hover:bg-blue-800 text-white font-bold py-3 rounded-xl transition duration-200 block text-xs shadow">
                            Detail Kurikulum & Prospek Kerja &rarr;
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>

<!-- Latest News Section -->
<section class="py-20 bg-white border-t border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end gap-4 mb-12">
            <div>
                <span class="text-blue-700 font-extrabold text-xs uppercase tracking-wider">Kabar Utama</span>
                <h2 class="font-heading font-extrabold text-3xl text-slate-900">Berita & Kegiatan Kampus</h2>
            </div>
            <a href="{{ route('news.index') }}" class="text-blue-700 hover:text-blue-900 font-bold text-sm flex items-center gap-1">
                Lihat Semua Berita &rarr;
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($posts as $post)
                <article class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm hover:shadow-xl transition duration-300 flex flex-col justify-between">
                    <div>
                        <div class="relative h-48 bg-slate-900 overflow-hidden">
                            @if($post->image)
                                <img src="{{ \Illuminate\Support\Str::startsWith($post->image, 'http') ? $post->image : asset($post->image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full bg-gradient-to-tr from-blue-950 to-blue-800 flex items-center justify-center text-blue-400 opacity-80">
                                    <i class="fa-solid fa-newspaper text-4xl"></i>
                                </div>
                            @endif
                            <span class="absolute top-3 left-3 bg-blue-950/90 backdrop-blur-md text-sky-300 text-xs font-bold px-3 py-1 rounded-full border border-blue-800">
                                {{ $post->category }}
                            </span>
                        </div>

                        <div class="p-6">
                            <div class="text-xs text-slate-500 mb-2 flex items-center gap-2">
                                <i class="fa-regular fa-calendar text-blue-600"></i> {{ $post->published_at ? $post->published_at->format('d M Y') : $post->created_at->format('d M Y') }}
                            </div>
                            <h3 class="font-heading font-bold text-lg text-slate-900 mb-2 hover:text-blue-700 transition line-clamp-2">
                                <a href="{{ route('news.show', $post->slug) }}">{{ $post->title }}</a>
                            </h3>
                            <p class="text-slate-600 text-sm line-clamp-3 leading-relaxed">{{ $post->excerpt }}</p>
                        </div>
                    </div>

                    <div class="px-6 pb-6 pt-0">
                        <a href="{{ route('news.show', $post->slug) }}" class="text-blue-700 font-bold text-sm hover:underline inline-flex items-center gap-1">
                            Baca Selengkapnya &rarr;
                        </a>
                    </div>
                </article>
            @endforeach
        </div>

    </div>
</section>

@endsection
