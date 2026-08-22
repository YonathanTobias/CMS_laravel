@extends('layouts.admin')

@section('page_title', 'Kelola Halaman Statis (Pages)')

@section('content')

<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
    <div>
        <h2 class="font-heading font-bold text-xl text-slate-900">Kelola Halaman Statis (Pages)</h2>
        <p class="text-xs text-slate-500">Buat dan edit halaman profil kampus, visi misi, beasiswa, atau halaman informasi khusus.</p>
    </div>
    <a href="{{ route('admin.pages.create') }}" class="bg-blue-700 hover:bg-blue-800 text-white font-bold px-4 py-2.5 rounded-xl text-xs shadow transition flex items-center gap-1.5">
        <i class="fa-solid fa-plus"></i> Tambah Halaman Baru (Add Page)
    </a>
</div>

<div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse text-sm">
            <thead>
                <tr class="bg-slate-900 text-white border-b border-slate-800 text-xs uppercase font-bold">
                    <th class="py-4 px-6">Judul Halaman</th>
                    <th class="py-4 px-6">URL Slug</th>
                    <th class="py-4 px-6">Status Terbit</th>
                    <th class="py-4 px-6 text-center">Terhubung Ke Menu</th>
                    <th class="py-4 px-6 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($pages as $page)
                    @php
                        $linkedMenu = \App\Models\Menu::where('url', '/halaman/' . $page->slug)->first();
                    @endphp
                    <tr class="hover:bg-slate-50 transition">
                        <td class="py-4 px-6 font-bold text-slate-900">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-xl bg-blue-50 border border-blue-200 text-blue-700 flex items-center justify-center shrink-0">
                                    <i class="fa-solid {{ $page->icon ?? 'fa-file-lines' }}"></i>
                                </div>
                                <div>
                                    <a href="{{ route('admin.pages.edit', $page->id) }}" class="hover:text-blue-700 font-bold">
                                        {{ $page->title }}
                                    </a>
                                </div>
                            </div>
                        </td>
                        <td class="py-4 px-6 text-slate-500 font-mono text-xs">/halaman/{{ $page->slug }}</td>
                        <td class="py-4 px-6">
                            @if($page->is_active)
                                <span class="px-2.5 py-1 rounded bg-emerald-100 text-emerald-800 text-xs font-bold">Published</span>
                            @else
                                <span class="px-2.5 py-1 rounded bg-amber-100 text-amber-800 text-xs font-bold">Draft</span>
                            @endif
                        </td>
                        <td class="py-4 px-6 text-center">
                            @if($linkedMenu)
                                <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded bg-blue-50 text-blue-700 border border-blue-200 text-xs font-bold">
                                    <i class="fa-solid fa-link text-[10px]"></i> {{ $linkedMenu->parent ? 'Sub-menu: ' . $linkedMenu->parent->name : 'Menu Utama' }}
                                </span>
                            @else
                                <span class="text-xs text-slate-400 font-medium">- Belum Terhubung -</span>
                            @endif
                        </td>
                        <td class="py-4 px-6 text-center">
                            <div class="flex items-center justify-center gap-2">
                                <a href="{{ route('pages.show', $page->slug) }}" target="_blank" title="Lihat Tampilan Publik" class="p-1.5 text-slate-500 hover:text-blue-700"><i class="fa-solid fa-eye"></i></a>
                                <a href="{{ route('admin.pages.edit', $page->id) }}" title="Edit Halaman" class="p-1.5 text-slate-500 hover:text-amber-600"><i class="fa-solid fa-pen-to-square"></i></a>
                                <form action="{{ route('admin.pages.destroy', $page->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus halaman {{ $page->title }}?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" title="Hapus Halaman" class="p-1.5 text-slate-500 hover:text-red-600"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="py-8 text-center text-slate-400">Belum ada halaman statis. Klik "Tambah Halaman Baru" untuk membuatnya!</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
