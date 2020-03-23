<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'rols';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int'; 
    public $timestamps = false;

    public function usuaris(){
        return $this->hasMany('App\Models\Usuari','id');
    }
}