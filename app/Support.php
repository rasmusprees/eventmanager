<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    protected $table = 'support';
    protected $primaryKey = 'support_id';
    public $timestamps = false;
}
