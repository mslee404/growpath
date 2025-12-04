<x-layout>

    <x-slot:title>Leaderboard</x-slot:title>
    
    <x-slot:assets>
        @vite(['resources/css/app.css', 'resources/css/leaderboard-style.css', 'resources/js/app.js', 'resources/js/leaderboard.js']) 
    </x-slot:assets>

    <x-navbar activePage="leaderboard" />
    
    <div class="max-w-7xl mx-auto px-4 md:px-8 py-8">

        <h1 class="text-4xl font-black text-center text-[#5E7153] mb-8 uppercase tracking-wide">
            Leaderboard
        </h1>

        <div class="bg-[#FDFDD9] rounded-2xl shadow-xl p-6 md:p-8">
            <div class="flex flex-col lg:flex-row gap-8 items-start">
                
                <div class="w-full lg:w-1/2 flex justify-center items-end gap-3 lg:gap-4 mt-8 lg:mt-0 order-1 lg:order-none">
                    
                    <div class="w-1/3 relative flex flex-col items-center">
                        <div class="w-full bg-[#C9D8BF] rounded-t-xl shadow-lg h-[220px] md:h-[300px] flex flex-col justify-start p-3 pt-10 items-center relative">
                            <div class="absolute -top-6 w-10 h-10 md:w-12 md:h-12 bg-[#C0C0C0] rounded-full flex items-center justify-center text-white font-bold text-lg md:text-2xl border-4 border-[#F5F5DC] shadow-md z-10">
                                2
                            </div>
                            <div class="bg-[#5E7153] text-white font-bold py-1 px-2 md:px-4 rounded-md text-center text-xs md:text-sm shadow-md w-full truncate mb-2">
                                My Istri
                            </div>
                            <img src="https://placehold.co/112x112/E4E4E7/71717A?text=M" alt="Avatar My Istri" class="w-16 h-16 md:w-24 md:h-24 rounded-full border-4 border-white shadow-md mb-2 object-cover">
                            <span class="font-bold text-sm md:text-lg text-center text-gray-800 mt-auto">200k xp</span>
                        </div>
                    </div>
                    
                    <div class="w-1/3 relative flex flex-col items-center z-10"> <div class="w-full bg-[#C9D8BF] rounded-t-xl shadow-xl h-[260px] md:h-[370px] flex flex-col justify-start p-3 pt-12 items-center relative -mt-4 lg:-mt-0">
                            <div class="absolute -top-7 w-12 h-12 md:w-14 md:h-14 bg-[#FFD700] rounded-full flex items-center justify-center text-white font-bold text-xl md:text-3xl border-4 border-[#F5F5DC] shadow-md z-20">
                                1
                            </div>
                            <div class="bg-[#5E7153] text-white font-bold py-1 px-3 md:px-5 rounded-md text-center text-xs md:text-base shadow-md w-full truncate mb-3">
                                Rahmat
                            </div>
                            <img src="https://placehold.co/128x128/E4E4E7/71717A?text=R" alt="Avatar Rahmat" class="w-20 h-20 md:w-28 md:h-28 rounded-full border-4 border-white shadow-md mb-3 object-cover">
                            <span class="font-bold text-sm md:text-lg text-center text-gray-800 mt-auto">300k xp</span>
                        </div>
                    </div>

                    <div class="w-1/3 relative flex flex-col items-center">
                        <div class="w-full bg-[#C9D8BF] rounded-t-xl shadow-lg h-[180px] md:h-[250px] flex flex-col justify-start p-3 pt-10 items-center relative">
                            <div class="absolute -top-5 w-9 h-9 md:w-10 md:h-10 bg-[#CD7F32] rounded-full flex items-center justify-center text-white font-bold text-base md:text-xl border-4 border-[#F5F5DC] shadow-md z-10">
                                3
                            </div>
                            <div class="bg-[#5E7153] text-white font-bold py-1 px-2 md:px-4 rounded-md text-center text-xs md:text-sm shadow-md w-full truncate mb-2">
                                Gwejh
                            </div>
                            <img src="https://placehold.co/96x96/E4E4E7/71717A?text=G" alt="Avatar Gwejh" class="w-14 h-14 md:w-20 md:h-20 rounded-full border-4 border-white shadow-md mb-2 object-cover">
                            <span class="font-bold text-sm md:text-lg text-center text-gray-800 mt-auto">200k xp</span>
                        </div>
                    </div>
                </div>

                <div class="w-full lg:w-1/2 flex flex-col gap-4 order-2 lg:order-none"> @php
                        $users = [
                            ['rank' => 4, 'name' => 'flawer', 'xp' => '198765', 'avatar' => 'F'],
                            ['rank' => 5, 'name' => 'flawer', 'xp' => '198765', 'avatar' => 'F'],
                            ['rank' => 6, 'name' => 'flawer', 'xp' => '198765', 'avatar' => 'G'],
                            ['rank' => 7, 'name' => 'flawer', 'xp' => '198765', 'avatar' => 'H'],
                            ['rank' => 8, 'name' => 'flawer', 'xp' => '198765', 'avatar' => 'I'],
                        ];
                    @endphp

                    @foreach ($users as $user)
                    <div class="flex items-center justify-between bg-[#FEFEF9] rounded-xl shadow-sm border border-gray-200 p-4 transition-transform hover:-translate-y-1">
                        <div class="flex items-center gap-4">
                            <span class="text-xl font-bold text-gray-500 w-8 text-center">{{ $user['rank'] }}</span>
                            <img src="https://placehold.co/48x48/E4E4E7/71717A?text={{ $user['avatar'] }}" alt="Avatar" class="w-12 h-12 rounded-full border-2 border-gray-300 object-cover">
                            <span class="font-semibold text-lg text-gray-800 truncate">{{ $user['name'] }}</span>
                        </div>
                        <span class="text-lg font-bold text-[#5E7153] whitespace-nowrap">{{ $user['xp'] }} xp</span>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
 
</x-layout>