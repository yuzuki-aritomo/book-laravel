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

Route::get('/', 'ShowController@index');
// Route::get('/scraping',  'ScrapingController@index');

Route::get('/search',  'SearchController@index');
Route::post('/search',  'SearchController@post');
Route::get('/search/{id}',  'SearchController@show');

Route::get('/post/{id}',  'PostController@index');
Route::post('/post/{id}/create',  'PostController@create');

Route::get('/show',  'ShowController@index');
Route::get('/show/{id}',  'ShowController@show');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
