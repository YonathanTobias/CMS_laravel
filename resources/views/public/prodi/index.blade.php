@extends('layouts.public')

@section('title', 'Program Studi - STIKes Panti Waluya Malang')

@section('content')
<div class="bg-blue-950 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4">
        <h1 class="font-heading font-extrabold text-3xl sm:text-4xl">Program Studi & Jenjang Pendidikan</h1>
        <p class="text-slate-300 text-sm sm:text-base max-w-2xl mx-auto">Pilih jalur pendidikan kesehatan berstandar unggul untuk mewujudkan karier profesional Anda.</p>
    </div>
</div>

<div class="bg-slate-50 dark:bg-slate-950 py-16 transition-colors duration-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($prodis as $prodi)
                <div class="bg-white dark:bg-slate-900 rounded-3xl border border-slate-200/90 dark:border-slate-800 shadow-sm hover:shadow-xl transition duration-300 p-8 flex flex-col justify-between group">
                    <div>
                        <div class="flex items-center justify-between mb-6">
                            <div class="w-14 h-14 rounded-2xl bg-blue-50 dark:bg-blue-950 border border-blue-200 dark:border-blue-800 text-blue-700 dark:text-sky-400 flex items-center justify-center text-2xl">
                                <i class="{{ \App\Helpers\IconHelper::format($prodi->icon, 'fa-solid fa-user-nurse') }}"></i>
                            </div>
                            <div class="flex gap-2">
                                <span class="px-3 py-1 rounded-md bg-slate-900 dark:bg-slate-800 text-white dark:text-slate-200 border border-transparent dark:border-slate-700 text-xs font-bold">{{ $prodi->degree }}</span>
                                <span class="px-3 py-1 rounded-md bg-emerald-50 dark:bg-emerald-950/60 text-emerald-800 dark:text-emerald-300 border border-emerald-200 dark:border-emerald-800 text-xs font-bold">Akred: {{ $prodi->accreditation }}</span>
                            </div>
                        </div>

                        <h2 class="font-heading font-bold text-2xl text-slate-900 dark:text-white mb-3 group-hover:text-blue-700 dark:group-hover:text-sky-400 transition">{{ $prodi->name }}</h2>
                        <p class="text-slate-600 dark:text-slate-300 text-sm leading-relaxed mb-4">{{ $prodi->description }}</p>

                        <!-- Tampilan Tab / Slider Sertifikat Resmi (Akreditasi & RPL) -->
                        @if($prodi->accreditation_certificate || $prodi->rpl_certificate)
                            @php
                                $certUrl = $prodi->accreditation_certificate ? (\Illuminate\Support\Str::startsWith($prodi->accreditation_certificate, 'http') ? $prodi->accreditation_certificate : asset($prodi->accreditation_certificate)) : null;
                                $isPdf = $certUrl ? \Illuminate\Support\Str::endsWith(strtolower($certUrl), '.pdf') : false;

                                $rplCertUrl = $prodi->rpl_certificate ? (\Illuminate\Support\Str::startsWith($prodi->rpl_certificate, 'http') ? $prodi->rpl_certificate : asset($prodi->rpl_certificate)) : null;
                                $isRplPdf = $rplCertUrl ? \Illuminate\Support\Str::endsWith(strtolower($rplCertUrl), '.pdf') : false;
                            @endphp
                            <div class="mt-4 mb-3 p-3.5 bg-slate-50 dark:bg-slate-800/80 rounded-2xl border border-slate-200/90 dark:border-slate-700 space-y-3" x-data="{ certTab: '{{ $prodi->accreditation_certificate ? 'accreditation' : 'rpl' }}' }">
                                <!-- Header Slider/Tab Pills -->
                                <div class="flex items-center justify-between border-b border-slate-200/80 dark:border-slate-700 pb-2">
                                    <div class="flex items-center gap-1.5">
                                        @if($prodi->accreditation_certificate)
                                            <button type="button" @click="certTab = 'accreditation'" :class="certTab === 'accreditation' ? 'bg-amber-500 text-slate-950 font-bold shadow-sm' : 'bg-slate-200/70 dark:bg-slate-700 text-slate-700 dark:text-slate-200 hover:bg-slate-300 dark:hover:bg-slate-600'" class="px-2.5 py-1 rounded-xl text-[10px] uppercase tracking-wide transition flex items-center gap-1">
                                                <i class="fa-solid fa-award"></i> Akreditasi
                                            </button>
                                        @endif
                                        @if($prodi->rpl_certificate)
                                            <button type="button" @click="certTab = 'rpl'" :class="certTab === 'rpl' ? 'bg-teal-600 text-white font-bold shadow-sm' : 'bg-slate-200/70 dark:bg-slate-700 text-slate-700 dark:text-slate-200 hover:bg-slate-300 dark:hover:bg-slate-600'" class="px-2.5 py-1 rounded-xl text-[10px] uppercase tracking-wide transition flex items-center gap-1">
                                                <i class="fa-solid fa-certificate"></i> Kelayakan RPL
                                            </button>
                                        @endif
                                    </div>

                                    <!-- Action Download Switcher -->
                                    @if($prodi->accreditation_certificate)
                                        <a x-show="certTab === 'accreditation'" href="{{ $certUrl }}" download target="_blank" class="text-emerald-700 dark:text-emerald-400 hover:underline font-bold text-[10px] flex items-center gap-1">
                                            <i class="fa-solid fa-download"></i> Unduh
                                        </a>
                                    @endif
                                    @if($prodi->rpl_certificate)
                                        <a x-show="certTab === 'rpl'" href="{{ $rplCertUrl }}" download target="_blank" class="text-teal-700 dark:text-teal-400 hover:underline font-bold text-[10px] flex items-center gap-1">
                                            <i class="fa-solid fa-download"></i> Unduh RPL
                                        </a>
                                    @endif
                                </div>

                                <!-- Tab 1: Akreditasi -->
                                @if($prodi->accreditation_certificate)
                                    <div x-show="certTab === 'accreditation'" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100">
                                        @if($isPdf)
                                            <div class="w-full h-64 rounded-xl overflow-hidden border border-slate-200 dark:border-slate-700 bg-white shadow-inner">
                                                <iframe src="{{ $certUrl }}#toolbar=0" class="w-full h-full border-0"></iframe>
                                            </div>
                                        @else
                                            <div class="w-full rounded-xl overflow-hidden border border-slate-200 dark:border-slate-700 bg-slate-900/5 p-1 flex items-center justify-center">
                                                <img src="{{ $certUrl }}" alt="Sertifikat Akreditasi {{ $prodi->name }}" class="w-full h-auto rounded-lg object-contain shadow-sm max-h-64">
                                            </div>
                                        @endif
                                    </div>
                                @endif

                                <!-- Tab 2: Kelayakan RPL -->
                                @if($prodi->rpl_certificate)
                                    <div x-show="certTab === 'rpl'" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100">
                                        @if($isRplPdf)
                                            <div class="w-full h-64 rounded-xl overflow-hidden border border-slate-200 dark:border-slate-700 bg-white shadow-inner">
                                                <iframe src="{{ $rplCertUrl }}#toolbar=0" class="w-full h-full border-0"></iframe>
                                            </div>
                                        @else
                                            <div class="w-full rounded-xl overflow-hidden border border-slate-200 dark:border-slate-700 bg-slate-900/5 p-1 flex items-center justify-center">
                                                <img src="{{ $rplCertUrl }}" alt="Sertifikat Kelayakan RPL {{ $prodi->name }}" class="w-full h-auto rounded-lg object-contain shadow-sm max-h-64">
                                            </div>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        @endif
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('prodi.show', $prodi->slug) }}" class="w-full text-center bg-blue-700 hover:bg-blue-800 text-white font-bold py-3 rounded-xl shadow transition block text-xs focus-visible:ring-2 focus-visible:ring-amber-400 focus-visible:outline-none">
                            Lihat Kurikulum & Prospek Kerja &rarr;
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
