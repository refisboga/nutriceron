<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\usuarios;

class c_usuarios extends Controller
{

    public function altausuarios()
    {   
      return view ("sistema.altausuario");

    }
	
    public function insertausuario(Request $request)
    {
        $nombre = $request->nombre;
        $app = $request->app;
        $apm = $request->apm;
        $user = $request->user;
        $pass = $request->pass;
        $fech_nac = $request->fech_nac;
        $color = $request->color;
        $tel = $request->tel;
        $corr = $request->corr;
		
		$this->validate($request,[
	     'nombre'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/',
	     'app'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/',
	     'apm'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/',
	     'user'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/',
	     'pass'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/',
	     'fech_nac'=>'required|date',
	     'tel'=>'required|integer',
	     'corr'=>'required|email',
		 'img'=>'required|image|mimes:jpeg,jpg,png,gif'
	     ]);

		 
     $file = $request->file('img');
	 if($file!="")
	 {
	 $ldate = date('Ymd_His_');
	 $img = $file->getClientOriginalName();
	 $img2 = $ldate.$img;
	 \Storage::disk('local')->put($img2, \File::get($file));
	 }
	 else
	 {
		 $img2 = "sinfoto.png";
	 }
	 
            $usuar = new usuarios;
			
			$usuar->nombre = $request->nombre;
			$usuar->ape_pat = $request->app;
			$usuar->ape_mat = $request->apm;
			$usuar->usuario = $request->user;
			$usuar->password = $request->pass;
			$usuar->fecha_nacimiento = $request->fech_nac;
			$usuar->sexo = $request->color;
			$usuar->telefono = $request->tel;
			$usuar->email = $request->corr;
			$usuar->imagen = $img2;
			$usuar->save();
				$proceso = "Alta de usuario";
	$mensaje =  "El usuario ha sido agregado Correctamente";	
	return view ('sistema.mensaje')
	->with('proceso',$proceso)
	->with('mensaje',$mensaje);
         
    }
}


