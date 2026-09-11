@extends('layouts.public')

@section('title', $page->title . ' - STIKes Panti Waluya Malang')

@section('content')
<div class="bg-blue-950 text-white py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-3 text-center">
        <div class="inline-flex items-center justify-center w-14 h-14 rounded-2xl bg-blue-600/30 text-sky-300 border border-blue-500/40 mb-2">
            <i class="{{ \App\Helpers\IconHelper::format($page->icon, 'fa-solid fa-building-columns') }} text-2xl"></i>
        </div>
        <h1 class="font-heading font-extrabold text-3xl sm:text-4xl">{{ $page->title }}</h1>
        <p class="text-slate-300 text-xs sm:text-sm">STIKes Panti Waluya Malang</p>
    </div>
</div>

<div class="bg-slate-50 dark:bg-slate-950 py-16 transition-colors duration-200">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">

        <!-- Photo Gallery Carousel Slider (Diposisikan di atas isi konten halaman) -->
        @if(isset($page->images) && $page->images->count() > 0)
            @php
                $galleryItems = $page->images->map(function($img) {
                    return \Illuminate\Support\Str::startsWith($img->image_path, 'http') ? $img->image_path : asset($img->image_path);
                });
            @endphp

            <div class="bg-white dark:bg-slate-900 rounded-3xl p-6 sm:p-8 border border-slate-200 dark:border-slate-800 shadow-sm space-y-4"
                 x-data="{ 
                    activeSlide: 0, 
                    gallery: {{ json_encode($galleryItems) }},
                    lightboxOpen: false,
                    next() { this.activeSlide = (this.activeSlide + 1) % this.gallery.length },
                    prev() { this.activeSlide = (this.activeSlide - 1 + this.gallery.length) % this.gallery.length }
                 }">
                
                <!-- Main Carousel Display -->
                <div class="relative h-[340px] sm:h-[480px] w-full rounded-2xl overflow-hidden bg-slate-950 group shadow-lg border border-slate-200 dark:border-slate-800">
                    <template x-for="(img, idx) in gallery" :key="idx">
                        <div x-show="activeSlide === idx" 
                             x-transition:enter="transition ease-out duration-500"
                             x-transition:enter-start="opacity-0 scale-105"
                             x-transition:enter-end="opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-300"
                             x-transition:leave-start="opacity-100 scale-100"
                             x-transition:leave-end="opacity-0 scale-95"
                             class="absolute inset-0 w-full h-full flex items-center justify-center cursor-pointer"
                             @click="lightboxOpen = true">
                            <img :src="img" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-slate-950/20 opacity-0 group-hover:opacity-100 transition flex items-center justify-center text-white">
                                <span class="bg-slate-950/80 backdrop-blur-md px-4 py-2 rounded-xl text-xs font-bold border border-white/20">
                                    <i class="fa-solid fa-magnifying-glass-plus mr-1.5 text-amber-400"></i> Klik untuk Memperbesar Foto
                                </span>
                            </div>
                        </div>
                    </template>

                    <!-- Photo counter badge -->
                    <div class="absolute top-4 right-4 bg-slate-950/70 backdrop-blur-md text-white text-xs font-bold px-3 py-1.5 rounded-full border border-white/20">
                        <span x-text="activeSlide + 1"></span> / {{ $page->images->count() }} Foto
                    </div>

                    <!-- Carousel Prev / Next Buttons -->
                    <button @click="prev()" class="absolute left-4 top-1/2 -translate-y-1/2 w-11 h-11 rounded-full bg-slate-950/60 hover:bg-blue-600 text-white flex items-center justify-center backdrop-blur-md border border-white/20 transition opacity-80 hover:opacity-100 shadow-lg" aria-label="Geser Foto Sebelumnya">
                        <i class="fa-solid fa-chevron-left"></i>
                    </button>
                    <button @click="next()" class="absolute right-4 top-1/2 -translate-y-1/2 w-11 h-11 rounded-full bg-slate-950/60 hover:bg-blue-600 text-white flex items-center justify-center backdrop-blur-md border border-white/20 transition opacity-80 hover:opacity-100 shadow-lg" aria-label="Geser Foto Selanjutnya">
                        <i class="fa-solid fa-chevron-right"></i>
                    </button>
                </div>

                <!-- Thumbnail Selector Strip -->
                <div class="flex items-center gap-3 overflow-x-auto pb-2 pt-1">
                    <template x-for="(img, idx) in gallery" :key="idx">
                        <button @click="activeSlide = idx" 
                                :class="activeSlide === idx ? 'ring-4 ring-blue-600 scale-105 opacity-100' : 'opacity-60 hover:opacity-100'"
                                class="w-20 h-16 sm:w-24 sm:h-18 rounded-xl overflow-hidden shrink-0 border border-slate-200 dark:border-slate-700 transition duration-200 bg-slate-900">
                            <img :src="img" class="w-full h-full object-cover">
                        </button>
                    </template>
                </div>

                <!-- Lightbox Zoom Modal -->
                <div x-show="lightboxOpen" x-transition class="fixed inset-0 z-50 bg-slate-950/90 backdrop-blur-md p-4 flex items-center justify-center" @click.self="lightboxOpen = false">
                    <div class="relative max-w-5xl w-full">
                        <button @click="lightboxOpen = false" class="absolute -top-12 right-0 text-white text-3xl font-bold hover:text-amber-400">&times;</button>
                        <img :src="gallery[activeSlide]" class="max-h-[85vh] w-auto mx-auto rounded-2xl shadow-2xl border border-slate-700">
                    </div>
                </div>

            </div>
        @endif

        <div class="bg-white dark:bg-slate-900 rounded-2xl p-8 sm:p-12 border border-slate-200 dark:border-slate-800 shadow-sm leading-relaxed space-y-6 text-slate-800 dark:text-slate-200 prose dark:prose-invert max-w-none">
            {!! $page->content !!}
        </div>
    </div>
</div>
@endsection
