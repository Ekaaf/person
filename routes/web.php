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
    return view('index');
});

Route::get('/index', array('as' => 'index', 'uses' => 'PersonController@index'));
Route::get('/add', array('as' => 'add', 'uses' => 'PersonController@add'));
Route::post('/save_person', array('as' => 'save_person', 'uses' => 'PersonController@savePerson'));
Route::get('/get_persons', array('as' => 'getPersons', 'uses' => 'PersonController@getPersons'));
Route::get('/get_cities_by_country', array('as' => 'get_cities_by_country', 'uses' => 'PersonController@getCitiesByCountry'));
Route::get('/view/{id}', array('as' => 'view', 'uses' => 'PersonController@view'));
Route::get('/edit/{id}', array('as' => 'edit', 'uses' => 'PersonController@edit'));
Route::get('/person-delete/{id}', array('as' => 'person-delete', 'uses' => 'PersonController@personDelete'));