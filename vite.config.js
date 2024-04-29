import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/sass/app.scss",
                "resources/js/app.js",
                "public/css/dashboard.css",
                "public/css/custom.css",
                "public/js/dashboard.js",
            ],
            refresh: true,
        }),
    ],
});

// import { defineConfig } from 'vite';
// import laravel from 'laravel-vite-plugin';

// export default defineConfig({
//     plugins: [
//         laravel({
//             input: [
//
//                 'resources/js/app.js',
//             ],
//             refresh: true,
//         }),
//     ]
// });
