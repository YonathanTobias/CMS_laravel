@extends('layouts.admin')

@section('page_title', 'Kelola Banner Carousel')

@section('content')

<div x-data="{ 
    showModal: false, 
    modalImg: '', 
    modalTitle: '',
    modalBadge: '',
    openPreview(image, title, badge) {
        this.modalImg = image;
        this.modalTitle = title || 'Full Banner Tanpa Judul';
        this.modalBadge = badge || 'Banner Carousel';
        this.showModal = true;
    }
}" class="space-y-6">

    <!-- Header Section -->
    <div class="flex justify-between items-center">
        <div>
            <h2 class="font-heading font-bold text-xl text-slate-900 dark:text-white">Kelola Banner Carousel Beranda</h2>
            <p class="text-xs text-slate-500 dark:text-slate-400">Tambah, edit judul, ubah gambar banner, dan preview tampilan slide di halaman utama.</p>
        </div>
        <a href="{{ route('admin.slides.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold px-4 py-2.5 rounded-xl text-xs shadow transition flex items-center gap-1.5">
            <i class="fa-solid fa-plus"></i> Tambah Slide Banner
        </a>
    </div>

    <!-- Table List Slide Banner -->
    <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-sm">
                <thead>
                    <tr class="bg-slate-900 text-white border-b border-slate-800 text-xs uppercase font-bold">
                        <th class="py-4 px-6">Gambar Slide Banner</th>
                        <th class="py-4 px-6">Judul Banner</th>
                        <th class="py-4 px-6">Badge Label</th>
                        <th class="py-4 px-6 text-center">Urutan</th>
                        <th class="py-4 px-6">Status</th>
                        <th class="py-4 px-6 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                    @forelse( as )
                        @php
                             = \Illuminate\Support\Str::startsWith(->image, 'http') ? ->image : asset(->image);
                        @endphp
                        <tr class="hover:bg-slate-50/80 dark:hover:bg-slate-800/50 transition">
                            <!-- Column 1: Gambar Slide + Hover Preview Button -->
                            <td class="py-4 px-6">
                                <div @click="openPreview(@js(), @js(->title), @js(->badge))" 
                                     class="group relative w-32 h-16 rounded-xl overflow-hidden border border-slate-200 dark:border-slate-700 shadow-sm bg-slate-900 cursor-pointer" 
                                     title="Klik untuk lihat gambar full">
                                    <img src="{{  }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                                    <div class="absolute inset-0 bg-slate-950/70 opacity-0 group-hover:opacity-100 transition duration-200 flex flex-col items-center justify-center text-white text-xs font-bold gap-1">
                                        <i class="fa-solid fa-eye text-amber-400 text-sm"></i>
                                        <span class="text-[10px] tracking-wide">Lihat Gambar</span>
                                    </div>
                                </div>
                            </td>

                            <!-- Column 2: Judul -->
                            <td class="py-4 px-6 font-bold text-slate-900 dark:text-white">
                                @if(->title)
                                    <div>{{ ->title }}</div>
                                @else
                                    <div class="text-slate-400 italic text-xs font-normal">(Full Banner Tanpa Teks)</div>
                                @endif
                                @if(->subtitle)
                                    <div class="text-xs text-slate-400 font-normal line-clamp-1 mt-0.5">{{ ->subtitle }}</div>
                                @endif
                            </td>

                            <!-- Column 3: Badge -->
                            <td class="py-4 px-6">
                                @if(->badge)
                                    <span class="px-2.5 py-1 rounded text-xs font-bold {{ ->badge_color }}">{{ ->badge }}</span>
                                @else
                                    <span class="text-slate-400 text-xs">-</span>
                                @endif
                            </td>

                            <!-- Column 4: Urutan -->
                            <td class="py-4 px-6 text-center font-extrabold text-slate-800 dark:text-slate-200">{{ ->order }}</td>

                            <!-- Column 5: Status -->
                            <td class="py-4 px-6">
                                @if(->is_active)
                                    <span class="px-2.5 py-1 rounded bg-emerald-100 dark:bg-emerald-950/60 text-emerald-800 dark:text-emerald-300 text-xs font-bold">Aktif</span>
                                @else
                                    <span class="px-2.5 py-1 rounded bg-slate-200 dark:bg-slate-800 text-slate-600 dark:text-slate-400 text-xs font-bold">Nonaktif</span>
                                @endif
                            </td>

                            <!-- Column 6: Aksi -->
                            <td class="py-4 px-6 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <!-- Tombol Lihat Gambar Modal -->
                                    <button type="button" 
                                            @click="openPreview(@js(), @js(->title), @js(->badge))" 
                                            class="px-2.5 py-1.5 bg-blue-50 dark:bg-blue-950/60 text-blue-700 dark:text-sky-300 hover:bg-blue-100 rounded-lg font-bold text-xs transition flex items-center gap-1 border border-blue-200 dark:border-blue-800" 
                                            title="Lihat Gambar Banner Utuh">
                                        <i class="fa-solid fa-eye text-blue-600"></i>
                                        <span>Lihat</span>
                                    </button>

                                    <!-- Tombol Edit -->
                                    <a href="{{ route('admin.slides.edit', ->id) }}" class="p-1.5 text-slate-500 hover:text-amber-600 dark:text-slate-400 dark:hover:text-amber-400 transition" title="Edit Slide">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>

                                    <!-- Tombol Hapus -->
                                    <form action="{{ route('admin.slides.destroy', ->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus slide banner ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-1.5 text-slate-500 hover:text-red-600 dark:text-slate-400 dark:hover:text-red-400 transition" title="Hapus Slide">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
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

    <!-- Modal Preview Gambar Lightbox -->
    <div x-show="showModal" 
         x-cloak 
         @keydown.escape.window="showModal = false"
         class="fixed inset-0 z-50 flex items-center justify-center p-4 sm:p-6 select-none"
         style="display: none;">
        
        <!-- Backdrop Dark Overlay -->
        <div x-show="showModal" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             @click="showModal = false" 
             class="fixed inset-0 bg-slate-950/80 backdrop-blur-md"></div>

        <!-- Modal Box Body -->
        <div x-show="showModal" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-95"
             class="relative bg-slate-900 border border-slate-800 rounded-3xl shadow-2xl overflow-hidden max-w-4xl w-full z-10 space-y-0">
            
            <!-- Modal Header -->
            <div class="p-4 sm:px-6 bg-slate-900/90 border-b border-slate-800 flex items-center justify-between">
                <div class="flex items-center gap-3 overflow-hidden">
                    <span x-text="modalBadge || 'Banner Carousel'" class="px-2.5 py-0.5 rounded text-xs font-extrabold bg-blue-700 text-white shrink-0"></span>
                    <h3 x-text="modalTitle" class="font-bold text-sm sm:text-base text-white truncate"></h3>
                </div>
                
                <div class="flex items-center gap-2 shrink-0">
                    <a :href="modalImg" target="_blank" class="px-3 py-1.5 bg-slate-800 hover:bg-slate-700 text-slate-200 rounded-xl text-xs font-bold transition flex items-center gap-1.5">
                        <i class="fa-solid fa-arrow-up-right-from-square text-[10px]"></i> Buka Tab Baru
                    </a>
                    <button type="button" @click="showModal = false" class="p-2 text-slate-400 hover:text-white rounded-xl transition">
                        <i class="fa-solid fa-xmark text-lg"></i>
                    </button>
                </div>
            </div>

            <!-- Modal Image Content Body -->
            <div class="p-2 sm:p-4 bg-slate-950 flex items-center justify-center min-h-[300px] max-h-[75vh]">
                <img :src="modalImg" :alt="modalTitle" class="max-h-[70vh] w-auto max-w-full rounded-2xl object-contain shadow-xl">
            </div>

            <!-- Modal Footer -->
            <div class="p-3 bg-slate-900 border-t border-slate-800 flex justify-between items-center text-xs text-slate-400 px-6">
                <span>💡 Tekan <strong>Esc</strong> atau klik di luar kotak untuk menutup preview.</span>
                <button type="button" @click="showModal = false" class="bg-blue-600 hover:bg-blue-700 text-white font-bold px-4 py-1.5 rounded-xl transition">
                    Tutup Preview
                </button>
            </div>
        </div>
    </div>

</div>

@endsection