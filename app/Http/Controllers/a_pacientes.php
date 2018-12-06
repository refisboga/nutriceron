<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\pacientes;

class a_pacientes extends Controller
{
    public function consultar_pacientes_act(){
		$only=pacientes::onlyTrashed()->get();
		$res=\DB::select("SELECT * FROM pacientes;");
		if(count($only)!=count($res)){
			$p=pacientes::withTrashed()->get();
			return view('sistema.a_pacientes_act')->with('pac',$p);
		}else{
			$proceso="CONSULTA DE PACIENTES ACTIVOS";	
			$mensaje="NO existen registros de Pacientes activos.";
			return view('sistema.a_mensaje')
			->with('proceso',$proceso)
			->with('mensaje',$mensaje);
		}
	}
	
	public function consultar_pacientes_desact(){
		$p=pacientes::onlyTrashed()->get();
		if(count($p)!=0){
			return view('sistema.a_pacientes_desc')->with('pac',$p);
		}else{
			$proceso="CONSULTA DE PACIENTES DESACTIVADOS";	
			$mensaje="NO existen registros de Pacientes desactivados.";
			return view('sistema.a_mensaje')
			->with('proceso',$proceso)
			->with('mensaje',$mensaje);
		}
	}
	
	public function desactivar_pac($id){
		pacientes::find($id)->delete();
		$proceso = "DESACTIVASTE AL PACIENTE";	
		$mensaje="El Paciente, ha sido desactivado correctamente.";
		return view('sistema.a_mensaje')
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
    }
	
	public function restaurar_pac($id){
		pacientes::withTrashed()->where('id_pac','=',$id)->restore();
		$proceso = "RESTAURACION DEL PACIENTE";	
		$mensaje="El registro del Paciente, fue restaurado correctamente";
		return view('sistema.a_mensaje')
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
	}
	
	public function eliminar_pac($id){
		try{
			pacientes::withTrashed()->where('id_pac','=',$id)->forceDelete();
			$proceso = "ELIMINACION FISICA DEL PACIENTE";	
			$mensaje="El registro del Paciente, ha sido eliminado correctamente";
			return view('sistema.a_mensaje')
			->with('proceso',$proceso)
			->with('mensaje',$mensaje);
		}catch(\Illuminate\Database\QueryException $id){
			$proceso = "ELIMINACION FISICA DEL PACIENTE";	
			$mensaje="El registro del Paciente, NO se elimino debido a que esta siendo utilizado.";
			return view('sistema.a_mensaje')
			->with('proceso',$proceso)
			->with('mensaje',$mensaje);
		}
    }
	
	public function a_v_modificar_pac($id){
		$r=\DB::select("SELECT * FROM pacientes WHERE id_pac=$id;");
		return view('sistema.a_modificar_pac')->with('datos',$r[0]);
	}
	
	public function a_modificar_pac(Request $request){
		$id=$request->id;
		$nom=$request->nom;
		$ap=$request->ap;
		$am=$request->am;
		$correo=$request->email;
		$pass=$request->pass;
		$tel=$request->tel;
		$sexo=$request->sexo;
		$fecha=$request->fecha;
		
		$this->validate($request,[
			'nom'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/'],
			'ap'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/'],
			'am'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/'],
			'email'=>'required|email',
			'pass'=>['regex:/^[A-Z,a-z,0-9]*$/'],
			'tel'=>['regex:/^[0-9]+$/'],
			'fecha'=>'required|date'
		]);
		
		$user=pacientes::find($id);
		$user->nombre=$nom;
		$user->ap_pat=$ap;
		$user->ap_mat=$am;
		$user->correo=$correo;
		$user->pass=$pass;
		$user->telefono=$tel;
		$user->sexo=$sexo;
		$user->fec_nac=$fecha;
		$user->tipo="usu";
		$user->save();
		$proceso="MODIFICACION DEL USUARIO";
		$mensaje="La modificación del usuario fué exitosa.";
		
		return view('sistema.a_mensaje')
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
	}
}
