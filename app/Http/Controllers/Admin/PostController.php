<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::with('categories');

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $query->where('title', 'like', "%{$request->search}%");
        }

        $posts = $query->orderBy('updated_at', 'desc')->paginate(10);

        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::orderBy('name', 'asc')->get();

        return view('admin.posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'categories' => 'required|array|min:1',
            'categories.*' => 'exists:categories,id',
            'status' => 'required|in:published,draft',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:10240',
            'gallery' => 'nullable|array',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:10240',
        ]);

        // String kategori utama untuk fallback
        $firstCat = Category::find($validated['categories'][0]);
        $validated['category'] = $firstCat ? $firstCat->name : 'Umum';

        $validated['slug'] = Str::slug($request->title).'-'.time();
        $validated['published_at'] = $request->status === 'published' ? now() : null;

        // Upload Sampul Utama
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('posts', 'public');
            $validated['image'] = '/storage/'.$path;
        }

        $post = Post::create($validated);

        // Sync Multi-Kategori (Bisa Pilih Lebih dari 1)
        $post->categories()->sync($validated['categories']);

        // Upload Galeri Foto Tambahan (Banyak Gambar)
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $index => $file) {
                if ($file->isValid()) {
                    $path = $file->store('posts/gallery', 'public');
                    PostImage::create([
                        'post_id' => $post->id,
                        'image_path' => '/storage/'.$path,
                        'order' => $index + 1,
                    ]);
                }
            }
        }

        return redirect()->route('admin.posts.index')->with('success', 'Artikel berita & kategori berhasil ditambahkan!');
    }

    public function edit(Post $post)
    {
        $post->load(['images', 'categories']);
        $categories = Category::orderBy('name', 'asc')->get();

        return view('admin.posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'categories' => 'required|array|min:1',
            'categories.*' => 'exists:categories,id',
            'status' => 'required|in:published,draft',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:10240',
            'gallery' => 'nullable|array',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:10240',
            'delete_images' => 'nullable|array',
        ]);

        $firstCat = Category::find($validated['categories'][0]);
        $validated['category'] = $firstCat ? $firstCat->name : 'Umum';

        if ($post->title !== $request->title) {
            $validated['slug'] = Str::slug($request->title).'-'.time();
        }

        if ($request->status === 'published' && ! $post->published_at) {
            $validated['published_at'] = now();
        }

        // Update Sampul Utama jika ada
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('posts', 'public');
            $validated['image'] = '/storage/'.$path;
        }

        $post->update($validated);

        // Sync Multi-Kategori
        $post->categories()->sync($validated['categories']);

        // Hapus Foto Galeri yang Dicentang Hapus
        if ($request->filled('delete_images')) {
            PostImage::whereIn('id', $request->delete_images)->where('post_id', $post->id)->delete();
        }

        // Tambah Foto Galeri Baru
        if ($request->hasFile('gallery')) {
            $existingCount = $post->images()->count();
            foreach ($request->file('gallery') as $index => $file) {
                if ($file->isValid()) {
                    $path = $file->store('posts/gallery', 'public');
                    PostImage::create([
                        'post_id' => $post->id,
                        'image_path' => '/storage/'.$path,
                        'order' => $existingCount + $index + 1,
                    ]);
                }
            }
        }

        return redirect()->route('admin.posts.index')->with('success', 'Artikel berita & kategori berhasil diperbarui!');
    }

    public function destroy(Post $post)
    {
        $post->categories()->detach();
        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Artikel berita berhasil dihapus!');
    }
}
