<?php

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


Route::post('/add/transaction','TransactionController@addTransaction')->name('transaction');
Route::post('/add/minus-montant','TransactionController@minusMontant')->name('retrait');
Route::get('/detail/user-transactions/{id}','TransactionController@detailOfUserTransaction')->name('detail');
Route::get('/partenaires',function(){
    return view('partenaires.welcome');
})->name('partenaires');
