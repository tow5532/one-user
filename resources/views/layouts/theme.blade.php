<!doctype html>
<html class="no-js" lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- SEO -->
    <meta name="description" content="{{ config('project.description') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Tobigca') }}</title>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/img/logo/favicon.ico">

    <!-- all css here -->
    <!-- bootstrap v3.3.6 css -->
    <link rel="stylesheet" href="{{ mix('css/bootstrap.min.css') }}">
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="{{ mix('css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ mix('css/owl.transitions.css') }}">
    <!-- meanmenu css -->
    <link rel="stylesheet" href="{{ mix('css/meanmenu.min.css') }}">
    <!-- font-awesome css -->
    <link rel="stylesheet" href="{{ mix('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ mix('css/icon.css') }}">
    <link rel="stylesheet" href="{{ mix('css/flaticon.css') }}">
    <!-- magnific css -->
    <link rel="stylesheet" href="{{ mix('css/magnific.min.css') }}">
    <!-- venobox css -->
    <link rel="stylesheet" href="{{ mix('css/venobox.css') }}">
    <!-- style css -->
    <link rel="stylesheet" href="{{ mix('css/style.css') }}">
    <!-- responsive css -->
    <link rel="stylesheet" href="{{ mix('css/responsive.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />

    @yield('style')

    {!! \Anhskohbo\NoCaptcha\Facades\NoCaptcha::renderJs() !!}

</head>
<body>

<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<div id="preloader"></div>
@include('layouts.partial.navi')
<!-- header end -->

<!-- Start sub Area -->
@include('layouts.partial.sub')
<!-- End sub Area -->

<!-- content start -->
<div class="contact-area bg-color-2 all-padding">
    <div class="container">

        @include('flash::message')

        @yield('content')

    </div>
</div>
<!-- content end -->

<!-- Start Footer bottom Area -->
@include('layouts.partial.foot')
<!-- end Footer bottom Area -->

<!-- all js here -->
{!! GoogleReCaptchaV3::init() !!}

<script src="{{ mix('js/sub.js') }}"></script>
<script src="{{ mix('js/app.js') }}"></script>

@yield('script')

</body>
</html>
