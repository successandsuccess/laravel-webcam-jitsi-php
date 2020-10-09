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
    // return redirect('/getstarted');
    return redirect('/patient/getstarted');
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

// Patient Routes
Route::prefix('patient')->group(function() {
    Route::get('/', function(){
        return redirect('/patient/getstarted');
    })->name('patient.index');
    Route::get('/getstarted', 'PatientController@getstarted')->name('patient.getstarted');
    Route::get('/careplan', 'PatientController@patientcareplan')->name('patient.careplan');
    Route::get('/careplan/submitfeedback', 'PatientController@careplan_submitfeedback')->name('patient.careplan.submitfeedback');
    Route::get('/careplan/exercises-overview', 'PatientController@careplan_exercises_overview')->name('patient.careplan.exercises_overview');
    Route::get('/careplan/exercises-detail', 'PatientController@careplan_exercises_detail')->name('patient.careplan.exercises_detail');
    Route::get('/careplan/exercises-review', 'PatientController@careplan_exercises_review')->name('patient.careplan.exercises_review');
    Route::get('/waiting', 'PatientController@patientwaiting')->name('patient.waiting');
    Route::get('/waiting-ready', 'PatientController@patientwaitingready')->name('patient.waiting.ready');
});

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
    Route::get('/dashboard/exercises', 'Admin\AdminController@exercises')->name('admin.dashboard.exercises');
    Route::get('/dashboard/selfdirectedvisits/view/{activityId}', 'Admin\AdminController@selfdirectedvisitsview')->name('admin.selfdirectedvisits.view');
    // make recording to review , checked
    Route::post('dashboard/selfdirectedvisit/view/checkrecordingview', 'Admin\AdminController@checkrecordingview');
    Route::get('/dashboard/patientdirectory/manage/{id}', 'Admin\AdminController@patientdirectorymanage')->name('admin.patientdirectory.manage');
    // remove assigned exercise in dxs.
    Route::post('/dashboard/patientdirectory/manage/remove', 'Admin\AdminController@patientdirectorymanageRemove')->name('admin.patientdirectory.manage.remove');
    // assign exercises in dxs
    Route::post('/dashboard/patientdirectory/manage/assign', 'Admin\AdminController@patientdirectorymanageAssign')->name('admin.patientdirectory.manage.assign');
});