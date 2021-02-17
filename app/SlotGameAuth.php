<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SlotGameAuth extends Model
{
    protected $connection   = 'mssql_user';
    protected $table        = 'Web_UserAuth';
    protected $primaryKey   = 'Aid';

    public const CREATED_AT = null;
    public const UPDATED_AT = null;

    protected $fillable = [
        'Aid',
        'CertificationKey',
        'UpdateDate',
    ];
}
