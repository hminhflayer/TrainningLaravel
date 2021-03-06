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
    .sass('resources/sass/app.scss', 'public/css') //them
    .copy('node_modules/semantic-ui-css/semantic.min.css','public/css/semantic.min.css') //them
    .copy('node_modules/semantic-ui-css/semantic.min.js','public/js/semantic.min.js') //them
    .sourceMaps();
mix.js('resources/js/alpine.js', 'public/js')
