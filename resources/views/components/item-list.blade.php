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

<div class="bg-[#FDFDD9] rounded-xl shadow h-auto flex items-center space-x-3 p-3">

    {{-- CHECKBOX --}}
    <input type="checkbox" class="custom-checkbox-main" {{ $checked ? 'checked' : '' }}>

    {{-- JUDUL --}}
    <span class="flex-1 text-lg font-semibold text-[#783D19]">
        {{ $title }}
    </span>

    {{-- INFO SAMPING KANAN --}}
    <div class="text-right">
        @if($type === 'tugas')
            <p class="text-sm font-semibold text-[#783D19]">+ {{ $xp }} xp</p>
            <p class="text-sm font-semibold text-[#783D19]">{{ $date }} - {{ $time }}</p>
        @else
            <p class="text-sm font-semibold text-[#783D19]">+ {{ $xp }} xp</p>
            <p class="text-sm font-semibold text-[#783D19]">{{ $category }}</p>
        @endif
    </div>

    {{-- TITIK 3 KHUSUS HABIT --}}
    @if($type === 'habit')
    <button 
        onclick="openEditHabit()"
        class="text-gray-500 hover:text-black p-2"
    >
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"/>
        </svg>
    </button>
    @endif

    {{-- TITIK 3 UNTUK TUGAS --}}
    @if($type === 'tugas')
    <button 
        onclick="openEditTugas()"
        class="text-gray-500 hover:text-black p-2"
>
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"/>
        </svg>
    </button>
    @endif


</div>
