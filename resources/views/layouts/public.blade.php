<!DOCTYPE html>
<html lang="id" x-data="{ 
    darkMode: localStorage.getItem('theme') === 'dark',
    toggleTheme() {
        this.darkMode = !this.darkMode;
        localStorage.setItem('theme', this.darkMode ? 'dark' : 'light');
    }
}" :class="darkMode ? 'dark' : ''">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'STIKes Panti Waluya Malang - Kampus Kesehatan Terkemuka')</title>
    <meta name="description" content="Sekolah Tinggi Ilmu Kesehatan Panti Waluya Malang. Menghasilkan tenaga kesehatan profesional, berintegritas, dan siap kerja nasional maupun internasional.">
    <link rel="icon" type="image/png" href="{{ asset('images/logo-stikes-pantiwaluya.png') }}">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Outfit:wght@500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- FontAwesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Tailwind CSS CDN dengan Dark Mode Class Enabled -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
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
                        navy: {
                            800: '#1e293b',
                            900: '#0f172a',
                            950: '#090d16',
                        },
                        gold: {
                            50: '#f59e0b',
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

    <style>
        .glass-header {
            background: rgba(15, 23, 42, 0.94);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
        .hero-gradient {
            background: linear-gradient(135deg, #090d16 0%, #1e3a8a 55%, #1d4ed8 100%);
        }
    </style>
</head>
<body class="bg-slate-50 dark:bg-slate-950 text-slate-800 dark:text-slate-100 font-sans antialiased flex flex-col min-h-screen transition-colors duration-200">

    <!-- Top Announcement Bar -->
    <div class="bg-gradient-to-r from-blue-950 via-blue-900 to-navy-950 text-white text-xs py-2.5 px-4 border-b border-blue-800/40">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-2">
            <div class="flex items-center gap-4">
                <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-amber-500 text-slate-950 font-bold text-[11px] animate-pulse">
                    <i class="fa-solid fa-bullhorn text-xs"></i> {{ \App\Models\SiteSetting::get('announcement_badge', 'PMB 2026/2027') }}
                </span>
                <span class="hidden sm:inline font-medium">{{ \App\Models\SiteSetting::get('announcement_text', 'Pendaftaran Mahasiswa Baru D3/S1/Profesi Telah Dibuka!') }}</span>
            </div>
            <div class="flex items-center gap-5 text-slate-300">
                <a href="tel:{{ \App\Models\SiteSetting::get('phone') }}" class="hover:text-amber-300 transition flex items-center gap-1.5">
                    <i class="fa-solid fa-phone text-blue-400"></i> {{ \App\Models\SiteSetting::get('phone', '(0341) 369003') }}
                </a>
                <a href="mailto:{{ \App\Models\SiteSetting::get('email') }}" class="hover:text-amber-300 transition flex items-center gap-1.5 hidden md:flex">
                    <i class="fa-solid fa-envelope text-blue-400"></i> {{ \App\Models\SiteSetting::get('email') }}
                </a>
            </div>
        </div>
    </div>

    <!-- Main Navigation Bar -->
    <header x-data="{ openMobile: false }" class="sticky top-0 z-50 glass-header text-white shadow-xl border-b border-blue-900/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                
                <!-- Official Campus Logo & Brand -->
                <a href="{{ route('home') }}" class="flex items-center gap-3.5 group">
                    <div class="w-12 h-12 rounded-xl bg-white p-1 shadow-lg shadow-blue-500/20 group-hover:scale-105 transition duration-300 flex items-center justify-center shrink-0 border border-blue-200/50">
                        <img src="{{ asset('images/logo-stikes-pantiwaluya.png') }}" alt="Logo STIKes Panti Waluya Malang" class="h-10 w-auto object-contain">
                    </div>
                    <div>
                        <div class="font-heading font-extrabold text-xl tracking-tight text-white group-hover:text-sky-300 transition leading-tight">
                            STIKes Panti Waluya
                        </div>
                        <div class="text-xs text-sky-300 font-semibold tracking-wider uppercase">
                            Malang &bull; Indonesia
                        </div>
                    </div>
                </a>

                <!-- Dynamic Navbar Links -->
                @php
                    $dynamicMenus = \App\Models\Menu::whereNull('parent_id')->where('is_active', true)->orderBy('order', 'asc')->with('children')->get();
                @endphp

                <nav class="hidden lg:flex items-center gap-1">
                    @foreach($dynamicMenus as $navMenu)
                        @if($navMenu->children->count() > 0)
                            <!-- Dropdown Parent Menu -->
                            <div class="relative" x-data="{ openDropdown: false }" @click.away="openDropdown = false">
                                <button @click="openDropdown = !openDropdown" class="px-3.5 py-2 rounded-lg text-sm font-medium text-slate-200 hover:bg-blue-900/60 hover:text-sky-300 transition flex items-center gap-1.5">
                                    @if($navMenu->icon)
                                        <i class="fa-solid {{ $navMenu->icon }} text-xs text-sky-400"></i>
                                    @endif
                                    <span>{{ $navMenu->name }}</span>
                                    <i class="fa-solid fa-chevron-down text-xs transition duration-200" :class="{'rotate-180': openDropdown}"></i>
                                </button>

                                <div x-show="openDropdown" x-transition class="absolute left-0 mt-2 w-60 bg-blue-950 border border-blue-800 rounded-xl shadow-2xl py-2 z-50 text-sm">
                                    @foreach($navMenu->children as $child)
                                        <a href="{{ $child->url }}" target="{{ $child->target }}" class="block px-4 py-2.5 text-slate-300 hover:bg-blue-600 hover:text-white transition flex items-center justify-between">
                                            <span class="flex items-center gap-2">
                                                @if($child->icon)
                                                    <i class="fa-solid {{ $child->icon }} text-sky-400 text-xs w-4"></i>
                                                @endif
                                                <span>{{ $child->name }}</span>
                                            </span>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <!-- Single Link Menu -->
                            <a href="{{ $navMenu->url }}" target="{{ $navMenu->target }}" class="px-3.5 py-2 rounded-lg text-sm font-medium transition {{ request()->url() === url($navMenu->url) ? 'bg-blue-600 text-white font-semibold shadow-md' : 'text-slate-200 hover:bg-blue-900/60 hover:text-sky-300' }}">
                                @if($navMenu->icon)
                                    <i class="fa-solid {{ $navMenu->icon }} text-xs text-sky-400 mr-1"></i>
                                @endif
                                {{ $navMenu->name }}
                            </a>
                        @endif
                    @endforeach
                </nav>

                <!-- PMB Action Button & Dark/Light Mode Switcher -->
                <div class="hidden lg:flex items-center gap-3">
                    <!-- Dark / Light Mode Switcher Button -->
                    <button @click="toggleTheme()" class="px-3 py-2 rounded-xl border border-white/20 bg-white/10 hover:bg-white/20 text-amber-400 transition flex items-center gap-1.5 text-xs font-bold" title="Ubah Mode Tampilan (Dark/Light)">
                        <template x-if="darkMode">
                            <span class="flex items-center gap-1.5 text-amber-400"><i class="fa-solid fa-sun text-amber-400"></i> Mode Terang</span>
                        </template>
                        <template x-if="!darkMode">
                            <span class="flex items-center gap-1.5 text-sky-200"><i class="fa-solid fa-moon text-amber-300"></i> Mode Gelap</span>
                        </template>
                    </button>

                    <a href="{{ \App\Models\SiteSetting::get('pmb_link', '#') }}" target="_blank" class="bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-600 hover:to-amber-700 text-slate-950 font-extrabold px-5 py-2.5 rounded-xl shadow-lg shadow-amber-500/20 transform hover:-translate-y-0.5 transition duration-200 flex items-center gap-2">
                        <i class="fa-solid fa-graduation-cap"></i> PMB Online
                    </a>
                </div>

                <!-- Mobile Menu Button & Dark Mode Switcher -->
                <div class="lg:hidden flex items-center gap-2">
                    <button @click="toggleTheme()" class="p-2 rounded-lg text-amber-400 bg-white/10 hover:bg-white/20 border border-white/20">
                        <i class="fa-solid" :class="darkMode ? 'fa-sun text-amber-400' : 'fa-moon text-amber-300'"></i>
                    </button>
                    
                    <button @click="openMobile = !openMobile" class="p-2.5 rounded-lg text-slate-300 hover:text-white hover:bg-slate-800 focus:outline-none">
                        <i class="fa-solid" :class="openMobile ? 'fa-xmark text-xl' : 'fa-bars text-xl'"></i>
                    </button>
                </div>

            </div>
        </div>

        <!-- Mobile Navigation Menu -->
        <div x-show="openMobile" x-transition class="lg:hidden bg-blue-950 border-b border-blue-900 px-4 pt-2 pb-6 space-y-3">
            @foreach($dynamicMenus as $navMenu)
                <a href="{{ $navMenu->url }}" class="block px-3 py-2 rounded-lg text-slate-200 hover:bg-blue-900 font-medium text-sm">
                    {{ $navMenu->name }}
                </a>
            @endforeach
            <div class="pt-2">
                <a href="{{ \App\Models\SiteSetting::get('pmb_link', '#') }}" target="_blank" class="block w-full text-center bg-amber-500 text-slate-950 font-bold py-2.5 rounded-xl text-sm">
                    Portal PMB Online &rarr;
                </a>
            </div>
        </div>
    </header>

    <!-- Main Content Area -->
    <main class="flex-1">
        @yield('content')
    </main>

    <!-- Public Footer -->
    <footer class="bg-slate-950 text-slate-300 pt-16 pb-12 border-t border-slate-800/80">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-10 pb-12 border-b border-slate-800/80">
                
                <!-- Campus Branding & Info -->
                <div class="lg:col-span-4 space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-white p-1 shadow flex items-center justify-center">
                            <img src="{{ asset('images/logo-stikes-pantiwaluya.png') }}" alt="Logo STIKes Panti Waluya" class="h-8 w-auto object-contain">
                        </div>
                        <span class="font-heading font-extrabold text-xl text-white">STIKes Panti Waluya Malang</span>
                    </div>
                    <p class="text-xs text-slate-400 leading-relaxed">
                        {{ \App\Models\SiteSetting::get('footer_description', 'Sekolah Tinggi Ilmu Kesehatan Panti Waluya Malang melahirkan tenaga kesehatan profesional, berintegritas, dan siap kerja nasional maupun internasional.') }}
                    </p>
                    <div class="text-xs text-slate-400 space-y-1 pt-1">
                        <p><i class="fa-solid fa-location-dot text-amber-500 mr-2"></i> {{ \App\Models\SiteSetting::get('address', 'Jl. Yulius Riefbuilder No. 5, Malang') }}</p>
                        <p><i class="fa-solid fa-phone text-blue-400 mr-2"></i> {{ \App\Models\SiteSetting::get('phone', '(0341) 369003') }}</p>
                        <p><i class="fa-solid fa-envelope text-sky-400 mr-2"></i> {{ \App\Models\SiteSetting::get('email', 'info@stikespantiwaluya.ac.id') }}</p>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="lg:col-span-3 space-y-3">
                    <h4 class="font-heading font-bold text-white text-base">Tautan Cepat</h4>
                    <ul class="space-y-2 text-xs text-slate-400">
                        <li><a href="{{ route('home') }}" class="hover:text-amber-400 transition">&bull; Beranda Utama</a></li>
                        <li><a href="{{ route('prodi.index') }}" class="hover:text-amber-400 transition">&bull; Program Studi D3/S1/Profesi</a></li>
                        <li><a href="{{ route('news.index') }}" class="hover:text-amber-400 transition">&bull; Berita & Kegiatan Kampus</a></li>
                        <li><a href="{{ route('spmi.index') }}" class="hover:text-amber-400 transition">&bull; Repositori SPMI</a></li>
                        <li><a href="{{ route('facilities.index') }}" class="hover:text-amber-400 transition">&bull; Fasilitas Kampus</a></li>
                    </ul>
                </div>

                <!-- Google Maps Embed Footer Card -->
                <div class="lg:col-span-5 space-y-3">
                    <h4 class="font-heading font-bold text-white text-base flex items-center gap-2">
                        <i class="fa-solid fa-map-location-dot text-amber-500"></i> Lokasi Kampus
                    </h4>
                    <div class="w-full h-44 rounded-2xl overflow-hidden border border-slate-800 bg-slate-900 shadow-md">
                        <iframe src="{{ \App\Models\SiteSetting::get('maps_embed_url', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.353787754567!2d112.62345!3d-7.97234!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zN8KwNTgnMjAuNCJTIDExMsKwMzcnMjQuNCJF!5e0!3m2!1sid!2sid!4v1620000000000!5m2!1sid!2sid') }}" class="w-full h-full border-0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>

            </div>

            <!-- Copyright Bar -->
            <div class="pt-8 flex flex-col sm:flex-row justify-between items-center gap-4 text-xs text-slate-500">
                <div>
                    {{ \App\Models\SiteSetting::get('footer_copyright', '© ' . date('Y') . ' STIKes Panti Waluya Malang. All rights reserved.') }}
                </div>
                <div>
                    {{ \App\Models\SiteSetting::get('footer_credits', 'Dikembangkan untuk STIKes Panti Waluya Malang.') }}
                </div>
            </div>

        </div>
    </footer>

</body>
</html>
