<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    public function proyecto()
    {
        return $this->belongsTo('App\Proyecto');
    }

    
    public function lineabase()
    {
        return $this->belongsTo('App\LineaBase');
    }
}
