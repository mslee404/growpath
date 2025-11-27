@props([
    'activePage' => 'home'
])

<nav class="w-full bg-[#78A44C] flex justify-between items-center px-8 py-3 shadow-md font-lexend z-50">
    
    <a href="#" class="flex items-center gap-2 text-3xl font-extrabold text-[#FDFDD9] tracking-tight hover:opacity-90 transition-opacity">
        GROWPATH
    </a>
    
    <div class="flex items-center gap-2">
        
        @php
            // Base Class: Rounded, transisi halus
            $baseClass = "flex items-center space-x-2 px-5 py-2.5 rounded-3xl transition-all duration-200 ease-out";
            
            // Active: Bg Krem, Teks Coklat, Diam di tempat (Solid)
            $activeClass = "bg-[#FDFDD9] text-[#783D19] font-bold shadow-sm";
            
            // Inactive: Teks Krem, Hover: Naik sedikit (-translate-y-1) & background transparan
            $inactiveClass = "text-[#FDFDD9] font-medium hover:bg-white/10 hover:scale-105";
        @endphp

        <a href="/home" class="{{ $baseClass }} {{ $activePage == 'home' ? $activeClass : $inactiveClass }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            <span class="tracking-wide text-sm">HOME</span>
        </a>
        
        <a href="/inventory" class="{{ $baseClass }} {{ $activePage == 'inventory' ? $activeClass : $inactiveClass }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
            </svg>
            <span class="tracking-wide text-sm">INVENTORY</span>
        </a>

        <a href="/shopnew" class="{{ $baseClass }} {{ $activePage == 'shop' ? $activeClass : $inactiveClass }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                <path d="M9 15a2.5 2.5 0 005 0" /> 
            </svg>
            <span class="tracking-wide text-sm">SHOP</span>
        </a>
        
        <a href="/leaderboard" class="{{ $baseClass }} {{ $activePage == 'leaderboard' ? $activeClass : $inactiveClass }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M5 3v4M3 5h4M6 17v4m-2-2h4 m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
            </svg>
            <span class="tracking-wide text-sm">LEADERBOARD</span>
        </a>
        
        <a href="/profile" class="{{ $baseClass }} {{ $activePage == 'profile' ? $activeClass : $inactiveClass }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span class="tracking-wide text-sm">PROFILE</span>
        </a>

    </div>
</nav>