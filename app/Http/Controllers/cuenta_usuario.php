<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use App\pacientes;

class cuenta_usuario extends Controller
{
    public function consultar_perfil(){
		if(Session::get('sesiontipo')=="usu"){
			if(Session::get('sesionid')==""){
				return redirect()->route('logindesact');
			}else{
				//return redirect()->route('loginnoruta');
				$usu=pacientes::withTrashed()->where('id_pac','=',Session::get('sesionid'))->get();
				if(count($usu)==0){
					$proceso="Consultar Perfil del Usuario";
					$mensaje="No existe registro alguno del usuario.";
					return view('sistema.mensaje')->with('proceso',$proceso)->with('mensaje',$mensaje);
				}else{
					return view('sistema.perfil_usuario')->with('usuario',$usu);
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
