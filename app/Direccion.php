<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    protected $table = 'direcciones';

    protected $fillable=['linea1', 'linea2', 
    'idDepartamento', 'idMunicipio', 'idPersona'];

    public function persona()
    {
        return $this->belongsTo('App\Persona');
    }

    public function departamento()
    {
        return $this->belongsTo('App\Departamento');
    }

    public function municipio()
    {
        return $this->belongsTo('App\Municipio');
    }

    public $timestamp= false;
}
