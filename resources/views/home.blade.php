<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GrowPath - Home</title>
    
    @vite(['resources/css/app.css', 'resources/css/home-style.css', 'resources/js/app.js', 'resources/js/home.js']) 

</head>

<body>
    
    <!-- Navbar -->
    <nav class="bg-[#8EB548] text-white font-bold shadow-lg">
        <div class="container mx-auto px-6 py-3 flex justify-between items-center">
            <a href="#" class="text-3xl font-bold tracking-tight text-[#FDFDD9]">GROWPATH</a>
            
            <div class="flex items-center space-x-4">
                <!-- Home aktif -->
                <a href="#" class="flex items-center space-x-2 py-2 px-4 bg-[#FDFDD9] rounded-2xl text-black">
                    <span class="text-lg font-bold">HOME</span>
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v14m-4-4l4 4 4-4"></path></svg>
                </a>
                
                <!-- Inventory -->
                <a href="#" class="flex items-center space-x-2 py-2 px-4 rounded-2xl text-black opacity-70 hover:opacity-100">
                    <span class="text-lg font-bold">INVENTORY</span>
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-2m-4-1v8m0 0l3-3m-3 3L9 8m-5 5h2.553C8.188 13 9 13.81 9 14.857V17m8-4h-2.553C14.812 13 14 13.81 14 14.857V17"></path></svg>
                </a>

                <!-- Market -->
                <a href="#" class="flex items-center space-x-2 py-2 px-4 rounded-2xl text-black opacity-70 hover:opacity-100">
                    <span class="text-lg font-bold">MARKET</span>
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </a>
                
                <!-- Leaderboard -->
                 <a href="#" class="flex items-center space-x-2 py-2 px-4 rounded-2xl text-black opacity-70 hover:opacity-100">
                    <span class="text-lg font-bold">LEADERBOARD</span>
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.653-.08-1.285-.23-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.653.08-1.285.23-1.857m0 0A3.004 3.004 0 007 16c0-1.657-1.343-3-3-3S1 14.343 1 16s1.343 3 3 3c.621 0 1.19-.186 1.644-.5M17 16c0-1.657 1.343-3 3-3s3 1.343 3 3-1.343 3-3 3c-.621 0-1.19-.186-1.644-.5M12 8c0-1.657 1.343-3 3-3s3 1.343 3 3-1.343 3-3 3-3-1.343-3-3zM6 8c0-1.657 1.343-3 3-3s3 1.343 3 3-1.343 3-3 3-3-1.343-3-3z"></path></svg>
                </a>
                
                <!-- Profil -->
                <a href="#" class="flex items-center space-x-2 py-2 px-4 rounded-2xl text-black opacity-70 hover:opacity-100">
                    <span class="text-lg font-bold">PROFIL</span>
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                </a>
            </div>
        </div>
    </nav>

    <main class="container mx-auto p-4 md:p-8 max-w-7xl">
        
        <div class="grid grid-cols-1 lg:grid-cols-5 gap-6">

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

                <!-- Box Habit -->
                <div data-tab-group="habit">
                    <!-- Header (Judul, Tab Kategori, Tombol +) -->
                    <div class="flex items-center justify-between space-x-2">
                        <h2 class="text-3xl font-extrabold text-[#783D19] flex-shrink-0">Habit</h2>

                        <div class="flex-1 flex items-center overflow-hidden">
                            <!-- Scroller Kiri-->
                            <button class="scroll-btn scroll-btn-left text-[#783D19] opacity-0 invisible" data-scroller="habit-scroller" data-direction="-1">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M15 19l-7-7 7-7"></path></svg>
                            </button>

                            <!-- Tab Kategori -->
                            <div id="habit-scroller" class="flex-1 flex items-center space-x-2 overflow-x-auto horizontal-scroller snap-x scroll-smooth" data-tab-container>
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
                            </div>

                            <!-- Scroller Kanan -->
                            <button class="scroll-btn scroll-btn-right text-[#783D19]" data-scroller="habit-scroller" data-direction="1">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"></path></svg>
                            </button>
                        </div>

                        <!-- Tambah Habit -->
                        <button class="w-8 h-8 bg-[#783D19] text-[#FDFDD9] rounded-full text-2xl font-semibold shadow-md hover:bg-[#A07B5F] flex-shrink-0 flex items-center justify-center pb-0.5">+</button>
                    </div>

                    <!-- Panel Konten Habit -->
                    <div class="bg-[#8EB548] h-[265px] rounded-2xl shadow-lg p-4" data-panel-container>

                        <!-- Tab Semua (Default) -->
                        <div id="habit-semua" class="tab-panel">
                            <!-- List Item (Scrollable) -->
                            <div class="space-y-2 h-[200px] overflow-y-auto vertical-scroller pr-2">
                                <div class="bg-[#FDFDD9] rounded-2xl shadow h-auto flex items-center space-x-3 p-3">
                                    <input type="checkbox" class="custom-checkbox-main">
                                    <span class="flex-1 text-lg font-semibold text-[#783D19]">contoh harian</span>
                                    <div class="text-right">
                                        <p class="text-sm font-semibold text-[#783D19]">+ 3 xp</p>
                                        <p class="text-sm font-semibold text-[#783D19]">harian</p>
                                    </div>
                                    <button class="text-gray-500 hover:text-black">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path></svg>
                                    </button>
                                </div>
                                <div class="bg-[#FDFDD9] rounded-2xl shadow h-auto flex items-center space-x-3 p-3">
                                    <input type="checkbox" class="custom-checkbox-main">
                                    <span class="flex-1 text-lg font-semibold text-[#783D19]">contoh mingguan</span>
                                    <div class="text-right">
                                        <p class="text-sm font-semibold text-[#783D19]">+ 10 xp</p>
                                        <p class="text-sm font-semibold text-[#783D19]">mingguan</p>
                                    </div>
                                    <button class="text-gray-500 hover:text-black">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path></svg>
                                    </button>
                                </div>
                                <div class="bg-[#FDFDD9] rounded-2xl shadow h-auto flex items-center space-x-3 p-3">
                                    <input type="checkbox" class="custom-checkbox-main" checked>
                                    <span class="flex-1 text-lg font-semibold text-[#783D19]">contoh bulanan</span>
                                        <div class="text-right">
                                        <p class="text-sm font-semibold text-[#783D19]">+ 20 xp</p>
                                        <p class="text-sm font-semibold text-[#783D19]">bulanan</p>
                                    </div>
                                    <button class="text-gray-500 hover:text-black">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path></svg>
                                    </button>
                                </div>
                            </div>
                            <!-- Status -->
                            <p class="text-center text-base text-[#783D19] font-semibold mt-3">
                                2 belum diselesaikan
                            </p>
                        </div>

                        <!-- Tab Harian -->
                        <div id="habit-harian" class="tab-panel hidden">
                            <!-- List Item (Scrollable) -->
                            <div class="space-y-2 h-[200px] overflow-y-auto vertical-scroller pr-2">
                                <div class="bg-[#FDFDD9] rounded-2xl shadow h-auto flex items-center space-x-3 p-3">
                                    <input type="checkbox" class="custom-checkbox-main">
                                    <span class="flex-1 text-lg font-semibold text-[#783D19]">contoh harian</span>
                                    <div class="text-right">
                                        <p class="text-sm font-semibold text-[#783D19]">+ 3 xp</p>
                                        <p class="text-sm font-semibold text-[#783D19]">harian</p>
                                    </div>
                                    <button class="text-gray-500 hover:text-black">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path></svg>
                                    </button>
                                </div>
                            </div>
                            <!-- Status -->
                            <p class="text-center text-base text-[#783D19] font-semibold mt-3">
                                1 belum diselesaikan
                            </p>
                        </div>

                        <!-- Tab Mingguan (Kosong) -->
                        <div id="habit-mingguan" class="tab-panel hidden">
                            <p class="text-center text-[#783D19] py-8 text-lg">Belum ada habit mingguan.</p>
                        </div>

                        <!-- Tab Bulanan (Kosong) -->
                        <div id="habit-bulanan" class="tab-panel hidden">
                            <p class="text-center text-[#783D19] py-8 text-lg">Belum ada habit bulanan.</p>
                        </div>

                        <!-- Tab Kustom (Kosong) -->
                        <div id="habit-kustom" class="tab-panel hidden">
                            <p class="text-center text-[#783D19] py-8 text-lg">Belum ada habit kustom.</p>
                        </div>
                    </div>
                </div>

                <!-- Box Tugas -->
                <div data-tab-group="tugas">
                    <!-- Header (Judul, Tab Kategori, Tombol +) -->
                    <div class="flex items-center justify-between space-x-2">
                        <h2 class="text-3xl font-extrabold text-[#783D19] flex-shrink-0">Tugas</h2>
                        
                        <div class="flex-1 flex items-center overflow-hidden">
                            <!-- Scroller Kiri -->
                            <button class="scroll-btn scroll-btn-left text-[#783D19] opacity-0 invisible" data-scroller="tugas-scroller" data-direction="-1">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M15 19l-7-7 7-7"></path></svg>
                            </button>

                            <!-- Tab Kategori -->
                            <div id="tugas-scroller" class="flex-1 flex items-center space-x-2 overflow-x-auto horizontal-scroller snap-x scroll-smooth" data-tab-container>
                                <button data-tab-button="tugas-semua" class="tab-button snap-start flex-shrink-0 bg-[#C4661F] text-[#FDFDD9] shadow-md py-1 px-4 rounded-t-lg text-base font-semibold whitespace-nowrap">
                                    Semua
                                </button>
                                <button data-tab-button="tugas-hari-ini" class="tab-button snap-start flex-shrink-0 bg-[#FDFDD9] text-[#783D19] shadow-sm hover:bg-white py-1 px-4 rounded-t-lg text-base font-semibold whitespace-nowrap">
                                    Hari Ini
                                </button>
                                <button data-tab-button="tugas-besok" class="tab-button snap-start flex-shrink-0 bg-[#FDFDD9] text-[#783D19] shadow-sm hover:bg-white py-1 px-4 rounded-t-lg text-base font-semibold whitespace-nowrap">
                                    Besok
                                </button>
                            </div>

                            <!-- Scroller Kanan -->
                            <button class="scroll-btn scroll-btn-right text-[#783D19]" data-scroller="tugas-scroller" data-direction="1">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"></path></svg>
                            </button>
                        </div>

                        <!-- Tambah Tugas -->
                        <button class="w-8 h-8 bg-[#783D19] text-[#FDFDD9] rounded-full text-2xl font-semibold shadow-md hover:bg-[#A07B5F] flex-shrink-0 flex items-center justify-center pb-0.5">+</button>
                    </div>

                    <!-- Panel Konten Tugas -->
                    <div class="bg-[#C4661F] h-[265px] rounded-2xl shadow-lg p-4" data-panel-container>

                        <!-- Tab Semua (Default) -->
                        <div id="tugas-semua" class="tab-panel">
                            <!-- List Item (Scrollable) -->
                            <div class="space-y-2 h-[200px] overflow-y-auto vertical-scroller pr-2">
                                <div class="bg-[#FDFDD9] rounded-2xl shadow h-auto flex items-center space-x-3 p-3">
                                    <input type="checkbox" class="custom-checkbox-main">
                                    <span class="flex-1 text-lg font-semibold text-[#783D19]">Tugas DABD</span>
                                    <div class="text-right">
                                        <p class="text-sm font-semibold text-[#783D19]">20/10/2025</p>
                                        <p class="text-sm font-semibold text-[#783D19]">23:59</p>
                                    </div>
                                    <button class="text-gray-500 hover:text-black">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path></svg>
                                    </button>
                                </div>
                                <div class="bg-[#FDFDD9] rounded-2xl shadow h-auto flex items-center space-x-3 p-3">
                                    <input type="checkbox" class="custom-checkbox-main">
                                    <span class="flex-1 text-lg font-semibold text-[#783D19]">Tugas TCBA</span>
                                    <div class="text-right">
                                        <p class="text-sm font-semibold text-[#783D19]">21/10/2025</p>
                                        <p class="text-sm font-semibold text-[#783D19]">23:59</p>
                                    </div>
                                    <button class="text-gray-500 hover:text-black">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path></svg>
                                    </button>
                                </div>
                            </div>
                            <!-- Status -->
                            <p class="text-center text-base text-[#FDFDD9] font-semibold mt-3">
                                2 belum diselesaikan
                            </p>
                        </div>

                        <!-- Tab Hari Ini (Kosong) -->
                        <div id="tugas-hari-ini" class="tab-panel hidden">
                            <p class="text-center text-[#FDFDD9] py-8 text-lg">Tidak ada tugas hari ini.</p>
                        </div>

                        <!-- Tab Besok (Kosong) -->
                        <div id="tugas-besok" class="tab-panel hidden">
                            <p class="text-center text-[#FDFDD9] py-8 text-lg">Tidak ada tugas untuk besok.</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </main>
    
</body>
</html>