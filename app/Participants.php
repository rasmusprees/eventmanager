<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participants extends Model
{
    protected $table = 'participants';
    protected $primaryKey = 'participants_id';
    public $timestamps = false;
}
