@extends('layouts.sub')

@section('content')
    <section class="blog white-bg page-section-ptb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
					@if (count($tableData) > 0)
					@foreach($tableData as $key => $data)
                    <div class="blog-entry mb-50">
                        <div class="entry-image clearfix">
                            <img class="img-fluid" src="/upload/{{$data->title_img}}" alt="">
                        </div>
                        <div class="blog-detail">
                            <div class="entry-title mb-10">
                                <a href="#">{{$data->title}}</a>
                            </div>
                            <div class="entry-meta mb-10">
                                <ul>
                                    <li><a href="#"><i class="fa fa-calendar-o"></i> {{date("j M Y",strtotime($data->created_at))}} </a></li>
                                </ul>
                            </div>
                            <div class="entry-content">
							@php
								$contents = explode(PHP_EOL,$data->content);
							@endphp
							@foreach($contents as $k => $cont)
                                <div @if($k > 2) class="evt_hidden" @endif>{!! $cont !!}</div>
							@endforeach
                                <!--{!! $data->content !!}-->
                            </div>
                            <div class="entry-share clearfix">
                                <div class="entry-button">
                                    <a class="button arrow" href="#;" onClick="eventViewTrigger();">Read More<i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                </div>
                                <div class="social list-style-none float-right">
                                    <!-- <strong>Share : </strong>
                                    <ul>
                                        <li>
                                            <a href="#"> <i class="fa fa-facebook"></i> </a>
                                        </li>
                                        <li>
                                            <a href="#"> <i class="fa fa-twitter"></i> </a>
                                        </li>
                                        <li>
                                            <a href="#"> <i class="fa fa-pinterest-p"></i> </a>
                                        </li>
                                        <li>
                                            <a href="#"> <i class="fa fa-dribbble"></i> </a>
                                        </li>
                                    </ul> -->
                                </div>
                            </div>
                        </div>
                    </div>
					@endforeach
					@endif
					
                    <!-- ================================================ -->
                    {{ $tableData->links('events.pagination') }}
                    <!-- ================================================ -->
                </div>
            </div>
        </div>
    </section>
    <style>
        .evt_hidden{
            display:none;
        }
    </style>
@stop
