@extends('layouts.app')

@section('title', 'Edit Transaksi Arisan')
@section('header', 'Edit Transaksi Arisan')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow-md border border-gray-200">
    <h2 class="text-xl font-semibold text-gray-800 mb-4">Form Edit Transaksi</h2>

    <form action="{{ route('transaksi-arisan.update', $transaksi->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Pilih Anggota -->
        <div class="mb-4">
            <label for="anggota_id" class="block text-sm font-medium text-gray-700">Nama Anggota</label>
            <select name="anggota_id" id="anggota_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                <option value="">-- Pilih Anggota --</option>
                @foreach($anggota as $a)
                    <option value="{{ $a->id }}" {{ $transaksi->anggota_id === $a->id ? 'selected' : '' }}>{{ $a->nama }}</option>
                @endforeach
            </select>
        </div>

        <!-- Total Setoran -->
        <div class="mb-4">
            <label for="total_setoran" class="block text-sm font-medium text-gray-700">Total Setoran</label>
            <input type="number" name="total_setoran" id="total_setoran" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ $transaksi->total_setoran }}" required>
        </div>

        <!-- Status Lunas -->
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Status Pembayaran</label>
            <select name="status_sudah_lunas" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                <option value="1" {{ $transaksi->status_sudah_lunas ? 'selected' : '' }}>Lunas</option>
                <option value="0" {{ !$transaksi->status_sudah_lunas ? 'selected' : '' }}>Belum Lunas</option>
            </select>
        </div>

        <!-- Status Menang -->
        <div class="mb-4">
            <label class="inline-flex items-center">
                <input type="checkbox" name="status_menang_arisan" value="1" class="form-checkbox text-blue-600" {{ $transaksi->status_menang_arisan ? 'checked' : '' }}>
                <span class="ml-2 text-sm text-gray-700">Menang</span>
                <input type="checkbox" name="status_menang_arisan" value="0" class="form-checkbox text-blue-600" {{ !$transaksi->status_menang_arisan ? 'checked' : '' }}>
                <span class="ml-2 text-sm text-gray-700">Belum</span>
            </label>
        </div>

        <!-- Tombol -->
        <div class="mt-6">
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                Simpan
            </button>
            <a href="{{ route('transaksi-arisan.index') }}" class="ml-2 text-gray-600 hover:underline text-sm">Kembali</a>
        </div>
    </form>
</div>
@endsection
