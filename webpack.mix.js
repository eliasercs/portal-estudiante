const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/index.js', 'public/js')
    .js('resources/js/login.js','public/js')
    .js('resources/js/mapa.js', 'public/js')
    .postCss('resources/css/style_stikers.css', 'public/css')
    .postCss('resources/css/index.css', 'public/css')
    .postCss('resources/css/bootstrap-settings.css', 'public/css');
