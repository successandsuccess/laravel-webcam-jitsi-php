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
Route::post('/screenshotupload', 'ScreenshotController@upload')->name('screenshotupload');
Route::get('/imageeditor', 'ScreenshotController@index')->name('imageeditor');

// Route::get('/', 'HomeController@index')->name('index');
Route::get('/', function() {
    return redirect('/getstarted');
})->name('index');

Auth::routes(['verify' => true]);

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', function () {
    return redirect('/getstarted');
})->name('home');
Route::get('/getstarted', 'HomeController@getstarted')->name('getstarted');
Route::get('/individual', 'HomeController@individual')->name('individual');
Route::get('/recordvideo', 'HomeController@recordvideo')->name('recordvideo');
Route::get('/waiting', 'HomeController@waiting')->name('waiting');
Route::get('/streamrecord', 'HomeController@streamrecord')->name('streamrecord');
Route::post('/upload', 'HomeController@upload')->name('upload');
