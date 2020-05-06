<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dates extends Model
{
    protected $table = 'dates';
    protected $primaryKey = 'dates_id';
    public $timestamps = false;
}
