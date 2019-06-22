<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gejala;
use App\Diagnosa;
use App\MGejala;
use App\MPekerjaan;
use App\MAgama;
use App\MJenisKelamin;
use App\MPendidikan;
use App\MStatusPerkawinan;
use App\Pasien;
use App\HasilPasien;

class APIPasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addPasien(Request $request)
    {
        $pasien = new Pasien;
        $pasien->nama = $request->input('nama');
        $pasien->umur = $request->input('umur');
        $pasien->jenis_kelamin_id = $request->input('jenis_kelamin_id');
        $pasien->pekerjaan_id = $request->input('pekerjaan_id');
        $pasien->pendidikan_id = $request->input('pendidikan_id');
        $pasien->status_perkawinan_id = $request->input('status_perkawinan_id');
        $pasien->agama_id = $request->input('agama_id');
 

        $saved = $pasien->save();
        if(!$saved){
           return [
                "success" => false,
                "message" => 'Gagal menyimpan data',
            ];
        }else{
            return [
                "success" => true,
                "message" => 'Pasien Berhasil Disimpan',
                "data" => $pasien,
            ];
        }   
    }

    public function addHasil(Request $request)
    {
        $hasil = $request->input('hasil');
        $diagnosa = Diagnosa::where('range_start', '<', $hasil)
        ->where('range_end', '>', $hasil)
        ->first();

        
        $PasienHasil = new HasilPasien;
        $PasienHasil->pasien_id = $request->input('pasien_id');
        $PasienHasil->hasil = $hasil;
        $PasienHasil->diagnosa_id = $diagnosa->id;

        $saved = $PasienHasil->save();
        if(!$saved){
           return [
                "success" => false,
                "message" => 'Gagal menyimpan data',
            ];
        }else{
            return [
                "success" => true,
                "message" => 'Pasien Berhasil Disimpan',
                "data" => $PasienHasil
            ];
        }   
    }


    public function getHasil($hasil_id)
    {
        $hasil = HasilPasien::where('t_pasien_hasil.id', $hasil_id)
        ->join('m_diagnosa', 'm_diagnosa.id', 't_pasien_hasil.diagnosa_id')
        ->join('t_pasien', 't_pasien.id', 't_pasien_hasil.pasien_id')
        ->join('m_solusi', 'm_solusi.diagnosa_id', 'm_diagnosa.id')
        ->first();

        return [
            "data" => $hasil
        ];
    }
}