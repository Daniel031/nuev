<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nutricionista extends Model
{
    use HasFactory;

    protected $guarded=['created_at','updated_at'];

    public function persona(){
        return $this->belongsTo(Persona::class,'id','id');
    }
    public function pacientes(){
        return $this->hasMany(Paciente::class);
    }
}
