<?php

return [
    'name' => 'sunpokers',
    'url' => 'http://test.sunpokers.com',
    'description' => '로컬',

    /*
   |--------------------------------------------------------------------------
   | 지원하는 언어 목록
   |--------------------------------------------------------------------------
   */
    'locales' => [
        'ko' => '한국어',
        'en' => 'English',
    ],

    /*
    |--------------------------------------------------------------------------
    | Tag 목록
    |--------------------------------------------------------------------------
    */
    'tags' => [
        'laravel' => '라라벨',
        'lumen' => '루멘',
        'general' => '자유의견',
        'server' => '서버',
        'tip' => '팁',
    ],
    'categories' => [
        'notice' => '공지',
        'news' => '소식',
    ],

    'api_domain' => env('API_DOMAIN', 'api.abcgame.in'),

    'etherscan' => [
        'tran_url'          => 'https://etherscan.io//tx/',
        'api_url'           => 'https://api.etherscan.io/api',
        'api_test_url'      => 'https://api-ropsten.etherscan.io/api',
        'api_key'           => 'ZMFDERIKE8ZHEV53F64TH879PYJYR3ARNP',
        'api_call_cnt'      => 15,
        'confirm_cnt'       => 5,
    ],

];

