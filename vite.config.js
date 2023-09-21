import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'


export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js','resources/js/sidebar.js','resources/js/script.js'],
            refresh: true,
        }),
        vue(),
    ],

    build: {
        outDir: 'dist', // Assurez-vous que cette option est correcte
      },

      server: {
        proxy: {
          '/api': 'https://dr-assani.eu/', // Remplacez par l'URL correcte de votre API Laravel
        },
      },
});
