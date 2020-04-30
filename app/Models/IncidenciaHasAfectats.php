<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Pivot;

class Incidencia extends Pivot
{
    protected $table = 'incidencies_has_afectats';

    public $incrementing = true;
    public $timestamps = false;

}

?>
