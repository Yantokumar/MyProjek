@extends('layouts.admin')

@section('title', 'Masukan dari Pengguna')

@section('content')
<div class="bg-white rounded-[2rem] shadow-sm border border-gray-100 overflow-hidden">
    <div class="p-8 border-b border-gray-50 flex justify-between items-center bg-white">
        <div>
            <h3 class="font-bold text-xl text-gray-800">Inbox Masukan</h3>
            <p class="text-sm text-gray-400">Daftar saran dan kritik dari halaman Tentang Kami</p>
        </div>
        <span class="bg-blue-50 text-blue-600 px-4 py-2 rounded-xl text-sm font-bold">
            Total: {{ $pesans->count() }} Pesan
        </span>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead class="bg-gray-50 text-gray-400 text-xs uppercase tracking-widest">
                <tr>
                    <th class="px-8 py-5">Tanggal</th>
                    <th class="px-8 py-5">Isi Pesan</th>
                    <th class="px-8 py-5 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse($pesans as $p)
                <tr class="hover:bg-blue-50/30 transition duration-200">
                    <td class="px-8 py-5">
                        <span class="text-sm font-medium text-gray-600">
                            {{ $p->created_at->format('d M Y') }}
                        </span>
                    </td>
                    <td class="px-8 py-5">
                        <p class="text-sm text-gray-700 leading-relaxed max-w-lg">
                            {{ $p->pesan }}
                        </p>
                    </td>
                    <td class="px-8 py-5 text-center">
                        <button class="text-red-500 hover:text-red-700 font-bold text-sm transition">
                            Hapus
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="px-8 py-20 text-center">
                        <div class="flex flex-col items-center">
                            <span class="text-5xl mb-4">📩</span>
                            <p class="text-gray-400 font-medium text-lg">Belum ada masukan dari user.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection