@extends('layouts.public')

@section('title', $post->title . ' - STIKes Panti Waluya Malang')

@section('content')
<div class="bg-blue-950 text-white py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-4">
        <div class="flex items-center gap-3 text-sky-400 text-xs font-semibold uppercase tracking-wider">
            <a href="{{ route('news.index') }}" class="hover:underline">Berita & Pengumuman</a>
            <span>&bull;</span>
            <span class="px-2.5 py-0.5 rounded bg-blue-600/30 text-sky-300 border border-blue-500/40">{{ $post->category }}</span>
        </div>
        
        <h1 class="font-heading font-extrabold text-2xl sm:text-4xl leading-tight">{{ $post->title }}</h1>
        
        <div class="flex items-center gap-4 text-xs text-slate-300 border-t border-blue-900 pt-4">
            <span class="flex items-center gap-1.5"><i class="fa-regular fa-calendar text-blue-400"></i> {{ $post->published_at ? $post->published_at->format('d F Y') : $post->created_at->format('d F Y') }}</span>
            <span>&bull;</span>
            <span class="flex items-center gap-1.5"><i class="fa-regular fa-eye text-blue-400"></i> {{ $post->views }} Kali Dilihat</span>
            <span>&bull;</span>
            <span class="flex items-center gap-1.5"><i class="fa-solid fa-user-pen text-blue-400"></i> Humas STIKes</span>
        </div>
    </div>
</div>

<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    @if($post->image)
        <div class="rounded-2xl overflow-hidden shadow-xl mb-10 max-h-96 border border-slate-200">
            <img src="{{ $post->image }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
        </div>
    @endif

    <div class="bg-white rounded-2xl p-8 sm:p-12 border border-slate-200 shadow-sm prose max-w-none text-slate-800 leading-relaxed space-y-6">
        {!! $post->content !!}
    </div>

    <!-- Recent Posts Sidebar Block -->
    @if($recentPosts->count() > 0)
        <div class="mt-16 bg-slate-100 rounded-2xl p-8 border border-slate-200">
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
