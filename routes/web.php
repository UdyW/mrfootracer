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

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('welcome');
});

Route::get('/test', function () {
        echo 'test';
    });
/**
 * Add A New Foot Race
 */
Route::post('/addfootrace', 'FootRaceController@addfootrace');


Route::post('/assignrunners', 'FootRaceController@assignrunners');
Route::get('/viewrunners/{id}', 'FootRaceController@viewrunners');
Route::post('/updaterunners', 'FootRaceController@updaterunners');
Route::delete('/unassignrunners/{id}', 'FootRaceController@unassignrunners');
Route::get('/viewrace/{id}', 'FootRaceController@viewrace');

/**
 * Remove A Foot Race
 */
Route::delete('/deletefootrace/{id}', 'FootRaceController@deletefootrace');


/**
 * View all Foot Races
 */
Route::get('/index', 'FootRaceController@viewfootraces');

// Authentication Routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration Routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Auth::routes();