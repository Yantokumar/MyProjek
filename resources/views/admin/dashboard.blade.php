@extends('layouts.admin')
@section('title', 'Dashboard Overview')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100">
        <p class="text-sm font-medium text-gray-500 mb-1">Total Anime</p>
        <h3 class="text-3xl font-bold text-blue-600">{{ $totalAnime }}</h3>
    </div>
    <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100">
        <p class="text-sm font-medium text-gray-500 mb-1">Masukan Pengguna</p>
        <h3 class="text-3xl font-bold text-orange-500">{{ $totalPesan }}</h3>
    </div>
    <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100">
        <p class="text-sm font-medium text-gray-500 mb-1">Status Server</p>
        <h3 class="text-3xl font-bold text-green-500">Active</h3>
    </div>
</div>

<div class="mt-10 bg-blue-600 rounded-[2rem] p-8 text-white">
    <h2 class="text-xl font-bold mb-2">Selamat Datang, Admin Bahrudin!</h2>
    <p class="opacity-80">Gunakan panel ini untuk mengelola konten AnimeLib. Perubahan yang Anda lakukan akan langsung tampil di halaman depan.</p>
</div>
@endsection