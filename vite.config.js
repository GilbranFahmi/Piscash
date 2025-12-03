import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/app.js',      // kalau ada
                'resources/js/pos-transaksi.jsx', // entry POS React
            ],
            refresh: true,
        }),
    ],
});
