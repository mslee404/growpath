<div id="modal-buy" class="fixed inset-0 flex items-center justify-center z-50 opacity-0 invisible transition-opacity duration-300 ease-in-out">
    
    <div class="absolute inset-0 bg-gray-900/50 transition-opacity" onclick="document.getElementById('close-buy').click()"></div>

    <div id="modal-content-buy" class="relative bg-[#9CB65C] rounded-3xl shadow-2xl w-full max-w-lg p-6 transform scale-95 transition-all duration-300 ease-in-out">
        
        <button id="close-buy" class="absolute top-5 right-6 text-white hover:text-gray-200 transition z-10 cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        {{-- Container Title --}}
        <h2 id="modal-buy-title" class="text-3xl font-bold text-white text-center mt-2 mb-6">
            Yakin Mau Beli Item Ini?
        </h2>

        {{-- Container Message (Optional for results) --}}
        <p id="modal-buy-message" class="text-white text-center text-lg mb-6 hidden">
             {{-- Message controlled by JS --}}
        </p>

        <div id="modal-buy-actions" class="flex justify-center gap-6 mb-4">
            <button id="btn-cancel-buy" class="bg-[#FDFDE0] text-[#5C6843] font-bold text-lg px-6 py-3 rounded-xl shadow-md hover:bg-white transition transform hover:-translate-y-1 cursor-pointer">
                Ga jadi deh
            </button>

            <button id="btn-confirm-buy" type="button" class="bg-[#FDFDE0] text-[#5C6843] font-bold text-lg px-10 py-3 rounded-xl shadow-md hover:bg-white transition transform hover:-translate-y-1 cursor-pointer">
                Yakin!
            </button>   
        </div>
        
        {{-- Close button for Result state (hidden by default) --}}
        <div id="modal-result-actions" class="flex justify-center mb-4 hidden">
             <button id="btn-close-result" class="bg-[#FDFDE0] text-[#5C6843] font-bold text-lg px-6 py-3 rounded-xl shadow-md hover:bg-white transition transform hover:-translate-y-1 cursor-pointer">
                Tutup
            </button>
        </div>
    </div>
</div>