@extends('layouts.public')

@section('title', 'Berita & Pengumuman - STIKes Panti Waluya Malang')

@section('content')
<div class="bg-blue-950 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4">
        <h1 class="font-heading font-extrabold text-3xl sm:text-4xl">Berita & Pengumuman Kampus</h1>
        <p class="text-slate-300 text-sm sm:text-base max-w-2xl mx-auto">Informasi kegiatan akademik, penelitian, pengabdian masyarakat, dan informasi pendaftaran mahasiswa baru.</p>
    </div>
</div>

<div class="bg-slate-50 dark:bg-slate-950 py-12 transition-colors duration-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Filter & Search Bar -->
        <div class="bg-white dark:bg-slate-900 rounded-2xl p-3 sm:p-4 border border-slate-200 dark:border-slate-800 shadow-sm mb-10 flex flex-col lg:flex-row gap-4 justify-between items-center">
            
            <!-- Category Pills Slider with Smooth Scrolling & Hidden Native Scrollbar -->
            <div x-data="{
                canScrollLeft: false,
                canScrollRight: false,
                checkScroll() {
                    const el = this.$refs.catScroll;
                    if (!el) return;
                    this.canScrollLeft = el.scrollLeft > 6;
                    this.canScrollRight = el.scrollLeft < (el.scrollWidth - el.clientWidth - 6);
                },
                scroll(direction) {
                    const el = this.$refs.catScroll;
                    if (!el) return;
                    el.scrollBy({ left: direction * 220, behavior: 'smooth' });
                }
            }" 
            x-init="setTimeout(() => checkScroll(), 150); window.addEventListener('resize', () => checkScroll())"
            class="relative flex-1 min-w-0 w-full">
                
                <!-- Left Navigation Arrow (Only visible when scrollable to left) -->
                <button type="button" 
                        x-show="canScrollLeft" 
                        x-cloak 
                        @click="scroll(-1)" 
                        aria-label="Geser ke kiri"
                        class="hidden sm:flex absolute -left-2 top-1/2 -translate-y-1/2 z-10 w-7 h-7 items-center justify-center rounded-full bg-white dark:bg-slate-800 text-slate-700 dark:text-slate-200 shadow-md border border-slate-200 dark:border-slate-700 hover:bg-slate-100 dark:hover:bg-slate-700 hover:scale-105 transition-all">
                    <i class="fa-solid fa-chevron-left text-[11px]"></i>
                </button>

                <!-- Scrollable Category Container (No ugly scrollbar, smooth wheel and touch swipe) -->
                <div x-ref="catScroll" 
                     @scroll.passive="checkScroll()"
                     onwheel="if(this.scrollWidth > this.clientWidth) { this.scrollLeft += event.deltaY; event.preventDefault(); }"
                     class="flex items-center gap-2 overflow-x-auto no-scrollbar scroll-smooth py-1 px-1">
                    
                    <a href="{{ route('news.index', array_filter(['search' => request('search')])) }}" 
                       class="px-4 py-2 rounded-xl text-xs sm:text-sm font-semibold whitespace-nowrap shrink-0 transition-all duration-200 {{ !request('category') ? 'bg-blue-600 text-white shadow-md shadow-blue-600/25 ring-1 ring-blue-500' : 'bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 hover:bg-slate-200 dark:hover:bg-slate-700 hover:text-slate-900 dark:hover:text-white' }}">
                        <i class="fa-solid fa-layer-group mr-1.5 opacity-80 text-[11px]"></i> Semua Kategori
                    </a>

                    @foreach($categories as $cat)
                        @php
                            $catParam = is_object($cat) ? $cat->slug : $cat;
                            $catName = is_object($cat) ? $cat->name : $cat;
                            $isActive = request('category') === $catParam || request('category') === $catName;
                        @endphp
                        <a href="{{ route('news.index', array_filter(['category' => $catParam, 'search' => request('search')])) }}" 
                           class="px-4 py-2 rounded-xl text-xs sm:text-sm font-semibold whitespace-nowrap shrink-0 transition-all duration-200 {{ $isActive ? 'bg-blue-600 text-white shadow-md shadow-blue-600/25 ring-1 ring-blue-500' : 'bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 hover:bg-slate-200 dark:hover:bg-slate-700 hover:text-slate-900 dark:hover:text-white' }}">
                            {{ $catName }}
                        </a>
                    @endforeach
                </div>

                <!-- Right Navigation Arrow (Only visible when scrollable to right) -->
                <button type="button" 
                        x-show="canScrollRight" 
                        x-cloak 
                        @click="scroll(1)" 
                        aria-label="Geser ke kanan"
                        class="hidden sm:flex absolute -right-2 top-1/2 -translate-y-1/2 z-10 w-7 h-7 items-center justify-center rounded-full bg-white dark:bg-slate-800 text-slate-700 dark:text-slate-200 shadow-md border border-slate-200 dark:border-slate-700 hover:bg-slate-100 dark:hover:bg-slate-700 hover:scale-105 transition-all">
                    <i class="fa-solid fa-chevron-right text-[11px]"></i>
                </button>
            </div>

            <!-- Search Form -->
            <form action="{{ route('news.index') }}" method="GET" class="relative w-full lg:w-72 shrink-0">
                @if(request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari kata kunci berita..." class="w-full pl-10 pr-9 py-2 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-900 dark:text-white placeholder-slate-400 dark:placeholder-slate-400 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-3 text-slate-400 text-xs"></i>
                @if(request('search'))
                    <a href="{{ route('news.index', array_filter(['category' => request('category')])) }}" class="absolute right-3 top-2.5 text-slate-400 hover:text-slate-600 dark:hover:text-slate-200 text-xs transition" title="Hapus pencarian">
                        <i class="fa-solid fa-xmark"></i>
                    </a>
                @endif
            </form>
        </div>

        <!-- News Grid -->
        @if($posts->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                @foreach($posts as $post)
                    <article class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 overflow-hidden shadow-sm hover:shadow-xl transition duration-300 flex flex-col justify-between group">
                        <div>
                            <div class="relative h-48 bg-slate-900 overflow-hidden">
                                @if($post->image)
                                    <img src="{{ \Illuminate\Support\Str::startsWith($post->image, 'http') ? $post->image : asset($post->image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                                @else
                                    <div class="w-full h-full bg-gradient-to-tr from-blue-950 to-blue-800 flex items-center justify-center text-blue-400 opacity-80">
                                        <i class="fa-solid fa-newspaper text-4xl"></i>
                                    </div>
                                @endif
                                
                                <div class="absolute top-3 left-3 flex flex-wrap gap-1 max-w-[90%]">
                                    @if($post->categories && $post->categories->count() > 0)
                                        @foreach($post->categories as $c)
                                            <span class="bg-blue-950/90 backdrop-blur-md text-sky-300 text-[11px] font-bold px-2.5 py-0.5 rounded-full border border-blue-800">
                                                {{ $c->name }}
                                            </span>
                                        @endforeach
                                    @else
                                        <span class="bg-blue-950/90 backdrop-blur-md text-sky-300 text-[11px] font-bold px-2.5 py-0.5 rounded-full border border-blue-800">
                                            {{ $post->category ?? 'Umum' }}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="p-6">
                                <div class="text-xs text-slate-500 dark:text-slate-400 mb-2 flex items-center gap-2">
                                    <i class="fa-regular fa-calendar text-blue-600 dark:text-sky-400"></i> {{ $post->published_at ? $post->published_at->format('d M Y') : $post->created_at->format('d M Y') }}
                                    <span>&bull;</span>
                                    <i class="fa-regular fa-eye text-blue-600 dark:text-sky-400"></i> {{ $post->views }}x
                                </div>
                                <h2 class="font-heading font-bold text-lg text-slate-900 dark:text-white mb-2 hover:text-blue-700 dark:hover:text-sky-400 transition line-clamp-2">
                                    <a href="{{ route('news.show', $post->slug) }}">{{ $post->title }}</a>
                                </h2>
                                <p class="text-slate-600 dark:text-slate-300 text-sm line-clamp-3 leading-relaxed">{{ $post->excerpt }}</p>
                            </div>
                        </div>

                        <div class="px-6 pb-6 pt-0">
                            <a href="{{ route('news.show', $post->slug) }}" class="text-blue-700 dark:text-sky-400 font-bold text-sm hover:underline inline-flex items-center gap-1 focus-visible:ring-2 focus-visible:ring-amber-400 focus-visible:outline-none">
                                Baca Selengkapnya &rarr;
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>

            <div class="mt-8">
                {{ $posts->links() }}
            </div>
        @else
            <div class="bg-white dark:bg-slate-900 rounded-2xl p-12 text-center border border-slate-200 dark:border-slate-800 text-slate-600 dark:text-slate-300">
                <i class="fa-solid fa-newspaper text-5xl mb-4 text-slate-300 dark:text-slate-600"></i>
                <h3 class="font-bold text-lg text-slate-900 dark:text-white">Tidak ada berita yang ditemukan</h3>
                <p class="text-sm text-slate-600 dark:text-slate-300">Coba kata kunci pencarian lain atau pilih kategori berbeda.</p>
            </div>
        @endif
    </div>
</div>
@endsection
