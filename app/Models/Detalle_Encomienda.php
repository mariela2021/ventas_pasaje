<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_Encomienda extends Model
{
    use HasFactory;
    protected $table = 'detalle_encomienda';
    protected $fillable = [
        'id_bus','id_encomienda','id_oficina'
    ];

    public function bus(){
        return $this->belongsTo(Bus::class,'id_bus');
    }
    public function encomienda(){
        return $this->belongsTo(Encomienda::class,'id_encomienda');
    }
    public function oficina(){
        return $this->belongsTo(Oficina::class,'id_oficina');
    }
}
