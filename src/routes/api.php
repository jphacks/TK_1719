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
        //Route::get('user/{user_id}/timeline', 'Api\V1\UserController@showTimeline');
        Route::get('user/{user_id}', 'Api\V1\UserController@showUser');
        Route::post('user/{user_id}/update', 'Api\V1\UserController@update');
        //Route::get('user/{user_id}/shelves', 'Api\V1\UserController@showShelves');
        //Route::get('user/{user_id}/shelves/favorite', 'Api\V1\UserController@showFavorite');

        Route::get('collection/{collection_id}', 'Api\V1\CollectionController@show');
        Route::post('collection/store', 'Api\V1\CollectionController@store');
        Route::post('collection/{collection_id}/attach', 'Api\V1\CollectionController@attach');
        Route::post('collection/{collection_id}/delete', 'Api\V1\CollectionController@delete');
        //Route::post('collection/{collection_id}/shelf/{shelf_id}/add', 'Api\V1\CollectionController@addToShelf');
        //Route::post('collection/{collection_id}/shelf/{shelf_id}/remove', 'Api\V1\CollectionController@removeFromShelf');

        Route::get('shelf/{shelf_id}', 'Api\V1\ShelfController@show');
        //Route::get('shelf/search', 'Api\V1\ShelfController@search');
        Route::post('shelf/create', 'Api\V1\ShelfController@store');
        Route::post('shelf/{shelf_id}/update', 'Api\V1\ShelfController@update');
        Route::post('shelf/{shelf_id}/delete', 'Api\V1\ShelfController@delete');
        //Route::post('shelf/{shelf_id}/user/{user_id}/attach', 'Api\V1\ShelfController@attach');
        //Route::post('shelf/{shelf_id}/user/{user_id}/detach', 'Api\V1\ShelfController@detach');
});
