<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_Bus extends Model
{
    use HasFactory;
    protected $table = 'tipo_bus';
    protected $fillable = [
        'nombre',
        'descripcion'
    ];

    public function tipo_bus(){
        return $this->hasMany(Tipo_Bus::class,'id_tipo_bus');
    }
}
