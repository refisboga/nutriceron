<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\pacientes;
use App\doctores;
use Session;

class clogin extends Controller
{
    public function login(){
		if(Session::get('sesiontipo')=="usu"){
			if(Session::get('sesionid')==""){
				return redirect()->route('logindesact');
			}else{
				//return redirect()->route('loginnoruta');
				return view('sistema.home');
			}
		}else{
			if(Session::get('sesiontipo')=="admin"){
				if(Session::get('sesionid')==""){
					return redirect()->route('logindesact');
				}else{
					return redirect()->route('loginnoruta');
				}
			}else{
				return redirect()->route('loginempty');
			}
		}
	}
	
	public function loginadmin(){
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
					return view('sistema.admin');
				}
			}else{
				return redirect()->route('loginempty');
			}
		}
	}
	
	public function index(){
		return view('sistema.main');
	}
	
	public function login_empty(){
		$proceso="INTENTO DE INICIO DE SESION";
		$mensaje="NO se encuentra registrado el usuario o aun NO inicia sesion.";
		return view('sistema.mensaje_login')->with('proceso',$proceso)->with('mensaje',$mensaje);
	}
	
	public function login_desact(){
		$proceso="INTENTO DE INICIO DE SESION";
		$mensaje="El usuario esta desactivado, comuniquese con el administrador.";
		return view('sistema.mensaje_login')->with('proceso',$proceso)->with('mensaje',$mensaje);
	}
	
	public function login_rutanovalida(){
		$proceso="RUTA NO VALIDA";
		$mensaje="Inicie sesión para continuar.";
		return view('sistema.mensaje_login')->with('proceso',$proceso)->with('mensaje',$mensaje);
	}
		
	public function validar_login(Request $request){
		$correo=$request->correo;
		$pass=$request->pass;
		
		$consulta=pacientes::withTrashed()
		                    ->where('correo','=',$correo)
		                    ->where('pass','=',$pass)
							->get();
							
		if(count($consulta)==1){
			if($consulta[0]->deleted_at !=""){
				return redirect()->route('logindesact');
			}else{
				Session::put('sesionid',$consulta[0]->id_pac);
				Session::put('sesionname',$consulta[0]->nombre);
				Session::put('sesionlastname',$consulta[0]->ap_pat);
				Session::put('sesionlastname2',$consulta[0]->ap_mat);
				Session::put('sesiontipo',$consulta[0]->tipo);
				Session::put('sesionimg',$consulta[0]->imagen);
				return redirect()->route('home');
			}
		}else{
			$consulta2=doctores::withTrashed()
		                    ->where('correo','=',$correo)
		                    ->where('pass','=',$pass)
							->get();
			if(count($consulta2)==1){
				if($consulta2[0]->deleted_at !=""){
					return redirect()->route('logindesact');
				}else{
					Session::put('sesionid',$consulta2[0]->id_doc);
					Session::put('sesionname',$consulta2[0]->nombre);
					Session::put('sesionlastname',$consulta2[0]->ap_pat);
					Session::put('sesionlastname2',$consulta2[0]->ap_mat);
					Session::put('sesiontipo',$consulta2[0]->tipo);
				return redirect()->route('admin');
				}
			}else{
				return redirect()->route('loginempty');
			}
		}
	}
	
	public function cerrarsesion(){
		Session::forget('sesionname');
		Session::forget('sesionid');
		Session::forget('sesiontipo');
		Session::forget('sesionimg');
		Session::flush();
		Session::flash('error', 'Sesión cerrada correctamente');
		return redirect()->route('index');
	}
	
	public function validar_sesion(){
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
				}
			}else{
				return redirect()->route('loginempty');
			}
		}
	}
}
