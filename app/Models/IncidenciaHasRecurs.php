<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Pivot;

class Incidencia extends Pivot
{
    protected $table = 'incidencies_has_recursos';

    public $incrementing = true;
    public $timestamps = false;

}
