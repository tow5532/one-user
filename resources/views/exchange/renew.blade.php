@extends('layouts.sub')

@section('content')
    <section class="page-section-ptb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title mb-60 text-center">
                        <h6 class="">{{ trans('wallets.exchange.subTitle') }}</h6>
                        <h2 class="title-effect">{{trans('wallets.exchange.title')}}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 mb-30">
                    <a href="javascript:triggerUE4EventBlank('close');"  class="btn btn-primary pull-right " style="background-color:#007bff;border-color:#007bff" >
                        <span>{{trans('template.button.closegame')}}</span>
                    </a>
                </div>
                <div class="col-lg-6 col-md-6 sub_1">
                    <div class="pricing-table boxed sub_1">
                        <div class="pricing-top">
                            <div class="pricing-title">
                                <h3 class="mb-15">{{trans('wallets.exchange.currentAssets')}}</h3>
                                <p>{!! trans('wallets.exchange.subtitles.0') !!}</p>
                            </div>
                            <div class="pricing-button">
                                <a class="button btn-danger icon x-small" href="{{route('wallet')}}">{{trans('mypage.text.goDeposit')}} <i class="fa fa-long-arrow-right"></i> </a>
                            </div>
                        </div>
                        <div class="pricing-content">
                            <div class="pricing-table-list">
                                <ul class="list-unstyled">
                                    <li><b class="bold_type2">{{trans('wallets.exchange.myDepositAmounts')}}</b><br> <span class="custom_span" id="points">{{number_format($userPoint)}}</span></li>
                                    {{--<li><b>{{trans('wallets.exchange.myHoldemSafeMoney')}}</b><br><span class="custom_span" id="safeMoney">{{number_format($userSafePoint)}}</span></li>--}}
                                    <li><b>{{trans('wallets.exchange.myHoldemMoney')}}</b><br><span class="custom_span" id="texas_holdem">{{number_format($gamePoint)}}</span></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 sub_2">
                    <div class="pricing-table boxed sub_2">
                        <form class="form-row form__auth" role="form"   action="{{ route('exchange.sendGame') }}" method="POST" name="frm2" autocomplete="off">
                            {!! csrf_field() !!}
                            <div class="pricing-top">
                                <div class="pricing-title">
                                    <h3 class="mb-15">{{trans('wallets.exchange.sendGameMoney')}}</h3>
                                    <p>{!! trans('wallets.exchange.subtitles.2') !!}</p>
                                </div>
                                <div class="pricing-button">
                                    <a href="javascript:;" onclick="sendgame_submit_renew(this);" class="button pull-right " style="margin:10px;">
                                        <span>{{trans('auth.button.confirm')}}</span>
                                        <i class="fa fa-check"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="pricing-content">
                                <div class="pricing-table-list">
                                    <ul class="list-unstyled">
                                        <li>
                                            <b class="bold_type1">{{trans('wallets.exchange.from')}} :</b>
                                            <br><b class="bold_type2">{{trans('wallets.exchange.deposit')}}</b>
                                            <br><input id="Amounts" class="Amounts form-control numberOnly3" type="input" placeholder="{{trans('wallets.deposit.inputAmount')}}" name="sg_amounts" >
                                        </li>
                                        <li>
                                            <b class="bold_type1">{{trans('wallets.exchange.to')}} :</b>
                                            <br><b>{{trans('wallets.exchange.myHoldemMoney')}}</b>
                                            <br>
                                            <input type="text" class="form-control sg_exchange" id="sg_exchange" placeholder="" name="sg_exchange" readonly>

                                            <input type="hidden" class="inquote" value="{{$gameInfo->inquote}}">
                                            <input type="hidden" class="outquote" value="{{$gameInfo->outquote}}">
                                        </li>
                                        <li><span class="text-danger sg_error"></span></li>
                                    </ul>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                {{--<div class="col-lg-4 col-md-4 sub_3">--}}
                {{--<div class="pricing-table boxed sub_3">--}}
                {{--<form class="form-row form__auth" role="form"   action="{{ route('exchange.sendDeposits') }}" method="POST" name="frm" autocomplete="off">--}}
                {{--{!! csrf_field() !!}--}}
                {{--<div class="pricing-top">--}}
                {{--<div class="pricing-title">--}}
                {{--<h3 class="mb-15">{{trans('wallets.exchange.sendDeposit')}}</h3>--}}
                {{--<p>{!! trans('wallets.exchange.subtitles.1') !!}</p>--}}

                {{--</div>--}}
                {{--<div class="pricing-button">--}}
                {{--<a href="javascript:;" onclick="senddeposit_submit(this)" class="button pull-right  " style="margin:10px;">--}}
                {{--<span>{{trans('auth.button.confirm')}}</span>--}}
                {{--<i class="fa fa-check"></i>--}}
                {{--</a>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="pricing-content">--}}
                {{--<div class="pricing-table-list">--}}
                {{--<ul class="list-unstyled">--}}
                {{--<li>--}}
                {{--<b  class="bold_type1">{{trans('wallets.exchange.from')}} : </b>--}}
                {{--<br><b>{{trans('wallets.exchange.myHoldemSafeMoney')}}  </b>--}}
                {{--<br> <input id="Amounts" class="Amounts form-control numberOnly4" type="input" placeholder="{{trans('wallets.deposit.inputAmount')}}" name="sd_texas_holdem" >--}}
                {{--{!! $errors->first('amounts', '<br><span class="text-danger ml-5">:message</span>') !!}--}}
                {{--</li>--}}
                {{--<li>--}}
                {{--<b class="bold_type1">{{trans('wallets.exchange.to')}} : </b>--}}
                {{--<br><b class="bold_type2">{{trans('wallets.exchange.deposit')}}  </b>--}}
                {{--<br>--}}
                {{--<input type="text" class="form-control sd_amounts" id="sd_amounts" placeholder="" name="sd_amounts" readonly>--}}


                {{--</li>--}}
                {{--<li><span class="text-danger sd_error"></span></li>--}}
                {{--</ul>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</form>--}}
                {{--</div>--}}
                {{--</div>--}}

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
    <script type="text/javascript" src="{{ URL::asset('js/HTMLMenuUE4Connector.js') }}"></script>
@stop
