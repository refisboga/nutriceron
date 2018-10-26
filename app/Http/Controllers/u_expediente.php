<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\expedientes;
use App\citas;

class u_expediente extends Controller
{
    public function consulta_cita(){
		$c = citas::all();
		return view('sistema.expediente')->with('citas',$c);
	}
}
