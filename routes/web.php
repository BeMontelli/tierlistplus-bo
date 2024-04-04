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
    Route::get('/user/{id}', UserController::class .'@show')->name('users.show');
    Route::get('/user/{id}/edit', UserController::class .'@edit')->name('users.edit');
    Route::put('/user/{id}', UserController::class .'@update')->name('users.update');
    Route::delete('/user/{id}', UserController::class .'@destroy')->name('users.destroy');
});
