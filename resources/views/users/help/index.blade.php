@extends('layouts.sub')

@section('content')

    <section class="white-bg page-section-ptb">
        <div class="container">
            <div class="row">

                        <div class="container no-padding">
                            <div class="row justify-content-center no-margin">
                                <div class="col-lg-8">
                                    <div class="section-title text-center">
                                        <h4>{{trans('help.help.title')}}</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="row no-margin">
                                <div class="col-lg-12 col-md-12 no-padding">
                                    <div class="tab nav-center no-padding">
                                        <div class="tab-content no-padding" id="myTabContent">
                                            <div class="tab-pane fade active show" id="research" role="tabpanel" aria-labelledby="research-tab">
                                                <div class="accordion accordion-border mb-30 hidden-over">
                                                    <table class="table table-bordered table-2 border-table no-padding ">
                                                        <colgroup>
                                                            <col width="10%">
                                                            <col width="*">
                                                            <col width="10%">
                                                            <col width="20%" style="text-align: center">
                                                            <col width="3%" style="text-align: center">
                                                        </colgroup>
                                                        <tr class="item text-center bg-success text-white">
                                                            <th>{{trans('help.th.no')}}</th>
                                                            <th>{{trans('help.th.title')}}</th>
                                                            <th>{{trans('help.th.edit')}}</th>
                                                            <th>{{trans('help.th.date')}}</th>
                                                            <th>{{trans('help.th.delete')}}</th>
                                                        </tr>
                                                    @if (count($tableData) > 0)

                                                    @foreach($tableData as $key => $data)
                                                    @php
                                                        $bg_color = ($key % 2 == 0)?"table-success":"";
                                                    @endphp
                                                        <tr class="item {{$bg_color}}">
                                                            <td class="text-center">{{count($tableData) - $key}}</td>
                                                            <td><a href="#;" class="item-title">{{$data->title}}</a></td>
                                                            <td>{{Auth::user()->username}}</td>
                                                            <td>{{$data->regdate}}</td>
                                                            <td class="text-center"><a href="#;" onClick="helpDelete({{$data->usercsidx}})"><i class="fa fa-trash"></i></a></td>
                                                        </tr>
                                                        <tr class="table_hide">
                                                            <td colspan="5" style="width:100%"><p style="word-break: break-all;white-space: normal;">{!! nl2br($data->contents) !!}</p></td>
                                                        </tr>
                                                        @if ($data->ans_title)
                                                                    <tr class="item " style="background-color: #f6f7f8">
                                                                        <td class="text-center"></td>
                                                                        <td><a href="#;" class="item-title">re : {{$data->ans_title}}</a></td>
                                                                        <td>{{trans('admin.administrator')}}</td>
                                                                        <td>{{$data->ans_regdate}}</td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr class="table_hide">
                                                                        <td colspan="5" style="width:100%"><p style="word-break: break-all;white-space: normal;">{!! nl2br($data->ans_contents) !!}</p></td>
                                                                    </tr>
                                                        @endif
                                                    @endforeach
                                                    @endif
                                                    </table>
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

            <form id="contactform" action="{{ route('help.insert') }}" method="POST" role="form" name="frm" class="form__auth">
                {!! csrf_field() !!}

                @if ($return = request('return'))
                    <input type="hidden" name="return" value="{{ $return }}">
                @endif
                @if(session('error'))
                    <h1>{{session('error')}}</h1>
                @endif
                <div class="contact-form clearfix">
                    <div class="section-field">
                        <input id="name" type="text" placeholder="" class="form-control" name="name" value="{{Auth::user()->username}}" disabled>
                    </div>
                    <div class="section-field" style="width: 65%;  margin-right: 0;">
                        <input type="text" placeholder="{{trans('validation.attributes.title')}}*" class="form-control" name="title" maxlength="50">
                        {!! $errors->first('title', '<span class="text-danger">:message</span>') !!}
                    </div>
                    <div class="section-field textarea">
                        <textarea class="form-control input-message" placeholder="{{trans('help.help.comment')}}*" rows="7" name="comment" maxlength="300"></textarea>
                        {!! $errors->first('comment', '<span class="text-danger">:message</span>') !!}
                    </div>
                    <div class="form-group" style="text-align: center">

                    </div>
                    <div class="section-field submit-button float-right" style="width:auto; margin-right:0px;">
                        <a href="javascript:frm.submit();" class="button button-border black icon large right">
                            <span>{{trans('help.help.sendMessage')}}</span>
                            {{--<i class="fa fa-check"></i>--}}
                        </a>
                    </div>
                </div>
            </form>

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
		table {
		width: 100%;
		}

		@media all and (max-width:480px) {
		.table-bordered td, .table-bordered th{
           /*border : 0px !important;*/
            padding: .75rem 0;
        }
		table {
		width: 100%;
		table-layout :fixed;
		white-space : nowrap;
		}
		table td {
		display:table-cell;
		overflow:hidden;
		text-overflow: ellipsis;
		box-sizing: border-box;
		}
		table{box-sizing: border-box;}
		.table-bordered td, .table-bordered th{
           /*border : 0px !important;*/
            padding: .75rem 0 !important;
			box-sizing: border-box !important;
        }
		col:nth-child(4){
		width:30%;
		text-align:center;
		}
		col:nth-child(5){
		width:10%;
		text-align:center;
		}
		.center{text-align:center;}
		.table_show p{padding:1%;}
		}
		.hidden-over{overflow:hidden;}

    </style>


@stop
