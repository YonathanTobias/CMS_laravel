@extends('layouts.public')

@section('title', 'Program Studi - STIKes Panti Waluya Malang')

@section('content')
<div class="bg-blue-950 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4">
        <h1 class="font-heading font-extrabold text-3xl sm:text-4xl">Program Studi & Jenjang Pendidikan</h1>
        <p class="text-slate-300 text-sm sm:text-base max-w-2xl mx-auto">Pilih jalur pendidikan kesehatan berstandar unggul untuk mewujudkan karier profesional Anda.</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($prodis as $prodi)
            <div class="bg-white rounded-3xl border border-slate-200 shadow-sm hover:shadow-xl transition duration-300 p-8 flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between mb-6">
                        <div class="w-14 h-14 rounded-2xl bg-blue-50 border border-blue-200 text-blue-700 flex items-center justify-center text-2xl">
                            <i class="fa-solid {{ $prodi->icon ?? 'fa-user-nurse' }}"></i>
                        </div>
                        <div class="flex gap-2">
                            <span class="px-3 py-1 rounded-md bg-blue-950 text-white text-xs font-bold">{{ $prodi->degree }}</span>
                            <span class="px-3 py-1 rounded-md bg-emerald-50 text-emerald-800 border border-emerald-200 text-xs font-bold">Akred: {{ $prodi->accreditation }}</span>
                        </div>
                    </div>

                    <h2 class="font-heading font-bold text-2xl text-slate-900 mb-3">{{ $prodi->name }}</h2>
                    <p class="text-slate-600 text-sm leading-relaxed mb-4">{{ $prodi->description }}</p>

                    <!-- Tampilan Langsung Sertifikat Akreditasi Utuh FULL Tanpa Terpotong -->
                    @if($prodi->accreditation_certificate)
                        @php
                            $certUrl = \Illuminate\Support\Str::startsWith($prodi->accreditation_certificate, 'http') ? $prodi->accreditation_certificate : asset($prodi->accreditation_certificate);
                            $isPdf = \Illuminate\Support\Str::endsWith(strtolower($certUrl), '.pdf');
                        @endphp
                        <div class="mt-4 mb-3 p-3.5 bg-slate-50 rounded-2xl border border-slate-200/90 space-y-2">
                            <div class="text-[11px] font-extrabold uppercase text-slate-600 flex items-center justify-between">
                                <span class="flex items-center gap-1.5"><i class="fa-solid fa-award text-amber-500"></i> Sertifikat Akreditasi Resmi</span>
                                <a href="{{ $certUrl }}" download target="_blank" class="text-emerald-700 hover:underline font-bold text-[10px]"><i class="fa-solid fa-download"></i> Unduh File</a>
                            </div>

                            @if($isPdf)
                                <div class="w-full h-80 rounded-xl overflow-hidden border border-slate-200 bg-white shadow-inner">
                                    <iframe src="{{ $certUrl }}#toolbar=0" class="w-full h-full border-0"></iframe>
                                </div>
                            @else
                                <div class="w-full rounded-xl overflow-hidden border border-slate-200 bg-slate-900/5 p-1 flex items-center justify-center">
                                    <img src="{{ $certUrl }}" alt="Sertifikat Akreditasi {{ $prodi->name }}" class="w-full h-auto rounded-lg object-contain shadow-sm">
                                </div>
                            @endif
                        </div>
                    @endif
                </div>

                <div class="mt-4">
                    <a href="{{ route('prodi.show', $prodi->slug) }}" class="w-full text-center bg-blue-700 hover:bg-blue-800 text-white font-bold py-3 rounded-xl shadow transition block text-xs">
                        Lihat Kurikulum & Prospek Kerja &rarr;
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
