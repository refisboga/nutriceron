<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use App\doctores;

class a_doctores extends Controller
{
	
	public function registrardoc(){
		if(Session::get('sesiontipo')=="usu"){
			if(Session::get('sesionid')==""){
				return redirect()->route('logindesact');
			}else{
				return redirect()->route('loginnoruta');
			}
		}else{
			if(Session::get('sesiontipo')=="admin"){
				if(Session::get('sesionid')==""){
					return redirect()->route('logindesact');
				}else{
					//return redirect()->route('loginnoruta');
					return view('sistema.reg_doctor');
				}
			}else{
				return redirect()->route('loginempty');
			}
		}
	}
	
	public function crearmenu(){
		if(Session::get('sesiontipo')=="usu"){
			if(Session::get('sesionid')==""){
				return redirect()->route('logindesact');
			}else{
				return redirect()->route('loginnoruta');
			}
		}else{
			if(Session::get('sesiontipo')=="admin"){
				if(Session::get('sesionid')==""){
					return redirect()->route('logindesact');
				}else{
					//return redirect()->route('loginnoruta');
					return view('sistema.a_crear_menu');
				}
			}else{
				return redirect()->route('loginempty');
			}
		}
	}
	
	public function registrar(Request $request){		
		if(Session::get('sesiontipo')=="usu"){
			if(Session::get('sesionid')==""){
				return redirect()->route('logindesact');
			}else{
				return redirect()->route('loginnoruta');
			}
		}else{
			if(Session::get('sesiontipo')=="admin"){
				if(Session::get('sesionid')==""){
					return redirect()->route('logindesact');
				}else{
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
			}else{
				return redirect()->route('loginempty');
			}
		}
	}
	
	public function v_modificar_doc($id){
		if(Session::get('sesiontipo')=="usu"){
			if(Session::get('sesionid')==""){
				return redirect()->route('logindesact');
			}else{
				return redirect()->route('loginnoruta');
			}
		}else{
			if(Session::get('sesiontipo')=="admin"){
				if(Session::get('sesionid')==""){
					return redirect()->route('logindesact');
				}else{
					//return redirect()->route('loginnoruta');
					$d=doctores::where('id_doc','=',$id)->get();
		return view('sistema.a_modificar_doc')->with('datos',$d[0]);
				}
			}else{
				return redirect()->route('loginempty');
			}
		}
		
	}
	
	public function modificar_doc(Request $request){
		if(Session::get('sesiontipo')=="usu"){
			if(Session::get('sesionid')==""){
				return redirect()->route('logindesact');
			}else{
				return redirect()->route('loginnoruta');
			}
		}else{
			if(Session::get('sesiontipo')=="admin"){
				if(Session::get('sesionid')==""){
					return redirect()->route('logindesact');
				}else{
					//return redirect()->route('loginnoruta');
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
					$doc->id_doc=$request->id;
					$doc->nombre=$request->nom;
					$doc->ap_pat=$request->ap;
					$doc->ap_mat=$request->am;
					$doc->tel=$request->tel;
					$doc->correo=$request->email;
					$doc->pass=$request->pass;
					$doc->cedula=$request->cedu;
					$doc->tipo="admin";
					$doc->save();
					$proceso="MODIFICACIÓN DEL PERFIL";
					$mensaje="La Modificación del Perfil del Doctor fué exitoso";
					
					return view('sistema.a_mensaje')
					->with('proceso',$proceso)
					->with('mensaje',$mensaje);
				}
			}else{
				return redirect()->route('loginempty');
			}
		}
	}
	
	public function desactivar_doctor($id){
		if(Session::get('sesiontipo')=="usu"){
			if(Session::get('sesionid')==""){
				return redirect()->route('logindesact');
			}else{
				return redirect()->route('loginnoruta');
			}
		}else{
			if(Session::get('sesiontipo')=="admin"){
				if(Session::get('sesionid')==""){
					return redirect()->route('logindesact');
				}else{
					//return redirect()->route('loginnoruta');
					doctores::find($id)->delete();
					$proceso="DESACTIVASTE EL DOCTOR";
					$mensaje="El Doctor, ha sido desactivado correctamente.";	
					return view('sistema.a_mensaje')
					->with('proceso',$proceso)
					->with('mensaje',$mensaje);
				}
			}else{
				return redirect()->route('loginempty');
			}
		}
	}
	
	public function restaurar_doctor($id){
		if(Session::get('sesiontipo')=="usu"){
			if(Session::get('sesionid')==""){
				return redirect()->route('logindesact');
			}else{
				return redirect()->route('loginnoruta');
			}
		}else{
			if(Session::get('sesiontipo')=="admin"){
				if(Session::get('sesionid')==""){
					return redirect()->route('logindesact');
				}else{
					//return redirect()->route('loginnoruta');
					doctores::withTrashed()->where('id_doc','=',$id)->restore();
					$proceso = "RESTAURACION DEL DOCTOR";	
					$mensaje="El registro del Doctor, fue restaurado correctamente.";
					return view('sistema.a_mensaje')
					->with('proceso',$proceso)
					->with('mensaje',$mensaje);
				}
			}else{
				return redirect()->route('loginempty');
			}
		}
	}
	
	public function eliminar_doctor($id){
		if(Session::get('sesiontipo')=="usu"){
			if(Session::get('sesionid')==""){
				return redirect()->route('logindesact');
			}else{
				return redirect()->route('loginnoruta');
			}
		}else{
			if(Session::get('sesiontipo')=="admin"){
				if(Session::get('sesionid')==""){
					return redirect()->route('logindesact');
				}else{
					//return redirect()->route('loginnoruta');
					doctores::withTrashed()->where('id_doc','=',$id)->forceDelete();
					$proceso = "ELIMINACION FISICA DEL DOCTOR";	
					$mensaje="El registro del Doctor, ha sido eliminado correctamente";
					return view('sistema.a_mensaje')
					->with('proceso',$proceso)
					->with('mensaje',$mensaje);
				}
			}else{
				return redirect()->route('loginempty');
			}
		}
    }
	
	public function consultar_perfil(){
		if(Session::get('sesiontipo')=="usu"){
			if(Session::get('sesionid')==""){
				return redirect()->route('logindesact');
			}else{
				//return redirect()->route('loginnoruta');
			}
		}else{
			if(Session::get('sesiontipo')=="admin"){
				if(Session::get('sesionid')==""){
					return redirect()->route('logindesact');
				}else{
					//return redirect()->route('loginnoruta');
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
			}else{
				return redirect()->route('loginempty');
			}
		}
	}
	
	public function consultar_doctores(){
		if(Session::get('sesiontipo')=="usu"){
			if(Session::get('sesionid')==""){
				return redirect()->route('logindesact');
			}else{
				return redirect()->route('loginnoruta');
			}
		}else{
			if(Session::get('sesiontipo')=="admin"){
				if(Session::get('sesionid')==""){
					return redirect()->route('logindesact');
				}else{
					//return redirect()->route('loginnoruta');
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
			}else{
				return redirect()->route('loginempty');
			}
		}
	}
}
