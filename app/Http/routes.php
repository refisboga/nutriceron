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
Route::get('/', function () {
    return view('sistema.main');
});

Route::get('/registrate', function(){
    return view('sistema.reg_usuario');
});

Route::POST('/registrar','usuario@registrar');

Route::get('/login', function(){
    return view('sistema.login');
});
Route::POST('/checklogin','usuario@login');
/*---------------------------------------------------------Url Usuario----------------*/
Route::get('/home', function(){
	return view('sistema.nav_usuario');
});

Route::get('/cita',function(){
	return view('sistema.agendar_cita');
});

Route::get('/evaluacion',function(){
	return view('sistema.evaluacion');
});

Route::get('/expediente',function(){
	return view('sistema.expediente');
});

Route::get('/dietas',function(){
	return view('sistema.dietas');
});
/*---------------------------------------------------------Url Admin-------------------*/
Route::get('/admin', function(){
	return view('sistema.nav_admin');
});

Route::get('/citas','c_citas@consultarcitas');