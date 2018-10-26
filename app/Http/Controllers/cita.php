<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\citas;

class cita extends Controller
{
    public function registrar(Request $request){
		//$id=$request->id;
		$nom=$request->nom;
		$direc="Av. Quintana Roo esq. Hidalgo";
		$cp=50143;
		$tel=7225104562;
		$correo="citas@nutriceron.com";
		$cal=$request->cal;
		$hora=$request->hora;
		
		//Aqui la validacion javi
		
		$cita=new citas;
		$cita->id_cita=null;
		$cita->fecha=$cal;
		$cita->hora=$hora;
		$cita->direc=$direc;
		$cita->cp=$cp;
		$cita->tel=$tel;
		$cita->correo=$correo;
		$cita->save();
		
		return view('/home');
	}
	
	public function consultarcitas(){
		$c = citas::all();
		return view('sistema.citas')->with('citas',$c);
	}
}
