@extends('layouts.main')

@section('container')
<div class="py-4 space-y-8">
    
    <!-- HEADER -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 border-b border-slate-200/80">
        <div>
            <div class="flex items-center gap-2 mb-1">
                <span class="w-2.5 h-6 rounded-full bg-gradient-to-b from-brand-600 to-indigo-600"></span>
                <span class="text-xs font-black uppercase tracking-wider text-brand-600">KOLEKSI PRIBADI</span>
            </div>
            <h1 class="text-3xl sm:text-4xl font-black text-slate-900 tracking-tight">
                Anime <span class="bg-gradient-to-r from-brand-600 via-blue-600 to-indigo-600 bg-clip-text text-transparent">Favorit Saya</span>
            </h1>
        </div>

        <span class="inline-flex items-center gap-2 px-4 py-2 rounded-2xl bg-brand-50 text-brand-700 text-xs font-extrabold border border-brand-200/80 shadow-sm self-start sm:self-auto">
            <x-icon-heart class="w-4 h-4 text-rose-500" />
            <span>{{ $myFavorites->count() }} Judul Tersimpan</span>
        </span>
    </div>

    <!-- CONTENT -->
    @if($myFavorites->isEmpty())
    <div class="text-center py-20 px-6 bg-white rounded-[2.5rem] border border-slate-200/80 shadow-sm max-w-2xl mx-auto space-y-4">
        <div class="w-16 h-16 rounded-3xl bg-rose-50 text-rose-500 flex items-center justify-center mx-auto shadow-sm">
            <x-icon-heart class="w-8 h-8 text-rose-500" />
        </div>
        <h2 class="text-xl sm:text-2xl font-black text-slate-800 tracking-tight">Belum Ada Koleksi Favorit</h2>
        <p class="text-sm text-slate-500 max-w-md mx-auto leading-relaxed">
            Eksplorasi ribuan anime di katalog kami, lalu klik tombol "Tambah ke Koleksi Favorit" untuk menyimpannya di sini.
        </p>
        <div class="pt-2">
            <a href="/" class="inline-flex items-center gap-2 px-7 py-3.5 rounded-2xl bg-gradient-to-r from-brand-600 via-blue-600 to-indigo-600 text-white font-extrabold text-xs shadow-lg shadow-brand-500/25 hover:shadow-xl hover:shadow-brand-500/35 transition-all hover:-translate-y-0.5">
                <span>Eksplorasi Anime Sekarang</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                </svg>
            </a>
        </div>
    </div>
    @else
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-5 sm:gap-6">
        @foreach($myFavorites as $fav)
        <div class="group relative flex flex-col bg-white rounded-3xl p-3 shadow-sm hover:shadow-xl hover:shadow-brand-500/10 border border-slate-100 hover:border-brand-200 transition-all duration-300 hover:-translate-y-1.5">
            
            <!-- Poster -->
            <a href="{{ route('anime.detail', $fav->anime_mal_id) }}" class="block relative aspect-[3/4] overflow-hidden rounded-2xl bg-slate-100 mb-3 shadow-inner">
                <img src="{{ $fav->gambar }}" 
                     alt="{{ $fav->judul }}"
                     loading="lazy"
                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                
                <div class="absolute top-2.5 right-2.5 bg-slate-900/85 backdrop-blur-md text-rose-400 text-xs font-black px-2.5 py-1 rounded-xl shadow-sm border border-white/20 flex items-center gap-1.5">
                    <x-icon-heart class="w-3.5 h-3.5 text-rose-500" />
                    <span>Favorit</span>
                </div>
            </a>

            <!-- Info -->
            <div class="flex-grow flex flex-col justify-between px-1">
                <h3 class="font-extrabold text-slate-900 text-sm line-clamp-2 leading-snug group-hover:text-brand-600 transition-colors" title="{{ $fav->judul }}">
                    <a href="{{ route('anime.detail', $fav->anime_mal_id) }}">
                        {{ $fav->judul }}
                    </a>
                </h3>

                <!-- Actions -->
                <div class="mt-3 pt-2.5 border-t border-slate-100 flex items-center justify-between">
                    <a href="{{ route('anime.detail', $fav->anime_mal_id) }}" class="text-xs font-extrabold text-brand-600 hover:underline flex items-center gap-1">
                        <span>Lihat</span>
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>

                    <form action="{{ route('favorit.destroy', $fav->id) }}" method="POST" onsubmit="return confirm('Hapus anime ini dari daftar favorit?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" title="Hapus dari favorit" class="p-1.5 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded-lg transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>

        </div>
        @endforeach
    </div>
    @endif

</div>
@endsection