<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Page;
use App\Models\ProgramStudi;
use App\Models\Facility;
use App\Models\SpmiDocument;
use App\Models\SiteSetting;
use App\Models\Slide;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home()
    {
        $slides = Slide::where('is_active', true)->orderBy('order', 'asc')->get();
        $posts = Post::where('status', 'published')->orderBy('published_at', 'desc')->take(6)->get();
        $prodis = ProgramStudi::where('is_active', true)->get();
        $facilities = Facility::where('is_featured', true)->take(6)->get();
        $spmiDocs = SpmiDocument::orderBy('year', 'desc')->take(4)->get();

        return view('public.home', compact('slides', 'posts', 'prodis', 'facilities', 'spmiDocs'));
    }

    public function prodiIndex()
    {
        $prodis = ProgramStudi::where('is_active', true)->get();
        return view('public.prodi.index', compact('prodis'));
    }

    public function prodiShow($slug)
    {
        $prodi = ProgramStudi::where('slug', $slug)->where('is_active', true)->firstOrFail();
        $otherProdis = ProgramStudi::where('is_active', true)->where('id', '!=', $prodi->id)->get();
        return view('public.prodi.show', compact('prodi', 'otherProdis'));
    }

    public function newsIndex(Request $request)
    {
        $query = Post::where('status', 'published');

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }

        $posts = $query->orderBy('published_at', 'desc')->paginate(9);
        $categories = Post::where('status', 'published')->pluck('category')->unique();

        return view('public.news.index', compact('posts', 'categories'));
    }

    public function newsShow($slug)
    {
        $post = Post::where('slug', $slug)->where('status', 'published')->firstOrFail();
        $post->increment('views');

        $recentPosts = Post::where('status', 'published')->where('id', '!=', $post->id)->orderBy('published_at', 'desc')->take(5)->get();

        return view('public.news.show', compact('post', 'recentPosts'));
    }

    public function pageShow($slug)
    {
        $page = Page::where('slug', $slug)->where('is_active', true)->firstOrFail();
        return view('public.pages.show', compact('page'));
    }

    public function spmiIndex(Request $request)
    {
        $query = SpmiDocument::query();

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('document_number', 'like', "%{$search}%");
            });
        }

        $documents = $query->orderBy('year', 'desc')->paginate(10);
        $categories = SpmiDocument::pluck('category')->unique();

        return view('public.spmi.index', compact('documents', 'categories'));
    }

    public function facilitiesIndex()
    {
        $facilities = Facility::all();
        return view('public.facilities.index', compact('facilities'));
    }

    public function contact()
    {
        return view('public.contact');
    }
}
