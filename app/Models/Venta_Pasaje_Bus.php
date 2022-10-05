<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta_Pasaje_Bus extends Model
{
    use HasFactory;
    protected $table = 'venta_pasaje_bus';
    protected $fillable = [
        'id_bus','id_venta_pasaje','asiento','estado'
    ];

    public function Bus(){
        return $this->belongsTo(Bus::class,'id_bus');
    }
    public function Venta_pasaje(){
        return $this->belongsTo(Venta_Pasaje::class,'id_venta_pasaje');
    }
}
