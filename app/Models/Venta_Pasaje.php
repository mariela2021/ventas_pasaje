<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta_Pasaje extends Model
{
    use HasFactory;
    protected $table = 'venta_pasaje';
    protected $fillable = [
        'id_pasajero','id_itinerario','fecha'
    ];

    public function pasajero(){
        return $this->belongsTo(Pasajero::class,'id_pasajero');
    }
    public function itinerario(){
        return $this->belongsTo(Itinerario::class,'id_itinerario');
    }
}
