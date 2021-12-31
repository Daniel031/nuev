<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoAlimento extends Model
{
    use HasFactory;
    protected $guarded=['id','created_at','updated_at'];

    public function alimentos(){
        return $this->hasMany(Alimento::class);
    }
}
