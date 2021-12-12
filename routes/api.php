<?php

use App\Http\Controllers\Api\AuthController;
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
Route::post('/create', [App\Http\Controllers\HomeController::class, 'create'])->name('create');
Route::post('/update', [App\Http\Controllers\HomeController::class, 'update'])->name('update');
Route::post('/delete', [App\Http\Controllers\HomeController::class, 'delete'])->name('delete');
/*Route::get('/get-custom-users', [App\Http\Controllers\HomeController::class, 'filterUser'])->name('get.filterUsers');*/
Route::get('/except', [App\Http\Controllers\HomeController::class, 'excep']);


//Auth
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);


Route::middleware('auth:sanctum')->group( function () {
    Route::get('/get-users', [App\Http\Controllers\HomeController::class, 'filterUser'])->name('get.users');
    Route::get('/log-out', [AuthController::class, 'apiLogout']);

});
