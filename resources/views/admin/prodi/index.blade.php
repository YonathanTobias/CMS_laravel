@extends('layouts.admin')

@section('page_title', 'Kelola Program Studi')

@section('content')

<div class="flex justify-between items-center mb-6">
    <div>
        <h2 class="font-heading font-bold text-xl text-slate-900 dark:text-white">Kelola Program Studi (Prodi)</h2>
        <p class="text-xs text-slate-500 dark:text-slate-400">Kelola jenjang, akreditasi, profil, dan deskripsi kurikulum prodi.</p>
    </div>
    <a href="{{ route('admin.prodi.create') }}" class="bg-teal-600 hover:bg-teal-700 text-white font-bold px-4 py-2.5 rounded-xl text-xs shadow transition flex items-center gap-1.5 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-emerald-500 focus-visible:ring-offset-2 dark:focus-visible:ring-offset-slate-900">
        <i class="fa-solid fa-plus"></i> Tambah Program Studi
    </a>
</div>

<div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm overflow-hidden transition-colors">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse text-sm">
            <thead>
                <tr class="bg-slate-900 text-white border-b border-slate-800 text-xs uppercase font-bold">
                    <th class="py-4 px-6">Nama Program Studi</th>
                    <th class="py-4 px-6">Jenjang</th>
                    <th class="py-4 px-6">Akreditasi</th>
                    <th class="py-4 px-6">Status</th>
                    <th class="py-4 px-6 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                @foreach($prodis as $prodi)
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition">
                        <td class="py-4 px-6 font-bold text-slate-900 dark:text-white flex items-center gap-3">
                            <div class="w-9 h-9 rounded-lg bg-teal-50 dark:bg-teal-950/60 border border-teal-200 dark:border-teal-800 text-teal-600 dark:text-teal-400 flex items-center justify-center shrink-0">
                                <i class="{{ \App\Helpers\IconHelper::format($prodi->icon, 'fa-solid fa-user-nurse') }}"></i>
                            </div>
                            <div>
                                <div>{{ $prodi->name }}</div>
                                <div class="text-xs text-slate-400 dark:text-slate-500 font-mono">/program-studi/{{ $prodi->slug }}</div>
                            </div>
                        </td>
                        <td class="py-4 px-6 font-bold text-slate-700 dark:text-slate-300">{{ $prodi->degree }}</td>
                        <td class="py-4 px-6">
                            <span class="px-2.5 py-1 rounded bg-emerald-100 dark:bg-emerald-950/60 text-emerald-800 dark:text-emerald-300 text-xs font-bold border border-emerald-200 dark:border-emerald-800">{{ $prodi->accreditation }}</span>
                        </td>
                        <td class="py-4 px-6">
                            @if($prodi->is_active)
                                <span class="px-2 py-0.5 rounded bg-emerald-50 dark:bg-emerald-950/60 text-emerald-700 dark:text-emerald-300 text-xs font-bold border border-emerald-200 dark:border-emerald-800">Aktif</span>
                            @else
                                <span class="px-2 py-0.5 rounded bg-slate-100 dark:bg-slate-800 text-slate-500 dark:text-slate-400 text-xs font-bold border border-slate-200 dark:border-slate-700">Nonaktif</span>
                            @endif
                        </td>
                        <td class="py-4 px-6 text-center">
                            <div class="flex items-center justify-center gap-2">
                                <a href="{{ route('prodi.show', $prodi->slug) }}" target="_blank" class="p-1.5 text-slate-500 dark:text-slate-400 hover:text-teal-600 dark:hover:text-teal-400 rounded focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-emerald-500"><i class="fa-solid fa-eye"></i></a>
                                <a href="{{ route('admin.prodi.edit', $prodi->id) }}" class="p-1.5 text-slate-500 dark:text-slate-400 hover:text-amber-600 dark:hover:text-amber-400 rounded focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-emerald-500"><i class="fa-solid fa-pen-to-square"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
