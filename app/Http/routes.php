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

Route::get('/dietas',function(){
	return view('sistema.dietas');
});

Route::get('/cuenta','u_cuenta@consultar');
Route::get('/herramientas','u_cuenta@herramientas');
Route::get('/expediente', 'u_expediente@consultar_expediente');
Route::POST('/regcita','cita@registrar');
Route::get('/detalle_cita','cita@detalle_cita');
Route::POST('/regeva','evalua@registrar');
Route::get('/cons_menu','a_menu@consmenu');
/*---------------------------------------------------------Url Admin-------------------*/
Route::get('/admin', function(){
	return view('sistema.nav_admin');
});

Route::get('registrardoc',function(){
	return view('sistema.reg_doctor');
});

Route::get('crearmenu',function(){
	return view('sistema.a_crear_menu');
});
Route::get('/citas','cita@consultarcitas');
Route::get('/expedientes','a_expedientes@consultar_expe');
Route::get('/pacientes','a_pacientes@consultar_pac');
Route::get('/cuentadoc','a_doctores@consultar_doc');
Route::get('/consultardoc','a_doctores@consultar_todos');
Route::POST('/reg_doc','a_doctores@registrar');
Route::POST('/regmenu','a_menu@registrar');
Route::get('/consmenu','a_menu@consmenu_a');