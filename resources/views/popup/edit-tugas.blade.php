{{-- resources/views/popup/popup-edit-tugas.blade.php --}}

<div id="modal-edit-tugas"
     class="fixed inset-0 flex items-center justify-center z-50
            opacity-0 invisible transition-opacity duration-300 ease-in-out">

    <div class="absolute inset-0 bg-black/40"></div>

    <div id="modal-content-edit-tugas"
         class="relative bg-[#C4661F] text-white p-6 rounded-2xl shadow-xl 
                w-full max-w-md mx-4 transform scale-95 transition-all">

        <div class="flex justify-between items-center mb-4">
            <h2 class="text-3xl font-bold">Edit Tugas</h2>
            <button onclick="closeEditTugas()" class="text-3xl text-white opacity-80 hover:opacity-100">&times;</button>
        </div>

        <form method="POST" action="#">
            @csrf
            <div class="space-y-4">

                <div>
                    <label class="block text-sm font-semibold mb-1">Tugas*</label>
                    <input id="edit_nama_tugas" type="text"
                           class="w-full bg-[#FDEECA] text-[#783D19] rounded-lg p-3"
                           placeholder="Nama tugas">
                </div>

                <div>
                    <label class="block text-sm font-semibold mb-1">Detail Tugas</label>
                    <textarea id="edit_detail_tugas" rows="3"
                              class="w-full bg-[#FDEECA] text-[#783D19] rounded-lg p-3"
                              placeholder="Ketik detail di sini"></textarea>
                </div>

                <div>
                    <label class="block text-sm font-semibold mb-1">Deadline</label>
                    <div class="flex gap-2">
                        <input id="edit_tanggal_tugas" type="date"
                               class="bg-[#FDEECA] text-[#783D19] rounded-lg p-3 flex-grow">
                        <input id="edit_jam_tugas" type="time"
                               class="bg-[#FDEECA] text-[#783D19] rounded-lg p-3 w-auto">
                    </div>
                </div>

                <div class="flex justify-end gap-4 mt-6">
                    <button type="button" onclick="openDeleteTugasConfirm()"
                        class="bg-[#FDEECA] text-red-700 font-bold py-3 px-6 rounded-lg shadow">
                        Hapus
                    </button>
                    
                    <button type="submit"
                            class="bg-[#FDEECA] text-[#783D19] font-bold py-3 px-8 rounded-lg shadow">
                        Edit
                    </button>
                </div>

            </div>
        </form>

    </div>
</div>

<script>
function openEditTugas() {
    const modal = document.getElementById("modal-edit-tugas");
    const content = document.getElementById("modal-content-edit-tugas");

    modal.classList.remove("opacity-0", "invisible");
    content.classList.remove("scale-95");

    modal.classList.add("opacity-100");
    content.classList.add("scale-100");
}

function closeEditTugas() {
    const modal = document.getElementById("modal-edit-tugas");
    const content = document.getElementById("modal-content-edit-tugas");

    modal.classList.add("opacity-0", "invisible");
    content.classList.add("scale-95");
}
</script>
