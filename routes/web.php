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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/assignment2', 'Assignment2@index');
Route::get('/auth/linkedin/callback', 'Assignment2@callback');

Route::get('/assignment3', 'Assignment3@index');
Route::post('/user-details', 'Assignment3@store');
Route::get('/show-user-details', 'Assignment3@index');

