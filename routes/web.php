<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('category', CategoryController::class);




// for login
Route::get('/login', [AuthController::class,'login'])->name('login');
Route::post('/login',[AuthController::class,'loginPost'])->name('login.post');

// for register
Route::get('/register', [AuthController::class,'register'])->name('register');
Route::post('/register',[AuthController::class,'registerPost'])->name('register.post');



Route::get('/dbcon',function(){
    return view('auth.dbconn');
});


Route::get('/countries', [CountryController::class, 'index']);
