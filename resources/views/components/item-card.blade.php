@props([
    'item', 
    'showPrice' => false,
    'isGold' => false
])

<div 
    {{-- CLASS UTAMA DISINI --}}
    class="item-card bg-[#ADC698] rounded-xl cursor-pointer overflow-hidden relative group transition-all duration-200 
           shadow-md hover:shadow-lg
           {{-- RING WAJIB ADA DISINI --}}
           ring-4 ring-transparent ring-inset"
    {{-- DATA ITEM UNTUK JS --}}
    data-item="{{ json_encode($item) }}"
>
    {{-- Header Judul --}}
    <div class="bg-[#5E7153] text-white text-center py-2 font-bold text-lg leading-7 truncate px-2">
        {{ $item['name'] }}
    </div>

    {{-- Body Gambar --}}
    <div class="p-4 flex flex-col items-center justify-center gap-2">
        <img 
            src="{{ Str::startsWith($item['image'], ['http', '/']) ? $item['image'] : asset($item['image']) }}" 
            alt="{{ $item['name'] }}" 
            class="w-full h-auto object-cover rounded-xl aspect-square"
        >

        {{-- Harga (Opsional untuk Shop) --}}
        @if($showPrice && isset($item['price']))
            <span class="text-[#FDFDD9] text-lg font-bold bg-[#5E7153]/20 px-2 rounded mt-1">
                @if($isGold)
                    Rp. {{ number_format($item['price'], 0, ',', '.') }}
                @else
                    {{ $item['price'] }} G
                @endif
            </span>
        @endif
    </div>
</div>