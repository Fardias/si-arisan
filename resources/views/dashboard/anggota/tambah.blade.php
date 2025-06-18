@extends('layouts.app')

@section('title', 'Tambah Anggota')
@section('header', 'Tambah Anggota')

@section('content')
<div>
    <form action="{{ route('anggota.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="mb-3">
            <label for="no_hp" class="form-label">No HP</label>
            <input type="text" class="form-control" id="no_hp" name="no_hp" required>
        </div>
        <div class="mb-3">
            <label for="status_keikutsertaan" class="form-label">Status Keikutsertaan</label>
            <select class="form-control" id="status_keikutsertaan" name="status_keikutsertaan" required>
                <option value="1">Aktif</option>
                <option value="0">Tidak Aktif</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="tanggal_bergabung" class="form-label">Tanggal Bergabung</label>
            <input type="date" class="form-control" id="tanggal_bergabung" name="tanggal_bergabung" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
