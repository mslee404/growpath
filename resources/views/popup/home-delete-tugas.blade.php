{{-- resources/views/popup/popup-delete-tugas.blade.php --}}

<div id="modal-delete-tugas"
     class="fixed inset-0 flex items-center justify-center z-50
            opacity-0 invisible transition-opacity duration-300 ease-in-out">

    <div class="absolute inset-0 bg-black/40"></div>

    <div id="modal-content-delete-tugas"
         class="relative bg-[#C4661F] text-white p-6 rounded-2xl shadow-xl 
                w-full max-w-md mx-4 transform scale-95 transition-all">

        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold">Yakin mau hapus tugas ini?</h2>
            <button onclick="closeDeleteTugas()" class="text-3xl text-white opacity-80 hover:opacity-100">
                &times;
            </button>
        </div>

        <div class="flex justify-center gap-6 mt-4">

            <button onclick="closeDeleteTugas()"
                class="bg-[#FDEECA] text-[#783D19] font-bold py-3 px-6 rounded-lg shadow hover:bg-white transition">
                Ga jadi deh
            </button>

            <form id="form-delete-tugas" action="#" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="bg-[#FDEECA] text-red-700 font-bold py-3 px-6 rounded-lg shadow hover:bg-white transition">
                    Yakin!
                </button>
            </form>

        </div>

    </div>
</div>


