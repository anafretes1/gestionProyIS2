<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    public function proyectos()
    {
        return $this->hasMany('App\Proyecto');
    }
}
