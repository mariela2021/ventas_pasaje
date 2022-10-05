<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itinerario extends Model
{
    use HasFactory;
    protected $table = 'itinerario';
    protected $fillable = [
        'id_bus','nombre_itinerario','origen','destino','dia','precio','hora_salida','hora_llegada'
    ];

    public function bus(){
        return $this->belongsTo(Bus::class,'id_bus');
    }
}
