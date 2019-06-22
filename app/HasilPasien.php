<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HasilPasien extends Model
{
    protected $table = 't_pasien_hasil';

    public $timestamps = false;

    protected $fillable = [
        "pasien_id",
        "hasil",
        "diagnosa_id",
      ];
}
