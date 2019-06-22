<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');

    $router->resource('/gejala', TGejalaController::class);
    $router->resource('/diagnosa', DiagnosaController::class);
    $router->resource('/agama', AgamaController::class);
    $router->resource('/jenis-kelamin', JenisKelaminController::class);
    $router->resource('/pekerjaan', PekerjaanController::class);
    $router->resource('/pendidikan', PendidikanController::class);
    $router->resource('/status-perkawinan', StatusPerkawinanController::class);
    $router->resource('/solusi', SolusiController::class);
    $router->resource('/pasien', PasienController::class);
});
