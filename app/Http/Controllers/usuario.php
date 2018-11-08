<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\pacientes;

class usuario extends Controller
{
    public function registrar(Request $request){
		
		$nom=$request->nom;
		$ap=$request->ap;
		$am=$request->am;
		$correo=$request->email;
		$pass=$request->pass;
		$tel=$request->tel;
		$peso=$request->peso;
		$talla=$request->talla;
		$sexo=$request->sexo;
		$fecha=$request->fecha;
		
		/*$this->validate($request,[
			'nom'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/'],
			'ap'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/'],
			'am'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/'],
			'email'=>['regex:/^[A-Z,a-z,0-9,ñ,Ñ,é,í,á,ó,ú,!,#,$,%,&,+,/,=,_,-]+[@][A-Z,a-z,0-9]+[.][A-Z,a-z]+$/'],
			'pass'=>['regex:/^[a-z,A-Z,0-9,[,],{,},.,;,:,_,+,*,!,#,$,%,&,/]*$/'],
			'tel'=>'required|integer',
			'peso'=>['regex:/^[0-9]+[.][0-9]$/'],
			'talla'=>['regex:/^[0-9]+[.][0-9]{2}$/'],
			'dia'=>'required|integer',
			'mes'=>'required|integer',
			'anio'=>'required|integer'
		]);*/
		
		$user=new pacientes;
		$user->id_pac=null;
		$user->nombre=$nom;
		$user->ap_pat=$ap;
		$user->ap_mat=$am;
		$user->correo=$correo;
		$user->pass=$pass;
		$user->telefono=$tel;
		$user->peso=$peso;
		$user->talla=$talla;
		$user->sexo=$sexo;
		$user->fec_nac=$fecha;
		$user->save();
		$proceso="Alta de Usuario";
		$mensaje="Registro de Usuario Exitoso";
		
		return view('sistema.mensaje')
		->with('proceso',$proceso)
		->with('mensaje',$mensaje)
		->with($fecha);;
	}
}
