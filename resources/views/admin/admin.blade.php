<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Admin Dashboard - AnimeLib</title>
</head>
<body class="bg-gray-50 flex">

    <aside class="w-64 min-h-screen bg-blue-900 text-white p-6 fixed">
        <h2 class="text-2xl font-bold mb-10">Admin<span class="text-blue-400">Panel</span></h2>
        <nav class="space-y-4">
            <a href="/admin" class="block py-2.5 px-4 rounded transition hover:bg-blue-800 bg-blue-800">Dashboard</a>
            <a href="/admin/anime" class="block py-2.5 px-4 rounded transition hover:bg-blue-800">Data Anime</a>
            <a href="/admin/genre" class="block py-2.5 px-4 rounded transition hover:bg-blue-800">Data Genre</a>
            <a href="/admin/feedback" class="block py-2.5 px-4 rounded transition hover:bg-blue-800">Masukan</a>
            <hr class="border-blue-700">
            <a href="/" class="block py-2.5 px-4 rounded text-gray-400 hover:text-white">Lihat Website</a>
        </nav>
    </aside>

    <main class="ml-64 flex-1 p-10">
        <header class="flex justify-between items-center mb-10">
            <h1 class="text-3xl font-bold text-gray-800">@yield('title')</h1>
            <div class="flex items-center gap-4">
                <span class="text-sm font-medium text-gray-500">Halo, Bahrudin!</span>
                <div class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center text-white">B</div>
            </div>
        </header>

        @yield('content')
    </main>

</body>
</html>