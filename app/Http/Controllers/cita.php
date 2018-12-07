<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use App\citas;

class cita extends Controller
{
	public function cita(){
		return view('sistema.agendar_cita');
	}
    public function registrar(Request $request){
		$id=$request->id;
		$nom=$request->nom;
		$direc=$request->direc;
		$cp=$request->cp;
		$tel=$request->tel;
		$correo=$request->correo;
		$fecha=$request->fecha;
		$hora=$request->hora;
		
		/*$this->validate($request,[
			'nom'=>'required|',['regex:/^[A-Z][A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/'],
			'derec'=>'required|',['regex:/^[A-Z][A-Z,a-z, ,.,ñ,é,í,á,ó,ú]*$/'],
			'cp'=>'required|',['regex:/^[0-9]{5}$/'],
			'tel'=>'required|',['regex:/^[0-9]{10}$/'],
			'email'=>'required|email',
			'fecha'=>'required|date',
			'hora'=>'required|',['regex:/^[0-9]{2}+[:][0-9]{2}+$/']
		]);*/
		
		$cita=new citas;
		$cita->id_cita=null;
		$cita->fecha=$fecha;
		$cita->hora=$hora;
		$cita->direc=$direc;
		$cita->cp=$cp;
		$cita->tel=$tel;
		$cita->correo=$correo;
		$cita->id_pac_fk=$id;
		$cita->save();
		$proceso="REGISTRAR CITA";
		$mensaje="El Registro de la Cita fué exitoso";
		
		return view('sistema.mensaje')
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
	}
	
