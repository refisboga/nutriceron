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
		
		
		/*$this->validate($request,[
			'nom'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/']
			'direc'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/']
			'cp'=>'required|integer',
			'tel'=>'required|integer',
			'email'=>['regex:/^[A-Z,a-z,0-9,ñ,Ñ,é,í,á,ó,ú,!,#,$,%,&,+,/,=,_,-]+[@][A-Z,a-z,0-9]+[.][A-Z,a-z]+$/'],
		    'cal'=>'required|integer[[0-9]{2}+-form-control-[0-9]{4}+]    
			'hora'=>pattern="/^([0-1][0-9]|[2][0-3])[\:]([0-5][0-9])[\:]([0-5][0-9])$/";
    
			

		]);*/
		
		
		$cita=new citas;
		$cita->id_cita=null;
		$cita->fecha=$cal;
		$cita->hora=$hora;
		$cita->direc=$direc;
		$cita->cp=$cp;
		$cita->tel=$tel;
		$cita->correo=$correo;
		$cita->save();
		
		return view('sistema.nav_usuario');
	}
	
	public function detalle_cita(){
		$c = citas::all();
		return view('sistema.detalle_cita')->with('citas',$c);
	}
	
	public function consultarcitas(){
		$c = citas::all();
		return view('sistema.citas')->with('citas',$c);
	}
}
