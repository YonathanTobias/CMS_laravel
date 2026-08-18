<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $rootMenus = Menu::whereNull('parent_id')->orderBy('order', 'asc')->with('allChildren')->get();
        return view('admin.menus.index', compact('rootMenus'));
    }

    public function create()
    {
        $parentMenus = Menu::whereNull('parent_id')->orderBy('order', 'asc')->get();
        return view('admin.menus.create', compact('parentMenus'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:menus,id',
            'order' => 'nullable|integer',
            'target' => 'required|in:_self,_blank',
            'icon' => 'nullable|string',
        ]);

        $validated['order'] = $request->input('order', 0);
        $validated['is_active'] = $request->has('is_active');

        Menu::create($validated);

        return redirect()->route('admin.menus.index')->with('success', 'Menu / Sub-menu berhasil ditambahkan!');
    }

    public function edit(Menu $menu)
    {
        $parentMenus = Menu::whereNull('parent_id')->where('id', '!=', $menu->id)->orderBy('order', 'asc')->get();
        return view('admin.menus.edit', compact('menu', 'parentMenus'));
    }

    public function update(Request $request, Menu $menu)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:menus,id',
            'order' => 'nullable|integer',
            'target' => 'required|in:_self,_blank',
            'icon' => 'nullable|string',
        ]);

        $validated['order'] = $request->input('order', 0);
        $validated['is_active'] = $request->has('is_active');

        // Prevent setting self as parent
        if ($request->parent_id == $menu->id) {
            $validated['parent_id'] = null;
        }

        $menu->update($validated);

        return redirect()->route('admin.menus.index')->with('success', 'Menu / Sub-menu berhasil diperbarui!');
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('admin.menus.index')->with('success', 'Menu beserta sub-menu didalamnya berhasil dihapus!');
    }
}
