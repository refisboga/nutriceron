<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class expedientes extends Model
{
	use SoftDeletes;
    protected $primaryKey='id_exp';
	protected $fillable=['id_exp','fecha','hora','tipo_sangre','alergia1','alergia2',
						'enfermedad1','enfermedad2','cirugia','tipo_cirugia','tratamiento',
						'desc_tratamiento','id_pac_fk'];
	protected $date=['deleted_at'];
}
