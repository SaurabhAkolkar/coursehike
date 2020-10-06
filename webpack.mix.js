const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

// mix.js('resources/assets/js/app.js', 'public/js')
//    .sass('resources/assets/styles/main.scss', 'public/css');

mix.sass('resources/assets/styles/main.scss', 'public/css');
// mix.sass('resources/assets/admin-creator/admin-v2.scss', 'public/css');
mix.sass('resources/assets/admin-creator/admin.scss', 'public/css/dashboard');
mix.sass('resources/assets/admin-creator/admin-creator.scss', 'public/css/dashboard');