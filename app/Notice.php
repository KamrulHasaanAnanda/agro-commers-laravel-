<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    //
    protected $table = "notice";
    protected $primaryKey = "nid";
    public $timestamps = false; 
}
