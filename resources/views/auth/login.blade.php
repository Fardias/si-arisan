<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArisanKu - Login</title>
    @vite('resources/css/app.css')
</head>
<body class="min-h-screen bg-gray-100 flex items-center justify-center p-4">

    <div class="w-full max-w-md">
        <div class="bg-white p-5 md:p-10 rounded-3xl shadow-lg">

            <div class="text-center mb-8 -mt-10">
                <img src="{{ asset('images/logo-arisan2.png') }}" alt="ArisanKu Logo" class="w-40 mx-auto ">

                <div class="-mt-5">
                    <h1 class="text-2xl font-bold text-gray-800">Login Admin</h1>
                    <p class="text-gray-500 text-sm">Selamat datang kembali!</p>
                </div>
            </div>

            <!-- Error Alert -->
            @if(session('error'))
                <div class="bg-red-50 border-l-4 border-red-400 p-4 mb-6 rounded-r-lg">
                    <div class="flex">
                        <svg class="w-5 h-5 text-red-400 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                        <p class="text-red-700 text-sm">{{ session('error') }}</p>
                    </div>
                </div>
            @endif

            <!-- Login Form -->
            <form action="{{ route('login') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Username Field -->
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700 mb-2">Username</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2.5a5.5 5.5 0 0 1 5.5 5.5c0 1.591-.676 3.016-1.756 3.999a8.5 8.5 0 0 1 4.223 7.376A1 1 0 0 1 19 20.5H5a1 1 0 0 1-1-1.125a8.5 8.5 0 0 1 4.223-7.376A5.492 5.492 0 0 1 6.5 8a5.5 5.5 0 0 1 5.5-5.5Zm0 2a3.5 3.5 0 1 0 0 7a3.5 3.5 0 0 0 0-7Z"></path>
                            </svg>
                        </div>
                        <input
                            type="text"
                            id="username"
                            name="username"
                            required
                            class="w-full pl-11 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500/50 focus:border-green-500 transition-colors duration-300 bg-gray-50 focus:bg-white"
                            placeholder="Masukkan username"
                        >
                    </div>
                </div>

                <!-- Password Field -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M18 8h-1V6A5 5 0 0 0 7 6v2H6a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V10a2 2 0 0 0-2-2ZM9 6a3 3 0 0 1 6 0v2H9V6Z"></path>
                            </svg>
                        </div>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            required
                            class="w-full pl-11 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500/50 focus:border-green-500 transition-colors duration-300 bg-gray-50 focus:bg-white"
                            placeholder="Masukkan password"
                        >
                    </div>
                </div>


                <!-- Submit Button -->
                <button
                    type="submit"
                    class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded-xl
                           transition-all duration-300 transform hover:scale-105 focus:outline-none
                           focus:ring-4 focus:ring-green-500/50"
                >
                    Masuk
                </button>
            </form>

        </div>

        <!-- Footer -->
        <div class="text-center mt-6">
            <p class="text-gray-500 text-sm">© {{ date('Y') }} ArisanKu. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
