<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Municipi extends Model
{
    protected $table = 'municipis';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';

    public $timestamps = false;

    public function incidencies()
    {
        return $this->hasMany('App\Models\Incidencia', 'id');
    }

    public function comarca()
    {
        return $this->belongsTo('App\Models\Comarca', 'id');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Afectat', 'id');
    }

}
