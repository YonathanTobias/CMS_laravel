@extends('layouts.public')

@section('title', $post->title . ' - STIKes Panti Waluya Malang')

@section('content')

<div class="bg-slate-50 dark:bg-slate-950 py-8 sm:py-12 transition-colors duration-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Breadcrumb & Back Navigation -->
        <div class="mb-6">
            <a href="{{ route('news.index') }}" class="inline-flex items-center gap-2 text-xs font-bold text-slate-600 dark:text-slate-400 hover:text-blue-700 dark:hover:text-sky-400 transition">
                <i class="fa-solid fa-arrow-left"></i> Kembali ke Berita & Pengumuman
            </a>
        </div>

        <!-- 2 Column Layout Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start">

            <!-- Left Main Column (Detail Berita & Content Body) -->
            <main class="lg:col-span-8 space-y-6">
                
                <!-- 1. Judul Utama Artikel -->
                <h1 class="font-heading font-extrabold text-2xl sm:text-4xl leading-tight text-slate-900 dark:text-white">
                    {{ $post->title }}
                </h1>

                <!-- 2. Meta Info (Tanggal, Jam, Kategori) -->
                <div class="flex flex-wrap items-center gap-4 text-xs text-slate-500 dark:text-slate-400 pb-2 border-b border-slate-200 dark:border-slate-800">
                    <span class="flex items-center gap-1.5 font-medium">
                        <i class="fa-regular fa-calendar text-blue-600 dark:text-sky-400"></i>
                        {{ $post->published_at ? $post->published_at->format('F d, Y') : $post->created_at->format('F d, Y') }}
                    </span>
                    <span>&bull;</span>
                    <span class="flex items-center gap-1.5 font-medium">
                        <i class="fa-regular fa-clock text-blue-600 dark:text-sky-400"></i>
                        {{ $post->published_at ? $post->published_at->format('g:i a') : $post->created_at->format('g:i a') }}
                    </span>
                    <span>&bull;</span>
                    <span class="inline-flex items-center gap-1 font-bold text-blue-700 dark:text-sky-300">
                        <i class="fa-solid fa-tag text-[10px]"></i>
                        {{ $post->category }}
                    </span>
                </div>

                <!-- 3. Featured Image & Photo Gallery Carousel Slider -->
                @php
                    $galleryItems = collect();
                    
                    // Sampul Utama
                    if ($post->image) {
                        $galleryItems->push(\Illuminate\Support\Str::startsWith($post->image, 'http') ? $post->image : asset($post->image));
                    }
                    
                    // Galeri Tambahan
                    if ($post->images && $post->images->count() > 0) {
                        foreach ($post->images as $img) {
                            $galleryItems->push(\Illuminate\Support\Str::startsWith($img->image_path, 'http') ? $img->image_path : asset($img->image_path));
                        }
                    }
                    
                    $galleryJson = json_encode($galleryItems->values()->all());
                @endphp

                @if($galleryItems->count() > 0)
                    <div class="space-y-3"
                         x-data="{ 
                            activeSlide: 0, 
                            gallery: {{ $galleryJson }},
                            lightboxOpen: false,
                            next() { this.activeSlide = (this.activeSlide + 1) % this.gallery.length },
                            prev() { this.activeSlide = (this.activeSlide - 1 + this.gallery.length) % this.gallery.length }
                         }">
                        
                        <!-- Main Photo Viewport -->
                        <div class="relative h-[320px] sm:h-[460px] w-full rounded-2xl overflow-hidden bg-slate-900 group shadow-md border border-slate-200 dark:border-slate-800">
                            <template x-for="(img, idx) in gallery" :key="idx">
                                <div x-show="activeSlide === idx" 
                                     x-transition:enter="transition ease-out duration-300"
                                     x-transition:enter-start="opacity-0 scale-102"
                                     x-transition:enter-end="opacity-100 scale-100"
                                     x-transition:leave="transition ease-in duration-200"
                                     x-transition:leave-start="opacity-100 scale-100"
                                     x-transition:leave-end="opacity-0 scale-98"
                                     class="absolute inset-0 w-full h-full flex items-center justify-center cursor-pointer"
                                     @click="lightboxOpen = true">
                                    <img :src="img" class="w-full h-full object-cover">
                                </div>
                            </template>

                            <!-- Navigation Prev / Next Arrows (Hanya tampil jika ada > 1 foto) -->
                            <template x-if="gallery.length > 1">
                                <div>
                                    <button @click="prev()" class="absolute left-3 top-1/2 -translate-y-1/2 w-9 h-9 sm:w-11 sm:h-11 rounded-full bg-slate-950/60 hover:bg-blue-600 text-white flex items-center justify-center backdrop-blur-md border border-white/20 transition shadow-lg" aria-label="Foto Sebelumnya">
                                        <i class="fa-solid fa-chevron-left text-sm"></i>
                                    </button>
                                    <button @click="next()" class="absolute right-3 top-1/2 -translate-y-1/2 w-9 h-9 sm:w-11 sm:h-11 rounded-full bg-slate-950/60 hover:bg-blue-600 text-white flex items-center justify-center backdrop-blur-md border border-white/20 transition shadow-lg" aria-label="Foto Selanjutnya">
                                        <i class="fa-solid fa-chevron-right text-sm"></i>
                                    </button>

                                    <!-- Bottom Dot Indicators -->
                                    <div class="absolute bottom-4 inset-x-0 flex justify-center gap-1.5 px-4">
                                        <template x-for="(img, idx) in gallery" :key="idx">
                                            <button @click="activeSlide = idx" 
                                                    :class="activeSlide === idx ? 'w-6 bg-blue-500' : 'w-2 bg-white/60 hover:bg-white'"
                                                    class="h-2 rounded-full transition-all duration-300 shadow-sm"></button>
                                        </template>
                                    </div>
                                </div>
                            </template>
                        </div>

                        <!-- Lightbox Zoom Modal -->
                        <div x-show="lightboxOpen" x-cloak x-transition class="fixed inset-0 z-50 bg-slate-950/90 backdrop-blur-md p-4 flex items-center justify-center" @click.self="lightboxOpen = false">
                            <div class="relative max-w-5xl w-full select-none">
                                <button @click="lightboxOpen = false" class="absolute -top-10 right-0 text-white text-3xl font-bold hover:text-amber-400">&times;</button>
                                <img :src="gallery[activeSlide]" class="max-h-[85vh] w-auto mx-auto rounded-2xl shadow-2xl border border-slate-700 object-contain">
                            </div>
                        </div>

                    </div>
                @endif

                <!-- 4. Subheading / Ringkasan Excerpt -->
                @if($post->excerpt)
                    <div class="text-base sm:text-lg font-semibold text-slate-800 dark:text-slate-200 leading-relaxed pt-2">
                        {{ $post->excerpt }}
                    </div>
                @endif

                <!-- 5. Isi Teks Berita Utama (Article Content Body) -->
                <div class="bg-white dark:bg-slate-900 rounded-2xl p-6 sm:p-10 border border-slate-200/90 dark:border-slate-800 shadow-sm prose dark:prose-invert max-w-none text-slate-800 dark:text-slate-200 leading-relaxed text-sm sm:text-base space-y-5">
                    {!! $post->content !!}
                </div>

            </main>

            <!-- Right Sidebar Column (Share, PMB Widget, Berita Terkini) -->
            <aside class="lg:col-span-4 space-y-6">

                <!-- 1. Widget Bagikan Berita -->
                <div class="bg-white dark:bg-slate-900 rounded-2xl p-6 border border-slate-200/90 dark:border-slate-800 shadow-sm text-center space-y-4">
                    <h3 class="font-heading font-extrabold text-sm uppercase tracking-wider text-slate-800 dark:text-slate-200">
                        Bagikan Berita
                    </h3>
                    @php
                        $shareUrl = urlencode(url()->current());
                        $shareTitle = urlencode($post->title);
                    @endphp
                    <div class="flex items-center justify-center gap-3">
                        <!-- Facebook -->
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ $shareUrl }}" target="_blank" rel="noopener noreferrer" 
                           class="w-10 h-10 rounded-full bg-blue-600 hover:bg-blue-700 text-white flex items-center justify-center text-sm shadow transition" 
                           title="Bagikan ke Facebook">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                        <!-- WhatsApp -->
                        <a href="https://api.whatsapp.com/send?text={{ $shareTitle }}%20{{ $shareUrl }}" target="_blank" rel="noopener noreferrer" 
                           class="w-10 h-10 rounded-full bg-emerald-500 hover:bg-emerald-600 text-white flex items-center justify-center text-base shadow transition" 
                           title="Bagikan ke WhatsApp">
                            <i class="fa-brands fa-whatsapp"></i>
                        </a>
                        <!-- Email -->
                        <a href="mailto:?subject={{ $shareTitle }}&body={{ $shareUrl }}" 
                           class="w-10 h-10 rounded-full bg-rose-500 hover:bg-rose-600 text-white flex items-center justify-center text-sm shadow transition" 
                           title="Kirim via Email">
                            <i class="fa-solid fa-envelope"></i>
                        </a>
                        <!-- Twitter / X -->
                        <a href="https://twitter.com/intent/tweet?text={{ $shareTitle }}&url={{ $shareUrl }}" target="_blank" rel="noopener noreferrer" 
                           class="w-10 h-10 rounded-full bg-sky-500 hover:bg-sky-600 text-white flex items-center justify-center text-sm shadow transition" 
                           title="Bagikan ke Twitter / X">
                            <i class="fa-brands fa-x-twitter"></i>
                        </a>
                    </div>
                </div>

                <!-- 2. Widget Kartu Informasi PMB & Logo Kampus -->
                <div class="bg-slate-100/80 dark:bg-slate-900/80 rounded-2xl p-6 border border-slate-200 dark:border-slate-800 text-center space-y-4 shadow-sm">
                    <div class="w-16 h-16 mx-auto bg-white p-2 rounded-2xl shadow-sm border border-slate-200 flex items-center justify-center">
                        <img src="{{ asset('images/logo-stikes-pantiwaluya.png') }}" alt="Logo STIKes" class="h-12 w-auto object-contain">
                    </div>
                    <p class="text-xs text-slate-600 dark:text-slate-300 leading-relaxed font-medium px-2">
                        Banyak alumni kami yang telah sukses meraih pekerjaan impiannya, bergabunglah bersama kami di STIKes Panti Waluya Malang.
                    </p>
                    <a href="{{ \App\Models\SiteSetting::get('pmb_link', 'https://pmb.stikespantiwaluya.ac.id') }}" target="_blank" 
                       class="inline-flex items-center justify-center gap-2 w-full bg-sky-500 hover:bg-sky-600 text-white font-extrabold text-xs py-2.5 px-4 rounded-xl shadow transition">
                        <i class="fa-solid fa-graduation-cap text-sm"></i>
                        <span>Mahasiswa Baru</span>
                    </a>
                </div>

                <!-- 3. Widget Berita Terkini (Recent News List) -->
                @if($recentPosts->count() > 0)
                    <div class="bg-white dark:bg-slate-900 rounded-2xl p-6 border border-slate-200/90 dark:border-slate-800 shadow-sm space-y-4">
                        <h3 class="font-heading font-extrabold text-sm uppercase tracking-wider text-slate-900 dark:text-white border-b border-slate-100 dark:border-slate-800 pb-3">
                            Berita Terkini
                        </h3>
                        <div class="space-y-3">
                            @foreach($recentPosts as $recent)
                                <a href="{{ route('news.show', $recent->slug) }}" 
                                   class="block bg-slate-50 dark:bg-slate-800/60 p-3.5 rounded-xl border border-slate-200/80 dark:border-slate-700/60 hover:border-blue-500 dark:hover:border-sky-400 transition group space-y-1">
                                    <h4 class="font-bold text-xs sm:text-sm text-slate-900 dark:text-white group-hover:text-blue-600 dark:group-hover:text-sky-400 line-clamp-2 leading-snug">
                                        {{ $recent->title }}
                                    </h4>
                                    <div class="text-[11px] text-slate-500 dark:text-slate-400 font-medium">
                                        {{ $recent->published_at ? $recent->published_at->format('F d, Y') : $recent->created_at->format('F d, Y') }}
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif

            </aside>

        </div>

    </div>
</div>

@endsection
