@extends('layouts.main')

@section('container')
<div class="py-4 space-y-12">
    
    @php
        $spotlight = $animes->first();
        $spotlightId = $spotlight ? ($spotlight->mal_id ?? ($spotlight['mal_id'] ?? $spotlight->id)) : null;
        $spotlightTitle = $spotlight ? ($spotlight->judul ?? ($spotlight['judul'] ?? ($spotlight['title'] ?? 'Frieren: Beyond Journey\'s End'))) : '';
        $spotlightImage = $spotlight ? ($spotlight->gambar ?? ($spotlight['gambar'] ?? ($spotlight['images']['jpg']['large_image_url'] ?? ''))) : '';
        $spotlightScore = $spotlight ? ($spotlight->rating ?? ($spotlight['rating'] ?? ($spotlight['score'] ?? '9.14'))) : '9.14';
        $spotlightGenre = $spotlight ? ($spotlight->genre ?? ($spotlight['genre'] ?? 'Adventure, Drama, Fantasy')) : 'Adventure';
        $spotlightSynopsis = $spotlight ? ($spotlight->sinopsis ?? ($spotlight['sinopsis'] ?? ($spotlight['synopsis'] ?? 'Kisah perjalanan epik sang penyihir elf setelah kekalahan Raja Iblis.'))) : '';
    @endphp

    <!-- HERO SECTION WITH DYNAMIC ANIME SPOTLIGHT -->
    <div class="relative overflow-hidden rounded-[2.5rem] bg-gradient-to-br from-slate-900 via-slate-900 to-indigo-950 text-white p-8 sm:p-12 lg:p-14 shadow-2xl shadow-brand-950/20 border border-slate-800">
        <!-- Ambient anime light cones -->
        <div class="absolute -top-32 -left-32 w-96 h-96 bg-brand-500/20 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-32 -right-32 w-96 h-96 bg-indigo-500/20 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute inset-0 bg-[radial-gradient(#38bdf8_1px,transparent_1px)] [background-size:28px_28px] opacity-15 pointer-events-none"></div>

        <div class="relative z-10 grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
            
            <!-- LEFT COLUMN: COPY & HIGH-TECH SEARCH -->
            <div class="lg:col-span-7 space-y-6">
                
                <!-- Status & API Badges -->
                <div class="flex flex-wrap items-center gap-2.5">
                    <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-white/15 text-xs font-bold text-brand-300">
                        <span class="w-2 h-2 rounded-full bg-brand-400 animate-pulse"></span>
                        <span>KATALOG DIGITAL AKTIF</span>
                    </div>
                    @if($isUsingMalKey)
                        <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-500/15 border border-emerald-400/30 text-xs font-bold text-emerald-300">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span>MAL API Terhubung</span>
                        </div>
                    @endif
                </div>

                <!-- Main Heading with Japanese accent -->
                <div class="space-y-1">
                    <p class="text-xs font-black text-brand-400 uppercase tracking-widest">DIGITAL ANIME ARCHIVE</p>
                    <h1 class="text-3xl sm:text-5xl lg:text-5xl font-black text-white tracking-tight leading-[1.15]">
                        Eksplorasi Judul Anime <br>
                        <span class="bg-gradient-to-r from-brand-300 via-sky-300 to-indigo-300 bg-clip-text text-transparent">
                            Lengkap & Terverifikasi
                        </span>
                    </h1>
                </div>

                <p class="text-sm sm:text-base text-slate-300 leading-relaxed font-normal max-w-xl">
                    Akses informasi komprehensif mulai dari skor resmi, sinopsis cerita, studio produksi, hingga status penayangan anime favorit Anda.
                </p>

                <!-- Futuristic Search Bar -->
                <form action="/" method="GET" class="pt-2 max-w-xl">
                    <input type="hidden" name="tab" value="{{ $currentTab }}">
                    <div class="flex items-center gap-2 bg-white/10 backdrop-blur-xl p-2 rounded-2xl border border-white/20 shadow-xl focus-within:border-brand-400 focus-within:bg-white/15 focus-within:ring-4 focus-within:ring-brand-400/20 transition-all duration-300">
                        <div class="pl-2.5 text-brand-300">
                            <x-icon-search class="w-5 h-5" />
                        </div>
                        <input type="text" name="q" value="{{ $searchQuery ?? '' }}" 
                               placeholder="Cari judul anime (cth: Frieren, Bleach, Attack on Titan)..." 
                               class="w-full px-2 py-2 text-sm text-white placeholder-slate-400 bg-transparent focus:outline-none font-medium">
                        <button type="submit" 
                                class="px-5 py-2.5 rounded-xl bg-gradient-to-r from-brand-500 to-blue-600 hover:from-brand-600 hover:to-blue-700 text-white font-extrabold text-xs shadow-lg shadow-brand-500/30 hover:shadow-brand-500/50 transition flex items-center gap-2 flex-shrink-0">
                            <span>Cari</span>
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </button>
                    </div>
                </form>

                <!-- Quick Keywords Row -->
                <div class="flex flex-wrap items-center gap-2 text-xs text-slate-400 font-medium pt-1">
                    <span class="text-slate-500">Pencarian Populer:</span>
                    <a href="/?q=Action#katalog" class="px-2.5 py-1 rounded-lg bg-white/5 hover:bg-white/15 hover:text-white border border-white/10 transition">Action</a>
                    <a href="/?q=Fantasy#katalog" class="px-2.5 py-1 rounded-lg bg-white/5 hover:bg-white/15 hover:text-white border border-white/10 transition">Fantasy</a>
                    <a href="/?q=Romance#katalog" class="px-2.5 py-1 rounded-lg bg-white/5 hover:bg-white/15 hover:text-white border border-white/10 transition">Romance</a>
                    <a href="/?q=Drama#katalog" class="px-2.5 py-1 rounded-lg bg-white/5 hover:bg-white/15 hover:text-white border border-white/10 transition">Drama</a>
                </div>

            </div>

            <!-- RIGHT COLUMN: INTERACTIVE SPOTLIGHT CARD -->
            @if($spotlight)
            <div class="lg:col-span-5">
                <div class="relative bg-white/10 backdrop-blur-2xl rounded-3xl p-5 border border-white/20 shadow-2xl hover:border-brand-400/50 transition-all duration-300 group">
                    <div class="flex gap-4 items-center">
                        <div class="w-28 sm:w-32 aspect-[3/4] rounded-2xl overflow-hidden shadow-xl border-2 border-white/20 flex-shrink-0 relative bg-slate-800">
                            <img src="{{ $spotlightImage }}" alt="{{ $spotlightTitle }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            <div class="absolute top-2 left-2 bg-slate-900/80 backdrop-blur-md px-2 py-0.5 rounded-lg border border-white/20 text-[10px] font-black text-amber-300 flex items-center gap-1">
                                <x-icon-star class="w-3 h-3 text-amber-400" />
                                <span>{{ $spotlightScore }}</span>
                            </div>
                        </div>
                        <div class="flex-1 min-w-0 space-y-2">
                            <div class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-brand-500/25 border border-brand-400/40 text-[10px] font-black text-brand-300 uppercase tracking-wider">
                                <x-icon-sparkle class="w-3 h-3 text-brand-300" />
                                <span>Rekomendasi Utama</span>
                            </div>
                            <h3 class="font-black text-white text-base sm:text-lg leading-tight line-clamp-2">
                                {{ $spotlightTitle }}
                            </h3>
                            <p class="text-xs text-slate-300 line-clamp-2 leading-relaxed">
                                {{ $spotlightSynopsis }}
                            </p>
                            <div class="pt-1">
                                <a href="{{ route('anime.detail', $spotlightId) }}" 
                                   class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-white text-slate-900 hover:bg-brand-50 font-black text-xs shadow-md transition-all hover:gap-3">
                                    <span>Lihat Detail Anime</span>
                                    <svg class="w-3.5 h-3.5 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

        </div>
    </div>

    <!-- ANIME SECTION -->
    <div id="katalog" class="space-y-6 pt-2 scroll-mt-24">
        
        <!-- CATEGORY TABS & FILTER BAR -->
        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4 pb-4 border-b border-slate-200/80">
            
            <!-- Category Tabs with Custom Non-Generic Icons -->
            <div class="flex flex-wrap items-center gap-2">
                <a href="/?tab=all#katalog" 
                   class="inline-flex items-center gap-2 px-4 py-2.5 rounded-2xl text-xs font-black transition-all shadow-sm {{ ($currentTab === 'all' && empty($searchQuery)) ? 'bg-brand-600 text-white shadow-brand-500/25 ring-2 ring-brand-600/30' : 'bg-white text-slate-700 hover:bg-slate-50 border border-slate-200' }}">
                    <x-icon-sparkle class="w-3.5 h-3.5 {{ ($currentTab === 'all' && empty($searchQuery)) ? 'text-white' : 'text-brand-600' }}" />
                    <span>Peringkat Teratas</span>
                </a>
                <a href="/?tab=airing#katalog" 
                   class="inline-flex items-center gap-2 px-4 py-2.5 rounded-2xl text-xs font-black transition-all shadow-sm {{ ($currentTab === 'airing' && empty($searchQuery)) ? 'bg-brand-600 text-white shadow-brand-500/25 ring-2 ring-brand-600/30' : 'bg-white text-slate-700 hover:bg-slate-50 border border-slate-200' }}">
                    <x-icon-radar class="w-3.5 h-3.5 {{ ($currentTab === 'airing' && empty($searchQuery)) ? 'text-white' : 'text-emerald-500' }}" />
                    <span>Sedang Tayang</span>
                </a>
                <a href="/?tab=movie#katalog" 
                   class="inline-flex items-center gap-2 px-4 py-2.5 rounded-2xl text-xs font-black transition-all shadow-sm {{ ($currentTab === 'movie' && empty($searchQuery)) ? 'bg-brand-600 text-white shadow-brand-500/25 ring-2 ring-brand-600/30' : 'bg-white text-slate-700 hover:bg-slate-50 border border-slate-200' }}">
                    <x-icon-film class="w-3.5 h-3.5 {{ ($currentTab === 'movie' && empty($searchQuery)) ? 'text-white' : 'text-indigo-500' }}" />
                    <span>Film & Movie</span>
                </a>
                <a href="/?tab=bypopularity#katalog" 
                   class="inline-flex items-center gap-2 px-4 py-2.5 rounded-2xl text-xs font-black transition-all shadow-sm {{ ($currentTab === 'bypopularity' && empty($searchQuery)) ? 'bg-brand-600 text-white shadow-brand-500/25 ring-2 ring-brand-600/30' : 'bg-white text-slate-700 hover:bg-slate-50 border border-slate-200' }}">
                    <x-icon-flame class="w-3.5 h-3.5 {{ ($currentTab === 'bypopularity' && empty($searchQuery)) ? 'text-white' : 'text-orange-500' }}" />
                    <span>Paling Populer</span>
                </a>
            </div>

            <!-- Status Indicator -->
            <div class="text-xs font-bold text-slate-500 flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-brand-500"></span>
                <span>Halaman {{ $animes->currentPage() }} dari {{ $animes->lastPage() }}</span>
                @if(!empty($searchQuery))
                    <a href="/" class="text-rose-500 hover:underline font-bold text-xs ml-1">[Reset Pencarian]</a>
                @endif
            </div>

        </div>

        <!-- ANIME CARDS GRID -->
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-5 sm:gap-6">
            @forelse($animes as $anime)
            @php
                $animeId = $anime->mal_id ?? ($anime['mal_id'] ?? $anime->id);
                $title = $anime->judul ?? ($anime['judul'] ?? ($anime['title'] ?? 'Untitled'));
                $image = $anime->gambar ?? ($anime['gambar'] ?? ($anime['images']['jpg']['large_image_url'] ?? ''));
                $rating = $anime->rating ?? ($anime['rating'] ?? ($anime['score'] ?? 'N/A'));
                $genre = $anime->genre ?? ($anime['genre'] ?? ($anime['genres'][0]['name'] ?? 'Anime'));
                $firstGenre = explode(',', $genre)[0];
                $type = $anime->tipe ?? ($anime['tipe'] ?? ($anime['type'] ?? 'TV'));
                $episodes = $anime->episodes ?? ($anime['episodes'] ?? null);
            @endphp
            <div class="anime-card group relative flex flex-col bg-white rounded-3xl p-3 shadow-sm hover:shadow-2xl hover:shadow-brand-500/15 border border-slate-100 hover:border-brand-200 transition-all duration-300 hover:-translate-y-2">
                
                <!-- Poster Container -->
                <a href="{{ route('anime.detail', $animeId) }}" class="block relative aspect-[3/4] overflow-hidden rounded-2xl bg-slate-100 mb-3 shadow-inner">
                    <img src="{{ $image }}" 
                         alt="{{ $title }}"
                         loading="lazy"
                         class="w-full h-full object-cover group-hover:scale-108 transition-transform duration-500">
                    
                    <!-- Hover gradient vignette -->
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/85 via-slate-950/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end justify-center p-3 pointer-events-none">
                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-brand-500/90 backdrop-blur-md text-white font-extrabold text-[11px] shadow-lg">
                            <span>Buka Info</span>
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
                            </svg>
                        </span>
                    </div>

                    <!-- Faceted Score Badge with Custom Star -->
                    <div class="absolute top-2.5 right-2.5 bg-slate-900/85 backdrop-blur-md text-white text-[11px] font-black px-2 py-0.5 rounded-lg border border-white/20 flex items-center gap-1 shadow-md">
                        <x-icon-star class="w-3 h-3 text-amber-400" />
                        <span>{{ $rating }}</span>
                    </div>

                    <!-- Type Tag -->
                    <div class="absolute bottom-2.5 left-2.5 bg-slate-950/80 backdrop-blur-md text-slate-200 text-[10px] font-bold px-2 py-0.5 rounded-md border border-white/10 flex items-center gap-1">
                        <span class="text-brand-300 font-extrabold">{{ $type }}</span>
                        @if($episodes)
                            <span class="text-slate-500">•</span>
                            <span>{{ $episodes }} Ep</span>
                        @endif
                    </div>
                </a>

                <!-- Details -->
                <div class="flex-grow flex flex-col justify-between px-1">
                    <div>
                        <h3 class="anime-title font-extrabold text-slate-900 text-sm leading-snug line-clamp-2 group-hover:text-brand-600 transition-colors" title="{{ $title }}">
                            <a href="{{ route('anime.detail', $animeId) }}">
                                {{ $title }}
                            </a>
                        </h3>
                    </div>

                    <div class="mt-3 pt-2.5 border-t border-slate-100 flex items-center justify-between">
                        <span class="text-[10px] font-bold text-brand-700 bg-brand-50 px-2 py-0.5 rounded-md border border-brand-200/60 truncate max-w-[95px]">
                            {{ trim($firstGenre) }}
                        </span>
                        
                        <a href="{{ route('anime.detail', $animeId) }}" class="text-xs font-bold text-slate-400 group-hover:text-brand-600 transition-colors flex items-center gap-1">
                            <span>Detail</span>
                            <svg class="w-3 h-3 group-hover:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>

            </div>
            @empty
            <div class="col-span-full py-20 text-center bg-white rounded-3xl border border-slate-100 shadow-sm">
                <div class="w-16 h-16 rounded-3xl bg-brand-50 border border-brand-100 text-brand-600 flex items-center justify-center mx-auto mb-4">
                    <x-icon-search class="w-8 h-8 text-brand-600" />
                </div>
                <h3 class="text-lg font-black text-slate-800">Tidak ada anime yang cocok</h3>
                <p class="text-sm text-slate-500 mt-1">Coba gunakan kata kunci pencarian yang lain.</p>
                <a href="/" class="mt-4 inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-brand-600 hover:bg-brand-700 text-white text-xs font-extrabold shadow-md shadow-brand-500/20 transition">
                    <span>Lihat Semua Anime</span>
                </a>
            </div>
            @endforelse
        </div>

        <!-- MODERN PAGINATION LINKS -->
        <div class="pt-8 flex justify-center">
            {{ $animes->fragment('katalog')->links() }}
        </div>

    </div>

</div>
@endsection