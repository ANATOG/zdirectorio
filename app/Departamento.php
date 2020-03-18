<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $filleable=['nombre', 'condicion'];
    //relacion de uno a muchos
    public function municipios()
    {
        return $this->hasMany('App\Municipio');
    }
}
