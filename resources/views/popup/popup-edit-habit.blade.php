{{-- resources/views/popup/popup-edit-habit.blade.php --}}

<x-edit-habit modalId="modal-edit-habit" title="Edit Habit?">

    {{-- INPUT NAMA --}}
    <div>
        <label class="block text-sm font-semibold mb-1">Nama Habit*</label>
        <input type="text" id="edit_nama_habit" name="nama_habit"
            class="w-full bg-[#F0EEB1] text-[#783D19] rounded-lg p-3"
            placeholder="Nama Habit">
    </div>

    {{-- INPUT DETAIL --}}
    <div>
        <label class="block text-sm font-semibold mb-1">Detail Habit</label>
        <textarea id="edit_detail_habit" name="detail_habit" rows="3"
            class="w-full bg-[#F0EEB1] text-[#783D19] rounded-lg p-3"
            placeholder="Ketik detail di sini"></textarea>
    </div>

    {{-- RADIO KATEGORI --}}
    <div class="text-white font-medium">
        <div class="flex flex-wrap gap-6">

            <label class="flex items-center space-x-2 cursor-pointer">
                <input type="radio" name="edit_frekuensi" value="daily"
                       class="w-5 h-5 accent-[#783D19]">
                <span>Daily</span>
            </label>

            <label class="flex items-center space-x-2 cursor-pointer">
                <input type="radio" name="edit_frekuensi" value="weekly"
                       class="w-5 h-5 accent-[#783D19]">
                <span>Weekly</span>
            </label>

            <label class="flex items-center space-x-2 cursor-pointer">
                <input type="radio" name="edit_frekuensi" value="monthly"
                       class="w-5 h-5 accent-[#783D19]">
                <span>Monthly</span>
            </label>

            <label class="flex items-center space-x-2 cursor-pointer">
                <input type="radio" name="edit_frekuensi" value="custom"
                       class="w-5 h-5 accent-[#783D19]">
                <span>Custom</span>
            </label>
        </div>
    </div>

    {{-- FOOTER --}}
    <x-slot:footer>

        {{-- DAILY --}}
        <div id="edit-footer-daily" class="section-footer hidden">
            <label class="block text-sm font-semibold mb-1">Setiap jam berapa?</label>
            <input type="time" id="edit_jam_daily" name="jam_daily"
                class="w-1/2 bg-[#F0EEB1] text-[#783D19] rounded-lg p-3">
        </div>

        {{-- WEEKLY --}}
        <div id="edit-footer-weekly" class="section-footer hidden">
            <div class="grid grid-cols-2 gap-4">

                <div>
                    <label class="block text-sm font-semibold mb-1">Setiap Hari Apa?</label>
                    <select id="edit_hari_weekly" name="hari_weekly"
                        class="w-full bg-[#F0EEB1] text-[#783D19] rounded-lg p-3">
                        <option>Pilih hari disini</option>
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
                    <input type="time" id="edit_jam_weekly" name="jam_weekly"
                        class="w-full bg-[#F0EEB1] text-[#783D19] rounded-lg p-3">
                </div>

            </div>
        </div>

        {{-- MONTHLY --}}
        <div id="edit-footer-monthly" class="section-footer hidden space-y-4">

            <label class="block text-sm font-semibold text-white">Setiap Apa?</label>

            {{-- SUB RADIO --}}
            <div class="grid grid-cols-2 gap-4">
                <label class="flex items-center space-x-2 cursor-pointer">
                    <input type="radio" name="edit_monthly_mode" value="tanggal"
                        class="w-4 h-4 accent-[#783D19]">
                    <span>Tanggal</span>
                </label>

                <label class="flex items-center space-x-2 cursor-pointer">
                    <input type="radio" name="edit_monthly_mode" value="minggu"
                        class="w-4 h-4 accent-[#783D19]">
                    <span>Hari, Minggu Ke-</span>
                </label>
            </div>

            {{-- MODE TANGGAL --}}
            <div id="edit-monthly-tanggal" class="grid grid-cols-2 gap-4 hidden">
                <div>
                    <label class="block text-sm font-semibold">Tanggal</label>
                    <input type="number" id="edit_tanggal_monthly" min="1" max="31"
                        class="w-full bg-[#F0EEB1] text-[#783D19] rounded-lg p-3">
                </div>

                <div>
                    <label class="block text-sm font-semibold">Jam</label>
                    <input type="time" id="edit_jam_monthly_tanggal"
                        class="w-full bg-[#F0EEB1] text-[#783D19] rounded-lg p-3">
                </div>
            </div>

            {{-- MODE MINGGU --}}
            <div id="edit-monthly-minggu" class="grid grid-cols-3 gap-4 hidden">

                <div>
                    <label class="block text-sm font-semibold">Hari</label>
                    <select id="edit_hari_monthly"
                        class="w-full bg-[#F0EEB1] text-[#783D19] rounded-lg p-3">
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
                    <input type="number" min="1" max="5" id="edit_minggu_ke"
                        class="w-full bg-[#F0EEB1] text-[#783D19] rounded-lg p-3">
                </div>

                <div>
                    <label class="block text-sm font-semibold">Jam</label>
                    <input type="time" id="edit_jam_monthly_minggu"
                        class="w-full bg-[#F0EEB1] text-[#783D19] rounded-lg p-3">
                </div>

            </div>

        </div>

        {{-- CUSTOM --}}
        <div id="edit-footer-custom" class="section-footer hidden">
            <div class="grid grid-cols-2 gap-4">

                <div>
                    <label class="block text-sm font-semibold mb-1">Setiap Berapa Hari?</label>
                    <input type="number" id="edit_interval_custom" min="1"
                        class="w-full bg-[#F0EEB1] text-[#783D19] rounded-lg p-3"
                        placeholder="Setiap ... hari">
                </div>

                <div>
                    <label class="block text-sm font-semibold mb-1">Jam Berapa?</label>
                    <input type="time" id="edit_jam_custom"
                        class="w-full bg-[#F0EEB1] text-[#783D19] rounded-lg p-3">
                </div>
            </div>
        </div>

        {{-- BUTTON --}}
        <div class="flex justify-end gap-4 mt-6">
            <button type="button" onclick="openDeleteHabit()" class="bg-[#F0EEB1] text-red-700 font-bold py-3 px-6 rounded-lg">
                Hapus
            </button>

            <button type="submit" class="bg-[#F0EEB1] text-[#783D19] font-bold py-3 px-8 rounded-lg shadow-md">
                Edit
            </button>
        </div>

    </x-slot:footer>

</x-edit-habit>