	public function v_modificar_cita($id){
		$only=citas::onlyTrashed()->get();
		$res=\DB::select("SELECT * FROM citas;");
		if(count($only)!=count($res)){
			$cita=\DB::select("SELECT c.id_cita, c.fecha, c.hora, c.direc, c.cp, c.tel, c.correo, c.id_pac_fk, c.deleted_at AS deleted_cita,
								p.id_pac, p.nombre, p.ap_pat, p.ap_mat, p.deleted_at AS deleted_pac
								FROM citas AS c
								INNER JOIN pacientes AS p ON p.id_pac=c.id_pac_fk
								WHERE c.id_cita=$id");
			return view('sistema.v_modificar_cita')->with('cita',$cita);
		}else{
			$proceso="MODIFICAR CITA";	
			$mensaje="NO existen registros de Citas.";
			return view('sistema.a_mensaje')
			->with('proceso',$proceso)
			->with('mensaje',$mensaje);
		}
	}
	
	public function a_modificar_cita(Request $request){
		$idc=$request->idc;
		$idp=$request->idp;
		$nom=$request->nom;
		$direc=$request->direc;
		$cp=$request->cp;
		$tel=$request->tel;
		$correo=$request->correo;
		$fecha=$request->fecha;
		$hora=$request->hora;
		
		/*$this->validate($request,[
			'nom'=>'required|',['regex:/^[A-Z][A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/'],
			'derec'=>'required|',['regex:/^[A-Z][A-Z,a-z, ,.,ñ,é,í,á,ó,ú]*$/'],
			'cp'=>'required|',['regex:/^[0-9]{5}$/'],
			'tel'=>'required|',['regex:/^[0-9]{10}$/'],
			'email'=>'required|email',
			'fecha'=>'required|date',
			'hora'=>'required|',['regex:/^[0-9]{2}+[:][0-9]{2}+$/']
		]);*/
		
		$cita=citas::find($idc);
		$cita->id_cita=$idc;
		$cita->fecha=$fecha;
		$cita->hora=$hora;
		$cita->direc=$direc;
		$cita->cp=$cp;
		$cita->tel=$tel;
		$cita->correo=$correo;
		$cita->id_pac_fk=$idp;
		$cita->save();
		$proceso="MODIFICACION DE LA CITA";
		$mensaje="La Modificacion de la Cita fué exitosa.";
		
		return view('sistema.a_mensaje')
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
	}
	
	public function detalle_cita(){
		$c=citas::withTrashed()->where('id_pac_fk','=',Session::get('sesionid'))->get();
		if(count($c)==0){
			$proceso="CONSULTAR CITAS";
			$mensaje="Aun NO agendas alguna cita.";
			return view('sistema.mensaje')->with('proceso',$proceso)->with('mensaje',$mensaje);
		}else{
			return view('sistema.detalle_cita')->with('citas',$c);
		}
	}
	
	public function desactivar_cita($id){
		citas::find($id)->delete();
		$proceso = "DESACTIVASTE TU CITA";	
		$mensaje="La cita, ha sido desactivada correctamente.";
		return view('sistema.mensaje')
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
    }
	
	public function restaurar_cita($id){
		citas::withTrashed()->where('id_cita','=',$id)->restore();
		$proceso = "RESTAURACION DE LA CITA";	
		$mensaje="El registro de la cita, fue restaurado correctamente";
		return view('sistema.mensaje')
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
	}
	
	public function a_desactivar_cita($id){
		citas::find($id)->delete();
		$proceso = "DESACTIVASTE LA CITA DEL PACIENTE";	
		$mensaje="La cita, ha sido desactivada correctamente.";
		return view('sistema.a_mensaje')
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
    }
	
	public function a_restaurar_cita($id){
		citas::withTrashed()->where('id_cita','=',$id)->restore();
		$proceso = "RESTAURACION DE LA CITA";	
		$mensaje="El registro de la cita, fue restaurado correctamente";
		return view('sistema.a_mensaje')
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
	}
	
	public function a_eliminar_cita($id){
		citas::withTrashed()->where('id_cita','=',$id)->forceDelete();
		$proceso = "ELIMINACION FISICA DE LA CITA";	
		$mensaje="El registro de la cita, ha sido eliminado correctamente";
		return view('sistema.a_mensaje')
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
    }
	
	public function a_consultar_citas(){
		$only=citas::onlyTrashed()->get();
		$res=\DB::select("SELECT * FROM citas;");
		if(count($only)!=count($res)){
			$r=\DB::select("SELECT c.id_cita, c.fecha, c.hora, c.deleted_at as estatus_cita, p.nombre, p.ap_pat, p.ap_mat, p.correo, p.telefono, p.deleted_at
							FROM citas AS c
							INNER JOIN pacientes AS p ON id_pac_fk=p.id_pac ORDER BY c.fecha, c.hora ASC");
			return view('sistema.a_consultar_citas')->with('citas',$r);
		}else{
			$proceso = "CONSULTA DE CITAS ACTIVAS";	
			$mensaje="NO existen registros de Citas activas.";
			return view('sistema.a_mensaje')
			->with('proceso',$proceso)
			->with('mensaje',$mensaje);
		}		
	}
	
	public function a_consultar_hist_citas(){
		$c=citas::onlyTrashed()->get();
		if(count($c)!=0){
			$r=\DB::select("SELECT c.id_cita, c.fecha, c.hora, c.deleted_at as estatus_cita, p.nombre, p.ap_pat, p.ap_mat, p.correo, p.telefono, p.deleted_at
						FROM citas AS c
						INNER JOIN pacientes AS p ON id_pac_fk=p.id_pac ORDER BY c.fecha DESC");
			return view('sistema.a_historial_citas')->with('citas',$r);
		}else{
			$proceso = "CONSULTA HISTORIAL DE CITAS";	
			$mensaje="NO existen registros de Citas en el historial.";
			return view('sistema.a_mensaje')
			->with('proceso',$proceso)
			->with('mensaje',$mensaje);
		}
		
	}
	
	public function v_modificar_citap($id){
		$r=\DB::select("SELECT * FROM citas WHERE id_cita=$id;");
		return view('sistema.modificar_cita')->with('datos',$r[0]);
	}
	
	public function modificar_citap(Request $request){
		$id=$request->id;
		$idp=$request->idp;
		$direc=$request->direc;
		$cp=$request->cp;
		$tel=$request->tel;
		$correo=$request->correo;
		$fecha=$request->fecha;
		$hora=$request->hora;
		
		/*$this->validate($request,[
			'nom'=>'required|',['regex:/^[A-Z][A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/'],
			'derec'=>'required|',['regex:/^[A-Z][A-Z,a-z, ,.,ñ,é,í,á,ó,ú]*$/'],
			'cp'=>'required|',['regex:/^[0-9]{5}$/'],
			'tel'=>'required|',['regex:/^[0-9]{10}$/'],
			'email'=>'required|email',
			'fecha'=>'required|date',
			'hora'=>'required|',['regex:/^[0-9]{2}+[:][0-9]{2}+$/']
		]);*/
		
		$cita=citas::find($id);
		$cita->fecha=$fecha;
		$cita->hora=$hora;
		$cita->direc=$direc;
		$cita->cp=$cp;
		$cita->tel=$tel;
		$cita->correo=$correo;
		$cita->id_pac_fk=$idp;
		$cita->save();
		$proceso="MODIFICAION DE LA CITA";
		$mensaje="La Modificación de la Cita fué exitosa.";
		
		return view('sistema.mensaje')
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
	}
}
