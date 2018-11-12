<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\doctores;

class a_doctores extends Controller
{
    public function registrar(Request $request){
		
		$nom=$request->nom;
		$ap=$request->ap;
		$am=$request->am;
		$tel=$request->tel;
		$correo=$request->email;
		$pass=$request->pass;
		
		$this->validate($request,[
			'nom'=>'required|',['regex:/^[A-Z][A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/'],
			'ap'=>'required|',['regex:/^[A-Z][A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/'],
			'am'=>'required|',['regex:/^[A-Z][A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/'],
			'tel'=>'required|',['regex:/^[0-9]+{10}'],
			'email'=>'required|email',
			'pass'=>'required|',['regex:/^[A-Z,a-z,0-9,ñ,é,í,á,ó,ú]*$/']
		]);
		
		$doc=new doctores;
		$doc->id_doc=null;
		$doc->nombre=$nom;
		$doc->ap_pat=$ap;
		$doc->ap_mat=$am;
		$doc->correo=$correo;
		$doc->pass=$pass;
		$doc->tel=$tel;
		$doc->save();
		$proceso="Alta de Doctor";
		$mensaje="El Registro del Doctor fué Exitoso";
		
		return view('sistema.mensaje')
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
	}
	
	public function consultar_doc(){
		$d =doctores::all();
		return view('sistema.a_cuenta')->with('doc',$d);
	}
	
	public function consultar_todos(){
		$d =doctores::all();
		return view('sistema.a_consultar_doc')->with('doc',$d);
	}
}
