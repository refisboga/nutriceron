<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use App\pacientes;
use App\citas;

class usuario extends Controller
{
	
    public function registrar(Request $request){
		$nom=$request->nom;
		$ap=$request->ap;
		$am=$request->am;
		$correo=$request->email;
		$pass=$request->pass;
		$tel=$request->tel;
		$kg=$request->kg;
		$gr=$request->gr;
		$talla=$request->talla;
		$sexo=$request->sexo;
		$fecha=$request->fecha;
		
		$this->validate($request,[
			'nom'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/'],
			'ap'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/'],
			'am'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/'],
			'email'=>'required|email',
			'pass'=>['regex:/^[A-Z,a-z,0-9]*$/'],
			'tel'=>['regex:/^[0-9]+$/'],
			'kg'=>['regex:/^[0-9]+$/'],
			'gr'=>['regex:/^[0-9]+$/'],
			'talla'=>['regex:/^[1|2]+[.][0-9]+$/'],
			'fecha'=>'required|date'
		]);
		
		if($gr==0){
			$gr="000";
		}
		$peso=$kg.".".$gr;
		
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
		$user->tipo="usu";
		$user->save();
		$proceso="Alta del usuario: $nom.";
		$mensaje="El registro del usuario fué exitoso";
		
		return view('sistema.mensaje')
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
	}
	
	public function modif($id){
		$res=pacientes::where('id_pac','=',$id)->get();
		return view('sistema.modificar_usuario')->with('datos',$res);		
	}
	
	public function modificar(Request $request){
		$nom=$request->nom;
		$ap=$request->ap;
		$am=$request->am;
		$correo=$request->email;
		$pass=$request->pass;
		$tel=$request->tel;
		$kg=$request->kg;
		$gr=$request->gr;
		$metros=$request->metros;
		$cm=$request->cm;
		$sexo=$request->sexo;
		$fecha=$request->fecha;
		
		$this->validate($request,[
			'nom'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/'],
			'ap'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/'],
			'am'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/'],
			'email'=>'required|email',
			'pass'=>['regex:/^[A-Z,a-z,0-9]*$/'],
			'tel'=>['regex:/^[0-9]+$/'],
			'kg'=>['regex:/^[0-9]+$/'],
			'gr'=>['regex:/^[0-9]+$/'],
			'metros'=>['regex:/^[0-9]+$/'],
			'cm'=>['regex:/^[0-9]+$/'],
			'fecha'=>'required|date'
		]);
		
		if($cm==0){
			$cm="00";
		}
		$talla=$metros.$cm;
		if($gr==0){
			$gr="000";
		}
		$peso=$kg.$gr;
		
		$user=pacientes::find($id);
		$user->id_pac=$request->id;
		$user->nombre=$request->nom;
		$user->save();
		$proceso="Modificación del usuario: $nom.";
		$mensaje="La modificación del usuario fué exitosa.";
		
		return view('sistema.mensaje')
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
	}
	
	public function u_desactivar_pac($id){
		pacientes::find($id)->delete();
		$proceso = "DESACTIVASTE TU CUENTA";	
		$mensaje="El Paciente, ha sido desactivado correctamente.";
		return view('sistema.mensaje')
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
    }
	
	public function u_restaurar_pac($id){
		pacientes::withTrashed()->where('id_pac','=',$id)->restore();
		$proceso = "RESTAURACION DE LA CUENTA";	
		$mensaje="El registro del Paciente, fue restaurado correctamente";
		return view('sistema.mensaje')
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
	}
}