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


Route::get('login', 'LoginController')->name('login');
Route::post('login', 'LoginController')->name('login');
Route::post('logout', ['as' => 'logout', 'uses' => 'LogoutController']);

Route::get('/', 'TranslationController@index')->name('translation');
Route::get('translation', 'TranslationController@index')->name('translation');
Route::get('translation/list', 'TranslationController@list');
Route::post('translation/create', 'TranslationController@create');
Route::post('translation/update', 'TranslationController@update');
Route::post('translation/delete', 'TranslationController@delete');
