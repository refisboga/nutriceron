<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\expedientes;

class a_expedientes extends Controller
{	
	public function consultar_expe(){
		$c = expedientes::all();
		return view('sistema.a_expedientes')->with('expe',$c);
	}
}
