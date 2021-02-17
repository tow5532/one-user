<footer class="footer page-section-pt black-bg">
    <div class="container text-white">
        <div class="row top">
            <div class="col-lg-6 col-md-6">
                <img class="img-fluid" id="logo-footer" src="/images/logo.png" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="divider mt-50 mb-50 white-bg"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-5 col-md-5 sm-mt-30">
                <div class="about-content">
                    <h6 class="mb-20 text-uppercase text-white">Notice</h6>
                    <p class="text-white">If you reside in a location where lottery, gambling, or betting over the internet is illegal, please do not click on anything related to these activities on this site. Players are advised to check with the laws that exist within their own jurisdiction or region to ascertain the legality of the activities which are covered.</p>
                </div>
            </div>
            <div class="col-lg-7 col-md-7 sm-mt-30 sm-mb-30">
                <h6 class="mb-20 text-uppercase text-white">Useful Links</h6>
                <div class="usefull-link">
                    <div class="row">
                        <div class="col-lg-4 col-sm-4">
                            <ul>
                                <li><a href="{{ route('root') }}" class="text-white">{{ trans('template.menu.home') }}</a></li>
                                <li><a href="{{route('wallet')}}" class="text-white">{{ trans('template.menu.deposit') }}</a></li>
                                <li><a href="{{route('history')}}" class="text-white">{{ trans('template.menu.history')  }}</a></li>
                                <li><a href="{{route('help')}}" class="text-white">{{ trans('template.menu.community') }}</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-4 col-sm-4">
                            <ul>
                                <li><a href="{{ route('game.slot') }}" class="text-white">{{ trans('template.menu.game')  }}</a></li>
                                <li><a href="{{ route('withdrawals') }}" class="text-white">{{ trans('template.menu.withdrawals') }}</a></li>
                                <li><a href="{{ route('event') }}" class="text-white">{{ trans('template.menu.event')  }}</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-4 col-sm-4">
                            <ul>
                                <li><a href="{{ route('game.slot') }}" class="text-white">{{ trans('template.menu.download') }}</a></li>
                                <li><a href="{{ route('exchange') }}" class="text-white">{{ trans('template.menu.exchange') }}</a></li>
                                @if (Auth::guest())
                                <li><a href="{{route('sessions.create')}}" class="text-white">{{ trans('auth.sessions.title') }}</a></li>
                                @else
                                    <li><a href="{{ route('mypage') }}" class="text-white">{{ trans('auth.sessions.mypage') }}</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 text-left">
                <p> &copy;Copyright <span id="copyright"> <script>document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))</script></span> <a href="{{ route('root') }}"> onegame01.com </a> All Rights Reserved </p>
            </div>
        </div>
    </div>
</footer>
