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
    return view('welcome');
});

Route::get('/hola', function () {
    $mensaje = "hola mundo";
    echo "Tic 72 $mensaje";
});
Route::get('/hola', function () {
    $mensaje = "hola mundo";
    echo "Tic 72 $mensaje";
});

Route::get('/produccion/almacen', function () {
    $productos  = "cocacolas";
    $existencias = 10;
    if($existencias >=5)
    {
     echo "El producto $productos hay muchas";
    }
    else
    {
     echo "El producto $productos hay pocas";
    }
 
});


Route::get('/pagos/{cant}/{costo}', 
function ($cant,$costo) {
    $total = $cant * $costo;
    echo "el total es ". $total;
   
});


Route::get('/areat/{base}/{altura}','curso@areatriangulo');
Route::get('/nomi/{dias}','curso@nomina');
Route::get('/mandilon/{cant}/{costo}','curso@mandado');

Route::get('/altama','curso@altamaestros');
Route::POST('/guardamaestro','curso@guardamaestro')->name('guardamaestro');
Route::get('/reportemaestros','curso@reportemaestros');
Route::get('/eliminam/{idm}','curso@eliminam')->name('eliminam');
























