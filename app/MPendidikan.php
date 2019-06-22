<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MPendidikan extends Model
{
    protected $table = 'm_pendidikan';

    public $timestamps = false;

    protected $fillable = [
        "pendidikan",
      ];
}
