

<x-layout>
    <x-slot:title>Home</x-slot:title>
    
    <x-slot:assets>
        @vite(['resources/css/app.css', 'resources/css/home-style.css', 'resources/js/app.js', 'resources/js/home.js']) 
    </x-slot:assets>

    <x-navbar activePage="home" />
        
    <div class="grid grid-cols-1 lg:grid-cols-5 gap-6 p-4 md:p-8 max-w-7xl mx-auto">

        <!-- Profil (bagian kiri) -->
        <div class="lg:col-span-1 grid grid-cols-2 gap-4 lg:flex lg:flex-col lg:gap-6">
            
            <!-- Card Profile -->
            <div class="bg-[#FDFDD9] rounded-2xl shadow-lg p-4 items-center">
                <h2 class="font-bold text-2xl text-[#783D19] leading-tight mb-3">
                    Halo, {{ $user->name }}!
                </h2>
                
                <div class="flex items-center space-x-3 mb-4">
                    <img src="{{ $user->avatar_url }}" alt="Avatar {{ $user->name ?? $user->username }}" class="w-16 h-16 rounded-md border-2 border-gray-300">
                    <div>
                        <p class="text-lg font-medium text-[#783D19] text-left">Level 1</p>
                        <p class="text-xs font-bold text-[#5E7153] text-left uppercase tracking-wider">25/100 xp</p>
                    </div>
                </div>

                <!-- XP bar -->
                <div class="watering-can">
                    <div class="watering-can-water" style="height: 25%;"></div>
                </div>
            </div>

            <!-- Motivation text -->
            <div class="bg-[#C4661F] rounded-2xl shadow-lg p-4 flex h-full items-center justify-center">
                <p class="text-lg font-bold text-[#FDFDD9] leading-snug">
                    Jangan lupa sirami aku dengan menyelesaikan kebiasaanmu ya~
                </p>
            </div>

        </div>

        <!-- Pertumbuhan tanaman -->
        <div class="lg:col-span-2 flex items-center justify-center min-h-[500px]">
            <div class="w-full h-[600px] bg-[#FDFDD9]/80 rounded-2xl border-8 border-[#A85319] shadow-inner flex flex-col justify-between items-center p-6">
                <div class="flex-1 flex items-center justify-center">
                    <img src="https://placehold.co/117x115/C4661F/A85319?text=Biji" alt="Tanaman" class="w-24 h-24">
                </div>
                <div class="w-full h-48 bg-[#FDFDD9] rounded-2xl shadow-md">
                </div>
            </div>
        </div>

        <!-- List Habit dan Tugas -->
        <div class="lg:col-span-2 space-y-8">

            {{-- Box Habit: Menggunakan komponen <x-data-box> --}}
            <x-data-box 
                title="Habit" 
                tabGroup="habit" 
                scrollerId="habit-scroller" 
                addButtonId="btn-tambah-habit" 
                type="habit"
            >
                {{-- Ini adalah slot untuk $tabs --}}
                <x-slot:tabs>
                    <button data-tab-button="habit-semua" class="tab-button snap-start flex-shrink-0 bg-[#78A44C] text-[#FDFDD9] shadow-md py-1 px-4 rounded-t-lg text-base font-semibold whitespace-nowrap">
                        Semua
                    </button>
                    <button data-tab-button="habit-harian" class="tab-button snap-start flex-shrink-0 bg-[#FDFDD9] text-[#783D19] shadow-sm hover:bg-white py-1 px-4 rounded-t-lg text-base font-semibold whitespace-nowrap">
                        Harian
                    </button>
                    <button data-tab-button="habit-mingguan" class="tab-button snap-start flex-shrink-0 bg-[#FDFDD9] text-[#783D19] shadow-sm hover:bg-white py-1 px-4 rounded-t-lg text-base font-semibold whitespace-nowrap">
                        Mingguan
                    </button>
                    <button data-tab-button="habit-bulanan" class="tab-button snap-start flex-shrink-0 bg-[#FDFDD9] text-[#783D19] shadow-sm hover:bg-white py-1 px-4 rounded-t-lg text-base font-semibold whitespace-nowrap">
                        Bulanan
                    </button>
                     <button data-tab-button="habit-kustom" class="tab-button snap-start flex-shrink-0 bg-[#FDFDD9] text-[#783D19] shadow-sm hover:bg-white py-1 px-4 rounded-t-lg text-base font-semibold whitespace-nowrap">
                        Kustom
                    </button>
                </x-slot:tabs>

                {{-- Ini adalah $slot utama untuk panel konten --}}
                
                <!-- Panel Tab Semua -->
                <div id="habit-semua" class="tab-panel">
                    @if (count($habits_semua) > 0)
                        <div class="space-y-2 h-[200px] overflow-y-auto vertical-scroller">
                            @foreach ($habits_semua as $item)
                                <x-data-list 
                                    type="habit" {{-- <-- 3. TAMBAHKAN TYPE DI SINI --}}
                                    :title="$item['title']" 
                                    :xp="$item['xp']" 
                                    :category="$item['category']"
                                    :checked="$item['checked']" 
                                />
                            @endforeach
                        </div>
                        <p class="text-center text-base text-[#783D19] font-semibold mt-3">
                            {{-- TODO: Ganti angka ini dengan logika --}}
                            2 belum diselesaikan
                        </p>
                    @else
                        <p class="text-center text-[#783D19] py-8 text-lg">Belum ada habit.</p>
                    @endif
                </div>

                <!-- Panel Tab Harian -->
                <div id="habit-harian" class="tab-panel hidden">
                    @if (count($habits_harian) > 0)
                        <div class="space-y-2 h-[200px] overflow-y-auto vertical-scroller">
                            @foreach ($habits_harian as $item)
                                <x-data-list 
                                    type="habit" {{-- <-- 3. TAMBAHKAN TYPE DI SINI --}}
                                    :title="$item['title']" 
                                    :xp="$item['xp']" 
                                    :category="$item['category']"
                                    :checked="$item['checked']" 
                                />
                            @endforeach
                        </div>
                        {{-- ... (logika status count) ... --}}
                    @else
                        <p class="text-center text-[#783D19] py-8 text-lg">Belum ada habit harian.</p>
                    @endif
                </div>
                
                <!-- Panel Tab Mingguan -->
                <div id="habit-mingguan" class="tab-panel hidden">
                    @if (count($habits_mingguan) > 0)
                        <div class="space-y-2 h-[200px] overflow-y-auto vertical-scroller">
                            @foreach ($habits_mingguan as $item)
                                <x-data-list 
                                    type="habit" {{-- <-- 3. TAMBAHKAN TYPE DI SINI --}}
                                    :title="$item['title']" 
                                    :xp="$item['xp']" 
                                    :category="$item['category']"
                                    :checked="$item['checked']" 
                                />
                            @endforeach
                        </div>
                        {{-- ... (logika status count) ... --}}
                    @else
                        <p class="text-center text-[#783D19] py-8 text-lg">Belum ada habit mingguan.</p>
                    @endif
                </div>

                <!-- Panel Tab Bulanan -->
                <div id="habit-bulanan" class="tab-panel hidden">
                    @if (count($habits_bulanan) > 0)
                        <div class="space-y-2 h-[200px] overflow-y-auto vertical-scroller">
                            @foreach ($habits_bulanan as $item)
                                <x-data-list 
                                    type="habit" {{-- <-- 3. TAMBAHKAN TYPE DI SINI --}}
                                    :title="$item['title']" 
                                    :xp="$item['xp']" 
                                    :category="$item['category']"
                                    :checked="$item['checked']" 
                                />
                            @endforeach
                        </div>
                        {{-- ... (logika status count) ... --}}
                    @else
                        <p class="text-center text-[#783D19] py-8 text-lg">Belum ada habit bulanan.</p>
                    @endif
                </div>

                <!-- Panel Tab Kustom -->
                <div id="habit-kustom" class="tab-panel hidden">
                    @if (count($habits_kustom) > 0)
                        <div class="space-y-2 h-[200px] overflow-y-auto vertical-scroller">
                            @foreach ($habits_kustom as $item)
                                <x-data-list 
                                    type="habit" {{-- <-- 3. TAMBAHKAN TYPE DI SINI --}}
                                    :title="$item['title']" 
                                    :xp="$item['xp']" 
                                    :category="$item['category']"
                                    :checked="$item['checked']" 
                                />
                            @endforeach
                        </div>
                        {{-- ... (logika status count) ... --}}
                    @else
                        <p class="text-center text-[#783D19] py-8 text-lg">Belum ada habit kustom.</p>
                    @endif
                </div>
                
            </x-data-box>

            {{-- Box Tugas: Menggunakan komponen <x-data-box> yang SAMA --}}
            <x-data-box 
                title="Tugas" 
                tabGroup="tugas" 
                scrollerId="tugas-scroller" 
                addButtonId="btn-tambah-tugas" 
                type="tugas"
            >
                {{-- Ini adalah slot untuk $tabs --}}
                <x-slot:tabs>
                    <button data-tab-button="tugas-semua" class="tab-button snap-start flex-shrink-0 bg-[#C4661F] text-[#FDFDD9] shadow-md py-1 px-4 rounded-t-lg text-base font-semibold whitespace-nowrap">
                        Semua
                    </button>
                    <button data-tab-button="tugas-hari-ini" class="tab-button snap-start flex-shrink-0 bg-[#FDFDD9] text-[#783D19] shadow-sm hover:bg-white py-1 px-4 rounded-t-lg text-base font-semibold whitespace-nowrap">
                        Hari Ini
                    </button>
                    <button data-tab-button="tugas-besok" class="tab-button snap-start flex-shrink-0 bg-[#FDFDD9] text-[#783D19] shadow-sm hover:bg-white py-1 px-4 rounded-t-lg text-base font-semibold whitespace-nowrap">
                        Besok
                    </button>
                </x-slot:tabs>

                {{-- Ini adalah $slot utama untuk panel konten --}}
                
                <!-- Panel Tab Semua -->
                <div id="tugas-semua" class="tab-panel">
                    @if (count($tugas_semua) > 0)
                        <div class="space-y-2 h-[200px] overflow-y-auto vertical-scroller">
                            @foreach ($tugas_semua as $item)
                                <x-data-list
                                    type="tugas"
                                    :title="$item['title']"
                                    :xp="$item['xp']" 
                                    :category="$item['category']"
                                    :date="$item['date']" 
                                    :time="$item['time']"
                                    :checked="$item['checked']"
                                />
                            @endforeach
                        </div>
                        <p class="text-center text-base text-[#FDFDD9] font-semibold mt-3">
                            {{-- TODO: Ganti angka ini dengan logika --}}
                            2 belum diselesaikan
                        </p>
                    @else
                        <p class="text-center text-[#FDFDD9] py-8 text-lg">Belum ada tugas.</p>
                    @endif
                </div>
                
                <!-- Panel Tab Hari Ini -->
                <div id="tugas-hari-ini" class="tab-panel hidden">
                     @if (count($tugas_hari_ini) > 0)
                        <div class="space-y-2 h-[200px] overflow-y-auto vertical-scroller">
                            @foreach ($tugas_hari_ini as $item)
                                <x-data-list 
                                    type="tugas"
                                    :title="$item['title']"
                                    :xp="$item['xp']" 
                                    :category="$item['category']"
                                    :date="$item['date']" 
                                    :time="$item['time']"
                                    :checked="$item['checked']"
                                />
                            @endforeach
                        </div>
                        {{-- ... (logika status count) ... --}}
                    @else
                        <p class="text-center text-[#FDFDD9] py-8 text-lg">Tidak ada tugas hari ini.</p>
                    @endif
                </div>
                
                <!-- Panel Tab Besok -->
                 <div id="tugas-besok" class="tab-panel hidden">
                     @if (count($tugas_besok) > 0)
                        <div class="space-y-2 h-[200px] overflow-y-auto vertical-scroller">
                            @foreach ($tugas_besok as $item)
                                <x-data-list 
                                    type="tugas"
                                    :title="$item['title']"
                                    :xp="$item['xp']" 
                                    :category="$item['category']"
                                    :date="$item['date']" 
                                    :time="$item['time']"
                                    :checked="$item['checked']"
                                />
                            @endforeach
                        </div>
                        {{-- ... (logika status count) ... --}}
                    @else
                        <p class="text-center text-[#FDFDD9] py-8 text-lg">Tidak ada tugas untuk besok.</p>
                    @endif
                </div>
                
            </x-data-box>

        </div>

    </div>
    
    <x-slot:popups>
        @include('popup.home-tambah-habit')
        @include('popup.home-tambah-tugas')
        @include('popup.home-edit-habit')
        @include('popup.home-edit-tugas')
        @include('popup.home-delete-habit')
        @include('popup.home-delete-tugas')
    </x-slot:popups>

