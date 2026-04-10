@extends('layouts.admin')
@section('title', 'Manajemen User')

@section('content')
<div class="bg-white rounded-[2rem] shadow-sm border border-gray-100 overflow-hidden">
    <div class="p-8 border-b border-gray-50 flex justify-between items-center">
        <h3 class="font-bold text-xl text-gray-800">Daftar Pengguna Terdaftar</h3>
        <span class="bg-blue-100 text-blue-600 px-4 py-1 rounded-full text-xs font-bold">
            {{ $allUsers->count() }} User
        </span>
    </div>
    <table class="w-full text-left">
        <thead class="bg-gray-50 text-gray-400 text-xs uppercase">
            <tr>
                <th class="px-8 py-4">Nama</th>
                <th class="px-8 py-4">Email</th>
                <th class="px-8 py-4">Bergabung Pada</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
            @foreach($allUsers as $user)
            <tr class="hover:bg-gray-50 transition">
                <td class="px-8 py-4 font-bold text-gray-800">{{ $user->name }}</td>
                <td class="px-8 py-4 text-gray-500">{{ $user->email }}</td>
                <td class="px-8 py-4 text-sm text-gray-400">
                    {{ $user->created_at->format('d M Y') }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection