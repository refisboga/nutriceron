<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class doctores extends Model
{
	use SoftDeletes;
	protected $table='doctores';
	protected $primaryKey='id_doc';
    protected $fillable=['id_doc','nombre','ap_pat','ap_mat',
						'tel','correo','pass','cedula','tipo'];
	protected $date=['deleted_at'];
}
