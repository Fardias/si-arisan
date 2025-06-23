@if (session('success'))
    <div id="success-alert"
        class="fixed top-5 right-5 z-50 flex items-center p-4 mb-4 w-full max-w-md text-green-800 bg-green-100 rounded-lg shadow-lg transform translate-x-full opacity-0 transition-all duration-700 ease-out"
        role="alert">
        <div class="flex-shrink-0">
            <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center animate-pulse">
                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
            </div>
        </div>
        <div class="ml-3 text-sm font-medium flex-1">
            <div class="font-semibold text-green-900">Berhasil!</div>
            <div class="text-green-700">{{ session('success') }}</div>
        </div>
        <button type="button" onclick="closeAlert('success-alert')"
            class="ml-auto -mx-1.5 -my-1.5 bg-green-100 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8 transition-colors duration-200"
            aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.697a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>
        <div class="absolute bottom-0 left-0 h-1 bg-green-500 rounded-b-lg animate-progress"></div>
    </div>
@endif
@if (session('error'))
    <div id="error-alert"
        class="fixed top-5 right-5 z-50 flex items-center p-4 mb-4 w-full max-w-md text-red-800 bg-red-100 rounded-lg shadow-lg transform translate-x-full opacity-0 transition-all duration-700 ease-out"
        role="alert">
        <div class="flex-shrink-0">
            <div class="w-8 h-8 bg-red-500 rounded-full flex items-center justify-center animate-pulse">
                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M18 10A8 8 0 11 2 10a8 8 0 0116 0zm-7-4a1 1 0 10-2 0v4a1 1 0 002 0V6zm-1 8a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"
                        clip-rule="evenodd"></path>
                </svg>
            </div>
        </div>
        <div class="ml-3 text-sm font-medium flex-1">
            <div class="font-semibold text-red-900">Gagal!</div>
            <div class="text-red-700">{{ session('error') }}</div>
        </div>
        <button type="button" onclick="closeAlert('error-alert')"
            class="ml-auto -mx-1.5 -my-1.5 bg-red-100 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 transition-colors duration-200"
            aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.697a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>
        <div class="absolute bottom-0 left-0 h-1 bg-red-500 rounded-b-lg animate-progress"></div>
    </div>
@endif

<div id="deleteModal" class="fixed inset-0 z-50 hidden flex items-end justify-end p-4">
    <div id="deleteModalCard"
        class="w-full max-w-md bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl shadow-2xl border border-gray-700/50 transform transition-all duration-300 ease-out opacity-0 scale-95 translate-y-4">
        <div class="p-6 flex space-x-5">
            <div id="deleteModalIcon"
                class="flex-shrink-0 flex items-center justify-center w-14 h-14 rounded-full bg-red-500/10 transition-opacity duration-300 ease-out opacity-0">
                <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z">
                    </path>
                </svg>
            </div>

            <div class="flex-grow">
                <div id="deleteModalContent" class="transition-opacity duration-300 delay-100 ease-out opacity-0">
                    <h3 class="text-xl font-bold text-gray-100">Konfirmasi Hapus</h3>
                    <p class="mt-2 text-sm text-gray-400">
                        Apakah Anda yakin ingin menghapus <strong id="deleteItemName"
                            class="font-bold text-gray-200">data ini</strong>?
                    </p>
                </div>

                <div id="deleteModalButtons"
                    class="mt-6 flex justify-end space-x-4 transition-opacity duration-300 delay-200 ease-out opacity-0">
                    <button id="cancelDeleteBtn"
                        class="px-5 py-2.5 bg-gray-700 text-sm font-semibold text-gray-200 rounded-lg hover:bg-gray-600 focus:outline-none focus:ring-4 focus:ring-gray-500 transition-all duration-200">
                        Batal
                    </button>
                    <button id="confirmDeleteBtn"
                        class="relative px-5 py-2.5 bg-red-600 text-white text-sm font-semibold rounded-lg hover:bg-red-700 focus:outline-none focus:ring-4 focus:ring-red-400 transition-all duration-200 disabled:opacity-50 disabled:cursor-wait">
                        Hapus
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>


