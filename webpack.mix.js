const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/css/app.css', 'public/css');

mix.js('resources/js/dashboard.js', 'public/js').version();
mix.sass('resources/css/dashboard.scss', 'public/css').version();
mix.sass('resources/sass/app.scss', 'public/css').sourceMaps();
