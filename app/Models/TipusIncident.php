<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipusIncident extends Model
{
    protected $table = 'tipus_incident';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';

    public $timestamps = false;

    public function incidencies()
    {
        return $this->hasMany('App\Models\Incidencia', 'id');
    }

}
