<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class doctores extends Model
{
	use SoftDeletes;
	protected $primariKey='id_doc';
    protected $fillable=['id_doc','nombre','ap_pat','ap_mat',
						'tel','correo','pass','tipo'];
	protected $date=['deleted_at'];
}
