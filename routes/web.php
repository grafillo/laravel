<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\indexController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', [indexController::class, 'index'])
       ->name('index');

Route::get('get/{category}',  [indexController::class,'getCategory'])->name('category');

Route::get('addtopic',  [UserController::class,'index'])->name('indextopic')->middleware('auth');

Route::post('addtopic',  [UserController::class,'addTopic'])->name('addtopic')->middleware('auth');

Route::get('alltopics',  [UserController::class,'allTopics'])->name('alltopics')->middleware('auth');

Route::get('edittopic/{id}',  [UserController::class,'editTopic'])->name('edittopic')->middleware('auth');

Route::post('edittopic/{id}',  [UserController::class,'updeitTopic'])->name('updeittopic')->middleware('auth');

Route::get('deletetopic/{id}',  [UserController::class,'deleteTopic'])->name('deletetopic')->middleware('auth');

Route::get('/autologin',  [UserController::class,'autologin'])->name('autologin');

Route::get('gettopic/{id}',  [indexController::class,'getTopic'])->name('gettopic');

Route::get('admin',  [AdminController::class,'index'])->name('admin');

Route::get('userstable',  [AdminController::class,'getUsers'])->name('userstable');



require __DIR__.'/auth.php';
