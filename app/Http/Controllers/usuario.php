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
		//return redirect()->route('loginnoruta');
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
			'fecha'=>'required|date',
			'img'=>'required|image|mimes:jpeg,jpg,png,gif'
		]);
		
		$file=$request->file('img');
		if($file!=""){
			$date=date('Ymd_His_');
			$img=$file->getClientOriginalName();
			$img2=$date.$img;
			\Storage::disk('local')->put($img2,\File::get($file));
		}else{
			$img2="default-user.png";
		}
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
		$user->imagen=$img2;
		$user->tipo="usu";
		$user->save();
		$proceso="Alta del usuario: $nom.";
		$mensaje="El registro del usuario fué exitoso";
		
		$consulta=pacientes::withTrashed()
		                    ->where('correo','=',$correo)
		                    ->where('pass','=',$pass)
							->get();
							
		if(count($consulta)==1){
			Session::put('sesionid',$consulta[0]->id_pac);
			Session::put('sesionname',$consulta[0]->nombre);
			Session::put('sesionlastname',$consulta[0]->ap_pat);
			Session::put('sesionlastname2',$consulta[0]->ap_mat);
			Session::put('sesiontipo',$consulta[0]->tipo);
			return redirect()->route('home');
			/*return view('sistema.mensaje')
			->with('proceso',$proceso)
			->with('mensaje',$mensaje);*/
		}else{
			echo "Error.";
		}
	}
	
	public function modif($id){
		if(Session::get('sesiontipo')=="usu"){
			if(Session::get('sesionid')==""){
				return redirect()->route('logindesact');
			}else{
				//return redirect()->route('loginnoruta');
				$r=pacientes::where('id_pac','=',$id)->get();
				return view('sistema.modificar_usuario')->with('datos',$r[0]);
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
	
	public function modificar(Request $request){
		if(Session::get('sesiontipo')=="usu"){
			if(Session::get('sesionid')==""){
				return redirect()->route('logindesact');
			}else{
				//return redirect()->route('loginnoruta');
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
					'fecha'=>'required|date',
					'img'=>'image|mimes:jpeg,jpg,png,gif'
				]);
				
				$file=$request->file('img');
				if($file!=""){
					$date=date('Ymd_His_');
					$img=$file->getClientOriginalName();
					$img2=$date.$img;
					\Storage::disk('local')->put($img2,\File::get($file));
				}
				
				$user=pacientes::find($id);
				if($file!=""){
					$user->imagen=$img2;
				}
				$user->nombre=$nom;
				$user->ap_pat=$ap;
				$user->ap_mat=$am;
				$user->correo=$correo;
				$user->pass=$pass;
				$user->telefono=$tel;
				$user->sexo=$sexo;
				$user->fec_nac=$fecha;
				$user->save();
				$proceso="MODIFICACION DEL USUARIO";
				$mensaje="La Modificación del Usuario fué exitosa.";
				
				return view('sistema.mensaje')
				->with('proceso',$proceso)
				->with('mensaje',$mensaje);
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
	
	public function u_desactivar_pac($id){
		if(Session::get('sesiontipo')=="usu"){
			if(Session::get('sesionid')==""){
				return redirect()->route('logindesact');
			}else{
				//return redirect()->route('loginnoruta');
				pacientes::find($id)->delete();
				$proceso = "DESACTIVASTE TU CUENTA";	
				$mensaje="El Paciente, ha sido desactivado correctamente.";
				return view('sistema.mensaje')
				->with('proceso',$proceso)
				->with('mensaje',$mensaje);
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
	
	public function u_restaurar_pac($id){
		if(Session::get('sesiontipo')=="usu"){
			if(Session::get('sesionid')==""){
				return redirect()->route('logindesact');
			}else{
				//return redirect()->route('loginnoruta');
				pacientes::withTrashed()->where('id_pac','=',$id)->restore();
				$proceso = "RESTAURACION DE LA CUENTA";	
				$mensaje="El registro del Paciente, fue restaurado correctamente";
				return view('sistema.mensaje')
				->with('proceso',$proceso)
				->with('mensaje',$mensaje);
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
}