<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    protected $table = 'provincies';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int'; 

    public $timestamps = false;

    public function comarca()
    {
        return $this->hasMany('App\Models\Comarca', 'id');
    }

}
