<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => 'auth'], function () {
	Route::get('/', function(){
		return view('home');
	});
	Route::controller('/sap', 'sapController');
	Route::controller('/home', 'arsipController');
	Route::controller('/personil', 'personilController');
	Route::controller('/dokumen', 'dokumenController');
	
	Route::get('/auth/user-edit/', ['use'=>'userController', 'as'=>'edit-user']);
	Route::get('/personil/personil-edit/', ['use'=>'userController', 'as'=>'edit-personil']);
	Route::get('/personil/personil-hapus/', ['use'=>'userController', 'as'=>'hapus-personil']);

});

Route::controller('/auth', 'userController');

 