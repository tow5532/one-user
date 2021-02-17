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

    @include('layouts.partial.navi')

    @include('layouts.partial.title')

    @include('flash::message')

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

<script type="text/javascript">
    $(function(){
        var article = (".table .table_show");
        $(".table .item  td").click(function() {
            var myArticle =$(this).parents().next("tr");
            if($(myArticle).hasClass('table_hide')) {
                $(article).removeClass('table_show').addClass('table_hide');
                $(myArticle).removeClass('table_hide').addClass('table_show');
            }
            else {
                $(myArticle).addClass('table_hide').removeClass('table_show');
            }
        });

    });
    function helpDelete(idx){

        if(confirm('Are you sure you want to delete?')){
            location.href='/help/delete/'+idx;
        }else{
            return false;
        }
    }
</script>
</body>
</html>
