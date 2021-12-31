<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Control extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];
//relación de muchos a muchos
    public function actividads()
    {
        return $this->belongsToMany(Actividad::class);
    }
//relación de muchos a muchos
    public function medidas()
    {
        return $this->belongsToMany(Medida::class);
    }
//relación inversa de 1 a muchos
    public function tratamiento()
    {
        return $this->belongsTo(Tratamiento::class);
    }
}
