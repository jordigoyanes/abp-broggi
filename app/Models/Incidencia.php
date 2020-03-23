<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{
    protected $table = 'incidencies';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int'; 

    public $timestamps = false;

    public function alertant()
    {
        return $this->belongsToMany('App\Models\Alertant', 'alertants_id');
    }


    public function estat()
    {
        return $this->belongsTo('App\Models\EstatsIncidencia', 'id');
    }


    public function TipusIncident()
    {
        return $this->belongsTo('App\Models\TipusIncident', 'id');
    }

    public function municipi()
    {
        return $this->belongsTo('App\Models\Municipi', 'id');
    }

}
