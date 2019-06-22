<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gejala;
use App\MGejala;
use App\MPekerjaan;
use App\MAgama;
use App\MJenisKelamin;
use App\MPendidikan;
use App\MStatusPerkawinan;

class APIMasterRefController extends Controller
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

    public function getMasterData(){
        $pekerjaan = MPekerjaan::all();
        $agama = MAgama::all();
        $jenis_kelamin = MJenisKelamin::all();
        $pendidikan = MPendidikan::all();
        $status_kawin = MStatusPerkawinan::all();
        return [
            "success"   => true,
            "pekerjaan" => $pekerjaan,
            "agama"     => $agama,
            "jenis_kelamin" => $jenis_kelamin,
            "pendidikan"    => $pendidikan,
            "status_kawin"  => $status_kawin
        ];
    }
}