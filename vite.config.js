// import { defineConfig } from 'vite';
// import laravel from 'laravel-vite-plugin';
// import vue from '@vitejs/plugin-vue';

// export default defineConfig({
//     plugins: [
//         laravel({
//             input: 'resources/js/app.js',
//             refresh: true,
//         }),
//         vue({
//             template: {
//                 transformAssetUrls: {
//                     base: null,
//                     includeAbsolute: false,
//                 },
//             },
//         }),
//     ],
// });
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

// Obtendo variáveis de ambiente
const env = {
    VITE_REVERB_APP_KEY: process.env.VITE_REVERB_APP_KEY,
    VITE_REVERB_HOST: process.env.VITE_REVERB_HOST,
    VITE_REVERB_PORT: process.env.VITE_REVERB_PORT,
    VITE_REVERB_SCHEME: process.env.VITE_REVERB_SCHEME,
};

export default defineConfig({
    plugins: [
        laravel({
            input: 'resources/js/app.js',
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    define: {
        'import.meta.env': env
    }
});

