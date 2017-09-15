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
    .js('resources/assets/js/site/app.js', 'public/js/app.js')
    .sass('resources/assets/sass/site/app.scss', 'public/css/app.css')

    //AdminPanel
    .js('resources/assets/js/admin/app.js', 'public/js/admin.js')

    .styles([
        'resources/assets/styles/admin/bootstrap.css',
        'resources/assets/styles/admin/core.css',
        'resources/assets/styles/admin/components.css',
        'resources/assets/styles/admin/icons/icomoon/styles.css'
    ], 'public/css/admin.css')

    .copyDirectory('resources/assets/fonts/admin', 'public/css/fonts');
