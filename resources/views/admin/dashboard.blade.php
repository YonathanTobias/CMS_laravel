@extends('layouts.admin')

@section('page_title', 'Dashboard Administrator')

@section('content')

<!-- Welcome Banner -->
<div class="bg-gradient-to-r from-blue-950 via-blue-900 to-slate-950 text-white rounded-2xl p-6 sm:p-8 shadow-xl mb-8 relative overflow-hidden border border-blue-800/40">
    <div class="relative z-10 max-w-3xl space-y-2">
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-amber-500 text-slate-950 text-xs font-extrabold uppercase">
            <i class="fa-solid fa-gauge-high"></i> Panel Utama Admin CMS
        </div>
        <h2 class="font-heading font-extrabold text-2xl sm:text-3xl text-white drop-shadow">Selamat Datang di CMS STIKes Panti Waluya Malang!</h2>
        <p class="text-slate-200 text-sm leading-relaxed font-medium">
            Kelola artikel berita, halaman profil prodi, dokumen akreditasi SPMI, galeri fasilitas, dan informasi pendaftaran PMB dengan mudah dari satu panel terpadu.
        </p>
        <div class="pt-4 flex flex-wrap gap-3">
            <a href="{{ route('admin.posts.create') }}" class="bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-600 hover:to-amber-700 text-slate-950 font-extrabold px-4.5 py-2.5 rounded-xl text-xs shadow-lg transition flex items-center gap-1.5">
                <i class="fa-solid fa-plus"></i> Tulis Berita Baru
            </a>
            <a href="{{ route('admin.settings.index') }}" class="bg-white/15 hover:bg-white/25 text-white font-bold px-4.5 py-2.5 rounded-xl text-xs border border-white/30 backdrop-blur-md transition flex items-center gap-1.5">
                <i class="fa-solid fa-sliders"></i> Pengaturan PMB & Situs
            </a>
        </div>
    </div>
</div>

<!-- Stat Cards Grid -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    
    <div class="bg-white dark:bg-slate-900 rounded-2xl p-6 border border-slate-200/90 dark:border-slate-800 shadow-sm flex items-center justify-between transition-colors">
        <div>
            <div class="text-xs font-extrabold uppercase text-slate-600 dark:text-slate-400 mb-1">Total Artikel</div>
            <div class="font-heading font-extrabold text-3xl text-slate-900 dark:text-white">{{ $totalPosts }}</div>
            <div class="text-xs text-blue-700 dark:text-sky-400 font-bold mt-1.5 flex items-center gap-1">
                <i class="fa-solid fa-circle-check text-[10px]"></i> {{ $publishedPosts }} Berita Terbit
            </div>
        </div>
        <div class="w-12 h-12 rounded-2xl bg-blue-50 dark:bg-blue-950 text-blue-700 dark:text-sky-300 flex items-center justify-center text-xl font-bold border border-blue-100 dark:border-blue-800">
            <i class="fa-solid fa-newspaper"></i>
        </div>
    </div>

    <div class="bg-white dark:bg-slate-900 rounded-2xl p-6 border border-slate-200/90 dark:border-slate-800 shadow-sm flex items-center justify-between transition-colors">
        <div>
            <div class="text-xs font-extrabold uppercase text-slate-600 dark:text-slate-400 mb-1">Total Pembaca</div>
            <div class="font-heading font-extrabold text-3xl text-slate-900 dark:text-white">{{ number_format($totalViews) }}</div>
            <div class="text-xs text-amber-700 dark:text-amber-400 font-bold mt-1.5 flex items-center gap-1">
                <i class="fa-solid fa-chart-line text-[10px]"></i> Akumulasi Views
            </div>
        </div>
        <div class="w-12 h-12 rounded-2xl bg-amber-50 dark:bg-amber-950/60 text-amber-600 dark:text-amber-400 flex items-center justify-center text-xl font-bold border border-amber-100 dark:border-amber-900/60">
            <i class="fa-solid fa-eye"></i>
        </div>
    </div>

    <div class="bg-white dark:bg-slate-900 rounded-2xl p-6 border border-slate-200/90 dark:border-slate-800 shadow-sm flex items-center justify-between transition-colors">
        <div>
            <div class="text-xs font-extrabold uppercase text-slate-600 dark:text-slate-400 mb-1">Program Studi</div>
            <div class="font-heading font-extrabold text-3xl text-slate-900 dark:text-white">{{ $totalProdi }}</div>
            <div class="text-xs text-emerald-700 dark:text-emerald-400 font-bold mt-1.5 flex items-center gap-1">
                <i class="fa-solid fa-graduation-cap text-[10px]"></i> Aktif Melayani
            </div>
        </div>
        <div class="w-12 h-12 rounded-2xl bg-emerald-50 dark:bg-emerald-950/60 text-emerald-600 dark:text-emerald-400 flex items-center justify-center text-xl font-bold border border-emerald-100 dark:border-emerald-900/60">
            <i class="fa-solid fa-user-doctor"></i>
        </div>
    </div>

    <div class="bg-white dark:bg-slate-900 rounded-2xl p-6 border border-slate-200/90 dark:border-slate-800 shadow-sm flex items-center justify-between transition-colors">
        <div>
            <div class="text-xs font-extrabold uppercase text-slate-600 dark:text-slate-400 mb-1">Dokumen SPMI</div>
            <div class="font-heading font-extrabold text-3xl text-slate-900 dark:text-white">{{ $totalSpmi }}</div>
            <div class="text-xs text-indigo-700 dark:text-indigo-400 font-bold mt-1.5 flex items-center gap-1">
                <i class="fa-solid fa-shield-halved text-[10px]"></i> Penjaminan Mutu
            </div>
        </div>
        <div class="w-12 h-12 rounded-2xl bg-indigo-50 dark:bg-indigo-950/60 text-indigo-600 dark:text-indigo-400 flex items-center justify-center text-xl font-bold border border-indigo-100 dark:border-indigo-900/60">
            <i class="fa-solid fa-file-shield"></i>
        </div>
    </div>

