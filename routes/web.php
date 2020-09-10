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

Route::get('/', function() {
    return redirect('/getstarted');
})->name('index');

Auth::routes(['verify' => true]);

Route::get('/home', function () {
    return redirect('/getstarted');
})->name('home');
Route::get('/getstarted', 'HomeController@getstarted')->name('getstarted');
Route::get('/individual', 'HomeController@individual')->name('individual');
Route::get('/recordvideo', 'HomeController@recordvideo')->name('recordvideo');
Route::get('/waiting', 'HomeController@waiting')->name('waiting');
Route::get('/streamrecord', 'HomeController@streamrecord')->name('streamrecord');
Route::post('/streamrecord', 'HomeController@streamrecordreviewsubmit')->name('reviewsubmit');
Route::post('/upload', 'HomeController@upload')->name('upload');

// Admin routes
Route::prefix('admin')->group(function() {
    Route::get('/', 'Admin\AdminController@index')->name('admin.dashboard');
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/register', 'Auth\AdminRegisterController@showRegisterForm')->name('admin.register');
    Route::post('/register', 'Auth\AdminRegisterController@register')->name('admin.register.submit');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('/dashboard/selfdirectedvisits','Admin\AdminController@selfdirectedvisits')->name('admin.dashboard.selfdirectedvisits');
    Route::get('/dashboard/patientqueue','Admin\AdminController@patientqueue')->name('admin.dashboard.patientqueue');
    Route::get('/dashboard/patientdirectory', 'Admin\AdminController@patientdirectory')->name('admin.dashboard.patientdirectory');
});