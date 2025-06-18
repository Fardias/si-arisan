<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArisanKu - Login</title>
    @vite('resources/css/app.css')
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/heroicons/2.0.18/outline/index.min.js"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-900 via-blue-800 to-blue-600 flex items-center justify-center p-4">
    
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-1/4 left-1/4 w-20 h-20 bg-white/10 rounded-full animate-pulse"></div>
        <div class="absolute top-3/4 right-1/4 w-16 h-16 bg-white/5 rounded-full animate-bounce delay-1000"></div>
        <div class="absolute bottom-1/4 left-3/4 w-12 h-12 bg-white/10 rounded-full animate-pulse delay-500"></div>
    </div>

    <div class="w-full max-w-4xl">
        <div class="bg-white/95 backdrop-blur-lg rounded-3xl shadow-2xl border border-white/20 overflow-hidden">
            <!-- Top Gradient Bar -->
            <div class="h-1 bg-gradient-to-r from-blue-600 via-blue-500 to-blue-600"></div>
            
            <div class="grid md:grid-cols-2 gap-0">
                <!-- Brand Section -->
                <div class="bg-gradient-to-br from-blue-800 to-blue-600 p-8 md:p-12 text-white relative overflow-hidden">
                    <!-- Background Pattern -->
                    <div class="absolute inset-0 opacity-10">
                        <div class="absolute top-0 right-0 w-full h-full bg-white transform rotate-45 translate-x-1/2 -translate-y-1/2"></div>
                    </div>
                    
                    <div class="relative z-10 text-center">
                        <!-- Icon -->
                        <div class="inline-flex items-center justify-center w-20 h-20 bg-white/20 rounded-full mb-6">
                            <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                            </svg>
                        </div>
                        
                        <!-- Brand Name -->
                        <h1 class="text-3xl font-bold mb-2">ArisanKu</h1>
                        <p class="text-blue-100 text-sm opacity-90">Sistem Informasi Arisan Modern</p>
                        
                        <!-- Features -->
                        <div class="mt-8 space-y-3">
                            <div class="flex justify-center items-center space-x-3">
                                <svg class="w-5 h-5 text-blue-200" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-sm">Kelola arisan dengan mudah</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Section -->
                <div class="p-8 md:p-12">
                    <div class="max-w-sm mx-auto">
                        <h2 class="text-2xl font-bold text-gray-800 text-center mb-8">Login Sebagai Admin</h2>
                        
                        <!-- Error Alert -->
                        @if(session('error'))
                            <div class="bg-red-50 border-l-4 border-red-400 p-4 mb-6 rounded-r-lg">
                                <div class="flex">
                                    <svg class="w-5 h-5 text-red-400 mr-3 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
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
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    <input 
                                        type="text" 
                                        id="username" 
                                        name="username" 
                                        required
                                        class="w-full pl-10 pr-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-300 bg-gray-50/50 focus:bg-white"
                                        placeholder="Masukkan username"
                                    >
                                </div>
                            </div>

                            <!-- Password Field -->
                            <div>
                                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    <input 
                                        type="password" 
                                        id="password" 
                                        name="password" 
                                        required
                                        class="w-full pl-10 pr-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-300 bg-gray-50/50 focus:bg-white"
                                        placeholder="Masukkan password"
                                    >
                                </div>
                            </div>


                            <!-- Submit Button -->
                            <button 
                                type="submit" 
                                class="w-full bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-semibold py-3 px-6 rounded-xl transition-all duration-300 transform hover:-translate-y-1 hover:shadow-xl focus:ring-4 focus:ring-blue-500/50 active:transform-none cursor-pointer"
                            >
                                <span class="flex items-center justify-center">
                                    Masuk
                                </span>
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="text-center mt-8">
            <p class="text-white/70 text-sm">© 2025 ArisanKu. All rights reserved.</p>
        </div>
    </div>
</body>
</html>