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
                Selamat Datang Kembali
            </h1>
            <p class="text-xs sm:text-sm text-slate-500 mt-1.5 font-medium">
                Masuk ke akun Anda untuk mengelola anime favorit.
            </p>
        </div>

        <!-- Login Form -->
        <form action="/login" method="POST" class="space-y-5 relative z-10">
            @csrf
            <div>
                <label for="email" class="block text-xs font-black text-slate-700 uppercase tracking-wider mb-2">Alamat Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}"
                       class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl text-sm focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 transition shadow-sm font-medium"
                       placeholder="nama@email.com" required autofocus>
            </div>

            <div>
                <div class="flex items-center justify-between mb-2">
                    <label for="password" class="block text-xs font-black text-slate-700 uppercase tracking-wider">Kata Sandi</label>
                </div>
                <input type="password" id="password" name="password" 
                       class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl text-sm focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 transition shadow-sm font-medium"
                       placeholder="••••••••" required>
            </div>

            <button type="submit" 
                    class="w-full py-4 bg-gradient-to-r from-brand-600 via-blue-600 to-indigo-600 hover:from-brand-700 hover:to-indigo-700 text-white font-extrabold rounded-2xl shadow-lg shadow-brand-500/25 hover:shadow-xl hover:shadow-brand-500/35 transition-all duration-200 text-xs uppercase tracking-wider hover:-translate-y-0.5">
                Masuk ke Akun &rarr;
            </button>
        </form>

        <!-- Demo Credentials Hint Box -->
        <div class="mt-6 p-4 rounded-2xl bg-brand-50/70 border border-brand-200/60 text-center relative z-10">
            <p class="text-[10px] font-black text-brand-700 uppercase tracking-widest">Akun Demo Cepat:</p>
            <p class="text-xs text-slate-700 mt-1 font-medium">
                Admin: <code class="font-mono text-brand-700 font-bold bg-white px-1.5 py-0.5 rounded border border-brand-200">admin@animelib.com</code> / <code class="font-mono text-brand-700 font-bold bg-white px-1.5 py-0.5 rounded border border-brand-200">admin123</code>
            </p>
        </div>

        <!-- Footer link -->
        <div class="mt-6 text-center text-xs text-slate-500 relative z-10">
            Belum memiliki akun? 
            <a href="/register" class="font-extrabold text-brand-600 hover:text-brand-700 hover:underline ml-1">
                Daftar Akun Baru
            </a>
        </div>

    </div>
</div>
@endsection