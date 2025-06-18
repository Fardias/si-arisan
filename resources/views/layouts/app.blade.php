<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex">
        @include('partials.sidebar')

        <main class="flex-1 p-6">
            <header class="mb-6">
                <h1 class="text-2xl font-bold text-gray-800">@yield('header')</h1>
            </header>

            @yield('content')
        </main>
    </div>
</body>
</html>
