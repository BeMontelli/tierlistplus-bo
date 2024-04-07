<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TierlistController;
use App\Http\Controllers\CategoryController;

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

    // Tierlists
    Route::get('/tierlists', TierlistController::class .'@index')->name('tierlists.index');
    Route::get('/tierlists/create', TierlistController::class . '@create')->name('tierlists.create');
    Route::post('/tierlists', TierlistController::class .'@store')->name('tierlists.store');
    Route::get('/tierlists/{post}', TierlistController::class .'@show')->name('tierlists.show');
    Route::get('/tierlists/{post}/edit', TierlistController::class .'@edit')->name('tierlists.edit');
    Route::put('/tierlists/{post}', TierlistController::class .'@update')->name('tierlists.update');
    Route::delete('/tierlists/{post}', TierlistController::class .'@destroy')->name('tierlists.destroy');

    // Categories
    Route::get('/categories', CategoryController::class .'@index')->name('categories.index');
    Route::get('/categories/create', CategoryController::class . '@create')->name('categories.create');
    Route::post('/categories', CategoryController::class .'@store')->name('categories.store');
    Route::get('/categories/{post}', CategoryController::class .'@show')->name('categories.show');
    Route::get('/categories/{post}/edit', CategoryController::class .'@edit')->name('categories.edit');
    Route::put('/categories/{post}', CategoryController::class .'@update')->name('categories.update');
    Route::delete('/categories/{post}', CategoryController::class .'@destroy')->name('categories.destroy');

    // Users
    Route::get('/users', UserController::class .'@index')->name('users.index');
    Route::get('/users/{id}', UserController::class .'@edit')->name('users.edit');
    Route::put('/users/{id}', UserController::class .'@update')->name('users.update');
    Route::delete('/users/{id}', UserController::class .'@destroy')->name('users.destroy');
});
