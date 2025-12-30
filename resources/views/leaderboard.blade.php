<x-layout>

    <x-slot:title>Leaderboard</x-slot:title>
    
    <x-slot:assets>
        @vite(['resources/css/app.css', 'resources/js/app.js']) 
    </x-slot:assets>

    <x-navbar activePage="leaderboard" />
    
    <div class="max-w-6xl mx-auto px-4 md:px-8 py-4 pb-6">

        <h1 class="text-4xl font-black text-center text-[#5E7153] mb-4 uppercase tracking-wide">
            Leaderboard
        </h1>

        <div class="bg-[#FDFDD9] rounded-2xl shadow-xl p-3 md:p-4">
            
            <div class="flex flex-col lg:flex-row gap-4 items-center lg:items-end">
                
                {{-- PODIUM SECTION --}}
                <div class="w-full lg:w-1/2 flex justify-center items-end gap-3 lg:gap-4 order-1 lg:order-none">
                    
                    {{-- Rank 2 --}}
                    <div class="w-1/3 relative flex flex-col items-center">
                        @if(isset($users[1]))
                        <div class="w-full bg-[#C9D8BF] rounded-t-xl shadow-lg h-[220px] md:h-[300px] flex flex-col justify-start p-3 pt-10 items-center relative {{ $users[1]->id === Auth::id() ? 'ring-4 ring-[#FFD700] ring-offset-2' : '' }}">
                            <div class="absolute -top-6 w-10 h-10 md:w-12 md:h-12 bg-[#C0C0C0] rounded-full flex items-center justify-center text-white font-bold text-lg md:text-2xl border-4 border-[#F5F5DC] shadow-md z-10">
                                2
                            </div>
                            <div class="bg-[#5E7153] text-white font-bold py-1 px-2 md:px-4 rounded-md text-center text-xs md:text-sm shadow-md w-full truncate mb-2">
                                {{ $users[1]->display_name }}
                            </div>
                            <img src="{{ $users[1]->avatar_url }}" alt="Avatar" class="w-16 h-16 md:w-24 md:h-24 rounded-full border-4 border-white shadow-md mb-2 object-cover">
                            <span class="font-bold text-sm md:text-lg text-center text-gray-800 mt-auto">{{ number_format($users[1]->total_xp) }} xp</span>
                        </div>
                        @endif
                    </div>
                    
                    {{-- Rank 1 --}}
                    <div class="w-1/3 relative flex flex-col items-center z-10">
                        @if(isset($users[0]))
                        <div class="w-full bg-[#C9D8BF] rounded-t-xl shadow-xl h-[260px] md:h-[370px] flex flex-col justify-start p-3 pt-12 items-center relative {{ $users[0]->id === Auth::id() ? 'ring-4 ring-[#FFD700] ring-offset-2' : '' }}">
                            <div class="absolute -top-7 w-12 h-12 md:w-14 md:h-14 bg-[#FFD700] rounded-full flex items-center justify-center text-white font-bold text-xl md:text-3xl border-4 border-[#F5F5DC] shadow-md z-20">
                                1
                            </div>
                            <div class="bg-[#5E7153] text-white font-bold py-1 px-3 md:px-5 rounded-md text-center text-xs md:text-base shadow-md w-full truncate mb-3">
                                {{ $users[0]->display_name }}
                            </div>
                            <img src="{{ $users[0]->avatar_url }}" alt="Avatar" class="w-20 h-20 md:w-28 md:h-28 rounded-full border-4 border-white shadow-md mb-3 object-cover">
                            <span class="font-bold text-sm md:text-lg text-center text-gray-800 mt-auto">{{ number_format($users[0]->total_xp) }} xp</span>
                        </div>
                        @endif
                    </div>

                    {{-- Rank 3 --}}
                    <div class="w-1/3 relative flex flex-col items-center">
                        @if(isset($users[2]))
                        <div class="w-full bg-[#C9D8BF] rounded-t-xl shadow-lg h-[180px] md:h-[250px] flex flex-col justify-start p-3 pt-10 items-center relative {{ $users[2]->id === Auth::id() ? 'ring-4 ring-[#FFD700] ring-offset-2' : '' }}">
                            <div class="absolute -top-5 w-9 h-9 md:w-10 md:h-10 bg-[#CD7F32] rounded-full flex items-center justify-center text-white font-bold text-base md:text-xl border-4 border-[#F5F5DC] shadow-md z-10">
                                3
                            </div>
                            <div class="bg-[#5E7153] text-white font-bold py-1 px-2 md:px-4 rounded-md text-center text-xs md:text-sm shadow-md w-full truncate mb-2">
                                {{ $users[2]->display_name }}
                            </div>
                            <img src="{{ $users[2]->avatar_url }}" alt="Avatar" class="w-14 h-14 md:w-20 md:h-20 rounded-full border-4 border-white shadow-md mb-2 object-cover">
                            <span class="font-bold text-sm md:text-lg text-center text-gray-800 mt-auto">{{ number_format($users[2]->total_xp) }} xp</span>
                        </div>
                        @endif
                    </div>
                </div>

                {{-- RANK LIST 4-8 (Top 8 / Auth User) --}}
                <div class="w-full lg:w-1/2 flex flex-col gap-4 order-2 lg:order-none">
                    
                    @foreach ($users->slice(3) as $user)
                    @php
                        $rank = \App\Models\UserGrowpath::where('total_xp', '>', $user->total_xp)->count() + 1;
                    @endphp
                    <div class="flex items-center justify-between rounded-xl shadow-sm border p-3 {{ $user->id === Auth::id() ? 'bg-[#F0F7E6] border-[#5E7153] border-2' : 'bg-[#FEFEF9] border-gray-200' }}">
                        <div class="flex items-center gap-4">
                            <span class="text-xl font-bold text-gray-500 w-8 text-center">{{ $rank }}</span>
                            <img src="{{ $user->avatar_url }}" alt="Avatar" class="w-12 h-12 rounded-full border-2 border-gray-300 object-cover">
                            <span class="font-semibold text-lg text-gray-800 truncate">{{ $user->display_name }}</span>
                        </div>
                        <span class="text-lg font-bold text-[#5E7153] whitespace-nowrap">{{ number_format($user->total_xp) }} xp</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
 
</x-layout>