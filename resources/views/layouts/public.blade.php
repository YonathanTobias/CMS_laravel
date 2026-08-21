<!DOCTYPE html>
<html lang="id">
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
<body class="bg-slate-50 text-slate-800 font-sans antialiased flex flex-col min-h-screen">

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

                <!-- Dynamic Navbar Links (Parent & Sub-menu Dropdowns) -->
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

                <!-- PMB Action Button -->
                <div class="hidden lg:flex items-center">
                    <a href="{{ \App\Models\SiteSetting::get('pmb_link', '#') }}" target="_blank" class="bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-600 hover:to-amber-700 text-slate-950 font-extrabold px-5 py-2.5 rounded-xl shadow-lg shadow-amber-500/20 transform hover:-translate-y-0.5 transition duration-200 flex items-center gap-2">
                        <i class="fa-solid fa-graduation-cap"></i> PMB Online
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="lg:hidden flex items-center">
                    <button @click="openMobile = !openMobile" class="p-2.5 rounded-lg text-slate-300 hover:text-white hover:bg-slate-800 focus:outline-none">
                        <i class="fa-solid" :class="openMobile ? 'fa-xmark text-xl' : 'fa-bars text-xl'"></i>
                    </button>
                </div>

            </div>
        </div>

        <!-- Mobile Navigation Menu -->
        <div x-show="openMobile" x-transition class="lg:hidden bg-blue-950 border-b border-blue-900 px-4 pt-2 pb-6 space-y-3">
            @foreach($dynamicMenus as $navMenu)
                @if($navMenu->children->count() > 0)
                    <div class="py-2 border-b border-blue-900 space-y-1">
                        <div class="text-xs uppercase text-sky-400 font-bold px-3 py-1">{{ $navMenu->name }}</div>
                        @foreach($navMenu->children as $child)
                            <a href="{{ $child->url }}" target="{{ $child->target }}" class="block px-3 py-2 rounded-md text-sm text-slate-300 hover:bg-blue-900">
                                {{ $child->name }}
                            </a>
                        @endforeach
                    </div>
                @else
                    <a href="{{ $navMenu->url }}" target="{{ $navMenu->target }}" class="block px-3 py-2 rounded-md text-base font-medium text-slate-300 hover:bg-blue-900">
                        {{ $navMenu->name }}
                    </a>
                @endif
            @endforeach
            
            <a href="{{ \App\Models\SiteSetting::get('pmb_link', '#') }}" target="_blank" class="block w-full text-center bg-amber-500 text-slate-950 font-bold px-4 py-3 rounded-xl shadow mt-4">
                <i class="fa-solid fa-graduation-cap"></i> Daftar PMB Online
            </a>
        </div>
    </header>

    <!-- Page Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-navy-950 text-slate-300 border-t border-blue-950 pt-16 pb-12 mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">
                
                <!-- Col 1: Identity & Official Logo -->
                <div>
                    <div class="flex items-center gap-3.5 mb-5">
                        <div class="w-12 h-12 rounded-xl bg-white p-1 flex items-center justify-center shrink-0 shadow-md">
                            <img src="{{ asset('images/logo-stikes-pantiwaluya.png') }}" alt="Logo STIKes Panti Waluya Malang" class="h-10 w-auto object-contain">
                        </div>
                        <span class="font-heading font-bold text-xl text-white">{{ \App\Models\SiteSetting::get('site_name', 'STIKes Panti Waluya') }}</span>
                    </div>
                    <p class="text-sm text-slate-400 mb-6 leading-relaxed">
                        {{ \App\Models\SiteSetting::get('footer_description', 'Sekolah Tinggi Ilmu Kesehatan Panti Waluya Malang melahirkan insan kesehatan yang profesional, adaptif, dan berkarakter kasih.') }}
                    </p>
                    <div class="space-y-3 text-sm">
                        <div class="flex items-start gap-3">
                            <i class="fa-solid fa-location-dot text-blue-400 mt-1"></i>
                            <span class="text-slate-400">{{ \App\Models\SiteSetting::get('address') }}</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <i class="fa-solid fa-phone text-blue-400"></i>
                            <span class="text-slate-400">{{ \App\Models\SiteSetting::get('phone') }}</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <i class="fa-solid fa-envelope text-blue-400"></i>
                            <span class="text-slate-400">{{ \App\Models\SiteSetting::get('email') }}</span>
                        </div>
                    </div>
                </div>

                <!-- Col 2: Program Studi -->
                <div>
                    <h4 class="font-heading font-bold text-white text-lg mb-5 border-b border-blue-900 pb-2">Program Studi</h4>
                    <ul class="space-y-3 text-sm">
                        @foreach(\App\Models\ProgramStudi::where('is_active', true)->get() as $prodi)
                            <li>
                                <a href="{{ route('prodi.show', $prodi->slug) }}" class="hover:text-blue-400 transition flex items-center gap-2">
                                    <i class="fa-solid fa-chevron-right text-xs text-blue-500"></i> {{ $prodi->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Col 3: Link Cepat & Sosial Media -->
                <div>
                    <h4 class="font-heading font-bold text-white text-lg mb-5 border-b border-blue-900 pb-2">Tautan Cepat</h4>
                    <ul class="space-y-3 text-sm mb-6">
                        <li><a href="{{ route('news.index') }}" class="hover:text-blue-400 transition flex items-center gap-2"><i class="fa-solid fa-chevron-right text-xs text-blue-500"></i> Berita & Pengumuman</a></li>
                        <li><a href="{{ route('spmi.index') }}" class="hover:text-blue-400 transition flex items-center gap-2"><i class="fa-solid fa-chevron-right text-xs text-blue-500"></i> Repositori SPMI & Akreditasi</a></li>
                        <li><a href="{{ route('facilities.index') }}" class="hover:text-blue-400 transition flex items-center gap-2"><i class="fa-solid fa-chevron-right text-xs text-blue-500"></i> Sarana & Laboratorium</a></li>
                        <li><a href="{{ \App\Models\SiteSetting::get('pmb_link', '#') }}" target="_blank" class="text-amber-400 font-semibold hover:underline flex items-center gap-2"><i class="fa-solid fa-graduation-cap text-xs"></i> Portal PMB Online</a></li>
                    </ul>

                    <h5 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-3">Media Sosial Kampus</h5>
                    <div class="flex gap-3">
                        <a href="{{ \App\Models\SiteSetting::get('facebook', '#') }}" target="_blank" class="w-9 h-9 rounded-xl bg-blue-950 border border-blue-900 flex items-center justify-center text-slate-400 hover:text-white hover:bg-blue-600 hover:border-blue-500 transition">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                        <a href="{{ \App\Models\SiteSetting::get('instagram', '#') }}" target="_blank" class="w-9 h-9 rounded-xl bg-blue-950 border border-blue-900 flex items-center justify-center text-slate-400 hover:text-white hover:bg-pink-600 hover:border-pink-500 transition">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                        <a href="{{ \App\Models\SiteSetting::get('youtube', '#') }}" target="_blank" class="w-9 h-9 rounded-xl bg-blue-950 border border-blue-900 flex items-center justify-center text-slate-400 hover:text-white hover:bg-red-600 hover:border-red-500 transition">
                            <i class="fa-brands fa-youtube"></i>
                        </a>
                    </div>
                </div>

                <!-- Col 4: Google Maps Embed Kampus -->
                <div>
                    <h4 class="font-heading font-bold text-white text-lg mb-5 border-b border-blue-900 pb-2 flex items-center gap-2">
                        <i class="fa-solid fa-map-location-dot text-sky-400"></i> Lokasi Kampus
                    </h4>
                    <div class="rounded-2xl overflow-hidden shadow-xl border border-blue-900/80 h-48 bg-slate-900">
                        <iframe src="{{ \App\Models\SiteSetting::get('maps_embed_url', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.2721868351744!2d112.6247!3d-7.9708!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e788280f5555555%3A0x0!2sSTIKes%20Panti%20Waluya%20Malang!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid') }}" class="w-full h-full border-0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <a href="https://maps.google.com" target="_blank" class="text-xs text-sky-400 hover:underline mt-2 inline-block font-semibold">
                        <i class="fa-solid fa-arrow-up-right-from-square text-[10px] mr-1"></i> Buka Petunjuk Arah Google Maps
                    </a>
                </div>

            </div>

            <div class="border-t border-blue-950 pt-8 flex flex-col md:flex-row justify-between items-center text-xs text-slate-500">
                <p>{{ \App\Models\SiteSetting::get('footer_copyright', '© ' . date('Y') . ' STIKes Panti Waluya Malang. All rights reserved.') }}</p>
                <p class="mt-2 md:mt-0">{{ \App\Models\SiteSetting::get('footer_credits', 'CMS & Website Powered by Laravel Engine') }}</p>
            </div>
        </div>
    </footer>

    <!-- Floating WhatsApp PMB Button -->
    <a href="https://wa.me/6281234567890?text=Halo%20Admin%20PMB%20STIKes%20Panti%20Waluya%20Malang" target="_blank" class="fixed bottom-6 right-6 z-50 bg-emerald-500 hover:bg-emerald-600 text-white w-14 h-14 rounded-full shadow-2xl flex items-center justify-center text-2xl transform hover:scale-110 transition duration-300 group" title="Hubungi PMB WhatsApp">
        <i class="fa-brands fa-whatsapp"></i>
        <span class="absolute right-16 bg-blue-950 text-white text-xs font-semibold px-3 py-1.5 rounded-lg whitespace-nowrap opacity-0 group-hover:opacity-100 transition shadow-lg pointer-events-none">
            Tanya PMB (WhatsApp)
        </span>
    </a>

</body>
</html>
