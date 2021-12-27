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


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/viewPost', 'HomeController@viewPost');
Route::get('/searchPost/{data}', 'HomeController@searchPost');
Route::get('/searchCategory/{id}', 'HomeController@searchCategory');
Route::get('/viewUserPost/{id}', 'HomeController@viewUserPost');
Route::get('/myPostGet', 'HomeController@myPostGet');
Route::get('/authInfo', 'HomeController@authInfo');
Route::resource('petType', 'PetTypeController');
Route::resource('/location', 'LocationController');
Route::resource('pet', 'PetController');
Route::resource('like', 'LikeController');
Route::get('{path}', 'HomeController@index')->where('path','([A-z\d\-\/_.]+)?');
