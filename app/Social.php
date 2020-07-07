<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    protected $table = 'sociales';
    protected $fillable=['contacto', 'detalle', 'idRed', 'idPersona'];

    public function persona()
    {
        return $this->belongsTo('App\Persona');
    }

    public function red()
    {
        return $this->belongsTo('App\Red');
    }

    public $timestamp= false;

}
