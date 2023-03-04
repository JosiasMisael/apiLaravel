<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    protected $fillable =['student_card','name','father_name','mother_name','birthdate','status'];

    public function grados(){
        return $this->belongsToMany(Grado::class,'alumno_grado')->withPivot('id','register_date')->orderBy('alumno_grado.id', 'desc');
    }
    public function secciones(){
        return $this->belongsToMany(Seccion::class,'alumno_grado')->withPivot('id','register_date')->orderBy('alumno_grado.id', 'desc');
    }

    public function asignaciones(){
        return $this->hasMany(AlumnoGrado::class);
    }
}
