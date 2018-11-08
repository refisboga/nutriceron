<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\expedientes;

class evalua extends Controller
{
    public function registrar(Request $request){
		//$id=$request->id;
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
		    'cal'=>'required|integer[[0-9]{2}+-form-control-[0-9]{4}+]    
			'hora'=>pattern="/^([0-1][0-9]|[2][0-3])[\:]([0-5][0-9])[\:]([0-5][0-9])$/";
			'tipo'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/']
			'ale1'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/'],
			'ale2'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/'],
			'enf1'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/'],
			'enf2'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/'],
			'tc'=>['regex:/^[A-Z,a-z,0-9,ñ,Ñ,é,í,á,ó,ú,!,#,$,%,&,+,/,=,_,-]+[@][A-Z,a-z,0-9]+[.][A-Z,a-z]+$/'],
			'desccir'=>['regex:/^[A-Z,a-z,0-9,ñ,Ñ,é,í,á,ó,ú,!,#,$,%,&,+,/,=,_,-]+[@][A-Z,a-z,0-9]+[.][A-Z,a-z]+$/'],
			'tra'=>'required|integer',
			'desctra'=>'required|integer',
		
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
		$evalua->pac_fk=3;
		$evalua->doc_fk=1;
		$evalua->save();
		$proceso="Alta de Evaluación";
		$mensaje="El Registro de Evaluación fué Exitoso";
		
		return view('sistema.mensaje')
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
	}
}
