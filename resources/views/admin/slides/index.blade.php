@extends('layouts.admin')

@section('page_title', 'Kelola Banner Carousel')

@section('content')

<div class="flex justify-between items-center mb-6">
    <div>
        <h2 class="font-heading font-bold text-xl text-slate-900">Kelola Banner Carousel Beranda</h2>
        <p class="text-xs text-slate-500">Tambah, edit judul, ubah gambar banner, dan atur urutan slide di halaman utama.</p>
    </div>
    <a href="{{ route('admin.slides.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold px-4 py-2.5 rounded-xl text-xs shadow transition flex items-center gap-1.5">
        <i class="fa-solid fa-plus"></i> Tambah Slide Banner
    </a>
</div>

<div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse text-sm">
            <thead>
                <tr class="bg-slate-900 text-white border-b border-slate-800 text-xs uppercase font-bold">
                    <th class="py-4 px-6">Gambar Slide</th>
                    <th class="py-4 px-6">Judul Banner</th>
                    <th class="py-4 px-6">Badge Text</th>
                    <th class="py-4 px-6 text-center">Urutan</th>
                    <th class="py-4 px-6">Status</th>
                    <th class="py-4 px-6 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($slides as $slide)
                    <tr class="hover:bg-slate-50 transition">
                        <td class="py-4 px-6">
                            <div class="w-24 h-14 rounded-lg overflow-hidden border border-slate-200 shadow-sm bg-slate-900">
                                <img src="{{ $slide->image }}" class="w-full h-full object-cover">
                            </div>
                        </td>
                        <td class="py-4 px-6 font-bold text-slate-900">
                            <div>{{ $slide->title }}</div>
                            <div class="text-xs text-slate-400 font-normal line-clamp-1">{{ $slide->subtitle }}</div>
                        </td>
                        <td class="py-4 px-6">
                            <span class="px-2.5 py-1 rounded text-xs font-bold {{ $slide->badge_color }}">{{ $slide->badge }}</span>
                        </td>
                        <td class="py-4 px-6 text-center font-extrabold text-slate-800">{{ $slide->order }}</td>
                        <td class="py-4 px-6">
                            @if($slide->is_active)
                                <span class="px-2.5 py-1 rounded bg-emerald-100 text-emerald-800 text-xs font-bold">Aktif</span>
                            @else
                                <span class="px-2.5 py-1 rounded bg-slate-200 text-slate-600 text-xs font-bold">Nonaktif</span>
                            @endif
                        </td>
                        <td class="py-4 px-6 text-center">
                            <div class="flex items-center justify-center gap-2">
                                <a href="{{ route('admin.slides.edit', $slide->id) }}" class="p-1.5 text-slate-500 hover:text-amber-600" title="Edit Slide"><i class="fa-solid fa-pen-to-square"></i></a>
                                <form action="{{ route('admin.slides.destroy', $slide->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus slide banner ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-1.5 text-slate-500 hover:text-red-600" title="Hapus Slide"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="py-8 text-center text-slate-400">Belum ada slide banner carousel.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
