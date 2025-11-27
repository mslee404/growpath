@php
    // Simulasi data Avatar yang dimiliki user
    $my_avatars = [
        [
            'name'  => 'Dewa Petir',
            'desc'  => 'Avatar spesial Dewa Petir (Zenitsu mode tidur)',
            'image' => 'images/2.png' // Pastikan path gambarnya sesuai
        ],
        [
            'name'  => 'Gak kenal',
            'desc'  => 'Pernapasan Air teknik ke-10: Naga Perubahan',
            'image' => 'images/3.svg' 
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
        ],
        [
            'name'  => 'Dewa Petir',
            'desc'  => 'Avatar spesial Dewa Petir (Zenitsu mode tidur)',
            'image' => 'images/2.png' // Pastikan path gambarnya sesuai
        ],
        [
            'name'  => 'Gak kenal',
            'desc'  => 'Pernapasan Air teknik ke-10: Naga Perubahan',
            'image' => 'images/3.svg' 
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
        ],
    ];
@endphp

<x-layout>
    <x-slot:title>Inventory</x-slot:title>
    
    <x-slot:assets>
        @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/inventory.js'])
    </x-slot:assets>

    <x-navbar activePage="inventory" />
        
    <main class="container mx-auto p-8 max-w-7xl mt-7">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <div class="lg:col-span-1 flex flex-col items-center">

                <h2 class="text-[#5E7153] font-bold text-[2.5rem] leading-9 mb-6 text-center">
                    INVENTORY
                </h2>

                <div class="bg-[#F5F5DC] p-11 rounded-2xl shadow-lg text-center w-full max-w-md">
                    
                    <div id="item-detail-image" class="w-52 h-52 bg-gray-300 border-[8px] border-[#265c3c99] mx-auto mb-6 flex items-center justify-center overflow-hidden">
                        <span class="text-gray-500">Gambar Item</span>
                    </div>
                    
                    <h2 id="item-detail-name" class="text-[1.875rem] leading-9 font-bold text-[#5E7153]">
                        [Nama Item]
                    </h2>
                    <p id="item-detail-desc" class="text-[#5E7153] text-lg mt-2 leading-7">
                        Deskripsi singkat item ada di sini.
                    </p>
                </div>

                <button class="mt-8 bg-[#F5F5DC] shadow-lg px-12 py-3 rounded-lg font-bold text-xl text-[#5E7153] shadow-md hover:bg-white transition-all duration-300">
                    Pakai
                </button>
            </div>
            
            <div class="lg:col-span-2">
                
                <div class="flex relative z-10 border-b-0">
                    <button class="tab-button flex-1 py-3 px-4 rounded-t-lg font-bold text-lg relative cursor-pointer bg-[#F5F5DC] text-[#5E7153] z-20 -mb-[2px]" data-tab-target="#avatar-panel">
                        Avatar
                    </button>
                    <button class="tab-button flex-1 py-3 px-4 rounded-t-lg font-bold text-lg relative cursor-pointer bg-[#5E7153] text-[#F5F5DC] z-10" data-tab-target="#frame-panel">
                        Avatar Frame
                    </button>
                    <button class="tab-button flex-1 py-3 px-4 rounded-t-lg font-bold text-lg relative cursor-pointer bg-[#5E7153] text-[#F5F5DC] z-10" data-tab-target="#tanaman-panel">
                        Tanaman
                    </button>
                    <button class="tab-button flex-1 py-3 px-4 rounded-t-lg font-bold text-lg relative cursor-pointer bg-[#5E7153] text-[#F5F5DC] z-10" data-tab-target="#background-panel">
                        Background
                    </button>
                </div>

                <div class="bg-[#F5F5DC] p-6 rounded-b-2xl shadow-lg w-full min-h-[500px]">
                    
                    <div id="avatar-panel" class="tab-content">
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 p-4">
                            
                            {{-- MULAI LOOPING: Cukup tulis kodingan card 1 kali saja --}}
                            @foreach($my_avatars as $avatar)
                                <div 
                                    class="item-card bg-[#ADC698] rounded-xl shadow-md cursor-pointer overflow-hidden transition-all hover:shadow-lg"
                                    {{-- Kita masukkan data PHP ke dalam atribut HTML agar bisa dibaca JS --}}
                                    data-item='{{ json_encode($avatar) }}'>
                                    
                                    {{-- Judul --}}
                                    <div class="bg-[#5E7153] text-white text-center py-2 font-bold text-lg leading-7">
                                        {{ $avatar['name'] }}
                                    </div>
                                    
                                    {{-- Gambar --}}
                                    <div class="p-4">
                                        {{-- asset() membungkus path gambar agar link-nya benar --}}
                                        <img src="{{ asset($avatar['image']) }}" alt="{{ $avatar['name'] }}" class="w-full h-auto object-cover rounded-lg aspect-square">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div id="frame-panel" class="tab-content hidden">
                        <p class="pt-48 text-xl text-[#5E7153] text-center">
                            Kamu belum punya avatar frame :(
                        </p>
                    </div>
                    
                    <div id="tanaman-panel" class="tab-content hidden">
                        <p class="pt-48 text-xl text-[#5E7153] text-center">
                            Kamu belum punya tanaman custom :(
                        </p>
                    </div>
                    
                    <div id="background-panel" class="tab-content hidden">
                        <p class="pt-48 text-xl text-[#5E7153] text-center">
                            Kamu belum punya background custom :(
                        </p>
                    </div>

                </div>              
            </div>
        </div>
    </main>
</x-layout>