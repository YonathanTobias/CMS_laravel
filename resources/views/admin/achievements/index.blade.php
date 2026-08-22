@extends('layouts.admin')

@section('page_title', 'Kelola Prestasi Mahasiswa')

@section('content')

<div class="mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
    <div>
        <h2 class="font-heading font-bold text-xl text-slate-900">Prestasi & Kejuaraan Mahasiswa</h2>
        <p class="text-xs text-slate-500">Kelola daftar penghargaan dan juara mahasiswa yang tampil di beranda utama.</p>
    </div>
    <a href="{{ route('admin.achievements.create') }}" class="bg-blue-700 hover:bg-blue-800 text-white font-bold px-4 py-2.5 rounded-xl shadow transition text-xs flex items-center gap-2">
        <i class="fa-solid fa-plus"></i> Tambah Prestasi Baru
    </a>
</div>

<div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm text-slate-600">
            <thead class="bg-slate-50 text-xs font-bold uppercase text-slate-500 border-b border-slate-200">
                <tr>
                    <th class="px-6 py-4">Urutan</th>
                    <th class="px-6 py-4">Poster / Flyer</th>
                    <th class="px-6 py-4">Nama Mahasiswa & Prodi</th>
                    <th class="px-6 py-4">Penghargaan / Juara</th>
                    <th class="px-6 py-4">Judul Lomba & Event</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($achievements as $item)
                    <tr class="hover:bg-slate-50/80 transition">
                        <td class="px-6 py-4 font-bold text-slate-400">#{{ $item->order }}</td>
                        <td class="px-6 py-4">
                            @if($item->poster_image)
                                <div class="w-16 h-20 rounded-xl overflow-hidden bg-slate-900 border border-slate-200 shadow-sm">
                                    <img src="{{ \Illuminate\Support\Str::startsWith($item->poster_image, 'http') ? $item->poster_image : asset($item->poster_image) }}" class="w-full h-full object-cover">
                                </div>
                            @else
                                <div class="w-16 h-20 rounded-xl bg-slate-100 border border-slate-200 flex items-center justify-center text-slate-400">
                                    <i class="fa-solid fa-trophy text-xl"></i>
                                </div>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="font-bold text-slate-900 text-sm">{{ $item->student_name }}</div>
                            <div class="text-xs text-slate-500">{{ $item->student_prodi ?? '-' }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-block px-3 py-1 rounded-full text-xs font-extrabold shadow-sm {{ $item->badge_color }}">
                                {{ $item->badge_title }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="font-bold text-slate-800 text-xs line-clamp-2">{{ $item->title }}</div>
                            <div class="text-[11px] text-slate-400 mt-0.5">{{ $item->event_name }}</div>
                        </td>
                        <td class="px-6 py-4">
                            @if($item->is_active)
                                <span class="px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-700 text-xs font-bold border border-emerald-200">Tampil</span>
                            @else
                                <span class="px-2.5 py-1 rounded-full bg-slate-100 text-slate-500 text-xs font-bold">Disembunyikan</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <a href="{{ route('admin.achievements.edit', $item->id) }}" class="text-blue-600 hover:text-blue-900 font-bold text-xs bg-blue-50 px-2.5 py-1.5 rounded-lg border border-blue-200">
                                Edit
                            </a>
                            <form action="{{ route('admin.achievements.destroy', $item->id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data prestasi ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900 font-bold text-xs bg-red-50 px-2.5 py-1.5 rounded-lg border border-red-200">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-12 text-center text-slate-400">
                            Belum ada data prestasi mahasiswa. Klik <strong>Tambah Prestasi Baru</strong> di atas.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
