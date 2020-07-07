<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preservicio extends Model
{
    protected $fillable=['servicio','detalle', 'idPersona'];

    public function persona()
    {
        return $this->belongsTo('App\Persona');
    }

    public $timestamp= false;

}
