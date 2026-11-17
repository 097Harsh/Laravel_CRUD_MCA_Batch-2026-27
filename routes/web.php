<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\democontroller;
use App\Http\Controllers\AuthController;

Route::get('/',[democontroller::class,'index'])->name('login');
Route::post('/login',[AuthController::class,'login'])->name('auth');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');
Route::get('/dashboard',[democontroller::class,'dashboard'])->name('dashboard')->middleware('auth');
//manage user module
Route::get('/manageuser',[democontroller::class,'manage_user'])->name('manageuser')->middleware('auth');
//add record 
Route::get('/add',[democontroller::class,'add_record'])->name('add')->middleware('auth');
