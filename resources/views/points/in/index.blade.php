@extends('layouts.sub')

@section('content')
    <section class="white-bg page-section-ptb">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">{{ trans('point.main.no') }}</th>
                                <th class="text-center">{{ trans('point.main.in_name') }}</th>
                                <th class="text-center">{{ trans('point.main.in_cnt') }}</th>
                                <th class="text-center">{{ trans('point.main.status') }}</th>
                                <th class="text-center">{{ trans('point.main.in_regdate') }}</th>
                                <th class="text-center">{{ trans('point.history.btn_row') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($deposits as $deposit)
                                <tr>
                                    <td class="text-center">{{ $deposit->id }}</td>
                                    <td class="text-center">{{ $deposit->holder }}</td>
                                    <td class="text-center">{{ $deposit->amount }}</td>
                                    <td class="text-center">
                                        @switch($deposit->step)
                                            @case('reg') {{ trans('point.main.case_reg') }} @break
                                            @case('success') {{ trans('point.main.case_ok') }} @break
                                            @case('cancel') {{trans('point.history.table_status_del')}} @break
                                        @endswitch
                                    </td>
                                    <td class="text-center">{{ \Carbon\Carbon::parse($deposit->created_at)->format('Y-m-d H:i:s') }}</td>
                                    <td>
                                        @switch($deposit->step)
                                            @case('reg') <a href="javascript:goDelete('{{ $deposit->id }}');" class="badge badge-danger">{{ trans('point.history.del_row') }}</a> @break
                                        @endswitch
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" align="center">{{ trans('point.in.no_deposit') }}</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row mt-10">
                <div class="col-lg-12 col-md-12">
                    <nav aria-label="Page navigation example" id="pagingnode">

                    </nav>
                </div>
            </div>
        </div>
    </section>

@stop

@section('script')
    <script>
        $( document ).ready(function() {
            $('.pagination').addClass('justify-content-center');
        });

        function goDelete(id) {
            if (confirm('{{ trans('point.history.confirm_msg') }}')) {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ route('point.in.deleteDeposit') }}",
                    type: "POST",
                    data: {'id': id},
                    dataType: 'json',
                    beforeSend: function () {
                    },
                    success: function (json) {
                        if (json.success == 'ok') {
                            alert(json.message);
                            document.location.href = "{{ route('point.in.history') }}";
                        }
                    },
                    complete: function () {
                    },
                    error: function (request, status, error) {
                        alert("code:" + request.status + "\n" + "message:" + request.responseText + "\n" + "error:" + error);
                    }
                });
            }
        }
    </script>
@stop
