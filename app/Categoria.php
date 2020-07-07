<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $filleable=['nombre', 'descripcion', 'condicion'];

    public function personas()
    {
        return $this->hasMany('App\Persona');
    }
    
}
