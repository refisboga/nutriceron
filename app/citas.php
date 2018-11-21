<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class citas extends Model
{
    use SoftDeletes;
	protected $primaryKey='id_cita';
	protected $fillable=['id_cita','fecha','hora','direc',
                         'cp','tel','correo','id_pac_fk'];
	protected $date=['deleted_at'];
}
