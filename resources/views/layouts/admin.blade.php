<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('page_title', 'Dashboard Admin') - CMS STIKes Panti Waluya Malang</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo-stikes-pantiwaluya.png') }}">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Outfit:wght@500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- FontAwesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                            800: '#1e40af',
                            900: '#1e3a8a',
                            950: '#172554',
                        },
                        wp: {
                            sidebar: '#0f172a',
                            active: '#1d4ed8',
                            hover: '#1e3a8a',
                        }
                    },
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                        heading: ['Outfit', 'sans-serif'],
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

            <!-- Prestasi Mahasiswa (BARU) -->
            <a href="{{ route('admin.achievements.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition {{ request()->routeIs('admin.achievements.*') ? 'bg-wp-active text-white font-bold shadow-md' : 'hover:bg-blue-900/60 text-slate-300' }}">
                <i class="fa-solid fa-trophy w-5 text-center text-base text-amber-400"></i>
                <span x-show="sidebarOpen">Prestasi Mahasiswa</span>
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
                <i class="fa-solid fa-hospital-user w-5 text-center text-base"></i>
                <span x-show="sidebarOpen">Fasilitas Kampus</span>
            </a>

            <!-- Repositori SPMI -->
            <a href="{{ route('admin.spmi.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition {{ request()->routeIs('admin.spmi.*') ? 'bg-wp-active text-white font-bold shadow-md' : 'hover:bg-blue-900/60 text-slate-300' }}">
                <i class="fa-solid fa-folder-open w-5 text-center text-base"></i>
                <span x-show="sidebarOpen">Repositori SPMI</span>
            </a>

            <div class="pt-4 pb-1" x-show="sidebarOpen">
                <div class="text-[11px] font-bold text-sky-400/70 uppercase tracking-wider px-3">Tampilan & Widget</div>
            </div>

            <!-- Slide Banner Carousel -->
            <a href="{{ route('admin.slides.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition {{ request()->routeIs('admin.slides.*') ? 'bg-wp-active text-white font-bold shadow-md' : 'hover:bg-blue-900/60 text-slate-300' }}">
                <i class="fa-solid fa-images w-5 text-center text-base"></i>
                <span x-show="sidebarOpen">Slide Banner Hero</span>
            </a>

            <!-- Counter Stats Bar -->
            <a href="{{ route('admin.stats.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition {{ request()->routeIs('admin.stats.*') ? 'bg-wp-active text-white font-bold shadow-md' : 'hover:bg-blue-900/60 text-slate-300' }}">
                <i class="fa-solid fa-chart-simple w-5 text-center text-base"></i>
                <span x-show="sidebarOpen">Statistik Beranda</span>
            </a>

            <!-- Menu Builder -->
            <a href="{{ route('admin.menus.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition {{ request()->routeIs('admin.menus.*') ? 'bg-wp-active text-white font-bold shadow-md' : 'hover:bg-blue-900/60 text-slate-300' }}">
                <i class="fa-solid fa-bars-staggered w-5 text-center text-base"></i>
                <span x-show="sidebarOpen">Menu Navigasi</span>
            </a>

            <div class="pt-4 pb-1" x-show="sidebarOpen">
                <div class="text-[11px] font-bold text-sky-400/70 uppercase tracking-wider px-3">Sistem</div>
            </div>

            <!-- Pengaturan Situs -->
            <a href="{{ route('admin.settings.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition {{ request()->routeIs('admin.settings.*') ? 'bg-wp-active text-white font-bold shadow-md' : 'hover:bg-blue-900/60 text-slate-300' }}">
                <i class="fa-solid fa-gears w-5 text-center text-base"></i>
                <span x-show="sidebarOpen">Pengaturan Situs</span>
            </a>

        </nav>

        <!-- User Profile & Logout -->
        <div class="p-3 border-t border-blue-900/60 bg-blue-950/90 flex items-center justify-between">
            <div class="flex items-center gap-3 overflow-hidden" x-show="sidebarOpen">
                <div class="w-8 h-8 rounded-full bg-blue-700 text-white font-bold flex items-center justify-center text-xs shrink-0">
                    {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                </div>
                <div class="truncate">
                    <div class="text-xs font-bold text-white truncate">{{ auth()->user()->name ?? 'Administrator' }}</div>
                    <div class="text-[10px] text-sky-400">Admin Utama</div>
                </div>
            </div>
            
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="p-2 text-slate-400 hover:text-red-400 transition rounded-lg" title="Keluar / Logout">
                    <i class="fa-solid fa-right-from-bracket text-base"></i>
                </button>
            </form>
        </div>

    </aside>

    <!-- Main Content Area -->
    <div class="flex-1 flex flex-col min-w-0 overflow-hidden">
        
        <!-- Top Action Bar -->
        <header class="h-16 bg-white border-b border-slate-200 px-6 flex items-center justify-between z-10 shadow-sm">
            <div class="flex items-center gap-4">
                <h1 class="font-heading font-extrabold text-lg text-slate-900">@yield('page_title', 'Dashboard Admin')</h1>
            </div>

            <div class="flex items-center gap-4">
                <a href="{{ route('home') }}" target="_blank" class="text-xs font-bold text-blue-700 hover:text-blue-900 bg-blue-50 px-3.5 py-2 rounded-xl border border-blue-200 transition flex items-center gap-1.5">
                    <i class="fa-solid fa-arrow-up-right-from-square text-[10px]"></i> Lihat Website Publik
                </a>
            </div>
        </header>

        <!-- Main Body Scroll Area -->
        <main class="flex-1 overflow-y-auto p-6 lg:p-8">
            @if(session('success'))
                <div class="bg-emerald-50 text-emerald-800 border border-emerald-200 rounded-2xl p-4 mb-6 text-sm font-bold flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <i class="fa-solid fa-circle-check text-emerald-600 text-lg"></i>
                        <span>{{ session('success') }}</span>
                    </div>
                    <button onclick="this.parentElement.remove()" class="text-emerald-500 hover:text-emerald-900">&times;</button>
                </div>
            @endif

            @yield('content')
        </main>
    </div>

</body>
</html>
