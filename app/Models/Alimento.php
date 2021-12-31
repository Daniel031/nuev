<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alimento extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

//relación inversa de 1 a muchos
    public function tipoalimento()
    {
        return $this->belongsTo(TipoAlimento::class);
    }
// relaciones de muchos a muchos
    /*public function comidas()
    {
        return $this->belongsToMany(Comida::class)->withTimestamps()->withPivot('cumplido','cantidad','fechaHora_establecida','fechaHora_cumplida');
    }
    public function recetas()
    {
        return $this->belongsToMany(Receta::class)->withTimestamps()->withPivot('id','peso');
    }
    public function nutrientes()
    {
        return $this->belongsToMany(Nutriente::class)->withTimestamps()->withPivot('id','cantidad');
    }
    //*/
    public function alimentocomidas(){
        return $this->hasMany(AlimentoComidas::class,'alimento_id','id');
    }
    public function alimentorecetas(){
        return $this->hasMany(AlimentoRecetas::class,'alimento_id','id');
    }
    public function alimentonutrientes(){
        return $this->hasMany(AlimentoNutrientes::class);
    }
}
