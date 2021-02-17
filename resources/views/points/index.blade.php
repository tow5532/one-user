@extends('layouts.sub')

@section('content')

    <section class="white-bg page-section-ptb">
        <div class="container">
            <div class="row">
                <h3 class="mb-30"><i class="fa fa-angle-right"></i>{{ trans('point.main.abc_title') }} </h3>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>{{ trans('point.main.coin_name') }}</th>
                            <th>{{ trans('point.main.wallet_name') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>SKE</td>
                            <td>0xB5DabD38B9c8ccf7e761CB1CbF2b55bE3d6949D0</td>
                        </tr>
                        <tr>
                            <td>Tobigca</td>
                            <td>0x9Bc2603DE3F2Ba91c119ea73154B00272AEE8C79</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row mt-40">
                <h3 class="mb-30"><i class="fa fa-angle-right"></i>{{ trans('point.main.reg_title') }} </h3>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>{{ trans('point.main.coin_name') }}</th>
                            <th>{{ trans('point.main.wallet_name') }}</th>
                            <th>{{ trans('point.create.del_list') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($wallets as $wallet)
                        <tr>
                            <td>{{ $wallet->name }}</td>
                            <td>{{ $wallet->addr }}</td>
                            <td><a href="javascript:deleteAddr('{{ $wallet->id }}');" id="delbtn" class="badge badge-danger">Delete</a></td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" align="center">{{ trans('wallets.list.nomore') }}</td>
                        </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row justify-content-right">
                <a class="button icon medium" href="{{ route('point.create') }}"> {{ trans('point.main.reg_btn') }} <i class="fa fa-long-arrow-right"></i> </a>
            </div>
            <div class="row mt-50">
                <ul class="list list-hand">
                    <li style="color: #d12326"> {{ trans('point.main.list_notice_4') }} </li>
                    <li> {{ trans('point.main.list_notice_1') }} </li>
                    <li> {{ trans('point.main.list_notice_2') }} </li>
                    <li> {{ trans('point.main.list_notice_3') }} </li>
                </ul>
            </div>
        </div>
    </section>

@stop

@section('script')
    <script>
        $( document ).ready(function() {
        });
        function deleteAddr(str){
            let msg = "{{ trans('point.create.del_confirm') }}";
            if (confirm(msg)){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ route('point.destroy') }}" ,
                    type: "POST",
                    data: {id : str},
                    dataType : 'json',
                    beforeSend: function(){
                    },
                    success: function( json ) {
                        if (json.success == 'ok'){
                            alert(json.message);
                            document.location.href = "{{ route('point') }}";
                        }
                    },
                    error: function (request,status,error) {
                        alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
                    }
                });
            }
        };
    </script>
@endsection
