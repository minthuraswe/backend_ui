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
Route::get('/dashboard', 'HomeController@index');
Auth::routes();

//Backend Route List
Route::group(['namespace'=>'Backend', 'middleware' => 'auth'], function(){
    Route::resource('/member', 'MemberController');
    Route::resource('/category', 'CategoryController');
    Route::resource('/post', 'PostController');
    Route::resource('/activity', 'ActivityController');
    Route::resource('/ads', 'AdsController');
    Route::resource('/yearofservice', 'YearofserviceController');
    Route::get('/search-member', 'SearchController@searchMember');
    Route::get('/search-activity', 'SearchController@searchActivity');
    Route::get('/search-post', 'SearchController@searchPost');
    Route::get('/search-category', 'SearchController@searchCategory');
});

//Frontend Route list
Route::group(['namespace'=>'Frontend'], function(){
    Route::get('/index', 'IndexController@index');
    Route::get('/about', 'IndexController@about');
    Route::get('/contact', 'IndexController@contact');
    Route::get('/history', 'IndexController@history');
    Route::get('/news', 'NewsController@index');
    Route::get('/news/{id}-{post_title}', 'PostController@show');
    Route::get('/news/category/{id}-{cat_name}', 'PostController@categoryPost');
    Route::get('/activities', 'ActivityController@index');
    Route::get('/activities/{id}-{cat_name}', 'ActivityController@show');
    Route::get('/members', 'MemberController@index');
    Route::get('/members/{id}-{mem_name}', 'MemberController@show');
    Route::get('/oldmembers/{id}-{start_year}-{end_year}', 'MemberController@oldmember');
});