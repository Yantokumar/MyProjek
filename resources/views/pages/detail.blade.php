@extends('layouts.main')

@section('container')
<div class="max-w-6xl mx-auto px-6 py-12">
    <div class="flex flex-col md:flex-row gap-12">
        <div class="w-full md:w-1/3">
            <div class="sticky top-24">
                <img src="{{ $anime['images']['jpg']['large_image_url'] }}" 
                     class="w-full rounded-[2.5rem] shadow-2xl shadow-blue-200 border-4 border-white" 
                     alt="{{ $anime['title'] }}">
                
                <div class="mt-6 flex flex-col gap-3">
                    <div class="bg-blue-600 text-white p-4 rounded-2xl text-center">
                        <p class="text-xs opacity-80 uppercase font-bold tracking-wider">Skor Global</p>
                        <p class="text-3xl font-black">⭐ {{ $anime['score'] ?? 'N/A' }}</p>
                    </div>
                    <form action="/add-favorite" method="POST">
    @csrf
    <input type="hidden" name="mal_id" value="{{ $anime['mal_id'] }}">
    <input type="hidden" name="judul" value="{{ $anime['title'] }}">
    <input type="hidden" name="gambar" value="{{ $anime['images']['jpg']['large_image_url'] }}">
    
    <button type="submit" class="w-full py-4 bg-gray-900 text-white font-bold rounded-2xl hover:bg-blue-700 shadow-lg transition">
        + Tambah ke Favorit
    </button>
</form>
                </div>
            </div>
        </div>

        <div class="w-full md:w-2/3">
            <h1 class="text-5xl font-black text-gray-900 mb-4 tracking-tighter leading-tight">
                {{ $anime['title'] }}
            </h1>
            
            <div class="flex flex-wrap gap-2 mb-8">
                @foreach($anime['genres'] as $genre)
                <span class="bg-blue-50 text-blue-600 px-4 py-1.5 rounded-full text-sm font-bold border border-blue-100">
                    {{ $genre['name'] }}
                </span>
                @endforeach
                <span class="bg-gray-100 text-gray-600 px-4 py-1.5 rounded-full text-sm font-bold">
                    {{ $anime['type'] }} • {{ $anime['episodes'] ?? '?' }} Eps
                </span>
            </div>

            <div class="bg-white rounded-[2rem] p-8 shadow-sm border border-gray-100 mb-8">
                <h3 class="text-xl font-extrabold text-gray-800 mb-4 flex items-center gap-2">
                    <span class="w-2 h-6 bg-blue-600 rounded-full"></span> Sinopsis
                </h3>
                <p class="text-gray-600 leading-relaxed text-lg italic">
                    {{ $anime['synopsis'] ?? 'Sinopsis tidak tersedia untuk judul ini.' }}
                </p>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="p-5 bg-gray-50 rounded-2xl">
                    <p class="text-xs text-gray-400 font-bold uppercase mb-1">Status</p>
                    <p class="font-bold text-gray-800">{{ $anime['status'] }}</p>
                </div>
                <div class="p-5 bg-gray-50 rounded-2xl">
                    <p class="text-xs text-gray-400 font-bold uppercase mb-1">Studio</p>
                    <p class="font-bold text-gray-800">{{ $anime['studios'][0]['name'] ?? '-' }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection