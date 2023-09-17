<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CodeController;
use App\Http\Controllers\DeviController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\FactureController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(ClientController::class)->group(function(){
        Route::get('get_customers','get_customers');
        Route::get('customers','customers');
        Route::post('create_customer','create_customer');
        Route::get('get_customer/{id}','get_customer');
        Route::post('update_customer/{id}','update_customer');
        Route::get('delete_customer/{id}','delete_customer');

});

Route::controller(ActeController::class)->group(function(){

        Route::get('get_actes','get_actes');
        Route::get('actes','actes');
        Route::post('create_acte','create_acte');
        Route::get('get_acte/{id}','get_acte');
        Route::post('update_acte/{id}','update_acte');
        Route::get('delete_acte/{id}','delete_acte');

});

Route::controller(CodeController::class)->group(function(){

        Route::get('get_codes','get_codes');
        Route::get('codes','codes');
        Route::post('create_code','create_code');
        Route::get('get_code/{id}','get_code');
        Route::post('update_code/{id}','update_code');
        Route::get('delete_code/{id}','delete_code');

});

Route::controller(FactureController::class)->group(function(){
        Route::post('create_facture','create_facture');
        Route::post('download_facture','download_facture');
        Route::post('send_facture','send_facture');
        Route::get('get_factures','get_factures');
});

Route::controller(DeviController::class)->group(function(){
        Route::post('create_devi','create_devi');
        Route::post('download_devi','download_devi');
        Route::post('send_devi','send_devi');
        Route::get('get_devis','get_devis');
});

Route::controller(AuthController::class)->group(function(){

        Route::post('register','register');
        Route::post('login','login');

});
