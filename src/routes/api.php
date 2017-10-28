<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth')->prefix('api/v1')->group(function () {
    Route::get('user/{user_id}/timeline', 'Api\V1\UserController@showTimeline');
    Route::get('user/{user_id}', 'Api\V1\UserController@showUser');
    Route::post('user/{user_id}/update', 'Api\V1\UserController@update');

    Route::get('book/{book_id}', 'Api\V1\BookController@show');
    Route::post('book/{book_id}/create', 'Api\V1\BookController@create');
    Route::post('book/{book_id}/update', 'Api\V1\BookController@update');
    Route::post('book/{book_id}/shelf/{shelf_id}/add', 'Api\V1\BookController@addToShelf');
    Route::post('book/{book_id}/shelf/{shelf_id}/remove', 'Api\V1\BookController@removeFromShelf');

    Route::get('shelf/{shelf_id}', 'Api\V1\ShelfController@show');
    Route::get('shelf/{shelf_id}/create', 'Api\V1\ShelfController@create');
    Route::post('shelf/{shelf_id}/update', 'Api\V1\ShelfController@update');
    Route::post('shelf/{shelf_id}/user/{user_id}/attach', 'Api\V1\ShelfController@attach');
    Route::post('shelf/{shelf_id}/user/{user_id}/detach', 'Api\V1\ShelfController@detach');
});
