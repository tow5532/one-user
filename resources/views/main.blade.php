@extends('layouts.main')

@section('content')

    <!--<section class="page-title parallax" data-jarallax='{"speed": 0.6}' style="background-image: url(/images/bg/home_main.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title-name">

                    </div>
                </div>
            </div>
        </div>
    </section>-->
    <section class="rev-slider">
        <div id="rev_slider_271_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="webster-slider-5" data-source="gallery" style="margin:0px auto;background:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
            <!-- START REVOLUTION SLIDER 5.4.6.3 auto mode -->
            <div id="rev_slider_271_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.4.6.3">
                <ul>  <!-- SLIDE  -->
                    <li data-index="rs-762" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="300"  data-thumb="/images/main/left.jpg"  data-rotate="0"  data-saveperformance="off"  data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                        <!-- MAIN IMAGE -->
                        <img src="/images/main/slider/main01.jpg"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                    </li>
                    <!-- SLIDE  -->
                    <li data-index="rs-763" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="300"  data-thumb="/images/main/left.jpg"  data-rotate="0"  data-saveperformance="off"  data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                        <!-- MAIN IMAGE -->
                        <img src="/images/main/slider/main02.jpg"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                        <!-- LAYERS -->
                    </li>
                    <li data-index="rs-764" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="300"  data-thumb="/images/main/left.jpg"  data-rotate="0"  data-saveperformance="off"  data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                        <!-- MAIN IMAGE -->
                        <img src="/images/main/slider/main03.jpg"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                        <!-- LAYERS -->
                    </li>
                </ul>
                <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div> </div>
        </div>
    </section>

    <section id="portfolio" class="portfolio page-section-ptb black-bg">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section-title text-center">
                        <!--<h6>Our Portfolio</h6>-->
                        <!--<h2>럭키모나코</h2>-->
                        <img src="/images/main/lucky.png" width="400" height="150">
                    </div>
                </div>
            </div>
            <div class="isotope popup-gallery columns-4 no-title">
                <div class="grid-item photography illustration">
                    <div class="portfolio-item" onclick="startGame()" style="cursor: pointer">
                       <img src="/images/slot/8.png" alt="">
                        <div class="portfolio-overlay">
                            <h4>  Treasure of Zeus </h4>
                            <!--<span class="text-white"> <a href="#"> Photography  </a>| <a href="#">Illustration </a> </span>-->
                        </div>
                        <!--<a class="popup popup-youtube" href="https://www.youtube.com/watch?v=LgvseYYhqU0"><i class="fa fa-play"></i></a>-->
                    </div>
                </div>
                <div class="grid-item photography branding">
                    <div class="portfolio-item" onclick="startGame()" style="cursor: pointer">
                        <img src="/images/slot/13.png" alt="">
                        <div class="portfolio-overlay">
                            <h4>  WILD Kelly </h4>
                            <!--<span class="text-white"> <a href="#"> Photography  </a>| <a href="#">Branding </a> </span>-->
                        </div>
                        <!--<a class="popup portfolio-img" href="/images/slot/02.jpg"><i class="fa fa-arrows-alt"></i></a>-->
                    </div>
                </div>
                <div class="grid-item photography branding">
                    <div class="portfolio-item" onclick="startGame()" style="cursor: pointer">
                        <img src="/images/slot/25.png" alt="">
                        <div class="portfolio-overlay">
                            <h4> Gold Bonus </h4>
                            <!--<span class="text-white"> <a href="#"> Photography  </a>| <a href="#">Branding </a> </span>-->
                        </div>
                        <!--<a class="popup portfolio-img" href="/images/slot/02.jpg"><i class="fa fa-arrows-alt"></i></a>-->
                    </div>
                </div>
                <div class="grid-item photography branding">
                    <div class="portfolio-item" onclick="startGame()" style="cursor: pointer">
                        <img src="/images/slot/27.png" alt="">
                        <div class="portfolio-overlay">
                            <h4> Shot the Cannon </h4>
                            <!--<span class="text-white"> <a href="#"> Photography  </a>| <a href="#">Branding </a> </span>-->
                        </div>
                        <!--<a class="popup portfolio-img" href="/images/slot/02.jpg"><i class="fa fa-arrows-alt"></i></a>-->
                    </div>
                </div>
                <div class="grid-item photography branding">
                   <div class="portfolio-item" onclick="startGame()" style="cursor: pointer">
                        <img src="/images/slot/28.png" alt="">
                        <div class="portfolio-overlay">
                            <h4>  Buffalo Gold </h4>
                            <!--<span class="text-white"> <a href="#"> Photography  </a>| <a href="#">Branding </a> </span>-->
                        </div>
                        <!--<a class="popup portfolio-img" href="/images/slot/02.jpg"><i class="fa fa-arrows-alt"></i></a>-->
                    </div>
                </div>
                <div class="grid-item photography branding">
                   <div class="portfolio-item" onclick="startGame()" style="cursor: pointer">
                        <img src="/images/slot/30.png" alt="">
                        <div class="portfolio-overlay">
                            <h4>  Golden Fish </h4>
                            <!--<span class="text-white"> <a href="#"> Photography  </a>| <a href="#">Branding </a> </span>-->
                        </div>
                        <!--<a class="popup portfolio-img" href="/images/slot/02.jpg"><i class="fa fa-arrows-alt"></i></a>-->
                    </div>
                </div>
                <div class="grid-item photography branding">
                   <div class="portfolio-item" onclick="startGame()" style="cursor: pointer">
                        <img src="/images/slot/35.png" alt="">
                        <div class="portfolio-overlay">
                            <h4 >  King's Knight </h4>
                            <!--<span class="text-white"> <a href="#"> Photography  </a>| <a href="#">Branding </a> </span>-->
                        </div>
                        <!--<a class="popup portfolio-img" href="/images/slot/02.jpg"><i class="fa fa-arrows-alt"></i></a>-->
                    </div>
                </div>
                <div class="grid-item photography branding">
                   <div class="portfolio-item" onclick="startGame()" style="cursor: pointer">
                        <img src="/images/slot/33.png" alt="">
                        <div class="portfolio-overlay">
                            <h4>  Burning Seven </h4>
                            <!--<span class="text-white"> <a href="#"> Photography  </a>| <a href="#">Branding </a> </span>-->
                        </div>
                        <!--<a class="popup portfolio-img" href="/images/slot/02.jpg"><i class="fa fa-arrows-alt"></i></a>-->
                    </div>
                </div>
                <div class="grid-item photography branding">
                   <div class="portfolio-item" onclick="startGame()" style="cursor: pointer">
                        <img src="/images/slot/7.png" alt="">
                        <div class="portfolio-overlay">
                            <h4>  Dancing Ladybug</h4>
                            <!--<span class="text-white"> <a href="#"> Photography  </a>| <a href="#">Branding </a> </span>-->
                        </div>
                        <!--<a class="popup portfolio-img" href="/images/slot/02.jpg"><i class="fa fa-arrows-alt"></i></a>-->
                    </div>
                </div>
                <div class="grid-item photography branding">
                   <div class="portfolio-item" onclick="startGame()" style="cursor: pointer">
                        <img src="/images/slot/19.png" alt="">
                        <div class="portfolio-overlay">
                            <h4>  Child of Happiness </h4>
                            <!--<span class="text-white"> <a href="#"> Photography  </a>| <a href="#">Branding </a> </span>-->
                        </div>
                        <!--<a class="popup portfolio-img" href="/images/slot/02.jpg"><i class="fa fa-arrows-alt"></i></a>-->
                    </div>
                </div>
                <div class="grid-item photography branding">
                   <div class="portfolio-item" onclick="startGame()" style="cursor: pointer">
                        <img src="/images/slot/34.png" alt="">
                        <div class="portfolio-overlay">
                            <h4> Giant's Lamp </h4>
                            <!--<span class="text-white"> <a href="#"> Photography  </a>| <a href="#">Branding </a> </span>-->
                        </div>
                        <!--<a class="popup portfolio-img" href="/images/slot/02.jpg"><i class="fa fa-arrows-alt"></i></a>-->
                    </div>
                </div>
                <div class="grid-item photography branding">
                   <div class="portfolio-item" onclick="startGame()" style="cursor: pointer">
                        <img src="/images/slot/2.png" alt="">
                        <div class="portfolio-overlay">
                            <h4> Kelly's Wheel Double </h4>
                            <!--<span class="text-white"> <a href="#"> Photography  </a>| <a href="#">Branding </a> </span>-->
                        </div>
                        <!--<a class="popup portfolio-img" href="/images/slot/02.jpg"><i class="fa fa-arrows-alt"></i></a>-->
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{--<section class="custom-content-02 white-bg-bg page-section-ptb">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 mb-60">
                    <div class="feature-text left-icon">
                        <div class="feature-icon">
                            <span class="ti-layers-alt"></span>
                        </div>
                        <div class="feature-info">
                            <h5 class="text-back">{{trans('main.layer2.0.title')}}</h5>
                            <p>{{trans('main.layer2.0.content')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 mb-60">
                    <div class="feature-text left-icon">
                        <div class="feature-icon">
                            <span class="ti-mouse"></span>
                        </div>
                        <div class="feature-info">
                            <h5 class="text-back">{{trans('main.layer2.1.title')}}</h5>
                            <p>{{trans('main.layer2.1.content')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 mb-60">
                    <div class="feature-text left-icon">
                        <div class="feature-icon">
                            <span class="ti-hand-open"></span>
                        </div>
                        <div class="feature-info">
                            <h5 class="text-back">{{trans('main.layer2.2.title')}}</h5>
                            <p>{{trans('main.layer2.2.content')}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 xs-mb-40">
                    <div class="feature-text left-icon">
                        <div class="feature-icon">
                            <span class="ti-desktop"></span>
                        </div>
                        <div class="feature-info">
                            <h5 class="text-back">{{trans('main.layer2.3.title')}}</h5>
                            <p>{{trans('main.layer2.3.content')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 xs-mb-40 xs-mt-20">
                    <div class="feature-text left-icon">
                        <div class="feature-icon">
                            <span class="ti-headphone "></span>
                        </div>
                        <div class="feature-info">
                            <h5 class="text-back">{{trans('main.layer2.4.title')}}</h5>
                            <p>{{trans('main.layer2.4.content')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 xs-mt-20">
                    <div class="feature-text left-icon">
                        <div class="feature-icon">
                            <span class="ti-shield"></span>
                        </div>
                        <div class="feature-info">
                            <h5 class="text-back">{{trans('main.layer2.5.title')}}</h5>
                            <p>{{trans('main.layer2.5.content')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>--}}

    {{--<section class="mobile-app-about page-section-ptb mt-100">
        <div class="container" style="background: url('/images/main/banner-download.jpg')">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <a class="button  black large" href="{{route('game.slot')}}">{{trans('main.layer3.button.1')}}</a>
                </div>
            </div>
        </div>
    </section>--}}
    <section class="mobile-app-about page-section-ptb bg-overlay-theme-90 parallax" data-jarallax="{&quot;speed&quot;: 0.6}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h2 class="text-custom-black mb_custom_title">{{trans('main.layer3.title')}}</h2>
                    <strong class="text-custom-black">{{trans('main.layer3.content')}} <br> {{trans('main.layer3.content2')}}</strong>
                    {{--<a class="button  black large" href="{{route('game.download.android')}}" type="application/vnd.android.package-archive">{{trans('main.layer3.button.0')}}</a>--}}
                    <a class="button  black large" href="{{route('game.slot')}}">{{trans('main.layer3.button.1')}}</a>

                </div>
            </div>
        </div>
    </section>


    <!--<section class="full-width full-height page-section-ptb black-bg" style="background-image:url('/images/main/banner-download2.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="action-box-text" style="height: 235px;">
                    </div>
                </div>
            </div>
        </div>
    </section>-->

    <section class="blockquote-section page-section-ptb black-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-7 text-left blockquote-section-left">
                    <blockquote class="blockquote quote">
                        <h3 class="text-white">1. 슬롯을 다운 받는다</h3>
                        <h3 class="text-white">2. 다운받은 게임을 실행하여 설치</h3>
                        <h3 class="text-white">3. 원라인게임 사이트로 돌아온다</h3>
                        <h3 class="text-white">4. 원하는 슬롯 게임 클릭하여 플레이</h3>
                        <h3 class="text-white">* 최초 1회만 설치하면 됩니다</h3>
                    </blockquote>
                    <!--<img class="img-fluid" src="/images/main/mid01.jpg" alt="">-->
                </div>
                <div class="col-sm-5 blockquote-section-right">
                    <!--<img class="img-fluid" src="/images/sub_about.jpg" alt="">-->
                    <img class="img-fluid" src="/images/main/mid02.jpg" alt="">
                </div>
            </div>
        </div>
    </section>



    <style>
        @media (max-width: 479px){
            .mobile-app-about h2 {
                font-size: 50px !important;
                line-height: 50px !important;
            }
            .mobile-app-about .button{
                margin-bottom:20px;
            }
        }
		.black:hover{
		border-color:#353535 !important;
		}
    </style>
    @if(session()->has('alert'))
        <script>
            alert('{{ session()->get('alert') }}');
        </script>
    @endif
@stop

@section('script')
    <script>
        function startGame(){
            document.location.href = "{{ route('game.slot') }}";
        }
    </script>
@stop