</div>

<!-- Content Grid -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
    
    <!-- Left Col: Recent Posts Table -->
    <div class="lg:col-span-8 bg-white dark:bg-slate-900 rounded-2xl border border-slate-200/90 dark:border-slate-800 shadow-sm p-6 space-y-4 transition-colors">
        <div class="flex items-center justify-between border-b border-slate-100 dark:border-slate-800 pb-4">
            <h3 class="font-heading font-extrabold text-lg text-slate-900 dark:text-white">Artikel & Berita Terbaru</h3>
            <a href="{{ route('admin.posts.index') }}" class="text-xs text-blue-700 dark:text-sky-400 font-bold hover:underline">Kelola Semua &rarr;</a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-sm">
                <thead>
                    <tr class="text-slate-600 dark:text-slate-400 font-extrabold text-xs uppercase border-b border-slate-200 dark:border-slate-800">
                        <th class="py-3 px-2">Judul Berita</th>
                        <th class="py-3 px-2">Kategori</th>
                        <th class="py-3 px-2">Status</th>
                        <th class="py-3 px-2 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                    @forelse($recentPosts as $post)
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/60 transition">
                            <td class="py-3.5 px-2 font-bold text-slate-900 dark:text-slate-100">
                                <a href="{{ route('admin.posts.edit', $post->id) }}" class="hover:text-blue-700 dark:hover:text-sky-400 line-clamp-1">
                                    {{ $post->title }}
                                </a>
                            </td>
                            <td class="py-3.5 px-2">
                                <span class="px-2.5 py-1 rounded-md bg-slate-100 dark:bg-slate-800 text-slate-800 dark:text-slate-200 text-xs font-bold border border-slate-200 dark:border-slate-700">{{ $post->category }}</span>
                            </td>
                            <td class="py-3.5 px-2">
                                @if($post->status === 'published')
                                    <span class="px-2.5 py-1 rounded-md bg-emerald-50 dark:bg-emerald-950/60 text-emerald-700 dark:text-emerald-300 text-xs font-bold border border-emerald-200 dark:border-emerald-800">Published</span>
                                @else
                                    <span class="px-2.5 py-1 rounded-md bg-amber-50 dark:bg-amber-950/60 text-amber-800 dark:text-amber-300 text-xs font-bold border border-amber-200 dark:border-amber-800">Draft</span>
                                @endif
                            </td>
                            <td class="py-3.5 px-2 text-right">
                                <a href="{{ route('admin.posts.edit', $post->id) }}" class="text-xs text-blue-700 dark:text-sky-400 hover:text-blue-900 font-bold bg-blue-50 dark:bg-blue-950/60 px-2.5 py-1 rounded-lg border border-blue-200 dark:border-blue-800">Edit</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-8 text-center text-slate-500 dark:text-slate-400 font-medium">Belum ada berita.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Right Col: Quick Draft Form -->
    <div class="lg:col-span-4 bg-white dark:bg-slate-900 rounded-2xl border border-slate-200/90 dark:border-slate-800 shadow-sm p-6 space-y-4 transition-colors">
        <div class="border-b border-slate-100 dark:border-slate-800 pb-3">
            <h3 class="font-heading font-extrabold text-lg text-slate-900 dark:text-white">Draft Cepat (Quick Draft)</h3>
            <p class="text-xs text-slate-500 dark:text-slate-400 font-medium">Tulis ide berita singkat untuk disimpan sebagai draf.</p>
        </div>

        <form action="{{ route('admin.posts.store') }}" method="POST" class="space-y-4">
            @csrf
            <input type="hidden" name="status" value="draft">

            <div>
                <label class="block text-xs font-bold uppercase text-slate-700 dark:text-slate-300 mb-1">Judul Draf Berita</label>
                <input type="text" name="title" required placeholder="Judul draf cepat..." class="w-full px-3.5 py-2.5 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-xs font-bold text-slate-900 dark:text-white focus:outline-none focus:border-blue-500">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase text-slate-700 dark:text-slate-300 mb-1">Kategori</label>
                <select name="category" class="w-full px-3.5 py-2.5 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-xs font-bold text-slate-900 dark:text-white focus:outline-none focus:border-blue-500">
                    <option value="PMB & Akademik">PMB & Akademik</option>
                    <option value="Akademik">Akademik</option>
                    <option value="Kemahasiswaan">Kemahasiswaan</option>
                    <option value="Prestasi & Pengakuan">Prestasi & Pengakuan</option>
                    <option value="Pengabdian Masyarakat">Pengabdian Masyarakat</option>
                </select>
            </div>

            <div>
                <label class="block text-xs font-bold uppercase text-slate-700 dark:text-slate-300 mb-1">Ringkasan Ide</label>
                <textarea name="excerpt" rows="3" placeholder="Ringkasan singkat ide berita..." class="w-full px-3.5 py-2.5 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-xs text-slate-900 dark:text-white focus:outline-none focus:border-blue-500"></textarea>
            </div>

            <textarea name="content" class="hidden">Draf cepat dari dashboard admin.</textarea>

            <button type="submit" class="w-full bg-blue-700 hover:bg-blue-800 text-white font-bold py-2.5 rounded-xl shadow text-xs transition">
                Simpan Sebagai Draf &rarr;
            </button>
        </form>
    </div>

</div>

@endsection
