@extends('layouts.sub')

@section('content')
    <section class="page-section-ptb content-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="feature-3 mb-30">
                        <div class="feature-3-info">
                            <h4 class="text-back">{{trans('game.main_1.title')}}</h4>
                            <p>{!! trans('game.main_1.content') !!}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-50">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="feature-3 mb-30">
                        <div class="feature-3-info">
                            <h4 class="text-back">{{trans('game.main_2.title')}}</h4>
                            <p>{!! trans('game.main_2.content') !!}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-50">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="feature-3 mb-30">
                        <div class="feature-3-image mb-20">
                            <img alt="" src="images/game/tourment.jpg" class="img-fluid">
                        </div>
                        <div class="feature-3-info">
                            <h4 class="text-back">{{trans('game.tornament.title')}}</h4>
                            <ul class="list-style-inside">{!! trans('game.tornament.content') !!}</ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="feature-3 mb-30">
                        <div class="feature-3-image mb-20">
                            <img alt="" src="images/game/safe.jpg" class="img-fluid">
                        </div>
                        <div class="feature-3-info">
                            <h4 class="text-back">{{trans('game.safe.title')}}</h4>
                            <ul class="list-style-inside">{!! trans('game.safe.content') !!}</ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-50">
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="feature-3 mb-30">
                        <div class="feature-3-image mb-20">
                            <img alt="" src="images/game/Creative_Private_Table.jpg" class="img-fluid">
                        </div>
                        <div class="feature-3-info">
                            <h4 class="text-back">{{ trans('game.sub_1.title') }}</h4>
                            <ul class="list-style-inside">{!! trans('game.sub_1.content') !!}</ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="feature-3 mb-30">
                        <div class="feature-3-image mb-20">
                            <img alt="" src="images/game/sitandgo.jpg" class="img-fluid">
                        </div>
                        <div class="feature-3-info">
                            <h4 class="text-back">{{ trans('game.sub_2.title') }}</h4>
                            <ul class="list-style-inside">{!! trans('game.sub_2.content') !!}</ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="feature-3 mb-30">
                        <div class="feature-3-image mb-20">
                            <img alt="" src="images/game/friend.jpg" class="img-fluid">
                        </div>
                        <div class="feature-3-info">
                            <h4 class="text-back">{{ trans('game.sub_3.title') }}</h4>
                            <ul class="list-style-inside">{!! trans('game.sub_3.content') !!}</ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="feature-3 mb-30">
                        <div class="feature-3-image mb-20">
                            <img alt="" src="images/game/Auto_Hand_Open.jpg" class="img-fluid">
                        </div>
                        <div class="feature-3-info">
                            <h4 class="text-back">{{ trans('game.sub_4.title') }}</h4>
                            <ul class="list-style-inside">{!! trans('game.sub_4.content') !!}</ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="feature-3 mb-30">
                        <div class="feature-3-image mb-20">
                            <img alt="" src="images/game/Auto_Re-Buy.jpg" class="img-fluid">
                        </div>
                        <div class="feature-3-info">
                            <h4 class="text-back">{{ trans('game.sub_5.title') }}</h4>
                            <ul class="list-style-inside">{!! trans('game.sub_5.content') !!}</ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="feature-3 mb-30">
                        <div class="feature-3-image mb-20">
                            <img alt="" src="images/game/View_Change.jpg" class="img-fluid">
                        </div>
                        <div class="feature-3-info">
                            <h4 class="text-back">{{ trans('game.sub_6.title') }}</h4>
                            <ul class="list-style-inside">{!! trans('game.sub_6.content') !!}</ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="feature-3 mb-30">
                        <div class="feature-3-image mb-20">
                            <img alt="" src="images/game/Ranking.jpg" class="img-fluid">
                        </div>
                        <div class="feature-3-info">
                            <h4 class="text-back">{{ trans('game.sub_7.title') }}</h4>
                            <ul class="list-style-inside">{!! trans('game.sub_7.content') !!}</ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="feature-3 mb-30">
                        <div class="feature-3-image mb-20">
                            <img alt="" src="images/game/Emoticon.jpg" class="img-fluid">
                        </div>
                        <div class="feature-3-info">
                            <h4 class="text-back">{{ trans('game.sub_8.title') }}</h4>
                            <ul class="list-style-inside">{!! trans('game.sub_8.content') !!}</ul>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>
    <style>
        .list-style-inside{
            list-style-position: inside;
        }
        .custrom_color{
            color:#0070D6;
            font-weight: bold;
        }
        .list-style-inside li{
            margin-bottom:5px;
        }
    </style>
@stop
