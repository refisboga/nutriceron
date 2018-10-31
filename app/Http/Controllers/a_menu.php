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
		
		$m=new menus;
		$m->id_menu=null;
		$m->tipo_comida=$tipo;
		$m->descr=$desc;
		$m->menu=$menu;
		$m->save();
		
		return view('sistema.nav_admin');
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
