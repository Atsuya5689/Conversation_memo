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

//これはlaravelのwelcomeページ
//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/', function () {
//    return view('welcome');
//});
Route::group(['middleware' => ['auth']], function(){

//company関係
Route::get('/', 'CompanyController@index');
Route::get('/companies/create', 'CompanyController@create');
Route::get('companies/{company}', 'CompanyController@show');
Route::post('/companies', 'CompanyController@store');
Route::delete('/companies/{company}', 'CompanyController@delete');
//Route::get('/companies/{company}', 'CompanyController@index');

//user関係
Route::get('/users', 'UserController@index');
Route::get('/users/create', 'UserController@create');
Route::post('/users', 'UserController@store');
Route::get('/users/{user}', 'UserController@show');
Route::get('/users/{user}/edit', 'UserController@edit');
Route::put('/users/{user}', 'UserController@update');
Route::delete('/users/{user}', 'UserController@delete');

//talk関係
//Route::get('/talks', 'TalkController@index');
Route::get('/talks/{user}', 'TalkController@index');
Route::post('/talks/{user}', 'TalkController@store');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
