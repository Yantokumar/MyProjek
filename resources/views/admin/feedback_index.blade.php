@extends('layouts.admin')

@section('title', 'Masukan dari Pengguna')

@section('content')
<div class="bg-white rounded-[2rem] shadow-sm border border-slate-100 overflow-hidden">
    <div class="p-6 sm:p-8 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white">
        <div>
            <h3 class="font-bold text-xl text-slate-900">Inbox Masukan Pengguna</h3>
            <p class="text-xs text-slate-400 mt-0.5">Daftar saran, kritik, dan laporan bug dari halaman Tentang Kami</p>
        </div>
        <span class="inline-flex items-center gap-2 bg-brand-50 text-brand-700 px-4 py-2 rounded-xl text-xs font-bold border border-brand-200/60 self-start sm:self-auto">
            <svg class="w-4 h-4 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
            </svg>
            <span>Total: {{ $pesans->count() }} Pesan</span>
        </span>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead class="bg-slate-50 text-slate-400 text-[11px] uppercase tracking-wider font-bold">
                <tr>
                    <th class="px-8 py-4">Tanggal</th>
                    <th class="px-8 py-4">Nama Pengirim</th>
                    <th class="px-8 py-4">Isi Pesan Masukan</th>
                    <th class="px-8 py-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($pesans as $p)
                <tr class="hover:bg-slate-50/60 transition">
                    <td class="px-8 py-5 whitespace-nowrap">
                        <span class="text-xs font-semibold text-slate-500">
                            {{ $p->created_at->format('d M Y, H:i') }}
                        </span>
                    </td>
                    <td class="px-8 py-5 whitespace-nowrap">
                        <span class="font-bold text-slate-800 text-sm">{{ $p->nama }}</span>
                    </td>
                    <td class="px-8 py-5">
                        <p class="text-sm text-slate-600 leading-relaxed max-w-xl">
                            {{ $p->pesan }}
                        </p>
                    </td>
                    <td class="px-8 py-5 text-center whitespace-nowrap">
                        <form action="{{ route('admin.feedback.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesan ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-3.5 py-1.5 rounded-lg text-rose-600 hover:text-rose-700 hover:bg-rose-50 font-bold text-xs transition border border-rose-200">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="py-16 text-center text-slate-400 text-sm">
                        <div class="w-12 h-12 rounded-2xl bg-slate-100 text-slate-400 flex items-center justify-center mx-auto mb-2">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                            </svg>
                        </div>
                        Belum ada pesan masukan yang masuk dari pengguna.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection