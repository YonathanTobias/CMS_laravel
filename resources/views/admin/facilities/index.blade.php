@extends('layouts.admin')

@section('page_title', 'Kelola Fasilitas Kampus')

@section('content')

<div class="flex justify-between items-center mb-6">
    <div>
        <h2 class="font-heading font-bold text-xl text-slate-900">Kelola Fasilitas Kampus & Laboratorium</h2>
        <p class="text-xs text-slate-500">Kelola galeri prasarana praktikum medis, laboratorium CBT, dan perpustakaan digital.</p>
    </div>
    <a href="{{ route('admin.facilities.create') }}" class="bg-teal-600 hover:bg-teal-700 text-white font-bold px-4 py-2.5 rounded-xl text-xs shadow transition flex items-center gap-1.5">
        <i class="fa-solid fa-plus"></i> Tambah Fasilitas
    </a>
</div>

<div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse text-sm">
            <thead>
                <tr class="bg-slate-900 text-white border-b border-slate-800 text-xs uppercase font-bold">
                    <th class="py-4 px-6">Nama Fasilitas</th>
                    <th class="py-4 px-6">Kategori</th>
                    <th class="py-4 px-6">Tampil di Beranda</th>
                    <th class="py-4 px-6 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @foreach($facilities as $fac)
                    <tr class="hover:bg-slate-50 transition">
                        <td class="py-4 px-6 font-bold text-slate-900">{{ $fac->name }}</td>
                        <td class="py-4 px-6">
                            <span class="px-2.5 py-1 rounded bg-slate-100 text-slate-700 text-xs font-bold">{{ $fac->category }}</span>
                        </td>
                        <td class="py-4 px-6">
                            @if($fac->is_featured)
                                <span class="px-2 py-0.5 rounded bg-emerald-100 text-emerald-800 text-xs font-bold">Ya</span>
                            @else
                                <span class="px-2 py-0.5 rounded bg-slate-100 text-slate-500 text-xs font-bold">Tidak</span>
                            @endif
                        </td>
                        <td class="py-4 px-6 text-center">
                            <div class="flex items-center justify-center gap-2">
                                <a href="{{ route('admin.facilities.edit', $fac->id) }}" class="p-1.5 text-slate-500 hover:text-amber-600"><i class="fa-solid fa-pen-to-square"></i></a>
                                <form action="{{ route('admin.facilities.destroy', $fac->id) }}" method="POST" onsubmit="return confirm('Hapus fasilitas ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-1.5 text-slate-500 hover:text-red-600"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
