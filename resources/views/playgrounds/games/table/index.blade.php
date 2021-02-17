@extends('layouts.sub')

@section('content')
    <section class="datatable-base page-section-ptb">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="who-we-are-left port-singal">
                        <div class="owl-carousel bottom-center-dots" data-nav-dots="ture" data-items="1" data-md-items="1" data-sm-items="1" data-xs-items="1" data-xx-items="1">
                            <div class="item"><img src="/images/bg/holdem-slide-1.png" alt="">
                            </div>
                            <div class="item"><img src="/images/bg/holdem-slide-2.png" alt="">
                            </div>
                            <div class="item"><img src="/images/bg/holdem-slide-3.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 port-information">
                    <div class="port-title sm-mt-40">
                        <h3 class="mb-30">{{ trans('games.holdem.title') }}</h3>
                    </div>
                    <div class="section-field">
                        <p>{{ trans('games.holdem.detail') }}</p>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <!--<a class="button button-border black small" href="#">{{ trans('games.holdem.menu.point') }}</a>-->
                                <a class="popup-modal button btn-lg" href="{{ route('playground.game.charge', 'holdem') }}">Charge</a>
                            <a class="button button-border black small" href="{{ route('resources', 'notice') }}">{{ trans('games.holdem.menu.notice') }}</a>
                            <a class="button button-border black small" href="#" data-toggle="modal" data-target="#exampleModalCenter">{{ trans('games.holdem.menu.download') }}</a>
                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <div class="modal-title" id="exampleModalLongTitle"><div class="section-title mb-10">
                                                    <h6>Texas Holde'm</h6>
                                                    <h2>{{ trans('games.holdem.modal.download') }}</h2>
                                                    <p>{{ trans('games.holdem.modal.text') }}</p>
                                                </div>
                                            </div>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body text-center">
                                            @if(Auth::check())
                                                <a class="button black" href="{{ route('game.download', 'holdem') }}" > {{ trans('games.holdem.modal.mobile') }}</a>
                                                <!--<a class="button black" href="#"> {{ trans('games.holdem.modal.pc') }}</a>-->
                                            @else
                                                <a class="button black" href="{{ route('sessions.create') }}" > {{ trans('games.holdem.modal.mobile') }}</a>
                                                <!--<a class="button black" href="#"> {{ trans('games.holdem.modal.pc') }}</a>-->
                                            @endif
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('games.holdem.modal.close') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-10">
                        <div class="col-md-12">
                           <!-- <a class="button button-border black small" href="#">{{ trans('games.holdem.menu.Playinfo') }}</a>
                            <a class="button button-border black small" href="{{ route('info.contactus') }}">{{ trans('games.holdem.menu.qa') }}</a>
                            <a class="button button-border black small" href="#">{{ trans('games.holdem.menu.ranking') }}</a>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
