<x-tambah-habit modalId="modal-habit" title="Tambah Habit Baru?" action="{{ route('habit.store') }}">
    @csrf

    {{-- INPUT NAMA HABIT --}}
    <div>
        <label class="block text-sm font-semibold mb-1">Nama Habit*</label>
        <input type="text" name="nama_habit" required
            class="w-full bg-[#F0EEB1] text-[#783D19] rounded-lg p-3"
            placeholder="Nama Habit">
    </div>

    {{-- INPUT DETAIL --}}
    <div>
        <label class="block text-sm font-semibold mb-1">Detail Habit</label>
        <textarea name="detail_habit" rows="3"
            class="w-full bg-[#F0EEB1] text-[#783D19] rounded-lg p-3 resize none !resize-none"
            placeholder="Ketik detail di sini"></textarea>
    </div>

    {{-- RADIO KATEGORI --}}
    <div class="text-white font-medium">
        <div class="flex flex-wrap gap-6">
            <label class="flex items-center space-x-2 cursor-pointer">
                <input type="radio" name="frekuensi" value="daily" checked class="w-5 h-5 accent-[#783D19]">
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


    {{-- FOOTER (4 MODE) --}}
    <x-slot:footer>

        {{-- DAILY --}}
        <div id="footer-daily" class="section-footer">
            <label class="block text-sm font-semibold mb-1">Setiap Jam Berapa?</label>
            <input type="time" name="jam_daily" required
                class="w-1/2 bg-[#F0EEB1] text-[#783D19] rounded-lg p-3">
        </div>

        {{-- WEEKLY --}}
        <div id="footer-weekly" class="section-footer hidden">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold mb-1">Setiap Hari Apa?</label>
                    <select name="hari_weekly" required
                        class="w-full bg-[#F0EEB1] text-[#783D19] rounded-lg p-3">
                        <option value="" disabled selected>Pilih hari disini</option>
                        <option>Senin</option>
                        <option>Selasa</option>
                        <option>Rabu</option>
                        <option>Kamis</option>
                        <option>Jumat</option>
                        <option>Sabtu</option>
                        <option>Minggu</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold mb-1">Jam Berapa?</label>
                    <input type="time" name="jam_weekly" required
                        class="w-full bg-[#F0EEB1] text-[#783D19] rounded-lg p-3">
                </div>
            </div>
        </div>

        {{-- MONTHLY --}}
        <div id="footer-monthly" class="section-footer hidden space-y-2">

            {{-- SUB-RADIO: HORIZONTAL --}}
            <div class="flex items-center gap-4">
                <label class="text-sm font-semibold text-white whitespace-nowrap">
                    Setiap Apa?
                </label>

                <label class="flex items-center space-x-1 cursor-pointer">
                    <input type="radio" name="monthly_mode" value="tanggal" checked
                        class="w-4 h-4 accent-[#783D19]">
                    <span class="text-sm whitespace-nowrap">Tanggal</span>
                </label>

                <label class="flex items-center space-x-1 cursor-pointer">
                    <input type="radio" name="monthly_mode" value="minggu"
                        class="w-3.5 h-3.5 accent-[#783D19]">
                    <span class="text-sm whitespace-nowrap">Hari, Minggu Ke-</span>
                </label>
            </div>



            {{-- SECTION: MODE TANGGAL (2 kolom agar tidak panjang ke bawah) --}}
            <div id="monthly-tanggal" class="grid grid-cols-2 gap-2 items-center">

                <div>
                    <label class="block text-sm font-semibold">Tanggal</label>
                    <input type="number" min="1" max="31" name="tanggal_monthly" required
                     class="w-full bg-[#F0EEB1] text-[#783D19] rounded-lg p-3 text-sm">
                </div>

                <div>
                    <label class="block text-sm font-semibold">Jam</label>
                    <input type="time" name="jam_monthly_tanggal" required
                        class="w-full bg-[#F0EEB1] text-[#783D19] rounded-lg p-3 text-sm">
                </div>

            </div>


            {{-- SECTION: MONTHLY--}}
            <div id="monthly-minggu" class="grid grid-cols-3 gap-2 hidden">

                <div>
                    <label class="block text-sm font-semibold">Hari</label>
                    <select name="hari_monthly" required
                        class="w-full bg-[#F0EEB1] text-[#783D19] rounded-lg p-3 text-sm">
                        <option value="" disabled selected>Pilih hari disini</option>
                        <option>Senin</option>
                        <option>Selasa</option>
                        <option>Rabu</option>
                        <option>Kamis</option>
                        <option>Jumat</option>
                        <option>Sabtu</option>
                        <option>Minggu</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold">Minggu Ke</label>
                    <input type="number" min="1" max="5" name="minggu_ke" required
                        class="w-full bg-[#F0EEB1] text-[#783D19] rounded-lg p-3">
                </div>

                <div>
                    <label class="block text-sm font-semibold">Jam</label>
                    <input type="time" name="jam_monthly_minggu" required
                        class="w-full bg-[#F0EEB1] text-[#783D19] rounded-lg p-3 text-sm">
                </div>
            </div>
        </div>


        {{-- CUSTOM --}}
        <div id="footer-custom" class="section-footer hidden">
            <div class="grid grid-cols-2 gap-4">

                 <div>
                    <label class="block text-sm font-semibold mb-1">Setiap Berapa Hari?</label>
                    <input type="number" min="1" name="interval_custom" required
                        class="w-full bg-[#F0EEB1] text-[#783D19] rounded-lg p-3"
                        placeholder="Setiap ... hari">
                </div>

                <div>
                    <label class="block text-sm font-semibold mb-1">Jam Berapa?</label>
                    <input type="time" name="jam_custom" required
                        class="w-full bg-[#F0EEB1] text-[#783D19] rounded-lg p-3">
                </div>

            </div>
        </div>


        {{-- TOMBOL --}}
        <div class="flex justify-end mt-6">
            <button 
                type="submit"
                class="bg-[#F0EEB1] text-[#783D19] font-bold py-3 px-8 rounded-lg shadow-md hover:bg-white">
                Tambah!
            </button>
        </div>

    </x-slot:footer>

