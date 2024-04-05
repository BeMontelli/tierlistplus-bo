<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'dashboard', 'middleware' => [
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',]
], function(){

    // Home
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    // Users
    Route::get('/tierlists', function () {
        return view('tierlists');
    })->name('tierlists');

    // Users
    Route::get('/users', UserController::class .'@index')->name('users.index');
    Route::get('/users/{id}', UserController::class .'@edit')->name('users.edit');
    Route::put('/users/{id}', UserController::class .'@update')->name('users.update');
    Route::delete('/users/{id}', UserController::class .'@destroy')->name('users.destroy');
});
