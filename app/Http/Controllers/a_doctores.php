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
		$doc->tipo="admin";
		$doc->save();
		$proceso="CREASTE AL NUEVO DOCTOR: $nom";
		$mensaje="El registro del Doctor fué exitoso";
		
		return view('sistema.mensaje')
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
	}
	
	public function desactivar_doctor($id){
		doctores::find($id)->delete();
		$proceso="DESACTIVASTE EL DOCTOR";
		$mensaje="El Doctor, ha sido desactivado correctamente.";	
		return view('sistema.a_mensaje')
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
	}
	
	public function restaurar_doctor($id){
		doctores::withTrashed()->where('id_doc',$id)->restore();
		$proceso = "RESTAURACION DEL DOCTOR";	
		$mensaje="El registro del Doctor, fue restaurado correctamente.";
		return view('sistema.a_mensaje')
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
	}
	
	public function efisicam($idm){
		maestros::withTrashed()->where('idm',$idm)->forceDelete();
		$proceso = "ELIMINACION FISICA DEL DOCTOR";	
		$mensaje="El registro del Doctor, ha sido eliminado correctamente";
		return view('sistema.a_mensaje')
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
    }
	
	public function consultar_perfil(){
		$d =doctores::withTrashed()->get();
		return view('sistema.a_cuenta')->with('doc',$d);
	}
	
	public function consultar_todos(){
		$d =doctores::withTrashed()->get();
		return view('sistema.a_consultar_doc')->with('doc',$d);
	}
}
