<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GrowPath - Inventory</title>
    @vite(['resources/css/app.css', 'resources/css/inventory-style.css','resources/js/app.js', 'resources/js/inventory.js'])
</head>

<body>
    <header>
        <div class="navigation-container">
            <a class="growpath-logo">GROWPATH</a>

            <nav class="navigation-bar">
                <ul>
                    <li><a href="/dashboard">HOME</a></li>
                    <li><a href="/habits">INVENTORY</a></li>
                    <li><a href="/shop">MARKET</a></li>
                    <li><a href="/profile">LEADERBOARD</a></li>
                    <li><a href="/profile">PROFILE</a></li>
                </ul>
            </nav>
        </div>
    </header>
    
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