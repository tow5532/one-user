@extends('layouts.sub')

@section('content')
    <section class="white-bg page-section-ptb">
        <div class="container">

            <div class="row mt-50">
                <ul class="list list-hand">
                    <li><h3>{{ trans('point.main.list_notice_4') }} </h3></li>
                </ul>
            </div>
            <div class="row mt-50">
                <div class="col-lg-12 col-md-12">
                    <h2 class="mb-40"><i class="fa fa-angle-right"></i>{{ trans('point.in.in_form_txt') }}</h2>
                    <div id="formmessage">Success/Error Message Goes Here</div>
                    <form id="sendFrm" name="sendFrm" role="form" method="post" action="{{ route('point.in.store') }}">

                        {!! csrf_field() !!}

                        <div class="contact-form clearfix">

                            <div class="row">
                                <div class="section-field col-sm-8">
                                    {{ trans('point.in.amount') }}:
                                    <input type="text" class="form-control" name="holder" id="holder" autocomplete="off">
                                    {!! $errors->first('holder', '<span class="text-danger">:message</span>') !!}
                                </div>
                            </div>

                            <div class="row">
                                <div class="section-field col-sm-8">
                                    {{ trans('point.in.amount') }}:
                                    <input type="text" class="form-control" name="amount" id="amount" autocomplete="off">
                                    {!! $errors->first('amount', '<span class="text-danger">:message</span>') !!}
                                </div>
                            </div>

                            <div class="section-field submit-button">
                                <button id="frmSub" name="submit" type="submit" value="Send" class="button"> {{ trans('point.in.send_btn') }} </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@stop

@section('script')
    <!-- jQuery Validate -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script>
        let quote           = 0;

        $(function () {
            $('#amount').on('keyup', function () {
                if ($(this).val() != null && $(this).val() != '') {
                    var tmps = parseInt($(this).val().replace(/[^0-9]/g, '')) || '0';
                    //var tmps2 = tmps.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, '$1,');
                    $(this).val(tmps);
                    console.log('value = ' + tmps);
                    //계산
                    var calcul = $(this).val() /  $('#quote').val();
                    console.log('입력값 / 토큰시세  = ' + calcul);

                    var result = Math.floor(calcul);
                    console.log('버림 = ' + result);

                    $('#in_cnt').val(result);
                }
            })
        });
    </script>
@stop
