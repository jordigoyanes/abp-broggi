<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecursMobil extends Model
{
    protected $table = 'recursos';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int'; 

    public $timestamps = false;

    public function incidencias()
    {
        return $this->belongsToMany('App\Models\Incidencia', 'incidencies_has_recursos', 'id', 'id');
    }

}