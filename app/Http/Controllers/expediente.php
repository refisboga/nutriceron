<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use App\expedientes;

class expediente extends Controller
{
	
    public function consultar_expediente(){
		if(Session::get('sesiontipo')=="usu"){
			if(Session::get('sesionid')==""){
				return redirect()->route('logindesact');
			}else{
				//return redirect()->route('loginnoruta');
				$e=expedientes::withTrashed()->where('id_pac_fk','=',Session::get('sesionid'))->get();
				if(count($e)==0){
					$proceso="Consultar Expedientes";
					$mensaje="Necesitas hacer una Pre-Evaluacion, para tener un Expediente.";
					return view('sistema.mensaje')->with('proceso',$proceso)->with('mensaje',$mensaje);
				}else{
					return view('sistema.expediente')->with('expe',$e);
				}
			}
		}else{
			if(Session::get('sesiontipo')=="admin"){
				if(Session::get('sesionid')==""){
					return redirect()->route('logindesact');
				}else{
					return redirect()->route('loginnoruta');
				}
			}else{
				return redirect()->route('loginempty');
			}
		}
	}
}
