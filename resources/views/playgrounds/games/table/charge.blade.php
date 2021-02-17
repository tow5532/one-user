@extends('layouts.sub')

@section('content')
    <section class="white-bg page-section-ptb">
        <div class="container">

            <div class="row mt-50">
                <div class="col-lg-12 col-md-12">
                    <h2 class="mb-40"><i class="fa fa-angle-right"></i>{{ $id  }} {{ trans('games.charge.title') }}</h2>
                    <div id="formmessage">Success/Error Message Goes Here</div>
                    <form id="sendFrm" name="sendFrm" role="form" method="post" action="{{ route('playground.charge.store') }}">

                        {!! csrf_field() !!}

                        <div class="contact-form clearfix">

                            <div class="row">
                                <div class="section-field col-sm-8">
                                    {{ trans('games.charge.my_in') }}:
                                    <input type="text" class="form-control" name="in_cnt" id="in_cnt" value="{{ $result }}" readonly>
                                </div>
                            </div>

                            <div class="row pt-3">
                                <div class="section-field col-sm-8">
                                    {{ trans('games.charge.chip_amount') }}:
                                    <input type="text" class="form-control" name="amount" id="amount" autocomplete="off">
                                    {!! $errors->first('amount', '<span class="text-danger">:message</span>') !!}
                                </div>
                            </div>

                            <div class="row pt-3">
                                <div class="section-field col-sm-8">
                                    {{ trans('games.charge.cal_amount') }} :
                                    <input type="text" class="form-control" name="chip_cnt" id="chip_cnt" readonly>
                                    {!! $errors->first('in_cnt', '<span class="text-danger">:message</span>') !!}
                                </div>
                            </div>

                            <div class="section-field submit-button">
                                <button id="frmSub" name="submit" type="submit" value="Send" class="button"> {{ trans('games.charge.submit_btn') }} </button>
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
        let rate            = 100;

        $(function () {
            $('#amount').on('keyup', function () {
                if ($(this).val() != null && $(this).val() != '') {
                    var tmps = parseInt($(this).val().replace(/[^0-9]/g, '')) || '0';

                    if(tmps > $('#in_cnt').val()){
                        tmps = '';
                    }

                    $(this).val(tmps);

                    var calcul = $(this).val() *  rate;
                    //console.log('입력값 / 토큰시세  = ' + calcul);

                    $('#chip_cnt').val(calcul);
                }
            })

            $.validator.addMethod("coinAmountRegex", function (value, element) {
                return this.optional(element) ||/^[0-9]*$/.test(value) || /^\d*[.]\d*$/.test(value)
            }, "{{ trans('games.charge.amount_regx') }}");

            $.validator.addMethod("coinAmountMinimum", function (value, element) {
                return ($('#amount').val() < 100) ? false : true;
            }, "{{ trans('games.charge.amount_regx') }}");

            $.validator.addMethod("coinAmountOver", function (value, element) {
                return ($('#amount').val() > $('#in_cnt').val()) ? false : true;
            }, "{{ trans('games.charge.amount_over') }}");

            var validator = $('#sendFrm').validate({
                errorClass: 'text-danger',
                debug: false,
                rules: {
                    amount: {
                        required:true,
                        coinAmountRegex: true,
                        coinAmountMinimum: true,
                        coinAmountOver: true
                    },
                },
                messages: {
                    amount: {
                        required: "{{ trans('games.charge.amount_regx') }}"
                    },
                },
                submitHandler: function(form) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{ route('playground.charge.store') }}" ,
                        type: "POST",
                        data: $('#sendFrm').serialize(),
                        dataType : 'json',
                        beforeSend: function(){
                            $('#frmSub').attr("disabled", true);
                        },
                        success: function( json ) {
                            if (json.success == 'ok'){
                                alert(json.message);
                                document.location.href = "{{ route('point.history') }}";
                            }
                            else {
                                alert(json.message);
                                $('#frmSub').attr("disabled", false);
                            }
                        },
                        complete: function(){
                            //$('#frmSub').attr("disabled", false);
                        },
                        error: function (request,status,error) {
                            alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
                            $('#frmSub').attr("disabled", false);
                        }
                    });
                }
            });
        });
    </script>
@stop
