<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timeline extends Model
{
    protected $table = 'timeline';
    protected $primaryKey = 'timeline_id';
    public $timestamps = false;
}
