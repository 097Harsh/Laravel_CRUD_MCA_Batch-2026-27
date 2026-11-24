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
Route::post('/add_user',[democontroller::class,'add_user'])->name('add_user')->middleware('auth');
//delete record
Route::get('/delete/{id}',[democontroller::class,'delete_record'])->name('delete_record')->middleware('auth');
//edit record
Route::get('/edit/{id}',[democontroller::class,'edit_record'])->name('edit_record')->middleware('auth');
Route::post('/update_user',[democontroller::class,'update_user'])->name('update_user')->middleware('auth');
//search recor