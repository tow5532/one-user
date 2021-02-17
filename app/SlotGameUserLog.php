<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SlotGameUserLog extends Model
{
    protected $connection   = 'mssql_log';
    protected $table        = 'Web_UserPlayLog';
    protected $primaryKey   = 'Idx';

    public const CREATED_AT = null;
    public const UPDATED_AT = null;

    protected $fillable = [
        'Idx',
        'GameNo',
        'GameSrl',
        'Aid',
        'BettingMoney',
        'WinMoney',
        'Profit',
        'GameDate',
        'StartBalance',
        'EndBalance',
        'IsComplete',
    ];
}
