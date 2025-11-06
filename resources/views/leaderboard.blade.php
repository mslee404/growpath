<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GrowPath - Leaderboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js']) 
</head>

<body class="bg-[#F0F5E8]"> <!-- Memberi background hijau muda seperti di screenshot -->
    
    <!-- Navbar - disalin dari inventory.html dan di-update link aktifnya -->
    <!-- Menggunakan arbitrary value class bg-[#78A44C] -->
    <nav class="bg-[#78A44C] text-white font-bold shadow-lg">
        <div class="container mx-auto px-6 py-3 flex justify-between items-center">
            <a href="#" class="text-3xl font-black tracking-tight">GROWPATH</a>
            
            <div class="flex items-center space-x-8">
                <!-- Link Home (Inactive) -->
                <a href="#" class="flex items-center space-x-2 opacity-70 hover:opacity-100">
                    <span class="text-lg">HOME</span>
                    <svg class="w-8 h-8 p-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                </a>
                
                <!-- Link Inventory (Inactive) -->
                <a href="#" class="flex items-center space-x-2 opacity-70 hover:opacity-100">
                    <span class="text-lg">INVENTORY</span>
                    <svg class="w-8 h-8 p-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-2m-4-1v8m0 0l3-3m-3 3L9 8m-5 5h2.553C8.188 13 9 13.81 9 14.857V17m8-4h-2.553C14.812 13 14 13.81 14 14.857V17"></path></svg>
                </a>

                <!-- Link Market (Inactive) -->
                <a href="#" class="flex items-center space-x-2 opacity-70 hover:opacity-100">
                    <span class="text-lg">MARKET</span>
                    <svg class="w-8 h-8 p-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </a>
                
                <!-- Link Leaderboard (Active) -->
                <a href="#" class="flex items-center space-x-2">
                    <span class="text-lg">LEADERBOARD</span>
                    <div class="bg-black/30 rounded-lg">
                        <svg class="w-8 h-8 p-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.653-.08-1.285-.23-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.653.08-1.285.23-1.857m0 0A3.004 3.004 0 007 16c0-1.657-1.343-3-3-3S1 14.343 1 16s1.343 3 3 3c.621 0 1.19-.186 1.644-.5M17 16c0-1.657 1.343-3 3-3s3 1.343 3 3-1.343 3-3 3c-.621 0-1.19-.186-1.644-.5M12 8c0-1.657 1.343-3 3-3s3 1.343 3 3-1.343 3-3 3-3-1.343-3-3zM6 8c0-1.657 1.343-3 3-3s3 1.343 3 3-1.343 3-3 3-3-1.343-3-3z"></path></svg>
                    </div>
                </a>
                
                <!-- Link Profile (Inactive) -->
                <a href="#" class="flex items-center space-x-2 opacity-70 hover:opacity-100">
                    <span class="text-lg">PROFILE</span>
                    <svg class="w-8 h-8 p-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container mx-auto p-8">
        
        <!-- Judul Halaman -->
        <!-- Menggunakan arbitrary value class text-[#5E7153] -->
        <h1 class="text-4xl font-black text-center text-[#5E7153] mb-8 uppercase tracking-wide">
            Leaderboard
        </h1>

        <!-- Kontainer Utama Leaderboard -->
        <!-- Menggunakan arbitrary value class bg-[#F5F5DC] -->
        <div class="bg-[#F5F5DC] rounded-2xl shadow-xl p-6 md:p-8">
            <div class="flex flex-col lg:flex-row gap-8">
                
                <!-- Bagian Kiri: Top 3 Podium -->
                <div class="flex-1 flex justify-center items-end gap-3 lg:gap-4">
                    
                    <!-- Peringkat 2: Silver -->
                    <div class="w-1/3 relative">
                        <!-- Menggunakan arbitrary value class bg-[#C9D8BF] -->
                        <div class="bg-[#C9D8BF] rounded-t-xl shadow-lg h-[300px] flex flex-col justify-start p-3 pt-8 items-center">
                            <!-- Medali -->
                            <!-- Menggunakan arbitrary value class bg-[#C0C0C0] (Silver) -->
                            <div class="absolute -top-5 left-1/2 -translate-x-1/2 w-12 h-12 bg-[#C0C0C0] rounded-full flex items-center justify-center text-white font-bold text-2xl border-4 border-[#F5F5DC] shadow-md">
                                2
                            </div>
                            <!-- Nama -->
                            <!-- Menggunakan arbitrary value class bg-[#5E7153] -->
                            <div class="bg-[#5E7153] text-white font-bold py-1 px-4 rounded-md text-center text-sm md:text-base shadow-md">
                                My Istri
                            </div>
                            <!-- Avatar -->
                            <img src="https://placehold.co/112x112/E4E4E7/71717A?text=M" alt="Avatar My Istri" class="w-20 h-20 md:w-28 md:h-28 rounded-full border-4 border-white shadow-md my-4 object-cover"
                                 onerror="this.src='https://placehold.co/112x112/E4E4E7/71717A?text=M'">
                            <!-- XP -->
                            <span class="font-bold text-lg text-center text-gray-800 mt-auto">200006 xp</span>
                        </div>
                    </div>
                    
                    <!-- Peringkat 1: Gold -->
                    <div class="w-1/3 relative">
                        <!-- Menggunakan arbitrary value class bg-[#C9D8BF] -->
                        <div class="bg-[#C9D8BF] rounded-t-xl shadow-lg h-[370px] flex flex-col justify-start p-3 pt-8 items-center">
                            <!-- Medali -->
                            <!-- Menggunakan arbitrary value class bg-[#FFD700] (Gold) -->
                            <div class="absolute -top-6 left-1/2 -translate-x-1/2 w-14 h-14 bg-[#FFD700] rounded-full flex items-center justify-center text-white font-bold text-3xl border-4 border-[#F5F5DC] shadow-md">
                                1
                            </div>
                            <!-- Nama -->
                            <!-- Menggunakan arbitrary value class bg-[#5E7153] -->
                            <div class="bg-[#5E7153] text-white font-bold py-1 px-5 rounded-md text-center text-sm md:text-base shadow-md">
                                Rahmat
                            </div>
                            <!-- Avatar -->
                            <img src="https://placehold.co/128x128/E4E4E7/71717A?text=R" alt="Avatar Rahmat" class="w-24 h-24 md:w-32 md:h-32 rounded-full border-4 border-white shadow-md my-5 object-cover"
                                 onerror="this.src='https://placehold.co/128x128/E4E4E7/71717A?text=R'">
                            <!-- XP -->
                            <span class="font-bold text-lg text-center text-gray-800 mt-auto">300007 xp</span>
                        </div>
                    </div>

                    <!-- Peringkat 3: Bronze -->
                    <div class="w-1/3 relative">
                        <!-- Menggunakan arbitrary value class bg-[#C9D8BF] -->
                        <div class="bg-[#C9D8BF] rounded-t-xl shadow-lg h-[250px] flex flex-col justify-start p-3 pt-8 items-center">
                            <!-- Medali -->
                            <!-- Menggunakan arbitrary value class bg-[#CD7F32] (Bronze) -->
                            <div class="absolute -top-4 left-1/2 -translate-x-1/2 w-10 h-10 bg-[#CD7F32] rounded-full flex items-center justify-center text-white font-bold text-xl border-4 border-[#F5F5DC] shadow-md">
                                3
                            </div>
                            <!-- Nama -->
                            <!-- Menggunakan arbitrary value class bg-[#5E7153] -->
                            <div class="bg-[#5E7153] text-white font-bold py-1 px-4 rounded-md text-center text-sm md:text-base shadow-md">
                                Gwejh
                            </div>
                            <!-- Avatar -->
                            <img src="https://placehold.co/96x96/E4E4E7/71717A?text=G" alt="Avatar Gwejh" class="w-16 h-16 md:w-24 md:h-24 rounded-full border-4 border-white shadow-md my-3 object-cover"
                                 onerror="this.src='https://placehold.co/96x96/E4E4E7/71717A?text=G'">
                            <!-- XP -->
                            <span class="font-bold text-lg text-center text-gray-800 mt-auto">200000 xp</span>
                        </div>
                    </div>

                </div>

                <!-- Bagian Kanan: List Peringkat 4+ -->
                <div class="flex-1 flex flex-col gap-3">
                    
                    <!-- Item Peringkat -->
                    <div class="flex items-center justify-between bg-[#FEFEF9] rounded-xl shadow border border-gray-200 p-3">
                        <div class="flex items-center gap-3">
                            <span class="text-xl font-bold text-gray-500 w-8 text-center">4</span>
                            <img src="https://placehold.co/48x48/E4E4E7/71717A?text=F" alt="Avatar flawer" class="w-12 h-12 rounded-full border-2 border-gray-300 object-cover"
                                 onerror="this.src='https://placehold.co/48x48/E4E4E7/71717A?text=F'">
                            <span class="font-semibold text-lg text-gray-800">flawer</span>
                        </div>
                        <!-- Menggunakan arbitrary value class text-[#5E7153] -->
                        <span class="text-lg font-bold text-[#5E7153] pr-2">198765 xp</span>
                    </div>
                    
                    <!-- Item Peringkat -->
                    <div class="flex items-center justify-between bg-[#FEFEF9] rounded-xl shadow border border-gray-200 p-3">
                        <div class="flex items-center gap-3">
                            <span class="text-xl font-bold text-gray-500 w-8 text-center">5</span>
                            <img src="https://placehold.co/48x48/E4E4E7/71717A?text=F" alt="Avatar flawer" class="w-12 h-12 rounded-full border-2 border-gray-300 object-cover"
                                 onerror="this.src='https://placehold.co/48x48/E4E4E7/71717A?text=F'">
                            <span class="font-semibold text-lg text-gray-800">flawer</span>
                        </div>
                        <!-- Menggunakan arbitrary value class text-[#5E7153] -->
                        <span class="text-lg font-bold text-[#5E7153] pr-2">198765 xp</span>
                    </div>

                    <!-- Item Peringkat -->
                    <div class="flex items-center justify-between bg-[#FEFEF9] rounded-xl shadow border border-gray-200 p-3">
                        <div class="flex items-center gap-3">
                            <span class="text-xl font-bold text-gray-500 w-8 text-center">6</span>
                            <img src="https://placehold.co/48x48/E4E4E7/71717A?text=G" alt="Avatar user" class="w-12 h-12 rounded-full border-2 border-gray-300 object-cover"
                                 onerror="this.src='https://placehold.co/48x48/E4E4E7/71717A?text=G'">
                            <span class="font-semibold text-lg text-gray-800">flawer</span>
                        </div>
                        <!-- Menggunakan arbitrary value class text-[#5E7153] -->
                        <span class="text-lg font-bold text-[#5E7153] pr-2">198765 xp</span>
                    </div>

                    <!-- Item Peringkat -->
                    <div class="flex items-center justify-between bg-[#FEFEF9] rounded-xl shadow border border-gray-200 p-3">
                        <div class="flex items-center gap-3">
                            <span class="text-xl font-bold text-gray-500 w-8 text-center">7</span>
                            <img src="https://placehold.co/48x48/E4E4E7/71717A?text=H" alt="Avatar user" class="w-12 h-12 rounded-full border-2 border-gray-300 object-cover"
                                 onerror="this.src='https://placehold.co/48x48/E4E4E7/71717A?text=H'">
                            <span class="font-semibold text-lg text-gray-800">flawer</span>
                        </div>
                        <!-- Menggunakan arbitrary value class text-[#5E7153] -->
                        <span class="text-lg font-bold text-[#5E7153] pr-2">198765 xp</span>
                    </div>

                    <!-- Item Peringkat -->
                    <div class="flex items-center justify-between bg-[#FEFEF9] rounded-xl shadow border border-gray-200 p-3">
                        <div class="flex items-center gap-3">
                            <span class="text-xl font-bold text-gray-500 w-8 text-center">8</span>
                            <img src="https://placehold.co/48x48/E4E4E7/71717A?text=I" alt="Avatar user" class="w-12 h-12 rounded-full border-2 border-gray-300 object-cover"
                                 onerror="this.src='https://placehold.co/48x48/E4E4E7/71717A?text=I'">
                            <span class="font-semibold text-lg text-gray-800">flawer</span>
                        </div>
                        <!-- Menggunakan arbitrary value class text-[#5E7153] -->
                        <span class="text-lg font-bold text-[#5E7153] pr-2">198765 xp</span>
                    </div>

                </div>
            </div>
        </div>
    </main>
    
</body>
</html>