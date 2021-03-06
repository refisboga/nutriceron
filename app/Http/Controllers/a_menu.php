<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use App\menus;

class a_menu extends Controller
{
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
					//return redirect()->route('loginnoruta');
					$tipo=$request->tipo;
					$desc=$request->desc;
					$menu=$request->menu;
					$mp=$request->mp;
					
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
					$m->id_pac_fk=$mp;
					$m->save();
					$m=\DB::select("SELECT MAX(id_menu) AS idmax FROM menus;");
					$proceso="ALTA DE MENU";
					$mensaje="El Registro del Menu fué Exitoso.";
					
					return view('sistema.a_mensaje')
					->with('proceso',$res)
					->with('mensaje',$mensaje);
				}
			}else{
				return redirect()->route('loginempty');
			}
		}
	}
	
	public function a_consultar_menu(){
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
					$only=menus::onlyTrashed()->get();
					$res=\DB::select("SELECT * FROM menus;");
					if(count($only)!=count($res)){
						//$m=menus::withTrashed()->get();
						$m=\DB::select("SELECT m.id_menu, m.tipo_comida as comida, m.descr, m.menu, m.id_pac_fk, m.deleted_at as dat,p.id_pac as idp, p.nombre as nom, p.ap_pat as ap
									FROM menus AS m
									INNER JOIN pacientes AS p ON m.id_pac_fk=p.id_pac;");
						return view('sistema.a_consultar_menu')->with('menu',$m);
					}else{
						$proceso="CONSULTA DE MENUS ACTIVOS";	
						$mensaje="NO existen registros de Menus activos.";
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
	
	public function a_consultar_menu_hist(){
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
					$only=menus::onlyTrashed()->get();
					if(count($only)!=0){
						//$m=menus::onlyTrashed()->get();
						$m=\DB::select("SELECT m.id_menu, m.tipo_comida as comida, m.descr, m.menu, m.id_pac_fk, m.deleted_at as dat,p.id_pac as idp, p.nombre as nom, p.ap_pat as ap
									FROM menus AS m
									INNER JOIN pacientes AS p ON m.id_pac_fk=p.id_pac;");
						return view('sistema.a_consultar_menu_desac')->with('menu',$m);
					}else{
						$proceso="CONSULTA DEL HISTORIAL";	
						$mensaje="NO existe Historial de registros de Menus.";
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
	
	public function menu_disponible(){
		if(Session::get('sesiontipo')=="usu"){
			if(Session::get('sesionid')==""){
				return redirect()->route('logindesact');
			}else{
				//return redirect()->route('loginnoruta');
				//$m=menus::withTrashed()->get();
				$id=Session::get('sesionid');
				$m=\DB::select("SELECT * FROM menus WHERE id_pac_fk=$id");
				if(count($m)==0){
					$proceso="Consultar Menus Disponibles";
					$mensaje="Necesitas contactar a tu Nutriólogo para que te asigne un menu.";
					return view('sistema.mensaje')->with('proceso',$proceso)->with('mensaje',$mensaje);
				}else{
					return view('sistema.menu')->with('menu',$m);
				}
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
	
	public function a_desactivar_menu($id){
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
					menus::find($id)->delete();
					$proceso = "DESACTIVASTE EL MENU";	
					$mensaje="El Menu, ha sido desactivada correctamente.";
					return view('sistema.a_mensaje')
					->with('proceso',$proceso)
					->with('mensaje',$mensaje);
				}
			}else{
				return redirect()->route('loginempty');
			}
		}
    }
	
	public function a_restaurar_menu($id){
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
					menus::withTrashed()->where('id_menu','=',$id)->restore();
					$proceso = "RESTAURACION DEL MENU";	
					$mensaje="El registro del Menú, fue restaurado correctamente";
					return view('sistema.a_mensaje')
					->with('proceso',$proceso)
					->with('mensaje',$mensaje);
				}
			}else{
				return redirect()->route('loginempty');
			}
		}
	}
	
	public function a_eliminar_menu($id){
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
			}else{
				return redirect()->route('loginempty');
			}
		}
    }
	
	public function a_v_modificar_menu($id){
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
					$r=\DB::select("SELECT m.id_menu, m.tipo_comida as comida, m.descr, m.menu, m.id_pac_fk, p.id_pac as idp, p.nombre as nom, p.ap_pat as ap
									FROM menus AS m
									INNER JOIN pacientes AS p ON m.id_pac_fk=p.id_pac
									WHERE m.id_menu=$id");
					return view('sistema.a_modificar_menu')->with('datos',$r[0]);
				}
			}else{
				return redirect()->route('loginempty');
			}
		}
	}
	
	public function a_modificar_menu(Request $request){
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
					$tipo=$request->tipo;
					$desc=$request->desc;
					$menu=$request->menu;
					
					$this->validate($request,[
						'tipo'=>'required|',['regex:/^[A-Z][A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/'],
						'desc'=>'required|',['regex:/^[A-Z][A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/'],
						'menu'=>'required|',['regex:/^[A-Z,a-z, ,0-9,.,,,;,:,-,_,ñ,é,í,á,ó,ú]*$/']
					]);
					
					$m=menus::find($id);
					$m->tipo_comida=$tipo;
					$m->descr=$desc;
					$m->menu=$menu;
					$m->save();
					$proceso="MODIFICACION DEL MENU";
					$mensaje="La Modificación del Menu fué Exitoso.";
					
					return view('sistema.a_mensaje')
					->with('proceso',$proceso)
					->with('mensaje',$mensaje);
				}
			}else{
				return redirect()->route('loginempty');
			}
		}
	}
}
