{{-- 
    komponen untuk setiap item di dalam list.
--}}
@props([
    'title',
    'xp' => null,
    'category' => null,
    'date' => null,
    'time' => null,
    'checked' => false,
    'type' => 'habit'
])

<div class="bg-[#FDFDD9] rounded-2xl shadow h-auto flex items-center space-x-3 p-3">
    <input type="checkbox" class="custom-checkbox-main" {{ $checked ? 'checked' : '' }}>
    
    <span class="flex-1 text-lg font-semibold text-[#783D19]">{{ $title }}</span>
    
    <div class="text-right">
        {{-- 
            LOGIKA @if UNTUK MENGECEK $type
        --}}
        @if($type == 'tugas')
            {{-- Tampilan TUGAS (xp, date, time) --}}
            <p class="text-sm font-semibold text-[#783D19]">+ {{ $xp }} xp</p>
            <p class="text-sm font-semibold text-[#783D19]">{{ $date }} - {{ $time }}</p>
        @else
            {{-- Tampilan HABIT (xp, category) --}}
            <p class="text-sm font-semibold text-[#783D19]">+ {{ $xp }} xp</p>
            <p class="text-sm font-semibold text-[#783D19]">{{ $category }}</p>
        @endif
    </div>
    
    <button class="text-gray-500 hover:text-black">
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path></svg>
    </button>
</div>