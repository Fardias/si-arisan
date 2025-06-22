<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard')</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
    <div>

        <div id="sidebar"
            class="fixed top-0 bottom-0 left-0 lg:top-5 lg:bottom-5 lg:left-8 w-64 bg-white z-50 rounded-r-3xl lg:rounded-3xl shadow-lg
                   transform -translate-x-full lg:translate-x-0
                   transition-transform duration-300 ease-in-out">
            @include('partials.sidebar')
        </div>

        <div id="sidebar-overlay" class="hidden fixed inset-0 bg-black bg-opacity-50 z-40 lg:hidden"></div>

        <main class="lg:ml-72 p-6 transition-all duration-300">

            <button id="hamburger-button" class="lg:hidden p-2 mb-4 bg-white rounded-md shadow-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>

            <div class="min-h-screen bg-white p-6 rounded-2xl shadow-sm">
                @yield('content')
            </div>

        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const sidebar = document.getElementById('sidebar');
            const hamburgerButton = document.getElementById('hamburger-button');
            const sidebarCloseButton = document.getElementById('sidebar-close-button');
            const sidebarOverlay = document.getElementById('sidebar-overlay');

            const openSidebar = () => {
                sidebar.classList.remove('-translate-x-full');
                sidebar.classList.add('translate-x-0');
                sidebarOverlay.classList.remove('hidden');
            };

            const closeSidebar = () => {
                sidebar.classList.add('-translate-x-full');
                sidebar.classList.remove('translate-x-0');
                sidebarOverlay.classList.add('hidden');
            };

            hamburgerButton.addEventListener('click', openSidebar);
            sidebarCloseButton.addEventListener('click', closeSidebar);
            sidebarOverlay.addEventListener('click', closeSidebar);
        });
    </script>
</body>

</html>
