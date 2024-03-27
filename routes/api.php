<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('/user', [\App\Http\Controllers\UserController::class, 'register']);
Route::post('/user/login', [\App\Http\Controllers\UserController::class, 'login']);

Route::middleware(\App\Http\Middleware\ApiAuthMiddleware::class)->group(function () {
    Route::get('/user/current', [\App\Http\Controllers\UserController::class, 'get']);
    Route::patch('/user/current', [\App\Http\Controllers\UserController::class, 'update']);
    Route::delete('/user/logout', [\App\Http\Controllers\UserController::class, 'logout']);

    Route::post('/tcontact', [\App\Http\Controllers\ContactController::class, 'create']);
    Route::get('/tcontact', [\App\Http\Controllers\ContactController::class, 'search']);
    Route::get('/tcontact/{id}', [\App\Http\Controllers\ContactController::class, 'get'])->where('id', '[0-9]+');
    Route::put('/tcontact/{id}', [\App\Http\Controllers\ContactController::class, 'update'])->where('id', '[0-9]+');
    Route::delete('/tcontact/{id}', [\App\Http\Controllers\ContactController::class, 'delete'])->where('id', '[0-9]+');

    Route::post('/tcontact/{idContact}/address', [\App\Http\Controllers\AddressController::class, 'create'])
        ->where('idContact', '[0-9]+');
    Route::get('/tcontact/{idContact}/address', [\App\Http\Controllers\AddressController::class, 'list'])
        ->where('idContact', '[0-9]+');
    Route::get('/tcontact/{idContact}/address/{idAddress}', [\App\Http\Controllers\AddressController::class, 'get'])
        ->where('idContact', '[0-9]+')
        ->where('idAddress', '[0-9]+');
    Route::put('/tcontact/{idContact}/address/{idAddress}', [\App\Http\Controllers\AddressController::class, 'update'])
        ->where('idContact', '[0-9]+')
        ->where('idAddress', '[0-9]+');
    Route::delete('/tcontact/{idContact}/address/{idAddress}', [\App\Http\Controllers\AddressController::class, 'delete'])
        ->where('idContact', '[0-9]+')
        ->where('idAddress', '[0-9]+');
});