<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;
    protected $guarded=['created_at','updated_at'];

    //relacion inversa uno a uno
    public function persona(){
        return $this->belongsTo(Persona::class,'id','id');
    }
    //relación inversa uno a muchos
    public function nutricionista(){
        return $this->belongsTo(Nutricionista::class);
    }
    //relación uno a mucho
    public function tratamientos(){
        return $this->hasMany(Tratamiento::class);
    }
}
