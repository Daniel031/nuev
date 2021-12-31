<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];
//relación inversa uno a muchos
    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }
//relación 1 a muchos
    public function controls()
    {
        return $this->hasMany(Control::class);
    }
}
