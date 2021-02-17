<?php
// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('root'));
});

// Home > Playground > game
Breadcrumbs::for('playground_game', function ($trail, $cate) {
    $trail->parent('home');
    $trail->push('Playground');
    $trail->push('Game', route('playground.game.sub', $cate));
});

//Home > Playground > Webtoon
Breadcrumbs::for('playground_webtoon', function ($trail) {
    $trail->parent('home');
    $trail->push('Playground');
    $trail->push('Webtoon', route('playground.webtoon'));
});


// Home > Point
Breadcrumbs::for('point', function ($trail) {
    $trail->parent('home');
    $trail->push('Point', route('point'));
});

//HOme > Point > Wallet
Breadcrumbs::for('point_wallet', function ($trail) {
    $trail->parent('point');
    $trail->push('Wallet', route('point.wallet'));
});


// Home > Point > in
Breadcrumbs::for('pointIn', function ($trail) {
    $trail->parent('point');
    $trail->push('In', route('point.in'));
});

// Home > Point > in > history
Breadcrumbs::for('pointInHistory', function ($trail) {
    $trail->parent('pointIn');
    $trail->push('History', route('point.in.history'));
});

// home > point > history
Breadcrumbs::for('pointHistory', function ($trail) {
    $trail->parent('point');
    $trail->push('History', route('point.history'));
});


//Home > Forum
Breadcrumbs::for('forum', function ($trail) {
    $trail->parent('home');
    $trail->push('Forum', route('resources', 'notice'));
});

Breadcrumbs::for('forum_cate', function ($trail, $cate) {
    $trail->parent('forum');
    $trail->push($cate, route('resources', $cate));
});

//Home > info
Breadcrumbs::for('info', function ($trail) {
    $trail->parent('home');
    $trail->push('Info', route('info.menual'));
});

Breadcrumbs::for('info_menual', function ($trail) {
    $trail->parent('info');
    $trail->push('Menual', route('info.menual'));
});

Breadcrumbs::for('info_faq', function ($trail) {
    $trail->parent('info');
    $trail->push('Faq', route('info.faq'));
});

Breadcrumbs::for('info_contact', function ($trail) {
    $trail->parent('info');
    $trail->push('ContactUs', route('info.contactus'));
});



