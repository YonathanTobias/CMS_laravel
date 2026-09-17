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
                                <span class="px-3 py-1 rounded-md bg-slate-900 text-white text-xs font-bold">{{ $prodi->degree }}</span>
                                <span class="px-3 py-1 rounded-md bg-emerald-50 dark:bg-emerald-950/60 text-emerald-800 dark:text-emerald-300 border border-emerald-200 dark:border-emerald-800 text-xs font-bold">Akred: {{ $prodi->accreditation }}</span>
                            </div>
                        </div>

                        <h2 class="font-heading font-bold text-2xl text-slate-900 dark:text-white mb-3 group-hover:text-blue-700 dark:group-hover:text-sky-400 transition">{{ $prodi->name }}</h2>
                        <p class="text-slate-600 dark:text-slate-300 text-sm leading-relaxed mb-4">{{ $prodi->description }}</p>

                        <!-- Tampilan Sertifikat Resmi (Akreditasi & RPL) -->
                        @if($prodi->accreditation_certificate || $prodi->rpl_certificate)
                            <div class="mt-4 mb-3 space-y-3">
                                @if($prodi->accreditation_certificate)
                                    @php
                                        $certUrl = \Illuminate\Support\Str::startsWith($prodi->accreditation_certificate, 'http') ? $prodi->accreditation_certificate : asset($prodi->accreditation_certificate);
                                        $isPdf = \Illuminate\Support\Str::endsWith(strtolower($certUrl), '.pdf');
                                    @endphp
                                    <div class="p-3.5 bg-slate-50 dark:bg-slate-800/80 rounded-2xl border border-slate-200/90 dark:border-slate-700 space-y-2">
                                        <div class="text-[11px] font-extrabold uppercase text-slate-600 dark:text-slate-300 flex items-center justify-between">
                                            <span class="flex items-center gap-1.5"><i class="fa-solid fa-award text-amber-500"></i> Sertifikat Akreditasi</span>
                                            <a href="{{ $certUrl }}" download target="_blank" class="text-emerald-700 dark:text-emerald-400 hover:underline font-bold text-[10px]"><i class="fa-solid fa-download"></i> Unduh File</a>
                                        </div>

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

                                @if($prodi->rpl_certificate)
                                    @php
                                        $rplCertUrl = \Illuminate\Support\Str::startsWith($prodi->rpl_certificate, 'http') ? $prodi->rpl_certificate : asset($prodi->rpl_certificate);
                                        $isRplPdf = \Illuminate\Support\Str::endsWith(strtolower($rplCertUrl), '.pdf');
                                    @endphp
                                    <div class="p-3.5 bg-slate-50 dark:bg-slate-800/80 rounded-2xl border border-slate-200/90 dark:border-slate-700 space-y-2">
                                        <div class="text-[11px] font-extrabold uppercase text-slate-600 dark:text-slate-300 flex items-center justify-between">
                                            <span class="flex items-center gap-1.5"><i class="fa-solid fa-certificate text-teal-500"></i> Sertifikat Kelayakan RPL</span>
                                            <a href="{{ $rplCertUrl }}" download target="_blank" class="text-teal-700 dark:text-teal-400 hover:underline font-bold text-[10px]"><i class="fa-solid fa-download"></i> Unduh File</a>
                                        </div>

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
