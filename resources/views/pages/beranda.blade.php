@extends('layouts.main')

@section('container')
<div class="max-w-7xl mx-auto px-6 py-12">
    
    <div class="mb-16 border-b border-gray-100 pb-12">
        <h1 class="text-5xl font-extrabold text-gray-900 mb-6">
            Selamat Datang di <span class="text-blue-600">AnimeLib</span>
        </h1>
        <p class="text-xl text-gray-600 leading-relaxed max-w-4xl">
            AnimeLib adalah platform perpustakaan digital anime yang dibangun dengan Laravel 12. 
            Website ini dirancang untuk memudahkan para penggemar anime dalam menjelajahi ribuan judul, 
            melihat detail studio, genre, hingga memberikan rating pribadi.
             Dengan antarmuka yang sederhana dan responsif, AnimeLib memberikan pengalaman eksplorasi anime yang menyenangkan dan informatif.
             
        </p>
        <div class="mt-8">
            <button class="bg-blue-600 text-white px-8 py-3 rounded-lg font-bold hover:bg-blue-700 shadow-lg shadow-blue-200 transition">
                Mulai Eksplorasi
            </button>
        </div>
    </div>

    <div class="flex items-center justify-between mb-8">
        <h2 class="text-2xl font-bold text-gray-800 italic">Daftar Anime Populer</h2>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6">
        @foreach($animes as $anime)
        <div class="group">
            <div class="relative overflow-hidden rounded-xl shadow-sm border border-gray-200 mb-3">
                <img src="{{ $anime['images']['jpg']['large_image_url'] }}" 
                     class="w-full aspect-[3/4] object-cover group-hover:opacity-80 transition"
                     alt="{{ $anime['title'] }}">
                
                <div class="absolute top-2 right-2 bg-blue-600 text-white text-[10px] font-bold px-2 py-1 rounded">
                    ⭐ {{ $anime['score'] }}
                </div>
            </div>
            
            <h3 class="font-bold text-gray-800 text-sm truncate">{{ $anime['title'] }}</h3>
            
            <p class="text-xs text-blue-600 font-semibold">
                {{ $anime['genres'][0]['name'] ?? 'Unknown' }}
            </p>
        </div>
        @endforeach
    </div>

</div> @endsection