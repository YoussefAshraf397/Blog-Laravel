<?php

use Illuminate\Support\Facades\Auth;
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
})->name('home-page');

Auth::routes();


Route::group(['as' => 'admin.' ,'prefix' => 'admin' , 'namespace' => 'Admin' , 'middleware' => ['auth' , 'admin']], function (){
    Route::get('dashboard' , 'DashboardController@getIndex')->name('dashboard');

    Route::resource('tag' , 'TagController');

    Route::resource('category' , 'CategoryController');

    Route::resource('post' , 'PostController');
    Route::get('/pending/post','PostController@pending')->name('post.pending');
    Route::put('/post/{id}/approve','PostController@approval')->name('post.approve');


});

Route::group(['as' => 'editor.' ,'prefix' => 'editor' , 'namespace' => 'Editor' , 'middleware' => ['auth' , 'editor']], function (){
    Route::get('dashboard' , 'DashboardController@getIndex')->name('dashboard');

    Route::resource('post' , 'PostController');
});

