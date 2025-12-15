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

Route::get('/dashboard', 'DashboardController@index');

Route::get('/database-ternak', 'DatabaseTernakController@index');

Route::get('/services', 'ServiceController@index');

Route::get('/recording', 'RecordingController@index');

Route::post('/recording', 'RecordingController@store');

Route::get('/notifications', 'NotificationController@index');

Route::get('/forum', 'ForumController@index');

Route::get('/reports', 'ReportController@index');

Route::get('/about', 'AboutController@index');
