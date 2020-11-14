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

/* Route::get('/', function () {
    return view('welcome');
}); */


Route::get('/', 'IndexController@show');

Route::get('/get/instruments/{songName}', 'GetterController@getInstruments');

Route::get('/song/{songName}', 'MusicSheetPageController@show');

Route::get('/get/pdfname/{songName}/{instrument}', 'GetterController@getPdfName');

Route::post('/set/newsong', 'SetterController@uploadNewSong')->name('ajaxRequest.post');

Route::get('/get/matching/songs/{songName}', 'GetterController@getMatchingSongNames');

Route::get('/test', 'GetterController@test');

