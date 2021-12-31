<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlimentoNutrientes extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function alimento(){
        return $this->belongsTo(Alimento::class);
    }
    public function nutriente(){
        return $this->belongsTo(Nutriente::class);
    }
}
