@extends('layouts.main')

@section('container')
<div class="min-h-[75vh] flex items-center justify-center py-6">
    <div class="w-full max-w-md bg-white rounded-[2.5rem] p-8 sm:p-10 border border-slate-200/80 shadow-2xl shadow-brand-500/5 relative overflow-hidden">
        
        <!-- Ambient corner glow -->
        <div class="absolute -top-20 -right-20 w-48 h-48 bg-brand-200/40 rounded-full blur-2xl pointer-events-none"></div>

        <!-- Header -->
        <div class="text-center mb-8 relative z-10">
            <div class="w-14 h-14 rounded-2xl bg-gradient-to-tr from-brand-600 via-blue-600 to-indigo-600 p-2.5 flex items-center justify-center text-white shadow-xl shadow-brand-500/25 mx-auto mb-4">
                <x-icon-brand class="w-full h-full" />
            </div>
            <h1 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight">
                Daftar Akun Baru
            </h1>
            <p class="text-xs sm:text-sm text-slate-500 mt-1.5 font-medium">
                Bergabunglah dengan komunitas pecinta anime di AnimeLib.
            </p>
        </div>

        <!-- Register Form -->
        <form action="/register" method="POST" class="space-y-4 relative z-10">
            @csrf
            <div>
                <label for="name" class="block text-xs font-black text-slate-700 uppercase tracking-wider mb-2">Nama Lengkap</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" 
                       class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl text-sm focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 transition shadow-sm font-medium" 
                       placeholder="Nama lengkap Anda" required autofocus>
            </div>

            <div>
                <label for="email" class="block text-xs font-black text-slate-700 uppercase tracking-wider mb-2">Alamat Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" 
                       class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl text-sm focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 transition shadow-sm font-medium" 
                       placeholder="user@mail.com" required>
            </div>

            <div>
                <label for="password" class="block text-xs font-black text-slate-700 uppercase tracking-wider mb-2">Kata Sandi</label>
                <input type="password" id="password" name="password" 
                       class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl text-sm focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 transition shadow-sm font-medium" 
                       placeholder="Minimal 6 karakter" required>
            </div>

            <div class="pt-2">
                <button type="submit" 
                        class="w-full py-4 bg-gradient-to-r from-brand-600 via-blue-600 to-indigo-600 hover:from-brand-700 hover:to-indigo-700 text-white font-extrabold rounded-2xl shadow-lg shadow-brand-500/25 hover:shadow-xl hover:shadow-brand-500/35 transition-all duration-200 text-xs uppercase tracking-wider hover:-translate-y-0.5">
                    Daftar Sekarang &rarr;
                </button>
            </div>
        </form>

        <!-- Footer link -->
        <div class="mt-6 text-center text-xs text-slate-500 relative z-10">
            Sudah memiliki akun? 
            <a href="/login" class="font-extrabold text-brand-600 hover:text-brand-700 hover:underline ml-1">
                Masuk di Sini
            </a>
        </div>

    </div>
</div>
@endsection