<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use App\expedientes;

class evalua extends Controller
{
    public function registrar(Request $request){
		$id=$request->id;
		$cal=$request->cal;
		$hora=$request->hora;
		$tipo=$request->tipo;
		$ale1=$request->ale1;
		$ale2=$request->ale2;
		$enf1=$request->enf1;
		$enf2=$request->enf2;
		$tc=$request->tc;
		$desccir=$request->desccir;
		$tra=$request->tra;
		$desctra=$request->desctra;
		
		/*$this->validate($request,[
		    'cal'=>'required|date',   
			'hora'=>'required|',['regex:/^[0-9]{2}+[:][0-9]{2}+$/'],
			'tipo'=>['regex:/^[A-Z,+,-]*$/'],
			'ale1'=>['regex:/^[A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/'],
			'ale2'=>['regex:/^[A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/'],
			'enf1'=>['regex:/^[A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/'],
			'enf2'=>['regex:/^[A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/'],
			'desccir'=>['regex:/^[A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/'],
			'desctra'=>['regex:/^[A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/']
		]);*/
		
		$evalua=new expedientes;
		$evalua->id_exp=null;
		$evalua->fecha=$cal;
		$evalua->hora=$hora;
		$evalua->tipo_sangre=$tipo;
		$evalua->alergia1=$ale1;
		$evalua->alergia2=$ale2;
		$evalua->enfermedad1=$enf1;
		$evalua->enfermedad2=$enf2;
		$evalua->cirugia=$tc;
		$evalua->tipo_cirugia=$desccir;
		$evalua->tratamiento=$tra;
		$evalua->desc_tratamiento=$desctra;
		$evalua->id_pac_fk=$id;
		$evalua->save();
		$proceso="Alta de Evaluación";
		$mensaje="El registro de la evaluación fué exitoso";
		
		return view('sistema.mensaje')
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
	}
}
