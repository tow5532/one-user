<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//언어

Route::get('/telegram', 'TelegramBotController@index');


Route::get('locale', [
    'as' => 'locale',
    'uses' => 'MainController@locale',
]);

Route::get('/daily-check', [
    'as' => 'root',
    'uses' => 'DailyCalculateController@index',
]);

Route::get('/daily-check-company', [
    'as' => 'root',
    'uses' => 'DailyCalculateController@company',
]);
Route::get('daily-check-sub/{id}', [
    'as' => 'daily.sub',
    'uses' => 'DailyCalculateSubController@sub',
]);

Route::get('/daily-check-user', [
    'as' => 'daily.user',
    'uses' => 'DailyCalculateSubController@userlist',
]);



Route::get('/', [
    'as' => 'root',
    'uses' => 'MainController@index',
]);

Route::get('/test', [
    'as' => 'test',
    'uses' => 'TestController@index',
]);




/*게임*/
Route::get('download', [
    'as' => 'game.download',
    'uses' => 'GamesController@getDownload',
])->middleware('auth');


Route::get('event', [
    'as' => 'event',
    'uses' => 'EventController@index',
]);
//게임다운로드
Route::get('download/android', [
    'as' => 'game.download.android',
    'uses' => 'GamesController@androidDownload',
])->middleware('auth');

Route::get('download/pc', [
    'as' => 'game.download.pc',
    'uses' => 'GamesController@pcDownload',
])->middleware('auth');

//신규 게임 메뉴 라우트
Route::get('/game/holdem', [
    'as' => 'game.holdem',
    'uses' => 'GamesController@getDownload',
])->middleware('auth');

Route::get('/game/slot', [
    'as' => 'game.slot',
    'uses' => 'SlotGameController@index',
]);

//슬롯게임 실행
Route::post('/game/slot/start', [
    'as' => 'game.slot.start',
    'uses' => 'SlotGameController@start',
])->middleware('ajax');

// 슬롯게임 다운로드
Route::get('download/slot', [
    'as' => 'game.download.slot',
    'uses' => 'GamesController@slotDownload',
])->middleware('auth');


//아시안 슬롯 게임
Route::get('/game/asian', [
    'as' => 'game.asian',
    'uses' => 'AsianSlotGameController@index',
]);

Route::get('/game/asian/view', [
    'as' => 'game.asian.view',
    'uses' => 'AsianSlotGameController@view',
]);




Route::get('/home', [
    'as' => 'home',
    'uses' => 'HomeController@index',
]);

Route::get('login', function (){
    return \Illuminate\Support\Facades\Redirect::to('auth/login');
})->name('login');

/*사용자 인증*/
Route::get('auth/login', [
    'as' => 'sessions.create',
    'uses' => 'SessionsController@create',
]);

Route::post('auth/login', [
    'as' => 'sessions.store',
    'uses' => 'SessionsController@store',
]);
Route::get('auth/logout', [
    'as' => 'sessions.destroy',
    'uses' => 'SessionsController@destroy',
]);


/*사용자 가입*/
Route::get('auth/register', [
    'as' => 'users.create',
    'uses' => 'UsersController@create',
]);

Route::get('auth/register', [
    'as' => 'users.create',
    'uses' => 'UsersController@create',
]);


/*신규 사용자가입*/
Route::get('auth/bank', [
    'as' => 'users.bank',
    'uses' => 'UsersController@bank',
]);
Route::get('auth/pincode', [
    'as' => 'users.pincode',
    'uses' => 'UsersController@pincode',
]);
Route::get('auth/finish', [
    'as' => 'users.finish',
    'uses' => 'UsersController@finish',
]);
Route::post('auth/check/bank', [
    'as' => 'users.checkbank',
    'uses' => 'UsersController@checkBankAccount',
]);
/**/

Route::post('auth/register', [
    'as' => 'users.create',
    'uses' => 'UsersController@userCreate',
]);

Route::get('auth/confirm/{code}', [
    'as' => 'users.confirm',
    'uses' => 'UsersController@confirm',
]);

