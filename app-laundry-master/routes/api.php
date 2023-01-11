<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\EmployeeController;
use App\Http\Controllers\API\MahasiswaController;

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

//register dan login
Route::post('register',[AuthController::class, 'register']);
Route::post('login',[AuthController::class, 'login']);
// Route::post('logout',[AuthController::class, 'logout']);
Route::group(['middleware' => ['auth:sanctum']], function() {    
    Route::post('logout',   [AuthController::class, 'logout']);
  });


//mahasiswa
Route::get('mahasiswa',[MahasiswaController::class,'index']);
Route::post('mahasiswa/store',[MahasiswaController::class,'store']);
Route::get('mahasiswa/show/{id}',[MahasiswaController::class,'show']);
Route::post('mahasiswa/update/{id}',[MahasiswaController::class,'update']);
Route::get('mahasiswa/destroy/{id}',[MahasiswaController::class,'destroy']);

//employee
Route::get('Employee',[EmployeeController::class,'index']);
Route::post('Employee/store',[EmployeeController::class,'store']);
Route::get('Employee/show/{id}',[EmployeeController::class,'show']);
Route::post('Employee/update/{id}',[EmployeeController::class,'update']);
Route::get('Employee/destroy/{id}',[EmployeeController::class,'destroy']);







Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
