{{-- resources/views/components/edit-habit.blade.php --}}
@props([
    'title' => 'Edit Habit?',
])

<div 
    id="modal-edit-habit" 
    class="fixed inset-0 flex items-center justify-center z-50
           opacity-0 invisible transition-opacity duration-300 ease-in-out">

    {{-- Background --}}
    <div class="absolute inset-0 bg-black/40"></div>

    {{-- Modal Box --}}
    <div 
        id="modal-content-edit-habit"
        class="relative bg-[#8EB548] text-[#FDFDD9] p-6 rounded-2xl shadow-xl 
               w-full max-w-lg min-h-[550px] max-h-[550px]
               mx-4 transform scale-95 transition-all duration-300 ease-in-out">

        {{-- Header --}}
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-3xl font-bold text-white">{{ $title }}</h2>

            <button 
                id="close-edit-habit"
                class="text-3xl text-white opacity-80 hover:opacity-100">
                &times;
            </button>
        </div>

        {{-- Form --}}
        <form id="form-edit-habit" method="POST" action="#">
            @csrf
            @method('PUT')

            <div class="space-y-4">
                {{ $slot }}
            </div>

            <div class="mt-6">
                {{ $footer ?? '' }}
            </div>

        </form>
    </div>
</div>
