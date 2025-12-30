<x-layout>
    <x-slot:title>Shop</x-slot:title>

    <x-slot:assets>
        {{-- Load CSS & JS yang sudah disatukan --}}
        @vite(['resources/js/shop.js', 'resources/js/item-box.js', 'resources/js/app.js', 'resources/css/app.css'])
    </x-slot:assets>

    <x-navbar activePage="shop" />

    <div class="container mx-auto px-0 max-w-[90%] py-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 justify-between">
            
            <div class="lg:col-span-1 flex flex-col items-center">
                
                {{-- Header Market & Gold --}}
                <div class="flex justify-between items-center max-w-md h-[3rem] gap-6 mb-4 w-full px-2">
                    <span class="text-[#5E7153] font-bold text-[2.5rem] leading-none">MARKET</span>

                    <div class="flex bg-[#FDFDD9] rounded-[15px] px-4 w-[140px] h-[40px] justify-between items-center shadow-sm">
                        <span id="gold-amount" class="text-[#5E7153] text-lg font-bold truncate">{{ $userGold ?? 0 }}</span>
                        <img src="/images/Gold.svg" alt="Gold Coin" class="w-6 h-6 object-contain ml-2"/>
                    </div>
                </div>

                {{-- Kotak Detail --}}
                <div class="bg-[#FDFDD9] p-8 rounded-[1rem] shadow-lg w-full max-w-md flex flex-col items-center justify-between h-[430px]">
                    
                    {{-- Container Gambar Detail --}}
                    {{-- JS akan mencari ID 'item-detail-image' dan mengganti isinya --}}
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
            
                    {{-- Bagian Bawah: Harga --}}
                    <div class="h-[2rem] flex items-center justify-center w-full mt-2">
                        <span id="item-detail-price" class="text-[1.5rem] font-bold text-[#5E7153]">
                            [Harga Item] </span>
                    </div>

                </div>

                <button id="btn-buy" class="bg-[#FDFDD9] w-[125px] py-3 rounded-md font-bold text-xl leading-7 text-[#5E7153] shadow-md transition-all duration-300 ease-in-out cursor-pointer mt-4 hover:scale-105 hover:shadow-lg active:scale-95">
                    Beli
                </button>
            </div>

            <div class="lg:col-span-2">

                {{-- NAVIGASI TAB (Manual HTML sesuai request) --}}
                <div class="tab-nav relative z-10 flex border-b-0 rounded-t-lg overflow-x-auto no-scrollbar whitespace-nowrap">
                    <button class="tab-button flex-1 py-3 px-4 rounded-t-lg font-bold text-lg relative cursor-pointer tab-active bg-[#FDFDD9] text-[#5E7153] z-20 -mb-[2px]" data-tab-target="#avatar-shop">Avatar</button>
                    <button class="tab-button flex-1 py-3 px-4 rounded-t-lg font-bold text-lg relative cursor-pointer bg-[#5E7153] text-[#FDFDD9] z-10" data-tab-target="#frame-shop">Avatar Frame</button>
                    <button class="tab-button flex-1 py-3 px-4 rounded-t-lg font-bold text-lg relative cursor-pointer bg-[#5E7153] text-[#FDFDD9] z-10" data-tab-target="#plant-shop">Tanaman</button>
                    <button class="tab-button flex-1 py-3 px-4 rounded-t-lg font-bold text-lg relative cursor-pointer bg-[#5E7153] text-[#FDFDD9] z-10" data-tab-target="#bg-shop">Background</button>
                    <button class="tab-button flex-1 py-3 px-4 rounded-t-lg font-bold text-lg relative cursor-pointer bg-[#5E7153] text-[#FDFDD9] z-10" data-tab-target="#gold-shop">Gold</button>
                </div>

                {{-- KONTEN TABS --}}
                <div class="bg-[#FDFDD9] p-6 rounded-b-2xl shadow-lg w-full min-h-[500px]">

                    {{-- 
                        PENGGUNAAN COMPONENT (KUNCI PERBAIKAN)
                        Kita panggil <x-item-box> agar HTML yang dihasilkan SAMA PERSIS dengan Inventory.
                        Component ini otomatis punya class 'ring-4', 'ring-inset', 'hover', dll.
                    --}}

                    <div id="avatar-shop" class="tab-content">
                        <x-item-box 
                            :items="$avatar" 
                            cols="4" 
                            :showPrice="true" 
                            :isGold="false"
                            emptyMessage="Item avatar habis." 
                        />
                    </div>

                    <div id="frame-shop" class="tab-content hidden">
                        <x-item-box :items="$frame" cols="4" :showPrice="true" :isGold="false" emptyMessage="Item frame habis." />
                    </div>

                    <div id="plant-shop" class="tab-content hidden">
                        <x-item-box :items="$plant" cols="4" :showPrice="true" :isGold="false" emptyMessage="Item tanaman habis." />
                    </div>

                    <div id="bg-shop" class="tab-content hidden">
                        <x-item-box :items="$background" cols="4" :showPrice="true" :isGold="false" emptyMessage="Item background habis." />
                    </div>

                    <div id="gold-shop" class="tab-content hidden">
                        <x-item-box :items="$gold" cols="4" :showPrice="true" :isGold="true" emptyMessage="Item gold habis." />
                    </div>

                </div>
            </div>
        </div>
    </div>

    <x-slot:popups>
        @include('popup.shop-buy')
    </x-slot:popups>
</x-layout>