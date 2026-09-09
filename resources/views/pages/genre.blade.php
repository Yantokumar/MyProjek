@extends('layouts.main')

@section('container')
<div class="py-4 space-y-10">

    <!-- GENRE HEADER WITH CYBER ACCENTS -->
    <div class="rounded-[2.5rem] bg-gradient-to-br from-slate-900 via-slate-900 to-indigo-950 text-white p-8 sm:p-12 shadow-xl border border-slate-800 relative overflow-hidden">
        <div class="absolute -top-24 -right-24 w-80 h-80 bg-brand-500/20 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute inset-0 bg-[radial-gradient(#38bdf8_1px,transparent_1px)] [background-size:24px_24px] opacity-15 pointer-events-none"></div>

        <div class="relative z-10 max-w-2xl space-y-4">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-white/15 text-xs font-bold text-brand-300">
                <x-icon-compass class="w-3.5 h-3.5 text-brand-400" />
                <span>EKSPLORASI KATEGORI</span>
            </div>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-white tracking-tight">
                Jelajahi Beragam <br>
                <span class="bg-gradient-to-r from-brand-300 via-sky-300 to-indigo-300 bg-clip-text text-transparent">
                    Genre & Kategori Anime
                </span>
            </h1>
            <p class="text-sm sm:text-base text-slate-300 leading-relaxed font-normal">
                Pilih kategori anime yang paling sesuai dengan selera tontonan Anda, mulai dari petualangan laga, misteri, hingga fantasi.
            </p>
        </div>

        <!-- QUICK JUMP PILLS -->
        @if(!empty($allGenreData))
        <div class="relative z-10 mt-8 pt-6 border-t border-white/15">
            <p class="text-xs font-black text-brand-400 uppercase tracking-widest mb-3">Lompat Cepat ke Genre:</p>
            <div class="flex flex-wrap gap-2">
                @foreach($allGenreData as $data)
                    @if(!empty($data['animes']))
                        <a href="#genre-{{ Str::slug($data['name']) }}" 
                           class="px-4 py-2 rounded-xl bg-white/10 hover:bg-brand-600 text-slate-200 hover:text-white border border-white/10 hover:border-brand-500 text-xs font-bold transition-all shadow-sm">
                            {{ $data['name'] }}
                        </a>
                    @endif
                @endforeach
            </div>
        </div>
        @endif
    </div>

    <!-- GENRE SECTIONS -->
    @forelse($allGenreData as $data)
        @if(!empty($data['animes']))
        <section id="genre-{{ Str::slug($data['name']) }}" class="scroll-mt-28 bg-white rounded-[2rem] p-6 sm:p-8 border border-slate-200/80 shadow-sm space-y-6">
            
            <!-- Section Header -->
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-3 h-8 bg-gradient-to-b from-brand-600 to-indigo-600 rounded-full"></div>
                    <div>
                        <div class="flex items-center gap-2">
                            <h2 class="text-xl sm:text-2xl font-black text-slate-900 tracking-tight">
                                {{ $data['name'] }}
                            </h2>
                            <span class="text-xs font-bold text-slate-400">ジャンル</span>
                        </div>
                        <span class="text-xs font-semibold text-brand-600">
                            {{ count($data['animes']) }} Judul Pilihan Teratas
                        </span>
                    </div>
                </div>

                <div class="text-xs font-bold text-slate-400 hidden sm:flex items-center gap-1.5">
                    <span>Geser untuk melihat lainnya</span>
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                </div>
            </div>

            <!-- Horizontal Scrollable Row -->
            <div class="flex overflow-x-auto gap-5 pb-4 pt-1 scrollbar-none snap-x snap-mandatory">
                @foreach($data['animes'] as $anime)
                <div class="min-w-[170px] sm:min-w-[190px] max-w-[200px] flex-shrink-0 snap-start">
                    <a href="{{ route('anime.detail', $anime['mal_id']) }}" class="group block h-full">
                        <div class="bg-slate-50 rounded-2xl p-2.5 border border-slate-200/80 hover:border-brand-300 hover:bg-white hover:shadow-xl hover:shadow-brand-500/10 transition-all duration-300 hover:-translate-y-1.5 h-full flex flex-col">
                            
                            <div class="relative aspect-[3/4] overflow-hidden rounded-xl bg-slate-200 mb-2.5 shadow-inner">
                                <img src="{{ $anime['images']['jpg']['large_image_url'] ?? $anime['images']['jpg']['image_url'] }}" 
                                     alt="{{ $anime['title'] }}"
                                     loading="lazy"
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                
                                <div class="absolute top-2 right-2 bg-slate-900/85 backdrop-blur-md text-white text-[10px] font-black px-2 py-0.5 rounded-md border border-white/20 flex items-center gap-1 shadow-sm">
                                    <x-icon-star class="w-2.5 h-2.5 text-amber-400" />
                                    <span>{{ $anime['score'] ?? 'N/A' }}</span>
                                </div>
                            </div>

                            <h3 class="font-extrabold text-slate-800 text-xs leading-snug line-clamp-2 group-hover:text-brand-600 transition-colors mt-auto" title="{{ $anime['title'] }}">
                                {{ $anime['title'] }}
                            </h3>
                            
                            <div class="mt-2 pt-2 border-t border-slate-200/60 flex items-center justify-between text-[11px] text-slate-400">
                                <span class="font-bold text-slate-500">{{ $anime['type'] ?? 'TV' }}</span>
                                <span class="text-brand-600 font-extrabold group-hover:underline flex items-center gap-0.5">
                                    <span>Detail</span>
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>

        </section>
        @endif
    @empty
    <div class="py-20 text-center bg-white rounded-3xl border border-slate-200 shadow-sm">
        <div class="w-16 h-16 rounded-3xl bg-brand-50 border border-brand-100 text-brand-600 flex items-center justify-center mx-auto mb-4">
            <x-icon-compass class="w-8 h-8 text-brand-600" />
        </div>
        <h3 class="text-lg font-black text-slate-800">Sedang memuat kategori anime...</h3>
        <p class="text-sm text-slate-500 mt-1">Silakan tunggu sebentar atau muat ulang halaman.</p>
    </div>
    @endforelse

</div>
@endsection