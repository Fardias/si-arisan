@extends('layouts.app')

@section('title', 'Anggota')

@section('content')

        <div class="mb-8">
            <div class="flex items-center space-x-4 mb-2">
                <div class="bg-gradient-to-r from-[#65764a] to-[#52603c] p-3 rounded-xl shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <circle cx="12" cy="8" r="4" stroke="currentColor" stroke-width="2" fill="none"/>
                        <path d="M4 20c0-3.314 3.582-6 8-6s8 2.686 8 6" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round"/>
                    </svg>
                </div>
                <div>
                    <h1 class="text-3xl font-bold text-slate-800">Daftar Anggota</h1>
                    <p class="text-slate-600">List Anggota</p>
                </div>
            </div>
        </div>

        <div class="bg-[#fffaea] p-6 rounded-xl shadow-md border border-[#65764a]">
            <div class="mb-4">
                <a href="{{ route('anggota.create') }}"
                    class="inline-flex items-center px-4 py-2 bg-[#65764a] text-[#fffaea] rounded hover:bg-[#8fa16b] transition">
                    Tambah Anggota
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-[#65764a]">
                    <thead class="bg-[#fffaea]">
                        <tr>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-[#65764a]">No</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-[#65764a]">Nama</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-[#65764a]">No HP</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-[#65764a]">Tanggal Gabung</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-[#65764a]">Status</th>
                            <th class="px-4 py-2 text-center text-sm font-semibold text-[#65764a]">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-[#fffaea] divide-y divide-[#65764a]">
                        @forelse($data as $anggota)
                            <tr class="hover:bg-[#f3f6e7] transition">
                                <td class="px-4 py-2 text-sm text-[#65764a]">{{ $loop->iteration }}</td>
                                <td class="px-4 py-2 text-sm text-[#65764a]">{{ $anggota->nama }}</td>
                                <td class="px-4 py-2 text-sm text-[#65764a]">{{ $anggota->no_hp }}</td>
                                <td class="px-4 py-2 text-sm text-[#65764a]">
                                    {{ \Carbon\Carbon::parse($anggota->tanggal_bergabung)->format('d/m/Y') }}</td>
                                <td class="px-4 py-2 text-sm">
                                    @if ($anggota->status_keikutsertaan === 1)
                                        <span
                                            class="px-2 py-1 bg-[#65764a] text-[#fffaea] text-xs rounded-full">Aktif</span>
                                    @else
                                        <span class="px-2 py-1 bg-[#fee2e2] text-[#b91c1c] text-xs rounded-full">Tidak
                                            Aktif</span>
                                    @endif
                                </td>
                                <td class="px-4 py-2 text-center text-sm">
                                    <a href="{{ route('anggota.edit', $anggota->id) }}"
                                        class="text-[#65764a] hover:underline text-sm">Edit</a> |
                                    <form action="{{ route('anggota.destroy', $anggota->id) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-400 hover:underline text-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-4 py-4 text-center text-[#65764a]">Belum ada anggota.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
@endsection
