@extends('layouts.sub')

@section('content')
<section class="page-section-ptb">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title mb-60 text-center">
                   <!-- <h6>{{trans('mypage.title.0')}}</h6>-->
                    <h2 class="title-effect">{{trans('mypage.title.1')}}</h2>
                    <p>{{trans('mypage.title.2')}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4 border-danger">
                <div class="pricing-table boxed border-danger">
                    <div class="pricing-top">
                        <div class="pricing-title">
                            <h3 class="mb-15">{{trans('mypage.category.bank')}}</h3>
                            <p>{{trans('mypage.subtitle.bank')}}</p>
                        </div>
                        <div class="pricing-button">
                            <a class="button gray icon x-small" href="{{route('mypage.account')}}">{{trans('mypage.text.rewrite')}} <i class="fa fa-long-arrow-right"></i> </a>
                        </div>
                    </div>
                    <div class="pricing-content">
                        <div class="pricing-table-list">
                            <ul class="list-unstyled">
                                    <li><i class="fa fa-check"></i><b>{{trans('mypage.bank.bankTitle')}} :</b><br><span class="custom_span">{{ Auth::user()->bank }}</span></li>
                                    <li><i class="fa fa-check"></i><b>{{trans('mypage.bank.holderName')}} : </b><br><span class="custom_span">{{Auth::user()->holder  }}</span> </li>
                                    <li><i class="fa fa-check"></i><b>{{trans('mypage.bank.accountNumber')}} : </b><br><span class="custom_span">{{ Auth::user()->account }}</span> </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 border-warning">
                <div class="pricing-table boxed border-warning ">
                    <div class="pricing-top">
                        <div class="pricing-title">
                            <h3 class="mb-15">{{trans('mypage.category.profile')}}</h3>
                            <p>{{trans('mypage.subtitle.profile')}}</p>
                        </div>
                        <div class="pricing-button">
                            <a class="button gray icon x-small" href="{{route('exchange')}}">{{trans('mypage.button.moneyExchange')}}<i class="fa fa-long-arrow-right"></i> </a>
                        </div>
                    </div>
                    <div class="pricing-content">
                        <div class="pricing-table-list">
                            <ul class="list-unstyled">
                                <li> <i class="fa fa-check"></i><b>{{trans('auth.form.id')}} : </b> <span class="custom_span" style="padding-left:0px;">{{ Auth::user()->username }}</span></li>
                                <li><i class="fa fa-check"></i><b>{{trans('auth.form.nickname')}} : </b><span class="custom_span">{{ $nickName }}</span></li>
                                <!--<li><i class="fa fa-check"></i><b>{{trans('mypage.text.facebookID')}} : </b><span class="custom_span">{{ Auth::user()->facebook }}</span></li>-->
                                <li> <i class="fa fa-check"></i><b>{{trans('mypage.point.current_deposit_amount')}} : </b><br><span class="custom_span">{{number_format($userPoint)}}</span> </li>
                                <li> <i class="fa fa-check"></i><b>{{trans('mypage.point.holdem_money')}} : </b><br> <span  class="custom_span">{{number_format($gamePoint)}}</span></li>
                                {{--<li> <i class="fa fa-check"></i><b>{{trans('mypage.point.safe_holdem_money')}} : </b><br><span class="custom_span">{{number_format($userSafePoint)}}</span></li>--}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 border-info">
                <div class="pricing-table boxed border-info  ">
                    <div class="pricing-top">
                        <div class="pricing-title">
                            <h3 class="mb-15">{{trans('mypage.category.security')}}</h3>
                            <p>{{trans('mypage.subtitle.security')}}</p>
                        </div>
                    </div>
                    <div class="pricing-content">
                        <div class="pricing-table-list">
                            <ul class="list-unstyled">
                                <li> <i class="fa fa-check"></i> <b>{{trans('mypage.password.change')}}</b><br></li>
                            </ul>
                            <div class="pricing-button">
                                <a class="button gray icon x-small" href="{{route('mypage.password')}}">{{trans('mypage.button.rewrite')}}<i class="fa fa-long-arrow-right"></i> </a>
                            </div>
                            <ul class="list-unstyled mt-30">
                                <li> <i class="fa fa-check"></i> <b>{{trans('mypage.pin_password.change')}}</b><br></li>
                            </ul>
                            <div class="pricing-button">
                                <a class="button gray icon x-small" href={{route('mypage.pincode')}}>{{trans('mypage.button.rewrite')}}<i class="fa fa-long-arrow-right"></i> </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    {{--<section class="white-bg page-section-ptb">--}}
        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--<div class="col-lg-4 col-md-4">--}}
                    {{--<div class="card border-danger mb-3">--}}
                        {{--<div class="card-header">{{trans('mypage.category.profile')}}</div>--}}
                        {{--<div class="card-body">--}}
                            {{--<div class="section-field mb-30">--}}
                                {{--<span class="mb-10">{{trans('auth.form.id')}} :</span>--}}
                                {{--<span class="mb-10">{{ Auth::user()->username }}</span>--}}
                            {{--</div>--}}
                            {{--<div class="section-field mb-30">--}}
                                {{--<span class="mb-10">{{trans('auth.form.nickname')}} :</span>--}}
                                {{--<span class="mb-10">{{ $nickName }}</span>--}}
                            {{--</div>--}}
                            {{--<div class="section-field mb-30">--}}
                                {{--<span class="mb-10">{{trans('auth.form.facebook')}} :</span>--}}
                                {{--<span class="mb-10">{{ Auth::user()->facebook }}</span>--}}
                            {{--</div>--}}
                            {{--<div class="section-field mb-30">--}}
                                {{--<span class="mb-10">{{trans('mypage.point.current_deposit_amount')}} :</span>--}}
                                {{--<span class="mb-10">{{number_format($userPoint)}}</span>--}}
                            {{--</div>--}}
                            {{--<div class="section-field mb-30">--}}
                                {{--<span class="mb-10">{{trans('mypage.point.holdem_money')}} :</span>--}}
                                {{--<span class="mb-10">{{number_format($gamePoint)}}</span>--}}
                            {{--</div>--}}
                            {{--<div class="section-field mb-30">--}}
                                {{--<span class="mb-10">{{trans('mypage.point.safe_holdem_money')}} :</span>--}}
                                {{--<span class="mb-10">{{number_format($userSafePoint)}}</span>--}}
                            {{--</div>--}}
                            {{--<div class="section-field mb-30">--}}
                                {{--<span class="mb-10"><button type="button" class="btn btn-danger btn-xs pull-right" onClick="location.href='{{route('exchange')}}';">{{trans('mypage.button.moneyExchange')}}</button></span>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-lg-4 col-md-4">--}}
                    {{--<div class="card border-warning mb-3">--}}
                        {{--<div class="card-header">{{trans('mypage.category.security')}}</div>--}}
                        {{--<div class="card-body">--}}
                            {{--<div class="section-field mb-30">--}}
                                {{--<span class="mb-10 pb-5 pt-5">{{trans('mypage.password.change')}}</span>--}}
                                {{--<span class="mb-10  "><button type="button" class="btn btn-danger btn-xs " onClick="location.href='{{route('mypage.password')}}';">{{trans('mypage.button.rewrite')}}</button></span>--}}
                            {{--</div>--}}
                            {{--<div class="section-field mb-30">--}}
                                {{--<span class="mb-10 pb-5 pt-5">{{trans('mypage.pin_password.change')}}</span>--}}
                                {{--<span class="mb-10"><button type="button" class="btn btn-danger btn-xs " onClick="location.href='{{route('mypage.pincode')}}';">{{trans('mypage.button.rewrite')}}</button></span>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-lg-4 col-md-4">--}}
                    {{--<div class="card border-info mb-3 ">--}}
                        {{--<div class="card-header">{{trans('mypage.category.bank')}} <button type="button" class="btn btn-danger  pull-right btn-sm" onClick="location.href='{{route('mypage.account')}}';">{{trans('mypage.button.rewrite')}}</button></div>--}}
                        {{--<div class="card-body">--}}
                            {{--<div class="section-field mb-30">--}}
                                {{--<span class="mb-10">{{trans('mypage.bank.bankTitle')}} : </span>--}}
                                {{--<span class="mb-10">{{ Auth::user()->bank }}</span>--}}
                            {{--</div>--}}
                            {{--<div class="section-field mb-30">--}}
                                {{--<span class="mb-10">{{trans('mypage.bank.holderName')}} : </span>--}}
                                {{--<span class="mb-10">{{ Auth::user()->holder }}</span>--}}
                            {{--</div>--}}
                            {{--<div class="section-field mb-30">--}}
                                {{--<span class="mb-10">{{trans('mypage.bank.accountNumber')}} : </span>--}}
                                {{--<span class="mb-10">{{ Auth::user()->account }}</span>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}
    <style>
        .custom_span{
            font-weight: normal;margin-left:5px;border:0px !important;box-shadow:none !important; line-height: 18px; height:auto;width:auto;padding-left:25px;
        }
    </style>
@stop
