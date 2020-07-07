<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $fillable=['nombre', 'condicion', 'idDepartamento'];
    //relacion de uno a muchos inverso
    public function departamento()
    {
        return $this->belongsTo('App\Departamento');
    }

    public function direcciones()
    {
        return $this->hasMany('App\Direccion');
    }
}
