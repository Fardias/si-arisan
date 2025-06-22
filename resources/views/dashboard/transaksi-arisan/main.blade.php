@extends('layouts.app')

@section('title', 'Transaksi Arisan')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-slate-50 to-slate-100 p-6 rounded-2xl -mt-6">
        <div class="mb-8">
            <div class="flex items-center space-x-4 mb-2">
                <div class="bg-gradient-to-r from-[#65764a] to-[#52603c] p-3 rounded-xl shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <rect x="3" y="7" width="18" height="10" rx="2" stroke-width="2" stroke="currentColor" fill="none"/>
                        <path d="M7 11h6M7 15h10" stroke-width="2" stroke-linecap="round" stroke="currentColor"/>
                        <circle cx="17" cy="11" r="1" fill="currentColor"/>
                    </svg>
                </div>
                <div>
                    <h1 class="text-3xl font-bold text-slate-800">Transaksi Arisan</h1>
                    <p class="text-slate-600">Data Transaksi Arisan</p>
                </div>
            </div>
        </div>
        <div class="bg-[#fffaea] p-6 rounded-xl shadow-md border border-[#65764a]">
            <div class="mb-4">
                <a href="{{ route('transaksi-arisan.create') }}"
                    class="inline-flex items-center px-4 py-2 bg-[#65764a] text-[#fffaea] rounded hover:bg-[#8fa16b] transition">
                    Tambah Transaksi
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-[#65764a]">
                    <thead class="bg-[#fffaea]">
                        <tr>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-[#65764a]">No</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-[#65764a]">Nama</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-[#65764a]">Periode</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-[#65764a]">Total Setoran</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-[#65764a]">Lunas</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-[#65764a]">Menang</th>
                            <th class="px-4 py-2 text-center text-sm font-semibold text-[#65764a]">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-[#fffaea] divide-y divide-[#65764a]">
                        @forelse($data as $transaksi_arisan)
                            <tr class="hover:bg-[#f3f6e7] transition">
                                <td class="px-4 py-2 text-sm text-[#65764a]">{{ $loop->iteration }}</td>
                                <td class="px-4 py-2 text-sm text-[#65764a]">{{ $transaksi_arisan->anggota->nama }}</td>
                                <td class="px-4 py-2 text-sm text-[#65764a]">{{ $transaksi_arisan->periode }}</td>
                                <td class="px-4 py-2 text-sm text-[#65764a]">{{ $transaksi_arisan->total_setoran }}</td>
                                <td class="px-4 py-2 text-sm">
                                    @if ($transaksi_arisan->status_sudah_lunas)
                                        <span
                                            class="px-2 py-1 bg-[#65764a] text-[#fffaea] text-xs rounded-full">Lunas</span>
                                    @else
                                        <span class="px-2 py-1 bg-[#fee2e2] text-[#b91c1c] text-xs rounded-full">Belum
                                            Lunas</span>
                                    @endif
                                </td>
                                <td class="px-4 py-2 text-sm">
                                    @if ($transaksi_arisan->status_menang)
                                        <span
                                            class="px-2 py-1 bg-[#65764a] text-[#fffaea] text-xs rounded-full">Menang</span>
                                    @else
                                        <span class="px-2 py-1 bg-[#fee2e2] text-[#b91c1c] text-xs rounded-full">Belum
                                            Menang</span>
                                    @endif
                                <td class="px-4 py-2 text-center text-sm">
                                    <a href="{{ route('transaksi-arisan.edit', $transaksi_arisan->id) }}"
                                        class="text-[#65764a] hover:underline text-sm">Edit</a> |
                                    <form action="{{ route('transaksi-arisan.destroy', $transaksi_arisan->id) }}"
                                        method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-red-400 hover:underline text-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-4 py-4 text-center text-[#65764a]">Belum ada transaksi
                                    arisan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
