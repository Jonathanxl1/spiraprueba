<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumnos extends Model
{
    protected $table = "Alumnos";
    protected $primaryKey = "id_alumno";

    public function Cursos(){
         return $this->belongsToMany('App\Cursos','alumnos_curso','id_alumno','id_curso');
    }
}
