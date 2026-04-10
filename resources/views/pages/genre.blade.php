@extends('layouts.main')

@section('container')
<div class="max-w-7xl mx-auto px-6 py-12">
    <h1 class="text-4xl font-extrabold text-gray-900 mb-12">Semua <span class="text-blue-600">Genre Anime</span></h1>

    @foreach($allGenreData as $data)
    @if(count($data['animes']) > 0) {{-- Hanya tampilkan genre yang ada animenya --}}
    <div class="mb-16">
        <div class="flex items-center gap-3 mb-6">
            <div class="w-2 h-8 bg-blue-600 rounded-full"></div>
            <h2 class="text-2xl font-bold text-gray-800">{{ $data['name'] }}</h2>
        </div>
        
        <div class="flex overflow-x-auto gap-6 pb-6 scrollbar-hide">
            @foreach($data['animes'] as $anime)
            <div class="min-w-[180px] md:min-w-[200px] group">
                <div class="relative overflow-hidden rounded-2xl shadow-md mb-3">
                    <img src="{{ $anime['images']['jpg']['large_image_url'] }}" 
                         class="w-full aspect-[3/4] object-cover group-hover:scale-110 transition duration-500">
                    <div class="absolute top-2 right-2 bg-blue-600 text-white text-[10px] font-bold px-2 py-1 rounded-lg shadow-lg">
                        ⭐ {{ $anime['score'] ?? 'N/A' }}
                    </div>
                </div>
                <h3 class="font-bold text-gray-800 text-sm truncate group-hover:text-blue-600 transition">{{ $anime['title'] }}</h3>
            </div>
            @endforeach
        </div>
    </div>
    @endif
    @endforeach

</div>

<style>
    .scrollbar-hide::-webkit-scrollbar { display: none; }
    .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
</style>
@endsection