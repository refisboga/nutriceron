<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
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
		$peso=$request->peso;
		$talla=$request->talla;
		$sexo=$request->sexo;
		$fecha=$request->fecha;
		
		/*$this->validate($request,[
			'nom'=>'required|',['regex:/^[A-Z][A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/'],
			'ap'=>'required|',['regex:/^[A-Z][A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/'],
			'am'=>'required|',['regex:/^[A-Z][A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/'],
			'email'=>'required|email',
			'pass'=>'required|',['regex:/^[A-Z,a-z,0-9,ñ,é,í,á,ó,ú]*$/'],,
			'tel'=>'required|',['regex:/^[0-9]+{10}'],
			'peso'=>'required|',['regex:/^[0-9]+{2}[.][0-9]+{2}$/'],
			'talla'=>'required|',['regex:/^[0-9]+{2}[.][0-9]+{2}$/'],
			'fecha'=>'required|date'
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
		->with($fecha);
	}
	
	public function modif($id){
		$res=pacientes::where('id_pac','=',$id)->get();
		
		return view('sistema.modificar_usuario')->with('datos',$res);
	}
	
	public function modificar(Request $request){
		$id=$request->id;
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
		
		$user=pacientes::find($id);
		$user->id_pac=$request->id;
		$user->nombre=$request->nom;
		$user->save();
		$proceso="Modificación de Usuario";
		$mensaje="Modificación de Usuario Exitoso";
		
		return view('sistema.mensaje')
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
	}
	
	public function eliminar_fis($id){
		citas::find($id)->delete();
		$proceso = "ELIMINASTE TU CITA";	
		$mensaje="El registro de la cita, ha sido eliminado correctamente";
		return view('sistema.mensaje')
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
    }
	
	public function restaurar_cita($id){
		citas::withTrashed()->where('id_cita',$id)->restore();
		$proceso = "RESTAURACION DE LA CITA";	
		$mensaje="El registro de la cita fue restaurado correctamente";
		return view('sistema.mensaje')
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
	}
}