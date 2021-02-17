@extends('layouts.sub')

@section('content')
    <section id="portfolio" class="portfolio page-section-ptb wihte-bg">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section-title text-center">
                        <!--<h6>Our Portfolio</h6>-->
                        <!--<h2>럭키모나코 게임</h2>-->
                        <img src="/images/lucky.png" width="400" height="150">
                    </div>
                </div>
            </div>
            <div class="row m-4">
                <div class="col-lg-12 col-md-12">
                    <div class="action-box action-box-border">
                        <div class="action-box-text">
                            <h4>처음으로 슬롯을 플레이하기 위해서는 게임을 다운받아서 설치해야 합니다.</h4>
                        </div>
                        <div class="action-box-button">
                            <a class="button" href="{{ route('game.download.slot') }}">
                                <span>럭키모나코 게임 다운로드</span>
                                <i class="fa fa-download"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!--<div class="isotope-filters">
                <button data-filter="" class="active">All</button>
                <button data-filter=".photography">photography</button>
                <button data-filter=".illustration">illustration</button>
                <button data-filter=".branding">branding</button>
                <button data-filter=".web-design">web-design</button>
            </div>-->
            <form method="POST" action="">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            </form>
            <div class="isotope popup-gallery columns-4 no-title">
                <div class="grid-item photography illustration">
                    <div class="portfolio-item"  style="cursor: pointer" onclick="startGame();">
                        <img src="/images/slot/8.png" alt="">
                        <div class="portfolio-overlay">
                            <h4>  Treasure of Zeus </h4>
                            <!--<span class="text-white"> <a href="#"> Photography  </a>| <a href="#">Illustration </a> </span>-->
                        </div>
                        <!--<a class="popup popup-youtube" href="https://www.youtube.com/watch?v=LgvseYYhqU0"><i class="fa fa-play"></i></a>-->
                    </div>
                </div>
                <div class="grid-item photography branding">
                    <div class="portfolio-item"  style="cursor: pointer">
                        <img src="/images/slot/13.png" alt="">
                        <div class="portfolio-overlay">
                            <h4>  WILD Kelly </h4>
                            <!--<span class="text-white"> <a href="#"> Photography  </a>| <a href="#">Branding </a> </span>-->
                        </div>
                        <!--<a class="popup portfolio-img" href="/images/slot/02.jpg"><i class="fa fa-arrows-alt"></i></a>-->
                    </div>
                </div>
                <div class="grid-item photography branding">
                    <div class="portfolio-item"  style="cursor: pointer">
                        <img src="/images/slot/25.png" alt="">
                        <div class="portfolio-overlay">
                            <h4> Gold Bonus </h4>
                            <!--<span class="text-white"> <a href="#"> Photography  </a>| <a href="#">Branding </a> </span>-->
                        </div>
                        <!--<a class="popup portfolio-img" href="/images/slot/02.jpg"><i class="fa fa-arrows-alt"></i></a>-->
                    </div>
                </div>
                <div class="grid-item photography branding">
                    <div class="portfolio-item"  style="cursor: pointer">
                        <img src="/images/slot/27.png" alt="">
                        <div class="portfolio-overlay">
                            <h4> Shot the Cannon </h4>
                            <!--<span class="text-white"> <a href="#"> Photography  </a>| <a href="#">Branding </a> </span>-->
                        </div>
                        <!--<a class="popup portfolio-img" href="/images/slot/02.jpg"><i class="fa fa-arrows-alt"></i></a>-->
                    </div>
                </div>
                <div class="grid-item photography branding">
                    <div class="portfolio-item"  style="cursor: pointer">
                        <img src="/images/slot/28.png" alt="">
                        <div class="portfolio-overlay">
                            <h4>  Buffalo Gold </h4>
                            <!--<span class="text-white"> <a href="#"> Photography  </a>| <a href="#">Branding </a> </span>-->
                        </div>
                        <!--<a class="popup portfolio-img" href="/images/slot/02.jpg"><i class="fa fa-arrows-alt"></i></a>-->
                    </div>
                </div>
                <div class="grid-item photography branding">
                    <div class="portfolio-item"  style="cursor: pointer">
                        <img src="/images/slot/30.png" alt="">
                        <div class="portfolio-overlay">
                            <h4>  Golden Fish </h4>
                            <!--<span class="text-white"> <a href="#"> Photography  </a>| <a href="#">Branding </a> </span>-->
                        </div>
                        <!--<a class="popup portfolio-img" href="/images/slot/02.jpg"><i class="fa fa-arrows-alt"></i></a>-->
                    </div>
                </div>
                <div class="grid-item photography branding">
                    <div class="portfolio-item"  style="cursor: pointer">
                        <img src="/images/slot/35.png" alt="">
                        <div class="portfolio-overlay">
                            <h4 >  King's Knight </h4>
                            <!--<span class="text-white"> <a href="#"> Photography  </a>| <a href="#">Branding </a> </span>-->
                        </div>
                        <!--<a class="popup portfolio-img" href="/images/slot/02.jpg"><i class="fa fa-arrows-alt"></i></a>-->
                    </div>
                </div>
                <div class="grid-item photography branding">
                    <div class="portfolio-item"  style="cursor: pointer">
                        <img src="/images/slot/33.png" alt="">
                        <div class="portfolio-overlay">
                            <h4>  Burning Seven </h4>
                            <!--<span class="text-white"> <a href="#"> Photography  </a>| <a href="#">Branding </a> </span>-->
                        </div>
                        <!--<a class="popup portfolio-img" href="/images/slot/02.jpg"><i class="fa fa-arrows-alt"></i></a>-->
                    </div>
                </div>
                <div class="grid-item photography branding">
                    <div class="portfolio-item"  style="cursor: pointer">
                        <img src="/images/slot/7.png" alt="">
                        <div class="portfolio-overlay">
                            <h4>  Dancing Ladybug</h4>
                            <!--<span class="text-white"> <a href="#"> Photography  </a>| <a href="#">Branding </a> </span>-->
                        </div>
                        <!--<a class="popup portfolio-img" href="/images/slot/02.jpg"><i class="fa fa-arrows-alt"></i></a>-->
                    </div>
                </div>
                <div class="grid-item photography branding">
                    <div class="portfolio-item"  style="cursor: pointer">
                        <img src="/images/slot/19.png" alt="">
                        <div class="portfolio-overlay">
                            <h4>  Child of Happiness </h4>
                            <!--<span class="text-white"> <a href="#"> Photography  </a>| <a href="#">Branding </a> </span>-->
                        </div>
                        <!--<a class="popup portfolio-img" href="/images/slot/02.jpg"><i class="fa fa-arrows-alt"></i></a>-->
                    </div>
                </div>
                <div class="grid-item photography branding">
                    <div class="portfolio-item"  style="cursor: pointer">
                        <img src="/images/slot/34.png" alt="">
                        <div class="portfolio-overlay">
                            <h4> Giant's Lamp </h4>
                            <!--<span class="text-white"> <a href="#"> Photography  </a>| <a href="#">Branding </a> </span>-->
                        </div>
                        <!--<a class="popup portfolio-img" href="/images/slot/02.jpg"><i class="fa fa-arrows-alt"></i></a>-->
                    </div>
                </div>
                <div class="grid-item photography branding">
                    <div class="portfolio-item"  style="cursor: pointer">
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
    <style>
        .custom_span{
            font-weight: normal;margin-left:5px;border:0px !important;box-shadow:none !important; line-height: 18px; height:auto;width:auto;
        }
        .sub_2{
            border-color: #84ba3f !important;
        }
        .sub_3{
            border-color: #c06f05 !important;
        }
        .bold_type1{color:#c00000;}
        .bold_type2{color:#2e75b6;}
        .pricing-table.boxed .pricing-content {width:100%;}
        .pricing-content .pricing-table-list ul li{line-height: 30px;padding-bottom:30px;}
        .pricing-content .pricing-table-list ul li:first-child{padding-top:20px;}
        #mask{
            position:fixed;
            top:0;right:0;bottom:0;left:0;
            display:flex;
            align-items:center;
            justify-content:center;
            width:100%;
            height:100%;
            display:-webkit-flex;
            -webkit-align-item;center;
            -webkit-justify-content:center;
            background: #000;
        }
        .loader {
            margin: 100px auto;
            font-size: 25px;
            width: 1em;
            height: 1em;
            border-radius: 50%;
            position: relative;
            text-indent: -9999em;
            -webkit-animation: load5 1.1s infinite ease;
            animation: load5 1.1s infinite ease;
            -webkit-transform: translateZ(0);
            -ms-transform: translateZ(0);
            transform: translateZ(0);
        }
        @-webkit-keyframes load5 {
            0%,
            100% {
                box-shadow: 0em -2.6em 0em 0em #ffffff, 1.8em -1.8em 0 0em rgba(255, 255, 255, 0.2), 2.5em 0em 0 0em rgba(255, 255, 255, 0.2), 1.75em 1.75em 0 0em rgba(255, 255, 255, 0.2), 0em 2.5em 0 0em rgba(255, 255, 255, 0.2), -1.8em 1.8em 0 0em rgba(255, 255, 255, 0.2), -2.6em 0em 0 0em rgba(255, 255, 255, 0.5), -1.8em -1.8em 0 0em rgba(255, 255, 255, 0.7);
            }
            12.5% {
                box-shadow: 0em -2.6em 0em 0em rgba(255, 255, 255, 0.7), 1.8em -1.8em 0 0em #ffffff, 2.5em 0em 0 0em rgba(255, 255, 255, 0.2), 1.75em 1.75em 0 0em rgba(255, 255, 255, 0.2), 0em 2.5em 0 0em rgba(255, 255, 255, 0.2), -1.8em 1.8em 0 0em rgba(255, 255, 255, 0.2), -2.6em 0em 0 0em rgba(255, 255, 255, 0.2), -1.8em -1.8em 0 0em rgba(255, 255, 255, 0.5);
            }
            25% {
                box-shadow: 0em -2.6em 0em 0em rgba(255, 255, 255, 0.5), 1.8em -1.8em 0 0em rgba(255, 255, 255, 0.7), 2.5em 0em 0 0em #ffffff, 1.75em 1.75em 0 0em rgba(255, 255, 255, 0.2), 0em 2.5em 0 0em rgba(255, 255, 255, 0.2), -1.8em 1.8em 0 0em rgba(255, 255, 255, 0.2), -2.6em 0em 0 0em rgba(255, 255, 255, 0.2), -1.8em -1.8em 0 0em rgba(255, 255, 255, 0.2);
            }
            37.5% {
                box-shadow: 0em -2.6em 0em 0em rgba(255, 255, 255, 0.2), 1.8em -1.8em 0 0em rgba(255, 255, 255, 0.5), 2.5em 0em 0 0em rgba(255, 255, 255, 0.7), 1.75em 1.75em 0 0em #ffffff, 0em 2.5em 0 0em rgba(255, 255, 255, 0.2), -1.8em 1.8em 0 0em rgba(255, 255, 255, 0.2), -2.6em 0em 0 0em rgba(255, 255, 255, 0.2), -1.8em -1.8em 0 0em rgba(255, 255, 255, 0.2);
            }
            50% {
                box-shadow: 0em -2.6em 0em 0em rgba(255, 255, 255, 0.2), 1.8em -1.8em 0 0em rgba(255, 255, 255, 0.2), 2.5em 0em 0 0em rgba(255, 255, 255, 0.5), 1.75em 1.75em 0 0em rgba(255, 255, 255, 0.7), 0em 2.5em 0 0em #ffffff, -1.8em 1.8em 0 0em rgba(255, 255, 255, 0.2), -2.6em 0em 0 0em rgba(255, 255, 255, 0.2), -1.8em -1.8em 0 0em rgba(255, 255, 255, 0.2);
            }
            62.5% {
                box-shadow: 0em -2.6em 0em 0em rgba(255, 255, 255, 0.2), 1.8em -1.8em 0 0em rgba(255, 255, 255, 0.2), 2.5em 0em 0 0em rgba(255, 255, 255, 0.2), 1.75em 1.75em 0 0em rgba(255, 255, 255, 0.5), 0em 2.5em 0 0em rgba(255, 255, 255, 0.7), -1.8em 1.8em 0 0em #ffffff, -2.6em 0em 0 0em rgba(255, 255, 255, 0.2), -1.8em -1.8em 0 0em rgba(255, 255, 255, 0.2);
            }
            75% {
                box-shadow: 0em -2.6em 0em 0em rgba(255, 255, 255, 0.2), 1.8em -1.8em 0 0em rgba(255, 255, 255, 0.2), 2.5em 0em 0 0em rgba(255, 255, 255, 0.2), 1.75em 1.75em 0 0em rgba(255, 255, 255, 0.2), 0em 2.5em 0 0em rgba(255, 255, 255, 0.5), -1.8em 1.8em 0 0em rgba(255, 255, 255, 0.7), -2.6em 0em 0 0em #ffffff, -1.8em -1.8em 0 0em rgba(255, 255, 255, 0.2);
            }
            87.5% {
                box-shadow: 0em -2.6em 0em 0em rgba(255, 255, 255, 0.2), 1.8em -1.8em 0 0em rgba(255, 255, 255, 0.2), 2.5em 0em 0 0em rgba(255, 255, 255, 0.2), 1.75em 1.75em 0 0em rgba(255, 255, 255, 0.2), 0em 2.5em 0 0em rgba(255, 255, 255, 0.2), -1.8em 1.8em 0 0em rgba(255, 255, 255, 0.5), -2.6em 0em 0 0em rgba(255, 255, 255, 0.7), -1.8em -1.8em 0 0em #ffffff;
            }
        }
        @keyframes load5 {
            0%,
            100% {
                box-shadow: 0em -2.6em 0em 0em #ffffff, 1.8em -1.8em 0 0em rgba(255, 255, 255, 0.2), 2.5em 0em 0 0em rgba(255, 255, 255, 0.2), 1.75em 1.75em 0 0em rgba(255, 255, 255, 0.2), 0em 2.5em 0 0em rgba(255, 255, 255, 0.2), -1.8em 1.8em 0 0em rgba(255, 255, 255, 0.2), -2.6em 0em 0 0em rgba(255, 255, 255, 0.5), -1.8em -1.8em 0 0em rgba(255, 255, 255, 0.7);
            }
            12.5% {
                box-shadow: 0em -2.6em 0em 0em rgba(255, 255, 255, 0.7), 1.8em -1.8em 0 0em #ffffff, 2.5em 0em 0 0em rgba(255, 255, 255, 0.2), 1.75em 1.75em 0 0em rgba(255, 255, 255, 0.2), 0em 2.5em 0 0em rgba(255, 255, 255, 0.2), -1.8em 1.8em 0 0em rgba(255, 255, 255, 0.2), -2.6em 0em 0 0em rgba(255, 255, 255, 0.2), -1.8em -1.8em 0 0em rgba(255, 255, 255, 0.5);
            }
            25% {
                box-shadow: 0em -2.6em 0em 0em rgba(255, 255, 255, 0.5), 1.8em -1.8em 0 0em rgba(255, 255, 255, 0.7), 2.5em 0em 0 0em #ffffff, 1.75em 1.75em 0 0em rgba(255, 255, 255, 0.2), 0em 2.5em 0 0em rgba(255, 255, 255, 0.2), -1.8em 1.8em 0 0em rgba(255, 255, 255, 0.2), -2.6em 0em 0 0em rgba(255, 255, 255, 0.2), -1.8em -1.8em 0 0em rgba(255, 255, 255, 0.2);
            }
            37.5% {
                box-shadow: 0em -2.6em 0em 0em rgba(255, 255, 255, 0.2), 1.8em -1.8em 0 0em rgba(255, 255, 255, 0.5), 2.5em 0em 0 0em rgba(255, 255, 255, 0.7), 1.75em 1.75em 0 0em #ffffff, 0em 2.5em 0 0em rgba(255, 255, 255, 0.2), -1.8em 1.8em 0 0em rgba(255, 255, 255, 0.2), -2.6em 0em 0 0em rgba(255, 255, 255, 0.2), -1.8em -1.8em 0 0em rgba(255, 255, 255, 0.2);
            }
            50% {
                box-shadow: 0em -2.6em 0em 0em rgba(255, 255, 255, 0.2), 1.8em -1.8em 0 0em rgba(255, 255, 255, 0.2), 2.5em 0em 0 0em rgba(255, 255, 255, 0.5), 1.75em 1.75em 0 0em rgba(255, 255, 255, 0.7), 0em 2.5em 0 0em #ffffff, -1.8em 1.8em 0 0em rgba(255, 255, 255, 0.2), -2.6em 0em 0 0em rgba(255, 255, 255, 0.2), -1.8em -1.8em 0 0em rgba(255, 255, 255, 0.2);
            }
            62.5% {
                box-shadow: 0em -2.6em 0em 0em rgba(255, 255, 255, 0.2), 1.8em -1.8em 0 0em rgba(255, 255, 255, 0.2), 2.5em 0em 0 0em rgba(255, 255, 255, 0.2), 1.75em 1.75em 0 0em rgba(255, 255, 255, 0.5), 0em 2.5em 0 0em rgba(255, 255, 255, 0.7), -1.8em 1.8em 0 0em #ffffff, -2.6em 0em 0 0em rgba(255, 255, 255, 0.2), -1.8em -1.8em 0 0em rgba(255, 255, 255, 0.2);
            }
            75% {
                box-shadow: 0em -2.6em 0em 0em rgba(255, 255, 255, 0.2), 1.8em -1.8em 0 0em rgba(255, 255, 255, 0.2), 2.5em 0em 0 0em rgba(255, 255, 255, 0.2), 1.75em 1.75em 0 0em rgba(255, 255, 255, 0.2), 0em 2.5em 0 0em rgba(255, 255, 255, 0.5), -1.8em 1.8em 0 0em rgba(255, 255, 255, 0.7), -2.6em 0em 0 0em #ffffff, -1.8em -1.8em 0 0em rgba(255, 255, 255, 0.2);
            }
            87.5% {
                box-shadow: 0em -2.6em 0em 0em rgba(255, 255, 255, 0.2), 1.8em -1.8em 0 0em rgba(255, 255, 255, 0.2), 2.5em 0em 0 0em rgba(255, 255, 255, 0.2), 1.75em 1.75em 0 0em rgba(255, 255, 255, 0.2), 0em 2.5em 0 0em rgba(255, 255, 255, 0.2), -1.8em 1.8em 0 0em rgba(255, 255, 255, 0.5), -2.6em 0em 0 0em rgba(255, 255, 255, 0.7), -1.8em -1.8em 0 0em #ffffff;
            }
        }

    </style>
@stop

@section('script')
    <script>
        var isAjaxRun = false;

        function startGame(){
            alert('게임이 곧 실행 됩니다. 확인을 눌러 주세요.');
            //더블클릭 방지
            if(isAjaxRun == true) {
                return;
            }
            LoadingWithMask();

            $.ajax({
                headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()},
                url: "{{ route('game.slot.start') }}" ,
                type: "POST",
                //data: $('#sendFrm').serialize(),
                async : false,
                dataType : 'json',
                beforeSend: function(){
                    //$('#frmSub').attr("disabled", true);
                    /*$("#ex5").modal({
                        escapeClose: false,
                        clickClose: false,
                        showClose: false,
                        fadeDuration: 100
                    });*/
                },
                success: function( json ) {
                    if (json.success == true){
                        window.open(json.certification_link, '_blank');
                    } else {
                        alert('오류입니다. 잠시후에 다시 이용해 주세요.');
                    }
                    $('#mask').remove();
                    isAjaxRun = false;
                },
                complete: function(){
                   // $('#frmSub').attr("disabled", false);
                },
                error: function () {
                    $('#mask').remove();
                    isAjaxRun = false;
                    //$.modal.close();
                }
            });
        }

        /*$(document).ready(function(){
            $('.portfolio-item').bind('click', function() {
                startGame();
            });
        });*/
    </script>
@stop
