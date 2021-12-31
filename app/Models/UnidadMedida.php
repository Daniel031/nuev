<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnidadMedida extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    //relación de 1 a muchos
    public function medidas(){
        return $this->hasMany(Medida::class);
    }
    public function alimentonutrientes(){
        return $this->hasmany(AlimentoNutriente::class);
    }
}
