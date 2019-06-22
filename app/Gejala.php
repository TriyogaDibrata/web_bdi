<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    protected $table = 't_gejala';

    public $timestamps = false;

    protected $fillable = [
        "m_gejala_id",
        "gejala",
        "nilai"
      ];

    public function Pgejala()
    {
        return $this->hasOne(Mgejala::class, 'id', 'm_gejala_id');
    }
}
