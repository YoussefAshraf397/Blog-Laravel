<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('login', 'API\AuthController@login');
Route::post('register', 'API\AuthController@register');

Route::get('home-posts', 'API\PostController@listAllPostsForVisitors');


Route::group(['middleware' => 'auth:api'], function(){
    Route::post('details', 'API\AuthController@details');

    Route::get('posts', 'API\PostController@listAllPosts');
    Route::get('post/{postId}', 'API\PostController@viewPost');
    Route::get('post/{postId}', 'API\PostController@viewPost');

    Route::get('search', 'API\SearchController@index');

    Route::get('categories', 'API\PostController@listAllCategories');


    Route::post('logout','API\AuthController@logout');


});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
