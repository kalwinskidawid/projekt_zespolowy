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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/technologies.scss', 'public/css')
    .js('resources/js/technologies.js', 'public/js')
    .sass('resources/sass/levels.scss', 'public/css')
    .js('resources/js/levels.js', 'public/js')
    .sass('resources/sass/languages.scss', 'public/css')
    .js('resources/js/languages.js', 'public/js')
    .sass('resources/sass/certificates.scss','public/css')
    .js('resources/js/certificates.js', 'public/js')
    .sass('resources/sass/school_types.scss','public/css')
    .js('resources/js/school_types.js', 'public/js')
    .copy('resources/views/vendor/datatables/i18n/pl.json', 'public/vendor/datatables/i18n')
    .sourceMaps()
    .extract();
