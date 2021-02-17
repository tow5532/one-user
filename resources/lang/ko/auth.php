<?php

return [

    'failed' => '제출하신 로그인 정보가 정확하지 않습니다.',
    'throttle' => ':seconds초 후에 다시 시도하세요.',

    'form' => [
        'name' => '이름',
        'email' => '이메일',
        'password' => '비밀번호',
        'password_confirmation' => '비밀번호 확인',
        'password_new' => '새로운 비밀번호',
        'id' => '아이디',
        'username' => '아이디',
        'bank' => '은행',
        'bank_title' => '은행 이름',
        'bank_ex' => '예) 미국은행',
        'bank_account' => '은행 계좌번호',
        'bank_account_horder_name' => '예금주 이름',
        'account_horder_ex' => ' 예) 홍길동',
        'account_holder' => 'ex) 1234-4512-999-01',
        'withdrawal_password' => '출금비밀번호',
        'phone' => '전화번호',
        'refer_id' => '추천인 아이디',
        'facebook' => '페이스북 아이디',
        'nickname' => '별명'
    ],

    'sessions' => [
        'title' => '로그인',
        'title_page' => '아이디로 로그인',
        'sub_title_page' => '귀하의 계정에 로그인하십시오',
        'destroy' => '로그아웃',
        'description' => '아래 내용을 입력후, 가입하신후에 해당 이메일을 확인해 주세요.',
        'login_with_github' => '깃허브 계정으로 로그인하기',
        'remember' => '로그인 기억하기',
        'remember_help' => '(공용 컴퓨터에서는 사용하지 마세요!)',
        'send_login' => '로그인',
        'ask_registration' => '회원이 아니라면? <a href=":url"> 가입하세요. </a>',
        'ask_forgot' => '<a href=":url"> 비밀번호를 잊으셨나요? </a>',
        'caveat_for_social' => '깃허브 로그인 사용자는 따로 회원가입하실 필요없습니다. 이 분들은 비밀번호가 없습니다.',
        'error_social_user' => '회원가입하지 않으셨습니다. 지난번엔 깃허브로 로그인하셨어요.',
        'error_incorrect_credentials' => '이메일 또는 비밀번호가 맞지 않습니다.',
        'error_not_confirmed' => '입력하신 이메일로 발송된 가입확인 메일을 확인해 주세요.',
        'info_welcome' => ':name님, 환영합니다.',
        'info_bye' => '또 방문해 주세요.',
        'mypage' => '내정보',
    ],

    'users' => [
        'title' => '회원가입',
        'title_page' => '출금에서 사용하는 2단계 비밀번호 설정입니다.',
        'sub_title' => '귀하의 계정을 만들어 주세요.',
        'description' => '깃허브 계정으로 로그인하면 회원가입이 필요없습니다.',
        'send_registration' => '가입하기',
        'error_wrong_url' => 'URL이 정확하지 않습니다.',
        'info_welcome' => ':name님, 환영합니다.',
        'info_confirmed' => ':name님, 환영합니다. 가입 확인되었습니다.',
        'info_confirmation_sent' => '가입하신 메일 계정으로 가입확인 메일을 보내드렸습니다. 가입확인하시고 로그인해 주세요.',
        'is_account_link' => '계정이 있습니까?',
        'is_account_text' => '여기서 로그인 하세요',
    ],

    'passwords' => [
        'title_reminder' => '비밀번호 바꾸기 신청',
        'desc_reminder' => '회원가입한 이메일로 신청한 후, 메일박스를 확인하세요.',
        'send_reminder' => '비밀번호 바꾸기 메일 발송',
        'title_reset' => '비밀번호 바꾸기',
        'desc_reset' => '회원가입한 이메일을 입력하고 새로운 비밀번호를 입력하세요.',
        'send_reset' => '비밀번호 바꾸기',
        'sent_reminder' => '비밀번호를 바꾸는 방법을 담은 이메일을 발송했습니다. 메일박스를 확인하세요.',
        'error_wrong_url' => 'URL이 정확하지 않습니다.',
        'success_reset' => '비밀번호를 바꾸었습니다. 새로운 비밀번호로 로그인하세요.'
    ],
    'mypage' => [
        'title' => '마이 페이지',
        'info' => '회원 정보',
        'email' => '이메일 주소',
        'name' => '이름',
    ],
    'notice' => [
        'notice' => '주의 사항:',
        'bank' => '모든 정보는 암호로 보관됩니다. 반드시 당신의 은행 정보를 올바르게 입력하세요. 잘못된 정보는 불이익을 받을 수 있습니다.',
        'finish' => [
            '회원 가입이 완료되었습니다.',
            '게임 플레이는 충전 후 가능합니다.',
            '입금을 하면 원라인 포인트으로 받습니다. 원라인 포인트는 반드시 게임머니로 이동해야  정상적인 게임 플레이가 가능합니다.',
            '입금 신청하러 가기',
            '슬롯 게임 다운로드',
            '내 정보 확인'
        ]
    ],
    'g-recaptcha-response' => [
        'required' => '로봇이 아닌지 확인해 주세요.',
        'captcha' => 'Captcha 에러입니다.!잠시후에 이용해주시거나, 관리자에게 문의 하세요',
    ],
    'button' => [
        'confirm' => '확인',
        'next' => '다음',
        'cancel' => '취소',
        'signup' => '회원가입',
        'deposit' => '신청하기',
        'download' => '다운로드',
        'login' => '로그인',
        'close' => '닫기'
    ],
    'join_process' => [
        'same_id'=> '동일한 아이디 가 이미 있습니다.',
        'refer_id'=> '추천 아이디가 없습니다.',
        'pincode_match' => '같은 번호를 입력해야합니다.',
        'pincode_length' => 'PIN 코드는 네자리  이어야 합니다.',
    ],
    'createPincode' => [
        'title' =>'PIN 비밀번호'
    ],
    'placeholder' => [
        'id' => '영어와 숫자로만 입력 / 6~12자리',
        'password' => '6~12자리',
        'facebook' => 'abcd@gmail.com(example)'
    ],
];
