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
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Outfit:wght@500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- FontAwesome Pro v6.7.0 Local Library (Free & Pro Full Support) -->
    @if($proUrl = \App\Models\SiteSetting::get('fontawesome_pro_url'))
        @if(\Illuminate\Support\Str::endsWith($proUrl, '.js'))
            <script src="{{ $proUrl }}" crossorigin="anonymous"></script>
        @else
            <link rel="stylesheet" href="{{ $proUrl }}" crossorigin="anonymous">
        @endif
    @else
        <link rel="stylesheet" href="{{ asset('vendor/fontawesome-pro/css/all.min.css') }}">
    @endif
    
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

    <script>
        // Set initial dark mode before page render to avoid flash
        if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>

    <style>
        .glass-header {
            background: rgba(15, 23, 42, 0.94);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
        .hero-gradient {
            background: linear-gradient(135deg, #090d16 0%, #1e3a8a 55%, #1d4ed8 100%);
        }

        /* Typography & Prose Dark Mode Contrast */
        .dark .prose {
            color: #cbd5e1;
        }
        .dark .prose p,
        .dark .prose li,
        .dark .prose div {
            color: #cbd5e1;
        }
        .dark .prose h1,
        .dark .prose h2,
        .dark .prose h3,
        .dark .prose h4,
        .dark .prose h5,
        .dark .prose h6,
        .dark .prose strong,
        .dark .prose b,
        .dark .prose th {
            color: #f8fafc !important;
        }
        .dark .prose a {
            color: #38bdf8 !important;
        }
        .dark .prose a:hover {
            color: #7dd3fc !important;
        }
        .dark .prose table,
        .dark .prose tr,
        .dark .prose td,
        .dark .prose th {
            border-color: #334155 !important;
            color: #cbd5e1;
        }
        .dark .prose blockquote {
            color: #94a3b8 !important;
            border-left-color: #3b82f6 !important;
        }
        /* Override any inline hardcoded dark text colors from WYSIWYG editors */
        .dark .prose [style*="color: rgb(0, 0, 0)"],
        .dark .prose [style*="color: #000000"],
        .dark .prose [style*="color:#000000"],
        .dark .prose [style*="color: #000"],
        .dark .prose [style*="color:#000"],
        .dark .prose [style*="color: rgb(33, 37, 41)"],
        .dark .prose [style*="color: #212529"],
        .dark .prose [style*="color: #333333"],
        .dark .prose [style*="color: #444444"],
        .dark .prose [style*="color: black"] {
            color: #e2e8f0 !important;
        }
        .dark .prose [style*="background-color: rgb(255, 255, 255)"],
        .dark .prose [style*="background-color: #ffffff"],
        .dark .prose [style*="background-color:#ffffff"],
        .dark .prose [style*="background-color: white"] {
            background-color: transparent !important;
        }

        /* Clean Google Translate Integration - Hide all Google topbars & banners */
        .goog-te-banner-frame,
        .goog-te-banner-frame.skiptranslate,
        iframe.goog-te-banner-frame,
        .VIpgJd-ZVi9od-ORHb-OEVmfc,
        .VIpgJd-ZVi9od-aZ2wEe-wOHMyf,
        .VIpgJd-ZVi9od-aZ2wEe-wOHMyf-ti6hGc,
        .VIpgJd-yAWNEb-VIpgJd-fmcmS-sn54Q,
        iframe.VIpgJd-ZVi9od-ORHb-OEVmfc,
        div.skiptranslate:not(.custom-lang-selector) {
            display: none !important;
            visibility: hidden !important;
            height: 0 !important;
            width: 0 !important;
            position: absolute !important;
            top: -9999px !important;
        }
        body {
            top: 0px !important;
            position: static !important;
        }
        #google_translate_element {
            display: none !important;
        }
        #goog-gt-tt,
        .goog-tooltip,
        .goog-tooltip:hover,
        .goog-te-balloon-frame {
            display: none !important;
        }
        .goog-text-highlight {
            background-color: transparent !important;
            border: none !important;
            box-shadow: none !important;
        }
    </style>
</head>
<body class="bg-slate-50 dark:bg-slate-950 text-slate-800 dark:text-slate-100 font-sans antialiased flex flex-col min-h-screen transition-colors duration-200">

    <!-- Top Announcement Bar -->
    <div class="bg-gradient-to-r from-blue-950 via-blue-900 to-navy-950 text-white text-xs py-2.5 px-4 border-b border-blue-800/40">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-2">
            <div class="flex items-center gap-4">
                <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-amber-400 text-slate-950 font-bold text-[11px] shadow-sm">
                    <i class="fa-solid fa-bullhorn text-xs"></i> {{ \App\Models\SiteSetting::get('announcement_badge', 'PMB 2026/2027') }}
                </span>
                <span class="hidden sm:inline font-medium text-slate-200">{{ \App\Models\SiteSetting::get('announcement_text', 'Pendaftaran Mahasiswa Baru D3/S1/Profesi Telah Dibuka!') }}</span>
            </div>
            <div class="flex items-center gap-5 text-slate-300">
                <a href="tel:{{ \App\Models\SiteSetting::get('phone') }}" class="hover:text-amber-300 transition flex items-center gap-1.5 focus-visible:ring-2 focus-visible:ring-amber-400 focus-visible:outline-none rounded">
                    <i class="fa-solid fa-phone text-blue-400"></i> {{ \App\Models\SiteSetting::get('phone', '(0341) 369003') }}
                </a>
                <a href="mailto:{{ \App\Models\SiteSetting::get('email') }}" class="hover:text-amber-300 transition flex items-center gap-1.5 hidden md:flex focus-visible:ring-2 focus-visible:ring-amber-400 focus-visible:outline-none rounded">
                    <i class="fa-solid fa-envelope text-blue-400"></i> {{ \App\Models\SiteSetting::get('email') }}
                </a>
            </div>
        </div>
    </div>

    <!-- Main Navigation Bar -->
    <header x-data="{ openMobile: false, mobileExpanded: {} }" class="sticky top-0 z-50 glass-header text-white shadow-xl border-b border-blue-900/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                
                <!-- Official Campus Logo & Brand -->
                <a href="{{ route('home') }}" class="flex items-center gap-3.5 group focus-visible:ring-2 focus-visible:ring-amber-400 focus-visible:outline-none rounded-xl">
                    <img src="{{ asset('images/logo-stikes-pantiwaluya.png') }}" alt="Logo STIKes Panti Waluya Malang" class="h-12 w-auto object-contain group-hover:scale-105 transition duration-300 drop-shadow-md shrink-0">
                    <div>
                        <div class="font-heading font-extrabold text-xl tracking-tight text-white group-hover:text-sky-300 transition leading-tight">
                            STIKes Panti Waluya
                        </div>
                        <div class="text-xs text-sky-300 font-semibold tracking-wider uppercase">
                            Malang
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
                                <button @click="openDropdown = !openDropdown" class="px-3.5 py-2 rounded-lg text-sm font-medium text-slate-200 hover:bg-blue-900/60 hover:text-sky-300 transition flex items-center gap-1.5 focus-visible:ring-2 focus-visible:ring-amber-400 focus-visible:outline-none">
                                    @if($navMenu->icon)
                                        <i class="{{ \App\Helpers\IconHelper::format($navMenu->icon) }} text-xs text-sky-400"></i>
                                    @endif
                                    <span>{{ $navMenu->name }}</span>
                                    <i class="fa-solid fa-chevron-down text-xs transition duration-200" :class="{'rotate-180': openDropdown}"></i>
                                </button>

                                <div x-show="openDropdown" x-transition class="absolute left-0 mt-2 w-60 bg-slate-900 border border-blue-800 rounded-xl shadow-2xl py-2 z-50 text-sm">
                                    @foreach($navMenu->children as $child)
                                        <a href="{{ $child->url }}" target="{{ $child->target }}" class="block px-4 py-2.5 text-slate-200 hover:bg-blue-600 hover:text-white transition flex items-center justify-between focus-visible:ring-2 focus-visible:ring-amber-400 focus-visible:outline-none">
                                            <span class="flex items-center gap-2">
                                                @if($child->icon)
                                                    <i class="{{ \App\Helpers\IconHelper::format($child->icon) }} text-sky-400 text-xs w-4"></i>
                                                @endif
                                                <span>{{ $child->name }}</span>
                                            </span>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <!-- Single Link Menu -->
                            <a href="{{ $navMenu->url }}" target="{{ $navMenu->target }}" class="px-3.5 py-2 rounded-lg text-sm font-medium transition focus-visible:ring-2 focus-visible:ring-amber-400 focus-visible:outline-none {{ request()->url() === url($navMenu->url) ? 'bg-blue-600 text-white font-semibold shadow-md' : 'text-slate-200 hover:bg-blue-900/60 hover:text-sky-300' }}">
                                @if($navMenu->icon)
                                    <i class="{{ \App\Helpers\IconHelper::format($navMenu->icon) }} text-xs text-sky-400 mr-1"></i>
                                @endif
                                {{ $navMenu->name }}
                            </a>
                        @endif
                    @endforeach
                </nav>

                <!-- PMB Action Button, Language Selector & Dark/Light Mode Switcher -->
                <div class="hidden lg:flex items-center gap-3">
                    <!-- Language Selector Dropdown -->
                    <div class="relative" x-data="{ openLang: false, currentLang: (document.cookie.match(/googtrans=\/id\/([a-zA-Z\-]+)/) || [null, 'id'])[1] || 'id' }" @click.away="openLang = false">
                        <button @click="openLang = !openLang" class="px-3 py-2 rounded-xl border border-white/20 bg-white/10 hover:bg-white/20 text-white transition flex items-center gap-1.5 text-xs font-bold focus-visible:ring-2 focus-visible:ring-amber-400 focus-visible:outline-none" title="Pilih Bahasa / Select Language">
                            <i class="fa-solid fa-globe text-sky-300 text-xs"></i>
                            <span x-show="currentLang === 'id'">🇮🇩 ID</span>
                            <span x-show="currentLang === 'en'">🇬🇧 EN</span>
                            <span x-show="currentLang === 'zh-CN'">🇨🇳 CN</span>
                            <span x-show="currentLang === 'ar'">🇸🇦 AR</span>
                            <i class="fa-solid fa-chevron-down text-[9px] opacity-70 transition duration-200" :class="{'rotate-180': openLang}"></i>
                        </button>
                        
                        <div x-show="openLang" x-transition class="absolute right-0 mt-2 w-36 bg-slate-900 border border-blue-800 rounded-xl shadow-2xl py-1 z-50 text-xs">
                            <button type="button" @click="setSiteLanguage('id'); openLang = false;" class="w-full text-left px-3.5 py-2 text-slate-200 hover:bg-blue-600 hover:text-white transition flex items-center gap-2">
                                <span>🇮🇩</span> <span>Indonesia</span>
                            </button>
                            <button type="button" @click="setSiteLanguage('en'); openLang = false;" class="w-full text-left px-3.5 py-2 text-slate-200 hover:bg-blue-600 hover:text-white transition flex items-center gap-2">
                                <span>🇬🇧</span> <span>English</span>
                            </button>
                            <button type="button" @click="setSiteLanguage('zh-CN'); openLang = false;" class="w-full text-left px-3.5 py-2 text-slate-200 hover:bg-blue-600 hover:text-white transition flex items-center gap-2">
                                <span>🇨🇳</span> <span>Mandarin</span>
                            </button>
                            <button type="button" @click="setSiteLanguage('ar'); openLang = false;" class="w-full text-left px-3.5 py-2 text-slate-200 hover:bg-blue-600 hover:text-white transition flex items-center gap-2">
                                <span>🇸🇦</span> <span>Arabic</span>
                            </button>
                        </div>
                    </div>

                    <!-- Dark / Light Mode Switcher Button -->
                    <button @click="toggleTheme()" class="px-3.5 py-2 rounded-xl border border-white/20 bg-white/10 hover:bg-white/20 text-amber-400 transition flex items-center gap-1.5 text-xs font-bold focus-visible:ring-2 focus-visible:ring-amber-400 focus-visible:outline-none" title="Ubah Mode Tampilan (Dark/Light)">
                        <template x-if="darkMode">
                            <span class="flex items-center gap-1.5 text-amber-400"><i class="fa-solid fa-sun text-amber-400"></i> Mode Terang</span>
                        </template>
                        <template x-if="!darkMode">
                            <span class="flex items-center gap-1.5 text-sky-200"><i class="fa-solid fa-moon text-amber-300"></i> Mode Gelap</span>
                        </template>
                    </button>

                    <a href="{{ \App\Models\SiteSetting::get('pmb_link', '#') }}" target="_blank" class="bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-600 hover:to-amber-700 text-slate-950 font-extrabold px-5 py-2.5 rounded-xl shadow-lg shadow-amber-500/20 transform hover:-translate-y-0.5 transition duration-200 flex items-center gap-2 focus-visible:ring-2 focus-visible:ring-amber-400 focus-visible:outline-none">
                        <i class="fa-solid fa-graduation-cap"></i> PMB Online
                    </a>
                </div>

                <!-- Mobile Menu Button & Dark Mode Switcher -->
                <div class="lg:hidden flex items-center gap-2">
                    <!-- Mobile Language Switcher Dropdown -->
                    <div class="relative" x-data="{ openLangMobile: false, currentLang: (document.cookie.match(/googtrans=\/id\/([a-zA-Z\-]+)/) || [null, 'id'])[1] || 'id' }" @click.away="openLangMobile = false">
                        <button @click="openLangMobile = !openLangMobile" class="p-2 rounded-lg text-white bg-white/10 hover:bg-white/20 border border-white/20 text-xs font-bold focus-visible:ring-2 focus-visible:ring-amber-400 focus-visible:outline-none flex items-center gap-1">
                            <i class="fa-solid fa-globe text-sky-300"></i>
                            <span x-show="currentLang === 'id'">ID</span>
                            <span x-show="currentLang === 'en'">EN</span>
                            <span x-show="currentLang === 'zh-CN'">CN</span>
                            <span x-show="currentLang === 'ar'">AR</span>
                        </button>
                        
                        <div x-show="openLangMobile" x-transition class="absolute right-0 mt-2 w-36 bg-slate-900 border border-blue-800 rounded-xl shadow-2xl py-1 z-50 text-xs">
                            <button type="button" @click="setSiteLanguage('id'); openLangMobile = false;" class="w-full text-left px-3.5 py-2 text-slate-200 hover:bg-blue-600 hover:text-white transition flex items-center gap-2">
                                <span>🇮🇩</span> <span>Indonesia</span>
                            </button>
                            <button type="button" @click="setSiteLanguage('en'); openLangMobile = false;" class="w-full text-left px-3.5 py-2 text-slate-200 hover:bg-blue-600 hover:text-white transition flex items-center gap-2">
                                <span>🇬🇧</span> <span>English</span>
                            </button>
                            <button type="button" @click="setSiteLanguage('zh-CN'); openLangMobile = false;" class="w-full text-left px-3.5 py-2 text-slate-200 hover:bg-blue-600 hover:text-white transition flex items-center gap-2">
                                <span>🇨🇳</span> <span>Mandarin</span>
                            </button>
                            <button type="button" @click="setSiteLanguage('ar'); openLangMobile = false;" class="w-full text-left px-3.5 py-2 text-slate-200 hover:bg-blue-600 hover:text-white transition flex items-center gap-2">
                                <span>🇸🇦</span> <span>Arabic</span>
                            </button>
                        </div>
                    </div>

                    <button @click="toggleTheme()" class="p-2 rounded-lg text-amber-400 bg-white/10 hover:bg-white/20 border border-white/20 focus-visible:ring-2 focus-visible:ring-amber-400 focus-visible:outline-none">
                        <i class="fa-solid" :class="darkMode ? 'fa-sun text-amber-400' : 'fa-moon text-amber-300'"></i>
                    </button>
                    
                    <button @click="openMobile = !openMobile" class="p-2.5 rounded-lg text-slate-300 hover:text-white hover:bg-slate-800 focus-visible:ring-2 focus-visible:ring-amber-400 focus-visible:outline-none" aria-label="Buka Menu Navigasi">
                        <i class="fa-solid" :class="openMobile ? 'fa-xmark text-xl' : 'fa-bars text-xl'"></i>
                    </button>
                </div>

            </div>
        </div>

        <!-- Mobile Navigation Menu Accordion -->
        <div x-show="openMobile" x-transition class="lg:hidden bg-slate-950 border-b border-blue-900 px-4 pt-2 pb-6 space-y-2">
            @foreach($dynamicMenus as $navMenu)
                @if($navMenu->children->count() > 0)
                    <div class="space-y-1">
                        <button @click="mobileExpanded['menu_{{ $navMenu->id }}'] = !mobileExpanded['menu_{{ $navMenu->id }}']" class="w-full flex items-center justify-between px-3 py-2 rounded-lg text-slate-200 hover:bg-blue-900 font-medium text-sm">
                            <span class="flex items-center gap-2">
                                @if($navMenu->icon)
                                    <i class="{{ \App\Helpers\IconHelper::format($navMenu->icon) }} text-xs text-sky-400"></i>
                                @endif
                                <span>{{ $navMenu->name }}</span>
                            </span>
                            <i class="fa-solid fa-chevron-down text-xs transition-transform duration-200" :class="{'rotate-180': mobileExpanded['menu_{{ $navMenu->id }}']}"></i>
                        </button>
                        <div x-show="mobileExpanded['menu_{{ $navMenu->id }}']" x-transition class="pl-6 space-y-1">
                            @foreach($navMenu->children as $child)
                                <a href="{{ $child->url }}" target="{{ $child->target }}" class="block px-3 py-2 rounded-lg text-slate-300 hover:bg-blue-900/60 font-medium text-xs">
                                    {{ $child->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                @else
                    <a href="{{ $navMenu->url }}" target="{{ $navMenu->target }}" class="block px-3 py-2 rounded-lg text-slate-200 hover:bg-blue-900 font-medium text-sm">
                        @if($navMenu->icon)
                            <i class="{{ \App\Helpers\IconHelper::format($navMenu->icon) }} text-xs text-sky-400 mr-1.5"></i>
                        @endif
                        {{ $navMenu->name }}
                    </a>
                @endif
            @endforeach
            <div class="pt-3">
                <a href="{{ \App\Models\SiteSetting::get('pmb_link', '#') }}" target="_blank" class="block w-full text-center bg-amber-500 hover:bg-amber-600 text-slate-950 font-bold py-2.5 rounded-xl text-sm shadow">
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
                        <img src="{{ asset('images/logo-stikes-pantiwaluya.png') }}" alt="Logo STIKes Panti Waluya" class="h-10 w-auto object-contain drop-shadow shrink-0">
                        <span class="font-heading font-extrabold text-xl text-white">STIKes Panti Waluya Malang</span>
                    </div>
                    <p class="text-xs text-slate-300 leading-relaxed">
                        {{ \App\Models\SiteSetting::get('footer_description', 'Sekolah Tinggi Ilmu Kesehatan Panti Waluya Malang melahirkan tenaga kesehatan profesional, berintegritas, dan siap kerja nasional maupun internasional.') }}
                    </p>
                    <div class="text-xs text-slate-300 space-y-1.5 pt-1">
                        <p><i class="fa-solid fa-location-dot text-amber-400 mr-2"></i> {{ \App\Models\SiteSetting::get('address', 'Jl. Yulius Riefbuilder No. 5, Malang') }}</p>
                        <p><i class="fa-solid fa-phone text-sky-400 mr-2"></i> {{ \App\Models\SiteSetting::get('phone', '(0341) 369003') }}</p>
                        <p><i class="fa-solid fa-envelope text-sky-400 mr-2"></i> {{ \App\Models\SiteSetting::get('email', 'info@stikespantiwaluya.ac.id') }}</p>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="lg:col-span-3 space-y-3">
                    <h4 class="font-heading font-bold text-white text-base">Tautan Cepat</h4>
                    <ul class="space-y-2 text-xs text-slate-300">
                        <li><a href="{{ route('home') }}" class="hover:text-amber-400 transition">&bull; Beranda Utama</a></li>
                        <li><a href="{{ route('prodi.index') }}" class="hover:text-amber-400 transition">&bull; Program Studi D3/S1/Profesi</a></li>
                        <li><a href="{{ route('facilities.index') }}" class="hover:text-amber-400 transition">&bull; Fasilitas Kampus</a></li>
                    </ul>
                </div>

                <!-- Google Maps Embed Footer Card -->
                <div class="lg:col-span-5 space-y-3">
                    <h4 class="font-heading font-bold text-white text-base flex items-center gap-2">
                        <i class="fa-solid fa-map-location-dot text-amber-400"></i> Lokasi Kampus
                    </h4>
                    <div class="w-full h-44 rounded-2xl overflow-hidden border border-slate-800 bg-slate-900 shadow-md">
                        <iframe src="{{ \App\Models\SiteSetting::get('maps_embed_url', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.1327435545477!2d112.62282707488443!3d-7.985224792040181!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6281ed19836a9%3A0xa3b7da4959b42040!2sSekolah%20Tinggi%20Ilmu%20kesehatan%20Panti%20Waluya!5e0!3m2!1sid!2sid!4v1789012783861!5m2!1sid!2sid') }}" class="w-full h-full border-0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>

            </div>

            <!-- Copyright Bar -->
            <div class="pt-8 flex flex-col sm:flex-row justify-between items-center gap-4 text-xs text-slate-400">
                <div>
                    {{ \App\Models\SiteSetting::get('footer_copyright', '© ' . date('Y') . ' STIKes Panti Waluya Malang. All rights reserved.') }}
                </div>
                <div>
                    {{ \App\Models\SiteSetting::get('footer_credits', 'Dikembangkan untuk STIKes Panti Waluya Malang.') }}
                </div>
            </div>

        </div>
    </footer>

    <!-- Google Translate Hidden Element & Script -->
    <div id="google_translate_element" class="hidden"></div>
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'id',
                includedLanguages: 'id,en,zh-CN,ar',
                autoDisplay: false
            }, 'google_translate_element');
        }

        function setSiteLanguage(langCode) {
            if (langCode === 'id') {
                document.cookie = "googtrans=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
                document.cookie = "googtrans=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/; domain=" + window.location.hostname;
                document.cookie = "googtrans=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/; domain=." + window.location.hostname;
                window.location.reload();
                return;
            }
            
            document.cookie = 'googtrans=/id/' + langCode + '; path=/;';
            document.cookie = 'googtrans=/id/' + langCode + '; path=/; domain=' + window.location.hostname;
            document.cookie = 'googtrans=/id/' + langCode + '; path=/; domain=.' + window.location.hostname;
            
            const combo = document.querySelector('.goog-te-combo');
            if (combo) {
                combo.value = langCode;
                combo.dispatchEvent(new Event('change'));
            } else {
                window.location.reload();
            }
        }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

</body>
</html>
