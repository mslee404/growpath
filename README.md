# Growpath

> Sebuah aplikasi pelacak kebiasaan (habit tracker) gamifikasi yang membantu kamu membangun konsistensi dengan cara yang lucu dan memotivasi. Tumbuh setiap hari!

---

## 🌳 Tentang Growpath

Growpath adalah aplikasi pelacak kebiasaan dan tugas yang mengubah proses membosankan dari mencentang daftar menjadi sebuah perjalanan yang menyenangkan. Alih-alih hanya berfokus pada progres bar, Growpath menggunakan metafora merawat tanaman.

Setiap kali kamu menyelesaikan kebiasaan atau tugas, kamu mendapatkan XP dan Koin. XP akan menaikkan level tanaman digitalmu, membuatnya tumbuh dari biji menjadi tunas, lalu menjadi tanaman yang mekar. Koin yang didapat bisa digunakan untuk membeli kustomisasi seperti pot unik, jenis tanaman langka, dan latar belakang yang indah.

**Tujuan utama proyek ini adalah menciptakan koneksi emosional terhadap progres diri, sehingga membangun kebiasaan baik terasa seperti sebuah pencapaian yang personal dan visual.**

## ✨ Fitur Utama

Berikut adalah fitur-fitur yang direncanakan dan sedang dikembangkan untuk Growpath:

* **🔐 Autentikasi Pengguna:** Sistem Register, Login, Logout, dan Pengaturan Profil (username & foto).
* **🌱 Pelacakan Habit:**
    * Membuat habit harian, mingguan, atau kustom.
* **📝 Manajemen Tugas:**
    * Fungsi To-Do List sederhana dengan tanggal tenggat (due date).
* **✨ Sistem Gamifikasi:**
    * **XP & Level:** Selesaikan tugas untuk mendapatkan XP dan naik level.
    * **Koin:** Dapatkan koin sebagai mata uang dalam aplikasi.
    * **Tanaman Digital:** Visual utama di Halaman Utama yang tumbuh dan berevolusi seiring kenaikan level pengguna.
* **🏪 Toko Kustomisasi:**
    * Beli item kosmetik menggunakan koin yang didapat.
    * Kategori item: Tanaman, Pot, Frame, Latar Belakang.
* **📊 Halaman Statistik:**
    * Visualisasi data progres pengguna dengan pertumbuhan pohon.
* **💸 Monetisasi (Premium):**
    * Kemampuan untuk membeli paket koin dengan uang sungguhan (*In-App Purchase*).

Dibuat dengan ❤️ untuk membantu kita semua tumbuh sedikit lebih baik setiap hari.

---

## 🛠️ Menjalankan secara lokal

Butuh PHP 8.2–8.4, Composer, dan Node 20+.

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate:fresh --seed   # katalog + akun demo (admingrowpath / 123admin)
php artisan serve                  # terminal 1
npm run dev                        # terminal 2
```

Jalankan test: `php artisan test`.

## 🚀 Deploy gratis (Render + Neon)

App ini sudah siap deploy lewat Docker (`Dockerfile`, `render.yaml`). Saat container start, migrasi dan seed katalog berjalan otomatis (aman diulang; akun demo **tidak** dibuat di production).

1. **Database (Neon, gratis permanen):** daftar di [neon.tech](https://neon.tech), buat project dengan region **AWS Singapore**, lalu salin *connection string*-nya (`postgresql://...?sslmode=require`).
2. **Web (Render, gratis):** di [render.com](https://render.com) pilih **New → Blueprint**, hubungkan repo GitHub ini. Render membaca `render.yaml` dan meminta:
   - `DB_URL` → tempel connection string Neon.
   - `MIDTRANS_SERVER_KEY` / `MIDTRANS_CLIENT_KEY` → boleh dikosongkan dulu (top-up gold nonaktif).
3. Klik **Apply**. Build pertama ±5–10 menit. Setelah itu app ada di `https://growpath-xxxx.onrender.com`.

Catatan: layanan gratis Render tidur setelah 15 menit tanpa pengunjung dan butuh ±1 menit untuk bangun. Buka link-nya semenit sebelum presentasi.

## 💳 Top-up gold (Midtrans Sandbox)

1. Daftar di [dashboard.midtrans.com](https://dashboard.midtrans.com), pastikan mode **Sandbox**.
2. Ambil **Server Key** dan **Client Key** di *Settings → Access Keys*, isi ke `.env` (lokal) atau Environment di Render.
3. (Setelah deploy) isi *Payment Notification URL* di *Settings → Payment* dengan `https://<app-kamu>/midtrans/notification`.
4. Uji bayar pakai simulator Midtrans atau kartu uji `4811 1111 1111 1114`.

Tanpa kunci Midtrans, tombol top-up hanya menampilkan pesan "Top-up belum aktif" (tidak ada gold gratis).
