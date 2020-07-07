<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $fillable=['nombres', 'apellidos', 'titulo', 
    'biografia', 'experiencia', 'idCategoria', 'condicion', 
    'preferencia', 'profesion'];

    public function contactos()
    {
        return $this->hasMany('App\Contacto');
    }

    public function direcciones()
    {
        return $this->hasMany('App\Direccion');
    }

    public function especialidades()
    {
        return $this->hasMany('App\Especialidad');
    }

    public function preservicios()
    {
        return $this->hasMany('App\Preservicio');
    }

    public function sociales()
    {
        return $this->hasMany('App\Social');
    }

    public function categoria()
    {
        return $this->belongsTo('App\Categoria');
    }

}
