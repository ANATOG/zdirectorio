<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    protected $filleable=['nombre', 'condicion'];

    public function contactos()
    {
        return $this->hasMany('App\Contacto');
    }
}
