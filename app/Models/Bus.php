<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;
    protected $table = 'bus';
    protected $fillable = [
        'id_tipo_bus',
        'marca',
        'placa',
        'estado',
        'capacidad'
    ];

    public function tipo_bus(){
        return $this->belongsTo(Tipo_Bus::class, 'id_tipo_bus');
    }
}
