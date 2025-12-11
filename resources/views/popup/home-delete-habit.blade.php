<div id="modal-delete-habit" 
    class="fixed inset-0 flex items-center justify-center z-50
           opacity-0 invisible transition-opacity duration-300 ease-in-out">

    <!-- Background -->
    <div class="absolute inset-0 bg-black/40"></div>

    <!-- Box -->
    <div id="modal-content-delete-habit"
        class="relative bg-[#8EB548] text-[#FDFDD9] p-10 rounded-2xl shadow-xl
               w-full max-w-md mx-4 transform scale-95 transition-all duration-300">
        
        <div class="flex justify-end mb-2">
            <button id="close-delete-habit" class="text-3xl text-white">&times;</button>
        </div>

        <h2 class="text-center text-3xl font-bold text-white mb-6">
            Yakin mau<br>hapus habit ini?
        </h2>

        <div class="flex justify-center gap-6 mt-6">
            <button class="bg-[#F0EEB1] text-[#783D19] font-bold py-3 px-6 rounded-xl"
                    id="cancel-delete">
                Ga jadi deh
            </button>
            
            <button class="bg-[#F0EEB1] text-red-700 font-bold py-3 px-6 rounded-xl"
                    id="confirm-delete">
                Yakin!
            </button>
        </div>

    </div>
</div>

<script>
function openDeleteHabit() {
    const modal = document.getElementById("modal-delete-habit");
    const content = document.getElementById("modal-content-delete-habit");

    modal.classList.remove("opacity-0", "invisible");
    content.classList.remove("scale-95");

    modal.classList.add("opacity-100");
    content.classList.add("scale-100");
}

function closeDeleteHabit() {
    const modal = document.getElementById("modal-delete-habit");
    const content = document.getElementById("modal-content-delete-habit");

    modal.classList.add("opacity-0", "invisible");
    content.classList.add("scale-95");
}

// Close buttons
document.getElementById("close-delete-habit").addEventListener("click", closeDeleteHabit);
document.getElementById("cancel-delete").addEventListener("click", closeDeleteHabit);

// Tombol "Yakin!"
document.getElementById("confirm-delete").addEventListener("click", () => {
    alert("Habit dihapus (nanti sambung ke controller)");
    closeDeleteHabit();
});
</script>
