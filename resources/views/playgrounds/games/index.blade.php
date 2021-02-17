@extends('layouts.sub')

@section('content')
    <section class="datatable-base page-section-ptb">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="who-we-are-left port-singal">
                        <div class="owl-carousel bottom-center-dots" data-nav-dots="ture" data-items="1" data-md-items="1" data-sm-items="1" data-xs-items="1" data-xx-items="1">
                            <div class="item"><img src="/images/holdem_screen_1.jpg" alt="">
                            </div>
                            <div class="item"><img src="/images/holdem_screen_2.jpg" alt="">
                            </div>
                            <div class="item"><img src="/images/holdem_screen_3.jpg" alt="">
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
                            <a class="button button-border black small" href="#">{{ trans('games.holdem.menu.point') }}</a>
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
                                            <a class="button black" href="#"> {{ trans('games.holdem.modal.mobile') }}</a>
                                            <a class="button black" href="#"> {{ trans('games.holdem.modal.pc') }}</a>
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
                            <a class="button button-border black small" href="#">{{ trans('games.holdem.menu.Playinfo') }}</a>
                            <a class="button button-border black small" href="{{ route('info.contactus') }}">{{ trans('games.holdem.menu.qa') }}</a>
                            <a class="button button-border black small" href="#">{{ trans('games.holdem.menu.ranking') }}</a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row mt-50">
                <div class="col-lg-7">
                    <div class="who-we-are-left port-singal">
                        <div class="owl-carousel bottom-center-dots" data-nav-dots="ture" data-items="1" data-md-items="1" data-sm-items="1" data-xs-items="1" data-xx-items="1">
                            <div class="item"><img src="/images/holdem_screen_1.jpg" alt="">
                            </div>
                            <div class="item"><img src="/images/holdem_screen_2.jpg" alt="">
                            </div>
                            <div class="item"><img src="/images/holdem_screen_3.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 port-information">
                    <div class="port-title sm-mt-40">
                        <h3 class="mb-30">{{ trans('games.kitty.title') }}</h3>
                    </div>
                    <div class="section-field">
                        <p>{{ trans('games.kitty.detail') }}</p>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <a class="button button-border black small" href="#">{{ trans('games.kitty.menu.point') }}</a>
                            <a class="button button-border black small" href="{{ route('resources', 'notice') }}">{{ trans('games.kitty.menu.notice') }}</a>
                            <a class="button button-border black small" href="#" data-toggle="modal" data-target="#exampleModalCenter">{{ trans('games.kitty.menu.download') }}</a>
                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <div class="modal-title" id="exampleModalLongTitle"><div class="section-title mb-10">
                                                    <h6>Texas Holde'm</h6>
                                                    <h2>{{ trans('games.kitty.modal.download') }}</h2>
                                                    <p>{{ trans('games.kitty.modal.text') }}</p>
                                                </div>
                                            </div>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body text-center">
                                            <a class="button black" href="#"> {{ trans('games.kitty.modal.mobile') }}</a>
                                            <a class="button black" href="#"> {{ trans('games.kitty.modal.pc') }}</a>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('games.kitty.modal.close') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-10">
                        <div class="col-md-12">
                            <a class="button button-border black small" href="#">{{ trans('games.kitty.menu.Playinfo') }}</a>
                            <a class="button button-border black small" href="{{ route('info.contactus') }}">{{ trans('games.kitty.menu.qa') }}</a>
                            <a class="button button-border black small" href="#">{{ trans('games.kitty.menu.ranking') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
