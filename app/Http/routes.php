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
/*---------------------------------------------------------Url Usuario----------------*/
Route::get('/cita',function(){
	return view('sistema.agendar_cita');
});

Route::get('/evaluacion',function(){
	return view('sistema.evaluacion');
});

Route::get('/dietas',function(){
	return view('sistema.dietas');
});

Route::get('/cuenta','cuenta_usuario@consultar_perfil');
Route::get('/herramientas','u_cuenta@herramientas');
Route::get('/expediente', 'expediente@consultar_expediente');
Route::POST('/regcita','cita@registrar');
Route::get('/detalle_cita','cita@detalle_cita');
Route::get('/modificarcita/{id}','cita@v_modificar_citap');
Route::POST('/modificarcitap','cita@modificar_citap');
Route::POST('/regeva','evalua@registrar');
Route::get('/cons_menu','a_menu@menu_disponible');
Route::get('/modif/{id}','usuario@modif');
Route::get('/udesactivarpac/{id}','usuario@u_desactivar_pac');
Route::get('/urestaurarpac/{id}','usuario@u_restaurar_pac');
Route::POST('/modificaru','usuario@modificar');
Route::get('/desactivarcitap/{id}','cita@desactivar_cita');
Route::get('/restaurarcitap/{id}','cita@restaurar_cita');
//Route::get('/modificarcitap/{id}','cita@v_modificar_cita_p');
/*---------------------------------------------------------Url Admin-------------------*/
/*Route::get('registrardoc',function(){
	return view('sistema.reg_doctor');
});*/

/*Route::get('crearmenu',function(){
	return view('sistema.a_crear_menu');
});*/
Route::get('/registrardoc','a_doctores@registrardoc');
Route::get('crearmenu','a_doctores@crearmenu');
Route::get('/citas','cita@a_consultar_citas');
Route::get('/citashist','cita@a_consultar_hist_citas');
Route::get('/expedientes','a_expedientes@consultar_expedientes_act');
Route::get('/expedienteshisto','a_expedientes@consultar_expedientes_desac');
Route::get('/expedientedesac/{id}','a_expedientes@desactivar_expe');
Route::get('/expedienterest/{id}','a_expedientes@restaurar_expe');
Route::get('/expedientemod/{id}','a_expedientes@a_v_expe');
Route::POST('/amodificareva','a_expedientes@a_modificar_eva');
Route::get('/expedienteelim/{id}','a_expedientes@eliminar_expe');
Route::get('/pacientes','a_pacientes@consultar_pacientes_act');
Route::get('/pacientesdesac','a_pacientes@consultar_pacientes_desact');
Route::get('/cuentadoc','a_doctores@consultar_perfil');
Route::get('/modificard/{id}','a_doctores@v_modificar_doc');
Route::POST('/modificardoc','a_doctores@modificar_doc');
Route::get('/consultardoc','a_doctores@consultar_doctores');
Route::POST('/reg_doc','a_doctores@registrar');
Route::POST('/regmenu','a_menu@registrar');
Route::get('/consmenu','a_menu@a_consultar_menu');
Route::get('/consmenuhist','a_menu@a_consultar_menu_hist');
Route::get('/adesactivarmenu/{id}','a_menu@a_desactivar_menu');
Route::get('/arestaurarmenu/{id}','a_menu@a_restaurar_menu');
Route::get('/aeliminarmenu/{id}','a_menu@a_eliminar_menu');
Route::get('/amodifmenu/{id}','a_menu@a_v_modificar_menu');
Route::POST('/regmenumod','a_menu@a_modificar_menu');
Route::get('/desactivardoc/{id}','a_doctores@desactivar_doctor');
Route::get('/restaurardoc/{id}','a_doctores@restaurar_doctor');
Route::get('/eliminardoc/{id}','a_doctores@eliminar_doctor');
Route::get('/desactivarcita/{id}','cita@a_desactivar_cita');
Route::get('/restaurarcita/{id}','cita@a_restaurar_cita');
Route::get('/eliminarcita/{id}','cita@a_eliminar_cita');
Route::get('/modificarc/{id}','cita@v_modificar_cita');
Route::POST('/modificarci','cita@a_modificar_cita');
Route::get('/desactivarpac/{id}','a_pacientes@desactivar_pac');
Route::get('/restaurarpac/{id}','a_pacientes@restaurar_pac');
Route::get('/eliminarpac/{id}','a_pacientes@eliminar_pac');
Route::get('/amodificarpac/{id}','a_pacientes@a_v_modificar_pac');
Route::POST('/amodificarpaciente','a_pacientes@a_modificar_pac');
/*---------------------------------------------------------Url Login-------------------*/
Route::POST('/validarlogin','clogin@validar_login');
Route::get('/home','clogin@login')->name('home');
Route::get('/admin','clogin@loginadmin')->name('admin');
Route::get('/cerrarsesion','clogin@cerrarsesion');
Route::get('/','clogin@index')->name('index');
Route::get('/loginempty','clogin@login_empty')->name('loginempty');
Route::get('/logindesact','clogin@login_desact')->name('logindesact');
Route::get('/loginnoruta','clogin@login_rutanovalida')->name('loginnoruta');