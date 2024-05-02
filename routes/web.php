<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/test', function () {
    //return '<h1>TEST</h1>';
    return view('test');
})->name('test');

Route::get('/cus', function () {
    return 'cus';
});

Route::get('/login', function () {
    return view('baseWeb.login');
})->name('login');

Route::post('/login', [UserController::class, 'login']);

Route::get('/registration', function () {
    return view('baseWeb.registration');
})->name('registration');

Route::post('/registration', [UserController::class, 'registration']);
