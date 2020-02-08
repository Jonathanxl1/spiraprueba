<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cursos extends Model
{
    
    protected $table = "Cursos";
    protected $primaryKey = "id_curso";

    
	public function Alumnos(){
         return $this->belongsToMany('App\Alumnos','alumnos_curso','id_curso','id_alumno');
    }
}
