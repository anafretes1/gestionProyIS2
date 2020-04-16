<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LineaBase extends Model
{
    public function tareas()
    {
        return $this->hasMany('App\Tarea');
    }

    //hasone -> tiene un
    public function proyecto()
    {
        return $this->hasOne(Proyecto::class);
    }
}
