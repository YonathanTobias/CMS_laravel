@extends('layouts.admin')

@section('page_title', 'Kelola Sertifikat & Piagam')

@section('content')

<div class="flex justify-between items-center mb-6">
    <div>
        <h2 class="font-heading font-bold text-xl text-slate-900 dark:text-white flex items-center gap-2">
            <i class="fa-solid fa-award text-emerald-500"></i> Kelola Sertifikat Akreditasi & Piagam Institusi
        </h2>
        <p class="text-xs text-slate-500 dark:text-slate-400">Tambah, edit, unggah gambar/input URL, dan atur urutan sertifikat yang tampil di carousel Beranda.</p>
    </div>
    <a href="{{ route('admin.certificates.create') }}" class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold px-4 py-2.5 rounded-xl text-xs shadow transition flex items-center gap-1.5">
        <i class="fa-solid fa-plus"></i> Tambah Sertifikat / Piagam
    </a>
</div>

@if(session('success'))
    <div class="mb-4 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs font-bold rounded-xl flex items-center gap-2">
        <i class="fa-solid fa-circle-check text-emerald-600 text-sm"></i> {{ session('success') }}
    </div>
@endif

<div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse text-sm">
            <thead>
                <tr class="bg-slate-900 text-white border-b border-slate-800 text-xs uppercase font-bold">
                    <th class="py-4 px-6">Gambar Dokumen</th>
                    <th class="py-4 px-6">Judul & Institusi Penerbit</th>
                    <th class="py-4 px-6">Badge Status</th>
                    <th class="py-4 px-6 text-center">Urutan</th>
                    <th class="py-4 px-6">Status</th>
                    <th class="py-4 px-6 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                @forelse($certificates as $cert)
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition">
                        <td class="py-4 px-6">
                            <div class="w-24 h-16 rounded-xl overflow-hidden border border-slate-200 dark:border-slate-700 shadow-sm bg-slate-900 group relative">
                                <img src="{{ \Illuminate\Support\Str::startsWith($cert->image, 'http') ? $cert->image : asset($cert->image) }}" alt="{{ $cert->title }}" class="w-full h-full object-cover">
                            </div>
                        </td>
                        <td class="py-4 px-6 font-bold text-slate-900 dark:text-white">
                            <div>{{ $cert->title }}</div>
                            <div class="text-xs text-slate-500 dark:text-slate-400 font-normal mt-0.5"><i class="fa-solid fa-building-columns text-[10px] mr-1 text-slate-400"></i>{{ $cert->issuer ?? '-' }}</div>
                        </td>
                        <td class="py-4 px-6">
                            @if($cert->badge)
                                <span class="px-2.5 py-1 rounded-full text-xs font-bold {{ $cert->badge_color }}">{{ $cert->badge }}</span>
                            @else
                                <span class="text-xs text-slate-400">-</span>
                            @endif
                        </td>
                        <td class="py-4 px-6 text-center font-extrabold text-slate-800 dark:text-slate-200">{{ $cert->order }}</td>
                        <td class="py-4 px-6">
                            @if($cert->is_active)
                                <span class="px-2.5 py-1 rounded bg-emerald-100 text-emerald-800 dark:bg-emerald-950 dark:text-emerald-300 text-xs font-bold">Aktif</span>
                            @else
                                <span class="px-2.5 py-1 rounded bg-slate-200 text-slate-600 dark:bg-slate-800 dark:text-slate-400 text-xs font-bold">Nonaktif</span>
                            @endif
                        </td>
                        <td class="py-4 px-6 text-center">
                            <div class="flex items-center justify-center gap-2">
                                <a href="{{ route('admin.certificates.edit', $cert->id) }}" class="p-2 text-slate-500 hover:text-amber-600 dark:text-slate-400 dark:hover:text-amber-400 transition" title="Edit Dokumen"><i class="fa-solid fa-pen-to-square"></i></a>
                                <form action="{{ route('admin.certificates.destroy', $cert->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus sertifikat/piagam ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 text-slate-500 hover:text-red-600 dark:text-slate-400 dark:hover:text-red-400 transition" title="Hapus Dokumen"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="py-8 text-center text-slate-400">Belum ada dokumen sertifikat / piagam institusi. Klik tombol Tambah di atas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
