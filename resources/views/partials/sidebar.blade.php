<aside class="w-64 bg-white shadow-md p-4">
    <img src="{{ asset('images/logo-arisan2.png') }}" alt="logo arisan" class=" size-40 -mt-5">
    <nav class="space-y-2">
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
</aside>
