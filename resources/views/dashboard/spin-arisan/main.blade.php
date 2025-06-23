@extends('layouts.app')

@section('title', 'Mesin Pemenang Arisan')

@push('styles')

    <style>
        .confetti {
            position: fixed;
            width: 10px;
            height: 10px;
            background-color: #f00;
            opacity: 0.8;
            animation: fall 5s linear forwards;
            z-index: 9999;
        }

        @keyframes fall {
            to {
                transform: translateY(110vh) rotate(720deg);
                opacity: 0;
            }
        }

        .spin-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            position: relative;
            overflow: hidden;
        }

        .spin-card::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: linear-gradient(45deg, #10b981, #34d399, #facc15, #f59e0b);
            border-radius: inherit;
            z-index: -1;
            animation: borderGlow 3s ease-in-out infinite alternate;
        }

        @keyframes borderGlow {
            0% {
                opacity: 0.5;
            }

            100% {
                opacity: 1;
            }
        }

        .spinning {
            animation: spinPulse 0.1s ease-in-out infinite;
        }

        @keyframes spinPulse {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.02);
            }
        }

        .winner-glow {
            animation: winnerGlow 2s ease-in-out infinite alternate;
        }

        @keyframes winnerGlow {
            0% {
                box-shadow: 0 0 20px rgba(16, 185, 129, 0.5);
                transform: scale(1);
            }

            100% {
                box-shadow: 0 0 40px rgba(16, 185, 129, 0.8);
                transform: scale(1.05);
            }
        }

        .particle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: #10b981;
            border-radius: 50%;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-20px) rotate(180deg);
            }
        }

        .btn-spin {
            background: linear-gradient(135deg, #10b981 0%, #059669 50%, #047857 100%);
            position: relative;
            overflow: hidden;
        }

        .btn-spin::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .btn-spin:hover::before {
            left: 100%;
        }

        .stats-card {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            border: 1px solid #e2e8f0;
        }
    </style>
@endpush

@section('content')


    <div class="mb-8">
        <div class="flex items-center space-x-4 mb-2">
            <div class="bg-gradient-to-r from-[#65764a] to-[#52603c] p-3 rounded-xl shadow-lg">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <rect x="3" y="7" width="18" height="10" rx="2" stroke-width="2" stroke="currentColor"
                        fill="none" />
                    <path d="M7 11h6M7 15h10" stroke-width="2" stroke-linecap="round" stroke="currentColor" />
                    <circle cx="17" cy="11" r="1" fill="currentColor" />
                </svg>
            </div>
            <div>
                <h1 class="text-3xl font-bold text-slate-800">Khocokin</h1>
                <p class="text-slate-600">Pengundian Pemenang Arisan</p>
            </div>
        </div>
    </div>
    <div class="min-h-screen bg-gradient-to-br  py-8">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="grid lg:grid-cols-3 gap-8">
                    <div class="lg:col-span-1">
                        <div class="stats-card rounded-2xl p-6 shadow-lg">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-emerald-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                    </path>
                                </svg>
                                Daftar Peserta
                            </h3>
                            <textarea id="participants" rows="8"
                                class="block w-full rounded-lg p-3 border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500 sm:text-sm bg-white text-gray-700 cursor-not-allowed resize-none"
                                readonly>@php
                                    echo collect($anggota)->pluck('nama')->implode("\n");
                                @endphp</textarea>

                            <div class="mt-4 p-3 bg-emerald-50 rounded-lg border border-emerald-200">
                                <div class="flex items-center justify-between text-sm">
                                    <span class="text-emerald-700 font-medium">Total Peserta:</span>

                                    <span
                                        class="bg-emerald-600 text-white px-3 py-1 rounded-full font-bold">{{ count($anggota) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="lg:col-span-2">
                        <div class="bg-white rounded-3xl shadow-2xl p-8 relative">
                            <div class="particle" style="top: 10%; left: 10%; animation-delay: 0s;"></div>
                            <div class="particle" style="top: 20%; right: 15%; animation-delay: 1s;"></div>
                            <div class="particle" style="bottom: 15%; left: 20%; animation-delay: 2s;"></div>
                            <div class="particle" style="bottom: 25%; right: 10%; animation-delay: 0.5s;"></div>
                            <div class="text-center mb-8">
                                <div id="spinnerDisplay"
                                    class="spin-card mx-auto w-80 h-80 rounded-full flex items-center justify-center text-white text-4xl font-bold tracking-wider transition-all duration-500 shadow-2xl relative">
                                    <div class="text-center">
                                        <div class="text-6xl mb-2">🎯</div>
                                        <div id="spinnerText" class="text-2xl">Siap Dimulai!</div>
                                    </div>
                                </div>
                            </div>
                            <div class="space-y-4">
                                <button id="spinButton"
                                    class="btn-spin w-full flex justify-center items-center py-4 px-8 text-xl font-bold rounded-2xl text-white shadow-xl hover:shadow-2xl focus:outline-none focus:ring-4 focus:ring-emerald-300 transition-all duration-300 ease-in-out disabled:opacity-50 disabled:cursor-not-allowed transform hover:scale-105 active:scale-95">
                                    <svg id="spinIcon" class="w-6 h-6 mr-3" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                                        </path>
                                    </svg>
                                    <span id="spinButtonText">Mulai Pengundian!</span>
                                </button>
                            </div>
                            <div id="winnerResult" class="hidden mt-8">
                                <div
                                    class="bg-gradient-to-r from-emerald-50 to-teal-50 rounded-2xl p-6 border-2 border-emerald-200 shadow-lg">
                                    <div class="text-center">
                                        <div class="text-6xl mb-4">🎉</div>
                                        <h3 class="text-2xl font-bold text-emerald-800 mb-2">Selamat!</h3>
                                        <p class="text-lg text-emerald-700 mb-4">Pemenang periode ini adalah:</p>
                                        <div class="bg-white rounded-xl p-4 shadow-inner">
                                            <p id="lastWinner" class="text-3xl font-bold text-emerald-600"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-12 grid md:grid-cols-3 gap-6">
                    <div class="stats-card rounded-xl p-6 text-center shadow-lg">
                        <div class="text-3xl font-bold text-emerald-600">{{ count($anggota) }}</div>
                        <div class="text-gray-600 font-medium">Total Peserta</div>
                    </div>
                    <div class="stats-card rounded-xl p-6 text-center shadow-lg">
                        <div class="text-3xl font-bold text-blue-600" id="totalSpins">0</div>
                        <div class="text-gray-600 font-medium">Total Putaran</div>
                    </div>
                    <div class="stats-card rounded-xl p-6 text-center shadow-lg">
                        <div class="text-3xl font-bold text-purple-600" id="lastSpinTime">-</div>
                        <div class="text-gray-600 font-medium">Putaran Terakhir</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <audio id="spinningSound" preload="auto" loop>
        <source src="https://www.soundjay.com/buttons/sounds/button-10.mp3" type="audio/mpeg">
    </audio>
    <audio id="winnerSound" preload="auto">
        <source src="https://www.soundjay.com/human/sounds/applause-01.mp3" type="audio/mpeg">
    </audio>

@endsection

@push('scripts')

    <script>
        const spinnerDisplay = document.getElementById('spinnerDisplay');
        const spinnerText = document.getElementById('spinnerText');
        const spinButton = document.getElementById('spinButton');
        const spinButtonText = document.getElementById('spinButtonText');
        const spinIcon = document.getElementById('spinIcon');
        const winnerResult = document.getElementById('winnerResult');
        const lastWinner = document.getElementById('lastWinner');
        const resetButton = document.getElementById('resetButton');
        const historyButton = document.getElementById('historyButton');
        const totalSpinsElement = document.getElementById('totalSpins');
        const lastSpinTimeElement = document.getElementById('lastSpinTime');
        const spinningSound = document.getElementById('spinningSound');
        const winnerSound = document.getElementById('winnerSound');

        const allParticipants = @json($anggota);

        let totalSpins = 0;
        let isSpinning = false;
        spinButton.addEventListener('click', startSpin);
        resetButton.addEventListener('click', resetSpin);
        historyButton.addEventListener('click', showHistory);

        function startSpin() {
            if (isSpinning) return;

            if (allParticipants.length < 2) {
                showNotification('Harap pastikan ada minimal 2 peserta.', 'error');
                return;
            }


            isSpinning = true;
            spinButton.disabled = true;
            spinButtonText.innerText = 'Sedang Berputar...';
            spinIcon.classList.add('animate-spin');

            winnerResult.classList.add('hidden');
            spinnerDisplay.classList.add('spinning');
            spinnerDisplay.classList.remove('winner-glow');

            spinningSound.currentTime = 0;
            spinningSound.play().catch(e => console.log('Audio play failed:', e));

            const spinDuration = 4000;
            const spinIntervalTime = 100;
            let currentIndex = 0;

            const spinInterval = setInterval(() => {
                currentIndex = (currentIndex + 1) % allParticipants.length;
                spinnerText.innerText = allParticipants[currentIndex].nama;
            }, spinIntervalTime);

            setTimeout(() => {
                clearInterval(spinInterval);
                const winnerObject = allParticipants[Math.floor(Math.random() * allParticipants.length)];
                finalizeSpin(winnerObject);
            }, spinDuration);
        }

        function finalizeSpin(winner) {
            spinningSound.pause();
            spinnerText.innerText = winner.nama;
            spinnerDisplay.classList.remove('spinning');
            spinnerDisplay.classList.add('winner-glow');

            isSpinning = false;
            spinButton.disabled = false;
            spinButtonText.innerText = 'Putar Lagi!';
            spinIcon.classList.remove('animate-spin');

            announceWinner(winner);
            updateWinnerStatusInDatabase(winner.id);

            totalSpins++;
            totalSpinsElement.innerText = totalSpins;
            lastSpinTimeElement.innerText = new Date().toLocaleTimeString('id-ID');
        }

        function announceWinner(winner) {
            lastWinner.innerText = winner.nama;
            winnerResult.classList.remove('hidden');

            winnerSound.currentTime = 0;
            winnerSound.play().catch(e => console.log('Audio play failed:', e));
            createConfetti();
            showNotification(`🎉 Selamat kepada ${winner.nama}!`, 'success');
        }

        async function updateWinnerStatusInDatabase(winnerId) {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            try {
                const response = await fetch("{{ route('spin-arisan.result') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify({
                        anggota_id: winnerId
                    })
                });

                const result = await response.json();

                if (!response.ok) {
                    throw new Error(result.message || 'Gagal terhubung ke server.');
                }

                console.log('Server Response:', result.message);
                showNotification('Status pemenang berhasil disimpan.', 'info');

            } catch (error) {
                console.error('Error saat update status pemenang:', error);
                showNotification('Gagal menyimpan status pemenang ke database.', 'error');
            }
        }

        function resetSpin() {
            if (isSpinning) return;
            spinnerText.innerText = 'Siap Dimulai!';
            spinnerDisplay.classList.remove('winner-glow', 'spinning');
            winnerResult.classList.add('hidden');
            spinButtonText.innerText = 'Mulai Pengundian!';
            showNotification('Game telah direset!', 'info');
        }

        function showHistory() {
            showNotification('Fitur riwayat akan segera hadir!', 'info');
        }

        function createConfetti() {
            const confettiCount = 200;
            const colors = ['#10b981', '#34d399', '#facc15', '#ffffff', '#a7f3d0', '#f59e0b', '#ec4899'];
            for (let i = 0; i < confettiCount; i++) {
                const confetti = document.createElement('div');
                confetti.classList.add('confetti');
                confetti.style.left = `${Math.random() * 100}vw`;
                confetti.style.top = `${Math.random() * -10}vh`;
                confetti.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
                confetti.style.animationDelay = `${Math.random() * 2}s`;
                confetti.style.animationDuration = `${3 + Math.random() * 2}s`;
                if (i % 3 === 0) confetti.style.borderRadius = '50%';
                else if (i % 3 === 1) {
                    confetti.style.width = '15px';
                    confetti.style.height = '5px';
                }
                document.body.appendChild(confetti);
                setTimeout(() => confetti.remove(), 6000);
            }
        }

        function showNotification(message, type = 'info') {
            const notification = document.createElement('div');
            const bgColor = type === 'success' ? 'bg-green-500' :
                type === 'error' ? 'bg-red-500' : 'bg-blue-500';
            notification.className =
                `fixed top-4 right-4 ${bgColor} text-white px-6 py-3 rounded-lg shadow-lg z-50 transform transition-all duration-300 translate-x-full`;
            notification.innerText = message;
            document.body.appendChild(notification);
            setTimeout(() => notification.classList.remove('translate-x-full'), 100);
            setTimeout(() => {
                notification.classList.add('translate-x-full');
                setTimeout(() => notification.remove(), 300);
            }, 3000);
        }

        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(() => {
                document.querySelector('.spin-card').style.transform = 'scale(1)';
            }, 500);
        });
    </script>
@endpush
