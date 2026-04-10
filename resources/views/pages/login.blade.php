@extends('layouts.main')

@section('container')
<div class="min-h-[80vh] flex items-center justify-center px-6">
    <div class="bg-white w-full max-w-md rounded-[2.5rem] shadow-2xl shadow-blue-100 border border-gray-100 p-10">
        
        <div class="text-center mb-10">
            <h1 class="text-3xl font-extrabold text-gray-900 mb-2">Login Ke <span class="text-blue-600">AnimeLib</span></h1>
            <p class="text-gray-500 text-sm">Masukkan akun Anda untuk akses penuh.</p>
        </div>

        <form action="/login" method="POST">
            @csrf
            <div class="mb-6">
                <label for="email" class="block text-sm font-bold text-gray-700 mb-2 ml-1">Email atau Username</label>
                <input type="text" id="email" name="email" 
                    class="w-full px-5 py-4 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-2 focus:ring-blue-600 focus:border-transparent outline-none transition text-sm"
                    placeholder="Contoh: user@mail.com" required>
            </div>

            <div class="mb-8">
                <label for="password" class="block text-sm font-bold text-gray-700 mb-2 ml-1">Password</label>
                <input type="password" id="password" name="password" 
                    class="w-full px-5 py-4 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-2 focus:ring-blue-600 focus:border-transparent outline-none transition text-sm"
                    placeholder="••••••••" required>
            </div>

            <button type="submit" 
                class="w-full bg-blue-600 text-white py-4 rounded-2xl font-bold text-lg hover:bg-blue-700 shadow-lg shadow-blue-200 transition duration-300">
                Masuk Sekarang
            </button>
        </form>

        <div class="mt-8 text-center">
            <p class="text-sm text-gray-600">
                Belum punya akun? 
                <a href="/register" class="text-blue-600 font-bold hover:underline">Daftar Baru</a>
            </p>
        </div>

    </div>
</div>
@endsection