const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/custom.scss', 'public/css')
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
        'public/frontend/edumark/css/slicknav.css',
        'public/css/custom.css',
    ], 'public/css/frontend.css');
