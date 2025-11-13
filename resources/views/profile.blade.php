<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile - GrowPath</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    
    <!--Navbar-->
    <nav class="bg-[#78A44C] text-white font-bold shadow-lg">
        <div class="container mx-auto px-8 py-4 flex justify-between items-center">
            <a href="#" class="text-3xl font-black tracking-tight">GROWPATH</a>
            
            <div class="flex items-center space-x-8">
                <a href="#" class="flex items-center space-x-2 opacity-70 hover:opacity-100">
                    <span class="text-lg">HOME</span>
                    <svg class="w-8 h-8 p-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                </a>
                
                <a href="#" class="flex items-center space-x-2 opacity-70 hover:opacity-100">
                    <span class="text-lg">INVENTORY</span>
                    <svg class="w-8 h-8 p-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-2m-4-1v8m0 0l3-3m-3 3L9 8m-5 5h2.553C8.188 13 9 13.81 9 14.857V17m8-4h-2.553C14.812 13 14 13.81 14 14.857V17"></path></svg>
                </a>

                <a href="#" class="flex items-center space-x-2 opacity-70 hover:opacity-100">
                    <span class="text-lg">MARKET</span>
                    <svg class="w-8 h-8 p-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </a>
                
                <a href="#" class="flex items-center space-x-2 opacity-70 hover:opacity-100">
                    <span class="text-lg">LEADERBOARD</span>
                    <svg class="w-8 h-8 p-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.653-.08-1.285-.23-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.653.08-1.285.23-1.857m0 0A3.004 3.004 0 007 16c0-1.657-1.343-3-3-3S1 14.343 1 16s1.343 3 3 3c.621 0 1.19-.186 1.644-.5M17 16c0-1.657 1.343-3 3-3s3 1.343 3 3-1.343 3-3 3c-.621 0-1.19-.186-1.644-.5M12 8c0-1.657 1.343-3 3-3s3 1.343 3 3-1.343 3-3 3-3-1.343-3-3zM6 8c0-1.657 1.343-3 3-3s3 1.343 3 3-1.343 3-3 3-3-1.343-3-3z"></path></svg>
                </a>
                
                <a href="#" class="flex items-center space-x-2">
                    <span class="text-lg">PROFILE</span>
                    <div class="bg-black/30 rounded-lg">
                        <svg class="w-8 h-8 p-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    </div>
                </a>
            </div>
        </div>
    </nav>

    <!--Profile Section-->
    <main class="container mx-auto p-8 flex flex-col md:flex-row gap-8 justify-center mt-12">
        <!-- Left Card -->
        <div class="bg-[#F5F5DC] p-8 rounded-lg shadow-md border border-green-800 flex flex-col items-center w-full md:w-1/3">
            <div class="flex items-center space-x-2 mb-4">
                <h2 class="text-2xl font-bold bg-green-800 text-white px-4 py-1 rounded-md">Username123</h2>
                <button class="p-2 text-green-800 hover:text-green-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487a2.25 2.25 0 0 1 3.182 3.182L7.125 20.586a4.5 4.5 0 0 1-1.591.995l-2.934.977.977-2.934a4.5 4.5 0 0 1 .995-1.591L16.862 4.487z" />
                    </svg>
                </button>
            </div>

            <div class="w-48 h-48 bg-gray-300 border-4 border-green-800 flex items-center justify-center text-gray-600 mb-4">
                Avatar
            </div>

            <button class="bg-green-800 text-white px-6 py-2 rounded-md hover:bg-green-700">
                Edit Avatar
            </button>
        </div>

        <!-- Right Card -->
        <div class="bg-[#F5F5DC] p-8 rounded-lg shadow-md border border-green-800 w-full md:w-1/2 text-lg text-green-800">
            <p class="mb-2">level ....................................................... <span class="font-semibold">20</span></p>
            <p class="mb-2">exp earned ..................................................<span class="font-semibold">2040</span></p>
            <p class="mb-2">gold ........................................................<span class="font-semibold">67000</span></p>
            <p class="mb-2">task cleared ................................................<span class="font-semibold">17</span></p>
            <p class="mb-6">time played .................................................<span class="font-semibold">264h 15m</span></p>

            <button class="bg-[#F5F5DC] border border-green-800 text-green-800 px-6 py-2 rounded-md hover:bg-green-800 hover:text-[#F5F5DC] transition">
                Logout
            </button>
        </div>
    </main>
    
</body>
</html>