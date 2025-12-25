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
    'type' => 'habit',
    'id',
    'raw_detail' => [],
    'sub_type' => null, 
])

<div class="bg-[#FDFDD9] rounded-xl shadow h-auto flex items-center space-x-3 p-3">

    {{-- CHECKBOX FORM --}}
    <form action="{{ $type === 'tugas' ? route('task.check', $id) : route('habit.check', $id) }}" method="POST" id="check-form-{{ $type }}-{{ $id }}">
        @csrf
        <input 
            type="checkbox" 
            class="custom-checkbox-main" 
            {{ $checked ? 'checked' : '' }}
            onchange="document.getElementById('check-form-{{ $type }}-{{ $id }}').submit()"
        >
    </form>

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
        onclick="openEditHabit(this)"
        data-id="{{ $id }}"
        data-detail="{{ json_encode($raw_detail) }}"
        data-type="{{ $sub_type ?? $type }}" 
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
        onclick="openEditTugas(this)"
        data-id="{{ $id }}"
        data-detail="{{ json_encode($raw_detail) }}"
        class="text-gray-500 hover:text-black p-2"
    >
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"/>
        </svg>
    </button>
    @endif


</div>
