@php
    // SIMULASI DATA DARI DATABASE (Nanti ini dipindah ke Controller)
    $habits_semua = [
        ['title' => 'contoh harian', 'xp' => 3, 'category' => 'harian', 'checked' => false],
        ['title' => 'contoh mingguan', 'xp' => 10, 'category' => 'mingguan', 'checked' => false],
        ['title' => 'contoh bulanan', 'xp' => 20, 'category' => 'bulanan', 'checked' => true],
    ];
    $habits_harian = [
        ['title' => 'contoh harian', 'xp' => 3, 'category' => 'harian', 'checked' => false]
    ];
    $habits_mingguan = [
        ['title' => 'contoh mingguan', 'xp' => 10, 'category' => 'mingguan', 'checked' => false],
    ];
    $habits_bulanan = [
         ['title' => 'contoh bulanan', 'xp' => 20, 'category' => 'bulanan', 'checked' => true],
    ];
    $habits_kustom = [];
    
    $tugas_semua = [
        ['title' => 'Tugas DABD', 'xp' => 15, 'category' => 'Kuliah', 'date' => '20/10/2025', 'time' => '23:59', 'checked' => false],
        ['title' => 'Tugas TCBA', 'xp' => 25, 'category' => 'Kuliah', 'date' => '20/10/2025', 'time' => '23:59', 'checked' => false],
    ];
    $tugas_hari_ini = [];
    $tugas_besok = [];
@endphp

<x-layout>
    <x-slot:title>Home</x-slot:title>
    
    <x-slot:assets>
        @vite(['resources/css/app.css', 'resources/css/home-style.css', 'resources/js/app.js', 'resources/js/home.js']) 
    </x-slot:assets>

    <x-navbar activePage="home" />
        
    <div class="grid grid-cols-1 lg:grid-cols-5 gap-6 p-4 md:p-8 max-w-7xl mx-auto">

        <!-- Profil (bagian kiri) -->
        <div class="lg:col-span-1 space-y-6">
            
            <!-- Card Profile -->
            <div class="bg-[#FDFDD9] rounded-2xl shadow-lg p-4 text-center">
                <h2 class="font-bold text-2xl text-[#783D19] leading-tight mb-3">
                    Halo, username123!
                </h2>
                
                <div class="flex items-center space-x-3 mb-4">
                    <img src="https://placehold.co/92x92/4A6484/B0D2FA?text=AV" alt="Avatar" class="w-16 h-16 rounded-md border-2 border-gray-300">
                    <div>
                        <p class="text-lg font-medium text-[#783D19] text-left">Level 1</p>
                        <p class="text-sm font-medium text-[#783D19] text-left">25/100 xp</p>
                    </div>
                </div>

                <!-- XP bar -->
                <div class="watering-can">
                    <div class="watering-can-water" style="height: 25%;"></div>
                </div>
            </div>

            <!-- Motivation text -->
            <div class="bg-[#C4661F] rounded-2xl shadow-lg p-4">
                <p class="text-xl font-bold text-[#FDFDD9] leading-snug">
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
                    <button data-tab-button="habit-semua" class="tab-button snap-start flex-shrink-0 bg-[#8EB548] text-[#783D19] shadow-md py-1 px-4 rounded-t-lg text-base font-semibold whitespace-nowrap">
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
                        <div class="space-y-2 h-[200px] overflow-y-auto vertical-scroller pr-2">
                            @foreach ($habits_semua as $item)
                                <x-item-list 
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
                        <div class="space-y-2 h-[200px] overflow-y-auto vertical-scroller pr-2">
                            @foreach ($habits_harian as $item)
                                <x-item-list 
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
                        <div class="space-y-2 h-[200px] overflow-y-auto vertical-scroller pr-2">
                            @foreach ($habits_mingguan as $item)
                                <x-item-list 
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
                        <div class="space-y-2 h-[200px] overflow-y-auto vertical-scroller pr-2">
                            @foreach ($habits_bulanan as $item)
                                <x-item-list 
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
                        <div class="space-y-2 h-[200px] overflow-y-auto vertical-scroller pr-2">
                            @foreach ($habits_kustom as $item)
                                <x-item-list 
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
                        <div class="space-y-2 h-[200px] overflow-y-auto vertical-scroller pr-2">
                            @foreach ($tugas_semua as $item)
                                <x-item-list
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
                        <div class="space-y-2 h-[200px] overflow-y-auto vertical-scroller pr-2">
                            @foreach ($tugas_hari_ini as $item)
                                <x-item-list 
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
                        <div class="space-y-2 h-[200px] overflow-y-auto vertical-scroller pr-2">
                            @foreach ($tugas_besok as $item)
                                <x-item-list 
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
        @include('popup.tambah-habit')
        @include('popup.tambah-tugas')
    </x-slot:popups>

</x-layout>