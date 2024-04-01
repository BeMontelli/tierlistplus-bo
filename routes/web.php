<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/dashboard/tierlists', function () {
        return view('tierlists');
    })->name('tierlists');
    Route::get('/dashboard/users', function () {
        return view('users');
    })->name('users');
});
