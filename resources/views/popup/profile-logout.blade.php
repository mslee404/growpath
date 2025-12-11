{{-- resources/views/popup/logout.blade.php --}}

<div id="modal-logout" class="fixed inset-0 flex items-center justify-center z-50 opacity-0 invisible transition-opacity duration-300 ease-in-out">
    
    <div class="absolute inset-0 transition-opacity"></div>

    <div id="modal-content-logout" class="relative bg-[#9CB65C] rounded-3xl shadow-2xl w-full max-w-lg p-6 transform scale-95 transition-all duration-300 ease-in-out">
        
        <button id="close-logout" class="absolute top-5 right-6 text-white hover:text-gray-200 transition z-10">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <h2 class="text-3xl font-bold text-white text-center mt-2 mb-6">
            Yakin Mau Logout?
        </h2>

        <div class="bg-[#FDFDE0] rounded-xl p-10 mb-8 flex items-center justify-center shadow-inner">
            <p class="text-[#5C6843] text-2xl font-bold text-center">
                Yah, jangan pergi dong.
            </p>
        </div>

        <div class="flex justify-center gap-6 mb-4">
            <button id="btn-batal-logout" class="bg-[#FDFDE0] text-[#5C6843] font-bold text-lg px-6 py-3 rounded-xl shadow-md hover:bg-white transition transform hover:-translate-y-1">
                Yaudah Engga
            </button>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="bg-[#FDFDE0] text-[#5C6843] font-bold text-lg px-10 py-3 rounded-xl shadow-md hover:bg-white transition transform hover:-translate-y-1">
                    Adios
                </button>
            </form>
        </div>
    </div>
</div>