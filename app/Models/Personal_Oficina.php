<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal_Oficina extends Model
{
    use HasFactory;
    protected $table = 'personal_oficina';
    protected $fillable = [
        'nombre','apellido','id_rol','estado','fecha_ingreso','id_oficina'
    ];

    public function Rol(){
        return $this->belongsTo(Roles::class,'id_rol');
    }
    public function Oficina(){
        return $this->belongsTo(Oficina::class,'id_oficina');
    }
}
