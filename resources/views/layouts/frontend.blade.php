<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Volans Education</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('frontend/img/favicon.png')}}">
    {{-- <link rel="stylesheet" href="{{ url('frontend/edumark/css/responsive.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/frontend.css') }}">
    @stack('styles')
</head>

<body>
    <!--[if lte IE 9]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->
    @include('includes.frontend.header')
	@yield('content')
	@yield('component')
	@include('includes.frontend.footer')
	@include('includes.frontend.script')
    @stack('scripts')
</body>
</html>
