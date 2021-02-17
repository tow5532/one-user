@extends('layouts.sub')

@section('content')

    <section class="white-bg page-section-ptb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="section-title text-center">
                        <h2 class="title-effect">{{ trans('auth.createPincode.title') }}</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8">
                    <div class="pb-50 clearfix">
                        <form action="{{ route('mypage.pincodeRewrite') }}" method="POST" role="form" name="frm" class="form__auth">

                            {!! csrf_field() !!}

                            @if ($return = request('return'))
                                <input type="hidden" name="return" value="{{ $return }}">
                            @endif
                            <div class="section-field mb-20">
                                <label class="mb-10  font-weight-bold" for="pin_password">{{trans('mypage.pin_password.current')}}* </label>
                                <div class="form-group">
                                    <input type="password" class="form-control pin_password" id="pin_password" placeholder="" name="current_pin_password[]" maxlength="1" numberOnly>
                                    <input type="password" class="form-control pin_password" id="pin_password2" placeholder="" name="current_pin_password[]"  maxlength="1" numberOnly >
                                    <input type="password" class="form-control pin_password" id="pin_password3" placeholder="" name="current_pin_password[]" maxlength="1" numberOnly>
                                    <input type="password" class="form-control pin_password" id="pin_password4" placeholder="" name="current_pin_password[]" maxlength="1" numberOnly>
                                </div>
                            </div>
                            <div class="section-field mb-20">
                                <label class="mb-10  font-weight-bold" for="pin_password">{{trans('mypage.pin_password.newPincode')}}* </label>
                                <div class="form-group">
                                    <input type="password" class="form-control pin_password" id="pin_password" placeholder="" name="pin_password[]" maxlength="1" numberOnly>
                                    <input type="password" class="form-control pin_password" id="pin_password2" placeholder="" name="pin_password[]"  maxlength="1" numberOnly >
                                    <input type="password" class="form-control pin_password" id="pin_password3" placeholder="" name="pin_password[]" maxlength="1" numberOnly>
                                    <input type="password" class="form-control pin_password" id="pin_password4" placeholder="" name="pin_password[]" maxlength="1" numberOnly>
                                </div>
                            </div>
                            <div class="section-field mb-20">
                                <label class="mb-10  font-weight-bold" for="refer_id">{{trans('mypage.pin_password.confirmNewPincode')}}* </label>
                                <div class="form-group">
                                    <input type="password" class="form-control pin_password" id="pin_password_confirm" placeholder="" name="pin_password_confirm[]" maxlength="1" numberOnly>
                                    <input type="password" class="form-control pin_password" id="pin_password_confirm2" placeholder="" name="pin_password_confirm[]"  maxlength="1" numberOnly >
                                    <input type="password" class="form-control pin_password" id="pin_password_confirm3" placeholder="" name="pin_password_confirm[]" maxlength="1" numberOnly>
                                    <input type="password" class="form-control pin_password" id="pin_password_confirm4" placeholder="" name="pin_password_confirm[]" maxlength="1" numberOnly>
                                </div>
                                {!! $errors->first('pin_error', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <a href="/" class="button pull-left">
                                <span>{{trans('auth.button.cancel')}}</span>
                            </a>
                            <a href="javascript:frm.submit();" class="button pull-right">
                                <span>{{trans('auth.button.confirm')}}</span>
                            </a>
                        </form>
                    </div>
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
            margin-left: 18.5%;
        }
        .pin_password:nth-child(3){
            margin-left: 18.5%;
            margin-right:18.5%;
        }
        .pin_password:after {
            content: "";
            display: block;
            padding-bottom: 100%;
        }
        .no-padding{padding:0 !important;}
    </style>
@stop
