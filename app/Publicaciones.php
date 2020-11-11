<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publicaciones extends Model
{
    protected $fillable = ['titulo', 'cuerpo'];
    public $timestamps = false;

    //Relacion con la tabla usuario

    public function Usuarios()
    {
        return $this->belongsTo('App\Usuarios');
    }
}

