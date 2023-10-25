import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    server: {
        watch: {
            usePolling: true, // Aktifkan ini jika Anda berada di lingkungan yang memerlukan polling
            interval: 1000, // Interval polling (jika usePolling diaktifkan)
        },
    },
    plugins: [
        laravel({
            input: [
                "resources/sass/app.scss",
                "resources/js/app.js",
                "resources/css/app.css",
            ],
            refresh: true,
        }),
    ],
});
