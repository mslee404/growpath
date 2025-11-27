{{-- resources/views/popup/use.blade.php --}}

<div id="modal-use" class="fixed inset-0 flex items-center justify-center z-50 opacity-0 invisible transition-opacity duration-300 ease-in-out">

    <div class="absolute inset-0 transition-opacity bg-gray-900/50" onclick="document.getElementById('close-use').click()"></div>
    <div class="absolute inset-0 transition-opacity"></div>

    <div id="modal-content-use" class="relative bg-[#9CB65C] rounded-3xl shadow-2xl w-full max-w-lg py-8 px-6 transform scale-95 transition-all duration-300 ease-in-out flex flex-col items-center"> 
        <button id="close-use" class="absolute top-5 right-6 text-white hover:text-gray-200 transition z-10">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        
        <h2 class="text-3xl font-bold text-white text-center my-2">
            Item sudah terpasang!
        </h2>
    </div>
</div>