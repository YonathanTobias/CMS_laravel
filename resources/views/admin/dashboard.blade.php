@extends('layouts.admin')

@section('page_title', 'Dashboard Administrator')

@section('content')

<!-- Welcome Banner -->
<div class="bg-gradient-to-r from-navy-900 via-teal-900 to-slate-900 text-white rounded-2xl p-6 sm:p-8 shadow-lg mb-8 relative overflow-hidden">
    <div class="relative z-10 max-w-3xl space-y-2">
        <h2 class="font-heading font-extrabold text-2xl sm:text-3xl">Selamat Datang di CMS STIKes Panti Waluya Malang!</h2>
        <p class="text-slate-300 text-sm leading-relaxed">
            Kelola artikel berita, halaman profil prodi, dokumen akreditasi SPMI, galeri fasilitas, dan informasi pendaftaran PMB dengan mudah dari satu panel terpadu.
        </p>
        <div class="pt-4 flex flex-wrap gap-3">
            <a href="{{ route('admin.posts.create') }}" class="bg-teal-500 hover:bg-teal-600 text-slate-950 font-bold px-4 py-2 rounded-xl text-xs shadow transition flex items-center gap-1.5">
                <i class="fa-solid fa-plus"></i> Tulis Berita Baru
            </a>
            <a href="{{ route('admin.settings.index') }}" class="bg-slate-800 hover:bg-slate-700 text-white font-semibold px-4 py-2 rounded-xl text-xs border border-slate-700 transition flex items-center gap-1.5">
                <i class="fa-solid fa-sliders"></i> Pengaturan PMB & Situs
            </a>
        </div>
    </div>
</div>

<!-- Stat Cards Grid -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    
    <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm flex items-center justify-between">
        <div>
            <div class="text-xs font-bold uppercase text-slate-500 mb-1">Total Artikel</div>
            <div class="font-heading font-extrabold text-3xl text-slate-900">{{ $totalPosts }}</div>
            <div class="text-[11px] text-teal-600 font-semibold mt-1">{{ $publishedPosts }} Berita Terbit</div>
        </div>
        <div class="w-12 h-12 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center text-xl">
            <i class="fa-solid fa-newspaper"></i>
        </div>
    </div>

    <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm flex items-center justify-between">
        <div>
            <div class="text-xs font-bold uppercase text-slate-500 mb-1">Total Pembaca</div>
            <div class="font-heading font-extrabold text-3xl text-slate-900">{{ number_format($totalViews) }}</div>
            <div class="text-[11px] text-slate-400 font-semibold mt-1">Akumulasi Views</div>
        </div>
        <div class="w-12 h-12 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center text-xl">
            <i class="fa-solid fa-eye"></i>
        </div>
    </div>

    <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm flex items-center justify-between">
        <div>
            <div class="text-xs font-bold uppercase text-slate-500 mb-1">Program Studi</div>
            <div class="font-heading font-extrabold text-3xl text-slate-900">{{ $totalProdi }}</div>
            <div class="text-[11px] text-emerald-600 font-semibold mt-1">Aktif Melayani</div>
        </div>
        <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-xl">
            <i class="fa-solid fa-graduation-cap"></i>
        </div>
    </div>

    <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm flex items-center justify-between">
        <div>
            <div class="text-xs font-bold uppercase text-slate-500 mb-1">Dokumen SPMI</div>
            <div class="font-heading font-extrabold text-3xl text-slate-900">{{ $totalSpmi }}</div>
            <div class="text-[11px] text-indigo-600 font-semibold mt-1">Dokumen Penjaminan Mutu</div>
        </div>
        <div class="w-12 h-12 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center text-xl">
            <i class="fa-solid fa-file-shield"></i>
        </div>
    </div>

</div>

<!-- Content Grid -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
    
    <!-- Left Col: Recent Posts Table -->
    <div class="lg:col-span-8 bg-white rounded-2xl border border-slate-200 shadow-sm p-6 space-y-4">
        <div class="flex items-center justify-between border-b border-slate-100 pb-4">
            <h3 class="font-heading font-bold text-lg text-slate-900">Artikel & Berita Terbaru</h3>
            <a href="{{ route('admin.posts.index') }}" class="text-xs text-teal-600 font-bold hover:underline">Kelola Semua &rarr;</a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-sm">
                <thead>
                    <tr class="text-slate-400 font-bold text-xs uppercase border-b border-slate-100">
                        <th class="py-3 px-2">Judul Berita</th>
                        <th class="py-3 px-2">Kategori</th>
                        <th class="py-3 px-2">Status</th>
                        <th class="py-3 px-2 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($recentPosts as $post)
                        <tr class="hover:bg-slate-50 transition">
                            <td class="py-3 px-2 font-semibold text-slate-900">
                                <a href="{{ route('admin.posts.edit', $post->id) }}" class="hover:text-teal-600 line-clamp-1">
                                    {{ $post->title }}
                                </a>
                            </td>
                            <td class="py-3 px-2">
                                <span class="px-2 py-0.5 rounded bg-slate-100 text-slate-700 text-xs font-bold">{{ $post->category }}</span>
                            </td>
                            <td class="py-3 px-2">
                                @if($post->status === 'published')
                                    <span class="px-2 py-0.5 rounded bg-emerald-100 text-emerald-700 text-xs font-bold">Published</span>
                                @else
                                    <span class="px-2 py-0.5 rounded bg-amber-100 text-amber-700 text-xs font-bold">Draft</span>
                                @endif
                            </td>
                            <td class="py-3 px-2 text-right">
                                <a href="{{ route('admin.posts.edit', $post->id) }}" class="text-xs text-teal-600 hover:text-teal-800 font-bold">Edit</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-6 text-center text-slate-400">Belum ada berita.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Right Col: Quick Draft Form -->
    <div class="lg:col-span-4 bg-white rounded-2xl border border-slate-200 shadow-sm p-6 space-y-4">
        <div class="border-b border-slate-100 pb-3">
            <h3 class="font-heading font-bold text-lg text-slate-900">Draft Cepat (Quick Draft)</h3>
            <p class="text-xs text-slate-500">Tulis ide berita singkat untuk disimpan sebagai draf.</p>
        </div>

        <form action="{{ route('admin.posts.store') }}" method="POST" class="space-y-4">
            @csrf
            <input type="hidden" name="status" value="draft">
            <input type="hidden" name="category" value="Berita">

            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Judul Draf</label>
                <input type="text" name="title" required placeholder="Judul artikel draf..." class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-teal-500">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Isi Konten Singkat</label>
                <textarea name="content" rows="4" required placeholder="Tuliskan catatan draf artikel..." class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-teal-500"></textarea>
            </div>

            <button type="submit" class="w-full bg-slate-800 hover:bg-slate-900 text-white font-bold py-2.5 rounded-xl text-xs shadow transition">
                Simpan Draf &rarr;
            </button>
        </form>
    </div>

</div>

@endsection
