@extends('layouts.app')

@section('title', 'Tambah Anggota')
@section('header', 'Tambah Anggota')

@section('content')
    <div
        class="max-w-md mx-auto md:max-w-full md:mx-0 bg-white rounded-xl shadow-xl overflow-hidden transform transition-all duration-300 hover:shadow-2xl">
        {{-- Header dengan gradient background --}}
        <div class="bg-gradient-to-r from-[#65764a] to-[#52603c] p-6 text-white">
            <div class="flex items-center space-x-3">
                <div class="bg-white/20 p-2 rounded-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-xl font-bold">Tambah Anggota Baru</h3>
                    <p class="text-white/80 text-sm mt-1">Lengkapi informasi anggota di bawah ini</p>
                </div>
            </div>
        </div>

        {{-- Form Content --}}
        <div class="p-6 md:p-8 bg-gradient-to-b from-slate-50 to-white">
            <form action="{{ route('anggota.store') }}" method="POST" class="space-y-5">
                @csrf

                {{-- Grid Layout untuk Desktop --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-6">

                    {{-- Nama Field --}}
                    <div class="group md:col-span-1">
                        <label for="nama" class="flex items-center space-x-2 text-sm font-semibold text-slate-700 mb-2">
                            <svg class="w-4 h-4 text-[#65764a]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            <span>Nama Lengkap</span>
                        </label>
                        <input type="text" id="nama" name="nama" required placeholder="Masukkan nama lengkap"
                            class="block w-full px-4 py-3 md:py-4 rounded-lg border-2 border-slate-200
                                  focus:border-[#65764a] focus:ring-4 focus:ring-[#65764a]/20
                                  transition-all duration-200 ease-in-out
                                  group-hover:border-slate-300
                                  placeholder-slate-400 text-slate-700 text-sm md:text-base">
                    </div>

                    {{-- No HP Field --}}
                    <div class="group md:col-span-1">
                        <label for="no_hp" class="flex items-center space-x-2 text-sm font-semibold text-slate-700 mb-2">
                            <svg class="w-4 h-4 text-[#65764a]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                </path>
                            </svg>
                            <span>Nomor Handphone</span>
                        </label>
                        <input type="text" id="no_hp" name="no_hp" required placeholder="Contoh: 08123456789"
                            class="block w-full px-4 py-3 md:py-4 rounded-lg border-2 border-slate-200
                                  focus:border-[#65764a] focus:ring-4 focus:ring-[#65764a]/20
                                  transition-all duration-200 ease-in-out
                                  group-hover:border-slate-300
                                  placeholder-slate-400 text-slate-700 text-sm md:text-base">
                    </div>

                    {{-- Status Keikutsertaan Field --}}
                    <div class="group md:col-span-1">
                        <label for="status_keikutsertaan"
                            class="flex items-center space-x-2 text-sm font-semibold text-slate-700 mb-2">
                            <svg class="w-4 h-4 text-[#65764a]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>Status Keikutsertaan</span>
                        </label>
                        <div class="relative">
                            <select id="status_keikutsertaan" name="status_keikutsertaan" required
                                class="block w-full px-4 py-3 md:py-4 rounded-lg border-2 border-slate-200
                                       focus:border-[#65764a] focus:ring-4 focus:ring-[#65764a]/20
                                       transition-all duration-200 ease-in-out
                                       group-hover:border-slate-300
                                       text-slate-700 appearance-none cursor-pointer text-sm md:text-base">
                                <option value="">Pilih status keikutsertaan</option>
                                <option value="1">✅ Aktif</option>
                                <option value="0">❌ Tidak Aktif</option>
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

                    {{-- Tanggal Bergabung Field --}}
                    <div class="group md:col-span-1">
                        <label for="tanggal_bergabung"
                            class="flex items-center space-x-2 text-sm font-semibold text-slate-700 mb-2">
                            <svg class="w-4 h-4 text-[#65764a]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                            <span>Tanggal Bergabung</span>
                        </label>
                        <input type="date" id="tanggal_bergabung" name="tanggal_bergabung" required
                            class="block w-full px-4 py-3 md:py-4 rounded-lg border-2 border-slate-200
                                  focus:border-[#65764a] focus:ring-4 focus:ring-[#65764a]/20
                                  transition-all duration-200 ease-in-out
                                  group-hover:border-slate-300
                                  text-slate-700 text-sm md:text-base">
                    </div>
                </div>

                {{-- Submit Button --}}
                <div class="pt-4 md:pt-6">
                    <button type="submit"
                        class="group relative w-full md:w-auto md:min-w-[200px] md:ml-auto md:block
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
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            <span>Simpan Anggota</span>
                        </span>
                        {{-- Hover effect overlay --}}
                        <div
                            class="absolute inset-0 bg-white/10 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left">
                        </div>
                    </button>
                </div>
            </form>
        </div>

        {{-- Footer dengan informasi tambahan --}}
        <div class="px-6 md:px-8 py-4 bg-slate-50 border-t border-slate-100">
            <p class="text-xs md:text-sm text-slate-500 text-center flex items-center justify-center space-x-1">
                <svg class="w-3 h-3 md:w-4 md:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span>Pastikan semua data telah diisi dengan benar</span>
            </p>
        </div>
    </div>
@endsection
