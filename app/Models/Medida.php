<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Medida extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];
//relación inversa uno a muchos
    public function tipomedida()
    {
        return $this->BelongsTo(TipoMedida::class);
    }
//relación de muchos a muchos
    public function controls()
    {
        return $this->belongsToMany(Control::class);
    }
}
