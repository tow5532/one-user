<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.partial.head')
</head>
<body>

<div class="wrapper">

    <!-- preloader -->
    <!--<div id="pre-loader">
        <img src="/images/pre-loader/loader-01.svg" alt="">
    </div>-->
    <!--preloader -->
@include('flash::message')

@include('layouts.partial.navi')

<!--content -->
@yield('content')
<!--content -->

    @include('layouts.partial.footer')


</div>
<!--footer -->

<div id="back-to-top"><a class="top arrow" href="#top"><i class="fa fa-angle-up"></i> <span>TOP</span></a></div>

@include('layouts.partial.js')

@yield('script')

<!-- all js here -->


<!-- Global site tag (gtag.js) - Google Analytics -->

</body>
</html>
