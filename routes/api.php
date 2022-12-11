<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\CompanyController;
use \App\Http\Controllers\Api\ClientController;
use \App\Http\Controllers\Api\UserLoginController;

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



Route::post('/login',                   [UserLoginController::class, 'index']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/companies',                [CompanyController::class, 'index'])->name('companies');
    Route::get('/clients',                  [ClientController::class, 'index'])->name('clients');
    Route::get('/clients/{id}/companies',   [ClientController::class, 'clientCompanies'])->name('clientCompanies');

});

