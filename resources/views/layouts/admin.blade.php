<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard CMS - STIKes Panti Waluya Malang')</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo-stikes-pantiwaluya.png') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Outfit:wght@600;700;800&display=swap" rel="stylesheet">
    
    <!-- FontAwesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        wp: {
                            sidebar: '#0f172a',
                            hover: '#1d4ed8',
                            active: '#1d4ed8',
                            sub: '#1e293b'
                        }
                    },
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    
    <!-- AlpineJS -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-slate-100 text-slate-800 font-sans antialiased flex h-screen overflow-hidden" x-data="{ sidebarOpen: true }">

    <!-- WordPress Style Sidebar -->
    <aside :class="sidebarOpen ? 'w-64' : 'w-20'" class="bg-wp-sidebar text-slate-300 flex flex-col transition-all duration-300 z-30 shrink-0 select-none shadow-2xl">
        
        <!-- Header / Logo -->
        <div class="h-16 flex items-center justify-between px-4 border-b border-blue-900/60 bg-blue-950/80">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 overflow-hidden">
                <div class="w-9 h-9 rounded-lg bg-white p-0.5 flex items-center justify-center shrink-0 shadow">
                    <img src="{{ asset('images/logo-stikes-pantiwaluya.png') }}" alt="Logo STIKes" class="h-7 w-auto object-contain">
                </div>
                <div x-show="sidebarOpen" class="font-bold text-sm tracking-tight text-white whitespace-nowrap">
                    CMS STIKes PW
                </div>
            </a>
            <button @click="sidebarOpen = !sidebarOpen" class="text-slate-400 hover:text-white p-1 rounded-lg">
                <i class="fa-solid" :class="sidebarOpen ? 'fa-angles-left' : 'fa-angles-right'"></i>
            </button>
        </div>

        <!-- Navigation Links (Gaya WordPress) -->
        <nav class="flex-1 overflow-y-auto py-4 px-2 space-y-1 text-sm">
            
            <!-- Dashboard -->
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition {{ request()->routeIs('admin.dashboard') ? 'bg-wp-active text-white font-bold shadow-md' : 'hover:bg-blue-900/60 text-slate-300' }}">
                <i class="fa-solid fa-gauge-high w-5 text-center text-base"></i>
                <span x-show="sidebarOpen">Dashboard</span>
            </a>

            <div class="pt-2 pb-1" x-show="sidebarOpen">
                <div class="text-[11px] font-bold text-sky-400/70 uppercase tracking-wider px-3">Content Manager</div>
            </div>

            <!-- Berita & Posts -->
            <a href="{{ route('admin.posts.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition {{ request()->routeIs('admin.posts.*') ? 'bg-wp-active text-white font-bold shadow-md' : 'hover:bg-blue-900/60 text-slate-300' }}">
                <i class="fa-solid fa-newspaper w-5 text-center text-base"></i>
                <span x-show="sidebarOpen">Berita & Artikel</span>
            </a>

            <!-- Halaman Statis -->
            <a href="{{ route('admin.pages.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition {{ request()->routeIs('admin.pages.*') ? 'bg-wp-active text-white font-bold shadow-md' : 'hover:bg-blue-900/60 text-slate-300' }}">
                <i class="fa-solid fa-file-lines w-5 text-center text-base"></i>
                <span x-show="sidebarOpen">Halaman Profil</span>
            </a>

            <!-- Program Studi -->
            <a href="{{ route('admin.prodi.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition {{ request()->routeIs('admin.prodi.*') ? 'bg-wp-active text-white font-bold shadow-md' : 'hover:bg-blue-900/60 text-slate-300' }}">
                <i class="fa-solid fa-graduation-cap w-5 text-center text-base"></i>
                <span x-show="sidebarOpen">Program Studi</span>
            </a>

            <!-- Fasilitas Kampus -->
            <a href="{{ route('admin.facilities.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition {{ request()->routeIs('admin.facilities.*') ? 'bg-wp-active text-white font-bold shadow-md' : 'hover:bg-blue-900/60 text-slate-300' }}">
                <i class="fa-solid fa-microscope w-5 text-center text-base"></i>
                <span x-show="sidebarOpen">Fasilitas Kampus</span>
            </a>

            <!-- Dokumen SPMI -->
            <a href="{{ route('admin.spmi.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition {{ request()->routeIs('admin.spmi.*') ? 'bg-wp-active text-white font-bold shadow-md' : 'hover:bg-blue-900/60 text-slate-300' }}">
                <i class="fa-solid fa-file-shield w-5 text-center text-base"></i>
                <span x-show="sidebarOpen">Dokumen SPMI</span>
            </a>

            <div class="pt-4 pb-1" x-show="sidebarOpen">
                <div class="text-[11px] font-bold text-sky-400/70 uppercase tracking-wider px-3">Tampilan & Sistem</div>
            </div>

            <!-- Banner Carousel Slides -->
            <a href="{{ route('admin.slides.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition {{ request()->routeIs('admin.slides.*') ? 'bg-wp-active text-white font-bold shadow-md' : 'hover:bg-blue-900/60 text-slate-300' }}">
                <i class="fa-solid fa-images w-5 text-center text-base"></i>
                <span x-show="sidebarOpen">Kelola Banner Carousel</span>
            </a>

            <!-- Widget Angka Statistik -->
            <a href="{{ route('admin.stats.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition {{ request()->routeIs('admin.stats.*') ? 'bg-wp-active text-white font-bold shadow-md' : 'hover:bg-blue-900/60 text-slate-300' }}">
                <i class="fa-solid fa-chart-line w-5 text-center text-base"></i>
                <span x-show="sidebarOpen">Kelola Widget Statistik</span>
            </a>

            <!-- Menus / Sub-menus (WP Menus) -->
            <a href="{{ route('admin.menus.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition {{ request()->routeIs('admin.menus.*') ? 'bg-wp-active text-white font-bold shadow-md' : 'hover:bg-blue-900/60 text-slate-300' }}">
                <i class="fa-solid fa-bars-staggered w-5 text-center text-base"></i>
                <span x-show="sidebarOpen">Kelola Menu & Sub-menu</span>
            </a>

            <!-- Site Settings -->
            <a href="{{ route('admin.settings.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition {{ request()->routeIs('admin.settings.*') ? 'bg-wp-active text-white font-bold shadow-md' : 'hover:bg-blue-900/60 text-slate-300' }}">
                <i class="fa-solid fa-sliders w-5 text-center text-base"></i>
                <span x-show="sidebarOpen">Pengaturan Situs</span>
            </a>

            <!-- Visit Public Site -->
            <a href="{{ route('home') }}" target="_blank" class="flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-blue-900 text-sky-300 border border-blue-800 transition mt-4">
                <i class="fa-solid fa-arrow-up-right-from-square w-5 text-center text-base"></i>
                <span x-show="sidebarOpen">Lihat Website Utama</span>
            </a>

        </nav>

        <!-- User Profile & Logout -->
        <div class="p-3 border-t border-blue-900 bg-blue-950/90">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3 overflow-hidden">
                    <div class="w-8 h-8 rounded-full bg-blue-600 text-white font-bold flex items-center justify-center text-xs shrink-0">
                        {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                    </div>
                    <div x-show="sidebarOpen" class="truncate">
                        <div class="text-xs font-bold text-white truncate">{{ auth()->user()->name ?? 'Admin' }}</div>
                        <div class="text-[10px] text-slate-400 truncate">Administrator</div>
                    </div>
                </div>

                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" title="Logout" class="text-slate-400 hover:text-red-400 p-1.5 rounded-lg transition">
                        <i class="fa-solid fa-right-from-bracket"></i>
                    </button>
                </form>
            </div>
        </div>

    </aside>

    <!-- Main Content Area -->
    <div class="flex-1 flex flex-col overflow-hidden">
        
        <!-- Admin Top Bar -->
        <header class="h-16 bg-white border-b border-slate-200 px-6 flex items-center justify-between z-10 shadow-sm">
            <div class="flex items-center gap-4">
                <h1 class="font-bold text-lg text-slate-800">@yield('page_title', 'Dashboard')</h1>
            </div>

            <div class="flex items-center gap-4 text-xs">
                <span class="text-slate-500 font-medium">CMS WordPress Engine v1.0 (Laravel)</span>
                <a href="{{ route('home') }}" target="_blank" class="bg-blue-50 text-blue-700 hover:bg-blue-100 font-bold px-3 py-1.5 rounded-lg border border-blue-200 transition flex items-center gap-1.5">
                    <i class="fa-solid fa-globe"></i> Visit Site
                </a>
            </div>
        </header>

        <!-- Flash Messages -->
        @if(session('success'))
            <div class="bg-emerald-500 text-white px-6 py-3 text-sm font-semibold flex justify-between items-center shadow">
                <span><i class="fa-solid fa-circle-check mr-2"></i> {{ session('success') }}</span>
                <button onclick="this.parentElement.remove()" class="text-white hover:opacity-70">&times;</button>
            </div>
        @endif

        <!-- Scrollable Main View -->
        <main class="flex-1 overflow-y-auto p-6 md:p-8 bg-slate-100">
            @yield('content')
        </main>
    </div>

</body>
</html>
