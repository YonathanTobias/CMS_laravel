@extends('layouts.admin')

@section('page_title', 'Kelola Pengguna Administrator')

@section('content')

<div class="flex justify-between items-center mb-6">
    <div>
        <h2 class="font-heading font-bold text-xl text-slate-900 dark:text-white flex items-center gap-2">
            <i class="fa-solid fa-users text-blue-600 dark:text-sky-400"></i> Kelola Akun Administrator CMS
        </h2>
        <p class="text-xs text-slate-500 dark:text-slate-400">Tambah akun admin baru, ubah email, reset kata sandi, dan kelola hak akses pengelolaan situs.</p>
    </div>
    <a href="{{ route('admin.users.create') }}" class="bg-blue-700 hover:bg-blue-800 text-white font-bold px-4 py-2.5 rounded-xl text-xs shadow transition flex items-center gap-1.5 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-amber-400">
        <i class="fa-solid fa-user-plus"></i> Tambah Administrator Baru
    </a>
</div>

@if(session('error'))
    <div class="mb-4 p-4 bg-rose-50 dark:bg-rose-950/60 border border-rose-200 dark:border-rose-800 text-rose-800 dark:text-rose-300 text-xs font-bold rounded-xl flex items-center gap-2">
        <i class="fa-solid fa-triangle-exclamation text-rose-600 text-sm"></i> {{ session('error') }}
    </div>
@endif

<div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm overflow-hidden transition-colors">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse text-sm">
            <thead>
                <tr class="bg-slate-900 text-white border-b border-slate-800 text-xs uppercase font-bold">
                    <th class="py-4 px-6">Nama Pengguna</th>
                    <th class="py-4 px-6">Email Akses</th>
                    <th class="py-4 px-6">Tanggal Dibuat</th>
                    <th class="py-4 px-6 text-center">Status Akun</th>
                    <th class="py-4 px-6 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                @foreach($users as $user)
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition">
                        <td class="py-4 px-6 font-bold text-slate-900 dark:text-white flex items-center gap-3">
                            <div class="w-9 h-9 rounded-full bg-blue-700 text-white font-bold flex items-center justify-center text-xs shrink-0 shadow-sm">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </div>
                            <div>
                                <div class="font-bold text-slate-900 dark:text-white">{{ $user->name }}</div>
                                @if($user->id === auth()->id())
                                    <span class="text-[10px] font-bold text-emerald-600 dark:text-emerald-400">&bull; Akun Anda Saat Ini</span>
                                @endif
                            </div>
                        </td>
                        <td class="py-4 px-6 font-mono text-xs text-slate-600 dark:text-slate-300">{{ $user->email }}</td>
                        <td class="py-4 px-6 text-xs text-slate-500 dark:text-slate-400 font-medium">
                            {{ $user->created_at ? $user->created_at->format('d M Y, H:i') : '-' }}
                        </td>
                        <td class="py-4 px-6 text-center">
                            <span class="px-2.5 py-1 rounded bg-emerald-100 dark:bg-emerald-950/60 text-emerald-800 dark:text-emerald-300 text-xs font-bold border border-emerald-200 dark:border-emerald-800">
                                Administrator
                            </span>
                        </td>
                        <td class="py-4 px-6 text-center">
                            <div class="flex items-center justify-center gap-2">
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="p-1.5 text-slate-500 dark:text-slate-400 hover:text-amber-600 dark:hover:text-amber-400 rounded focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-amber-400" title="Edit Akun"><i class="fa-solid fa-pen-to-square"></i></a>
                                
                                @if($user->id !== auth()->id())
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus akun admin {{ $user->name }}?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-1.5 text-slate-500 dark:text-slate-400 hover:text-red-600 dark:hover:text-red-400 rounded focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-amber-400" title="Hapus Akun"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                @else
                                    <span class="p-1.5 text-slate-300 dark:text-slate-700 cursor-not-allowed" title="Tidak dapat menghapus akun sendiri"><i class="fa-solid fa-trash"></i></span>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
