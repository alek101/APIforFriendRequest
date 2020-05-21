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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/list','ListUsersController@index')->middleware('auth');

Route::get('/storeRequest/{id}','ListFriendRequestsController@storeRequest')->middleware('auth');

Route::get('/messageBox',"ListFriendRequestsController@index")->middleware('auth');

Route::get('/acceptFriendship/{id}','ListFriendRequestsController@acceptFriendship')->middleware('auth');

Route::get('/rejectFriendship/{id}','ListFriendRequestsController@rejectFriendship')->middleware('auth');