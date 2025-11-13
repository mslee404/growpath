<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GrowPath - {{ $title }}</title>
    
    {{-- Slot untuk CSS dan JS spesifik per halaman --}}
    {{ $assets }}
</head>

<body>
    {{-- 
        Slot utama (konten halaman)
    --}}
    <main>
        {{ $slot }}
    </main>
    
    {{-- Slot untuk popups --}}
    {{ $popups ?? '' }}

</body>
</html>