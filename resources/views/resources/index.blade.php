@extends('layouts.sub')

@section('content')

    <section class="page-section-ptb">
        <div class="container">
            <div class="row">
                @forelse($articles as $article)
                <div class="col-lg-4 col-md-4">
                    <div class="blog-entry mb-50">
                        <div class="entry-image clearfix">
                            <!--<a class="image-scale" href="{{ $article->content_link }}" target="_blank">
                                @if(!file_exists($_SERVER['DOCUMENT_ROOT'].'/upload/'. $article->title_img))
                                    <img class="img-fluid" src="/images/blog/01.jpg" alt="">
                                @else
                                    <img class="img-fluid" width="870" height="400" src="/upload/{{ $article->title_img }}" alt="">
                                @endif
                            </a>-->
                            <!--<img class="img-fluid" src="/images/blog/01.jpg" alt="">-->
                            <img class="img-fluid" src="/upload/{{ $article->title_img }}" alt="">
                        </div>
                        <div class="blog-detail">
                            <div class="entry-title mb-10">
                                <a href="#">{{ Str::limit($article->title, 23, '...') }}</a>
                            </div>
                            <div class="entry-meta mb-10">
                                <ul>
                                    <li><a href="#"><i class="fa fa-folder-open-o"></i> News</a></li>
                                    <li><a href="#"><i class="fa fa-calendar-o"></i>  {{ $article->created_at->diffForHumans() }}</a></li>
                                </ul>
                            </div>
                            <div class="entry-share clearfix">
                                <div class="entry-button">
                                    <a class="button arrow" href="#">Read More<i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                @endforelse
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <nav aria-label="Page navigation example" id="pagingnode">
                    {{ $articles->links("pagination::bootstrap-4") }}
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
