<?php

return [
    'title' => 'Wallet',
    'deal' => 'Deal',

    'menu' => [
        'create' => 'Create',
        'send' => 'Send',
        'allocation' => 'Allocation',
        'deposit' => 'Deposit',
        'withdrawals' => 'Withdrawals',
        'exchange' => 'Exchange',

    ],
    'pinPassword' => 'ПИН нууц үг',

    'deposit' => [
        'title' => 'Deposit For Sun Point',
        'title_under' => '아마존 포인트 충전을 위해 입금신청을 부탁드립니다',
        'casherAmounts' => 'Бэлэн мөнгөний хэмжээ',
        'minimum' => 'Хадгаламжийн доод хэмжээ ',
        'minimum2' => 'байна',
        'depositAmounts' => 'Sun Point Тоо хэмжээ',
        'bank' => 'Хадгаламжийн мэдээлэл',
        'bankHolder' => 'Account Holder Name',
        'bankNumber' => 'Account Number',
        'info' => ['Хадгаламж оруулахаасаа өмнө хадгалуулах банкны мэдээллээ заавал шалгаарай.','Хадгаламж авах өргөдөл гаргасны дараа дээрх мэдээллийг хадгалуулахгүй бол автоматаар цуцлагдах болно.'],
		'alert' => 'Would you like to deposit that amount?',
        'inputAmount' => 'Хэмжээ оруулна уу.',
        'rate_alert' => '',
        'user_info' => ['* After making sure that your bank information matches the details below, you must apply for a deposit.'],
        'deposit_info' => 'Deposit Information'
    ],
    'withdrawals' => [
        'title' => 'Withdrawals',
        'subtitle' => 'At Deposits',
        'minimum' => 'Зарлагын доод хэмжээ нь ',
        'minimum2' => 'байна',
        'withdrawalsAmounts' => 'Татаж авах хэмжээ',
        'balanceAmounts' => 'Татаж авсны дараа нарны онооны үлдэгдэл',
        'bank' => 'Миний банкны мэдээлэл',
        'bankHolder' => 'Банкны данс эзэмшигчийн нэр',
        'bankNumber' => 'Банкны дансны дугаар',
        'info' => ['Банкныхаа мэдээллийг буцааж авахад зөв эсэхийг шалгана уу.','Хэрэв таны банкны мэдээлэл буруу байвал Миний мэдээлэл цэсэнд оруулна уу.']
    ],
    'exchange' => [
        'title' => 'Мөнгө оруулах & мөнгө солих',
        'subTitle' => 'тоглоом эхлүүлэх',
        'currentAssets'=>'одоогын хөрөнгө',
        'myDepositAmounts'=>'СОН оноо',
        'myHoldemMoney'=>'Сон оноог тоглоомны чипруу солих',
        'myHoldemSafeMoney' => 'Холдом дансанд байгаа чип',
        'sendDeposit'=>'Тоглоомын чипийг Sun Point-р солих',
        'sendGameMoney'=>'Sungame Point-ыг тоглоомын чипээр солих',
        'deposit'=>'СОН оноо',
        'from' => 'From',
        'to' => 'To',
        'sendDepositErr' => [
            'minimum' => 'When the game money is exchanged for a deposits, :min units is the minimum',
            'amounts' => 'You have entered an amount greater than your current asset.',
            'notFound' => 'Not Found Game Data.',
            'units' => 'Apply in 1000 point increments',
        ],
        'sendDepositSuccess' =>'Successful exchange. Check your assets.',
        'sendGameErr' => [
            'amounts' => 'You have entered an amount greater than your current asset.',
            'notFound' => 'Not Found Game Data.',
            'notFoundUser'=> 'Not Found User Game Data'
        ],
        'sendGameSuccess' =>'Successful exchange. Check your assets.',
        'subtitles' => ['Таны бүх хөрөнгө.','Хэрэв та эргүүлэн татахыг хүсч байгаа бол Sun Points-оор татан авах боломжтой. Зөвхөн сейфэнд байгаа чипсийг Sun Points-оор сольж болно. Энэ харьцаа 0.01 байна', 'Тоглоом тоглохын тулд та Sun Point-г тоглоомын чипсээр солих ёстой.Валютын ханш зуу дахин нэмэгдсэн.']
     ]
];
