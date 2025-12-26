<x-layout>
    <x-slot:title>Profile</x-slot:title>
    
    <x-slot:assets>
        @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/profile.js']) 
    </x-slot:assets>

    <x-navbar activePage="profile" />

    <main class="container mx-auto px-0 max-w-[90%] py-8 flex flex-col items-center mt-6 min-h-[85vh]">
        
        <h1 class="text-4xl font-bold text-[#5E7153] mb-8 text-center uppercase tracking-wide">
            {{ auth()->user()->display_name ?? auth()->user()->username }} Profile
        </h1>

        <div class="flex flex-col md:flex-row gap-8 justify-center w-full max-w-6xl items-stretch">
            
            {{-- KARTU KIRI (AVATAR) --}}
            <div class="bg-[#FDFDD9] p-8 rounded-[1rem] shadow-lg flex flex-col justify-between items-center w-full md:w-[35%]">
                
                <div class="flex items-center w-full gap-2 mb-4">
                    {{-- Nama User --}}
                    <div class="bg-[#5E7153] text-[#FDFDD9] text-xl font-bold px-5 py-2.5 rounded-lg w-full text-center truncate shadow-sm">
                        {{ auth()->user()->display_name ?? auth()->user()->username }}
                    </div>
    
                    {{-- Tombol Edit --}}
                    <button id="btn-edit-username" class="bg-[#5E7153] p-2 rounded-lg hover:bg-[#4e5e45] transition flex-shrink-0 shadow-sm" title="Edit Username">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="#FDFDD9" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487a2.25 2.25 0 0 1 3.182 3.182L7.125 20.586a4.5 4.5 0 0 1-1.591.995l-2.934.977.977-2.934a4.5 4.5 0 0 1 .995-1.591L16.862 4.487z" />
                        </svg>
                    </button>
                </div>

                {{-- Kotak Avatar --}}
                <div class="w-52 h-52 flex items-center justify-center relative my-6">
                     <!-- Avatar Image -->
                     <img src="{{ auth()->user()->avatar_url }}" alt="Avatar" class="w-full h-full rounded-[1rem] object-cover border-[8px] border-[#5E7153] shadow-inner">
                     
                     <!-- Frame Image -->
                     @if(auth()->user()->frame_url)
                        <img src="{{ auth()->user()->frame_url }}" alt="Frame" class="absolute -top-3 -left-3 w-[14.5rem] h-[14.5rem] pointer-events-none z-10" style="max-width: none;">
                     @endif
                </div>

                {{-- Tombol Edit Avatar --}}
                <a href="{{ route('inventory') }}" class="bg-[#5C6843] text-white text-lg font-bold px-8 py-2.5 rounded-lg hover:bg-[#4A5633] transition w-full shadow-sm text-center">
                    Edit Avatar
                </a>
            </div>

            {{-- KARTU KANAN (STATS) --}}
            <div class="bg-[#FDFDD9] p-8 rounded-[1rem] shadow-lg w-full md:w-[65%] text-[#5E7153] flex flex-col justify-between">
                
                <div class="space-y-6 text-xl font-bold w-full">
                    
                    <div class="flex items-end justify-between w-full">
                        <span class="flex-shrink-0">level</span>
                        <div class="flex-grow border-b-[3px] border-dotted border-[#5E7153] mx-3 mb-2 opacity-50"></div>
                        <span class="flex-shrink-0 text-2xl">{{ auth()->user()->level }}</span>
                    </div>

                    <div class="flex items-end justify-between w-full">
                        <span class="flex-shrink-0">exp earned</span>
                        <div class="flex-grow border-b-[3px] border-dotted border-[#5E7153] mx-3 mb-2 opacity-50"></div>
                        <span class="flex-shrink-0 text-2xl">{{ auth()->user()->total_xp }}</span>
                    </div>

                    <div class="flex items-end justify-between w-full">
                        <span class="flex-shrink-0">gold</span>
                        <div class="flex-grow border-b-[3px] border-dotted border-[#5E7153] mx-3 mb-2 opacity-50"></div>
                        <span class="flex-shrink-0 text-2xl">{{ auth()->user()->total_gold }}</span>
                    </div>

                    <div class="flex items-end justify-between w-full">
                        <span class="flex-shrink-0">task cleared</span>
                        <div class="flex-grow border-b-[3px] border-dotted border-[#5E7153] mx-3 mb-2 opacity-50"></div>
                        {{-- Hitung task yang sudah checked=1 --}}
                        <span class="flex-shrink-0 text-2xl">{{ auth()->user()->tasks()->where('is_completed', true)->count() }}</span>
                    </div>

                    <div class="flex items-end justify-between w-full">
                        <span class="flex-shrink-0">time played</span>
                        <div class="flex-grow border-b-[3px] border-dotted border-[#5E7153] mx-3 mb-2 opacity-50"></div>
                        <span class="flex-shrink-0 text-2xl">-</span>
                    </div>
                </div>

                <div class="flex justify-end pt-8">
                    <button id="btn-logout" class="bg-transparent border-2 border-[#5E7153] text-[#5E7153] text-lg font-bold px-8 py-2.5 rounded-lg hover:bg-[#5E7153] hover:text-[#FDFDD9] transition shadow-sm">
                        Logout
                    </button>
                </div>
            </div>
        </div>
    </main>

    <x-slot:popups>
        @include('popup.profile-logout')
        @include('popup.profile-edit-username')
    </x-slot:popups>

</x-layout>