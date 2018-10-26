<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\pacientes;

class u_cuenta extends Controller
{
    public function consultar(){
		$usuario=pacientes::where('id_pac','=','MAX(id_pac)')->get();
		return view('sistema.cuenta');
	}
}
