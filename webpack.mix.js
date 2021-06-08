const mix = require('laravel-mix');
const fs = require('fs');
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

mix
    .js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
]);

mix.copy('resources/css/template/bootstrap.css', 'public/css/template')
mix.copy('resources/css/template/bootstrap_customized.css', 'public/css/template')
mix.sass('resources/css/template/all.scss', 'public/css/template.css')
mix.sass('resources/css/template/home.scss', 'public/css/template/home.css')

