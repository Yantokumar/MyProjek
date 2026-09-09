@extends('layouts.admin')
@section('title', 'Manajemen Pengguna')

@section('content')
<div class="bg-white rounded-[2rem] shadow-sm border border-slate-100 overflow-hidden">
    <div class="p-6 sm:p-8 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h3 class="font-bold text-xl text-slate-900">Daftar Pengguna Terdaftar</h3>
            <p class="text-xs text-slate-400 mt-0.5">Semua akun pengguna yang terdaftar di sistem AnimeLib</p>
        </div>
        <span class="inline-flex items-center gap-2 bg-brand-50 text-brand-700 px-4 py-2 rounded-xl text-xs font-bold border border-brand-200/60 self-start sm:self-auto">
            <svg class="w-4 h-4 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
            </svg>
            <span>Total: {{ $allUsers->count() }} Pengguna</span>
        </span>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead class="bg-slate-50 text-slate-400 text-[11px] uppercase tracking-wider font-bold">
                <tr>
                    <th class="px-8 py-4">Nama Lengkap</th>
                    <th class="px-8 py-4">Alamat Email</th>
                    <th class="px-8 py-4">Peran (Role)</th>
                    <th class="px-8 py-4">Bergabung Pada</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @foreach($allUsers as $user)
                <tr class="hover:bg-slate-50/60 transition">
                    <td class="px-8 py-4 font-bold text-slate-900 text-sm whitespace-nowrap">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-brand-100 text-brand-700 font-bold text-xs flex items-center justify-center">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </div>
                            <span>{{ $user->name }}</span>
                        </div>
                    </td>
                    <td class="px-8 py-4 text-slate-600 text-sm whitespace-nowrap">
                        {{ $user->email }}
                    </td>
                    <td class="px-8 py-4 whitespace-nowrap">
                        @if($user->role === 'admin')
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-indigo-50 text-indigo-700 border border-indigo-200">
                                <svg class="w-3 h-3 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                </svg>
                                <span>Administrator</span>
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-slate-100 text-slate-700">
                                <svg class="w-3 h-3 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                <span>Pengguna</span>
                            </span>
                        @endif
                    </td>
                    <td class="px-8 py-4 text-xs font-medium text-slate-400 whitespace-nowrap">
                        {{ $user->created_at->format('d M Y, H:i') }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection