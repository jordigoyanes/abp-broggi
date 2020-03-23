<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstatsIncidencia extends Model
{
    protected $table = 'estats_incidencia';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int'; 

    public $timestamps = false;

   public function incidencies()
   {
       return $this->hasMany('App\Models\Incidencia', 'id');
   }
}
