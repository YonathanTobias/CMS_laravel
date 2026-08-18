@extends('layouts.admin')

@section('page_title', 'Edit Menu / Sub-menu')

@section('content')

<div class="mb-6 flex items-center justify-between">
    <div>
        <h2 class="font-heading font-bold text-xl text-slate-900">Edit Menu: {{ $menu->name }}</h2>
    </div>
    <a href="{{ route('admin.menus.index') }}" class="text-xs text-slate-600 font-bold hover:underline">&larr; Kembali ke Daftar Menu</a>
</div>

<form action="{{ route('admin.menus.update', $menu->id) }}" method="POST" class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm space-y-6 max-w-2xl">
    @csrf
    @method('PUT')

    <div>
        <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Tipe Menu (Parent / Sub-menu)</label>
        <select name="parent_id" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-semibold focus:outline-none focus:border-teal-500">
            <option value="">-- Menu Utama (Parent / Top Level) --</option>
            @foreach($parentMenus as $parent)
                <option value="{{ $parent->id }}" {{ $menu->parent_id == $parent->id ? 'selected' : '' }}>
                    &rdsh; Sub-menu dari: {{ $parent->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Label Menu (Nama Tampilan)</label>
        <input type="text" name="name" value="{{ old('name', $menu->name) }}" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-bold focus:outline-none focus:border-teal-500">
    </div>

    <div>
        <label class="block text-xs font-bold uppercase text-slate-600 mb-1">URL / Link Target</label>
        <input type="text" name="url" value="{{ old('url', $menu->url) }}" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-mono focus:outline-none focus:border-teal-500">
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <div>
            <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Urutan (Order)</label>
            <input type="number" name="order" value="{{ old('order', $menu->order) }}" min="0" class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm font-bold focus:outline-none focus:border-teal-500">
        </div>
        <div>
            <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Target Buka Link</label>
            <select name="target" class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm font-semibold focus:outline-none focus:border-teal-500">
                <option value="_self" {{ $menu->target === '_self' ? 'selected' : '' }}>Halaman Sama (_self)</option>
                <option value="_blank" {{ $menu->target === '_blank' ? 'selected' : '' }}>Tab Baru (_blank)</option>
            </select>
        </div>
        <div>
            <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Icon FontAwesome</label>
            <input type="text" name="icon" value="{{ old('icon', $menu->icon) }}" class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-teal-500">
        </div>
    </div>

    <div class="flex items-center gap-2 pt-2">
        <input type="checkbox" name="is_active" id="is_active" value="1" {{ $menu->is_active ? 'checked' : '' }} class="rounded text-teal-600">
        <label for="is_active" class="text-sm font-bold text-slate-700">Tampilkan Menu di Website Utama</label>
    </div>

    <button type="submit" class="bg-teal-600 hover:bg-teal-700 text-white font-bold px-6 py-3 rounded-xl shadow transition">
        Simpan Perubahan &rarr;
    </button>
</form>

@endsection
