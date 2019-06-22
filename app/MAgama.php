<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MAgama extends Model
{
    protected $table = 'm_agama';

    public $timestamps = true;

    protected $fillable = [
        "agama",
      ];
}
