<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>GrowPath - Welcome</title>

  @vite(['resources/css/welcome.css', 'resources/js/welcome.js'])

  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
</head>

<body>
  <div class="scene">
    <div class="orange-panel">
      <div class="orange-inner"></div>
      <div class="branding logo-box">
        <img src="{{ asset('images/logo.svg') }}" alt="GrowPath Logo" class="logo" />
        <h1>GROWPATH</h1>
        <p>Tumbuh setiap hari</p>
      </div>
    </div>
    
    <div class="white-panel"></div>
  </div>
</body>
</html>
