<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\expedientes;

class a_expedientes extends Controller
{	
	public function consultar_expedientes_act(){
		$only=expedientes::onlyTrashed()->get();
		$res=\DB::select("SELECT * FROM expedientes;");
		if(count($only)!=count($res)){
			$e=\DB::select("SELECT e.id_exp, e.fecha, e.hora, e.tipo_sangre, e.alergia1, e.alergia2, e.enfermedad1, e.enfermedad2, e.cirugia, e.tipo_cirugia, 
						e.tratamiento, e.desc_tratamiento, e.id_pac_fk, e.deleted_at, p.nombre, p.ap_pat, p.ap_mat, p.deleted_at AS delet_pac
						FROM expedientes AS e
						INNER JOIN pacientes AS p ON e.id_pac_fk=p.id_pac ORDER BY e.fecha DESC");
			return view('sistema.a_expedientes_act')->with('expe',$e);
		}else{
			$proceso="CONSULTAR EXPEDIENTES ACTIVOS";	
			$mensaje="NO existen registros de Expedientes.";
			return view('sistema.a_mensaje')
			->with('proceso',$proceso)
			->with('mensaje',$mensaje);
		}
	}
	
	public function consultar_expedientes_desac(){
		$e=expedientes::onlyTrashed()->get();
		if(count($e)!=0){
			return view('sistema.a_expedientes_desac')->with('expe',$e);
		}else{
			$proceso="CONSULTAR HISTORIAL DE EXPEDIENTES";	
			$mensaje="NO existen registros de Expedientes en el Historial.";
			return view('sistema.a_mensaje')
			->with('proceso',$proceso)
			->with('mensaje',$mensaje);
		}
	}
	
	public function desactivar_expe($id){
		expedientes::find($id)->delete();
		$proceso="DESACTIVASTE EL EXPEDIENTE";	
		$mensaje="El Expediente, ha sido desactivado correctamente.";
		return view('sistema.a_mensaje')
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
    }
	
	public function restaurar_expe($id){
		expedientes::withTrashed()->where('id_exp','=',$id)->restore();
		$proceso="RESTAURACION DEL EXPEDIENTE";	
		$mensaje="El registro del Expediente, fue restaurado correctamente";
		return view('sistema.a_mensaje')
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
	}
	
	public function eliminar_expe($id){
		expedientes::withTrashed()->where('id_exp','=',$id)->forceDelete();
		$proceso = "ELIMINACION FISICA DEL EXPEDIENTE";	
		$mensaje="El registro del Expediente, ha sido eliminado correctamente";
		return view('sistema.a_mensaje')
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
    }
}
