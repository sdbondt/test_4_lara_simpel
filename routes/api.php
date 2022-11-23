<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\VehicleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/clients/{client}/vehicles/{vehicle}', [DeliveryController::class, 'store'])->name('deliveries.store');

Route::post('/companies', [CompanyController::class, 'store'])->name('companies.store');
Route::patch('/companies/{company}', [CompanyController::class, 'update'])->name('companies.update');
Route::delete('/companies/{company}', [CompanyController::class, 'destroy'])->name('companies.destroy');
Route::get('/companies/{company}', [CompanyController::class, 'show'])->name('companies.show');
Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index');

Route::post('/companies/{company}/vehicles', [VehicleController::class, 'store'])->name('vehicles.store');
Route::patch('/vehicles/{vehicle}', [VehicleController::class, 'update'])->name('vehicles.update');
Route::delete('/vehicles/{vehicle}', [VehicleController::class, 'destroy'])->name('vehicles.destroy');
Route::get('/companies/{company}/vehicles', [VehicleController::class, 'index'])->name('vehicles.index');

Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');
Route::patch('/clients/{client}', [ClientController::class, 'update'])->name('clients.update');
Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
Route::delete('/clients/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');

