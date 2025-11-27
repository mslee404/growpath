<x-layout>
    <x-slot:title>Profile</x-slot:title>
    
    <x-slot:assets>
        @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/profile.js']) 
    </x-slot:assets>

    <x-navbar activePage="profile" />

    <!--Profile Section-->
    <main class="container mx-auto px-4 py-8 flex flex-col items-center mt-6 min-h-[85vh]">
        
        <h1 class="text-4xl font-bold text-[#5C6843] mb-8 text-center">
            {User} Profile
        </h1>

        <div class="flex flex-col md:flex-row gap-8 justify-center w-full max-w-6xl items-stretch">
            
            <div class="bg-[#F5F5DC] p-8 rounded-xl shadow-md flex flex-col justify-between items-center w-full md:w-[35%]">
                
                <div class="flex items-center w-full gap-2 mb-4">
                    <div class="bg-[#5C6843] text-white text-xl font-bold px-5 py-2.5 rounded-lg w-full text-center truncate shadow-sm">
                        Username123
                    </div>
    
                    <button id="btn-edit-username" class="bg-[#5C6843] p-2 rounded-lg hover:bg-[#4A5633] transition flex-shrink-0 shadow-sm" title="Edit Username">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6 text-white">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487a2.25 2.25 0 0 1 3.182 3.182L7.125 20.586a4.5 4.5 0 0 1-1.591.995l-2.934.977.977-2.934a4.5 4.5 0 0 1 .995-1.591L16.862 4.487z" />
                        </svg>
                    </button>
                </div>

                <div class="w-52 h-52 bg-gray-200 border-[8px] border-[#5C6843] flex items-center justify-center text-gray-500 font-bold text-lg shadow-inner my-6 overflow-hidden">
                    AVATAR
                </div>

                <button class="bg-[#5C6843] text-white text-lg font-bold px-8 py-2.5 rounded-lg hover:bg-[#4A5633] transition w-full shadow-sm">
                    Edit Avatar
                </button>
            </div>

            <div class="bg-[#F5F5DC] p-8 rounded-xl shadow-md w-full md:w-[65%] text-[#5C6843] flex flex-col justify-between">
                
                <div class="space-y-6 text-xl font-bold w-full">
                    
                    <div class="flex items-end justify-between w-full">
                        <span class="flex-shrink-0">level</span>
                        <div class="flex-grow border-b-[3px] border-dotted border-[#5C6843] mx-3 mb-2 opacity-50"></div>
                        <span class="flex-shrink-0 text-2xl">20</span>
                    </div>

                    <div class="flex items-end justify-between w-full">
                        <span class="flex-shrink-0">exp earned</span>
                        <div class="flex-grow border-b-[3px] border-dotted border-[#5C6843] mx-3 mb-2 opacity-50"></div>
                        <span class="flex-shrink-0 text-2xl">2040</span>
                    </div>

                    <div class="flex items-end justify-between w-full">
                        <span class="flex-shrink-0">gold</span>
                        <div class="flex-grow border-b-[3px] border-dotted border-[#5C6843] mx-3 mb-2 opacity-50"></div>
                        <span class="flex-shrink-0 text-2xl">67000</span>
                    </div>

                    <div class="flex items-end justify-between w-full">
                        <span class="flex-shrink-0">task cleared</span>
                        <div class="flex-grow border-b-[3px] border-dotted border-[#5C6843] mx-3 mb-2 opacity-50"></div>
                        <span class="flex-shrink-0 text-2xl">17</span>
                    </div>

                    <div class="flex items-end justify-between w-full">
                        <span class="flex-shrink-0">time played</span>
                        <div class="flex-grow mx-3 mb-2 opacity-50"></div>
                        <span class="flex-shrink-0 text-2xl">733h 23m</span>
                    </div>
                </div>

                <div class="flex justify-end pt-8">
                    <button id="btn-logout" class="bg-transparent border-2 border-[#5C6843] text-[#5C6843] text-lg font-bold px-8 py-2.5 rounded-lg hover:bg-[#5C6843] hover:text-[#F5F5DC] transition">
                        Logout
                    </button>
                </div>
            </div>
        </div>
    </main>

    <x-slot:popups>
        @include('popup.logout')
        @include('popup.edit-username')
    </x-slot:popups>

</x-layout>