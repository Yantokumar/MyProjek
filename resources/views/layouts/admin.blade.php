<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') — AnimeLib</title>
    
    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            50: '#f0f7ff',
                            100: '#e0effe',
                            500: '#0e8ce9',
                            600: '#0270c7',
                            700: '#0359a1',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 min-h-screen flex antialiased text-slate-800">

    <!-- SIDEBAR -->
    <aside class="w-64 min-h-screen bg-slate-900 text-white p-6 fixed flex flex-col justify-between z-30 shadow-2xl shadow-slate-950/20">
        <div>
            <!-- Brand -->
            <div class="flex items-center gap-3 mb-10 pb-6 border-b border-slate-800">
                <div class="w-10 h-10 rounded-2xl bg-gradient-to-tr from-brand-600 via-blue-600 to-indigo-600 p-1 flex items-center justify-center text-white shadow-md shadow-brand-500/25">
                    <x-icon-brand class="w-full h-full" />
                </div>
                <div>
                    <h2 class="text-base font-black tracking-tight">Anime<span class="text-brand-400">Lib</span></h2>
                    <span class="text-[9px] font-black text-brand-300 uppercase tracking-widest">CONTROL PANEL</span>
                </div>
            </div>
            
            <!-- Navigation -->
            <nav class="space-y-1.5 text-xs font-bold">
                <a href="/admin" class="flex items-center gap-3 py-3 px-4 rounded-2xl transition-all {{ Request::is('admin') ? 'bg-brand-600 text-white shadow-lg shadow-brand-600/30' : 'text-slate-400 hover:text-white hover:bg-slate-800/60' }}">
                    <x-icon-sparkle class="w-4 h-4 {{ Request::is('admin') ? 'text-white' : 'text-brand-400' }}" />
                    <span>Overview</span>
                </a>
                <a href="/admin/anime" class="flex items-center gap-3 py-3 px-4 rounded-2xl transition-all {{ Request::is('admin/anime*') ? 'bg-brand-600 text-white shadow-lg shadow-brand-600/30' : 'text-slate-400 hover:text-white hover:bg-slate-800/60' }}">
                    <x-icon-film class="w-4 h-4 {{ Request::is('admin/anime*') ? 'text-white' : 'text-indigo-400' }}" />
                    <span>Katalog Anime</span>
                </a>
                <a href="/admin/feedback" class="flex items-center gap-3 py-3 px-4 rounded-2xl transition-all {{ Request::is('admin/feedback') ? 'bg-brand-600 text-white shadow-lg shadow-brand-600/30' : 'text-slate-400 hover:text-white hover:bg-slate-800/60' }}">
                    <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                    </svg>
                    <span>Masukan User</span>
                </a>
                <a href="/admin/users" class="flex items-center gap-3 py-3 px-4 rounded-2xl transition-all {{ Request::is('admin/users') ? 'bg-brand-600 text-white shadow-lg shadow-brand-600/30' : 'text-slate-400 hover:text-white hover:bg-slate-800/60' }}">
                    <svg class="w-4 h-4 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                    <span>Kelola User</span>
                </a>
            </nav>
        </div>

        <!-- Sidebar Footer -->
        <div class="pt-6 border-t border-slate-800 space-y-3">
            <a href="/" class="flex items-center gap-2.5 py-2.5 px-3 rounded-xl text-xs font-bold text-slate-400 hover:text-white hover:bg-slate-800 transition">
                <svg class="w-4 h-4 text-brand-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                <span>Lihat Situs Web</span>
            </a>
            
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full flex items-center gap-2.5 py-2.5 px-3 rounded-xl text-xs font-bold text-rose-400 hover:text-white hover:bg-rose-600 transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                    <span>Keluar Sesi</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- CONTENT WRAPPER -->
    <div class="flex-1 ml-64 p-10 min-h-screen">
        
        <!-- TOP STATUS BAR -->
        <header class="flex items-center justify-between pb-8 mb-8 border-b border-slate-200">
            <div>
                <h1 class="text-2xl font-black text-slate-900 tracking-tight">@yield('header', 'Dashboard')</h1>
                <p class="text-xs text-slate-400 font-medium">Panel Administrasi & Manajemen Data AnimeLib</p>
            </div>

            <div class="flex items-center gap-3">
                <div class="text-right">
                    <span class="block text-xs font-extrabold text-slate-900">{{ Auth::user()->name }}</span>
                    <span class="block text-[10px] text-brand-600 font-bold uppercase tracking-wider">Super Administrator</span>
                </div>
                <div class="w-10 h-10 rounded-2xl bg-gradient-to-tr from-brand-600 to-indigo-600 text-white font-extrabold flex items-center justify-center text-sm shadow-md shadow-brand-500/20">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
            </div>
        </header>

        <!-- FLASH NOTICES -->
        @if(session('success'))
            <div class="mb-6 bg-emerald-50 border border-emerald-200 text-emerald-900 px-5 py-3.5 rounded-2xl text-xs font-bold flex items-center justify-between shadow-sm">
                <div class="flex items-center gap-2.5">
                    <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
                <button onclick="this.parentElement.remove()" class="text-emerald-500 hover:text-emerald-800 text-base font-bold">&times;</button>
            </div>
        @endif

        @yield('content')

    </div>

</body>
</html>