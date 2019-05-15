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



    mix.webpackConfig({
  resolve: {
    extensions: ['.js', '.vue', '.json'],
    alias: {
      jquery: "jquery/src/jquery",
      '@': __dirname + '/resources'
    },
  },
})


mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');

mix.copyDirectory('resources/assets/css', 'public/css');
mix.copyDirectory('resources/assets/js', 'public/js');
mix.copyDirectory('resources/assets/fonts', 'public/fonts');
mix.copyDirectory('resources/assets/css/patterns', 'public/css/patterns');
mix.copyDirectory('resources/assets/js/plugins', 'public/js/plugins');
mix.copyDirectory('resources/assets/img', 'public/img');
mix.copyDirectory('resources/assets/font-awesome', 'public/font-awesome');

mix.styles([
    'resources/sass/estilo.css'
], 'public/css/all.css');
