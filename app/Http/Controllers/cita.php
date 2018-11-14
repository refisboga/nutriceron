<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\citas;

class cita extends Controller
{
    public function registrar(Request $request){
		$nom=$request->nom;
		$direc="Av. Quintana Roo esq. Hidalgo";
		$cp=50143;
		$tel=7225104562;
		$correo="citas@nutriceron.com";
		$fecha=$request->fecha;
		$hora=$request->hora;
		
		/*$this->validate($request,[
			'nom'=>'required|',['regex:/^[A-Z][A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/'],
			'derec'=>'required|',['regex:/^[A-Z][A-Z,a-z, ,.,ñ,é,í,á,ó,ú]*$/'],
			'cp'=>'required|',['regex:/^[0-9]{5}$/'],
			'tel'=>'required|',['regex:/^[0-9]{10}$/'],
			'email'=>'required|email',
			'fecha'=>'required|date',
			'hora'=>'required|',['regex:/^[0-9]{2}+[:][0-9]{2}+$/']
		]);*/
		
		$cita=new citas;
		$cita->id_cita=null;
		$cita->fecha=$fecha;
		$cita->hora=$hora;
		$cita->direc=$direc;
		$cita->cp=$cp;
		$cita->tel=$tel;
		$cita->correo=$correo;
		$cita->save();
		$proceso="Alta de Cita";
		$mensaje="El Registro de la Cita fué Exitoso";
		
		return view('sistema.mensaje')
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
	}
	
	public function detalle_cita(){
		$c = citas::withTrashed()->get();
		return view('sistema.detalle_cita')->with('citas',$c);
	}
	
	public function consultarcitas(){
		$c = citas::withTrashed()->get();
		return view('sistema.citas')->with('citas',$c);
	}
}
