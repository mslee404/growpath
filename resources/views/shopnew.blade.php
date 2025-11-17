<x-layout>
    <x-slot:title>Shop</x-slot:title>

    <x-slot:assets>
        @vite(['resources/css/shop-style-new.css', 'resources/js/shop.js', 'resources/js/app.js'])
    </x-slot:assets>

    <x-navbar activePage="shop" />

    <div class="w-1/2 h-[75%] absolute -translate-x-[86%] left-1/2 top-[120px] rounded-[15px] overflow-hidden flex flex-col">
        <div class="grid grid-cols-5 m-0 shrink-0">
            <h3 class="bg-[#FDFDD9] text-[#5E7153]">Avatar</h3>
            <h3>Frame</h3>
            <h3>Plant</h3>
            <h3>Background</h3>
            <h3>Gold</h3>
        </div>
        <div class="bg-[#FDFDD9] py-[50px] px-[40px] rounded-bl-[15px] rounded-br-[15px] flex-1">
            <div class="active">
                <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore
                </p>
            </div>
            <div>
                <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore
                </p>
            </div>
            <div>
                <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore
                </p>
            </div>
            <div>
                <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore
                </p>
            </div>
            <div>
                <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore
                </p>
            </div>
        </div>
    </div>

    <div>
    </div>

    <div>
</div>
</x-layout>