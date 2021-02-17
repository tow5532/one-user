@extends('layouts.sub')

@section('content')

    <section class="white-bg page-section-ptb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="section-title text-center">
                        <h6 class="">{{ trans('auth.sessions.title_page') }}</h6>
                        <h2 class="title-effect">{{ trans('auth.sessions.sub_title_page') }}</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="pb-50 clearfix">
                        <form action="{{ route('sessions.store') }}" method="POST" role="form" class="form__auth" name="frm">

                            {!! csrf_field() !!}

                            @if ($return = request('return'))
                                <input type="hidden" name="return" value="{{ $return }}">
                            @endif

                            <div class="section-field mb-20">
                                <label class="mb-10" for="username">{{ trans('auth.form.id') }}* </label>
                                <input id="username" name="username" class="web form-control" type="text" placeholder="{{ trans('auth.placeholder.id') }}" value="{{ old('username') }}">
                                {!! $errors->first('username', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="section-field mb-20">
                                <label class="mb-10" for="password">{{ trans('auth.form.password') }}* </label>
                                <input id="password" class="Password form-control" type="password" placeholder="{{ trans('auth.placeholder.password') }}" name="password">
                                {!! $errors->first('password', '<span class="text-danger">:message</span>')!!}
                            </div>
                        <!--<div class="section-field mb-20">
                            <div class="custom-control custom-checkbox mb-30">
                                <input type="checkbox" class="custom-control-input" id="customControlAutosizing" name="remember">
                                <label class="custom-control-label" for="customControlAutosizing">{{ trans('auth.sessions.remember') }}</label>
                            </div>
                        </div>-->

                            <div class="form-group">
                              
                            </div>
                            <div class="col-lg-12 no-padding">
                            <a href="javascript:triggerUE4EventBlank('close');" class="button">
                                <span>{{trans('auth.button.cancel')}}</span>
                            </a>
                            <a href="javascript:frm.submit();" class="button pull-right">
                                <span>Log in</span>
                                <i class="fa fa-check"></i>
                            </a>
                            </div>
                            <p class="mt-20 mb-0">{!! trans('auth.sessions.ask_registration', ['url' => route('users.create')]) !!}</p>
                        </form>
                    </div>
                    <!--<hr />
                    <div class="login-social mt-50 text-center clearfix">
                        <h4 class="theme-color mb-30">Login with Social media</h4>
                        <ul>
                            <li><a class="fb" href="#"><i class="fa fa-facebook"></i> Log in Facebook</a></li>
                            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i> Log in Twitter</a></li>
                            <li><a class="pinterest" href="#"><i class="fa fa-pinterest-p"></i> Log in google+</a></li>
                        </ul>
                    </div>-->
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript" src="{{ URL::asset('js/HTMLMenuUE4Connector.js') }}"></script>
@stop

@section('script')
    <script>
        $( document ).ready(function() {
            $('#password').on('keypress', function (e) {
                if (e.keyCode == '13'){
                    document.frm.submit();
                }
            })
        });
    </script>
@endsection
