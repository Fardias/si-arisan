@extends('layouts.app')

@section('title', 'Transaksi Arisan')

@section('content')
    @include('components.alert')

    <div class="mb-8">
        <div class="flex items-center space-x-4 mb-2">
            <div class="bg-gradient-to-r from-[#65764a] to-[#52603c] p-3 rounded-xl shadow-lg">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <rect x="3" y="7" width="18" height="10" rx="2" stroke-width="2" stroke="currentColor"
                        fill="none" />
                    <path d="M7 11h6M7 15h10" stroke-width="2" stroke-linecap="round" stroke="currentColor" />
                    <circle cx="17" cy="11" r="1" fill="currentColor" />
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
                        @php
                            // dd($transaksi_arisan);
                        @endphp
                        <tr class="hover:bg-[#f3f6e7] transition">
                            <td class="px-4 py-2 text-sm text-[#65764a]">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2 text-sm text-[#65764a]">{{ $transaksi_arisan->anggota->nama }}</td>
                            <td class="px-4 py-2 text-sm text-[#65764a]">{{ $transaksi_arisan->periode }}</td>
                            <td class="px-4 py-2 text-sm text-[#65764a]">{{ $transaksi_arisan->total_setoran }}</td>
                            <td class="px-4 py-2 text-sm">
                                @if ($transaksi_arisan->status_sudah_lunas == 1)
                                    <span class="px-2 py-1 bg-[#65764a] text-[#fffaea] text-xs rounded-full">Lunas</span>
                                @else
                                    <span class="px-2 py-1 bg-[#fee2e2] text-[#b91c1c] text-xs rounded-full">Belum
                                        Lunas</span>
                                @endif
                            </td>
                            <td class="px-4 py-2 text-sm">
                                @if ($transaksi_arisan->status_menang_arisan == 1)
                                    <span class="px-2 py-1 bg-[#65764a] text-[#fffaea] text-xs rounded-full">Menang</span>
                                @else
                                    <span class="px-2 py-1 bg-[#fee2e2] text-[#b91c1c] text-xs rounded-full">Belum
                                        Menang</span>
                                @endif
                                {{-- <td class="px-4 py-2 text-center text-sm">
                                <a href="{{ route('transaksi-arisan.edit', $transaksi_arisan->id) }}"
                                    class="text-[#65764a] hover:underline text-sm"></a> |
                                <form action="{{ route('transaksi-arisan.destroy', $transaksi_arisan->id) }}" method="POST"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-400 hover:underline text-sm">Hapus</button>
                                </form>
                            </td> --}}
                            <td class="px-4 py-2 text-center text-sm">
                                <div class="flex justify-center gap-2">
                                    
                                    <a href="{{ route('transaksi-arisan.edit', $transaksi_arisan->id) }}"
                                        class="group inline-flex items-center justify-center px-3 py-1.5 rounded-md bg-[#8fa16b] text-white hover:bg-[#65764a] transition-all duration-200 shadow-sm text-xs font-semibold"
                                        title="Edit">
                                        <span class="flex items-center justify-center w-4 h-4 mx-auto">
                                            <svg class="w-4 h-4 group-hover:rotate-6 transition-transform" fill="none"
                                                stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15.232 5.232l3.536 3.536M9 13l6.586-6.586a2 2 0 112.828 2.828L11.828 15.828a4 4 0 01-1.414.94l-4.243 1.415 1.415-4.243a4 4 0 01.94-1.414z" />
                                            </svg>
                                        </span>
                                    </a>


                                    <form action="{{ route('transaksi-arisan.destroy', $transaksi_arisan->id) }}"
                                        method="POST" class="inline delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" onclick="showDeleteModal(this.closest('form'))"
                                            class="group inline-flex items-center justify-center px-3 py-1.5 rounded-md bg-red-500 text-white hover:bg-red-600 transition-all duration-200 shadow-sm text-xs font-semibold"
                                            title="Hapus">
                                            <svg class="w-4 h-4 group-hover:scale-110 transition-transform mx-auto"
                                                fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
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
@endsection
