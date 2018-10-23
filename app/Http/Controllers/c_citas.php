<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\citas;

class c_citas extends Controller
{
    public function consultarcitas(){
		$c = citas::all();
		return view('sistema.citas')->with('citas',$c);
	}
}
