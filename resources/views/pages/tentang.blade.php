@extends('layouts.main')

@section('container')
<div class="max-w-4xl mx-auto px-6 py-12">
    
    <div class="bg-white rounded-[2.5rem] shadow-2xl shadow-blue-50 border border-gray-100 p-8 md:p-12 mb-10">
        <h1 class="text-3xl font-extrabold text-gray-900 mb-6 border-b-4 border-blue-600 inline-block">
            Tentang <span class="text-blue-600">AnimeLib</span>
        </h1>
        
        <div class="space-y-6 text-gray-600 leading-relaxed text-lg">
            <p>
                <strong class="text-gray-900">AnimeLib</strong> adalah platform perpustakaan anime digital yang dirancang untuk membantu para penggemar anime dalam menjelajahi judul-judul populer. Terinspirasi dari kemudahan penggunaan MyAnimeList, kami menyederhanakan antarmuka agar Anda bisa fokus menemukan tontonan berikutnya tanpa gangguan.
            </p>
            <p>
                Situs ini masih dalam tahap pengembangan awal oleh tim. Mungkin kedepan akan ada banyak fitur menarik lainnya yang ditambahkan, seperti sistem rekomendasi berbasis preferensi pengguna, komunitas diskusi, dan lainnya.
            </p>
            <p class="font-semibold text-blue-600 italic">
                AnimeLib team sangat berterimakakasih kepada pengguna yang sudah berkunjungi situs ini.
            </p>
        </div>

        <div class="mt-10">
            <h3 class="font-bold text-gray-900 mb-6 flex items-center gap-2">
                <span class="w-2 h-6 bg-blue-600 rounded-full"></span>
                Fitur Utama:
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="bg-blue-50 border border-blue-100 p-4 rounded-2xl flex items-center gap-3">
                    <span class="text-2xl">🔥</span>
                    <span class="font-bold text-blue-800 text-sm">Daftar Anime Populer</span>
                </div>
                <div class="bg-blue-50 border border-blue-100 p-4 rounded-2xl flex items-center gap-3">
                    <span class="text-2xl">🏷️</span>
                    <span class="font-bold text-blue-800 text-sm">Filter Berdasarkan Genre</span>
                </div>
                <div class="bg-blue-50 border border-blue-100 p-4 rounded-2xl flex items-center gap-3">
                    <span class="text-2xl">⭐</span>
                    <span class="font-bold text-blue-800 text-sm">Sistem Favorit Personal</span>
                </div>
                <div class="bg-blue-50 border border-blue-100 p-4 rounded-2xl flex items-center gap-3">
                    <span class="text-2xl">✨</span>
                    <span class="font-bold text-blue-800 text-sm">Desain Minimalis & Elegan</span>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-[2.5rem] shadow-2xl shadow-blue-50 border border-gray-100 p-8 md:p-12">
        <h2 class="text-2xl font-extrabold text-gray-900 mb-2">Masukan untuk Web</h2>
        <p class="text-gray-500 mb-8">Punya ide fitur baru atau menemukan bug? Beritahu kami lewat formulir di bawah ini!</p>

        <form action="#" method="POST">
            @csrf
            <div class="mb-6">
                <label class="block text-sm font-bold text-gray-700 mb-3 ml-1">Pesan Anda:</label>
                <textarea 
                    rows="4" 
                    class="w-full px-5 py-4 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-2 focus:ring-blue-600 focus:border-transparent outline-none transition text-sm resize-none"
                    placeholder="Tuliskan kritik, saran, atau masukan Anda di sini..."></textarea>
            </div>
            <button type="submit" class="bg-blue-600 text-white px-10 py-4 rounded-2xl font-bold hover:bg-blue-700 shadow-lg shadow-blue-200 transition duration-300">
                Kirim Masukan
            </button>
        </form>
    </div>

</div>
@endsection