@extends('layouts.public')

@section('title', $prodi->name . ' - STIKes Panti Waluya Malang')

@section('content')
<div class="bg-blue-950 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center gap-3 text-sky-400 text-xs font-semibold uppercase tracking-wider mb-2">
            <a href="{{ route('prodi.index') }}" class="hover:underline">Program Studi</a>
            <span>&bull;</span>
            <span>{{ $prodi->degree }}</span>
        </div>
        <h1 class="font-heading font-extrabold text-3xl sm:text-5xl mb-4">{{ $prodi->name }}</h1>
        <div class="flex flex-wrap items-center gap-3 text-sm">
            <span class="px-3 py-1 bg-blue-600/30 text-sky-300 border border-blue-500/40 rounded-full font-bold">Akreditasi: {{ $prodi->accreditation }}</span>
            <span class="text-slate-300">STIKes Panti Waluya Malang</span>
        </div>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
        <div class="lg:col-span-8 space-y-10">
            <!-- Deskripsi Umum -->
            <div class="bg-white rounded-2xl p-8 border border-slate-200 shadow-sm space-y-4">
                <h2 class="font-heading font-bold text-2xl text-slate-900 border-b border-slate-100 pb-3">Profil & Gambaran Umum</h2>
                <p class="text-slate-700 leading-relaxed text-base">{!! nl2br(e($prodi->description)) !!}</p>
            </div>

            <!-- Tampilan Visual Sertifikat Akreditasi Resmi (Embedded Preview) -->
            @if($prodi->accreditation_certificate)
                @php
                    $certUrl = \Illuminate\Support\Str::startsWith($prodi->accreditation_certificate, 'http') ? $prodi->accreditation_certificate : asset($prodi->accreditation_certificate);
                    $isPdf = \Illuminate\Support\Str::endsWith(strtolower($certUrl), '.pdf');
                @endphp
                <div class="bg-white rounded-3xl p-8 border border-slate-200 shadow-sm space-y-6" x-data="{ modalOpen: false }">
                    <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                        <div>
                            <h2 class="font-heading font-bold text-2xl text-slate-900 flex items-center gap-2">
                                <i class="fa-solid fa-award text-amber-500"></i> Sertifikat Akreditasi Resmi
                            </h2>
                            <p class="text-xs text-slate-500 mt-1">Bukti fisik status akreditasi {{ $prodi->accreditation }} {{ $prodi->name }} {{ $prodi->degree }}.</p>
                        </div>
                        <a href="{{ $certUrl }}" target="_blank" download class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold px-4 py-2 rounded-xl text-xs shadow transition flex items-center gap-1.5 shrink-0">
                            <i class="fa-solid fa-download"></i> Unduh File
                        </a>
                    </div>

                    <!-- Visual Certificate Display -->
                    @if($isPdf)
                        <!-- PDF Embedded Viewer -->
                        <div class="w-full h-[500px] rounded-2xl overflow-hidden border border-slate-200 bg-slate-100 shadow-inner">
                            <iframe src="{{ $certUrl }}#toolbar=0" class="w-full h-full border-0"></iframe>
                        </div>
                    @else
                        <!-- Image Certificate Card with Lightbox Zoom -->
                        <div class="relative group rounded-2xl overflow-hidden border border-slate-200 bg-slate-900 max-h-[500px] flex items-center justify-center cursor-pointer shadow-lg" @click="modalOpen = true">
                            <img src="{{ $certUrl }}" alt="Sertifikat Akreditasi {{ $prodi->name }}" class="w-full h-full object-contain group-hover:scale-105 transition duration-300">
                            <div class="absolute inset-0 bg-slate-950/40 opacity-0 group-hover:opacity-100 transition flex items-center justify-center text-white">
                                <span class="bg-slate-950/80 backdrop-blur-md px-4 py-2 rounded-xl text-xs font-bold border border-white/20">
                                    <i class="fa-solid fa-magnifying-glass-plus mr-1.5 text-amber-400"></i> Klik untuk Memperbesar Sertifikat
                                </span>
                            </div>
                        </div>

                        <!-- Lightbox Modal Zoom -->
                        <div x-show="modalOpen" x-transition class="fixed inset-0 z-50 bg-slate-950/90 backdrop-blur-md p-4 flex items-center justify-center" @click.self="modalOpen = false">
                            <div class="relative max-w-5xl w-full">
                                <button @click="modalOpen = false" class="absolute -top-12 right-0 text-white text-3xl font-bold hover:text-amber-400">&times;</button>
                                <img src="{{ $certUrl }}" class="max-h-[85vh] w-auto mx-auto rounded-2xl shadow-2xl border border-slate-700">
                            </div>
                        </div>
                    @endif
                </div>
            @endif

            <!-- Ringkasan Kurikulum -->
            @if($prodi->curriculum_summary)
            <div class="bg-white rounded-2xl p-8 border border-slate-200 shadow-sm space-y-4">
                <h2 class="font-heading font-bold text-2xl text-slate-900 border-b border-slate-100 pb-3 flex items-center gap-2">
                    <i class="fa-solid fa-book-open text-blue-700"></i> Kurikulum & Beban Studi
                </h2>
                <p class="text-slate-700 leading-relaxed">{!! nl2br(e($prodi->curriculum_summary)) !!}</p>
            </div>
            @endif

            <!-- Prospek Lulusan -->
            @if($prodi->career_prospects)
            <div class="bg-white rounded-2xl p-8 border border-slate-200 shadow-sm space-y-4">
                <h2 class="font-heading font-bold text-2xl text-slate-900 border-b border-slate-100 pb-3 flex items-center gap-2">
                    <i class="fa-solid fa-briefcase text-blue-700"></i> Prospek Kerja & Lapangan Karir
                </h2>
                <p class="text-slate-700 leading-relaxed">{!! nl2br(e($prodi->career_prospects)) !!}</p>
            </div>
            @endif
        </div>

        <!-- Sidebar PMB & Other Prodi -->
        <div class="lg:col-span-4 space-y-8">
            <div class="bg-gradient-to-br from-blue-900 to-blue-950 text-white rounded-2xl p-8 shadow-xl space-y-6 border border-blue-800">
                <h3 class="font-heading font-bold text-xl">Daftar {{ $prodi->name }}</h3>
                <p class="text-xs text-slate-300">Dapatkan informasi pendaftaran, rincian biaya studi, dan penawaran beasiswa khusus.</p>
                <a href="{{ \App\Models\SiteSetting::get('pmb_link', '#') }}" target="_blank" class="block w-full text-center bg-amber-500 hover:bg-amber-600 text-slate-950 font-extrabold py-3.5 rounded-xl shadow-lg transition">
                    Daftar PMB Online &rarr;
                </a>
            </div>

            <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm space-y-4">
                <h3 class="font-heading font-bold text-lg text-slate-900 border-b border-slate-100 pb-2">Program Studi Lainnya</h3>
                <div class="space-y-3">
                    @foreach($otherProdis as $other)
                        <a href="{{ route('prodi.show', $other->slug) }}" class="block p-3 rounded-xl border border-slate-100 hover:bg-blue-50 hover:border-blue-200 transition">
                            <div class="font-bold text-sm text-slate-800">{{ $other->name }}</div>
                            <div class="text-xs text-slate-500">{{ $other->degree }} &bull; Akreditasi {{ $other->accreditation }}</div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
