<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    use HasFactory;
    protected $fillable = ['name','status'];
   public function setNameAttribute($name){
    $this->attributes['name']= mb_strtoupper($name);
   }
}
