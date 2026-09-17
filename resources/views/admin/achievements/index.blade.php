@extends('layouts.admin')

@section('page_title', 'Kelola Prestasi & Ucapan Selamat')

@section('content')

<div class="mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
    <div>
        <h2 class="font-heading font-bold text-xl text-slate-900 dark:text-white">Prestasi, Sertifikasi Dosen & Ucapan Selamat</h2>
        <p class="text-xs text-slate-500 dark:text-slate-400">Kelola daftar kejuaraan mahasiswa, sertifikasi dosen, pengangkatan satgas baru, dan penghargaan civitas akademika.</p>
    </div>
    <a href="{{ route('admin.achievements.create') }}" class="bg-blue-700 hover:bg-blue-800 text-white font-bold px-4 py-2.5 rounded-xl shadow transition text-xs flex items-center gap-2">
        <i class="fa-solid fa-plus"></i> Tambah Ucapan / Prestasi Baru
    </a>
</div>

<div class="bg-white dark:bg-slate-900 rounded-3xl border border-slate-200 dark:border-slate-800 shadow-sm overflow-hidden transition-colors">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse text-sm">
            <thead>
                <tr class="bg-slate-900 text-white border-b border-slate-800 text-[11px] uppercase font-bold tracking-wider">
                    <th class="py-4 px-5 text-center w-16">Urutan</th>
                    <th class="py-4 px-5 text-center w-24">Poster / Flyer</th>
                    <th class="py-4 px-6">Nama Tokoh / Dosen / Mahasiswa</th>
                    <th class="py-4 px-5">Lencana / Sertifikasi</th>
                    <th class="py-4 px-6">Judul Prestasi & Event</th>
                    <th class="py-4 px-5 text-center w-28">Status</th>
                    <th class="py-4 px-6 text-center w-36">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 dark:divide-slate-800/80">
                @forelse($achievements as $item)
                    <tr class="hover:bg-slate-50/80 dark:hover:bg-slate-800/50 transition">
                        <!-- Urutan -->
                        <td class="py-4 px-5 text-center">
                            <span class="inline-flex items-center justify-center w-8 h-8 rounded-xl bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300 font-mono font-bold text-xs border border-slate-200/80 dark:border-slate-700">
                                #{{ $item->order }}
                            </span>
                        </td>

                        <!-- Poster -->
                        <td class="py-4 px-5 text-center">
                            @if($item->poster_image)
                                @php
                                    $posterSrc = \Illuminate\Support\Str::startsWith($item->poster_image, 'http') ? $item->poster_image : asset($item->poster_image);
                                @endphp
                                <a href="{{ $posterSrc }}" target="_blank" class="inline-block relative group">
                                    <img src="{{ $posterSrc }}" alt="{{ $item->title }}" class="w-14 h-18 object-cover rounded-xl border border-slate-200 dark:border-slate-700 shadow-sm group-hover:scale-105 transition duration-200">
                                    <div class="absolute inset-0 bg-slate-950/40 rounded-xl opacity-0 group-hover:opacity-100 transition flex items-center justify-center text-white text-[10px]">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </div>
                                </a>
                            @else
                                <div class="w-14 h-18 mx-auto rounded-xl bg-slate-100 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 flex items-center justify-center text-slate-400">
                                    <i class="fa-solid fa-trophy text-lg"></i>
                                </div>
                            @endif
                        </td>

                        <!-- Nama -->
                        <td class="py-4 px-6">
                            <div class="font-bold text-slate-900 dark:text-white text-sm">{{ $item->student_name }}</div>
                            <div class="text-xs text-slate-500 dark:text-slate-400 mt-0.5 flex items-center gap-1">
                                <i class="fa-solid fa-graduation-cap text-[10px] text-blue-600 dark:text-sky-400"></i> {!! $item->student_prodi ?? '-' !!}
                            </div>
                        </td>

                        <!-- Lencana -->
                        <td class="py-4 px-5">
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold border shadow-xs whitespace-nowrap {{ $item->badge_color }}">
                                <i class="fa-solid fa-award text-[10px]"></i> {{ $item->badge_title }}
                            </span>
                        </td>

                        <!-- Judul & Event -->
                        <td class="py-4 px-6">
                            <div class="font-bold text-slate-800 dark:text-slate-100 text-xs line-clamp-2 leading-snug">{{ $item->title }}</div>
                            @if($item->event_name)
                                <div class="text-[11px] text-slate-500 dark:text-slate-400 mt-1 flex items-center gap-1 truncate">
                                    <i class="fa-solid fa-building-columns text-[10px] text-amber-500"></i> {{ $item->event_name }}
                                </div>
                            @endif
                        </td>

                        <!-- Status -->
                        <td class="py-4 px-5 text-center">
                            @if($item->is_active)
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-50 dark:bg-emerald-950/60 text-emerald-700 dark:text-emerald-300 text-xs font-bold border border-emerald-200 dark:border-emerald-800">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span> Tampil
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-slate-100 dark:bg-slate-800 text-slate-500 dark:text-slate-400 text-xs font-bold border border-slate-200 dark:border-slate-700">
                                    <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Sembunyi
                                </span>
                            @endif
                        </td>

                        <!-- Aksi -->
                        <td class="py-4 px-6 text-center">
                            <div class="flex items-center justify-center gap-1.5">
                                <a href="{{ route('admin.achievements.edit', $item->id) }}" class="p-2 bg-amber-50 hover:bg-amber-100 dark:bg-amber-950/60 text-amber-700 dark:text-amber-300 rounded-xl border border-amber-200 dark:border-amber-800 text-xs font-bold transition flex items-center gap-1 shadow-xs" title="Edit Prestasi">
                                    <i class="fa-solid fa-pen-to-square"></i> Edit
                                </a>
                                <form action="{{ route('admin.achievements.destroy', $item->id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 bg-red-50 hover:bg-red-100 dark:bg-red-950/60 text-red-600 dark:text-red-400 rounded-xl border border-red-200 dark:border-red-800 text-xs font-bold transition flex items-center gap-1 shadow-xs" title="Hapus Prestasi">
                                        <i class="fa-solid fa-trash-can"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="py-12 text-center text-slate-500 dark:text-slate-400">
                            Belum ada data ucapan / prestasi. Klik <strong>Tambah Ucapan / Prestasi Baru</strong> di atas.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
