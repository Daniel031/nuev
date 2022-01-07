<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];
//relación uno a uno
    public function paciente()
    {
        return $this->hasOne(Paciente::class,'id','id');
    }
    public function nutricionista()
    {
        return $this->hasOne(Nutricionista::class,'id','id');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function image(){
        return $this->morphOne(Images::class, 'imageable');
    }
//
}
