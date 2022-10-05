<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus_Personal extends Model
{
    use HasFactory;
    protected $table = 'bus_personal';
    protected $fillable = [
        'nombre',
        'apellido',
        'licencia',
        'telefono',
        'direccion',
        'id_rol',
        'id_bus'
    ];

    public function rol(){
        return $this->belongsTo(Roles::class,'id_rol');
    }
    public function bus(){
        return $this->belongsTo(Bus::class,'id_bus');
    }
}
