<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MStatusPerkawinan extends Model
{
    protected $table = 'm_status_perkawinan';

    public $timestamps = false;

    protected $fillable = [
        "status_perkawinan",
      ];

}
