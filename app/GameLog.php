<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GameLog extends Model
{
    protected $connection   = 'mssql';
    protected $table        = 'GameLog';
    protected $primaryKey   = 'idx';


}
