<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\carreras;
use App\maestros;

class curso extends Controller
{
    public function areatriangulo($base,$altura)
    {
        $area = $base * $altura /2;
        echo "El area del triangulo es $area";
    }
    public function nomina($dias)
    {
        if ($dias==7)
        {
        $salario = $dias * 100;
        echo "Excelente empleado tu pago es de $salario";
        }
        else
        {
        $salario = $dias * 80;
        echo "Empleado ya no faltes tu pago es de $salario";
        }    
    }
    public function mandado($cant,$costo)
    {
     $total = $cant * $costo;
     return view ("ventas")
     ->with('cant',$cant)
     ->with('costo',$costo)
     ->with('total',$total);     
    }
    public function altamaestros()
    {    $clavequesigue = maestros::orderBy('idm','desc')
								->take(1)
								->get();
     $idms = $clavequesigue[0]->idm+1;
		//select * from carreras 
		//ORM ELOQUENT
		// select * from carreras where activo = 'si' order by nombre asc
		$carreras = carreras::where('activo','=','Si')
		                      ->orderBy('nombre','asc')
							  ->get();
		//return $carreras;
      return view ("sistema.altamaestros")
	  ->with('carreras',$carreras)
	  ->with('idms',$idms);
    }
    public function guardamaestro(Request $request)
    {
        $nombre = $request->nombre;
        $edad = $request->edad;
        $idm = $request->idm;
        $sexo = $request->sexo;
		$cp = $request->cp;
		$beca= $request->beca;
		// NUNCA SE RECIBEN archivos
        
        $this->validate($request,[
	     'idm'=>'required|numeric',
         'nombre'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/'],
         'edad'=>'required|integer|min:18|max:70',
         'cp'=>['regex:/^[0-9]{5}$/'],
		 'beca'=>['regex:/^[0-9]+[.][0-9]{2}$/'],
		 'archivo'=>'image|mimes:jpeg,jpg,png,gif'
	     ]);
         
     $file = $request->file('archivo');
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
	 
            $maest = new maestros;
			$maest->idm = $request->idm;
			$maest->archivo = $img2;
			$maest->nombre = $request->nombre;
			$maest->edad =$request->edad;
			$maest->sexo= $request->sexo;
			$maest->cp=$request->cp;
			$maest->beca=$request->beca;
			$maest->idc=$request->idc;
			$maest->save();
				$proceso = "Alta de maestro";
	$mensaje =  "El maestro ha sido agregado Correctamente";	
	return view ('sistema.mensaje')
	->with('proceso',$proceso)
	->with('mensaje',$mensaje);
         
    }
	public function reportemaestros()
	{
	$maestros = maestros::all();
	return view('sistema.reporte')
	->with('maestros',$maestros);
	}
	public function eliminam($idm)
	{
	maestros::find($idm)->delete();
	$proceso = "Eliminacion de maestro";
	$mensaje =  "El maestro ha sido borrado Correctamente";	
	return view ('sistema.mensaje')
	->with('proceso',$proceso)
	->with('mensaje',$mensaje);
	}
}
















