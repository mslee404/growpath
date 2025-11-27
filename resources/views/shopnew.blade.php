@php
    $avatar = [
        [
            'name' => 'Dewa Petir',
            'type' => 'Avatar',
            'desc' => 'Avatar spesial Dewa Petir (Zenitsu)',
            'image' => asset('images/2.png'),
            'price' => '7500' 
            ],
        [
            'name' => 'My Istri',
            'type' => 'Avatar',
            'desc' => 'Bukankah ini (Waguri-chan)',
            'image' => asset('images/5-myistri.svg'),
            'price' => '7500' ]
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
    $gold = [];
    $userGold = 10000;
@endphp

<x-layout>
    <x-slot:title>Shop</x-slot:title>

    <x-slot:assets>
        @vite(['resources/css/shop-style-new.css', 'resources/js/shop.js', 'resources/js/app.js', 'resources/css/app.css'])
    </x-slot:assets>

    <x-navbar activePage="shop" />

    <div class="container mx-auto px-0 max-w-[90%] py-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 justify-between">
            <div class="lg:col-span-1 flex flex-col items-center">
                <div class="flex justify-between items-right max-w-md h-[15%] gap-6 items-center mb-6">
                    <span class="text-[#5E7153] font-bold text-[2.5rem] leading-[2.25rem]">MARKET</span>

                    <div class="flex bg-[#FDFDD9] rounded-[15px] py-[5px] px-[10px] h-[70%] w-1/2 justify-between items-center">
                        <span id="gold-amount" class="text-[#5E7153] text-lg font-bold">{{ $userGold }}</span>
                        <image src="/images/Gold.svg" alt="Gold Coin" class="w-[80%] h-[80%] ml-10 object-contain"/>
                    </div>
                </div>

                <div class="bg-[#FDFDD9] p-[2.75rem] rounded-[1rem] shadow-lg w-full max-w-md items-center flex flex-col justify-center text-center">
                    
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

                <button id="btn-buy" class="bg-[#FDFDD9] px-12 py-3 rounded-md font-bold text-xl leading-7 text-[#5E7153] shadow-md transition-all duration-300 ease-in-out cursor-pointer mt-8">Beli</button>
            </div>

            <!-- Shop Tabs and Items -->
            <div class="lg:col-span-2">
                <div class="tab-nav relative z-10 flex">
                    <button class="tab-button flex-1 tab-active" data-tab-target="#avatar-shop">Avatar</button>
                    <button class="tab-button flex-1" data-tab-target="#frame-shop">Frame</button>
                    <button class="tab-button flex-1" data-tab-target="#plant-shop">Plant</button>
                    <button class="tab-button flex-1" data-tab-target="#bg-shop">Background</button>
                    <button class="tab-button flex-1" data-tab-target="#gold-shop">Gold</button>
                </div>

                <!-- Tabsnya  -->
                <div class="tab-content-wrapper w-full min-h-[500px]">
                    <!-- Avatar  -->
                    <div id="avatar-shop" class="tab-content">
                        @if (count($avatar) > 0)
                            <div class="grid grid-cols-2 md:grid-cols-3 gap-6 p-4">
                                @foreach ($avatar as $item)
                                    <div 
                                        class="item-card"
                                        data-item='{
                                            "name": "{{ $item['name'] }}", 
                                            "type": "{{ $item['type'] }}",
                                            "desc": "{{ $item['desc'] }}", 
                                            "image": "{{ $item['image'] }}",
                                            "price": "{{ $item['price'] }}"
                                        }'>
                                
                                        <div class="bg-[#5E7153] text-[#FDFDD9] text-center py-2 font-bold text-lg leading-7">{{ $item['name'] }}</div>
                                
                                        <div class="p-4 justify-center items-center flex flex-col gap-3">
                                            <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="item-card-image">

                                            <span class="text-[#FDFDD9] text-lg font-bold">{{ $item['price'] }} Gold</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="p-4">Tidak ada item avatar tersedia.</p>
                        @endif
                    </div>
                    <div id="frame-shop" class="tab-content hidden">
                        @if (count($frame) > 0)
                            <div class="grid grid-cols-2 md:grid-cols-3 gap-6 p-4">
                                @foreach ($frame as $item)
                                    <div 
                                        class="item-card"
                                        data-item='{
                                            "name": "{{ $item['name'] }}", 
                                            "type": "{{ $item['type'] }}",
                                            "desc": "{{ $item['desc'] }}", 
                                            "image": "{{ $item['image'] }}",
                                            "price": "{{ $item['price'] }}"
                                        }'>
                                
                                        <div class="bg-[#5E7153] text-[#FDFDD9] text-center py-2 font-bold text-lg leading-7">{{ $item['name'] }}</div>
                                
                                        <div class="p-4 justify-center items-center flex flex-col gap-3">
                                            <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="item-card-image">

                                            <span class="text-[#FDFDD9] text-lg font-bold">{{ $item['price'] }} Gold</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else 
                            <p class="p-4">Tidak ada item frame tersedia.</p>
                        @endif
                    </div>
                    <div id="plant-shop" class="tab-content hidden">
                        @if (count($plant) > 0)
                            <div class="grid grid-cols-2 md:grid-cols-3 gap-6 p-4">
                                @foreach ($plant as $item)
                                    <div 
                                        class="item-card"
                                        data-item='{
                                            "name": "{{ $item['name'] }}", 
                                            "type": "{{ $item['type'] }}",
                                            "desc": "{{ $item['desc'] }}", 
                                            "image": "{{ $item['image'] }}",
                                            "price": "{{ $item['price'] }}"
                                        }'>
                                
                                        <div class="bg-[#5E7153] text-[#FDFDD9] text-center py-2 font-bold text-lg leading-7">{{ $item['name'] }}</div>
                                
                                        <div class="p-4 justify-center items-center flex flex-col gap-3">
                                            <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="item-card-image">

                                            <span class="text-[#FDFDD9] text-lg font-bold">{{ $item['price'] }} Gold</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else 
                            <p class="p-4">Tidak ada item tanaman tersedia.</p>
                        @endif
                    </div>
                    <div id="bg-shop" class="tab-content hidden">
                        @if (count($background) > 0)
                            <div class="grid grid-cols-2 md:grid-cols-3 gap-6 p-4">
                                @foreach ($background as $item)
                                    <div 
                                        class="item-card"
                                        data-item='{
                                            "name": "{{ $item['name'] }}", 
                                            "type": "{{ $item['type'] }}",
                                            "desc": "{{ $item['desc'] }}", 
                                            "image": "{{ $item['image'] }}",
                                            "price": "{{ $item['price'] }}"
                                        }'>
                                
                                        <div class="bg-[#5E7153] text-[#FDFDD9] text-center py-2 font-bold text-lg leading-7">{{ $item['name'] }}</div>
                                
                                        <div class="p-4 justify-center items-center flex flex-col gap-3">
                                            <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="item-card-image">

                                            <span class="text-[#FDFDD9] text-lg font-bold">{{ $item['price'] }} Gold</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else 
                            <p class="p-4">Tidak ada item background tersedia.</p>
                        @endif
                    </div>
                    <div id="gold-shop" class="tab-content hidden">
                        @if (count($gold) > 0)
                            <div class="grid grid-cols-2 md:grid-cols-3 gap-6 p-4">
                                @foreach ($gold as $item)
                                    <div 
                                        class="item-card"
                                        data-item='{
                                            "name": "{{ $item['name'] }}", 
                                            "type": "{{ $item['type'] }}",
                                            "desc": "{{ $item['desc'] }}", 
                                            "image": "{{ $item['image'] }}",
                                            "price": "{{ $item['price'] }}"
                                        }'>
                                
                                        <div class="bg-[#5E7153] text-[#FDFDD9] text-center py-2 font-bold text-lg leading-7">{{ $item['name'] }}</div>
                                
                                        <div class="p-4 justify-center items-center flex flex-col gap-3">
                                            <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="item-card-image">

                                            <span class="text-[#FDFDD9] text-lg font-bold">{{ $item['price'] }} Gold</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else 
                            <p class="p-4">Tidak ada item gold tersedia.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-slot:popups>
        @include('popup.buy')
    </x-slot:popups>
</x-layout>