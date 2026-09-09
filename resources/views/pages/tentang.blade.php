@extends('layouts.main')

@section('container')
<div class="max-w-5xl mx-auto py-4 space-y-10">

    <!-- ABOUT SECTION CARD -->
    <div class="bg-white rounded-[2.5rem] p-8 sm:p-12 lg:p-14 border border-slate-200/80 shadow-sm relative overflow-hidden">
        <!-- Ambient decorative glow -->
        <div class="absolute -top-24 -right-24 w-80 h-80 bg-brand-100/50 rounded-full blur-3xl pointer-events-none"></div>

        <div class="relative z-10 space-y-8">
            <div>
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-brand-50 border border-brand-200/80 text-xs font-bold text-brand-700 mb-3 shadow-sm">
                    <x-icon-info class="w-3.5 h-3.5 text-brand-600" />
                    <span>INFORMASI PLATFORM</span>
                </div>
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-slate-900 tracking-tight">
                    Tentang <span class="bg-gradient-to-r from-brand-600 via-blue-600 to-indigo-600 bg-clip-text text-transparent">AnimeLib</span>
                </h1>
            </div>
            
            <div class="space-y-4 text-slate-600 leading-relaxed text-sm sm:text-base font-normal">
                <p>
                    <strong class="text-slate-900 font-extrabold">AnimeLib</strong> adalah platform perpustakaan anime digital modern yang dirancang untuk memudahkan para penggemar anime dalam mengeksplorasi ribuan judul anime dari berbagai belahan dunia.
                </p>
                <p>
                    Didukung oleh integrasi data langsung dari <span class="text-brand-600 font-bold">Jikan REST API (MyAnimeList)</span> dan arsitektur kokoh <span class="text-slate-900 font-bold">Laravel 12</span>, AnimeLib menyajikan antarmuka yang responsif, cepat, serta bebas hambatan.
                </p>
            </div>

            <!-- KEY FEATURES GRID -->
            <div class="pt-4 space-y-4">
                <h3 class="font-black text-slate-900 text-lg flex items-center gap-2">
                    <span class="w-2 h-5 bg-brand-600 rounded-full"></span>
                    Keunggulan & Fitur Utama
                </h3>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="p-5 rounded-2xl bg-brand-50/40 border border-brand-100 flex items-start gap-4 hover:border-brand-300 transition shadow-sm">
                        <div class="w-11 h-11 rounded-2xl bg-gradient-to-tr from-brand-600 to-blue-600 text-white flex items-center justify-center flex-shrink-0 shadow-md shadow-brand-500/20">
                            <x-icon-flame class="w-5 h-5 text-orange-200" />
                        </div>
                        <div>
                            <h4 class="font-extrabold text-slate-900 text-sm">Peringkat & Tren Anime</h4>
                            <p class="text-xs text-slate-500 mt-1 leading-relaxed">Update berkala judul anime terpopuler, sedang tayang, dan film peringkat teratas.</p>
                        </div>
                    </div>

                    <div class="p-5 rounded-2xl bg-brand-50/40 border border-brand-100 flex items-start gap-4 hover:border-brand-300 transition shadow-sm">
                        <div class="w-11 h-11 rounded-2xl bg-gradient-to-tr from-brand-600 to-blue-600 text-white flex items-center justify-center flex-shrink-0 shadow-md shadow-brand-500/20">
                            <x-icon-tag class="w-5 h-5 text-sky-200" />
                        </div>
                        <div>
                            <h4 class="font-extrabold text-slate-900 text-sm">Penyaringan Kategori Lengkap</h4>
                            <p class="text-xs text-slate-500 mt-1 leading-relaxed">Pencarian cerdas dan pengelompokan berdasarkan genre favorit Anda secara instan.</p>
                        </div>
                    </div>

                    <div class="p-5 rounded-2xl bg-brand-50/40 border border-brand-100 flex items-start gap-4 hover:border-brand-300 transition shadow-sm">
                        <div class="w-11 h-11 rounded-2xl bg-gradient-to-tr from-brand-600 to-blue-600 text-white flex items-center justify-center flex-shrink-0 shadow-md shadow-brand-500/20">
                            <x-icon-heart class="w-5 h-5 text-rose-200" />
                        </div>
                        <div>
                            <h4 class="font-extrabold text-slate-900 text-sm">Koleksi Favorit Pribadi</h4>
                            <p class="text-xs text-slate-500 mt-1 leading-relaxed">Simpan daftar tontonan kesukaan ke dalam akun pribadi untuk akses cepat kapan pun.</p>
                        </div>
                    </div>

                    <div class="p-5 rounded-2xl bg-brand-50/40 border border-brand-100 flex items-start gap-4 hover:border-brand-300 transition shadow-sm">
                        <div class="w-11 h-11 rounded-2xl bg-gradient-to-tr from-brand-600 to-blue-600 text-white flex items-center justify-center flex-shrink-0 shadow-md shadow-brand-500/20">
                            <x-icon-sparkle class="w-5 h-5 text-amber-200" />
                        </div>
                        <div>
                            <h4 class="font-extrabold text-slate-900 text-sm">Desain Modern & Performa Cepat</h4>
                            <p class="text-xs text-slate-500 mt-1 leading-relaxed">Antarmuka biru-putih elegan dengan sistem caching responsif tanpa lag.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TECH TAGS -->
            <div class="pt-4 flex flex-wrap items-center gap-2 text-xs font-bold text-slate-500">
                <span class="text-slate-400">Teknologi:</span>
                <span class="px-3 py-1 rounded-xl bg-slate-100 text-slate-700">PHP 8.2+</span>
                <span class="px-3 py-1 rounded-xl bg-slate-100 text-slate-700">Laravel 12</span>
                <span class="px-3 py-1 rounded-xl bg-slate-100 text-slate-700">Tailwind CSS</span>
                <span class="px-3 py-1 rounded-xl bg-slate-100 text-slate-700">Jikan MAL REST API</span>
            </div>
        </div>
    </div>

    <!-- FEEDBACK FORM CARD -->
    <div class="bg-white rounded-[2.5rem] p-8 sm:p-12 lg:p-14 border border-slate-200/80 shadow-sm relative">
        <div class="max-w-xl space-y-6">
            <div>
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-brand-50 border border-brand-200/80 text-xs font-bold text-brand-700 mb-2 shadow-sm">
                    <svg class="w-3.5 h-3.5 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                    </svg>
                    <span>KOTAK SARAN & MASUKAN</span>
                </div>
                <h2 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight">Kirim Masukan untuk Platform</h2>
                <p class="text-sm text-slate-500 mt-1 leading-relaxed">Punya ide fitur baru, saran antarmuka, atau menemukan kendala teknis? Beritahu kami!</p>
            </div>

            <form action="{{ route('feedback.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-xs font-black text-slate-700 uppercase tracking-wider mb-2">Nama Lengkap</label>
                    <input type="text" name="nama" value="{{ old('nama', Auth::user()->name ?? '') }}" 
                           class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl text-sm focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 transition shadow-sm font-medium" 
                           placeholder="Contoh: Budi Santoso" required>
                </div>
                
                <div>
                    <label class="block text-xs font-black text-slate-700 uppercase tracking-wider mb-2">Pesan atau Saran</label>
                    <textarea name="pesan" rows="4" 
                              class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl text-sm focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 transition shadow-sm font-medium" 
                              placeholder="Tuliskan saran, kritik, atau ide fitur Anda di sini..." required>{{ old('pesan') }}</textarea>
                </div>

                <button type="submit" 
                        class="w-full py-4 bg-gradient-to-r from-brand-600 via-blue-600 to-indigo-600 text-white font-extrabold rounded-2xl hover:from-brand-700 hover:to-indigo-700 shadow-lg shadow-brand-500/20 hover:shadow-xl hover:shadow-brand-500/30 transition-all text-xs uppercase tracking-wider hover:-translate-y-0.5">
                    Kirim Masukan Sekarang &rarr;
                </button>
            </form>
        </div>
    </div>

</div>
@endsection