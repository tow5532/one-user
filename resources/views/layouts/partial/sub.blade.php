@php
    $pathName = Request::segment(1);
        if ($pathName == 'wallet'){
            $sub_img = 'wallet_img';
        } else if ($pathName == 'game'){
            $sub_img = 'game_img';
        } else if ($pathName == 'bank'){
            $sub_img = 'bank_img';
        } else if ($pathName == 'explorer'){
            $sub_img = 'exp_img';
        } else if ($pathName == 'resources'){
            $sub_img = 'forum_img';
        } else {
        $sub_img = 'resourse_img';
    }
        $sub_img = '/img/sub/'.$sub_img. '.jpg';
@endphp

<div class="page-area" style='background-image: url("{{ $sub_img }}")'>
    <div class="breadcumb-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12" style="height: 440px;">
                <div class="breadcrumb text-center">
                <!--<div class="section-headline white-headline">
                        <h3>Our Games</h3>
                    </div>
                    <ul class="breadcrumb-bg">
                        <li class="home-bread">Home</li>
                        <li>Our Games</li>
                        @if (Route::current()->getName() == 'wallet')
                    <li>Wallert</li>
@elseif (Route::current()->getName() == 'wallet.create')
                    <li >Wallet Create</li>
@elseif (Route::current()->getName() == 'wallet.show')
                    <li>Wallet Detail</li>
@endif
                    </ul>-->
                </div>
            </div>
        </div>
    </div>
</div>
