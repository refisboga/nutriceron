<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\expedientes;

class u_expediente extends Controller
{
    public function consultar_expediente(){
		$e = expedientes::all();
		return view('sistema.expediente')->with('expe',$e);
	}
}
