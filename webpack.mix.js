let mix = require('laravel-mix');

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

mix
    //Site
    .js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css')

    //AdminPanel
    .js('resources/assets/admin/js/admin.js', 'public/js')

    .styles([
        'resources/assets/admin/css/bootstrap.css',
        'resources/assets/admin/css/core.css',
        'resources/assets/admin/css/components.css',
        'resources/assets/admin/css/icons/icomoon/styles.css'
    ], 'public/css/admin.css')

    .copyDirectory('resources/assets/admin/fonts', 'public/css/fonts');
