<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipusRecurs extends Model
{
    protected $table = 'tipus_recurs';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';

    public $timestamps = false;

    public function incidencies()
    {
        return $this->hasMany('App\Models\Recursos', 'id');
    }

}
