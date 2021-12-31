<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecetaNutrientes extends Model
{
    use HasFactory;
    protected $guarded=['id','created_at','updated_at'];

    public function receta(){
        return $this->belongsTo(Receta::class);
    }
    public function nutriente(){
        return $this->belongsTo(Nutriente::class);
    }
}
