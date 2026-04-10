@extends('layouts.admin')
@section('title', 'Manajemen Data Anime')

@section('content')
<div class="bg-white rounded-[2rem] shadow-sm border border-gray-100 overflow-hidden">
    <div class="p-6 border-b border-gray-50 flex justify-between items-center">
        <h3 class="font-bold text-gray-700">Daftar Judul</h3>
        <button class="bg-blue-600 text-white px-4 py-2 rounded-xl text-sm font-bold hover:bg-blue-700">+ Tambah Anime</button>
    </div>
    <table class="w-full text-left">
        <thead class="bg-gray-50 text-gray-400 text-xs uppercase">
            <tr>
                <th class="px-6 py-4">Judul</th>
                <th class="px-6 py-4">Genre</th>
                <th class="px-6 py-4">Rating</th>
                <th class="px-6 py-4 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
            @foreach($animes as $a)
            <tr class="hover:bg-gray-50 transition">
                <td class="px-6 py-4 font-bold text-gray-800">{{ $a->judul }}</td>
                <td class="px-6 py-4 text-sm text-gray-500">{{ $a->genre }}</td>
                <td class="px-6 py-4 text-blue-600 font-bold">⭐ {{ $a->rating }}</td>
                <td class="px-6 py-4 text-center">
                    <button class="text-gray-400 hover:text-blue-600 mx-2">Edit</button>
                    <button class="text-gray-400 hover:text-red-600 mx-2">Hapus</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection