<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    protected $fillable = ['nombre', 'email'];
    public $timestamps = false;

    //Relacion con la tabla Publicaciones

    public function publicaciones()
    {
        return $this->hasMany('App\Publicaciones');
    }
}
