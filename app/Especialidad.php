<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    protected $table = 'especialidades';
    protected $fillable=['nombre', 'detalle',  'idPersona'];

    public function persona()
    {
        return $this->belongsTo('App\Persona');
    }

    public $timestamp= false;

}
