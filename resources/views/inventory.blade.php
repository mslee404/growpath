@php
    // Simulasi data Avatar yang dimiliki user
    $my_avatars = [
        [
            'name'  => 'Kakek Petani',
            'desc'  => 'Merawat tanaman seperti cucu sendiri',
            'image' => 'images/1-pakde.svg' // Pastikan path gambarnya sesuai
        ],
        [
            'name'  => 'Bude',
            'desc'  => 'Merawat tanaman seperti cucu sendiri',
            'image' => 'images/4-mbokde.svg' 
        ],
        [
            'name'  => 'Anya',
            'desc'  => 'peanut',
            'image' => 'images/7-anya.svg' 
        ],
        [
            'name'  => 'Super Idol',
            'desc'  => 'Won Forever Young',
            'image' => 'images/8-wony.svg' 
        ]
    ];
    $frame = [
        [
            'name' => 'Apple Frame',
            'type' => 'Frame',
            'desc' => 'Frame apel apel emas',
            'image' => asset('images/Apple.svg'),
            'price' => '7500' 
        ]
    ];
    $plant = [
        [
            'name' => 'Buah Naga',
            'type' => 'Plant',
            'desc' => 'Buah naga merah yang segar dan manis (kayanya)',
            'image' => asset('images/Dragon fruit.svg'),
            'price' => '10000' 
        ]
    ];
    $background = [];
@endphp

<x-layout>
    <x-slot:title>Inventory</x-slot:title>
    
    <x-slot:assets>
        @vite(['resources/css/app.css', 'resources/js/item-box.js', 'resources/js/app.js', 'resources/js/inventory.js'])
    </x-slot:assets>

    <x-navbar activePage="inventory" />
        
    {{-- UBAH 1: Samakan container utama dengan Shop (max-w-[90%]) --}}
    <main class="container mx-auto px-0 max-w-[90%] py-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 justify-between">
            
            <div class="lg:col-span-1 flex flex-col items-center">
                
                {{-- Header Judul --}}
                <div class="flex justify-center items-center max-w-md h-[3rem] mb-4 w-full px-2">
                    <span class="text-[#5E7153] font-bold text-[2.5rem] leading-none">INVENTORY</span>
                </div>

                {{-- Kotak Detail (Style Copy-Paste dari Shop) --}}
                {{-- Menggunakan bg-[#FDFDD9] dan padding/rounded yang sama --}}
                <div class="bg-[#FDFDD9] p-8 rounded-[1rem] shadow-lg w-full max-w-md flex flex-col items-center justify-between h-[430px]">
                    
                    {{-- Container Gambar --}}
                    <div class="w-full flex flex-col items-center">
                        <div id="item-detail-image" class="w-[13rem] h-[13rem] flex items-center justify-center overflow-hidden mb-4 rounded-[10px] bg-black/5">
                            <span class="text-[#5E7153] opacity-50 font-bold">Pilih item</span>
                        </div>
                        
                        {{-- Nama Item: Tinggi dikunci, teks truncate biar ga turun baris --}}
                        <p id="item-detail-name" class="font-bold text-2xl text-[#5E7153] mb-2 text-center truncate w-full px-4 h-[2.5rem] flex items-center justify-center">
                            [Nama Item]
                        </p>
                    </div>
                    <div class="w-full h-[4.5rem] flex items-start justify-center overflow-y-auto px-2 custom-scrollbar">
                        <span id="item-detail-desc" class="text-[1rem] leading-6 font-normal text-[#5E7153] text-center block">
                            Deskripsi item akan muncul di sini.
                        </span>
                    </div>
                    
                </div>

                {{-- Tombol Pakai --}}
                <button id="btn-use" class="bg-[#FDFDD9] w-[125px] py-3 rounded-md font-bold text-xl leading-7 text-[#5E7153] shadow-md transition-all duration-300 ease-in-out cursor-pointer mt-4 hover:scale-105 hover:shadow-lg active:scale-95">
                    Pakai
                </button>
            </div>
            
            <div class="lg:col-span-2">
                
                {{-- NAVIGASI TAB --}}
                <div class="tab-nav relative z-10 flex border-b-0">
                    <button class="tab-button flex-1 py-3 px-4 rounded-t-lg font-bold text-lg relative cursor-pointer tab-active bg-[#FDFDD9] text-[#5E7153] z-20 -mb-[2px]" data-tab-target="#avatar-panel">
                        Avatar
                    </button>
                    <button class="tab-button flex-1 py-3 px-4 rounded-t-lg font-bold text-lg relative cursor-pointer bg-[#5E7153] text-[#FDFDD9] z-10" data-tab-target="#frame-panel">
                        Avatar Frame
                    </button>
                    <button class="tab-button flex-1 py-3 px-4 rounded-t-lg font-bold text-lg relative cursor-pointer bg-[#5E7153] text-[#FDFDD9] z-10" data-tab-target="#tanaman-panel">
                        Tanaman
                    </button>
                    <button class="tab-button flex-1 py-3 px-4 rounded-t-lg font-bold text-lg relative cursor-pointer bg-[#5E7153] text-[#FDFDD9] z-10" data-tab-target="#background-panel">
                        Background
                    </button>
                </div>

                {{-- ISI KONTEN (Panggil Component x-item-box) --}}
                <div class="bg-[#FDFDD9] p-6 rounded-b-2xl shadow-lg w-full min-h-[500px]">
                    
                    <div id="avatar-panel" class="tab-content">
                        <x-item-box :items="$my_avatars" emptyMessage="Kamu belum punya avatar custom :(" />
                    </div>

                    <div id="frame-panel" class="tab-content hidden">
                        <x-item-box :items="$frame" emptyMessage="Kamu belum punya frame custom :(" />
                    </div>
                    
                    <div id="tanaman-panel" class="tab-content hidden">
                        <x-item-box :items="$plant" emptyMessage="Kamu belum punya tanaman custom :(" />
                    </div>
                    
                    <div id="background-panel" class="tab-content hidden">
                        <x-item-box :items="$background" emptyMessage="Kamu belum punya background custom :(" />
                    </div>

                </div>              
            </div>
        </div>
    </main>
    
    <x-slot:popups>
        @include('popup.inventory-use')
    </x-slot:popups>
</x-layout>