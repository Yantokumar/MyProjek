<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AnimeLib - Pro</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; padding-top: 80px; } /* Jarak agar konten tidak tertutup navbar */
    </style>
</head>
<body class="bg-white">

    <nav class="fixed top-0 left-0 right-0 z-[999] bg-blue-600 text-white shadow-lg h-20 flex items-center">
        <div class="max-w-7xl mx-auto px-6 w-full flex items-center justify-between">
            <div class="text-2xl font-extrabold tracking-tighter">
                <a href="/">AnimeLib<span class="text-blue-200">.</span></a>
            </div>
            
            <div class="hidden md:flex items-center gap-8 font-semibold text-sm">
                <a href="/" class="{{ Request::is('/') ? 'text-blue-200' : '' }} hover:text-blue-200 transition">Home</a>
                <a href="/genre" class="{{ Request::is('genre') ? 'text-blue-200' : '' }} hover:text-blue-200 transition">Genre</a>
                <a href="/tentang" class="{{ Request::is('tentang') ? 'text-blue-200' : '' }} hover:text-blue-200 transition">Tentang</a>
                
                @auth
                    <a href="/favorit" class="{{ Request::is('favorit') ? 'text-blue-200' : '' }} hover:text-blue-200 transition flex items-center gap-1">
                        Favorit <span class="text-xs">⭐</span>
                    </a>
                    
                    <div class="flex items-center gap-4 pl-4 border-l border-blue-500">
                        <span class="text-xs font-medium opacity-80 italic">Halo, {{ Auth::user()->name }}</span>
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition text-xs shadow-md">
                                Logout
                            </button>
                        </form>
                    </div>
                @else
                    <div class="flex items-center gap-4">
                        <a href="/register" class="hover:text-blue-200 transition">Daftar</a>
                        <a href="/login" class="bg-white text-blue-600 px-6 py-2 rounded-lg hover:bg-blue-50 transition shadow-md">
                            Login
                        </a>
                    </div>
                @endauth
            </div>
        </div>
    </nav>

    <main>
        @yield('container')
    </main>

</body>
</html>