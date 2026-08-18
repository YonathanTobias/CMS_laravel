@extends('layouts.public')

@section('title', $page->title . ' - STIKes Panti Waluya Malang')

@section('content')
<div class="bg-blue-950 text-white py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-3 text-center">
        <div class="inline-flex items-center justify-center w-14 h-14 rounded-2xl bg-blue-600/30 text-sky-300 border border-blue-500/40 mb-2">
            <i class="fa-solid {{ $page->icon ?? 'fa-building-columns' }} text-2xl"></i>
        </div>
        <h1 class="font-heading font-extrabold text-3xl sm:text-4xl">{{ $page->title }}</h1>
        <p class="text-slate-300 text-xs sm:text-sm">STIKes Panti Waluya Malang</p>
    </div>
</div>

<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="bg-white rounded-2xl p-8 sm:p-12 border border-slate-200 shadow-sm leading-relaxed space-y-6 text-slate-800">
        {!! $page->content !!}
    </div>
</div>
@endsection
