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
		return view('sistema.home');
	}
	
	public function loginadmin(){
		return view('sistema.admin');
	}
	
	public function index(){
		return view('sistema.main');
	}
	
	public function validar(Request $request){
		$correo=$request->correo;
		$pass=$request->pass;
		
		$consulta = pacientes::withTrashed()
		                    ->where('correo','=',$correo)
		                    ->where('pass','=',$pass)
							->get();
							
		if(count($consulta)!=0){
			if($consulta[0]->deleted_at !=""){
				Session::flash('error', 'El Paciente esta desactivado consulte a su administrador');
				return redirect()->route('login');
			}else{
				Session::put('sesionname',$consulta[0]->nombre);
				Session::put('sesionid',$consulta[0]->id_pac);
				Session::put('sesiontipo',$consulta[0]->tipo);
				return redirect()->route('home');
			}
		}else{
			$consulta2=doctores::withTrashed()
		                    ->where('correo','=',$correo)
		                    ->where('pass','=',$pass)
							->get();
			if($consulta2[0]->deleted_at !=""){
				Session::flash('error', 'El Doctor esta desactivado consulte a su administrador');
				return redirect()->route('login');
			}else{
				Session::put('sesionname',$consulta2[0]->nombre);
				Session::put('sesionid',$consulta2[0]->id_doc);
				Session::put('sesiontipo',$consulta2[0]->tipo);
				return redirect()->route('admin');
			}
		}
	}
	
	public function cerrarsesion(){
		Session::forget('sesionname');
		Session::forget('sesionid');
		Session::forget('sesiontipo');
		Session::flush();
		Session::flash('error', 'Session Cerrada Correctamente');
		return redirect()->route('index');
	}
	
	public function validar_sesion(){
		if(Session::get('sesionidu')==""){
			Session::flash('error', 'Es necesario loguearse antes de continuar');
			return redirect()->route('login');
		}else{
			return view ('sistema.main');
		}
	}
}
