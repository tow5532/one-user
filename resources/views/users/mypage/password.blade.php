@extends('layouts.sub')

@section('content')

    <section class="white-bg page-section-ptb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="section-title text-center">
                        <h6 class="">{{ trans('auth.users.title_page') }}</h6>
                        <h2 class="title-effect">{{ trans('mypage.password.title') }}</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8">
                    <div class="pb-50 clearfix">
                        <form action="{{ route('mypage.passwordRewrite') }}" method="POST" role="form" name="frm" class="form__auth">

                            {!! csrf_field() !!}

                            @if ($return = request('return'))
                                <input type="hidden" name="return" value="{{ $return }}">
                            @endif
                            <div class="section-field mb-20">
                                <label class="mb-10  font-weight-bold" for="Password">{{ trans('auth.form.password') }}* </label>
                                <input id="password" class="Password form-control" type="password" placeholder="{{ trans('auth.placeholder.password') }}" name="current_password">
                                {!! $errors->first('current_password', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="section-field mb-20">
                                <label class="mb-10  font-weight-bold" for="Password">New {{ trans('auth.form.password') }}* </label>
                                <input id="password" class="Password form-control" type="password" placeholder="{{ trans('auth.form.password_new') }}" name="password">
                                {!! $errors->first('password', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="section-field mb-20">
                                <label class="mb-10  font-weight-bold" for="Password">{{ trans('auth.form.password_confirmation') }}* </label>
                                <input id="password_confirmation" class="Password form-control" type="password" placeholder="{{ trans('auth.placeholder.password') }}" name="password_confirmation">
                                {!! $errors->first('password_confirmation', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="col-lg-12 no-padding">
                                <a href="/" class="button pull-left">
                                    <span>Cancel</span>
                                </a>
                                <a href="javascript:frm.submit();" class="button pull-right">
                                    <span>Confirm</span>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>
        .no-padding{padding:0px;}
    </style>
@stop
