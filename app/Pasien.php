<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $table = 't_pasien';

    public $timestamps = true;

    protected $fillable = [
        "nama",
        "umur",
        "jenis_kelamin_id",
        "pekerjaan_id",
        "pendidikan_id",
        "status_perkawinan_id",
        "agama_id",
        "tanggal_pemeriksaan"
      ];
}
