<?php

use App\Http\Controllers\Admin\AdminController;
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
Route::get('/', 'HomeController@index')->name('home-page');
Route::get('posts','PostController@index')->name('post.index');
Route::get('post/{slug}','PostController@details')->name('post.details');

Route::get('/category/{slug}','PostController@postByCategory')->name('category.posts');
Route::get('/tag/{slug}','PostController@postByTag')->name('tag.posts');


Route::get('/search','SearchController@search')->name('search');


Route::post('subscriber','SubscriberController@store')->name('subscriber.store');

Route::get('profile/{username}','EditorController@profile')->name('editor.profile');



Auth::routes();

Route::group(['middleware'=>['auth']], function (){
    Route::post('favorite/{post}/add','FavoriteController@add')->name('post.favorite');
    Route::post('comment/{post}','CommentController@store')->name('comment.store');
});


Route::group(['as' => 'admin.' ,'prefix' => 'admin' , 'namespace' => 'Admin' , 'middleware' => ['auth', 'role:admin' ]], function (){
    //new
    Route::resource('country' , 'CountryController');
    Route::resource('governorate' , 'GovernorateController');
    Route::resource('city' , 'CityController');
    Route::resource('place-type' , 'PlaceTypeController');
    Route::resource('property-type' , 'PropertyTypeController');
    Route::resource('place' , 'PlaceController');

    Route::resource('package' , 'PackageController');
    Route::resource('category' , 'CategoryController');
    Route::resource('additional-service' , 'AdditionalServiceController');
    Route::resource('attribute' , 'AttributeController');

//    Privileges Routes
    Route::resource('role' , 'RoleController');
    Route::resource('permission' , 'PermissionController');

    Route::resource('admin-user' , 'AdminController');

    Route::delete('/users/{user}/roles/{role}', [AdminController::class, 'removeRole'])->name('users.roles.remove');
    Route::post('/users/{user}/roles', [AdminController::class, 'assignRole'])->name('users.roles');
    Route::delete('/users/{user}/permissions/{permission}', [AdminController::class, 'revokePermission'])->name('users.permissions.revoke');
    Route::post('/users/{user}/permissions', [AdminController::class, 'givePermission'])->name('users.permissions');








    Route::get('dashboard' , 'DashboardController@getIndex')->name('dashboard');

    Route::resource('tag' , 'TagController');

//    Route::resource('category' , 'CategoryController');

    Route::resource('post' , 'PostController');
    Route::get('/pending/post','PostController@pending')->name('post.pending');
    Route::put('/post/{id}/approve','PostController@approval')->name('post.approve');

    Route::get('/subscriber','SubscriberController@index')->name('subscriber.index');
    Route::delete('/subscriber/{subscriber}','SubscriberController@destroy')->name('subscriber.destroy');

    Route::get('settings','SettingController@index')->name('settings');
    Route::put('profile-update','SettingController@updateProfile')->name('profile.update');
    Route::put('password-update','SettingController@updatePassword')->name('password.update');

    Route::get('/favorite','FavoriteController@index')->name('favorite.index');

    Route::get('comments','CommentController@index')->name('comment.index');
    Route::delete('comments/{id}','CommentController@destroy')->name('comment.destroy');

    Route::get('editors','EditorController@index')->name('editor.index');
    Route::delete('editor/{id}','EditorController@destroy')->name('editor.destroy');



});

Route::group(['as' => 'editor.' ,'prefix' => 'editor' , 'namespace' => 'Editor' , 'middleware' => ['auth' , 'editor']], function (){
    Route::get('dashboard' , 'DashboardController@getIndex')->name('dashboard');

    Route::resource('post' , 'PostController');

    Route::get('settings','SettingController@index')->name('settings');
    Route::put('profile-update','SettingController@updateProfile')->name('profile.update');
    Route::put('password-update','SettingController@updatePassword')->name('password.update');

    Route::get('/favorite','FavoriteController@index')->name('favorite.index');

    Route::get('comments','CommentController@index')->name('comment.index');
    Route::delete('comments/{id}','CommentController@destroy')->name('comment.destroy');

});

View::composer('layouts.frontend.partails.footer',function ($view) {
    $categories = App\Category::all();
    $view->with('categories',$categories);
});

