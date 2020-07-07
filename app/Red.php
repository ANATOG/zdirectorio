<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Red extends Model
{
    protected $table = 'redes';
    protected $filleable=['nombre', 'condicion'];

    public function sociales()
    {
        return $this->hasMany('App\Social');
    }
}
