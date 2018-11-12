<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
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
	
	public function consmenu_a(){
		$m=menus::all();
		return view('sistema.a_consultar_menu')->with('menu',$m);
	}
	
	public function consmenu(){
		$m=menus::all();
		return view('sistema.menu')->with('menu',$m);
	}
}
