<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class pacientes extends Model
{	
	use SoftDeletes;
	protected $primaryKey='id_pac';
	protected $fillable=['id_pac','nombre','ap_pat','ap_mat','correo',
						'pass','telefono','peso','talla','sexo',
						'fec_nac','tipo','calle','num_int','num_ext','colonia',
						'municipio_fk','estado_fk'];
	protected $date=['deleted_at'];
}
