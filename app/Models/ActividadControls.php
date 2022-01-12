<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActividadControls extends Model
{
    use HasFactory;
    protected $guarded=['id','created_at','updated_at','cumplida'];

    public function actividad(){
        return $this->belongsTo(Actividad::class);
    }
    public function control(){
        return $this->belongsTo(Control::class);
    }
}
