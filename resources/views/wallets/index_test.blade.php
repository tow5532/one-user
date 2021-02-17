@extends('layouts.sub')

@section('content')

    <section class="white-bg page-section-ptb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="section-title text-center">
                        {{--<h6 class="">Log in with your id</h6>--}}
                        <h2 class="title-effect">{{trans('wallets.deposit.title')}}</h2>
                    </div>
                </div>
                <div class="col-lg-10 col-md-12" style="float:none;margin:auto;">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div id="formmessage">Success/Error Message Goes Here</div>
                        </div>
                    </div>
                    <form class="form-row form__auth" role="form"   action="{{ route('deposit.register') }}" method="POST" name="frm" autocomplete="off">
                        {!! csrf_field() !!}

                        @if ($return = request('return'))
                            <input type="hidden" name="return" value="{{ $return }}">
                        @endif

                        <div class="col-lg-3 col-md-3 col-sm-3   ">
                            <div class="form-group align-middle">
                                <label class="mb-10 mt-10 font-weight-bold" for="Amounts">{{trans('wallets.deposit.casherAmounts')}}</label>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-9">
                            <div class="form-group">
                                <input id="Amounts" class="Amounts form-control numberOnly2" type="input" placeholder="{{trans('wallets.deposit.inputAmount')}}" name="amounts" >
                            </div>
                        </div>
                        <span class="text-danger err_amounts"></span>
                        {!! $errors->first('amounts', '<span class="text-danger ml-5">:message</span>') !!}
                        <div class="col-lg-12 col-md-12 col-sm-12 mb-20 "><p class="text-info min_amount font-weight-bold" >*{{trans('wallets.deposit.minimum')}} {{number_format($depositMin)}}{{trans('wallets.deposit.minimum2')}}. {{trans('wallets.deposit.rate_alert')}}</p></div>
                        <div class="col-lg-3 col-md-3 col-sm-3">
                            <div class="form-group">
                                <label class="mb-10 mt-10  font-weight-bold " for="deposit_amounts">{{trans('wallets.deposit.depositAmounts')}}</label>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-9">
                            <div class="form-group">
                                <input type="text" class="form-control deposit_amounts" id="deposit_amounts" placeholder="" name="deposit_amounts" readonly>
                                <input type="hidden" class="inquote" value="{{$inquote}}">
                            </div>
                        </div>
                        {!! $errors->first('game_ck', '<span class="text-danger ml-5">:message</span>') !!}
                    </form>
                    <a href="javascript:triggerUE4EventBlank('close');" class="button" style="background-color:#007bff;border-color:#007bff;text-transform:capitalize;">
                        <span>{{trans('template.button.closegame')}}</span>
                    </a>
                    <a href="javascript:;" class="button pull-right" onclick="deposit_submit_renew(this)">
                        <span>{{trans('auth.button.deposit')}}</span>
                        <i class="fa fa-check"></i>
                    </a>

                    <div class="row alert alert-danger mt-30 user_bank_account " style="background-color:#ffeebd;border-color:#ffeebd;">
                        <div class="col-lg-12 col-md-12 p-0">
                            <div class="col-lg-12 col-md-12 col-sm-12 mt-10"style="padding:0px;">
                                <p class="mb-20 mt-10 font-bold" style=" font-size: 16px;">{{trans('wallets.deposit.user_info.0')}}</p>
                            </div>
                            <ul  class="col-lg-12 col-md-12 col-sm-12  " style="list-style-position: inside; color: black;">
                                <li  class="mb-10 mt-10 ">
                                    <span class="mb-10 mt-10 ">{{trans('wallets.withdrawals.bank')}} : <span class="font-bold text-primary">{{Auth::user()->bank}}</span></span>
                                </li>
                                <li  class="mb-10 mt-10 ">
                                    <span class="mb-10 mt-10 ">{{trans('wallets.withdrawals.bankNumber')}} : <span  class="font-bold text-primary">{{Auth::user()->account}}</span></span>
                                </li>
                                <li  class="mb-10 mt-10 ">
                                    <span class="mb-10 mt-10 ">{{trans('wallets.withdrawals.bankHolder')}} : <span  class="font-bold text-primary">{{Auth::user()->holder}}</span></span>
                                </li>
                            </ul>
                            <div class="col-lg-12 col-md-12 col-sm-12 text-right"><button type="button" class="btn btn-danger" onClick="location.href='{{route('mypage.account')}}'">{{trans('mypage.button.rewrite')}}</button></div>
                        </div>
                    </div>


                    <div class="row alert alert-danger mt-90 return_div" style="display: none;" >
                        <h5 style="text-transform:capitalize;padding:0px;" class="mb-30 mt-10">{{trans('wallets.deposit.deposit_info')}}</h5>
                        <div class="col-lg-12 col-md-12 ">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <p class="mb-10 mt-10  return_account">· {{trans('wallets.deposit.bank')}} : <span class="text-primary"></span></p>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <p class="mb-10 mt-10  return_number ">· {{trans('wallets.deposit.bankNumber')}} : <span class="text-primary"></span></p>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <p class="mb-10 mt-10   return_holder">· {{trans('wallets.deposit.bankHolder')}} : <span class="text-primary"></span></p>
                            </div>
                        </div>
                        <h5 style="text-transform:capitalize;padding:0px;" class="mb-30 mt-30">{{trans('auth.notice.notice')}} </h5>
                        <div class="col-lg-12 col-md-12 ">


                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <p class="mb-10 mt-10 ">- {{trans('wallets.deposit.info.0')}}</p>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <p class="mb-10 mt-10 ">- {{trans('wallets.deposit.info.1')}}</p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </section>

    <style>
        .return_div p,.return_div h5{

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
