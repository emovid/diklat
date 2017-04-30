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

Route::group(['middleware' => 'superAdmin'], function () {
    Route::get('/approveDiklat', 'HomeController@approveDiklat');
});

Route::group(['middleware' => 'admin'], function () {
    Route::get('/ubahDiklat', 'HomeController@ubahDiklat');

    Route::get('/delete/{id}', 'HomeController@delete');

    Route::get('/deleteAudit/{id}', 'HomeController@deleteAudit');

	Route::get('/ubahDiklatPerID/{id}', 'HomeController@ubahDiklatPerID');

	Route::get('/ubahAuditPerID/{id}', 'HomeController@ubahAuditPerID');

	Route::post('/updateDiklat/{id}', 'HomeController@updateDiklat');

	Route::post('/updateAudit/{id}', 'HomeController@updateAudit');

	Route::post('/tambahDiklatBaru', 'HomeController@createDiklat');

	Route::post('/tambahAuditBaru', 'HomeController@createAudit');

	Route::get('/tambahDiklat', 'HomeController@tambahDiklat');

	Route::get('/tambahAudit', 'HomeController@tambahAudit');

	Route::get('/jadwalDiklat', 'HomeController@jadwalDiklat');

	Route::get('/jadwalAudit', 'HomeController@jadwalAudit');
});

Route::group(['middleware' => ['web']], function () {
    //
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/ubahIdentitas/{id}', 'HomeController@ubahIdentitas');

Route::post('/update/{id}', 'HomeController@update');





Route::get('/jadwalAuditor', 'HomeController@jadwalAuditor');

Route::get('/tambahJadwalAuditor', 'HomeController@tambahJadwalAuditor');

Route::post('/tambahJadwalAuditorBaru', 'HomeController@createJadwalAuditor');

Route::get('/deleteJadwalAuditor/{id}', 'HomeController@deleteJadwalAuditor');

Route::get('/lihatAudit', 'HomeController@lihatAudit');

Route::get('/tambahJadwalAuditorPerID/{id}', 'HomeController@tambahJadwalAuditorPerID');

