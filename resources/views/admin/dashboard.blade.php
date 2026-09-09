@extends('layouts.admin')
@section('title', 'Overview Dashboard')

@section('content')
<div class="space-y-8">
    
    <!-- STATS ROW -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
        
        <div class="bg-white p-7 rounded-[2rem] shadow-sm border border-slate-200/80 flex items-center justify-between">
            <div>
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Total Anime Terdaftar</p>
                <h3 class="text-3xl font-black text-slate-900">{{ number_format($totalAnime) }}</h3>
                <span class="text-xs font-extrabold text-brand-600 mt-1 inline-block">Database Lokal SQLite</span>
            </div>
            <div class="w-14 h-14 rounded-2xl bg-brand-50 text-brand-600 flex items-center justify-center shadow-sm">
                <x-icon-film class="w-7 h-7 text-brand-600" />
            </div>
        </div>

        <div class="bg-white p-7 rounded-[2rem] shadow-sm border border-slate-200/80 flex items-center justify-between">
            <div>
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Masukan Pengguna</p>
                <h3 class="text-3xl font-black text-slate-900">{{ $totalPesan }}</h3>
                <span class="text-xs font-extrabold text-amber-600 mt-1 inline-block">Kotak Pesan Feedback</span>
            </div>
            <div class="w-14 h-14 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center shadow-sm">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                </svg>
            </div>
        </div>

        <div class="bg-white p-7 rounded-[2rem] shadow-sm border border-slate-200/80 flex items-center justify-between">
            <div>
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Sistem & Framework</p>
                <h3 class="text-2xl font-black text-emerald-600">Online 100%</h3>
                <span class="text-xs font-extrabold text-slate-400 mt-1 inline-block">Laravel 12 / Jikan API</span>
            </div>
            <div class="w-14 h-14 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center shadow-sm">
                <x-icon-sparkle class="w-7 h-7 text-emerald-600" />
            </div>
        </div>

    </div>

    <!-- WELCOME BANNER -->
    <div class="relative overflow-hidden rounded-[2.5rem] bg-gradient-to-r from-slate-900 via-slate-900 to-indigo-950 p-8 sm:p-10 text-white shadow-xl border border-slate-800">
        <div class="absolute -right-20 -top-20 w-80 h-80 bg-brand-500/20 rounded-full blur-3xl pointer-events-none"></div>

        <div class="relative z-10 max-w-2xl space-y-3">
            <span class="px-3 py-1 rounded-full bg-white/10 text-brand-300 text-[10px] font-black uppercase tracking-widest border border-white/15">
                KONTROL UTAMA
            </span>
            <h2 class="text-2xl sm:text-3xl font-black tracking-tight">
                Selamat Datang, {{ Auth::user()->name ?? 'Administrator' }}!
            </h2>
            <p class="text-sm text-slate-300 leading-relaxed font-medium">
                Kelola masukan pengguna, tinjau akun terdaftar, serta pantau ribuan katalog anime dari kontrol panel pusat AnimeLib.
            </p>
            <div class="pt-2 flex flex-wrap gap-3">
                <a href="/admin/feedback" class="px-5 py-2.5 rounded-xl bg-brand-600 hover:bg-brand-700 text-white font-black text-xs shadow-md transition">
                    Tinjau Pesan Pengguna &rarr;
                </a>
                <a href="/admin/anime" class="px-5 py-2.5 rounded-xl bg-white/10 text-white hover:bg-white/20 font-black text-xs transition border border-white/15">
                    Katalog Anime
                </a>
            </div>
        </div>
    </div>

</div>
@endsection