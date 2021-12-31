<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nutriente extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];
//relación de muchos a muchos
    public function alimentonutrientes()
    {
        return $this->hasMany(AlimentoNutrientes::class);
    }
//relaciones inversa de uno a muchos
    public function tiponutriente()
    {
        return $this->belongsTo(TipoMedida::class);
    }
    public function unidadmedida()
    {
        return $this->belongsTo(UnidadMedida::class);
    }
    public function recetanutrientes(){
        return $this->hasMany(RecetaNutrientes::class);
    }
}
