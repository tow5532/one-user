@extends('layouts.sub')

@section('content')

    <section class="white-bg page-section-ptb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="section-title text-center">
                        <h2 class="title-effect">{{trans('mypage.bank.title')}}</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8">
                    <div class="pb-50 clearfix">

                        <div class="card border-info mb-3 mt-10 pt-10 info">
                            <h5 class="mb-10 ml-10">{{trans('mypage.bank.subTitle')}}</h5>

                                <p class="mt-10 ml-10">- {{trans('mypage.bank.bankTitle')}} : <span class="text-primary">{{Auth::user()->bank }}</span></p>
                                <p class=" ml-10">- {{trans('mypage.bank.holderName')}} : <span class="text-primary">{{Auth::user()->holder }}</span></p>
                                <p class=" ml-10">- {{trans('mypage.bank.accountNumber')}} : <span  class="text-primary">{{Auth::user()->account }}</span></p>

                        </div>
                        <form action="{{ route('mypage.accountRewrite') }}" method="POST" role="form" name="frm" class="form__auth">
                            <h4 class="mt-30 mb-20">{{trans('mypage.text.rewrite')}}</h4>
                            {!! csrf_field() !!}

                            @if ($return = request('return'))
                                <input type="hidden" name="return" value="{{ $return }}">
                            @endif

                            <div class="section-field mb-30">
                                <label class="mb-20 font-weight-bold" for="bank">{{trans('auth.form.bank_title')}} </label>
                                <input id="bank" class="web form-control" type="text" placeholder="{{  trans('auth.form.bank_ex') }}" name="bank" value="{{ old('bank') }}">
                                <span class="text-danger submit_trigger_bank" style="display:none">Not Found Bank</span>
                                {!! $errors->first('bank', '<span class="text-danger">:message</span>') !!}
                            </div>
                            
                            <div class="section-field mb-30">
                                <label class="mb-20 font-weight-bold" for="account">{{ trans('auth.form.bank_account_horder_name') }} </label>
                                <input id="account" class="web form-control" type="text" placeholder="{{trans('auth.form.account_horder_ex') }}" name="holder" value="{{ old('account') }}">
                                <span class="text-danger submit_trigger_holder" style="display:none" >Not Found Holder</span>
                                {!! $errors->first('account', '<span class="text-danger">:message</span>') !!}
                            </div>
							<div class="section-field mb-30">
                                <label class="mb-20 font-weight-bold" for="holder">{{trans('auth.form.bank_account') }} </label>
                                <input id="holder" class="web form-control" type="text" placeholder="{{ trans('auth.form.account_holder')  }}" name="account" value="{{ old('holder') }}">
                                <span class="text-danger submit_trigger_account" style="display:none" >Not Found Account</span>
                                {!! $errors->first('holder', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="form-group" style="text-align: center">

                            </div>
                            <div class="col-lg-12 no-padding">
                                <a href="/" class="button pull-left">
                                    <span>{{trans('auth.button.cancel')}}</span>
                                </a>
                                <a href="javascript:submitform();" class="button pull-right">
                                    <span>{{trans('auth.button.confirm')}}</span>
                                </a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>
        .info p{font-size:16px; line-height: 20px;}
        .no-padding{padding:0 !important;}
    </style>
    <script>
        function submitform(){
            var submit_trigger = true;
            $('.submit_trigger_bank,.submit_trigger_holder,.submit_trigger_account').hide();
            if($("input[name=bank]").val().trim() == ''){
                submit_trigger = false;
                $('.submit_trigger_bank').show();
            }

            if($("input[name=holder]").val().trim() == ''){
                submit_trigger = false;
                $('.submit_trigger_holder').show();
            }

            if($("input[name=account]").val().trim() == ''){
                submit_trigger = false;
                $('.submit_trigger_account').show();
            }

            if (submit_trigger == true) {
                //계좌번호 중복 조회
                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()},
                    type: 'post',
                    url: '/mypage/check/bank',
                    dataType: 'json',
                    data: {
                        bank_account: $("input[name=account]").val()
                    },
                    async:false,    //ajax 부분 완료후 하단 진행
                    success: function (data) {
                        if (!data.result) {
                            submit_trigger = false;
                            var error_text = data.errors;
                            if (error_text != undefined) {
                                $('.submit_trigger_account').show();
                                $('.submit_trigger_account').html(error_text);
                            }
                        }
                    }
                    ,
                    error: function (data) {
                        submit_trigger = false;
                        var error_text = JSON.parse(data.responseText);
                    },
                });
            }

            if(submit_trigger){
                frm.submit();
            }
        }
    </script>
@stop
