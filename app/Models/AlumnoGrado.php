<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlumnoGrado extends Model
{
    use HasFactory;
    protected $table ='alumno_grado';
    public $timestamps =false;
    protected $fillable=['grado_id','alumno_id','seccion_id','register_date'];

     public function alumno(){
        return $this->belongsTo(Alumno::class);
     }
}
