@extends('layouts.app')

@section('title', 'Edit Anggota')
@section('header', 'Edit Anggota')

@section('content')

    @include('components.alert')

    <section class="mb-10">

        <div class="flex items-center space-x-4 mb-6">
            <div class="bg-gradient-to-r from-[#65764a] to-[#52603c] p-3 rounded-xl shadow-lg">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <circle cx="12" cy="8" r="4" stroke="currentColor" stroke-width="2" fill="none" />
                    <path d="M4 20c0-3.314 3.582-6 8-6s8 2.686 8 6" stroke="currentColor" stroke-width="2" fill="none"
                        stroke-linecap="round" />
                </svg>
            </div>
            <div>
                <h1 class="text-3xl font-bold text-slate-800">Edit Anggota</h1>
                <p class="text-slate-600 text-sm">Perbarui informasi anggota di bawah ini</p>
            </div>
        </div>


        <div class="bg-white rounded-xl shadow-xl overflow-hidden transition-all duration-300">

            <div class="p-6 md:p-8 bg-gradient-to-b from-slate-50 to-white">
                <form action="{{ route('anggota.update', $anggota->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div>
                            <label for="nama" class="flex items-center gap-2 text-sm font-medium text-slate-700 mb-2">
                                <svg class="w-4 h-4 text-[#65764a]" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                Nama Lengkap
                            </label>
                            <input type="text" id="nama" name="nama" value="{{ $anggota->nama }}" required
                                placeholder="Masukkan nama lengkap"
                                class="w-full px-4 py-3 rounded-lg border-2 border-slate-200 focus:border-[#65764a] focus:ring-4 focus:ring-[#65764a]/20 placeholder-slate-400 text-slate-700 text-sm">
                        </div>


                        <div>
                            <label for="no_hp" class="flex items-center gap-2 text-sm font-medium text-slate-700 mb-2">
                                <svg class="w-4 h-4 text-[#65764a]" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                Nomor Handphone
                            </label>
                            <input type="text" id="no_hp" name="no_hp" value="{{ $anggota->no_hp }}" required
                                placeholder="Contoh: 08123456789"
                                class="w-full px-4 py-3 rounded-lg border-2 border-slate-200 focus:border-[#65764a] focus:ring-4 focus:ring-[#65764a]/20 placeholder-slate-400 text-slate-700 text-sm">
                        </div>


                        <div>
                            <label for="status_keikutsertaan"
                                class="flex items-center gap-2 text-sm font-medium text-slate-700 mb-2">
                                <svg class="w-4 h-4 text-[#65764a]" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                Status Keikutsertaan
                            </label>
                            <select id="status_keikutsertaan" name="status_keikutsertaan" required
                                class="w-full px-4 py-3 rounded-lg border-2 border-slate-200 focus:border-[#65764a] focus:ring-4 focus:ring-[#65764a]/20 text-slate-700 text-sm">
                                <option value="1" {{ $anggota->status_keikutsertaan === 1 ? 'selected' : '' }}>✅ Aktif
                                </option>
                                <option value="0" {{ $anggota->status_keikutsertaan === 0 ? 'selected' : '' }}>❌ Tidak
                                    Aktif</option>
                            </select>
                        </div>


                        <div>
                            <label for="tanggal_bergabung"
                                class="flex items-center gap-2 text-sm font-medium text-slate-700 mb-2">
                                <svg class="w-4 h-4 text-[#65764a]" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                Tanggal Bergabung
                            </label>
                            <input type="date" id="tanggal_bergabung" name="tanggal_bergabung"
                                value="{{ $anggota->tanggal_bergabung }}" required
                                class="w-full px-4 py-3 rounded-lg border-2 border-slate-200 focus:border-[#65764a] focus:ring-4 focus:ring-[#65764a]/20 text-slate-700 text-sm">
                        </div>
                    </div>


                    <div class="flex flex-col md:flex-row justify-between gap-4 pt-4">
                        <a href="{{ route('anggota.index') }}"
                            class="w-full md:w-auto px-6 py-3 text-sm font-semibold bg-slate-500 text-white rounded-lg shadow hover:bg-slate-600 transition">
                            Batal
                        </a>
                        <button type="submit"
                            class="w-full md:w-auto px-6 py-3 text-sm font-semibold bg-gradient-to-r from-[#65764a] to-[#52603c] text-white rounded-lg shadow hover:from-[#52603c] hover:to-[#3d4a2e] transition">
                            Perbarui Anggota
                        </button>
                    </div>
                </form>
            </div>


            <div class="bg-slate-100 px-6 py-4 border-t border-slate-200">
                <p class="text-xs text-slate-500 text-center flex items-center justify-center space-x-1">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>Perubahan akan disimpan setelah menekan tombol "Perbarui Anggota"</span>
                </p>
            </div>
        </div>
    </section>
@endsection
