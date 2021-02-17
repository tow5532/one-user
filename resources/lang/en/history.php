<?php
/**
 * Created by PhpStorm.
 * User: YONGMAN LEE
 * Date: 2020-07-26
 * Time: 오후 7:08
 */

return [
    'title' => 'Deposit & Withdrawals History',
    'code' => [
        'deposits' => 'Deposit',
        'withdrawals' => 'Withdrawals',
    ],
     'deposits' =>
        [
            'reg'=>['title' => 'A deposits request has been received.',
             'content'=> 'The information in the deposit account is updated from time to time.<br>Always check your account information accurately on the deposits page.'
            ],
            'error' => ['title' => 'The amount requested and the amount deposited are different',
                'content'=> 'The amount currently requested and the amount actually deposited are different.<br>Please contact the administrator. Go to “help” page.'
            ],
            'success'=>['title' => 'Deposits is complete',
                'content'=> 'Deposits is complete.','Check the deposits amounts at My page.<br>If there is no deposit in the amount, click Refresh.'
            ],
            'cancel' => ['title' => 'The deposits request was canceled',
                'content'=> 'The deposits request was canceled because no deposit was made after a certain period of time.<br>If you want to deposits, you have to apply again.'
            ],
        ],
        'withdrawals' => [
            'refund' => ['title' => 'Your withdrawal request has been accepted',
                'content'=> 'Your withdrawal request has been accepted.','It will be deposited after a while with the information of the registered bank account.<br>Once it is completed, you can check it in history.'
            ],
            'refund_ok'=>['title' => 'The withdrawal request has been completed',
                'content'=> 'The withdrawal request has been completed.<br>Thank you very much.'
            ],
            'refund_cancel' => ['title' => 'Withdrawals is not possible',
                'content'=> 'Withdrawals is not possible because your account information is incorrect.<br>Check your bank account information in My page. <br>After correcting your bank account information, you will need to proceed with the withdrawal request'
            ],
        ],
        'Requested' => 'Sun Points You Requested'
    ];