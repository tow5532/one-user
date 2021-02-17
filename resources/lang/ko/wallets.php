<?php

return [
    'title' => '입금',
    'deal' => 'Deal',

    'menu' => [
        'create' => 'Create',
        'send' => 'Send',
        'allocation' => 'Allocation',
        'deposit' => 'Deposit',
        'withdrawals' => '신청하기',
        'exchange' => 'Exchange',

    ],
    'pinPassword' => 'PIN 비밀번호',

    'deposit' => [
        'title' => '입금신청',
        'title_under' => '원라인 포인트 충전을 위해 입금신청을 부탁드립니다',
        'casherAmounts' => '입금하실 금액',
        'minimum' => '입금 최소 금액은 ',
        'minimum2' => '입니다.',
        'depositAmounts' => '원라인 포인트 수량',
        'bank' => '입금하실 은행',
        'bankHolder' => '입금하실 계좌이름',
        'bankNumber' => '입금하실 계좌번호',
        'info' => ['은행 정보는 수시로 변경됩니다. 반드시 확인하세요.','입금은행과 입금자 이름, 금액이 전부 일치해야 충전이 됩니다.'],
        'alert' => '해당 금액으로 입금 신청 하시겠습니까??',
        'inputAmount' => '금액을 입력하세요',
        'rate_alert' => '',
        'user_info' => [
            '* 입금 신청을 하고 반드시 입금할 계좌를 확인하시기 바랍니다.',
            '* 입금은행과 입금자 이름, 금액이 전부 일치해야 충전이 됩니다.',
            '* 입금계좌 확인이 어려우면 고객센터로 연락 바랍니다.',
        ],
        'deposit_info' => '입금 정보'
    ],
    'withdrawals' => [
        'title' => '출금신청',
        'subtitle' => '',
        'minimum' => '출금 최소 금액은 ',
        'minimum2' => '입니다.',
        'withdrawalsAmounts' => '출금 하실 포인트',
        'balanceAmounts' => '출금 후 남는 포인트',
        'bank' => '나의 은행 정보',
        'bankHolder' => '은행 예금주 이름 ',
        'bankNumber' => '은행 계좌 번호',
        'info' => ['은행 정보가 정확해야 출금이 진행됩니다.','은행 정보를 수정하려면 내 정보 메뉴에서 가능합니다.'],
        'depositAmounts' => '출금 가능 포인트',
    ],
    'exchange' => [
        'title' => '머니 이동',
        'subTitle' => '원라인 포인트를 게임머니로',
        'currentAssets'=>'현재 자산',
        'myDepositAmounts'=>'원라인 포인트',
        'myHoldemMoney'=>'슬롯 게임 머니',
        'myHoldemSafeMoney' => '홀덤의 금고에 들어 있는 칩',
        'sendDeposit'=>'게임 칩을 원라인 포인트로 교환',
        'sendGameMoney'=>'원라인 포인트를 게임 머니로 교환',
        'deposit'=>'원라인 포인트',
        'from' => 'From',
        'to' => 'To',
        'sendDepositErr' => [
            'minimum' => '게임 머니를 예치금으로 교환 할 때, :min 단위는 최소입니다',
            'amounts' => '현재 보유량보다  많은 금액을 입력했습니다.',
            'notFound' => '게임 데이터를 찾을 수 없습니다.',
            'units' => '1000 포인트 단위로 적용',
        ],
        'sendDepositSuccess' =>'성공적인 교환. 자산을 확인하십시오.',
        'sendGameErr' => [
            'amounts' => '현재 자산보다 많은 금액을 입력했습니다.',
            'notFound' => '게임 데이터를 찾을 수 없습니다.',
            'notFoundUser'=> '사용자 게임 데이터를 찾을 수 없음'
        ],
        'sendGameSuccess' =>'성공적인 교환. 자산을 확인하십시오.',
        'subtitles' => ['당신의 모든 자산입니다.','게임을 플레이하기 위해서는 반드시 원라인 포인트를 게임 칩으로 교환해야 합니다. <br>그 비율은 1:100입니다.', '당신이 출금을 원한다면, 당신은 원라인 포인트로 출금을 할 수 있습니다. 오직 금고의 칩으로만 원라인 포인트로 교환할 수 있습니다.<br>그 비율은 0.01입니다.']
    ]
];
