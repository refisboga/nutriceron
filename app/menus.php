<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class menus extends Model
{
	use SoftDeletes;
	protected $primaryKey='id_menu';
	protected $fillable=['id_menu','tipo_comida','descr','menu'];
    protected $date=['deleted_at'];
}
