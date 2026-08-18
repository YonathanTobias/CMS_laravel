@extends('layouts.public')

@section('title', 'Fasilitas & Laboratorium - STIKes Panti Waluya Malang')

@section('content')
<div class="bg-blue-950 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4">
        <h1 class="font-heading font-extrabold text-3xl sm:text-4xl">Fasilitas & Sarana Prasarana Kampus</h1>
        <p class="text-slate-300 text-sm sm:text-base max-w-2xl mx-auto">Laboratorium praktikum klinis, laboratorium komputasi digital, perpustakaan, dan area sarana pendukung pembelajaran.</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($facilities as $fac)
            <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm hover:shadow-xl transition duration-300 p-8 space-y-4">
                <div class="w-14 h-14 rounded-2xl bg-blue-50 border border-blue-200 text-blue-700 flex items-center justify-center text-2xl mb-2">
                    <i class="fa-solid fa-microscope"></i>
                </div>
                <span class="inline-block px-3 py-1 bg-slate-100 text-slate-700 font-bold text-xs rounded-md">{{ $fac->category }}</span>
                <h3 class="font-heading font-bold text-xl text-slate-900">{{ $fac->name }}</h3>
                <p class="text-slate-600 text-sm leading-relaxed">{{ $fac->description }}</p>
            </div>
        @endforeach
    </div>
</div>
@endsection
