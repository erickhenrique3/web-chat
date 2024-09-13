<?php

use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['middleware' => ['auth:sanctum']],function(){
    Route::get('/users',[UserController::class, 'index']);
    Route::get('/users/{user}',[UserController::class, 'show']);
    Route::get('/messages/{user}', [MessageController::class, 'listMessages']);
    Route::post('/messages/store', [MessageController::class, 'store']);
});
