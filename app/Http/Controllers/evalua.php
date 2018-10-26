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
		
		//Aqui la validacion javi
		
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
		
		return view('sistema.nav_usuario');
	}
}
