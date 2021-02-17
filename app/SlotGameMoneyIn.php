<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SlotGameMoneyIn extends Model
{
    protected $connection   = 'mssql_user';
    protected $table        = 'Web_UserMoneyIn';
    protected $primaryKey   = 'Idx';

    public const CREATED_AT = null;
    public const UPDATED_AT = null;

    protected $fillable = [
        'Aid',
        'Command',
        'Val1',
        'Comment',
        'flag',
    ];
}
