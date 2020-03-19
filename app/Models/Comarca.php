<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comarca extends Model
{
    protected $table = 'comarca';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int'; 

    public $timestamps = false;

    public function municipis()
    {
        return $this->hasMany('App\Models\Municipi', 'id');
    }

    public function provincia()
    {
        return $this->belongsTo('App\Models\Provincia', 'id');
    }


}
