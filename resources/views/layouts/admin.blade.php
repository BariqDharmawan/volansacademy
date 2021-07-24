<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @include('includes.style')
    @stack('styles')
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        @include('includes.navbar')
		@include('includes.sidebar')
		<div class="content-wrapper">
		<!-- Main content -->
		<section class="content">
		@yield('content')
		</section>
		</div>
		@include('includes.footer')
    </div>
	@include('includes.script')
    @stack('scripts')
</body>
</html>
