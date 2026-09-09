@extends('layouts.admin')
@section('title', 'Manajemen Data Anime')

@section('content')
<div class="bg-white rounded-[2rem] shadow-sm border border-slate-200/80 overflow-hidden space-y-4">
    
    <!-- HEADER & SEARCH -->
    <div class="p-6 sm:p-8 border-b border-slate-200/80 flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h3 class="font-black text-xl text-slate-900 tracking-tight">Katalog Anime Sistem</h3>
            <p class="text-xs text-slate-400 mt-0.5">Kelola data anime yang tersimpan dalam database</p>
        </div>

        <div class="flex flex-wrap items-center gap-3">
            <!-- Search in Admin -->
            <form action="/admin/anime" method="GET" class="flex items-center gap-2">
                <input type="text" name="q" value="{{ $search ?? '' }}" placeholder="Cari anime/genre..." 
                       class="px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 w-48 sm:w-60 font-medium">
                <button type="submit" class="px-3.5 py-2 bg-brand-600 hover:bg-brand-700 text-white rounded-xl text-xs font-black transition">
                    Cari
                </button>
                @if(!empty($search))
                    <a href="/admin/anime" class="text-xs text-rose-500 hover:underline font-bold">Reset</a>
                @endif
            </form>

            <span class="inline-flex items-center gap-2 bg-brand-50 text-brand-700 px-3.5 py-2 rounded-xl text-xs font-black border border-brand-200/80">
                <x-icon-film class="w-3.5 h-3.5 text-brand-600" />
                <span>{{ number_format($animes->total()) }} Data</span>
            </span>
        </div>
    </div>

    <!-- TABLE -->
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead class="bg-slate-50 text-slate-400 text-[10px] uppercase tracking-widest font-black">
                <tr>
                    <th class="px-8 py-4">Poster</th>
                    <th class="px-8 py-4">Judul Anime</th>
                    <th class="px-8 py-4">Genre</th>
                    <th class="px-8 py-4">Tipe / Eps</th>
                    <th class="px-8 py-4">Rating</th>
                    <th class="px-8 py-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($animes as $a)
                <tr class="hover:bg-slate-50/70 transition">
                    <td class="px-8 py-4">
                        <img src="{{ $a->gambar }}" alt="{{ $a->judul }}" class="w-10 h-14 object-cover rounded-xl shadow-sm">
                    </td>
                    <td class="px-8 py-4 font-black text-slate-900 text-sm max-w-xs truncate" title="{{ $a->judul }}">
                        <a href="{{ route('anime.detail', $a->mal_id ?? $a->id) }}" target="_blank" class="hover:text-brand-600 transition">
                            {{ $a->judul }}
                        </a>
                    </td>
                    <td class="px-8 py-4 text-slate-600 text-xs whitespace-nowrap">
                        <span class="px-2.5 py-1 rounded-lg font-bold bg-brand-50 text-brand-700 border border-brand-200/50">
                            {{ $a->genre }}
                        </span>
                    </td>
                    <td class="px-8 py-4 text-slate-500 text-xs whitespace-nowrap font-medium">
                        {{ $a->tipe ?? 'TV' }} ({{ $a->episodes ?? '?' }} Eps)
                    </td>
                    <td class="px-8 py-4 whitespace-nowrap">
                        <span class="inline-flex items-center gap-1.5 font-black text-slate-900 text-xs bg-amber-50 border border-amber-200/70 px-2.5 py-1 rounded-lg">
                            <x-icon-star class="w-3 h-3 text-amber-500" />
                            <span>{{ $a->rating }}</span>
                        </span>
                    </td>
                    <td class="px-8 py-4 text-center whitespace-nowrap">
                        <a href="{{ route('anime.detail', $a->mal_id ?? $a->id) }}" target="_blank" class="px-3.5 py-1.5 text-xs font-black text-brand-600 hover:bg-brand-50 rounded-xl transition">
                            Lihat &rarr;
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="py-16 text-center text-slate-400 text-sm">
                        <div class="w-12 h-12 rounded-2xl bg-slate-100 text-slate-400 flex items-center justify-center mx-auto mb-2">
                            <x-icon-search class="w-6 h-6 text-slate-400" />
                        </div>
                        Tidak ada anime yang cocok dengan pencarian Anda.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- PAGINATION -->
    <div class="p-6 border-t border-slate-100 flex justify-center">
        {{ $animes->links() }}
    </div>

</div>
@endsection