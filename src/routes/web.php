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
    Route::get('/user/self', function () {
        return view('user.index');
    })->name('user.index');
    Route::get('/user/{user_id}', function () {
        return view('show');
    })->name('user.show');

    //TODO open interface for shelf
    Route::get('/shelves', function () {
        return view('shelf.index');
    })->name('shelf.index');
    Route::get('/shelves/{id}', function () {
        return view('shelf.show');
    })->name('shelf.show');

    //TODO open iterface for collection
    Route::get('/collections', function () {
        return view('collection.index');
    });
    Route::get('/collections/{collection_id}', function () {
        return view('collection.show');
    });
});

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login.showLoginForm');
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
