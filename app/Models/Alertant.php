<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alertant extends Model
{
    protected $table = 'alertants';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int'; 

    public $timestamps = false;

    public function incidencia()
    {
        return $this->belongsToMany('App\Models\Incidencia','id');
    }
    public function tipus()
    {
        return $this->belongsTo('App\Models\TipusAlertant','tipus_alertant_id');
    }
/*
    public function municipi(){
        return $this->hasMany('App\Models\Municipi','id');
    }
*/

}