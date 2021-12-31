<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlimentoRecetas extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function alimento(){
        return $this->belongsTo(Alimento::class);
    }
    public function receta(){
        return $this->belongsTo(Receta::class);
    }
}
