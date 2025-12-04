@props([
    'title' => 'Tambah Habit Baru?',
])

<div 
    id="modal-habit" 
    class="fixed inset-0 flex items-center justify-center z-50
           opacity-0 invisible transition-opacity duration-300 ease-in-out">

    <div class="absolute inset-0 bg-black/40"></div>

    <div 
        id="modal-content-habit"
        class="relative bg-[#8EB548] text-[#FDFDD9] p-6 rounded-2xl shadow-xl 
               w-full max-w-lg min-h-[550px] max-h-[550px]
               mx-4 transform scale-95 transition-all duration-300 ease-in-out">

        <div class="flex justify-between items-center mb-4">
            <h2 class="text-3xl font-bold text-white">{{ $title }}</h2>

            <button 
                id="close-habit"
                class="text-3xl text-white opacity-80 hover:opacity-100">
                &times;
            </button>
        </div>

        <form method="POST" action="#">
            @csrf

            <div class="space-y-4">
                {{ $slot }}
            </div>

            <div class="mt-6">
                {{ $footer ?? '' }}
            </div>

        </form>
    </div>
</div>
