<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use App\doctores;

class a_doctores extends Controller
{
    public function registrar(Request $request){
		
		$nom=$request->nom;
		$ap=$request->ap;
		$am=$request->am;
		$cedu=$request->cedu;
		$tel=$request->tel;
		$correo=$request->email;
		$pass=$request->pass;
		
		$this->validate($request,[
			'nom'=>'required|',['regex:/^[A-Z][A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/'],
			'ap'=>'required|',['regex:/^[A-Z][A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/'],
			'am'=>'required|',['regex:/^[A-Z][A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/'],
			'cedu'=>'required|',['regex:/^[0-9]+{10}'],
			'tel'=>'required|',['regex:/^[0-9]+{10}'],
			'email'=>'required|email',
			'pass'=>'required|',['regex:/^[A-Z,a-z,0-9,ñ,é,í,á,ó,ú]*$/']
		]);
		
		$doc=new doctores;
		$doc->id_doc=null;
		$doc->nombre=$nom;
		$doc->ap_pat=$ap;
		$doc->ap_mat=$am;
		$doc->tel=$tel;
		$doc->correo=$correo;
		$doc->pass=$pass;
		$doc->cedula=$cedu;
		$doc->tipo="admin";
		$doc->save();
		$proceso="REGISTRO DEL NUEVO DOCTOR: $nom";
		$mensaje="El registro del Doctor fué exitoso.";
		
		return view('sistema.a_mensaje')
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
	}
	
	public function v_modificar_doc($id){
		$d=doctores::withTrashed()->where('id_doc','=',$id)->get();
		return view('sistema.a_modificar_doc')->with('doc',$d);
	}
	
	public function modificar_doc(Request $request){
		$id=$request->id;
		$nom=$request->nom;
		$ap=$request->ap;
		$am=$request->am;
		$tel=$request->tel;
		$correo=$request->email;
		$pass=$request->pass;
		$cedu=$request->cedu;
		
		$this->validate($request,[
			'nom'=>'required|',['regex:/^[A-Z][A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/'],
			'ap'=>'required|',['regex:/^[A-Z][A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/'],
			'am'=>'required|',['regex:/^[A-Z][A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/'],
			'cedu'=>'required|',['regex:/^[0-9]+{10}'],
			'tel'=>'required|',['regex:/^[0-9]+{10}'],
			'email'=>'required|email',
			'pass'=>'required|',['regex:/^[A-Z,a-z,0-9,ñ,é,í,á,ó,ú]*$/']
		]);
		
		$doc=doctores::find($id);
		$doc->id_doc=$id;
		$doc->nombre=$nom;
		$doc->ap_pat=$ap;
		$doc->ap_mat=$am;
		$doc->tel=$tel;
		$doc->correo=$correo;
		$doc->pass=$pass;
		$doc->cedula=$cedu;
		$doc->tipo="admin";
		$doc->save();
		$proceso="MODIFICACIÓN DEL PERFIL";
		$mensaje="La Modificación del Perfil del Doctor fué exitoso";
		
		return view('sistema.a_mensaje')
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
		doctores::withTrashed()->where('id_doc','=',$id)->restore();
		$proceso = "RESTAURACION DEL DOCTOR";	
		$mensaje="El registro del Doctor, fue restaurado correctamente.";
		return view('sistema.a_mensaje')
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
	}
	
	public function eliminar_doctor($id){
		doctores::withTrashed()->where('id_doc','=',$id)->forceDelete();
		$proceso = "ELIMINACION FISICA DEL DOCTOR";	
		$mensaje="El registro del Doctor, ha sido eliminado correctamente";
		return view('sistema.a_mensaje')
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
    }
	
	public function consultar_perfil(){
		$d =doctores::withTrashed()->where('id_doc','=',Session::get('sesionid'))->get();
		if(count($d)==1){
			return view('sistema.a_perfil')->with('doc',$d);
		}else{
			$proceso = "CONSULTAR PERFIL";	
			$mensaje="Error al consultar el perfil.";
			return view('sistema.a_mensaje')
			->with('proceso',$proceso)
			->with('mensaje',$mensaje);
		}
	}
	
	public function consultar_doctores(){
		$d=doctores::withTrashed()->get();
		if(count($d)>0){
			return view('sistema.a_consultar_doc')->with('doc',$d);
		}else{
			$proceso="CONSULTAR DOCTORES";	
			$mensaje="Error al consultar los perfiles de los doctores.";
			return view('sistema.a_mensaje')
			->with('proceso',$proceso)
			->with('mensaje',$mensaje);
		}
	}
}
