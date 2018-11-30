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
}
