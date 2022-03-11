<?php

use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\EmployeeDataController;
use App\Http\Controllers\Api\PharmacistController;
use App\Http\Controllers\Api\PharmacistDataController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/employees/countries', [EmployeeDataController::class, 'countries']);
Route::get('/employees/{country}/states', [EmployeeDataController::class, 'states']);
Route::get('/employees/departments', [EmployeeDataController::class, 'departments']);
Route::get('/employees/{state}/cities', [EmployeeDataController::class, 'cities']);
Route::get('/employees/pharmacists', [EmployeeDataController::class, 'pharmacists']);

Route::get('/pharmacists/departments', [PharmacistDataController::class, 'departments']);
Route::get('/pharmacists', [PharmacistController::class, 'index']);
Route::post('/pharmacists', [PharmacistController::class, 'store']);
Route::delete('/pharmacists/{pharmacist}', [PharmacistController::class, 'destroy']);

Route::get('/pharmacies', [PharmacistController::class, 'index']);
Route::post('/pharmacies', [PharmacistController::class, 'store']);
Route::delete('/pharmacies/{pharmacist}', [PharmacistController::class, 'destroy']);

//Route::resource('pharmacies', PharmaciesController::class);
Route::apiResource('employees', EmployeeController::class);
Route::apiResource('pharmacies', PharmaciesController::class);
