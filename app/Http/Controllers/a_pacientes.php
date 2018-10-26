<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\pacientes;

class a_pacientes extends Controller
{
    public function consultar_pac(){
		$p = pacientes::all();
		return view('sistema.a_pacientes')->with('pac',$p);
	}
}
