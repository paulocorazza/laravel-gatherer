<?php

use App\Http\Controllers\CardsController;
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

Route::get('/', function () {
    return view('welcome');
});

//Route::resource('/cards',CardsController::class);
Route::get('/cards', [CardsController::class, 'index'])->name('cards.index');
Route::get('/cards/create',[CardsController::class,'create'])->name('cards.create');
Route::post('/cards/create',[CardsController::class,'store'])->name('cards.store');  
Route::get('/cards/show/{id}',[CardsController::class,'show'])->name('cards.show'); 
Route::get('/cards/edit/{id}',[CardsController::class,'edit'])->name('cards.edit');
Route::patch('/cards/update/{id}',[CardsController::class,'update'])->name('cards.update');
Route::delete('/cards/delete/{id}',[CardsController::class,'destroy'])->name('cards.destroy');
