<?php

use App\Http\Controllers\Auth;
use App\Http\Controllers\InsertController;
use Illuminate\Support\Facades\Route;



Route::get('/',[InsertController::class,'display']);


Route::get('/post',[InsertController::class,'index'])->name('index');
Route::post('/post',[InsertController::class,'insert']);


Route::get('/search',[InsertController::class,'search']);

Route::get('/login',[Auth::class,'usershow']);
Route::post('/login',[Auth::class,'userlog'])->name('user-log');


Route::get('/signup',[Auth::class,'user_form']);
Route::post('/sign-up',[Auth::class,'usernew'])->name('usernew');

Route::get('/logout',[Auth::class,'logout']);

Route::get('/profile',[InsertController::class,'profile']);

Route::get('/edit',[Auth::class,'edit']);
Route::post('/updates',[Auth::class,'updates']);


Route::get('/apply/{slug}',[InsertController::class,'apply']);

