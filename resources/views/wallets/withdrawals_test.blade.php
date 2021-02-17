@extends('layouts.sub')

@section('content')

    <section class="white-bg page-section-ptb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="section-title text-center">
                        <h6 class="">{{trans('wallets.withdrawals.subtitle')}}</h6>
                        <h2 class="title-effect">{{trans('wallets.withdrawals.title')}}</h2>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12"  style="float:none;margin:auto;">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div id="formmessage">Success/Error Message Goes Here</div>
                        </div>
                    </div>
                    <form class="form-row form__auth" role="form"   action="{{ route('withdrawals.register') }}" method="POST" name="frm" autocomplete="off">
                        {{--<div class="col-lg-12 col-md-12 text-right">--}}
                        {{--<button type="button" class="btn btn-danger mb-30 " onClick="deposit_reload('{{route('withdrawals.userdeposit')}}')">{{trans('mypage.button.refresh')}}</button>--}}
                        {{--</div>--}}
                        {!! csrf_field() !!}

                        @if ($return = request('return'))
                            <input type="hidden" name="return" value="{{ $return }}">
                        @endif

                        <div class="col-lg-3 col-md-3 col-sm-3   ">
                            <div class="form-group align-middle">
                                <label class="mb-10 mt-10  font-weight-bold " for="Amounts">{{trans('wallets.deposit.depositAmounts')}}</label>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-9">
                            <div class="form-group">
                                <input id="Amounts" class="Amounts form-control numberOnly2" type="input" placeholder="" name="amounts" value="{{number_format($userPoint)}}" readonly>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 mb-20 "><h6 class="text-primary" >*{{trans('wallets.withdrawals.minimum')}} {{number_format($refundMin)}}{{trans('wallets.withdrawals.minimum2')}}.</h6></div>
                        <div class="col-lg-3 col-md-3 col-sm-3">
                            <div class="form-group">
                                <label class="mb-10 mt-10  font-weight-bold" for="withdrawals_amounts">{{trans('wallets.withdrawals.withdrawalsAmounts')}}</label>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-9">
                            <div class="form-group">
                                <input type="text" class="form-control withdrawals_amounts numberOnly2" id="withdrawals_amounts" placeholder="{{trans('wallets.deposit.inputAmount')}}" name="withdrawals_amounts" >
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-3">
                            <div class="form-group">
                                <label class="mb-10 mt-10  font-weight-bold " for="texas_holdem">{{trans('wallets.withdrawals.balanceAmounts')}}</label>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-9">
                            <div class="form-group">
                                <input type="text" class="form-control balance_amounts" id="balance_amounts" placeholder=""  value="{{number_format($userPoint)}}" name="balance_amounts" readonly>
                                <input type="hidden" class="inquote" value="{{$inquote}}">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3">
                            <div class="form-group">
                                <label class="mb-10 mt-10  font-weight-bold " for="pin_password">{{trans('wallets.pinPassword')}}</label>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-9">
                            <div class="form-group">
                                <input type="password" class="form-control pin_password" id="pin_password" placeholder="" name="pin_password[]" maxlength="1" numberOnly>
                                <input type="password" class="form-control pin_password" id="pin_password2" placeholder="" name="pin_password[]"  maxlength="1" numberOnly >
                                <input type="password" class="form-control pin_password" id="pin_password3" placeholder="" name="pin_password[]" maxlength="1" numberOnly>
                                <input type="password" class="form-control pin_password" id="pin_password4" placeholder="" name="pin_password[]" maxlength="1" numberOnly>
                            </div>
                        </div>
                    </form>
                    <div class="row alert alert-danger mt-10 ">
                        <div class="col-lg-12 col-md-12 p-0">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-right"><button type="button" class="btn btn-danger" onClick="location.href='{{route('mypage.account')}}'">{{trans('mypage.button.rewrite')}}</button></div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <p class="mb-10 mt-10 ">{{trans('wallets.withdrawals.bank')}} : <span class="font-bold text-primary">{{Auth::user()->bank}}</span></p>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <p class="mb-10 mt-10 ">{{trans('wallets.withdrawals.bankNumber')}} : <span  class="font-bold text-primary">{{Auth::user()->account}}</span></p>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <p class="mb-10 mt-10 ">{{trans('wallets.withdrawals.bankHolder')}} : <span  class="font-bold text-primary">{{Auth::user()->holder}}</span></p>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 mt-20">
                                <p class="mb-10 mt-10 ">> {{trans('wallets.withdrawals.info.0')}}</p>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <p class="mb-10 mt-10 ">> {{trans('wallets.withdrawals.info.1')}}</p>
                            </div>
                        </div>
                    </div>
                    <p><span class="text-danger ml-5  err_amounts"></span></p>
                    <a href="javascript:triggerUE4EventBlank('close');" class="button" style="background-color:#007bff;border-color:#007bff;text-transform:capitalize;">
                        <span>{{trans('template.button.closegame')}}</span>
                    </a>
                    <a href="javascript:;" onclick="withdrawals_submit_renew(this)" class="button pull-right">
                        <span>{{trans('wallets.menu.withdrawals')}}</span>
                        <i class="fa fa-check"></i>
                    </a>
                </div>

            </div>

        </div>

    </section>
    <style>
        .pin_password{
            width: 10%;

            text-align: center;
            padding-left: 10px;
            padding-right: 10px;
            display:inline-block;
            border :1px solid #dc3545;
        }
        .pin_password:nth-child(2){
            margin-left: 19%;
        }
        .pin_password:nth-child(3){
            margin-left: 19%;
            margin-right:19%;
        }
        .pin_password:after {
            content: "";
            display: block;
            padding-bottom: 100%;
        }
        .no-padding{padding:0 !important;}
        .alert-danger p{ font-size:16px;}
        .btn{text-transform: uppercase;}
        @media ( max-width: 768px ) {
            .pin_password:nth-child(2){
                margin-left: 16%;
            }
            .pin_password:nth-child(3){
                margin-left: 16%;
                margin-right:16%;
            }
        }

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
