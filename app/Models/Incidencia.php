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
        return $this->belongsTo('App\Models\Alertant', 'alertants_id');
    }

    public function recursosMobils(){
        return $this->belongsToMany('App\Models\RecursMobil','incidencies_has_recursos','recursos_id', 'incidencies_id');
    }
    
    public function EstatIncidencia()
    {
        return $this->belongsTo('App\Models\EstatsIncidencia', 'estats_incidencia_id');
    }

    public function TipusIncident()
    {
        return $this->belongsTo('App\Models\TipusIncident', 'tipus_incident_id');
    }

    public function municipi()
    {
        return $this->belongsTo('App\Models\Municipi', 'municipis_id');
    }

}