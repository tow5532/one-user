@extends('layouts.sub')

@section('content')

    <section class="white-bg page-section-ptb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="section-title text-center">
                        <h6 class="">{{ trans('wallets.exchange.subTitle') }}</h6>
                        <h2 class="title-effect">{{trans('wallets.exchange.title')}}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div id="formmessage">Success/Error Message Goes Here</div>
                        </div>
                    </div>
                    <div class="card  mb-3  pb-10 pt-10 pl-10 pr-10 border-warning bg-warning "  >

                    <form class="form-row ">
                        <div class="col-lg-12 ">
                            <h4 class="mb-30 d-table p-1" style="background-color:#bf9000;color:#ffffff;float: left;">{{trans('wallets.exchange.currentAssets')}}</h4>
                            <button type="button" class="btn btn-danger mb-30 pull-right" style="text-transform: uppercase; margin-left:10px;" onclick="deposit_refrash_exchange();">{{trans('mypage.button.refresh')}}</button>
                            <a href="javascript:triggerUE4EventBlank('close');" style="text-transform: uppercase;" class="btn btn-danger pull-right " >
                                <span>{{trans('auth.button.cancel')}}</span>
                            </a>

                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5   ">
                            <div class="form-group align-middle">
                                <label class="mb-10 mt-10 ml-3" for="points">{{trans('wallets.exchange.myDepositAmounts')}}</label>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-7">
                            <div class="form-group">
                                <input id="points" class="Amounts form-control" type="input" placeholder="" value="{{number_format($userPoint)}}" disabled >
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5">
                            <div class="form-group">
                              <label class="mb-10 mt-10 ml-3" for="texas_holdem">{{trans('wallets.exchange.myHoldemMoney')}}</label>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-7">
                            <div class="form-group">
                                <input type="text" class="form-control" id="texas_holdem" placeholder="" value="{{number_format($gamePoint)}}" disabled>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5">
                            <div class="form-group">
                                <label class="mb-10 mt-10 ml-3" >{{trans('wallets.exchange.myHoldemSafeMoney')}}</label>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-7">
                            <div class="form-group">
                                <input type="text" class="form-control"  id="safeMoney" placeholder="" value="{{number_format($userSafePoint)}}" disabled>
                            </div>
                        </div>
                    </form>
                    </div>
                    <div class="card mb-3 pb-10 pt-10 pl-10 pr-10 " style="border-color:#FFE699; background-color: #FFE699">


                    <form class="form-row form__auth" role="form"   action="{{ route('exchange.sendDeposits') }}" method="POST" name="frm" autocomplete="off">
                        <div class="col-lg-12">
                            <h4 class="mb-30 d-table p-1" style="background-color:#ED8137;float: left;">{{trans('wallets.exchange.sendDeposit')}}</h4>
                        </div>
                        {!! csrf_field() !!}
                        <div class="col-lg-5 col-md-5 col-sm-5   ">
                            <div class="form-group align-middle">
                                <p class="col-lg-2 d-inline-block font-weight-bold">{{trans('wallets.exchange.from')}}</p> <p class="mb-10 mt-10 col-lg-8 d-inline-block" for="Amounts">{{trans('mypage.point.safe_holdem_money')}}</p>
                                <input type="hidden" class="inquote" value="{{$gameInfo->chip_rate}}">
                                <input type="hidden" class="outquote" value="{{$gameInfo->chip_rate}}">
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-7">
                            <div class="form-group">
                                <input id="Amounts" class="Amounts form-control numberOnly4" type="input" placeholder="" name="sd_texas_holdem" >
                            </div>
                        </div>
                        {!! $errors->first('amounts', '<span class="text-danger ml-5">:message</span>') !!}
                        <div class="col-lg-5 col-md-5 col-sm-5">
                            <div class="form-group">
                                <p class="col-lg-2 d-inline-block font-weight-bold">{{trans('wallets.exchange.to')}}</p> <p class="mb-10 mt-10 col-lg-8 d-inline-block" for="sd_amounts">{{trans('wallets.exchange.deposit')}}</p>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-7">
                            <div class="form-group">
                                <input type="text" class="form-control sd_amounts" id="sd_amounts" placeholder="" name="sd_amounts" readonly>
                                <input type="hidden" class="inquote" value="">
                            </div>
                            <span class="text-danger ml-5  sd_error"></span>

                            <a href="javascript:;" onclick="senddeposit_submit(this)" class="button pull-right col-lg-3 " style="margin:10px;">
                                <span>{{trans('auth.button.confirm')}}</span>
                                <i class="fa fa-check"></i>
                            </a>
                        </div>

                    </form>


                    </div>
                    <div class="card  mb-3  pb-10 pt-10 pl-10 pr-10 " style="border-color:#fff1c8; background-color: #fff1c8">
                    <form class="form-row form__auth" role="form"   action="{{ route('exchange.sendGame') }}" method="POST" name="frm2" autocomplete="off">
                        <div class="col-lg-12 ">
                            <h4 class="mb-30 d-table p-1" style="background-color:#ffd966;float: left;">{{trans('wallets.exchange.sendGameMoney')}}</h4>

                        </div>
                        {!! csrf_field() !!}

                        <div class="col-lg-5 col-md-5 col-sm-5   ">
                            <div class="form-group align-middle">
                                <p class="col-lg-2 d-inline-block font-weight-bold">{{trans('wallets.exchange.from')}}</p><p class="mb-10 mt-10 col-lg-8 d-inline-block" for="Amounts">{{trans('wallets.exchange.deposit')}}</p>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-7">
                            <div class="form-group">
                                <input id="Amounts" class="Amounts form-control numberOnly3" type="input" placeholder="" name="sg_amounts" >
                            </div>
                        </div>
                        {!! $errors->first('amounts', '<span class="text-danger ml-5">:message</span>') !!}
                        <div class="col-lg-5 col-md-5 col-sm-5">
                            <div class="form-group">
                                <p class="col-lg-2 d-inline-block font-weight-bold">{{trans('wallets.exchange.to')}}</p><p class="mb-10 mt-10 col-lg-8 d-inline-block" for="sg_exchange">{{trans('mypage.point.holdem_money')}}</p>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-7">
                            <div class="form-group">
                                <input type="text" class="form-control sg_exchange" id="sg_exchange" placeholder="" name="sg_exchange" readonly>
                                <input type="hidden" class="inquote" value="">
                            </div>
                            <span class="text-danger ml-5  sg_error"></span>

                            <a href="javascript:;" onclick="sendgame_submit(this)" class="button pull-right col-lg-3 " stype="margin:10px;">
                                <span>{{trans('auth.button.confirm')}}</span>
                                <i class="fa fa-check"></i>
                            </a>
                        </div>

                    </form>


                    </div>






                </div>

            </div>
            <div class="row">
                <div class="col-lg-12 ">
                    <div class="col-lg-12 mt-50">
                        <div class="feature-1-info p-10">
                            <h4 >Remember</h4>
                            <ul class="list-style-inside">
                                <li>Deposit amounts can only be sent to the game's money.</li>
                                <li>You can not send Game Money directly as Deposits.</li>
                                <li>Sending Game’s money as Safe money is only available in the Game Dapp.</li>
                                <li>Safe money can only be sent as Deposits.</li>
                                <li>Finally, withdrawals can only be made with the Deposit amount.</li>
                            </ul>
                            <div class="feature-3-image mt-20 mb-20">
                                <img alt="" src="images/20200808_133531.png" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>

    <style>
        .form-row p{
            font-size:16px;
        }
        .list-style-inside{
            list-style-position: inside;
        }
        .custrom_color{
            color:#0070D6;
            font-weight: bold;
        }
        .list-style-inside li{
            margin-bottom:5px;
            font-size:18px;
        }
    </style>
    <script type="text/javascript" src="{{ URL::asset('js/HTMLMenuUE4Connector.js') }}"></script>
@stop
