<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\CompanyController;
use \App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::middleware(['auth','isAdmin'])->group(function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('companies', [CompanyController::class, 'index'])->name('companies.index');
    Route::get('companies/create', [CompanyController::class, 'create'])->name('companies.create');
    Route::get('companies/edit/{id}', [CompanyController::class, 'edit'])->name('companies.edit');
    Route::post('companies/store', [CompanyController::class, 'store'])->name('companies.store');
    Route::post('companies/destroy', [CompanyController::class, 'destroy'])->name('companies.destroy');

    Route::get('clients', [ClientController::class, 'index'])->name('clients.index');
    Route::get('clients/create', [ClientController::class, 'create'])->name('clients.create');
    Route::get('clients/edit/{id}', [ClientController::class, 'edit'])->name('clients.edit');
    Route::post('clients/store', [ClientController::class, 'store'])->name('clients.store');
    Route::post('clients/destroy', [ClientController::class, 'destroy'])->name('clients.destroy');
});
