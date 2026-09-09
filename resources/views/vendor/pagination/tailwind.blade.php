@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Navigasi Halaman Katalog" class="w-full">
        <div class="w-full bg-white/90 backdrop-blur-md rounded-[2.5rem] p-4 sm:p-6 border border-brand-100 shadow-xl shadow-brand-500/5 flex flex-col lg:flex-row items-center justify-between gap-5">
            
            <!-- RESULT COUNT BADGE (TEMA BIRU PUTIH MODERN) -->
            <div class="flex items-center gap-2.5 text-xs sm:text-sm font-semibold text-slate-600 self-center lg:self-auto">
                <span class="w-2.5 h-2.5 rounded-full bg-brand-500 animate-pulse"></span>
                <span class="text-slate-500 font-medium hidden sm:inline">Menampilkan:</span>
                <div class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-2xl bg-brand-50/90 border border-brand-200/80 text-xs sm:text-sm font-bold shadow-sm">
                    <span class="font-black text-brand-700">
                        @if ($paginator->firstItem())
                            {{ $paginator->firstItem() }} – {{ $paginator->lastItem() }}
                        @else
                            {{ $paginator->count() }}
                        @endif
                    </span>
                    <span class="text-slate-400 font-medium">dari</span>
                    <span class="font-black text-slate-900 bg-white px-2 py-0.5 rounded-lg border border-brand-200/60 shadow-xs">
                        {{ number_format($paginator->total()) }}
                    </span>
                    <span class="text-brand-800 font-bold">Hasil Anime</span>
                </div>
            </div>

            <!-- NUMBER BUTTONS & PREV/NEXT CONTROLS -->
            <div class="flex items-center gap-1.5 sm:gap-2 flex-wrap justify-center">

                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <span class="px-3.5 py-2 sm:px-4 sm:py-2.5 rounded-xl sm:rounded-2xl bg-slate-50 text-slate-300 border border-slate-200/60 font-bold text-xs sm:text-sm cursor-not-allowed flex items-center gap-1.5 select-none">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/>
                        </svg>
                        <span class="hidden sm:inline">Sebelumnya</span>
                    </span>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="px-3.5 py-2 sm:px-4 sm:py-2.5 rounded-xl sm:rounded-2xl bg-white hover:bg-brand-600 text-slate-700 hover:text-white border border-slate-200/80 hover:border-brand-600 font-bold text-xs sm:text-sm shadow-sm transition-all duration-200 flex items-center gap-1.5 hover:shadow-md hover:shadow-brand-500/20 active:scale-95 hover:-translate-y-0.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/>
                        </svg>
                        <span class="hidden sm:inline">Sebelumnya</span>
                    </a>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <span class="w-7 h-9 sm:w-8 sm:h-10 flex items-center justify-center text-slate-400 font-black text-xs sm:text-sm tracking-widest select-none">
                            {{ $element }}
                        </span>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <span class="w-9 h-9 sm:w-10 sm:h-10 rounded-xl sm:rounded-2xl bg-gradient-to-tr from-brand-600 via-blue-600 to-indigo-600 text-white font-black text-xs sm:text-sm shadow-md shadow-brand-500/35 flex items-center justify-center ring-4 ring-brand-500/20 scale-105 select-none">
                                    {{ $page }}
                                </span>
                            @else
                                <a href="{{ $url }}" class="w-9 h-9 sm:w-10 sm:h-10 rounded-xl sm:rounded-2xl bg-white hover:bg-brand-50 hover:border-brand-300 text-slate-700 hover:text-brand-600 font-extrabold text-xs sm:text-sm border border-slate-200/80 shadow-sm transition-all duration-200 flex items-center justify-center active:scale-95 hover:-translate-y-0.5">
                                    {{ $page }}
                                </a>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="px-3.5 py-2 sm:px-4 sm:py-2.5 rounded-xl sm:rounded-2xl bg-white hover:bg-brand-600 text-slate-700 hover:text-white border border-slate-200/80 hover:border-brand-600 font-bold text-xs sm:text-sm shadow-sm transition-all duration-200 flex items-center gap-1.5 hover:shadow-md hover:shadow-brand-500/20 active:scale-95 hover:-translate-y-0.5">
                        <span class="hidden sm:inline">Selanjutnya</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                @else
                    <span class="px-3.5 py-2 sm:px-4 sm:py-2.5 rounded-xl sm:rounded-2xl bg-slate-50 text-slate-300 border border-slate-200/60 font-bold text-xs sm:text-sm cursor-not-allowed flex items-center gap-1.5 select-none">
                        <span class="hidden sm:inline">Selanjutnya</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
                        </svg>
                    </span>
                @endif

            </div>

        </div>
    </nav>
@endif
