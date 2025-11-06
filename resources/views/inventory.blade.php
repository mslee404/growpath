<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GrowPath - Inventory</title>
    @vite(['resources/css/app.css', 'resources/css/inventory-style.css','resources/js/app.js', 'resources/js/inventory.js'])
</head>

<body style="background-image: url('{{ asset('images/Background.svg') }}'); background-repeat: repeat; background-size: auto;" class="min-h-screen">

    <nav class="bg-[#78A44C] text-white font-bold shadow-lg">
        <div class="container mx-auto px-6 py-3 flex justify-between items-center">
            <a href="#" class="text-3xl font-black tracking-tight">GROWPATH</a>
            
            <div class="flex items-center space-x-8">
                <a href="#" class="flex items-center space-x-2 opacity-70 hover:opacity-100">
                    <span class="text-lg">HOME</span>
                    <svg class="w-8 h-8 p-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                </a>
                
                <a href="#" class="flex items-center space-x-2">
                    <span class="text-lg">INVENTORY</span>
                    <div class="bg-black/30 rounded-lg">
                        <svg class="w-8 h-8 p-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-2m-4-1v8m0 0l3-3m-3 3L9 8m-5 5h2.553C8.188 13 9 13.81 9 14.857V17m8-4h-2.553C14.812 13 14 13.81 14 14.857V17"></path></svg>
                    </div>
                </a>

                <a href="#" class="flex items-center space-x-2 opacity-70 hover:opacity-100">
                    <span class="text-lg">MARKET</span>
                    <svg class="w-8 h-8 p-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </a>
                
                <a href="#" class="flex items-center space-x-2 opacity-70 hover:opacity-100">
                    <span class="text-lg">LEADERBOARD</span>
                    <svg class="w-8 h-8 p-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.653-.08-1.285-.23-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.653.08-1.285.23-1.857m0 0A3.004 3.004 0 007 16c0-1.657-1.343-3-3-3S1 14.343 1 16s1.343 3 3 3c.621 0 1.19-.186 1.644-.5M17 16c0-1.657 1.343-3 3-3s3 1.343 3 3-1.343 3-3 3c-.621 0-1.19-.186-1.644-.5M12 8c0-1.657 1.343-3 3-3s3 1.343 3 3-1.343 3-3 3-3-1.343-3-3zM6 8c0-1.657 1.343-3 3-3s3 1.343 3 3-1.343 3-3 3-3-1.343-3-3z"></path></svg>
                </a>
                
                <a href="#" class="flex items-center space-x-2 opacity-70 hover:opacity-100">
                    <span class="text-lg">PROFILE</span>
                    <svg class="w-8 h-8 p-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                </a>
            </div>
        </div>
    </nav>
    <main class="container mx-auto p-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <div class="lg:col-span-1 flex flex-col items-center">
                <h2 class="text-dark-green font-bold text-3xl mb-6">INVENTORY</h2>

                <div class="bg-[#F5F5DC] p-6 rounded-2xl shadow-xl w-full max-w-md text-center">
                    <div id="item-detail-image" class="w-52 h-52 bg-gray-300 mx-auto mb-6 border-8 border-green-900/60 flex items-center justify-center overflow-hidden">
                        <span class="text-gray-500">Gambar Item</span>
                    </div>
                    
                    <h2 id="item-detail-name" class="text-3xl font-bold text-gray-800">[Nama Item]</h2>
                    <p id="item-detail-desc" class="text-gray-600 text-lg mt-2">Deskripsi singkat item ada di sini.</p>
                </div>
                
                <button class="mt-8 bg-[#F5F5DC] border-2 border-gray-400 px-12 py-3 rounded-lg font-bold text-xl text-gray-800 shadow-md hover:bg-white transition-all">
                    Pakai
                </button>
            </div>
            
            <div class="lg:col-span-2">
                
                <div class="relative z-10 flex border-b-0">
                    <button class="tab-button flex-1 px-4 py-3 rounded-t-lg font-bold text-lg tab-active bg-[#F5F5DC] text-[#5E7153] relative z-[2] -mb-px" data-tab-target="#avatar-panel">
                        Avatar
                    </button>
                    <button class="tab-button flex-1 px-4 py-3 rounded-t-lg font-bold text-lg bg-[#5E7153] text-[#F5F5DC] hover:bg-[#A9B489] relative z-[1]" data-tab-target="#frame-panel">
                        Avatar Frame
                    </button>
                    <button class="tab-button flex-1 px-4 py-3 rounded-t-lg font-bold text-lg bg-[#5E7153] text-[#F5F5DC] hover:bg-[#A9B489] relative z-[1]" data-tab-target="#tanaman-panel">
                        Tanaman
                    </button>
                    <button class="tab-button flex-1 px-4 py-3 rounded-t-lg font-bold text-lg bg-[#5E7153] text-[#F5F5DC] hover:bg-[#A9B489] relative z-[1]" data-tab-target="#background-panel">
                        Background
                    </button>
                </div>

                <div class="bg-[#F5F5DC] p-6 rounded-b-2xl rounded-tr-2xl shadow-xl w-full min-h-[500px]">
                    
                    <div id="avatar-panel" class="tab-content">
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-6 p-4">
                            
                            <div 
                            class="item-card bg-[#ADC698] rounded-xl shadow-lg p-3 cursor-pointer border-4 border-transparent hover:border-green-800"
                            data-item='{
                                "name": "Dewa Petir", 
                                "desc": "Avatar spesial Dewa Petir (Zenitsu)", 
                                "image": "{{ asset('images/2.png') }}"
                            }'>
                                
                                <div class="bg-[#5D7B54] text-white text-center py-2 font-bold text-lg rounded-t-lg">
                                    Dewa Petir
                                </div>
                                <div class="bg-[#DDEFFB] p-4 rounded-b-lg">
                                    <img src="{{ asset('images/2.png') }}" alt="Dewa Petir" class="w-full h-auto object-cover">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div id="frame-panel" class="tab-content hidden">
                        <p>Kamu belum punya avatar frame :(</p>
                    </div>
                    
                    <div id="tanaman-panel" class="tab-content hidden">
                        <p>Kamu belum punya tanaman custom :(</p>
                    </div>
                    
                    <div id="background-panel" class="tab-content hidden">
                        <p>Kamu belum punya background custom :(</p>
                    </div>
                </div>            
        </div>
    </main>
    
</body>
</html>