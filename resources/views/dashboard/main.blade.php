@extends('layouts.app')

@section('title', 'Dashboard')
@section('header', 'Dashboard')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-slate-50 to-slate-100 p-6">
        {{-- Header Dashboard --}}
        <div class="mb-8">
            <div class="flex items-center space-x-4 mb-2">
                <div class="bg-gradient-to-r from-[#65764a] to-[#52603c] p-3 rounded-xl shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                        </path>
                    </svg>
                </div>
                <div>
                    <h1 class="text-3xl font-bold text-slate-800">Dashboard Arisan</h1>
                    <p class="text-slate-600">Selamat datang di sistem manajemen arisan</p>
                </div>
            </div>
            <div class="text-sm text-slate-500 flex items-center space-x-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <span>{{ date('d F Y') }}</span>
            </div>
        </div>

        {{-- Statistics Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

            {{-- Total Anggota Card --}}
            <div
                class="group relative overflow-hidden bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                <div class="absolute inset-0 bg-gradient-to-br from-[#65764a]/5 to-[#52603c]/10"></div>
                <div class="relative p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div
                            class="bg-gradient-to-r from-[#65764a] to-[#52603c] p-3 rounded-xl shadow-lg group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                        </div>
                        <div class="text-right">
                            <div class="text-xs font-medium text-slate-500 uppercase tracking-wider">Total</div>
                            <div class="text-xs text-[#65764a] font-semibold">Anggota</div>
                        </div>
                    </div>
                    <div class="space-y-1">
                        <div
                            class="text-3xl font-bold text-[#65764a] group-hover:text-[#52603c] transition-colors duration-300">
                            {{ $total_anggota }}
                        </div>
                        <p class="text-sm text-slate-600">Anggota terdaftar</p>
                    </div>
                    {{-- Decorative element --}}
                    <div
                        class="absolute -bottom-2 -right-2 w-20 h-20 bg-gradient-to-br from-[#65764a]/10 to-transparent rounded-full">
                    </div>
                </div>
            </div>

            {{-- Total Uang Card --}}
            <div
                class="group relative overflow-hidden bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                <div class="absolute inset-0 bg-gradient-to-br from-emerald-500/5 to-emerald-600/10"></div>
                <div class="relative p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div
                            class="bg-gradient-to-r from-emerald-500 to-emerald-600 p-3 rounded-xl shadow-lg group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1">
                                </path>
                            </svg>
                        </div>
                        <div class="text-right">
                            <div class="text-xs font-medium text-slate-500 uppercase tracking-wider">Total</div>
                            <div class="text-xs text-emerald-600 font-semibold">Terkumpul</div>
                        </div>
                    </div>
                    <div class="space-y-1">
                        <div
                            class="text-3xl font-bold text-emerald-600 group-hover:text-emerald-700 transition-colors duration-300">
                            Rp {{ number_format($total_uang, 0, ',', '.') }}
                        </div>
                        <p class="text-sm text-slate-600">Dana terkumpul</p>
                    </div>
                    {{-- Decorative element --}}
                    <div
                        class="absolute -bottom-2 -right-2 w-20 h-20 bg-gradient-to-br from-emerald-500/10 to-transparent rounded-full">
                    </div>
                </div>
            </div>

            {{-- Transaksi Bulan Ini Card --}}
            <div
                class="group relative overflow-hidden bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                <div class="absolute inset-0 bg-gradient-to-br from-blue-500/5 to-blue-600/10"></div>
                <div class="relative p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div
                            class="bg-gradient-to-r from-blue-500 to-blue-600 p-3 rounded-xl shadow-lg group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2-2V7a2 2 0 012-2h2a2 2 0 012 2v2h10V7a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 00-2 2h-2v6a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                </path>
                            </svg>
                        </div>
                        <div class="text-right">
                            <div class="text-xs font-medium text-slate-500 uppercase tracking-wider">Bulan Ini</div>
                            <div class="text-xs text-blue-600 font-semibold">Transaksi</div>
                        </div>
                    </div>
                    <div class="space-y-1">
                        <div
                            class="text-3xl font-bold text-blue-600 group-hover:text-blue-700 transition-colors duration-300">
                            {{ $transaksi_bulan_ini ?? 0 }}
                        </div>
                        <p class="text-sm text-slate-600">Transaksi aktif</p>
                    </div>
                    {{-- Decorative element --}}
                    <div
                        class="absolute -bottom-2 -right-2 w-20 h-20 bg-gradient-to-br from-blue-500/10 to-transparent rounded-full">
                    </div>
                </div>
            </div>

            {{-- Status Lunas Card --}}
            <div
                class="group relative overflow-hidden bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                <div class="absolute inset-0 bg-gradient-to-br from-amber-500/5 to-amber-600/10"></div>
                <div class="relative p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div
                            class="bg-gradient-to-r from-amber-500 to-amber-600 p-3 rounded-xl shadow-lg group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="text-right">
                            <div class="text-xs font-medium text-slate-500 uppercase tracking-wider">Status</div>
                            <div class="text-xs text-amber-600 font-semibold">Pembayaran</div>
                        </div>
                    </div>
                    <div class="space-y-1">
                        <div
                            class="text-3xl font-bold text-amber-600 group-hover:text-amber-700 transition-colors duration-300">
                            {{ $pembayaran_lunas ?? 0 }}%
                        </div>
                        <p class="text-sm text-slate-600">Sudah lunas</p>
                    </div>
                    {{-- Decorative element --}}
                    <div
                        class="absolute -bottom-2 -right-2 w-20 h-20 bg-gradient-to-br from-amber-500/10 to-transparent rounded-full">
                    </div>
                </div>
            </div>
        </div>

        {{-- Quick Actions --}}
        <div class="bg-white rounded-2xl shadow-lg p-6 mb-8">
            <div class="flex items-center space-x-3 mb-6">
                <div class="bg-gradient-to-r from-[#65764a] to-[#52603c] p-2 rounded-lg">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <h2 class="text-xl font-bold text-slate-800">Aksi Cepat</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <a href="{{ route('anggota.create') }}"
                    class="group flex items-center space-x-4 p-4 rounded-xl border-2 border-slate-200 hover:border-[#65764a] hover:bg-[#65764a]/5 transition-all duration-200">
                    <div class="bg-[#65764a] p-3 rounded-lg group-hover:scale-110 transition-transform duration-200">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-slate-800 group-hover:text-[#65764a]">Tambah Anggota</h3>
                        <p class="text-sm text-slate-600">Daftarkan anggota baru</p>
                    </div>
                </a>

                <a href="{{ route('transaksi-arisan.create') }}"
                    class="group flex items-center space-x-4 p-4 rounded-xl border-2 border-slate-200 hover:border-emerald-500 hover:bg-emerald-50 transition-all duration-200">
                    <div class="bg-emerald-500 p-3 rounded-lg group-hover:scale-110 transition-transform duration-200">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-slate-800 group-hover:text-emerald-600">Buat Transaksi</h3>
                        <p class="text-sm text-slate-600">Catat transaksi arisan</p>
                    </div>
                </a>

                <a href="{{ route('anggota.index') }}"
                    class="group flex items-center space-x-4 p-4 rounded-xl border-2 border-slate-200 hover:border-blue-500 hover:bg-blue-50 transition-all duration-200">
                    <div class="bg-blue-500 p-3 rounded-lg group-hover:scale-110 transition-transform duration-200">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-slate-800 group-hover:text-blue-600">Lihat Data</h3>
                        <p class="text-sm text-slate-600">Kelola data anggota</p>
                    </div>
                </a>
            </div>
        </div>

        {{-- Recent Activity --}}
        <div class="bg-white rounded-2xl shadow-lg p-6">
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center space-x-3">
                    <div class="bg-gradient-to-r from-purple-500 to-purple-600 p-2 rounded-lg">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h2 class="text-xl font-bold text-slate-800">Aktivitas Terbaru</h2>
                </div>
                <a href="#" class="text-sm text-[#65764a] hover:text-[#52603c] font-medium">Lihat Semua</a>
            </div>

            <div class="space-y-4">
                <div class="flex items-center space-x-4 p-3 rounded-lg hover:bg-slate-50 transition-colors duration-200">
                    <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                    <div class="flex-1">
                        <p class="text-sm font-medium text-slate-800">Transaksi baru ditambahkan</p>
                        <p class="text-xs text-slate-500">2 menit yang lalu</p>
                    </div>
                </div>
                <div class="flex items-center space-x-4 p-3 rounded-lg hover:bg-slate-50 transition-colors duration-200">
                    <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                    <div class="flex-1">
                        <p class="text-sm font-medium text-slate-800">Anggota baru bergabung</p>
                        <p class="text-xs text-slate-500">1 jam yang lalu</p>
                    </div>
                </div>
                <div class="flex items-center space-x-4 p-3 rounded-lg hover:bg-slate-50 transition-colors duration-200">
                    <div class="w-2 h-2 bg-amber-500 rounded-full"></div>
                    <div class="flex-1">
                        <p class="text-sm font-medium text-slate-800">Pembayaran berhasil dikonfirmasi</p>
                        <p class="text-xs text-slate-500">3 jam yang lalu</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
