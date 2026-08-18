@extends('layouts.public')

@section('title', 'Dokumen SPMI & Akreditasi - STIKes Panti Waluya Malang')

@section('content')
<div class="bg-blue-950 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4">
        <h1 class="font-heading font-extrabold text-3xl sm:text-4xl">Sistem Penjaminan Mutu Internal (SPMI)</h1>
        <p class="text-slate-300 text-sm sm:text-base max-w-2xl mx-auto">Repositori dokumen resmi penjaminan mutu, SOP, manual mutu, dan sertifikat akreditasi kampus.</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Filter -->
    <form action="{{ route('spmi.index') }}" method="GET" class="bg-white rounded-2xl p-4 border border-slate-200 shadow-sm mb-8 flex flex-col md:flex-row gap-4 justify-between items-center">
        <div class="flex items-center gap-2 overflow-x-auto w-full md:w-auto pb-2 md:pb-0">
            <a href="{{ route('spmi.index') }}" class="px-4 py-2 rounded-xl text-xs font-bold whitespace-nowrap {{ !request('category') ? 'bg-blue-700 text-white' : 'bg-slate-100 text-slate-700 hover:bg-slate-200' }}">
                Semua Dokumen
            </a>
            @foreach($categories as $cat)
                <a href="{{ route('spmi.index', ['category' => $cat]) }}" class="px-4 py-2 rounded-xl text-xs font-bold whitespace-nowrap {{ request('category') === $cat ? 'bg-blue-700 text-white' : 'bg-slate-100 text-slate-700 hover:bg-slate-200' }}">
                    {{ $cat }}
                </a>
            @endforeach
        </div>

        <div class="relative w-full md:w-72">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nomor/judul dokumen..." class="w-full pl-10 pr-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-blue-500">
            <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-3 text-slate-400 text-xs"></i>
        </div>
    </form>

    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-sm">
                <thead>
                    <tr class="bg-blue-950 text-white border-b border-blue-900">
                        <th class="py-4 px-6 font-bold">Judul Dokumen</th>
                        <th class="py-4 px-6 font-bold">Nomor Dokumen</th>
                        <th class="py-4 px-6 font-bold">Kategori</th>
                        <th class="py-4 px-6 font-bold">Tahun</th>
                        <th class="py-4 px-6 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($documents as $doc)
                        <tr class="hover:bg-slate-50 transition">
                            <td class="py-4 px-6 font-semibold text-slate-900">
                                <div class="flex items-center gap-3">
                                    <i class="fa-solid fa-file-pdf text-red-500 text-xl"></i>
                                    <span>{{ $doc->title }}</span>
                                </div>
                            </td>
                            <td class="py-4 px-6 text-slate-600 font-mono text-xs">{{ $doc->document_number ?? '-' }}</td>
                            <td class="py-4 px-6">
                                <span class="px-2.5 py-1 rounded bg-blue-50 text-blue-800 border border-blue-200 text-xs font-bold">{{ $doc->category }}</span>
                            </td>
                            <td class="py-4 px-6 text-slate-600 font-bold">{{ $doc->year }}</td>
                            <td class="py-4 px-6 text-center">
                                <a href="{{ $doc->file_path ?? '#' }}" download class="inline-flex items-center gap-1.5 px-3.5 py-1.5 bg-blue-700 hover:bg-blue-800 text-white font-bold rounded-lg text-xs transition">
                                    <i class="fa-solid fa-download"></i> Unduh PDF
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-8 text-center text-slate-500">Tidak ada dokumen SPMI yang ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
