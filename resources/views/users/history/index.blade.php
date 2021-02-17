@extends('layouts.sub')

@section('content')

    <section class="white-bg page-section-ptb">
        <div class="container">
            <div class="row">


                    <div class="container no-padding">
                        <div class="row justify-content-center no-margin">
                            <div class="col-lg-8">
                                <div class="section-title text-center">
                                    <h4>{{trans('history.title')}}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="row no-margin">
                            <div class="col-lg-12 col-md-12 no-padding">
                                <div class="tab nav-center no-padding">
                                    <div class="tab-content no-padding" id="myTabContent">
                                        <div class="tab-pane fade active show" id="research" role="tabpanel" aria-labelledby="research-tab">
                                            <div class="accordion accordion-border mb-30">
                                                <table class="w-100 table table-bordered table-2 no-padding ">
                                                    <colgroup>
                                                        <col width="10%"  style="text-align: center">
                                                        <col width="*">
                                                        <col width="20%" style="text-align: center">
                                                        <col width="3%" style="text-align: center">
                                                    </colgroup>
                                                    <tr class="item text-center bg-success text-white" style=' background-color:#007bff !important'>
                                                        <th></th>
                                                        <th>{{trans('help.th.memo')}}</th>
                                                        <th>{{trans('help.th.date')}}</th>
                                                        <th></th>
                                                    </tr>
                                                    @if (count($tableData) > 0)
                                                        @foreach($tableData as $key=> $data)
                                                            @php
                                                                $bg_color = ($key % 2 == 0)?"style='background-color:#b8daff !important'":"";
                                                            @endphp
                                                            <tr class="item" {!! $bg_color !!}>
                                                                <td>{{trans('history.code.'.$data->types)}}</td>
                                                                <td><a href="#;" class="item-title">{{trans('history.'.$data->types.'.'.$data->code.'.title')}}</a></td>
                                                                <td>{{$data->created_at}}</td>
                                                                @if($data->types == 'withdrawals' && $data->step_id == 2)
                                                                <td></td>
                                                                @else
                                                                <td><a href="#;" onClick="historyDelete('{{$data->types}}','{{$data->id}}')"><i class="fa fa-trash"></i></a></td>
                                                                @endif
                                                            </tr>
                                                            <tr class="table_hide">
                                                                <td colspan="4">
                                                                    {!! trans('history.'.$data->types.'.'.$data->code.'.content') !!}
                                                                    <br>
                                                                    <b>{{trans('history.Requested')}} : {{number_format($data->amount)}}</b>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                </table>
                                                <a href="javascript:triggerUE4EventBlank('close');" class="button mt-30 pull-right">
                                                    <span>{{trans('auth.button.confirm')}}</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
            </div>
            <div class="text-center">
                {{ $tableData->links() }}
            </div>
        </div>

    </section>
    <style>

        .pagination{ display:block ; margin-left: auto; margin-right: auto;}
        .pagination li{display:inline-block;}
        .table_hide {display:none;}
        .table_show {display:table-row;}
        .item a{color:#212529;}
        .item a:hover{color:#212529;}
        .no-padding{padding:0 !important;}
        .no-margin{margin:0 !important;}
        .table-bordered td, .table-bordered th{
            /*border : 0px !important;*/
            padding: .75rem 0;
        }
		@media all and (max-width:480px) {
		.table-bordered td, .table-bordered th{
           /*border : 0px !important;*/
            padding: .75rem 0;
        }
		.accordion{
		overflow-x:auto; 
		}
		table {


		white-space : nowrap;
		}	
		table td {
		display:table-cell;
		#overflow:hidden;
		text-overflow: ellipsis;
		box-sizing: border-box;
		}	
		table{box-sizing: border-box;}
		.table-bordered td, .table-bordered th{
           /*border : 0px !important;*/
            padding: .75rem 0 !important;
			box-sizing: border-box !important;
        }
		
		.table_show p{padding:1%;}
		}
    </style>

    <script type="text/javascript" src="{{ URL::asset('js/HTMLMenuUE4Connector.js') }}"></script>
@stop
