{{-- resources/views/popup/tambah-tugas.blade.php --}}

<div id="modal-tugas" class="fixed inset-0 flex items-center justify-center z-50 opacity-0 invisible transition-opacity duration-300 ease-in-out">
    
    <div id="modal-content-tugas" class="bg-[#C4661F] text-white p-6 rounded-2xl shadow-xl w-full max-w-md mx-4 transform scale-95 transition-all duration-300 ease-in-out">
        
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-3xl font-bold text-white">Buat tugas baru?</h2>
            <button id="close-tugas" class="text-3xl text-white opacity-80 hover:opacity-100">&times;</button>
        </div>
        
        <form action="#" method="POST">
            @csrf
            <div class="space-y-4">
                <div>
                    <label for="nama_tugas" class="block text-sm font-semibold mb-1">Tugas*</label>
                    <input type="text" id="nama_tugas" name="nama_tugas" placeholder="Nama tugas"
                           class="w-full bg-[#FDEECA] text-[#783D19] rounded-lg p-3 placeholder-[#C9BFA8]">
                </div>
                
                <div>
                    <label for="detail_tugas" class="block text-sm font-semibold mb-1">Detail Tugas</label>
                    <textarea id="detail_tugas" name="detail_tugas" rows="3" placeholder="Ketik detail di sini"
                              class="w-full bg-[#FDEECA] text-[#783D19] rounded-lg p-3 placeholder-[#C9BFA8]"></textarea>
                </div>
                
                <div>
                    <label class="block text-sm font-semibold mb-1">Deadline</label>
                    <div class="flex gap-2">
                        <input type="date" id="tgl_deadline" name="tgl_deadline"
                               class="bg-[#FDEECA] text-[#783D19] rounded-lg p-3 flex-grow">
                        <input type="time" id="waktu_deadline" name="waktu_deadline"
                               class="bg-[#FDEECA] text-[#783D19] rounded-lg p-3 w-auto">
                    </div>
                </div>

                <div class="flex justify-end pt-2">
                    <button type="button" 
                            class="bg-[#FDEECA] text-[#783D19] font-bold py-3 px-8 rounded-lg shadow-md hover:bg-white transition duration-200">
                        Tambah!
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>