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
            <div class="mt-6">
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
