<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::query();

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
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'category' => 'required|string',
            'status' => 'required|in:published,draft',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:10240',
            'gallery' => 'nullable|array',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:10240',
        ]);

        $validated['slug'] = Str::slug($request->title) . '-' . time();
        $validated['published_at'] = $request->status === 'published' ? now() : null;

        // Upload Sampul Utama
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('posts', 'public');
            $validated['image'] = '/storage/' . $path;
        }

        $post = Post::create($validated);

        // Upload Galeri Foto Tambahan (Banyak Gambar)
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $index => $file) {
                if ($file->isValid()) {
                    $path = $file->store('posts/gallery', 'public');
                    PostImage::create([
                        'post_id' => $post->id,
                        'image_path' => '/storage/' . $path,
                        'order' => $index + 1,
                    ]);
                }
            }
        }

        return redirect()->route('admin.posts.index')->with('success', 'Artikel berita & galeri foto berhasil ditambahkan!');
    }

    public function edit(Post $post)
    {
        $post->load('images');
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'category' => 'required|string',
            'status' => 'required|in:published,draft',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:10240',
            'gallery' => 'nullable|array',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:10240',
            'delete_images' => 'nullable|array',
        ]);

        if ($post->title !== $request->title) {
            $validated['slug'] = Str::slug($request->title) . '-' . time();
        }

        if ($request->status === 'published' && !$post->published_at) {
            $validated['published_at'] = now();
        }

        // Update Sampul Utama jika ada
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('posts', 'public');
            $validated['image'] = '/storage/' . $path;
        }

        $post->update($validated);

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
                        'image_path' => '/storage/' . $path,
                        'order' => $existingCount + $index + 1,
                    ]);
                }
            }
        }

        return redirect()->route('admin.posts.index')->with('success', 'Artikel berita & galeri foto berhasil diperbarui!');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('success', 'Artikel berita berhasil dihapus!');
    }
}
