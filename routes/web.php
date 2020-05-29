<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/getuser', 'HomeController@user')->name('user');

Route::get('/getstate', 'StateController@index')->name('getsate.index');
Route::get('/getbuy', 'BuyController@index')->name('getbuy.index');
Route::get('/getinventory', 'InventoryController@index')->name('getinvetory.index');

// location
// Route::get('/getlocation', 'LocationController@index')->name('getlocation.index');
// Route::post('/postlocation','LocationController@store')->name('postlocation.store');


Route::resource('getlocation','LocationController', ['except' => ['create', 'show']]);
Route::resource('getstate','StateController', ['except' => ['create', 'show']]);

Route::get('/{vue_capture?}', function () {
    return view('layouts.app');
})->where('vue_capture', '[\/\w\.-]*');
