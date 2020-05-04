<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    public function estado()
    {
        return $this->belongsTo('App\Estado');
    }//ok

    public function tareas()
    {
        return $this->hasMany('App\Tarea');
    }

  
}
