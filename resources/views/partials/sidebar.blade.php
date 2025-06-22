<aside class="h-full p-4 flex flex-col">
    <div class="flex justify-between items-center mb-4 flex-shrink-0">
        <img src="{{ asset('images/logo-arisan2.png') }}" alt="logo arisan" class="w-28 -mt-2">
        <button id="sidebar-close-button" class="lg:hidden">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <!-- Navigasi -->
    <nav class="flex-grow space-y-2">
        <a href="{{ route('dashboard') }}"
            class="block py-2 px-4 rounded-md font-medium transition-colors duration-200 ease-in-out text-[#65764a]
                    {{ request()->routeIs('dashboard') ? 'bg-[#fffaea] font-bold' : 'hover:bg-[#fffaea]' }}">
            Dashboard
        </a>
        <a href="{{ route('anggota.index') }}"
            class="block py-2 px-4 rounded-md font-medium transition-colors duration-200 ease-in-out text-[#65764a]
                    {{ request()->routeIs('anggota.index') ? 'bg-[#fffaea] font-bold' : 'hover:bg-[#fffaea]' }}">
            Anggota
        </a>
        <a href="{{ route('transaksi-arisan.index') }}"
            class="block py-2 px-4 rounded-md font-medium transition-colors duration-200 ease-in-out text-[#65764a]
                    {{ request()->routeIs('transaksi-arisan.index') ? 'bg-[#fffaea] font-bold' : 'hover:bg-[#fffaea]' }}">
            Transaksi
        </a>
    </nav>

    <!-- Tombol Logout -->
    <div class="flex-shrink-0 mt-auto mb-5">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="w-full text-left block py-2 px-4 rounded-md font-medium transition-colors duration-200 ease-in-out text-white bg-red-500 hover:bg-red-600">
                Logout
            </button>
        </form>
    </div>
</aside>
