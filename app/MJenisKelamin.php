<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MJenisKelamin extends Model
{
    protected $table = 'm_jenis_kelamin';

    public $timestamps = false;

    protected $fillable = [
        "jenis_kelamain",
      ];
}
