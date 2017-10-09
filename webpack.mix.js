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
    .styles([
        'resources/assets/styles/site/style.css',
        'resources/assets/styles/site/custom.css',
    ], 'public/css/app.css')
    .copyDirectory('resources/assets/js/site/extensions', 'public/js/extensions')
    .copyDirectory('resources/assets/fonts/site', 'public/fonts')
    .copyDirectory('resources/assets/images/site', 'public/images')
    .copy('resources/assets/js/site/script.js', 'public/js/script.js')
    .copy('resources/assets/js/site/core.min.js', 'public/js/core.min.js')

    //AdminPanel
    .js('resources/assets/js/admin/app.js', 'public/js/admin.js')

    .styles([
        'resources/assets/styles/admin/icons/icomoon/styles.css',
        'resources/assets/styles/admin/bootstrap.css',
        'resources/assets/styles/admin/core.css',
        'resources/assets/styles/admin/components.css',
        'resources/assets/styles/admin/colors.css',
        'node_modules/summernote/dist/summernote.css',
        'node_modules/flatpickr/dist/flatpickr.min.css',
    ], 'public/css/admin.css')

    .copyDirectory('resources/assets/fonts/admin', 'public/css/fonts')
    .copyDirectory('node_modules/summernote/dist/font', 'public/css/font');

    if (mix.inProduction()) {
        mix.version();
    }
