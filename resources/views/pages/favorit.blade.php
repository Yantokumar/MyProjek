@extends('layouts.main')

@section('container')
<div class="max-w-7xl mx-auto px-6 py-12">
    <h1 class="text-4xl font-extrabold text-gray-900 mb-12">Koleksi <span class="text-blue-600">Favorit Saya</span></h1>

    @if($myFavorites->isEmpty())
    <div class="text-center py-20 bg-gray-50 rounded-[3rem] border-2 border-dashed border-gray-200">
        <span class="text-6xl mb-4 block">⭐</span>
        <h2 class="text-xl font-bold text-gray-800">Belum ada anime favorit.</h2>
        <p class="text-gray-500 mt-2 mb-6">Mulai eksplorasi dan simpan anime kesukaanmu!</p>
        <a href="/genre" class="bg-blue-600 text-white px-8 py-3 rounded-xl font-bold hover:bg-blue-700 transition">Jelajahi Genre</a>
    </div>
    @else
    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6">
        @foreach($myFavorites as $fav)
        <div class="group relative">
            <a href="{{ route('anime.detail', $fav->anime_mal_id) }}">
                <div class="relative overflow-hidden rounded-2xl shadow-md mb-3">
                    <img src="{{ $fav->gambar }}" class="w-full aspect-[3/4] object-cover group-hover:scale-110 transition duration-500">
                </div>
                <h3 class="font-bold text-gray-800 text-sm truncate">{{ $fav->judul }}</h3>
            </a>
            <form action="/favorit/{{ $fav->id }}" method="POST" class="mt-2">
                @csrf
                @method('DELETE')
                <button class="text-[10px] text-red-500 font-bold hover:underline">Hapus dari favorit</button>
            </form>
        </div>
        @endforeach
    </div>
    @endif
</div>
@endsection