<aside class="h-full p-4 flex flex-col bg-[#f8f9f4] shadow-md rounded-r-xl">

    
    <div class="flex flex-col items-center mb-6">
        <img src="{{ asset('images/logo-arisan2.png') }}" alt="logo arisan" class="size-32 mx-auto mb-2">
        <button id="sidebar-close-button" class="lg:hidden text-slate-600 hover:text-red-500 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>


    <nav class="flex-grow space-y-1 -mt-4">
        <a href="{{ route('dashboard') }}"
            class="flex items-center gap-2 py-2.5 px-4 rounded-lg font-medium transition-all duration-200
                {{ request()->routeIs('dashboard') ? 'bg-[#65764a] text-white shadow' : 'text-[#65764a] hover:bg-[#e9eddc]' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 12l2-2m0 0l7-7 7 7m-2 2v6a2 2 0 01-2 2h-3m-4 0H7a2 2 0 01-2-2v-6z" />
            </svg>
            Dashboard
        </a>
        <a href="{{ route('anggota.index') }}"
            class="flex items-center gap-2 py-2.5 px-4 rounded-lg font-medium transition-all duration-200
                {{ request()->routeIs('anggota.index') ? 'bg-[#65764a] text-white shadow' : 'text-[#65764a] hover:bg-[#e9eddc]' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M9 12a4 4 0 100-8 4 4 0 000 8zM4 20h5v-2a3 3 0 00-5.356-1.857" />
            </svg>
            Anggota
        </a>
        <a href="{{ route('transaksi-arisan.index') }}"
            class="flex items-center gap-2 py-2.5 px-4 rounded-lg font-medium transition-all duration-200
                {{ request()->routeIs('transaksi-arisan.index') ? 'bg-[#65764a] text-white shadow' : 'text-[#65764a] hover:bg-[#e9eddc]' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2-1.343-2-3-2zm0 4v4m-6 4h12a2 2 0 002-2v-2a6 6 0 00-12 0v2a2 2 0 002 2z" />
            </svg>
            Transaksi
        </a>
        <a href="{{ route('spin-arisan') }}"
            class="flex items-center gap-2 py-2.5 px-4 rounded-lg font-medium transition-all duration-200
                {{ request()->routeIs('spin-arisan') ? 'bg-[#65764a] text-white shadow' : 'text-[#65764a] hover:bg-[#e9eddc]' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 4h16v16H4z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 12h8M12 8v8" />
            </svg>
        Kocok
        </a>

    </nav>


    <div class="border-t border-[#cbd5b0] my-4"></div>


    <div class="mt-auto">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="w-full flex items-center gap-2 py-2.5 px-4 rounded-lg text-white font-medium bg-red-500 hover:bg-red-600 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 11-4 0v-1m4-8v-1a2 2 0 10-4 0v1" />
                </svg>
                Keluar
            </button>
        </form>
    </div>
</aside>
