<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MPekerjaan extends Model
{
    protected $table = 'm_pekerjaan';

    public $timestamps = false;

    protected $fillable = [
        "pekerjaan",
      ];
}
