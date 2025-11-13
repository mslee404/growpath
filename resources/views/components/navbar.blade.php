{{-- 
    Ini adalah komponen Navbar yang reusable.
    Kita gunakan @props untuk menerima 'activePage'.
    Default-nya adalah 'home'.
--}}
@props([
    'activePage' => 'home'
])

<nav class="bg-[#8EB548] text-white font-bold shadow-lg">
    <div class="container mx-auto px-6 py-3 flex justify-between items-center">
        <a href="#" class="text-3xl font-bold tracking-tight text-[#FDFDD9]">GROWPATH</a>
        
        <div class="flex items-center space-x-4">
            
            {{-- 
                Kita cek apakah $activePage == 'home'.
                Jika ya, kita pakai style aktif (bg-[#FDFDD9] text-black).
                Jika tidak, kita pakai style non-aktif (opacity-70).
            --}}

            <!-- Home -->
            <a href="/home" class="flex items-center space-x-2 py-2 px-4 rounded-2xl
                {{ $activePage == 'home'
                    ? 'bg-[#FDFDD9] text-black'
                    : 'text-black opacity-70 hover:opacity-100' }}
            ">
                <span class="text-lg font-bold">HOME</span>
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v14m-4-4l4 4 4-4"></path></svg>
            </a>
            
            <!-- Inventory -->
            <a href="/inventory" class="flex items-center space-x-2 py-2 px-4 rounded-2xl
                {{ $activePage == 'inventory'
                    ? 'bg-[#FDFDD9] text-black'
                    : 'text-black opacity-70 hover:opacity-100' }}
            ">
                <span class="text-lg font-bold">INVENTORY</span>
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-2m-4-1v8m0 0l3-3m-3 3L9 8m-5 5h2.553C8.188 13 9 13.81 9 14.857V17m8-4h-2.553C14.812 13 14 13.81 14 14.857V17"></path></svg>
            </a>

            <!-- Market -->
            <a href="/shop" class="flex items-center space-x-2 py-2 px-4 rounded-2xl
                {{ $activePage == 'market'
                    ? 'bg-[#FDFDD9] text-black'
                    : 'text-black opacity-70 hover:opacity-100' }}
            ">
                <span class="text-lg font-bold">MARKET</span>
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            </a>
            
            <!-- Leaderboard -->
             <a href="/leaderboard" class="flex items-center space-x-2 py-2 px-4 rounded-2xl
                {{ $activePage == 'leaderboard'
                    ? 'bg-[#FDFDD9] text-black'
                    : 'text-black opacity-70 hover:opacity-100' }}
             ">
                <span class="text-lg font-bold">LEADERBOARD</span>
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.653-.08-1.285-.23-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.653.08-1.285.23-1.857m0 0A3.004 3.004 0 007 16c0-1.657-1.343-3-3-3S1 14.343 1 16s1.343 3 3 3c.621 0 1.19-.186 1.644-.5M17 16c0-1.657 1.343-3 3-3s3 1.343 3 3-1.343 3-3 3c-.621 0-1.19-.186-1.644-.5M12 8c0-1.657 1.343-3 3-3s3 1.343 3 3-1.343 3-3 3-3-1.343-3-3zM6 8c0-1.657 1.343-3 3-3s3 1.343 3 3-1.343 3-3 3-3-1.343-3-3z"></path></svg>
            </a>
            
            <!-- Profil -->
            <a href="/profile" class="flex items-center space-x-2 py-2 px-4 rounded-2xl
                {{ $activePage == 'profil'
                    ? 'bg-[#FDFDD9] text-black'
                    : 'text-black opacity-70 hover:opacity-100' }}
            ">
                <span class="text-lg font-bold">PROFIL</span>
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
            </a>
        </div>
    </div>
</nav>