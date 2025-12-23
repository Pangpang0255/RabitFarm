<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
   
Route::get('/', 'HomeController@index');

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

// Database Ternak Routes
Route::get('/database-ternak', 'DatabaseTernakController@index')->name('database-ternak');
Route::post('/database-ternak', 'DatabaseTernakController@store')->name('database-ternak.store');
Route::put('/database-ternak/{id}', 'DatabaseTernakController@update')->name('database-ternak.update');
Route::delete('/database-ternak/{id}', 'DatabaseTernakController@destroy')->name('database-ternak.destroy');

Route::get('/services', 'ServiceController@index');

// Recording Routes
Route::get('/recording', 'RecordingController@index')->name('recording');
Route::post('/recording/breeding', 'RecordingController@storeBreeding')->name('recording.breeding');
Route::post('/recording/feeding', 'RecordingController@storeFeeding')->name('recording.feeding');
Route::post('/recording/health', 'RecordingController@storeHealth')->name('recording.health');

Route::get('/notifications', 'NotificationController@index');

Route::get('/forum', 'ForumController@index');

// Reports Routes
Route::get('/reports', 'ReportController@index')->name('reports');
Route::post('/reports', 'ReportController@store')->name('reports.store');
Route::put('/reports/{id}', 'ReportController@update')->name('reports.update');
Route::delete('/reports/{id}', 'ReportController@destroy')->name('reports.destroy');

Route::get('/about', 'AboutController@index');

Route::get('/kontak', function () {
    return view('kontak');
});
