@extends('layouts.main')

@section('container')
<div class="py-4 space-y-8">

    <!-- BREADCRUMB & BACK BUTTON -->
    <div class="flex items-center justify-between">
        <nav class="flex items-center gap-2 text-xs text-slate-500 font-semibold">
            <a href="/" class="hover:text-brand-600 transition">Beranda</a>
            <span class="text-slate-300">/</span>
            <a href="/genre" class="hover:text-brand-600 transition">Koleksi</a>
            <span class="text-slate-300">/</span>
            <span class="text-slate-900 font-extrabold truncate max-w-[200px] sm:max-w-md">{{ $anime['title'] }}</span>
        </nav>

        <a href="javascript:history.back()" class="inline-flex items-center gap-1.5 text-xs font-bold text-slate-600 hover:text-brand-600 bg-white px-3.5 py-1.5 rounded-xl border border-slate-200 hover:border-brand-200 transition-all shadow-sm">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            <span>Kembali</span>
        </a>
    </div>

    <!-- MAIN DETAIL CARD WITH CINEMA BACKDROP -->
    <div class="relative overflow-hidden bg-white rounded-[2.5rem] p-6 sm:p-10 lg:p-12 border border-slate-200/80 shadow-sm">
        
        <!-- Ambient anime poster glow -->
        <div class="absolute -top-32 -right-32 w-96 h-96 bg-brand-200/30 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute top-0 right-0 w-2/3 h-64 bg-gradient-to-b from-brand-50/50 to-transparent pointer-events-none"></div>

        <div class="relative z-10 flex flex-col lg:flex-row gap-10 lg:gap-14">
            
            <!-- LEFT COLUMN: POSTER & QUICK ACTIONS -->
            <div class="w-full lg:w-80 flex-shrink-0">
                <div class="lg:sticky lg:top-28 space-y-5">
                    
                    <!-- Poster Container -->
                    <div class="relative aspect-[3/4] rounded-3xl overflow-hidden shadow-2xl shadow-brand-500/15 border-4 border-white bg-slate-100">
                        <img src="{{ $anime['images']['jpg']['large_image_url'] ?? $anime['images']['jpg']['image_url'] }}" 
                             alt="{{ $anime['title'] }}"
                             class="w-full h-full object-cover">
                        
                        <!-- Floating Score Badge -->
                        <div class="absolute top-4 right-4 bg-slate-900/85 backdrop-blur-md text-white px-3 py-1.5 rounded-2xl shadow-xl border border-white/20 flex items-center gap-1.5">
                            <x-icon-star class="w-4 h-4 text-amber-400" />
                            <span class="text-sm font-black">{{ $anime['score'] ?? 'N/A' }}</span>
                        </div>

                        <!-- Type & Status Pill -->
                        <div class="absolute bottom-4 left-4 bg-slate-900/85 backdrop-blur-md text-white px-3 py-1 rounded-xl border border-white/15 text-xs font-black flex items-center gap-1.5">
                            <span class="text-brand-300 uppercase">{{ $anime['type'] ?? 'TV' }}</span>
                            <span class="text-slate-500">•</span>
                            <span class="text-slate-200 font-bold">{{ $anime['episodes'] ?? '?' }} Ep</span>
                        </div>
                    </div>

                    <!-- Global Score & Rank Bar -->
                    <div class="bg-gradient-to-br from-brand-50 via-white to-indigo-50/40 p-4 rounded-2xl border border-brand-100/80 text-center shadow-sm">
                        <p class="text-[10px] uppercase tracking-wider font-extrabold text-brand-700">Skor Rating Resmi</p>
                        <div class="flex items-center justify-center gap-2 mt-1">
                            <x-icon-star class="w-6 h-6 text-amber-400" />
                            <span class="text-3xl font-black text-slate-900">{{ $anime['score'] ?? 'N/A' }}</span>
                        </div>
                        <div class="flex items-center justify-center gap-2 mt-2 text-xs font-bold text-slate-500">
                            <span class="flex items-center gap-1">
                                <x-icon-sparkle class="w-3.5 h-3.5 text-brand-600" />
                                <span>Peringkat #{{ $anime['rank'] ?? '-' }}</span>
                            </span>
                            <span>•</span>
                            <span class="flex items-center gap-1">
                                <x-icon-flame class="w-3.5 h-3.5 text-orange-500" />
                                <span>Populer #{{ $anime['popularity'] ?? '-' }}</span>
                            </span>
                        </div>
                    </div>

                    <!-- Favorite Button Action -->
                    <div>
                        @auth
                            @if($isFavorited)
                                <div class="w-full py-4 bg-emerald-50 border border-emerald-200 text-emerald-800 font-extrabold rounded-2xl text-center flex items-center justify-center gap-2 text-sm shadow-sm">
                                    <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    <span>Tersimpan di Favorit</span>
                                </div>
                            @else
                                <form action="/add-favorite" method="POST">
                                    @csrf
                                    <input type="hidden" name="mal_id" value="{{ $anime['mal_id'] }}">
                                    <input type="hidden" name="judul" value="{{ $anime['title'] }}">
                                    <input type="hidden" name="gambar" value="{{ $anime['images']['jpg']['large_image_url'] ?? $anime['images']['jpg']['image_url'] }}">
                                    
                                    <button type="submit" class="w-full py-4 bg-gradient-to-r from-brand-600 via-blue-600 to-indigo-600 text-white font-extrabold rounded-2xl hover:from-brand-700 hover:to-indigo-700 shadow-lg shadow-brand-500/25 hover:shadow-xl hover:shadow-brand-500/35 transition-all duration-200 flex items-center justify-center gap-2 text-sm hover:-translate-y-0.5">
                                        <x-icon-heart class="w-4 h-4 text-rose-300" />
                                        <span>Tambah ke Koleksi Favorit</span>
                                    </button>
                                </form>
                            @endif
                        @else
                            <a href="/login" class="w-full py-4 bg-white border border-brand-200 text-brand-600 font-extrabold rounded-2xl text-center hover:bg-brand-50 transition-all text-sm flex items-center justify-center gap-2 shadow-sm">
                                <svg class="w-4 h-4 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                                <span>Masuk untuk Simpan Favorit</span>
                            </a>
                        @endauth
                    </div>

                </div>
            </div>

            <!-- RIGHT COLUMN: METADATA & SYNOPSIS -->
            <div class="flex-1 space-y-8">
                
                <!-- Title & Japanese Title -->
                <div>
                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-slate-900 tracking-tight leading-tight">
                        {{ $anime['title'] }}
                    </h1>
                    @if(!empty($anime['title_japanese']))
                    <p class="text-sm font-extrabold text-slate-400 mt-1">
                        {{ $anime['title_japanese'] }}
                    </p>
                    @endif
                </div>

                <!-- Genre Badges -->
                <div class="flex flex-wrap items-center gap-2">
                    @foreach($anime['genres'] as $genre)
                    <span class="inline-flex items-center gap-1.5 bg-brand-50 text-brand-700 px-3.5 py-1.5 rounded-xl text-xs font-extrabold border border-brand-200/60 shadow-sm">
                        <x-icon-tag class="w-3 h-3 text-brand-500" />
                        <span>{{ $genre['name'] }}</span>
                    </span>
                    @endforeach
                    <span class="bg-slate-100 text-slate-700 px-3.5 py-1.5 rounded-xl text-xs font-extrabold">
                        {{ $anime['type'] ?? 'TV' }} • {{ $anime['episodes'] ?? '?' }} Episode
                    </span>
                    @if(!empty($anime['rating']))
                    <span class="bg-slate-100 text-slate-700 px-3.5 py-1.5 rounded-xl text-xs font-extrabold">
                        {{ $anime['rating'] }}
                    </span>
                    @endif
                </div>

                <!-- Info Grid Chips -->
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                    <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100">
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-wider">Status</p>
                        <p class="text-sm font-extrabold text-slate-800 mt-0.5">{{ $anime['status'] ?? 'Unknown' }}</p>
                    </div>

                    <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100">
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-wider">Studio</p>
                        <p class="text-sm font-extrabold text-slate-800 mt-0.5">{{ $anime['studios'][0]['name'] ?? '-' }}</p>
                    </div>

                    <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100">
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-wider">Musim / Rilis</p>
                        <p class="text-sm font-extrabold text-slate-800 mt-0.5 capitalize">{{ $anime['season'] ?? '' }} {{ $anime['year'] ?? ($anime['aired']['string'] ?? '-') }}</p>
                    </div>

                    <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100">
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-wider">Sumber</p>
                        <p class="text-sm font-extrabold text-slate-800 mt-0.5">{{ $anime['source'] ?? '-' }}</p>
                    </div>
                </div>

                <!-- Synopsis Box with Japanese Accent Subtitle -->
                <div class="bg-slate-50/70 rounded-3xl p-6 sm:p-8 border border-slate-200/70 space-y-3">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <span class="w-2.5 h-6 bg-brand-600 rounded-full"></span>
                            <h3 class="text-lg font-black text-slate-900 tracking-tight">Sinopsis Cerita</h3>
                        </div>
                        <span class="text-xs font-extrabold text-slate-400 tracking-wider">あらすじ</span>
                    </div>
                    
                    <p class="text-slate-600 leading-relaxed text-sm sm:text-base font-normal">
                        {{ $anime['synopsis'] ?? 'Sinopsis resmi belum tersedia untuk anime ini.' }}
                    </p>
                </div>

                <!-- Background / Extra Info if exists -->
                @if(!empty($anime['background']))
                <div class="bg-brand-50/40 rounded-3xl p-6 sm:p-8 border border-brand-100/60 space-y-2">
                    <h4 class="text-xs font-black text-brand-700 uppercase tracking-wider">Informasi Latar Belakang</h4>
                    <p class="text-slate-600 text-xs sm:text-sm leading-relaxed">
                        {{ $anime['background'] }}
                    </p>
                </div>
                @endif

            </div>

        </div>

    </div>

</div>
@endsection