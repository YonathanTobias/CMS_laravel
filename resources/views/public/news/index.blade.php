@extends('layouts.public')

@section('title', 'Berita & Pengumuman - STIKes Panti Waluya Malang')

@section('content')
<div class="bg-blue-950 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4">
        <h1 class="font-heading font-extrabold text-3xl sm:text-4xl">Berita & Pengumuman Kampus</h1>
        <p class="text-slate-300 text-sm sm:text-base max-w-2xl mx-auto">Informasi kegiatan akademik, penelitian, pengabdian masyarakat, dan informasi pendaftaran mahasiswa baru.</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Filter & Search Bar -->
    <form action="{{ route('news.index') }}" method="GET" class="bg-white rounded-2xl p-4 border border-slate-200 shadow-sm mb-12 flex flex-col md:flex-row gap-4 justify-between items-center">
        <div class="flex items-center gap-2 overflow-x-auto w-full md:w-auto pb-2 md:pb-0">
            <a href="{{ route('news.index') }}" class="px-4 py-2 rounded-xl text-xs font-bold whitespace-nowrap {{ !request('category') ? 'bg-blue-700 text-white' : 'bg-slate-100 text-slate-700 hover:bg-slate-200' }}">
                Semua Kategori
            </a>
            @foreach($categories as $cat)
                <a href="{{ route('news.index', ['category' => $cat]) }}" class="px-4 py-2 rounded-xl text-xs font-bold whitespace-nowrap {{ request('category') === $cat ? 'bg-blue-700 text-white' : 'bg-slate-100 text-slate-700 hover:bg-slate-200' }}">
                    {{ $cat }}
                </a>
            @endforeach
        </div>

        <div class="relative w-full md:w-72">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari kata kunci berita..." class="w-full pl-10 pr-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-blue-500">
            <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-3 text-slate-400 text-xs"></i>
        </div>
    </form>

    <!-- News Grid -->
    @if($posts->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
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
                                <span>&bull;</span>
                                <i class="fa-regular fa-eye text-blue-600"></i> {{ $post->views }}x
                            </div>
                            <h2 class="font-heading font-bold text-lg text-slate-900 mb-2 hover:text-blue-700 transition line-clamp-2">
                                <a href="{{ route('news.show', $post->slug) }}">{{ $post->title }}</a>
                            </h2>
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

        <div class="mt-8">
            {{ $posts->links() }}
        </div>
    @else
        <div class="bg-white rounded-2xl p-12 text-center border border-slate-200 text-slate-500">
            <i class="fa-solid fa-newspaper text-5xl mb-4 text-slate-300"></i>
            <h3 class="font-bold text-lg text-slate-800">Tidak ada berita yang ditemukan</h3>
            <p class="text-sm">Coba kata kunci pencarian lain atau pilih kategori berbeda.</p>
        </div>
    @endif
</div>
@endsection
