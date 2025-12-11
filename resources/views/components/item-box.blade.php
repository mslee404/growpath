@props([
    'items',              
    'cols' => 4,          
    'emptyMessage' => 'Item tidak tersedia.',
    'showPrice' => false  
])

@if (count($items) > 0)
    {{-- Grid Layout --}}
    <div class="grid grid-cols-2 md:grid-cols-{{ $cols }} gap-4 p-4">
        
        @foreach ($items as $item)
            {{-- PANGGIL COMPONENT ANAK --}}
            <x-item-card :item="$item" :showPrice="$showPrice" />
        @endforeach

    </div>
@else
    {{-- Pesan Kosong --}}
    <div class="flex flex-col items-center justify-center min-h-[300px] opacity-60">
        <p class="text-xl text-[#5E7153] text-center font-bold">{{ $emptyMessage }}</p>
    </div>
@endif