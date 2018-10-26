<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\doctores;

class a_doctores extends Controller
{
    public function consultar_doc(){
		$d =doctores::all();
		return view('sistema.a_cuenta')->with('doc',$d);
	}
}