<style>
    @keyframes progress {
        from {
            width: 100%;
        }

        to {
            width: 0%;
        }
    }

    .animate-progress {
        animation: progress 4s linear forwards;
    }
</style>

<script>
    // --- Alert Notification Functions ---
    function showAlert(alertId) {
        const alert = document.getElementById(alertId);
        if (alert) {
            setTimeout(() => {
                alert.classList.remove('translate-x-full', 'opacity-0');
                alert.classList.add('translate-x-0', 'opacity-100');
            }, 150);
            setTimeout(() => {
                closeAlert(alertId);
            }, 4000);
        }
    }

    function closeAlert(alertId) {
        const alert = document.getElementById(alertId);
        if (alert) {
            alert.classList.remove('translate-x-0', 'opacity-100');
            alert.classList.add('translate-x-full', 'opacity-0', 'scale-95');
            setTimeout(() => {
                alert.remove();
            }, 700);
        }
    }

    // --- Enhanced Delete Confirmation Modal ---
    let deleteForm = null;
    let countdownInterval = null;

    // Get all necessary elements from the DOM
    const deleteModal = document.getElementById('deleteModal');
    const deleteModalCard = document.getElementById('deleteModalCard');
    const deleteModalIcon = document.getElementById('deleteModalIcon');
    const deleteModalContent = document.getElementById('deleteModalContent');
    const deleteModalButtons = document.getElementById('deleteModalButtons');
    const deleteItemName = document.getElementById('deleteItemName');
    const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');
    const cancelDeleteBtn = document.getElementById('cancelDeleteBtn');

    function showDeleteModal(form, itemName = 'data ini') {
        deleteForm = form;
        deleteItemName.innerHTML = `'<span class="truncate max-w-xs inline-block align-middle">${itemName}</span>'`;
        deleteModal.classList.remove('hidden');

        // Staggered "enter" animation
        setTimeout(() => {
            deleteModalCard.classList.remove('opacity-0', 'scale-95', 'translate-y-4');
            deleteModalIcon.classList.remove('opacity-0');
            deleteModalContent.classList.remove('opacity-0');
            deleteModalButtons.classList.remove('opacity-0');
        }, 10);

        // Safety timer for the delete button
        confirmDeleteBtn.disabled = true;
        let countdown = 2;
        confirmDeleteBtn.innerText = `Hapus (${countdown})`;

        countdownInterval = setInterval(() => {
            countdown--;
            confirmDeleteBtn.innerText = `Hapus (${countdown})`;
            if (countdown <= 0) {
                clearInterval(countdownInterval);
                confirmDeleteBtn.disabled = false;
                confirmDeleteBtn.innerText = 'Ya, Hapus';
            }
        }, 1000);

        // Autofocus on the safe choice
        setTimeout(() => cancelDeleteBtn.focus(), 100);
    }

    function closeDeleteModal() {
        clearInterval(countdownInterval);

        // "Leave" animation
        deleteModalCard.classList.add('opacity-0', 'scale-95', 'translate-y-4');
        setTimeout(() => {
            deleteModal.classList.add('hidden');
            deleteForm = null;
            // Reset elements for the next call
            deleteModalIcon.classList.add('opacity-0');
            deleteModalContent.classList.add('opacity-0');
            deleteModalButtons.classList.add('opacity-0');
            confirmDeleteBtn.disabled = true;
            confirmDeleteBtn.innerText = 'Hapus';
        }, 350);
    }

    // Wire up button actions
    confirmDeleteBtn.addEventListener('click', () => {
        if (deleteForm && !confirmDeleteBtn.disabled) {
            deleteForm.submit();
        }
        closeDeleteModal();
    });

    cancelDeleteBtn.addEventListener('click', closeDeleteModal);

    // Initialize everything on page load
    document.addEventListener('DOMContentLoaded', () => {
        showAlert('success-alert');
        showAlert('error-alert');
        // Click outside to close (optional but good UX)
        deleteModal.addEventListener('click', (e) => {
            if (e.target === deleteModal) {
                closeDeleteModal();
            }
        });
    });
</script>
