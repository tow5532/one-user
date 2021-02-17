@extends('layouts.sub')

@section('content')
    <section class="page-section-ptb">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
						<img  src="/images/game/download_middle.jpg" alt="" style="width:100%">

                </div>
                <div class="col-lg-6 sm-mt-30">
                    <div class="section-title mb-20">
                        <h6>{{trans('download.0')}}</h6>
                        <h2>{{trans('download.1')}}</h2>
                        <p>{{trans('download.2')}}</p>
                    </div>
                    <p>{{trans('download.3')}}</p>
                    @if (Auth::guest())
                    <a class="button button-border black large m-2" href="#;">{{trans('main.layer3.button.0')}}</a>
                    <a class="button button-border black large m-2" href="#;">{{trans('main.layer3.button.1')}}</a>
                    @else
                    <!--<a class="button button-border black large m-2" href="{{route('game.download.android')}}" type="application/vnd.android.package-archive">{{trans('main.layer3.button.0')}}</a>
                    <a class="button button-border black large m-2" href="{{route('game.download.pc')}}">{{trans('main.layer3.button.1')}}</a>-->
                    @endif
                </div>
            </div>
        </div>
    </section>
    @if(session()->has('alert'))
        <script>
            alert('{{ session()->get('alert') }}');
        </script>
    @endif
@stop
