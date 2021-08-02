const mix = require('laravel-mix');
require('laravel-mix-artisan-serve');

mix.js('resources/assets/js/app.js', 'public/js')
    .js('resources/assets/js/custom.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .sass('resources/assets/sass/custom.scss', 'public/css')
    .styles([
        'public/frontend/edumark/css/bootstrap.min.css',
        'public/frontend/edumark/css/owl.carousel.min.css',
        'public/frontend/edumark/css/magnific-popup.css',
        'public/frontend/edumark/css/font-awesome.min.css',
        'public/frontend/edumark/css/themify-icons.css',
        'public/frontend/edumark/css/nice-select.css',
        'public/frontend/edumark/css/flaticon.css',
        'public/frontend/edumark/css/gijgo.css',
        'public/frontend/edumark/css/animate.css',
        'public/css/custom.css',
    ], 'public/css/frontend.css')
    .serve()