/* 비밀번호 초기화 */
Route::get('auth/remind', [
    'as' => 'remind.create',
    'uses' => 'PasswordsController@getRemind',
]);
Route::post('auth/remind', [
    'as' => 'remind.store',
    'uses' => 'PasswordsController@postRemind',
]);
Route::get('auth/reset/{token}', [
    'as' => 'reset.create',
    'uses' => 'PasswordsController@getReset',
]);

Route::post('auth/reset', [
    'as' => 'reset.store',
    'uses' => 'PasswordsController@postReset',
]);


Route::get('game', [
    'as' => 'game',
    'uses' => 'GamesController@index',
]);

Route::get('auth/bank', [
    'as' => 'users.bank',
    'uses' => 'UsersController@bank',
]);

Route::post('auth/bank', [
    'as' => 'users.createBank',
    'uses' => 'UsersController@createBank',
]);


Route::post('auth/pincode/create', [
    'as' => 'users.createPincode',
    'uses' => 'UsersController@createPincode',
]);



Route::get('exchange', [
    'as' => 'exchange',
    'uses' => 'ExchangeController@index',
])->middleware('auth');




Route::get('exchange/test', [
    'as' => 'exchangeTest',
    'uses' => 'ExchangeController@indexTest',
])->middleware('auth');
//
//Route::get('exchange/renew', [
//    'as' => 'exchange.renew',
//    'uses' => 'ExchangeController@renew',
//])->middleware('auth');

Route::post('exchange/sendgame', [
    'as' => 'exchange.sendGame',
    'uses' => 'ExchangeController@sendGameCreate',
])->middleware('auth');

Route::post('exchange/senddeposits', [
    'as' => 'exchange.sendDeposits',
    'uses' => 'ExchangeController@sendDepositCreate',
])->middleware('auth');

Route::post('exchange/refresh', [
    'as' => 'exchange.refresh',
    'uses' => 'ExchangeController@refresh',
])->middleware('auth');



/*지갑 메뉴*/
Route::get('deposit/register', [
    'as' => 'wallet',
    'uses' => 'WalletsController@index',
])->middleware('auth');

Route::get('deposit/register/test', [
    'as' => 'wallettest',
    'uses' => 'WalletsController@index_test',
])->middleware('auth');


Route::post('deposit/register', [
    'as' => 'deposit.register',
    'uses' => 'WalletsController@depositsCreate',
])->middleware('auth');


Route::get('withdrawals/register', [
    'as' => 'withdrawals',
    'uses' => 'WalletsController@withdrawals',
])->middleware('auth');

Route::get('withdrawals/register/test', [
    'as' => 'withdrawalstest',
    'uses' => 'WalletsController@withdrawals_test',
])->middleware('auth');

Route::post('withdrawals/register', [
    'as' => 'withdrawals.register',
    'uses' => 'WalletsController@withdrawalsCreate',
])->middleware('auth');


Route::post('withdrawals/userdeposit', [
    'as' => 'withdrawals.userdeposit',
    'uses' => 'WalletsController@userDeposit',
])->middleware('auth');






Route::post('wallet/register', [
    'as' => 'wallet.store',
    'uses' => 'WalletsController@store',
])->middleware('auth');

Route::get('wallet/send', [
    'as' => 'wallet.send',
    'uses' => 'TokensController@index',
])->middleware('auth');

Route::get('wallet/show/{id}', [
    'as' => 'wallet.show',
    'uses' => 'WalletsController@show',
])->middleware('auth');

Route::post('token/register', [
    'as' => 'token.store',
    'uses' => 'TokensController@store',
])->middleware('auth');

Route::get('wallet/deal', [
    'as' => 'wallet.deal',
    'uses' => 'WalletsController@deal',
])->middleware('auth');

Route::post('wallet/destroy', [
    'as' => 'wallet.destroy',
    'uses' => 'WalletsController@destroy',
])->middleware('auth');



//마이페이지
Route::get('mypage', [
   'as' => 'mypage',
   'uses' => 'MypageController@index',
])->middleware('auth');

