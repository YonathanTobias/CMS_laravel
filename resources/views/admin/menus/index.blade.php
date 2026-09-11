@extends('layouts.admin')

@section('page_title', 'Kelola Menu & Sub-menu')

@section('content')

<div class="flex justify-between items-center mb-6">
    <div>
        <h2 class="font-heading font-bold text-xl text-slate-900 dark:text-white">Kelola Navigation Menu & Sub-menu</h2>
        <p class="text-xs text-slate-500 dark:text-slate-400">Pengaturan menu navigasi utama dan dropdown sub-menu pada website.</p>
    </div>
    <a href="{{ route('admin.menus.create') }}" class="bg-teal-600 hover:bg-teal-700 text-white font-bold px-4 py-2.5 rounded-xl text-xs shadow transition flex items-center gap-1.5 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-emerald-500 focus-visible:ring-offset-2 dark:focus-visible:ring-offset-slate-900">
        <i class="fa-solid fa-plus"></i> Tambah Menu / Sub-menu
    </a>
</div>

<div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm overflow-hidden transition-colors">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse text-sm">
            <thead>
                <tr class="bg-slate-900 text-white border-b border-slate-800 text-xs uppercase font-bold">
                    <th class="py-4 px-6">Label Menu</th>
                    <th class="py-4 px-6">URL / Target Path</th>
                    <th class="py-4 px-6">Tipe Menu</th>
                    <th class="py-4 px-6 text-center">Urutan</th>
                    <th class="py-4 px-6">Status</th>
                    <th class="py-4 px-6 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                @forelse($rootMenus as $menu)
                    <!-- Parent Menu Row -->
                    <tr class="bg-slate-50 dark:bg-slate-800/80 font-bold hover:bg-slate-100/80 dark:hover:bg-slate-800 transition border-l-4 border-l-teal-600">
                        <td class="py-4 px-6 text-slate-900 dark:text-white">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-lg bg-teal-600 text-white flex items-center justify-center text-xs shrink-0">
                                    <i class="{{ \App\Helpers\IconHelper::format($menu->icon, 'fa-solid fa-bars') }}"></i>
                                </div>
                                <span class="text-base">{{ $menu->name }}</span>
                            </div>
                        </td>
                        <td class="py-4 px-6 text-slate-600 dark:text-slate-400 font-mono text-xs">{{ $menu->url }}</td>
                        <td class="py-4 px-6">
                            <span class="px-2.5 py-1 rounded bg-teal-100 dark:bg-teal-950/60 text-teal-800 dark:text-teal-300 text-xs font-bold border border-teal-200 dark:border-teal-800">Parent Menu</span>
                        </td>
                        <td class="py-4 px-6 text-center font-extrabold text-slate-800 dark:text-slate-200">{{ $menu->order }}</td>
                        <td class="py-4 px-6">
                            @if($menu->is_active)
                                <span class="px-2 py-0.5 rounded bg-emerald-100 dark:bg-emerald-950/60 text-emerald-800 dark:text-emerald-300 text-xs font-bold border border-emerald-200 dark:border-emerald-800">Aktif</span>
                            @else
                                <span class="px-2 py-0.5 rounded bg-slate-200 dark:bg-slate-800 text-slate-600 dark:text-slate-400 text-xs font-bold border border-slate-300 dark:border-slate-700">Nonaktif</span>
                            @endif
                        </td>
                        <td class="py-4 px-6 text-center">
                            <div class="flex items-center justify-center gap-2">
                                <a href="{{ route('admin.menus.create', ['parent_id' => $menu->id]) }}" title="Tambah Sub-menu" class="p-1.5 text-teal-600 dark:text-teal-400 hover:text-teal-800 dark:hover:text-teal-300 font-bold text-xs bg-teal-50 dark:bg-teal-950/60 rounded-lg px-2 border border-teal-200 dark:border-teal-800 flex items-center gap-1 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-emerald-500">
                                    <i class="fa-solid fa-plus text-[10px]"></i> Sub-menu
                                </a>
                                <a href="{{ route('admin.menus.edit', $menu->id) }}" class="p-1.5 text-slate-500 dark:text-slate-400 hover:text-amber-600 dark:hover:text-amber-400 rounded focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-emerald-500"><i class="fa-solid fa-pen-to-square"></i></a>
                                <form action="{{ route('admin.menus.destroy', $menu->id) }}" method="POST" onsubmit="return confirm('Hapus menu ini beserta seluruh sub-menunya?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-1.5 text-slate-500 dark:text-slate-400 hover:text-red-600 dark:hover:text-red-400 rounded focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-emerald-500"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>

                    <!-- Nested Children Sub-menus -->
                    @foreach($menu->allChildren as $child)
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition">
                            <td class="py-3 px-6 pl-14 text-slate-800 dark:text-slate-200 font-medium">
                                <div class="flex items-center gap-2">
                                    <span class="text-slate-400 dark:text-slate-500 font-bold">&rdsh;</span>
                                    @if($child->icon)
                                        <i class="{{ \App\Helpers\IconHelper::format($child->icon) }} text-xs text-teal-600 dark:text-teal-400"></i>
                                    @endif
                                    <span>{{ $child->name }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-slate-500 dark:text-slate-400 font-mono text-xs">{{ $child->url }}</td>
                            <td class="py-3 px-6">
                                <span class="px-2 py-0.5 rounded bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 text-xs font-semibold border border-slate-200 dark:border-slate-700">Sub-menu</span>
                            </td>
                            <td class="py-3 px-6 text-center font-bold text-slate-600 dark:text-slate-400">{{ $child->order }}</td>
                            <td class="py-3 px-6">
                                @if($child->is_active)
                                    <span class="px-2 py-0.5 rounded bg-emerald-50 dark:bg-emerald-950/60 text-emerald-700 dark:text-emerald-300 text-xs font-bold border border-emerald-200 dark:border-emerald-800">Aktif</span>
                                @else
                                    <span class="px-2 py-0.5 rounded bg-slate-100 dark:bg-slate-800 text-slate-500 dark:text-slate-400 text-xs font-bold border border-slate-200 dark:border-slate-700">Nonaktif</span>
                                @endif
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('admin.menus.edit', $child->id) }}" class="p-1.5 text-slate-500 dark:text-slate-400 hover:text-amber-600 dark:hover:text-amber-400 rounded focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-emerald-500"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <form action="{{ route('admin.menus.destroy', $child->id) }}" method="POST" onsubmit="return confirm('Hapus sub-menu ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-1.5 text-slate-500 dark:text-slate-400 hover:text-red-600 dark:hover:text-red-400 rounded focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-emerald-500"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @empty
                    <tr>
                        <td colspan="6" class="py-8 text-center text-slate-400 dark:text-slate-500">Belum ada menu yang dikonfigurasi.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
