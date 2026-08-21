@extends('layouts.admin')

@section('page_title', 'Kelola Widget Statistik Beranda')

@section('content')

<div class="flex justify-between items-center mb-6">
    <div>
        <h2 class="font-heading font-bold text-xl text-slate-900">Kelola Widget Statistik (Counter Bar)</h2>
        <p class="text-xs text-slate-500">Edit angka pencapaian kampus, jumlah prodi, alumni, mitra kerja, atau status akreditasi di beranda publik.</p>
    </div>
    <a href="{{ route('admin.stats.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold px-4 py-2.5 rounded-xl text-xs shadow transition flex items-center gap-1.5">
        <i class="fa-solid fa-plus"></i> Tambah Angka Statistik
    </a>
</div>

<div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse text-sm">
            <thead>
                <tr class="bg-slate-900 text-white border-b border-slate-800 text-xs uppercase font-bold">
                    <th class="py-4 px-6">Angka / Nilai</th>
                    <th class="py-4 px-6">Keterangan Label</th>
                    <th class="py-4 px-6 text-center">Warna Teks</th>
                    <th class="py-4 px-6 text-center">Urutan</th>
                    <th class="py-4 px-6">Status</th>
                    <th class="py-4 px-6 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($stats as $st)
                    <tr class="hover:bg-slate-50 transition">
                        <td class="py-4 px-6 font-extrabold text-2xl tracking-tight {{ $st->color }}">
                            {{ $st->value }}
                        </td>
                        <td class="py-4 px-6 font-bold text-slate-800">
                            {{ $st->label }}
                        </td>
                        <td class="py-4 px-6 text-center font-mono text-xs">
                            <span class="px-2.5 py-1 rounded bg-slate-100 font-bold {{ $st->color }}">{{ $st->color }}</span>
                        </td>
                        <td class="py-4 px-6 text-center font-extrabold text-slate-800">{{ $st->order }}</td>
                        <td class="py-4 px-6">
                            @if($st->is_active)
                                <span class="px-2.5 py-1 rounded bg-emerald-100 text-emerald-800 text-xs font-bold">Aktif</span>
                            @else
                                <span class="px-2.5 py-1 rounded bg-slate-200 text-slate-600 text-xs font-bold">Nonaktif</span>
                            @endif
                        </td>
                        <td class="py-4 px-6 text-center">
                            <div class="flex items-center justify-center gap-2">
                                <a href="{{ route('admin.stats.edit', $st->id) }}" class="p-1.5 text-slate-500 hover:text-amber-600" title="Edit Stat"><i class="fa-solid fa-pen-to-square"></i></a>
                                <form action="{{ route('admin.stats.destroy', $st->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus angka statistik ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-1.5 text-slate-500 hover:text-red-600" title="Hapus Stat"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="py-8 text-center text-slate-400">Belum ada data statistik beranda.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
