<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class maestros extends Model
{
   protected $primaryKey = 'idm';
   
   protected $fillable=['idm','nombre','edad','sexo',
                         'cp','beca','idc','archivo'];
}












