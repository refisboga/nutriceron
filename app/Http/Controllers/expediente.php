<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use App\expedientes;

class expediente extends Controller
{
	
    public function consultar_expediente(){
		$e=expedientes::withTrashed()->where('id_pac_fk','=',Session::get('sesionid'))->get();
		if(count($e)==0){
			$proceso="Consultar Expedientes";
			$mensaje="Necesitas hacer una Pre-Evaluacion, para tener un Expediente.";
			return view('sistema.mensaje')->with('proceso',$proceso)->with('mensaje',$mensaje);
		}else{
			return view('sistema.expediente')->with('expe',$e);
		}
	}
}
