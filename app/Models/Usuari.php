<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuari extends Model
{
    protected $table = 'usuaris';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int'; 
    public $timestamps = false;
    
    public function rols(){
        return $this->belongsTo('App\Models\Rol','id');
    }
}