{{-- SCRIPT --}}
<script>

function openEditHabit() {
    const modal = document.getElementById("modal-edit-habit");
    const content = document.getElementById("modal-content-edit-habit");

    modal.classList.remove("opacity-0", "invisible");
    content.classList.remove("scale-95");

    modal.classList.add("opacity-100");
    content.classList.add("scale-100");
}

function closeEditHabit() {
    const modal = document.getElementById("modal-edit-habit");
    const content = document.getElementById("modal-content-edit-habit");

    modal.classList.add("opacity-0", "invisible");
    content.classList.add("scale-95");
}

document.addEventListener('DOMContentLoaded', function () {

    // CLOSE BUTTON
    document.getElementById("close-edit-habit")
        .addEventListener("click", closeEditHabit);

    // SWITCH FOOTER
    const sections = {
        daily: document.getElementById("edit-footer-daily"),
        weekly: document.getElementById("edit-footer-weekly"),
        monthly: document.getElementById("edit-footer-monthly"),
        custom: document.getElementById("edit-footer-custom"),
    };

    document.querySelectorAll("input[name='edit_frekuensi']").forEach(radio => {
        radio.addEventListener("change", e => {
            let val = e.target.value;
            Object.values(sections).forEach(s => s.classList.add("hidden"));
            sections[val].classList.remove("hidden");
        });
    });

    // Monthly switch
    const monthlyTanggal = document.getElementById("edit-monthly-tanggal");
    const monthlyMinggu = document.getElementById("edit-monthly-minggu");

    document.querySelectorAll("input[name='edit_monthly_mode']").forEach(radio => {
        radio.addEventListener("change", e => {
            if (e.target.value === "tanggal") {
                monthlyTanggal.classList.remove("hidden");
                monthlyMinggu.classList.add("hidden");
            } else {
                monthlyTanggal.classList.add("hidden");
                monthlyMinggu.classList.remove("hidden");
            }
        });
    });

});
</script>

</x-layout>