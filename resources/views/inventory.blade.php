<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GrowPath - Inventory</title>
    @vite(['resources/css/app.css', 'resources/css/inventory-style.css','resources/js/app.js', 'resources/js/inventory.js'])
</head>

<body>
<<<<<<< HEAD
    <header>
        <div class="navigation-container">
            <a class="growpath-logo">GROWPATH</a>
=======
    <nav class="bg-[#78A44C] text-white font-bold shadow-lg">
        <div class="container mx-auto px-8 py-4 flex justify-between items-center">
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
>>>>>>> 1f59aa86483061f0fa11a84bcdc629b02bcaaacb

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

                <h2 class="inventory-title">INVENTORY</h2>

                <div class="item-detail-card w-full max-w-md text-center">
                    
                    <div id="item-detail-image" class="item-detail-image-wrapper mx-auto mb-6 flex items-center justify-center overflow-hidden">
                        <span>Gambar Item</span>
                    </div>
                    
                    <h2 id="item-detail-name" class="item-detail-name">[Nama Item]</h2>
                    <p id="item-detail-desc" class="item-detail-desc">Deskripsi singkat item ada di sini.</p>
                </div>

                <button class="btn-pakai mt-8">Pakai</button>
            </div>
            
            <div class="lg:col-span-2">
                
                <div class="tab-nav relative z-10 flex border-b-0">
                    <button class="tab-button flex-1 tab-active" data-tab-target="#avatar-panel">Avatar</button>
                    <button class="tab-button flex-1" data-tab-target="#frame-panel">Avatar Frame</button>
                    <button class="tab-button flex-1" data-tab-target="#tanaman-panel">Tanaman</button>
                    <button class="tab-button flex-1" data-tab-target="#background-panel">Background</button>
                </div>

                <div class="tab-content-wrapper w-full min-h-[500px]">
                    
                    <div id="avatar-panel" class="tab-content">
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-6 p-4">
                            <div 
                                class="item-card"
                                data-item='{
                                    "name": "Dewa Petir", 
                                    "desc": "Avatar spesial Dewa Petir (Zenitsu)", 
                                    "image": "{{ asset('images/2.png') }}"
                                }'>
                                
                                <div class="item-card-header">Dewa Petir</div>
                                
                                <div class="item-card-image-container">
                                    <img src="{{ asset('images/2.png') }}" alt="Dewa Petir" class="item-card-image">
                                </div>

                            </div>
                        </div>
                    </div>

                    <div id="frame-panel" class="tab-content hidden">
                        <p class="empty-state-text">Kamu belum punya avatar frame :(</p>
                    </div>
                    
                    <div id="tanaman-panel" class="tab-content hidden">
                        <p class="empty-state-text">Kamu belum punya tanaman custom :(</p>
                    </div>
                    
                    <div id="background-panel" class="tab-content hidden">
                        <p class="empty-state-text">Kamu belum punya background custom :(</p>
                    </div>
                </div>              
            </div>
        </div>
    </main>
    
</body>
</html>