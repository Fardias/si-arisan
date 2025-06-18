@extends('layouts.app')

@section('title', 'Transaksi Arisan')
@section('header', 'Transaksi Arisan')

@section('content')
<div class="grid grid-cols-1 gap-6">
    <div class="bg-white p-6 rounded-xl shadow-md border border-gray-200">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Daftar Transaksi Arisan</h2>

        <div class="mb-4">
            <a href="{{ route('transaksi-arisan.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                Tambah Transaksi
            </a>
        </div>

        
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">No</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Nama</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Periode</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Total Setoran</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Lunas</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Menang</th>
                        <th class="px-4 py-2 text-center text-sm font-semibold text-gray-600">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @forelse($data as $transaksi_arisan)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-4 py-2 text-sm text-gray-700">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2 text-sm text-gray-800">{{ $transaksi_arisan->anggota->nama }}</td>
                            <td class="px-4 py-2 text-sm text-gray-800">{{ $transaksi_arisan->periode }}</td>
                            <td class="px-4 py-2 text-sm text-gray-800">{{ $transaksi_arisan->total_setoran }}</td>
                            <td class="px-4 py-2 text-sm text-gray-800">
                                @if($transaksi_arisan->status_sudah_lunas)
                                    <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">Lunas</span>
                                @else
                                    <span class="px-2 py-1 bg-red-100 text-red-800 text-xs rounded-full">Belum Lunas</span>
                                @endif
                            </td>
                            <td class="px-4 py-2 text-sm text-gray-800">
                                @if($transaksi_arisan->status_menang)
                                    <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">Menang</span>
                                @else
                                    <span class="px-2 py-1 bg-red-100 text-red-800 text-xs rounded-full">Belum Menang</span>
                                @endif
                            <td class="px-4 py-2 text-center text-sm">
                                <a href="{{ route('transaksi-arisan.edit', $transaksi_arisan->id) }}" class="text-blue-600 hover:underline text-sm">Edit</a> |
                                <form action="{{ route('transaksi-arisan.destroy', $transaksi_arisan->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline text-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-4 text-center text-gray-500">Belum ada transaksi arisan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
