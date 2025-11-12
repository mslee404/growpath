<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>GrowPath - Register</title>
  @vite(['resources/css/register.css', 'resources/js/register.js'])
</head>

<body>
  <div class="container">
    <div class="left-panel">
      <div class="logo-box">
        <img src="{{ asset('images/GambarPot.png') }}" alt="GrowPath Logo" class="logo" />
        <h1>GROWPATH</h1>
        <p>Tumbuh setiap hari</p>
      </div>
    </div>

    <div class="right-panel">
      <div class="register-box">
        <h2>Buat akun barumu</h2>
        <p>Sedikit lagi untuk memulai perjalanan kebiasaan baikmu!</p>

        <form method="POST" action="{{ route('register.post') }}">
          @csrf

          <div class="input-group">
            <div class="icon-box">
              <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
              </svg>
            </div>
            <input type="text" name="username" placeholder="Username" required />
          </div>

          <div class="input-group">
            <div class="icon-box">
              <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
              </svg>
            </div>
            <input type="password" name="password" placeholder="Password" required />
          </div>

          <div class="input-group">
            <div class="icon-box">
              <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M5 13l4 4L19 7" />
              </svg>
            </div>
            <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required />
          </div>

          <button type="submit">Daftar</button>
        </form>

        <p class="login-text">
          Udah punya akun?
          <a href="{{ route('login') }}">Masuk</a>
        </p>
      </div>
    </div>
  </div>
</body>
</html>
