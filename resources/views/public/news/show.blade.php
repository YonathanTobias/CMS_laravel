@extends('layouts.public')

@section('title', $post->title . ' - STIKes Panti Waluya Malang')

@section('content')

<!-- Hero Header dengan Background Foto Sampul Utama di Belakang Judul -->
<div class="relative bg-slate-950 text-white min-h-[380px] sm:min-h-[460px] flex items-center overflow-hidden">
    @if($post->image)
        <!-- Featured Cover Image Background -->
        <img src="{{ \Illuminate\Support\Str::startsWith($post->image, 'http') ? $post->image : asset($post->image) }}" alt="{{ $post->title }}" class="absolute inset-0 w-full h-full object-cover">
        <!-- Dark Gradient Overlays for Readability & Contrast -->
        <div class="absolute inset-0 bg-slate-950/75"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/50 to-black/30"></div>
    @else
        <div class="absolute inset-0 bg-gradient-to-br from-blue-950 via-blue-900 to-slate-950"></div>
    @endif

    <!-- Overlaid Content (Judul, Kategori, Tanggal & Penulis) -->
    <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16 w-full space-y-5">
        <div class="flex flex-wrap items-center gap-3 text-sky-300 text-xs font-semibold uppercase tracking-wider">
            <a href="{{ route('news.index') }}" class="hover:underline flex items-center gap-1">
                <i class="fa-solid fa-arrow-left"></i> Berita & Pengumuman
            </a>
            <span>&bull;</span>
            <span class="px-3 py-1 rounded-full bg-blue-600/50 backdrop-blur-md text-sky-200 border border-blue-400/30 font-extrabold shadow-sm">{{ $post->category }}</span>
        </div>
        
        <h1 class="font-heading font-extrabold text-3xl sm:text-5xl leading-tight drop-shadow-lg text-white">
            {{ $post->title }}
        </h1>
        
        <div class="flex flex-wrap items-center gap-4 text-xs text-slate-200 border-t border-white/10 pt-4 drop-shadow">
            <span class="flex items-center gap-1.5"><i class="fa-regular fa-calendar text-amber-400"></i> {{ $post->published_at ? $post->published_at->format('d F Y') : $post->created_at->format('d F Y') }}</span>
            <span>&bull;</span>
            <span class="flex items-center gap-1.5"><i class="fa-regular fa-eye text-amber-400"></i> {{ $post->views }} Kali Dilihat</span>
            <span>&bull;</span>
            <span class="flex items-center gap-1.5"><i class="fa-solid fa-user-pen text-amber-400"></i> Humas STIKes Panti Waluya</span>
        </div>
    </div>
</div>

<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-8">

    <!-- Photo Gallery Carousel Slider (Diposisikan di atas isi artikel, tanpa teks judul 'Galeri') -->
    @if($post->images->count() > 0)
        @php
            $galleryItems = $post->images->map(function($img) {
                return \Illuminate\Support\Str::startsWith($img->image_path, 'http') ? $img->image_path : asset($img->image_path);
            });
        @endphp

        <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-sm space-y-4"
             x-data="{ 
                activeSlide: 0, 
                gallery: {{ json_encode($galleryItems) }},
                lightboxOpen: false,
                next() { this.activeSlide = (this.activeSlide + 1) % this.gallery.length },
                prev() { this.activeSlide = (this.activeSlide - 1 + this.gallery.length) % this.gallery.length }
             }">
            
            <!-- Main Carousel Display -->
            <div class="relative h-[340px] sm:h-[480px] w-full rounded-2xl overflow-hidden bg-slate-950 group shadow-lg border border-slate-200">
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
                                <i class="fa-solid fa-magnifying-glass-plus mr-1.5 text-amber-400"></i> Klik untuk Memperbesar
                            </span>
                        </div>
                    </div>
                </template>

                <!-- Photo counter badge -->
                <div class="absolute top-4 right-4 bg-slate-950/70 backdrop-blur-md text-white text-xs font-bold px-3 py-1.5 rounded-full border border-white/20">
                    <span x-text="activeSlide + 1"></span> / {{ $post->images->count() }} Foto
                </div>

                <!-- Carousel Prev / Next Buttons -->
                <button @click="prev()" class="absolute left-4 top-1/2 -translate-y-1/2 w-11 h-11 rounded-full bg-slate-950/60 hover:bg-blue-600 text-white flex items-center justify-center backdrop-blur-md border border-white/20 transition opacity-80 hover:opacity-100 shadow-lg">
                    <i class="fa-solid fa-chevron-left"></i>
                </button>
                <button @click="next()" class="absolute right-4 top-1/2 -translate-y-1/2 w-11 h-11 rounded-full bg-slate-950/60 hover:bg-blue-600 text-white flex items-center justify-center backdrop-blur-md border border-white/20 transition opacity-80 hover:opacity-100 shadow-lg">
                    <i class="fa-solid fa-chevron-right"></i>
                </button>
            </div>

            <!-- Thumbnail Selector Strip -->
            <div class="flex items-center gap-3 overflow-x-auto pb-2 pt-1">
                <template x-for="(img, idx) in gallery" :key="idx">
                    <button @click="activeSlide = idx" 
                            :class="activeSlide === idx ? 'ring-4 ring-blue-600 scale-105 opacity-100' : 'opacity-60 hover:opacity-100'"
                            class="w-20 h-16 sm:w-24 sm:h-18 rounded-xl overflow-hidden shrink-0 border border-slate-200 transition duration-200 bg-slate-900">
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

    <!-- Isi Teks Berita Utama (Article Content Body) -->
    <div class="bg-white rounded-2xl p-8 sm:p-12 border border-slate-200 shadow-sm prose max-w-none text-slate-800 leading-relaxed space-y-6">
        {!! $post->content !!}
    </div>

    <!-- Recent Posts Sidebar Block -->
    @if($recentPosts->count() > 0)
        <div class="mt-12 bg-slate-100 rounded-2xl p-8 border border-slate-200">
            <h3 class="font-heading font-bold text-xl text-slate-900 mb-6 border-b border-slate-200 pb-3">Berita Lainnya</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach($recentPosts as $recent)
                    <a href="{{ route('news.show', $recent->slug) }}" class="block bg-white p-4 rounded-xl border border-slate-200 hover:border-blue-500 transition">
                        <div class="text-xs text-blue-700 font-bold mb-1">{{ $recent->category }}</div>
                        <h4 class="font-bold text-sm text-slate-900 line-clamp-2 hover:text-blue-700">{{ $recent->title }}</h4>
                    </a>
                @endforeach
            </div>
        </div>
    @endif

</div>
@endsection
