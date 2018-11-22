<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use App\pacientes;

class cuenta_usuario extends Controller
{
    public function consultar_perfil(){
		$usu=pacientes::withTrashed()->where('id_pac','=',Session::get('sesionid'))->get();
		if(count($usu)==0){
			$proceso="Consultar Perfil del Usuario";
			$mensaje="No existe registro alguno del usuario.";
			return view('sistema.mensaje')->with('proceso',$proceso)->with('mensaje',$mensaje);
		}else{
			return view('sistema.perfil_usuario')->with('usuario',$usu);
		}
	}
}
