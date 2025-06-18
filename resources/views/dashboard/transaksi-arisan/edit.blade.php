@extends('layouts.app')

@section('title', 'Edit Transaksi Arisan')
@section('header', 'Edit Transaksi Arisan')

@section('content')
    <div
        class="max-w-md mx-auto md:max-w-full md:mx-0 bg-white rounded-xl shadow-xl overflow-hidden transform transition-all duration-300 hover:shadow-2xl">
        {{-- Header dengan gradient background --}}
        <div class="bg-gradient-to-r from-[#65764a] to-[#52603c] p-6 text-white">
            <div class="flex items-center space-x-3">
                <div class="bg-white/20 p-2 rounded-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z">
                        </path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-xl font-bold">Edit Transaksi Arisan</h3>
                    <p class="text-white/80 text-sm mt-1">Perbarui data transaksi arisan di bawah ini</p>
                </div>
            </div>
        </div>

        {{-- Form Content --}}
        <div class="p-6 md:p-8 bg-gradient-to-b from-slate-50 to-white">
            <form action="{{ route('transaksi-arisan.update', $transaksi->id) }}" method="POST" class="space-y-5">
                @csrf
                @method('PUT')

                {{-- Grid Layout untuk Desktop --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-6">

                    {{-- Pilih Anggota --}}
                    <div class="group md:col-span-1">
                        <label for="anggota_id"
                            class="flex items-center space-x-2 text-sm font-semibold text-slate-700 mb-2">
                            <svg class="w-4 h-4 text-[#65764a]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            <span>Nama Anggota</span>
                        </label>
                        <div class="relative">
                            <select name="anggota_id" id="anggota_id" required
                                class="block w-full px-4 py-3 md:py-4 rounded-lg border-2 border-slate-200
                                       focus:border-[#65764a] focus:ring-4 focus:ring-[#65764a]/20
                                       transition-all duration-200 ease-in-out
                                       group-hover:border-slate-300
                                       text-slate-700 appearance-none cursor-pointer text-sm md:text-base">
                                <option value="">-- Pilih Anggota --</option>
                                @foreach ($anggota as $a)
                                    <option value="{{ $a->id }}"
                                        {{ $transaksi->anggota_id === $a->id ? 'selected' : '' }}>{{ $a->nama }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    {{-- Periode --}}
                    <div class="group md:col-span-1">
                        <label for="periode" class="flex items-center space-x-2 text-sm font-semibold text-slate-700 mb-2">
                            <svg class="w-4 h-4 text-[#65764a]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                            <span>Periode</span>
                        </label>
                        <input type="date" name="periode" id="periode" value="{{ $transaksi->periode }}" required
                            class="block w-full px-4 py-3 md:py-4 rounded-lg border-2 border-slate-200
                                  focus:border-[#65764a] focus:ring-4 focus:ring-[#65764a]/20
                                  transition-all duration-200 ease-in-out
                                  group-hover:border-slate-300
                                  text-slate-700 text-sm md:text-base">
                    </div>

                    {{-- Total Setoran --}}
                    <div class="group md:col-span-1">
                        <label for="total_setoran"
                            class="flex items-center space-x-2 text-sm font-semibold text-slate-700 mb-2">
                            <svg class="w-4 h-4 text-[#65764a]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1">
                                </path>
                            </svg>
                            <span>Total Setoran</span>
                        </label>
                        <div class="relative">
                            <span
                                class="absolute left-3 top-1/2 transform -translate-y-1/2 text-slate-500 text-sm md:text-base">Rp</span>
                            <input type="number" name="total_setoran" id="total_setoran"
                                value="{{ $transaksi->total_setoran }}" required placeholder="0"
                                class="block w-full pl-10 pr-4 py-3 md:py-4 rounded-lg border-2 border-slate-200
                                      focus:border-[#65764a] focus:ring-4 focus:ring-[#65764a]/20
                                      transition-all duration-200 ease-in-out
                                      group-hover:border-slate-300
                                      placeholder-slate-400 text-slate-700 text-sm md:text-base">
                        </div>
                    </div>

                    {{-- Status Pembayaran --}}
                    <div class="group md:col-span-1">
                        <label for="status_sudah_lunas"
                            class="flex items-center space-x-2 text-sm font-semibold text-slate-700 mb-2">
                            <svg class="w-4 h-4 text-[#65764a]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>Status Pembayaran</span>
                        </label>
                        <div class="relative">
                            <select name="status_sudah_lunas" required
                                class="block w-full px-4 py-3 md:py-4 rounded-lg border-2 border-slate-200
                                       focus:border-[#65764a] focus:ring-4 focus:ring-[#65764a]/20
                                       transition-all duration-200 ease-in-out
                                       group-hover:border-slate-300
                                       text-slate-700 appearance-none cursor-pointer text-sm md:text-base">
                                <option value="1" {{ $transaksi->status_sudah_lunas ? 'selected' : '' }}>✅ Lunas
                                </option>
                                <option value="0" {{ !$transaksi->status_sudah_lunas ? 'selected' : '' }}>⏳ Belum Lunas
                                </option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Status Menang Arisan --}}
                <div class="group">
                    <label class="flex items-center space-x-2 text-sm font-semibold text-slate-700 mb-3">
                        <svg class="w-4 h-4 text-[#65764a]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z">
                            </path>
                        </svg>
                        <span>Status Menang Arisan</span>
                    </label>
                    <div class="flex flex-col sm:flex-row gap-3">
                        <label
                            class="flex items-center p-4 border-2 border-slate-200 rounded-lg cursor-pointer hover:border-[#65764a]/50 transition-all duration-200 group-hover:border-slate-300">
                            <input type="radio" name="status_menang_arisan" value="1"
                                class="w-4 h-4 text-[#65764a] border-slate-300 focus:ring-[#65764a] focus:ring-2"
                                {{ $transaksi->status_menang_arisan ? 'checked' : '' }}>
                            <span class="ml-3 text-sm md:text-base text-slate-700 font-medium">🏆 Menang</span>
                        </label>
                        <label
                            class="flex items-center p-4 border-2 border-slate-200 rounded-lg cursor-pointer hover:border-[#65764a]/50 transition-all duration-200 group-hover:border-slate-300">
                            <input type="radio" name="status_menang_arisan" value="0"
                                class="w-4 h-4 text-[#65764a] border-slate-300 focus:ring-[#65764a] focus:ring-2"
                                {{ !$transaksi->status_menang_arisan ? 'checked' : '' }}>
                            <span class="ml-3 text-sm md:text-base text-slate-700 font-medium">⏳ Belum Menang</span>
                        </label>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="pt-4 md:pt-6 flex flex-col md:flex-row gap-3 md:gap-4">
                    {{-- Cancel Button --}}
                    <a href="{{ route('transaksi-arisan.index') }}"
                        class="group relative w-full md:w-auto md:min-w-[150px]
                          bg-slate-500 text-white font-bold py-3.5 md:py-4 px-6 md:px-8 rounded-lg shadow-lg
                          hover:bg-slate-600
                          transform hover:scale-[1.02] active:scale-[0.98]
                          transition-all duration-200 ease-in-out
                          focus:outline-none focus:ring-4 focus:ring-slate-500/30
                          overflow-hidden text-sm md:text-base text-center">
                        <span class="relative flex items-center justify-center space-x-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            <span>Kembali</span>
                        </span>
                    </a>

                    {{-- Update Button --}}
                    <button type="submit"
                        class="group relative w-full md:w-auto md:min-w-[200px] md:ml-auto
                               bg-gradient-to-r from-[#65764a] to-[#52603c]
                               text-white font-bold py-3.5 md:py-4 px-6 md:px-8 rounded-lg shadow-lg
                               hover:from-[#52603c] hover:to-[#3d4a2e]
                               transform hover:scale-[1.02] active:scale-[0.98]
                               transition-all duration-200 ease-in-out
                               focus:outline-none focus:ring-4 focus:ring-[#65764a]/30
                               overflow-hidden text-sm md:text-base">
                        <span class="relative flex items-center justify-center space-x-2">
                            <svg class="w-5 h-5 group-hover:rotate-12 transition-transform duration-200" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                            </svg>
                            <span>Perbarui Transaksi</span>
                        </span>
                        {{-- Hover effect overlay --}}
                        <div
                            class="absolute inset-0 bg-white/10 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left">
                        </div>
                    </button>
                </div>
            </form>
        </div>

        <div class="px-6 md:px-8 py-4 bg-slate-50 border-t border-slate-100">
            <p class="text-xs md:text-sm text-slate-500 text-center flex items-center justify-center space-x-1">
                <svg class="w-3 h-3 md:w-4 md:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span>Pastikan semua data transaksi telah diisi dengan benar sebelum menyimpan</span>
            </p>
        </div>
    </div>
@endsection
