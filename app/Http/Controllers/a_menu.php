<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use App\menus;

class a_menu extends Controller
{
    public function registrar(Request $request){
		$tipo=$request->tipo;
		$desc=$request->desc;
		$menu=$request->menu;
		
		$this->validate($request,[
			'tipo'=>'required|',['regex:/^[A-Z][A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/'],
			'desc'=>'required|',['regex:/^[A-Z][A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/'],
			'menu'=>'required|',['regex:/^[A-Z,a-z, ,0-9,.,,,;,:,-,_,ñ,é,í,á,ó,ú]*$/']
		]);
		
		$m=new menus;
		$m->id_menu=null;
		$m->tipo_comida=$tipo;
		$m->descr=$desc;
		$m->menu=$menu;
		$m->save();
		$proceso="Alta de Menu";
		$mensaje="El Registro del Menu fué Exitoso";
		
		return view('sistema.a_mensaje')
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
	}
	
	public function a_consultar_menu(){
		$only=menus::onlyTrashed()->get();
		$res=\DB::select("SELECT * FROM menus;");
		if(count($only)!=count($res)){
			$m=menus::withTrashed()->get();
			return view('sistema.a_consultar_menu')->with('menu',$m);
		}else{
			$proceso="CONSULTA DE MENUS ACTIVOS";	
			$mensaje="NO existen registros de Menus activos.";
			return view('sistema.a_mensaje')
			->with('proceso',$proceso)
			->with('mensaje',$mensaje);
		}
	}
	
	public function a_consultar_menu_hist(){
		$only=menus::onlyTrashed()->get();
		if(count($only)!=0){
			$m=menus::onlyTrashed()->get();
			return view('sistema.a_consultar_menu_desac')->with('menu',$m);
		}else{
			$proceso="CONSULTA DEL HISTORIAL";	
			$mensaje="NO existe Historial de registros de Menus.";
			return view('sistema.a_mensaje')
			->with('proceso',$proceso)
			->with('mensaje',$mensaje);
		}
	}
	
	public function menu_disponible(){
		$m=menus::withTrashed()->get();
		if(count($m)==0){
			$proceso="Consultar Menus Disponibles";
			$mensaje="Necesitas contactar a tu Nutriólogo para que te asigne un menu.";
			return view('sistema.mensaje')->with('proceso',$proceso)->with('mensaje',$mensaje);
		}else{
			return view('sistema.menu')->with('menu',$m);
		}
	}
	
	public function a_desactivar_menu($id){
		menus::find($id)->delete();
		$proceso = "DESACTIVASTE EL MENU";	
		$mensaje="El Menu, ha sido desactivada correctamente.";
		return view('sistema.a_mensaje')
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
    }
	
	public function a_restaurar_menu($id){
		menus::withTrashed()->where('id_menu','=',$id)->restore();
		$proceso = "RESTAURACION DEL MENU";	
		$mensaje="El registro del Menú, fue restaurado correctamente";
		return view('sistema.a_mensaje')
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
	}
	
	public function a_eliminar_menu($id){
		try{
			menus::withTrashed()->where('id_menu','=',$id)->forceDelete();
			$proceso = "ELIMINACION FISICA DEL MENU";	
			$mensaje="El registro del Menú, ha sido eliminado correctamente.";
			return view('sistema.a_mensaje')
			->with('proceso',$proceso)
			->with('mensaje',$mensaje);
		}catch(\Illuminate\Database\QueryException $id){
			$proceso = "ELIMINACION FISICA DEL MENU";	
			$mensaje="El registro del Menú, NO se elimino debido a que esta siendo utilizado.";
			return view('sistema.a_mensaje')
			->with('proceso',$proceso)
			->with('mensaje',$mensaje);
		}
    }
}
