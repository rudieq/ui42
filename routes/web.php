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

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::post('/municipalities/search','MunicipalitiesController@search')->name('municipalities.search');
Route::get('/municipalities','MunicipalitiesController@index')->name('municipalities.index');
Route::get('/municipalities/{id?}','MunicipalitiesController@show')->name('municipalities.detail');

//test data
Route::get('/dummy_data/list', 'DummyDataController@list');
Route::get('/dummy_data/detail/{name}', 'DummyDataController@detail');
Route::get('/dummy_data/edit/{id}', 'DummyDataController@edit');