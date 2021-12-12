<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/service', function () {
    return view('pages.services');
});

Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/master', function () {
    return view('layouts.master');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/data', [App\Http\Controllers\HomeController::class, 'data'])->name('data');
Route::get('/orders', [App\Http\Controllers\RelationController::class, 'getOrders'])->name('orders');
Route::get('/all-orders', [App\Http\Controllers\RelationController::class, 'getAll'])->name('getAll');
Route::get('/orders-d', [App\Http\Controllers\RelationController::class, 'orders']);
Route::get('/cust', [App\Http\Controllers\RelationController::class, 'cust'])->name('cust');

Route::get('/roles', [App\Http\Controllers\RoleController::class, 'index'])->name('roles');
Route::get('/name', [App\Http\Controllers\RoleController::class, 'getName'])->name('name');
Route::get('/store', [App\Http\Controllers\RoleController::class, 'store'])->name('store');


