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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::group(['namespace' => 'ApiController', 'middleware' => 'api'], function() {

    Route::group(['prefix' => 'authenticate'], function() {

        Route::post('/login', [
            'as' => 'api.auth.login',
            'uses' => 'AuthenticateController@authenticate'
        ]);

    });

    // route user

    Route::group(['prefix' => 'user', 'middleware' => ['jwt.verify:users.index|users.create', 'api']], function() {

        Route::get('/list', [
            'as' => 'api.list.user',
            'uses' => 'UsersController@getListUsers'
        ]);

        Route::get('/profile', [
            'as' => 'api.profile.user',
            'uses' => 'UsersController@getProfileUser'
        ]);

        Route::post('/store', [
            'as' => 'api.user.store',
            'uses' => 'UsersController@store'
        ]);

    });

    // route category

    Route::group(['prefix' => 'categories', 'middleware' => ['jwt.verify:categories.index|categories.create', 'api']], function() {

        Route::post('/store', [
            'as' => 'api.categories.store',
            'uses' => 'CategoriesController@store'
        ]);

    });

});
