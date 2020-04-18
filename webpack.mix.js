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
   .sass('resources/sass/app.scss', 'public/css')
    .copy('node_modules/multiselect/css/multi-select.css', 'public/css/vendor')
    .copy('node_modules/multiselect/js/jquery.multi-select.js', 'public/js/vendor')
    .copy('node_modules/bootstrap-multiselect/dist/css/bootstrap-multiselect.css', 'public/css/vendor')
    .copy('node_modules/bootstrap-multiselect/dist/js/bootstrap-multiselect.js', 'public/js/vendor');
