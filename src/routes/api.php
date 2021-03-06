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

Route::middleware('api')->prefix('v1')->group(function () {
    Route::post('authenticate', 'Api\V1\UserController@authenticate')->name('auth');
    Route::group(['middleware' => 'jwt.auth'], function () {
        Route::get('user/self', 'Api\V1\UserController@showSelf');
        Route::get('user/{user_id}/timeline', 'Api\V1\UserController@showTimeline');
        Route::get('user/{user_id}', 'Api\V1\UserController@showUser');
        Route::put('user/{user_id}', 'Api\V1\UserController@update');

        Route::post('collection/store', 'Api\V1\CollectionController@store');
        Route::get('collection/{collection_id}', 'Api\V1\CollectionController@show');
        Route::put('collection/{collection_id}', 'Api\V1\CollectionController@update');
        Route::delete('collection/{collection_id}', 'Api\V1\CollectionController@delete');
        Route::post('collection/{collection_id}/shelf/{shelf_id}/attach', 'Api\V1\CollectionController@attach');

        Route::get('shelf/search', 'Api\V1\ShelfController@search');
        Route::post('shelf', 'Api\V1\ShelfController@store');
        Route::get('shelf/{shelf_id}', 'Api\V1\ShelfController@show');
        Route::put('shelf/{shelf_id}', 'Api\V1\ShelfController@update');
        Route::delete('shelf/{shelf_id}', 'Api\V1\ShelfController@delete');

        Route::post('shelf/{shelf_id}/follow', 'Api\V1\ShelfController@follow');
        Route::post('shelf/{shelf_id}/refollow', 'Api\V1\ShelfController@refollow');
    });
});
