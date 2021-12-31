<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    use HasFactory;
    protected $guarded=['id','created_at','updated_at'];

    //relaciones de muchos a muchos
    public function alimentorecetas()
    {
        return $this->hasMany(AlimentoRecetas::class);
    }
    public function comidarecetas()
    {
        return $this->hasMany(ComidaRecetas::class);
    }
    public function recetanutrientes(){
        return $this->hasMany(RecetaNutrientes::class);
    }
}
