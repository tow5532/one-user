<!--=================================
 banner -->
@php
    $bg_url = '/bg/sub_bg.jpg';
    if (\Illuminate\Support\Facades\Request::is('wallet')){
        $bg_url = '/bg/sub_bg_2.jpg';
    }


        switch(request()->getPathInfo()){
        case '/download':
            $bg_text1 = trans('banner.download.0');
            $bg_text2 = trans('banner.download.1');
            $bg_url = 'down_main.jpg';
            break;
        case '/login':
            $bg_text1 = trans('banner.login.0');
            $bg_text2 = trans('banner.login.1');
            $bg_url = 'login_main.jpg';
            break;
        case '/auth/login':
            $bg_text1 = trans('banner.login.0');
            $bg_text2 = trans('banner.login.1');
            $bg_url = 'login_main.jpg';
            break;
        case '/auth/register':
            $bg_text1 = trans('banner.register.0');
            $bg_text2 = trans('banner.register.1');
            $bg_url = 'registry.jpg';
            break;
        case '/auth/bank':
            $bg_text1 = trans('banner.register.0');
            $bg_text2 = trans('banner.register.1');
            $bg_url = 'registry.jpg';
            break;
        case '/auth/pincode':
            $bg_text1 = trans('banner.register.0');
            $bg_text2 = trans('banner.register.1');
            $bg_url = 'registry.jpg';
            break;
        case '/auth/finish':
            $bg_text1 = trans('banner.register.0');
            $bg_text2 = trans('banner.register.1');
            $bg_url = 'registry.jpg';
            break;
        case '/mypage':
            $bg_text1 = trans('banner.register.0');
            $bg_text2 = trans('banner.register.1');
            $bg_url = 'mypage_main.jpg';
            break;
        case '/mypage/password':
            $bg_text1 = trans('banner.register.0');
            $bg_text2 = trans('banner.register.1');
            $bg_url = 'mypage_main.jpg';
            break;
        case '/mypage/pincode':
            $bg_text1 = trans('banner.register.0');
            $bg_text2 = trans('banner.register.1');
            $bg_url = 'mypage_main.jpg';
            break;
        case '/mypage/account':
            $bg_text1 = trans('banner.mypage.0');
            $bg_text2 = trans('banner.mypage.1');
            $bg_url = 'mypage_main.jpg';
            break;
        case '/deposit/register' :
            $bg_text1 = trans('banner.depositRe.0');
            $bg_text2 = trans('banner.depositRe.1');
             $bg_url = 'deposit_main.jpg';
             break;
        case '/withdrawals/register' :
            $bg_text1 = trans('banner.withdrawal.0');
            $bg_text2 = trans('banner.withdrawal.1');
            $bg_url = 'withdrawal_main.jpg';
            break;
        case '/exchange' :
            $bg_text1 = trans('banner.deposit.0');
            $bg_text2 = trans('banner.deposit.1');
            $bg_url = 'money_main.jpg';
            break;
         case '/help' :
              $bg_text1 = trans('banner.help.0');
            $bg_text2 = trans('banner.help.1');
            $bg_url = 'help_main.jpg';
            break;
         case '/history' :
            $bg_text1 = trans('banner.history.0');
            $bg_text2 = trans('banner.history.1');
            $bg_url = 'deposit_main.jpg';
            break;
        case '/event' :
            $bg_text1 = trans('banner.event.0');
            $bg_text2 = trans('banner.event.1');
            $bg_url = 'event_main.jpg';
            break;
        case '/game' :
            $bg_text1 = trans('banner.howtoplay.0');
            $bg_text2 = trans('banner.howtoplay.1');
            $bg_url = 'slot_main.jpg';
            break;
        case '/game/slot' :
            $bg_text1 = trans('banner.howtoplay.0');
            $bg_text2 = trans('banner.howtoplay.1');
            $bg_url = 'slot_main.jpg';
            break;
        default :
            $bg_text1 = '';
            $bg_text2 =  '';
            break;
    }



@endphp
<section class="page-title bg-overlay-black-10 parallax" data-jarallax='{"speed": 0.6}' style="background-image: url(/images/bg/{{ $bg_url }});">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-title-name">
                    {{--<h1>{{$bg_text1}}</h1>
                    <p>{{$bg_text2}}</p>--}}
                </div>
            </div>
        </div>
    </div>
</section>
<!--=================================
 banner -->

