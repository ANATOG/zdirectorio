<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    protected $fillable=['contacto', 'detalle', 'idTipo', 'idPersona'];

    public function persona()
    {
        return $this->belongsTo('App\Persona');
    }

    public function tipo()
    {
        return $this->belongsTo('App\Tipo');
    }

    public $timestamp= false;
}


