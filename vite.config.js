// vite.config.js
import { defineConfig } from 'vite';

export default defineConfig({
    build: {
        rollupOptions: {
            input: {
                main:'./assets/js/main.js', // Your main entry point file
            },
            output: {
                // Set a fixed output filename
                entryFileNames:'main-output.js', // Your desired output filename
            },
        },
    },
});
