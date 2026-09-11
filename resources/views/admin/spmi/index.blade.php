@extends('layouts.admin')

@section('page_title', 'Kelola Dokumen SPMI')

@section('content')

<div class="flex justify-between items-center mb-6">
    <div>
        <h2 class="font-heading font-bold text-xl text-slate-900 dark:text-white">Kelola Dokumen SPMI & Akreditasi</h2>
        <p class="text-xs text-slate-500 dark:text-slate-400">Kelola berkas penjaminan mutu, SOP, manual mutu, dan sertifikat akreditasi.</p>
    </div>
    <a href="{{ route('admin.spmi.create') }}" class="bg-teal-600 hover:bg-teal-700 text-white font-bold px-4 py-2.5 rounded-xl text-xs shadow transition flex items-center gap-1.5 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-emerald-500 focus-visible:ring-offset-2 dark:focus-visible:ring-offset-slate-900">
        <i class="fa-solid fa-plus"></i> Tambah Dokumen SPMI
    </a>
</div>

<div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm overflow-hidden transition-colors">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse text-sm">
            <thead>
                <tr class="bg-slate-900 text-white border-b border-slate-800 text-xs uppercase font-bold">
                    <th class="py-4 px-6">Judul Dokumen</th>
                    <th class="py-4 px-6">Nomor Dokumen</th>
                    <th class="py-4 px-6">Kategori</th>
                    <th class="py-4 px-6">Tahun</th>
                    <th class="py-4 px-6 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                @foreach($documents as $doc)
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition">
                        <td class="py-4 px-6 font-bold text-slate-900 dark:text-white flex items-center gap-3">
                            <i class="fa-solid fa-file-pdf text-red-500 text-lg shrink-0"></i>
                            <span>{{ $doc->title }}</span>
                        </td>
                        <td class="py-4 px-6 font-mono text-xs text-slate-500 dark:text-slate-400">{{ $doc->document_number ?? '-' }}</td>
                        <td class="py-4 px-6">
                            <span class="px-2.5 py-1 rounded bg-teal-50 dark:bg-teal-950/60 text-teal-700 dark:text-teal-300 border border-teal-200 dark:border-teal-800 text-xs font-bold">{{ $doc->category }}</span>
                        </td>
                        <td class="py-4 px-6 font-bold text-slate-700 dark:text-slate-300">{{ $doc->year }}</td>
                        <td class="py-4 px-6 text-center">
                            <div class="flex items-center justify-center gap-2">
                                <a href="{{ route('admin.spmi.edit', $doc->id) }}" class="p-1.5 text-slate-500 dark:text-slate-400 hover:text-amber-600 dark:hover:text-amber-400 rounded focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-emerald-500"><i class="fa-solid fa-pen-to-square"></i></a>
                                <form action="{{ route('admin.spmi.destroy', $doc->id) }}" method="POST" onsubmit="return confirm('Hapus dokumen ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-1.5 text-slate-500 dark:text-slate-400 hover:text-red-600 dark:hover:text-red-400 rounded focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-emerald-500"><i class="fa-solid fa-trash"></i></button>
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
