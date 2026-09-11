@extends('layouts.public')

@section('title', 'Fasilitas & Laboratorium - STIKes Panti Waluya Malang')

@section('content')
<div class="bg-blue-950 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4">
        <h1 class="font-heading font-extrabold text-3xl sm:text-4xl">Fasilitas & Sarana Prasarana Kampus</h1>
        <p class="text-slate-300 text-sm sm:text-base max-w-2xl mx-auto">Laboratorium praktikum klinis, laboratorium komputasi digital, perpustakaan, dan area sarana pendukung pembelajaran.</p>
    </div>
</div>

<div class="bg-slate-50 dark:bg-slate-950 py-16 transition-colors duration-200" x-data="{ activeModalImg: null, activeModalTitle: '' }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($facilities as $fac)
                @php
                    $facilityImgUrl = $fac->image ? (\Illuminate\Support\Str::startsWith($fac->image, 'http') ? $fac->image : asset($fac->image)) : null;
                @endphp
                <div class="bg-white dark:bg-slate-900 rounded-3xl border border-slate-200/90 dark:border-slate-800 overflow-hidden shadow-sm hover:shadow-xl transition duration-300 flex flex-col justify-between group">
                    <div>
                        <!-- Facility Photo Cover -->
                        <div class="relative h-48 bg-slate-950 overflow-hidden cursor-pointer" @click="activeModalImg = '{{ $facilityImgUrl }}'; activeModalTitle = '{{ $fac->name }}'">
                            @if($facilityImgUrl)
                                <img src="{{ $facilityImgUrl }}" alt="{{ $fac->name }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                                <div class="absolute inset-0 bg-slate-950/30 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center">
                                    <span class="bg-white dark:bg-slate-900 text-slate-900 dark:text-white text-xs font-bold px-3.5 py-1.5 rounded-xl shadow-lg border border-slate-200 dark:border-slate-700 flex items-center gap-1.5">
                                        <i class="fa-solid fa-magnifying-glass-plus text-amber-500"></i> Lihat Foto Utuh
                                    </span>
                                </div>
                            @else
                                <div class="w-full h-full bg-gradient-to-tr from-blue-950 to-blue-800 flex items-center justify-center text-sky-400">
                                    <i class="fa-solid fa-microscope text-5xl opacity-70"></i>
                                </div>
                            @endif
                            <span class="absolute top-3 left-3 bg-blue-950/90 backdrop-blur-md text-sky-300 text-[11px] font-bold px-3 py-1 rounded-full border border-blue-800 shadow">
                                {{ $fac->category }}
                            </span>
                        </div>

                        <div class="p-6 space-y-3">
                            <h3 class="font-heading font-bold text-xl text-slate-900 dark:text-white group-hover:text-blue-700 dark:group-hover:text-sky-400 transition leading-snug">
                                {{ $fac->name }}
                            </h3>
                            <p class="text-slate-600 dark:text-slate-300 text-xs sm:text-sm leading-relaxed">
                                {{ $fac->description }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Lightbox Zoom Modal for Facility Photos -->
        <div x-show="activeModalImg" x-transition class="fixed inset-0 z-50 bg-slate-950/90 backdrop-blur-md p-4 flex items-center justify-center" @click.self="activeModalImg = null" style="display: none;">
            <div class="relative max-w-4xl w-full">
                <div class="absolute -top-10 left-0 text-white text-sm font-bold truncate max-w-lg" x-text="activeModalTitle"></div>
                <button @click="activeModalImg = null" class="absolute -top-12 right-0 text-white text-3xl font-bold hover:text-amber-400">&times;</button>
                <img :src="activeModalImg" :alt="activeModalTitle" class="max-h-[85vh] w-auto mx-auto rounded-2xl shadow-2xl border border-slate-700">
            </div>
        </div>

    </div>
</div>
@endsection
