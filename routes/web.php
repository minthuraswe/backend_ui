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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

//Backend Route List
Route::group(['namespace'=>'Backend', 'middleware' => 'auth'], function(){
    Route::resource('/member', 'MemberController');
    Route::resource('/category', 'CategoryController');
    Route::resource('/post', 'PostController');
    Route::resource('/activity', 'ActivityController');
    Route::get('/search-member', 'SearchController@searchMember');
    Route::get('/search-activity', 'SearchController@searchActivity');
    Route::get('/search-post', 'SearchController@searchPost');
    Route::get('/search-category', 'SearchController@searchCategory');
});

//Frontend Route list
Route::group(['namespace'=>'Frontend'], function(){
    Route::get('/index', 'IndexController@index');
    Route::get('/news', 'NewsController@index');
    Route::get('/news/{id}-{post_title}', 'PostController@show');
    Route::get('/news/category/{id}-{cat_name}', 'PostController@categoryPost');
    Route::get('/activities', 'ActivityController@index');
    Route::get('/activities/{id}-{cat_name}', 'ActivityController@show');
});