<?php

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

use App\Mission;
use Illuminate\Http\Request;

Route::get('/home', 'MissionsController@showMissions');

Route::post('/new-mission', 'MissionsController@send_to_db');

Route::get('/new-mission', 'MissionsController@createMission');

Route::get('/', 'HomeController@welcome');

Auth::routes();

/*Route::get('/home', 'HomeController@home')->name('home');*/

