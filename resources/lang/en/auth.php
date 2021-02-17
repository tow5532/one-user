<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'failed' => 'These credentials do not match our records.',
    'throttle' => 'Too many login attempts. Please try again in :seconds seconds.',


    'form' => [
        'id' => 'Үнэмлэх',
        'email' => 'Email',
        'username' => 'UserName',
        'password' => 'нууц үг',
        'password_confirmation' => 'Нууц үгээ баталгаажуулна уу',
        'password_new' => 'New Password',
        'bank' => 'Bank',
        'bank_title' => 'банкны нэр',
        'bank_ex' => 'ex) Bank of America',
        'bank_account' => 'Банкны дансны дугаар',
        'bank_account_horder_name' => 'Данс эзэмшигчийн нэр',
        'account_horder_ex' => ' ex) John Doe',
        'account_holder' => 'ex) 1234-4512-999-01',
        'withdrawal_password' => 'Withdrawal Password',
        'phone' => 'Phone',
        'refer_id' => 'Лавлагаа өгөх үнэмлэх',
        'facebook' => 'E-Mail address (optional)',
        'nickname' => 'Nick Name'
    ],
    'sessions' => [
        'title' => 'Login',
        'title_page' => 'Log in with your id',
        'sub_title_page' => 'Login to your Account',
        'destroy' => 'Logout',
        'description' => 'Login with your Github account '.config('app.name'). ' account is also workable',
        'login_with_github' => 'Login with Github account',
        'remember' => 'Remember login',
        'remember_help' => "(don't check in public computer)",
        'send_login' => 'Log Me In',
        'ask_registration' => 'Don\'t have account? Click <a href=":url">this </a> to get one.',
        'ask_forgot' => '<a href=":url"> Forgot password? </a>',
        'caveat_for_social' => 'Github user does not have password.',
        'error_social_user' => 'You are Github user. Login with Github',
        'error_incorrect_credentials' => 'ID and Password combination dees not match.',
        'error_not_confirmed' => 'Confirm your registration.',
        'info_welcome' => 'Welcome :name',
        'info_bye' => 'Bye~ Please come by again.',
        'mypage' => 'MyPage'
    ],

    'users' => [
        'title' => 'Register',
        'title_page' => 'ID үүсгэх',
        'sub_title' => 'Бүртгүүлэх',
        'description' => 'Please enter the details below and confirm the e-mail after signing up.',
        'send_registration' => 'Let Me In',
        'error_wrong_url' => 'URL not correct.',
        'info_welcome' => 'Welcome :name.',
        'info_confirmed' => 'Welcome :name. Your registration confirmed.',
        'info_confirmation_sent' => 'We sent an email to ask you confirmation. Required to see you are not a ROBOT.',
        'info_join_success' => 'Membership registration has been successfully completed.',
        'is_account_link' => 'Do you have an account?',
        'is_account_text' => 'log in here',
        'accept_check' => 'Accept our <a href=":url" target="_blank">privacy policy </a> and <a href=":url2" target="_blank">customer agreement </a>',
    ],

    'passwords' => [
        'title_reminder' => 'Remind Password',
        'desc_reminder' => 'Provide your email address.',
        'send_reminder' => 'Send Me A Reminder',
        'title_reset' => 'Reset Password',
        'desc_reset' => 'Provide your email address.',
        'send_reset' => 'Reset',
        'sent_reminder' => 'We sent an email with a URL that is required for resetting your password.',
        'error_wrong_url' => 'URL not correct.',
        'success_reset' => 'Done. Login with your new password.'
    ],
    'mypage' => [
        'title' => 'My Page',
        'info' => 'Member Info',
        'email' => 'Email Address',
        'name' => 'Name',
    ],
    'g-recaptcha-response' => [
        'required' => 'Please verify that you are not a robot.',
        'captcha' => 'Captcha error! try again later or contact site admin.',
    ],
    'createPincode' => [
        'title' =>'Саshe хийх 4 оронтой пин Та 4 оронтой пин хийснээр сhashe хийх боломжтой'
    ],
    'placeholder' => [
        'id' => 'Зөвхөн англи хэл, тоо / 6-12 оронтой тоог оруулна уу',
        'password' => '6-12 оронтой',
        'facebook' => 'abcd@gmail.com(example)'
    ],
    'button' => [
        'confirm' => 'Баталгаажуулах',
        'next' => 'Next',
        'cancel' => 'Cancel',
        'signup' => 'Sign up',
        'deposit' => 'deposit',
        'download' => 'Download',
        'login' => 'Log In',
        'close' => 'CLOSE'
    ],
    'notice' => [
        'notice' => 'анхааруулга :',
        'bank' => '“Бүх мэдээллийг нууц үгээр хадгалдаг.Банкныхаа мэдээллийг зөв оруулсан эсэхээ мартуузай.Буруу мэдээллийг шийтгэж болно. "',
        'finish' => [
            'Бүртгүүлэх ажил дууссан.',
            'Мөнгө оруулсаны  дараа тоглоом тоглох боломжтой.',
            '“Хадгаламж хийхдээ та Нарны оноо гэж хүлээн авдаг.Тоглоом тоглохын тулд нарны оноог тоглоомын чипээр солих ёстой. "',
            'Deposit for Sun Point',
            'GAME DOWNLOAD',
            'Go to My Page'
        ]
    ],

    'join_process' => [
        'same_id'=> 'The same ID address already exists',
        'refer_id'=> 'This is not a normal Invitation code. ',
        'pincode_match' => 'You must enter the same number',
        'pincode_length' => 'The Pin Code must be at least 4.',
    ],

];
