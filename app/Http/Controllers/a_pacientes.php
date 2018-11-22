<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\pacientes;

class a_pacientes extends Controller
{
    public function consultar_pacientes_act(){
		$p=pacientes::withTrashed()->get();
		return view('sistema.a_pacientes_act')->with('pac',$p);
	}
	
	public function consultar_pacientes_desact(){
		$p=pacientes::withTrashed()->get();
		return view('sistema.a_pacientes_desc')->with('pac',$p);
	}
}
