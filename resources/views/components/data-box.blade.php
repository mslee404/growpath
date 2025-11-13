{{-- 
    Definisikan @props yang bisa diterima.
--}}
@props([
    'title',
    'tabGroup',
    'scrollerId',
    'addButtonId',
    'type' => 'habit' // 'habit' sebagai default
])

{{-- 
    Set variabel PHP di sini berdasarkan props.
--}}
@php
    $bgColor = $type == 'habit' ? 'bg-[#8EB548]' : 'bg-[#C4661F]';
@endphp

{{-- 
    Variabel $title, $tabGroup, dll akan diisi dari props.
--}}
<div data-tab-group="{{ $tabGroup }}">
    
    <!-- Header (Judul, Tab Kategori, Tombol +) -->
    <div class="flex items-center justify-between space-x-2">
        <h2 class="text-3xl font-extrabold text-[#783D19] flex-shrink-0">{{ $title }}</h2>

        <div class="flex-1 flex items-center overflow-hidden">
            <!-- Scroller Kiri-->
            <button class="scroll-btn scroll-btn-left text-[#783D19] opacity-0 invisible" data-scroller="{{ $scrollerId }}" data-direction="-1">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M15 19l-7-7 7-7"></path></svg>
            </button>

            <!-- Tab Kategori (diisi oleh $tabs) -->
            <div id="{{ $scrollerId }}" class="flex-1 flex items-center space-x-2 overflow-x-auto horizontal-scroller snap-x scroll-smooth" data-tab-container>
                {{ $tabs }}
            </div>

            <!-- Scroller Kanan -->
            <button class="scroll-btn scroll-btn-right text-[#783D19]" data-scroller="{{ $scrollerId }}" data-direction="1">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"></path></svg>
            </button>
        </div>

        <!-- Tambah -->
        <button id="{{ $addButtonId }}" class="w-8 h-8 bg-[#783D19] text-[#FDFDD9] rounded-full text-2xl font-semibold shadow-md hover:bg-[#A07B5F] flex-shrink-0 flex items-center justify-center pb-0.5">+</button>
    </div>

    <!-- Panel Konten (diisi oleh $slot) -->
    <div class="{{ $bgColor }} h-[265px] rounded-2xl shadow-lg p-4" data-panel-container>
        {{ $slot }}
    </div>
</div>