Route::get('mypage/password', [
    'as' => 'mypage.password',
    'uses' => 'MypageController@password',
])->middleware('auth');

Route::get('mypage/pincode', [
    'as' => 'mypage.pincode',
    'uses' => 'MypageController@pincode',
])->middleware('auth');


Route::get('mypage/account', [
    'as' => 'mypage.account',
    'uses' => 'MypageController@account',
])->middleware('auth');

Route::post('mypage/password', [
    'as' => 'mypage.passwordRewrite',
    'uses' => 'MypageController@rewritePassword',
])->middleware('auth');

Route::post('mypage/pincode', [
    'as' => 'mypage.pincodeRewrite',
    'uses' => 'MypageController@rewritePincode',
])->middleware('auth');


Route::post('mypage/account', [
    'as' => 'mypage.accountRewrite',
    'uses' => 'MypageController@rewriteAccount',
])->middleware('auth');

Route::post('mypage/account', [
    'as' => 'mypage.accountRewrite',
    'uses' => 'MypageController@rewriteAccount',
]);

Route::post('/mypage/check/bank', [
    'as' => 'mypage.checkbank',
    'uses' => 'MypageController@checkBankAccount',
]);

//마이페이지 종료

Route::get('help', [
    'as' => 'help',
    'uses' => 'HelpController@index',
])->middleware('auth');

Route::get('help/insert', [
    'as' => 'help.insertView',
    'uses' => 'HelpController@insertView',
])->middleware('auth');


Route::post('help/insert', [
    'as' => 'help.insert',
    'uses' => 'HelpController@insert',
])->middleware('auth');


Route::get('help/delete/{id}', [
    'as' => 'help.delete',
    'uses' => 'HelpController@delete',
])->middleware('auth');

Route::get('history', [
   'as' => 'history',
   'uses' => 'HistoryController@index',
])->middleware('auth');


Route::get('history/delete/{type}/{id}', [
    'as' => 'history.delete',
    'uses' => 'HistoryController@delete',
])->middleware('auth');

Route::get('help/faq', [
    'as' => 'help.faq',
    'uses' => 'HelpController@faq',
]);

//아시안게임 API

//회원계정 생성
Route::get('/api/slot/user/create', [
    'as' => 'api.slot.user.create',
    'uses' => 'SlotApiController@createPlayer',
]);
//해당 게임 계정 생성
Route::get('/api/slot/{id}/{game}/create', [
    'as' => 'api.slot.game.create',
    'uses' => 'SlotApiController@createGameUser',
]);
//해당 유저 잔액 조회
Route::get('/api/slot/{id}/{game}/money', [
    'as' => 'api.slot.game.money',
    'uses' => 'SlotApiController@checkHaveGameMoney',
]);
//해당 유저에게 게임머니 입금
Route::get('/api/slot/{id}/{game}/deposit/create', [
    'as' => 'api.slot.deposit.create',
    'uses' => 'SlotApiController@depositCreate',
]);
//해당 유저에게 게임머니 출금
Route::get('/api/slot/{id}/{game}/withdraw/create', [
    'as' => 'api.slot.withdraw.create',
    'uses' => 'SlotApiController@withdrawCreate',
]);
//에이전트 게임 히스토리
Route::get('/api/slot/{game}/history', [
    'as' => 'api.slot.history',
    'uses' => 'SlotApiController@agentGameHistory',
]);
//해당 유저 게임 히스토리
Route::get('/api/slot/{id}/{game}/history', [
    'as' => 'api.slot.user.history',
    'uses' => 'SlotApiController@userGameHistory',
]);
//게임 영상알 에이전트 머니 조회
Route::get('/api/slot/egg/count', [
    'as' => 'api.slot.egg.count',
    'uses' => 'SlotApiController@agentEggcount',
]);
//에이전트 게임기록 요약
Route::get('/api/slot/{game}/summary', [
    'as' => 'api.slot.game.summary',
    'uses' => 'SlotApiController@agentGameSummary',
]);

