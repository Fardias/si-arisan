@extends('layouts.app')

@section('title', 'Transaksi Arisan')
@section('header', 'Transaksi Arisan')

@section('content')
<div class="grid grid-cols-1 gap-6">
    <div class="bg-[#fffaea] p-6 rounded-xl shadow-md border border-[#65764a]">
        <h2 class="text-xl font-semibold text-[#65764a] mb-4">Daftar Transaksi Arisan</h2>

        <div class="mb-4">
            <a href="{{ route('transaksi-arisan.create') }}" class="inline-flex items-center px-4 py-2 bg-[#65764a] text-[#fffaea] rounded hover:bg-[#8fa16b] transition">
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
                                @if($transaksi_arisan->status_sudah_lunas)
                                    <span class="px-2 py-1 bg-[#65764a] text-[#fffaea] text-xs rounded-full">Lunas</span>
                                @else
                                    <span class="px-2 py-1 bg-[#fee2e2] text-[#b91c1c] text-xs rounded-full">Belum Lunas</span>
                                @endif
                            </td>
                            <td class="px-4 py-2 text-sm">
                                @if($transaksi_arisan->status_menang)
                                    <span class="px-2 py-1 bg-[#65764a] text-[#fffaea] text-xs rounded-full">Menang</span>
                                @else
                                    <span class="px-2 py-1 bg-[#fee2e2] text-[#b91c1c] text-xs rounded-full">Belum Menang</span>
                                @endif
                            <td class="px-4 py-2 text-center text-sm">
                                <a href="{{ route('transaksi-arisan.edit', $transaksi_arisan->id) }}" class="text-[#65764a] hover:underline text-sm">Edit</a> |
                                <form action="{{ route('transaksi-arisan.destroy', $transaksi_arisan->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-400 hover:underline text-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-4 py-4 text-center text-[#65764a]">Belum ada transaksi arisan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
