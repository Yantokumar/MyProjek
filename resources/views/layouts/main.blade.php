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
                AnimeLib<span class="text-blue-200">.</span>
            </div>
            <div class="hidden md:flex items-center gap-8 font-semibold text-sm">
                <a href="/" class="hover:text-blue-200 transition">Home</a>
                <a href="/genre" class="hover:text-blue-200 transition">Genre</a>
                <a href="/favorit" class="hover:text-blue-200 transition">Favorit</a>
                <a href="/tentang" class="hover:text-blue-200 transition">Tentang</a>
                <a href="/login" class="bg-white text-blue-600 px-5 py-2 rounded-lg hover:bg-blue-50 transition">Login</a>
            </div>
        </div>
    </nav>

    <main>
        @yield('container')
    </main>

</body>
</html>