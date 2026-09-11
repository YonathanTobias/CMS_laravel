<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Page;
use App\Models\PageImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::orderBy('updated_at', 'desc')->get();

        return view('admin.pages.index', compact('pages'));
    }

    public function create()
    {
        $parentMenus = Menu::whereNull('parent_id')->orderBy('order', 'asc')->get();

        return view('admin.pages.create', compact('parentMenus'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'content' => 'required|string',
            'icon' => 'nullable|string',
            'order' => 'nullable|integer',
            'status' => 'required|in:published,draft',
            'add_to_menu' => 'nullable|boolean',
            'parent_menu_id' => 'nullable|exists:menus,id',
            'gallery' => 'nullable|array',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:10240',
        ]);

        $slug = $request->filled('slug') ? Str::slug($request->slug) : Str::slug($request->title);

        // Ensure unique slug
        if (Page::where('slug', $slug)->exists()) {
            $slug = $slug.'-'.time();
        }

        $page = Page::create([
            'title' => $validated['title'],
            'slug' => $slug,
            'content' => $validated['content'],
            'icon' => $request->input('icon', 'fa-file-lines'),
            'is_active' => $request->status === 'published',
            'order' => $request->input('order', 0),
        ]);

        // Tambah Foto Galeri Halaman jika ada
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $index => $file) {
                if ($file->isValid()) {
                    $path = $file->store('pages/gallery', 'public');
                    PageImage::create([
                        'page_id' => $page->id,
                        'image_path' => '/storage/'.$path,
                        'order' => $index + 1,
                    ]);
                }
            }
        }

        // Otomatis tambahkan ke Menu Navigasi jika dicentang oleh Admin
        if ($request->has('add_to_menu') && $page->is_active) {
            Menu::create([
                'name' => $page->title,
                'url' => '/halaman/'.$page->slug,
                'parent_id' => $request->input('parent_menu_id'),
                'order' => 99,
                'target' => '_self',
                'icon' => $page->icon,
                'is_active' => true,
            ]);
        }

        return redirect()->route('admin.pages.index')->with('success', "Halaman statis '{$page->title}' berhasil dibuat dan terbit!");
    }

    public function edit(Page $page)
    {
        $page->load('images');
        $parentMenus = Menu::whereNull('parent_id')->orderBy('order', 'asc')->get();

        return view('admin.pages.edit', compact('page', 'parentMenus'));
    }

    public function update(Request $request, Page $page)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'content' => 'required|string',
            'icon' => 'nullable|string',
            'order' => 'nullable|integer',
            'status' => 'required|in:published,draft',
            'add_to_menu' => 'nullable|boolean',
            'parent_menu_id' => 'nullable|exists:menus,id',
            'gallery' => 'nullable|array',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:10240',
            'delete_images' => 'nullable|array',
        ]);

        $slug = $request->filled('slug') ? Str::slug($request->slug) : Str::slug($request->title);

        $page->update([
            'title' => $validated['title'],
            'slug' => $slug,
            'content' => $validated['content'],
            'icon' => $request->input('icon', 'fa-file-lines'),
            'is_active' => $request->status === 'published',
            'order' => $request->input('order', 0),
        ]);

        // Hapus Foto Galeri yang Dicentang Hapus
        if ($request->filled('delete_images')) {
            PageImage::whereIn('id', $request->delete_images)->where('page_id', $page->id)->delete();
        }

        // Tambah Foto Galeri Baru
        if ($request->hasFile('gallery')) {
            $existingCount = $page->images()->count();
            foreach ($request->file('gallery') as $index => $file) {
                if ($file->isValid()) {
                    $path = $file->store('pages/gallery', 'public');
                    PageImage::create([
                        'page_id' => $page->id,
                        'image_path' => '/storage/'.$path,
                        'order' => $existingCount + $index + 1,
                    ]);
                }
            }
        }

        // Opsional update atau tambahkan ke Menu Navigasi
        if ($request->has('add_to_menu') && $page->is_active) {
            Menu::updateOrCreate(
                ['url' => '/halaman/'.$page->slug],
                [
                    'name' => $page->title,
                    'parent_id' => $request->input('parent_menu_id'),
                    'order' => 99,
                    'target' => '_self',
                    'icon' => $page->icon,
                    'is_active' => true,
                ]
            );
        }

        return redirect()->route('admin.pages.index')->with('success', "Halaman statis '{$page->title}' berhasil diperbarui!");
    }

    public function destroy(Page $page)
    {
        // Hapus juga rute menu terkait jika ada
        Menu::where('url', '/halaman/'.$page->slug)->delete();
        $page->delete();

        return redirect()->route('admin.pages.index')->with('success', 'Halaman statis berhasil dihapus!');
    }
}
