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
                                <th class="text-center">{{ trans('point.point_history.kind') }}</th>
                                <th class="text-center">{{ trans('point.point_history.in') }}</th>
                                <th class="text-center">{{ trans('point.point_history.prev_balance') }}</th>
                                <th class="text-center">{{ trans('point.point_history.explain') }}</th>
                                <th class="text-center">{{ trans('point.point_history.date') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($histories as $history)
                                <tr>
                                    @if($history->po_content === 'admin_deposit' || $history->po_content === 'api_deposit')
                                        <td class="text-center">{{ trans('point.point_history.increase') }}</td>
                                        <td class="text-center">{{ number_format($history->point) }}</td>
                                        <td class="text-center">{{ number_format($history->mb_point) }}</td>
                                        <td class="text-center">{{trans('point.point_history.explain_bal')}}</td>
                                    @elseif($history->po_content === 'holdem')
                                        <td class="text-center">{{ trans('point.point_history.deduction') }}</td>
                                        <td class="text-center">{{ number_format($history->use_point) }}</td>
                                        <td class="text-center">{{ number_format($history->mb_point) }}</td>
                                        <td class="text-center">{{trans('point.point_history.explain_holdem')}}</td>
                                    @endif
                                    <td class="text-center">{{ $history->created_at }}</td>
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
                        {{ $histories->links("pagination::bootstrap-4") }}
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
    </script>
@stop
