<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;

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
 //Fungsi authentikasi : membatasi hak akses ilegal
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Fungsi limit : membatasi jumlah akses
Route::middleware( 'throttle:3,5')->group(function (){
    
    Route::post('/login',[AuthController::class, 'login']);
    Route::post('/register',[UserController::class, 'register']);
    
//Fungsi authentikasi : membatasi hak akses ilegal
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/logout',[AuthController::class, 'logout']);
        Route::get('/me',[AuthController::class, 'me']);
        Route::apiResource('students',StudentController::class);

    });

});

  

