@extends('layouts.admin')

@section('page_title', 'Kelola Berita & Artikel')

@section('content')

<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
    <div>
        <h2 class="font-heading font-bold text-xl text-slate-900">Daftar Berita & Pengumuman</h2>
        <p class="text-xs text-slate-500">Kelola artikel publikasi kampus gaya WordPress.</p>
    </div>
    <a href="{{ route('admin.posts.create') }}" class="bg-teal-600 hover:bg-teal-700 text-white font-bold px-4 py-2.5 rounded-xl text-xs shadow transition flex items-center gap-1.5">
        <i class="fa-solid fa-plus"></i> Tambah Berita Baru
    </a>
</div>

<!-- Filter Bar -->
<div class="bg-white rounded-2xl p-4 border border-slate-200 shadow-sm mb-6 flex flex-col sm:flex-row gap-4 justify-between items-center">
    <div class="flex items-center gap-2">
        <a href="{{ route('admin.posts.index') }}" class="px-3 py-1.5 rounded-lg text-xs font-bold {{ !request('status') ? 'bg-slate-900 text-white' : 'bg-slate-100 text-slate-700 hover:bg-slate-200' }}">Semua</a>
        <a href="{{ route('admin.posts.index', ['status' => 'published']) }}" class="px-3 py-1.5 rounded-lg text-xs font-bold {{ request('status') === 'published' ? 'bg-emerald-600 text-white' : 'bg-slate-100 text-slate-700 hover:bg-slate-200' }}">Terbit</a>
        <a href="{{ route('admin.posts.index', ['status' => 'draft']) }}" class="px-3 py-1.5 rounded-lg text-xs font-bold {{ request('status') === 'draft' ? 'bg-amber-600 text-white' : 'bg-slate-100 text-slate-700 hover:bg-slate-200' }}">Draf</a>
    </div>

    <form action="{{ route('admin.posts.index') }}" method="GET" class="relative w-full sm:w-64">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari berita..." class="w-full pl-9 pr-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs focus:outline-none focus:border-teal-500">
        <i class="fa-solid fa-magnifying-glass absolute left-3 top-2.5 text-slate-400 text-xs"></i>
    </form>
</div>

<!-- Table -->
<div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse text-sm">
            <thead>
                <tr class="bg-slate-900 text-white border-b border-slate-800 text-xs uppercase font-bold">
                    <th class="py-4 px-6">Judul Artikel</th>
                    <th class="py-4 px-6">Kategori</th>
                    <th class="py-4 px-6">Status</th>
                    <th class="py-4 px-6">Views</th>
                    <th class="py-4 px-6">Tanggal</th>
                    <th class="py-4 px-6 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($posts as $post)
                    <tr class="hover:bg-slate-50 transition">
                        <td class="py-4 px-6 font-semibold text-slate-900">
                            <div class="flex items-center gap-3">
                                @if($post->image)
                                    <img src="{{ $post->image }}" class="w-10 h-10 rounded-lg object-cover border border-slate-200 shrink-0">
                                @else
                                    <div class="w-10 h-10 rounded-lg bg-slate-100 flex items-center justify-center text-slate-400 shrink-0">
                                        <i class="fa-solid fa-newspaper text-sm"></i>
                                    </div>
                                @endif
                                <div>
                                    <a href="{{ route('admin.posts.edit', $post->id) }}" class="hover:text-teal-600 font-bold line-clamp-1">
                                        {{ $post->title }}
                                    </a>
                                    <span class="text-xs text-slate-400 font-mono">/berita/{{ $post->slug }}</span>
                                </div>
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <span class="px-2.5 py-1 rounded bg-slate-100 text-slate-700 text-xs font-bold">{{ $post->category }}</span>
                        </td>
                        <td class="py-4 px-6">
                            @if($post->status === 'published')
                                <span class="px-2.5 py-1 rounded bg-emerald-100 text-emerald-800 text-xs font-bold">Published</span>
                            @else
                                <span class="px-2.5 py-1 rounded bg-amber-100 text-amber-800 text-xs font-bold">Draft</span>
                            @endif
                        </td>
                        <td class="py-4 px-6 font-bold text-slate-600">{{ $post->views }}</td>
                        <td class="py-4 px-6 text-xs text-slate-500">{{ $post->updated_at->format('d M Y') }}</td>
                        <td class="py-4 px-6 text-center">
                            <div class="flex items-center justify-center gap-2">
                                <a href="{{ route('news.show', $post->slug) }}" target="_blank" title="Lihat Publik" class="p-1.5 text-slate-500 hover:text-teal-600">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.posts.edit', $post->id) }}" title="Edit" class="p-1.5 text-slate-500 hover:text-amber-600">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" title="Hapus" class="p-1.5 text-slate-500 hover:text-red-600">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="py-8 text-center text-slate-400">Belum ada berita ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="p-4 border-t border-slate-100">
        {{ $posts->links() }}
    </div>
</div>

@endsection
