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

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');

mix.copy('resources/assets/css/style.css', 'public/css/style.css');
mix.copy('resources/assets/css/plugins/', './public/css/plugins', false);
mix.copy('resources/assets/js/plugins/', './public/js/plugins', false);