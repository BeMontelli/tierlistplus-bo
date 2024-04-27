<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiUserController;

Route::group(['prefix' => '/v1'], function(){
    Route::get('/user', ApiUserController::class .'@user')->name('api.user')->middleware('auth:sanctum');
    Route::post('/register', ApiUserController::class .'@register')->name('api.user.register');
    Route::post('/login', ApiUserController::class .'@login')->name('api.user.login');
});

