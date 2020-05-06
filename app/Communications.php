<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Communications extends Model
{
    protected $table = 'communications';
    protected $primaryKey = 'communications_id';
    public $timestamps = false;
}
