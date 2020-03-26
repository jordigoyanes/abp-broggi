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

    public function rol()
    {
        return $this->belongsTo('App\Rol', 'rol_id');
    }

}
