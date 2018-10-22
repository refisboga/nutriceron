<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\pacientes;

class usuario extends Controller
{
    public function registrar(Request $request){
		$user=new pacientes;
		$user->id_pac=null;
		$user->nombre=$request->nom;
		$user->ap_pat=$request->ap;
		$user->ap_mat=$request->am;
		$user->correo=$request->email;
		$user->pass=$request->pass;
		$user->telefono=$request->tel;
		$user->peso=$request->peso;
		$user->talla=$request->talla;
		$user->sexo=$request->sexo;
		$user->fec_nac=$request->fn;
		$user->municipio_fk=3;
		$user->estado_fk=1;		
		$user->save();
	}
}
