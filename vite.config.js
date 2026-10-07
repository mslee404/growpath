import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            // Setiap file yang dipanggil lewat @vite di view WAJIB terdaftar di sini,
            // kalau tidak halamannya error 500 setelah `npm run build`.
            input: [
                'resources/css/app.css',
                'resources/css/home-style.css',
                'resources/css/login.css',
                'resources/css/loginafter.css',
                'resources/css/register.css',
                'resources/css/welcome.css',
                'resources/js/app.js',
                'resources/js/home.js',
                'resources/js/inventory.js',
                'resources/js/item-box.js',
                'resources/js/login.js',
                'resources/js/loginafter.js',
                'resources/js/profile.js',
                'resources/js/register.js',
                'resources/js/shop.js',
                'resources/js/welcome.js',
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
