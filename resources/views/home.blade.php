@extends('layouts.theme')

@section('content')
    <div class="row">
        <div class="page-header">
            <h4>
                {{ trans('auth.mypage.title') }}
            </h4>
        </div>
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <th colspan="2">{{ trans('auth.mypage.info') }}</th>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="col-md-1">{{ trans('auth.mypage.email') }}</td>
                        <td class="col-md-4">{{ Auth::user()->email }}</td>
                    </tr>
                    <tr>
                        <td>{{ trans('auth.mypage.name') }}</td>
                        <td>{{ Auth::user()->name }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="text-center"><a href="{{ route('wallet') }}"><button type="button" class="btn btn-info">Toc info GO</button></a></div>
    </div>
@endsection
