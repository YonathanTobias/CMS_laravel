@extends('layouts.admin')

@section('page_title', 'Kelola Kategori Berita & Artikel')

@section('content')

<div class="mb-6">
    <h2 class="font-heading font-bold text-xl text-slate-900 dark:text-white flex items-center gap-2">
        <i class="fa-solid fa-tags text-blue-600 dark:text-sky-400"></i> Kelola Kategori Berita & Artikel
    </h2>
    <p class="text-xs text-slate-500 dark:text-slate-400">Tambah, ubah nama, dan hapus kategori yang digunakan pada postingan berita & pengumuman.</p>
</div>

<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

    <!-- Left Col: Form Tambah Kategori Baru -->
    <div class="lg:col-span-4 bg-white dark:bg-slate-900 rounded-2xl p-6 border border-slate-200 dark:border-slate-800 shadow-sm space-y-4">
        <div class="border-b border-slate-100 dark:border-slate-800 pb-3">
            <h3 class="font-heading font-bold text-base text-slate-900 dark:text-white flex items-center gap-2">
                <i class="fa-solid fa-plus text-blue-600"></i> Tambah Kategori Baru
            </h3>
            <p class="text-xs text-slate-500 dark:text-slate-400">Masukkan nama kategori berita baru yang dibutuhkan.</p>
        </div>

        <form action="{{ route('admin.categories.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-xs font-bold uppercase text-slate-700 dark:text-slate-300 mb-1">Nama Kategori</label>
                <input type="text" name="name" value="{{ old('name') }}" required placeholder="Contoh: Pengabdian Masyarakat" class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-sm font-bold text-slate-900 dark:text-white focus:outline-none focus:border-blue-500 focus-visible:ring-2 focus-visible:ring-amber-400">
                @error('name')
                    <p class="text-xs text-red-500 mt-1 font-bold">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="w-full bg-blue-700 hover:bg-blue-800 text-white font-bold py-2.5 rounded-xl shadow text-xs transition flex items-center justify-center gap-1.5 focus-visible:ring-2 focus-visible:ring-amber-400">
                <i class="fa-solid fa-floppy-disk"></i> Simpan Kategori Baru
            </button>
        </form>
    </div>

    <!-- Right Col: Tabel Daftar Kategori Berita -->
    <div class="lg:col-span-8 bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm overflow-hidden transition-colors">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-sm">
                <thead>
                    <tr class="bg-slate-900 text-white border-b border-slate-800 text-xs uppercase font-bold">
                        <th class="py-4 px-6">Nama Kategori</th>
                        <th class="py-4 px-6">URL Slug</th>
                        <th class="py-4 px-6 text-center">Jumlah Berita</th>
                        <th class="py-4 px-6 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                    @forelse($categories as $category)
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition">
                            <td class="py-4 px-6 font-bold text-slate-900 dark:text-white flex items-center gap-2">
                                <span class="w-2.5 h-2.5 rounded-full bg-blue-600 inline-block"></span>
                                <span>{{ $category->name }}</span>
                            </td>
                            <td class="py-4 px-6 font-mono text-xs text-slate-500 dark:text-slate-400">{{ $category->slug }}</td>
                            <td class="py-4 px-6 text-center">
                                <span class="px-2.5 py-1 rounded-full bg-blue-50 dark:bg-blue-950/60 text-blue-700 dark:text-sky-300 text-xs font-extrabold border border-blue-200 dark:border-blue-800">
                                    {{ $category->posts_count }} Artikel
                                </span>
                            </td>
                            <td class="py-4 px-6 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('admin.categories.edit', $category->id) }}" class="p-1.5 text-slate-500 dark:text-slate-400 hover:text-amber-600 dark:hover:text-amber-400 rounded focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-amber-400" title="Edit Kategori"><i class="fa-solid fa-pen-to-square"></i></a>
                                    
                                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori {{ $category->name }}?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-1.5 text-slate-500 dark:text-slate-400 hover:text-red-600 dark:hover:text-red-400 rounded focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-amber-400" title="Hapus Kategori"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-8 text-center text-slate-400 dark:text-slate-500">Belum ada kategori berita. Tambahkan pada form di samping!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection
