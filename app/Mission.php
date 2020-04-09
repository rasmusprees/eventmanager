<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    /* deklareeritud sest automaaltselt lisanduks 'mission' nimele s lõppu */
    protected $table = 'mission';
    protected $primaryKey = 'mission_id';
}
