<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlimentoComidas extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function alimento(){
        return $this->belongsTo(Alimento::class,'alimento_id','id');
    }
    public function comida(){
        return $this->belongsTo(Comida::class,'comida_id','id');
    }
}
