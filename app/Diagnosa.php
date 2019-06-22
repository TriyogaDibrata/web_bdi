<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diagnosa extends Model
{
    protected $table = 'm_diagnosa';
    
    public $timestamps = false;

    protected $fillable = [
        "diagnosa",
        "range_start",
        "range_end",
      ];
}