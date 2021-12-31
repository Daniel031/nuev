<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComidaRecetas extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function comida(){
        return $this->belongsTo(Comida::class);
    }
    public function Receta(){
        return $this->belongsTo(Receta::class);
    }
}
