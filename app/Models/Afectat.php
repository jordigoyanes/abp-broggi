<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Afectat extends Model
{
    protected $table = 'afectats';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';

    public $timestamps = false;

    public function municipi(){
        return $this->belongsTo('App\Models\Municipi','id');
    }

    public function incidencies()
    {
        return $this->belongsToMany('App\Models\Incidencia','incidencies_has_afectats', 'afectats_id', 'incidencies_id');
    }
}
