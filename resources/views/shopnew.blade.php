<x-layout>
    <x-slot:title>Shop</x-slot:title>

    <x-slot:assets>
        @vite(['resources/css/shop-style-new.css', 'resources/js/shop.js', 'resources/js/app.js', 'resources/css/app.css', 'resources/css/inventory-style.css'])
    </x-slot:assets>

    <x-navbar activePage="shop" />

    <div class="container mx-auto p-8 min-h-[calc(100vh-60px)]">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-1 flex flex-col items-center">

                <h2 class="shop-title">MARKET</h2>

                <div class="item-detail-card w-full max-w-md text-center">
                    
                    <div id="item-detail-image" class="item-detail-image-wrapper mx-auto mb-6 flex items-center justify-center overflow-hidden">
                        <span>Gambar Item</span>
                    </div>
                    
                    <h2 id="item-detail-name" class="item-detail-name">[Nama Item]</h2>
                    <p id="item-detail-desc" class="item-detail-desc">Deskripsi singkat item ada di sini.</p>

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
                        <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore
                        </p>
                    </div>
                    <div id="frame-shop" class="tab-content hidden">
                        <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore
                        </p>
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