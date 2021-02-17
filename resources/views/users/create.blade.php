@extends('layouts.sub')

@section('content')

    <section class="white-bg page-section-ptb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="section-title text-center">
                       <!-- <h6 class="">{{ trans('auth.users.title_page') }}</h6>-->
                        <h2 class="title-effect">{{ trans('auth.users.sub_title') }}</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8">
                    <div class="pb-50 clearfix">
                        <form action="{{ route('users.create') }}" method="POST" role="form" name="frm" class="form__auth">

                            {!! csrf_field() !!}

                            @if ($return = request('return'))
                                <input type="hidden" name="return" value="{{ $return }}">
                            @endif

                            <div class="section-field mb-20">
                                <label class="mb-10 font-weight-bold" for="username">{{ trans('auth.form.id') }}* </label>
                                <input id="id" class="web form-control" type="text" placeholder="{{ trans('auth.placeholder.id') }}" name="id" value="{{ old('id') }}" maxlength="12">
                                {!! $errors->first('id', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="section-field mb-20">
                                <label class="mb-10 font-weight-bold" for="Password">{{ trans('auth.form.password') }}* </label>
                                <input id="password" class="Password form-control" type="password" placeholder="{{ trans('auth.placeholder.password') }}" name="password">
                                {!! $errors->first('password', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="section-field mb-20">
                                <label class="mb-10 font-weight-bold" for="Password">{{ trans('auth.form.password_confirmation') }}* </label>
                                <input id="password_confirmation" class="Password form-control" type="password" placeholder="{{ trans('auth.form.password_confirmation') }}" name="password_confirmation">
                                {!! $errors->first('password_confirmation', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="section-field mb-20">
                                <label class="mb-10 font-weight-bold" for="refer_id">{{ trans('auth.form.refer_id') }}* </label>
                                <input id="refer_id" class="Web form-control" type="text" placeholder="{{ trans('auth.form.refer_id') }}" name="refer_id">
                                {!! $errors->first('refer_id', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <!--<div class="section-field mb-20">
                                <label class="mb-10 font-weight-bold" for="phone">{{ trans('auth.form.facebook')  }} </label>
                                <input id="facebook" class="Web form-control" type="text" placeholder="{{ trans('auth.placeholder.facebook') }}" name="facebook" value="{{ old('facebook') }}">
                                {!! $errors->first('facebook', '<span class="text-danger">:message</span>') !!}
                            </div>-->

                            <div class="col-lg-12 no-padding">
                            <a href="javascript:triggerUE4EventBlank('close');" class="button">
                                <span>{{trans('auth.button.cancel')}}</span>
                            </a>
                            <a href="javascript:frm.submit();" class="button pull-right">
                                <span>{{trans('auth.button.next')}}</span>
                                <i class="fa fa-check"></i>
                            </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>
        .no-padding{padding:0 !important;}
    </style>
    <script type="text/javascript" src="{{ URL::asset('js/HTMLMenuUE4Connector.js') }}"></script>
@stop
