<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Page;
use App\Models\ProgramStudi;
use App\Models\Facility;
use App\Models\SpmiDocument;
use App\Models\SiteSetting;
use App\Models\Slide;
use App\Models\Stat;
use App\Models\Achievement;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home()
    {
        $slides = Slide::where('is_active', true)->orderBy('order', 'asc')->get();
        $stats = Stat::where('is_active', true)->orderBy('order', 'asc')->get();
        $achievements = Achievement::where('is_active', true)->orderBy('order', 'asc')->orderBy('created_at', 'desc')->get();
        $posts = Post::where('status', 'published')->orderBy('published_at', 'desc')->take(6)->get();
        $prodis = ProgramStudi::where('is_active', true)->get();
        $facilities = Facility::where('is_featured', true)->take(6)->get();
        $spmiDocs = SpmiDocument::orderBy('year', 'desc')->take(4)->get();

        return view('public.home', compact('slides', 'stats', 'achievements', 'posts', 'prodis', 'facilities', 'spmiDocs'));
    }

    public function prodiIndex()
    {
        $prodis = ProgramStudi::where('is_active', true)->get();
        return view('public.prodi.index', compact('prodis'));
    }

    public function prodiShow($slug)
    {
        $prodi = ProgramStudi::where('slug', $slug)->where('is_active', true)->firstOrFail();
        $otherProdis = ProgramStudi::where('id', '!=', $prodi->id)->where('is_active', true)->get();
        return view('public.prodi.show', compact('prodi', 'otherProdis'));
    }

    public function newsIndex(Request $request)
    {
        $query = Post::where('status', 'published');

        if ($request->has('category') && $request->category != '') {
            $query->where('category', $request->category);
        }

        if ($request->has('search') && $request->search != '') {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('content', 'like', '%' . $request->search . '%');
            });
        }

        $posts = $query->orderBy('published_at', 'desc')->paginate(9);
        return view('public.news.index', compact('posts'));
    }

    public function newsShow($slug)
    {
        $post = Post::where('slug', $slug)->where('status', 'published')->firstOrFail();
        $post->increment('views');

        $recentPosts = Post::where('status', 'published')->where('id', '!=', $post->id)->orderBy('published_at', 'desc')->take(5)->get();

        return view('public.news.show', compact('post', 'recentPosts'));
    }

    public function spmiIndex()
    {
        $docs = SpmiDocument::orderBy('year', 'desc')->get();
        return view('public.spmi.index', compact('docs'));
    }

    public function facilitiesIndex()
    {
        $facilities = Facility::all();
        return view('public.facilities.index', compact('facilities'));
    }

    public function pageShow($slug)
    {
        $page = Page::where('slug', $slug)->where('is_active', true)->first();

        if (!$page) {
            $formattedTitle = ucwords(str_replace(['-', '_'], ' ', $slug));
            $page = new Page([
                'title' => $formattedTitle . ' - STIKes Panti Waluya Malang',
                'slug' => $slug,
                'is_active' => true,
                'content' => '
                    <div class="space-y-6">
                        <div class="p-6 bg-blue-50 border border-blue-200 rounded-2xl">
                            <h3 class="font-bold text-blue-900 text-lg mb-2">' . $formattedTitle . '</h3>
                            <p class="text-sm text-slate-700 leading-relaxed">Informasi resmi seputar ' . strtolower($formattedTitle) . ' Sekolah Tinggi Ilmu Kesehatan Panti Waluya Malang.</p>
                        </div>
                        <p class="text-slate-700 leading-relaxed">STIKes Panti Waluya Malang berkomitmen menghadirkan informasi transparan dan akuntabel untuk mendukung proses belajar mengajar serta layanan akademik publik.</p>
                    </div>
                ',
            ]);
        }

        return view('public.pages.show', compact('page'));
    }

    public function contact()
    {
        return view('public.contact');
    }
}
