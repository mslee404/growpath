<x-layout>
    <x-slot:title>Shop</x-slot:title>

    <x-slot:assets>
        @vite(['resources/css/shop-style-new.css', 'resources/js/shop.js', 'resources/js/app.js', 'resources/css/app.css', 'resources/css/inventory-style.css'])
    </x-slot:assets>

    <x-navbar activePage="shop" />

    <div class="container mx-auto px-0 max-w-[90%] py-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 justify-between">
            <div class="lg:col-span-1 flex flex-col items-center">
                <div class="flex justify-between items-right max-w-md h-[15%] gap-6 items-center mb-6">
                    <span class="text-[#5E7153] font-bold text-[2.5rem] leading-[2.25rem]">MARKET</span>

                    <div class="flex bg-[#FDFDD9] rounded-[15px] py-[5px] px-[10px] h-[70%] w-1/2 justify-between items-center border-2 border-[#5E7153]">
                        <span id="gold-amount" class="text-[#5E7153] text-lg font-bold">10000</span>
                        <image src="/images/Gold.svg" alt="Gold Coin" class="w-[80%] h-[80%] ml-10 object-contain"/>
                    </div>
                </div>

                <div class="bg-[#FDFDD9] p-[2.75rem] rounded-[1rem] border-2 border-[#5E7153] shadow-lg w-full max-w-md items-center flex flex-col justify-center text-center">
                    
                    <div id="item-frame" class="relative w-[17.3rem] h-[17.3rem] mx-auto mb-6 flex items-center justify-center overflow-hidden rounded-[10px]">

                        <!-- <img src="/images/Apple.svg" class="absolute w-[100%] h-[100%] pointer-events-none" /> -->

                        <div id="item-detail-image" class="w-[13rem] h-[13rem] flex items-center justify-center overflow-hidden">
                            <!-- <img src="/images/5-myistri.svg" class="w-full h-full object-cover" /> -->
                        </div>

                    </div>
                    
                    <h2 id="item-detail-name" class="item-detail-name">[Nama Item]</h2>
                    <p id="item-detail-desc" class="item-detail-desc">Deskripsi singkat item ada di sini.</p>
                    <span id="item-detail-price" class="text-[1.875rem] leading-[2.25rem] font-bold text-[#5E7153]">[Harga Item]</span>

                </div>

                <button class="btn-pakai mt-8">Beli</button>
            </div>

            <div class="lg:col-span-2">
                <div class="tab-nav relative z-10 flex border-b-0">
                    <button class="tab-button flex-1 tab-active" data-tab-target="#avatar-shop">Avatar</button>
                    <button class="tab-button flex-1" data-tab-target="#frame-shop">Frame</button>
                    <button class="tab-button flex-1" data-tab-target="#plant-shop">Plant</button>
                    <button class="tab-button flex-1" data-tab-target="#bg-shop">Background</button>
                    <button class="tab-button flex-1" data-tab-target="#gold-shop">Gold</button>
                </div>

        <!-- <div class="bg-[#FDFDD9] py-[50px] px-[40px] rounded-bl-[15px] rounded-br-[15px] flex-1"> -->
                <div class="tab-content-wrapper w-full min-h-[500px]">
                    <div id="avatar-shop" class="tab-content">
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-6 p-4">
                            <div 
                                class="item-card"
                                data-item='{
                                    "name": "Dewa Petir", 
                                    "type": "Avatar",
                                    "desc": "Avatar spesial Dewa Petir (Zenitsu)", 
                                    "image": "{{ asset('images/2.png') }}",
                                    "price": "7500"
                                }'>
                                
                                <div class="bg-[#5E7153] text-[#FDFDD9] text-center py-2 font-bold text-lg leading-7">Dewa Petir</div>
                                
                                <div class="p-4 justify-center items-center flex flex-col gap-3">
                                    <img src="{{ asset('images/2.png') }}" alt="Dewa Petir" class="item-card-image">

                                    <span class="text-[#FDFDD9] text-lg font-bold">7500 Gold</span>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div id="frame-shop" class="tab-content hidden">
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-6 p-4">
                            <div 
                                class="item-card"
                                data-item='{
                                    "name": "Apple Frame", 
                                    "type": "Frame",
                                    "desc": "Frame apel apel emas", 
                                    "image": "{{ asset('images/Apple.svg') }}",
                                    "price": "7500"
                                }'>
                                
                                <div class="bg-[#5E7153] text-[#FDFDD9] text-center py-2 font-bold text-lg leading-7">Dewa Petir</div>
                                
                                <div class="p-4 justify-center items-center flex flex-col gap-3">
                                    <img src="{{ asset('images/Apple.svg') }}" alt="Apple frame" class="item-card-image">

                                    <span class="text-[#FDFDD9] text-lg font-bold">7500 Gold</span>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div id="plant-shop" class="tab-content hidden">
                        <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore
                        </p>
                    </div>
                    <div id="bg-shop" class="tab-content hidden">
                        <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore
                        </p>
                    </div>
                    <div id="gold-shop" class="tab-content hidden">
                        <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>