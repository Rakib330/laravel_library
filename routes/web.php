<?php

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
Route::get('/login','adminlogin_controller@index');
Route::post('/login-admin','adminlogin_controller@logindo');
Route::get('/admin-logout','adminlogin_controller@logoutdo');


Route::get('/','view_controller@index');

//----------------------------------------->Dashboard<-------------------------------------

Route::get('/dashboard','dashboardController@index');
Route::get('/add-book','dashboardController@add_book');
Route::get('/add-category','dashboardController@add_category');
Route::get('/add-author','dashboardController@add_author');
Route::get('/add-user','dashboardController@add_user');
Route::get('/add-issue','dashboardController@add_issue');

Route::post('/save-category','dashboardController@save_category');
Route::post('/save-author','dashboardController@save_author');
Route::post('/save-user','dashboardController@save_user');
Route::post('/save-book','dashboardController@save_book');
Route::post('/save-issue','dashboardController@save_issue');

Route::post('/update-author/{authorid}','dashboardController@update_author');
Route::post('/update-book/{bookid}','dashboardController@update_book');
Route::post('/update-category/{categoryid}','dashboardController@update_category');
Route::post('/update-user/{userid}','dashboardController@update_user');
Route::post('/update-issue/{issueid}','dashboardController@update_issue');

Route::get('/returned-book/{issueid}','dashboardController@returned_book');

Route::get('/status-2/{from}/{id}','dashboardController@status_2');
Route::get('/status-1/{from}/{id}','dashboardController@status_1');
Route::get('/delete/{from}/{id}','dashboardController@delete');


