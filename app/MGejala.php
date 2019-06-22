<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MGejala extends Model
{
    protected $table = 'm_gejala';

    public $timestamps = false;

    protected $fillable = [
        "no_gejala",
      ];

    public function Keluhan()
    {
        return $this->hasMany(Gejala::class);
    }
}
