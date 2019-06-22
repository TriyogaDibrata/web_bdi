<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MSolusi extends Model
{
    protected $table = 'm_solusi';

    public $timestamps = false;

    protected $fillable = [
        "diagnosa_id",
        "solusi"
      ];
}
