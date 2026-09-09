<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AnimeLib — Platform Perpustakaan Anime Digital</title>
    
    <!-- Google Fonts: Plus Jakarta Sans & Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS CDN with configuration -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'Inter', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            50: '#f0f7ff',
                            100: '#e0effe',
                            200: '#bae0fd',
                            300: '#7cc7fb',
                            400: '#38a9f8',
                            500: '#0e8ce9',
                            600: '#0270c7',
                            700: '#0359a1',
                            800: '#074b84',
                            900: '#0c3f6e',
                            950: '#082849',
                        }
                    }
                }
            }
        }
    </script>
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8fafc;
            color: #0f172a;
            padding-top: 80px;
        }
        .glass-nav {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
        }
        .cyber-grid {
            background-image: radial-gradient(rgba(14, 140, 233, 0.12) 1px, transparent 1px);
            background-size: 24px 24px;
        }
        .scrollbar-none::-webkit-scrollbar {
            display: none;
        }
        .scrollbar-none {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>
<body class="min-h-screen flex flex-col antialiased selection:bg-brand-500 selection:text-white">

    <!-- FLOATING BLURRED NAVBAR -->
    <nav class="fixed top-0 left-0 right-0 z-50 glass-nav border-b border-slate-200/70 shadow-sm transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
            
            <!-- BRAND CREST & TITLE -->
            <a href="/" class="flex items-center gap-3.5 group">
                <div class="w-11 h-11 rounded-2xl bg-gradient-to-tr from-brand-600 via-blue-600 to-indigo-600 p-1.5 flex items-center justify-center text-white shadow-lg shadow-brand-500/25 group-hover:scale-105 group-hover:shadow-brand-500/40 transition-all duration-300">
                    <x-icon-brand class="w-full h-full" />
                </div>
                <div class="flex flex-col">
                    <div class="flex items-center gap-1.5">
                        <span class="text-xl font-black tracking-tight text-slate-900 group-hover:text-brand-600 transition-colors">
                            Anime<span class="text-brand-600">Lib</span>
                        </span>
                        <span class="px-2 py-0.5 text-[9px] font-black uppercase tracking-widest bg-gradient-to-r from-brand-50 to-indigo-50 text-brand-700 rounded-full border border-brand-200/80">PRO</span>
                    </div>
                    <span class="text-[10px] font-bold text-slate-400 -mt-0.5 tracking-wider uppercase">アニメライブラリ</span>
                </div>
            </a>

            <!-- DESKTOP NAVIGATION -->
            <div class="hidden md:flex items-center gap-1.5">
                <a href="/" class="px-4 py-2 rounded-xl text-sm font-bold transition-all duration-200 {{ Request::is('/') ? 'bg-brand-50 text-brand-600 shadow-sm ring-1 ring-brand-200/60' : 'text-slate-600 hover:text-brand-600 hover:bg-slate-100/70' }}">
                    Home
                </a>
                <a href="/genre" class="px-4 py-2 rounded-xl text-sm font-bold transition-all duration-200 {{ Request::is('genre') ? 'bg-brand-50 text-brand-600 shadow-sm ring-1 ring-brand-200/60' : 'text-slate-600 hover:text-brand-600 hover:bg-slate-100/70' }}">
                    Genre
                </a>
                <a href="/tentang" class="px-4 py-2 rounded-xl text-sm font-bold transition-all duration-200 {{ Request::is('tentang') ? 'bg-brand-50 text-brand-600 shadow-sm ring-1 ring-brand-200/60' : 'text-slate-600 hover:text-brand-600 hover:bg-slate-100/70' }}">
                    Tentang
                </a>
                
                @auth
                    <a href="/favorit" class="px-4 py-2 rounded-xl text-sm font-bold transition-all duration-200 {{ Request::is('favorit') ? 'bg-brand-50 text-brand-600 shadow-sm ring-1 ring-brand-200/60' : 'text-slate-600 hover:text-brand-600 hover:bg-slate-100/70' }} flex items-center gap-2">
                        <x-icon-heart class="w-4 h-4 text-rose-500" />
                        <span>Favorit</span>
                    </a>

                    @if(Auth::user()->role === 'admin')
                        <a href="/admin" class="ml-1 px-3.5 py-2 rounded-xl text-xs font-black uppercase tracking-wider bg-slate-900 text-white hover:bg-brand-600 transition-all duration-200 flex items-center gap-2 shadow-sm">
                            <x-icon-shield class="w-3.5 h-3.5 text-brand-400" />
                            <span>Admin</span>
                        </a>
                    @endif

                    <!-- User Profile Dropdown / Actions -->
                    <div class="flex items-center gap-3 pl-4 ml-2 border-l border-slate-200/80">
                        <div class="w-9 h-9 rounded-xl bg-gradient-to-tr from-brand-100 to-indigo-100 border border-brand-200/70 flex items-center justify-center text-brand-700 font-extrabold text-xs shadow-sm">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                        <div class="flex flex-col">
                            <span class="text-xs font-bold text-slate-800 max-w-[110px] truncate">{{ Auth::user()->name }}</span>
                            <span class="text-[10px] text-slate-400 font-medium capitalize">{{ Auth::user()->role }}</span>
                        </div>
                        
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" title="Keluar dari akun" class="p-2 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded-xl transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                </svg>
                            </button>
                        </form>
                    </div>
                @else
                    <div class="flex items-center gap-2.5 pl-4 ml-2 border-l border-slate-200/80">
                        <a href="/login" class="px-4 py-2 rounded-xl text-sm font-bold text-slate-600 hover:text-brand-600 hover:bg-slate-100/70 transition-all">
                            Masuk
                        </a>
                        <a href="/register" class="px-5 py-2.5 rounded-xl text-xs font-black uppercase tracking-wider text-white bg-gradient-to-r from-brand-600 via-blue-600 to-indigo-600 hover:from-brand-700 hover:to-indigo-700 shadow-md shadow-brand-500/25 hover:shadow-lg hover:shadow-brand-500/35 transition-all">
                            Daftar Akun
                        </a>
                    </div>
                @endauth
            </div>

            <!-- MOBILE TOGGLE BUTTON -->
            <button onclick="document.getElementById('mobile-menu').classList.toggle('hidden')" class="md:hidden p-2.5 rounded-xl text-slate-600 hover:bg-slate-100 transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/>
                </svg>
            </button>
        </div>

        <!-- MOBILE MENU DROPDOWN -->
        <div id="mobile-menu" class="hidden md:hidden border-t border-slate-100 bg-white/95 backdrop-blur-2xl px-6 py-5 space-y-3 shadow-2xl">
            <a href="/" class="block px-3 py-2 rounded-xl font-bold text-slate-700 hover:bg-brand-50 hover:text-brand-600">Home</a>
            <a href="/genre" class="block px-3 py-2 rounded-xl font-bold text-slate-700 hover:bg-brand-50 hover:text-brand-600">Genre</a>
            <a href="/tentang" class="block px-3 py-2 rounded-xl font-bold text-slate-700 hover:bg-brand-50 hover:text-brand-600">Tentang</a>
            @auth
                <a href="/favorit" class="flex items-center gap-2 px-3 py-2 rounded-xl font-bold text-slate-700 hover:bg-brand-50 hover:text-brand-600">
                    <x-icon-heart class="w-4 h-4 text-rose-500" />
                    <span>Favorit</span>
                </a>
                @if(Auth::user()->role === 'admin')
                    <a href="/admin" class="flex items-center gap-2 px-3 py-2 rounded-xl font-bold text-brand-600 bg-brand-50">
                        <x-icon-shield class="w-4 h-4 text-brand-600" />
                        <span>Panel Admin</span>
                    </a>
                @endif
                <div class="pt-3 border-t border-slate-100 flex items-center justify-between">
                    <span class="text-xs font-bold text-slate-600">{{ Auth::user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="px-3.5 py-1.5 rounded-lg text-xs font-bold bg-rose-50 text-rose-600 hover:bg-rose-100">Logout</button>
                    </form>
                </div>
            @else
                <div class="pt-3 border-t border-slate-100 flex items-center gap-3">
                    <a href="/login" class="flex-1 text-center py-2.5 rounded-xl text-sm font-bold border border-slate-200 text-slate-700">Masuk</a>
                    <a href="/register" class="flex-1 text-center py-2.5 rounded-xl text-sm font-black uppercase tracking-wider bg-brand-600 text-white shadow-md shadow-brand-500/20">Daftar</a>
                </div>
            @endauth
        </div>
    </nav>

    <!-- MAIN WRAPPER -->
    <main class="flex-grow max-w-7xl mx-auto w-full px-4 sm:px-6 lg:px-8 pt-4 pb-16">

        <!-- GLOBAL FLASH NOTIFICATIONS -->
        @if(session('success'))
            <div class="mb-6 bg-emerald-50/95 border border-emerald-200 text-emerald-900 px-5 py-4 rounded-2xl text-sm font-semibold flex items-center justify-between shadow-sm">
                <div class="flex items-center gap-3">
                    <div class="w-7 h-7 rounded-xl bg-emerald-500 text-white flex items-center justify-center shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                    <span>{{ session('success') }}</span>
                </div>
                <button onclick="this.parentElement.remove()" class="text-emerald-600 hover:text-emerald-900 text-lg font-bold px-1.5">&times;</button>
            </div>
        @endif

        @if(session('error'))
            <div class="mb-6 bg-rose-50/95 border border-rose-200 text-rose-900 px-5 py-4 rounded-2xl text-sm font-semibold flex items-center justify-between shadow-sm">
                <div class="flex items-center gap-3">
                    <div class="w-7 h-7 rounded-xl bg-rose-500 text-white flex items-center justify-center shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 9v4m0 4h.01"/>
                        </svg>
                    </div>
                    <span>{{ session('error') }}</span>
                </div>
                <button onclick="this.parentElement.remove()" class="text-rose-600 hover:text-rose-900 text-lg font-bold px-1.5">&times;</button>
            </div>
        @endif

        @yield('container')
    </main>

    <!-- MODERN FOOTER -->
    <footer class="bg-white border-t border-slate-200/80 mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="flex flex-col md:flex-row items-center justify-between gap-6">
                <div class="flex items-center gap-3.5">
                    <div class="w-10 h-10 rounded-2xl bg-gradient-to-tr from-brand-600 to-indigo-600 p-1 flex items-center justify-center text-white shadow-md shadow-brand-500/20">
                        <x-icon-brand class="w-full h-full" />
                    </div>
                    <div>
                        <div class="flex items-center gap-2">
                            <span class="font-black text-slate-900 text-base">Anime<span class="text-brand-600">Lib</span></span>
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                            <span class="text-[10px] font-bold text-emerald-600 uppercase tracking-wider">Online</span>
                        </div>
                        <p class="text-xs text-slate-400">Platform Katalog & Perpustakaan Digital Anime</p>
                    </div>
                </div>

                <div class="flex flex-wrap items-center justify-center gap-6 text-xs font-bold text-slate-500">
                    <a href="/" class="hover:text-brand-600 transition">Beranda</a>
                    <a href="/genre" class="hover:text-brand-600 transition">Koleksi Genre</a>
                    <a href="/tentang" class="hover:text-brand-600 transition">Tentang Kami</a>
                    <a href="https://jikan.moe" target="_blank" class="hover:text-brand-600 transition">Jikan MAL API</a>
                </div>

                <p class="text-xs text-slate-400 font-medium">
                    &copy; {{ date('Y') }} AnimeLib Digital. Built with Laravel 12.
                </p>
            </div>
        </div>
    </footer>

</body>
</html>