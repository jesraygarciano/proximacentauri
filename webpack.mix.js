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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');

mix.styles([
    'public/css/app.css',
    'public/css/landing-page.css',
    'public/css/common.css',    
    'public/css/media-query.css',
    'public/css/components/applicant-component.css',
    'public/css/components/general-component.css',
    'public/css/components/opening-component.css',
    'public/css/components/layout-component.css',
    'public/css/components/input-validation-component.css'
], 'public/css/style.css');

// mix.scripts([
//     'public/js/admin.js',
//     'public/js/dashboard.js'
// ], 'public/js/all.js');

mix.scripts([
    'public/js/profile_editor.js',
    'public/js/unick-form.js'    
], 'public/js/profile.js');
