<header id="header" class="header transparent">
    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 xs-mb-10">
                    <!--<div class="topbar-call text-center text-md-left">
                        <ul>
                            <li><i class="fa fa-envelope-o theme-color"></i> gethelp@webster.com</li>
                            <li><i class="fa fa-phone"></i> <a href="tel:+7042791249"> <span>+(704) 279-1249 </span> </a> </li>
                        </ul>
                    </div>-->
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="topbar-social text-center text-md-right">
                        <ul>
                            @if (Auth::guest())
                                <li><a href="{{ route('sessions.create') }}">{{ trans('auth.sessions.title') }}</a></li>
                                <li><a href="{{ route('users.create') }}">{{ trans('auth.users.title') }}</a></li>
                            @else
                                <li><a href="{{ route('mypage') }}">{{ trans('auth.sessions.mypage') }}</a></li>
                                <li><a href="{{ route('sessions.destroy') }}">{{ trans('auth.sessions.destroy') }}</a></li>
                            @endif
                            @foreach (config('project.locales') as $locale => $language)
                                {{--<li>--}}
                                    {{--<a href="{{ route('locale', ['locale' => $locale, 'return' => urlencode($currentUrl)]) }}">--}}
                                        {{--<img src="/images/icon/{{ $locale }}.png" style="witdh:20px;height:20px;margin: 0 5px;">--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--=================================
     mega menu -->

    <div class="menu">
        <!-- menu start -->
        <nav id="menu" class="mega-menu">
            <!-- menu list items container -->
            <section class="menu-list-items">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <!-- menu logo -->
                            <ul class="menu-logo">
                                <li>
                                    <a href="{{ route('root') }}"><img id="logo_img" src="/images/logo.png" alt="logo"> </a>
                                </li>
                            </ul>
                            <!-- menu links -->
                            <div class="menu-bar">
                                <ul class="menu-links">

                                    <li><a href="{{ route('root') }}">{{ trans('template.menu.home') }}</a></li>
                                    <li class="{{ (\Request::route()->getName() === 'event') ? 'active' : '' }}">
                                        <a href="{{ route('event') }}">{{ trans('template.menu.event') }} </a>
                                    </li>
                                    <li class="{{ (\Request::route()->getName() === 'game') ? 'active' : '' }}">
                                        <a href="{{  route('game') }}">{{ trans('template.menu.asian')  }} </a>
                                    </li>
                                    <li class="{{ (\Request::route()->getName() === 'game.slot') ? 'active' : '' }}">
                                        <a href="{{ route('game.slot') }}">{{ trans('template.menu.monaco') }} </a>
                                    </li>
                                    <!--<li class="{{ (\Request::route()->getName() === 'game.holdem') ? 'active' : '' }}">
                                        <a href="{{ route('game.holdem') }}">{{ trans('template.menu.holdem') }} </a>
                                    </li>-->
                                    <li class="{{ (\Request::route()->getName() === 'exchange') ? 'active' : '' }}">
                                        <a href="{{ route('exchange') }}">{{ trans('template.menu.exchange') }} </a>
                                    </li>
                                    <li class="{{ (\Request::route()->getName() === 'wallet') ? 'active' : '' }}">
                                        <a href="javascript:void(0);"> {{ trans('template.menu.wallet') }} <i class="fa fa-angle-down fa-indicator"></i></a>
                                        <!-- drop down multilevel  -->
                                        <ul class="drop-down-multilevel">
                                            <li class="{{ (\Request::route()->getName() === 'wallet') ? 'active' : '' }}">
                                                <a href="{{ route('wallet') }}">{{ trans('template.menu.deposit') }}</a>
                                            </li>
                                            <li class="{{ (\Request::route()->getName() === 'withdrawals') ? 'active' : '' }}">
                                                <a href="{{ route('withdrawals') }}">{{ trans('template.menu.withdrawals') }}</a>
                                            </li>
                                            {{--<li><a href="{{ route('exchange') }}">{{ trans('wallets.menu.exchange') }}</a></li>--}}
                                            <li class="{{ (\Request::route()->getName() === 'history') ? 'active' : '' }}">
                                                <a href="{{ route('history')  }}">{{ trans('template.menu.history')  }}</a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="{{ \Request::route()->getName() === 'help' ? 'active' : '' }}">
                                        <a href="javascript:void(0);">{{ trans('template.menu.help') }} <i class="fa fa-angle-down fa-indicator"></i></a>
                                        <!-- drop down multilevel  -->
                                        <ul class="drop-down-multilevel">
                                            <li class="{{ \Request::route()->getName() === 'help' ? 'active' : '' }}">
                                                <a href="{{ route('help')  }}">{{ trans('template.menu.community')  }}</a>
                                            </li>
                                            <!--<li><a href="{{ route('help.faq')  }}">{{ trans('template.menu.faq')  }}</a></li>-->
                                        </ul>
                                    </li>

                                </ul>
                                <!--<div class="search-cart">
                                    <div class="search">
                                        <a class="search-btn not_click" href="javascript:void(0);"></a>
                                        <div class="search-box not-click">
                                            <form action="search.html" method="get">
                                                <input type="text"  class="not-click form-control" name="search" placeholder="Search.." value="" >
                                                <button class="search-button" type="submit"> <i class="fa fa-search not-click"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="shpping-cart">
                                        <a class="cart-btn" href="#"> <i class="fa fa-shopping-cart icon"></i> <strong class="item">2</strong></a>
                                        <div class="cart">
                                            <div class="cart-title">
                                                <h6 class="uppercase mb-0">Shopping cart</h6>
                                            </div>
                                            <div class="cart-item">
                                                <div class="cart-image">
                                                    <img class="img-fluid" src="/images/shop/01.jpg" alt="">
                                                </div>
                                                <div class="cart-name clearfix">
                                                    <a href="#">Product name <strong>x2</strong> </a>
                                                    <div class="cart-price">
                                                        <del>$24.99</del> <ins>$12.49</ins>
                                                    </div>
                                                </div>
                                                <div class="cart-close">
                                                    <a href="#"> <i class="fa fa-times-circle"></i> </a>
                                                </div>
                                            </div>
                                            <div class="cart-item">
                                                <div class="cart-image">
                                                    <img class="img-fluid" src="/images/shop/01.jpg" alt="">
                                                </div>
                                                <div class="cart-name clearfix">
                                                    <a href="#">Product name <strong>x2</strong></a>
                                                    <div class="cart-price">
                                                        <del>$24.99</del> <ins>$12.49</ins>
                                                    </div>
                                                </div>
                                                <div class="cart-close">
                                                    <a href="#"> <i class="fa fa-times-circle"></i> </a>
                                                </div>
                                            </div>
                                            <div class="cart-total">
                                                <h6 class="mb-15"> Total: $104.00</h6>
                                                <a class="button" href="shop-shopping-cart.html">View Cart</a>
                                                <a class="button black" href="shop-checkout.html">Checkout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </nav>
        <!-- menu end -->
    </div>
</header>