</x-tambah-habit>


{{-- SCRIPT SWITCH FOOTER --}}
<script>
document.addEventListener('DOMContentLoaded', function () {

    const sections = {
        daily: document.getElementById("footer-daily"),
        weekly: document.getElementById("footer-weekly"),
        monthly: document.getElementById("footer-monthly"),
        custom: document.getElementById("footer-custom"),
    };

    // Fungsi untuk mengatur atribut required hanya pada bagian yang terlihat
    function updateRequiredFields(activeVal) {
        Object.keys(sections).forEach(key => {
            const inputs = sections[key].querySelectorAll('input, select');
            inputs.forEach(input => {
                // Jika section aktif, aktifkan required. Jika tersembunyi, matikan required.
                input.required = (key === activeVal);
            });
        });

        // Khusus Monthly, sesuaikan required berdasarkan sub-mode (tanggal/minggu)
        if (activeVal === 'monthly') {
            const isTanggal = document.querySelector("input[name='monthly_mode']:checked").value === 'tanggal';
            
            document.querySelectorAll('#monthly-tanggal input').forEach(i => i.required = isTanggal);
            document.querySelectorAll('#monthly-minggu input, #monthly-minggu select').forEach(i => i.required = !isTanggal);
        }
    }

    document.querySelectorAll("input[name='frekuensi']").forEach(radio => {
        radio.addEventListener("change", e => {
            const val = e.target.value;

            Object.values(sections).forEach(s => s.classList.add("hidden"));
            sections[val].classList.remove("hidden");
            updateRequiredFields(val);
        });
    });

    document.querySelectorAll("input[name='monthly_mode']").forEach(radio => {
        radio.addEventListener("change", e => {
            const monthlyTanggal = document.getElementById("monthly-tanggal");
            const monthlyMinggu = document.getElementById("monthly-minggu");

            if (e.target.value === "tanggal") {
                monthlyTanggal.classList.remove("hidden");
                monthlyMinggu.classList.add("hidden");
            } else {
                monthlyTanggal.classList.add("hidden");
                monthlyMinggu.classList.remove("hidden");
            }
            updateRequiredFields('monthly'); // Update required saat pindah mode bulanan
        });
    });

    updateRequiredFields('daily');

});
</script>
