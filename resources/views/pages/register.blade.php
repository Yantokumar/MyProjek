@extends('layouts.main')

@section('container')
<div class="min-h-[80vh] flex items-center justify-center px-6">
    <div class="bg-white w-full max-w-md rounded-[2.5rem] shadow-2xl shadow-blue-100 border border-gray-100 p-10">
        <div class="text-center mb-10">
            <h1 class="text-3xl font-extrabold text-gray-900 mb-2">Daftar Akun</h1>
            <p class="text-gray-500 text-sm">Bergabunglah dengan komunitas AnimeLib.</p>
        </div>

        <form action="/register" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Nama Lengkap</label>
                <input type="text" name="name" class="w-full px-5 py-4 bg-gray-50 border border-gray-200 rounded-2xl outline-none focus:ring-2 focus:ring-blue-600 transition" placeholder="Masukkan nama Anda" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Email</label>
                <input type="email" name="email" class="w-full px-5 py-4 bg-gray-50 border border-gray-200 rounded-2xl outline-none focus:ring-2 focus:ring-blue-600 transition" placeholder="user@mail.com" required>
            </div>
            <div class="mb-6">
                <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Password</label>
                <input type="password" name="password" class="w-full px-5 py-4 bg-gray-50 border border-gray-200 rounded-2xl outline-none focus:ring-2 focus:ring-blue-600 transition" placeholder="Minimal 6 karakter" required>
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white py-4 rounded-2xl font-bold text-lg hover:bg-blue-700 transition shadow-lg shadow-blue-200">Daftar Sekarang</button>
        </form>
    </div>
</div>
@endsection