{{-- resources/views/popup/tambah-habit.blade.php --}}

<div id="modal-habit" class="fixed inset-0 flex items-center justify-center z-50 opacity-0 invisible transition-opacity duration-300 ease-in-out">
    
    <div id="modal-content-habit" class="bg-[#8EB548] text-[#FDFDD9] p-6 rounded-2xl shadow-xl w-full max-w-md mx-4 transform scale-95 transition-all duration-300 ease-in-out">
        
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-3xl font-bold text-white">Tambah Habit Baru?</h2>
            <button id="close-habit" class="text-3xl text-white opacity-80 hover:opacity-100">&times;</button>
        </div>
        
        <form action="#" method="POST">
            @csrf
            <div class="space-y-4">
                <div>
                    <label for="nama_habit" class="block text-sm font-semibold mb-1">Nama Habit*</label>
                    <input type="text" id="nama_habit" name="nama_habit" placeholder="Nama Habit"
                           class="w-full bg-[#F0EEB1] text-[#783D19] rounded-lg p-3 placeholder-[#B5B390]">
                </div>
                
                <div>
                    <label for="detail_habit" class="block text-sm font-semibold mb-1">Detail Habit</label>
                    <textarea id="detail_habit" name="detail_habit" rows="3" placeholder="Ketik detail di sini"
                              class="w-full bg-[#F0EEB1] text-[#783D19] rounded-lg p-3 placeholder-[#B5B390]"></textarea>
                </div>
                
                <div class="text-white font-medium">
                    <div class="flex flex-wrap gap-x-6 gap-y-2">
                        <label class="flex items-center space-x-2 cursor-pointer">
                            <input type="radio" name="frekuensi" value="daily" class="w-5 h-5 accent-[#783D19]" checked>
                            <span>Daily</span>
                        </label>
                        <label class="flex items-center space-x-2 cursor-pointer">
                            <input type="radio" name="frekuensi" value="weekly" class="w-5 h-5 accent-[#783D19]">
                            <span>Weekly</span>
                        </label>
                        <label class="flex items-center space-x-2 cursor-pointer">
                            <input type="radio" name="frekuensi" value="monthly" class="w-5 h-5 accent-[#783D19]">
                            <span>Monthly</span>
                        </label>
                        <label class="flex items-center space-x-2 cursor-pointer">
                            <input type="radio" name="frekuensi" value="custom" class="w-5 h-5 accent-[#783D19]">
                            <span>Custom</span>
                        </label>
                    </div>
                </div>
                
                <div>
                    <label for="waktu_habit" class="block text-sm font-semibold mb-1">Setiap jam berapa?</label>
                    <input type="time" id="waktu_habit" name="waktu_habit" 
                           class="bg-[#F0EEB1] text-[#783D19] rounded-lg p-3 w-auto">
                </div>

                <div class="flex justify-end pt-2">
                    <button type="button" 
                            class="bg-[#F0EEB1] text-[#783D19] font-bold py-3 px-8 rounded-lg shadow-md hover:bg-white transition duration-200">
                        Tambah!
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>