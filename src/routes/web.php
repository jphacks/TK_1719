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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('home');
    });

    //TODO open interface for user
    Route::get('/user/{user_id}', 'UserController@show')
        ->name('user.show');

    //TODO open interface for shelf
    Route::get('/shelves', 'ShelfController@index')
        ->name('shelf.index');
    Route::get('/shelves/{shelf_id}', 'ShelfController@show')
        ->name('shelf.show');

    //TODO open iterface for collection
    Route::get('/collections', 'CollectionController@index')
        ->name('collection.index');
    Route::get('/collections/{collection_id}', 'CollectionController@show')
        ->name('collection.show');
});

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login.showLoginForm');
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
