<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - AnimeLib</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-gray-50 flex">

    <aside class="w-64 min-h-screen bg-blue-900 text-white p-6 fixed">
        <div class="mb-10">
            <h2 class="text-2xl font-bold tracking-tighter">AnimeLib<span class="text-blue-400">.</span>Admin</h2>
        </div>
        
        <nav class="space-y-2">
            <a href="/admin" class="flex items-center gap-3 py-3 px-4 rounded-xl transition {{ Request::is('admin') ? 'bg-blue-700 font-bold' : 'hover:bg-blue-800' }}">
                <span>📊</span> Dashboard
            </a>
            <a href="/admin/anime" class="flex items-center gap-3 py-3 px-4 rounded-xl transition {{ Request::is('admin/anime') ? 'bg-blue-700 font-bold' : 'hover:bg-blue-800' }}">
                <span>🎬</span> Manajemen Anime
            </a>
            <a href="/admin/feedback" class="flex items-center gap-3 py-3 px-4 rounded-xl transition {{ Request::is('admin/feedback') ? 'bg-blue-700 font-bold' : 'hover:bg-blue-800' }}">
                <span>📩</span> Masukan User
            </a>
            
            <div class="pt-10">
                <hr class="border-blue-800 mb-6">
                <a href="/" class="flex items-center gap-3 py-3 px-4 rounded-xl text-blue-300 hover:text-white transition">
                    <span>🏠</span> Kembali ke Web
                </a>
            </div>
        </nav>
    </aside>

    <main class="ml-64 flex-1 p-10">
        <header class="flex justify-between items-center mb-10 bg-white p-6 rounded-[2rem] shadow-sm border border-gray-100">
            <h1 class="text-2xl font-bold text-gray-800">@yield('title')</h1>
            <div class="flex items-center gap-4">
                <div class="text-right">
                    <p class="text-xs text-gray-400">Selamat datang,</p>
                    <p class="text-sm font-bold text-gray-700">Admin Bahrudin</p>
                </div>
                <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center text-white font-bold shadow-lg shadow-blue-200">
                    B
                </div>
            </div>
        </header>

        @yield('content')

        <footer class="mt-20 text-center text-gray-400 text-xs">
            &copy; 2026 AnimeLib Admin Panel | UNPAM System
        </footer>
    </main>

</body>
</html>