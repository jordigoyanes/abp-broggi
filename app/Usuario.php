<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Authenticatable
{
    
    use Notifiable;

    protected $table = 'usuaris';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int'; 
    public $timestamps = false;

    public function rols()
    {
        return $this->belongsTo('App\Models\Rol','id');
    }

}
