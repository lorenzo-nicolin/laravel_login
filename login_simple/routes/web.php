<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('welcome');
});

//registration 

//Route::get(uri: '/register', 'RegisterController@showRegistrationForm')->name('register');
//Route::post('/register', 'RegisterController@register');


Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::get('/login', [RegisterController::class, 'showLoginForm'])->name('login');

Route::post('/login', [RegisterController::class, 'login'])->name('login');
Route::post('/register', [RegisterController::class, 'register']);