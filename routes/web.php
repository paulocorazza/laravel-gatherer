<?php

use App\Http\Controllers\CardsController;
use App\Http\Controllers\GuildsController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Authenticator;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

//welcome
Route::get('/', function () {
    return view('home'); 
});

//auth
Route::get('/login',[UserController::class, 'index'])->name('login');
Route::post('/login',[UserController::class, 'store'])->name('signin');
Route::get('/register',[UserController::class, 'registration'])->name('registration');
Route::post('/register',[UserController::class, 'register'])->name('register');

//cards
Route::get('/cards', [CardsController::class,'index'])->middleware('auth')->name('cards.index');
Route::get('/cards/create',[CardsController::class,'create'])->middleware('auth')->name('cards.create');
Route::post('/cards/create',[CardsController::class,'store'])->middleware('auth')->name('cards.store');
Route::get('/cards/show/{id}',[CardsController::class,'show'])->middleware('auth')->name('cards.show');
Route::get('/cards/edit/{id}',[CardsController::class,'edit'])->middleware('auth')->name('cards.edit');
Route::patch('/cards/update/{id}',[CardsController::class,'update'])->middleware('auth')->name('cards.update');
Route::delete('/cards/delete/{id}',[CardsController::class,'destroy'])->middleware('auth')->name('cards.destroy');
Route::get('/cards/red',[CardsController::class,'showredcards'])->middleware('auth')->name('cards.showredcards');
Route::get('/cards/black',[CardsController::class,'showblackcards'])->middleware('auth')->name('cards.showblackcards');
Route::get('/cards/blue',[CardsController::class,'showbluecards'])->middleware('auth')->name('cards.showbluecards');
Route::get('/cards/white',[CardsController::class,'showwhitecards'])->middleware('auth')->name('cards.showwhiteards');
Route::get('/cards/green',[CardsController::class,'showgreencards'])->middleware('auth')->name('cards.showgreends');

//guilds

Route::get('/guilds',[GuildsController::class, 'index'])->middleware('auth')->name('guilds.index');
Route::get('/guilds/izzet')->middleware('auth');

