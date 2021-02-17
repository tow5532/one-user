@extends('layouts.sub')

@section('content')
    <section class="page-section-ptb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="blog-entry mb-10">
                        <!--<div class="clearfix">
                            <ul class="grid-post">
                                <li>
                                    <div>
                                        <img class="img-fluid" src="/images/blog/05.jpg" alt="">
                                    </div>
                                </li>
                            </ul>
                        </div>-->
                        <div class="blog-detail">
                            <div class="entry-title mb-10">
                                <h4 class="text-back">{{ $article->title }}</h4>
                            </div>
                            <div class="entry-meta mb-10">
                                <ul>
                                    <li> <i class="fa fa-folder-open-o"></i>Admin</a></a> </li>
                                    <li><a href="#"><i class="fa fa-calendar-o"></i> {{ $article->created_at->diffForHumans() }}</a></li>
                                </ul>
                            </div>
                            <div class="entry-content">
                               {!! $article->content !!}
                            </div>
                        </div>
                    </div>
                    <div>
                        <a class="button icon x-small" href="{{ route('resources', $article->category) }}?page={{ Request::get('page')}}"> list <i class="fa fa-long-arrow-right"></i> </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
