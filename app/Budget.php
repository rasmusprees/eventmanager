<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    protected $table = 'budget';
    protected $primaryKey = 'budget_id';
    public $timestamps = false;
}
