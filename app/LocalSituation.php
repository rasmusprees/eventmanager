<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocalSituation extends Model
{
    protected $table = 'local_situation';
    protected $primaryKey = 'situation_id';
    public $timestamps = false;
}
