<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/forbidden', function () {
    return view('errors.404');
});
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'admin'], function () {
    Route::get('/ubahDiklat', 'HomeController@ubahDiklat');

    Route::get('/delete/{id}', 'HomeController@delete');

	Route::get('/ubahDiklatPerID/{id}', 'HomeController@ubahDiklatPerID');

	Route::post('/updateDiklat/{id}', 'HomeController@updateDiklat');

	Route::post('/tambahDiklatBaru', 'HomeController@createDiklat');

	Route::get('/tambahDiklat', 'HomeController@tambahDiklat');
});

Route::group(['middleware' => ['web']], function () {
    //
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/ubahIdentitas/{id}', 'HomeController@ubahIdentitas');

Route::post('/update/{id}', 'HomeController@update');



Route::get('/jadwalDiklat', 'HomeController@jadwalDiklat');


Route::get('/jadwalAudit', 'HomeController@jadwalAudit');
