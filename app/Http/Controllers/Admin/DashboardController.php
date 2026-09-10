<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\ProgramStudi;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPosts = Post::count();
        $publishedPosts = Post::where('status', 'published')->count();
        $totalViews = Post::sum('views');
        $totalProdi = ProgramStudi::count();
        $recentPosts = Post::orderBy('created_at', 'desc')->take(5)->get();

        return view('admin.dashboard', compact(
            'totalPosts',
            'publishedPosts',
            'totalViews',
            'totalProdi',
            'recentPosts'
        ));
    }
}
