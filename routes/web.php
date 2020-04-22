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

Route::get('/home/{mission_id}', 'MissionsController@show');

Route::get('/home/', 'MissionsController@showMissions');

Route::post('/new-mission', 'MissionsController@sendToDb');

Route::get('/new-mission', 'MissionsController@createMission');

Route::get('/', 'HomeController@welcome');

Auth::routes();

/*Route::get('/home', 'HomeController@home')->name('home');*/

